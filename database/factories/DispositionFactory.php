<?php

namespace Database\Factories;

use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disposition>
 */
class DispositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $instructions = [
            'Untuk ditindaklanjuti sesuai prosedur',
            'Mohon dipelajari dan dilaporkan',
            'Untuk diketahui dan diarsipkan',
            'Harap dikoordinasikan dengan unit terkait',
            'Segera ditindaklanjuti',
            'Untuk dilaksanakan sesuai ketentuan',
            'Mohon dikaji lebih lanjut',
            'Untuk diproses lebih lanjut',
            'Harap segera ditangani',
            'Untuk dibahas dalam rapat',
        ];

        return [
            'incoming_mail_id' => IncomingMail::factory(),
            'from_employee_id' => Employee::factory(),
            'to_employee_id' => Employee::factory(),
            'type' => $this->faker->randomElement(['for_action', 'for_information', 'completed', 'archived']),
            'instruction' => $this->faker->randomElement($instructions),
            'notes' => $this->faker->optional()->sentence(),
            'priority' => $this->faker->randomElement(['low', 'normal', 'high', 'urgent']),
            'due_date' => $this->faker->optional()->dateTimeBetween('now', '+30 days'),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'returned']),
            'received_at' => $this->faker->optional()->dateTimeBetween('-10 days', 'now'),
            'completed_at' => $this->faker->optional()->dateTimeBetween('-5 days', 'now'),
            'response' => $this->faker->optional()->paragraph(),
        ];
    }
}