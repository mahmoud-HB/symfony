<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commandes
 *
 * @ORM\Table(name="commandes")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\CommandesRepository")
 */
class Commandes
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
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateprisecommande", type="datetime")
     */
    private $dateprisecommande;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\User", cascade={"persist"}, inversedBy="commande")
     *
     */
    private $user;

    /**
     * @var bool
     *
     * @ORM\Column(name="validate", type="boolean")
     */
    private $validate;

    /**
     * @var DateTime
     * 
     * @ORM\Column(name="send", type="datetime")
     */
    private $send;

    /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Panier", cascade={"persist"}, mappedBy="commande")
     *
     */
    private $panier;
 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->panier = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set total
     *
     * @param float $total
     *
     * @return Commandes
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set dateprisecommande
     *
     * @param \DateTime $dateprisecommande
     *
     * @return Commandes
     */
    public function setDateprisecommande($dateprisecommande)
    {
        $this->dateprisecommande = $dateprisecommande;

        return $this;
    }

    /**
     * Get dateprisecommande
     *
     * @return \DateTime
     */
    public function getDateprisecommande()
    {
        return $this->dateprisecommande;
    }

    /**
     * Set validate
     *
     * @param boolean $validate
     *
     * @return Commandes
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return boolean
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Set send
     *
     * @param \DateTime $send
     *
     * @return Commandes
     */
    public function setSend($send)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Get send
     *
     * @return \DateTime
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Set user
     *
     * @param \BackBundle\Entity\User $user
     *
     * @return Commandes
     */
    public function setUser(\BackBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BackBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add panier
     *
     * @param \BackBundle\Entity\Panier $panier
     *
     * @return Commandes
     */
    public function addPanier(\BackBundle\Entity\Panier $panier)
    {
        $this->panier[] = $panier;

        return $this;
    }

    /**
     * Remove panier
     *
     * @param \BackBundle\Entity\Panier $panier
     */
    public function removePanier(\BackBundle\Entity\Panier $panier)
    {
        $this->panier->removeElement($panier);
    }

    /**
     * Get panier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPanier()
    {
        return $this->panier;
    }
}
