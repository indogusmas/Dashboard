<?php

namespace Database\Seeders;

use App\Models\MenuList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * 
         * $table->id();
          *  $table->string('title');
           * $table->string('icon')->nullable();
            *$table->string('link');
            *$table->bigInteger('parent_id')->nullable()->unsigned();
            *$table->integer('level')->nullable();
            *$table->integer('sequence');
            *$table->integer('is_active')->default(0);
         */
        MenuList::create([
            'title' => "Authentication",
            'icon'  => 'fas fa-shield-alt',
            'link'  => '',
            'parent_id' => null,
            'level'     => 1,
            'sequence'  => 1
        ]);

        MenuList::create([
            'title' => "Master",
            'icon'  => 'fas fa-columns',
            'link'  => '',
            'parent_id' => null,
            'level'     => 1,
            'sequence'  => 2
        ]);

        MenuList::create([
            'title' => "Tools",
            'icon'  => 'fas fa-cog',
            'link'  => '',
            'parent_id' => null,
            'level'     => 1,
            'sequence'  => 3
        ]);

        MenuList::create([
            'title' => "Report",
            'icon'  => 'fas fa-clipboard-list',
            'link'  => '',
            'parent_id' => null,
            'level'     => 1,
            'sequence'  => 4
        ]);

        MenuList::create([
            'title' => "Menu List",
            'icon'  => 'te setting',
            'link'  => '/managemenulist',
            'parent_id' => 1,
            'level'     => 2,
            'sequence'  => 1
        ]);

        MenuList::create([
            'title' => "Template Role",
            'icon'  => 'te setting',
            'link'  => '/managerole',
            'parent_id' => 1,
            'level'     => 2,
            'sequence'  => 2
        ]);

        MenuList::create([
            'title' => "User Management",
            'icon'  => 'te setting',
            'link'  => '/manageuser',
            'parent_id' => 1,
            'level'     => 2,
            'sequence'  => 3
        ]);  
    }
}
