<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShippingProvinces extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dapet settings dari Controller->settings
        $settings = Setting::pluck('value', 'key')->all();
        // api get ke https://api.rajaongkir.com/starter/province pake HTTP Client
        // header: key: setting['rajaongkir_api_key']
        $client = new Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => $settings['rajaongkir_api_key'],
            ],
        ]);

        $response = json_decode($response->getBody()->getContents(), true);
        $provinces = $response['rajaongkir']['results'];
        // map jadi key value
        $provinces = collect($provinces)->mapWithKeys(function ($province) {
            return [$province['province_id'] => $province['province']];
        });

        return view('components.shipping-provinces', compact('provinces'));
    }
}
