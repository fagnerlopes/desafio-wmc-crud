<?php

use App\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Employee::truncate();
        Schema::enableForeignKeyConstraints();
        
        foreach(Employee::all() as $e) {
            $e->delete();
        }

        Employee::create([
            'city_id' => 3946,
            'name' => 'Fagner Nunes Lopes',
            'address' => 'Rua José Bonifácio',
            'number' => '339',
            'neighborhood' => 'Cruzeiro',
            'address_details' => 'Apto 404',
            'postal_code' => '95060-174',
            'cpf' => '00132986078',
            'rg' => '8083085517',
            'phone' => '',
            'cell_phone' => '54996342612',
            'dob' => '1983-07-29',
            'email' => 'fagnernlopes@gmail.com',
            'wage' => 5500.00
        ]);
    }
}
