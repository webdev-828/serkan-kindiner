<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('date');
            $table->string('category');
            $table->string('link');
            $table->string('page_name');
            $table->timestamps();
        });

        DB::table('portfolios')->insert([
            ['file_name' => 'work01.jpg', 'date' => '2017-12-14', 'category' => 'Design', 'link' => 'https://jetblue.com', 'page_name' => 'Jetblue'],
            ['file_name' => 'work02.jpg', 'date' => '2017-05-23', 'category' => 'Development', 'link' => 'https://overleaf.com', 'page_name' => 'Overleaf'],
            ['file_name' => 'work03.jpg', 'date' => '2017-04-16', 'category' => 'Development', 'link' => 'http://platform.morelending.eu/', 'page_name' => 'Morelending'],
            ['file_name' => 'work04.jpg', 'date' => '2018-02-10', 'category' => 'Development', 'link' => 'https://ministryofnew.in', 'page_name' => 'Ministryofnew'],
            ['file_name' => 'work05.jpg', 'date' => '2018-09-18', 'category' => 'Design', 'link' => 'https://redmart.com', 'page_name' => 'Redmart'],
            ['file_name' => 'work06.jpg', 'date' => '2016-01-19', 'category' => 'Development', 'link' => 'http://flysight.com/', 'page_name' => 'Flysight'],
            ['file_name' => 'work07.jpg', 'date' => '2018-06-06', 'category' => 'Development', 'link' => 'https://specsathome.london', 'page_name' => 'Specsathome'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
