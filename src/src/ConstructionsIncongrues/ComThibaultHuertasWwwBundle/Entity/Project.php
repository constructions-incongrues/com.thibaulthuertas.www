<?php

namespace ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 */
class Project
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $slug;


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
     * Set title
     *
     * @param string $title
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Project
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * @var string
     */
    private $credits;


    /**
     * Set credits
     *
     * @param string $credits
     * @return Project
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    
        return $this;
    }

    /**
     * Get credits
     *
     * @return string 
     */
    public function getCredits()
    {
        return $this->credits;
    }
    /**
     * @var \DateTime
     */
    private $date_released;


    /**
     * Set date_released
     *
     * @param \DateTime $dateReleased
     * @return Project
     */
    public function setDateReleased($dateReleased)
    {
        $this->date_released = $dateReleased;
    
        return $this;
    }

    /**
     * Get date_released
     *
     * @return \DateTime 
     */
    public function getDateReleased()
    {
        return $this->date_released;
    }
}