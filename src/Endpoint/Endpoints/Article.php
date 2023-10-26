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
     * @return array|null
     */
    public function list(array $filter = []): ?array
    {
        $params = $this->addSession(['cFilter' => $filter]);
        
        $response = $this->soapClient->__soapCall('GetArtikelen', [$params]);
        
        $processedResponse = $this->proccessResponse($response);
        
        dump($processedResponse);
        
        if (isset($processedResponse['GetArtikelenResult']['Artikelen']['cArtikel'])) {
            
            return $this->returnList($processedResponse['GetArtikelenResult']['Artikelen']['cArtikel']);
        }
        
        return $processedResponse;
    }
}