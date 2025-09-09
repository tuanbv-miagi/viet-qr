<?php

namespace miagi\VietQr\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \miagi\VietQr\VietQr
 */
class VietQr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \miagi\VietQr\VietQr::class;
    }
}
