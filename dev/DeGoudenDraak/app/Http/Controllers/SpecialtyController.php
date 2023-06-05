<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Dish;
use App\Models\SpecialtyAddition;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('specialties/index', ['specialties' => Specialty::all()->sortBy('updated_at')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specialties/create', ['additions' => SpecialtyAddition::all()->sortBy('updated_at'),
    'dishes' => Dish::all()->sortBy('id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|decimal:0,2',
            'description' => '|max:999'
        ]);

        $specialty = new Specialty([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'addition_id' => $request->get('addition'),
        ]);
        $specialty->save();
        if ($request->get('dishes') != null) {
            foreach ($request->get('dishes') as $dishId) {
                $specialty->dishes()->save(Dish::find($dishId));
            }
        }
        $specialty->save();
        return redirect('/admin/specialties')->with('success', 'Specialiteit opgeslagen.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('specialties/edit', ['specialty' => Specialty::findOrFail($id),
        'dishes' => Dish::all()->sortBy('id'),
        'additions' => SpecialtyAddition::all()->sortBy('id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|decimal:0,2',
            'description' => '|max:999'
        ]);
        $specialty = Specialty::findOrFail($id);
        $specialty->name = $request->get('name');
        $specialty->price = $request->get('price');
        $specialty->description = $request->get('description');
        $specialty->updated_at = Carbon::now();
        $specialty->addition_id = $request->get('addition');
        $specialty->dishes()->detach();
        $specialty->save();

        if ($request->get('dishes') != null) {
            foreach ($request->get('dishes') as $dishId) {
                $specialty->dishes()->save(Dish::find($dishId));
            }
        }
        
        $specialty->save();
        return redirect('/admin/specialties')->with('success', 'Specialiteit opgeslagen.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Specialty::findOrFail($id)->delete();
        return redirect('/admin/specialties')->with('success', 'Specialiteit verwijderd.');
    }
}
