<?php

/*
 * This file is part of Laravel Whoops Editor.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\WhoopsEditor\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class WhoopsEditorServiceProvider.
 *
 * @package Cog\Laravel\WhoopsEditor\Providers
 */
class WhoopsEditorServiceProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Contracts\Config\Repository
     */
    private $config;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishes();
        $this->overwriteAppConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
    }

    /**
     * Setup the configuration for Whoops Editor.
     *
     * @return void
     */
    protected function configure()
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
    protected function registerPublishes()
    {
        $this->publishes([
            __DIR__ . '/../../config/whoops-editor.php' => config_path('whoops-editor.php'),
        ], 'config');
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
     * Overwrite application editor config with Whoops Editor.
     *
     * @return void
     */
    protected function overwriteAppConfig()
    {
        $this->config = $this->app->make('config');
        $editor = $this->resolveEditor();
        $editorConfig = $this->config->get('whoops-editor.editors.' . $editor);
        if (!$editorConfig) {
            $this->overwriteAppEditor($editor);

            return;
        }

        $this->overwriteAppEditor(function ($filePath, $line) use ($editorConfig) {
            $filePath = $this->resolveFilePath($filePath);

            if (is_string($editorConfig)) {
                return $this->buildUri($editorConfig, $filePath, $line);
            }

            $editorConfig['url'] = $this->buildUri($editorConfig['url'], $filePath, $line);

            return $editorConfig;
        });
    }

    /**
     * Overwrite application editor configuration value.
     *
     * @param string|\Closure $editor
     */
    protected function overwriteAppEditor($editor)
    {
        $this->config->set('app.editor', $editor);
    }

    /**
     * Resolve code editor.
     *
     * @return mixed
     */
    protected function resolveEditor()
    {
        return $this->config->get('app.editor', $this->config->get('whoops-editor.editor'));
    }

    /**
     * Resolve file path when using Homestead.
     *
     * @param string $filePath
     * @return string
     */
    protected function resolveFilePath(string $filePath): string
    {
        $localPath = $this->config->get('whoops-editor.local-projects-path');
        $homesteadPath = $this->config->get('whoops-editor.homestead-projects-path');

        if (!$localPath || !$homesteadPath) {
            return $filePath;
        }

        $local = rtrim($localPath, '/');
        $homestead = rtrim($homesteadPath, '/');

        return str_replace("{$homestead}/", "{$local}/", $filePath);
    }
}
