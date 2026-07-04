<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quizz;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuizzAndQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();

        $quizzes = [
            [
                'title' => 'Laravel Basics',
                'category' => 'PHP',
                'time' => '10 minutes',
                'desc' => 'A beginner-friendly quiz on Laravel fundamentals.',
                'status' => 'active',
            ],
            [
                'title' => 'PHP Fundamentals',
                'category' => 'Programming',
                'time' => '12 minutes',
                'desc' => 'Test your understanding of core PHP concepts.',
                'status' => 'active',
            ],
            [
                'title' => 'Web Development Basics',
                'category' => 'Frontend',
                'time' => '8 minutes',
                'desc' => 'Quick questions on HTML, CSS, and JavaScript basics.',
                'status' => 'inactive',
            ],
        ];

        foreach ($quizzes as $quizData) {
            $quiz = Quizz::firstOrCreate(
                ['title' => $quizData['title']],
                $quizData
            );

            $questions = $this->getQuestionsForQuiz($quiz->title);

            foreach ($questions as $questionData) {
                Question::firstOrCreate(
                    [
                        'content' => $questionData['content'],
                        'quizz_id' => $quiz->id,
                    ],
                    [
                        'quizz_id' => $quiz->id,
                        'option_one' => $questionData['option_one'],
                        'option_two' => $questionData['option_two'],
                        'option_three' => $questionData['option_three'],
                        'option_four' => $questionData['option_four'],
                        'correct_key' => $questionData['correct_key'],
                        'correct_option' => $questionData['correct_option'],
                    ]
                );
            }
        }
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function getQuestionsForQuiz(string $quizTitle): array
    {
        return match ($quizTitle) {
            'Laravel Basics' => [
                [
                    'content' => 'What is the default template engine used in Laravel?',
                    'option_one' => 'Blade',
                    'option_two' => 'Twig',
                    'option_three' => 'Smarty',
                    'option_four' => 'Jinja',
                    'correct_key' => 'A',
                    'correct_option' => 'option_one',
                ],
                [
                    'content' => 'Which command creates a new Laravel controller?',
                    'option_one' => 'php artisan make:controller',
                    'option_two' => 'php artisan make:model',
                    'option_three' => 'php artisan make:request',
                    'option_four' => 'php artisan make:view',
                    'correct_key' => 'A',
                    'correct_option' => 'option_one',
                ],
                [
                    'content' => 'What does Eloquent represent in Laravel?',
                    'option_one' => 'A database query builder',
                    'option_two' => 'An ORM for models',
                    'option_three' => 'A routing system',
                    'option_four' => 'A queue worker',
                    'correct_key' => 'B',
                    'correct_option' => 'option_two',
                ],
            ],
            'PHP Fundamentals' => [
                [
                    'content' => 'Which keyword is used to define a class in PHP?',
                    'option_one' => 'function',
                    'option_two' => 'class',
                    'option_three' => 'interface',
                    'option_four' => 'trait',
                    'correct_key' => 'B',
                    'correct_option' => 'option_two',
                ],
                [
                    'content' => 'What does PHP stand for?',
                    'option_one' => 'Personal Home Page',
                    'option_two' => 'Preprocessed Hypertext Page',
                    'option_three' => 'Programming Hypertext Processor',
                    'option_four' => 'Public Hosting Platform',
                    'correct_key' => 'A',
                    'correct_option' => 'option_one',
                ],
            ],
            default => [
                [
                    'content' => 'Which tag is used to define a paragraph in HTML?',
                    'option_one' => '<p>',
                    'option_two' => '<div>',
                    'option_three' => '<span>',
                    'option_four' => '<section>',
                    'correct_key' => 'A',
                    'correct_option' => 'option_one',
                ],
            ],
        };
    }
}
