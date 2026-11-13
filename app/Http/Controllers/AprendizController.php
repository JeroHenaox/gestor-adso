<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Http\Requests\StoreUpdateAprendizRequest;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->query('buscar');

        $aprendices = Aprendiz::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($consulta) use ($buscar) {
                    $consulta->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('documento', 'like', "%{$buscar}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('aprendices.index', compact('aprendices', 'buscar'));
    }

    public function create()
    {
        $aprendiz = new Aprendiz();

        return view('aprendices.create', compact('aprendiz'));
    }

    public function store(StoreUpdateAprendizRequest $request)
    {
        Aprendiz::create($request->validated());

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz registrado correctamente.');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit(Aprendiz $aprendice)
    {
        $aprendiz = $aprendice;

        return view('aprendices.edit', compact('aprendiz'));
    }

    public function update(
        StoreUpdateAprendizRequest $request,
        Aprendiz $aprendice
    ) {
        $aprendice->update($request->validated());

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Aprendiz $aprendice)
    {
        $aprendice->delete();

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz eliminado correctamente.');
    }
}
