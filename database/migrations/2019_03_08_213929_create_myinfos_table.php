<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('skype');
            $table->string('myphoto');
            $table->timestamps();
        });

        DB::table('myinfos')->insert([
            [
                'first_name'=>'Serkan',
                'last_name' => 'Kindiner',
                'profile' => 'Full Stack PHP, Javascript, Python, Ruby Developer',
                'email' => 'serkan.kindiner@yandex.com',
                'phone_number' => '(+90) 530-549-3814',
                'address' => 'Istanbul Bahcelievler Soganli Street/ Yayla no:79/7 Huzur apt.',
                'skype' => 'serkan.kindiner',
                'myphoto' => 'myphoto.jpg'
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
        Schema::dropIfExists('myinfos');
    }
}
