<?php

namespace BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BackBundle\Entity\User;
use BackBundle\Entity\Adresses;
use BackBundle\Form\UserType;
use BackBundle\Form\AdressesType;
use BackBundle\Repository\UserRepository;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('BackBundle:User')->MyfindBy();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userManager = $container->get('fos_user.user_manager');

            $userSave = $userManager->createUser();
            $userSave->setUsername($user->getUsername());
            $userSave->setEmail($user->getEmail());
            //$userSave->addAdresse($user->getAdresse());
            $adresse = $user->getAdresse();
            foreach ($adresse as $key=>$value){

                $userSave->addAdresse($value);

            }
            $role = $user->getRoles();
            foreach ($role as $key=>$value) {

                $userSave->addRole($value);

            }
            $userManager->updateUser($user);

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $container = $this->container;
        $userManager = $container->get('fos_user.user_manager'); //faire appel au manager de fosuserbundle
        $userSave = $userManager->findUserBy(array('id'=> $user->getId()));

        $editForm = $this->createForm(new UserType(), $userSave);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $adresse = $user->getAdresse();

            foreach ($adresse as $key=>$value){

                $userSave->addAdresse($value);
                $value->setUser($userSave);

            }

           /* $container = $this->container;
            $userManager = $container->get('fos_user.user_manager');
            $userSave = $userManager->findUserBy(array('id'=> $user->getId()));

            $userSave->setUsername($user->getUsername());
            $userSave->setEmail($user->getEmail());
         

            $role = $user->getRoles();
            foreach ($role as $key=>$value) {

                $userSave->addRole($value);

            }*/
           
            $userManager->updateUser($userSave);

            $session = $request -> getSession();
            $session -> getFlashBag() -> add("info", "Opération validée : Adresse ajoutée  !");

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
