<?php

namespace App\Tests\Fixtures\Builder;

class UserBuilder implements BuilderInterface
{
    private ?string $username = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $role = null;

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

    public function withRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function build(bool $persist = true): object
    {
        $user = User::CreateOne(array_filter([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ]));

        if ($persist) {
            $user->_save();
        }

        return $user->_real();
    }
}