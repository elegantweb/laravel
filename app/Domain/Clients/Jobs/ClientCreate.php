<?php

namespace App\Domain\Clients\Jobs;

use App\Domain\Clients\Client;
use App\Domain\Clients\Data\ClientData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClientCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ClientData $data;

    /**
     * Create a new job instance.
     *
     * @param ClientData $data
     * @return void
     */
    public function __construct(ClientData $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return Client
     */
    public function handle()
    {
        $attrs = $this->data->except('password')->toArray();
        $attrs['password'] = bcrypt($this->data->password);

        return Client::create($attrs);
    }
}
