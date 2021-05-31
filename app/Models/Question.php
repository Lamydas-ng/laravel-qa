<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }    
=======
    protected $fillable = ['title', 'body','user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }    

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }
>>>>>>> Lesson-3
}
