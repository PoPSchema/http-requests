<?php

declare(strict_types=1);

namespace PoPSchema\HTTPRequests\HelperServices;

use PoP\Root\Services\BasicServiceTrait;

class HTTPRequestHelperService implements HTTPRequestHelperServiceInterface
{
    use BasicServiceTrait;

    /**
     * Both Guzzle and Symfony HTTP Foundation retrieve the
     * header values as `string[]`, but for the HTTP Request,
     * and in class HTTPResponse, the representation can
     * be `string|string[]`.
     *
     * So iterate all the headers and, if any of them has only one
     * item, convert it from array to string.
     *
     * @param array<string,string[]> $headers
     * @return array<string,string|string[]>
     */
    public function convertHeaderArrayValuesToSingleValues(array $headers): array
    {
        foreach ($headers as $name => $headerValues) {
            $headers[$name] = count($headerValues) === 1 ? $headerValues[0] : $headerValues;
        }
        return $headers;
    }
}
