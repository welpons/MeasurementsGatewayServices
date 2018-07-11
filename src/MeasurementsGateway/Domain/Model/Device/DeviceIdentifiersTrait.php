<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\MeasurementsGateway\Domain\Model\Device;

/**
 *
 * @author felix
 */
trait DeviceIdentifiersTrait 
{
    /**
     *
     * @var App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifier
     */
    private $referenceIdentifier;

    /**
     *
     * @var App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifiers
     */
    private $identifiers;
    
    /**
     * 
     * @param \App\MeasurementsGateway\Domain\Model\Device\Identifier $identifier
     * @param boolean $isReferenceIdentifier
     */
    public function addIdentifier(Identifiers\Identifier $identifier, $isReferenceIdentifier = false)
    {
        $this->identifiers->add($identifier, $isReferenceIdentifier);
    }        
    

    public function changeReferenceIdentifier(Identifiers\Identifier $identifier)
    {
        $this->identifiers->changeReferenceIdentifier($identifier);
    }   

    public function identifiers(): Identifiers\Identifiers
    {
        return $this->identifiers;
    }

    public function getReferenceIdentifier(): Identifiers\Identifier
    {
        return $this->identifiers->referenceIdentifier();
    }    
}
