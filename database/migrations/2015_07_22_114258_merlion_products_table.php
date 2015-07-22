<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerlionProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merlion_products', function (Blueprint $table) {

            /**
             * No - код товара
             */
            $table->integer('id');

            /**
             * Name - наименование товара
             */
            $table->string('name', 255);

            /**
             * Brand - бренд
             */
            $table->string('brand', 255);

            /**
             * Vendor_part - партномер
             */
            $table->string('vendor_part');

            /**
             * Size - размер
             */
            $table->string('size');

            /**
             * EOL - признак товара, снятого с производства
             */
            $table->boolean('eol');

            /**
             * Warranty - срок гарантии В месяцах
             */
            $table->string('warranty');

            /**
             * Weight - вес (кг)
             */
            $table->float('weight');

            /**
             * Volume - объем (м3)
             */
            $table->float('volume');

            /**
             * Min_Packaged - минимальное количество
             */
            $table->integer('min_packaged');

            /**
             * GroupName1 - наименование товарного направления
             */
            $table->string('group_name1');

            /**
             * GroupName2 - наименование товарной группы
             */
            $table->string('group_name2');

            /**
             * GroupName3 - наименование товарной подгруппы
             */
            $table->string('group_name3');

            /**
             * GroupCode1 - код товарного направления
             */
            $table->string('group_code1', 20);

            /**
             * GroupCode2 - код товарной группы
             */
            $table->string('group_code2', 20);

            /**
             * GroupCode3 - код товарной подгруппы
             */
            $table->string('group_code3', 20);

            /**
             * IsBundle - признак бандла (является ли товар комплектом)
             * Бандл – комплект, состоящий из нескольких товаров, поставляемых как единое целое
             */
            $table->boolean('is_bundle');

            /**
             * ActionDesc - наименование маркетинговой акции
             */
            $table->string('action_desc');

            /**
             * ActionWWW - ссылка на подробное описание акции
             */
            $table->string('action_www');

            /**
             * Last_time_modified - дата-время последнего изменения товара, в формате YYYY-MM-DDTHH:MM:SS
             */
            $table->dateTime('last_time_modified');


            //$table->timestamps();
            $table->primary('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merlion_products');
    }
}
