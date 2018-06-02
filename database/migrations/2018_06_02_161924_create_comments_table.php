<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->comment('外键');
            $table->integer('parent_id')->comment('父评论id');
            $table->string('parent_name')->comment('父评论标题');
            $table->string('username')->comment('评论者用户名');
            $table->string('email')->comment('评论者邮箱');
            $table->string('blog')->comment('评论者博客地址');
            $table->text('content')->comment('评论内容');
            $table->timestamps();
            //Comment表中post_id字段作为外键，与Post一对多关系
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
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
        Schema::table('comments', function(Blueprint $tabel){
            $tabel->dropForeign('comments_post_id_foreign');
        });
        Schema::dropIfExists('comments');
    }
}
