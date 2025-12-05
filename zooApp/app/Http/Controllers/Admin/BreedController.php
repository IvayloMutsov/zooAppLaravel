<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use App\Models\Type;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function index()
    {
        $breeds = Breed::with('type')->get();
        return view('admin.breeds.index', compact('breeds'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.breeds.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id'
        ]);

        Breed::create([
            'name' => $request->name,
            'type_id' => $request->type_id
        ]);

        return redirect()->route('admin.breeds.index')->with('success', 'Породата е добавена успешно.');
    }

    public function edit(Breed $breed)
    {
        $types = Type::all();
        return view('admin.breeds.edit', compact('breed', 'types'));
    }

    public function update(Request $request, Breed $breed)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id'
        ]);

        $breed->update([
            'name' => $request->name,
            'type_id' => $request->type_id
        ]);

        return redirect()->route('admin.breeds.index')->with('success', 'Породата е обновена.');
    }

    public function destroy(Breed $breed)
    {
        $breed->delete();

        return redirect()->route('admin.breeds.index')->with('success', 'Породата е изтрита.');
    }
}
