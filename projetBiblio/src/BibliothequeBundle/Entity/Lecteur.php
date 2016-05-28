<?php

namespace BibliothequeBundle\Entity;

/**
 * Lecteur
 */
class Lecteur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomLecteur;

    /**
     * @var string
     */
    private $prenomLecteur;

    /**
     * @var int
     */
    private $cycleLecteur;


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
     * Set nomLecteur
     *
     * @param string $nomLecteur
     *
     * @return Lecteur
     */
    public function setNomLecteur($nomLecteur)
    {
        $this->nomLecteur = $nomLecteur;
    
        return $this;
    }

    /**
     * Get nomLecteur
     *
     * @return string
     */
    public function getNomLecteur()
    {
        return $this->nomLecteur;
    }

    /**
     * Set prenomLecteur
     *
     * @param string $prenomLecteur
     *
     * @return Lecteur
     */
    public function setPrenomLecteur($prenomLecteur)
    {
        $this->prenomLecteur = $prenomLecteur;
    
        return $this;
    }

    /**
     * Get prenomLecteur
     *
     * @return string
     */
    public function getPrenomLecteur()
    {
        return $this->prenomLecteur;
    }

    /**
     * Set cycleLecteur
     *
     * @param integer $cycleLecteur
     *
     * @return Lecteur
     */
    public function setCycleLecteur($cycleLecteur)
    {
        $this->cycleLecteur = $cycleLecteur;
    
        return $this;
    }

    /**
     * Get cycleLecteur
     *
     * @return integer
     */
    public function getCycleLecteur()
    {
        return $this->cycleLecteur;
    }
}

