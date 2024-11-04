<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'wilayah';

    protected $fillable = ['kode', 'nama'];

    public static function getProvinces()
    {
        return self::whereRaw('LENGTH(kode) = 2')->orderBy('nama')->get();
    }

    public static function getCities($provincekode)
    {
        return self::whereRaw('LENGTH(kode) = 5')->where('kode', 'like', $provincekode . '.%')->orderBy('nama')->get();
    }

    public static function getDistricts($citykode)
    {
        return self::whereRaw('LENGTH(kode) = 8')->where('kode', 'like', $citykode . '.%')->orderBy('nama')->get();
    }

    public static function getVillages($districtkode)
    {
        return self::whereRaw('LENGTH(kode) = 13')->where('kode', 'like', $districtkode . '.%')->orderBy('nama')->get();
    }

    public static function getParent($kode)
    {
        $segments = explode('.', $kode);
        array_pop($segments);
        $parentkode = implode('.', $segments);

        return self::where('kode', $parentkode)->first();
    }
}
