<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use GuzzleHttp\Client;

class RajaOngkirController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->settings = Setting::pluck('value', 'key')->all();
        $this->client = new Client([
            'base_uri' => 'https://api.rajaongkir.com/starter/',
            'headers' => [
                'key' => $this->settings['rajaongkir_api_key']
            ]
        ]);
    }

    public function getProvinces()
    {
        $response = $this->client->request('GET', 'province');
        return response()->json(json_decode($response->getBody()->getContents())->rajaongkir->results);
    }

    public function getCities($provinceId)
    {
        $response = $this->client->request('GET', "city?province={$provinceId}");
        return response()->json(json_decode($response->getBody()->getContents())->rajaongkir->results);
    }

    public function getCosts($cityId)
    {
        $response = $this->client->post('cost', [
            'form_params' => [
                'origin' => $this->settings['rajaongkir_origin_city_id'],
                'destination' => $cityId, // ID kota tujuan
                'weight' => 1000, // Berat barang dalam gram
                'courier' => request('courier') // Kode kurir (jne, tiki, pos)
            ]
        ]);
        return response()->json(json_decode($response->getBody()->getContents())->rajaongkir->results[0]->costs);
    }
}
