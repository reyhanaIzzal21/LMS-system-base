<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramBenefit extends Model
{
    use HasFactory;

    protected $table = 'program_benefits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'program_id',
        'name',
    ];

    /**
     * Get the program that owns this benefit.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
