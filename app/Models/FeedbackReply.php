<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackReply extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
