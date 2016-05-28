<?php

namespace BibliothequeBundle\Entity;

/**
 * Theme
 */
class Theme
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $descriptionTheme;


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
     * Set descriptionTheme
     *
     * @param string $descriptionTheme
     *
     * @return Theme
     */
    public function setDescriptionTheme($descriptionTheme)
    {
        $this->descriptionTheme = $descriptionTheme;
    
        return $this;
    }

    /**
     * Get descriptionTheme
     *
     * @return string
     */
    public function getDescriptionTheme()
    {
        return $this->descriptionTheme;
    }
}

