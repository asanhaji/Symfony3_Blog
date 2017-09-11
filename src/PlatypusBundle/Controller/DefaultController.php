<?php

namespace PlatypusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function error404Action(Request $request)
    {
        return $this->render('PlatypusBundle:Exception:error404.html.twig');
    }
    
     public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $posts = $em->getRepository('PlatypusBundle:Post')->findBy(array(), array('creationDate' => 'desc'), 10);

        return $this->render('PlatypusBundle:Default:index.html.twig', array(
                    'posts' => $posts,
                    'user' => $user
        ));
    }
}
