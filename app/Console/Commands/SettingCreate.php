<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingCreate extends Command
{
    private $validator;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:create {name?} {value?} {--u|user=""}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new setting';

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
        $name = $this->argument('name');
        if (empty($name)) {
            $name = $this->ask('Print name of setting');
        }
        $value = $this->argument('value');
        if (empty($value)) {
            $value = $this->ask('Print value of setting');
        }
        $userId = $this->option('user');
        if (empty($userId)) {
            $userId = $this->ask('Print user_id of setting');
        }

        if ($this->isValid($name, $value, $userId)) {
            Setting::create([
                'name' => $name,
                'value' => $value,
            ]);
        } else {
            $this->info('Setting not created. See error messages below:');

            foreach ($this->validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }
        $this->info('Setting was created!');
        return 0;
    }


    private function isValid($name, $value, $userId = null)
    {
        $this->validator = Validator::make([
            'name' => $name,
            'value' => $value,
            'user_id' => $userId,
        ], [
            'name' => ['required','string',
                    Rule::unique('settings')->where(function ($query) use ($name, $userId) {
                        return $query->where('name', $name)
                            ->where('user_id', (int)$userId);
                    })
                ],
            'value' => 'required|string',
            'user_id' => 'exists:users,id|nullable',
        ]);

        if ($this->validator->fails()) {
            return false;
        }

        return true;
    }
}
