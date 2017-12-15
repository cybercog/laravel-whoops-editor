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
        $this->overwriteConfig();
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
    protected function overwriteConfig(): void
    {
        $config = $this->app->make('config');
        $editorConfig = $config->get('whoops-editor.editors.' . $config->get('app.editor'));
        if (!$editorConfig) {
            return;
        }

        $config->set('app.editor', function ($filePath, $line) use ($editorConfig) {
            $homestead = rtrim(config('whoops-editor.homestead-projects-path', ''), '/');
            $local = rtrim(config('whoops-editor.local-projects-path', ''), '/');
            if (!$local) {
                return '';
            }

            $filePath = str_replace("{$homestead}/", "{$local}/", $filePath);

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
    private function buildUri(string $uri, string $filePath, int $line): string
    {
        $uri = str_replace('%file', $filePath, $uri);
        $uri = str_replace('%line', $line, $uri);

        return $uri;
    }
}
