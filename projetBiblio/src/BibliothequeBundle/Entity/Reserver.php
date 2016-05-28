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
}

