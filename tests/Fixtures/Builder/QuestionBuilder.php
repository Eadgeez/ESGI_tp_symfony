<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Excercise;
use App\Entity\Question;
use App\Tests\Fixtures\Factory\QuestionFactory;

class QuestionBuilder implements BuilderInterface
{
    private ?Excercise $excercise = null;
    private ?string $content = null;
    private ?string $hint = null;
    private ?string $answer = null;
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $updatedAt = null;
    private ?\DateTimeImmutable $deletedAt = null;

    public function withExcercise(Excercise $excercise): self
    {
        $this->excercise = $excercise;

        return $this;
    }

    public function withContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function withHint(string $hint): self
    {
        $this->hint = $hint;

        return $this;
    }

    public function withAnswer(string $answer): self
    {
        $this->answer = $answer;

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

    public function build(bool $persist = true): Question
    {
        $question = QuestionFactory::createOne(array_filter([
            'excercise' => $this->excercise,
            'content' => $this->content,
            'hint' => $this->hint,
            'answer' => $this->answer,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ]));

        if ($persist) {
            $question->_save();
        }

        return $question->_real();
    }

}