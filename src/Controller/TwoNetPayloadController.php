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
    public function process(Request $request)
    {
//        $payload = $request->get();
        
//        $decodedData = json_decode($payload, true);
//        
//        if(!isset($decodedData['post'])) {
//            throw new QclDataNotFoundException('Data not found in payload');
//        }
//        
//        $qclData = $decodedData['post'];        

//        $processPayloadService = new ProcessPayloadService($provider, $userDevicesRepository, $healthUserValuesRepository);
        
//        try {
//            $response = $processPayloadService->execute($qclData);
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
