<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    use HasUuids, HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'programs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'program_category_id',
        'title',
        'slug',
        'sub_title',
        'description',
        'is_premium',
        'price',
        'promotional_price',
        'is_active',
        'thumbnail',
        'end_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'promotional_price' => 'decimal:2',
        'end_date' => 'date',
    ];

    /**
     * Get the category of this program.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }

    /**
     * Get the benefits for this program.
     */
    public function benefits(): HasMany
    {
        return $this->hasMany(ProgramBenefit::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'program_teachers');
    }
}
