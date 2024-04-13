<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudy extends Model{
    use HasFactory;

    private string $connnection     =   'belajar-laravel';
    private string $table           =   'program_studi';
    private string $primaryKey      =   'prodiKode';
}
