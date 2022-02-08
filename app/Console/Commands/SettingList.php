<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class SettingList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:list {--f|filter}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show command list';

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
     * @return int
     */
    public function handle()
    {
        $settings = Setting::all();
        $this->table(['id', 'name', 'value', 'user_id'], $settings);
        return 'Test handle';
    }
}
