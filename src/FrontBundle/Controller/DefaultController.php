<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{    

    public function menuAction(Request $request)
    {
        $local = $request->getLocale();
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('BackBundle:Categories')->findByNom($local);
        //die(var_dump($categories));
        return $this->render('FrontBundle:Default:menu.html.twig', array(
          // Tout l'intérêt est ici : le contrôleur passe les variables nécessaires au template !
          'listCategories' => $categories
        ));
    }

    public function indexAction(Request $request)
    {
    	$local = $request->getLocale();

    	$em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('BackBundle:Categories')->findByLangue($local);

        return $this->render('FrontBundle:Default:index.html.twig', array(
            'categories' => $categories,
        ));
        //return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function produitsAction(Request $request, $id)
    {
    	$local = $request->getLocale();

        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('BackBundle:Produits')->FindByCategorie($local, $id);
  
        return $this->render('FrontBundle:Default:produits.html.twig', array(
            'categories' => $categories,
        ));
    }

    public function ficheAction(Request $request, $id)
    {
        $local = $request->getLocale();
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('BackBundle:Produits')->FindByNom($local, $id);

        return $this->render('FrontBundle:Default:product.html.twig', array(
          // Tout l'intérêt est ici : le contrôleur passe les variables nécessaires au template !
          'produits' => $produits
        ));
  }


}
