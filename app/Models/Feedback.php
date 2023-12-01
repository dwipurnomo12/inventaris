<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pelaporans()
    {
        return $this->hasMany(Pelaporan::class);
    }

    public function feedbackReply()
    {
        return $this->belongsTo(Feedback::class);
    }
}
