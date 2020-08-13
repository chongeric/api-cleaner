<?php

namespace ChongEric\ApiCleaner\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelloWorldController extends Controller
{
    public function hello($name)
    {
        $url = dirname(dirname(__FILE__));
//        dd($url);
        $package_name = config('api-cleaner.package_name','null');
        return view('ChongEric::hello', compact('name', 'package_name'));
//        echo 'HelloWorldController hello ' . $name;
    }

    public function world($name)
    {
        $package_name = config('api-cleaner.package_name','null');
        return view('ChongEric::hello', compact('name', 'package_name'));
//        echo 'HelloWorldController world ' . $name;
    }

}
