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
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>مهدی نینوایی</p>

    <table class="table table-bordered">
        <tr>
            <th>کد شهر</th>
            <th>نام شهر</th>
        </tr>
        @foreach ($cities as $city)
            <tr>
                <td>{{ $city->city_code }}</td>
                <td>{{ $city->city_name }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
