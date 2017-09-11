<?php

namespace PlatypusBundle\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CheckerController extends Controller
{

    public function showAction($type, $id = null)
    {
        //$type = $request->attributes->get('type');

        $params = array("type"=>$type, "id"=>$id);
        return $this->render('PlatypusBundle:Checker:show_action.html.twig', $params);
    }
    public function showParamsAction(Request $request)
    {
        //$params = array("type"=>$type, "id"=>$id);
        //print_r($request->query->all());
        $getParams = $request->query->all();
        return $this->render('PlatypusBundle:Checker:show_params.html.twig', array(
            'getParams' => $getParams
        ));
    }
}
