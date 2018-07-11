<?php

namespace App\Tests\MeasurementsGateway\Infrastructure\Persistence;

use App\MeasurementsGateway\Domain\Model\Device\RegisteredDevice;
use App\MeasurementsGateway\Domain\Model\Device\DeviceId;
use App\MeasurementsGateway\Domain\Model\Device\Model\ModelId;
use App\MeasurementsGateway\Domain\Model\Device\Subscription\Subscription;
use PHPUnit\Framework\TestCase;

/**
 * Description of InMemoryRegisteredDeviceRepositoryTest
 *
 * @author felix
 */
class InMemoryRegisteredDeviceRepositoryTest extends TestCase 
{
    private $repository;
    
    public function setUp() {
        parent::setUp();
        $this->repository = new InMemoryRegisteredDeviceRepository();
    }
    
    /**
     * @group infrastructure_persistence_registered_dev_repository
     */
    public function testNextIdentityReturnString()
    {
        $this->assertTrue(is_string($this->repository->nextIdentity()));
    }  
    
    /**
     * @group infrastructure_persistence_registered_dev_repository
     */
    public function testAddRegisteredDevice()
    {
        $registeredDevice = new RegisteredDevice(DeviceId::create(), ModelId::create(), new \DateTime(), Subscription::create(new \DateTimeImmutable('yesterday'), new \DateTimeImmutable('today')));
        $this->repository->add($registeredDevice);
    }        
}
