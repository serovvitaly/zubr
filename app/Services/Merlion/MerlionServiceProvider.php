<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 21.07.15
 * Time: 18:32
 */

namespace App\Services\Merlion;


class MerlionServiceProvider
{

    /**
     * ==========
     * ПРАЙС-ЛИСТ
     * ==========
     */

    /**
     * Справочник товарных групп
     *
     * Для получения справочника товарных групп или обновления только необходимой его части
     *
     * @param string $cat_id - код товарной группы Обязательный параметр!
     * Также можно использовать одно из следующих значений:
     * [All – элементы всех уровней классификации (по умолчанию) | Order – список всех направлений (список групп верхнего уровня)]
     *
     * Выходные данные:
     * ID string - код группы
     * ID_PARENT string - код родительской группы
     * Description string - название товарной группы
     */
    public function getCatalog($cat_id = 'Order')
    {
        //
    }

    /**
     * Справочник товаров
     *
     * Для получения справочника товаров
     *
     * @param $cat_id - код товарной группы (Обязательный параметр, если не указан item_id)
     * @param $item_id - массив с кодами товаров, один или несколько (Обязательный параметр, если не указан cat_id, максимум 500 товаров за один запрос)
     * @param $shipment_method - 
     * @param $page
     * @param $rows_on_page
     * @param $last_time_change
     */
    public function getItems($cat_id, $item_id= null, $shipment_method, $page, $rows_on_page, $last_time_change)
    {
        //
    }

    /**
     * Доступное количество товаров и цен
     */
    public function getItemsAvail()
    {
        //
    }


    /**
     * ====================================
     * ХАРАКТЕРИСТИКИ И ИЗОБРАЖЕНИЕ ТОВАРОВ
     * ====================================
     */

    /**
     * Характеристика товаров
     */
    public function getItemsProperties()
    {
        //
    }

    /**
     * Изображение товаров
     */
    public function getItemsImages()
    {
        //
    }


    /**
     * =================
     * РАБОТА С ЗАКАЗАМИ
     * =================
     */

    /**
     * Создание/редактирование заголовка заказа
     */
    public function setOrderHeaderCommand()
    {
        //
    }

    /**
     * Создание/редактирование строки заказа
     */
    public function setOrderLineCommand()
    {
        //
    }

    /**
     * Увеличение/уменьшение желаемого количества товара в заказе
     */
    public function setAddOrderLineCommand()
    {
        //
    }

    /**
     * Перенос резервов в новый заказ
     */
    public function setMoveOrderLineCommand()
    {
        //
    }

    /**
     * Команда для подписи заказа
     */
    public function setSignOrderCommand()
    {
        //
    }

    /**
     * Удаление заказа
     */
    public function setDeleteOrderCommand()
    {
        //
    }

    /**
     * Результат обработки команд
     */
    public function getCommandResult()
    {
        //
    }

    /**
     * Список заголовков заказов
     */
    public function getOrdersList()
    {
        //
    }

    /**
     * Список строк заказа
     */
    public function getOrderLines()
    {
        //
    }

    /**
     * Список строк заказа с ГТД
     */
    public function getOrderLinesGTD()
    {
        //
    }


    /**
     * ===========
     * СПРАВОЧНИКИ
     * ===========
     */

    /**
     * Справочник доступных дат отгрузки
     */
    public function getShipmentDates()
    {
        //
    }

    /**
     * Справочник доступных методов отгрузки
     */
    public function getShipmentMethods()
    {
        //
    }

    /**
     * Справочник доступных агентов по доставке
     */
    public function getShipmentAgents()
    {
        //
    }

    /**
     * Справочник контрагентов по клиенту партнера
     */
    public function getCounterAgent()
    {
        //
    }

    /**
     * Справочник представителей по основному договору контрагента
     */
    public function getRepresentative()
    {
        //
    }

    /**
     * Справочник конечных точек доставки
     */
    public function getEndPointDelivery()
    {
        //
    }

    /**
     * Справочник типов упаковки
     */
    public function getPackingTypes()
    {
        //
    }

    /**
     * Справочник стран
     */
    public function getCountry()
    {
        //
    }

    /**
     * Справочник курс валюты
     */
    public function getCurrencyRate()
    {
        //
    }

}