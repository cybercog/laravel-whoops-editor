<?php

/*
 * This file is part of Laravel Whoops Editor.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\WhoopsEditor\Providers;

use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Support\ServiceProvider;

/**
 * Class WhoopsEditorServiceProvider.
 *
 * @package Cog\Laravel\WhoopsEditor\Providers
 */
class WhoopsEditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPublishes();
        $this->overwriteAppConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->configure();
    }

    /**
     * Setup the configuration for Whoops Editor.
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/whoops-editor.php', 'whoops-editor'
        );
    }

    /**
     * Setup the resource publishing groups for Whoops Editor.
     *
     * @return void
     */
    protected function registerPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/whoops-editor.php' => config_path('whoops-editor.php'),
        ], 'config');
    }

    /**
     * Overwrite application config with Whoops Editor.
     *
     * @return void
     */
    protected function overwriteAppConfig(): void
    {
        $config = $this->app->make('config');
        $editor = $this->resolveEditor($config);
        $editorConfig = $config->get('whoops-editor.editors.' . $editor);
        if (!$editorConfig) {
            return;
        }

        $config->set('app.editor', function ($filePath, $line) use ($config, $editorConfig) {
            $filePath = $this->resolveFilePath($config, $filePath);

            if (is_string($editorConfig)) {
                return $this->buildUri($editorConfig, $filePath, $line);
            }

            $editorConfig['url'] = $this->buildUri($editorConfig['url'], $filePath, $line);

            return $editorConfig;
        });
    }

    /**
     * Build URI for editor based on file path and line.
     *
     * @param string $uri
     * @param string $filePath
     * @param int $line
     * @return string
     */
    protected function buildUri(string $uri, string $filePath, int $line): string
    {
        $uri = str_replace('%file', $filePath, $uri);
        $uri = str_replace('%line', $line, $uri);

        return $uri;
    }

    /**
     * Resolve code editor.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @return mixed
     */
    protected function resolveEditor(ConfigContract $config)
    {
        return $config->get('app.editor', $config->get('whoops-editor.editor'));
    }

    /**
     * Resolve file path when using Homestead.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param string $filePath
     * @return string
     */
    protected function resolveFilePath(ConfigContract $config, string $filePath): string
    {
        $localPath = $config->get('whoops-editor.local-projects-path');
        $homesteadPath = $config->get('whoops-editor.homestead-projects-path');

        if (!$localPath || !$homesteadPath) {
            return $filePath;
        }

        $local = rtrim($localPath, '/');
        $homestead = rtrim($homesteadPath, '/');

        return str_replace("{$homestead}/", "{$local}/", $filePath);
    }
}
