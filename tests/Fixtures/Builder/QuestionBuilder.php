<?php

namespace App\Tests\Fixtures\Builder;

use App\Entity\Excercise;
use App\Entity\Question;

class QuestionBuilder implements BuilderInterface
{
    private ?Excercise $excercise = null;
    private ?string $content = null;
    private ?string $hint = null;
    private ?string $answer = null;

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

    public function build(bool $persist = true): Question
    {
        $question = Question::createOne(array_filter([
            'excercise' => $this->excercise,
            'content' => $this->content,
            'hint' => $this->hint,
            'answer' => $this->answer,
        ]));

        if ($persist) {
            $question->_save();
        }

        return $question->_real();
    }

}