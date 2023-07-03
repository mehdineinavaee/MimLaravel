<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_no_units')->insert([
            [
                'code' => '1',
                'title' => 'عدد',
                'chk_active' => 'فعال',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => '2',
                'title' => 'متر',
                'chk_active' => 'غیرفعال',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => '3',
                'title' => 'کارتن',
                'chk_active' => 'فعال',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('bank_types')->insert([
            [
                'chk_active' => 'فعال',
                'bank_code' => '1',
                'bank_name' => 'صادرات',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_active' => 'غیرفعال',
                'bank_code' => '2',
                'bank_name' => 'قوامین',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_active' => 'فعال',
                'bank_code' => '3',
                'bank_name' => 'ملی',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('cities')->insert([
            [
                'city_code' => '1',
                'city_name' => 'اصفهان',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'city_code' => '2',
                'city_name' => 'تهران',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'city_code' => '3',
                'city_name' => 'یزد',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('account_groups')->insert([
            [
                'code' => '1',
                'name' => 'گروه سیدر 1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => '2',
                'name' => 'گروه سیدر 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => '3',
                'name' => 'گروه سیدر 3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('taraf_hesabs')->insert([
            [
                'chk_seller' => 'فعال',
                'chk_buyer' => 'فعال',
                'chk_broker' => 'فعال',
                'chk_investor' => 'غیرفعال',
                'chk_block_list' => 'غیرفعال',
                'chk_active' => 'فعال',
                'chk_move_phone' => 'غیرفعال',
                'code' => '100',
                'fullname' => 'مهدی نینوایی',
                'zip_code' => '1546585023',
                'phone' => '0919-178-5593',
                'city_id' => '1',
                'broker' => Null,
                'commission' => '10',
                'address' => 'شاهین شهر',
                'person_type' => '2',
                'ceo_fullname' => 'شاهین الماسی',
                'national_code' => '4420095024',
                'birthdate' => '1368/11/01',
                'occupation' => 'برنامه نویس',
                'fax' => '(035)38215458',
                'tel' => '(035)38216450',
                'activity_type' => 'آزاد',
                'economic_code' => '2485',
                'email' => 'mehdi@gmail.com',
                'website' => 'http://www.mehdi.com',
                'credit_limit' => '1500000',
                'opt_warning' => 'فعال',
                'opt_prohibition_sale' => 'غیرفعال',
                'opt_uncleared' => 'غیرفعال',
                'opt_customer_balance' => 'فعال',
                'not_spent' => '10',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_seller' => 'فعال',
                'chk_buyer' => 'فعال',
                'chk_broker' => 'فعال',
                'chk_investor' => 'فعال',
                'chk_block_list' => 'غیرفعال',
                'chk_active' => 'فعال',
                'chk_move_phone' => 'غیرفعال',
                'code' => '101',
                'fullname' => 'شاهین الماسی',
                'zip_code' => '6485912307',
                'phone' => '0935-871-1820',
                'city_id' => '2',
                'broker' => '1',
                'commission' => '8',
                'address' => 'صادقیه',
                'person_type' => '1',
                'ceo_fullname' => 'علی ملک ثابت',
                'national_code' => '4435584058',
                'birthdate' => '1365/10/21',
                'occupation' => 'مدیر پروژه',
                'fax' => '(021)36515458',
                'tel' => '(021)36416450',
                'activity_type' => 'رسمی',
                'economic_code' => '6421',
                'email' => 'shahin@gmail.com',
                'website' => 'http://www.shahin.com',
                'credit_limit' => '68947000',
                'opt_warning' => 'غیرفعال',
                'opt_prohibition_sale' => 'فعال',
                'opt_uncleared' => 'فعال',
                'opt_customer_balance' => 'غیرفعال',
                'not_spent' => '15',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('bank_accounts')->insert([
            [
                'chk_active' => 'فعال',
                'account_type' => 'جاری',
                'account_number' => '015-8988-9405-60',
                'shaba_number' => 'IR51-5610-4980-0000-5600-0565-09',
                'cart_number' => '6037-9917-6540-1891',
                'bank_type_id' => '1',
                'branch_name' => 'آزادی',
                'branch_address' => 'میدان آزادی',
                'cheque_print_type' => 'افقی',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_active' => 'فعال',
                'account_type' => 'قرض الحسنه',
                'account_number' => '015-1065-4910-89',
                'shaba_number' => 'IR45-4689-8000-0004-5640-6548-04',
                'cart_number' => '6037-9917-8045-1228',
                'bank_type_id' => '2',
                'branch_name' => 'جمهوری',
                'branch_address' => 'میدان جمهوری',
                'cheque_print_type' => 'عمودی',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('funds')->insert([
            [
                'chk_active' => 'غیرفعال',
                'chk_system' => 'غیرفعال',
                'form_type' => '1',
                'daramad_code' => '100',
                'daramad_name' => 'درآمد شماره یک',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_active' => 'غیرفعال',
                'chk_system' => 'فعال',
                'form_type' => '2',
                'daramad_code' => '101',
                'daramad_name' => 'هزینه شماره یک',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_active' => 'فعال',
                'chk_system' => 'فعال',
                'form_type' => '3',
                'daramad_code' => '102',
                'daramad_name' => 'صندوق شماره یک',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'chk_active' => 'فعال',
                'chk_system' => 'غیرفعال',
                'form_type' => '2',
                'daramad_code' => '104',
                'daramad_name' => 'هزینه شماره دو',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('roles')->insert([
            [
                'role_name' => 'کاربر معمولی',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_name' => 'مدیر',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_name' => 'مدیر کل',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('users')->insert([
            [
                'chk_active' => 'فعال',
                'chk_messenger' => 'فعال',
                'opt_sex' => 'مرد',
                'first_name' => 'مهدی',
                'last_name' => 'نینوایی',
                'email' => 'mehdi.neinavaee@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'father' => 'منصور',
                'birthdate' => '1368/01/11',
                'national_code' => '4420095024',
                'occupation' => 'برنامه نویس',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('warehouses')->insert([
            [
                'code' => '1',
                'title' => 'انبار مرکزی',
                'chk_active' => 'فعال',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => '2',
                'title' => 'انبار آزادی',
                'chk_active' => 'فعال',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('products')->insert([
            [
                'code' => 'SIM1',
                'main_group' => '1',
                'sub_group' => '1',
                'product_unit_id' => 1,
                'warehouse_id' => 1,
                'product_name' => 'سرسیم',
                'sell_price' => '200000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/18',
                'latest_buy_price' => '220000',
                'main_barcode' => 'DRFGS',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'DAS2',
                'main_group' => '2',
                'sub_group' => '2',
                'product_unit_id' => 1,
                'warehouse_id' => 2,
                'product_name' => 'دستکش ضد برش',
                'sell_price' => '220000',
                'value_added_group' => '2',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/19',
                'latest_buy_price' => '250000',
                'main_barcode' => 'FAJLK',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'ROK3',
                'main_group' => '3',
                'sub_group' => '3',
                'product_unit_id' => 1,
                'warehouse_id' => 2,
                'product_name' => 'روکش حرارتی',
                'sell_price' => '280000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/20',
                'latest_buy_price' => '300000',
                'main_barcode' => 'LKFSI',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'SIMCH4',
                'main_group' => '4',
                'sub_group' => '4',
                'product_unit_id' => 1,
                'warehouse_id' => 1,
                'product_name' => 'سیم چین',
                'sell_price' => '350000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/21',
                'latest_buy_price' => '370000',
                'main_barcode' => 'LFFDO',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'ANB5',
                'main_group' => '5',
                'sub_group' => '5',
                'product_unit_id' => 1,
                'warehouse_id' => 2,
                'product_name' => 'انبردست',
                'sell_price' => '400000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/22',
                'latest_buy_price' => '430000',
                'main_barcode' => 'KSFAS',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'DAM6',
                'main_group' => '6',
                'sub_group' => '6',
                'product_unit_id' => 1,
                'warehouse_id' => 1,
                'product_name' => 'دم باریک',
                'sell_price' => '380000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/23',
                'latest_buy_price' => '420000',
                'main_barcode' => 'DAMSK',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'ANBGH7',
                'main_group' => '7',
                'sub_group' => '7',
                'product_unit_id' => 1,
                'warehouse_id' => 1,
                'product_name' => 'انبر قفلی',
                'sell_price' => '380000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/24',
                'latest_buy_price' => '420000',
                'main_barcode' => 'ANBRK',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'CHE8',
                'main_group' => '8',
                'sub_group' => '8',
                'product_unit_id' => 1,
                'warehouse_id' => 2,
                'product_name' => 'چراغ قوه',
                'sell_price' => '450000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/24',
                'latest_buy_price' => '500000',
                'main_barcode' => 'CHESK',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'DRA9',
                'main_group' => '9',
                'sub_group' => '9',
                'product_unit_id' => 1,
                'warehouse_id' => 2,
                'product_name' => 'دریل برقی',
                'sell_price' => '600000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/25',
                'latest_buy_price' => '700000',
                'main_barcode' => 'DRLSK',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'LAM10',
                'main_group' => '10',
                'sub_group' => '10',
                'product_unit_id' => 1,
                'warehouse_id' => 1,
                'product_name' => 'لامپ صد وات',
                'sell_price' => '480000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/26',
                'latest_buy_price' => '520000',
                'main_barcode' => 'LAMRJ',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'code' => 'SAR11',
                'main_group' => '11',
                'sub_group' => '11',
                'product_unit_id' => 1,
                'warehouse_id' => 2,
                'product_name' => 'سرفیش تلویزیون',
                'sell_price' => '80000',
                'value_added_group' => '1',
                'chk_active' => 'فعال',
                'introduce_date' => '1401/05/27',
                'latest_buy_price' => '120000',
                'main_barcode' => 'FISLS',
                'order_point' => 'کالا',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('inventory_products_periods')->insert([
            [
                'warehouse_id' => 1,
                'product_id' => 1,
                'amount' => '5',
                'buy_price' => '10000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 2,
                'amount' => '6',
                'buy_price' => '11000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 3,
                'amount' => '7',
                'buy_price' => '12000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 4,
                'amount' => '8',
                'buy_price' => '13000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 5,
                'amount' => '9',
                'buy_price' => '14000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 6,
                'amount' => '10',
                'buy_price' => '15000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 7,
                'amount' => '11',
                'buy_price' => '16000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 8,
                'amount' => '12',
                'buy_price' => '17000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 9,
                'amount' => '13',
                'buy_price' => '18000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 10,
                'amount' => '14',
                'buy_price' => '19000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 1,
                'product_id' => 11,
                'amount' => '15',
                'buy_price' => '20000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 1,
                'amount' => '15',
                'buy_price' => '10000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 2,
                'amount' => '14',
                'buy_price' => '11000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 3,
                'amount' => '13',
                'buy_price' => '12000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 4,
                'amount' => '12',
                'buy_price' => '13000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 5,
                'amount' => '11',
                'buy_price' => '14000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 6,
                'amount' => '10',
                'buy_price' => '15000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 7,
                'amount' => '9',
                'buy_price' => '16000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 8,
                'amount' => '8',
                'buy_price' => '17000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 9,
                'amount' => '7',
                'buy_price' => '18000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 10,
                'amount' => '6',
                'buy_price' => '19000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'warehouse_id' => 2,
                'product_id' => 11,
                'amount' => '5',
                'buy_price' => '20000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
