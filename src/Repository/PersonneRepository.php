<?php

namespace App\Repository;

use App\Entity\Personne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Personne>
 *
 * @method Personne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personne[]    findAll()
 * @method Personne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personne::class);
    }

   /**
    * @return Personne[] Returns an array of Personne objects
    */
   public function findPersonneByAgeInterval($ageMin, $ageMax): array
   {
       return $this->createQueryBuilder('p')
           ->andWhere('p.age >= :ageMin AND p.age <= :ageMax')
           ->setParameter('ageMin', $ageMin)
           ->setParameter('ageMax', $ageMax)
           ->getQuery()
           ->getResult()
       ;
   }

}
