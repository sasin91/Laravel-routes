<?php

namespace Sasin91\LaravelRoutes\Tests\Fixtures;

use Illuminate\Support\Facades\Route;

class DummyRoute
{
	public function register()
	{
		Route::name('dummy-route')->get('dummy-route', function () {
			return 'hello world';
		});
	}
}