<?php

namespace ChrisReedIO\LogPond;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class LogPondConnector extends Connector
{

    public function __construct(protected readonly string $secret, protected string $host = "")
    {
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator($this->secret);
    }

    /**
     * @inheritDoc
     */
    public function resolveBaseUrl(): string
    {
        return "https://" . $this->host . "/api";
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

}
