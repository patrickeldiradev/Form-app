<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormStorage extends Model
{
    use HasFactory;

    protected $table = 'form_storage';

    protected $fillable = [
        'form_id',
        'key',
        'data',
    ];
}
