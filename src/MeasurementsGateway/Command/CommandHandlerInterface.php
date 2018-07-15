<?php

namespace App\MeasurementsGateway\Command;

/**
 *
 * @author felix
 */
interface CommandHandlerInterface 
{
    public function handle(CommandHandlerInterface $command);
}
