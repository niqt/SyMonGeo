<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Document\Product;
use Acme\StoreBundle\Document\Loc;
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
    
    public function searchAction($max)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dim = 0;
        try{
        /*$locations = $dm->createQueryBuilder('AcmeStoreBundle:Product')
        ->field('loc')->near(new Point(14.788543, 41.127507))
        ->maxDistance(5000)
        ->getQuery()
        ->execute();*/
            
        /*$locations = ($dm->createQueryBuilder('AcmeStoreBundle:Product')
    ->geoNear(14.788543, 41.127507)
    ->spherical(true)
    // Convert radians to kilometers (use 3963.192 for miles)
    ->distanceMultiplier(6378.137))
    ->execute();*/
            
            $qb = $dm->createQueryBuilder('AcmeStoreBundle:Product')->geoNear( 41.127507, 14.788543)
                ->spherical(true)
                ->distanceMultiplier(6378.137)
                ->maxDistance(0.5);
               
            $query = $qb->getQuery();
            $locations = $query->execute();
            
        $dim = count($locations);
            
        } catch (QueryException $e){
            
        }
       
        $thisLat = deg2rad(41.127507);
        $thisLong = deg2rad(14.788543);

        // POINT 2
        $otherLat = deg2rad(41.125228);
        $otherLong = deg2rad(14.797191);

        $MeanRadius = 6378 - 21 * sin($lat1);

        $xa = (Cos($thisLat)) * (Cos($thisLong));
        $ya = (Cos($thisLat)) * (Sin($thisLong));
        $za = (Sin($thisLat));

        $xb = (Cos($otherLat)) * (Cos($otherLong));
        $yb = (Cos($otherLat)) * (Sin($otherLong));
        $zb = (Sin($otherLat));

        $distance = $MeanRadius * Acos($xa * $xb + $ya * $yb + $za * $zb);

        echo $distance;
        
       echo $dim;
        
    /*$l = $locations[0];
        echo $l->getName();*/
        return $this->render('AcmeStoreBundle:Default:search.html.twig', array('max' => $max, 'locations' => $locations));
    }
    
    
}
