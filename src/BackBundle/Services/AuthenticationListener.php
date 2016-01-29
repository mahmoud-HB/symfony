<?php

namespace BackBundle\Services;

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class AuthenticationListener implements EventSubscriberInterface
{
    private $mailer;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;
    
    /**
     * Constructor
     * 
     * @param Doctrine        $doctrine
    */

    public function __construct(\Swift_Mailer $mailer, Doctrine $doctrine)

    {

        $this->mailer = $mailer;
        $this->em = $doctrine->getEntityManager();

    }
	/**
	 * getSubscribedEvents
	 *
	 */
	public static function getSubscribedEvents()
    {
        return array(
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
            AuthenticationEvents::AUTHENTICATION_SUCCESS => 'onAuthenticationSuccess',
        );
    }
 
	/**
	 * onAuthenticationFailure
	 *
	 */
	public function onAuthenticationFailure( AuthenticationFailureEvent $event )
	{
		$message = \Swift_Message::newInstance()
            ->setSubject('onAuthenticationFailure')
            ->setFrom('send@example.com')
            ->setTo('m.hajbelgacem@gmail.com')
            ->setBody(' Un utilisateur Anonime à essaie de se connecté à ton site ' )
            ;
        $this->mailer->send($message);

	}
 
	/**
	 * onAuthenticationSuccess
	 *
	 */
	public function onAuthenticationSuccess( InteractiveLoginEvent $event )
    {
    	$user = $event->getAuthenticationToken()->getUser();
        //envoie mail
        $message = \Swift_Message::newInstance()
            ->setSubject('onAuthenticationSuccess')
            ->setFrom(array('send@example.com' => 'L\'équipe technique du monsite.com'))
            ->setTo('m.hajbelgacem@gmail.com')
            ->setBody($user.' est maintenant connecté à ton site ')
        ;
        $this->mailer->send($message);
    }


}