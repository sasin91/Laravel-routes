<?php

namespace Sasin91\LaravelRoutes;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Sasin91\LaravelRoutes\Commands\MakeRouteCommand;

class LaravelRouteServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->commands(MakeRouteCommand::class);
	}

	public function register()
	{
		/** @var Filesystem $files */
		$files = $this->app->make('files');

		if (! $files->isDirectory($path = $this->app->path('Routes'))) {
			$files->makeDirectory($path);
		}

		$routes = $files->allFiles($path);

		collect($routes)
			->map(function ($file) {
				return str_before($file->getFileName(), '.php');
			})
			->each(function ($route) {
				$this->app->call([$route, 'register']);
			});
	}
}