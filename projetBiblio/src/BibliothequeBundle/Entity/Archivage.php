<?php

namespace BibliothequeBundle\Entity;

/**
 * Archivage
 */
class Archivage
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idLecteur;

    /**
     * @var int
     */
    private $idExemplaire;

    /**
     * @var \DateTime
     */
    private $dateRetour;


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
     * Set idLecteur
     *
     * @param integer $idLecteur
     *
     * @return Archivage
     */
    public function setIdLecteur($idLecteur)
    {
        $this->idLecteur = $idLecteur;
    
        return $this;
    }

    /**
     * Get idLecteur
     *
     * @return integer
     */
    public function getIdLecteur()
    {
        return $this->idLecteur;
    }

    /**
     * Set idExemplaire
     *
     * @param integer $idExemplaire
     *
     * @return Archivage
     */
    public function setIdExemplaire($idExemplaire)
    {
        $this->idExemplaire = $idExemplaire;
    
        return $this;
    }

    /**
     * Get idExemplaire
     *
     * @return integer
     */
    public function getIdExemplaire()
    {
        return $this->idExemplaire;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Archivage
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;
    
        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }
}
