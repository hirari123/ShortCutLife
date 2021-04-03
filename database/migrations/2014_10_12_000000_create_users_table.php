<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name')->unique()->comment('ユーザー名');
            $table->string('profile_image')->nullable()->comment('プロフィール画像');
            $table->text('self_introduction')->nullable()->comment('自己紹介文');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->longText('zoom_code')->nullable()->default(null);
            $table->longText('access_token')->nullable()->default(null);
            $table->longText('refresh_token')->nullable()->default(null);
            $table->timestamp('zoom_expires_in', 0)->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
