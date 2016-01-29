<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('send@example.com')
            ->setTo('m.hajbelgacem@gmail.com')
            ->setBody(' heloo' )
            ;
        $this->get('mailer')->send($message);
        return $this->render('BackBundle:Back:index.html.twig');
    }
}
