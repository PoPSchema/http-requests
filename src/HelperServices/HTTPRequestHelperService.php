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
     * and in class HTTPResponse, the representation must
     * be `string`.
     *
     * So iterate all the headers and convert it from
     * array to string.
     *
     * @param array<string,string[]> $headers
     * @return array<string,string>
     */
    public function convertHeaderArrayValuesToSingleValue(array $headers): array
    {
        $convertedHeaders = [];
        foreach ($headers as $name => $headerValues) {
            $convertedHeaders[$name] = $this->convertHeaderArrayValueToSingleValue($headerValues, $name);
        }
        return $convertedHeaders;
    }

    /**
     * Decide how to convert the array of values for the header
     * into a single value.
     *
     * Currently it simply joins all values with ",", but specific
     * headers might need a different logic (eg: have the last entry
     * override all previous entries).
     *
     * @todo Decide on a header-by-header basis.
     *
     * @param string[] $headerValues
     */
    protected function convertHeaderArrayValueToSingleValue(array $headerValues, string $headerName): string
    {
        return implode(', ', $headerValues);
    }
}
