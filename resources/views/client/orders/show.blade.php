@extends ('layouts.client')
@section ('title', 'Detail Transaksi untuk #' . $order->id)

@section ('content')
<div id="client-show-order" class="py-3">
    <div>
        <div class="card-body shadow">
            <h6 class="card-title display-6">
                <i class="fa fa-shopping-bag text-success"></i>
                &middot;
                {{ date('j M Y', strtotime( $order->created_at )) }}
                &middot;
                Order ID
                <a class="text-success" href="{{ route('client_order_show', ['id' => $order->id]) }}">#{{ $order->id }}</a>
                &middot;
            </h6>
            <div class="py-1"></div>
            @foreach ($carts as $c)
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="card-text py-2">
                        <h5 class="card-title">{{ $c->menu_name }}</h5>
                        <div class="card-text">
                            <div class="fw-light">{{ $c->cart_quantity }} minuman x Rp. {{ number_format( $c->menu_price, 2, ',', '.' ) }}</div>
                        </div>
                        <div class="card-text">
                            <div class="fw-light">Subtotal Harga <strong>Rp. {{ number_format( $c->cart_subtotal_amount, 2, ',', '.' ) }}</strong></div>
                        </div>
                    </div>
                </li>
                <div class="py-1"></div>
            </ul>
            @endforeach
            <div class="card">
                <div class="card-body">
                    <div class="card-text py-2">
                        <h5 class="card-title">Kontak Kurir</h5>
                        <div class="fw-light">Kurir Pengirim - 0838-2166-2133</div>
                    </div>
                </div>
            </div>
            <div class="py-1"></div>
            <div class="card">
                <div class="card-body">
                    <div class="card-text py-2">
                        <h5 class="card-title">Metode Pengiriman</h5>
                        <div class="fw-light">{{ $order->delivery_method }}</div>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Status Pengiriman</h5>
                        <div id="order-delivery-status" data-delivery-status="{{ $order->delivery_status }}" class="badge">
                            {{ $order->delivery_status }}
                        </div>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Metode Pembayaran</h5>
                        <div class="fw-light">{{ $order->payment_method }}</div>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Status Pembayaran</h5>
                        <div id="order-payment-status" data-payment-status="{{ $order->payment_status }}" class="badge">
                            {{ $order->payment_status }}
                        </div>
                    </div>
                    @if ($order->address)
                    <div class="card-text py-2">
                        <h5 class="card-title">Alamat Penerima</h5>
                        <div class="fw-light">{{ $order->address }}</div>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Wilayah (Kecamatan / Kelurahan)</h5>
                        <div class="fw-light">{{ $order->region ?? '-' }}</div>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Nomor HP/Telepon</h5>
                        <div class="fw-light">{{ $order->phone_number ?? '-' }}</div>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Ongkos Kirim</h5>
                        {{-- <div class="fw-light">Rp. {{ number_format( $order->fee ?? 11000, 2, ',', '.' ) }}</div> --}}
                        <div class="fw-light">Rp. {{ number_format( 0, 2, ',', '.' ) }}</div>
                    </div>
                    @endif

                    <div class="card-text py-2">
                        <h5 class="card-title">Dipesan tanggal</h5>
                        <div class="fw-light">{{ $order->created_at }}</div>
                    </div>

                    <div class="card-text py-2">
                        <h5 class="card-title">Estimasi Pesanan Selesai</h5>
                        {{-- <div class="fw-light">{{ isset($order->estimation_finish_at) ? date('H:i:s', strtotime($order->estimation_finish_at)) : '-' }}</div> --}}
                        <div class="fw-light">{{ $order->estimation_finish_at }}</div>
                    </div>

                    <div class="card-text py-2">
                        <h5 class="card-title">Total Harga</h5>
                        <span class="fw-light">Rp. {{ number_format( $totalPrice, 2, ',', '.' ) }}</span>
                    </div>
                    <div class="card-text py-2">
                        <h5 class="card-title">Total Bayar</h5>
                        <strong>Rp. {{ number_format( $order->total_amount, 2, ',', '.' ) }}</strong>
                        <div class="py-2"></div>
                        <div class="fw-light"><i>*Note: Mohon untuk membayar sesuai dengan nominal yang tertera pada <b>Total Bayar</b> sebagai validasi proses pembayaran</i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <a class="btn btn-primary btn-sm" href="{{ route('client_orders_get') }}">Kembali</a>
    </div>
</div>
@endsection
