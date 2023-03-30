<?php

declare(strict_types=1);

namespace PoPSchema\HTTPRequests\HelperServices;

use PoPSchema\HTTPRequests\HelperServices\HTTPRequestHelperServiceInterface;
use PoP\Root\App;

class HTTPRequestHelperServiceFacade
{
    public static function getInstance(): HTTPRequestHelperServiceInterface
    {
        /**
         * @var HTTPRequestHelperServiceInterface
         */
        $service = App::getContainer()->get(HTTPRequestHelperServiceInterface::class);
        return $service;
    }
}
