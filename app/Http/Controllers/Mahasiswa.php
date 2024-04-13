<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa as MahasiswaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Mahasiswa extends Controller{
    public function add(): View{
        $database   =   DB::connection('belajar-laravel');
        $builder    =   $database->table('program_studi');

        $listProgramStudy   =   $builder->get(['prodiKode', 'prodiNamaResmi']);

        $data   =   compact([
            'listProgramStudy'
        ]);
        return view('mahasiswa.add', $data);
    }
    public function save(Request $request): JsonResponse{
        try{
            $status     =   false;
            $message    =   'Tidak dapat memproses data mahasiswa!';
            $data       =   null;

            $nama           =   $request->input('nama');
            $prodi          =   $request->input('prodi');
            $konsentrasi    =   $request->input('konsentrasi');
            $alamat         =   $request->input('alamat');

            $database   =   DB::connection('belajar-laravel');
            $builder    =   $database->table('mahasiswa');

            $builder->selectRaw('max(mhsNiu) as maxNiu');
            $maxNPM     =   $builder->first()->maxNiu;

            $npmMahasiswa   =   $maxNPM + 1;

            $dataMahasiswa  =   [
                'mhsNiu'                =>  $npmMahasiswa,
                'mhsNama'               =>  $nama,
                'mhsAlamatMhs'          =>  $alamat,
                'mhsProdiKode'          =>  $prodi,
                'mhsProdiKonsentrasiId' =>  $konsentrasi,
                'mhsStakmhsrKode'       =>  'A'
            ];
            $saveMahasiswa  =   $builder->insert($dataMahasiswa);
            if($saveMahasiswa){
                $status     =   true;
                $message    =   'Berhasil menyimpan data mahasiswa!';
                $data       =   [
                    'mhs'
                ];
            }
        }catch(QueryException $e){
            $status     =   false;
            $message    =   $e->getMessage();
        }

        $respond    =   [
            'status'    =>  $status,
            'message'   =>  $message,
            'data'      =>  $data
        ];
        return response()->json($respond);
    }
}
