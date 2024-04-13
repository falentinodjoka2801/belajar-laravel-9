<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model{
    use HasFactory;

    private string $connection  =   'belajar-laravel';
    private string $table       =   'program_studi_konsentrasi';
    private string $primaryKey  =   'prodikonsentrasiId';
}
