<?php

namespace Drupal\email_form\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\reusable_forms\Form\ReusableFormBase;
/**
 * Defines the BasicForm class.
 */
class EmailForm extends ReusableFormBase {
  
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'email_form';
  }
  
  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['email'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Veuillez renseigner votre email'),
    );
  
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Soumettre'),
    );
    
    //$form = parent::buildForm($form, $form_state);
    
    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $email = $form_state->getValue('email');
    $node = \Drupal::routeMatch()->getRawParameter('node');
    $database = \Drupal::database();
  
    $database->insert('email_form_user')
      ->fields(array(
          'email' => $email,
          'aid' => $node,
        )
      )
      ->execute();
    
    
   
    
  }
}
