<?php

namespace App\Service;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactService extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param Contact $contact
     * @return bool
     * @throws \Exception
     */
    public function registerContact(Contact $contact)
    {
        try {
            $this->entityManager->persist($contact);
            //$this->entityManager->save();
            $this->entityManager->flush();


            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
    

}