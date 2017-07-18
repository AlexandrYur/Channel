<?php

/**
 * This file is part of the Channel package.
 *
 */

namespace Channel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


/**
 * You need to include this `ChannelServiceProvider` in your app.php file:
 *
 * <code>
 *     'providers' => [
 *         'Channel\ServiceProvider'
 *     ];
 * </code>
 */
class ChannelServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Channel');

        Validator::extend('latin_only', function ($attribute, $value, $parameters, $validator) {
            return is_string($value) && preg_match('/^[a-zA-Z]+$/', $value);
        });

        Validator::replacer('latin_only', function ($message, $attribute, $rule, $parameters) {
            return sprintf('The %s may only contain the latin letters.', $attribute);
        });

    }
}

