<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->comment('外键');
            $table->string('title')->comment('标题');
            $table->string('slug')->unique()->index()->comment('锚点');
            $table->string('summary')->comment('概要');
            $table->text('content')->comment('内容');
            $table->text('origin')->comment('文章来源');
            $table->integer('comment_count')->unsigned()->comment('评论次数');
            $table->integer('view_count')->unsigned()->comment('浏览次数');
            $table->integer('favorite_count')->unsigned()->comment('点赞次数');
            $table->boolean('published')->comment('文章是否发布');
            $table->timestamps();
            //Post表中category_id字段作为外键，与Category一对多关系
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除表时要删除外键约束，参数为外键名称
        Schema::table('posts', function(Blueprint $tabel){
            $tabel->dropForeign('posts_category_id_foreign');
        });
        Schema::dropIfExists('posts');
    }
}
