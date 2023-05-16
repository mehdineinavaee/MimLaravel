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
        DB::table('taraf_hesabs')->insert([
            [
                'chk_seller' => 'true',
                'chk_buyer' => 'false',
                'chk_broker' => 'false',
                'chk_investor' => 'true',
                'chk_block_list' => 'true',
                'chk_active' => 'false',
                'chk_move_phone' => 'false',
                'code' => '100',
                'fullname' => 'مهدی نینوایی',
                'zip_code' => '8162502311',
                'phone' => '09191785593',
                'city' => 'یزد',
                'broker' => 'علی یزدی',
                'commission' => '100,000 تومان',
                'address' => 'یزد، شهرک دانشگاه، شرکت ایران اپ کو',
                'person_type' => 'حقوقی دولتی وزارت خانه ها و سازمان ها',
                'ceo_fullname' => 'جواد رحمتی',
                'national_code' => '4420095024',
                'birthdate' => '1368/11/01',
                'occupation' => 'برنامه نویس',
                'fax' => '02128524831',
                'tel' => '02128586821',
                'activity_type' => '38001',
                'economic_code' => '8102135281',
                'email' => 'mehdi.neinavaee@gmail.com',
                'website' => 'https://mehdi.neinavaee.com',
                'credit_limit' => '10,000,000 تومان',
                'opt_warning' => 'true',
                'opt_prohibition_sale' => 'false',
                'opt_uncleared' => 'true',
                'opt_customer_balance' => 'false',
                'not_spent' => '7 روز',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'chk_seller' => 'true',
                'chk_buyer' => 'false',
                'chk_broker' => 'false',
                'chk_investor' => 'true',
                'chk_block_list' => 'true',
                'chk_active' => 'true',
                'chk_move_phone' => 'true',
                'code' => '200',
                'fullname' => 'شاهین الماسی',
                'zip_code' => '8162502312',
                'phone' => '09353251912',
                'city' => 'تهران',
                'broker' => 'حسن تهرانی',
                'commission' => '200,000 تومان',
                'address' => 'تهران، سعادت آباد، شرکت ایران اپ کو',
                'person_type' => 'حقوقی غیر دولتی',
                'ceo_fullname' => 'حسن رحمتی',
                'national_code' => '4420095022',
                'birthdate' => '1368/11/02',
                'occupation' => 'مدیر پروژه',
                'fax' => '02128524832',
                'tel' => '02128586822',
                'activity_type' => '38002',
                'economic_code' => '8102135282',
                'email' => 'shahin.almasi@gmail.com',
                'website' => 'https://shahin.almasi.com',
                'credit_limit' => '20,000,000 تومان',
                'opt_warning' => 'false',
                'opt_prohibition_sale' => 'true',
                'opt_uncleared' => 'false',
                'opt_customer_balance' => 'true',
                'not_spent' => '8 روز',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
