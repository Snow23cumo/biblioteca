<?php

namespace App\Models\Admin;

use App\Models\Admin\Rol;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permiso";
    protected $fillable = ['nombre', 'slug'];
    protected $guarded = ['id'];
    //public $timestamps = false;

    // Relacion mucho-mucho

    public function roles(){
        return $this->belongsToMany(Rol::class,'permiso_rol');
    }
}
