<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class BlogRepository extends ServiceEntityRepository
{
    // ...
    public function __construct()
    {
    }

    public function findByQuery(string $query): array
    {
        if (empty($query)) {
            return [];
        }

        return $this->createQueryBuilder('b')
            ->andWhere('b.title LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
