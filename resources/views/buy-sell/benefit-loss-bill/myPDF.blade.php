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
    <h3 style="text-align: center">صورت حساب سود و زیان</h3>

    <table style="width:100%; text-align: center;">
        <thead>
        </thead>
        <tbody>
            <tr>
                <th></th>
                <th style="text-align: right">موجودی ریالی اول دوره کالا</th>
                <th>
                    <input type="text" id="inventory_first_period" name="inventory_first_period" class="form-control"
                        autocomplete="off" style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th>اطلاق می شود</th>
                <th style="text-align: right">کل خرید با کسر برداشت از خرید و تخفیفات</th>
                <th>
                    <input type="text" id="buy_total" name="buy_total" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th>کسر می شود</th>
                <th style="text-align: right">موجودی ریالی انبارها منتهی به تاریخ 1402/04/05</th>
                <th>
                    <input type="text" id="inventory_warehouse" name="inventory_warehouse" class="form-control"
                        autocomplete="off" style="text-align: center" disabled />
                </th>
            </tr>

            <tr style="background-color: azure; color: blue;">
                <th>برقرار است</th>
                <th style="text-align: right">قیمت تمام شده کالای فروخته شده</th>
                <th>
                    <input type="text" id="sold_price1" name="sold_price1" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th></th>
                <th style="text-align: right">کل فروش با کسر برداشت از فروش و تخفیفات</th>
                <th>
                    <input type="text" id="sell_total" name="sell_total" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th>کسر می شود</th>
                <th style="text-align: right">قیمت تمام شده کالای فروخته شده</th>
                <th>
                    <input type="text" id="sold_price2" name="sold_price2" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>

            <tr style="background-color: azure; color: blue;">
                <th>برقرار است</th>
                <th style="text-align: right">سود ناویژه (سود حاصل از خرید و فروش)</th>
                <th>
                    <input type="text" id="special_interest1" name="special_interest1" class="form-control"
                        autocomplete="off" style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th></th>
                <th style="text-align: right">سود ناویژه (سود حاصل از خرید و فروش)</th>
                <th>
                    <input type="text" id="special_interest2" name="special_interest2" class="form-control"
                        autocomplete="off" style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th>اطلاق می شود</th>
                <th style="text-align: right">درآمدها</th>
                <th>
                    <input type="text" id="incomes" name="incomes" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>
            <tr>
                <th>کسر می شود</th>
                <th style="text-align: right">هزینه ها</th>
                <th>
                    <input type="text" id="costs" name="costs" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>

            <tr style="background-color: azure; color: red;">
                <th>برقرار است</th>
                <th style="text-align: right">سود ویژه (نهایی)</th>
                <th>
                    <input type="text" id="profit" name="profit" class="form-control" autocomplete="off"
                        style="text-align: center" disabled />
                </th>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>

</html>
