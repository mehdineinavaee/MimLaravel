{{-- {{ $buy_factors->links() }} --}}

<table class="table-responsive table table-hover table-bordered" style="text-align: center;">
    <thead>
        <tr>
            <th>شماره</th>
            <th style="min-width: 80px">اقدامات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buy_factors as $item)
            <tr>
                <td>{{ $item->buy_factor_no }}</td>
                <td>
                    <button type="button" value={{ $item->id }} class="edit_buy_factor btn btn-primary btn-sm">
                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                    </button>
                    <button type="button" value="/buy-factor/{{ $item->id }}" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>شماره</th>
            <th>اقدامات</th>
        </tr>
    </tfoot>
</table>
