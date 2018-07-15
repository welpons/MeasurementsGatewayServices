<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\MeasurementsGateway\Application\Services\ProcessPayload;

use App\MeasurementsGateway\Application\Services\DTOInterface;
use App\MeasurementsGateway\Domain\Model\Provider\Provider;

/**
 * Description of PayloadDTO
 *
 * @author felix
 */
class PayloadDTO implements DTOInterface
{
    /**
     *
     * @var mixed 
     */
    private $rawPayload;
    
    /**
     *
     * @var App\MeasurementsGateway\Domain\Model\Provider\Provider 
     */
    private $provider;
    
    /**
     *
     * @var \DateTime 
     */
    private $receivingTime;
    
    function __construct($rawPayload, Provider $provider) 
    {
        $this->rawPayload = $rawPayload;
        $this->provider = $provider;
        $this->getReceivingTime = new \DateTimeImmutable();
    }

    function rawPayload() 
    {
        return $this->rawPayload;
    }

    function provider(): Provider 
    {
        return $this->provider;
    }

    function receivingTime(): \DateTime 
    {
        return $this->receivingTime;
    }


}
