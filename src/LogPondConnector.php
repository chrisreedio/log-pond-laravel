<?php

namespace ChrisReedIO\LogPond;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class LogPondConnector extends Connector
{
    public function __construct(protected ?string $secret = null, protected ?string $host = null)
    {
        if ($this->host === null) {
            // TODO: Add a final hard set fallback for the Cloud URL
            $this->host = config('logpond.host') ?? config('logging.channels.logpond.with.host');
        }

        if ($this->secret === null) {
            $this->secret = config('logpond.secret') ?? config('logging.channels.logpond.with.secret');
        }
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator($this->secret);
    }

    /**
     * {@inheritDoc}
     */
    public function resolveBaseUrl(): string
    {
        return $this->host.'/api';
    }

    protected function defaultConfig(): array
    {
        return [
            'verify' => false,
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    //region Resources
    public function sites(?string $siteId = null): Resources\SiteResource
    {
        return new Resources\SiteResource($this);
    }
    //endregion

}
