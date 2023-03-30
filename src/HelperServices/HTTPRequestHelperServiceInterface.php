<?php

declare(strict_types=1);

namespace PoPSchema\HTTPRequests\HelperServices;

interface HTTPRequestHelperServiceInterface
{
    /**
     * Both Guzzle and Symfony HTTP Foundation retrieve the
     * header values as `string[]`, but in the HTTPRequest
     * and HTTPResponse representation it can be `string|string[]`.
     *
     * So iterate all the headers and, if any of them has only one
     * item, convert it from array to string.
     *
     * @param array<string,string[]> $headers
     * @return array<string,string|string[]>
     */
    public function convertHeaderArrayValuesToSingleValues(array $headers): array;
}
