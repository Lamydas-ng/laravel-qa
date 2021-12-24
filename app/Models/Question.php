<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use VotableTrait;

    use HasFactory;
    protected $fillable = ['title', 'body','user_id'];
    protected $appends = ['created_date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = clean($value);
        $this->attributes['slug'] = str::slug($value);
    }
    public function getUrlAttribute()
    {
        return route("questions.show", $this->slug);
    }
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
    }


    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
    }
    public function acceptBestAnswer(answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); //, 'question_id', 'user_id');
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
    public function getExcerptAttribute()
    {
        return clean($this->excerpt(250));
    }

    public function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHtml()), $length);
    }

    private function bodyHtml()
    {
        return \Parsedown::instance()->text($this->body);
    }
}
