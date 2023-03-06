<?php

namespace App\Repository;

use App\Entity\Article;
use Twilio\Rest\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function save(Article $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Article $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function Findprodbycat($n)
    {
        $entityManager=$this->getEntityManager();
        $query=$entityManager->createQuery("SELECT a FROM App\Entity\Article a JOIN a.categories c WHERE c.id=:n")->setParameter('n',$n);
        return $query->getResult();
    }
    

    public  function sms(string $quant){
        // Your Account SID and Auth Token from twilio.com/console
                $sid = 'ACdf205108665fa554493707ff38b480d9';
                $auth_token = '42e894a4f78aa01fd318be9d3f2272e8';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
        // A Twilio number you own with SMS capabilities
                $twilio_number = "+12762849300";
        
                $client = new Client($sid, $auth_token);
                $client->messages->create(
                // the number you'd like to send the message to
                    '+21655007082',
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => '+12766183398',
                        // the body of the text message you'd like to send
                        'body' => 'Le produit avec le nom "'. $quant .'" va bientot expire'
                    ]
                );
            }
            public  function sms1(string $quant){
                // Your Account SID and Auth Token from twilio.com/console
                        $sid = 'ACdf205108665fa554493707ff38b480d9';
                        $auth_token = '42e894a4f78aa01fd318be9d3f2272e8';
                // In production, these should be environment variables. E.g.:
                // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
                // A Twilio number you own with SMS capabilities
                        $twilio_number = "+12762849300";
                
                        $client = new Client($sid, $auth_token);
                        $client->messages->create(
                        // the number you'd like to send the message to
                            '+21655007082',
                            [
                                // A Twilio phone number you purchased at twilio.com/console
                                'from' => '+12766183398',
                                // the body of the text message you'd like to send
                                'body' => 'Le produit avec le nom "'. $quant .'" est out of sold'
                            ]
                        );
                    }
  /*  public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
      $persister = $this->_em->getUnitOfWork()->getEntityPersister($this->_entityName);
      
      return $persister ->loadAll($criteria, $orderBy, $limit, $offset);

    } */

//    /**
//     * @return Article[] Returns an array of Article objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}
