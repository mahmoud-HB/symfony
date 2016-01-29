<?php

namespace BackBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProductListCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('product:list')
            ->setDescription('Liste des produits qui nous donnera la liste des produits')
            ->addArgument('entity',  InputArgument::REQUIRED, 'bundle:entity or Bundle name')
            ->addOption('zerostock', null, InputOption::VALUE_NONE, 'liste des produits qui aura une option zero-stock')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        if ($input->getOption('zerostock')) {

            $produits = $em->getRepository('BackBundle:Produits')->findBy(array('stock' => '0'));
            
      
            $result = "";
  
            foreach($produits as $produit){
                $nom ="";
                $description ="";
                foreach($produit->getTraduction() as $trad){

                    $nom .= $trad->getNom().",";  

                    $description .= $trad->getDescription().",";
                }                          

                $result .= "Id :".$produit->getId()."\n Prix :  ". $produit->getPrix(). "\n Nom : "
                .$nom."\n Description :" .$description."\n ====================================== \n";
            }

        }else{

        $produits = $em->getRepository('BackBundle:Produits')->FindProduct();

      
        $result = "";

            foreach($produits as $produit){
                $nom ="";
                $description ="";
                foreach($produit->getTraduction() as $trad){

                    $nom .= $trad->getNom().",";  

                    $description .= $trad->getDescription().",";
                }                          

                $result .= "Id :".$produit->getId()."\n Prix :  ". $produit->getPrix(). "\n Nom : "
                .$nom."\n Description :" .$description."\n ====================================== \n";
            }
            
        }
        
        $output->writeln($result);
    }

}
