<?php

namespace Drupal\poei\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PoeiForm.
 *
 * @package Drupal\poei\Form
 */
class PoeiForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'poei.poei',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'poei_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('poei.poei');
    $form['colors'] = [
      '#type' => 'radios',
      '#title' => $this->t('Colors'),
      '#options' => array('vert' => $this->t('vert'), 'Orange' => $this->t('Orange'), 'Magent' => $this->t('Magent')),
      '#default_value' => $config->get('colors'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('poei.poei')
      ->set('colors', $form_state->getValue('colors'))
      ->save();
  }

}
