<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Project extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'projects';

    protected $fillable = [
        'title',
        'client',
        'startdate',
        'duedate',
        'tag',
        'progress',
    ];

    protected $hidden = [
        'remember_token',
    ];

}
