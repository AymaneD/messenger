<?php
namespace Kerox\Messenger\Response;

use Psr\Http\Message\ResponseInterface;

abstract class AbstractResponse
{

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * AbstractResponse constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;

        $this->parseResponse($this->decodeResponse($response));
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    private function decodeResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $response
     * @return mixed
     */
    abstract protected function parseResponse(array $response);

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
