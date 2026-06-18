<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carro;

class CarroSeeder extends Seeder
{
    public function run(): void
    {
        $carros = [
            [
                'marca' => 'Toyota', 
                'modelo' => 'Corolla', 
                'ano' => 2021, 
                'cor' => 'Prata', 
                'preco' => 120000.00, 
                'placa' => 'ABC1D23',
                'foto' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=600&auto=format&fit=crop'
            ],
            [
                'marca' => 'Honda',  
                'modelo' => 'Civic',   
                'ano' => 2022, 
                'cor' => 'Preto', 
                'preco' => 135000.00, 
                'placa' => 'XYZ2E34',
                'foto' => 'https://images.unsplash.com/photo-1606016159991-dfe4f2746ad5?q=80&w=600&auto=format&fit=crop'
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Onix',    
                'ano' => 2023, 
                'cor' => 'Vermelho',
                'preco' => 89000.00, 
                'placa' => 'GHI4G56',
                'foto' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=600&auto=format&fit=crop'
            ],
            [
                'marca' => 'Volkswagen',
                'modelo' => 'Golf',   
                'ano' => 2021, 
                'cor' => 'Azul',  
                'preco' => 115000.00, 
                'placa' => 'JKL5H67',
                'foto' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?q=80&w=600&auto=format&fit=crop'
            ],
        ];

        foreach ($carros as $carro) {
            Carro::create($carro);
        }
    }
}