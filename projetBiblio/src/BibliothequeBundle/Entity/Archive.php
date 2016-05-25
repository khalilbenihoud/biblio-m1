<?php

namespace BibliothequeBundle\Entity;

/**
 * Archive
 */
class Archive
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $dateretour;

    /**
     * @var int
     */
    private $idinscrit;

    /**
     * @var int
     */
    private $idexemplaire;


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
     * Set dateretour
     *
     * @param string $dateretour
     *
     * @return Archive
     */
    public function setDateretour($dateretour)
    {
        $this->dateretour = $dateretour;
    
        return $this;
    }

    /**
     * Get dateretour
     *
     * @return string
     */
    public function getDateretour()
    {
        return $this->dateretour;
    }

    /**
     * Set idinscrit
     *
     * @param integer $idinscrit
     *
     * @return Archive
     */
    public function setIdinscrit($idinscrit)
    {
        $this->idinscrit = $idinscrit;
    
        return $this;
    }

    /**
     * Get idinscrit
     *
     * @return integer
     */
    public function getIdinscrit()
    {
        return $this->idinscrit;
    }

    /**
     * Set idexemplaire
     *
     * @param integer $idexemplaire
     *
     * @return Archive
     */
    public function setIdexemplaire($idexemplaire)
    {
        $this->idexemplaire = $idexemplaire;
    
        return $this;
    }

    /**
     * Get idexemplaire
     *
     * @return integer
     */
    public function getIdexemplaire()
    {
        return $this->idexemplaire;
    }
}

