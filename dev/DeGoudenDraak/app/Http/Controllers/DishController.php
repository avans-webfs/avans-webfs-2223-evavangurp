<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\DishType;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu/index', ['dishes' => Dish::all()->sortBy('id')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu/create', ['types' => DishType::all()->sortBy('id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|decimal:0,2',
            'addition' => 'max:1',
            'body' => 'max:999'
        ]);

        $dish = new Dish([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'addition' => $request->get('addition'),
            'description' => $request->get('body'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'dish_type_id' => $request->get('types')
        ]);
        $dish->save();

        return redirect('/admin/menu')->with('success', 'Gerecht opgeslagen.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('menu/edit', ['dish' => Dish::findOrFail($id),
        'types' => DishType::all()->sortBy('id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|decimal:0,2',
            'addition' => 'max:1',
            'body' => 'max:999'
        ]);

        $dish = Dish::findOrFail($id);
        $dish->name = $request->get('name');
        $dish->price = $request->get('price');
        $dish->addition = $request->get('addition');
        $dish->description = $request->get('body');
        $dish->updated_at = Carbon::now();
        $dish->dish_type_id = $request->get('types');
        $dish->save();
        
        return redirect('/admin/menu')->with('success', 'Gerecht opgeslagen.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dish::findOrFail($id)->delete();
        return redirect('/admin/menu')->with('success', 'Gerecht verwijderd.');
    }
}
