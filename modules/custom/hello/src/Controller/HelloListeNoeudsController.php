<?php
namespace Drupal\hello\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;


class HelloListeNoeudsController extends ControllerBase
{
  public function content($type)
  {
    $storage = \Drupal::entityTypeManager()->getStorage('node');
    $query = \Drupal::entityQuery('node');
    if ($type != '') {
      $query->condition('type', $type, '=');
    }
    $ids = $query->execute();
    $entities = $storage->loadMultiple($ids);
    $items = array();
    foreach ($entities as $key => $node) {
      $items[] = Link::createFromRoute($node->label(), 'entity.node.canonical', array('node' => $node->id()));
    }
      
      return array(
        '#theme' => 'item_list',
        '#items' => $items,
        '#list_type' => 'ol',
        '#cache' => array(
          'keys' => ['zlabia'],
          'max-age' => '10',
        ),
      );
      
    }

}