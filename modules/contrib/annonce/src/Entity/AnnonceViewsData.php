<?php

namespace Drupal\annonce\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides the views data for the Annonce entity type.
 */
class AnnonceViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['annonce_entity_history']['table']['base'] = array(
      'field' => 'id',
      'title' => t('Annonce entity history'),
      'help' => t('The annonce entity ID.'),
    );
  
    $data['annonce_entity_history']['eid'] = array(
      'title' => t('Entity ID.'),
      'help' => t('au secour.'),
  
      'field' => array(
        // ID of field handler plugin to use.
        'id' => 'standard',
      ),
  
      'sort' => array(
        // ID of sort handler plugin to use.
        'id' => 'standard',
      ),
  
      'filter' => array(
        // ID of filter handler plugin to use.
        'id' => 'string',
      ),
  
      'argument' => array(
        // ID of argument handler plugin to use.
        'id' => 'string',
      ),
    );
  
    $data['annonce_entity_history']['uid'] = array(
      'title' => t('User ID'),
      'help' => t('au secour.'),
    
      'field' => array(
        // ID of field handler plugin to use.
        'id' => 'standard',
      ),
    
      'sort' => array(
        // ID of sort handler plugin to use.
        'id' => 'standard',
      ),
    
      'filter' => array(
        // ID of filter handler plugin to use.
        'id' => 'string',
      ),
    
      'argument' => array(
        // ID of argument handler plugin to use.
        'id' => 'string',
      ),
    );
  
    $data['annonce_entity_history']['time'] = array(
      'title' => t('Timestamp of node update'),
      'help' => t('au secour.'),
    
      'field' => array(
        // ID of field handler plugin to use.
        'id' => 'date',
      ),
    
      'sort' => array(
        // ID of sort handler plugin to use.
        'id' => 'date',
      ),
    
      'filter' => array(
        // ID of filter handler plugin to use.
        'id' => 'date',
      ),
    
      'argument' => array(
        // ID of argument handler plugin to use.
        'id' => 'string',
      ),
  

    );
  
    $data['annonce_entity_history']['table']['group'] = t('groupe annonce');
    $data['annonce_entity_history']['uid'] = array(
      'title' => t('Example content'),
      'help' => t('Relate example content to the node content'),
      'relationship' => array(
        'base' => 'users_field_data',
        'base field' => 'uid',
        'id' => 'standard',
        'label' => t('annonce'),
      ),
    );

    return $data;
  }

}
