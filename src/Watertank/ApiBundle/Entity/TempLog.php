<?php

namespace Watertank\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Watertank\ApiBundle\Entity\TempLog
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TempLog
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $TempType
     *
     * @ORM\Column(name="TempType", type="integer")
     */
    private $TempType;

    /**
     * @var float $Temperature
     *
     * @ORM\Column(name="Temperature", type="float")
     */
    private $Temperature;

    /**
     * @var \DateTime $LoggingDate
     *
     * @ORM\Column(name="LoggingDate", type="datetime")
     */
    private $LoggingDate;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Temperature
     *
     * @param float $temperature
     * @return TempLog
     */
    public function setTemperature($temperature)
    {
        $this->Temperature = $temperature;
    
        return $this;
    }

    /**
     * Get Temperature
     *
     * @return float 
     */
    public function getTemperature()
    {
        return $this->Temperature;
    }

    /**
     * Set LoggingDate
     *
     * @param \DateTime $loggingDate
     * @return TempLog
     */
    public function setLoggingDate($loggingDate)
    {
        $this->LoggingDate = $loggingDate;
    
        return $this;
    }

    /**
     * Get LoggingDate
     *
     * @return \DateTime 
     */
    public function getLoggingDate()
    {
        return $this->LoggingDate;
    }

    /**
     * Set TempType
     *
     * @param integer $tempType
     * @return TempLog
     */
    public function setTempType($tempType)
    {
        $this->TempType = $tempType;
    
        return $this;
    }

    /**
     * Get TempType
     *
     * @return integer 
     */
    public function getTempType()
    {
        return $this->TempType;
    }
}