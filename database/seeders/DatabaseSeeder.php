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
                'address' => 'صفاییه',
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
    }
}
