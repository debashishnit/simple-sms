<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_number', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('account_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('phone_number', function($table) {
            $table->foreign('account_id')->references('id')->on('account')->onDelete('cascade')->onUpdate('cascade');;
        });

        DB::table('phone_number')->insert([
            [
                'number'  => '4924195509198',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509196',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509197',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509195',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509049',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509012',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509193',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509029',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509192',
                'account_id' => 1
            ],
            [
                'number'  => '4924195509194',
                'account_id' => 1
            ],
            [
                'number'  => '31297728125',
                'account_id' => 1
            ],
            [
                'number'  => '3253280312',
                'account_id' => 1
            ],
            [
                'number'  => '3253280311',
                'account_id' => 1
            ],
            [
                'number'  => '3253280315',
                'account_id' => 1
            ],
            [
                'number'  => '3253280313',
                'account_id' => 1
            ],
            [
                'number'  => '3253280329',
                'account_id' => 1
            ],
            [
                'number'  => '441224459508',
                'account_id' => 1
            ],
            [
                'number'  => '441224980086',
                'account_id' => 1
            ],
            [
                'number'  => '441224980087',
                'account_id' => 1
            ],
            [
                'number'  => '441224980096',
                'account_id' => 1
            ],
            [
                'number'  => '441224980098',
                'account_id' => 1
            ],
            [
                'number'  => '441224980099',
                'account_id' => 1
            ],
            [
                'number'  => '441224980100',
                'account_id' => 1
            ],
            [
                'number'  => '441224980094',
                'account_id' => 2
            ],
            [
                'number'  => '441224459426',
                'account_id' => 2
            ],
            [
                'number'  => '13605917249',
                'account_id' => 2
            ],
            [
                'number'  => '441224459548',
                'account_id' => 2
            ],
            [
                'number'  => '441224459571',
                'account_id' => 2
            ],
            [
                'number'  => '441224459598',
                'account_id' => 2
            ],
            [
                'number'  => '13605895047',
                'account_id' => 2
            ],
            [
                'number'  => '14433600975',
                'account_id' => 2
            ],
            [
                'number'  => '16052299352',
                'account_id' => 2
            ],
            [
                'number'  => '13602092244',
                'account_id' => 2
            ],
            [
                'number'  => '441224459590',
                'account_id' => 2
            ],
            [
                'number'  => '441224459620',
                'account_id' => 2
            ],
            [
                'number'  => '441224459660',
                'account_id' => 2
            ],
            [
                'number'  => '234568266473',
                'account_id' => 2
            ],
            [
                'number'  => '441224980091',
                'account_id' => 2
            ],
            [
                'number'  => '441224980092',
                'account_id' => 2
            ],
            [
                'number'  => '441224980089',
                'account_id' => 2
            ],
            [
                'number'  => '441224459482',
                'account_id' => 2
            ],
            [
                'number'  => '441224980093',
                'account_id' => 2
            ],
            [
                'number'  => '441887480051',
                'account_id' => 2
            ],
            [
                'number'  => '441873440028',
                'account_id' => 2
            ],
            [
                'number'  => '441873440017',
                'account_id' => 2
            ],
            [
                'number'  => '441970450009',
                'account_id' => 2
            ],
            [
                'number'  => '441235330075',
                'account_id' => 2
            ],
            [
                'number'  => '441235330053',
                'account_id' => 3
            ],
            [
                'number'  => '441235330044',
                'account_id' => 3
            ],
            [
                'number'  => '441235330078',
                'account_id' => 3
            ],
            [
                'number'  => '34881254103',
                'account_id' => 3
            ],
            [
                'number'  => '61871112946',
                'account_id' => 3
            ],
            [
                'number'  => '61871112915',
                'account_id' => 3
            ],
            [
                'number'  => '61881666904',
                'account_id' => 3
            ],
            [
                'number'  => '61881666939',
                'account_id' => 3
            ],
            [
                'number'  => '61871112913',
                'account_id' => 3
            ],
            [
                'number'  => '61871112901',
                'account_id' => 3
            ],
            [
                'number'  => '61871112938',
                'account_id' => 3
            ],
            [
                'number'  => '61871112934',
                'account_id' => 3
            ],
            [
                'number'  => '61871112902',
                'account_id' => 3
            ],
            [
                'number'  => '61881666926',
                'account_id' => 4
            ],
            [
                'number'  => '61871705936',
                'account_id' => 4
            ],
            [
                'number'  => '61871112920',
                'account_id' => 4
            ],
            [
                'number'  => '61881666923',
                'account_id' => 4
            ],
            [
                'number'  => '61871112947',
                'account_id' => 4
            ],
            [
                'number'  => '61871112948',
                'account_id' => 4
            ],
            [
                'number'  => '61871112921',
                'account_id' => 4
            ],
            [
                'number'  => '61881666914',
                'account_id' => 4
            ],
            [
                'number'  => '61881666942',
                'account_id' => 4
            ],
            [
                'number'  => '61871112922',
                'account_id' => 4
            ],
            [
                'number'  => '61871232393',
                'account_id' => 4
            ],
            [
                'number'  => '61871112916',
                'account_id' => 4
            ],
            [
                'number'  => '61881666921',
                'account_id' => 4
            ],
            [
                'number'  => '61871112905',
                'account_id' => 4
            ],
            [
                'number'  => '61871112937',
                'account_id' => 4
            ],
            [
                'number'  => '61361220301',
                'account_id' => 4
            ],
            [
                'number'  => '61871112931',
                'account_id' => 5
            ],
            [
                'number'  => '61871112939',
                'account_id' => 5
            ],
            [
                'number'  => '61871112940',
                'account_id' => 5
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
        Schema::table('phone_number', function($table) {
            $table->dropForeign('phone_number_account_id_foreign');
            $table->dropColumn('account_id');
        });

        Schema::dropIfExists('phone_number');
    }
}
