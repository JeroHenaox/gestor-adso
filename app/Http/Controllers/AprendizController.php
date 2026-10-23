<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
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
                        ->orWhere('documento', 'like', "%{$buscar}%")
                        ->orWhere('correo', 'like', "%{$buscar}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('aprendices.index', compact('aprendices', 'buscar'));
    }

    public function create()
    {
        return view('aprendices.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'documento' => [
                'required',
                'string',
                'max:40',
                'unique:aprendices,documento',
            ],
            'correo' => [
                'required',
                'email',
                'max:120',
                'unique:aprendices,correo',
            ],
            'ficha_id' => ['nullable', 'integer'],
        ]);

        Aprendiz::create($data);

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz registrado correctamente.');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        abort(404);
    }

    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }
}
