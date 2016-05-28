<?php

namespace BibliothequeBundle\Entity;

/**
 * Exemplaire
 */
class Exemplaire
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $numeroExemplaire;


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
     * Set numeroExemplaire
     *
     * @param string $numeroExemplaire
     *
     * @return Exemplaire
     */
    public function setNumeroExemplaire($numeroExemplaire)
    {
        $this->numeroExemplaire = $numeroExemplaire;
    
        return $this;
    }

    /**
     * Get numeroExemplaire
     *
     * @return string
     */
    public function getNumeroExemplaire()
    {
        return $this->numeroExemplaire;
    }
}

