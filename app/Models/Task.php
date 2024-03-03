<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'tasks';

    protected $fillable = [
        'title',
        'milestone',
        'priority',
        'tag',
        'assignuser',
    ];
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
