<?php

namespace App\Domain\Clients\Jobs;

use App\Domain\Clients\Models\Client;
use App\Domain\Clients\Data\ClientUpdatePasswordData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClientUpdatePassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Client $client;
    protected ClientUpdatePasswordData $data;

    /**
     * Create a new job instance.
     *
     * @param Client $client
     * @param ClientUpdatePasswordData $data
     * @return void
     */
    public function __construct(Client $client, ClientUpdatePasswordData $data)
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
        $attrs = [];
        $attrs['password'] = bcrypt($this->data->password);

        $this->client->update($attrs);
    }
}
