<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Type::create([
            'name' => $request->name
        ]);

        return redirect()->route('types.index')->with('success', 'Видът е добавен успешно.');
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $type->update([
            'name' => $request->name
        ]);

        return redirect()->route('types.index')->with('success', 'Видът е обновен успешно.');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Видът е изтрит.');
    }
}
