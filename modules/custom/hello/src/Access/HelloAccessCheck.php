<?php
 namespace Drupal\hello\Access;
 
 use Drupal\Core\Access\AccessCheckInterface;
 use Drupal\Core\Access\AccessResult;
 use Drupal\Core\Session\AccountInterface;
 use Drupal\user\Entity\User;
 use Symfony\Component\Routing\Route;

 class HelloAccessCheck implements AccessCheckInterface{
   
   public function applies(Route $route)
   {
    return NULL;
   }
   
   public function access(Route $route, \Symfony\Component\HttpFoundation\Request $request = NULL, AccountInterface $account){
     $param = $route->getRequirement('_access_hello');
     
     $id = $account->id();
     $user = User::load($id);
     $time = $user->getCreatedTime();
     
     $date = time();
     $ratio = $date - $time;
     $param = 48 * 3600;
     if ($ratio > $param){
  
       return AccessResult::allowed();
     }
     else {
       return AccessResult::forbidden();
     }
   }

 }