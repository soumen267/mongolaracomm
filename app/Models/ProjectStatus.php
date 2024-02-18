<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProjectStatus extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'projectstatuses';

    protected $fillable  = ['user_id','project_id'];
}
