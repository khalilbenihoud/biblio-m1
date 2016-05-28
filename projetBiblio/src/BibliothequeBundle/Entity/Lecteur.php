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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reserver;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emprunter;

    /**
     * @var \BibliothequeBundle\Entity\Faculte
     */
    private $faculte;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reserver = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emprunter = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reserver
     *
     * @param \BibliothequeBundle\Entity\Reserver $reserver
     *
     * @return Lecteur
     */
    public function addReserver(\BibliothequeBundle\Entity\Reserver $reserver)
    {
        $this->reserver[] = $reserver;
    
        return $this;
    }

    /**
     * Remove reserver
     *
     * @param \BibliothequeBundle\Entity\Reserver $reserver
     */
    public function removeReserver(\BibliothequeBundle\Entity\Reserver $reserver)
    {
        $this->reserver->removeElement($reserver);
    }

    /**
     * Get reserver
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReserver()
    {
        return $this->reserver;
    }

    /**
     * Add emprunter
     *
     * @param \BibliothequeBundle\Entity\Emprunter $emprunter
     *
     * @return Lecteur
     */
    public function addEmprunter(\BibliothequeBundle\Entity\Emprunter $emprunter)
    {
        $this->emprunter[] = $emprunter;
    
        return $this;
    }

    /**
     * Remove emprunter
     *
     * @param \BibliothequeBundle\Entity\Emprunter $emprunter
     */
    public function removeEmprunter(\BibliothequeBundle\Entity\Emprunter $emprunter)
    {
        $this->emprunter->removeElement($emprunter);
    }

    /**
     * Get emprunter
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmprunter()
    {
        return $this->emprunter;
    }

    /**
     * Set faculte
     *
     * @param \BibliothequeBundle\Entity\Faculte $faculte
     *
     * @return Lecteur
     */
    public function setFaculte(\BibliothequeBundle\Entity\Faculte $faculte = null)
    {
        $this->faculte = $faculte;
    
        return $this;
    }

    /**
     * Get faculte
     *
     * @return \BibliothequeBundle\Entity\Faculte
     */
    public function getFaculte()
    {
        return $this->faculte;
    }
}
