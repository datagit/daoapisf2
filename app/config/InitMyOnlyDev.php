<?php

namespace App\Config;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Yaml\Yaml;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/8/16
 * Time: 10:08 AM
 */
class InitMyOnlyDev extends ContainerAwareCommand
{
    public static $PARAMETERS_FILE_NAME = array();
    public function __construct() {
        self::$PARAMETERS_FILE_NAME = array('parameters_dev.yml', 'parameters_test.yml', 'parameters_prod.yml');
    }

    public function checkKey() {
        //modified value in parameter
        $currentPath = dirname(getcwd());//web
        if (php_sapi_name() === 'cli' OR defined('STDIN')) {
            $currentPath = getcwd();//root
        }
        $configPath = $currentPath . '/app/config/';
        $origin = 'parameters.yml';
        $originValue = Yaml::parse(file_get_contents($configPath . $origin));

        //compare all keys
        $inValidEnvironment = array();
        $isMiss = false;
        $missKeys = array();
        foreach(self::$PARAMETERS_FILE_NAME as $e) {
            $envValue = Yaml::parse(file_get_contents($configPath . $e));
            $missKeys = array_keys(array_diff_key($originValue['parameters'], $envValue['parameters']));
            if(! empty($missKeys)) {
                $inValidEnvironment[] = $e;
                $isMiss = true;
            }
        }

        if($isMiss) {
            print_r( nl2br("Missed keys are:\n" . implode("\n", $missKeys)
                . "\nEnvironments are missed: ". implode(', ', $inValidEnvironment)
                . "\n=>FAILED"));
            return 0;
        }
        //sort
        foreach(self::$PARAMETERS_FILE_NAME as $e) {
            $NewEnvValue = Yaml::parse(file_get_contents($configPath . $e));
            $NewEnvValue['parameters']['assets_version'] = time();
            $str = Yaml::dump($NewEnvValue);
            //save to modify
            file_put_contents($configPath . $e, $str);
        }
        return 1;
    }
}

$init = new InitMyOnlyDev();
$init->checkKey();