<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CategoryCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $dom = file_get_html('https://www.truyenngan.com.vn/');
        //$a = $dom->find('#mainmenu .nav li a');

        //$categories = array();

        dd($dom);
    }
}
