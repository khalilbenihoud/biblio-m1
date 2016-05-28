<?php

namespace BibliothequeBundle\Entity;

/**
 * Reserver
 */
class Reserver
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateReservation;


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
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reserver
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;
    
        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }
    /**
     * @var \BibliothequeBundle\Entity\Exemplaire
     */
    private $livre;

    /**
     * @var \BibliothequeBundle\Entity\Lecteur
     */
    private $lecteur;


    /**
     * Set livre
     *
     * @param \BibliothequeBundle\Entity\Exemplaire $livre
     *
     * @return Reserver
     */
    public function setLivre(\BibliothequeBundle\Entity\Exemplaire $livre)
    {
        $this->livre = $livre;
    
        return $this;
    }

    /**
     * Get livre
     *
     * @return \BibliothequeBundle\Entity\Exemplaire
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set lecteur
     *
     * @param \BibliothequeBundle\Entity\Lecteur $lecteur
     *
     * @return Reserver
     */
    public function setLecteur(\BibliothequeBundle\Entity\Lecteur $lecteur)
    {
        $this->lecteur = $lecteur;
    
        return $this;
    }

    /**
     * Get lecteur
     *
     * @return \BibliothequeBundle\Entity\Lecteur
     */
    public function getLecteur()
    {
        return $this->lecteur;
    }
}
