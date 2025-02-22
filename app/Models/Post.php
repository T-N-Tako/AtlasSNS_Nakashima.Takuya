<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post',
    ];

    // 追加
    //リレーション定義を追加
    //「１対多」の「1」側 → メソッド名は単数形でbelongsToを使う
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
