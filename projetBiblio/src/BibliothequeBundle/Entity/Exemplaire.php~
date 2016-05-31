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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emprunter;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reserver;

    /**
     * @var \BibliothequeBundle\Entity\Livre
     */
    private $livre;

    /**
     * @var \BibliothequeBundle\Entity\Etagere
     */
    private $etagere;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emprunter = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reserver = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add emprunter
     *
     * @param \BibliothequeBundle\Entity\Emprunter $emprunter
     *
     * @return Exemplaire
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
     * Add reserver
     *
     * @param \BibliothequeBundle\Entity\Reserver $reserver
     *
     * @return Exemplaire
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
     * Set livre
     *
     * @param \BibliothequeBundle\Entity\Livre $livre
     *
     * @return Exemplaire
     */
    public function setLivre(\BibliothequeBundle\Entity\Livre $livre = null)
    {
        $this->livre = $livre;
    
        return $this;
    }

    /**
     * Get livre
     *
     * @return \BibliothequeBundle\Entity\Livre
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set etagere
     *
     * @param \BibliothequeBundle\Entity\Etagere $etagere
     *
     * @return Exemplaire
     */
    public function setEtagere(\BibliothequeBundle\Entity\Etagere $etagere = null)
    {
        $this->etagere = $etagere;
    
        return $this;
    }

    /**
     * Get etagere
     *
     * @return \BibliothequeBundle\Entity\Etagere
     */
    public function getEtagere()
    {
        return $this->etagere;
    }
}
