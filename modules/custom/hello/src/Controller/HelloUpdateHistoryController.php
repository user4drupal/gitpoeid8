<?php
namespace Drupal\hello\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class HelloUpdateHistoryController extends ControllerBase{
  function content($node) {
    $bdd = \Drupal::database();
    $enregistrement = $bdd->select('hello_node_history', 'h')
        ->fields('h', array('uid', 'update_time'))
        ->execute();
    $rows = $enregistrement->fetchAll();
        foreach ($rows as $row ){
      $uid = $row->uid;
  
      $account = \Drupal\user\Entity\User::load($row->uid); // pass your uid
      $name = $account->getUsername();
      $date = \Drupal::service('date.formatter')->format($row->update_time,'very_long');
      $ligne['date'] = $date;
      $ligne['nom'] = $name;
      $table[] = $ligne;
      
    }
  //kint($table);
  
    $header = ['update time', 'auteur'];
    $count= count($rows);
    //récupérer le nom de la node
    $nodeEntity = Node::load($node);
    $name = $nodeEntity->label();
   
    $render['message'] =array(
      '#theme' => 'hello',
      '#count' => $count,
      '#node' => $name,
    );
    $render['tableau'] = array(
      '#theme' => 'table',
      '#rows' => $table,
      '#header' => $header,
      
      '#cache' => array(
        'keys' => ['pi'],
        'max-age' => '10',
      ),
    );
   return $render;
    
  }
  
  
}