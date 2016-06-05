<?php

namespace BibliothequeBundle\Entity;

/**
 * Emprunter
 */
class Emprunter
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateDebut;

    /**
     * @var \DateTime
     */
    private $dateFin;


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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Emprunter
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Emprunter
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
    /**
     * @var \BibliothequeBundle\Entity\Exemplaire
     */
    private $exemplaire;

    /**
     * @var \BibliothequeBundle\Entity\Lecteur
     */
    private $emprunteur;


    /**
     * Set exemplaire
     *
     * @param \BibliothequeBundle\Entity\Exemplaire $exemplaire
     *
     * @return Emprunter
     */
    public function setExemplaire(\BibliothequeBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaire = $exemplaire;
    
        return $this;
    }

    /**
     * Get exemplaire
     *
     * @return \BibliothequeBundle\Entity\Exemplaire
     */
    public function getExemplaire()
    {
        return $this->exemplaire;
    }

    /**
     * Set emprunteur
     *
     * @param \BibliothequeBundle\Entity\Lecteur $emprunteur
     *
     * @return Emprunter
     */
    public function setEmprunteur(\BibliothequeBundle\Entity\Lecteur $emprunteur)
    {
        $this->emprunteur = $emprunteur;
    
        return $this;
    }

    /**
     * Get emprunteur
     *
     * @return \BibliothequeBundle\Entity\Lecteur
     */
    public function getEmprunteur()
    {
        return $this->emprunteur;
    }
    //TODO: ajout toString
}
