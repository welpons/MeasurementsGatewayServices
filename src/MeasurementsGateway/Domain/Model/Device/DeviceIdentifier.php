<?php

namespace App\MeasurementsGateway\Domain\Model\Device;

use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifier;
use App\MeasurementsGateway\Domain\Model\Device\DeviceId;

/**
 * Description of DeviceIdentifier
 *
 * @author felix
 */
class DeviceIdentifier 
{
    private $identifier;
    private $deviceId;
    private $isReferenceIdentifier;
    
    public function __construct(DeviceId $deviceId, Identifier $identifier, $isReferenceIdentifier = false) 
    {
        $this->deviceId = $deviceId;
        $this->identifier = $identifier;
        $this->isReferenceIdentifier = $isReferenceIdentifier;
    }
    
    function identifier() 
    {
        return $this->identifier;
    }

    function deviceId() 
    {
        return $this->deviceId;
    }

    function isReferenceIdentifier() 
    {
        return $this->isReferenceIdentifier;
    }

    
}
