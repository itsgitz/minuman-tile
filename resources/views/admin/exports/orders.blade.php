<table>
    <thead>
        <tr>
            <th scope="col"><b>Order ID</b></th>
            <th scope="col"><b>Customer</b></th>
            <th scope="col"><b>Status Pembayaran</b></th>
            <th scope="col"><b>Metode Pembayaran</b></th>
            <th scope="col"><b>Status Pengiriman</b></th>
            <th scope="col"><b>Metode Pengiriman</b></th>
            <th scope="col"><b>Total Harga</b></th>
            <th scope="col"><b>Keterangan Items</b></th>
            <th scope="col"><b>Alamat</b></th>
            <th scope="col"><b>Nomor HP/Telepon</b></th>
            <th scope="col"><b>Dibuat Tanggal</b></th>
        </tr>
    </thead>
    @foreach ($orders as $o)
    <tbody>
        <tr>
            <td>{{ $o->order_id }}</td>
            <td>{{ $o->client_name }}</td>
            <td>{{ $o->order_payment_status }}</td>
            <td>{{ $o->order_payment_method }}</td>
            <td>{{ $o->order_delivery_status }}</td>
            <td>{{ $o->order_delivery_method }}</td>
            <td>Rp. {{ number_format( $o->order_total_amount, 2, ',', '.' ) }}</td>
            <td>
                @php
                    $items = App\Exports\OrdersExport::getCartItems($o->order_id)
                @endphp

                @foreach ($items as $i)
                    {{ $i->menu_name }} {{ $i->cart_quantity }} x {{ $i->cart_subtotal_amount }}@if (!$loop->last),@endif &nbsp;
                @endforeach
            </td>
            <td>{{ $o->address }}</td>
            <td>{{ $o->phone_number }}</td>
            <td>{{ date('d M Y H:i:s', strtotime( $o->order_created_at )) }}</td>
        </tr>
    </tbody>
    @endforeach
</table>
