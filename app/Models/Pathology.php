<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pathology extends Model
{
    protected $fillable = [
        'title', 'gravity', 'cured',
    ];

    public function users_x_pathology()
    {
      return  $this->hasMany(UsersXpathology::class);
    }
}

