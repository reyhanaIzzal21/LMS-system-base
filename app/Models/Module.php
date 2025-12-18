<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Module extends Model
{
    use HasUuids;
    public $incrementing = false;
    public $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'modules';

    protected $fillable = [
        'course_id',
        'step',
        'title',
        'sub_title',
        'slug',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
