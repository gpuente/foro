<?php

class ExampleTest extends FeatureTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_basic_example()
    {
        $user = factory(\App\User::class)->create([
            'name'      => 'Guillermo Puente',
            'email'     => 'gpuente@styde.com',
        ]);

        $this->actingAs($user, 'api');

        $this->visit('api/user')
             ->see('Guillermo Puente');
    }
}
