<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $query = Character::query();

        // filter by Name (optional)
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // filter by Status (optional)
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        // filter by Species (optional)
        if ($request->has('species')) {
            $query->where('species', $request->input('species'));
        }

        // filter by Gender (optional)
        if ($request->has('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        $characters = $query->paginate(10); // return 10 per page

        return response()->json($characters);
    }

    public function show (string $id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        return response()->json($character);
    }
}
