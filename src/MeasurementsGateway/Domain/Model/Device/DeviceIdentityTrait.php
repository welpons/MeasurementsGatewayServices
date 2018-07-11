<?php



namespace App\MeasurementsGateway\Domain\Model\Device;

/**
 * Description of Device
 *
 * @author felix
 */
trait DeviceIdentityTrait 
{
    /**
     * @var App\MeasurementsGateway\Domain\Model\Device\DeviceId 
     */
    private $id;
    
    public function id(): DeviceId
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id->id();
    }    
}
