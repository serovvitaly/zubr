<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerlionProductsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merlion_products_images', function (Blueprint $table) {


            $table->integer('id');

            /**
             * No - код товара
             */
            $table->integer('product_id');

            /**
             * ViewType - вид изображения: p – упаковка; v – товар; d – детали товара крупным планом
             */
            $table->string('view_type', 3);

            /**
             * SizeType - тип размера изображения: b – большой; m – средний; s – маленький
             */
            $table->string('size_type', 3);

            /**
             * FileName - имя файла для скачивания, по ссылке http://img.merlion.ru/items/[FileName], где [FileName] – имя файла с изображением
             */
            $table->string('file_name', 255);

            /**
             * Created - дата и время создания файла
             */
            $table->string('created', 100);

            /**
             * Size - размер изображения В байтах
             */
            $table->integer('size');

            /**
             * Width - ширина изображения
             */
            $table->integer('width');

            /**
             * Height - высота изображения
             */
            $table->integer('height');



            $table->primary('id');

            $table->index(['product_id', 'size_type'], 'product_id__size_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merlion_products_images');
    }
}
