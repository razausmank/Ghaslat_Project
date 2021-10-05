<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\User;
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

        // INSERT INTO `roles` (`id`, `name`, `label`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        // (1, 'Admin', 'admin', NULL, NULL, NULL, NULL),
        // (3, 'Manager', 'manager',  NULL, NULL, NULL, NULL),
        // (4, 'POS User', 'pos_user',  NULL, NULL, NULL, NULL);


        // INSERT INTO `pages` (`id`, `name`, `url`, `description`, `sort_order`, `parent_page_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
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

        $this->call([
            MenuSeeder::class,
        ]);
    }
}
