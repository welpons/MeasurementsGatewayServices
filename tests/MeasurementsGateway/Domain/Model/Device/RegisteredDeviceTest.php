<?php

namespace App\Tests\MeasurementsGateway\Domain\Model\Device;

use App\MeasurementsGateway\Domain\Model\Device\RegisteredDevice;
use App\MeasurementsGateway\Domain\Model\Device\DeviceId;
use App\MeasurementsGateway\Domain\Model\Device\Model\ModelId;
use App\MeasurementsGateway\Domain\Model\Device\Subscription\Subscription;
use PHPUnit\Framework\TestCase;


/**
 * Description of ConnectedDeviceTest
 *
 * @author felix
 */
class RegisteredDeviceTest extends TestCase
{
    /**
     * @group domain_model_device
     */
    public function testInstantiate()
    {
        $connectedDevice = new RegisteredDevice(DeviceId::create(), ModelId::create(), new \DateTimeImmutable(), Subscription::create(new \DateTimeImmutable(), new \DateTimeImmutable('tomorrow')));
        $this->assertTrue($connectedDevice instanceof RegisteredDevice);
    }        
}
