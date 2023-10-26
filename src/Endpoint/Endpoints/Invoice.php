<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Invoice Endpoint.
 */
class Invoice extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array|null
     */
    public function list(array $filter = []): ?array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetFacturen', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetFacturenResult']['Facturen']['cFactuurList'])) {
            
            return $this->returnList($processedResponse['GetFacturenResult']['Facturen']['cFactuurList']);
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
        $params = $this->addSession(['oFact' => $data]);
        
        $response = $this->soapClient->__soapCall('AddFactuur', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (
            isset($processedResponse['AddFactuurResult']['Factuurnummer'])
            and !empty($processedResponse['AddFactuurResult']['Factuurnummer'])
        ) {
            return $processedResponse['AddFactuurResult']['Factuurnummer'];
        }
        
        return $processedResponse;
    }
}