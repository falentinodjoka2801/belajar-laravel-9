<?php

namespace App\Casts;

use App\Models\ProgramStudy;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AsProgramStudy implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        if(empty($value)){
            return null;
        }

        $prodi  =   ProgramStudy::find($value);

        return $prodi;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
