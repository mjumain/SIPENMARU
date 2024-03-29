<?php

namespace Modules\Admisi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admisi\Database\factories\TesOnlineFactory;

class TesOnline extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    protected $connection = 'cbt';
    protected $table = 'cbt_user';
    protected $primarykey = 'user_id';
    public $timestamps = false;
}
