<?php

namespace ChrisReedIO\LogPond\Resources;

use ChrisReedIO\LogPond\Requests\PostSiteLogEntryRequest;
use Saloon\Http\BaseResource;
use Saloon\Http\Connector;
use Saloon\Http\Response;

class SiteResource extends BaseResource
{
    public function __construct(protected readonly Connector $connector, protected ?string $siteId = null)
    {
        if ($this->siteId === null) {
            $this->siteId = config('logpond.site') ?? config('logging.channels.logpond.with.site');
        }
    }

    // Temporary function to get logging stood up. Will move into a SiteLogEntry Resource class
    public function log(int $level, string $message, array $context = []): Response
    {
        $request = new PostSiteLogEntryRequest($this->siteId, $level, $message, $context);

        return $this->connector->send($request);
    }
}
