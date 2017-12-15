<?php

/*
 * This file is part of Laravel Whoops Editor.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cog\Tests\Laravel\WhoopsEditor\Unit\Providers;

use Cog\Tests\Laravel\WhoopsEditor\TestCase;

/**
 * Class WhoopsEditorServiceProviderTest.
 *
 * @package Cog\Tests\Laravel\WhoopsEditor\Unit\Providers
 */
class WhoopsEditorServiceProviderTest extends TestCase
{
    /** @var \Illuminate\Contracts\Config\Repository */
    private $config;

    protected function setUp()
    {
        putenv('APP_EDITOR=test');

        parent::setUp();

        $this->config = $this->app->make('config');
    }

    /** @test  */
    public function it_loads_package_config()
    {
        $this->assertNotEmpty($this->config->get('whoops-editor'));
    }

    /** @test  */
    public function it_gets_package_whoops_editor_variable_from_environment()
    {
        $editor = $this->config->get('whoops-editor.editor');

        $this->assertSame('test', $editor);
    }

    /** @test  */
    public function it_overwrites_app_editor_with_environment_value()
    {
        $editor = $this->config->get('app.editor');

        $this->assertSame('test', $editor);
    }
}
