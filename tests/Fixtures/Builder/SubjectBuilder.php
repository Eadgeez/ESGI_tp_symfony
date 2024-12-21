<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Subject;

class SubjectBuilder implements BuilderInterface
{
    private ?string $name = null;
    private array $chapters = [];

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

    public function build(bool $persist = true): object
    {
        $subject = Subject::CreateOne(array_filter([
            'name' => $this->name,
            'chapters' => $this->chapters,
        ]));

        if ($persist) {
            $subject->_save();
        }

        return $subject->_real();
    }
}