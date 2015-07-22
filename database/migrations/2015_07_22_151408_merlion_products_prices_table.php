<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerlionProductsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merlion_products_prices', function (Blueprint $table) {


            $table->integer('id');

            /**
             * No - код товара
             */
            $table->integer('product_id');

            /**
             * PriceClient - цена клиента в USD,
             * по текущему методу отгрузки, принимает значение PriceClient_RG или PriceClient_MSK
             */
            $table->float('price_client');

            /**
             * PriceClient_RG - цена клиента для региона в USD
             */
            $table->float('price_client_rg');

            /**
             * PriceClient_MSK - цена клиента для московского региона в USD
             */
            $table->float('price_client_msk');

            /**
             * AvailableClient - доступное количество товара
             * Для склада по текущему методу отгрузки,
             * принимает значение AvailableClient_RG или AvailableClient_MSK
             */
            $table->integer('available_client');

            /**
             * AvailableClient_RG - доступное количество товара на региональном складе
             */
            $table->integer('available_client_rg');

            /**
             * AvailableClient_MSK - доступное количество товара на московском складе
             */
            $table->integer('available_client_msk');

            /**
             * AvailableExpected - ожидаемый приход товара
             */
            $table->integer('available_expected');

            /**
             * AvailableExpectedNext - следующий приход товара
             */
            $table->integer('available_expected_next');

            /**
             * DateExpectedNext - дата следующего прихода товара
             */
            $table->string('date_expected_next');

            /**
             * RRP float рекомендованная розничная цена (РРЦ) в рублях
             */
            $table->float('rrp');

            /**
             * RRP_Date - дата начала действия РРЦ
             */
            $table->string('rrp_date');

            /**
             * PriceClientRUB float цена клиента в рублях,
             * по текущему методу отгрузки, принимает значение PriceClientRUB_RG или PriceClientRUB_MSK
             */
            $table->float('price_client_rub');

            /**
             * PriceClientRUB_RG - цена клиента для региона в рублях
             */
            $table->float('price_client_rub_rg');

            /**
             * PriceClientRUB_MSK - цена клиента для московского региона в рублях
             */
            $table->float('price_client_rub_msk');

            /**
             * Online_Reserve - признак «он-лайн резервирования»
             * "0" – да (разрешено);
             * "1" – нет (запрещено);
             * "2" – платная отмена резерва
             */
            $table->integer('online_reserve');

            /**
             * ReserveCost - стоимость отмены резерва $/шт*час, 5 знаков после запятой
             */
            $table->decimal('reserve_cost', 5, 5);

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
        Schema::drop('merlion_products_prices');
    }
}
