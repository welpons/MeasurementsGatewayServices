<?php

namespace App\MeasurementsGateway\Infrastructure\DeviceIdentifiersFinders;

use App\MeasurementsGateway\Domain\Model\Provider\IdentifiersFinder\AbstractIdentifiersFinder;
use App\MeasurementsGateway\Domain\Model\Provider\IdentifiersFinder\IdentifiersFinderInterface;
use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifiers;
use App\MeasurementsGateway\Domain\Model\Device\Identifiers\IdentifierTypes;

/**
 * Description of QCLDeviceIdentifiersFinder
 *
 * @author felix
 */
class QCLDeviceIdentifiersFinder extends AbstractIdentifiersFinder implements IdentifiersFinderInterface
{

    public function findIdentifiers($rawData): Identifiers 
    {
        $decodedData = $this->decodeJson($rawData);
        
        if(!isset($decodedData['post']['qcl_json_data'])) {
            throw new QclDataNotFoundException('Qcl Data not found in payload');
        }
        
        $qclData = $decodedData['post']['qcl_json_data'];
        
        if (is_string($qclData)) {
            $qclData = json_decode($qclData, true);
        }
        
        $this->dataToProcress = $qclData;

        $identifiers = new Identifiers();        
        foreach(IdentifierTypes::LISTING as $identifierType) {
            $this->findIdentifiersByKey($identifiers, $decodedData, $identifierType);
        }
                
        return $identifiers;
    }
    
    public function dataToProcress(): array 
    {
        return $this->dataToProcess;
    }
        
    private function decodeJson($rawData)
    {
        $decodedData = json_decode($rawData, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new FailedParsingPayloadException('Impossible to decode json payload to array');
        }
        
        return $decodedData;
    }

    private function searchArrayValueByKey(array $array, $search) 
    {
    	foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)) as $key => $value) {
    	    if ($search === $key) {
    		return $value;
            }    
    	}
        
    	return false;
    }



    private function findIdentifiersByKey(Identifiers $identifiers, array $decodedData, string $identifierType)
    {
        $identifierBlock = $this->searchArrayValueByKey($decodedData['post'], $this->qclKey($identifierType));
        
        if (false !== $identifierBlock && !empty($identifierBlock) ) {           
            $identifiers->add($identifierBlock, $identifierType);
        }         
    }        

    
    private function qclKey($identifierType)
    {
        $keys = [IdentifierTypes::SERIAL_NUMBER => 'device_serial_number', IdentifierTypes::MAC_ADDRESS => 'device_address', IdentifierTypes::HUB_ID => 'hub_id'];
        
        if (isset($keys[$identifierType])) {
            return $keys[$identifierType];
        }
        
        // TODO   throw new 
    }        

}
