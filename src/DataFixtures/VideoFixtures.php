<?php

namespace App\DataFixtures;

use App\Tests\Fixtures\ThereIs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $createdAt = new \DateTimeImmutable();
        $updatedAt = $createdAt->modify('+1 day');
        $deletedAt = $updatedAt->modify('+1 day');

        for ($i = 1; $i <= 20; $i++) {
            ThereIs::aVideo()
                ->withCreatedAt($createdAt)
                ->withUpdatedAt($updatedAt)
                ->withDeletedAt($deletedAt)
                ->build();
        }
    }

    public function getDependencies(): array
    {
        return [
            ChapterFixtures::class,
        ];
    }
}
{

}