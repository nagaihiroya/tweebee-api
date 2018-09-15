<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFoundationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_foundations', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('user_id', 255)->unique()->comment('ユーザーID');
            $table->string('oauth_token', 255)->comment('twitter認証トークン');
            $table->string('oauth_token_secret', 255)->comment('twitter認証シークレットトークン');
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
        Schema::dropIfExists('user_foundations');
    }
}
