<?php

namespace Tests\Feature;

use App\Models\Dosen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Enums\GolonganDarah;

class DosenTest extends TestCase{
    public function testAccessor(){
        $dosenHenryAspan    =   Dosen::find('3110041037');

        #Accessor
        $dataPegawai    =   $dosenHenryAspan->pegawai()->select(['pegNama', 'pegGelarDepan', 'pegGelarBelakang'])->first();
        $fullName       =   $dataPegawai->fullName;
        
        $expected   =   'Assoc. Prof. Dr. H Henry Aspan, S.E., S.H., M.A., M.H., M.M.';
        self::assertEquals($expected, $fullName);
    }
    public function testMutator(){
        $dosenHenryAspan    =   Dosen::find('3110041037');

        $newFullName    =   'Dr. Henry_Aspan, S.E.';
        $dataPegawai    =   $dosenHenryAspan->pegawai;
        $dataPegawai->full_name  =   $newFullName; #Mutator
        $dataPegawai->save();
        
        $dosenHenryAspan    =   Dosen::find('3110041037');
        $dataPegawai        =   $dosenHenryAspan->pegawai()->select(['pegNama', 'pegGelarDepan', 'pegGelarBelakang'])->first();
        $fullName           =   $dataPegawai->fullName; #Accessor

        self::assertTrue($fullName == $newFullName);
    }
    public function testCast(){
        $dosenHenryAspan    =   Dosen::find('3110041037');

        $dosenDsnLastUpdate     =   $dosenHenryAspan->dsnLastUpdate;
        $dosenDsnPegNip         =   $dosenHenryAspan->dsnPegNip;
        var_dump($dosenDsnPegNip);
        self::assertTrue(true);
    }
    public function testCastEnum(){
        $dosenEkoWahyuHidayat   =   Dosen::find('3110041029');
        $dataPegawai    =   $dosenEkoWahyuHidayat->pegawai;

        $pegawaiGolonganDarah   =   $dataPegawai->pegGolonganDarah;

        var_dump($pegawaiGolonganDarah);

        self::assertTrue($pegawaiGolonganDarah == GolonganDarah::A);
    }
}
