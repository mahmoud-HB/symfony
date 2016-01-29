<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monnaie
 *
 * @ORM\Table(name="monnaie")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\MonnaieRepository")
 */
class Monnaie
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="court", type="float")
     */
    private $court;


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
     * Set type
     *
     * @param string $type
     *
     * @return Monnaie
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set court
     *
     * @param float $court
     *
     * @return Monnaie
     */
    public function setCourt($court)
    {
        $this->court = $court;

        return $this;
    }

    /**
     * Get court
     *
     * @return float
     */
    public function getCourt()
    {
        return $this->court;
    }
}
