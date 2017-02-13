<?php
namespace Drupal\hello\Form;



use Drupal\Core\State\State;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HelloAdminForm extends ConfigFormBase{
  protected $state;
  
  public function __construct(State $state )
  {
    $this->state = $state;
    //parent::__construct($config_factory);
  }
  
  public static function create(ContainerInterface $container){
    return new static(
      $container->get('state')
    );
  }
  
  public function getFormId()
  {
    
  
    return 'hello_admin_form';
  }
  
  protected function getEditableConfigNames()
  {
    return ['hello.config'];
  }
  
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form = array();
    $value = $this->config('hello.config')->get('color');
    $form['choix_couleur'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#options' => [
        'vert' => $this->t('Vert'),
        'orange' => $this->t('Orange'),
        'bleu' => $this->t('Bleu'),
      ],
      '#default_value' => $value,
    ];
    
    
    
    return parent::buildForm($form, $form_state);
  }
  
  public function submitForm( array &$form, FormStateInterface $form_state)
  {
    $date = REQUEST_TIME;
    $this->state->set('dernier changemenr de couleur', $date);
    $valeur1 = $form_state->getValue('choix_couleur');
    $this->config('hello.config')->set('color',$valeur1)->save();
    
    parent::submitForm($form, $form_state);
  }
  
}