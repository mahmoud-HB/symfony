<?php

namespace BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BackBundle\Entity\Traductions;
use BackBundle\Form\TraductionsType;

/**
 * Traductions controller.
 *
 */
class TraductionsController extends Controller
{
    /**
     * Lists all Traductions entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $traductions = $em->getRepository('BackBundle:Traductions')->findAll();

        return $this->render('traductions/index.html.twig', array(
            'traductions' => $traductions,
        ));
    }

    /**
     * Creates a new Traductions entity.
     *
     */
    public function newAction(Request $request)
    {
        $traduction = new Traductions();
        $form = $this->createForm(new TraductionsType(), $traduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traduction);
            $em->flush();

            return $this->redirectToRoute('traductions_show', array('id' => $traductions->getId()));
        }

        return $this->render('traductions/new.html.twig', array(
            'traduction' => $traduction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Traductions entity.
     *
     */
    public function showAction(Traductions $traduction)
    {
        $deleteForm = $this->createDeleteForm($traduction);

        return $this->render('traductions/show.html.twig', array(
            'traduction' => $traduction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Traductions entity.
     *
     */
    public function editAction(Request $request, Traductions $traduction)
    {
        $deleteForm = $this->createDeleteForm($traduction);
        $editForm = $this->createForm(new TraductionsType(), $traduction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traduction);
            $em->flush();

            return $this->redirectToRoute('traductions_edit', array('id' => $traduction->getId()));
        }

        return $this->render('traductions/edit.html.twig', array(
            'traduction' => $traduction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Traductions entity.
     *
     */
    public function deleteAction(Request $request, Traductions $traduction)
    {
        $form = $this->createDeleteForm($traduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($traduction);
            $em->flush();
        }

        return $this->redirectToRoute('traductions_index');
    }

    /**
     * Creates a form to delete a Traductions entity.
     *
     * @param Traductions $traduction The Traductions entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Traductions $traduction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('traductions_delete', array('id' => $traduction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
