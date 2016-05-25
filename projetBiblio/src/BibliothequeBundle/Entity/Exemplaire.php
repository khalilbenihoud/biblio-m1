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
    private $cote;


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
     * Set cote
     *
     * @param string $cote
     *
     * @return Exemplaire
     */
    public function setCote($cote)
    {
        $this->cote = $cote;

        return $this;
    }

    /**
     * Get cote
     *
     * @return string
     */
    public function getCote()
    {
        return $this->cote;
    }
}

