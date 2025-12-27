<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramEnrollment extends Model
{
    protected $table = "program_enrollments";

    protected $fillable = [
        "user_id",
        "program_id",
        "full_name",
        "email",
        "phone_number",
        "school_name",
        "grade",
        "graduation_year",
        "parent_name",
        "parent_phone",
        "address",
        "village",
        "district",
        "city",
        "province",
        "postal_code",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
