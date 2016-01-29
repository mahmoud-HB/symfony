<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=255)
     */
    private $langue;

        /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Traductions", cascade={"persist"}, mappedBy="categorie")
     *
     */
    private $traduction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->traduction = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Categories
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set langue
     *
     * @param string $langue
     *
     * @return Categories
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Add traduction
     *
     * @param \BackBundle\Entity\Traductions $traduction
     *
     * @return Categories
     */
    public function addTraduction(\BackBundle\Entity\Traductions $traduction)
    {
        $this->traduction[] = $traduction;

        return $this;
    }

    /**
     * Remove traduction
     *
     * @param \BackBundle\Entity\Traductions $traduction
     */
    public function removeTraduction(\BackBundle\Entity\Traductions $traduction)
    {
        $this->traduction->removeElement($traduction);
    }

    /**
     * Get traduction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTraduction()
    {
        return $this->traduction;
    }
}
