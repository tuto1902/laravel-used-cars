<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->state([
                'name' => 'Arturo',
                'email' => 'arturo@example.com'
            ])
            ->create();

        Brand::factory()->count(122)
            ->state(new Sequence(
                ['name' => 'Aion'],
                ['name' => 'Alfa Romeo'],
                ['name' => 'AMC'],
                ['name' => 'Aro'],
                ['name' => 'Asia'],
                ['name' => 'Aston Martin'],
                ['name' => 'Audi'],
                ['name' => 'Austin'],
                ['name' => 'BAIC'],
                ['name' => 'Baw'],
                ['name' => 'Bentley'],
                ['name' => 'Bluebird'],
                ['name' => 'BMW'],
                ['name' => 'Brilliance'],
                ['name' => 'Buick'],
                ['name' => 'BYD'],
                ['name' => 'Cadillac'],
                ['name' => 'Chana'],
                ['name' => 'Changan'],
                ['name' => 'Chery'],
                ['name' => 'Chevrolet'],
                ['name' => 'Chrysler'],
                ['name' => 'Citroen'],
                ['name' => 'CMC'],
                ['name' => 'Dacia'],
                ['name' => 'Daewoo'],
                ['name' => 'Daihatsu'],
                ['name' => 'Datsun'],
                ['name' => 'Dodge/RAM'],
                ['name' => 'Donfeng (ZNA)'],
                ['name' => 'Eagle'],
                ['name' => 'Faw'],
                ['name' => 'Ferrari'],
                ['name' => 'Fiat'],
                ['name' => 'Ford'],
                ['name' => 'Foton'],
                ['name' => 'Freightliner'],
                ['name' => 'Geely'],
                ['name' => 'Genesis'],
                ['name' => 'Geo'],
                ['name' => 'GMC'],
                ['name' => 'Gonow'],
                ['name' => 'Great Wall'],
                ['name' => 'Hafei'],
                ['name' => 'Haima'],
                ['name' => 'Haval'],
                ['name' => 'Heibao'],
                ['name' => 'Higer'],
                ['name' => 'Hino'],
                ['name' => 'Honda'],
                ['name' => 'Hummer'],
                ['name' => 'Hyundai'],
                ['name' => 'Infiniti'],
                ['name' => 'International'],
                ['name' => 'Isuzu'],
                ['name' => 'Iveco'],
                ['name' => 'JAC'],
                ['name' => 'Jaguar'],
                ['name' => 'Jeep'],
                ['name' => 'Jinbei'],
                ['name' => 'JMC'],
                ['name' => 'Jonway'],
                ['name' => 'Kenworth'],
                ['name' => 'Kia'],
                ['name' => 'Lada'],
                ['name' => 'Lamborghini'],
                ['name' => 'Lancia'],
                ['name' => 'Land Rover'],
                ['name' => 'Lexus'],
                ['name' => 'Lifan'],
                ['name' => 'Lincoln'],
                ['name' => 'Lotus'],
                ['name' => 'Mack'],
                ['name' => 'Magiruz'],
                ['name' => 'Mahindra'],
                ['name' => 'Marcopolo'],
                ['name' => 'Maserati'],
                ['name' => 'Maxus'],
                ['name' => 'Mazda'],
                ['name' => 'Mercedes Benz'],
                ['name' => 'Mercury'],
                ['name' => 'MG'],
                ['name' => 'Mini'],
                ['name' => 'Mitsubishi'],
                ['name' => 'Nissan'],
                ['name' => 'Oldsmobile'],
                ['name' => 'Opel'],
                ['name' => 'Peterbilt'],
                ['name' => 'Peugeot'],
                ['name' => 'Piaggio'],
                ['name' => 'Plymouth'],
                ['name' => 'Polarsun'],
                ['name' => 'Pontiac'],
                ['name' => 'Porsche'],
                ['name' => 'Proton'],
                ['name' => 'Rambler'],
                ['name' => 'Renault'],
                ['name' => 'Reva'],
                ['name' => 'Rolls Royce'],
                ['name' => 'Rover'],
                ['name' => 'Saab'],
                ['name' => 'Samsung'],
                ['name' => 'Saturn'],
                ['name' => 'Scania'],
                ['name' => 'Scion'],
                ['name' => 'Seat'],
                ['name' => 'Skoda'],
                ['name' => 'Smart'],
                ['name' => 'Soueast'],
                ['name' => 'Ssang Yong'],
                ['name' => 'Subaru'],
                ['name' => 'Suzuki'],
                ['name' => 'Tesla'],
                ['name' => 'Tianma'],
                ['name' => 'Tiger Truck'],
                ['name' => 'Toyota'],
                ['name' => 'Volkswagen'],
                ['name' => 'Volvo'],
                ['name' => 'Western Star'],
                ['name' => 'Xpeng'],
                ['name' => 'Yugo'],
                ['name' => 'Zap'],
            ))
            ->create();
    }
}
