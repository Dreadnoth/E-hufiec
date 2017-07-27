<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 21:39
 */

namespace Zhp\BackendBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ZbiorkaRepository extends EntityRepository
{
    public function findAllForPage($page, $itemsPerPage = 10) {
        $em = $this->getEntityManager();

        $query = $em->createQuery("SELECT z FROM ZhpBackendBundle:Zbiorka z")
            ->setFirstResult($page * ($itemsPerPage - 1))
            ->setMaxResults($itemsPerPage);

        return new Paginator($query);
    }
}