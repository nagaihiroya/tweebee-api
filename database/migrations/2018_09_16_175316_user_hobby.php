<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserHobby extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hobbies', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->unsignedInteger('category_id')->comment('趣味カテゴリID');
            $table->unsignedInteger('genre_id')->nullable()->comment('趣味ジャンルID');
            $table->unsignedInteger('tag_id')->nullable()->comment('趣味タグID');
            $table->boolean('is_active')->default(1)->comment('有効フラグ');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('登録日');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');
            $table->index(['id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_hobbies');
    }
}
