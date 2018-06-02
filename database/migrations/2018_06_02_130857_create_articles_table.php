<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // 指定表存储引擎 (MySQL)。
            $table->engine = 'InnoDB';

            // 指定数据表的默认字符集 (MySQL)。
            $table->charset = 'utf8mb4';

            // 指定数据表的默认字符集 (MySQL)。
            $table->collation = 'utf8mb4_general_ci';

            // 递增的 ID (主键)，相当于「UNSIGNED INTEGER」
            $table->increments('id');

            // 相当于可空的 created_at 和 updated_at TIMESTAMP
            $table->timestamps();

            // varchar 类型, 长度为255, 默认值为空, 不允许写入 NULL 值,  注释为: 文章的标题.
            $table->string('title', 255)->default('')->nullable(false)->comment('文章的标题');

            // text 类型, 允许写入 NULL 值, 注释.
            $table->text('content')->nullable(true)->comment('文章的正文');

            // integer 类型, 默认为0, 不能为null, 注释.
            $table->integer('like_count')->default(0)->nullable(false)->comment('点赞数量');

            // 给 title 字段添加普通索引.
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
