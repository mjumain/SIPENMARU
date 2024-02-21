<?php

namespace App\Helpers;

use Closure;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranPendaftaran;

class DataHelper
{
    public static function rupiah($nominal)
    {
        $rupiah = "Rp. " . number_format($nominal, 2, ",", ".");
        return $rupiah;
    }
    public static function cekBiodata($user_id)
    {
        $query = Biodata::where('user_id', $user_id)->first();
        return $query;
    }
    public static function cekPembayaranPendaftaran($user_id)
    {
        $query = PembayaranPendaftaran::where(function ($query) {
            $query->where('nomor_invoice', 'like', '%' . '/PMB/' . '%');
            $query->where('id_user', auth()->user()->id);
        })->first();

        return $query;
    }
}
