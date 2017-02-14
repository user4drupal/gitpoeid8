<?php

namespace Drupal\annonce\Plugin\Condition;


use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\Context\ContextDefinition;

/**
* Provides a 'Block condition' condition to enable a condition based in module selected status.
*
* @Condition(
*   id = "block_condition",
*   label = @Translation("Block condition"),
* )
*
*/
class BlockCondition extends ConditionPluginBase {

/**
* {@inheritdoc}
*/
public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
{
    return new static(
    $configuration,
    $plugin_id,
    $plugin_definition
    );
}

/**
 * Creates a new ExampleCondition instance.
 *
 * @param array $configuration
 *   The plugin configuration, i.e. an array with configuration values keyed
 *   by configuration option name. The special key 'context' may be used to
 *   initialize the defined contexts by setting it to an array of context
 *   values keyed by context names.
 * @param string $plugin_id
 *   The plugin_id for the plugin instance.
 * @param mixed $plugin_definition
 *   The plugin implementation definition.
 */
 public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
 }

 /**
   * {@inheritdoc}
   */
 public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
     // Sort all modules by their names.
     $modules = system_rebuild_module_data();
     uasort($modules, 'system_sort_modules_by_info_name');

     $options = [NULL => t('Select a module')];
     foreach($modules as $module_id => $module) {
         $options[$module_id] = $module->info['name'];
     }

     $form['module'] = [
         '#type' => 'select',
         '#title' => $this->t('Select a module to validate'),
         '#default_value' => $this->configuration['module'],
         '#options' => $options,
         '#description' => $this->t('Module selected status will be use to evaluate condition.'),
     ];
  
   $form['Choix_du_cas'] = array(
     '#type' => 'radios',
     '#title' => $this->t('Choix du cas'),
     '#default_value' => 0,
     '#options' => array(0 => $this->t('Aucune date rensignée'),
                          1 => $this->t('Date de début uniquement'),
                          2 => $this->t('Date de fin uniquement'),
                          3 => $this->t('Date de début et date de fin')),
   );
   $form['debut'] = array(
     '#type' => 'date',
     '#title' => $this->t('Date de début'),
     '#default_value' => array('year' => 2017, 'month' => 2, 'day' => 13,)
   );
  
   $form['fin'] = array(
     '#type' => 'date',
     '#title' => $this->t('Date de fin'),
     '#default_value' => array('year' => 2017, 'month' => 2, 'day' => 13,)
   );
     return $form;
 }

/**
 * {@inheritdoc}
 */
 public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
     $this->configuration['module'] = $form_state->getValue('module');
     $this->configuration['choix_du_cas'] = $form_state->getValue('choix_du_cas');
     $this->configuration['debut'] = $form_state->getValue('debut');
     $this->configuration['fin'] = $form_state->getValue('fin');
     
     parent::submitConfigurationForm($form, $form_state);
 }

/**
 * {@inheritdoc}
 */
 public function defaultConfiguration() {
    return ['module' => ''] + parent::defaultConfiguration();
 }

/**
  * Evaluates the condition and returns TRUE or FALSE accordingly.
  *
  * @return bool
  *   TRUE if the condition has been met, FALSE otherwise.
  */
  public function evaluate() {
      /*if (empty($this->configuration['module']) && !$this->isNegated()) {
          return TRUE;
      }

      $module = $this->configuration['module'];
      $modules = system_rebuild_module_data();

      return $modules[$module]->status;*/
      $date_debut = $this->configuration['debut'];
      $date_debut = strtotime($date_debut);
      
      $date_fin = $this->configuration['fin'];
      $date_fin = strtotime($date_fin);
      
      $date = time();
      
      if ($this->configuration['choix_du_cas'] == 0){
        return TRUE;
      }
      
      if ($this->configuration['choix_du_cas'] == 1 and $date_debut < $date){
        return TRUE;
      }
      
      if ($this->configuration['choix_du_cas'] == 2 and $date_fin > $date){
      return TRUE;
      }
      
      if ($this->configuration['choix_du_cas'] == 3 and $date_fin > $date and $date_debut < $date){
        return TRUE;
      }
      
      return FALSE;
  }

/**
 * Provides a human readable summary of the condition's configuration.
 */
 public function summary()
 {
     $module = $this->getContextValue('module');
     $modules = system_rebuild_module_data();

     $status = ($modules[$module]->status)?t('enabled'):t('disabled');

     return t('The module @module is @status.', ['@module' => $module, '@status' => $status]);
 }

}
