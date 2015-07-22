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

    const WSDL_URI = 'https://apitest.merlion.com/dl/mlservice3?wsdl';

    const CLIENT_CODE = 'TCD000099';

    const LOGIN = 'TC0040424';

    const PASSWORD = '123456';

    protected $soap_client = null;

    protected function getSoapClient()
    {
        if (!$this->soap_client) {
            $this->soap_client = new \SoapClient(self::WSDL_URI, array(
                'login' => self::CLIENT_CODE . '|' . self::LOGIN,
                'password' => self::PASSWORD
            ));
        }

        return $this->soap_client;
    }

    protected function call($function_name, array $arguments = [])
    {
        return $result = $this->getSoapClient()->__soapCall($function_name, array(
            $function_name => $arguments
        ));
    }

    public function getItemFullInfo($cat_id, $item_id= null, $shipment_method = null, $page = 1, $rows_on_page = 30, $last_time_change = null)
    {
        $item = $this->getItems($cat_id, $item_id, $shipment_method, $page, $rows_on_page, $last_time_change);

        $items_data = $item->getItemsResult->item;

        if (is_array($items_data) and count($items_data) > 0) {
            foreach ($items_data as $item_data) {
                //
            }
        }

        var_dump($item_data); return;

        $item_images = $this->getItemsImages($cat_id, $item_id);
        $item_data->images = $item_images->getItemsImagesResult->item;

        $item_properties = $this->getItemsProperties($cat_id, $item_id, null, null);
        $item_data->properties = $item_properties->getItemsPropertiesResult->item;

        return $item_data;
    }

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
     *
     * @return mixed
     */
    public function getCatalog($cat_id = 'Order')
    {

        $result = $this->call('getCatalog', [
            'cat_id' => $cat_id
        ]);

        return $result;
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
     * @return mixed
     */
    public function getItems($cat_id, $item_id= null, $shipment_method = null, $page = 1, $rows_on_page = 30, $last_time_change = null)
    {
        $result = $this->call('getItems', [
            'cat_id' => $cat_id,
            'item_id' => $item_id,
            'shipment_method' => $shipment_method,
            'page' => $page,
            'rows_on_page' => $rows_on_page,
            'last_time_change' => $last_time_change,
        ]);

        return $result;
    }

    /**
     * Доступное количество товаров и цен
     * @param $cat_id
     * @param $shipment_method
     * @param $shipment_date
     * @param $only_avail
     * @param $item_id
     * @return mixed
     */
    public function getItemsAvail($cat_id, $item_id = '', $shipment_method = '', $shipment_date = '', $only_avail = '')
    {
        $result = $this->call('getItemsAvail', [
            'cat_id' => $cat_id,
            'item_id' => $item_id,
            'shipment_method' => $shipment_method,
            'shipment_date' => $shipment_date,
            'only_avail' => $only_avail,
        ]);

        return $result;
    }


    /**
     * ====================================
     * ХАРАКТЕРИСТИКИ И ИЗОБРАЖЕНИЕ ТОВАРОВ
     * ====================================
     */

    /**
     * Характеристика товаров
     * @param $cat_id
     * @param null $item_id
     * @param int $page
     * @param int $rows_on_page
     * @param null $last_time_change
     * @return mixed
     */
    public function getItemsProperties($cat_id, $item_id= null, $page = 1, $rows_on_page = 30, $last_time_change = null)
    {
        $result = $this->call('getItemsProperties', [
            'cat_id' => $cat_id,
            'item_id' => $item_id,
            'page' => $page,
            'rows_on_page' => $rows_on_page,
            //'last_time_change' => $last_time_change,
        ]);

        return $result;
    }

    /**
     * Изображение товаров
     * @param $cat_id
     * @param null $item_id
     * @param int $page
     * @param int $rows_on_page
     * @param null $last_time_change
     * @return mixed
     */
    public function getItemsImages($cat_id, $item_id= null, $page = 1, $rows_on_page = 30, $last_time_change = null)
    {
        $result = $this->call('getItemsImages', [
            'cat_id' => $cat_id,
            'item_id' => $item_id,
            'page' => $page,
            'rows_on_page' => $rows_on_page,
            //'last_time_change' => $last_time_change,
        ]);

        return $result;
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