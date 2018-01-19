<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadPostTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->post = create('App\Post');
    }
    /** @test */
    public function a_user_can_view_all_posts()
    {
        $this->get('/posts')
            ->assertSee($this->post->title);
    }

    /** @test */
    public function a_user_can_read_single_post()
    {
        $this->get($this->post->path())
            ->assertSee($this->post->title);
    }
}
