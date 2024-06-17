<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    private function deleteEmployee(){
        DB::delete('delete from employees');
    }
    public function testFactory(){
        self::deleteEmployee();

        $falentinoDjoka     =   Employee::factory()->juniorProgrammer()->make([
            'id'    =>  '1',
            'name'  =>  'Falentino Djoka'
        ]);
        $falentinoDjoka->save();

        $feryAnugerah   =   Employee::factory()->seniorProgrammer()->make([
            'id'       =>   '2',
            'name'     =>   'Fery Anugerah'
        ]);
        $feryAnugerah->save();

        $data   =   Employee::find('1');
        self::assertNotNull($data);
        self::assertEquals($data->name, 'Falentino Djoka');
    }
}
