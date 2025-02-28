<?php
//
class app3_settings_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = true;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $session_expire;
   var $session_expire_1;
   var $remember_me;
   var $remember_me_1;
   var $cookie_expiration_time;
   var $retrieve_password;
   var $retrieve_password_1;
   var $new_users;
   var $new_users_1;
   var $brute_force_time_block;
   var $brute_force_attempts;
   var $enable_2fa;
   var $enable_2fa_1;
   var $enable_2fa_expiration_time;
   var $brute_force;
   var $brute_force_1;
   var $captcha;
   var $captcha_1;
   var $theme;
   var $language;
   var $language_1;
   var $recover_pswd;
   var $recover_pswd_1;
   var $req_email_act;
   var $req_email_act_1;
   var $send_email_adm;
   var $send_email_adm_1;
   var $group_default;
   var $group_default_1;
   var $smtp_api;
   var $smtp_server;
   var $smtp_port;
   var $smtp_user;
   var $smtp_from_email;
   var $smtp_from_name;
   var $smtp_pass;
   var $enable_2fa_mode;
   var $enable_2fa_mode_1;
   var $smtp_security;
   var $smtp_security_1;
   var $enable_2fa_api;
   var $enable_2fa_api_type;
   var $login_mode;
   var $login_mode_1;
   var $pswd_last_updated;
   var $password_strength;
   var $password_strength_1;
   var $password_min;
   var $mfa_last_updated;
   var $group_administrator;
   var $group_administrator_1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden   = array();
   var $Field_no_validate  = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['brute_force']))
          {
              $this->brute_force = $this->NM_ajax_info['param']['brute_force'];
          }
          if (isset($this->NM_ajax_info['param']['brute_force_attempts']))
          {
              $this->brute_force_attempts = $this->NM_ajax_info['param']['brute_force_attempts'];
          }
          if (isset($this->NM_ajax_info['param']['brute_force_time_block']))
          {
              $this->brute_force_time_block = $this->NM_ajax_info['param']['brute_force_time_block'];
          }
          if (isset($this->NM_ajax_info['param']['captcha']))
          {
              $this->captcha = $this->NM_ajax_info['param']['captcha'];
          }
          if (isset($this->NM_ajax_info['param']['cookie_expiration_time']))
          {
              $this->cookie_expiration_time = $this->NM_ajax_info['param']['cookie_expiration_time'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['enable_2fa']))
          {
              $this->enable_2fa = $this->NM_ajax_info['param']['enable_2fa'];
          }
          if (isset($this->NM_ajax_info['param']['enable_2fa_api']))
          {
              $this->enable_2fa_api = $this->NM_ajax_info['param']['enable_2fa_api'];
          }
          if (isset($this->NM_ajax_info['param']['enable_2fa_api_type']))
          {
              $this->enable_2fa_api_type = $this->NM_ajax_info['param']['enable_2fa_api_type'];
          }
          if (isset($this->NM_ajax_info['param']['enable_2fa_expiration_time']))
          {
              $this->enable_2fa_expiration_time = $this->NM_ajax_info['param']['enable_2fa_expiration_time'];
          }
          if (isset($this->NM_ajax_info['param']['enable_2fa_mode']))
          {
              $this->enable_2fa_mode = $this->NM_ajax_info['param']['enable_2fa_mode'];
          }
          if (isset($this->NM_ajax_info['param']['group_administrator']))
          {
              $this->group_administrator = $this->NM_ajax_info['param']['group_administrator'];
          }
          if (isset($this->NM_ajax_info['param']['group_default']))
          {
              $this->group_default = $this->NM_ajax_info['param']['group_default'];
          }
          if (isset($this->NM_ajax_info['param']['language']))
          {
              $this->language = $this->NM_ajax_info['param']['language'];
          }
          if (isset($this->NM_ajax_info['param']['login_mode']))
          {
              $this->login_mode = $this->NM_ajax_info['param']['login_mode'];
          }
          if (isset($this->NM_ajax_info['param']['mfa_last_updated']))
          {
              $this->mfa_last_updated = $this->NM_ajax_info['param']['mfa_last_updated'];
          }
          if (isset($this->NM_ajax_info['param']['new_users']))
          {
              $this->new_users = $this->NM_ajax_info['param']['new_users'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['password_min']))
          {
              $this->password_min = $this->NM_ajax_info['param']['password_min'];
          }
          if (isset($this->NM_ajax_info['param']['password_strength']))
          {
              $this->password_strength = $this->NM_ajax_info['param']['password_strength'];
          }
          if (isset($this->NM_ajax_info['param']['pswd_last_updated']))
          {
              $this->pswd_last_updated = $this->NM_ajax_info['param']['pswd_last_updated'];
          }
          if (isset($this->NM_ajax_info['param']['recover_pswd']))
          {
              $this->recover_pswd = $this->NM_ajax_info['param']['recover_pswd'];
          }
          if (isset($this->NM_ajax_info['param']['remember_me']))
          {
              $this->remember_me = $this->NM_ajax_info['param']['remember_me'];
          }
          if (isset($this->NM_ajax_info['param']['req_email_act']))
          {
              $this->req_email_act = $this->NM_ajax_info['param']['req_email_act'];
          }
          if (isset($this->NM_ajax_info['param']['retrieve_password']))
          {
              $this->retrieve_password = $this->NM_ajax_info['param']['retrieve_password'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['send_email_adm']))
          {
              $this->send_email_adm = $this->NM_ajax_info['param']['send_email_adm'];
          }
          if (isset($this->NM_ajax_info['param']['session_expire']))
          {
              $this->session_expire = $this->NM_ajax_info['param']['session_expire'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_api']))
          {
              $this->smtp_api = $this->NM_ajax_info['param']['smtp_api'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_from_email']))
          {
              $this->smtp_from_email = $this->NM_ajax_info['param']['smtp_from_email'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_from_name']))
          {
              $this->smtp_from_name = $this->NM_ajax_info['param']['smtp_from_name'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_pass']))
          {
              $this->smtp_pass = $this->NM_ajax_info['param']['smtp_pass'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_port']))
          {
              $this->smtp_port = $this->NM_ajax_info['param']['smtp_port'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_security']))
          {
              $this->smtp_security = $this->NM_ajax_info['param']['smtp_security'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_server']))
          {
              $this->smtp_server = $this->NM_ajax_info['param']['smtp_server'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_user']))
          {
              $this->smtp_user = $this->NM_ajax_info['param']['smtp_user'];
          }
          if (isset($this->NM_ajax_info['param']['theme']))
          {
              $this->theme = $this->NM_ajax_info['param']['theme'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->sett_smtp_api) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_api'] = $this->sett_smtp_api;
      }
      if (isset($this->sett_smtp) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp'] = $this->sett_smtp;
      }
      if (isset($this->sett_smtp_server) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_server'] = $this->sett_smtp_server;
      }
      if (isset($this->sett_smtp_security) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_security'] = $this->sett_smtp_security;
      }
      if (isset($this->sett_smtp_port) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_port'] = $this->sett_smtp_port;
      }
      if (isset($this->sett_smtp_user) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_user'] = $this->sett_smtp_user;
      }
      if (isset($this->sett_smtp_pass) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_pass'] = $this->sett_smtp_pass;
      }
      if (isset($this->sett_smtp_from_email) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_from_email'] = $this->sett_smtp_from_email;
      }
      if (isset($this->sett_smtp_from_name) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sett_smtp_from_name'] = $this->sett_smtp_from_name;
      }
      if (isset($_POST["sett_smtp_api"]) && isset($this->sett_smtp_api)) 
      {
          $_SESSION['sett_smtp_api'] = $this->sett_smtp_api;
      }
      if (isset($_POST["sett_smtp"]) && isset($this->sett_smtp)) 
      {
          $_SESSION['sett_smtp'] = $this->sett_smtp;
      }
      if (isset($_POST["sett_smtp_server"]) && isset($this->sett_smtp_server)) 
      {
          $_SESSION['sett_smtp_server'] = $this->sett_smtp_server;
      }
      if (isset($_POST["sett_smtp_security"]) && isset($this->sett_smtp_security)) 
      {
          $_SESSION['sett_smtp_security'] = $this->sett_smtp_security;
      }
      if (isset($_POST["sett_smtp_port"]) && isset($this->sett_smtp_port)) 
      {
          $_SESSION['sett_smtp_port'] = $this->sett_smtp_port;
      }
      if (isset($_POST["sett_smtp_user"]) && isset($this->sett_smtp_user)) 
      {
          $_SESSION['sett_smtp_user'] = $this->sett_smtp_user;
      }
      if (isset($_POST["sett_smtp_pass"]) && isset($this->sett_smtp_pass)) 
      {
          $_SESSION['sett_smtp_pass'] = $this->sett_smtp_pass;
      }
      if (isset($_POST["sett_smtp_from_email"]) && isset($this->sett_smtp_from_email)) 
      {
          $_SESSION['sett_smtp_from_email'] = $this->sett_smtp_from_email;
      }
      if (isset($_POST["sett_smtp_from_name"]) && isset($this->sett_smtp_from_name)) 
      {
          $_SESSION['sett_smtp_from_name'] = $this->sett_smtp_from_name;
      }
      if (isset($_GET["sett_smtp_api"]) && isset($this->sett_smtp_api)) 
      {
          $_SESSION['sett_smtp_api'] = $this->sett_smtp_api;
      }
      if (isset($_GET["sett_smtp"]) && isset($this->sett_smtp)) 
      {
          $_SESSION['sett_smtp'] = $this->sett_smtp;
      }
      if (isset($_GET["sett_smtp_server"]) && isset($this->sett_smtp_server)) 
      {
          $_SESSION['sett_smtp_server'] = $this->sett_smtp_server;
      }
      if (isset($_GET["sett_smtp_security"]) && isset($this->sett_smtp_security)) 
      {
          $_SESSION['sett_smtp_security'] = $this->sett_smtp_security;
      }
      if (isset($_GET["sett_smtp_port"]) && isset($this->sett_smtp_port)) 
      {
          $_SESSION['sett_smtp_port'] = $this->sett_smtp_port;
      }
      if (isset($_GET["sett_smtp_user"]) && isset($this->sett_smtp_user)) 
      {
          $_SESSION['sett_smtp_user'] = $this->sett_smtp_user;
      }
      if (isset($_GET["sett_smtp_pass"]) && isset($this->sett_smtp_pass)) 
      {
          $_SESSION['sett_smtp_pass'] = $this->sett_smtp_pass;
      }
      if (isset($_GET["sett_smtp_from_email"]) && isset($this->sett_smtp_from_email)) 
      {
          $_SESSION['sett_smtp_from_email'] = $this->sett_smtp_from_email;
      }
      if (isset($_GET["sett_smtp_from_name"]) && isset($this->sett_smtp_from_name)) 
      {
          $_SESSION['sett_smtp_from_name'] = $this->sett_smtp_from_name;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['app3_settings']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['app3_settings']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app3_settings']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app3_settings']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app3_settings']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_app3_settings($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->sett_smtp_api)) 
          {
              $_SESSION['sett_smtp_api'] = $this->sett_smtp_api;
          }
          if (isset($this->sett_smtp)) 
          {
              $_SESSION['sett_smtp'] = $this->sett_smtp;
          }
          if (isset($this->sett_smtp_server)) 
          {
              $_SESSION['sett_smtp_server'] = $this->sett_smtp_server;
          }
          if (isset($this->sett_smtp_security)) 
          {
              $_SESSION['sett_smtp_security'] = $this->sett_smtp_security;
          }
          if (isset($this->sett_smtp_port)) 
          {
              $_SESSION['sett_smtp_port'] = $this->sett_smtp_port;
          }
          if (isset($this->sett_smtp_user)) 
          {
              $_SESSION['sett_smtp_user'] = $this->sett_smtp_user;
          }
          if (isset($this->sett_smtp_pass)) 
          {
              $_SESSION['sett_smtp_pass'] = $this->sett_smtp_pass;
          }
          if (isset($this->sett_smtp_from_email)) 
          {
              $_SESSION['sett_smtp_from_email'] = $this->sett_smtp_from_email;
          }
          if (isset($this->sett_smtp_from_name)) 
          {
              $_SESSION['sett_smtp_from_name'] = $this->sett_smtp_from_name;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['app3_settings']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['app3_settings']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['app3_settings']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['app3_settings']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->sett_smtp_api)) 
          {
              $_SESSION['sett_smtp_api'] = $this->sett_smtp_api;
          }
          if (isset($this->sett_smtp)) 
          {
              $_SESSION['sett_smtp'] = $this->sett_smtp;
          }
          if (isset($this->sett_smtp_server)) 
          {
              $_SESSION['sett_smtp_server'] = $this->sett_smtp_server;
          }
          if (isset($this->sett_smtp_security)) 
          {
              $_SESSION['sett_smtp_security'] = $this->sett_smtp_security;
          }
          if (isset($this->sett_smtp_port)) 
          {
              $_SESSION['sett_smtp_port'] = $this->sett_smtp_port;
          }
          if (isset($this->sett_smtp_user)) 
          {
              $_SESSION['sett_smtp_user'] = $this->sett_smtp_user;
          }
          if (isset($this->sett_smtp_pass)) 
          {
              $_SESSION['sett_smtp_pass'] = $this->sett_smtp_pass;
          }
          if (isset($this->sett_smtp_from_email)) 
          {
              $_SESSION['sett_smtp_from_email'] = $this->sett_smtp_from_email;
          }
          if (isset($this->sett_smtp_from_name)) 
          {
              $_SESSION['sett_smtp_from_name'] = $this->sett_smtp_from_name;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app3_settings']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['app3_settings']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['app3_settings']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['app3_settings']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app3_settings_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['app3_settings']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['app3_settings']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['app3_settings'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app3_settings']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app3_settings']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('app3_settings') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app3_settings']['label'] = "" . $this->Ini->Nm_lang['lang_settings'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "app3_settings")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['session_expire'] = '' . $this->Ini->Nm_lang['lang_sec_set_session_expire'] . '';
      $this->nm_new_label['remember_me'] = '' . $this->Ini->Nm_lang['lang_sec_set_remember_me'] . '';
      $this->nm_new_label['cookie_expiration_time'] = '' . $this->Ini->Nm_lang['lang_sec_set_cookie_exp_time'] . '';
      $this->nm_new_label['retrieve_password'] = '' . $this->Ini->Nm_lang['lang_sec_set_retrieve_password'] . '';
      $this->nm_new_label['new_users'] = '' . $this->Ini->Nm_lang['lang_sec_set_new_users'] . '';
      $this->nm_new_label['brute_force_time_block'] = '' . $this->Ini->Nm_lang['lang_sec_set_bf_time_bl'] . '';
      $this->nm_new_label['brute_force_attempts'] = '' . $this->Ini->Nm_lang['lang_sec_set_bf_attempts'] . '';
      $this->nm_new_label['enable_2fa'] = '' . $this->Ini->Nm_lang['lang_sec_set_2fa'] . '';
      $this->nm_new_label['enable_2fa_expiration_time'] = '' . $this->Ini->Nm_lang['lang_sec_set_2fa_exp_time'] . '';
      $this->nm_new_label['brute_force'] = '' . $this->Ini->Nm_lang['lang_sec_set_brute_force'] . '';
      $this->nm_new_label['captcha'] = '' . $this->Ini->Nm_lang['lang_sec_set_captcha'] . '';
      $this->nm_new_label['theme'] = '' . $this->Ini->Nm_lang['lang_sec_set_theme'] . '';
      $this->nm_new_label['language'] = '' . $this->Ini->Nm_lang['lang_sec_set_language'] . '';
      $this->nm_new_label['recover_pswd'] = '' . $this->Ini->Nm_lang['lang_sec_set_recover_pswd'] . '';
      $this->nm_new_label['req_email_act'] = '' . $this->Ini->Nm_lang['lang_sec_set_req_email_act'] . '';
      $this->nm_new_label['send_email_adm'] = '' . $this->Ini->Nm_lang['lang_sec_set_send_email_adm'] . '';
      $this->nm_new_label['group_default'] = '' . $this->Ini->Nm_lang['lang_sec_set_group_default'] . '';
      $this->nm_new_label['smtp_api'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_api'] . '';
      $this->nm_new_label['smtp_server'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_server'] . '';
      $this->nm_new_label['smtp_port'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_port'] . '';
      $this->nm_new_label['smtp_user'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_user'] . '';
      $this->nm_new_label['smtp_from_email'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_from_email'] . '';
      $this->nm_new_label['smtp_from_name'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_from_name'] . '';
      $this->nm_new_label['smtp_pass'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_smtp_pass'] . '';
      $this->nm_new_label['enable_2fa_mode'] = '' . $this->Ini->Nm_lang['lang_sec_set_enable_2fa_mode'] . '';
      $this->nm_new_label['smtp_security'] = '' . $this->Ini->Nm_lang['lang_sec_set_smtp_security'] . '';
      $this->nm_new_label['enable_2fa_api'] = '' . $this->Ini->Nm_lang['lang_sec_set_enable_2fa_api'] . '';
      $this->nm_new_label['enable_2fa_api_type'] = '' . $this->Ini->Nm_lang['lang_sec_set_enable_2fa_api_type'] . '';
      $this->nm_new_label['login_mode'] = '' . $this->Ini->Nm_lang['lang_sec_set_login_mode'] . '';
      $this->nm_new_label['pswd_last_updated'] = '' . $this->Ini->Nm_lang['lang_sec_set_pswd_last_updated'] . '';
      $this->nm_new_label['password_strength'] = '' . $this->Ini->Nm_lang['lang_sec_set_password_strength'] . '';
      $this->nm_new_label['password_min'] = '' . $this->Ini->Nm_lang['lang_sec_set_password_min'] . '';
      $this->nm_new_label['mfa_last_updated'] = '' . $this->Ini->Nm_lang['lang_sec_set_mfa_last_updated'] . '';
      $this->nm_new_label['group_administrator'] = '' . $this->Ini->Nm_lang['lang_sec_set_group_administrator'] . '';

      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';
      $this->Ini->Bubble_tail          = trim($str_bubble_tail);

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;
        if ($this->use_100perc_fields) {
            $this->classes_100perc_fields['table'] = ' sc-ui-100perc-table';
            $this->classes_100perc_fields['input'] = ' sc-ui-100perc-input';
            $this->classes_100perc_fields['span_input'] = ' sc-ui-100perc-span-input';
            $this->classes_100perc_fields['span_select'] = ' sc-ui-100perc-span-select';
            $this->classes_100perc_fields['style_category'] = ' style="width: 100%"';
            $this->classes_100perc_fields['keep_field_size'] = false;
        }



      $_SESSION['scriptcase']['error_icon']['app3_settings']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['app3_settings'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app3_settings']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['app3_settings'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['app3_settings'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app3_settings", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'app3_settings_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app3_settings_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'app3_settings/app3_settings_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app3_settings_erro.class.php"); 
      }
      $this->Erro      = new app3_settings_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app3_settings']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['app3_settings']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['app3_settings']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cookie_expiration_time
      $this->field_config['cookie_expiration_time']               = array();
      $this->field_config['cookie_expiration_time']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cookie_expiration_time']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cookie_expiration_time']['symbol_dec'] = '';
      $this->field_config['cookie_expiration_time']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cookie_expiration_time']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pswd_last_updated
      $this->field_config['pswd_last_updated']               = array();
      $this->field_config['pswd_last_updated']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pswd_last_updated']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pswd_last_updated']['symbol_dec'] = '';
      $this->field_config['pswd_last_updated']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pswd_last_updated']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- brute_force_attempts
      $this->field_config['brute_force_attempts']               = array();
      $this->field_config['brute_force_attempts']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['brute_force_attempts']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['brute_force_attempts']['symbol_dec'] = '';
      $this->field_config['brute_force_attempts']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['brute_force_attempts']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- brute_force_time_block
      $this->field_config['brute_force_time_block']               = array();
      $this->field_config['brute_force_time_block']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['brute_force_time_block']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['brute_force_time_block']['symbol_dec'] = '';
      $this->field_config['brute_force_time_block']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['brute_force_time_block']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- password_min
      $this->field_config['password_min']               = array();
      $this->field_config['password_min']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['password_min']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['password_min']['symbol_dec'] = '';
      $this->field_config['password_min']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['password_min']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- enable_2fa_expiration_time
      $this->field_config['enable_2fa_expiration_time']               = array();
      $this->field_config['enable_2fa_expiration_time']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['enable_2fa_expiration_time']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['enable_2fa_expiration_time']['symbol_dec'] = '';
      $this->field_config['enable_2fa_expiration_time']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['enable_2fa_expiration_time']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- mfa_last_updated
      $this->field_config['mfa_last_updated']               = array();
      $this->field_config['mfa_last_updated']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['mfa_last_updated']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['mfa_last_updated']['symbol_dec'] = '';
      $this->field_config['mfa_last_updated']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['mfa_last_updated']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- smtp_port
      $this->field_config['smtp_port']               = array();
      $this->field_config['smtp_port']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['smtp_port']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['smtp_port']['symbol_dec'] = '';
      $this->field_config['smtp_port']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['smtp_port']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_session_expire' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'session_expire');
          }
          if ('validate_remember_me' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'remember_me');
          }
          if ('validate_cookie_expiration_time' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cookie_expiration_time');
          }
          if ('validate_theme' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'theme');
          }
          if ('validate_language' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'language');
          }
          if ('validate_login_mode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login_mode');
          }
          if ('validate_captcha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'captcha');
          }
          if ('validate_pswd_last_updated' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pswd_last_updated');
          }
          if ('validate_brute_force' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'brute_force');
          }
          if ('validate_brute_force_attempts' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'brute_force_attempts');
          }
          if ('validate_brute_force_time_block' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'brute_force_time_block');
          }
          if ('validate_retrieve_password' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retrieve_password');
          }
          if ('validate_recover_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'recover_pswd');
          }
          if ('validate_password_min' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'password_min');
          }
          if ('validate_password_strength' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'password_strength');
          }
          if ('validate_group_administrator' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'group_administrator');
          }
          if ('validate_enable_2fa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enable_2fa');
          }
          if ('validate_enable_2fa_expiration_time' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enable_2fa_expiration_time');
          }
          if ('validate_enable_2fa_mode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enable_2fa_mode');
          }
          if ('validate_enable_2fa_api_type' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enable_2fa_api_type');
          }
          if ('validate_enable_2fa_api' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enable_2fa_api');
          }
          if ('validate_mfa_last_updated' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mfa_last_updated');
          }
          if ('validate_new_users' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'new_users');
          }
          if ('validate_req_email_act' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'req_email_act');
          }
          if ('validate_send_email_adm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'send_email_adm');
          }
          if ('validate_group_default' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'group_default');
          }
          if ('validate_smtp_api' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_api');
          }
          if ('validate_smtp_server' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_server');
          }
          if ('validate_smtp_port' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_port');
          }
          if ('validate_smtp_security' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_security');
          }
          if ('validate_smtp_user' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_user');
          }
          if ('validate_smtp_pass' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_pass');
          }
          if ('validate_smtp_from_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_from_email');
          }
          if ('validate_smtp_from_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_from_name');
          }
          app3_settings_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_brute_force_onclick' == $this->NM_ajax_opcao)
          {
              $this->brute_force_onClick();
          }
          if ('event_enable_2fa_api_type_onclick' == $this->NM_ajax_opcao)
          {
              $this->enable_2fa_api_type_onClick();
          }
          if ('event_enable_2fa_onclick' == $this->NM_ajax_opcao)
          {
              $this->enable_2fa_onClick();
          }
          if ('event_remember_me_onclick' == $this->NM_ajax_opcao)
          {
              $this->remember_me_onClick();
          }
          if ('event_retrieve_password_onclick' == $this->NM_ajax_opcao)
          {
              $this->retrieve_password_onClick();
          }
          if ('event_smtp_api_onchange' == $this->NM_ajax_opcao)
          {
              $this->smtp_api_onChange();
          }
          app3_settings_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->remember_me))
          {
              $x = 0; 
              $this->remember_me_1 = $this->remember_me;
              $this->remember_me = ""; 
              if ($this->remember_me_1 != "") 
              { 
                  foreach ($this->remember_me_1 as $dados_remember_me_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->remember_me .= ";";
                      } 
                      $this->remember_me .= $dados_remember_me_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->retrieve_password))
          {
              $x = 0; 
              $this->retrieve_password_1 = $this->retrieve_password;
              $this->retrieve_password = ""; 
              if ($this->retrieve_password_1 != "") 
              { 
                  foreach ($this->retrieve_password_1 as $dados_retrieve_password_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->retrieve_password .= ";";
                      } 
                      $this->retrieve_password .= $dados_retrieve_password_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->new_users))
          {
              $x = 0; 
              $this->new_users_1 = $this->new_users;
              $this->new_users = ""; 
              if ($this->new_users_1 != "") 
              { 
                  foreach ($this->new_users_1 as $dados_new_users_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->new_users .= ";";
                      } 
                      $this->new_users .= $dados_new_users_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->enable_2fa))
          {
              $x = 0; 
              $this->enable_2fa_1 = $this->enable_2fa;
              $this->enable_2fa = ""; 
              if ($this->enable_2fa_1 != "") 
              { 
                  foreach ($this->enable_2fa_1 as $dados_enable_2fa_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->enable_2fa .= ";";
                      } 
                      $this->enable_2fa .= $dados_enable_2fa_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->brute_force))
          {
              $x = 0; 
              $this->brute_force_1 = $this->brute_force;
              $this->brute_force = ""; 
              if ($this->brute_force_1 != "") 
              { 
                  foreach ($this->brute_force_1 as $dados_brute_force_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->brute_force .= ";";
                      } 
                      $this->brute_force .= $dados_brute_force_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->captcha))
          {
              $x = 0; 
              $this->captcha_1 = $this->captcha;
              $this->captcha = ""; 
              if ($this->captcha_1 != "") 
              { 
                  foreach ($this->captcha_1 as $dados_captcha_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->captcha .= ";";
                      } 
                      $this->captcha .= $dados_captcha_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->language))
          {
              $x = 0; 
              $this->language_1 = $this->language;
              $this->language = ""; 
              if ($this->language_1 != "") 
              { 
                  foreach ($this->language_1 as $dados_language_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->language .= ";";
                      } 
                      $this->language .= $dados_language_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->req_email_act))
          {
              $x = 0; 
              $this->req_email_act_1 = $this->req_email_act;
              $this->req_email_act = ""; 
              if ($this->req_email_act_1 != "") 
              { 
                  foreach ($this->req_email_act_1 as $dados_req_email_act_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->req_email_act .= ";";
                      } 
                      $this->req_email_act .= $dados_req_email_act_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->send_email_adm))
          {
              $x = 0; 
              $this->send_email_adm_1 = $this->send_email_adm;
              $this->send_email_adm = ""; 
              if ($this->send_email_adm_1 != "") 
              { 
                  foreach ($this->send_email_adm_1 as $dados_send_email_adm_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->send_email_adm .= ";";
                      } 
                      $this->send_email_adm .= $dados_send_email_adm_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->password_strength))
          {
              $x = 0; 
              $this->password_strength_1 = $this->password_strength;
              $this->password_strength = ""; 
              if ($this->password_strength_1 != "") 
              { 
                  foreach ($this->password_strength_1 as $dados_password_strength_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->password_strength .= ";";
                      } 
                      $this->password_strength .= $dados_password_strength_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              app3_settings_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  app3_settings_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro, '', true, true); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  app3_settings_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->session_expire = "" ;  
          $this->remember_me = "" ;  
          $this->cookie_expiration_time = "30" ;  
          $this->retrieve_password = "" ;  
          $this->new_users = "" ;  
          $this->brute_force_time_block = "30" ;  
          $this->brute_force_attempts = "5" ;  
          $this->enable_2fa = "" ;  
          $this->enable_2fa_expiration_time = "30" ;  
          $this->brute_force = "" ;  
          $this->captcha = "" ;  
          $this->theme = "" ;  
          $this->language = "" ;  
          $this->recover_pswd = "" ;  
          $this->req_email_act = "" ;  
          $this->send_email_adm = "" ;  
          $this->group_default = "" ;  
          $this->smtp_api = "" ;  
          $this->smtp_server = "" ;  
          $this->smtp_port = "" ;  
          $this->smtp_user = "" ;  
          $this->smtp_from_email = "" ;  
          $this->smtp_from_name = "" ;  
          $this->smtp_pass = "" ;  
          $this->enable_2fa_mode = "" ;  
          $this->smtp_security = "" ;  
          $this->enable_2fa_api = "" ;  
          $this->enable_2fa_api_type = "" ;  
          $this->login_mode = "" ;  
          $this->pswd_last_updated = "" ;  
          $this->password_strength = "" ;  
          $this->password_min = "" ;  
          $this->mfa_last_updated = "" ;  
          $this->group_administrator = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos']))
              { 
                  $session_expire = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][0]; 
                  $remember_me = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][1]; 
                  $cookie_expiration_time = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][2]; 
                  $theme = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][3]; 
                  $language = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][4]; 
                  $login_mode = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][5]; 
                  $captcha = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][6]; 
                  $pswd_last_updated = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][7]; 
                  $brute_force = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][8]; 
                  $brute_force_attempts = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][9]; 
                  $brute_force_time_block = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][10]; 
                  $retrieve_password = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][11]; 
                  $recover_pswd = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][12]; 
                  $password_min = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][13]; 
                  $password_strength = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][14]; 
                  $group_administrator = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][15]; 
                  $enable_2fa = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][16]; 
                  $enable_2fa_expiration_time = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][17]; 
                  $enable_2fa_mode = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][18]; 
                  $enable_2fa_api_type = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][19]; 
                  $enable_2fa_api = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][20]; 
                  $mfa_last_updated = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][21]; 
                  $new_users = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][22]; 
                  $req_email_act = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][23]; 
                  $send_email_adm = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][24]; 
                  $group_default = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][25]; 
                  $smtp_api = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][26]; 
                  $smtp_server = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][27]; 
                  $smtp_port = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][28]; 
                  $smtp_security = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][29]; 
                  $smtp_user = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][30]; 
                  $smtp_pass = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][31]; 
                  $smtp_from_email = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][32]; 
                  $smtp_from_name = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][33]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][0] = $this->session_expire; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][1] = $this->remember_me; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][2] = $this->cookie_expiration_time; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][3] = $this->theme; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][4] = $this->language; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][5] = $this->login_mode; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][6] = $this->captcha; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][7] = $this->pswd_last_updated; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][8] = $this->brute_force; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][9] = $this->brute_force_attempts; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][10] = $this->brute_force_time_block; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][11] = $this->retrieve_password; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][12] = $this->recover_pswd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][13] = $this->password_min; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][14] = $this->password_strength; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][15] = $this->group_administrator; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][16] = $this->enable_2fa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][17] = $this->enable_2fa_expiration_time; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][18] = $this->enable_2fa_mode; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][19] = $this->enable_2fa_api_type; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][20] = $this->enable_2fa_api; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][21] = $this->mfa_last_updated; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][22] = $this->new_users; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][23] = $this->req_email_act; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][24] = $this->send_email_adm; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][25] = $this->group_default; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][26] = $this->smtp_api; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][27] = $this->smtp_server; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][28] = $this->smtp_port; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][29] = $this->smtp_security; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][30] = $this->smtp_user; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][31] = $this->smtp_pass; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][32] = $this->smtp_from_email; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['campos'][33] = $this->smtp_from_name; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("app3_settings", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("app3_settings_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              app3_settings_pack_ajax_response();
              exit;
          }
      }
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     if (parent.writeFastMenu)
     {
         parent.writeFastMenu(link_atual);
     }
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     if (parent.clearFastMenu)
     {
        parent.clearFastMenu();
     }
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "app3_settings.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings'][$path_doc_md5][1] = $Zip_name;
?><!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_settings'] . "") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="app3_settings_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="app3_settings"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'session_expire':
               return "" . $this->Ini->Nm_lang['lang_sec_set_session_expire'] . "";
               break;
           case 'remember_me':
               return "" . $this->Ini->Nm_lang['lang_sec_set_remember_me'] . "";
               break;
           case 'cookie_expiration_time':
               return "" . $this->Ini->Nm_lang['lang_sec_set_cookie_exp_time'] . "";
               break;
           case 'theme':
               return "" . $this->Ini->Nm_lang['lang_sec_set_theme'] . "";
               break;
           case 'language':
               return "" . $this->Ini->Nm_lang['lang_sec_set_language'] . "";
               break;
           case 'login_mode':
               return "" . $this->Ini->Nm_lang['lang_sec_set_login_mode'] . "";
               break;
           case 'captcha':
               return "" . $this->Ini->Nm_lang['lang_sec_set_captcha'] . "";
               break;
           case 'pswd_last_updated':
               return "" . $this->Ini->Nm_lang['lang_sec_set_pswd_last_updated'] . "";
               break;
           case 'brute_force':
               return "" . $this->Ini->Nm_lang['lang_sec_set_brute_force'] . "";
               break;
           case 'brute_force_attempts':
               return "" . $this->Ini->Nm_lang['lang_sec_set_bf_attempts'] . "";
               break;
           case 'brute_force_time_block':
               return "" . $this->Ini->Nm_lang['lang_sec_set_bf_time_bl'] . "";
               break;
           case 'retrieve_password':
               return "" . $this->Ini->Nm_lang['lang_sec_set_retrieve_password'] . "";
               break;
           case 'recover_pswd':
               return "" . $this->Ini->Nm_lang['lang_sec_set_recover_pswd'] . "";
               break;
           case 'password_min':
               return "" . $this->Ini->Nm_lang['lang_sec_set_password_min'] . "";
               break;
           case 'password_strength':
               return "" . $this->Ini->Nm_lang['lang_sec_set_password_strength'] . "";
               break;
           case 'group_administrator':
               return "" . $this->Ini->Nm_lang['lang_sec_set_group_administrator'] . "";
               break;
           case 'enable_2fa':
               return "" . $this->Ini->Nm_lang['lang_sec_set_2fa'] . "";
               break;
           case 'enable_2fa_expiration_time':
               return "" . $this->Ini->Nm_lang['lang_sec_set_2fa_exp_time'] . "";
               break;
           case 'enable_2fa_mode':
               return "" . $this->Ini->Nm_lang['lang_sec_set_enable_2fa_mode'] . "";
               break;
           case 'enable_2fa_api_type':
               return "" . $this->Ini->Nm_lang['lang_sec_set_enable_2fa_api_type'] . "";
               break;
           case 'enable_2fa_api':
               return "" . $this->Ini->Nm_lang['lang_sec_set_enable_2fa_api'] . "";
               break;
           case 'mfa_last_updated':
               return "" . $this->Ini->Nm_lang['lang_sec_set_mfa_last_updated'] . "";
               break;
           case 'new_users':
               return "" . $this->Ini->Nm_lang['lang_sec_set_new_users'] . "";
               break;
           case 'req_email_act':
               return "" . $this->Ini->Nm_lang['lang_sec_set_req_email_act'] . "";
               break;
           case 'send_email_adm':
               return "" . $this->Ini->Nm_lang['lang_sec_set_send_email_adm'] . "";
               break;
           case 'group_default':
               return "" . $this->Ini->Nm_lang['lang_sec_set_group_default'] . "";
               break;
           case 'smtp_api':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_api'] . "";
               break;
           case 'smtp_server':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_server'] . "";
               break;
           case 'smtp_port':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_port'] . "";
               break;
           case 'smtp_security':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_security'] . "";
               break;
           case 'smtp_user':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_user'] . "";
               break;
           case 'smtp_pass':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_smtp_pass'] . "";
               break;
           case 'smtp_from_email':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_from_email'] . "";
               break;
           case 'smtp_from_name':
               return "" . $this->Ini->Nm_lang['lang_sec_set_smtp_from_name'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_app3_settings']) || !is_array($this->NM_ajax_info['errList']['geral_app3_settings']))
              {
                  $this->NM_ajax_info['errList']['geral_app3_settings'] = array();
              }
              $this->NM_ajax_info['errList']['geral_app3_settings'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'session_expire' == $filtro)) || (is_array($filtro) && in_array('session_expire', $filtro)))
        $this->ValidateField_session_expire($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'remember_me' == $filtro)) || (is_array($filtro) && in_array('remember_me', $filtro)))
        $this->ValidateField_remember_me($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cookie_expiration_time' == $filtro)) || (is_array($filtro) && in_array('cookie_expiration_time', $filtro)))
        $this->ValidateField_cookie_expiration_time($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'theme' == $filtro)) || (is_array($filtro) && in_array('theme', $filtro)))
        $this->ValidateField_theme($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'language' == $filtro)) || (is_array($filtro) && in_array('language', $filtro)))
        $this->ValidateField_language($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'login_mode' == $filtro)) || (is_array($filtro) && in_array('login_mode', $filtro)))
        $this->ValidateField_login_mode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'captcha' == $filtro)) || (is_array($filtro) && in_array('captcha', $filtro)))
        $this->ValidateField_captcha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pswd_last_updated' == $filtro)) || (is_array($filtro) && in_array('pswd_last_updated', $filtro)))
        $this->ValidateField_pswd_last_updated($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'brute_force' == $filtro)) || (is_array($filtro) && in_array('brute_force', $filtro)))
        $this->ValidateField_brute_force($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'brute_force_attempts' == $filtro)) || (is_array($filtro) && in_array('brute_force_attempts', $filtro)))
        $this->ValidateField_brute_force_attempts($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'brute_force_time_block' == $filtro)) || (is_array($filtro) && in_array('brute_force_time_block', $filtro)))
        $this->ValidateField_brute_force_time_block($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'retrieve_password' == $filtro)) || (is_array($filtro) && in_array('retrieve_password', $filtro)))
        $this->ValidateField_retrieve_password($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'recover_pswd' == $filtro)) || (is_array($filtro) && in_array('recover_pswd', $filtro)))
        $this->ValidateField_recover_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'password_min' == $filtro)) || (is_array($filtro) && in_array('password_min', $filtro)))
        $this->ValidateField_password_min($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'password_strength' == $filtro)) || (is_array($filtro) && in_array('password_strength', $filtro)))
        $this->ValidateField_password_strength($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'group_administrator' == $filtro)) || (is_array($filtro) && in_array('group_administrator', $filtro)))
        $this->ValidateField_group_administrator($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'enable_2fa' == $filtro)) || (is_array($filtro) && in_array('enable_2fa', $filtro)))
        $this->ValidateField_enable_2fa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'enable_2fa_expiration_time' == $filtro)) || (is_array($filtro) && in_array('enable_2fa_expiration_time', $filtro)))
        $this->ValidateField_enable_2fa_expiration_time($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'enable_2fa_mode' == $filtro)) || (is_array($filtro) && in_array('enable_2fa_mode', $filtro)))
        $this->ValidateField_enable_2fa_mode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'enable_2fa_api_type' == $filtro)) || (is_array($filtro) && in_array('enable_2fa_api_type', $filtro)))
        $this->ValidateField_enable_2fa_api_type($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'enable_2fa_api' == $filtro)) || (is_array($filtro) && in_array('enable_2fa_api', $filtro)))
        $this->ValidateField_enable_2fa_api($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'mfa_last_updated' == $filtro)) || (is_array($filtro) && in_array('mfa_last_updated', $filtro)))
        $this->ValidateField_mfa_last_updated($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'new_users' == $filtro)) || (is_array($filtro) && in_array('new_users', $filtro)))
        $this->ValidateField_new_users($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'req_email_act' == $filtro)) || (is_array($filtro) && in_array('req_email_act', $filtro)))
        $this->ValidateField_req_email_act($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'send_email_adm' == $filtro)) || (is_array($filtro) && in_array('send_email_adm', $filtro)))
        $this->ValidateField_send_email_adm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'group_default' == $filtro)) || (is_array($filtro) && in_array('group_default', $filtro)))
        $this->ValidateField_group_default($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_api' == $filtro)) || (is_array($filtro) && in_array('smtp_api', $filtro)))
        $this->ValidateField_smtp_api($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_server' == $filtro)) || (is_array($filtro) && in_array('smtp_server', $filtro)))
        $this->ValidateField_smtp_server($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_port' == $filtro)) || (is_array($filtro) && in_array('smtp_port', $filtro)))
        $this->ValidateField_smtp_port($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_security' == $filtro)) || (is_array($filtro) && in_array('smtp_security', $filtro)))
        $this->ValidateField_smtp_security($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_user' == $filtro)) || (is_array($filtro) && in_array('smtp_user', $filtro)))
        $this->ValidateField_smtp_user($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_pass' == $filtro)) || (is_array($filtro) && in_array('smtp_pass', $filtro)))
        $this->ValidateField_smtp_pass($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_from_email' == $filtro)) || (is_array($filtro) && in_array('smtp_from_email', $filtro)))
        $this->ValidateField_smtp_from_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'smtp_from_name' == $filtro)) || (is_array($filtro) && in_array('smtp_from_name', $filtro)))
        $this->ValidateField_smtp_from_name($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_brute_force = $this->brute_force;
    $original_brute_force_attempts = $this->brute_force_attempts;
    $original_brute_force_time_block = $this->brute_force_time_block;
    $original_captcha = $this->captcha;
    $original_cookie_expiration_time = $this->cookie_expiration_time;
    $original_enable_2fa = $this->enable_2fa;
    $original_enable_2fa_api = $this->enable_2fa_api;
    $original_enable_2fa_api_type = $this->enable_2fa_api_type;
    $original_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
    $original_enable_2fa_mode = $this->enable_2fa_mode;
    $original_group_administrator = $this->group_administrator;
    $original_group_default = $this->group_default;
    $original_language = $this->language;
    $original_login_mode = $this->login_mode;
    $original_mfa_last_updated = $this->mfa_last_updated;
    $original_new_users = $this->new_users;
    $original_password_min = $this->password_min;
    $original_password_strength = $this->password_strength;
    $original_pswd_last_updated = $this->pswd_last_updated;
    $original_recover_pswd = $this->recover_pswd;
    $original_remember_me = $this->remember_me;
    $original_req_email_act = $this->req_email_act;
    $original_retrieve_password = $this->retrieve_password;
    $original_send_email_adm = $this->send_email_adm;
    $original_session_expire = $this->session_expire;
    $original_smtp_api = $this->smtp_api;
    $original_smtp_from_email = $this->smtp_from_email;
    $original_smtp_from_name = $this->smtp_from_name;
    $original_smtp_pass = $this->smtp_pass;
    $original_smtp_port = $this->smtp_port;
    $original_smtp_security = $this->smtp_security;
    $original_smtp_server = $this->smtp_server;
    $original_smtp_user = $this->smtp_user;
    $original_theme = $this->theme;
}
  $sql = "UPDATE sec_settings SET set_value=";


     $nm_select = $sql . $this->Db->qstr($this->session_expire )      . " WHERE set_name=". $this->Db->qstr('session_expire'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->remember_me )      . " WHERE set_name=". $this->Db->qstr('remember_me'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->cookie_expiration_time )      . " WHERE set_name=". $this->Db->qstr('cookie_expiration_time'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->retrieve_password )      . " WHERE set_name=". $this->Db->qstr('retrieve_password'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->recover_pswd )      . " WHERE set_name=". $this->Db->qstr('recover_pswd'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->new_users )      . " WHERE set_name=". $this->Db->qstr('new_users'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->brute_force )      . " WHERE set_name=". $this->Db->qstr('brute_force'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->brute_force_time_block )      . " WHERE set_name=". $this->Db->qstr('brute_force_time_block'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->brute_force_attempts )      . " WHERE set_name=". $this->Db->qstr('brute_force_attempts'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->enable_2fa )      . " WHERE set_name=". $this->Db->qstr('enable_2fa'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->enable_2fa_expiration_time )      . " WHERE set_name=". $this->Db->qstr('enable_2fa_expiration_time'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->enable_2fa_mode )      . " WHERE set_name=". $this->Db->qstr('enable_2fa_mode'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->mfa_last_updated )      . " WHERE set_name=". $this->Db->qstr('mfa_last_updated'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

if(strpos($this->enable_2fa_api , "css_api_obj_fld") !== false){
    $this->enable_2fa_api  = '';
}


     $nm_select = $sql . $this->Db->qstr($this->enable_2fa_api )      . " WHERE set_name=". $this->Db->qstr('enable_2fa_api'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->enable_2fa_api_type )      . " WHERE set_name=". $this->Db->qstr('enable_2fa_api_type'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->captcha )      . " WHERE set_name=". $this->Db->qstr('captcha'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->theme )      . " WHERE set_name=". $this->Db->qstr('theme'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->req_email_act )      . " WHERE set_name=". $this->Db->qstr('req_email_act'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->send_email_adm )      . " WHERE set_name=". $this->Db->qstr('send_email_adm'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->group_default )      . " WHERE set_name=". $this->Db->qstr('group_default'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->group_administrator )      . " WHERE set_name=". $this->Db->qstr('group_administrator'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->language )      . " WHERE set_name=". $this->Db->qstr('language'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

if(strpos($this->smtp_api , "css_api_obj_fld") !== false){
    $this->smtp_api  = '';
}


     $nm_select = $sql . $this->Db->qstr($this->smtp_api )      . " WHERE set_name=". $this->Db->qstr('smtp_api'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_server )      . " WHERE set_name=". $this->Db->qstr('smtp_server'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_port )      . " WHERE set_name=". $this->Db->qstr('smtp_port'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_security )      . " WHERE set_name=". $this->Db->qstr('smtp_security'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_user )      . " WHERE set_name=". $this->Db->qstr('smtp_user'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_pass )      . " WHERE set_name=". $this->Db->qstr('smtp_pass'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_from_email )      . " WHERE set_name=". $this->Db->qstr('smtp_from_email'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->smtp_from_name )      . " WHERE set_name=". $this->Db->qstr('smtp_from_name'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->login_mode )      . " WHERE set_name=". $this->Db->qstr('login_mode'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->pswd_last_updated )      . " WHERE set_name=". $this->Db->qstr('pswd_last_updated'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->password_strength )      . " WHERE set_name=". $this->Db->qstr('password_strength'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


     $nm_select = $sql . $this->Db->qstr($this->password_min )      . " WHERE set_name=". $this->Db->qstr('password_min'); 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                app3_settings_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      


$this->nm_mens_alert[] = $this->Ini->Nm_lang['lang_sec_set_saved']; $this->nm_params_alert[] = array(
                'title' => '',
                'type' => 'success',
                'timer' => '10000',
                'showConfirmButton' => false,
                'position' => 'center',
                'toast' => true
                ); if ($this->NM_ajax_flag) { $this->sc_ajax_alert($this->Ini->Nm_lang['lang_sec_set_saved'], array(
                'title' => '',
                'type' => 'success',
                'timer' => '10000',
                'showConfirmButton' => false,
                'position' => 'center',
                'toast' => true
                )); }$this->get_settings();
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_brute_force != $this->brute_force || (isset($bFlagRead_brute_force) && $bFlagRead_brute_force)))
    {
        $this->ajax_return_values_brute_force(true);
    }
    if (($original_brute_force_attempts != $this->brute_force_attempts || (isset($bFlagRead_brute_force_attempts) && $bFlagRead_brute_force_attempts)))
    {
        $this->ajax_return_values_brute_force_attempts(true);
    }
    if (($original_brute_force_time_block != $this->brute_force_time_block || (isset($bFlagRead_brute_force_time_block) && $bFlagRead_brute_force_time_block)))
    {
        $this->ajax_return_values_brute_force_time_block(true);
    }
    if (($original_captcha != $this->captcha || (isset($bFlagRead_captcha) && $bFlagRead_captcha)))
    {
        $this->ajax_return_values_captcha(true);
    }
    if (($original_cookie_expiration_time != $this->cookie_expiration_time || (isset($bFlagRead_cookie_expiration_time) && $bFlagRead_cookie_expiration_time)))
    {
        $this->ajax_return_values_cookie_expiration_time(true);
    }
    if (($original_enable_2fa != $this->enable_2fa || (isset($bFlagRead_enable_2fa) && $bFlagRead_enable_2fa)))
    {
        $this->ajax_return_values_enable_2fa(true);
    }
    if (($original_enable_2fa_api != $this->enable_2fa_api || (isset($bFlagRead_enable_2fa_api) && $bFlagRead_enable_2fa_api)))
    {
        $this->ajax_return_values_enable_2fa_api(true);
    }
    if (($original_enable_2fa_api_type != $this->enable_2fa_api_type || (isset($bFlagRead_enable_2fa_api_type) && $bFlagRead_enable_2fa_api_type)))
    {
        $this->ajax_return_values_enable_2fa_api_type(true);
    }
    if (($original_enable_2fa_expiration_time != $this->enable_2fa_expiration_time || (isset($bFlagRead_enable_2fa_expiration_time) && $bFlagRead_enable_2fa_expiration_time)))
    {
        $this->ajax_return_values_enable_2fa_expiration_time(true);
    }
    if (($original_enable_2fa_mode != $this->enable_2fa_mode || (isset($bFlagRead_enable_2fa_mode) && $bFlagRead_enable_2fa_mode)))
    {
        $this->ajax_return_values_enable_2fa_mode(true);
    }
    if (($original_group_administrator != $this->group_administrator || (isset($bFlagRead_group_administrator) && $bFlagRead_group_administrator)))
    {
        $this->ajax_return_values_group_administrator(true);
    }
    if (($original_group_default != $this->group_default || (isset($bFlagRead_group_default) && $bFlagRead_group_default)))
    {
        $this->ajax_return_values_group_default(true);
    }
    if (($original_language != $this->language || (isset($bFlagRead_language) && $bFlagRead_language)))
    {
        $this->ajax_return_values_language(true);
    }
    if (($original_login_mode != $this->login_mode || (isset($bFlagRead_login_mode) && $bFlagRead_login_mode)))
    {
        $this->ajax_return_values_login_mode(true);
    }
    if (($original_mfa_last_updated != $this->mfa_last_updated || (isset($bFlagRead_mfa_last_updated) && $bFlagRead_mfa_last_updated)))
    {
        $this->ajax_return_values_mfa_last_updated(true);
    }
    if (($original_new_users != $this->new_users || (isset($bFlagRead_new_users) && $bFlagRead_new_users)))
    {
        $this->ajax_return_values_new_users(true);
    }
    if (($original_password_min != $this->password_min || (isset($bFlagRead_password_min) && $bFlagRead_password_min)))
    {
        $this->ajax_return_values_password_min(true);
    }
    if (($original_password_strength != $this->password_strength || (isset($bFlagRead_password_strength) && $bFlagRead_password_strength)))
    {
        $this->ajax_return_values_password_strength(true);
    }
    if (($original_pswd_last_updated != $this->pswd_last_updated || (isset($bFlagRead_pswd_last_updated) && $bFlagRead_pswd_last_updated)))
    {
        $this->ajax_return_values_pswd_last_updated(true);
    }
    if (($original_recover_pswd != $this->recover_pswd || (isset($bFlagRead_recover_pswd) && $bFlagRead_recover_pswd)))
    {
        $this->ajax_return_values_recover_pswd(true);
    }
    if (($original_remember_me != $this->remember_me || (isset($bFlagRead_remember_me) && $bFlagRead_remember_me)))
    {
        $this->ajax_return_values_remember_me(true);
    }
    if (($original_req_email_act != $this->req_email_act || (isset($bFlagRead_req_email_act) && $bFlagRead_req_email_act)))
    {
        $this->ajax_return_values_req_email_act(true);
    }
    if (($original_retrieve_password != $this->retrieve_password || (isset($bFlagRead_retrieve_password) && $bFlagRead_retrieve_password)))
    {
        $this->ajax_return_values_retrieve_password(true);
    }
    if (($original_send_email_adm != $this->send_email_adm || (isset($bFlagRead_send_email_adm) && $bFlagRead_send_email_adm)))
    {
        $this->ajax_return_values_send_email_adm(true);
    }
    if (($original_session_expire != $this->session_expire || (isset($bFlagRead_session_expire) && $bFlagRead_session_expire)))
    {
        $this->ajax_return_values_session_expire(true);
    }
    if (($original_smtp_api != $this->smtp_api || (isset($bFlagRead_smtp_api) && $bFlagRead_smtp_api)))
    {
        $this->ajax_return_values_smtp_api(true);
    }
    if (($original_smtp_from_email != $this->smtp_from_email || (isset($bFlagRead_smtp_from_email) && $bFlagRead_smtp_from_email)))
    {
        $this->ajax_return_values_smtp_from_email(true);
    }
    if (($original_smtp_from_name != $this->smtp_from_name || (isset($bFlagRead_smtp_from_name) && $bFlagRead_smtp_from_name)))
    {
        $this->ajax_return_values_smtp_from_name(true);
    }
    if (($original_smtp_pass != $this->smtp_pass || (isset($bFlagRead_smtp_pass) && $bFlagRead_smtp_pass)))
    {
        $this->ajax_return_values_smtp_pass(true);
    }
    if (($original_smtp_port != $this->smtp_port || (isset($bFlagRead_smtp_port) && $bFlagRead_smtp_port)))
    {
        $this->ajax_return_values_smtp_port(true);
    }
    if (($original_smtp_security != $this->smtp_security || (isset($bFlagRead_smtp_security) && $bFlagRead_smtp_security)))
    {
        $this->ajax_return_values_smtp_security(true);
    }
    if (($original_smtp_server != $this->smtp_server || (isset($bFlagRead_smtp_server) && $bFlagRead_smtp_server)))
    {
        $this->ajax_return_values_smtp_server(true);
    }
    if (($original_smtp_user != $this->smtp_user || (isset($bFlagRead_smtp_user) && $bFlagRead_smtp_user)))
    {
        $this->ajax_return_values_smtp_user(true);
    }
    if (($original_theme != $this->theme || (isset($bFlagRead_theme) && $bFlagRead_theme)))
    {
        $this->ajax_return_values_theme(true);
    }
}
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off'; 
      }
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sett_smtp_from_name)) {$this->sc_temp_sett_smtp_from_name = (isset($_SESSION['sett_smtp_from_name'])) ? $_SESSION['sett_smtp_from_name'] : "";}
if (!isset($this->sc_temp_sett_smtp_from_email)) {$this->sc_temp_sett_smtp_from_email = (isset($_SESSION['sett_smtp_from_email'])) ? $_SESSION['sett_smtp_from_email'] : "";}
if (!isset($this->sc_temp_sett_smtp_pass)) {$this->sc_temp_sett_smtp_pass = (isset($_SESSION['sett_smtp_pass'])) ? $_SESSION['sett_smtp_pass'] : "";}
if (!isset($this->sc_temp_sett_smtp_user)) {$this->sc_temp_sett_smtp_user = (isset($_SESSION['sett_smtp_user'])) ? $_SESSION['sett_smtp_user'] : "";}
if (!isset($this->sc_temp_sett_smtp_port)) {$this->sc_temp_sett_smtp_port = (isset($_SESSION['sett_smtp_port'])) ? $_SESSION['sett_smtp_port'] : "";}
if (!isset($this->sc_temp_sett_smtp_security)) {$this->sc_temp_sett_smtp_security = (isset($_SESSION['sett_smtp_security'])) ? $_SESSION['sett_smtp_security'] : "";}
if (!isset($this->sc_temp_sett_smtp_server)) {$this->sc_temp_sett_smtp_server = (isset($_SESSION['sett_smtp_server'])) ? $_SESSION['sett_smtp_server'] : "";}
if (!isset($this->sc_temp_sett_smtp)) {$this->sc_temp_sett_smtp = (isset($_SESSION['sett_smtp'])) ? $_SESSION['sett_smtp'] : "";}
if (!isset($this->sc_temp_sett_smtp_api)) {$this->sc_temp_sett_smtp_api = (isset($_SESSION['sett_smtp_api'])) ? $_SESSION['sett_smtp_api'] : "";}
  if($this->sc_temp_sett_smtp_api == 'custom'){
	$this->sc_temp_sett_smtp = array(
		'settings' => array(
			'gateway'       => 'smtp',
			'smtp_server'   => $this->sc_temp_sett_smtp_server,
			'smtp_protocol' => $this->sc_temp_sett_smtp_security,
			'smtp_port'     => $this->sc_temp_sett_smtp_port,
			'smtp_user'     => $this->sc_temp_sett_smtp_user,
			'smtp_password' => $this->sc_temp_sett_smtp_pass,
			'from_email'    => $this->sc_temp_sett_smtp_from_email,
			'from_name'     => $this->sc_temp_sett_smtp_from_name,
		)
	);
}else{
	$this->sc_temp_sett_smtp = array('profile' => $_SESSION['sett_smtp_api']);
}
if (isset($this->sc_temp_sett_smtp_api)) { $_SESSION['sett_smtp_api'] = $this->sc_temp_sett_smtp_api;}
if (isset($this->sc_temp_sett_smtp)) { $_SESSION['sett_smtp'] = $this->sc_temp_sett_smtp;}
if (isset($this->sc_temp_sett_smtp_server)) { $_SESSION['sett_smtp_server'] = $this->sc_temp_sett_smtp_server;}
if (isset($this->sc_temp_sett_smtp_security)) { $_SESSION['sett_smtp_security'] = $this->sc_temp_sett_smtp_security;}
if (isset($this->sc_temp_sett_smtp_port)) { $_SESSION['sett_smtp_port'] = $this->sc_temp_sett_smtp_port;}
if (isset($this->sc_temp_sett_smtp_user)) { $_SESSION['sett_smtp_user'] = $this->sc_temp_sett_smtp_user;}
if (isset($this->sc_temp_sett_smtp_pass)) { $_SESSION['sett_smtp_pass'] = $this->sc_temp_sett_smtp_pass;}
if (isset($this->sc_temp_sett_smtp_from_email)) { $_SESSION['sett_smtp_from_email'] = $this->sc_temp_sett_smtp_from_email;}
if (isset($this->sc_temp_sett_smtp_from_name)) { $_SESSION['sett_smtp_from_name'] = $this->sc_temp_sett_smtp_from_name;}
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_session_expire(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['session_expire'])) {
       return;
   }
      if ($this->session_expire == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'session_expire';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_session_expire

    function ValidateField_remember_me(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['remember_me'])) {
       return;
   }
      if ($this->remember_me == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->remember_me = "N";
      } 
      else 
      { 
          if (is_array($this->remember_me))
          {
              $x = 0; 
              $this->remember_me_1 = array(); 
              foreach ($this->remember_me as $ind => $dados_remember_me_1 ) 
              {
                  if ($dados_remember_me_1 != "") 
                  {
                      $this->remember_me_1[] = $dados_remember_me_1;
                  } 
              } 
              $this->remember_me = ""; 
              foreach ($this->remember_me_1 as $dados_remember_me_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->remember_me .= ";";
                   } 
                   $this->remember_me .= $dados_remember_me_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'remember_me';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_remember_me

    function ValidateField_cookie_expiration_time(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['cookie_expiration_time'])) {
          nm_limpa_numero($this->cookie_expiration_time, $this->field_config['cookie_expiration_time']['symbol_grp']) ; 
          return;
      }
      if ($this->cookie_expiration_time === "" || is_null($this->cookie_expiration_time))  
      { 
          $this->cookie_expiration_time = 0;
          $this->sc_force_zero[] = 'cookie_expiration_time';
      } 
      nm_limpa_numero($this->cookie_expiration_time, $this->field_config['cookie_expiration_time']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cookie_expiration_time != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->cookie_expiration_time) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_cookie_exp_time'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cookie_expiration_time']))
                  {
                      $Campos_Erros['cookie_expiration_time'] = array();
                  }
                  $Campos_Erros['cookie_expiration_time'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cookie_expiration_time']) || !is_array($this->NM_ajax_info['errList']['cookie_expiration_time']))
                  {
                      $this->NM_ajax_info['errList']['cookie_expiration_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['cookie_expiration_time'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cookie_expiration_time, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_cookie_exp_time'] . "; " ; 
                  if (!isset($Campos_Erros['cookie_expiration_time']))
                  {
                      $Campos_Erros['cookie_expiration_time'] = array();
                  }
                  $Campos_Erros['cookie_expiration_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cookie_expiration_time']) || !is_array($this->NM_ajax_info['errList']['cookie_expiration_time']))
                  {
                      $this->NM_ajax_info['errList']['cookie_expiration_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['cookie_expiration_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cookie_expiration_time';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cookie_expiration_time

    function ValidateField_theme(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['theme'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->theme) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'theme';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_theme

    function ValidateField_language(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['language'])) {
       return;
   }
      if ($this->language == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->language = "N";
      } 
      else 
      { 
          if (is_array($this->language))
          {
              $x = 0; 
              $this->language_1 = array(); 
              foreach ($this->language as $ind => $dados_language_1 ) 
              {
                  if ($dados_language_1 != "") 
                  {
                      $this->language_1[] = $dados_language_1;
                  } 
              } 
              $this->language = ""; 
              foreach ($this->language_1 as $dados_language_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->language .= ";";
                   } 
                   $this->language .= $dados_language_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'language';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_language

    function ValidateField_login_mode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['login_mode'])) {
       return;
   }
      if ($this->login_mode == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'login_mode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_login_mode

    function ValidateField_captcha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['captcha'])) {
       return;
   }
      if ($this->captcha == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->captcha = "N";
      } 
      else 
      { 
          if (is_array($this->captcha))
          {
              $x = 0; 
              $this->captcha_1 = array(); 
              foreach ($this->captcha as $ind => $dados_captcha_1 ) 
              {
                  if ($dados_captcha_1 != "") 
                  {
                      $this->captcha_1[] = $dados_captcha_1;
                  } 
              } 
              $this->captcha = ""; 
              foreach ($this->captcha_1 as $dados_captcha_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->captcha .= ";";
                   } 
                   $this->captcha .= $dados_captcha_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'captcha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_captcha

    function ValidateField_pswd_last_updated(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['pswd_last_updated'])) {
          nm_limpa_numero($this->pswd_last_updated, $this->field_config['pswd_last_updated']['symbol_grp']) ; 
          return;
      }
      if ($this->pswd_last_updated === "" || is_null($this->pswd_last_updated))  
      { 
          $this->pswd_last_updated = 0;
          $this->sc_force_zero[] = 'pswd_last_updated';
      } 
      nm_limpa_numero($this->pswd_last_updated, $this->field_config['pswd_last_updated']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pswd_last_updated != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->pswd_last_updated) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_pswd_last_updated'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pswd_last_updated']))
                  {
                      $Campos_Erros['pswd_last_updated'] = array();
                  }
                  $Campos_Erros['pswd_last_updated'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pswd_last_updated']) || !is_array($this->NM_ajax_info['errList']['pswd_last_updated']))
                  {
                      $this->NM_ajax_info['errList']['pswd_last_updated'] = array();
                  }
                  $this->NM_ajax_info['errList']['pswd_last_updated'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pswd_last_updated, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_pswd_last_updated'] . "; " ; 
                  if (!isset($Campos_Erros['pswd_last_updated']))
                  {
                      $Campos_Erros['pswd_last_updated'] = array();
                  }
                  $Campos_Erros['pswd_last_updated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pswd_last_updated']) || !is_array($this->NM_ajax_info['errList']['pswd_last_updated']))
                  {
                      $this->NM_ajax_info['errList']['pswd_last_updated'] = array();
                  }
                  $this->NM_ajax_info['errList']['pswd_last_updated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pswd_last_updated';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pswd_last_updated

    function ValidateField_brute_force(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['brute_force'])) {
       return;
   }
      if ($this->brute_force == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->brute_force = "N";
      } 
      else 
      { 
          if (is_array($this->brute_force))
          {
              $x = 0; 
              $this->brute_force_1 = array(); 
              foreach ($this->brute_force as $ind => $dados_brute_force_1 ) 
              {
                  if ($dados_brute_force_1 != "") 
                  {
                      $this->brute_force_1[] = $dados_brute_force_1;
                  } 
              } 
              $this->brute_force = ""; 
              foreach ($this->brute_force_1 as $dados_brute_force_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->brute_force .= ";";
                   } 
                   $this->brute_force .= $dados_brute_force_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'brute_force';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_brute_force

    function ValidateField_brute_force_attempts(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['brute_force_attempts'])) {
          nm_limpa_numero($this->brute_force_attempts, $this->field_config['brute_force_attempts']['symbol_grp']) ; 
          return;
      }
      if ($this->brute_force_attempts === "" || is_null($this->brute_force_attempts))  
      { 
          $this->brute_force_attempts = 0;
          $this->sc_force_zero[] = 'brute_force_attempts';
      } 
      nm_limpa_numero($this->brute_force_attempts, $this->field_config['brute_force_attempts']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->brute_force_attempts != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->brute_force_attempts) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_bf_attempts'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['brute_force_attempts']))
                  {
                      $Campos_Erros['brute_force_attempts'] = array();
                  }
                  $Campos_Erros['brute_force_attempts'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['brute_force_attempts']) || !is_array($this->NM_ajax_info['errList']['brute_force_attempts']))
                  {
                      $this->NM_ajax_info['errList']['brute_force_attempts'] = array();
                  }
                  $this->NM_ajax_info['errList']['brute_force_attempts'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->brute_force_attempts, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_bf_attempts'] . "; " ; 
                  if (!isset($Campos_Erros['brute_force_attempts']))
                  {
                      $Campos_Erros['brute_force_attempts'] = array();
                  }
                  $Campos_Erros['brute_force_attempts'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['brute_force_attempts']) || !is_array($this->NM_ajax_info['errList']['brute_force_attempts']))
                  {
                      $this->NM_ajax_info['errList']['brute_force_attempts'] = array();
                  }
                  $this->NM_ajax_info['errList']['brute_force_attempts'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'brute_force_attempts';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_brute_force_attempts

    function ValidateField_brute_force_time_block(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['brute_force_time_block'])) {
          nm_limpa_numero($this->brute_force_time_block, $this->field_config['brute_force_time_block']['symbol_grp']) ; 
          return;
      }
      if ($this->brute_force_time_block === "" || is_null($this->brute_force_time_block))  
      { 
          $this->brute_force_time_block = 0;
          $this->sc_force_zero[] = 'brute_force_time_block';
      } 
      nm_limpa_numero($this->brute_force_time_block, $this->field_config['brute_force_time_block']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->brute_force_time_block != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->brute_force_time_block) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_bf_time_bl'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['brute_force_time_block']))
                  {
                      $Campos_Erros['brute_force_time_block'] = array();
                  }
                  $Campos_Erros['brute_force_time_block'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['brute_force_time_block']) || !is_array($this->NM_ajax_info['errList']['brute_force_time_block']))
                  {
                      $this->NM_ajax_info['errList']['brute_force_time_block'] = array();
                  }
                  $this->NM_ajax_info['errList']['brute_force_time_block'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->brute_force_time_block, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_bf_time_bl'] . "; " ; 
                  if (!isset($Campos_Erros['brute_force_time_block']))
                  {
                      $Campos_Erros['brute_force_time_block'] = array();
                  }
                  $Campos_Erros['brute_force_time_block'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['brute_force_time_block']) || !is_array($this->NM_ajax_info['errList']['brute_force_time_block']))
                  {
                      $this->NM_ajax_info['errList']['brute_force_time_block'] = array();
                  }
                  $this->NM_ajax_info['errList']['brute_force_time_block'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'brute_force_time_block';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_brute_force_time_block

    function ValidateField_retrieve_password(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['retrieve_password'])) {
       return;
   }
      if ($this->retrieve_password == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->retrieve_password = "N";
      } 
      else 
      { 
          if (is_array($this->retrieve_password))
          {
              $x = 0; 
              $this->retrieve_password_1 = array(); 
              foreach ($this->retrieve_password as $ind => $dados_retrieve_password_1 ) 
              {
                  if ($dados_retrieve_password_1 != "") 
                  {
                      $this->retrieve_password_1[] = $dados_retrieve_password_1;
                  } 
              } 
              $this->retrieve_password = ""; 
              foreach ($this->retrieve_password_1 as $dados_retrieve_password_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->retrieve_password .= ";";
                   } 
                   $this->retrieve_password .= $dados_retrieve_password_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'retrieve_password';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_retrieve_password

    function ValidateField_recover_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['recover_pswd'])) {
       return;
   }
      if ($this->recover_pswd == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'recover_pswd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_recover_pswd

    function ValidateField_password_min(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['password_min'])) {
          nm_limpa_numero($this->password_min, $this->field_config['password_min']['symbol_grp']) ; 
          return;
      }
      if ($this->password_min === "" || is_null($this->password_min))  
      { 
          $this->password_min = 0;
          $this->sc_force_zero[] = 'password_min';
      } 
      nm_limpa_numero($this->password_min, $this->field_config['password_min']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->password_min != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->password_min, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->password_min, -1))
              {
                  $iTestSize++;
                  $this->password_min = '-' . substr($this->password_min, 0, -1);
              }
              if (strlen($this->password_min) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_password_min'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['password_min']))
                  {
                      $Campos_Erros['password_min'] = array();
                  }
                  $Campos_Erros['password_min'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['password_min']) || !is_array($this->NM_ajax_info['errList']['password_min']))
                  {
                      $this->NM_ajax_info['errList']['password_min'] = array();
                  }
                  $this->NM_ajax_info['errList']['password_min'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->password_min, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_password_min'] . "; " ; 
                  if (!isset($Campos_Erros['password_min']))
                  {
                      $Campos_Erros['password_min'] = array();
                  }
                  $Campos_Erros['password_min'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['password_min']) || !is_array($this->NM_ajax_info['errList']['password_min']))
                  {
                      $this->NM_ajax_info['errList']['password_min'] = array();
                  }
                  $this->NM_ajax_info['errList']['password_min'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'password_min';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_password_min

    function ValidateField_password_strength(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['password_strength'])) {
       return;
   }
      if ($this->password_strength == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->password_strength))
          {
              $x = 0; 
              $this->password_strength_1 = array(); 
              foreach ($this->password_strength as $ind => $dados_password_strength_1 ) 
              {
                  if ($dados_password_strength_1 != "") 
                  {
                      $this->password_strength_1[] = $dados_password_strength_1;
                  } 
              } 
              $this->password_strength = ""; 
              foreach ($this->password_strength_1 as $dados_password_strength_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->password_strength .= ";";
                   } 
                   $this->password_strength .= $dados_password_strength_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'password_strength';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_password_strength

    function ValidateField_group_administrator(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['group_administrator'])) {
       return;
   }
               if (!empty($this->group_administrator) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']) && !in_array($this->group_administrator, $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['group_administrator']))
                   {
                       $Campos_Erros['group_administrator'] = array();
                   }
                   $Campos_Erros['group_administrator'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['group_administrator']) || !is_array($this->NM_ajax_info['errList']['group_administrator']))
                   {
                       $this->NM_ajax_info['errList']['group_administrator'] = array();
                   }
                   $this->NM_ajax_info['errList']['group_administrator'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'group_administrator';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_group_administrator

    function ValidateField_enable_2fa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['enable_2fa'])) {
       return;
   }
      if ($this->enable_2fa == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->enable_2fa = "N";
      } 
      else 
      { 
          if (is_array($this->enable_2fa))
          {
              $x = 0; 
              $this->enable_2fa_1 = array(); 
              foreach ($this->enable_2fa as $ind => $dados_enable_2fa_1 ) 
              {
                  if ($dados_enable_2fa_1 != "") 
                  {
                      $this->enable_2fa_1[] = $dados_enable_2fa_1;
                  } 
              } 
              $this->enable_2fa = ""; 
              foreach ($this->enable_2fa_1 as $dados_enable_2fa_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->enable_2fa .= ";";
                   } 
                   $this->enable_2fa .= $dados_enable_2fa_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enable_2fa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enable_2fa

    function ValidateField_enable_2fa_expiration_time(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['enable_2fa_expiration_time'])) {
          nm_limpa_numero($this->enable_2fa_expiration_time, $this->field_config['enable_2fa_expiration_time']['symbol_grp']) ; 
          return;
      }
      if ($this->enable_2fa_expiration_time === "" || is_null($this->enable_2fa_expiration_time))  
      { 
          $this->enable_2fa_expiration_time = 0;
          $this->sc_force_zero[] = 'enable_2fa_expiration_time';
      } 
      nm_limpa_numero($this->enable_2fa_expiration_time, $this->field_config['enable_2fa_expiration_time']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->enable_2fa_expiration_time != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->enable_2fa_expiration_time) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_2fa_exp_time'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['enable_2fa_expiration_time']))
                  {
                      $Campos_Erros['enable_2fa_expiration_time'] = array();
                  }
                  $Campos_Erros['enable_2fa_expiration_time'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['enable_2fa_expiration_time']) || !is_array($this->NM_ajax_info['errList']['enable_2fa_expiration_time']))
                  {
                      $this->NM_ajax_info['errList']['enable_2fa_expiration_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['enable_2fa_expiration_time'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->enable_2fa_expiration_time, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_2fa_exp_time'] . "; " ; 
                  if (!isset($Campos_Erros['enable_2fa_expiration_time']))
                  {
                      $Campos_Erros['enable_2fa_expiration_time'] = array();
                  }
                  $Campos_Erros['enable_2fa_expiration_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['enable_2fa_expiration_time']) || !is_array($this->NM_ajax_info['errList']['enable_2fa_expiration_time']))
                  {
                      $this->NM_ajax_info['errList']['enable_2fa_expiration_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['enable_2fa_expiration_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enable_2fa_expiration_time';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enable_2fa_expiration_time

    function ValidateField_enable_2fa_mode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['enable_2fa_mode'])) {
       return;
   }
      if ($this->enable_2fa_mode == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enable_2fa_mode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enable_2fa_mode

    function ValidateField_enable_2fa_api_type(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['enable_2fa_api_type'])) {
       return;
   }
      if ($this->enable_2fa_api_type == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->enable_2fa_api_type != "" && !in_array("enable_2fa_api_type", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_api_type']) && !in_array($this->enable_2fa_api_type, $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_api_type']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['enable_2fa_api_type']))
              {
                  $Campos_Erros['enable_2fa_api_type'] = array();
              }
              $Campos_Erros['enable_2fa_api_type'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['enable_2fa_api_type']) || !is_array($this->NM_ajax_info['errList']['enable_2fa_api_type']))
              {
                  $this->NM_ajax_info['errList']['enable_2fa_api_type'] = array();
              }
              $this->NM_ajax_info['errList']['enable_2fa_api_type'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enable_2fa_api_type';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enable_2fa_api_type

    function ValidateField_enable_2fa_api(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['enable_2fa_api'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->enable_2fa_api) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enable_2fa_api';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enable_2fa_api

    function ValidateField_mfa_last_updated(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['mfa_last_updated'])) {
          nm_limpa_numero($this->mfa_last_updated, $this->field_config['mfa_last_updated']['symbol_grp']) ; 
          return;
      }
      if ($this->mfa_last_updated === "" || is_null($this->mfa_last_updated))  
      { 
          $this->mfa_last_updated = 0;
          $this->sc_force_zero[] = 'mfa_last_updated';
      } 
      nm_limpa_numero($this->mfa_last_updated, $this->field_config['mfa_last_updated']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->mfa_last_updated != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->mfa_last_updated, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->mfa_last_updated, -1))
              {
                  $iTestSize++;
                  $this->mfa_last_updated = '-' . substr($this->mfa_last_updated, 0, -1);
              }
              if (strlen($this->mfa_last_updated) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_mfa_last_updated'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['mfa_last_updated']))
                  {
                      $Campos_Erros['mfa_last_updated'] = array();
                  }
                  $Campos_Erros['mfa_last_updated'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['mfa_last_updated']) || !is_array($this->NM_ajax_info['errList']['mfa_last_updated']))
                  {
                      $this->NM_ajax_info['errList']['mfa_last_updated'] = array();
                  }
                  $this->NM_ajax_info['errList']['mfa_last_updated'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->mfa_last_updated, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_mfa_last_updated'] . "; " ; 
                  if (!isset($Campos_Erros['mfa_last_updated']))
                  {
                      $Campos_Erros['mfa_last_updated'] = array();
                  }
                  $Campos_Erros['mfa_last_updated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['mfa_last_updated']) || !is_array($this->NM_ajax_info['errList']['mfa_last_updated']))
                  {
                      $this->NM_ajax_info['errList']['mfa_last_updated'] = array();
                  }
                  $this->NM_ajax_info['errList']['mfa_last_updated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mfa_last_updated';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mfa_last_updated

    function ValidateField_new_users(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['new_users'])) {
       return;
   }
      if ($this->new_users == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->new_users = "N";
      } 
      else 
      { 
          if (is_array($this->new_users))
          {
              $x = 0; 
              $this->new_users_1 = array(); 
              foreach ($this->new_users as $ind => $dados_new_users_1 ) 
              {
                  if ($dados_new_users_1 != "") 
                  {
                      $this->new_users_1[] = $dados_new_users_1;
                  } 
              } 
              $this->new_users = ""; 
              foreach ($this->new_users_1 as $dados_new_users_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->new_users .= ";";
                   } 
                   $this->new_users .= $dados_new_users_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'new_users';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_new_users

    function ValidateField_req_email_act(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['req_email_act'])) {
       return;
   }
      if ($this->req_email_act == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->req_email_act = "N";
      } 
      else 
      { 
          if (is_array($this->req_email_act))
          {
              $x = 0; 
              $this->req_email_act_1 = array(); 
              foreach ($this->req_email_act as $ind => $dados_req_email_act_1 ) 
              {
                  if ($dados_req_email_act_1 != "") 
                  {
                      $this->req_email_act_1[] = $dados_req_email_act_1;
                  } 
              } 
              $this->req_email_act = ""; 
              foreach ($this->req_email_act_1 as $dados_req_email_act_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->req_email_act .= ";";
                   } 
                   $this->req_email_act .= $dados_req_email_act_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'req_email_act';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_req_email_act

    function ValidateField_send_email_adm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['send_email_adm'])) {
       return;
   }
      if ($this->send_email_adm == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->send_email_adm = "N";
      } 
      else 
      { 
          if (is_array($this->send_email_adm))
          {
              $x = 0; 
              $this->send_email_adm_1 = array(); 
              foreach ($this->send_email_adm as $ind => $dados_send_email_adm_1 ) 
              {
                  if ($dados_send_email_adm_1 != "") 
                  {
                      $this->send_email_adm_1[] = $dados_send_email_adm_1;
                  } 
              } 
              $this->send_email_adm = ""; 
              foreach ($this->send_email_adm_1 as $dados_send_email_adm_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->send_email_adm .= ";";
                   } 
                   $this->send_email_adm .= $dados_send_email_adm_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'send_email_adm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_send_email_adm

    function ValidateField_group_default(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['group_default'])) {
       return;
   }
               if (!empty($this->group_default) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']) && !in_array($this->group_default, $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['group_default']))
                   {
                       $Campos_Erros['group_default'] = array();
                   }
                   $Campos_Erros['group_default'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['group_default']) || !is_array($this->NM_ajax_info['errList']['group_default']))
                   {
                       $this->NM_ajax_info['errList']['group_default'] = array();
                   }
                   $this->NM_ajax_info['errList']['group_default'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'group_default';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_group_default

    function ValidateField_smtp_api(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_api'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->smtp_api) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_api';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_api

    function ValidateField_smtp_server(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_server'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_server) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_server'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_server']))
              {
                  $Campos_Erros['smtp_server'] = array();
              }
              $Campos_Erros['smtp_server'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_server']) || !is_array($this->NM_ajax_info['errList']['smtp_server']))
              {
                  $this->NM_ajax_info['errList']['smtp_server'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_server'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_server';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_server

    function ValidateField_smtp_port(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_port'])) {
          nm_limpa_numero($this->smtp_port, $this->field_config['smtp_port']['symbol_grp']) ; 
          return;
      }
      if ($this->smtp_port === "" || is_null($this->smtp_port))  
      { 
          $this->smtp_port = 0;
          $this->sc_force_zero[] = 'smtp_port';
      } 
      nm_limpa_numero($this->smtp_port, $this->field_config['smtp_port']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->smtp_port != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->smtp_port, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->smtp_port, -1))
              {
                  $iTestSize++;
                  $this->smtp_port = '-' . substr($this->smtp_port, 0, -1);
              }
              if (strlen($this->smtp_port) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_port'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['smtp_port']))
                  {
                      $Campos_Erros['smtp_port'] = array();
                  }
                  $Campos_Erros['smtp_port'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['smtp_port']) || !is_array($this->NM_ajax_info['errList']['smtp_port']))
                  {
                      $this->NM_ajax_info['errList']['smtp_port'] = array();
                  }
                  $this->NM_ajax_info['errList']['smtp_port'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->smtp_port, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_port'] . "; " ; 
                  if (!isset($Campos_Erros['smtp_port']))
                  {
                      $Campos_Erros['smtp_port'] = array();
                  }
                  $Campos_Erros['smtp_port'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['smtp_port']) || !is_array($this->NM_ajax_info['errList']['smtp_port']))
                  {
                      $this->NM_ajax_info['errList']['smtp_port'] = array();
                  }
                  $this->NM_ajax_info['errList']['smtp_port'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_port';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_port

    function ValidateField_smtp_security(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['smtp_security'])) {
       return;
   }
      if ($this->smtp_security == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_security';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_security

    function ValidateField_smtp_user(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_user'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_user) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_user'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_user']))
              {
                  $Campos_Erros['smtp_user'] = array();
              }
              $Campos_Erros['smtp_user'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_user']) || !is_array($this->NM_ajax_info['errList']['smtp_user']))
              {
                  $this->NM_ajax_info['errList']['smtp_user'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_user'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_user';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_user

    function ValidateField_smtp_pass(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_pass'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_pass) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_smtp_pass'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_pass']))
              {
                  $Campos_Erros['smtp_pass'] = array();
              }
              $Campos_Erros['smtp_pass'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_pass']) || !is_array($this->NM_ajax_info['errList']['smtp_pass']))
              {
                  $this->NM_ajax_info['errList']['smtp_pass'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_pass'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_pass';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_pass

    function ValidateField_smtp_from_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_from_email'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->smtp_from_email) != "")  
          { 
              if ($teste_validade->Email($this->smtp_from_email) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_from_email'] . "; " ; 
                  if (!isset($Campos_Erros['smtp_from_email']))
                  {
                      $Campos_Erros['smtp_from_email'] = array();
                  }
                  $Campos_Erros['smtp_from_email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['smtp_from_email']) || !is_array($this->NM_ajax_info['errList']['smtp_from_email']))
                      {
                          $this->NM_ajax_info['errList']['smtp_from_email'] = array();
                      }
                      $this->NM_ajax_info['errList']['smtp_from_email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_from_email';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_from_email

    function ValidateField_smtp_from_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['smtp_from_name'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_from_name) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_set_smtp_from_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_from_name']))
              {
                  $Campos_Erros['smtp_from_name'] = array();
              }
              $Campos_Erros['smtp_from_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_from_name']) || !is_array($this->NM_ajax_info['errList']['smtp_from_name']))
              {
                  $this->NM_ajax_info['errList']['smtp_from_name'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_from_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_from_name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_from_name

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['session_expire'] = $this->session_expire;
    $this->nmgp_dados_form['remember_me'] = $this->remember_me;
    $this->nmgp_dados_form['cookie_expiration_time'] = $this->cookie_expiration_time;
    $this->nmgp_dados_form['theme'] = $this->theme;
    $this->nmgp_dados_form['language'] = $this->language;
    $this->nmgp_dados_form['login_mode'] = $this->login_mode;
    $this->nmgp_dados_form['captcha'] = $this->captcha;
    $this->nmgp_dados_form['pswd_last_updated'] = $this->pswd_last_updated;
    $this->nmgp_dados_form['brute_force'] = $this->brute_force;
    $this->nmgp_dados_form['brute_force_attempts'] = $this->brute_force_attempts;
    $this->nmgp_dados_form['brute_force_time_block'] = $this->brute_force_time_block;
    $this->nmgp_dados_form['retrieve_password'] = $this->retrieve_password;
    $this->nmgp_dados_form['recover_pswd'] = $this->recover_pswd;
    $this->nmgp_dados_form['password_min'] = $this->password_min;
    $this->nmgp_dados_form['password_strength'] = $this->password_strength;
    $this->nmgp_dados_form['group_administrator'] = $this->group_administrator;
    $this->nmgp_dados_form['enable_2fa'] = $this->enable_2fa;
    $this->nmgp_dados_form['enable_2fa_expiration_time'] = $this->enable_2fa_expiration_time;
    $this->nmgp_dados_form['enable_2fa_mode'] = $this->enable_2fa_mode;
    $this->nmgp_dados_form['enable_2fa_api_type'] = $this->enable_2fa_api_type;
    $this->nmgp_dados_form['enable_2fa_api'] = $this->enable_2fa_api;
    $this->nmgp_dados_form['mfa_last_updated'] = $this->mfa_last_updated;
    $this->nmgp_dados_form['new_users'] = $this->new_users;
    $this->nmgp_dados_form['req_email_act'] = $this->req_email_act;
    $this->nmgp_dados_form['send_email_adm'] = $this->send_email_adm;
    $this->nmgp_dados_form['group_default'] = $this->group_default;
    $this->nmgp_dados_form['smtp_api'] = $this->smtp_api;
    $this->nmgp_dados_form['smtp_server'] = $this->smtp_server;
    $this->nmgp_dados_form['smtp_port'] = $this->smtp_port;
    $this->nmgp_dados_form['smtp_security'] = $this->smtp_security;
    $this->nmgp_dados_form['smtp_user'] = $this->smtp_user;
    $this->nmgp_dados_form['smtp_pass'] = $this->smtp_pass;
    $this->nmgp_dados_form['smtp_from_email'] = $this->smtp_from_email;
    $this->nmgp_dados_form['smtp_from_name'] = $this->smtp_from_name;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cookie_expiration_time'] = $this->cookie_expiration_time;
      nm_limpa_numero($this->cookie_expiration_time, $this->field_config['cookie_expiration_time']['symbol_grp']) ; 
      $this->Before_unformat['pswd_last_updated'] = $this->pswd_last_updated;
      nm_limpa_numero($this->pswd_last_updated, $this->field_config['pswd_last_updated']['symbol_grp']) ; 
      $this->Before_unformat['brute_force_attempts'] = $this->brute_force_attempts;
      nm_limpa_numero($this->brute_force_attempts, $this->field_config['brute_force_attempts']['symbol_grp']) ; 
      $this->Before_unformat['brute_force_time_block'] = $this->brute_force_time_block;
      nm_limpa_numero($this->brute_force_time_block, $this->field_config['brute_force_time_block']['symbol_grp']) ; 
      $this->Before_unformat['password_min'] = $this->password_min;
      nm_limpa_numero($this->password_min, $this->field_config['password_min']['symbol_grp']) ; 
      $this->Before_unformat['enable_2fa_expiration_time'] = $this->enable_2fa_expiration_time;
      nm_limpa_numero($this->enable_2fa_expiration_time, $this->field_config['enable_2fa_expiration_time']['symbol_grp']) ; 
      $this->Before_unformat['mfa_last_updated'] = $this->mfa_last_updated;
      nm_limpa_numero($this->mfa_last_updated, $this->field_config['mfa_last_updated']['symbol_grp']) ; 
      $this->Before_unformat['smtp_port'] = $this->smtp_port;
      nm_limpa_numero($this->smtp_port, $this->field_config['smtp_port']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "cookie_expiration_time")
      {
          nm_limpa_numero($this->cookie_expiration_time, $this->field_config['cookie_expiration_time']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pswd_last_updated")
      {
          nm_limpa_numero($this->pswd_last_updated, $this->field_config['pswd_last_updated']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "brute_force_attempts")
      {
          nm_limpa_numero($this->brute_force_attempts, $this->field_config['brute_force_attempts']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "brute_force_time_block")
      {
          nm_limpa_numero($this->brute_force_time_block, $this->field_config['brute_force_time_block']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "password_min")
      {
          nm_limpa_numero($this->password_min, $this->field_config['password_min']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "enable_2fa_expiration_time")
      {
          nm_limpa_numero($this->enable_2fa_expiration_time, $this->field_config['enable_2fa_expiration_time']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "mfa_last_updated")
      {
          nm_limpa_numero($this->mfa_last_updated, $this->field_config['mfa_last_updated']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "smtp_port")
      {
          nm_limpa_numero($this->smtp_port, $this->field_config['smtp_port']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->cookie_expiration_time || (!empty($format_fields) && isset($format_fields['cookie_expiration_time'])))
      {
          nmgp_Form_Num_Val($this->cookie_expiration_time, $this->field_config['cookie_expiration_time']['symbol_grp'], $this->field_config['cookie_expiration_time']['symbol_dec'], "0", "S", $this->field_config['cookie_expiration_time']['format_neg'], "", "", "-", $this->field_config['cookie_expiration_time']['symbol_fmt']) ; 
      }
      if ('' !== $this->pswd_last_updated || (!empty($format_fields) && isset($format_fields['pswd_last_updated'])))
      {
          nmgp_Form_Num_Val($this->pswd_last_updated, $this->field_config['pswd_last_updated']['symbol_grp'], $this->field_config['pswd_last_updated']['symbol_dec'], "0", "S", $this->field_config['pswd_last_updated']['format_neg'], "", "", "-", $this->field_config['pswd_last_updated']['symbol_fmt']) ; 
      }
      if ('' !== $this->brute_force_attempts || (!empty($format_fields) && isset($format_fields['brute_force_attempts'])))
      {
          nmgp_Form_Num_Val($this->brute_force_attempts, $this->field_config['brute_force_attempts']['symbol_grp'], $this->field_config['brute_force_attempts']['symbol_dec'], "0", "S", $this->field_config['brute_force_attempts']['format_neg'], "", "", "-", $this->field_config['brute_force_attempts']['symbol_fmt']) ; 
      }
      if ('' !== $this->brute_force_time_block || (!empty($format_fields) && isset($format_fields['brute_force_time_block'])))
      {
          nmgp_Form_Num_Val($this->brute_force_time_block, $this->field_config['brute_force_time_block']['symbol_grp'], $this->field_config['brute_force_time_block']['symbol_dec'], "0", "S", $this->field_config['brute_force_time_block']['format_neg'], "", "", "-", $this->field_config['brute_force_time_block']['symbol_fmt']) ; 
      }
      if ('' !== $this->password_min || (!empty($format_fields) && isset($format_fields['password_min'])))
      {
          nmgp_Form_Num_Val($this->password_min, $this->field_config['password_min']['symbol_grp'], $this->field_config['password_min']['symbol_dec'], "0", "S", $this->field_config['password_min']['format_neg'], "", "", "-", $this->field_config['password_min']['symbol_fmt']) ; 
      }
      if ('' !== $this->enable_2fa_expiration_time || (!empty($format_fields) && isset($format_fields['enable_2fa_expiration_time'])))
      {
          nmgp_Form_Num_Val($this->enable_2fa_expiration_time, $this->field_config['enable_2fa_expiration_time']['symbol_grp'], $this->field_config['enable_2fa_expiration_time']['symbol_dec'], "0", "S", $this->field_config['enable_2fa_expiration_time']['format_neg'], "", "", "-", $this->field_config['enable_2fa_expiration_time']['symbol_fmt']) ; 
      }
      if ('' !== $this->mfa_last_updated || (!empty($format_fields) && isset($format_fields['mfa_last_updated'])))
      {
          nmgp_Form_Num_Val($this->mfa_last_updated, $this->field_config['mfa_last_updated']['symbol_grp'], $this->field_config['mfa_last_updated']['symbol_dec'], "0", "S", $this->field_config['mfa_last_updated']['format_neg'], "", "", "-", $this->field_config['mfa_last_updated']['symbol_fmt']) ; 
      }
      if ('' !== $this->smtp_port || (!empty($format_fields) && isset($format_fields['smtp_port'])))
      {
          nmgp_Form_Num_Val($this->smtp_port, $this->field_config['smtp_port']['symbol_grp'], $this->field_config['smtp_port']['symbol_dec'], "0", "S", $this->field_config['smtp_port']['format_neg'], "", "", "-", $this->field_config['smtp_port']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function ajax_return_values()
   {
          $this->ajax_return_values_session_expire();
          $this->ajax_return_values_remember_me();
          $this->ajax_return_values_cookie_expiration_time();
          $this->ajax_return_values_theme();
          $this->ajax_return_values_language();
          $this->ajax_return_values_login_mode();
          $this->ajax_return_values_captcha();
          $this->ajax_return_values_pswd_last_updated();
          $this->ajax_return_values_brute_force();
          $this->ajax_return_values_brute_force_attempts();
          $this->ajax_return_values_brute_force_time_block();
          $this->ajax_return_values_retrieve_password();
          $this->ajax_return_values_recover_pswd();
          $this->ajax_return_values_password_min();
          $this->ajax_return_values_password_strength();
          $this->ajax_return_values_group_administrator();
          $this->ajax_return_values_enable_2fa();
          $this->ajax_return_values_enable_2fa_expiration_time();
          $this->ajax_return_values_enable_2fa_mode();
          $this->ajax_return_values_enable_2fa_api_type();
          $this->ajax_return_values_enable_2fa_api();
          $this->ajax_return_values_mfa_last_updated();
          $this->ajax_return_values_new_users();
          $this->ajax_return_values_req_email_act();
          $this->ajax_return_values_send_email_adm();
          $this->ajax_return_values_group_default();
          $this->ajax_return_values_smtp_api();
          $this->ajax_return_values_smtp_server();
          $this->ajax_return_values_smtp_port();
          $this->ajax_return_values_smtp_security();
          $this->ajax_return_values_smtp_user();
          $this->ajax_return_values_smtp_pass();
          $this->ajax_return_values_smtp_from_email();
          $this->ajax_return_values_smtp_from_name();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- session_expire
   function ajax_return_values_session_expire($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("session_expire", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->session_expire);
              $aLookup = array();
              $this->_tmp_lookup_session_expire = $this->session_expire;

$aLookup[] = array(app3_settings_pack_protect_string('N') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_sess_no'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('R') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_sess_redir'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('M') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_sess_msg'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_session_expire'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_session_expire'][] = 'R';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_session_expire'][] = 'M';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"session_expire\"";
          if (isset($this->NM_ajax_info['select_html']['session_expire']) && !empty($this->NM_ajax_info['select_html']['session_expire']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['session_expire']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->session_expire == $sValue)
                  {
                      $this->_tmp_lookup_session_expire = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['session_expire'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['session_expire']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['session_expire']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['session_expire']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['session_expire']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['session_expire']['labList'] = $aLabel;
          }
   }

          //----- remember_me
   function ajax_return_values_remember_me($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("remember_me", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->remember_me);
              $aLookup = array();
              $this->_tmp_lookup_remember_me = $this->remember_me;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_remember_me'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['remember_me']) && !empty($this->NM_ajax_info['select_html']['remember_me']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['remember_me']);
          }
          $this->NM_ajax_info['fldList']['remember_me'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-remember_me',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['remember_me']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['remember_me']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['remember_me']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['remember_me']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['remember_me']['labList'] = $aLabel;
          }
   }

          //----- cookie_expiration_time
   function ajax_return_values_cookie_expiration_time($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cookie_expiration_time", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cookie_expiration_time);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cookie_expiration_time'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- theme
   function ajax_return_values_theme($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("theme", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->theme);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['theme'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- language
   function ajax_return_values_language($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("language", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->language);
              $aLookup = array();
              $this->_tmp_lookup_language = $this->language;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_language'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['language']) && !empty($this->NM_ajax_info['select_html']['language']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['language']);
          }
          $this->NM_ajax_info['fldList']['language'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-language',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['language']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['language']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['language']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['language']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['language']['labList'] = $aLabel;
          }
   }

          //----- login_mode
   function ajax_return_values_login_mode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("login_mode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->login_mode);
              $aLookup = array();
              $this->_tmp_lookup_login_mode = $this->login_mode;

$aLookup[] = array(app3_settings_pack_protect_string('username') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_login_mode_user'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('email') => str_replace('<', '&lt;',app3_settings_pack_protect_string("E-mail")));
$aLookup[] = array(app3_settings_pack_protect_string('both') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_login_mode_both'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_login_mode'][] = 'username';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_login_mode'][] = 'email';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_login_mode'][] = 'both';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"login_mode\"";
          if (isset($this->NM_ajax_info['select_html']['login_mode']) && !empty($this->NM_ajax_info['select_html']['login_mode']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['login_mode']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->login_mode == $sValue)
                  {
                      $this->_tmp_lookup_login_mode = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['login_mode'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['login_mode']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['login_mode']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['login_mode']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['login_mode']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['login_mode']['labList'] = $aLabel;
          }
   }

          //----- captcha
   function ajax_return_values_captcha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("captcha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->captcha);
              $aLookup = array();
              $this->_tmp_lookup_captcha = $this->captcha;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_captcha'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['captcha']) && !empty($this->NM_ajax_info['select_html']['captcha']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['captcha']);
          }
          $this->NM_ajax_info['fldList']['captcha'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-captcha',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['captcha']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['captcha']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['captcha']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['captcha']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['captcha']['labList'] = $aLabel;
          }
   }

          //----- pswd_last_updated
   function ajax_return_values_pswd_last_updated($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pswd_last_updated", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pswd_last_updated);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pswd_last_updated'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- brute_force
   function ajax_return_values_brute_force($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("brute_force", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->brute_force);
              $aLookup = array();
              $this->_tmp_lookup_brute_force = $this->brute_force;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_brute_force'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['brute_force']) && !empty($this->NM_ajax_info['select_html']['brute_force']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['brute_force']);
          }
          $this->NM_ajax_info['fldList']['brute_force'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-brute_force',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['brute_force']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['brute_force']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['brute_force']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['brute_force']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['brute_force']['labList'] = $aLabel;
          }
   }

          //----- brute_force_attempts
   function ajax_return_values_brute_force_attempts($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("brute_force_attempts", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->brute_force_attempts);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['brute_force_attempts'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- brute_force_time_block
   function ajax_return_values_brute_force_time_block($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("brute_force_time_block", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->brute_force_time_block);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['brute_force_time_block'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- retrieve_password
   function ajax_return_values_retrieve_password($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retrieve_password", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->retrieve_password);
              $aLookup = array();
              $this->_tmp_lookup_retrieve_password = $this->retrieve_password;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_retrieve_password'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['retrieve_password']) && !empty($this->NM_ajax_info['select_html']['retrieve_password']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['retrieve_password']);
          }
          $this->NM_ajax_info['fldList']['retrieve_password'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-retrieve_password',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['retrieve_password']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['retrieve_password']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['retrieve_password']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['retrieve_password']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['retrieve_password']['labList'] = $aLabel;
          }
   }

          //----- recover_pswd
   function ajax_return_values_recover_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("recover_pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->recover_pswd);
              $aLookup = array();
              $this->_tmp_lookup_recover_pswd = $this->recover_pswd;

$aLookup[] = array(app3_settings_pack_protect_string('reset_send') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_reset_send'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('send_link') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_send_link'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_recover_pswd'][] = 'reset_send';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_recover_pswd'][] = 'send_link';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"recover_pswd\"";
          if (isset($this->NM_ajax_info['select_html']['recover_pswd']) && !empty($this->NM_ajax_info['select_html']['recover_pswd']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['recover_pswd']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->recover_pswd == $sValue)
                  {
                      $this->_tmp_lookup_recover_pswd = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['recover_pswd'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['recover_pswd']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['recover_pswd']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['recover_pswd']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['recover_pswd']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['recover_pswd']['labList'] = $aLabel;
          }
   }

          //----- password_min
   function ajax_return_values_password_min($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("password_min", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->password_min);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['password_min'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- password_strength
   function ajax_return_values_password_strength($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("password_strength", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->password_strength);
              $aLookup = array();
              $this->_tmp_lookup_password_strength = $this->password_strength;

$aLookup[] = array(app3_settings_pack_protect_string('uppercase_letter') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_ps_uppercase_letter'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('lowercase_letter') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_ps_lowercase_letter'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('numbers') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_ps_numbers'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('special_chars') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_ps_special_chars'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_password_strength'][] = 'uppercase_letter';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_password_strength'][] = 'lowercase_letter';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_password_strength'][] = 'numbers';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_password_strength'][] = 'special_chars';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['password_strength']) && !empty($this->NM_ajax_info['select_html']['password_strength']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['password_strength']);
          }
          $this->NM_ajax_info['fldList']['password_strength'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-password_strength',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['password_strength']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['password_strength']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['password_strength']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['password_strength']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['password_strength']['labList'] = $aLabel;
          }
   }

          //----- group_administrator
   function ajax_return_values_group_administrator($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("group_administrator", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->group_administrator);
              $aLookup = array();
              $this->_tmp_lookup_group_administrator = $this->group_administrator;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cookie_expiration_time = $this->cookie_expiration_time;
   $old_value_pswd_last_updated = $this->pswd_last_updated;
   $old_value_brute_force_attempts = $this->brute_force_attempts;
   $old_value_brute_force_time_block = $this->brute_force_time_block;
   $old_value_password_min = $this->password_min;
   $old_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $old_value_mfa_last_updated = $this->mfa_last_updated;
   $old_value_smtp_port = $this->smtp_port;
   $this->nm_tira_formatacao();


   $unformatted_value_cookie_expiration_time = $this->cookie_expiration_time;
   $unformatted_value_pswd_last_updated = $this->pswd_last_updated;
   $unformatted_value_brute_force_attempts = $this->brute_force_attempts;
   $unformatted_value_brute_force_time_block = $this->brute_force_time_block;
   $unformatted_value_password_min = $this->password_min;
   $unformatted_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $unformatted_value_mfa_last_updated = $this->mfa_last_updated;
   $unformatted_value_smtp_port = $this->smtp_port;

   $remember_me_val_str = "''";
   if (!empty($this->remember_me))
   {
       if (is_array($this->remember_me))
       {
           $Tmp_array = $this->remember_me;
       }
       else
       {
           $Tmp_array = explode(";", $this->remember_me);
       }
       $remember_me_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $remember_me_val_str)
          {
             $remember_me_val_str .= ", ";
          }
          $remember_me_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $retrieve_password_val_str = "''";
   if (!empty($this->retrieve_password))
   {
       if (is_array($this->retrieve_password))
       {
           $Tmp_array = $this->retrieve_password;
       }
       else
       {
           $Tmp_array = explode(";", $this->retrieve_password);
       }
       $retrieve_password_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $retrieve_password_val_str)
          {
             $retrieve_password_val_str .= ", ";
          }
          $retrieve_password_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $new_users_val_str = "''";
   if (!empty($this->new_users))
   {
       if (is_array($this->new_users))
       {
           $Tmp_array = $this->new_users;
       }
       else
       {
           $Tmp_array = explode(";", $this->new_users);
       }
       $new_users_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $new_users_val_str)
          {
             $new_users_val_str .= ", ";
          }
          $new_users_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $enable_2fa_val_str = "''";
   if (!empty($this->enable_2fa))
   {
       if (is_array($this->enable_2fa))
       {
           $Tmp_array = $this->enable_2fa;
       }
       else
       {
           $Tmp_array = explode(";", $this->enable_2fa);
       }
       $enable_2fa_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $enable_2fa_val_str)
          {
             $enable_2fa_val_str .= ", ";
          }
          $enable_2fa_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $brute_force_val_str = "''";
   if (!empty($this->brute_force))
   {
       if (is_array($this->brute_force))
       {
           $Tmp_array = $this->brute_force;
       }
       else
       {
           $Tmp_array = explode(";", $this->brute_force);
       }
       $brute_force_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $brute_force_val_str)
          {
             $brute_force_val_str .= ", ";
          }
          $brute_force_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $captcha_val_str = "''";
   if (!empty($this->captcha))
   {
       if (is_array($this->captcha))
       {
           $Tmp_array = $this->captcha;
       }
       else
       {
           $Tmp_array = explode(";", $this->captcha);
       }
       $captcha_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $captcha_val_str)
          {
             $captcha_val_str .= ", ";
          }
          $captcha_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $language_val_str = "''";
   if (!empty($this->language))
   {
       if (is_array($this->language))
       {
           $Tmp_array = $this->language;
       }
       else
       {
           $Tmp_array = explode(";", $this->language);
       }
       $language_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $language_val_str)
          {
             $language_val_str .= ", ";
          }
          $language_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $req_email_act_val_str = "''";
   if (!empty($this->req_email_act))
   {
       if (is_array($this->req_email_act))
       {
           $Tmp_array = $this->req_email_act;
       }
       else
       {
           $Tmp_array = explode(";", $this->req_email_act);
       }
       $req_email_act_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $req_email_act_val_str)
          {
             $req_email_act_val_str .= ", ";
          }
          $req_email_act_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $send_email_adm_val_str = "''";
   if (!empty($this->send_email_adm))
   {
       if (is_array($this->send_email_adm))
       {
           $Tmp_array = $this->send_email_adm;
       }
       else
       {
           $Tmp_array = explode(";", $this->send_email_adm);
       }
       $send_email_adm_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $send_email_adm_val_str)
          {
             $send_email_adm_val_str .= ", ";
          }
          $send_email_adm_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $password_strength_val_str = "''";
   if (!empty($this->password_strength))
   {
       if (is_array($this->password_strength))
       {
           $Tmp_array = $this->password_strength;
       }
       else
       {
           $Tmp_array = explode(";", $this->password_strength);
       }
       $password_strength_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $password_strength_val_str)
          {
             $password_strength_val_str .= ", ";
          }
          $password_strength_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT group_id, description  FROM sec_groups  ORDER BY description";

   $this->cookie_expiration_time = $old_value_cookie_expiration_time;
   $this->pswd_last_updated = $old_value_pswd_last_updated;
   $this->brute_force_attempts = $old_value_brute_force_attempts;
   $this->brute_force_time_block = $old_value_brute_force_time_block;
   $this->password_min = $old_value_password_min;
   $this->enable_2fa_expiration_time = $old_value_enable_2fa_expiration_time;
   $this->mfa_last_updated = $old_value_mfa_last_updated;
   $this->smtp_port = $old_value_smtp_port;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(app3_settings_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', app3_settings_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"group_administrator\"";
          if (isset($this->NM_ajax_info['select_html']['group_administrator']) && !empty($this->NM_ajax_info['select_html']['group_administrator']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['group_administrator']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->group_administrator == $sValue)
                  {
                      $this->_tmp_lookup_group_administrator = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['group_administrator'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['group_administrator']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['group_administrator']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['group_administrator']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['group_administrator']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['group_administrator']['labList'] = $aLabel;
          }
   }

          //----- enable_2fa
   function ajax_return_values_enable_2fa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enable_2fa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enable_2fa);
              $aLookup = array();
              $this->_tmp_lookup_enable_2fa = $this->enable_2fa;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['enable_2fa']) && !empty($this->NM_ajax_info['select_html']['enable_2fa']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enable_2fa']);
          }
          $this->NM_ajax_info['fldList']['enable_2fa'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-enable_2fa',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enable_2fa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enable_2fa']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enable_2fa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enable_2fa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enable_2fa']['labList'] = $aLabel;
          }
   }

          //----- enable_2fa_expiration_time
   function ajax_return_values_enable_2fa_expiration_time($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enable_2fa_expiration_time", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enable_2fa_expiration_time);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['enable_2fa_expiration_time'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- enable_2fa_mode
   function ajax_return_values_enable_2fa_mode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enable_2fa_mode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enable_2fa_mode);
              $aLookup = array();
              $this->_tmp_lookup_enable_2fa_mode = $this->enable_2fa_mode;

$aLookup[] = array(app3_settings_pack_protect_string('individual') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_2fa_individual'] . "")));
$aLookup[] = array(app3_settings_pack_protect_string('all') => str_replace('<', '&lt;',app3_settings_pack_protect_string("" . $this->Ini->Nm_lang['lang_sec_opt_2fa_all'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_mode'][] = 'individual';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_mode'][] = 'all';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"enable_2fa_mode\"";
          if (isset($this->NM_ajax_info['select_html']['enable_2fa_mode']) && !empty($this->NM_ajax_info['select_html']['enable_2fa_mode']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enable_2fa_mode']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->enable_2fa_mode == $sValue)
                  {
                      $this->_tmp_lookup_enable_2fa_mode = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['enable_2fa_mode'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enable_2fa_mode']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enable_2fa_mode']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enable_2fa_mode']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enable_2fa_mode']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enable_2fa_mode']['labList'] = $aLabel;
          }
   }

          //----- enable_2fa_api_type
   function ajax_return_values_enable_2fa_api_type($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enable_2fa_api_type", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enable_2fa_api_type);
              $aLookup = array();
              $this->_tmp_lookup_enable_2fa_api_type = $this->enable_2fa_api_type;

$aLookup[] = array(app3_settings_pack_protect_string('email') => str_replace('<', '&lt;',app3_settings_pack_protect_string("E-mail")));
$aLookup[] = array(app3_settings_pack_protect_string('auth') => str_replace('<', '&lt;',app3_settings_pack_protect_string("Google Auth")));
$aLookup[] = array(app3_settings_pack_protect_string('sms') => str_replace('<', '&lt;',app3_settings_pack_protect_string("SMS")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_api_type'][] = 'email';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_api_type'][] = 'auth';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_enable_2fa_api_type'][] = 'sms';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['enable_2fa_api_type']) && !empty($this->NM_ajax_info['select_html']['enable_2fa_api_type']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enable_2fa_api_type']);
          }
          $this->NM_ajax_info['fldList']['enable_2fa_api_type'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enable_2fa_api_type']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enable_2fa_api_type']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enable_2fa_api_type']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enable_2fa_api_type']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enable_2fa_api_type']['labList'] = $aLabel;
          }
   }

          //----- enable_2fa_api
   function ajax_return_values_enable_2fa_api($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enable_2fa_api", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enable_2fa_api);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['enable_2fa_api'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- mfa_last_updated
   function ajax_return_values_mfa_last_updated($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mfa_last_updated", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mfa_last_updated);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mfa_last_updated'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- new_users
   function ajax_return_values_new_users($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("new_users", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->new_users);
              $aLookup = array();
              $this->_tmp_lookup_new_users = $this->new_users;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_new_users'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['new_users']) && !empty($this->NM_ajax_info['select_html']['new_users']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['new_users']);
          }
          $this->NM_ajax_info['fldList']['new_users'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-new_users',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['new_users']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['new_users']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['new_users']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['new_users']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['new_users']['labList'] = $aLabel;
          }
   }

          //----- req_email_act
   function ajax_return_values_req_email_act($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("req_email_act", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->req_email_act);
              $aLookup = array();
              $this->_tmp_lookup_req_email_act = $this->req_email_act;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_req_email_act'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['req_email_act']) && !empty($this->NM_ajax_info['select_html']['req_email_act']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['req_email_act']);
          }
          $this->NM_ajax_info['fldList']['req_email_act'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-req_email_act',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['req_email_act']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['req_email_act']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['req_email_act']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['req_email_act']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['req_email_act']['labList'] = $aLabel;
          }
   }

          //----- send_email_adm
   function ajax_return_values_send_email_adm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("send_email_adm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->send_email_adm);
              $aLookup = array();
              $this->_tmp_lookup_send_email_adm = $this->send_email_adm;

$aLookup[] = array(app3_settings_pack_protect_string('Y') => str_replace('<', '&lt;',app3_settings_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_send_email_adm'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['send_email_adm']) && !empty($this->NM_ajax_info['select_html']['send_email_adm']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['send_email_adm']);
          }
          $this->NM_ajax_info['fldList']['send_email_adm'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-send_email_adm',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['send_email_adm']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['send_email_adm']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['send_email_adm']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['send_email_adm']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['send_email_adm']['labList'] = $aLabel;
          }
   }

          //----- group_default
   function ajax_return_values_group_default($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("group_default", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->group_default);
              $aLookup = array();
              $this->_tmp_lookup_group_default = $this->group_default;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'] = array(); 
}
$aLookup[] = array(app3_settings_pack_protect_string('') => str_replace('<', '&lt;',app3_settings_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cookie_expiration_time = $this->cookie_expiration_time;
   $old_value_pswd_last_updated = $this->pswd_last_updated;
   $old_value_brute_force_attempts = $this->brute_force_attempts;
   $old_value_brute_force_time_block = $this->brute_force_time_block;
   $old_value_password_min = $this->password_min;
   $old_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $old_value_mfa_last_updated = $this->mfa_last_updated;
   $old_value_smtp_port = $this->smtp_port;
   $this->nm_tira_formatacao();


   $unformatted_value_cookie_expiration_time = $this->cookie_expiration_time;
   $unformatted_value_pswd_last_updated = $this->pswd_last_updated;
   $unformatted_value_brute_force_attempts = $this->brute_force_attempts;
   $unformatted_value_brute_force_time_block = $this->brute_force_time_block;
   $unformatted_value_password_min = $this->password_min;
   $unformatted_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $unformatted_value_mfa_last_updated = $this->mfa_last_updated;
   $unformatted_value_smtp_port = $this->smtp_port;

   $remember_me_val_str = "''";
   if (!empty($this->remember_me))
   {
       if (is_array($this->remember_me))
       {
           $Tmp_array = $this->remember_me;
       }
       else
       {
           $Tmp_array = explode(";", $this->remember_me);
       }
       $remember_me_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $remember_me_val_str)
          {
             $remember_me_val_str .= ", ";
          }
          $remember_me_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $retrieve_password_val_str = "''";
   if (!empty($this->retrieve_password))
   {
       if (is_array($this->retrieve_password))
       {
           $Tmp_array = $this->retrieve_password;
       }
       else
       {
           $Tmp_array = explode(";", $this->retrieve_password);
       }
       $retrieve_password_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $retrieve_password_val_str)
          {
             $retrieve_password_val_str .= ", ";
          }
          $retrieve_password_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $new_users_val_str = "''";
   if (!empty($this->new_users))
   {
       if (is_array($this->new_users))
       {
           $Tmp_array = $this->new_users;
       }
       else
       {
           $Tmp_array = explode(";", $this->new_users);
       }
       $new_users_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $new_users_val_str)
          {
             $new_users_val_str .= ", ";
          }
          $new_users_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $enable_2fa_val_str = "''";
   if (!empty($this->enable_2fa))
   {
       if (is_array($this->enable_2fa))
       {
           $Tmp_array = $this->enable_2fa;
       }
       else
       {
           $Tmp_array = explode(";", $this->enable_2fa);
       }
       $enable_2fa_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $enable_2fa_val_str)
          {
             $enable_2fa_val_str .= ", ";
          }
          $enable_2fa_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $brute_force_val_str = "''";
   if (!empty($this->brute_force))
   {
       if (is_array($this->brute_force))
       {
           $Tmp_array = $this->brute_force;
       }
       else
       {
           $Tmp_array = explode(";", $this->brute_force);
       }
       $brute_force_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $brute_force_val_str)
          {
             $brute_force_val_str .= ", ";
          }
          $brute_force_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $captcha_val_str = "''";
   if (!empty($this->captcha))
   {
       if (is_array($this->captcha))
       {
           $Tmp_array = $this->captcha;
       }
       else
       {
           $Tmp_array = explode(";", $this->captcha);
       }
       $captcha_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $captcha_val_str)
          {
             $captcha_val_str .= ", ";
          }
          $captcha_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $language_val_str = "''";
   if (!empty($this->language))
   {
       if (is_array($this->language))
       {
           $Tmp_array = $this->language;
       }
       else
       {
           $Tmp_array = explode(";", $this->language);
       }
       $language_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $language_val_str)
          {
             $language_val_str .= ", ";
          }
          $language_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $req_email_act_val_str = "''";
   if (!empty($this->req_email_act))
   {
       if (is_array($this->req_email_act))
       {
           $Tmp_array = $this->req_email_act;
       }
       else
       {
           $Tmp_array = explode(";", $this->req_email_act);
       }
       $req_email_act_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $req_email_act_val_str)
          {
             $req_email_act_val_str .= ", ";
          }
          $req_email_act_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $send_email_adm_val_str = "''";
   if (!empty($this->send_email_adm))
   {
       if (is_array($this->send_email_adm))
       {
           $Tmp_array = $this->send_email_adm;
       }
       else
       {
           $Tmp_array = explode(";", $this->send_email_adm);
       }
       $send_email_adm_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $send_email_adm_val_str)
          {
             $send_email_adm_val_str .= ", ";
          }
          $send_email_adm_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $password_strength_val_str = "''";
   if (!empty($this->password_strength))
   {
       if (is_array($this->password_strength))
       {
           $Tmp_array = $this->password_strength;
       }
       else
       {
           $Tmp_array = explode(";", $this->password_strength);
       }
       $password_strength_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $password_strength_val_str)
          {
             $password_strength_val_str .= ", ";
          }
          $password_strength_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT group_id, description  FROM sec_groups  ORDER BY description";

   $this->cookie_expiration_time = $old_value_cookie_expiration_time;
   $this->pswd_last_updated = $old_value_pswd_last_updated;
   $this->brute_force_attempts = $old_value_brute_force_attempts;
   $this->brute_force_time_block = $old_value_brute_force_time_block;
   $this->password_min = $old_value_password_min;
   $this->enable_2fa_expiration_time = $old_value_enable_2fa_expiration_time;
   $this->mfa_last_updated = $old_value_mfa_last_updated;
   $this->smtp_port = $old_value_smtp_port;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(app3_settings_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', app3_settings_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"group_default\"";
          if (isset($this->NM_ajax_info['select_html']['group_default']) && !empty($this->NM_ajax_info['select_html']['group_default']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['group_default']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->group_default == $sValue)
                  {
                      $this->_tmp_lookup_group_default = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['group_default'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['group_default']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['group_default']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['group_default']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['group_default']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['group_default']['labList'] = $aLabel;
          }
   }

          //----- smtp_api
   function ajax_return_values_smtp_api($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_api", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_api);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_api'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- smtp_server
   function ajax_return_values_smtp_server($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_server", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_server);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_server'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_port
   function ajax_return_values_smtp_port($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_port", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_port);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_port'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- smtp_security
   function ajax_return_values_smtp_security($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_security", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_security);
              $aLookup = array();
              $this->_tmp_lookup_smtp_security = $this->smtp_security;

$aLookup[] = array(app3_settings_pack_protect_string('ssl') => str_replace('<', '&lt;',app3_settings_pack_protect_string("SSL")));
$aLookup[] = array(app3_settings_pack_protect_string('tls') => str_replace('<', '&lt;',app3_settings_pack_protect_string("TLS")));
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_smtp_security'][] = 'ssl';
$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_smtp_security'][] = 'tls';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"smtp_security\"";
          if (isset($this->NM_ajax_info['select_html']['smtp_security']) && !empty($this->NM_ajax_info['select_html']['smtp_security']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['smtp_security']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->smtp_security == $sValue)
                  {
                      $this->_tmp_lookup_smtp_security = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['smtp_security'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['smtp_security']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['smtp_security']['valList'][$i] = app3_settings_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['smtp_security']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['smtp_security']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['smtp_security']['labList'] = $aLabel;
          }
   }

          //----- smtp_user
   function ajax_return_values_smtp_user($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_user", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_user);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_user'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_pass
   function ajax_return_values_smtp_pass($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_pass", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_pass);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_pass'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- smtp_from_email
   function ajax_return_values_smtp_from_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_from_email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_from_email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_from_email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- smtp_from_name
   function ajax_return_values_smtp_from_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_from_name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_from_name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_from_name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['summary_line'] = $this->getSummaryLine();
   } // ajax_add_parameters
//
function brute_force_onClick()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  
$original_brute_force = $this->brute_force;
$original_brute_force_time_block = $this->brute_force_time_block;
$original_brute_force_attempts = $this->brute_force_attempts;

if($this->brute_force  == 'Y'){
    $this->nmgp_cmp_hidden["brute_force_time_block"] = 'on'; $this->NM_ajax_info['fieldDisplay']['brute_force_time_block'] = 'on';
    $this->nmgp_cmp_hidden["brute_force_attempts"] = 'on'; $this->NM_ajax_info['fieldDisplay']['brute_force_attempts'] = 'on';
}else{   
    $this->nmgp_cmp_hidden["brute_force_time_block"] = 'off'; $this->NM_ajax_info['fieldDisplay']['brute_force_time_block'] = 'off';
    $this->nmgp_cmp_hidden["brute_force_attempts"] = 'off'; $this->NM_ajax_info['fieldDisplay']['brute_force_attempts'] = 'off';
}


$modificado_brute_force = $this->brute_force;
$modificado_brute_force_time_block = $this->brute_force_time_block;
$modificado_brute_force_attempts = $this->brute_force_attempts;
$this->nm_formatar_campos('brute_force', 'brute_force_time_block', 'brute_force_attempts');
if ($original_brute_force !== $modificado_brute_force || isset($this->nmgp_cmp_readonly['brute_force']) || (isset($bFlagRead_brute_force) && $bFlagRead_brute_force))
{
    $this->ajax_return_values_brute_force(true);
}
if ($original_brute_force_time_block !== $modificado_brute_force_time_block || isset($this->nmgp_cmp_readonly['brute_force_time_block']) || (isset($bFlagRead_brute_force_time_block) && $bFlagRead_brute_force_time_block))
{
    $this->ajax_return_values_brute_force_time_block(true);
}
if ($original_brute_force_attempts !== $modificado_brute_force_attempts || isset($this->nmgp_cmp_readonly['brute_force_attempts']) || (isset($bFlagRead_brute_force_attempts) && $bFlagRead_brute_force_attempts))
{
    $this->ajax_return_values_brute_force_attempts(true);
}
$this->NM_ajax_info['event_field'] = 'brute';
app3_settings_pack_ajax_response();
exit;
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
function enable_2fa_api_type_onClick()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  
$original_enable_2fa_api_type = $this->enable_2fa_api_type;
$original_enable_2fa_api = $this->enable_2fa_api;

$arr_apis = nm_list_apis($this->enable_2fa_api_type );
$options = '';
foreach($arr_apis as $api => $data){
	$options  .= "<option value='".$data['mod'] . '__NM__'.$api."'>";
	$options  .= $data['name'] . " - " . $data['gateway'];
	$options  .= "</option>";
}

$api_2fa =  "<select name='enable_2fa_api' class='sc-js-input css_smtp_api_obj sc-ui-100perc-input scFormObjectOdd' style='width:100%'>";

$api_2fa .=$options;
$api_2fa .= "</select>";

$this->enable_2fa_api  = $api_2fa;

$modificado_enable_2fa_api_type = $this->enable_2fa_api_type;
$modificado_enable_2fa_api = $this->enable_2fa_api;
$this->nm_formatar_campos('enable_2fa_api_type', 'enable_2fa_api');
if ($original_enable_2fa_api_type !== $modificado_enable_2fa_api_type || isset($this->nmgp_cmp_readonly['enable_2fa_api_type']) || (isset($bFlagRead_enable_2fa_api_type) && $bFlagRead_enable_2fa_api_type))
{
    $this->ajax_return_values_enable_2fa_api_type(true);
}
if ($original_enable_2fa_api !== $modificado_enable_2fa_api || isset($this->nmgp_cmp_readonly['enable_2fa_api']) || (isset($bFlagRead_enable_2fa_api) && $bFlagRead_enable_2fa_api))
{
    $this->ajax_return_values_enable_2fa_api(true);
}
$this->NM_ajax_info['event_field'] = 'enable';
app3_settings_pack_ajax_response();
exit;


$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
function enable_2fa_onClick()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  
$original_enable_2fa = $this->enable_2fa;
$original_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
$original_enable_2fa_mode = $this->enable_2fa_mode;
$original_enable_2fa_api = $this->enable_2fa_api;
$original_enable_2fa_api_type = $this->enable_2fa_api_type;
$original_mfa_last_updated = $this->mfa_last_updated;

if($this->enable_2fa  == 'Y'){
    $this->nmgp_cmp_hidden["enable_2fa_expiration_time"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_expiration_time'] = 'on';
    $this->nmgp_cmp_hidden["enable_2fa_mode"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_mode'] = 'on';
    $this->nmgp_cmp_hidden["enable_2fa_api"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api'] = 'on';
    $this->nmgp_cmp_hidden["enable_2fa_api_type"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api_type'] = 'on';
    $this->nmgp_cmp_hidden["mfa_last_updated"] = 'on'; $this->NM_ajax_info['fieldDisplay']['mfa_last_updated'] = 'on';
}else{   
    $this->nmgp_cmp_hidden["enable_2fa_expiration_time"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_expiration_time'] = 'off';
	$this->nmgp_cmp_hidden["enable_2fa_mode"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_mode'] = 'off';
	$this->nmgp_cmp_hidden["enable_2fa_api"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api'] = 'off';
	$this->nmgp_cmp_hidden["enable_2fa_api_type"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api_type'] = 'off';
	$this->nmgp_cmp_hidden["mfa_last_updated"] = 'off'; $this->NM_ajax_info['fieldDisplay']['mfa_last_updated'] = 'off';
}

$modificado_enable_2fa = $this->enable_2fa;
$modificado_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
$modificado_enable_2fa_mode = $this->enable_2fa_mode;
$modificado_enable_2fa_api = $this->enable_2fa_api;
$modificado_enable_2fa_api_type = $this->enable_2fa_api_type;
$modificado_mfa_last_updated = $this->mfa_last_updated;
$this->nm_formatar_campos('enable_2fa', 'enable_2fa_expiration_time', 'enable_2fa_mode', 'enable_2fa_api', 'enable_2fa_api_type', 'mfa_last_updated');
if ($original_enable_2fa !== $modificado_enable_2fa || isset($this->nmgp_cmp_readonly['enable_2fa']) || (isset($bFlagRead_enable_2fa) && $bFlagRead_enable_2fa))
{
    $this->ajax_return_values_enable_2fa(true);
}
if ($original_enable_2fa_expiration_time !== $modificado_enable_2fa_expiration_time || isset($this->nmgp_cmp_readonly['enable_2fa_expiration_time']) || (isset($bFlagRead_enable_2fa_expiration_time) && $bFlagRead_enable_2fa_expiration_time))
{
    $this->ajax_return_values_enable_2fa_expiration_time(true);
}
if ($original_enable_2fa_mode !== $modificado_enable_2fa_mode || isset($this->nmgp_cmp_readonly['enable_2fa_mode']) || (isset($bFlagRead_enable_2fa_mode) && $bFlagRead_enable_2fa_mode))
{
    $this->ajax_return_values_enable_2fa_mode(true);
}
if ($original_enable_2fa_api !== $modificado_enable_2fa_api || isset($this->nmgp_cmp_readonly['enable_2fa_api']) || (isset($bFlagRead_enable_2fa_api) && $bFlagRead_enable_2fa_api))
{
    $this->ajax_return_values_enable_2fa_api(true);
}
if ($original_enable_2fa_api_type !== $modificado_enable_2fa_api_type || isset($this->nmgp_cmp_readonly['enable_2fa_api_type']) || (isset($bFlagRead_enable_2fa_api_type) && $bFlagRead_enable_2fa_api_type))
{
    $this->ajax_return_values_enable_2fa_api_type(true);
}
if ($original_mfa_last_updated !== $modificado_mfa_last_updated || isset($this->nmgp_cmp_readonly['mfa_last_updated']) || (isset($bFlagRead_mfa_last_updated) && $bFlagRead_mfa_last_updated))
{
    $this->ajax_return_values_mfa_last_updated(true);
}
$this->NM_ajax_info['event_field'] = 'enable';
app3_settings_pack_ajax_response();
exit;
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
function get_settings()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  

    
$check_sql = "SELECT set_name, set_value  FROM sec_settings";
   
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($this->rs[0][0]))     
{
    foreach($this->rs as $f ){
        $_SESSION[ 'sett_'. $f[0] ] = $f[1];
    }
}
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
function remember_me_onClick()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  
$original_remember_me = $this->remember_me;
$original_cookie_expiration_time = $this->cookie_expiration_time;

if($this->remember_me  == 'Y'){
    $this->nmgp_cmp_hidden["cookie_expiration_time"] = 'on'; $this->NM_ajax_info['fieldDisplay']['cookie_expiration_time'] = 'on';
}else{   
    $this->nmgp_cmp_hidden["cookie_expiration_time"] = 'off'; $this->NM_ajax_info['fieldDisplay']['cookie_expiration_time'] = 'off';
}

$modificado_remember_me = $this->remember_me;
$modificado_cookie_expiration_time = $this->cookie_expiration_time;
$this->nm_formatar_campos('remember_me', 'cookie_expiration_time');
if ($original_remember_me !== $modificado_remember_me || isset($this->nmgp_cmp_readonly['remember_me']) || (isset($bFlagRead_remember_me) && $bFlagRead_remember_me))
{
    $this->ajax_return_values_remember_me(true);
}
if ($original_cookie_expiration_time !== $modificado_cookie_expiration_time || isset($this->nmgp_cmp_readonly['cookie_expiration_time']) || (isset($bFlagRead_cookie_expiration_time) && $bFlagRead_cookie_expiration_time))
{
    $this->ajax_return_values_cookie_expiration_time(true);
}
$this->NM_ajax_info['event_field'] = 'remember';
app3_settings_pack_ajax_response();
exit;
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
function retrieve_password_onClick()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  
$original_retrieve_password = $this->retrieve_password;
$original_recover_pswd = $this->recover_pswd;

if($this->retrieve_password  == 'Y'){
	$this->nmgp_cmp_hidden["recover_pswd"] = 'on'; $this->NM_ajax_info['fieldDisplay']['recover_pswd'] = 'on';
}
else{
	$this->nmgp_cmp_hidden["recover_pswd"] = 'off'; $this->NM_ajax_info['fieldDisplay']['recover_pswd'] = 'off';
}

$modificado_retrieve_password = $this->retrieve_password;
$modificado_recover_pswd = $this->recover_pswd;
$this->nm_formatar_campos('retrieve_password', 'recover_pswd');
if ($original_retrieve_password !== $modificado_retrieve_password || isset($this->nmgp_cmp_readonly['retrieve_password']) || (isset($bFlagRead_retrieve_password) && $bFlagRead_retrieve_password))
{
    $this->ajax_return_values_retrieve_password(true);
}
if ($original_recover_pswd !== $modificado_recover_pswd || isset($this->nmgp_cmp_readonly['recover_pswd']) || (isset($bFlagRead_recover_pswd) && $bFlagRead_recover_pswd))
{
    $this->ajax_return_values_recover_pswd(true);
}
$this->NM_ajax_info['event_field'] = 'retrieve';
app3_settings_pack_ajax_response();
exit;
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
function smtp_api_onChange()
{
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
  
$original_smtp_api = $this->smtp_api;
$original_smtp_server = $this->smtp_server;
$original_smtp_port = $this->smtp_port;
$original_smtp_security = $this->smtp_security;
$original_smtp_user = $this->smtp_user;
$original_smtp_pass = $this->smtp_pass;
$original_smtp_from_email = $this->smtp_from_email;
$original_smtp_from_name = $this->smtp_from_name;

if($this->smtp_api  == 'custom'){
	$this->nmgp_cmp_hidden["smtp_server"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_server'] = 'on';
	$this->nmgp_cmp_hidden["smtp_port"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_port'] = 'on';
	$this->nmgp_cmp_hidden["smtp_security"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_security'] = 'on';
	$this->nmgp_cmp_hidden["smtp_user"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_user'] = 'on';
	$this->nmgp_cmp_hidden["smtp_pass"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_pass'] = 'on';
	$this->nmgp_cmp_hidden["smtp_from_email"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_from_email'] = 'on';
	$this->nmgp_cmp_hidden["smtp_from_name"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_from_name'] = 'on';
}else{
	$this->nmgp_cmp_hidden["smtp_server"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_server'] = 'off';
	$this->nmgp_cmp_hidden["smtp_port"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_port'] = 'off';
	$this->nmgp_cmp_hidden["smtp_security"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_security'] = 'off';
	$this->nmgp_cmp_hidden["smtp_user"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_user'] = 'off';
	$this->nmgp_cmp_hidden["smtp_pass"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_pass'] = 'off';
	$this->nmgp_cmp_hidden["smtp_from_email"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_from_email'] = 'off';
	$this->nmgp_cmp_hidden["smtp_from_name"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_from_name'] = 'off';
}

$modificado_smtp_api = $this->smtp_api;
$modificado_smtp_server = $this->smtp_server;
$modificado_smtp_port = $this->smtp_port;
$modificado_smtp_security = $this->smtp_security;
$modificado_smtp_user = $this->smtp_user;
$modificado_smtp_pass = $this->smtp_pass;
$modificado_smtp_from_email = $this->smtp_from_email;
$modificado_smtp_from_name = $this->smtp_from_name;
$this->nm_formatar_campos('smtp_api', 'smtp_server', 'smtp_port', 'smtp_security', 'smtp_user', 'smtp_pass', 'smtp_from_email', 'smtp_from_name');
if ($original_smtp_api !== $modificado_smtp_api || isset($this->nmgp_cmp_readonly['smtp_api']) || (isset($bFlagRead_smtp_api) && $bFlagRead_smtp_api))
{
    $this->ajax_return_values_smtp_api(true);
}
if ($original_smtp_server !== $modificado_smtp_server || isset($this->nmgp_cmp_readonly['smtp_server']) || (isset($bFlagRead_smtp_server) && $bFlagRead_smtp_server))
{
    $this->ajax_return_values_smtp_server(true);
}
if ($original_smtp_port !== $modificado_smtp_port || isset($this->nmgp_cmp_readonly['smtp_port']) || (isset($bFlagRead_smtp_port) && $bFlagRead_smtp_port))
{
    $this->ajax_return_values_smtp_port(true);
}
if ($original_smtp_security !== $modificado_smtp_security || isset($this->nmgp_cmp_readonly['smtp_security']) || (isset($bFlagRead_smtp_security) && $bFlagRead_smtp_security))
{
    $this->ajax_return_values_smtp_security(true);
}
if ($original_smtp_user !== $modificado_smtp_user || isset($this->nmgp_cmp_readonly['smtp_user']) || (isset($bFlagRead_smtp_user) && $bFlagRead_smtp_user))
{
    $this->ajax_return_values_smtp_user(true);
}
if ($original_smtp_pass !== $modificado_smtp_pass || isset($this->nmgp_cmp_readonly['smtp_pass']) || (isset($bFlagRead_smtp_pass) && $bFlagRead_smtp_pass))
{
    $this->ajax_return_values_smtp_pass(true);
}
if ($original_smtp_from_email !== $modificado_smtp_from_email || isset($this->nmgp_cmp_readonly['smtp_from_email']) || (isset($bFlagRead_smtp_from_email) && $bFlagRead_smtp_from_email))
{
    $this->ajax_return_values_smtp_from_email(true);
}
if ($original_smtp_from_name !== $modificado_smtp_from_name || isset($this->nmgp_cmp_readonly['smtp_from_name']) || (isset($bFlagRead_smtp_from_name) && $bFlagRead_smtp_from_name))
{
    $this->ajax_return_values_smtp_from_name(true);
}
$this->NM_ajax_info['event_field'] = 'smtp';
app3_settings_pack_ajax_response();
exit;
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              app3_settings_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE html>

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_brute_force = $this->brute_force;
    $original_brute_force_attempts = $this->brute_force_attempts;
    $original_brute_force_time_block = $this->brute_force_time_block;
    $original_cookie_expiration_time = $this->cookie_expiration_time;
    $original_enable_2fa = $this->enable_2fa;
    $original_enable_2fa_api = $this->enable_2fa_api;
    $original_enable_2fa_api_type = $this->enable_2fa_api_type;
    $original_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
    $original_enable_2fa_mode = $this->enable_2fa_mode;
    $original_mfa_last_updated = $this->mfa_last_updated;
    $original_recover_pswd = $this->recover_pswd;
    $original_remember_me = $this->remember_me;
    $original_retrieve_password = $this->retrieve_password;
    $original_smtp_api = $this->smtp_api;
    $original_smtp_from_email = $this->smtp_from_email;
    $original_smtp_from_name = $this->smtp_from_name;
    $original_smtp_pass = $this->smtp_pass;
    $original_smtp_port = $this->smtp_port;
    $original_smtp_security = $this->smtp_security;
    $original_smtp_server = $this->smtp_server;
    $original_smtp_user = $this->smtp_user;
    $original_theme = $this->theme;
}
  $check_sql = "SELECT set_name, set_value  FROM sec_settings";
   
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($this->rs[0][0]))     
{
    foreach($this->rs as $f ){
        eval("\$this->".$f[0]." = '".$f[1]."';");
    }
}

if($this->brute_force  != 'Y'){
    $this->nmgp_cmp_hidden["brute_force_time_block"] = 'off'; $this->NM_ajax_info['fieldDisplay']['brute_force_time_block'] = 'off';
    $this->nmgp_cmp_hidden["brute_force_attempts"] = 'off'; $this->NM_ajax_info['fieldDisplay']['brute_force_attempts'] = 'off';
}

if($this->enable_2fa  == 'Y'){
    $this->nmgp_cmp_hidden["enable_2fa_expiration_time"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_expiration_time'] = 'on';
    $this->nmgp_cmp_hidden["enable_2fa_mode"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_mode'] = 'on';
    $this->nmgp_cmp_hidden["enable_2fa_api"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api'] = 'on';
    $this->nmgp_cmp_hidden["enable_2fa_api_type"] = 'on'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api_type'] = 'on';
    $this->nmgp_cmp_hidden["mfa_last_updated"] = 'on'; $this->NM_ajax_info['fieldDisplay']['mfa_last_updated'] = 'on';
}else{   
    $this->nmgp_cmp_hidden["enable_2fa_expiration_time"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_expiration_time'] = 'off';
	$this->nmgp_cmp_hidden["enable_2fa_mode"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_mode'] = 'off';
	$this->nmgp_cmp_hidden["enable_2fa_api"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api'] = 'off';
	$this->nmgp_cmp_hidden["enable_2fa_api_type"] = 'off'; $this->NM_ajax_info['fieldDisplay']['enable_2fa_api_type'] = 'off';
	$this->nmgp_cmp_hidden["mfa_last_updated"] = 'off'; $this->NM_ajax_info['fieldDisplay']['mfa_last_updated'] = 'off';
}

if($this->remember_me  != 'Y'){
    $this->nmgp_cmp_hidden["cookie_expiration_time"] = 'off'; $this->NM_ajax_info['fieldDisplay']['cookie_expiration_time'] = 'off';
}

if(!isset($this->theme )){
	$this->theme  = $this->Ini->sc_get_schema();
}


if($this->retrieve_password  == 'Y'){
	$this->nmgp_cmp_hidden["recover_pswd"] = 'on'; $this->NM_ajax_info['fieldDisplay']['recover_pswd'] = 'on';
}
else{
	$this->nmgp_cmp_hidden["recover_pswd"] = 'off'; $this->NM_ajax_info['fieldDisplay']['recover_pswd'] = 'off';
}

if($this->smtp_api  == 'custom'){
	$this->nmgp_cmp_hidden["smtp_server"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_server'] = 'on';
	$this->nmgp_cmp_hidden["smtp_port"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_port'] = 'on';
	$this->nmgp_cmp_hidden["smtp_security"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_security'] = 'on';
	$this->nmgp_cmp_hidden["smtp_user"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_user'] = 'on';
	$this->nmgp_cmp_hidden["smtp_pass"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_pass'] = 'on';
	$this->nmgp_cmp_hidden["smtp_from_email"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_from_email'] = 'on';
	$this->nmgp_cmp_hidden["smtp_from_name"] = 'on'; $this->NM_ajax_info['fieldDisplay']['smtp_from_name'] = 'on';
}else{
	$this->nmgp_cmp_hidden["smtp_server"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_server'] = 'off';
	$this->nmgp_cmp_hidden["smtp_port"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_port'] = 'off';
	$this->nmgp_cmp_hidden["smtp_security"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_security'] = 'off';
	$this->nmgp_cmp_hidden["smtp_user"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_user'] = 'off';
	$this->nmgp_cmp_hidden["smtp_pass"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_pass'] = 'off';
	$this->nmgp_cmp_hidden["smtp_from_email"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_from_email'] = 'off';
	$this->nmgp_cmp_hidden["smtp_from_name"] = 'off'; $this->NM_ajax_info['fieldDisplay']['smtp_from_name'] = 'off';
}

$arr_apis = nm_list_apis('email');


$api_smtp_field = "<select name='smtp_api' class='sc-js-input css_smtp_api_obj css_api_obj_fld sc-ui-100perc-input scFormObjectOdd' style='width:100%' onchange='$(\"input[name=smtp_api]\").val(this.value);do_ajax_app3_settings_event_smtp_api_onchange();'>";
$api_smtp_field .= "<option value='custom' ".($this->smtp_api  == 'custom' ? "selected" : '').">" .  $this->Ini->Nm_lang['lang_sec_set_custom']  . "</option>";

foreach($arr_apis as $api => $data){
	$api_smtp_field  .= "<option value='".$data['mod'] . '__NM__'.$api."' ".
		($this->smtp_api  == $data['mod'] . '__NM__'.$api ? "selected" : '')
		." >";
	$api_smtp_field  .= $data['name'] . " - " . $data['gateway'];
	$api_smtp_field  .= "</option>";
}
$api_smtp_field .= "</select>";

$this->smtp_api  = $api_smtp_field;



$arr_apis = nm_list_apis($this->enable_2fa_api_type );

$api_2fa = "<select name='enable_2fa_api' class='sc-js-input css_smtp_api_obj css_api_obj_fld sc-ui-100perc-input scFormObjectOdd' style='width:100%' onchange='$(\"input[name=enable_2fa_api]\").val(this.value);'>";

foreach($arr_apis as $api => $data){
	$api_2fa  .= "<option value='".$data['mod'] . '__NM__'.$api."' ".
		($this->enable_2fa_api  == $data['mod'] . '__NM__'.$api ? "selected" : '')
		." >";
	$api_2fa  .= $data['name'] . " - " . $data['gateway'];
	$api_2fa  .= "</option>";
}
$api_2fa .= "</select>";

$this->enable_2fa_api  = $api_2fa;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_brute_force != $this->brute_force || (isset($bFlagRead_brute_force) && $bFlagRead_brute_force)))
    {
        $this->ajax_return_values_brute_force(true);
    }
    if (($original_brute_force_attempts != $this->brute_force_attempts || (isset($bFlagRead_brute_force_attempts) && $bFlagRead_brute_force_attempts)))
    {
        $this->ajax_return_values_brute_force_attempts(true);
    }
    if (($original_brute_force_time_block != $this->brute_force_time_block || (isset($bFlagRead_brute_force_time_block) && $bFlagRead_brute_force_time_block)))
    {
        $this->ajax_return_values_brute_force_time_block(true);
    }
    if (($original_cookie_expiration_time != $this->cookie_expiration_time || (isset($bFlagRead_cookie_expiration_time) && $bFlagRead_cookie_expiration_time)))
    {
        $this->ajax_return_values_cookie_expiration_time(true);
    }
    if (($original_enable_2fa != $this->enable_2fa || (isset($bFlagRead_enable_2fa) && $bFlagRead_enable_2fa)))
    {
        $this->ajax_return_values_enable_2fa(true);
    }
    if (($original_enable_2fa_api != $this->enable_2fa_api || (isset($bFlagRead_enable_2fa_api) && $bFlagRead_enable_2fa_api)))
    {
        $this->ajax_return_values_enable_2fa_api(true);
    }
    if (($original_enable_2fa_api_type != $this->enable_2fa_api_type || (isset($bFlagRead_enable_2fa_api_type) && $bFlagRead_enable_2fa_api_type)))
    {
        $this->ajax_return_values_enable_2fa_api_type(true);
    }
    if (($original_enable_2fa_expiration_time != $this->enable_2fa_expiration_time || (isset($bFlagRead_enable_2fa_expiration_time) && $bFlagRead_enable_2fa_expiration_time)))
    {
        $this->ajax_return_values_enable_2fa_expiration_time(true);
    }
    if (($original_enable_2fa_mode != $this->enable_2fa_mode || (isset($bFlagRead_enable_2fa_mode) && $bFlagRead_enable_2fa_mode)))
    {
        $this->ajax_return_values_enable_2fa_mode(true);
    }
    if (($original_mfa_last_updated != $this->mfa_last_updated || (isset($bFlagRead_mfa_last_updated) && $bFlagRead_mfa_last_updated)))
    {
        $this->ajax_return_values_mfa_last_updated(true);
    }
    if (($original_recover_pswd != $this->recover_pswd || (isset($bFlagRead_recover_pswd) && $bFlagRead_recover_pswd)))
    {
        $this->ajax_return_values_recover_pswd(true);
    }
    if (($original_remember_me != $this->remember_me || (isset($bFlagRead_remember_me) && $bFlagRead_remember_me)))
    {
        $this->ajax_return_values_remember_me(true);
    }
    if (($original_retrieve_password != $this->retrieve_password || (isset($bFlagRead_retrieve_password) && $bFlagRead_retrieve_password)))
    {
        $this->ajax_return_values_retrieve_password(true);
    }
    if (($original_smtp_api != $this->smtp_api || (isset($bFlagRead_smtp_api) && $bFlagRead_smtp_api)))
    {
        $this->ajax_return_values_smtp_api(true);
    }
    if (($original_smtp_from_email != $this->smtp_from_email || (isset($bFlagRead_smtp_from_email) && $bFlagRead_smtp_from_email)))
    {
        $this->ajax_return_values_smtp_from_email(true);
    }
    if (($original_smtp_from_name != $this->smtp_from_name || (isset($bFlagRead_smtp_from_name) && $bFlagRead_smtp_from_name)))
    {
        $this->ajax_return_values_smtp_from_name(true);
    }
    if (($original_smtp_pass != $this->smtp_pass || (isset($bFlagRead_smtp_pass) && $bFlagRead_smtp_pass)))
    {
        $this->ajax_return_values_smtp_pass(true);
    }
    if (($original_smtp_port != $this->smtp_port || (isset($bFlagRead_smtp_port) && $bFlagRead_smtp_port)))
    {
        $this->ajax_return_values_smtp_port(true);
    }
    if (($original_smtp_security != $this->smtp_security || (isset($bFlagRead_smtp_security) && $bFlagRead_smtp_security)))
    {
        $this->ajax_return_values_smtp_security(true);
    }
    if (($original_smtp_server != $this->smtp_server || (isset($bFlagRead_smtp_server) && $bFlagRead_smtp_server)))
    {
        $this->ajax_return_values_smtp_server(true);
    }
    if (($original_smtp_user != $this->smtp_user || (isset($bFlagRead_smtp_user) && $bFlagRead_smtp_user)))
    {
        $this->ajax_return_values_smtp_user(true);
    }
    if (($original_theme != $this->theme || (isset($bFlagRead_theme) && $bFlagRead_theme)))
    {
        $this->ajax_return_values_theme(true);
    }
}
$_SESSION['scriptcase']['app3_settings']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_guardar_campos();
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("app3_settings_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_session_expire()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_sess_no'] . "?#?N?#?S?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_sess_redir'] . "?#?R?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_sess_msg'] . "?#?M?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_remember_me()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_language()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_login_mode()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_login_mode_user'] . "?#?username?#?N?@?";
       $nmgp_def_dados .= "E-mail?#?email?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_login_mode_both'] . "?#?both?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_captcha()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_brute_force()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_retrieve_password()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_recover_pswd()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_reset_send'] . "?#?reset_send?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_send_link'] . "?#?send_link?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_password_strength()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_ps_uppercase_letter'] . "?#?uppercase_letter?#??@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_ps_lowercase_letter'] . "?#?lowercase_letter?#??@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_ps_numbers'] . "?#?numbers?#??@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_ps_special_chars'] . "?#?special_chars?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_group_administrator()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'] = array(); 
    }

   $old_value_cookie_expiration_time = $this->cookie_expiration_time;
   $old_value_pswd_last_updated = $this->pswd_last_updated;
   $old_value_brute_force_attempts = $this->brute_force_attempts;
   $old_value_brute_force_time_block = $this->brute_force_time_block;
   $old_value_password_min = $this->password_min;
   $old_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $old_value_mfa_last_updated = $this->mfa_last_updated;
   $old_value_smtp_port = $this->smtp_port;
   $this->nm_tira_formatacao();


   $unformatted_value_cookie_expiration_time = $this->cookie_expiration_time;
   $unformatted_value_pswd_last_updated = $this->pswd_last_updated;
   $unformatted_value_brute_force_attempts = $this->brute_force_attempts;
   $unformatted_value_brute_force_time_block = $this->brute_force_time_block;
   $unformatted_value_password_min = $this->password_min;
   $unformatted_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $unformatted_value_mfa_last_updated = $this->mfa_last_updated;
   $unformatted_value_smtp_port = $this->smtp_port;

   $remember_me_val_str = "''";
   if (!empty($this->remember_me))
   {
       if (is_array($this->remember_me))
       {
           $Tmp_array = $this->remember_me;
       }
       else
       {
           $Tmp_array = explode(";", $this->remember_me);
       }
       $remember_me_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $remember_me_val_str)
          {
             $remember_me_val_str .= ", ";
          }
          $remember_me_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $retrieve_password_val_str = "''";
   if (!empty($this->retrieve_password))
   {
       if (is_array($this->retrieve_password))
       {
           $Tmp_array = $this->retrieve_password;
       }
       else
       {
           $Tmp_array = explode(";", $this->retrieve_password);
       }
       $retrieve_password_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $retrieve_password_val_str)
          {
             $retrieve_password_val_str .= ", ";
          }
          $retrieve_password_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $new_users_val_str = "''";
   if (!empty($this->new_users))
   {
       if (is_array($this->new_users))
       {
           $Tmp_array = $this->new_users;
       }
       else
       {
           $Tmp_array = explode(";", $this->new_users);
       }
       $new_users_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $new_users_val_str)
          {
             $new_users_val_str .= ", ";
          }
          $new_users_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $enable_2fa_val_str = "''";
   if (!empty($this->enable_2fa))
   {
       if (is_array($this->enable_2fa))
       {
           $Tmp_array = $this->enable_2fa;
       }
       else
       {
           $Tmp_array = explode(";", $this->enable_2fa);
       }
       $enable_2fa_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $enable_2fa_val_str)
          {
             $enable_2fa_val_str .= ", ";
          }
          $enable_2fa_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $brute_force_val_str = "''";
   if (!empty($this->brute_force))
   {
       if (is_array($this->brute_force))
       {
           $Tmp_array = $this->brute_force;
       }
       else
       {
           $Tmp_array = explode(";", $this->brute_force);
       }
       $brute_force_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $brute_force_val_str)
          {
             $brute_force_val_str .= ", ";
          }
          $brute_force_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $captcha_val_str = "''";
   if (!empty($this->captcha))
   {
       if (is_array($this->captcha))
       {
           $Tmp_array = $this->captcha;
       }
       else
       {
           $Tmp_array = explode(";", $this->captcha);
       }
       $captcha_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $captcha_val_str)
          {
             $captcha_val_str .= ", ";
          }
          $captcha_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $language_val_str = "''";
   if (!empty($this->language))
   {
       if (is_array($this->language))
       {
           $Tmp_array = $this->language;
       }
       else
       {
           $Tmp_array = explode(";", $this->language);
       }
       $language_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $language_val_str)
          {
             $language_val_str .= ", ";
          }
          $language_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $req_email_act_val_str = "''";
   if (!empty($this->req_email_act))
   {
       if (is_array($this->req_email_act))
       {
           $Tmp_array = $this->req_email_act;
       }
       else
       {
           $Tmp_array = explode(";", $this->req_email_act);
       }
       $req_email_act_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $req_email_act_val_str)
          {
             $req_email_act_val_str .= ", ";
          }
          $req_email_act_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $send_email_adm_val_str = "''";
   if (!empty($this->send_email_adm))
   {
       if (is_array($this->send_email_adm))
       {
           $Tmp_array = $this->send_email_adm;
       }
       else
       {
           $Tmp_array = explode(";", $this->send_email_adm);
       }
       $send_email_adm_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $send_email_adm_val_str)
          {
             $send_email_adm_val_str .= ", ";
          }
          $send_email_adm_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $password_strength_val_str = "''";
   if (!empty($this->password_strength))
   {
       if (is_array($this->password_strength))
       {
           $Tmp_array = $this->password_strength;
       }
       else
       {
           $Tmp_array = explode(";", $this->password_strength);
       }
       $password_strength_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $password_strength_val_str)
          {
             $password_strength_val_str .= ", ";
          }
          $password_strength_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT group_id, description  FROM sec_groups  ORDER BY description";

   $this->cookie_expiration_time = $old_value_cookie_expiration_time;
   $this->pswd_last_updated = $old_value_pswd_last_updated;
   $this->brute_force_attempts = $old_value_brute_force_attempts;
   $this->brute_force_time_block = $old_value_brute_force_time_block;
   $this->password_min = $old_value_password_min;
   $this->enable_2fa_expiration_time = $old_value_enable_2fa_expiration_time;
   $this->mfa_last_updated = $old_value_mfa_last_updated;
   $this->smtp_port = $old_value_smtp_port;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_administrator'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_enable_2fa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_enable_2fa_mode()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_2fa_individual'] . "?#?individual?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_sec_opt_2fa_all'] . "?#?all?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_enable_2fa_api_type()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "E-mail?#?email?#?S?@?";
       $nmgp_def_dados .= "Google Auth?#?auth?#?N?@?";
       $nmgp_def_dados .= "SMS?#?sms?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_new_users()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_req_email_act()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_send_email_adm()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_group_default()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'] = array(); 
    }

   $old_value_cookie_expiration_time = $this->cookie_expiration_time;
   $old_value_pswd_last_updated = $this->pswd_last_updated;
   $old_value_brute_force_attempts = $this->brute_force_attempts;
   $old_value_brute_force_time_block = $this->brute_force_time_block;
   $old_value_password_min = $this->password_min;
   $old_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $old_value_mfa_last_updated = $this->mfa_last_updated;
   $old_value_smtp_port = $this->smtp_port;
   $this->nm_tira_formatacao();


   $unformatted_value_cookie_expiration_time = $this->cookie_expiration_time;
   $unformatted_value_pswd_last_updated = $this->pswd_last_updated;
   $unformatted_value_brute_force_attempts = $this->brute_force_attempts;
   $unformatted_value_brute_force_time_block = $this->brute_force_time_block;
   $unformatted_value_password_min = $this->password_min;
   $unformatted_value_enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $unformatted_value_mfa_last_updated = $this->mfa_last_updated;
   $unformatted_value_smtp_port = $this->smtp_port;

   $remember_me_val_str = "''";
   if (!empty($this->remember_me))
   {
       if (is_array($this->remember_me))
       {
           $Tmp_array = $this->remember_me;
       }
       else
       {
           $Tmp_array = explode(";", $this->remember_me);
       }
       $remember_me_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $remember_me_val_str)
          {
             $remember_me_val_str .= ", ";
          }
          $remember_me_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $retrieve_password_val_str = "''";
   if (!empty($this->retrieve_password))
   {
       if (is_array($this->retrieve_password))
       {
           $Tmp_array = $this->retrieve_password;
       }
       else
       {
           $Tmp_array = explode(";", $this->retrieve_password);
       }
       $retrieve_password_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $retrieve_password_val_str)
          {
             $retrieve_password_val_str .= ", ";
          }
          $retrieve_password_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $new_users_val_str = "''";
   if (!empty($this->new_users))
   {
       if (is_array($this->new_users))
       {
           $Tmp_array = $this->new_users;
       }
       else
       {
           $Tmp_array = explode(";", $this->new_users);
       }
       $new_users_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $new_users_val_str)
          {
             $new_users_val_str .= ", ";
          }
          $new_users_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $enable_2fa_val_str = "''";
   if (!empty($this->enable_2fa))
   {
       if (is_array($this->enable_2fa))
       {
           $Tmp_array = $this->enable_2fa;
       }
       else
       {
           $Tmp_array = explode(";", $this->enable_2fa);
       }
       $enable_2fa_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $enable_2fa_val_str)
          {
             $enable_2fa_val_str .= ", ";
          }
          $enable_2fa_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $brute_force_val_str = "''";
   if (!empty($this->brute_force))
   {
       if (is_array($this->brute_force))
       {
           $Tmp_array = $this->brute_force;
       }
       else
       {
           $Tmp_array = explode(";", $this->brute_force);
       }
       $brute_force_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $brute_force_val_str)
          {
             $brute_force_val_str .= ", ";
          }
          $brute_force_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $captcha_val_str = "''";
   if (!empty($this->captcha))
   {
       if (is_array($this->captcha))
       {
           $Tmp_array = $this->captcha;
       }
       else
       {
           $Tmp_array = explode(";", $this->captcha);
       }
       $captcha_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $captcha_val_str)
          {
             $captcha_val_str .= ", ";
          }
          $captcha_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $language_val_str = "''";
   if (!empty($this->language))
   {
       if (is_array($this->language))
       {
           $Tmp_array = $this->language;
       }
       else
       {
           $Tmp_array = explode(";", $this->language);
       }
       $language_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $language_val_str)
          {
             $language_val_str .= ", ";
          }
          $language_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $req_email_act_val_str = "''";
   if (!empty($this->req_email_act))
   {
       if (is_array($this->req_email_act))
       {
           $Tmp_array = $this->req_email_act;
       }
       else
       {
           $Tmp_array = explode(";", $this->req_email_act);
       }
       $req_email_act_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $req_email_act_val_str)
          {
             $req_email_act_val_str .= ", ";
          }
          $req_email_act_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $send_email_adm_val_str = "''";
   if (!empty($this->send_email_adm))
   {
       if (is_array($this->send_email_adm))
       {
           $Tmp_array = $this->send_email_adm;
       }
       else
       {
           $Tmp_array = explode(";", $this->send_email_adm);
       }
       $send_email_adm_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $send_email_adm_val_str)
          {
             $send_email_adm_val_str .= ", ";
          }
          $send_email_adm_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $password_strength_val_str = "''";
   if (!empty($this->password_strength))
   {
       if (is_array($this->password_strength))
       {
           $Tmp_array = $this->password_strength;
       }
       else
       {
           $Tmp_array = explode(";", $this->password_strength);
       }
       $password_strength_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $password_strength_val_str)
          {
             $password_strength_val_str .= ", ";
          }
          $password_strength_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT group_id, description  FROM sec_groups  ORDER BY description";

   $this->cookie_expiration_time = $old_value_cookie_expiration_time;
   $this->pswd_last_updated = $old_value_pswd_last_updated;
   $this->brute_force_attempts = $old_value_brute_force_attempts;
   $this->brute_force_time_block = $old_value_brute_force_time_block;
   $this->password_min = $old_value_password_min;
   $this->enable_2fa_expiration_time = $old_value_enable_2fa_expiration_time;
   $this->mfa_last_updated = $old_value_mfa_last_updated;
   $this->smtp_port = $old_value_smtp_port;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['Lookup_group_default'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_smtp_security()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SSL?#?ssl?#?N?@?";
       $nmgp_def_dados .= "TLS?#?tls?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "app3_settings_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['nm_run_menu'] = 2;
       $nmgp_saida_form = "app3_settings_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       app3_settings_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE html>

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           app3_settings_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       app3_settings_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE html>

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function sc_ajax_alert($sMessage, $params = array())
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxAlert']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxAlert']['params']  = $this->sc_ajax_alert_params($params);
        }
    } // sc_ajax_alert

    function sc_ajax_alert_params($params)
    {
        $paramList = array();
        foreach ($params as $paramName => $paramValue)
        {
            if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding', 'position')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('background' == $paramName)
            {
                $paramList[$paramName] = $this->sc_ajax_alert_image(NM_charset_to_utf8($paramValue));
            }
        }
        return $paramList;
    } // sc_ajax_alert_params

    function sc_ajax_alert_image($background)
    {
        $image_param = $background;
        preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $background, $matches, PREG_PATTERN_ORDER);
        if (isset($matches[3])) {
            foreach ($matches[3] as $match) {
                if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                    $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                }
            }
        }
        return $image_param;
    } // sc_ajax_alert_image
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "ok":
                return array("sub_form_b.sc-unique-btn-1");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-2", "Bsair_b.sc-unique-btn-3");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo ""; } else { echo "" . $this->Ini->Nm_lang['lang_settings'] . ""; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function getSummaryLine()
    {
        $summaryLine = "[" . $this->Ini->Nm_lang['lang_othr_smry_info_simp'] . "]";
        $summaryLine = str_replace(
            [
                '?final?',
                '?total?',
            ],
            [
                $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['reg_start'] + 1,
                $_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['total'] + 1,
            ],
            $summaryLine
        );

        return $summaryLine;
    } // getSummaryLine

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['app3_settings']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ($this->scIsFieldNumeric($fieldName)) {
            $defaultOffIcon = 'asc' == $this->scGetDefaultFieldOrder($fieldName) ? "fas fa-sort-numeric-down" : "fas fa-sort-numeric-down-alt";
            if ('desc' == $sortRule) {
                return "<span class=\"fas fa-sort-numeric-down-alt sc-form-order-icon\"></span>";
            } elseif ('asc' == $sortRule) {
                return "<span class=\"fas fa-sort-numeric-down sc-form-order-icon\"></span>";
            } else {
                return "<span class=\"" . $defaultOffIcon . " sc-form-order-icon sc-form-order-icon-unused\"></span>";
            }
        } else {
            $defaultOffIcon = 'asc' == $this->scGetDefaultFieldOrder($fieldName) ? "fas fa-sort-alpha-down" : "fas fa-sort-alpha-down-alt";
            if ('desc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down-alt sc-form-order-icon\"></span>";
            } elseif ('asc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down sc-form-order-icon\"></span>";
            } else {
                return "<span class=\"" . $defaultOffIcon . " sc-form-order-icon sc-form-order-icon-unused\"></span>";
            }
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            case "":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            default:
                return 'asc';
        }
        return 'asc';
    }

}
?>
