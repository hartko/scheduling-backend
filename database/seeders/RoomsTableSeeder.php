<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $rooms = [
                [
                    'roomId' => 1,
                    'name' => 'ROOM 1',
                    'capacity' => 1,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 2,
                    'name' => 'ROOM 2',
                    'capacity' => 2,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 3,
                    'name' => 'ROOM 3',
                    'capacity' => 3,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 4,
                    'name' => 'ROOM 4',
                    'capacity' => 4,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 5,
                    'name' => 'ROOM 5',
                    'capacity' => 5,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 6,
                    'name' => 'ROOM 6',
                    'capacity' => 6,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 7,
                    'name' => 'ROOM 7',
                    'capacity' => 7,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 8,
                    'name' => 'ROOM 8',
                    'capacity' => 8,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 9,
                    'name' => 'ROOM 9',
                    'capacity' => 9,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 10,
                    'name' => 'ROOM 10',
                    'capacity' => 10,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 11,
                    'name' => 'ROOM 11',
                    'capacity' => 11,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 15,
                    'name' => 'ROOM 15',
                    'capacity' => 12,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 16,
                    'name' => 'ROOM 16',
                    'capacity' => 13,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 17,
                    'name' => 'ROOM 17',
                    'capacity' => 14,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 18,
                    'name' => 'ROOM 18',
                    'capacity' => 15,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 19,
                    'name' => 'ROOM 19',
                    'capacity' => 16,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 20,
                    'name' => 'ROOM 20',
                    'capacity' => 17,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 21,
                    'name' => 'ROOM 21',
                    'capacity' => 18,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 22,
                    'name' => 'ROOM 22',
                    'capacity' => 19,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 23,
                    'name' => 'ROOM 23',
                    'capacity' => 20,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 24,
                    'name' => 'ROOM 24',
                    'capacity' => 21,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 25,
                    'name' => 'ROOM 25',
                    'capacity' => 22,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 26,
                    'name' => 'ROOM 26',
                    'capacity' => 23,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 27,
                    'name' => 'ROOM 27',
                    'capacity' => 24,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 28,
                    'name' => 'ROOM 28',
                    'capacity' => 25,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 29,
                    'name' => 'Biology Room',
                    'capacity' => 26,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 30,
                    'name' => 'Computer Lab 1',
                    'capacity' => 27,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 31,
                    'name' => 'Computer Lab 2',
                    'capacity' => 28,
                    'building' => 1,
                    'floor' => 1,
                ],
                [
                    'roomId' => 32,
                    'name' => 'Science Lab',
                    'capacity' => 29,
                    'building' => 1,
                    'floor' => 1,
                ],
            ];
    
            DB::table('rooms')->insert($rooms);
        }
    }
}
