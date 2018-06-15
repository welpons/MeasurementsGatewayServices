<?php

namespace App\Test\MeasurementsGateway\Infrastructure\DeviceIdentifiersFinders;

use PHPUnit\Framework\TestCase;
use App\MeasurementsGateway\Infrastructure\DeviceIdentifiersFinders\QCLDeviceIdentifiersFinder;

/**
 * Description of QCLDeviceIdentifiersFinderTest
 *
 * @author felix
 */
class QCLDeviceIdentifiersFinderTest extends TestCase
{
    /**
     * @group qcl_device_identifiers_finder
     */
    public function testDataToProcess()
    {
        $payload = file_get_contents(dirname(__FILE__) ."/rawHbf206it.json");
        $qclFinder = new QCLDeviceIdentifiersFinder();
        $identifiers = $qclFinder->findIdentifiers($payload);
        
        $dataToProcess = $qclFinder->dataToProcress();
        
        $this->assertTrue(is_array($dataToProcess));
    }       
    
    /**
     * @group qcl_device_identifiers_finder
     */
    public function testFindIdentifiersFindIdentifiers()
    {
        $payload = file_get_contents(dirname(__FILE__) ."/rawHbf206it.json");
        $qclFinder = new QCLDeviceIdentifiersFinder();
        $identifiers = $qclFinder->findIdentifiers($payload);
        
        
        $this->assertTrue(3 == $identifiers->count());
        $serialNumberIdentifier = $identifiers->current();
        $this->assertEquals('201004-00356F', $serialNumberIdentifier->toString());
        $identifiers->next();
        $macAddressIdentifier = $identifiers->current();
        $this->assertEquals('00:22:58:07:78:71', $macAddressIdentifier->toString());
    }      
}
