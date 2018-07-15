<?php

namespace App\MeasurementsGateway\Infrastructure\Middleware\MessageBroker;

/**
 *
 * @author felix
 */
interface MessageBrokerInterface 
{
    public function publish($msg, $exchange = '',  $routingKey = '');
}
