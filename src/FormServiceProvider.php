<?php

namespace LaravelAlpineForms;

use Illuminate\Pagination\Paginator;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class FormServiceProvider extends LaravelServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $this->callAfterResolving(BladeCompiler::class, function ($blade) {
      $blade->component('form', Components\Form::class);
      // $blade->component('select', Components\Select::class);
      // $blade->component('select', Components\Textarea::class);
    });

    $this->loadViewComponentsAs('input', [
      // Components\Input\Address::class,
      // Components\Input\Button::class,
      // Components\Input\Checkbox::class,
      // Components\Input\Color::class,
      // Components\Input\Date::class,
      // Components\Input\DatetimeLocal::class,
      // Components\Input\Email::class,
      // Components\Input\File::class,
      Components\Input\Hidden::class,
      // Components\Input\Image::class,
      // Components\Input\Month::class,
      Components\Input\Number::class,
      Components\Input\Password::class,
      // Components\Input\Phone::class,
      // Components\Input\Radio::class,
      // Components\Input\Range::class,
      // Components\Input\Reset::class,
      // Components\Input\Search::class,
      Components\Input\Submit::class,
      // Components\Input\Tel::class,
      Components\Input\Text::class,
      // Components\Input\Time::class,
      // Components\Input\Url::class,
      // Components\Input\Week::class,
    ]);

    $this->loadViewsFrom(__DIR__.'/Views', 'components');
    $this->publishes([
      __DIR__.'/Views' => resource_path('views/vendor/components'),
    ]);

    $this->publishes([
      __DIR__.'/Config/alpine-forms.php' => config_path('alpine-forms.php'),
    ]);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(
      __DIR__.'/Config/alpine-forms.php', 'alpine-forms'
    );
  }
}