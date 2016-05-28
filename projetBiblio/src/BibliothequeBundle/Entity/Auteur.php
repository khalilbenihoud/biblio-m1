<?php

namespace BibliothequeBundle\Entity;

/**
 * Auteur
 */
class Auteur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomAuteur;

    /**
     * @var string
     */
    private $prenomAuteur;


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
     * Set nomAuteur
     *
     * @param string $nomAuteur
     *
     * @return Auteur
     */
    public function setNomAuteur($nomAuteur)
    {
        $this->nomAuteur = $nomAuteur;
    
        return $this;
    }

    /**
     * Get nomAuteur
     *
     * @return string
     */
    public function getNomAuteur()
    {
        return $this->nomAuteur;
    }

    /**
     * Set prenomAuteur
     *
     * @param string $prenomAuteur
     *
     * @return Auteur
     */
    public function setPrenomAuteur($prenomAuteur)
    {
        $this->prenomAuteur = $prenomAuteur;
    
        return $this;
    }

    /**
     * Get prenomAuteur
     *
     * @return string
     */
    public function getPrenomAuteur()
    {
        return $this->prenomAuteur;
    }
}

