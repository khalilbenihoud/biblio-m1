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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rayon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livre_theme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rayon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->livre_theme = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rayon
     *
     * @param \BibliothequeBundle\Entity\Rayon $rayon
     *
     * @return Theme
     */
    public function addRayon(\BibliothequeBundle\Entity\Rayon $rayon)
    {
        $this->rayon[] = $rayon;
    
        return $this;
    }

    /**
     * Remove rayon
     *
     * @param \BibliothequeBundle\Entity\Rayon $rayon
     */
    public function removeRayon(\BibliothequeBundle\Entity\Rayon $rayon)
    {
        $this->rayon->removeElement($rayon);
    }

    /**
     * Get rayon
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRayon()
    {
        return $this->rayon;
    }

    /**
     * Add livreTheme
     *
     * @param \BibliothequeBundle\Entity\Livre $livreTheme
     *
     * @return Theme
     */
    public function addLivreTheme(\BibliothequeBundle\Entity\Livre $livreTheme)
    {
        $this->livre_theme[] = $livreTheme;
    
        return $this;
    }

    /**
     * Remove livreTheme
     *
     * @param \BibliothequeBundle\Entity\Livre $livreTheme
     */
    public function removeLivreTheme(\BibliothequeBundle\Entity\Livre $livreTheme)
    {
        $this->livre_theme->removeElement($livreTheme);
    }

    /**
     * Get livreTheme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivreTheme()
    {
        return $this->livre_theme;
    }

    public function __toString()
    {
        return $this->getDescriptionTheme();
    }
}
