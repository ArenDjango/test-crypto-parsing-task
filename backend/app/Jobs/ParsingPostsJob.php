<?php

namespace App\Jobs;

use App\Services\CryptoCurrencyNewsParsing;

class ParsingPostsJob extends Job
{
    protected CryptoCurrencyNewsParsing $cryptoCurrencyNewsParsing;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CryptoCurrencyNewsParsing $cryptoCurrencyNewsParsing)
    {
        $this->cryptoCurrencyNewsParsing = $cryptoCurrencyNewsParsing;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->cryptoCurrencyNewsParsing->parsing();
    }
}
