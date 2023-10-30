<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Balance Endpoint.
 */
class Balance extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array
     */
    public function list(array $filter = []): array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetSaldi', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Saldi', 'cSaldo');
    }
    
    /**
     * @param array $filter = []
     * 
     * @return float|null
     */
    public function get(array $filter = []): ?float
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetSaldo', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        if (isset($processedResponse['Saldo'])) {
            return $processedResponse['Saldo'];
        }
        
        return null;
    }
}