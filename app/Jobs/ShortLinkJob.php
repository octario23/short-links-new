<?php

namespace App\Jobs;


use App\Models\ShortLink;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ShortLinkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $shortLink;

    /**
     * Create a new job instance.
     *
     * @param ShortLink $shortLink
     */
    public function __construct(ShortLink $shortLink)
    {
        $this->shortLink = $shortLink;
    }

    /**
     * @param \GuzzleHttp\Client $client
     * @return void
     */
    public function handle(Client $client)
    {
        $response = $client->request('GET', $this->shortLink->link);

        $html = $response->getBody()->getContents();
        preg_match("/\<title.*\>(.*)\<\/title\>/isU", $html, $matches);

        $this->shortLink->title = $matches[1];
        $this->shortLink->save();
    }
}