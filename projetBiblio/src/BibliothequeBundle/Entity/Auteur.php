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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livres_ecrits;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livres_ecrits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livresEcrit
     *
     * @param \BibliothequeBundle\Entity\Livre $livresEcrit
     *
     * @return Auteur
     */
    public function addLivresEcrit(\BibliothequeBundle\Entity\Livre $livresEcrit)
    {
        $this->livres_ecrits[] = $livresEcrit;
    
        return $this;
    }

    /**
     * Remove livresEcrit
     *
     * @param \BibliothequeBundle\Entity\Livre $livresEcrit
     */
    public function removeLivresEcrit(\BibliothequeBundle\Entity\Livre $livresEcrit)
    {
        $this->livres_ecrits->removeElement($livresEcrit);
    }

    /**
     * Get livresEcrits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivresEcrits()
    {
        return $this->livres_ecrits;
    }

    public function __toString(){
        return $this->getNomAuteur().'-'.$this->getPrenomAuteur();
    }
}
