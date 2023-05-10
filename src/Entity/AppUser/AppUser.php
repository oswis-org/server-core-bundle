<?php

/**
 * @noinspection PhpUnused
 * @noinspection MethodShouldBeFinalInspection
 */

declare(strict_types=1);

namespace OswisOrg\ServerCoreBundle\Entity\AppUser;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Cache;
use OswisOrg\ServerCoreBundle\Repository\AppUser\AppUserRepository;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * An account of (real) user of application (i.e. person who can use the app).
 *
 * AppUser represents account for the user of the application using username or e-mail address as unique identifier.
 *
 * @author Jakub Zak <mail@jakubzak.eu>
 */
#[ORM\Entity(repositoryClass: AppUserRepository::class)]
#[Cache(usage: 'NONSTRICT_READ_WRITE', region: 'core_app_user')]
#[ApiResource]
class AppUser implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?string $id = null;

    #[ORM\Column(type: 'string', unique: true, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(type: 'string', unique: true, nullable: true)]
    private ?string $eMail = null;

    private ?string $plainPassword = null;

    /**
     * @return array<string>
     */
    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    public function getUserIdentifier(): string
    {
        return $this->getUsername() ?? $this->getEMail() ?? '';
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getEMail(): ?string
    {
        return $this->eMail;
    }

    public function setEMail(?string $eMail): void
    {
        $this->eMail = $eMail;
    }

    public function getPassword(): ?string
    {
        return null;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }
}
