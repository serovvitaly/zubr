<?php

namespace App\Services\Merlion;

use Illuminate\Console\Command;

class MerlionConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'merlion:{command}';

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
    public function handle($command = 'list', $param1 = 'param1')
    {
        $this->info($command . ':' . $param1); return;

        $this->info('Merlion init...');

        $products = \Merlion::getItemsAvail('B11000');

        print_r($products);
    }
}
