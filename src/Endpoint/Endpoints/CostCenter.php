<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Cost Center Endpoint.
 */
class CostCenter extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array
     */
    public function list(array $filter = []): array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetKostenplaatsen', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Kostenplaatsen', 'cKostenplaats');
    }
}