<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerlionCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Models\Merlion\CatalogItem::TABLE_NAME, function (Blueprint $table) {


            //$table->integer('id');

            /**
             * ID - код группы
             */
            $table->string('id', 20);

            /**
             * ID_PARENT - код родительской группы
             */
            $table->string('parent_id', 20);

            /**
             * Description - название товарной группы
             */
            $table->string('description');

            $table->timestamps();

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
        Schema::drop(\App\Models\Merlion\CatalogItem::TABLE_NAME);
    }
}
