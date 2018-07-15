<?php

namespace App\MeasurementsGateway\Infrastructure\Service\Bus;

/**
 * Description of CommandBus
 *
 * @author felix
 */
interface CommandBusInterface 
{
     public function register($aCommandHandler);
     public function handle($aCommand);
}
