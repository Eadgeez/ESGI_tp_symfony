<?php

namespace App\Tests\Fixtures\Builder;

use App\Tests\Fixtures\Factory\UserFactory;

class UserBuilder implements BuilderInterface
{
    private ?string $username = null;
    private ?string $email = null;
    private ?string $password = null;
    private array $roles = [];
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

    public function withUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function withEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function withPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function withRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function withCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function withUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function withDeletedAt(\DateTimeImmutable $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function build(bool $persist = true): object
    {
        $user = UserFactory::CreateOne(array_filter([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'roles' => $this->roles,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $user->_save();
        }

        return $user->_real();
    }
}