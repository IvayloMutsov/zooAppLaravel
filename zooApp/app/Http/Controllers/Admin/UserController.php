<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.users.index')->with('success', 'Потребителят е добавен успешно.');
}
