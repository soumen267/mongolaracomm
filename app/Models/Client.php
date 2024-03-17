<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'clients';

    protected $fillable = [
        'company',
        'owner',
        'pending_project',
        'invoices',
        'tags',
        'category',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
