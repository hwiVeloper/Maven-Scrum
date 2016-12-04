<?php
  class Contact extends CI_Controller {
    public function index() {
      // loads Helper
      $this->load->helper('form');

      // loads form_validation library
      $this->load->library('form_validation');

      $view_params['form']['attributes'] = array('id' => 'myform');

      // name information
      $view_params['form']['contact_name']['label'] = array('text' => 'Your name:', 'for' =>'name');
      $view_params['form']['contact_name']['field'] = array('name' => 'contact_name', 'id' => 'contact_name', 'value' => isset($_POST['contact_name'])
                                                      ? $_POST['contact_name'] : '', 'maxlength' => '100', 'size' => '30', 'class' => 'input');

      //email information
      $view_params['form']['contact_email']['label'] = array('text' => 'Your email:', 'for' => 'email');
      $view_params['form']['contact_email']['field'] = array('name' => 'contact_email', 'id' => 'contact_email', 'value' => isset($_POST['contact_email'])
                                                       ? $_POST['contact_email'] : '', 'maxlength' => '100', 'size' => '30', 'class' => 'input');

      //message Information
      $view_params['form']['contact_message']['label'] = array('text' => 'Your message:', 'for' => 'message');
      $view_params['form']['contact_message']['field'] = array('name' => 'contact_message'
                                                           , 'id' => 'contact_message'
                                                           , 'value' => isset($_POST['contact_message'])
                                                       ? $_POST['contact_message'] : '',
                                                       'rows' => '10', 'cols' => '100', 'class' => 'input');

      // set input validation rules
      $config_rules = array(array('field' => 'contact_name',
        'label' => 'Contact Name', 'rules' => 'trim|required'),
      array('field' => 'contact_email', 'label' => 'Contact Email',
        'rules' => 'trim|required|valid_email'));
      $this->form_validation->set_rules($config_rules);
      $this->form_validation->set_rules('contact_message',
        'Contact Message', 'trim|required');

      // input validation
      if($this->form_validation->run() == FALSE)
      // if validation failed
      {
        $a_fields = array('contact_name', 'contact_email', 'contact_message');
        for($index = 0; $index < count($a_fields); $index++)
        {
          $s_field = $a_fields[$index];
          if(form_error($s_field))
          {
            $view_params['form'][$s_field]['field']['class'] .= 'error';
          }
        }
        $this->load->view('contactview', $view_params);
      }
      else // if validation successed
      {
        $success_params = array('message' => 'Your message has been sent');
        $this->load->view('contactsucess', $success_params);
      }
    }
  }
?>
