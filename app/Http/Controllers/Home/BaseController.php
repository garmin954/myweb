<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Admin\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    //
    public function __construct()
    {
        $this->getConfig();
    }


    /**
     * 网站配置
     */
    public function getConfig()
    {
        $configModel = new Config();

        $configArr = Cache::get('web_config');
        if (empty($configArr)){
            $configList = $configModel->where('status', 1)->get()->toArray();
            $configArr = [];
            foreach ($configList as $config){
                $configArr[$config['config_code']] = $config['value'];
            }
            Cache::put('web_config', $configArr, 3600*10);
        }

        View::share('config', $configArr);
    }
}
