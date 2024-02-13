<?php

namespace Modules\Admisi\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdiAdmisi extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'prodis';
}
