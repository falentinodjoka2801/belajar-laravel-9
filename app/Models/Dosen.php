<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dosen extends Model{
    protected $table        =   'dosen';
    protected $primaryKey   =   'dsnPegNip';
    protected $keyType      =   'string';
    public $incrementing    =   false;
    public $timestamps      =   false;

    protected $casts    =   [
        'dsnPegNip'     =>  'int',
        'dsnLastUpdate' =>  'datetime'
    ];

    public function pegawai(): HasOne{
        return $this->hasOne(Pegawai::class, 'pegNip', 'dsnPegNip');
    }
}
