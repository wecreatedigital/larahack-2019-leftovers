<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->string('value')->unique();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->integer('count')->default(0);
            $table->timestamps();
        });

        if (($handle = fopen(base_path().'/csv/ingredients.csv', 'r')) !== false) {
            while (($row = fgetcsv($handle, 0, ',')) !== false) {
                DB::table('options')->insert([
                    'type' => 0,
                    'value' => $row[0],
                    'category' => $row[1],
                    'sub_category' => $row[2],
                ]);
            }
        }

        if (($handle = fopen(base_path().'/csv/utensils.csv', 'r')) !== false) {
            while (($row = fgetcsv($handle, 0, ',')) !== false) {
                DB::table('options')->insert([
                    'type' => 1,
                    'value' => $row[0],
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
