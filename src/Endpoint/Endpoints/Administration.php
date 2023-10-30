<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Administration Endpoint.
 */
class Administration extends AbstractEndpoint
{
    /**
     * @return array
     */
    public function list(): array
    {
        $params = $this->addSession();
        
        $response = $this->soapClient->__soapCall('GetAdministraties', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Administraties', 'cAdministratie');
    }
}