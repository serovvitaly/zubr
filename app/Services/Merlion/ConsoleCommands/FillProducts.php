<?php

namespace App\Services\Merlion\ConsoleCommands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class FillProducts extends Command
{

    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'merlion:fill_products {cat_id=Order}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //$res = \Merlion::call('getShipmentMethods');
        //$res = \Merlion::call('getShipmentDates');
        //print_r($res);
        //return;


        $cat_id = $this->argument('cat_id');

        //$products = \Merlion::getItems($cat_id, null, null, 1, 10);
        //$products = $products->getItemsResult->item;

        $products_ids_arr = [];

        /*if (!is_array($products)) {
            $products_ids_arr[] = $products->No;
        } else {
            foreach ($products as $product_mix) {
                $products_ids_arr[] = $product_mix->No;
            }
        }

        if (empty($products_ids_arr)) {
            return;
        }*/

        $products_avails = \Merlion::getItemsAvail('', $products_ids_arr);
        $products_avails = $products_avails->getItemsAvailResult->item;

        print_r($products_ids_arr);
        print_r($products_avails);

        return;



        $job = new \App\Jobs\MerlionFillProducts($cat_id);

        $job->onQueue('merlion_products');

        $this->dispatch($job);

    }
}