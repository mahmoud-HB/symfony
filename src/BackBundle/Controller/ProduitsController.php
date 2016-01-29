<?php

namespace BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BackBundle\Entity\Produits;
use BackBundle\Entity\Traductions;
use BackBundle\Form\ProduitsType;
use BackBundle\Repository\ProduitsRepository;

/**
 * Produits controller.
 *
 */
class ProduitsController extends Controller
{
    /**
     * Lists all Produits entities.
     *
     */

    public function indexAction(Request $request)
    {
        $local = $request->getLocale();
        
        $em = $this->getDoctrine()->getManager();
        
        $produits = $em->getRepository('BackBundle:Produits')->FindProduct($local);

       
        $request->getSession()->set('_locale', $local);
        //$url = $this->container->get('router')->generate('home', array('_locale' => $local));

        return $this->render('produits/index.html.twig', array(
            'produits' => $produits,
        ));
    }

    /**
     * Creates a new Produits entity.
     *
     */
    public function newAction(Request $request)
    {
        $produit = new Produits();
        $transFr = new Traductions();

        $transFr->setLangue('fr');
        $transFr->setProduit( $produit ); 
        $produit->addTraduction($transFr);

        $transEn = new Traductions();
        $transEn->setLangue('en');
        $transEn->setProduit( $produit ); 
        $produit->addTraduction($transEn);

        $form = $this->createForm(new ProduitsType(), $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produits_show', array('id' => $produit->getId()));
        }

        return $this->render('produits/new.html.twig', array(
            'produit' => $produit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Produits entity.
     *
     */
    public function showAction(Produits $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);

        return $this->render('produits/show.html.twig', array(
            'produit' => $produit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Produits entity.
     *
     */
    public function editAction(Request $request, Produits $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);
        $editForm = $this->createForm(new ProduitsType(), $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('home_back', array('id' => $produit->getId()));
        }

        return $this->render('produits/edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produits entity.
     *
     */
    public function deleteAction(Request $request, Produits $produit)
    {
        $form = $this->createDeleteForm($produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produit);
            $em->flush();
        }

        return $this->redirectToRoute('produits_index');
    }

    /**
     * Creates a form to delete a Produits entity.
     *
     * @param Produits $produit The Produits entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produits $produit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produits_delete', array('id' => $produit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
