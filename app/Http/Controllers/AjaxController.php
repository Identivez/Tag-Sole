<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\Municipality;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Cambia el combo de Entidades según el país.
     */
    public function cambia_combo($id_pais)
    {
        $entidades = Entity::where('CountryId', $id_pais)
            ->select('EntityId', 'Name')
            ->orderBy('Name')
            ->get();

        return response()->json($entidades);
    }

    /**
     * Cambia el combo de Municipios según la entidad.
     */
    public function cambia_combo_2($id_entidad)
    {
        $municipios = Municipality::where('EntityId', $id_entidad)
            ->select('MunId', 'Name')
            ->orderBy('Name')
            ->get();

        return response()->json($municipios);
    }
}
