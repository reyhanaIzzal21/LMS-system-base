<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubModuleProgress extends Model
{
    use HasFactory;

    protected $table = 'user_sub_module_progress';

    protected $fillable = [
        'user_id',
        'sub_module_id',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    /**
     * Get the user that owns the progress.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the sub-module that is completed.
     */
    public function subModule(): BelongsTo
    {
        return $this->belongsTo(SubModule::class);
    }
}
