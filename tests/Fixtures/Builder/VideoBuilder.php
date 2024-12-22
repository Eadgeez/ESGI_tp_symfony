<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Chapter;
use App\Entity\Comment;
use App\Tests\Fixtures\Factory\VideoFactory;

class VideoBuilder implements BuilderInterface
{
    private ?string $title = null;
    private ?string $url = null;
    private ?int $duration = null;
    private ?Chapter $chapter = null;
    private ?Comment $comment = null;
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

    public function withTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function withUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function withDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function withChapter(Chapter $chapter): self
    {
        $this->chapter = $chapter;

        return $this;
    }

    public function withComment(Comment $comment): self
    {
        $this->comment = $comment;

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
        $video = VideoFactory::CreateOne(array_filter([
            'title' => $this->title,
            'url' => $this->url,
            'duration' => $this->duration,
            'chapter' => $this->chapter,
            'comment' => $this->comment,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $video->_save();
        }

        return $video->_real();
    }
}