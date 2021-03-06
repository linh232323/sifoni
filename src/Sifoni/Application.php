<?php

namespace Sifoni;

use Silex\Application as SilexApplication;
use Symfony\Component\HttpFoundation\Request;

class Application extends SilexApplication
{
    use SilexApplication\TwigTrait;
    use SilexApplication\UrlGeneratorTrait;
    use SilexApplication\MonologTrait;
    use SilexApplication\TranslationTrait;

    /**
     * Handles the request and delivers the response.
     *
     * @param Request|null $request Request to process
     */
    public function run(Request $request = null, $return_response = false)
    {
        if (null === $request) {
            $request = Request::createFromGlobals();
        }

        $response = $this->handle($request);

        if ($return_response) {
            return $response;
        }

        $response->send();
        $this->terminate($request, $response);
    }
}
