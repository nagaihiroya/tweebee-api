<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HobbyGenreMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobby_genre_master', function (Blueprint $table) {
            $table->increments('id')->comment('趣味ジャンルID');
            $table->unsignedInteger('category_id')->comment('趣味カテゴリID');
            $table->string('genre_name', 255)->comment('趣味ジャンル名');
            $table->boolean('is_active')->default(1)->comment('有効フラグ');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('登録日');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobby_genre_master');
    }
}
