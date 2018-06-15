<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\MeasurementsGateway\Domain\Model\UserDevice;

/**
 * Description of Subscription
 *
 * @author felix
 */
class Subscription 
{
    private $dateFrom;
    private $dateTo;

    public function __construct(\DateTimeImmutable $dateFrom, \DateTimeInterface $dateTo) 
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }
    
    public function isDateTimeWithinPeriodOfActivity($dateTime = null) 
    {
        if (null === $dateTime) {
            $dateTime = new DateTime();
        } else {
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        }

        if (!is_null($this->dateFrom)) {
            if ($dateTime < $this->dateFrom) {
                return false;
            }
        }
        if (!is_null($this->dateTo)) {
            $this->dateTo->add(new DateInterval('P1D'));

            if ($dateTime >= $this->dateTo) {
                return false;
            }
        }

        return true;
    }
}
