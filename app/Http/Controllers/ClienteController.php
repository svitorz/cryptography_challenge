<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class ClienteController extends Controller
{
    public function index(): Collection
    {
        return Cliente::all();
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;
        $validated = $request->validate([
            'userDocument' => ['required', 'numeric'],
            'creditCardToken' => ['required', 'numeric'],
            'value' => ['required', 'numeric'],
        ]);

        return $cliente::Create([
            'userDocument' => Hash::make($validated['userDocument']),
            'creditCardToken' => Hash::make($validated['creditCardToken']),
            'value' => $validated['value'],
        ]);
    }

    public function show(int $id)
    {
        $cliente = Cliente::find($id);
        $cliente['edit'] = route('edit', ['id' => $id]);
        $cliente['destroy'] = route('destroy', ['id' => $id]);
        return $cliente;
    }

    public function edit(int $id)
    {
        return Cliente::find($id);
    }   

    public function update(int $id, Request $request)
    {
        $cliente = Cliente::findOrFail($id);
        $validated = $request->validate([
            'value' => ['required', 'numeric'],
        ]);
        $cliente->value = $validated['value'];
        return $cliente->save();
    }

    public function destroy(int $id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente->delete();
    }
}  
