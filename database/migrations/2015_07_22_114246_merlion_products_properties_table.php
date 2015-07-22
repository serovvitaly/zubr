<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerlionProductsPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merlion_products_properties', function (Blueprint $table) {


            $table->integer('id');

            /**
             * No - код товара
             */
            $table->integer('product_id');

            /**
             * PropertyID - код характеристики
             */
            $table->integer('property_id');

            /**
             * PropertyName - название характеристики
             */
            $table->string('property_name');

            /**
             * Sorting - порядок сортировки
             */
            $table->integer('sorting');

            /**
             * Value - значение характеристики
             */
            $table->integer('value');

            /**
             * Last_time_modified - дата-время последнего изменения характеристики, в формате YYYY-MM-DDTHH:MM:SS
             */
            $table->dateTime('last_time_modified');

            $table->primary('id');

            $table->unique('product_id', 'property_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merlion_products_properties');
    }
}
