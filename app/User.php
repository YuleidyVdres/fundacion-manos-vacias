<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nombre','apellido', 'email', 'password','rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ninos(){
        return $this->hasMany('App\nino');
    }

    public function tipoUsuario () {
        return $this->rol === 'Admin';
    }

    public function isRepresentante () {
        return $this->rol === 'Representante';
    }

    public function scopeApellido($query, $apellido){
    	if (trim($apellido)!="") {
    		$query->where("apellido","LIKE","%$apellido%");
    	}
    }
}
