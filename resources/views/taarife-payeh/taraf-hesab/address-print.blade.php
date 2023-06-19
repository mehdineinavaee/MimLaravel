<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ base_path('public/assets/css/taraf-hesab/pdf.css') }}">
    <style>
        body {
            direction: rtl;
            font-family: 'vazir';
        }
    </style>
</head>

<body>
    <table style="width:100%">
        <tr>
            <td class="padding">فرستنده: </td>
            <td class="padding">{{ $taraf_hesab->city->city_name }}</td>
        </tr>
        <tr>
            <td class="padding">گیرنده: </td>
            <td class="padding">{{ $taraf_hesab->address }}</td>
        </tr>
    </table>
</body>

</html>
