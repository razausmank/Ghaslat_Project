<?php

namespace Database\Seeders;

use App\Models\PagePermission;
use Illuminate\Database\Seeder;

class PagePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PagePermission::create([
            'name' => 'Categories',
            'label' => 'Categories',
        ]);
        PagePermission::create([
            'name' => 'New Category',
            'label' => 'New Category',
        ]);
        PagePermission::create([
            'name' => 'Category List',
            'label' => 'Category List',
        ]);
        PagePermission::create([
            'name' => 'Products',
            'label' => 'Products',
        ]);
        PagePermission::create([
            'name' => 'New Product',
            'label' => 'New Product',
        ]);
        PagePermission::create([
            'name' => 'Products List',
            'label' => 'Products List',
        ]);
        PagePermission::create([
            'name' => 'Customers',
            'label' => 'Customers',
        ]);
        PagePermission::create([
            'name' => 'Customers List',
            'label' => 'Customers List',
        ]);
        PagePermission::create([
            'name' => 'Orders',
            'label' => 'Orders',
        ]);
        PagePermission::create([
            'name' => 'Orders Listing',
            'label' => 'Orders Listing',
        ]);
        PagePermission::create([
            'name' => 'Admin Users',
            'label' => 'Admin Users',
        ]);
        PagePermission::create([
            'name' => 'New User',
            'label' => 'New User',
        ]);
        PagePermission::create([
            'name' => "User's Listing",
            'label' => "User's Listing",
        ]);
        PagePermission::create([
            'name' => 'Settings',
            'label' => 'Settings',
        ]);
        PagePermission::create([
            'name' => 'New Menu',
            'label' => 'New Menu',
        ]);
        PagePermission::create([
            'name' => 'Menu Listing',
            'label' => 'Menu Listing',
        ]);
        PagePermission::create([
            'name' => 'New Role',
            'label' => 'New Role',
        ]);
        PagePermission::create([
            'name' => 'Role Listing',
            'label' => 'Role Listing',
        ]);
        PagePermission::create([
            'name' => 'POS',
            'label' => 'POS',
        ]);
    }
}
