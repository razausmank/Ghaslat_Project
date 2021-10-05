<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         INSERT INTO `pages` (`id`, `name`, `url`, `description`, `sort_order`, `parent_page_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
// (1, 'Categories', '#', 'Categories Meni', 1, NULL, 1, 1, '2021-07-03 13:08:58', '2021-07-03 13:08:58'),
// (2, 'New Category', 'productcategory.create', NULL, 2, 1, 1, 1, '2021-07-03 13:09:40', '2021-07-03 13:09:40'),
// (3, 'Category List', 'productcategory.index', NULL, 3, 1, 1, 1, '2021-07-03 13:10:10', '2021-07-03 13:10:10'),
// (4, 'Products', '#', NULL, 4, NULL, 1, 1, '2021-07-03 13:10:38', '2021-07-03 13:10:38'),
// (5, 'New Product', 'product.create', NULL, 5, 4, 1, 1, '2021-07-03 13:11:06', '2021-07-03 13:11:06'),
// (6, 'Products List', 'product.index', NULL, 6, 4, 1, 1, '2021-07-03 13:11:39', '2021-07-03 13:11:39'),
// (7, 'Customers', '#', NULL, 7, NULL, 1, 1, '2021-07-03 13:11:55', '2021-07-03 13:11:55'),
// (8, 'Customers List', 'customer.index', NULL, 8, 7, 1, 1, '2021-07-03 13:12:11', '2021-07-03 13:12:11'),
// (9, 'Orders', '#', NULL, 9, NULL, 1, 1, '2021-07-03 13:15:56', '2021-07-03 13:15:56'),
// (10, 'New Order', 'order.create', NULL, 10, 9, 1, 1, '2021-07-03 13:16:21', '2021-07-03 13:16:21'),
// (11, 'Orders Listing', 'order.index', NULL, 11, 9, 1, 1, '2021-07-03 13:16:45', '2021-07-03 13:16:45'),
// (12, 'Admin Users', '#', NULL, 12, NULL, 1, 1, '2021-07-03 13:17:10', '2021-07-03 13:17:10'),
// (13, 'New User', 'user.create', NULL, 13, 12, 1, 1, '2021-07-03 13:17:37', '2021-07-03 13:17:37'),
// (14, 'User\'s Listing', 'user.index', NULL, 14, 12, 1, 1, '2021-07-03 13:18:10', '2021-07-03 15:30:38'),
// (15, 'Settings', '#', NULL, 15, NULL, 1, 1, '2021-07-03 13:18:28', '2021-07-03 13:18:28'),
// (16, 'New Menu', 'page.create', NULL, 16, 15, 1, 1, '2021-07-03 13:19:34', '2021-07-03 13:19:34'),
// (17, 'Menu Listing', 'page.index', NULL, 17, 15, 1, 1, '2021-07-03 13:20:16', '2021-07-03 13:20:16'),
// (18, 'New Role', 'role.create', NULL, 18, 15, 1, 1, '2021-07-03 13:20:47', '2021-07-03 13:20:47'),
// (19, 'Role Listing', 'role.index', NULL, 19, 15, 1, 1, '2021-07-03 13:21:58', '2021-07-03 13:21:58');

    // 1
        Page::create([
            'name' => 'Orders',
            'url' => '#',
            'sort_order' => '1',
        ]);

        // // 2
        // Page::create([
        //     'name' => 'Pending Orders',
        //     'url' => '#',
        //     'sort_order' => '2',
        // ]);

        // // 3
        // Page::create([
        //     'name' => 'Completed Orders',
        //     'url' => '#',
        //     'sort_order' => '3',
        // ]);

        // // 4
        // Page::create([
        //     'name' => 'Cancelled Orders',
        //     'url' => '#',
        //     'sort_order' => '4',
        // ]);

        // 5
        Page::create([
            'name' => 'Packages',
            'url' => '#',
            'sort_order' => '5',
        ]);

        // 6
        Page::create([
            'name' => 'New Package',
            'url' => '#',
            'sort_order' => '5',
        ]);

        // 7
        Page::create([
            'name' => 'Package List',
            'url' => '#',
            'sort_order' => '7',
        ]);

        // 8
        Page::create([
            'name' => 'Categories',
            'url' => '#',
            'sort_order' => '8',
        ]);

        // 9
        Page::create([
            'name' => 'New Category',
            'url' => 'productcategory.create',
            'sort_order' => '9',
        ]);

        // 10
        Page::create([
            'name' => 'Category List',
            'url' => 'productcategory.index',
            'sort_order' => '10',
        ]);

        // 11
        Page::create([
            'name' => 'Products',
            'url' => '#',
            'sort_order' => '11',
        ]);

        // 12
        Page::create([
            'name' => 'New Product',
            'url' => 'product.create',
            'sort_order' => '12',
        ]);

        // 13
        Page::create([
            'name' => 'Product List',
            'url' => 'product.index',
            'sort_order' => '13',
        ]);

        // 14
        Page::create([
            'name' => 'Reports',
            'url' => '#',
            'sort_order' => '14',
        ]);

        // 15
        Page::create([
            'name' => 'Customer Report',
            'url' => '#',
            'sort_order' => '15',
        ]);

        // 16
        Page::create([
            'name' => 'Orders Revenue',
            'url' => '#',
            'sort_order' => '16',
        ]);

        // 17
        Page::create([
            'name' => 'Packages Revenue',
            'url' => '#',
            'sort_order' => '17',
        ]);

        // 18
        Page::create([
            'name' => 'Other Reports',
            'url' => '#',
            'sort_order' => '18',
        ]);


        // 14
        Page::create([
            'name' => 'Reports',
            'url' => '#',
            'sort_order' => '14',
        ]);




        // // 1
        // Page::create([
        //     'name' => 'Admin',
        //     'url' => '#',
        //     'sort_order' => '1',
        // ]);

        // // 2
        // Page::create([
        //     'name' => 'Pages',
        //     'url' => '#',
        //     'sort_order' => '2',
        //     'parent_page_id' => '1',
        // ]);

        // // 3
        // Page::create([
        //     'name' => 'All Pages',
        //     'url' => 'page.index',
        //     'sort_order' => '3',
        //     'parent_page_id' => '2',
        // ]);

        // // 4
        // Page::create([
        //     'name' => 'New Page',
        //     'url' => 'page.create',
        //     'sort_order' => '4',
        //     'parent_page_id' => '2',
        // ]);

        // // 5
        // Page::create([
        //     'name' => 'Pages Hierarchy',
        //     'url' => 'page.page_hierarchy',
        //     'sort_order' => '5',
        //     'parent_page_id' => '2',
        //     'description' => '',
        // ]);

        // // 6
        // Page::create([
        //     'name' => 'Users',
        //     'url' => '#',
        //     'sort_order' => '6',
        //     'parent_page_id' => '1',
        // ]);

        // // 7
        // Page::create([
        //     'name' => 'All Users',
        //     'url' => 'user.index',
        //     'sort_order' => '7',
        //     'parent_page_id' => '6',
        // ]);

        // // 8
        // Page::create([
        //     'name' => 'New User',
        //     'url' => 'user.create',
        //     'sort_order' => '8',
        //     'parent_page_id' => '6',
        // ]);

        // // 9
        // Page::create([
        //     'name' => 'All UserTypes',
        //     'url' => 'usertype.index',
        //     'sort_order' => '9',
        //     'parent_page_id' => '6',
        // ]);

        // // 10
        // Page::create([
        //     'name' => 'New UserType',
        //     'url' => 'usertype.create',
        //     'sort_order' => '10',
        //     'parent_page_id' => '6',
        // ]);

        // // 11
        // Page::create([
        //     'name' => 'Product',
        //     'url' => '#',
        //     'sort_order' => '11',
        // ]);

        // // 12
        // Page::create([
        //     'name' => 'All Products',
        //     'url' => 'product.index',
        //     'sort_order' => '12',
        //     'parent_page_id' => '11',
        // ]);

        // // 13
        // Page::create([
        //     'name' => 'New Product',
        //     'url' => 'product.create',
        //     'sort_order' => '13',
        //     'parent_page_id' => '11',
        // ]);

        // // 14
        // Page::create([
        //     'name' => 'All Product Category',
        //     'url' => 'productcategory.index',
        //     'sort_order' => '14',
        //     'parent_page_id' => '11',
        // ]);

        // // 15
        // Page::create([
        //     'name' => 'New Product Category',
        //     'url' => 'productcategory.create',
        //     'sort_order' => '15',
        //     'parent_page_id' => '11',
        // ]);

        // // 16
        // Page::create([
        //     'name' => 'Product Stock',
        //     'url' => 'productstock.index',
        //     'sort_order' => '16',
        //     'parent_page_id' => '11',
        // ]);

        // // 17
        // Page::create([
        //     'name' => 'Add/Remove Product Stock',
        //     'url' => 'productstock.create',
        //     'sort_order' => '17',
        //     'parent_page_id' => '11',
        // ]);

        // // 18
        // Page::create([
        //     'name' => 'Customer',
        //     'url' => '#',
        //     'sort_order' => '18',
        // ]);

        // // 19
        // Page::create([
        //     'name' => 'All Customers',
        //     'url' => 'customer.index',
        //     'sort_order' => '19',
        //     'parent_page_id' => '18',
        // ]);

        // // 20
        // Page::create([
        //     'name' => 'New Customer',
        //     'url' => 'customer.create',
        //     'sort_order' => '20',
        //     'parent_page_id' => '18',
        // ]);

        // // 21
        // Page::create([
        //     'name' => 'All Customer Types',
        //     'url' => 'customertype.index',
        //     'sort_order' => '21',
        //     'parent_page_id' => '18',
        // ]);

        // // 22
        // Page::create([
        //     'name' => 'New Customer Type',
        //     'url' => 'customertype.index',
        //     'sort_order' => '22',
        //     'parent_page_id' => '18',
        // ]);

        // // 23
        // Page::create([
        //     'name' => 'Store',
        //     'url' => '#',
        //     'sort_order' => '23',
        // ]);

        // // 24
        // Page::create([
        //     'name' => 'All Stores',
        //     'url' => 'store.index',
        //     'sort_order' => '24',
        //     'parent_page_id' => '23',
        // ]);

        // // 25
        // Page::create([
        //     'name' => 'New Store',
        //     'url' => 'store.create',
        //     'sort_order' => '25',
        //     'parent_page_id' => '23',
        // ]);


        // // 26
        // Page::create([
        //     'name' => 'Settings',
        //     'url' => '#',
        //     'sort_order' => '26',
        // ]);

        // // 27
        // Page::create([
        //     'name' => 'All Remarks',
        //     'url' => 'remark.index',
        //     'sort_order' => '27',
        //     'parent_page_id' => '26',
        // ]);

        // // 28
        // Page::create([
        //     'name' => 'New Remark',
        //     'url' => 'remark.create',
        //     'sort_order' => '28',
        //     'parent_page_id' => '26',
        // ]);

        // // 29
        // Page::create([
        //     'name' => 'All Entities ',
        //     'url' => 'entitytype.index',
        //     'sort_order' => '29',
        //     'parent_page_id' => '26',
        // ]);

        // // 30
        // Page::create([
        //     'name' => 'New Entity',
        //     'url' => 'entitytype.create',
        //     'sort_order' => '30',
        //     'parent_page_id' => '26',
        // ]); }
}
