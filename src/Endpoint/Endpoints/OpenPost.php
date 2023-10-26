<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Open Post Endpoint.
 */
class OpenPost extends AbstractEndpoint
{
    /**
     * @param string $type = ''
     * 
     * @return array|null
     */
    public function list(string $type = ''): ?array
    {
        $params = $this->addSession(['OpSoort' => $type]);
        
        $response = $this->soapClient->__soapCall('GetOpenPosten', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetOpenPostenResult']['Openposten']['cOpenPost'])) {
            
            return $this->returnList($processedResponse['GetOpenPostenResult']['Openposten']['cOpenPost']);
        }
        
        return $processedResponse;
    }
}