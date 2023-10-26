<?php

namespace Onetoweb\Eboekhouden\Endpoint;

use SoapClient;

/**
 * Abstract Endpoint.
 */
class AbstractEndpoint implements EndpointInterface
{
    /**
     * @var SoapClient
     */
    protected $soapClient;
    
    /**
     * @var string
     */
    protected $sessionId;
    
    /**
     * @var string
     */
    protected $securityCode2;
    
    /**
     * @param SoapClient $soapClient
     * @param string $sessionId
     * @param string $securityCode2
     */
    public function __construct(SoapClient $soapClient, string $sessionId, string $securityCode2)
    {
        $this->soapClient = $soapClient;
        $this->sessionId = $sessionId;
        $this->securityCode2 = $securityCode2;
    }
    
    /**
     * @param mixed $response
     * 
     * @return array|null
     */
    protected function proccessResponse($response): ?array
    {
        return json_decode(json_encode($response), true);
    }
    
    /**
     * @param mixed $response
     *
     * @return array|null
     */
    protected function returnList(array $data): ?array
    {
        return array_is_list($data) ? $data : [$data];
    }
    
    /**
     * @return array $param = []
     */
    protected function addSession(array $param = [])
    {
        return array_merge([
            'SessionID' => $this->sessionId,
            'SecurityCode2' => $this->securityCode2,
        ], $param);
    }
}