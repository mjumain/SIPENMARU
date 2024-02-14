<?php

namespace App\Helpers;

class DataHelper
{
    public static function rupiah($nominal)
    {
        $rupiah = "Rp. " . number_format($nominal, 2, ",", ".");
        return $rupiah;
    }
}
