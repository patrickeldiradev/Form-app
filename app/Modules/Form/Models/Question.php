<?php

namespace App\Modules\Form\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'image_id',
        'required',
        'response_type',
        'check_conditions_for',
        'categories',
        'negative',
        'notes_allowed',
        'photos_allowed',
        'issues_allowed',
        'responded',
        'params',
        'answer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function formItem(): MorphOne
    {
        return $this->morphOne(FormItem::class, 'item');
    }
}
