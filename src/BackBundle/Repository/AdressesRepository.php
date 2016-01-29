<?php

namespace BackBundle\Repository;

/**
 * AdressesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdressesRepository extends \Doctrine\ORM\EntityRepository
{
	public function findByAdresse(){
		$q = $this->createQueryBuilder("a")
		  ->leftJoin("a.user", "u")->addSelect("u");

		$q = $q->getQuery();
		  
		return $q->getResult();
	}
}
