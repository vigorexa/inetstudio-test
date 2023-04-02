<?php

namespace Vigorexa\InetstudioTest\Architecture\Second;

use Vigorexa\InetstudioTest\Architecture\Second\Abstracts\XMLHTTPRequestService;

class Http
{
    public function __construct(
        private XMLHTTPRequestService $service
    ) {}

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}