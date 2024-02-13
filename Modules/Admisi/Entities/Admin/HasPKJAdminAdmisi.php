<?php

namespace Modules\Admisi\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasPKJAdminAdmisi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'prodi_has_kelas_jalur_pendaftarans';
}
