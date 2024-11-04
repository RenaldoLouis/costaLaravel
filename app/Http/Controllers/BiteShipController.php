<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BiteShipController extends Controller
{
    private $apiUrl = 'https://api.biteship.com/v1';
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.biteship.api_key'); // pastikan api key ada di file config/services.php
    }

    public function maps(Request $request)
    {
        $regionCode = $request->input('region_code');

        $region = Region::where('kode', $regionCode)->first();

        if (!$region) {
            return response()->json(['error' => 'Region not found'], 404);
        }

        $desa = $region->nama;
        $kecamatan = $region->getParent($region->kode)->nama;
        $kabupaten = $region->getParent($region->getParent($region->kode)->kode)->nama;
        $provinsi = $region->getParent($region->getParent($region->getParent($region->kode)->kode)->kode)->nama;
        $postal_code = $request->input('postal_code');

        $formattedAddress = "$desa, $kecamatan, $kabupaten, $provinsi";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->get($this->apiUrl . '/maps/areas', [
            'countries' => 'ID',
            'type' => 'single',
            'input' => $formattedAddress,
        ]);

        // jika postal_code tidak ditemukan, return response
        if (empty($postal_code)) {
            return response()->json($response->json(), $response->status());
        }

        // looping areas, ambil data yang postal_code = $postal_code
        $areas = collect($response->json()['areas']);
        $area = $areas->firstWhere('postal_code', $postal_code);

        if ($area) {
            return response()->json($area);
        } else {
            return response()->json(['error' => 'Postal code not found'], 404);
        }
    }

    public function rates(Request $request)
    {
        $data = $request->validate([
            'origin_area_id' => 'required|string',
            'destination_area_id' => 'required|string',
            'origin_postal_code' => 'required|string',
            'destination_postal_code' => 'required|string',
            'type' => 'required|string',
            'couriers' => 'required|string',
            'items' => 'required|array',
            'items.*.name' => 'required|string',
            'items.*.description' => 'required|string',
            'items.*.value' => 'required|numeric',
            'items.*.length' => 'required|numeric',
            'items.*.width' => 'required|numeric',
            'items.*.height' => 'required|numeric',
            'items.*.weight' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl . '/rates/couriers', $data);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to fetch rates'], $response->status());
        }
    }
}
