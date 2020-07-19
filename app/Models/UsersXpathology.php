<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersXpathology extends Model
{
    protected $table = "users_x_pathologies";

    protected $fillable = [
        'user_id', 'pathology_id',
    ];

    public function users()
    {
      return  $this->belongsTo(User::class,"user_id");
    }
}
