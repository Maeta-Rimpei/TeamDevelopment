<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    // Groupsテーブルとの紐づけ
    protected $table = 'groups';

    // 可変項目の設定
    protected $fillable =
    [
        'title',
        'content',
        'deadline',
        'reword',
        'number_applicants',
        'number_selection',
        'required_skill',
        'user_id',
        'term_of_apply',
        'term_of_selection'
    ];

    /**
     * Groupモデル->Userモデル の紐づけ
     */
    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'applications')->withPivot('comment');
    }
}
