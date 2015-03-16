<?php

namespace Tableless\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class PostRepository
 */
class PostRepository extends EntityRepository
{
    /**
     * Get query builder
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $queryBuilder = $em->getRepository('TablelessModelBundle:Post')
            ->createQueryBuilder('p');

        return $queryBuilder;
    }

    /**
     * Find all in order
     *
     * @return array
     */
    public function findAllInOrder()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.createdAt', 'desc');

        return $qb->getQuery()->getResult();
    }
}
