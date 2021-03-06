@extends ('layouts.client')
@section ('title', 'Daftar Transaksi')

@section ('content')
<div id="client-orders-main" class="py-3">
    @if (!empty($orders))
        @foreach ($orders as $o)
        <div class="py-1"></div>
        <div class="rounded shadow">
            <div class="card-body">
                <div class="d-inline card-text px-3">
                    <i class="fa fa-shopping-bag text-success"></i>
                </div>
                <div class="d-inline card-text fw-bold">
                    {{ date('j M Y', strtotime( $o['created_at'] )) }}
                </div>
                <div class="d-inline px-1"></div>
                <div data-payment-status="{{ $o['payment_status'] }}" class="order-payment-status d-inline card-text badge">
                    {{ $o['payment_status'] }}
                </div>
                <div class="d-inline px-1"></div>
                <div data-delivery-status="{{ $o['delivery_status'] }}" class="order-delivery-status card-text d-inline badge">
                    {{ $o['delivery_status'] }}
                </div>
                <div class="d-inline px-1"></div>
                <div class="d-inline card-text fw-bold">
                    Order ID: #{{ $o['id'] }}
                </div>

                {{-- Ordered Carts --}}
                <div class="py-1"></div>
                <div class="card-text">
                    <ul class="list-group list-group-flush">
                    @foreach ($o['carts'] as $cart)
                        <li class="list-group-item">
                            <h5 class="card-title">{{ $cart['menu_name'] }}</h5>
                            <div class="card-text fw-light">
                               {{ $cart['quantity'] }} minuman x Rp. {{ number_format( $cart['menu_price'], 2, ',', '.' ) }}
                            </div>
                            <div class="card-text fw-light">
                                Subtotal Harga Rp. {{ number_format( $cart['subtotal_amount'], 2, ',', '.') }}
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="py-1"></div>
                {{-- Ordered Carts --}}

                {{-- Delivery Method --}}
                <div class="card-text border-top p-3">
                    <h5 class="card-title">Metode Pengiriman</h5>
                    <div class="card-text fw-light">{{ $o['delivery_method'] }}</div>
                </div>
                {{-- Delivery Method --}}

                {{-- Total Amount --}}
                <div class="card-text border-top p-3">
                    <h5 class="card-title">Total Bayar</h5>
                    <div class="card-text fw-light">Rp. {{ number_format( $o['total_amount'], 2, ',', '.' ) }}</div>
                </div>
                {{-- Total Amount --}}

                {{-- Show Details --}}
                <div class="card-text px-2">
                    <a class="btn btn-sm text-success fw-light" href="{{ route('client_order_show', ['id' => $o['id']]) }}">Lihat Detail Transaksi</a>
                </div>
                {{-- Show Details --}}
            </div>
        </div>
        <div class="py-1"></div>
        @endforeach

        <div class="py-4">
            <a class="btn btn-primary btn-sm" href="{{ route('client_home') }}">Lanjut Belanja</a>
            <a class="btn btn-primary btn-sm" href="{{ route('client_cart_get') }}">Lihat Keranjang</a>
        </div>
    @else
        <div class="order-empty py-5">
            <div class="d-flex justify-content-center py-1">
                <h2 class="display-5">Anda belum memiliki transaksi apapun</h2>
            </div>
            <div class="d-flex justify-content-center py-1">
                <div class="d-inline p-1">
                    <a class="btn btn-primary" href="{{ route('client_home') }}">Mulai Memesan</a>
                </div>
                <div class="d-inline p-1">
                    <a class="btn btn-primary" href="{{ route('client_cart_get') }}">Lihat Keranjang</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
