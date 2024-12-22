<?php

namespace App\DataFixtures;

use App\Tests\Fixtures\ThereIs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $createdAt = new \DateTimeImmutable();
        $updatedAt = $createdAt->modify('+1 day');
        $deletedAt = $updatedAt->modify('+1 day');

        ThereIs::aSubject()
            ->withName('Mathematiques')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Physique - Chimie')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Science et Vie de la Terre')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Histoire - Geographie')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Francais')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Philosophy')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Sciences Economiques et Sociales')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Informatique')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Anglais')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Espagnol')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();

        ThereIs::aSubject()
            ->withName('Allemand')
            ->withCreatedAt($createdAt)
            ->withUpdatedAt($updatedAt)
            ->withDeletedAt($deletedAt)
            ->build();
    }
}
