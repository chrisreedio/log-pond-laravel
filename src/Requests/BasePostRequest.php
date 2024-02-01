<?php

namespace ChrisReedIO\LogPond\Requests;

use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\BaseResource;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

abstract class BasePostRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @inheritDoc
     */
    abstract public function defaultBody(): array;
}
