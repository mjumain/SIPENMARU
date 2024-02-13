<?php

namespace Modules\Admisi\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DashboardAdminAdmisi extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Admisi\Database\factories\Admin/DashboardAdminAdmisiFactory::new();
    }
}
