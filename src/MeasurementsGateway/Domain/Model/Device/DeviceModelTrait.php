<?php



namespace App\MeasurementsGateway\Domain\Model\Device;

/**
 *
 * @author felix
 */
trait DeviceModelTrait 
{
    /**
     *
     * @var string 
     */
    private $categoryId;

    /**
     *
     * @var App\MeasurementsGateway\Domain\Model\Device\Model\Model 
     */
    private $model;
    
    public function categoryId(): string
    {
        return $this->categoryId;
    }

    public function model(): Model\Model
    {
        return $this->model;
    }    
}
