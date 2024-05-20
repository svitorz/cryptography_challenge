<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class ClienteController extends Controller
{
    public function index(): Collection
    {
        return Cliente::all();
    }

    public function store(Request $request): void
    {
        $cliente = new Cliente;
        $validated = $request->validate([
            'userDocument' => ['required', 'numeric'],
            'creditCardToken' => ['required', 'numeric'],
            'value' => ['required', 'numeric'],
        ]);

        $cliente::create([
            'userDocument' => Hash::make($validated['userDocument']),
            'creditCardToken' => Hash::make($validated['creditCardToken']),
            'value' => $validated['value'],
        ]);
    }

    public function show(int $id)
    {
        return Cliente::findOrFail($id);
    }

}
