<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            direction: rtl;
            font-family: 'vazir';
        }
    </style>
    <link rel="stylesheet" href="{{ base_path('public/assets/css/taraf-hesab/pdf.css') }}">
</head>

<body>
    <h3>فهرست طرف های حساب</h3>

    <table style="width:100%">
        @foreach ($taraf_hesabs as $item)
            <tr class="background-color">
                <td class="bold padding" style="width:30%;">ردیف</td>
                <td class="bold padding" style="width:70%;">{{ $loop->iteration }}</td>
            </tr>
            <tr>
                <td class="padding">فروشنده</td>
                <td class="padding">{{ $item->chk_seller }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">خریدار</td>
                <td class="padding">{{ $item->chk_buyer }}</td>
            </tr>
            <tr>
                <td class="padding">واسطه فروش</td>
                <td class="padding">{{ $item->chk_broker }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">سرمایه گذار</td>
                <td class="padding">{{ $item->chk_investor }}</td>
            </tr>
            <tr>
                <td class="padding">بد حساب</td>
                <td class="padding">{{ $item->chk_block_list }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">فعال</td>
                <td class="padding">{{ $item->chk_active }}</td>
            </tr>
            <tr>
                <td class="padding">انتقال به دفترچه تلفن</td>
                <td class="padding">{{ $item->chk_move_phone }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">کد</td>
                <td class="padding">{{ $item->code }}</td>
            </tr>
            <tr>
                <td class="padding">نام و نام خانوادگی</td>
                <td class="padding">{{ $item->fullname }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">کد پستی</td>
                <td class="padding">{{ $item->zip_code }}</td>
            </tr>
            <tr>
                <td class="padding">موبایل</td>
                <td class="padding">{{ $item->phone }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">شهر</td>
                <td class="padding">{{ $item->city->city_name }}</td>
            </tr>
            <tr>
                <td class="padding">واسطه فروش</td>
                <td class="padding">{{ $item->broker }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">پور سانت</td>
                <td class="padding">{{ $item->commission }}</td>
            </tr>
            <tr>
                <td class="padding">آدرس</td>
                <td class="padding">{{ $item->address }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">نوع شخص</td>
                @switch ($item->person_type)
                    @case('1')
                        <td class="padding">حقیقی</td>
                    @break

                    @case('2')
                        <td class="padding">حقوقی غیر دولتی</td>
                    @break

                    @case('3')
                        <td class="padding">حقوقی دولتی وزارت خانه ها و سازمان ها</td>
                    @break

                    @default
                        <td class="padding">-</td>
                @endswitch
            </tr>
            <tr>
                <td class="padding">مدیر عامل</td>
                <td class="padding">{{ $item->ceo_fullname }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">کد ملی</td>
                <td class="padding">{{ $item->national_code }}</td>
            </tr>
            <tr>
                <td class="padding">تاریخ تولد</td>
                <td class="padding">{{ $item->birthdate }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">شغل</td>
                <td class="padding">{{ $item->occupation }}</td>
            </tr>
            <tr>
                <td class="padding">فاکس</td>
                <td class="padding ltr">{{ $item->fax }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">تلفن</td>
                <td class="padding ltr">{{ $item->tel }}</td>
            </tr>
            <tr>
                <td class="padding">نوع فعالیت</td>
                <td class="padding">{{ $item->activity_type }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">کد اقتصادی</td>
                <td class="padding">{{ $item->economic_code }}</td>
            </tr>
            <tr>
                <td class="padding">ایمیل</td>
                <td class="padding">{{ $item->email }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">وب سایت</td>
                <td class="padding">{{ $item->website }}</td>
            </tr>
            <tr>
                <td class="padding">سقف اعتبار</td>
                <td class="padding">{{ number_format($item->credit_limit) }} ریال</td>
            </tr>
            <tr class="background-color">
                <td class="padding">فقط هشداری</td>
                <td class="padding">{{ $item->opt_warning }}</td>
            </tr>
            <tr>
                <td class="padding">منع فروش</td>
                <td class="padding">{{ $item->opt_prohibition_sale }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">چک های پاس نشده</td>
                <td class="padding">{{ $item->opt_uncleared }}</td>
            </tr>
            <tr>
                <td class="padding">مانده مشتری</td>
                <td class="padding">{{ $item->opt_customer_balance }}</td>
            </tr>
            <tr class="background-color">
                <td class="padding">چک های خرج نشده</td>
                <td class="padding">{{ $item->not_spent }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
