<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Http\Requests\CarroRequest;
use Illuminate\Support\Facades\Storage;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::latest()->paginate(10);
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(CarroRequest $request)
    {
        $dados = $request->validated();

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('carros', 'public');
        }

        Carro::create($dados);

        return redirect()->route('carros.index')
            ->with('success', 'Carro cadastrado com sucesso!');
    }

    public function show(Carro $carro)
    {
        return view('carros.show', compact('carro'));
    }

    public function edit(Carro $carro)
    {
        return view('carros.edit', compact('carro'));
    }

    public function update(CarroRequest $request, Carro $carro)
    {
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
        if ($carro->foto) {
            Storage::disk('public')->delete($carro->foto);
        }

        $carro->delete();

        return redirect()->route('carros.index')
            ->with('success', 'Carro removido com sucesso!');
    }
}