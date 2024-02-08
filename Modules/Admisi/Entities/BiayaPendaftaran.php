<?php

namespace Modules\Admisi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admisi\Database\factories\BiayaPendaftaranFactory;

class BiayaPendaftaran extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): BiayaPendaftaranFactory
    {
        //return BiayaPendaftaranFactory::new();
    }
}
