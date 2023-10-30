<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * General Ledger Endpoint.
 */
class GeneralLedger extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array
     */
    public function list(array $filter = []): array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetGrootboekrekeningen', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Rekeningen', 'cGrootboekrekening');
    }
    
    /**
     * @param array $data
     * 
     * @return int|null
     */
    public function create(array $data): ?int
    {
        $params = $this->addSession(['oGb' => $data]);
        
        $response = $this->soapClient->__soapCall('AddGrootboekrekening', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        if (isset($processedResponse['Gb_ID'])) {
            return $processedResponse['Gb_ID'];
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
        $params = $this->addSession(['oGb' => $data]);
        
        $response = $this->soapClient->__soapCall('UpdateGrootboekrekening', [$params]);
        
        $this->handleResponse($response);
    }
}