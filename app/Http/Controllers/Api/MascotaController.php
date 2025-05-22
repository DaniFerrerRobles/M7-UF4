<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascota;
use Illuminate\Support\Facades\Validator;

class MascotaController extends Controller
{
    public function index()
    {
        $mascota = Mascota::all();
        return response()->json(['mascotas' => $mascota], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'img' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $mascota = Mascota::create($request->all());
        return response()->json(['tarjeta' => $mascota], 201);
    }

    public function show($id)
    {
        $mascota = Mascota::find($id);
        if (!$mascota) {
            return response()->json(['message' => 'Mascota no encontrada'], 404);
        }
        return response()->json(['tarjeta' => $tarjeta], 200);
    }

    public function update(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if (!$mascota) {
            return response()->json(['message' => 'Mascota no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'img' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $mascota->update($request->all());
        return response()->json(['tarjeta' => $tarjeta], 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        if (!$mascota) {
            return response()->json(['message' => 'Tarjeta no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|string|max:255',
            'img' => 'sometimes|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $mascota->update($request->all());
        return response()->json(['tarjeta' => $tarjeta], 200);
    }

    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        if (!$mascota) {
            return response()->json(['message' => 'Tarjeta no encontrada'], 404);
        }

        $mascota->delete();
        return response()->json(['message' => 'Mascota eliminada'], 200);
    }
}
