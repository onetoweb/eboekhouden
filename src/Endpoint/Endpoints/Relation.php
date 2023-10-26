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
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetRelatiesResult']['Relaties']['cRelatie'])) {
            
            return $this->returnList($processedResponse['GetRelatiesResult']['Relaties']['cRelatie']);
        }
        
        return $processedResponse;
    }
    
    /**
     * @param array $data = []
     *
     * @return array|int|null
     */
    public function create(array $data = [])
    {
        $params = $this->addSession(['oRel' => $data]);
        
        $response = $this->soapClient->__soapCall('AddRelatie', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (
            isset($processedResponse['AddRelatieResult']['Rel_ID'])
            and !empty($processedResponse['AddRelatieResult']['Rel_ID'])
        ) {
            return $processedResponse['AddRelatieResult']['Rel_ID'];
        }
        
        return $processedResponse;
    }
    
    /**
     * @param array $data = []
     *
     * @return array|int|null
     */
    public function update(array $data = [])
    {
        $params = $this->addSession(['oRel' => $data]);
        
        $response = $this->soapClient->__soapCall('UpdateRelatie', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['UpdateRelatieResult'])) {
            
            return $processedResponse['UpdateRelatieResult'];
        }
        
        return $processedResponse;
    }
}