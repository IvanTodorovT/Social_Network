<?php

class LikesTest extends TestCase
{
	public function test()
	{
		$user = factory(App\User::class)->create();

		$this->post('/like', ['table' => 'post', 'status' => 'like', 'refId' => 1])
		->see('Thank you');
		$this->post('/like', ['status' => 'like', 'refId' => 1])
		->see('Nothing');
		$this->post('/like', ['table' => 'post', 'status' => 'like', 'refId' => 1000])
		->see('Thank you');//bug! DB error should be fine in this case
	}
}