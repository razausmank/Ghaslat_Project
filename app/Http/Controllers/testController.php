<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as FacadesRoute;

class testController extends Controller
{
    public function show()
    {
        // $routes = collect(FacadesRoute::getRoutes())->map(function ($route) {

        //     // Remove any routes that is not GET or has the following included in their names
        //     if (!in_array("GET", $route->methods) || (preg_match('(.update|.destroy|.store|ignition)', $route->getName()) === 1)) {
        //         return false;
        //     }
        //     return $route->getName();
        // })->filter(function ($route) {
        //     return $route;
        // });

        // // index , show , edit, update, store , delete , create
        // $route_actions_with_appropriate_labels = [
        //     "index" => "Lists",
        //     "show" => "Something",
        //     "edit" => "Edit",
        //     "create" => "Create"
        // ];

        // // index  = List  examples => Product Listing
        // // show = Detail View  examples => Product Detail View
        // // edit = Edit   examples => Edit Product
        // // create = Create examples => Create Product
        // foreach ($routes as $route) {
        //     $conventional_route =  strpos($route, '.');
        //     switch ($conventional_route) {
        //         case 'value':
        //             # code...
        //             break;

        //         default:
        //             # code...
        //             break;
        //     }
        //     if ($conventional_route) {
        //         dump(substr($route, strpos($route, '.')  + 1));
        //     }

        //     dump(strtok($route, '.'));
        // }


        // dd($routes);
    }
}
