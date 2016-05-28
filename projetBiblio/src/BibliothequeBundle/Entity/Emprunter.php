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
}

