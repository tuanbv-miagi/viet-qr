<?php

namespace miagi\VietQr\Facades;

use Illuminate\Support\Facades\Facade;
use Miagi\VietQr\Services\VietQrService;

/**
 * @see \miagi\VietQr\VietQr
 */
class VietQr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return VietQrService::class;
    }
}
