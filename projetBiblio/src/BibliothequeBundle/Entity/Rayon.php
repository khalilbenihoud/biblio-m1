<?php

namespace BibliothequeBundle\Entity;

/**
 * Rayon
 */
class Rayon
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $designationRayon;


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
     * Set designationRayon
     *
     * @param string $designationRayon
     *
     * @return Rayon
     */
    public function setDesignationRayon($designationRayon)
    {
        $this->designationRayon = $designationRayon;
    
        return $this;
    }

    /**
     * Get designationRayon
     *
     * @return string
     */
    public function getDesignationRayon()
    {
        return $this->designationRayon;
    }
}

