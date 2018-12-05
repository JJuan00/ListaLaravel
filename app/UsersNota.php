<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersNota extends Model
{
    protected $table = 'data_list';

    protected $fillable = [
        'title', 'fecha', 'contenido', 'user',
    ];
}
