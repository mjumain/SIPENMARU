<?php

namespace App\Helpers;

use Closure;
use Illuminate\Support\Facades\DB;
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
    public static function cekHasilCBT($email)
    {
        $query = DB::connection('cbt')->table('cbt_tes_soal as a')
            ->select(DB::raw("SUM(tessoal_nilai) as nilai"))
            ->join('cbt_tes_user as b', 'a.tessoal_tesuser_id', '=', 'b.tesuser_tes_id')
            ->join('cbt_user as c', 'b.tesuser_user_id', '=', 'c.user_id')
            ->where('c.user_name', '=', auth()->user()->email)
            // ->where('c.user_name', '=', '1502172605000001')
            ->first();

        return $query;
    }
    public static function validasiAdmisi($user_id)
    {
        $query = Biodata::where('user_id', $user_id)->first();
        return $query->validasi_admisi;
    }
}
