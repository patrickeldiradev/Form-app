<?php

namespace App\Modules\Form\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FormItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'form_id',
        'item_id',
        'item_type',
        'title',
        'parent_uuid',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function itemDetails(): MorphTo
    {
        return $this->morphTo(null, 'item_type', 'item_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function subItems(): HasMany
    {
        return $this->hasMany(FormItem::class, 'parent_uuid', 'uuid')->with('itemDetails');
    }

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->subItems()->with('items');
    }
}
