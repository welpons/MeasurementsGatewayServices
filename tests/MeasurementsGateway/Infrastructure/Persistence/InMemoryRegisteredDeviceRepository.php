<?php

namespace App\Tests\MeasurementsGateway\Infrastructure\Persistence;

use App\MeasurementsGateway\Domain\Model\Device\RegisteredDeviceRespositoryInterface;
use App\MeasurementsGateway\Domain\Model\Device\RegisteredDevice;
use App\MeasurementsGateway\Domain\Model\Device\DeviceId;

/**
 * Description of DeviceRepository
 *
 * @author felix
 */
class InMemoryRegisteredDeviceRepository implements RegisteredDeviceRespositoryInterface
{
    private $devices = [];
    
    public function nextIdentity() : string
    {
        return DeviceId::create();
    }    
    
    public function deviceOfId(DeviceId $deviceId) : ?RegisteredDevice
    {
        if (isset($this->devices[$deviceId->id()])) {
            return $this->devices[$deviceId->id()];
        }
        
        return null;
    }    
   
    public function add(RegisteredDevice $device)
    {
        $this->devices[$device->id()->id()] = $device;
    }
    
    public function remove(RegisteredDevice $device)
    {
        unset($this->devices[$device->id()->id()]);
    }        
    
    public function findBy(array $criteria)
    {
        
    }        
}
