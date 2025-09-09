<div class="vietqr-container" style="text-align: center;">
    <img src="{{ $qrUrl }}" alt="VietQR" style="max-width: 300px;">
    @if(!empty($accountName))
        <p><strong>{{ $accountName }}</strong></p>
    @endif
    @if(!empty($amount))
        <p>Số tiền: {{ number_format($amount, 0, ',', '.') }} đ</p>
    @endif
    @if(!empty($addInfo))
        <p>Nội dung: {{ $addInfo }}</p>
    @endif
</div>