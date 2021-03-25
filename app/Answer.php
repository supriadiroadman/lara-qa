<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

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
            $question =  $answer->question;
            $question->decrement('answers_count');

            if ($question->best_answer_id === $answer->id) {
                $question->best_answer_id = NULL;
                $question->save();
            }
        });
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        return $this->id === $this->question->best_answer_id ? 'text-success' : 'text-secondary';
    }
}
