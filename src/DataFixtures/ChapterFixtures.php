<?php

namespace App\DataFixtures;

use App\Tests\Fixtures\ThereIs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ChapterFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $createdAt = new \DateTimeImmutable();
        $updatedAt = $createdAt->modify('+1 day');
        $deletedAt = $updatedAt->modify('+1 day');

        for ($i = 1; $i <= 100; $i++) {
            ThereIs::aChapter()
                ->withName("Chapter $i")
                ->withCreatedAt($createdAt)
                ->withUpdatedAt($updatedAt)
                ->withDeletedAt($deletedAt)
                ->build();
        }
    }

    public function getDependencies(): array
    {
        return [
            SubjectFixtures::class,
        ];
    }
}