<?php

namespace Database\Seeders;
use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'name' => 'Monstera',
                'price' => '40.00',
                'imageUrl' => 'https://i.pinimg.com/236x/4d/04/ad/4d04adedfc1d58150b1e20090bc3c10f.jpg'
            ],
            [
                'name' => 'Aloe Vera',
                'price' => '57.00',
                'imageUrl' => 'https://i.pinimg.com/236x/bb/d3/18/bbd318adddfd0388baf298222dd6e643.jpg'
            ],
            [
                'name' => 'Calathea',
                'price' => '65.00',
                'imageUrl' => 'https://i.pinimg.com/236x/cf/e7/66/cfe7663285a258b59a2aed1d19494fa6.jpg'
            ],
            [
                'name' => 'Ficus Lyrata',
                'price' => '54.00',
                'imageUrl' => 'https://i.pinimg.com/236x/e6/3c/e0/e63ce0932e1a09569aa6baa6ba0e5c24.jpg'
            ],
         
        ];

        foreach($data as $d){
            Plant::create($d);  
        }
    }
    
}
