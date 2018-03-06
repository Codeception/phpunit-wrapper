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
        $config = json_decode(file_get_contents(__DIR__ . '/composer.json'));

        $config['name'] = 'codeception/phpunit-wrapper-test';
        $config['require-dev']['codeception/codeception'] = '*';
        $config['replace'] = ['codeception/phpunit-wrapper' => '*'];

        file_put_contents(__DIR__ . '/composer.json', json_decode($config));
    }

    public function test($params)
    {
        return $this->_exec('./vendor/bin/codecept run -c vendor/codeception/codeception ' . $params);
    }
}