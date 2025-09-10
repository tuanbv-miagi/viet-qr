<?php

namespace miagi\VietQr;

use Illuminate\View\View;
use miagi\VietQr\Services\BankService;

class VietQr
{
    /**
     * Render URL payment following VietQR Quicklink format
     *
     * @param  mixed  $template
     * @param  mixed  $amount
     */
    public function getUrlPayment(string $bankId, string $accountNo, ?string $template = null, ?int $amount = null, string $addInfo = '', string $accountName = ''): string
    {
        $base = rtrim(config('vietqr.quicklink_base'), '/');
        $tpl = $template ?: config('vietqr.default_template', 'compact');

        $url = "{$base}/{$bankId}-{$accountNo}-{$tpl}.jpg";

        $params = [];
        if ($amount !== null) {
            $params['amount'] = $amount;
        }
        if ($addInfo !== '') {
            $params['addInfo'] = $addInfo;
        }
        if ($accountName !== '') {
            $params['accountName'] = $accountName;
        }

        if (! empty($params)) {
            $url .= '?'.http_build_query($params);
        }

        return $url;
    }

    /**
     * Render QR code view
     *
     * @param  mixed  $template
     * @param  mixed  $amount
     */
    public function renderQrCode(string $bankId, string $accountNo, ?string $template, ?int $amount, string $addInfo, string $accountName, string $oderId): View
    {
        $url = $this->getUrlPayment($bankId, $accountNo, $template, $amount, $addInfo, $accountName);
        $bankName = (new BankService)->findBankByKey($bankId)['name'] ?? '';

        return view('vietqr::viet-qr', compact('url', 'accountName', 'amount', 'addInfo', 'accountNo', 'bankName', 'oderId'));
    }

    /**
     * Get bank name by bank id
     */
    public function getBankName(string $bankId): string
    {
        return (new BankService)->findBankByKey($bankId)['name'] ?? '';
    }
}
