<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\OrderBy;

/**
 * @extends ServiceEntityRepository<Vehicle>
 *
 * @method Vehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicle[]    findAll()
 * @method Vehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

//    /**
//     * @return Vehicle[] Returns an array of Vehicle objects
//     */

      public function lastTree()
          {
              return $this->createQueryBuilder('b')
                  ->orderBy('b.id', 'DESC')
                  ->setMaxResults(3)
                  ->getQuery()
                  ->getResult()
              ;
          }


          public function findAllSortedByPrice($order = 'ASC')
          {
              return $this->createQueryBuilder('v')
                  ->orderBy('v.prix', $order)
                  ->getQuery()
                  ->getResult();
          }
      
 /**
     * Récupère les véhicules dans une plage de prix donnée.
     *
     * @param int $minPrice
     * @param int $maxPrice
     * @return Vehicle[]
     */
    public function findByPriceRange($minPrice, $maxPrice): array
    
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.prix >= :minPrice')
            ->andWhere('v.prix <= :maxPrice')
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->getQuery()
            ->getResult();
    }

      public function findByFilters($filters)
        {
          $qb = $this->createQueryBuilder('v');
  
  
          // Filtrer par date maximale
          if (isset($filters['maxKilometrage'])) {
            $qb->andWhere('v.kilometrage <= :maxKilometrage')
               ->setParameter('maxKilometrage', $filters['maxKilometrage']);
          }

           // Filtrer par prix maximal
           if (isset($filters['maxPrix'])) {
            $qb->andWhere('v.prix <= :maxPrix')
               ->setParameter('maxPrix', $filters['maxPrix']);
        }
  
        
          // Exécutez la requête et retournez les résultats
          return $qb->getQuery()->getResult();
      }

      }
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vehicle
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

