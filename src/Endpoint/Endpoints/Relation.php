<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Relation Endpoint.
 */
class Relation extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array|null
     */
    public function list(array $filter = []): ?array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetRelaties', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Relaties', 'cRelatie');
    }
    
    /**
     * @param array $data
     * 
     * @return int|null
     */
    public function create(array $data): ?int
    {
        $params = $this->addSession(['oRel' => $data]);
        
        $response = $this->soapClient->__soapCall('AddRelatie', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        if (isset($processedResponse['Rel_ID'])) {
            return $processedResponse['Rel_ID'];
        }
        
        return null;
    }
    
    /**
     * @param array $data
     * 
     * @return void
     */
    public function update(array $data): void
    {
        $params = $this->addSession(['oRel' => $data]);
        
        $response = $this->soapClient->__soapCall('UpdateRelatie', [$params]);
        
        $this->handleResponse($response);
    }
}