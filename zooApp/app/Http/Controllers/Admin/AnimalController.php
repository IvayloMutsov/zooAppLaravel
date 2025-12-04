<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Type;
use App\Models\Breed;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::with(['type', 'breed'])->get();
        return view('admin.animals.index', compact('animals'));
    }

    public function create()
    {
        $types = Type::all();
        $breeds = Breed::all();
        return view('admin.animals.create', compact('types', 'breeds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'type_id'    => 'required|exists:types,id',
            'breed_id'   => 'required|exists:breeds,id',
            'birthdate'  => 'required|date',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['name', 'type_id', 'breed_id', 'birthdate']);

        if ($request->hasFile('image')) {
            $filename = time() . "." . $request->image->extension();
            $request->image->storeAs('animals', $filename, 'public');
            $data['image'] = $filename;
        }

        Animal::create($data);

        return redirect()->route('animals.index')->with('success', 'Животното е добавено успешно.');
    }

    public function edit(Animal $animal)
    {
        $types = Type::all();
        $breeds = Breed::all();
        return view('admin.animals.edit', compact('animal', 'types', 'breeds'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'type_id'    => 'required|exists:types,id',
            'breed_id'   => 'required|exists:breeds,id',
            'birthdate'  => 'required|date',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['name', 'type_id', 'breed_id', 'birthdate']);

        if ($request->hasFile('image')) {
            $filename = time() . "." . $request->image->extension();
            $request->image->storeAs('animals', $filename, 'public');
            $data['image'] = $filename;
        }

        $animal->update($data);

        return redirect()->route('animals.index')->with('success', 'Животното е обновено успешно.');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Животното е изтрито.');
    }
}
