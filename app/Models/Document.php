<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'title', 'content'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
