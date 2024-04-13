<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AJAX extends Controller{
    public function konsentrasiProdi(string $prodi): JsonResponse{
        $database               =   DB::connection('belajar-laravel');
        $konsentrasiBuilder     =   $database->table('program_studi_konsentrasi');

        $konsentrasiBuilder->select(['prodikonsentrasiId as id', 'prodikonsentrasiNama as nama']);
        $konsentrasiBuilder->where('prodikonsentrasiProdiKode', $prodi);
        $listKonsentrasiProdi   =   $konsentrasiBuilder->get();

        return response()->json([
            'status'    =>  true,
            'message'   =>  null,
            'data'      =>  [
                'listKonsentrasiProdi'  =>  $listKonsentrasiProdi
            ]
        ]);
    }
}
