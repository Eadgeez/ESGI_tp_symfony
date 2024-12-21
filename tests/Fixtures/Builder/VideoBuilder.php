<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Chapter;
use App\Entity\Comment;

class VideoBuilder implements BuilderInterface
{
    private ?string $title = null;
    private ?string $url = null;
    private ?int $duration = null;
    private ?Chapter $chapter = null;
    private ?Comment $comment = null;

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

    public function build(bool $persist = true): object
    {
        $video = Video::CreateOne(array_filter([
            'title' => $this->title,
            'url' => $this->url,
            'duration' => $this->duration,
            'chapter' => $this->chapter,
            'comment' => $this->comment,
        ]));

        if ($persist) {
            $video->_save();
        }

        return $video->_real();
    }
}