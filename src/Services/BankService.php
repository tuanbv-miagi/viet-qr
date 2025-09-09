<?php

namespace miagi\VietQr\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BankService
{
    public string $endpoint = 'https://api.vietqr.io/v2/banks';

    /**
     * Get all banks from VietQR API
     *
     * @return array
     */
    public function getAllBank(): array
    {
        return Cache::remember('vietqr.banks', 86400, function () {
            $response = Http::get($this->endpoint);

            if (! $response->ok()) {
                return [];
            }

            $payload = $response->json();

            return collect($payload['data'] ?? [])->map(fn ($bank) => [
                'id'         => $bank['id'],
                'code'       => $bank['code'],
                'name'       => $bank['name'],
                'short_name' => $bank['short_name'],
                'bin'        => $bank['bin'],
                'logo'       => $bank['logo'],
                'swift_code' => $bank['swift_code'],
            ])->values()->toArray();
        });
    }

    /**
     * Get bank detail by code or short name
     *
     * @param string $key
     * @return array
     */
    public function findBankByKey(string $key): ?array
    {
        $banks = $this->getAllBank();
        // find by code
        $dataByCode = collect($banks)->firstWhere('code', $key);
        if ($dataByCode) {
            return $dataByCode;
        }

        // find by short_name
        $dataByShort = collect($banks)->firstWhere('short_name', $key);
        if ($dataByShort) {
            return $dataByShort;
        }

        return [];
    }
}
