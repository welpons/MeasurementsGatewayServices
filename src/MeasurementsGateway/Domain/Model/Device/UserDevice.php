<?php

namespace App\MeasurementsGateway\Domain\Model\Device;

use App\MeasurementsGateway\Domain\Model\Device\User\UserId;

/**
 * Description of UserDevice
 *
 * @author felix
 */
class UserDevice 
{
    use DeviceIdentityTrait;
    
    private $userId;
    
    public function __construct(DeviceId $id, UserId $userId) 
    {
        $this->id = $id;
        $this->userId = $userId;
    }
}
