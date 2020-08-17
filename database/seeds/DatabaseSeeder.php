<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert(
           [
               [
                 'department'=>'отдел закупок'
               ],
               [
                'department'=>'отдел продаж'
               ],
               [
                'department'=>'PR-отдел'
               ]
           ] 
        );        
    }        
}
