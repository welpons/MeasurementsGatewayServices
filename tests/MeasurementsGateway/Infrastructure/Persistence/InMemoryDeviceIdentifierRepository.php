<?php

namespace App\Tests\MeasurementsGateway\Infrastructure\Persistence;

use App\MeasurementsGateway\Domain\Model\Device\DeviceIdentifierRepositoryInterface;
use App\MeasurementsGateway\Domain\Model\Device\DeviceIdentifier;
use App\MeasurementsGateway\Domain\Model\Device\DeviceId;
use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifier;

/**
 * Description of InMemoryDeviceIdentifierRepository
 *
 * @author felix
 */
class InMemoryDeviceIdentifierRepository implements DeviceIdentifierRepositoryInterface
{
    private $deviceIdentifier = [];
    
    public function deviceofId(DeviceId $deviceId) : ?DeviceIdentifier
    {
        
    }    
        
    public function deviceofIdentifier(Identifier $identifier) : ?DeviceIdentifier
    {
    }    
   
    public function add(DeviceIdentifier $deviceIdentifier);
    {
        $this->deviceIdentifiers[$deviceIdentifier->deviceId()->id()][$deviceIdentifier->identifier()->value()] = $deviceIdentifier;
    }
    
    public function remove(DeviceIdentifier $deviceIdentifier)
    {
        unset($this->deviceIdentifiers[$deviceIdentifier->deviceId()->id()][$deviceIdentifier->identifier()->value()]);
    }        
    
    public function findBy(array $criteria)
    {
        
    }        
}
