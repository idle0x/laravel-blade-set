<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class SettingDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:delete {setting_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete setting string';

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
        $settingId = $this->argument('setting_id');
        if (empty($settingId)) {
            $settingId = $this->ask('Print setting id for delete');
        }

        try {
            $setting = Setting::findOrFail($settingId);
            $setting->delete();
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return 1;
        }

        $this->info('Setting was deleted!');
        return 0;
    }
}
