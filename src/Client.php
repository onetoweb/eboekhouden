<?php

namespace Onetoweb\Eboekhouden;

use Onetoweb\Eboekhouden\Endpoint\Endpoints;
use SoapClient;

/**
 * E-Boekhouden Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Get Base Wdsl
     */
    public const BASE_WDSL = 'https://soap.e-boekhouden.nl/soap.asmx?wsdl';
    
    /**
     * @var string
     */
    private $username;
    
    /**
     * @var string
     */
    private $securityCode1;
    
    /**
     * @var string
     */
    private $securityCode2;
    
    /**
     * @var string
     */
    private $sessionId;
    
    /**
     * @var SoapClient
     */
    private $soapClient;
    
    /**
     * @param string $username
     * @param string $securityCode1
     * @param string $securityCode2
     */
    public function __construct(string $username, string $securityCode1, string $securityCode2)
    {
        $this->username = $username;
        $this->securityCode1 = $securityCode1;
        $this->securityCode2 = $securityCode2;
        
        // setup soap client
        $this->soapClient = new SoapClient(Client::BASE_WDSL, [
            'trace' => true,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS
        ]);
        
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this->soapClient, $this->getSessionId(), $this->securityCode2);
        }
    }
    
    /**
     * @return SoapClient
     */
    public function getSoapClient(): SoapClient
    {
        return $this->soapClient;
    }
    
    /**
     * @return sting
     */
    public function getSessionId(): string
    {
        if ($this->sessionId === null) {
            $this->openSession();
        }
        
        return $this->sessionId;
    }
    
    /**
     * @return void
     */
    private function openSession(): void
    {
        // open session
        $params = [
            'Username' => $this->username,
            'SecurityCode1' => $this->securityCode1,
            'SecurityCode2' => $this->securityCode2
        ];
        $response = $this->soapClient->__soapCall('OpenSession', [$params]);
        
        // get session id
        $this->sessionId = $response->OpenSessionResult->SessionID;
    }
    
    /**
     * @return void
     */
    private function closeSession(): void
    {
        // open session
        $params = [
            'SessionID' => $this->sessionId,
        ];
        $response = $this->soapClient->__soapCall('CloseSession', [$params]);
        
        // clear session id
        $this->sessionId = null;
    }
    
    /**
     * Destructor.
     */
    public function __destruct()
    {
        if ($this->sessionId !== null) {
            $this->closeSession();
        }
    }
}