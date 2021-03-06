<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    // 記事を「いいね」済みか判定
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    // 現在のいいね数を算出する
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    // タグモデルへのリレーションを追加
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    // コメントモデルへのリレーションを追加
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
