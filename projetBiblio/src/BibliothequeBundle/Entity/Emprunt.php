<?php

namespace BibliothequeBundle\Entity;

/**
 * Emprunt
 */
class Emprunt
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $datesortie;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datesortie
     *
     * @param string $datesortie
     *
     * @return Emprunt
     */
    public function setDatesortie($datesortie)
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    /**
     * Get datesortie
     *
     * @return string
     */
    public function getDatesortie()
    {
        return $this->datesortie;
    }
}

