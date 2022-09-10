<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Opentdb\DataFactories\QuestionFactory;
use App\Services\Opentdb\OpentdbService;

class QuizGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz:game';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Quiz Game';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = app(OpentdbService::class)->question()->list()->json(); // call api
        $questions = QuestionFactory::collection($response['results']); // transform array to data object

        $randomQuestion = $questions->random()->toArray();
        $ans = $this->choice(
            $randomQuestion['question'],
            $randomQuestion['answers']
        );
        if ($ans == $randomQuestion['correct_answer']) {
            $this->info('Correct!');
        } else {
            $this->error('Incorrect!');
        }
    }
}
