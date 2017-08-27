<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_id');
            $table->string('username');
            $table->timestamps();
        });

        DB::table('account')->insert([
            [
                'auth_id'  => '20S0KPNOIM',
                'username' => 'plivo1'
            ],
            [
                'auth_id'  => '54P2EOKQ47',
                'username' => 'plivo2'
            ],
            [
                'auth_id'  => '9LLV6I4ZWI',
                'username' => 'plivo3'
            ],
            [
                'auth_id'  => 'YHWE3HDLPQ',
                'username' => 'plivo4'
            ],
            [
                'auth_id'  => '6DLH8A25XZ',
                'username' => 'plivo5'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
