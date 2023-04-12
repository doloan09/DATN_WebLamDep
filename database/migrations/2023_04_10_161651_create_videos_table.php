<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link_video');
            $table->string('video_id');
            $table->string('title');             // tiêu đề video
            $table->longText('thumbnail');
            $table->dateTime('public_at');       // thời gian phát hành
            $table->longText('description');     // mo ta
            $table->string('channel_id');        // id kênh
            $table->string('channel_title');     // tên kênh
            $table->longText('embed_html');      // html (<iframe>)
            $table->string('duration');          // thời lượng phát
            $table->string('privacy_status');    // trạng thái - public
            $table->integer('view_count');       // số lượt xem
            $table->integer('like_count');       // số lượt k thích
            $table->integer('dislike_count');    // số lượt k thích
            $table->integer('comment_count');    // lượt bình luận
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
