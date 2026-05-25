<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carro;

class CarroSeeder extends Seeder
{
    public function run(): void
    {
        $carros = [
            ['marca' => 'Toyota', 'modelo' => 'Corolla', 'ano' => 2021, 'cor' => 'Prata', 'preco' => 120000.00, 'placa' => 'ABC1D23'],
            ['marca' => 'Honda',  'modelo' => 'Civic',   'ano' => 2022, 'cor' => 'Preto', 'preco' => 135000.00, 'placa' => 'XYZ2E34'],
            ['marca' => 'Ford',   'modelo' => 'Ka',      'ano' => 2020, 'cor' => 'Branco','preco' => 65000.00,  'placa' => 'DEF3F45'],
            ['marca' => 'Chevrolet','modelo'=>'Onix',    'ano' => 2023, 'cor' => 'Vermelho','preco'=> 89000.00, 'placa' => 'GHI4G56'],
            ['marca' => 'Volkswagen','modelo'=>'Golf',   'ano' => 2021, 'cor' => 'Azul',  'preco' => 115000.00, 'placa' => 'JKL5H67'],
        ];

        foreach ($carros as $carro) {
            Carro::create($carro);
        }
    }
}