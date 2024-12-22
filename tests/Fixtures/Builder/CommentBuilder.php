<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\User;
use App\Tests\Fixtures\Factory\CommentFactory;
use App\Entity\Comment;
use App\Entity\Chapter;
use App\Entity\Excercise;
use App\Entity\Video;

class CommentBuilder implements BuilderInterface
{
    private ?string $content = null;
    private ?User $author = null;
    private ?Comment $parentComment = null;
    private ?Chapter $chapter = null;
    private ?Excercise $excercise = null;
    private ?Video $video = null;
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

    public function withContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function withAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function withParentComment(Comment $parentComment): self
    {
        $this->parentComment = $parentComment;

        return $this;
    }

    public function withChapter(Chapter $chapter): self
    {
        $this->chapter = $chapter;

        return $this;
    }

    public function withExcercise(Excercise $excercise): self
    {
        $this->excercise = $excercise;

        return $this;
    }

    public function withVideo(Video $video): self
    {
        $this->video = $video;

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

    public function build(bool $persist = true): Comment
    {
        $comment = CommentFactory::createOne(array_filter([
            'content' => $this->content,
            'author' => $this->author,
            'parentComment' => $this->parentComment,
            'chapter' => $this->chapter,
            'excercise' => $this->excercise,
            'video' => $this->video,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $comment->_save();
        }

        return $comment->_real();
    }
}