<?php

namespace App\Tests\Fixtures;

use App\Tests\Fixtures\Builder\ChapterBuilder;
use App\Tests\Fixtures\Builder\SubjectBuilder;
use App\Tests\Fixtures\Builder\UserBuilder;

class ThereIs
{
    public static function aUser(): UserBuilder
    {
        return new UserBuilder();
    }

    public static function aSubject(): SubjectBuilder
    {
        return new SubjectBuilder();
    }

    public static function aChapter(): ChapterBuilder
    {
        return new ChapterBuilder();
    }

    public static function aExcercise(): ExcerciseBuilder
    {
        return new ExcerciseBuilder();
    }

    public static function aQuestion(): QuestionBuilder
    {
        return new QuestionBuilder();
    }

    public static function aVideo(): VideoBuilder
    {
        return new VideoBuilder();
    }

    public static function aComment(): CommentBuilder
    {
        return new CommentBuilder();
    }
}