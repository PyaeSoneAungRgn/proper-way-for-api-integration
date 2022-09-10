<?php

namespace App\Services\Opentdb\DataObjects;

use Illuminate\Support\Arr;

class Question
{
    public function __construct(
        public readonly string $category,
        public readonly string $type,
        public readonly string $difficulty,
        public readonly string $question,
        public readonly string $correctAnswer,
        public readonly array $incorrectAnswers
    ) {
    }

    public function toArray(): array
    {
        return [
            'question' => html_entity_decode($this->question),
            'correct_answer' => $this->correctAnswer,
            'answers' => Arr::shuffle([
                ...$this->incorrectAnswers,
                $this->correctAnswer
            ])
        ];
    }
}
