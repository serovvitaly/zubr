<?php

namespace App\Services\Merlion\ConsoleCommands;

use Illuminate\Console\Command;

class FillCatalog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'merlion:fill_catalog {cat_id=Order}';

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
        $cat_id = $this->argument('cat_id');

        $time_start = time();

        $this->info('Запрос getCatalog(' . $cat_id . ') к серверу Merlion...');

        $catalog = \Merlion::getCatalog($cat_id);

        $catalog_items = $catalog->getCatalogResult->item;

        $this->info('- получено записей ' . count($catalog_items) . ', прошло секунд ' . ( time() - $time_start ));

        if (!is_array($catalog_items)) {
            $this->error('Ответ пуст');
            return;
        }

        $time_start = time();

        $this->info('Обновление базы данных...');

        foreach ($catalog_items as $catalog_item) {

            \App\Models\Merlion\CatalogItem::firstOrCreate([
                'id' => $catalog_item->ID,
                'parent_id' => $catalog_item->ID_PARENT,
                'description' => $catalog_item->Description,
            ]);

            echo '.';
        }
        echo "\n";
        $this->info('-прошло секунд ' . ( time() - $time_start ));
        $this->info('Готово!');

    }
}