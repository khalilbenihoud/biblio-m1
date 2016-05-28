<?php

namespace BibliothequeBundle\Entity;

/**
 * Livre
 */
class Livre
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titreLivre;

    /**
     * @var string
     */
    private $noticeLivre;


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
     * Set titreLivre
     *
     * @param string $titreLivre
     *
     * @return Livre
     */
    public function setTitreLivre($titreLivre)
    {
        $this->titreLivre = $titreLivre;
    
        return $this;
    }

    /**
     * Get titreLivre
     *
     * @return string
     */
    public function getTitreLivre()
    {
        return $this->titreLivre;
    }

    /**
     * Set noticeLivre
     *
     * @param string $noticeLivre
     *
     * @return Livre
     */
    public function setNoticeLivre($noticeLivre)
    {
        $this->noticeLivre = $noticeLivre;
    
        return $this;
    }

    /**
     * Get noticeLivre
     *
     * @return string
     */
    public function getNoticeLivre()
    {
        return $this->noticeLivre;
    }
}

