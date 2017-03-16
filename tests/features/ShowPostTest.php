<?php

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser([
            'name'      => 'Guillermo Puente'
        ]);

        $post = factory(Post::class)->make([
            'title'     => 'Este es el titulo del post',
            'content'   => 'Este es el contenido del post',
        ]);

        $user->posts()->save($post);

        // When
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }


    public function test_old_urls_are_redirected()
    {
        // Having
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title'     => 'Old title',
        ]);

        $user->posts()->save($post);

        $url = $post->url;

        $post->update(['title' => 'New title']);

        $this->visit($url)
            ->seePageIs($post->url);
    }
}
