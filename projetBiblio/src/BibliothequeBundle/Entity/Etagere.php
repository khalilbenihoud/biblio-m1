<?php

namespace BibliothequeBundle\Entity;

/**
 * Etagere
 */
class Etagere
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $numeroEtagere;


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
     * Set numeroEtagere
     *
     * @param integer $numeroEtagere
     *
     * @return Etagere
     */
    public function setNumeroEtagere($numeroEtagere)
    {
        $this->numeroEtagere = $numeroEtagere;
    
        return $this;
    }

    /**
     * Get numeroEtagere
     *
     * @return integer
     */
    public function getNumeroEtagere()
    {
        return $this->numeroEtagere;
    }
}

