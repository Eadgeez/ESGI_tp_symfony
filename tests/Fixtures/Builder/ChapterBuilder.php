<?php

namespace App\Tests\Fixtures\Builder;

use App\Tests\Fixtures\Factory\ChapterFactory;
use App\Entity\Comment;
use App\Entity\Excercise;
use App\Entity\Subject;
use App\Entity\Video;

class ChapterBuilder implements BuilderInterface
{
    private ?string $name = null;
    private ?Subject $subject = null;
    private array $videos = [];
    private array $excercises = [];
    private array $comments = [];
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

    public function withName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function withSubject(Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function withVideo(Video $video): self
    {
        $this->videos[] = $video;

        return $this;
    }

    public function withExcercise(Excercise $excercise): self
    {
        $this->excercises[] = $excercise;

        return $this;
    }

    public function withComment(Comment $comment): self
    {
        $this->comments[] = $comment;

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
        $chapter = ChapterFactory::createOne(array_filter([
            'name' => $this->name,
            'subject' => $this->subject,
            'videos' => $this->videos,
            'excercises' => $this->excercises,
            'comments' => $this->comments,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $chapter->_save();
        }

        return $chapter->_real();
    }
}