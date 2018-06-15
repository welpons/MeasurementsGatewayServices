<?php



namespace App\MeasurementsGateway\Domain\Model\Device\Identifiers;

/**
 *
 * @author felix
 */
interface IdentifierTypes 
{
    const SERIAL_NUMBER = 'sno';
    const MAC_ADDRESS = 'mac';
    const HUB_ID = 'hid';
    
    const LISTING = [self::SERIAL_NUMBER, self::MAC_ADDRESS, self::HUB_ID];
}
