<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\MeasurementsGateway\Domain\Model\Provider\IdentifiersFinder;

use App\MeasurementsGateway\Domain\Model\Device\Identifiers\Identifiers;

/**
 *
 * @author felix
 */
interface IdentifiersFinderInterface 
{

    /**
     * Searches device identifiers into the $data structure:
     * serial number, mac address, etc.
     */
    public function findIdentifiers($rawData) : Identifiers;
    
    /**
     * Retrieves from payload data to process
     */
    public function dataToProcress() : array;            
}
