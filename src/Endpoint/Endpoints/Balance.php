<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Balance Endpoint.
 */
class Balance extends AbstractEndpoint
{
    /**
     * @param array $filter = null
     * 
     * @return array|null
     */
    public function list(array $filter = []): ?array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetSaldi', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetSaldiResult']['Saldi']['cSaldo'])) {
            
            return $this->returnList($processedResponse['GetSaldiResult']['Saldi']['cSaldo']);
        }
        
        return $processedResponse;
    }
    
    /**
     * @param array $filter = null
     * 
     * @return array|int|null
     */
    public function get(array $filter = [])
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetSaldo', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetSaldoResult']['Saldo'])) {
            
            return $processedResponse['GetSaldoResult']['Saldo'];
        }
        
        return $processedResponse;
    }
}