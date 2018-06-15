<?php

namespace App\MeasurementsGateway\Domain\Model\HealthUserValues;

/**
 *
 * @author felix
 */
interface HealthUserValuesRepositoryInterface
{
    public function save(UserMeasurements $userMeasurements);
    
    public function update(UserMeasurement $userMeasurement);
    
    public function add(UserMeasurement $userMeasurement);
    
    public function findByDate(\DateTime $date, $userId);
}
