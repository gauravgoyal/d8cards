<?php

namespace Drupal\d8cards3_config_form\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form.
 */
class D8cardsConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8cards_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('d8cards3_config_form.settings');
    $form['d8cards_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Example Text Field'),
      '#default_value' => $config->get('d8cards_text'),
    ];

    $form['d8cards_radios'] = [
      '#type' => 'radios',
      '#title' => $this->t('Example Radios'),
      '#options' => [0 => $this->t('Closed'), 1 => $this->t('Active')],
      '#default_value' => $config->get('d8cards_radios'),
    ];

    $form['d8cards_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Example Select'),
      '#options' => [
        '1' => $this->t('One'),
        '2' => $this->t('Two'),
        '3' => $this->t('Three'),
      ],
      '#default_value' => $config->get('d8cards_select'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'd8cards3_config_form.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('d8cards3_config_form.settings')
      ->set('d8cards_text', $form_state->getValue('d8cards_text'))
      ->set('d8cards_radios', $form_state->getValue('d8cards_radios'))
      ->set('d8cards_select', $form_state->getValue('d8cards_select'))
      ->save();
  }

}
