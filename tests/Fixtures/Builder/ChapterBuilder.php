<?php

namespace App\Tests\Fixtures\Builder;

use App\Tests\Fixtures\Factory\ChapterFactory;
use App\Entity\Chapter;
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

    public function build(bool $persist = true): Chapter
    {
        $chapter = ChapterFactory::createOne(array_filter([
            'name' => $this->name,
            'subject' => $this->subject,
            'videos' => $this->videos,
            'excercises' => $this->excercises,
            'comments' => $this->comments,
        ]));

        if ($persist) {
            $chapter->_save();
        }

        return $chapter->_real();
    }
}