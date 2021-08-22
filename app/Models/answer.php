<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['question_id','body','user_id'];
    public function question()
    {
        return $this->belongsTo(question::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }
    protected static function booted()
    {
        parent::boot();
        static::created(
            function ($answer) {
                $answer->question->increment('answers_count');
            }
        );
    }
}
