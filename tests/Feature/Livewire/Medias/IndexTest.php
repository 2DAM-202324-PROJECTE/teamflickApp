<?php

namespace Tests\Feature\Livewire\Medias;

use App\Livewire\Medias\IndexMedias;
use App\Models\Media;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(IndexMedias::class)
            ->assertStatus(200);
    }

    /** @test */
    public function component_exists_on_the_page()
    {
        $this->get('/medias')
            ->assertSeeLivewire(IndexMedias::class);
    }

    /** @test */
    public function displays_2_category_names()
    {
        $medias = Media::factory()->count(5)->create();
        $names = $medias->pluck('name');
        $test = Livewire::test(IndexMedias::class);
            foreach ($names as $name) {
                $test->assertSee($name);
            }
    }

    /** @test */
    public function sends_2_medias_to_view()
    {
        Media::factory()->count(2)->create();
        Livewire::test(IndexMedias::class)->assertViewHas('medias', function ($medias) {
            var_dump($medias);
            return count($medias) == 2;
        });
    }


}


