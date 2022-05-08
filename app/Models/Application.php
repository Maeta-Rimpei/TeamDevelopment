<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
