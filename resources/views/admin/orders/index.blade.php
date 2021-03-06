@extends ('layouts.admin')
@section ('title', 'Daftar Transaksi (Order List)')

@section ('content')
<div id="admin-orders-main" class="py-3">
    <h5>Daftar Transaksi (Order List)</h5>

    @include ('shared.message')
    <div class="py-2">
        <!--
        <a class="btn btn-success btn-sm @if ($orders->isEmpty()) disabled @endif" href="{{ route('admin_export_excel_orders_get') }}">
            <i class="fas fa-file-excel"></i> Export ke Excel
        </a>
        -->
        <button id="export-pdf-button" type="button" class="btn btn-primary btn-sm @if ($orders->isEmpty()) disabled @endif">
            <i class="fas fas fa-file-pdf"></i> Export ke PDF
        </button>

        {{-- Datepicker --}}
        <form action="{{ route('admin_export_pdf_orders_post') }}" method="post">
            @csrf
            <div class="py-2"></div>
            <div id="datepicker-box" class="p-3 bg-light shadow rounded fw-light d-none">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <label class="col-form-label input-group-text fw-light" for="date-from">Dari Tanggal</label>
                            <input id="date-from" name="from" class="form-control form-control-sm" type="text" required>
                            <span class="input-group-text"><i class="far fa-calendar-alt d-inline"></i></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label class="col-form-label input-group-text fw-light" for="date-from">Sampai Tanggal</label>
                            <input id="date-to" name="to" class="form-control form-control-sm" type="text" required>
                            <span class="input-group-text"><i class="far fa-calendar-alt d-inline"></i></span>
                        </div>
                    </div>
                </div>
                <div class="py-2"></div>
                <input class="btn btn-sm btn-secondary shadow" type="submit" value="Export">
            </div>
            <div class="py-2"></div>
        </form>
        {{-- Datepicker --}}

    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th scope="col">Order ID</th>
                <th scope="col">Customer</th>
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Status Pengiriman</th>
                <th scope="col">Metode Pengiriman</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Dibuat Tanggal</th>
                <th scope="col">#</th>
            </thead>

            @if ($orders->isNotEmpty())
            @foreach ($orders as $o)
            <tr>
                <td class="fw-light"># {{ $o->order_id }}</td>
                <td class="fw-light">{{ $o->client_name }}</td>
                <td>
                    <span class="order-payment-status badge" data-order-payment-status="{{ $o->order_payment_status }}">
                        {{ $o->order_payment_status }}
                    </span>
                </td>
                <td class="fw-light">{{ $o->order_payment_method }}</td>
                <td>
                    <span class="order-delivery-status badge" data-order-delivery-status="{{ $o->order_delivery_status }}">
                        {{ $o->order_delivery_status }}
                    </span>
                </td>
                <td class="fw-light">{{ $o->order_delivery_method }}</td>
                <td class="fw-light">Rp. {{ number_format( $o->order_total_amount, 2, ',', '.' ) }}</td>
                <td class="fw-light">{{ date('d M Y H:i:s', strtotime( $o->order_created_at )) }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('admin_orders_show_get', [ 'id' => $o->order_id ]) }}">Proses</a>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td class="fw-light text-center" colspan="8">Tidak ada order atau transaksi yang tercatat</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection
