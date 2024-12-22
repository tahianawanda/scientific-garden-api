<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Plant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'growth_habit' => 'required|string|max:255',
            'native_region' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $plant = Plant::create([
            'name' => $request->name,
            'scientific_name' => $request->scientific_name,
            'type' => $request->type,
            'growth_habit' => $request->growth_habit,
            'native_region' => $request->native_region,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'kingdom_id' => 1
        ]);

        return response()->json($plant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plant = Plant::findOrFail($id);

        return response()->json($plant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'growth_habit' => 'required|string|max:255',
            'native_region' => 'required|string|max:255',
            'description' => 'nullable|string'

        ]);
        
        $plant = Plant::findOrFail($id);

        $plant->update([
            'name' => $request->name,
            'scientific_name' => $request->scientific_name,
            'type' => $request->type,
            'growth_habit' => $request->growth_habit,
            'native_region' => $request->native_region,
            'description' => $request->description,
        ]);

        $plant->save();

        return response()->json($plant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plant = Plant::findOrFail($id);

        $plant->delete();

        return response()->json(['message' => 'Plant deleted successfully']);
    }
}
