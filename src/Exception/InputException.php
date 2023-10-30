<?php

namespace Onetoweb\Eboekhouden\Exception;

use Exception;

/**
 * Input Exception.
 */
class InputException extends Exception
{
    /**
     * @var string
     */
    private $errorCode;
    
    /**
     * @var string
     */
    private $lastRequest;
    
    /**
     * @var string
     */
    private $lastResponse;
    
    /**
     * @param string $errorCode = null
     * 
     * @return self
     */
    public function setErrorCode(string $errorCode = null): self
    {
        $this->errorCode = $errorCode;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }
    
    /**
     * @param string $lastRequest = null
     * 
     * @return self
     */
    public function setLastRequest(string $lastRequest = null): self
    {
        $this->lastRequest = $lastRequest;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLastRequest(): ?string
    {
        return $this->lastRequest;
    }
    
    /**
     * @param string $lastResponse = null
     * 
     * @return self
     */
    public function setLastResponse(string $lastResponse = null): self
    {
        $this->lastResponse = $lastResponse;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLastResponse(): ?string
    {
        return $this->lastResponse;
    }
}