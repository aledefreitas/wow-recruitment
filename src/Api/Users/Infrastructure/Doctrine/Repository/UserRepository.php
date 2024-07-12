<?php

namespace App\Api\Users\Infrastructure\Doctrine\Repository;

use App\Api\Users\Domain\Entity\User;
use App\Api\Users\Domain\Repository\UserRepositoryInterface;
use App\Common\Domain\ValueObject\Uuid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository<User>
 */
final class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, User::class);
    }

    public function findUserByUuid(Uuid $uuid): ?User
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->where('users.uuid = :uuid')
            ->setParameter('uuid', $uuid)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
