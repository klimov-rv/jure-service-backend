<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Document::class;
    public function definition()
    {
        return [   
            'name' => $this->faker->name, 
            'category' => $this->faker->name,
            'text' => $this->faker->text(3000),
            'status' => $this->faker->name,
            'doc_template_id' => 1,
        ];
    }
}
