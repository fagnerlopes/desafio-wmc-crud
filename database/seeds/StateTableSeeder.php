<?php

use App\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        State::truncate();
        Schema::enableForeignKeyConstraints();
        
        foreach(State::all() as $s) {
            $s->delete();
        }

        DB::table('states')->insert([
            ['id' => 1, 'name' => 'Acre', 'uf' => 'AC'],
            ['id' => 2, 'name' => 'Alagoas', 'uf' => 'AL'],
            ['id' => 3, 'name' => 'Amapá', 'uf' => 'AP'],
            ['id' => 4, 'name' => 'Amazonas', 'uf' => 'AM'],
            ['id' => 5, 'name' => 'Bahia', 'uf' => 'BA'],
            ['id' => 6, 'name' => 'Ceará', 'uf' => 'CE'],
            ['id' => 7, 'name' => 'Distrito Federal', 'uf' => 'DF'],
            ['id' => 8, 'name' => 'Espírito Santo', 'uf' => 'ES'],
            ['id' => 9, 'name' => 'Goiás', 'uf' => 'GO'],
            ['id' => 10, 'name' => 'Maranhão', 'uf' => 'MA'],
            ['id' => 11, 'name' => 'Mato Grosso', 'uf' => 'MT'],
            ['id' => 12, 'name' => 'Mato Grosso do Sul', 'uf' => 'MS'],
            ['id' => 13, 'name' => 'Minas Gerais', 'uf' => 'MG'],
            ['id' => 14, 'name' => 'Pará', 'uf' => 'PA'],
            ['id' => 15, 'name' => 'Paraíba', 'uf' => 'PB'],
            ['id' => 16, 'name' => 'Paraná', 'uf' => 'PR'],
            ['id' => 17, 'name' => 'Pernambuco', 'uf' => 'PE'],
            ['id' => 18, 'name' => 'Piauí', 'uf' => 'PI'],
            ['id' => 19, 'name' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['id' => 20, 'name' => 'Rio Grande do Norte', 'uf' => 'RN'],
            ['id' => 21, 'name' => 'Rio Grande do Sul', 'uf' => 'RS'],
            ['id' => 22, 'name' => 'Rondônia', 'uf' => 'RO'],
            ['id' => 23, 'name' => 'Roraima', 'uf' => 'RR'],
            ['id' => 24, 'name' => 'Santa Catarina', 'uf' => 'SC'],
            ['id' => 25, 'name' => 'São Paulo', 'uf' => 'SP'],
            ['id' => 26, 'name' => 'Sergipe', 'uf' => 'SE'],
            ['id' => 27, 'name' => 'Tocantins', 'uf' => 'TO'],
        ]);
    }
}
