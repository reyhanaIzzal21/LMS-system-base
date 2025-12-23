<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubModule extends Model
{
    use HasUuids, HasFactory;
    public $incrementing = false;
    public $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'sub_modules';

    protected $fillable = [
        'module_id',
        'step',
        'title',
        'sub_title',
        'slug',
        'content',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function userSubModuleProgress(): HasMany
    {
        return $this->hasMany(UserSubModuleProgress::class);
    }
}
