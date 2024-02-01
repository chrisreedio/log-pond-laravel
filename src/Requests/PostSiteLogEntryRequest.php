<?php

namespace ChrisReedIO\LogPond\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class PostSiteLogEntryRequest extends BasePostRequest
{
    public function __construct(
        protected string $siteId,
        protected int $level,
        protected string $message,
        protected array $context = [],
    )
    {
        // var_dump(openssl_get_cert_locations()); die;
    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/sites/{$this->siteId}/entries";
    }

    public function defaultBody(): array
    {
        return [
            'level' => $this->level,
            'message' => $this->message,
            'context' => $this->context,
        ];
    }

}
