<?php

namespace BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BackBundle\Entity\Adresses;
use BackBundle\Form\AdressesType;

/**
 * Adresses controller.
 *
 */
class AdressesController extends Controller
{
    /**
     * Lists all Adresses entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository('BackBundle:Adresses')->findByAdresse();

        return $this->render('adresses/index.html.twig', array(
            'adresses' => $adresses,
        ));
    }

    /**
     * Creates a new Adresses entity.
     *
     */
    public function newAction(Request $request)
    {
        $adress = new Adresses();
        $form = $this->createForm(new AdressesType(), $adress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adress);
            $em->flush();

            return $this->redirectToRoute('adresses_show', array('id' => $adress->getId()));
        }

        return $this->render('adresses/new.html.twig', array(
            'adress' => $adress,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Adresses entity.
     *
     */
    public function showAction(Adresses $adress)
    {
        $deleteForm = $this->createDeleteForm($adress);

        return $this->render('adresses/show.html.twig', array(
            'adress' => $adress,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Adresses entity.
     *
     */
    public function editAction(Request $request, Adresses $adress)
    {
        $deleteForm = $this->createDeleteForm($adress);
        $editForm = $this->createForm(new AdressesType(), $adress);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adress);
            $em->flush();

            return $this->redirectToRoute('adresses_edit', array('id' => $adress->getId()));
        }

        return $this->render('adresses/edit.html.twig', array(
            'adress' => $adress,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Adresses entity.
     *
     */
    public function deleteAction(Request $request, Adresses $adress)
    {
        $form = $this->createDeleteForm($adress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adress);
            $em->flush();
        }

        return $this->redirectToRoute('adresses_index');
    }

    /**
     * Creates a form to delete a Adresses entity.
     *
     * @param Adresses $adress The Adresses entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Adresses $adress)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresses_delete', array('id' => $adress->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
