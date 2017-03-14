<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class PostModelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_adding_a_title_generates_a_slug()
    {
        $post = new Post([
        	'title' => 'Como instalar Laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);
    }

    public function test_editing_the_title_changes_the_slug(){
    	$post = new Post([
        	'title' => 'Como instalar Laravel'
        ]);

        $post->title = 'Como instalar Laravel 5.3 LTS';

        $this->assertSame('como-instalar-laravel-53-lts', $post->slug);
    }
}
