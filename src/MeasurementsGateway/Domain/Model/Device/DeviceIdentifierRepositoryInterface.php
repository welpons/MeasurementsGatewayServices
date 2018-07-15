<?php

namespace App\MeasurementsGateway\Domain\Model\Device;

/**
 *
 * @author felix
 */
interface DeviceIdentifierRepositoryInterface 
{
    public function deviceofId(DeviceId $deviceId) : ?DeviceIdentifier;
        
    public function deviceofIdentifier(Identifier $identifier) : ?DeviceIdentifier;
   
    public function add(DeviceIdentifier $deviceIdentifier); 
    
    public function remove(DeviceIdentifier $deviceIdentifier);
    
    public function findBy(array $criteria); 
}
