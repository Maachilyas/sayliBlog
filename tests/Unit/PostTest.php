<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class PostTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
    }
    /** @test */
    public function it_has_a_slug_based_on_title()
    {
        $post = create('App\Post');
        $this->assertEquals($post->slug, str_slug($post->title));
    }

    /** @test */
    public function it_add_id_to_the_suffix_of_slug_when_title_exists()
    {
        $title = 'same title test';
        $post = create('App\Post', ['title' => $title]);
        $this->assertEquals($post->slug, str_slug($post->title));

        $post2 = create('App\Post', ['title' => $title]);
        $this->assertEquals($post2->slug, str_slug($post2->title) . '-' . $post2->id);
    }
}