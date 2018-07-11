<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\MeasurementsGateway\Application\Services\ProcessPayload\ProcessPayloadService;

/**
 * TwoNetPayloadController
 *
 * @author felix
 */
class TwoNetPayloadController 
{
    public function process(Request $request, MeasurementsBus $measurementsBus)
    {
//        $payload = $request->get();
        
//        $decodedData = json_decode($payload, true);
//        
//        if(!isset($decodedData['post'])) {
//            throw new QclDataNotFoundException('Data not found in payload');
//        }
//        
//        $qclData = $decodedData['post'];        
           

//        try {
//          $payloadDTO = new PayloadDTO(Provider::fromString('QCL', 'json'), $qclData);
//          $processPayloadService = new ProcessPayloadService($registeredDevicesRepository, $userDevicesRepository, $identifiersFinderFactory, $measurementsBus);
//          $processPayloadService->process($payloadDTO);
//        } catch (InvalidPayloadException $ex) {
//            return 
//        } finally {
//            return 
//        }
//                
//        return 
        // pass transformation to command service with a command bus 
    }        
}
