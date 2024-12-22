<?php

namespace App\DataFixtures;

use App\Tests\Fixtures\ThereIs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $createdAt = new \DateTimeImmutable();
        $updatedAt = $createdAt->modify('+1 day');
        $deletedAt = $updatedAt->modify('+1 day');

        // Create a super admin with the ROLE_SUPER_ADMIN role
        ThereIs::aUser()
            ->withUsername('Super Admin')
            ->withEmail('super.admin@eureka.fr')
            ->withPassword('super_admin_eureka')
            ->withRoles(['ROLE_SUPER_ADMIN'])
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        // Create an admin with the ROLE_ADMIN role
        ThereIs::aUser()
            ->withUsername('Admin')
            ->withEmail('admin@eureka.fr')
            ->withPassword('admin_eureka')
            ->withRoles(['ROLE_ADMIN'])
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        // Create a teacher with the ROLE_TEACHER role
        ThereIs::aUser()
            ->withUsername('Teacher')
            ->withEmail('teacher@eureka.fr')
            ->withPassword('teacher_eureka')
            ->withRoles(['ROLE_TEACHER'])
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        // Create a student with the ROLE_STUDENT role
        ThereIs::aUser()
            ->withUsername('Student')
            ->withEmail('student@eureka.fr')
            ->withPassword('student_eureka')
            ->withRoles(['ROLE_STUDENT'])
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        // Create a banned user with the ROLE_BANNED role
        ThereIs::aUser()
            ->withEmail('banned@eureka.fr')
            ->withPassword('banned_eureka')
            ->withRoles(['ROLE_BANNED'])
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        // Create 10 users with the ROLE_USER role
        for ($i = 0; $i < 10; $i++) {
            ThereIs::aUser()
                ->withCreatedAt($createdAt)
                ->withUpdatedAt($updatedAt)
                ->withDeletedAt($deletedAt)
                ->build();
        }
    }
}