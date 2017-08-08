<?php

namespace Sasin91\LaravelConversations\Tests;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Assert as PHPUnit;
use Sasin91\LaravelRoutes\LaravelRouteServiceProvider;
use Sasin91\LaravelRoutes\Tests\Fixtures\DummyRoute;

class LaravelRoutesTest extends TestCase
{
	protected function getPackageProviders($app)
	{
		return [LaravelRouteServiceProvider::class];
	}

	protected function getPackageAliases($app)
	{
		return [
			//
		];
	}

	protected function setUp()
	{
		parent::setUp();

		Filesystem::macro('assertExists', function ($path) {
			PHPUnit::assertTrue(
				$this->exists($path),
				"[{$path}] does not exist."
			);
		});
	}

	protected function tearDown()
	{
		// Clean up
		$this->app['files']->deleteDirectory(app_path('Routes'));

		parent::tearDown();
	}

	/** @test */
	public function can_create_a_command()
	{
		$this->artisan('make:route', ['name' => 'Test']);

		$this->app['files']->assertExists(app_path('Routes').'/Test.php');
	}

	/** @test */
	public function registers_routes()
	{
		(new DummyRoute)->register();

		$this->assertTrue(Route::has('dummy-route'), 'Route was not registered.');
	}
}