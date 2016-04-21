<?php

namespace Dao\DataSourceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {

        $a = Yaml::parse(file_get_contents('/var/www/html/dao/daoapisf2/app/config/parameters.yml'));
        var_dump($a);
        return array('name' => $name);
    }
}
