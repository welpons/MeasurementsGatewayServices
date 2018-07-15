<?php


namespace App\MeasurementsGateway\Command;

use App\MeasurementsGateway\Domain\Model\Device\UserDevice;
use App\MeasurementsGateway\Domain\Model\Provider\Provider;

/**
 * Description of MeasurementCommand
 *
 * @author felix
 */
class MeasurementCommand implements CommandInterface
{
    private $provider;
    private $userDevice;
    private $rawPayload;
    private $receivingTime;
    
    public function __construct(Provider $provider, UserDevice $userDevice, $rawPayload, \DateTimeImmutable $receptionTime) 
    {
        $this->provider = $provider;
        $this->userDevice = $userDevice;
        $this->rawPayload = $rawPayload;
        $this->receivingTime = $receptionTime;
    }
    
    function provider() 
    {
        return $this->provider;
    }

    function userDevice() 
    {
        return $this->userDevice;
    }

    function rawPayload() 
    {
        return $this->rawPayload;
    }

    function receivingTime() 
    {
        return $this->receivingTime;
    }

    
}
