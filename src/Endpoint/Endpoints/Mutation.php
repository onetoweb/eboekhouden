<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Mutation Endpoint.
 */
class Mutation extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array|null
     */
    public function list(array $filter = []): ?array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetMutaties', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetMutatiesResult']['Mutaties']['cMutatieList'])) {
            
            return $this->returnList($processedResponse['GetMutatiesResult']['Mutaties']['cMutatieList']);
        }
        
        return $processedResponse;
    }
    
    /**
     * @param array $data = []
     *
     * @return array|string|null
     */
    public function create(array $data = [])
    {
        $params = $this->addSession(['oMut' => $data]);
        
        $response = $this->soapClient->__soapCall('AddMutatie', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (
            isset($processedResponse['AddMutatieResult']['Mutatienummer'])
            and !empty($processedResponse['AddMutatieResult']['Mutatienummer'])
        ) {
            return $processedResponse['AddMutatieResult']['Mutatienummer'];
        }
        
        return $processedResponse;
    }
}