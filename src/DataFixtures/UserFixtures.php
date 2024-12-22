<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Tests\Fixtures\ThereIs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $createdAt = new \DateTimeImmutable();
        $updatedAt = $createdAt->modify('+1 day');
        $deletedAt = $updatedAt->modify('+1 day');

        $superAdmin = new User();
        $superAdmin->setUsername('Super Admin');
        $superAdmin->setEmail('super.admin@admineureka.fr');
        $password = $this->hasher->hashPassword($superAdmin, 'super_admin_eureka');
        $superAdmin->setPassword($password);
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN']);
        $superAdmin->setCreatedAt($createdAt);

        $manager->persist($superAdmin);

        $admin = new User();
        $admin->setUsername('Admin');
        $admin->setEmail('admin@eureka.fr');
        $password = $this->hasher->hashPassword($admin, 'admin_eureka');
        $admin->setPassword($password);
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setCreatedAt($createdAt);

        $manager->persist($admin);

        $teacher = new User();
        $teacher->setUsername('Teacher');
        $teacher->setEmail('teacher@eureka.fr');
        $password = $this->hasher->hashPassword($teacher, 'teacher_eureka');
        $teacher->setPassword($password);
        $teacher->setRoles(['ROLE_TEACHER']);
        $teacher->setCreatedAt($createdAt);

        $manager->persist($teacher);

        $student = new User();
        $student->setUsername('Student');
        $student->setEmail('student@eureka.fr');
        $password = $this->hasher->hashPassword($student, 'student_eureka');
        $student->setPassword($password);
        $student->setRoles(['ROLE_STUDENT']);
        $student->setCreatedAt($createdAt);

        $manager->persist($student);

        $banned = new User();
        $banned->setUsername('Banned');
        $banned->setEmail('banned@eureka.fr');
        $password = $this->hasher->hashPassword($banned, 'banned_eureka');
        $banned->setPassword($password);
        $banned->setRoles(['ROLE_BANNED']);
        $banned->setCreatedAt($createdAt);

        $manager->persist($banned);

        $manager->flush();

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