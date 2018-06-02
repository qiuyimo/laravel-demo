<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property int $id
 * @property int $category_id 外键
 * @property string $title 标题
 * @property string $slug 锚点
 * @property string $summary 概要
 * @property string $content 内容
 * @property string $origin 文章来源
 * @property int $comment_count 评论次数
 * @property int $view_count 浏览次数
 * @property int $favorite_count 点赞次数
 * @property int $published 文章是否发布
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCommentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereFavoriteCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereViewCount($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    // Post-Category:Many-One
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Post-Comment:One-Many
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Post-Tag:Many-Many
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
