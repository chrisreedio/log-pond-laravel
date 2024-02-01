<?php

namespace ChrisReedIO\LogPond\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class PostSiteLogEntryRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(protected string $siteId, protected array $postData)
    {
        // var_dump(openssl_get_cert_locations()); die;
    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/sites/{$this->siteId}/log";
    }
}
