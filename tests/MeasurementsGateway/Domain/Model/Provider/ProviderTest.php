<?php

namespace App\Tests\MeasurementsGateway\Domain\Model\Provider;

use PHPUnit\Framework\TestCase;
use App\MeasurementsGateway\Domain\Model\Provider\Provider;

/**
 * Description of ProviderTest
 *
 * @author felix
 */
class ProviderTest extends TestCase
{
    /**
     * @group domain_model_provider
     */
    public function testProviderfromString()
    {
        $provider = Provider::fromString('QCL', 'json');
        
        $this->assertTrue($provider instanceof Provider);
    }     
    
    /**
     * @group domain_model_provider
     * @expectedException App\MeasurementsGateway\Domain\Model\Provider\InvalidProviderPayloadFormatException
     */
    public function testProviderWrongFormat()
    {
        $provider = Provider::fromString('QCL', 'unknown_format', ['json']);
    }       
    
    /**
     * @group domain_model_provider
     * @expectedException App\MeasurementsGateway\Domain\Model\Provider\InvalidProviderNameException
     */
    public function testProviderEmptyName()
    {
        $provider = Provider::fromString('', 'json');
    }      
}
