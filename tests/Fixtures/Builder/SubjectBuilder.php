<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Subject;
use App\Tests\Fixtures\Factory\SubjectFactory;

class SubjectBuilder implements BuilderInterface
{
    private ?string $name = null;
    private array $chapters = [];
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

    public function withName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function withChapter(ChapterBuilder $chapterBuilder): self
    {
        $this->chapters[] = $chapterBuilder;

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
        $subject = SubjectFactory::createOne(array_filter([
            'name' => $this->name,
            'chapters' => $this->chapters,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $subject->_save();
        }

        return $subject->_real();
    }
}