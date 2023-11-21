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
     * @return array
     */
    public function list(array $filter = []): array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetFacturen', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Facturen', 'cFactuurList');
    }
    
    /**
     * @param array $data
     * 
     * @return string|null
     */
    public function create(array $data): ?string
    {
        $this->addRowStruct($data, 'Regels', 'cFactuurRegel');
        
        $params = $this->addSession(['oFact' => $data]);
        
        $response = $this->soapClient->__soapCall('AddFactuur', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        if (isset($processedResponse['Factuurnummer'])) {
            return $processedResponse['Factuurnummer'];
        }
        
        return null;
    }
}