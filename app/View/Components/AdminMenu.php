<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\Component;

class AdminMenu extends Component
{

    private $adminMenu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->adminMenu = $this->adminRouteFilter(collect($router->getRoutes()));
    }

    private function adminRouteFilter($routes)
    {
        $filtered = $routes->filter(function($value, $key) {
            return strpos($value->getName(), 'admin.') !== false;
        });

        // foreach ($filtered as $key => $value) {
        //     dump([
        //         $key => $value
        //     ]);
        // }
        return $filtered;
    }

    private function pageTreeParse($filteredRoutes)
    {
        $routes = [];
        foreach ($filteredRoutes as $key => $value) {
            $item = explode('.', $value->getName())[1];
            $tree = explode('_', $item);

            # code...
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
    //     dump(User::all());
    //     dump(request());
    //     Cache::add('test', "test value");
    //     Log::channel('daily')->info('Test chanel');
    //     $redis = Redis::connection();

    //     $redis->set("name", "value");
    //     Log::debug("Test debug message");
        $name = "article_test";

        $arr = explode('_', $name);
        $hierarchy = [];
        // dump($this->recursive($arr, count($arr) - 1, []));
        // dump($hierarchy);
        return view('components.admin-menu', ['menu' => $this->adminMenu]);
    }

    public function recursive($arr, $length, &$hierarchy)
    {
        $step = null;
        foreach ($arr as $key => $value) {
            if ($key <= $length) {
                if (empty($hierarchy[$value])) {
                    $step = &$hierarchy[$value];
                } else {
                    $step = &$step[$value];
                }
            } else {
                $step = $value;
            }
        }
    }
}
