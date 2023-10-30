<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Open Post Endpoint.
 */
class OpenPost extends AbstractEndpoint
{
    /**
     * @param string $type
     * 
     * @return array
     */
    public function list(string $type): array
    {
        $params = $this->addSession(['OpSoort' => $type]);
        
        $response = $this->soapClient->__soapCall('GetOpenPosten', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Openposten', 'cOpenPost');
    }
}