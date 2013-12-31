<?php

namespace App\Modules\Analytics\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'method',
        'hits_count',
    ];
}
