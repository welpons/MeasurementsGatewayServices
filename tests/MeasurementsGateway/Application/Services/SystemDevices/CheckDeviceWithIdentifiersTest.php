<?php

namespace App\Tests\MeasurementsGateway\Application\Services\SystemDevices;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use PHPUnit\Framework\TestCase;
use App\MeasurementsGateway\Application\Services\SystemDevices\CheckDeviceWithIdentifiers;
use App\MeasurementsGateway\Application\Services\SystemDevices\CheckDeviceWithIdentifiersInterface;
use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifier;
use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifiers;
use App\MeasurementsGateway\Domain\Model\Device\Identifiers\IdentifierTypes;

/**
 * Description of CheckDeviceWithIdentifiersTest
 *
 * @author felix
 */
class CheckDeviceWithIdentifiersTest extends TestCase
{
    private $serializer;
    
    public function setUp() 
    {
        parent::setUp();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $this->serializer = new Serializer($normalizers, $encoders);         
    }
    
    /**
     * @group application_service_sysdevice_checkdevicewithidentifiers
     */
    public function testInstantiate()
    {
        $service = new CheckDeviceWithIdentifiers('domain', $this->serializer);
        $this->assertTrue($service instanceof CheckDeviceWithIdentifiersInterface);
    }    

    /**
     * @group application_service_sysdevice_checkdevicewithidentifiers1
     */
    public function testCheck()
    {
        $identifiers = new Identifiers();
        $serialNumber = Identifier::fromString('SN123896745', IdentifierTypes::SERIAL_NUMBER, IdentifierTypes::LISTING);
        $macAddress = Identifier::fromString('02:42:b6:ca:7c:89', IdentifierTypes::MAC_ADDRESS, IdentifierTypes::LISTING);
        $identifiers->add($serialNumber);
        $identifiers->add($macAddress);   
        
        $service = new CheckDeviceWithIdentifiers('domain', $this->serializer);
        echo $service->check($identifiers);
    }        
}
