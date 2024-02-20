<?php

namespace Modules\Admisi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biodata extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'mahasiswas';

    public function pembayaran()
    {
        return $this->hasMany(PembayaranPendaftaran::class, 'id_user', 'user_id');
    }
}
