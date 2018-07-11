<?php

namespace App\MeasurementsGateway\Domain\Model\UserDevice;

/**
 * Description of UserDevice
 *
 * @author felix
 */
trait DeviceUserTrait 
{
    private $user;

    public function user()
    {
        return $this->user;
    }        
}
