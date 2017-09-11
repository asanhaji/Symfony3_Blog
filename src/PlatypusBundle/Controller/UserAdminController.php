<?php

namespace PlatypusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PlatypusBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class UserAdminController extends Controller{

    public function userEditAction(Request $request, User $user) {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('PlatypusBundle\Form\AdminUserEdit', $user);
        $editForm->handleRequest($request);
        $securityContext = $this->container->get('security.authorization_checker');
        $this_user = $this->getUser();
        
        if (!$securityContext->isGranted('ROLE_ADMIN') &&   
           ($user->getId() != $this_user->getId() || !$securityContext->isGranted('ROLE_BLOGGER'))) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            if (!empty($user->getPlainPassword())) {
                $hash = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($hash);
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('notice', 'User successfully updated');
            return $this->redirectToRoute('platypus_adminuseredit', array('id' => $user->getId()));
        }

        return $this->render('PlatypusBundle:Admin:userEdit.html.twig', array(
                    'user' => $user,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function userDeleteAction(Request $request, User $user) {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }
        return $this->redirectToRoute('platypus_userlist');
    }
    
    private function createDeleteForm(User $user) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('platypus_adminuserdelete', array('id' => $user->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
