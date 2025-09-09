<?php

namespace miagi\VietQr\Commands;

use Illuminate\Console\Command;

class VietQrCommand extends Command
{
    public $signature = 'vietqr';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
