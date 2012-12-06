<?php

namespace Watertank\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Watertank\ApiBundle\Entity\Image
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Image
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
     * @var string $FilePath
     *
     * @ORM\Column(name="FilePath", type="string", length=255)
     */
    private $FilePath;

    /**
     * @var \DateTime $CaptureDate
     *
     * @ORM\Column(name="CaptureDate", type="datetime")
     */
    private $CaptureDate;


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
     * Set FilePath
     *
     * @param string $filePath
     * @return Image
     */
    public function setFilePath($filePath)
    {
        $this->FilePath = $filePath;
    
        return $this;
    }

    /**
     * Get FilePath
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->FilePath;
    }

    /**
     * Set CaptureDate
     *
     * @param \DateTime $captureDate
     * @return Image
     */
    public function setCaptureDate($captureDate)
    {
        $this->CaptureDate = $captureDate;
    
        return $this;
    }

    /**
     * Get CaptureDate
     *
     * @return \DateTime 
     */
    public function getCaptureDate()
    {
        return $this->CaptureDate;
    }
}
