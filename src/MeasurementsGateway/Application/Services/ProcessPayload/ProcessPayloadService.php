<?php

namespace App\MeasurementsGateway\Application\Services\ProcessPayload;

use App\MeasurementsGateway\Domain\Model\UserDevice\UserDevicesRepositoryInterface;
use App\MeasurementsGateway\Domain\Model\Device\RegisteredDeviceRespositoryInterface;

/**
 * This service is in charge to 
 *
 * @author felix
 */
class ProcessPayloadService 
{
    private $userDeviceRepository;
    private $registeredDevicesRepository;
    private $identifiersFinderFactory;
    private $measurementsBus;
    
    public function __construct(RegisteredDeviceRespositoryInterface $registeredDevicesRepository, 
            UserDevicesRepositoryInterface $userDevicesRepository, 
            $identifiersFinderFactory,
            MeasurementsBus $measurementsBus) // 
    {
        $this->userDeviceRepository = $userDevicesRepository;
        $this->registeredDevicesRepository = $registeredDevicesRepository;
        $this->identifiersFinderFactory = $identifiersFinderFactory;
        $this->measurementsBus = $measurementsBus;
    }              
    
    public function process(PayloadDTO $payloadDTO)
    {
        try {
            // extract $identifiers from DTO
            $identifiersFinder = $this->identifiersFinderFactory->getFinder($payloadDTO->provider());
            $identifiers = $identifiersFinder->findIdentifiers($payloadDTO->rawPayload());

            // TODO: pending check subscription
            
            $device = $this->registeredDevicesRepository->find($identifiers);
            
            if (null === $device) {
                // TODO: Exception     
            } 
            
            if (!$device->hasSubscription()) {
                // TODO: Exception
            }
            
            $userDevice = $this->userDeviceRepository->find($device->id());

            if (null === $userDevice) {
                // TODO: Exception     
            }  
            $measurementCommand = new MeasurementCommand($userDevice, $payloadDTO->rawPayload());
            
            $this->measurementsBus->dispatch($measurementCommand);
        } catch (Exception $ex) {

        }

    }    
}
