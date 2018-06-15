<?php

namespace App\MeasurementsGateway\Domain\Model\Device\Identifiers;



/**
 * Description of identifiers
 *
 * @author felix
 */
class Identifiers implements \Iterator, \Countable 
{
    private $identifiers = [];
    
    public function add(string $value, string $identifierType)
    {
        $this->identifiers[$identifierType] = Identifier::fromString($value, $identifierType, IdentifierTypes::LISTING);
    }        
    
    public function current() 
    {
        return current($this->identifiers);
    }

    public function key(): \scalar 
    {
        return key($this->identifiers);
    }

    public function next(): void 
    {
        next($this->identifiers);
    }

    public function rewind(): void 
    {
        reset($this->identifiers);
    }

    public function valid(): bool 
    {
        return $this->key() !== null;
    }

    public function count()
    {
        return count($this->identifiers);
    }        
}
