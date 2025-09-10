@php
    use Carbon\Carbon;
@endphp

<link rel="stylesheet" href="{{ asset('vendor/vietqr/css/customer.css') }}">

@if ($url)
    <div class="container-viet-qr">
        <!-- hearder -->
        <div class="viet-qr-header">
            <div class="text-center">
                <p>MÃ ĐƠN HÀNG</p>
                <p><strong>#{{ $oderId }}</strong></p>
            </div>
            <div class="text-center">
                <p>NGÀY</p>
                <p><strong>{{ Carbon::now()->format('d/m/Y') }}</strong></p>
            </div>
            <div class="text-center">
                <p>TỔNG CỘNG</p>
                <p><strong>{{ number_format($amount, 0, ',', '.') }} VND</strong></p>
            </div>
            <div class="text-center">
                <p>PHƯƠNG THỨC THANH TOÁN</p>
                <p><strong>Chuyển khoản ngân hàng (Quét mã QR)</strong></p>
            </div>
        </div>

        <!-- Qr Code -->
        <div class="text-center">
            <p class="font-24">Mã QR chuyển khoản ngân hàng</p>
        </div>
        <div class="text-center">
            <img
                src="{{ $url }}"
                alt="VietQR"
                style="max-width: 400px;"
            >
        </div>

        <!-- Info bank -->
        <div class="text-center">
            <p class="font-24">Thông tin chuyển khoản ngân hàng</p>
            <p class="title-note">Vui lòng chuyển đúng nội dung {{ $addInfo }} để chúng tôi có thể xác nhận thanh toán</p>
        </div>
        <div class="bank-info">
            <div class="title-header">
                <p><strong>Tên tài khoản</strong></p>
            </div>
            <p>{{ $accountName }}</p>
        </div>
        <div class="bank-info">
            <div class="title-header">
                <p><strong>Số tài khoản</strong></p>
            </div>
            <p>{{ $accountNo }}</p>
        </div>
        <div class="bank-info">
            <div class="title-header">
                <p><strong>Ngân hàng</strong></p>
            </div>
            <p>{{ $bankName }}</p>
        </div>
        <div class="bank-info">
            <div class="title-header">
                <p><strong>Số tiền</strong></p>
            </div>
            <p>{{ number_format($amount, 0, ',', '.') }} VND</p>
        </div>
    </div>
@else
    <div class="text-center">
        <p>Mã QR lỗi!</p>
    </div>
@endif
