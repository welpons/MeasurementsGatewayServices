<?php

namespace App\MeasurementsGateway\Domain\Model\Device;

use App\MeasurementsGateway\Domain\Model\Device\User\UserId;

/**
 *
 * @author felix
 */
interface UserDeviceRepositoryInterface 
{
    public function nextIdentity() : string;
    
    public function byDeviceIdentity(DeviceId $id) : ?UserDevice;
    
    public function byUserId(UserId $userId) : ?UserId;
    
    public function save(UserDevice $userDevice) : ?string;    
    public function remove(UserDevice $userDevice);    
}
