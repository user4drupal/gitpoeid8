<?php
namespace Drupal\hello\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

Class ExempleForm extends FormBase {
  
  
  public function getFormID(){
    return 'hello_form';
  }
  
  
  public function buildForm(array $form, FormStateInterface $form_state){
    
    
    $form['valeur1'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('First value'),
      '#ajax' => array(
        'callback' => array($this, 'validateTextAjax'),
        'event' => 'change',
      ),
      '#suffix' => '<span class="text-message"></span>',
      '#maxlength' => 128,
      '#required' => TRUE,
    );
  
    $form['operation'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Operation'),
      '#default_value' => 1,
      '#options' => array(0 => $this->t('Ajouter'), 1 => $this->t('Soustract'), 2 => $this->t('Multiply'), 3 => $this->t('Divide')),
    );
  
    $form['valeur2'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Second value'),
      '#ajax' => array(
        'callback' => array($this, 'validateTextAjax2'),
        'event' => 'change',
      ),
      '#suffix' => '<span class="text-message2"></span>',
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
    );
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Calculate'),
    
     '#states' => array(
       'disabled' => array(
         ':input[name="valeur2"]'=>array('value' == '0'),
         ':input[name="operation"]'=>array('value' == '3'),
       )
     )
      );
    
    
    
    return $form;
  }
  
  public  function validateForm(array &$form, FormStateInterface $form_state){
    $valeur1 = $form_state->getValue('valeur1');
    if (!is_numeric($valeur1)){
      $form_state->setErrorByName('valeur1', t('It must be number sir'));
    }
  
    $valeur2 = $form_state->getValue('valeur2');
    if (!is_numeric($valeur2)){
      $form_state->setErrorByName('valeur2', t('It must be number sir'));
    }
    
    $operation = $form_state->getValue('operation');
    if ($valeur2 == 0 and $operation == 3){
      $form_state->setErrorByName('', t('It can\'t be'));
    }
    
    
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $valeur1 = $form_state->getValue('valeur1');
    $valeur2 = $form_state->getValue('valeur2');
    $choix = $form_state->getValue('operation');
    
    
    switch ($choix) {
      case 0:
         $resultat = $valeur1 + $valeur2;
        break;
      case 1:
         $resultat = $valeur1 - $valeur2;
        break;
      case 2:
         $resultat = $valeur1 * $valeur2;
        break;
      case 3:
         $resultat = $valeur1 / $valeur2;
        break;
    }
     drupal_set_message($resultat);
  
  }
  
  public function validateTextAjax(array &$form, FormStateInterface $form_State)
  {
    $css = ['border' => '2px solid yellow'];
    $message = 'ajax message: ' .$form_State->getValue('valeur1');
    $tester = $form_State->getValue('valeur1');
    if (!is_numeric($tester)){
      $message = 'veuillez saisir un nombre ';
    }
    else{
      $message = '';
    }
    
    $response = new AjaxResponse();
    $response->addCommand(new CssCommand('#edit-valeur1', $css));
    $response->addCommand(new HtmlCommand(' .text-message', $message));
    
    return $response;
    
  }
  
  public function validateTextAjax2(array &$form, FormStateInterface $form_State)
  {
    $css = ['border' => '2px solid red'];
    $message = 'ajax message: ' .$form_State->getValue('valeur2');
    $tester = $form_State->getValue('valeur2');
    if (!is_numeric($tester)){
      $message = 'veuillez saisir un nombre ';
    }
    else{
      $message = '';
    }
    
    $response = new AjaxResponse();
    $response->addCommand(new CssCommand('#edit-valeur2', $css));
    $response->addCommand(new HtmlCommand(' .text-message2', $message));
    
    return $response;
    
  }
  
  
  
}