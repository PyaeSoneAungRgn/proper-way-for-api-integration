<?php

namespace App\Services\Opentdb\DataFactories;

use App\Services\Opentdb\DataObjects\Question;
use Illuminate\Support\Collection;

class QuestionFactory
{
    public static function collection(array $questions): Collection
    {
        return (new Collection(
            items: $questions,
        ))->map(
            fn ($question): Question =>
            static::new(attributes: $question),
        );
    }

    public static function new(array $attributes): Question
    {
        return (new static)->make(
            attributes: $attributes,
        );
    }

    public function make(array $attributes): Question
    {
        return new Question(
            category: data_get($attributes, 'category'),
            type: data_get($attributes, 'type'),
            difficulty: data_get($attributes, 'difficulty'),
            question: data_get($attributes, 'question'),
            correctAnswer: data_get($attributes, 'correct_answer'),
            incorrectAnswers: data_get($attributes, 'incorrect_answers', []),
        );
    }
}
