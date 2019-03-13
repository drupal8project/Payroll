<?php
/**
 * @file
 * Contains \Drupal\payroll\Form\SimpleForm.
 */
namespace Drupal\payroll\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class SimpleForm extends FormBase {
    
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
      return 'user_login_form';
    }
    
    /**
     * callback action on submit (custom method plus bas)
     *
     * @param $form
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     * @param $form_id
     */
    function customusersubmit_form_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id) {

    if ($form_id == 'user_login_form') {
  
      //code to modify your form input
  
      $form['name']['#attributes']['placeholder'] = t('username or emailaddress');
      /* $form['name']['#title'] = 'Username or Email Address';  */

      $form['pass']['#attributes']['placeholder'] = t('password');
      /* $form['name']['#title'] = 'Password';  */
  
      $form['actions']['submit']['#value'] = t('Publish');
  
      $form['actions']['submit']['#submit'][] = 'custom_submit_method';
      //do something similar to create a custom validation handler */
  
    }
  
  }
  
  /**
   * @param $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * @param $form_id
   */
  function custom_submit_method(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id) {
    /*foreach ($form_state->getValues() as $key => $value) {
       drupal_set_message($key . ': ' . $value);
     }
     */
  
    $cusers = $form_state->getValue(array('name'));
    $cpass = $form_state->getValue(array('pass'));
  
    user_login_finalize($cusers, $cpass);
  
    drupal_set_message('Logged in Succesfully!');

        // Set relative path
        $response = "\somepath";
        $Url = url::frommUserInput($response);

        //set Redirect
        $form_state->setRedirectUrl($Url);
  }
  
    
}
