<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\MeasurementsGateway\Application\Services\ProcessPayload\ProcessPayloadService;
use App\MeasurementsGateway\Infrastructure\Service\Bus\CommandBusInterface;
use App\MeasurementsGateway\Infrastructure\Middleware\MessageBroker\RabbitMQ;

/**
 * TwoNetPayloadController
 *
 * @author felix
 */
class TwoNetPayloadController 
{
    public function process(Request $request, CommandBusInterface $commandBus)
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
//          TODO: register handlers in command bus
//          $payloadDTO = new PayloadDTO(Provider::fromString('QCL', 'json'), $qclData);
//          $processPayloadService = new ProcessPayloadService($registeredDevicesRepository, $userDevicesRepository, $identifiersFinderFactory, $commandBus);
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

    public function index()
    {
        // On creer un message et on attend la reponse
        $generateUrlClient = new RabbitMQ('guest', 'guest');

        $message = new \stdClass;
        $message->consumer = 'Output';
        $message->content = 'Felix Pons';
        
        $response = $generateUrlClient->publish(serialize($message), '', 'hello');
       
        
        return new Response('Felix Pons');
    }        
}
