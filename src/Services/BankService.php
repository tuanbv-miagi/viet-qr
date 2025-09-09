<?php

namespace Miagi\Payment\Services;

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
    public function allBanks(): array
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
                'short_name' => $bank['shortName'],
                'bin'        => $bank['bin'],
                'logo'       => $bank['logo'],
                'swift_code' => $bank['swiftCode'],
            ])->values()->toArray();
        });
    }

    /**
     * Get bank detail by code
     *
     * @param string $code
     * @return array
     */
    public function findByCode(string $code): ?array
    {
        return collect($this->allBanks())
            ->firstWhere('code', strtoupper($code));
    }

    /**
     * Get bank detail by short name
     *
     * @param string $shortName
     * @return array
     */
    public function findByShortName(string $shortName): ?array
    {
        return collect($this->allBanks())
            ->firstWhere('shortName', $shortName);
    }
}
