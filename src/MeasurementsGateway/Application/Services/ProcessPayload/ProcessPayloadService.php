<?php

namespace App\MeasurementsGateway\Application\Services\ProcessPayload;

use App\MeasurementsGateway\Domain\Model\UserDevice\UserDevicesRepositoryInterface;
use App\MeasurementsGateway\Domain\Model\HealthUserValues\HealthUserValuesRepositoryInterface;

/**
 * This service is in charge to 
 *
 * @author felix
 */
class ProcessPayloadService 
{
    private $userDevicesRepository;
    private $healthUserValuesRepository;
    private $availableProviders;
    
    public function __construct(UserDevicesRepositoryInterface $userDevicesRepository, HealthUserValuesRepositoryInterface $healthUserValuesRepository, array $availableProviders = [])
    {
        $this->userDevicesRepository = $userDevicesRepository;
        $this->healthUserValuesRepository = $healthUserValuesRepository;
        $this->availableProviders = $availableProviders;
    }              
    
    public function process(PayloadDTO $payloadDTO)
    {
        // TODO: save raw payload
        $provider = Provider::fromString($payloadDTO->providerName(), $payloadDTO->format(), $this->availableProviders);          
        
        // TODO : extract $identifiers from DTO
        $userDevice = $this->userDevicesRepository->find($payloadDTO->identifiers());
        
        if (null === $userDevice) {
            // TODO: Exception     
        }  
        
        $healthUserValues = UserMeasurements::fromPayload($payloadDTO->measuremenData(), $userDevice);
        
        $this->healthUserValuesRepository->save($healthUserValues);
    }    
}
