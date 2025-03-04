<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use App\Models\Rack;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    public function index()
    {
        $shelves = Shelf::with('rack')->get();
        return view('shelves.index', compact('shelves'));
    }

    public function create()
    {
        $racks = Rack::all();
        return view('shelves.create', compact('racks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rack_id' => 'required|exists:racks,id',
            'shelf_name' => 'required|string|max:255',
        ]);

        Shelf::create([
            'rack_id' => $request->rack_id,
            'shelf_name' => $request->shelf_name,
        ]);

        return redirect()->route('shelves.index')->with('success', 'Shelf added successfully!');
    }

    public function edit($id)
    {
        $shelf = Shelf::findOrFail($id);
        $racks = Rack::all();
        return view('shelves.edit', compact('shelf', 'racks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rack_id' => 'required|exists:racks,id',
            'shelf_name' => 'required|string|max:255',
        ]);

        $shelf = Shelf::findOrFail($id);
        $shelf->update([
            'rack_id' => $request->rack_id,
            'shelf_name' => $request->shelf_name,
        ]);

        return redirect()->route('shelves.index')->with('success', 'Shelf updated successfully!');
    }

    public function destroy($id)
    {
        $shelf = Shelf::findOrFail($id);
        $shelf->delete();

        return redirect()->route('shelves.index')->with('success', 'Shelf deleted successfully!');
    }
}
