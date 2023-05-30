<?php

namespace App\Http\Controllers;

use App\Models\DishType;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\NewsArticle;
use App\Models\Specialty;

class NavigationController extends Controller
{
    public function homepage(){
        return view('welcome');
    }

    public function menu(){
        return view('menu', ['types' => DishType::all()->sortBy('id')]);
    }

    public function contact(){
        return view('contact');
    }

    public function news(){
        return view('news', ['articles' => NewsArticle::all()->sortBy('id')]);
    }

    public function specialties(){
        return view('specialties', ['specialties' => Specialty::all()->sortBy('id')]);
    }
}
