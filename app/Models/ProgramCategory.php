<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramCategory extends Model
{
    use HasUuids, HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'program_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the programs for this category.
     */
    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }
}
