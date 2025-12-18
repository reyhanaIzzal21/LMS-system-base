<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasUuids;
    public $incrementing = false;
    public $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, mixed>
     */
    protected $fillable = [
        'id',
        'category_id',
        'user_id',
        'title',
        'photo',
        'slug',
        'description',
        'is_premium',
        'price',
        'is_ready',
        'promotional_price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_premium' => 'boolean',
        'is_ready' => 'boolean',
    ];

    /**
     * Get the course's category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the course's user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class)->orderBy('step', 'asc');
    }
}
