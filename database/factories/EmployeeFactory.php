<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'        =>  '',
            'name'      =>  '',
            'title'     =>  '',
            'salary'    =>  0
        ];
    }
    public function juniorProgrammer(): Factory{
        return $this->state(function(array $attribute){
            return [
                'title'     =>  'Junior Programmer',
                'salary'    =>  5000000
            ];
        });
    }
    public function seniorProgrammer(): Factory{
        return $this->state(function(array $attribute){
            return [
                'title'     =>  'Senior Programmer',
                'salary'    =>  10000000
            ];
        });
    }
}
