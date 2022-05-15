<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Application extends Model
{
    use HasFactory;

    // applicationsテーブルとの紐づけ
    protected $table = 'applications';

    // 可変項目の設定
    protected $fillable =
    [
        'user_id',
        'group_id',
        'status',
        'content'
    ];

    /**
     *  Applicationモデル->Userモデル の紐づけ
     */
    public function comment()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Applicationモデル->Groupモデル の紐づけ
     */
    public function group()
    {
        return $this->belongsToMany('App\Models\Group');
    }
}
