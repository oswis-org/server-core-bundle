<?php

declare(strict_types=1);

namespace OswisOrg\ServerCoreBundle\Repository\AppUser;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use OswisOrg\ServerCoreBundle\Entity\AppUser\AppUser;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

/**
 * @extends ServiceEntityRepository<AppUser>
 */
class AppUserRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppUser::class);
    }

    final public function loadUserByIdentifier(string $identifier): ?AppUser
    {
        return null;
        // TODO: Implement loadUserByIdentifier() method.
    }
}
