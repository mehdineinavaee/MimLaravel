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
    <table style="width:100%">
        <tr>
            <td class="padding">آدرس</td>
            <td class="padding">{{ $taraf_hesab->address }}</td>
        </tr>
    </table>
</body>

</html>
