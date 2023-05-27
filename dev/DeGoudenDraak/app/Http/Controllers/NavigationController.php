<?php

namespace App\Http\Controllers;

use App\Models\DishType;
use Illuminate\Http\Request;
use App\Models\Dish;

class NavigationController extends Controller
{
    public function homepage(){
        return view('welcome');
    }

    public function menu(){
        return view('menu', ['types' => DishType::all()->sortBy('id')]);
    }
}
