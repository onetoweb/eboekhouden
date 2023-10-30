<?php

namespace Onetoweb\Eboekhouden\Endpoint\Endpoints;

use Onetoweb\Eboekhouden\Endpoint\AbstractEndpoint;

/**
 * Article Endpoint.
 */
class Article extends AbstractEndpoint
{
    /**
     * @param array $filter = []
     * 
     * @return array
     */
    public function list(array $filter = []): array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetArtikelen', [$params]);
        
        $processedResponse = $this->handleResponse($response);
        
        return $this->returnData($processedResponse, 'Artikelen', 'cArtikel');
    }
}