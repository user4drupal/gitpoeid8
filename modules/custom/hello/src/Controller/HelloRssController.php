<?php
namespace Drupal\hello\Controller;


use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

class HelloRssController extends ControllerBase{
    public function content(){
        $response = new Response();
        $xml =$response->setContent( "<xml>Je suis une bille en xml</xml>");
        return $xml;
    }
}