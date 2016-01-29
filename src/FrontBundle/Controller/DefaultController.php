<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$local = $request->getLocale();

    	$em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('BackBundle:Categories')->findByLangue($local);

        $request->getSession()->set('_locale', $local);

        return $this->render('FrontBundle:Default:index.html.twig', array(
            'categories' => $categories,
        ));
        //return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function produitsAction(Request $request, $id)
    {
    	$local = $request->getLocale();

        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('BackBundle:Categories')->findByLangue($local, $id);

        $request->getSession()->set('_locale', $local);
        //die(var_dump($categories));
        return $this->render('FrontBundle:Default:produits.html.twig', array(
            'categories' => $categories,
        ));
    }
}
