<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
    public function prepare()
    {
        $config = json_decode(file_get_contents(__DIR__ . '/composer.json'), true);

        $config['name'] = 'codeception/phpunit-wrapper-test';
        $config['require-dev']['codeception/codeception'] = getenv('CODECEPTION_VERSION');
        $config['require-dev']['codeception/lib-innerbrowser'] = '*';
        $config['require-dev']['codeception/module-asserts'] = '*';
        $config['require-dev']['codeception/module-cli'] = '*';
        $config['require-dev']['codeception/module-db'] = '*';
        $config['require-dev']['codeception/module-filesystem'] = '*';
        $config['require-dev']['codeception/module-phpbrowser'] = '*';
        $config['require-dev']['codeception/util-universalframework'] = '*';
        $config['replace'] = ['codeception/phpunit-wrapper' => '*'];

        file_put_contents(__DIR__ . '/composer.json', json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $this->_copyDir(__DIR__ . '/vendor/codeception/codeception/tests', __DIR__ . '/tests');
        $this->_copy(__DIR__ . '/vendor/codeception/codeception/codeception.yml', __DIR__ .'/codeception.yml');
        $this->_symlink(__DIR__ . '/vendor/bin/codecept', __DIR__ . '/codecept');
    }
}
