<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    public function index()
    {
        $racks = Rack::all();
        return view('racks.index', compact('racks'));
    }

    public function create()
    {
        return view('racks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rack_name' => 'required|string|max:255',
        ]);

        Rack::create([
            'rack_name' => $request->rack_name,
        ]);

        return redirect()->route('racks.index')->with('success', 'Rack added successfully!');
    }

    public function edit($id)
    {
        $rack = Rack::findOrFail($id);
        return view('racks.edit', compact('rack'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rack_name' => 'required|string|max:255',
        ]);

        $rack = Rack::findOrFail($id);
        $rack->update([
            'rack_name' => $request->rack_name,
        ]);

        return redirect()->route('racks.index')->with('success', 'Rack updated successfully!');
    }

    public function destroy($id)
    {
        $rack = Rack::findOrFail($id);
        $rack->delete();

        return redirect()->route('racks.index')->with('success', 'Rack deleted successfully!');
    }
}
