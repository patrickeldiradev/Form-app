<?php

namespace App\Modules\Form\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Section extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function formItem(): MorphOne
    {
        return $this->morphOne(FormItem::class, 'item');
    }
}
