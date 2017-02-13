<?php

namespace Drupal\annonce\EventSubscriber;

use Drupal\Core\Database\Connection;
use Drupal\Core\Routing\CurrentRouteMatch;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Session\AccountProxy;

/**
 * Class BonjourUser.
 *
 * @package Drupal\annonce
 */
class BonjourUser implements EventSubscriberInterface
{
  
  /**
   * Drupal\Core\Session\AccountProxy definition.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;
  protected $currentMatch;
  protected $connectionDdb;
  
  /**
   * Constructor.
   */
  public function __construct(AccountProxy $current_user, CurrentRouteMatch $current_match, Connection $connection_ddb )
  {
    $this->currentUser = $current_user;
    $this->currentMatch = $current_match;
    $this->connectionDdb = $connection_ddb;
    //kint($current_match);
  }
  
  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents()
  {
    $events['kernel.request'][] = ['BonjourUserFunction'];
    $events['kernel.request'][] = ['BonjourAnnonce'];
    $events['kernel.request'][] = ['Insertion'];
    
    
    return $events;
  }
  
  /**
   * This method is called whenever the kernel.request event is
   * dispatched.
   *
   * @param GetResponseEvent $event
   */
  public function BonjourUserFunction(Event $event)
  {
    $current_user = $this->currentUser->getDisplayName();
    drupal_set_message('Event for ' . $current_user, 'status', TRUE);
  }
  
  public function BonjourAnnonce(Event $event)
  {
    if ($this->currentMatch->getRouteName() == 'entity.annonce.canonical') {
    
    
      drupal_set_message('entité annonce', 'status', TRUE);
    }
  }
  public function Insertion(Event $event)
  {
    if ($this->currentMatch->getRouteName() == 'entity.annonce.canonical') {
      $annonce = $this->currentMatch->getParameter('annonce');
      $eid = $annonce->id();
      $uid = $this->currentUser->id();
      $time = time();
  
     
      $insertion = $this->connectionDdb->insert('annonce_entity_history')
        ->fields (array(
          'eid' => $eid,
          'uid' => $uid,
          'time' => $time,
          )
        )
        ->execute();
    }
    
  }
}
