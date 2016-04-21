<?php

namespace Dao\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\RestBundle\Controller\FOSRestController;

// Get Route Definition
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class DefaultController extends FOSRestController {

    /**
     * GET Route annotation.
     * @Get("/posts/")
     * Collection get action
     * @var Request $request
     * @return array
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets all Pages",
     *   output = "Dao\DaoDataSourceBundle\Entity\Post",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DaoDataSourceBundle:Post')->findAll();


        //throw new HttpException(400, "New comment is not valid.");

        $statusCode = 200;

        $view = $this->view(array('statusCode' => $statusCode, 'data' => $entities ), $statusCode);
        return $this->handleView($view);
    }

    /**
     * GET Route annotation.
     * @Get("/post/{id}")
     * @var Request $request
     * @return array
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Page for a given id",
     *   output = "Dao\DaoDataSourceBundle\Entity\Post",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )//
     *
     */
    public function getAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DaoDataSourceBundle:Post')->find($id);

        $statusCode = 200;

        $view = $this->view(array('statusCode' => $statusCode, 'data' => $entities ), $statusCode);
        return $this->handleView($view);
    }
}
