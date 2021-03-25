<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        // return \Parsedown::instance()->text($this->body);
        return parsedown($this->body);
    }

    protected static function booted()
    {
        static::created(function ($answer) {
            $answer->question->increment('answers_count'); // menambah 1 ke kolom answers_count setiap save/update tabel answers (model answer)
        });

        static::deleted(function ($answer) // Kurangi 1 setiap answer dihapus
        {
            $answer->question->decrement('answers_count');
        });
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
