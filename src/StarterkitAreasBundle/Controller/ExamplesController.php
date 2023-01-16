<?php

namespace StarterkitAreasBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ExamplesController extends FrontendController
{
    /**
     * @Route("/starterkit_areas")
     */
    public function defaultAction(Request $request)
    {
        return $this->render('@StarterkitAreas/Examples/default.html.twig');
    }
}
