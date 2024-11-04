<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // store, save ke key dan value dari key-val pair di request. Jika sebelumnya udah ada key yang sama, maka akan diupdate valuenya
    // request bentuknya seperti ini:
    // {
    //     "nama_key_1": "nama_value_1",
    //     "nama_key_2": "nama_value_2",
    //     "nama_key_3": "nama_value_3",
    // }
    // simpan ke database seperti ini:
    // [
    //     {
    //         "id": 1,
    //         "key": "nama_key_1",
    //         "value": "nama_value_1",
    // dan seterusnya

    public function store(Request $request)
    {
        $request = $request->all();
        foreach ($request as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                $setting->update([
                    'value' => $value,
                ]);
            } else {
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
    }

    // buat fungsi get, di mana returnnya menjadi key-val pair
    public function index()
    {
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->key] = $setting->value;
        }
        return $data;
    }

}
