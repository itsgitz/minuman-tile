@extends ('layouts.exports_pdf')
@section ('title', 'Daftar Transaksi (Order List)')

@section ('content')
<div id="admin-orders-main" class="py-3">
    <table>
        <tr>
            <td>Periode Transaksi</td>
            <td>:</td>
            <td>{{ $from }} sampai {{ $to }}</td>
        </tr>
        <tr>
            <td>Tanggal Cetak</td>
            <td>:</td>
            <td>{{ date('d-m-Y') }}</td>
        </tr>
    </table>
    <div class="break"></div>
    <div id="content">
        <table class="table table-hover">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer</th>
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Status Pengiriman</th>
                <th scope="col">Metode Pengiriman</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Dibuat Tanggal</th>
                <th scope="col">Keterangan</th>
            </tr>

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
                <td>{{ $o->order_payment_method }}</td>
                <td>
                    <span class="order-delivery-status badge" data-order-delivery-status="{{ $o->order_delivery_status }}">
                        {{ $o->order_delivery_status }}
                    </span>
                </td>
                <td>{{ $o->order_delivery_method }}</td>
                <td class="fw-light">Rp. {{ number_format( $o->order_total_amount, 2, ',', '.' ) }}</td>
                <td>{{ date('d M Y H:i:s', strtotime( $o->order_created_at )) }}</td>
                <td>
                    @php
                        $items = App\Exports\OrdersExport::getCartItems($o->order_id)
                    @endphp
                    @foreach ($items as $i)
                        {{ $i->menu_name }} {{ $i->cart_quantity }} x Rp. {{ $i->cart_subtotal_amount }}@if (!$loop->last),@endif &nbsp;
                    @endforeach
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td class="fw-light text-center" colspan="8">Tidak ada order atau transaksi yang tercatat</td>
                </tr>
            @endif
        </table>
        <div class="break"></div>
        <div class="break"></div>
        <div class="break"></div>
        <div class="break"></div>

        <div id="signature" class="float-end">
            <div>Bandung, {{ date('d-m-Y') }}</div>
            <div class="break"></div>
            <div>Administrasi</div>
            <div class="break"></div>
            <div class="break"></div>
            <div class="break"></div>
            <div class="break"></div>
            <div class="break"></div>
            <div class="break"></div>
            <div class="name-line"></div>
        </div>
    </div>
</div>
@endsection
