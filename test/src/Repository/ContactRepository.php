<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


/**
 * ServiceEntityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, \Contact::class);
        $this->entityManager = $entityManager;
    }

    /**
     * @return messages[]
     */
   public function findAllOrderedByName(): array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('m')
                     ->from('App\Entity\Contact', 'm')
                    ->orderBy('m.name', 'ASC');

        $query = $queryBuilder->getQuery();
        $messages = $query->getResult();

        return $messages;
    }
}
