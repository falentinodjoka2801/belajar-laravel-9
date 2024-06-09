<?php

namespace App\Models;

use App\Enums\GolonganDarah;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Pegawai extends Model{
    protected $table        =   'pegawai';
    protected $primaryKey   =   'pegNip';
    protected $keyType      =   'string';
    public $timestamps      =   false;
    public $incrementing    =   false;   

    protected $casts    =   [
        'pegGolonganDarah'  =>  GolonganDarah::class
    ];
    
    public function fullName(): Attribute{
        return Attribute::make(function(){
            $gelarDepan     =   $this->pegGelarDepan;
            $nama           =   $this->pegNama;
            $gelarBelakang  =   $this->pegGelarBelakang;

            $fullName   =   $gelarDepan.' '.$nama.', '.$gelarBelakang;

            return $fullName; 
        }, function($fullName): array{
            $fullNameArray  =   explode(' ', $fullName);
            $gelarDepan     =   $fullNameArray[0];
            $nama           =   $fullNameArray[1];
            $gelarBelakang  =   $fullNameArray[2];

            $dataFullName   =   [
                'pegGelarDepan'     =>  $gelarDepan,
                'pegNama'           =>  $nama,
                'pegGelarBelakang'  =>  $gelarBelakang
            ];

            return $dataFullName;
        });
    }
}
