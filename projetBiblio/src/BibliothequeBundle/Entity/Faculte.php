<?php

namespace BibliothequeBundle\Entity;

/**
 * Faculte
 */
class Faculte
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $designationFaculte;


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
     * Set designationFaculte
     *
     * @param string $designationFaculte
     *
     * @return Faculte
     */
    public function setDesignationFaculte($designationFaculte)
    {
        $this->designationFaculte = $designationFaculte;
    
        return $this;
    }

    /**
     * Get designationFaculte
     *
     * @return string
     */
    public function getDesignationFaculte()
    {
        return $this->designationFaculte;
    }
}

