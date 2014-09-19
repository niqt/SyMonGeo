<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Document\Product;
use Acme\StoreBundle\Document\Loc;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
    
    
    public function createAction() {
    
      $product = new Product();
      $product->setName('A Foo Bar');
      $product->setPrice('19.99');

      $loc = new Loc();
      //$loc->setLat(41.125228);
      $loc->setCoordinates( array(14.797191, 41.125228));
      $loc->setType("Point");
      $product->setLoc($loc);

      $dm = $this->get('doctrine_mongodb')->getManager();
      $dm->persist($product);
      $dm->flush();

      return new Response('Created product id '.$product->getId());
      
    }
    
    
    
    
}
