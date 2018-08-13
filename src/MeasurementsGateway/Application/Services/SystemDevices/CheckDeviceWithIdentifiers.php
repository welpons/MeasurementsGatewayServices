<?php

namespace App\MeasurementsGateway\Application\Services\SystemDevices;

use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifiers;
use App\MeasurementsGateway\Application\Common\ApplicationServiceInterface;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * Description of checkDeviceWithIdentifiers
 *
 * @author felix
 */
class CheckDeviceWithIdentifiers implements CheckDeviceWithIdentifiersInterface
{
    private $endpoint;
    private $serializer;
    private $url;
    
    public function __construct(string $endpoint, SerializerInterface $serializer) 
    {
        $this->endpoint = $endpoint;
        $this->serializer = $serializer;
        $this->url = "http://{$endpoint}";
    }
        
    public function check(Identifiers $identifiers)
    {
        if (0 == $identifiers->count()) {
            return null;
        }
        
        $body = $this->encodeIdentifiers($identifiers);
        
        $response = $this->request($body);
        
        // TODO: Validate response body against a XSD Schema
        
        return $response;
    }        
    
    private function request(string $body)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);

	// For xml, change the content-type.
	curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 


	$result = curl_exec($ch);
	curl_close($ch);


        //convert the XML result into array
        $array_data = json_decode(json_encode(simplexml_load_string($result)), true);

      
        return $array_data;
    }        
    
    private function encodeIdentifiers(Identifiers $identifiers)
    {
        $arrayToEncode = [];
        
        foreach($identifiers as $identifier)
        {
            $arrayToEncode[] = $identifier->toArray();
        }    
        
        $body = ['identifier' => $arrayToEncode];
        return $this->serializer->encode($body, 'xml');
    }



}
