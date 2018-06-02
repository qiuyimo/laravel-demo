<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property int $post_id 外键
 * @property int $parent_id 父评论id
 * @property string $parent_name 父评论标题
 * @property string $username 评论者用户名
 * @property string $email 评论者邮箱
 * @property string $blog 评论者博客地址
 * @property string $content 评论内容
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Post $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereBlog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereParentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUsername($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    // Comment-Post:Many-One
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
