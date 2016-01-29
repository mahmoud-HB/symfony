<?php

namespace BackBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use BackBundle\Entity\produits;
use BackBundle\Entity\traductions;
use BackBundle\Entity\panier;

class ListecommandesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('listecommandes')
            ->setDescription('listecommandes')
            ->addArgument('entity',  InputArgument::REQUIRED, 'bundle:entity or Bundle name')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $em = $this->getContainer()->get('doctrine')->getManager();

        $commandes = $em->getRepository('BackBundle:Commandes')->findByCommande();

        $result = "";
  
        foreach($commandes as $commande){
            
                $paniers = $commande ->getPanier();
                $prods ="";
                foreach($paniers as $panier){

                    foreach($panier->getProduit()->getTraduction() as $trad){
                         $prods .= $trad->getNom().",";
                     }
                     $prods .= "/";
                }


                $user = $commande->getUser()->getUsername();

                    $result .= "Id = ".$commande->getId()."\n Prix_Tolale = ".$commande->getTotal()."\n Nom_du_produits = ".$prods.
                    "\n nom du client = ".$user."\n ====================================== \n";
                      
        }
        $output->writeln($result);
    }
}
