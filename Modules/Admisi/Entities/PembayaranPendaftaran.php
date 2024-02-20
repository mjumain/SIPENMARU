<?php

namespace Modules\Admisi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admisi\Database\factories\PembayaranPendaftaranFactory;

class PembayaranPendaftaran extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    protected $connection = 'h2h';
    protected $table = 'tabel_tagihan_testing';
    public $timestamps = false;

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}
