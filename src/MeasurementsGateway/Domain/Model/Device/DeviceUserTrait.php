<?php

namespace App\MeasurementsGateway\Domain\Model\Device;

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
