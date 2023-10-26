<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Administration Endpoint.
 */
class Administration extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function list(): ?array
    {
        $params = $this->addSession();
        
        $response = $this->soapClient->__soapCall('GetAdministraties', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        if (isset($processedResponse['GetAdministratiesResult']['Administraties']['cAdministratie'])) {
            return $processedResponse['GetAdministratiesResult']['Administraties']['cAdministratie'];
        }
        
        return $processedResponse;
    }
}