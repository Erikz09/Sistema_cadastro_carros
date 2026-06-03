<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Http\Requests\CarroRequest;
use Illuminate\Support\Facades\Storage;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::with('user')->latest()->paginate(10);
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(CarroRequest $request)
    {
        $dados = $request->validated();
        $dados['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('carros', 'public');
        }

        Carro::create($dados);

        return redirect()->route('carros.index')
            ->with('success', 'Carro cadastrado com sucesso!');
    }

    public function edit(Carro $carro)
    {
        // Usuário normal só edita o próprio carro
        if (!auth()->user()->isAdmin() && $carro->user_id !== auth()->id()) {
            abort(403, 'Você não pode editar este carro.');
        }

        return view('carros.edit', compact('carro'));
    }

    public function update(CarroRequest $request, Carro $carro)
    {
        if (!auth()->user()->isAdmin() && $carro->user_id !== auth()->id()) {
            abort(403, 'Você não pode editar este carro.');
        }

        $dados = $request->validated();

        if ($request->hasFile('foto')) {
            if ($carro->foto) {
                Storage::disk('public')->delete($carro->foto);
            }
            $dados['foto'] = $request->file('foto')->store('carros', 'public');
        }

        $carro->update($dados);

        return redirect()->route('carros.index')
            ->with('success', 'Carro atualizado com sucesso!');
    }

    public function destroy(Carro $carro)
    {
        if (!auth()->user()->isAdmin() && $carro->user_id !== auth()->id()) {
            abort(403, 'Você não pode excluir este carro.');
        }

        if ($carro->foto) {
            Storage::disk('public')->delete($carro->foto);
        }

        $carro->delete();

        return redirect()->route('carros.index')
            ->with('success', 'Carro removido com sucesso!');
    }
}