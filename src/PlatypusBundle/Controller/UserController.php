<?php

namespace PlatypusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PlatypusBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller {

    public function userListAction() {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('PlatypusBundle:User')->findAll();

        return $this->render('PlatypusBundle:User:userList.html.twig', array(
                    'users' => $users,
        ));
    }

    public function showAction(User $user) {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('PlatypusBundle:User:show.html.twig', array(
                    'user' => $user,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function logoutAction() {
        $this->addFlash('success', 'You are now successfully logged out');
        return $this->redirectToRoute('platypus_homepage');
    }

    public function loginAction() {
        $securityContext = $this->container->get('security.authorization_checker');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
            $this->addFlash('notice', 'Welcome back ' . $user->getUsername());
            return $this->redirectToRoute('platypus_homepage');
        }

        $authUtils = $this->get('security.authentication_utils');
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('PlatypusBundle:User:login.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error,
        ));
    }

    public function registerAction(Request $request) {
        $securityContext = $this->container->get('security.authorization_checker');

        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('platypus_homepage');
        }

        $user = new User();
        $editForm = $this->createForm('PlatypusBundle\Form\UserRegister', $user);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $token = new UsernamePasswordToken(
                    $user, $user->getPassword(), 'main', $user->getRoles()
            );
            $this->get('security.token_storage')->setToken($token);
            $this->get('session')->set('_security_main', serialize($token));

            $this->addFlash('notice', 'You are now successfully registred');
            return $this->redirectToRoute('platypus_homepage');
        }
        return $this->render('PlatypusBundle:User:register.html.twig', array(
                    'form' => $editForm->createView(),
        ));
    }

    public function userEditAction(Request $request) {
        $securityContext = $this->container->get('security.authorization_checker');
         if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
             return $this->redirectToRoute('platypus_homepage');
         }
        $user = $this->getUser();
        $deleteForm = $this->createDeleteForm($user);

        $editForm = $this->createForm('PlatypusBundle\Form\UserEdit', $user);
        $editForm->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($user);
        if ($editForm->isSubmitted() && !count($errors)) {
            if (!empty($user->getNewPassword())) {
                $hash = $this->get('security.password_encoder')->encodePassword($user, $user->getNewPassword());
                $user->setPassword($hash);
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('notice', 'Account successfully updated ' . $user->getPlainPassword());
            return $this->redirectToRoute('platypus_useredit', array('id' => $user->getId(), 'request' => $request));
        }
        return $this->render('PlatypusBundle:User:edit.html.twig', array(
                    'user' => $user,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function userDeleteAction(Request $request) {
        $user = $this->getUser();
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }
        $this->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();
        return $this->redirectToRoute('platypus_homepage');
    }

    private function createDeleteForm(User $user) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('platypus_delete', array('id' => $user->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
