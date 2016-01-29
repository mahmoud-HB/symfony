<?php
// src/AppBundle/Entity/User.php

namespace BackBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Adresses", cascade={"persist"}, mappedBy="user")
     *
     */
    private $adresse;

    /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Commandes", cascade={"persist"}, mappedBy="user")
     *
     */
    private $commande;


    /**
     * Add adresse
     *
     * @param \BackBundle\Entity\Adresses $adresse
     *
     * @return User
     */
    public function addAdresse(\BackBundle\Entity\Adresses $adresse)
    {
        $this->adresse[] = $adresse;

        return $this;
    }

    /**
     * Remove adresse
     *
     * @param \BackBundle\Entity\Adresses $adresse
     */
    public function removeAdresse(\BackBundle\Entity\Adresses $adresse)
    {
        $this->adresse->removeElement($adresse);
    }

    /**
     * Get adresse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add commande
     *
     * @param \BackBundle\Entity\Commandes $commande
     *
     * @return User
     */
    public function addCommande(\BackBundle\Entity\Commandes $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \BackBundle\Entity\Commandes $commande
     */
    public function removeCommande(\BackBundle\Entity\Commandes $commande)
    {
        $this->commande->removeElement($commande);
    }

    /**
     * Get commande
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /*
    public function setRoles($newRoles){

        $this->roles = $newRoles;
        return $this;
    }
    */
}
