<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guard = "admin";
    protected $fillable = [
        'login',
        'name',
        'surname',
        'token',
        'email',
        'global_privileges',
        'password',
    ];

    public function menages()
    {
        return $this->belongsToMany(Section::class);
    }

    public function ifmenages($id)
    {
      $find = DB::table('admin_section')
                  ->where('section_id',$id)
                  ->where('admin_id',$this->id)
                  ->first();
      if ($find == null) {
        return false;
      }
      else {
        return true;
      }
    }
}
