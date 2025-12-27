<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramTeacher extends Model
{
    use HasFactory;
    protected $table = 'program_teachers';

    protected $fillable = [
        'program_id',
        'user_id',
    ];
}
