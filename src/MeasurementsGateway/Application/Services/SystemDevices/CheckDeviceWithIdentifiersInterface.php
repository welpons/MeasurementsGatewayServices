<?php


namespace App\MeasurementsGateway\Application\Services\SystemDevices;

use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifiers;

/**
 *
 * @author felix
 */
interface CheckDeviceWithIdentifiersInterface 
{
    public function check(Identifiers $identifiers);
}
