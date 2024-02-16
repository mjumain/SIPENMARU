<?php

namespace Modules\Admisi\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelasAdmisi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'kelas_perkuliahans';
}
