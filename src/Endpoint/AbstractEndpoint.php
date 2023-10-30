<?php

namespace Onetoweb\Eboekhouden\Endpoint;

use Onetoweb\Eboekhouden\Exception\InputException;
use SoapClient;
use stdClass;

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
     * @deprecated replaced by: SoapClient feature with option SOAP_SINGLE_ELEMENT_ARRAYS
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
    
    /**
     * @param stdClass $response
     * 
     * @return array
     */
    protected function handleResponse(stdClass $response): array
    {
        $processedResponse = $this->proccessResponse($response);
        
        $this->checkResponse($processedResponse);
        
        return $processedResponse;
    }
    
    /**
     * @param array $response
     * 
     * @throws InputException containing error message
     * 
     * @return void
     */
    protected function checkResponse(array $response): void
    {
        // check for error msg in response
        if (
            isset($response['ErrorMsg']['LastErrorCode'])
            and isset($response['ErrorMsg']['LastErrorDescription'])
        ) {
            throw (new InputException($response['ErrorMsg']['LastErrorDescription']))
                ->setErrorCode($response['ErrorMsg']['LastErrorCode'])
                ->setLastRequest($this->soapClient->__getLastRequest())
                ->setLastResponse($this->soapClient->__getLastResponse())
            ;
        }
        
        // check for error in response
        if (
            isset($response['LastErrorCode'])
            and isset($response['LastErrorDescription'])
        ) {
            throw (new InputException($response['LastErrorDescription']))
                ->setErrorCode($response['LastErrorCode'])
                ->setLastRequest($this->soapClient->__getLastRequest())
                ->setLastResponse($this->soapClient->__getLastResponse())
            ;
        }
    }
    
    /**
     * @param array &$data
     * @param string $rowKey
     * @param string $structKey
     */
    protected function addRowStruct(array &$data, string $rowKey, string $structKey)
    {
        if (isset($data[$rowKey]) and !isset($data[$rowKey][$structKey])) {
            
            $rows = $data[$rowKey];
            
            unset($data[$rowKey]);
            
            $data[$rowKey][$structKey] = $rows;
        }
    }
    
    /**
     * @param stdClass $response
     * 
     * @return array
     */
    protected function proccessResponse(stdClass $response): array
    {
        // remove parent element
        if (($result = current($response)) !== false) {
            
            // convert stdClass to array
            return json_decode(json_encode($result), true);
        }
        
        return [];
    }
    
    /**
     * @param array $data
     * @param string $key1
     * @param string $key2 = null
     * 
     * @return array
     */
    protected function returnData(array $data, string $key1, string $key2 = null): array
    {
        if ($key2 !== null and isset($data[$key1][$key2])) {
            return $data[$key1][$key2];
        } elseif (isset($data[$key1])) {
            return $data[$key1];
        }
        
        return $data;
    }
}