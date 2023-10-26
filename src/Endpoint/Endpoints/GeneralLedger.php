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
     * @return array|null
     */
    public function list(array $filter = []): ?array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetGrootboekrekeningen', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetGrootboekrekeningenResult']['Rekeningen']['cGrootboekrekening'])) {
            
            return $this->returnList($processedResponse['GetGrootboekrekeningenResult']['Rekeningen']['cGrootboekrekening']);
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
        $params = $this->addSession(['oGb' => $data]);
        
        $response = $this->soapClient->__soapCall('AddGrootboekrekening', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (
            isset($processedResponse['AddGrootboekrekeningResult']['Gb_ID'])
            and !empty($processedResponse['AddGrootboekrekeningResult']['Gb_ID'])
        ) {
            return $processedResponse['AddGrootboekrekeningResult']['Gb_ID'];
        }
        
        return $processedResponse;
    }
    
    /**
     * @param array $data = []
     * 
     * @return array|null
     */
    public function update(array $data = [])
    {
        $params = $this->addSession(['oGb' => $data]);
        
        $response = $this->soapClient->__soapCall('UpdateGrootboekrekening', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['UpdateGrootboekrekeningResult'])) {
            
            return $processedResponse['UpdateGrootboekrekeningResult'];
        }
        
        return $processedResponse;
    }
}