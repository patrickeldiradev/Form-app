<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FormItem extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function itemDetails(): MorphTo
    {
        return $this->morphTo();
    }

    public function subItems(): HasMany
    {
        return $this->hasMany(FormItem::class, 'parent_uuid', 'uuid');
    }

    public function items(): HasMany
    {
        return $this->subItems()->with('items');
    }
}
