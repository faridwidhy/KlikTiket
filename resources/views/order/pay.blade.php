@extends('layouts.main')
@section('container')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<div class="p-4" style="min-height: 100vh">
    <div class="order row py-3 px-1 rounded bg-dark text-light">
        <div class="col-lg-8 mb-4">
            <div class="row">
                <div class="col-3">
                    <div class="img-movie">
                        <img src="{{ $movie['bannerUrl'] }}" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col">
                    <div class="title-movie">
                        <h4>{{ $movie['title'] }}</h4>
                        <p class="order_id text-muted">#{{ $order->order_id }}</p>
                        <hr class="my-1 border-secondary">
                        <p>{{ substr_replace($movie['description'], '...', 150) }}</p>
                    </div>
                    <div class="grid" style="font-size: 0.9rem">
                        <div class="location">
                            <span><i class="bi bi-geo-alt"></i></span>
                            <span class="mx-1">{{ $order->city }}, {{ $order->theater }}</span>
                        </div>
                        <div class="total-tiket">
                            <span><i class="bi bi-ticket-detailed"></i></span>
                            <span class="mx-1">{{ $order->jml_tiket }} Tiket, [ @foreach ($seat as $seats) {{ $seats->no_seat }} @endforeach ]</span>
                        </div>
                        <div class="date">
                            <span><i class="bi bi-calendar-check"></i></span>
                            <span class="mx-1">{{ $order->date }}</span>
                        </div>
                        <div class="time">
                            <span><i class="bi bi-alarm"></i></span>
                            <span class="mx-1">{{ $order->time }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="total bg-secondary p-3 rounded">
                <h4 class="text-light">Tiket</h4>
                <div class="row">
                    <div class="col-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tiket-movie" value="" id="tiket-movie" checked>
                            <label class="form-check-label" for="tiket-movie">
                                <span class="label-tiket">{{ $order->movie }}</span> | <span class="jml-tiket">{{ $order->jml_tiket }}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col price-t">
                        <p>{{ number_format($order->total_price, 0, '.', '.') }}</p>
                    </div>
                </div>
                <hr class="my-1 border-secondary">
                <div class="row mt-2">
                    <div class="col-9">
                        <p>Total</p>
                    </div>
                    <div class="col">
                        <p class="price-total">{{ number_format($order->total_price, 0, '.', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 d-grid my-3">
                <button id="btn-bayar" type="button" class="btn btn-danger w-100 rounded">Bayar
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                    <input type="hidden" name="gross_amount" value="{{ $order->total_price }}">
                    <input type="hidden" name="snap_token" value="{{ $order->snap_token }}">
                </button>
            </div>
            <div class="my-5"></div>
            <div class="col-12 text-center">
                <p>Transaksi makin mudah dengan metode pembayaran terlengkap!</p> 
                <div class="summary-cart metode mt-3">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/bca.svg" alt="bca" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/mandiri.svg" alt="mandiri" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/bri.svg" alt="bri" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/bni.svg" alt="bni" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/qris.svg" alt="qris" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/gopay.svg" alt="gopay" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/ovo.svg" alt="ovo" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/linkaja.svg" alt="linkaja" class="m-2" width="36" height="16">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/dana.svg" alt="dana" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/shopeepay.svg" alt="shopeepay" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/indomaret.svg" alt="indomaret" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/alfamart.svg" alt="alfamart" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/visa.svg" alt="visa" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/master-card.svg" alt="master-card" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/jcb.svg" alt="jcb" class="m-2" width="36" height="16">
                        <img src="https://niagaspace.sgp1.digitaloceanspaces.com/www/assets/images/2022/orderflow/icons/paypal.svg" alt="paypal" class="m-2" width="36" height="16">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.btn-bayar').click(function() {
        var snap_token = $(this).find("input[name='snap_token']").val();
        var orderid = $(this).find("input[name='order_id']").val();
        var grossamount = $(this).find("input[name='gross_amount']").val();
        window.snap.pay(snap_token, {
            onSuccess: function(result) {
                console.log(result);
                $.ajax({
                    type: "POST",
                    url: "{{ route('order.success.payment') }}",
                    data: { data: result, _token: '{{csrf_token()}}' },
                    success: function(data) {
                        console.log(data);
                        window.location.replace(document.location.origin + '/dashboard/member/tiket');
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);
                    },
                });
            },
            onPending: function(result) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('order.pending.payment') }}",
                    data: { data: result, order_id: orderid, gross_amount: grossamount, _token: '{{csrf_token()}}' },
                    success: function(data) {
                        console.log(data);
                        window.location.replace(document.location.origin + '/dashboard/member/orders');
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data);
                    },
                });
            },
            onError: function(result) {
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
            }
        });
    });
</script>
@endsection