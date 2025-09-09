@php
    use Carbon\Carbon;
@endphp

@if ($url)
    <div style="width: 80%; margin: auto; line-height: 0.8; max-width: 770px; background: aliceblue; padding: 15px;">
        <!-- hearder -->
        <div style="display: grid; grid-template-columns: 15% 20% 25% 38%; grid-column-gap: 7px; margin-bottom: 25px; align-items: center;">
            <div style="text-align: center;">
                <p>MÃ ĐƠN HÀNG</p>
                <p><strong>#{{ $oderId }}</strong></p>
            </div>
            <div style="text-align: center;">
                <p>NGÀY</p>
                <p><strong>{{ Carbon::now()->format('d/m/Y') }}</strong></p>
            </div>
            <div style="text-align: center;">
                <p>TỔNG CỘNG</p>
                <p><strong>{{ number_format($amount, 0, ',', '.') }} VND</strong></p>
            </div>
            <div style="text-align: center;">
                <p>PHƯƠNG THỨC THANH TOÁN</p>
                <p><strong>Chuyển khoản ngân hàng (Quét mã QR)</strong></p>
            </div>
        </div>

        <!-- Qr Code -->
        <div style="text-align: center;">
            <p style="font-size: 24px;">Mã QR chuyển khoản ngân hàng</p>
        </div>
        <div style="text-align: center;">
            <img
                src="{{ $url }}"
                alt="VietQR"
                style="max-width: 400px;"
            >
        </div>

        <!-- Info bank -->
        <div style="text-align: center;">
            <p style="font-size: 24px;">Thông tin chuyển khoản ngân hàng</p>
            <p style="color: red;">Vui lòng chuyển đúng nội dung {{ $addInfo }} để chúng tôi có thể xác nhận thanh toán</p>
        </div>
        <div style="display: grid; grid-template-columns: 48% 48%; grid-column-gap: 5px;">
            <div style="text-align: end; margin-right: 15px; font-size: 16px;">
                <p><strong>Tên tài khoản</strong></p>
            </div>
            <p>{{ $accountName }}</p>
        </div>
        <div style="display: grid; grid-template-columns: 48% 48%; grid-column-gap: 5px;">
            <div style="text-align: end; margin-right: 15px; font-size: 16px;">
                <p><strong>Số tài khoản</strong></p>
            </div>
            <p>{{ $accountNo }}</p>
        </div>
        <div style="display: grid; grid-template-columns: 48% 48%; grid-column-gap: 5px;">
            <div style="text-align: end; margin-right: 15px; font-size: 16px;">
                <p><strong>Ngân hàng</strong></p>
            </div>
            <p>{{ $bank['name'] ?? '' }}</p>
        </div>
        <div style="display: grid; grid-template-columns: 48% 48%; grid-column-gap: 5px;">
            <div style="text-align: end; margin-right: 15px; font-size: 16px;">
                <p><strong>Số tiền</strong></p>
            </div>
            <p>{{ number_format($amount, 0, ',', '.') }} VND</p>
        </div>
    </div>
@else
    <div style="text-align: center;">
        <p>Mã QR lỗi!</p>
    </div>
@endif
