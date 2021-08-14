<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    public function question( )
    {
        return $this->belongsTo(question::class);
    }
    public function user( )
    {
        return $this->belongsTo(user::class);
    }
     public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }
}
