<?php

namespace App\Domain\Clients\Jobs;

use App\Domain\Clients\Models\Client;
use App\Domain\Clients\Data\ClientUpdateData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClientUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Client $client;
    protected ClientUpdateData $data;

    /**
     * Create a new job instance.
     *
     * @param Client $client
     * @param ClientUpdateData $data
     * @return void
     */
    public function __construct(Client $client, ClientUpdateData $data)
    {
        $this->client = $client;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $attrs = $this->data->toArray();

        $this->client->update($attrs);
    }
}
