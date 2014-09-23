<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Document\Product;
use Acme\StoreBundle\Document\Loc;
use Acme\StoreBundle\Document\City;
use Acme\StoreBundle\Document\Coordinates;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\MongoDB\Query;
use GeoJson\Geometry\Geometry;
use GeoJson\Geometry\Point;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
    
    
    public function createAction() 
    {
    /*
    // A
      $product = new Product();
      $product->setName('Point A');
      $product->setPrice('19.99');

      $loc = new Loc();
      //$loc->setLat(41.125228);
      $loc->setCoordinates( array(14.796696, 41.124268));
      $loc->setType("Point");
      $product->setLoc($loc);

      $dm = $this->get('doctrine_mongodb')->getManager();
      $dm->persist($product);
      $dm->flush();

        // B
      $product = new Product();
      $product->setName('Point B');
      $product->setPrice('19.99');

      $loc = new Loc();
      
      $loc->setCoordinates( array(14.79189, 41.12656));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    // C
      $product = new Product();
      $product->setName('Point C');
      $product->setPrice('19.99');

      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.797191,  41.125228));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    // D
        
      $product = new Product();
      $product->setName('Point D');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.820514,  41.117705));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
        
    //  E
        
    $product = new Product();
      $product->setName('Point E');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.771950, 41.130621));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
        
    //  F
        
    $product = new Product();
      $product->setName('Point F');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.769719, 41.141837));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
        
    //  G
        
    $product = new Product();
      $product->setName('Point G');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.779847, 41.160547));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    //  H
        
    $product = new Product();
      $product->setName('Point H');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 41.160450, 14.807055));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    //  I
        
    $product = new Product();
      $product->setName('Point I');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.836624,41.150336));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    //  L
        
    $product = new Product();
      $product->setName('Point L');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.744528,41.146975));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    //  M
        
    $product = new Product();
      $product->setName('Point M');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.863575,41.128553));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
        
    //  N
        
    $product = new Product();
      $product->setName('Point N');
      $product->setPrice('19.99');
        
      $loc = new Loc();
      
      $loc->setCoordinates( array( 14.766313,41.132616));
      $loc->setType("Point");
      $product->setLoc($loc);    
    
      $dm->persist($product);
      $dm->flush();
    */
        
     $dm = $this->get('doctrine_mongodb')->getManager();
        
        
    $dm->getSchemaManager()->ensureDocumentIndexes('AcmeStoreBundle:City');
        
    /*$city1 = new City();
    $city1->name = 'Nashville';
    $city1->coordinates = new Coordinates();
    $city1->coordinates->latitude = 41.124268; 
    $city1->coordinates->longitude = 14.796696;
        
    $city2 = new City();
    $city2->name = 'Columbus';
    $city2->coordinates = new Coordinates();
    $city2->coordinates->latitude = 41.12656;
    $city2->coordinates->longitude = 14.79189;
        
    $city3 = new City();
    $city3->name = 'Pittsburg';
    $city3->coordinates = new Coordinates();
    $city3->coordinates->latitude = 41.132616;
    $city3->coordinates->longitude = 14.766313;
        
    $dm->persist($city1);
    $dm->persist($city2);
    $dm->persist($city3);
    $dm->flush();
    $dm->clear();*/
        
    $city11 = new City();
    $city11->name = 'Milano';
    $city11->coordinates = new Coordinates();
    $city11->coordinates->latitude = 41.128553; 
    $city11->coordinates->longitude = 14.863575;
        
    $city12 = new City();
    $city12->name = 'Roma';
    $city12->coordinates = new Coordinates();
    $city12->coordinates->latitude = 41.146975; 
    $city12->coordinates->longitude = 14.744528;
        
    $city13 = new City();
    $city13->name = 'Napoli';
    $city13->coordinates = new Coordinates();
    $city13->coordinates->latitude = 41.150336; 
    $city13->coordinates->longitude = 14.836624;
        
    $dm->persist($city11);
    $dm->persist($city12);
    $dm->persist($city13);
    $dm->flush();
    $dm->clear();
      /*$dm->persist($product);
      $dm->flush();*/
      return new Response('Created product id '.$product->getId());
      
    }
    
    public function searchAction($max)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dim = 0;
        try{

            /*
            $qb = $dm->createQueryBuilder('AcmeStoreBundle:Product')->geoNear( 41.127507, 14.788543)
                
                ->limit(10)
                ->spherical(true)
                ->distanceMultiplier(6378.137)
                ->maxDistance((double)$max);
            
                //->limit(1);
            $query = $qb->getQuery();
            
            $locations = $query->execute();
            */

            
            

        
            
        } catch (QueryException $e){
            
        }
        $locations = array();
         $qb = $dm->createQueryBuilder('AcmeStoreBundle:City')
            ->geoNear(41.127507, 14.788543)
             ->distanceMultiplier(6378.137)
            ->maxDistance(1.7);
            $query = $qb->getQuery();
            $city = $query->getSingleResult();
        //return $this->render('AcmeStoreBundle:Default:search.html.twig', array('max' => $max, 'locations' => $locations));
        return $this->render('AcmeStoreBundle:Default:search.html.twig', array('max' => $max, 'city' => $city, 'locations' => $locations));
    }
    
    
}
