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
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Mutaties', 'cMutatieList');
    }
    
    /**
     * @param array $data
     * 
     * @return int|null
     */
    public function create(array $data): ?int
    {
        $this->addRowStruct($data, 'MutatieRegels', 'cMutatieRegel');
        
        $params = $this->addSession(['oMut' => $data]);
        
        $response = $this->soapClient->__soapCall('AddMutatie', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        if (isset($processedResponse['Mutatienummer'])) {
            return $processedResponse['Mutatienummer'];
        }
        
        return null;
    }
}