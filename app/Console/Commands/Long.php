<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Long extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'long {webhookUrl}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $started = now();

        for ($i=0; $i < 100; $i++) {
            $this->info($i);

            Http::post($this->argument('webhookUrl'), [
                'started' => $started,
                'now' => now(),
                'i' => $i
            ]);

            sleep(10);
        }

        return Command::SUCCESS;
    }
}
