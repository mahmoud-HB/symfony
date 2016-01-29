<?php

namespace BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BackBundle\Entity\Types;
use BackBundle\Form\TypesType;

/**
 * Types controller.
 *
 */
class TypesController extends Controller
{
    /**
     * Lists all Types entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $types = $em->getRepository('BackBundle:Types')->findAll();

        return $this->render('types/index.html.twig', array(
            'types' => $types,
        ));
    }

    /**
     * Creates a new Types entity.
     *
     */
    public function newAction(Request $request)
    {
        $type = new Types();
        $form = $this->createForm(new TypesType(), $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('types_show', array('id' => $types->getId()));
        }

        return $this->render('types/new.html.twig', array(
            'type' => $type,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Types entity.
     *
     */
    public function showAction(Types $type)
    {
        $deleteForm = $this->createDeleteForm($type);

        return $this->render('types/show.html.twig', array(
            'type' => $type,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Types entity.
     *
     */
    public function editAction(Request $request, Types $type)
    {
        $deleteForm = $this->createDeleteForm($type);
        $editForm = $this->createForm(new TypesType(), $type);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('types_edit', array('id' => $type->getId()));
        }

        return $this->render('types/edit.html.twig', array(
            'type' => $type,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Types entity.
     *
     */
    public function deleteAction(Request $request, Types $type)
    {
        $form = $this->createDeleteForm($type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($type);
            $em->flush();
        }

        return $this->redirectToRoute('types_index');
    }

    /**
     * Creates a form to delete a Types entity.
     *
     * @param Types $type The Types entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Types $type)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('types_delete', array('id' => $type->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
