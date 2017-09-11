<?php

namespace PlatypusBundle\Controller;

use PlatypusBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 * @Route("post")
 */
class PostController extends Controller {

    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $posts = $em->getRepository('PlatypusBundle:Post')->findBy(array(), array('creationDate' => 'desc'));

        return $this->render('PlatypusBundle:Post:posts.html.twig', array(
                    'posts' => $posts,
                    'user' => $user
        ));
    }

    public function newAction(Request $request) {
        $post = new Post();
        $user = $this->getUser();
        $form = $this->createForm('PlatypusBundle\Form\PostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            $this->addFlash('notice', 'Post successfully added');
            return $this->redirectToRoute('platypus_postlist', array('id' => $post->getId()));
        }

        return $this->render('PlatypusBundle:Post:new.html.twig', array(
                    'post' => $post,
                    'form' => $form->createView(),
        ));
    }

    public function showAction(Post $post) {
        $deleteForm = $this->createDeleteForm($post);

        return $this->render('PlatypusBundle:Post:show.html.twig', array(
                    'post' => $post,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function postEditAction(Request $request, Post $post) {
        $user = $this->getUser();
        $securityContext = $this->container->get('security.authorization_checker');

        if (!$securityContext->isGranted('ROLE_ADMIN') &&   
           ($user->getId() != $post->getUser()->getId() || !$securityContext->isGranted('ROLE_BLOGGER'))) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }
        
        $deleteForm = $this->createDeleteForm($post);
        $editForm = $this->createForm('PlatypusBundle\Form\PostType', $post);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('notice', 'Post successfully updated');
            return $this->redirectToRoute('platypus_postedit', array('id' => $post->getId()));
        }

        return $this->render('PlatypusBundle:Post:edit.html.twig', array(
                    'post' => $post,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function postDeleteAction(Request $request, Post $post) {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);
        $user = $this->getUser();
        $securityContext = $this->container->get('security.authorization_checker');
        
        if (!$securityContext->isGranted('ROLE_ADMIN') &&   
           ($user->getId() != $post->getUser()->getId() || !$securityContext->isGranted('ROLE_BLOGGER'))) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
            $this->addFlash('notice', 'Post successfully deleted');
        }
        return $this->redirectToRoute('platypus_postlist');
    }

    private function createDeleteForm(Post $post) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('platypus_postdelete', array('id' => $post->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
