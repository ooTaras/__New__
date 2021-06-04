<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id('id');

           $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('title');
            
            $table->text('excerpt')->nullable();
            $table->text('text')->nullable();
            
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            
            $table->softDeletes();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
