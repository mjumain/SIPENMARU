<?php

namespace Modules\Admisi\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdiAdmisi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'prodis';
    public $timestamps = false;
}
