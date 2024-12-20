<?php
//
class form_procedimiento1_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
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
                                'navSummary'        => array(),
                                'navPage'           => array(),
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
   var $id_procedimiento;
   var $secad;
   var $consecutivo;
   var $quien_reporta;
   var $quien_reporta_1;
   var $direccion_servicio;
   var $id_barrio;
   var $id_barrio_1;
   var $tipo_servicio;
   var $tipo_servicio_1;
   var $numero_contacto;
   var $radicado;
   var $nombre_apellido;
   var $tipo_documento;
   var $tipo_documento_1;
   var $documento_identidad;
   var $edad;
   var $genero;
   var $circunstancias_emergencia;
   var $id_seguridad_social;
   var $id_seguridad_social_1;
   var $id_eps;
   var $id_eps_1;
   var $fecha;
   var $ip;
   var $login;
   var $login_1;
   var $hora_ingreso_llamada;
   var $hora_notifica_movil;
   var $hora_llegada_sitio;
   var $hora_llegada_ips;
   var $hora_salida_ips;
   var $id_movil;
   var $id_movil_1;
   var $id_ips;
   var $id_ips_1;
   var $tipo_caso;
   var $tipo_caso_1;
   var $operador;
   var $id_medico;
   var $id_medico_1;
   var $id_tipo_evento;
   var $id_tipo_evento_1;
   var $observaciones;
   var $zona;
   var $zona_1;
   var $discapacidad;
   var $discapacidad_1;
   var $id_ciudad;
   var $id_ciudad_1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
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
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['circunstancias_emergencia']))
          {
              $this->circunstancias_emergencia = $this->NM_ajax_info['param']['circunstancias_emergencia'];
          }
          if (isset($this->NM_ajax_info['param']['consecutivo']))
          {
              $this->consecutivo = $this->NM_ajax_info['param']['consecutivo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['direccion_servicio']))
          {
              $this->direccion_servicio = $this->NM_ajax_info['param']['direccion_servicio'];
          }
          if (isset($this->NM_ajax_info['param']['discapacidad']))
          {
              $this->discapacidad = $this->NM_ajax_info['param']['discapacidad'];
          }
          if (isset($this->NM_ajax_info['param']['documento_identidad']))
          {
              $this->documento_identidad = $this->NM_ajax_info['param']['documento_identidad'];
          }
          if (isset($this->NM_ajax_info['param']['edad']))
          {
              $this->edad = $this->NM_ajax_info['param']['edad'];
          }
          if (isset($this->NM_ajax_info['param']['genero']))
          {
              $this->genero = $this->NM_ajax_info['param']['genero'];
          }
          if (isset($this->NM_ajax_info['param']['hora_ingreso_llamada']))
          {
              $this->hora_ingreso_llamada = $this->NM_ajax_info['param']['hora_ingreso_llamada'];
          }
          if (isset($this->NM_ajax_info['param']['hora_llegada_ips']))
          {
              $this->hora_llegada_ips = $this->NM_ajax_info['param']['hora_llegada_ips'];
          }
          if (isset($this->NM_ajax_info['param']['hora_llegada_sitio']))
          {
              $this->hora_llegada_sitio = $this->NM_ajax_info['param']['hora_llegada_sitio'];
          }
          if (isset($this->NM_ajax_info['param']['hora_notifica_movil']))
          {
              $this->hora_notifica_movil = $this->NM_ajax_info['param']['hora_notifica_movil'];
          }
          if (isset($this->NM_ajax_info['param']['hora_salida_ips']))
          {
              $this->hora_salida_ips = $this->NM_ajax_info['param']['hora_salida_ips'];
          }
          if (isset($this->NM_ajax_info['param']['id_barrio']))
          {
              $this->id_barrio = $this->NM_ajax_info['param']['id_barrio'];
          }
          if (isset($this->NM_ajax_info['param']['id_ciudad']))
          {
              $this->id_ciudad = $this->NM_ajax_info['param']['id_ciudad'];
          }
          if (isset($this->NM_ajax_info['param']['id_eps']))
          {
              $this->id_eps = $this->NM_ajax_info['param']['id_eps'];
          }
          if (isset($this->NM_ajax_info['param']['id_ips']))
          {
              $this->id_ips = $this->NM_ajax_info['param']['id_ips'];
          }
          if (isset($this->NM_ajax_info['param']['id_medico']))
          {
              $this->id_medico = $this->NM_ajax_info['param']['id_medico'];
          }
          if (isset($this->NM_ajax_info['param']['id_movil']))
          {
              $this->id_movil = $this->NM_ajax_info['param']['id_movil'];
          }
          if (isset($this->NM_ajax_info['param']['id_procedimiento']))
          {
              $this->id_procedimiento = $this->NM_ajax_info['param']['id_procedimiento'];
          }
          if (isset($this->NM_ajax_info['param']['id_seguridad_social']))
          {
              $this->id_seguridad_social = $this->NM_ajax_info['param']['id_seguridad_social'];
          }
          if (isset($this->NM_ajax_info['param']['id_tipo_evento']))
          {
              $this->id_tipo_evento = $this->NM_ajax_info['param']['id_tipo_evento'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
          if (isset($this->NM_ajax_info['param']['nombre_apellido']))
          {
              $this->nombre_apellido = $this->NM_ajax_info['param']['nombre_apellido'];
          }
          if (isset($this->NM_ajax_info['param']['numero_contacto']))
          {
              $this->numero_contacto = $this->NM_ajax_info['param']['numero_contacto'];
          }
          if (isset($this->NM_ajax_info['param']['quien_reporta']))
          {
              $this->quien_reporta = $this->NM_ajax_info['param']['quien_reporta'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['secad']))
          {
              $this->secad = $this->NM_ajax_info['param']['secad'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_caso']))
          {
              $this->tipo_caso = $this->NM_ajax_info['param']['tipo_caso'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_documento']))
          {
              $this->tipo_documento = $this->NM_ajax_info['param']['tipo_documento'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_servicio']))
          {
              $this->tipo_servicio = $this->NM_ajax_info['param']['tipo_servicio'];
          }
          if (isset($this->NM_ajax_info['param']['zona']))
          {
              $this->zona = $this->NM_ajax_info['param']['zona'];
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
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['embutida_parms']);
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
                 nm_limpa_str_form_procedimiento1($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_procedimiento1_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['initialize'])
          {
              $_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'on';
  $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['start'] = 'new';
$_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_procedimiento1']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_procedimiento1']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_procedimiento1'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_procedimiento1']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_procedimiento1']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_procedimiento1') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_procedimiento1']['label'] = "Procedimiento1";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_procedimiento1")
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



      $_SESSION['scriptcase']['error_icon']['form_procedimiento1']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_procedimiento1'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_procedimiento1']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_procedimiento1'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_procedimiento1'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_form'];
          if (!isset($this->id_procedimiento)){$this->id_procedimiento = $this->nmgp_dados_form['id_procedimiento'];} 
          if (!isset($this->radicado)){$this->radicado = $this->nmgp_dados_form['radicado'];} 
          if (!isset($this->fecha)){$this->fecha = $this->nmgp_dados_form['fecha'];} 
          if (!isset($this->ip)){$this->ip = $this->nmgp_dados_form['ip'];} 
          if (!isset($this->login)){$this->login = $this->nmgp_dados_form['login'];} 
          if (!isset($this->operador)){$this->operador = $this->nmgp_dados_form['operador'];} 
          if (!isset($this->observaciones)){$this->observaciones = $this->nmgp_dados_form['observaciones'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_procedimiento1", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_procedimiento1_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_procedimiento1_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
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
          require_once($this->Ini->path_embutida . 'form_procedimiento1/form_procedimiento1_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_procedimiento1_erro.class.php"); 
      }
      $this->Erro      = new form_procedimiento1_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao']))
         { 
             if ($this->id_procedimiento != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_procedimiento1']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_procedimiento1']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_procedimiento1']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->secad)) { $this->nm_limpa_alfa($this->secad); }
      if (isset($this->consecutivo)) { $this->nm_limpa_alfa($this->consecutivo); }
      if (isset($this->quien_reporta)) { $this->nm_limpa_alfa($this->quien_reporta); }
      if (isset($this->direccion_servicio)) { $this->nm_limpa_alfa($this->direccion_servicio); }
      if (isset($this->id_barrio)) { $this->nm_limpa_alfa($this->id_barrio); }
      if (isset($this->tipo_servicio)) { $this->nm_limpa_alfa($this->tipo_servicio); }
      if (isset($this->numero_contacto)) { $this->nm_limpa_alfa($this->numero_contacto); }
      if (isset($this->nombre_apellido)) { $this->nm_limpa_alfa($this->nombre_apellido); }
      if (isset($this->tipo_documento)) { $this->nm_limpa_alfa($this->tipo_documento); }
      if (isset($this->documento_identidad)) { $this->nm_limpa_alfa($this->documento_identidad); }
      if (isset($this->edad)) { $this->nm_limpa_alfa($this->edad); }
      if (isset($this->genero)) { $this->nm_limpa_alfa($this->genero); }
      if (isset($this->circunstancias_emergencia)) { $this->nm_limpa_alfa($this->circunstancias_emergencia); }
      if (isset($this->id_seguridad_social)) { $this->nm_limpa_alfa($this->id_seguridad_social); }
      if (isset($this->id_eps)) { $this->nm_limpa_alfa($this->id_eps); }
      if (isset($this->id_movil)) { $this->nm_limpa_alfa($this->id_movil); }
      if (isset($this->id_ips)) { $this->nm_limpa_alfa($this->id_ips); }
      if (isset($this->tipo_caso)) { $this->nm_limpa_alfa($this->tipo_caso); }
      if (isset($this->id_medico)) { $this->nm_limpa_alfa($this->id_medico); }
      if (isset($this->id_tipo_evento)) { $this->nm_limpa_alfa($this->id_tipo_evento); }
      if (isset($this->zona)) { $this->nm_limpa_alfa($this->zona); }
      if (isset($this->discapacidad)) { $this->nm_limpa_alfa($this->discapacidad); }
      if (isset($this->id_ciudad)) { $this->nm_limpa_alfa($this->id_ciudad); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- edad
      $this->field_config['edad']               = array();
      $this->field_config['edad']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['edad']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['edad']['symbol_dec'] = '';
      $this->field_config['edad']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['edad']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- hora_ingreso_llamada
      $this->field_config['hora_ingreso_llamada']                 = array();
      $this->field_config['hora_ingreso_llamada']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_ingreso_llamada']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_ingreso_llamada']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_ingreso_llamada');
      //-- hora_notifica_movil
      $this->field_config['hora_notifica_movil']                 = array();
      $this->field_config['hora_notifica_movil']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_notifica_movil']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_notifica_movil']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_notifica_movil');
      //-- hora_llegada_sitio
      $this->field_config['hora_llegada_sitio']                 = array();
      $this->field_config['hora_llegada_sitio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_llegada_sitio']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_llegada_sitio']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_llegada_sitio');
      //-- hora_llegada_ips
      $this->field_config['hora_llegada_ips']                 = array();
      $this->field_config['hora_llegada_ips']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_llegada_ips']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_llegada_ips']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_llegada_ips');
      //-- hora_salida_ips
      $this->field_config['hora_salida_ips']                 = array();
      $this->field_config['hora_salida_ips']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_salida_ips']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_salida_ips']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_salida_ips');
      //-- id_procedimiento
      $this->field_config['id_procedimiento']               = array();
      $this->field_config['id_procedimiento']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_procedimiento']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_procedimiento']['symbol_dec'] = '';
      $this->field_config['id_procedimiento']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_procedimiento']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha
      $this->field_config['fecha']                 = array();
      $this->field_config['fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Gera_log_access'] = false;
      }

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
          if ('validate_consecutivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'consecutivo');
          }
          if ('validate_secad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'secad');
          }
          if ('validate_quien_reporta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'quien_reporta');
          }
          if ('validate_discapacidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discapacidad');
          }
          if ('validate_nombre_apellido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_apellido');
          }
          if ('validate_tipo_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_documento');
          }
          if ('validate_documento_identidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'documento_identidad');
          }
          if ('validate_edad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'edad');
          }
          if ('validate_numero_contacto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_contacto');
          }
          if ('validate_genero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'genero');
          }
          if ('validate_id_tipo_evento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_tipo_evento');
          }
          if ('validate_circunstancias_emergencia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'circunstancias_emergencia');
          }
          if ('validate_id_eps' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_eps');
          }
          if ('validate_id_seguridad_social' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_seguridad_social');
          }
          if ('validate_zona' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zona');
          }
          if ('validate_tipo_servicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_servicio');
          }
          if ('validate_id_barrio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_barrio');
          }
          if ('validate_direccion_servicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion_servicio');
          }
          if ('validate_hora_ingreso_llamada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_ingreso_llamada');
          }
          if ('validate_hora_notifica_movil' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_notifica_movil');
          }
          if ('validate_hora_llegada_sitio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_llegada_sitio');
          }
          if ('validate_hora_llegada_ips' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_llegada_ips');
          }
          if ('validate_hora_salida_ips' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_salida_ips');
          }
          if ('validate_id_movil' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_movil');
          }
          if ('validate_id_ips' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_ips');
          }
          if ('validate_tipo_caso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_caso');
          }
          if ('validate_id_medico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_medico');
          }
          if ('validate_id_ciudad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_ciudad');
          }
          form_procedimiento1_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_nombre_apellido_onfocus' == $this->NM_ajax_opcao)
          {
              $this->nombre_apellido_onFocus();
          }
          form_procedimiento1_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_procedimiento1_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_procedimiento1_pack_ajax_response();
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
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_procedimiento1_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_procedimiento1_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_procedimiento1.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1'][$path_doc_md5][1] = $Zip_name;
?><!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Procedimiento1") ?></TITLE>
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
<form name="Fdown" method="get" action="form_procedimiento1_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_procedimiento1"> 
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
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
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
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_sqlsrv' || strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_dblib')
       { 
           $dt  = $delim . date('Ymd H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_procedimiento1', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_procedimiento1', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_procedimiento1', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_procedimiento1_pack_ajax_response();
               exit; 
           }
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
           case 'consecutivo':
               return "Consecutivo";
               break;
           case 'secad':
               return "Secad";
               break;
           case 'quien_reporta':
               return "Quien Reporta";
               break;
           case 'discapacidad':
               return "Discapacidad";
               break;
           case 'nombre_apellido':
               return "Nombre del paciente";
               break;
           case 'tipo_documento':
               return "Tipo Documento";
               break;
           case 'documento_identidad':
               return "Documento Identidad";
               break;
           case 'edad':
               return "Edad";
               break;
           case 'numero_contacto':
               return "Numero Contacto";
               break;
           case 'genero':
               return "Genero";
               break;
           case 'id_tipo_evento':
               return "Tipo Evento";
               break;
           case 'circunstancias_emergencia':
               return "Situación que se presenta";
               break;
           case 'id_eps':
               return "Entidad aseguradora";
               break;
           case 'id_seguridad_social':
               return "Regimen";
               break;
           case 'zona':
               return "Zona";
               break;
           case 'tipo_servicio':
               return "Tipo Servicio";
               break;
           case 'id_barrio':
               return "Barrio";
               break;
           case 'direccion_servicio':
               return "Direccion Servicio";
               break;
           case 'hora_ingreso_llamada':
               return "Hora Ingreso Llamada";
               break;
           case 'hora_notifica_movil':
               return "Hora Notifica Movil";
               break;
           case 'hora_llegada_sitio':
               return "Hora Llegada Sitio";
               break;
           case 'hora_llegada_ips':
               return "Hora Llegada Ips";
               break;
           case 'hora_salida_ips':
               return "Hora Salida Ips";
               break;
           case 'id_movil':
               return "Vehículo que atendio";
               break;
           case 'id_ips':
               return "Direccionamiento";
               break;
           case 'tipo_caso':
               return "Tipo Caso";
               break;
           case 'id_medico':
               return "Medico Regulador";
               break;
           case 'id_ciudad':
               return "Ciudad";
               break;
           case 'id_procedimiento':
               return "Id Procedimiento";
               break;
           case 'radicado':
               return "Radicado";
               break;
           case 'fecha':
               return "Fecha";
               break;
           case 'ip':
               return "Ip";
               break;
           case 'login':
               return "Login";
               break;
           case 'operador':
               return "Operador";
               break;
           case 'observaciones':
               return "Observaciones";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_procedimiento1']) || !is_array($this->NM_ajax_info['errList']['geral_form_procedimiento1']))
              {
                  $this->NM_ajax_info['errList']['geral_form_procedimiento1'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_procedimiento1'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'consecutivo' == $filtro)) || (is_array($filtro) && in_array('consecutivo', $filtro)))
        $this->ValidateField_consecutivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'secad' == $filtro)) || (is_array($filtro) && in_array('secad', $filtro)))
        $this->ValidateField_secad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'quien_reporta' == $filtro)) || (is_array($filtro) && in_array('quien_reporta', $filtro)))
        $this->ValidateField_quien_reporta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'discapacidad' == $filtro)) || (is_array($filtro) && in_array('discapacidad', $filtro)))
        $this->ValidateField_discapacidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_apellido' == $filtro)) || (is_array($filtro) && in_array('nombre_apellido', $filtro)))
        $this->ValidateField_nombre_apellido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_documento' == $filtro)) || (is_array($filtro) && in_array('tipo_documento', $filtro)))
        $this->ValidateField_tipo_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'documento_identidad' == $filtro)) || (is_array($filtro) && in_array('documento_identidad', $filtro)))
        $this->ValidateField_documento_identidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'edad' == $filtro)) || (is_array($filtro) && in_array('edad', $filtro)))
        $this->ValidateField_edad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero_contacto' == $filtro)) || (is_array($filtro) && in_array('numero_contacto', $filtro)))
        $this->ValidateField_numero_contacto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'genero' == $filtro)) || (is_array($filtro) && in_array('genero', $filtro)))
        $this->ValidateField_genero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_tipo_evento' == $filtro)) || (is_array($filtro) && in_array('id_tipo_evento', $filtro)))
        $this->ValidateField_id_tipo_evento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'circunstancias_emergencia' == $filtro)) || (is_array($filtro) && in_array('circunstancias_emergencia', $filtro)))
        $this->ValidateField_circunstancias_emergencia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_eps' == $filtro)) || (is_array($filtro) && in_array('id_eps', $filtro)))
        $this->ValidateField_id_eps($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_seguridad_social' == $filtro)) || (is_array($filtro) && in_array('id_seguridad_social', $filtro)))
        $this->ValidateField_id_seguridad_social($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'zona' == $filtro)) || (is_array($filtro) && in_array('zona', $filtro)))
        $this->ValidateField_zona($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_servicio' == $filtro)) || (is_array($filtro) && in_array('tipo_servicio', $filtro)))
        $this->ValidateField_tipo_servicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_barrio' == $filtro)) || (is_array($filtro) && in_array('id_barrio', $filtro)))
        $this->ValidateField_id_barrio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'direccion_servicio' == $filtro)) || (is_array($filtro) && in_array('direccion_servicio', $filtro)))
        $this->ValidateField_direccion_servicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_ingreso_llamada' == $filtro)) || (is_array($filtro) && in_array('hora_ingreso_llamada', $filtro)))
        $this->ValidateField_hora_ingreso_llamada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_notifica_movil' == $filtro)) || (is_array($filtro) && in_array('hora_notifica_movil', $filtro)))
        $this->ValidateField_hora_notifica_movil($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_llegada_sitio' == $filtro)) || (is_array($filtro) && in_array('hora_llegada_sitio', $filtro)))
        $this->ValidateField_hora_llegada_sitio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_llegada_ips' == $filtro)) || (is_array($filtro) && in_array('hora_llegada_ips', $filtro)))
        $this->ValidateField_hora_llegada_ips($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_salida_ips' == $filtro)) || (is_array($filtro) && in_array('hora_salida_ips', $filtro)))
        $this->ValidateField_hora_salida_ips($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_movil' == $filtro)) || (is_array($filtro) && in_array('id_movil', $filtro)))
        $this->ValidateField_id_movil($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_ips' == $filtro)) || (is_array($filtro) && in_array('id_ips', $filtro)))
        $this->ValidateField_id_ips($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_caso' == $filtro)) || (is_array($filtro) && in_array('tipo_caso', $filtro)))
        $this->ValidateField_tipo_caso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_medico' == $filtro)) || (is_array($filtro) && in_array('id_medico', $filtro)))
        $this->ValidateField_id_medico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_ciudad' == $filtro)) || (is_array($filtro) && in_array('id_ciudad', $filtro)))
        $this->ValidateField_id_ciudad($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'on';
  date_default_timezone_set("America/Bogota");
$this->fecha =date("Y-m-d");
$ano= date('Y');
$mes = date('m');
$dia = date('d');


 
      $nm_select = "SELECT Id_Procedimiento,secad FROM procedimiento1 ORDER BY Id_Procedimiento DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

if(count($this->dataset )>0)	
	{
		$ULTIMO=$this->dataset[0][0];
		$this->radicado =$ano.$mes.$dia.$ULTIMO.rand(1000,9999);

	}
else	
	{
		$this->radicado =$ano.$mes.$dia.rand(1000,9999);
	}
$this->sc_set_focus("secad");
$_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'off'; 
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
   }

    function ValidateField_consecutivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['consecutivo'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->consecutivo) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Consecutivo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['consecutivo']))
              {
                  $Campos_Erros['consecutivo'] = array();
              }
              $Campos_Erros['consecutivo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['consecutivo']) || !is_array($this->NM_ajax_info['errList']['consecutivo']))
              {
                  $this->NM_ajax_info['errList']['consecutivo'] = array();
              }
              $this->NM_ajax_info['errList']['consecutivo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'consecutivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_consecutivo

    function ValidateField_secad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['secad'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->secad) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Secad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['secad']))
              {
                  $Campos_Erros['secad'] = array();
              }
              $Campos_Erros['secad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['secad']) || !is_array($this->NM_ajax_info['errList']['secad']))
              {
                  $this->NM_ajax_info['errList']['secad'] = array();
              }
              $this->NM_ajax_info['errList']['secad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'secad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_secad

    function ValidateField_quien_reporta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['quien_reporta'])) {
       return;
   }
      if ($this->quien_reporta == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'quien_reporta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_quien_reporta

    function ValidateField_discapacidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['discapacidad'])) {
       return;
   }
      if ($this->discapacidad == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'discapacidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_discapacidad

    function ValidateField_nombre_apellido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['nombre_apellido'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_apellido) > 90) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre del paciente " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_apellido']))
              {
                  $Campos_Erros['nombre_apellido'] = array();
              }
              $Campos_Erros['nombre_apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_apellido']) || !is_array($this->NM_ajax_info['errList']['nombre_apellido']))
              {
                  $this->NM_ajax_info['errList']['nombre_apellido'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
          if (NM_utf8_strlen($this->nombre_apellido) < 3) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre del paciente " . $this->Ini->Nm_lang['lang_errm_mnch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_apellido']))
              {
                  $Campos_Erros['nombre_apellido'] = array();
              }
              $Campos_Erros['nombre_apellido'][] = $this->Ini->Nm_lang['lang_errm_mnch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_apellido']) || !is_array($this->NM_ajax_info['errList']['nombre_apellido']))
              {
                  $this->NM_ajax_info['errList']['nombre_apellido'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_apellido'][] = $this->Ini->Nm_lang['lang_errm_mnch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_apellido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_apellido

    function ValidateField_tipo_documento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['tipo_documento'])) {
       return;
   }
      if ($this->tipo_documento == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_documento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_documento

    function ValidateField_documento_identidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['documento_identidad'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->documento_identidad) > 250) 
          { 
              $hasError = true;
              $Campos_Crit .= "Documento Identidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['documento_identidad']))
              {
                  $Campos_Erros['documento_identidad'] = array();
              }
              $Campos_Erros['documento_identidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['documento_identidad']) || !is_array($this->NM_ajax_info['errList']['documento_identidad']))
              {
                  $this->NM_ajax_info['errList']['documento_identidad'] = array();
              }
              $this->NM_ajax_info['errList']['documento_identidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'documento_identidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_documento_identidad

    function ValidateField_edad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['edad'])) {
          nm_limpa_numero($this->edad, $this->field_config['edad']['symbol_grp']) ; 
          return;
      }
      if ($this->edad === "" || is_null($this->edad))  
      { 
          $this->edad = 0;
          $this->sc_force_zero[] = 'edad';
      } 
      nm_limpa_numero($this->edad, $this->field_config['edad']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->edad != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->edad) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Edad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['edad']))
                  {
                      $Campos_Erros['edad'] = array();
                  }
                  $Campos_Erros['edad'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['edad']) || !is_array($this->NM_ajax_info['errList']['edad']))
                  {
                      $this->NM_ajax_info['errList']['edad'] = array();
                  }
                  $this->NM_ajax_info['errList']['edad'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->edad, 11, 0, 0, 150, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Edad; " ; 
                  if (!isset($Campos_Erros['edad']))
                  {
                      $Campos_Erros['edad'] = array();
                  }
                  $Campos_Erros['edad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['edad']) || !is_array($this->NM_ajax_info['errList']['edad']))
                  {
                      $this->NM_ajax_info['errList']['edad'] = array();
                  }
                  $this->NM_ajax_info['errList']['edad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'edad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_edad

    function ValidateField_numero_contacto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['numero_contacto'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_contacto) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numero Contacto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_contacto']))
              {
                  $Campos_Erros['numero_contacto'] = array();
              }
              $Campos_Erros['numero_contacto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_contacto']) || !is_array($this->NM_ajax_info['errList']['numero_contacto']))
              {
                  $this->NM_ajax_info['errList']['numero_contacto'] = array();
              }
              $this->NM_ajax_info['errList']['numero_contacto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero_contacto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero_contacto

    function ValidateField_genero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['genero'])) {
       return;
   }
      if ($this->genero == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->genero != "" && !in_array("genero", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero']) && !in_array($this->genero, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['genero']))
              {
                  $Campos_Erros['genero'] = array();
              }
              $Campos_Erros['genero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['genero']) || !is_array($this->NM_ajax_info['errList']['genero']))
              {
                  $this->NM_ajax_info['errList']['genero'] = array();
              }
              $this->NM_ajax_info['errList']['genero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'genero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_genero

    function ValidateField_id_tipo_evento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_tipo_evento'])) {
       return;
   }
               if (!empty($this->id_tipo_evento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']) && !in_array($this->id_tipo_evento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_tipo_evento']))
                   {
                       $Campos_Erros['id_tipo_evento'] = array();
                   }
                   $Campos_Erros['id_tipo_evento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_tipo_evento']) || !is_array($this->NM_ajax_info['errList']['id_tipo_evento']))
                   {
                       $this->NM_ajax_info['errList']['id_tipo_evento'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_tipo_evento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_tipo_evento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_tipo_evento

    function ValidateField_circunstancias_emergencia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['circunstancias_emergencia'])) {
          return;
      }
      $this->circunstancias_emergencia = sc_strtoupper($this->circunstancias_emergencia); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->circunstancias_emergencia) > 2500) 
          { 
              $hasError = true;
              $Campos_Crit .= "Situación que se presenta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2500 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['circunstancias_emergencia']))
              {
                  $Campos_Erros['circunstancias_emergencia'] = array();
              }
              $Campos_Erros['circunstancias_emergencia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['circunstancias_emergencia']) || !is_array($this->NM_ajax_info['errList']['circunstancias_emergencia']))
              {
                  $this->NM_ajax_info['errList']['circunstancias_emergencia'] = array();
              }
              $this->NM_ajax_info['errList']['circunstancias_emergencia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
          if (NM_utf8_strlen($this->circunstancias_emergencia) < 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Situación que se presenta " . $this->Ini->Nm_lang['lang_errm_mnch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['circunstancias_emergencia']))
              {
                  $Campos_Erros['circunstancias_emergencia'] = array();
              }
              $Campos_Erros['circunstancias_emergencia'][] = $this->Ini->Nm_lang['lang_errm_mnch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['circunstancias_emergencia']) || !is_array($this->NM_ajax_info['errList']['circunstancias_emergencia']))
              {
                  $this->NM_ajax_info['errList']['circunstancias_emergencia'] = array();
              }
              $this->NM_ajax_info['errList']['circunstancias_emergencia'][] = $this->Ini->Nm_lang['lang_errm_mnch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'circunstancias_emergencia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_circunstancias_emergencia

    function ValidateField_id_eps(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_eps'])) {
       return;
   }
               if (!empty($this->id_eps) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']) && !in_array($this->id_eps, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_eps']))
                   {
                       $Campos_Erros['id_eps'] = array();
                   }
                   $Campos_Erros['id_eps'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_eps']) || !is_array($this->NM_ajax_info['errList']['id_eps']))
                   {
                       $this->NM_ajax_info['errList']['id_eps'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_eps'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_eps';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_eps

    function ValidateField_id_seguridad_social(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_seguridad_social'])) {
       return;
   }
      if ($this->id_seguridad_social == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['php_cmp_required']['id_seguridad_social']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['php_cmp_required']['id_seguridad_social'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Regimen" ; 
          if (!isset($Campos_Erros['id_seguridad_social']))
          {
              $Campos_Erros['id_seguridad_social'] = array();
          }
          $Campos_Erros['id_seguridad_social'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_seguridad_social']) || !is_array($this->NM_ajax_info['errList']['id_seguridad_social']))
          {
              $this->NM_ajax_info['errList']['id_seguridad_social'] = array();
          }
          $this->NM_ajax_info['errList']['id_seguridad_social'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_seguridad_social) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']) && !in_array($this->id_seguridad_social, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_seguridad_social']))
              {
                  $Campos_Erros['id_seguridad_social'] = array();
              }
              $Campos_Erros['id_seguridad_social'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_seguridad_social']) || !is_array($this->NM_ajax_info['errList']['id_seguridad_social']))
              {
                  $this->NM_ajax_info['errList']['id_seguridad_social'] = array();
              }
              $this->NM_ajax_info['errList']['id_seguridad_social'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_seguridad_social';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_seguridad_social

    function ValidateField_zona(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['zona'])) {
       return;
   }
      if ($this->zona == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'zona';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_zona

    function ValidateField_tipo_servicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['tipo_servicio'])) {
       return;
   }
      if ($this->tipo_servicio == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_servicio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_servicio

    function ValidateField_id_barrio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_barrio'])) {
       return;
   }
               if (!empty($this->id_barrio) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']) && !in_array($this->id_barrio, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_barrio']))
                   {
                       $Campos_Erros['id_barrio'] = array();
                   }
                   $Campos_Erros['id_barrio'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_barrio']) || !is_array($this->NM_ajax_info['errList']['id_barrio']))
                   {
                       $this->NM_ajax_info['errList']['id_barrio'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_barrio'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_barrio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_barrio

    function ValidateField_direccion_servicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['direccion_servicio'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->direccion_servicio) > 250) 
          { 
              $hasError = true;
              $Campos_Crit .= "Direccion Servicio " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['direccion_servicio']))
              {
                  $Campos_Erros['direccion_servicio'] = array();
              }
              $Campos_Erros['direccion_servicio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['direccion_servicio']) || !is_array($this->NM_ajax_info['errList']['direccion_servicio']))
              {
                  $this->NM_ajax_info['errList']['direccion_servicio'] = array();
              }
              $this->NM_ajax_info['errList']['direccion_servicio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'direccion_servicio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_direccion_servicio

    function ValidateField_hora_ingreso_llamada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_ingreso_llamada, $this->field_config['hora_ingreso_llamada']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_ingreso_llamada'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_ingreso_llamada']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_ingreso_llamada']['time_sep']) ; 
          if (trim($this->hora_ingreso_llamada) != "")  
          { 
              if ($teste_validade->Hora($this->hora_ingreso_llamada, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Ingreso Llamada; " ; 
                  if (!isset($Campos_Erros['hora_ingreso_llamada']))
                  {
                      $Campos_Erros['hora_ingreso_llamada'] = array();
                  }
                  $Campos_Erros['hora_ingreso_llamada'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_ingreso_llamada']) || !is_array($this->NM_ajax_info['errList']['hora_ingreso_llamada']))
                  {
                      $this->NM_ajax_info['errList']['hora_ingreso_llamada'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_ingreso_llamada'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_ingreso_llamada';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_ingreso_llamada

    function ValidateField_hora_notifica_movil(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_notifica_movil, $this->field_config['hora_notifica_movil']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_notifica_movil'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_notifica_movil']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_notifica_movil']['time_sep']) ; 
          if (trim($this->hora_notifica_movil) != "")  
          { 
              if ($teste_validade->Hora($this->hora_notifica_movil, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Notifica Movil; " ; 
                  if (!isset($Campos_Erros['hora_notifica_movil']))
                  {
                      $Campos_Erros['hora_notifica_movil'] = array();
                  }
                  $Campos_Erros['hora_notifica_movil'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_notifica_movil']) || !is_array($this->NM_ajax_info['errList']['hora_notifica_movil']))
                  {
                      $this->NM_ajax_info['errList']['hora_notifica_movil'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_notifica_movil'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_notifica_movil';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_notifica_movil

    function ValidateField_hora_llegada_sitio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_llegada_sitio, $this->field_config['hora_llegada_sitio']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_llegada_sitio'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_llegada_sitio']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_llegada_sitio']['time_sep']) ; 
          if (trim($this->hora_llegada_sitio) != "")  
          { 
              if ($teste_validade->Hora($this->hora_llegada_sitio, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Llegada Sitio; " ; 
                  if (!isset($Campos_Erros['hora_llegada_sitio']))
                  {
                      $Campos_Erros['hora_llegada_sitio'] = array();
                  }
                  $Campos_Erros['hora_llegada_sitio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_llegada_sitio']) || !is_array($this->NM_ajax_info['errList']['hora_llegada_sitio']))
                  {
                      $this->NM_ajax_info['errList']['hora_llegada_sitio'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_llegada_sitio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_llegada_sitio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_llegada_sitio

    function ValidateField_hora_llegada_ips(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_llegada_ips, $this->field_config['hora_llegada_ips']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_llegada_ips'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_llegada_ips']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_llegada_ips']['time_sep']) ; 
          if (trim($this->hora_llegada_ips) != "")  
          { 
              if ($teste_validade->Hora($this->hora_llegada_ips, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Llegada Ips; " ; 
                  if (!isset($Campos_Erros['hora_llegada_ips']))
                  {
                      $Campos_Erros['hora_llegada_ips'] = array();
                  }
                  $Campos_Erros['hora_llegada_ips'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_llegada_ips']) || !is_array($this->NM_ajax_info['errList']['hora_llegada_ips']))
                  {
                      $this->NM_ajax_info['errList']['hora_llegada_ips'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_llegada_ips'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_llegada_ips';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_llegada_ips

    function ValidateField_hora_salida_ips(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_salida_ips, $this->field_config['hora_salida_ips']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_salida_ips'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_salida_ips']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_salida_ips']['time_sep']) ; 
          if (trim($this->hora_salida_ips) != "")  
          { 
              if ($teste_validade->Hora($this->hora_salida_ips, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Salida Ips; " ; 
                  if (!isset($Campos_Erros['hora_salida_ips']))
                  {
                      $Campos_Erros['hora_salida_ips'] = array();
                  }
                  $Campos_Erros['hora_salida_ips'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_salida_ips']) || !is_array($this->NM_ajax_info['errList']['hora_salida_ips']))
                  {
                      $this->NM_ajax_info['errList']['hora_salida_ips'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_salida_ips'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_salida_ips';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_salida_ips

    function ValidateField_id_movil(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_movil'])) {
       return;
   }
      if ($this->id_movil == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['php_cmp_required']['id_movil']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['php_cmp_required']['id_movil'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Vehículo que atendio" ; 
          if (!isset($Campos_Erros['id_movil']))
          {
              $Campos_Erros['id_movil'] = array();
          }
          $Campos_Erros['id_movil'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_movil']) || !is_array($this->NM_ajax_info['errList']['id_movil']))
          {
              $this->NM_ajax_info['errList']['id_movil'] = array();
          }
          $this->NM_ajax_info['errList']['id_movil'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_movil) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']) && !in_array($this->id_movil, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_movil']))
              {
                  $Campos_Erros['id_movil'] = array();
              }
              $Campos_Erros['id_movil'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_movil']) || !is_array($this->NM_ajax_info['errList']['id_movil']))
              {
                  $this->NM_ajax_info['errList']['id_movil'] = array();
              }
              $this->NM_ajax_info['errList']['id_movil'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_movil';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_movil

    function ValidateField_id_ips(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_ips'])) {
       return;
   }
               if (!empty($this->id_ips) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']) && !in_array($this->id_ips, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_ips']))
                   {
                       $Campos_Erros['id_ips'] = array();
                   }
                   $Campos_Erros['id_ips'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_ips']) || !is_array($this->NM_ajax_info['errList']['id_ips']))
                   {
                       $this->NM_ajax_info['errList']['id_ips'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_ips'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_ips';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_ips

    function ValidateField_tipo_caso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['tipo_caso'])) {
       return;
   }
      if ($this->tipo_caso == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_caso';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_caso

    function ValidateField_id_medico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_medico'])) {
       return;
   }
      if ($this->id_medico == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['php_cmp_required']['id_medico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['php_cmp_required']['id_medico'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Medico Regulador" ; 
          if (!isset($Campos_Erros['id_medico']))
          {
              $Campos_Erros['id_medico'] = array();
          }
          $Campos_Erros['id_medico'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_medico']) || !is_array($this->NM_ajax_info['errList']['id_medico']))
          {
              $this->NM_ajax_info['errList']['id_medico'] = array();
          }
          $this->NM_ajax_info['errList']['id_medico'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_medico) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']) && !in_array($this->id_medico, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_medico']))
              {
                  $Campos_Erros['id_medico'] = array();
              }
              $Campos_Erros['id_medico'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_medico']) || !is_array($this->NM_ajax_info['errList']['id_medico']))
              {
                  $this->NM_ajax_info['errList']['id_medico'] = array();
              }
              $this->NM_ajax_info['errList']['id_medico'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_medico';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_medico

    function ValidateField_id_ciudad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_ciudad'])) {
       return;
   }
               if (!empty($this->id_ciudad) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']) && !in_array($this->id_ciudad, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_ciudad']))
                   {
                       $Campos_Erros['id_ciudad'] = array();
                   }
                   $Campos_Erros['id_ciudad'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_ciudad']) || !is_array($this->NM_ajax_info['errList']['id_ciudad']))
                   {
                       $this->NM_ajax_info['errList']['id_ciudad'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_ciudad'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_ciudad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_ciudad

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
    $this->nmgp_dados_form['consecutivo'] = $this->consecutivo;
    $this->nmgp_dados_form['secad'] = $this->secad;
    $this->nmgp_dados_form['quien_reporta'] = $this->quien_reporta;
    $this->nmgp_dados_form['discapacidad'] = $this->discapacidad;
    $this->nmgp_dados_form['nombre_apellido'] = $this->nombre_apellido;
    $this->nmgp_dados_form['tipo_documento'] = $this->tipo_documento;
    $this->nmgp_dados_form['documento_identidad'] = $this->documento_identidad;
    $this->nmgp_dados_form['edad'] = $this->edad;
    $this->nmgp_dados_form['numero_contacto'] = $this->numero_contacto;
    $this->nmgp_dados_form['genero'] = $this->genero;
    $this->nmgp_dados_form['id_tipo_evento'] = $this->id_tipo_evento;
    $this->nmgp_dados_form['circunstancias_emergencia'] = $this->circunstancias_emergencia;
    $this->nmgp_dados_form['id_eps'] = $this->id_eps;
    $this->nmgp_dados_form['id_seguridad_social'] = $this->id_seguridad_social;
    $this->nmgp_dados_form['zona'] = $this->zona;
    $this->nmgp_dados_form['tipo_servicio'] = $this->tipo_servicio;
    $this->nmgp_dados_form['id_barrio'] = $this->id_barrio;
    $this->nmgp_dados_form['direccion_servicio'] = $this->direccion_servicio;
    $this->nmgp_dados_form['hora_ingreso_llamada'] = (strlen(trim($this->hora_ingreso_llamada)) > 19) ? str_replace(".", ":", $this->hora_ingreso_llamada) : trim($this->hora_ingreso_llamada);
    $this->nmgp_dados_form['hora_notifica_movil'] = (strlen(trim($this->hora_notifica_movil)) > 19) ? str_replace(".", ":", $this->hora_notifica_movil) : trim($this->hora_notifica_movil);
    $this->nmgp_dados_form['hora_llegada_sitio'] = (strlen(trim($this->hora_llegada_sitio)) > 19) ? str_replace(".", ":", $this->hora_llegada_sitio) : trim($this->hora_llegada_sitio);
    $this->nmgp_dados_form['hora_llegada_ips'] = (strlen(trim($this->hora_llegada_ips)) > 19) ? str_replace(".", ":", $this->hora_llegada_ips) : trim($this->hora_llegada_ips);
    $this->nmgp_dados_form['hora_salida_ips'] = (strlen(trim($this->hora_salida_ips)) > 19) ? str_replace(".", ":", $this->hora_salida_ips) : trim($this->hora_salida_ips);
    $this->nmgp_dados_form['id_movil'] = $this->id_movil;
    $this->nmgp_dados_form['id_ips'] = $this->id_ips;
    $this->nmgp_dados_form['tipo_caso'] = $this->tipo_caso;
    $this->nmgp_dados_form['id_medico'] = $this->id_medico;
    $this->nmgp_dados_form['id_ciudad'] = $this->id_ciudad;
    $this->nmgp_dados_form['id_procedimiento'] = $this->id_procedimiento;
    $this->nmgp_dados_form['radicado'] = $this->radicado;
    $this->nmgp_dados_form['fecha'] = $this->fecha;
    $this->nmgp_dados_form['ip'] = $this->ip;
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['operador'] = $this->operador;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['edad'] = $this->edad;
      nm_limpa_numero($this->edad, $this->field_config['edad']['symbol_grp']) ; 
      $this->Before_unformat['hora_ingreso_llamada'] = $this->hora_ingreso_llamada;
      nm_limpa_hora($this->hora_ingreso_llamada, $this->field_config['hora_ingreso_llamada']['time_sep']) ; 
      $this->Before_unformat['hora_notifica_movil'] = $this->hora_notifica_movil;
      nm_limpa_hora($this->hora_notifica_movil, $this->field_config['hora_notifica_movil']['time_sep']) ; 
      $this->Before_unformat['hora_llegada_sitio'] = $this->hora_llegada_sitio;
      nm_limpa_hora($this->hora_llegada_sitio, $this->field_config['hora_llegada_sitio']['time_sep']) ; 
      $this->Before_unformat['hora_llegada_ips'] = $this->hora_llegada_ips;
      nm_limpa_hora($this->hora_llegada_ips, $this->field_config['hora_llegada_ips']['time_sep']) ; 
      $this->Before_unformat['hora_salida_ips'] = $this->hora_salida_ips;
      nm_limpa_hora($this->hora_salida_ips, $this->field_config['hora_salida_ips']['time_sep']) ; 
      $this->Before_unformat['id_procedimiento'] = $this->id_procedimiento;
      nm_limpa_numero($this->id_procedimiento, $this->field_config['id_procedimiento']['symbol_grp']) ; 
      $this->Before_unformat['fecha'] = $this->fecha;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
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
      if ($Nome_Campo == "edad")
      {
          nm_limpa_numero($this->edad, $this->field_config['edad']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_procedimiento")
      {
          nm_limpa_numero($this->id_procedimiento, $this->field_config['id_procedimiento']['symbol_grp']) ; 
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
      if ('' !== $this->edad || (!empty($format_fields) && isset($format_fields['edad'])))
      {
          nmgp_Form_Num_Val($this->edad, $this->field_config['edad']['symbol_grp'], $this->field_config['edad']['symbol_dec'], "0", "S", $this->field_config['edad']['format_neg'], "", "", "-", $this->field_config['edad']['symbol_fmt']) ; 
      }
      if ((!empty($this->hora_ingreso_llamada) && 'null' != $this->hora_ingreso_llamada) || (!empty($format_fields) && isset($format_fields['hora_ingreso_llamada'])))
      {
          nm_volta_hora($this->hora_ingreso_llamada, $this->field_config['hora_ingreso_llamada']['date_format']) ; 
          nmgp_Form_Hora($this->hora_ingreso_llamada, $this->field_config['hora_ingreso_llamada']['date_format'], $this->field_config['hora_ingreso_llamada']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_ingreso_llamada || '' == $this->hora_ingreso_llamada)
      {
          $this->hora_ingreso_llamada = '';
      }
      if ((!empty($this->hora_notifica_movil) && 'null' != $this->hora_notifica_movil) || (!empty($format_fields) && isset($format_fields['hora_notifica_movil'])))
      {
          nm_volta_hora($this->hora_notifica_movil, $this->field_config['hora_notifica_movil']['date_format']) ; 
          nmgp_Form_Hora($this->hora_notifica_movil, $this->field_config['hora_notifica_movil']['date_format'], $this->field_config['hora_notifica_movil']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_notifica_movil || '' == $this->hora_notifica_movil)
      {
          $this->hora_notifica_movil = '';
      }
      if ((!empty($this->hora_llegada_sitio) && 'null' != $this->hora_llegada_sitio) || (!empty($format_fields) && isset($format_fields['hora_llegada_sitio'])))
      {
          nm_volta_hora($this->hora_llegada_sitio, $this->field_config['hora_llegada_sitio']['date_format']) ; 
          nmgp_Form_Hora($this->hora_llegada_sitio, $this->field_config['hora_llegada_sitio']['date_format'], $this->field_config['hora_llegada_sitio']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_llegada_sitio || '' == $this->hora_llegada_sitio)
      {
          $this->hora_llegada_sitio = '';
      }
      if ((!empty($this->hora_llegada_ips) && 'null' != $this->hora_llegada_ips) || (!empty($format_fields) && isset($format_fields['hora_llegada_ips'])))
      {
          nm_volta_hora($this->hora_llegada_ips, $this->field_config['hora_llegada_ips']['date_format']) ; 
          nmgp_Form_Hora($this->hora_llegada_ips, $this->field_config['hora_llegada_ips']['date_format'], $this->field_config['hora_llegada_ips']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_llegada_ips || '' == $this->hora_llegada_ips)
      {
          $this->hora_llegada_ips = '';
      }
      if ((!empty($this->hora_salida_ips) && 'null' != $this->hora_salida_ips) || (!empty($format_fields) && isset($format_fields['hora_salida_ips'])))
      {
          nm_volta_hora($this->hora_salida_ips, $this->field_config['hora_salida_ips']['date_format']) ; 
          nmgp_Form_Hora($this->hora_salida_ips, $this->field_config['hora_salida_ips']['date_format'], $this->field_config['hora_salida_ips']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_salida_ips || '' == $this->hora_salida_ips)
      {
          $this->hora_salida_ips = '';
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
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['hora_ingreso_llamada']['date_format'];
      if ($this->hora_ingreso_llamada != "")  
      { 
          $this->hora_ingreso_llamada_hora = $this->hora_ingreso_llamada;
          $this->hora_ingreso_llamada = "1900-01-01";
          nm_conv_hora($this->hora_ingreso_llamada_hora, $this->field_config['hora_ingreso_llamada']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_ingreso_llamada_hora = substr($this->hora_ingreso_llamada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_ingreso_llamada_hora = substr($this->hora_ingreso_llamada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_ingreso_llamada_hora = substr($this->hora_ingreso_llamada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_ingreso_llamada_hora = substr($this->hora_ingreso_llamada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_ingreso_llamada_hora = substr($this->hora_ingreso_llamada_hora, 0, -4);
          }
          $this->hora_ingreso_llamada = $this->hora_ingreso_llamada_hora;
      } 
      if ($this->hora_ingreso_llamada == "" && $use_null)  
      { 
          $this->hora_ingreso_llamada = "null" ; 
      } 
      $this->field_config['hora_ingreso_llamada']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_notifica_movil']['date_format'];
      if ($this->hora_notifica_movil != "")  
      { 
          $this->hora_notifica_movil_hora = $this->hora_notifica_movil;
          $this->hora_notifica_movil = "1900-01-01";
          nm_conv_hora($this->hora_notifica_movil_hora, $this->field_config['hora_notifica_movil']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_notifica_movil_hora = substr($this->hora_notifica_movil_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_notifica_movil_hora = substr($this->hora_notifica_movil_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_notifica_movil_hora = substr($this->hora_notifica_movil_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_notifica_movil_hora = substr($this->hora_notifica_movil_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_notifica_movil_hora = substr($this->hora_notifica_movil_hora, 0, -4);
          }
          $this->hora_notifica_movil = $this->hora_notifica_movil_hora;
      } 
      if ($this->hora_notifica_movil == "" && $use_null)  
      { 
          $this->hora_notifica_movil = "null" ; 
      } 
      $this->field_config['hora_notifica_movil']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_llegada_sitio']['date_format'];
      if ($this->hora_llegada_sitio != "")  
      { 
          $this->hora_llegada_sitio_hora = $this->hora_llegada_sitio;
          $this->hora_llegada_sitio = "1900-01-01";
          nm_conv_hora($this->hora_llegada_sitio_hora, $this->field_config['hora_llegada_sitio']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_llegada_sitio_hora = substr($this->hora_llegada_sitio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_llegada_sitio_hora = substr($this->hora_llegada_sitio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_llegada_sitio_hora = substr($this->hora_llegada_sitio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_llegada_sitio_hora = substr($this->hora_llegada_sitio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_llegada_sitio_hora = substr($this->hora_llegada_sitio_hora, 0, -4);
          }
          $this->hora_llegada_sitio = $this->hora_llegada_sitio_hora;
      } 
      if ($this->hora_llegada_sitio == "" && $use_null)  
      { 
          $this->hora_llegada_sitio = "null" ; 
      } 
      $this->field_config['hora_llegada_sitio']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_llegada_ips']['date_format'];
      if ($this->hora_llegada_ips != "")  
      { 
          $this->hora_llegada_ips_hora = $this->hora_llegada_ips;
          $this->hora_llegada_ips = "1900-01-01";
          nm_conv_hora($this->hora_llegada_ips_hora, $this->field_config['hora_llegada_ips']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_llegada_ips_hora = substr($this->hora_llegada_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_llegada_ips_hora = substr($this->hora_llegada_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_llegada_ips_hora = substr($this->hora_llegada_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_llegada_ips_hora = substr($this->hora_llegada_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_llegada_ips_hora = substr($this->hora_llegada_ips_hora, 0, -4);
          }
          $this->hora_llegada_ips = $this->hora_llegada_ips_hora;
      } 
      if ($this->hora_llegada_ips == "" && $use_null)  
      { 
          $this->hora_llegada_ips = "null" ; 
      } 
      $this->field_config['hora_llegada_ips']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_salida_ips']['date_format'];
      if ($this->hora_salida_ips != "")  
      { 
          $this->hora_salida_ips_hora = $this->hora_salida_ips;
          $this->hora_salida_ips = "1900-01-01";
          nm_conv_hora($this->hora_salida_ips_hora, $this->field_config['hora_salida_ips']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_salida_ips_hora = substr($this->hora_salida_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_salida_ips_hora = substr($this->hora_salida_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_salida_ips_hora = substr($this->hora_salida_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_salida_ips_hora = substr($this->hora_salida_ips_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_salida_ips_hora = substr($this->hora_salida_ips_hora, 0, -4);
          }
          $this->hora_salida_ips = $this->hora_salida_ips_hora;
      } 
      if ($this->hora_salida_ips == "" && $use_null)  
      { 
          $this->hora_salida_ips = "null" ; 
      } 
      $this->field_config['hora_salida_ips']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
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

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_consecutivo();
          $this->ajax_return_values_secad();
          $this->ajax_return_values_quien_reporta();
          $this->ajax_return_values_discapacidad();
          $this->ajax_return_values_nombre_apellido();
          $this->ajax_return_values_tipo_documento();
          $this->ajax_return_values_documento_identidad();
          $this->ajax_return_values_edad();
          $this->ajax_return_values_numero_contacto();
          $this->ajax_return_values_genero();
          $this->ajax_return_values_id_tipo_evento();
          $this->ajax_return_values_circunstancias_emergencia();
          $this->ajax_return_values_id_eps();
          $this->ajax_return_values_id_seguridad_social();
          $this->ajax_return_values_zona();
          $this->ajax_return_values_tipo_servicio();
          $this->ajax_return_values_id_barrio();
          $this->ajax_return_values_direccion_servicio();
          $this->ajax_return_values_hora_ingreso_llamada();
          $this->ajax_return_values_hora_notifica_movil();
          $this->ajax_return_values_hora_llegada_sitio();
          $this->ajax_return_values_hora_llegada_ips();
          $this->ajax_return_values_hora_salida_ips();
          $this->ajax_return_values_id_movil();
          $this->ajax_return_values_id_ips();
          $this->ajax_return_values_tipo_caso();
          $this->ajax_return_values_id_medico();
          $this->ajax_return_values_id_ciudad();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_procedimiento']['keyVal'] = form_procedimiento1_pack_protect_string($this->nmgp_dados_form['id_procedimiento']);
          }
   } // ajax_return_values

          //----- consecutivo
   function ajax_return_values_consecutivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("consecutivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->consecutivo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['consecutivo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- secad
   function ajax_return_values_secad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("secad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->secad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['secad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- quien_reporta
   function ajax_return_values_quien_reporta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("quien_reporta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->quien_reporta);
              $aLookup = array();
              $this->_tmp_lookup_quien_reporta = $this->quien_reporta;

$aLookup[] = array(form_procedimiento1_pack_protect_string('PONAL ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("PONAL ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('BOMBEROS ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("BOMBEROS ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('DEFENSA CIVIL') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("DEFENSA CIVIL")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('CRUZ ROJA ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("CRUZ ROJA ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('LINEA DE SALUD MENTAL') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("LINEA DE SALUD MENTAL")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('USUARIO') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("USUARIO")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('EMERCAPS') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("EMERCAPS")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'PONAL ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'BOMBEROS ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'DEFENSA CIVIL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'CRUZ ROJA ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'LINEA DE SALUD MENTAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'USUARIO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_quien_reporta'][] = 'EMERCAPS';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"quien_reporta\"";
          if (isset($this->NM_ajax_info['select_html']['quien_reporta']) && !empty($this->NM_ajax_info['select_html']['quien_reporta']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['quien_reporta']);
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

                  if ($this->quien_reporta == $sValue)
                  {
                      $this->_tmp_lookup_quien_reporta = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['quien_reporta'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['quien_reporta']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['quien_reporta']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['quien_reporta']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['quien_reporta']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['quien_reporta']['labList'] = $aLabel;
          }
   }

          //----- discapacidad
   function ajax_return_values_discapacidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discapacidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->discapacidad);
              $aLookup = array();
              $this->_tmp_lookup_discapacidad = $this->discapacidad;

$aLookup[] = array(form_procedimiento1_pack_protect_string('VISUAL') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("VISUAL")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('AUDITIVA') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("AUDITIVA")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('FISICA') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("FISICA")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('SORDOCEGUERA') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("SORDOCEGUERA")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('MULTIPLE') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("MULTIPLE")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('INTELECTUAL ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("INTELECTUAL ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('PSICOSOCIAL') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("PSICOSOCIAL")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'VISUAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'AUDITIVA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'FISICA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'SORDOCEGUERA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'MULTIPLE';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'INTELECTUAL ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_discapacidad'][] = 'PSICOSOCIAL';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"discapacidad\"";
          if (isset($this->NM_ajax_info['select_html']['discapacidad']) && !empty($this->NM_ajax_info['select_html']['discapacidad']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['discapacidad']);
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

                  if ($this->discapacidad == $sValue)
                  {
                      $this->_tmp_lookup_discapacidad = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['discapacidad'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['discapacidad']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['discapacidad']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['discapacidad']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['discapacidad']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['discapacidad']['labList'] = $aLabel;
          }
   }

          //----- nombre_apellido
   function ajax_return_values_nombre_apellido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_apellido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_apellido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_apellido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_documento
   function ajax_return_values_tipo_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_documento);
              $aLookup = array();
              $this->_tmp_lookup_tipo_documento = $this->tipo_documento;

$aLookup[] = array(form_procedimiento1_pack_protect_string('Cedula de ciudadanía') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Cedula de ciudadanía")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Tarjeta de identidad') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Tarjeta de identidad")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Tarjeta de extranjería') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Tarjeta de extranjería")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Cedula de ciudadanía de primera vez ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Cedula de ciudadanía de primera vez ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Duplicado de cédula de ciudadanía ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Duplicado de cédula de ciudadanía ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Renovación de cédula de ciudadanía ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Renovación de cédula de ciudadanía ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Tarjeta de identidad de primera vez') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Tarjeta de identidad de primera vez")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Duplicado de tarjeta de identidad') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Duplicado de tarjeta de identidad")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Renovación de tarjeta de identidad ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Renovación de tarjeta de identidad ")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Registro civil ') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Registro civil ")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Cedula de ciudadanía';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Tarjeta de identidad';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Tarjeta de extranjería';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Cedula de ciudadanía de primera vez ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Duplicado de cédula de ciudadanía ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Renovación de cédula de ciudadanía ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Tarjeta de identidad de primera vez';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Duplicado de tarjeta de identidad';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Renovación de tarjeta de identidad ';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_documento'][] = 'Registro civil ';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_documento\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_documento']) && !empty($this->NM_ajax_info['select_html']['tipo_documento']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_documento']);
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

                  if ($this->tipo_documento == $sValue)
                  {
                      $this->_tmp_lookup_tipo_documento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_documento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_documento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_documento']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_documento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_documento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_documento']['labList'] = $aLabel;
          }
   }

          //----- documento_identidad
   function ajax_return_values_documento_identidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("documento_identidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->documento_identidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['documento_identidad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- edad
   function ajax_return_values_edad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("edad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->edad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['edad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numero_contacto
   function ajax_return_values_numero_contacto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_contacto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_contacto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_contacto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- genero
   function ajax_return_values_genero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("genero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->genero);
              $aLookup = array();
              $this->_tmp_lookup_genero = $this->genero;

$aLookup[] = array(form_procedimiento1_pack_protect_string('Masculino') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Masculino")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Transexual') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Transexual")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Femenino') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Femenino")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('No binario') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("No binario")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Otro') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Otro")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero'][] = 'Masculino';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero'][] = 'Transexual';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero'][] = 'Femenino';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero'][] = 'No binario';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_genero'][] = 'Otro';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['genero']) && !empty($this->NM_ajax_info['select_html']['genero']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['genero']);
          }
          $this->NM_ajax_info['fldList']['genero'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => true,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['genero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['genero']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['genero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['genero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['genero']['labList'] = $aLabel;
          }
   }

          //----- id_tipo_evento
   function ajax_return_values_id_tipo_evento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_tipo_evento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_tipo_evento);
              $aLookup = array();
              $this->_tmp_lookup_id_tipo_evento = $this->id_tipo_evento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Tipo_Evento, evento  FROM id_tipo_evento  ORDER BY evento";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_tipo_evento\"";
          if (isset($this->NM_ajax_info['select_html']['id_tipo_evento']) && !empty($this->NM_ajax_info['select_html']['id_tipo_evento']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_tipo_evento']);
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

                  if ($this->id_tipo_evento == $sValue)
                  {
                      $this->_tmp_lookup_id_tipo_evento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_tipo_evento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_tipo_evento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_tipo_evento']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_tipo_evento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_tipo_evento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_tipo_evento']['labList'] = $aLabel;
          }
   }

          //----- circunstancias_emergencia
   function ajax_return_values_circunstancias_emergencia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("circunstancias_emergencia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->circunstancias_emergencia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['circunstancias_emergencia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- id_eps
   function ajax_return_values_id_eps($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_eps", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_eps);
              $aLookup = array();
              $this->_tmp_lookup_id_eps = $this->id_eps;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Eps, eps  FROM eps  ORDER BY eps";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_eps\"";
          if (isset($this->NM_ajax_info['select_html']['id_eps']) && !empty($this->NM_ajax_info['select_html']['id_eps']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_eps']);
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

                  if ($this->id_eps == $sValue)
                  {
                      $this->_tmp_lookup_id_eps = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_eps'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_eps']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_eps']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_eps']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_eps']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_eps']['labList'] = $aLabel;
          }
   }

          //----- id_seguridad_social
   function ajax_return_values_id_seguridad_social($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_seguridad_social", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_seguridad_social);
              $aLookup = array();
              $this->_tmp_lookup_id_seguridad_social = $this->id_seguridad_social;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Seguridad_Social, seguridad_social  FROM seguridad_social  ORDER BY seguridad_social";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_seguridad_social\"";
          if (isset($this->NM_ajax_info['select_html']['id_seguridad_social']) && !empty($this->NM_ajax_info['select_html']['id_seguridad_social']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_seguridad_social']);
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

                  if ($this->id_seguridad_social == $sValue)
                  {
                      $this->_tmp_lookup_id_seguridad_social = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_seguridad_social'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_seguridad_social']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_seguridad_social']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_seguridad_social']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_seguridad_social']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_seguridad_social']['labList'] = $aLabel;
          }
   }

          //----- zona
   function ajax_return_values_zona($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zona", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zona);
              $aLookup = array();
              $this->_tmp_lookup_zona = $this->zona;

$aLookup[] = array(form_procedimiento1_pack_protect_string('SUR') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("SUR")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('NORTE') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("NORTE")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('ORIENTE') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("ORIENTE")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('OCCIDENTE') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("OCCIDENBTE")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('RURAL') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("RURAL")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('CENTRO') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("CENTRO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_zona'][] = 'SUR';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_zona'][] = 'NORTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_zona'][] = 'ORIENTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_zona'][] = 'OCCIDENTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_zona'][] = 'RURAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_zona'][] = 'CENTRO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"zona\"";
          if (isset($this->NM_ajax_info['select_html']['zona']) && !empty($this->NM_ajax_info['select_html']['zona']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['zona']);
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

                  if ($this->zona == $sValue)
                  {
                      $this->_tmp_lookup_zona = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['zona'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['zona']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['zona']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['zona']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['zona']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['zona']['labList'] = $aLabel;
          }
   }

          //----- tipo_servicio
   function ajax_return_values_tipo_servicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_servicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_servicio);
              $aLookup = array();
              $this->_tmp_lookup_tipo_servicio = $this->tipo_servicio;

$aLookup[] = array(form_procedimiento1_pack_protect_string('Ambulancia') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Ambulancia")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Referencia y contrareferencia') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Referencia y contrareferencia")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('TAB') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("TAB")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('Otros') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("Otros")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_servicio'][] = 'Ambulancia';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_servicio'][] = 'Referencia y contrareferencia';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_servicio'][] = 'TAB';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_servicio'][] = 'Otros';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_servicio\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_servicio']) && !empty($this->NM_ajax_info['select_html']['tipo_servicio']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_servicio']);
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

                  if ($this->tipo_servicio == $sValue)
                  {
                      $this->_tmp_lookup_tipo_servicio = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_servicio'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_servicio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_servicio']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_servicio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_servicio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_servicio']['labList'] = $aLabel;
          }
   }

          //----- id_barrio
   function ajax_return_values_id_barrio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_barrio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_barrio);
              $aLookup = array();
              $this->_tmp_lookup_id_barrio = $this->id_barrio;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Barrio, barrio  FROM barrio  ORDER BY barrio";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_barrio\"";
          if (isset($this->NM_ajax_info['select_html']['id_barrio']) && !empty($this->NM_ajax_info['select_html']['id_barrio']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_barrio']);
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

                  if ($this->id_barrio == $sValue)
                  {
                      $this->_tmp_lookup_id_barrio = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_barrio'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_barrio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_barrio']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_barrio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_barrio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_barrio']['labList'] = $aLabel;
          }
   }

          //----- direccion_servicio
   function ajax_return_values_direccion_servicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("direccion_servicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->direccion_servicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['direccion_servicio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- hora_ingreso_llamada
   function ajax_return_values_hora_ingreso_llamada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_ingreso_llamada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_ingreso_llamada);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_ingreso_llamada'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_notifica_movil
   function ajax_return_values_hora_notifica_movil($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_notifica_movil", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_notifica_movil);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_notifica_movil'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_llegada_sitio
   function ajax_return_values_hora_llegada_sitio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_llegada_sitio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_llegada_sitio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_llegada_sitio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_llegada_ips
   function ajax_return_values_hora_llegada_ips($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_llegada_ips", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_llegada_ips);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_llegada_ips'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_salida_ips
   function ajax_return_values_hora_salida_ips($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_salida_ips", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_salida_ips);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_salida_ips'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_movil
   function ajax_return_values_id_movil($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_movil", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_movil);
              $aLookup = array();
              $this->_tmp_lookup_id_movil = $this->id_movil;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Movil, placa  FROM movil  ORDER BY placa";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_movil\"";
          if (isset($this->NM_ajax_info['select_html']['id_movil']) && !empty($this->NM_ajax_info['select_html']['id_movil']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_movil']);
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

                  if ($this->id_movil == $sValue)
                  {
                      $this->_tmp_lookup_id_movil = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_movil'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_movil']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_movil']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_movil']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_movil']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_movil']['labList'] = $aLabel;
          }
   }

          //----- id_ips
   function ajax_return_values_id_ips($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_ips", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_ips);
              $aLookup = array();
              $this->_tmp_lookup_id_ips = $this->id_ips;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Ips, nombre_ips  FROM ips  ORDER BY nombre_ips";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_ips\"";
          if (isset($this->NM_ajax_info['select_html']['id_ips']) && !empty($this->NM_ajax_info['select_html']['id_ips']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_ips']);
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

                  if ($this->id_ips == $sValue)
                  {
                      $this->_tmp_lookup_id_ips = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_ips'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_ips']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_ips']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_ips']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_ips']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_ips']['labList'] = $aLabel;
          }
   }

          //----- tipo_caso
   function ajax_return_values_tipo_caso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_caso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_caso);
              $aLookup = array();
              $this->_tmp_lookup_tipo_caso = $this->tipo_caso;

$aLookup[] = array(form_procedimiento1_pack_protect_string('EFECTIVO') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("EFECTIVO")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('NO EFECTIVO') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("NO EFECTIVO")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('FALLIDO') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("FALLIDO")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('APOYO PSICOSOCIAL') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("APOYO PSICOSOCIAL")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('APH') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("APH")));
$aLookup[] = array(form_procedimiento1_pack_protect_string('ASESORIA MEDICA TELEFONICA') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string("ASESORIA MEDICA TELEFONICA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_caso'][] = 'EFECTIVO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_caso'][] = 'NO EFECTIVO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_caso'][] = 'FALLIDO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_caso'][] = 'APOYO PSICOSOCIAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_caso'][] = 'APH';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_tipo_caso'][] = 'ASESORIA MEDICA TELEFONICA';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_caso\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_caso']) && !empty($this->NM_ajax_info['select_html']['tipo_caso']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_caso']);
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

                  if ($this->tipo_caso == $sValue)
                  {
                      $this->_tmp_lookup_tipo_caso = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_caso'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_caso']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_caso']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_caso']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_caso']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_caso']['labList'] = $aLabel;
          }
   }

          //----- id_medico
   function ajax_return_values_id_medico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_medico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_medico);
              $aLookup = array();
              $this->_tmp_lookup_id_medico = $this->id_medico;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Medico, medico  FROM medico  ORDER BY medico";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_medico\"";
          if (isset($this->NM_ajax_info['select_html']['id_medico']) && !empty($this->NM_ajax_info['select_html']['id_medico']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_medico']);
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

                  if ($this->id_medico == $sValue)
                  {
                      $this->_tmp_lookup_id_medico = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_medico'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_medico']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_medico']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_medico']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_medico']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_medico']['labList'] = $aLabel;
          }
   }

          //----- id_ciudad
   function ajax_return_values_id_ciudad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_ciudad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_ciudad);
              $aLookup = array();
              $this->_tmp_lookup_id_ciudad = $this->id_ciudad;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'] = array(); 
}
$aLookup[] = array(form_procedimiento1_pack_protect_string('') => str_replace('<', '&lt;',form_procedimiento1_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Ciudad, ciudad  FROM ciudad  ORDER BY ciudad";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_procedimiento1_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_ciudad\"";
          if (isset($this->NM_ajax_info['select_html']['id_ciudad']) && !empty($this->NM_ajax_info['select_html']['id_ciudad']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_ciudad']);
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

                  if ($this->id_ciudad == $sValue)
                  {
                      $this->_tmp_lookup_id_ciudad = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_ciudad'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_ciudad']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_ciudad']['valList'][$i] = form_procedimiento1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_ciudad']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_ciudad']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_ciudad']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload($bFormat = true)
  {
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Field_no_validate'] = array();
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }

   function restore_zeros_null()
   {
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($this->NM_val_null))
      {
          foreach ($this->NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      $this->NM_val_null = array();
   }

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $this->NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      $this->restore_zeros_null();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'on';
              /* atencion */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM atencion WHERE Id_Procedimiento = " . $this->id_procedimiento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM atencion WHERE Id_Procedimiento = " . $this->id_procedimiento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM atencion WHERE Id_Procedimiento = " . $this->id_procedimiento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM atencion WHERE Id_Procedimiento = " . $this->id_procedimiento ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM atencion WHERE Id_Procedimiento = " . $this->id_procedimiento ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_atencion = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_atencion[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_atencion = false;
          $this->dataset_atencion_erro = $this->Db->ErrorMsg();
      } 


      if($this->dataset_atencion[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_procedimiento1';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_procedimiento1';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if ((!isset($this->Ini->nm_bases_access) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      if ('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) { $this->radicado = $_SERVER['REMOTE_ADDR']; } 
      if ('incluir' == $this->nmgp_opcao) { $this->ip = $_SERVER['REMOTE_ADDR']; } 
      if ('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) { $this->ip = $_SERVER['REMOTE_ADDR']; } 
      if ('incluir' == $this->nmgp_opcao) { $this->login = "" . $_SESSION['usr_login'] . ""; } 
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && empty($this->login)){$this->login = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "login";}  
      if ('incluir' == $this->nmgp_opcao) { $this->operador = "" . $_SESSION['usr_login'] . ""; } 
      if ('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) { $this->operador = "" . $_SESSION['usr_login'] . ""; } 
      $NM_val_form['consecutivo'] = $this->consecutivo;
      $NM_val_form['secad'] = $this->secad;
      $NM_val_form['quien_reporta'] = $this->quien_reporta;
      $NM_val_form['discapacidad'] = $this->discapacidad;
      $NM_val_form['nombre_apellido'] = $this->nombre_apellido;
      $NM_val_form['tipo_documento'] = $this->tipo_documento;
      $NM_val_form['documento_identidad'] = $this->documento_identidad;
      $NM_val_form['edad'] = $this->edad;
      $NM_val_form['numero_contacto'] = $this->numero_contacto;
      $NM_val_form['genero'] = $this->genero;
      $NM_val_form['id_tipo_evento'] = $this->id_tipo_evento;
      $NM_val_form['circunstancias_emergencia'] = $this->circunstancias_emergencia;
      $NM_val_form['id_eps'] = $this->id_eps;
      $NM_val_form['id_seguridad_social'] = $this->id_seguridad_social;
      $NM_val_form['zona'] = $this->zona;
      $NM_val_form['tipo_servicio'] = $this->tipo_servicio;
      $NM_val_form['id_barrio'] = $this->id_barrio;
      $NM_val_form['direccion_servicio'] = $this->direccion_servicio;
      $NM_val_form['hora_ingreso_llamada'] = $this->hora_ingreso_llamada;
      $NM_val_form['hora_notifica_movil'] = $this->hora_notifica_movil;
      $NM_val_form['hora_llegada_sitio'] = $this->hora_llegada_sitio;
      $NM_val_form['hora_llegada_ips'] = $this->hora_llegada_ips;
      $NM_val_form['hora_salida_ips'] = $this->hora_salida_ips;
      $NM_val_form['id_movil'] = $this->id_movil;
      $NM_val_form['id_ips'] = $this->id_ips;
      $NM_val_form['tipo_caso'] = $this->tipo_caso;
      $NM_val_form['id_medico'] = $this->id_medico;
      $NM_val_form['id_ciudad'] = $this->id_ciudad;
      $NM_val_form['id_procedimiento'] = $this->id_procedimiento;
      $NM_val_form['radicado'] = $this->radicado;
      $NM_val_form['fecha'] = $this->fecha;
      $NM_val_form['ip'] = $this->ip;
      $NM_val_form['login'] = $this->login;
      $NM_val_form['operador'] = $this->operador;
      $NM_val_form['observaciones'] = $this->observaciones;
      if ($this->id_procedimiento === "" || is_null($this->id_procedimiento))  
      { 
          $this->id_procedimiento = 0;
      } 
      if ($this->id_barrio === "" || is_null($this->id_barrio))  
      { 
          $this->id_barrio = 0;
          $this->sc_force_zero[] = 'id_barrio';
      } 
      if ($this->edad === "" || is_null($this->edad))  
      { 
          $this->edad = 0;
          $this->sc_force_zero[] = 'edad';
      } 
      if ($this->id_seguridad_social === "" || is_null($this->id_seguridad_social))  
      { 
          $this->id_seguridad_social = 0;
          $this->sc_force_zero[] = 'id_seguridad_social';
      } 
      if ($this->id_eps === "" || is_null($this->id_eps))  
      { 
          $this->id_eps = 0;
          $this->sc_force_zero[] = 'id_eps';
      } 
      if ($this->id_movil === "" || is_null($this->id_movil))  
      { 
          $this->id_movil = 0;
          $this->sc_force_zero[] = 'id_movil';
      } 
      if ($this->id_ips === "" || is_null($this->id_ips))  
      { 
          $this->id_ips = 0;
          $this->sc_force_zero[] = 'id_ips';
      } 
      if ($this->id_medico === "" || is_null($this->id_medico))  
      { 
          $this->id_medico = 0;
          $this->sc_force_zero[] = 'id_medico';
      } 
      if ($this->id_tipo_evento === "" || is_null($this->id_tipo_evento))  
      { 
          $this->id_tipo_evento = 0;
          $this->sc_force_zero[] = 'id_tipo_evento';
      } 
      if ($this->id_ciudad === "" || is_null($this->id_ciudad))  
      { 
          $this->id_ciudad = 0;
          $this->sc_force_zero[] = 'id_ciudad';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, $this->Ini->nm_bases_db2, array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->secad_before_qstr = $this->secad;
          $this->secad = substr($this->Db->qstr($this->secad), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->secad = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->secad);
          }
          if ($this->secad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->secad = "null"; 
              $this->NM_val_null[] = "secad";
          } 
          $this->consecutivo_before_qstr = $this->consecutivo;
          $this->consecutivo = substr($this->Db->qstr($this->consecutivo), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->consecutivo = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->consecutivo);
          }
          if ($this->consecutivo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->consecutivo = "null"; 
              $this->NM_val_null[] = "consecutivo";
          } 
          $this->quien_reporta_before_qstr = $this->quien_reporta;
          $this->quien_reporta = substr($this->Db->qstr($this->quien_reporta), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->quien_reporta = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->quien_reporta);
          }
          if ($this->quien_reporta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->quien_reporta = "null"; 
              $this->NM_val_null[] = "quien_reporta";
          } 
          $this->direccion_servicio_before_qstr = $this->direccion_servicio;
          $this->direccion_servicio = substr($this->Db->qstr($this->direccion_servicio), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->direccion_servicio = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->direccion_servicio);
          }
          if ($this->direccion_servicio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion_servicio = "null"; 
              $this->NM_val_null[] = "direccion_servicio";
          } 
          $this->tipo_servicio_before_qstr = $this->tipo_servicio;
          $this->tipo_servicio = substr($this->Db->qstr($this->tipo_servicio), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tipo_servicio = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->tipo_servicio);
          }
          if ($this->tipo_servicio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_servicio = "null"; 
              $this->NM_val_null[] = "tipo_servicio";
          } 
          $this->numero_contacto_before_qstr = $this->numero_contacto;
          $this->numero_contacto = substr($this->Db->qstr($this->numero_contacto), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->numero_contacto = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->numero_contacto);
          }
          if ($this->numero_contacto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numero_contacto = "null"; 
              $this->NM_val_null[] = "numero_contacto";
          } 
          $this->radicado_before_qstr = $this->radicado;
          $this->radicado = substr($this->Db->qstr($this->radicado), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->radicado = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->radicado);
          }
          if ($this->radicado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->radicado = "null"; 
              $this->NM_val_null[] = "radicado";
          } 
          $this->nombre_apellido_before_qstr = $this->nombre_apellido;
          $this->nombre_apellido = substr($this->Db->qstr($this->nombre_apellido), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->nombre_apellido = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->nombre_apellido);
          }
          if ($this->nombre_apellido == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_apellido = "null"; 
              $this->NM_val_null[] = "nombre_apellido";
          } 
          $this->tipo_documento_before_qstr = $this->tipo_documento;
          $this->tipo_documento = substr($this->Db->qstr($this->tipo_documento), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tipo_documento = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->tipo_documento);
          }
          if ($this->tipo_documento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_documento = "null"; 
              $this->NM_val_null[] = "tipo_documento";
          } 
          $this->documento_identidad_before_qstr = $this->documento_identidad;
          $this->documento_identidad = substr($this->Db->qstr($this->documento_identidad), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->documento_identidad = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->documento_identidad);
          }
          if ($this->documento_identidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->documento_identidad = "null"; 
              $this->NM_val_null[] = "documento_identidad";
          } 
          $this->genero_before_qstr = $this->genero;
          $this->genero = substr($this->Db->qstr($this->genero), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->genero = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->genero);
          }
          if ($this->genero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->genero = "null"; 
              $this->NM_val_null[] = "genero";
          } 
          $this->circunstancias_emergencia_before_qstr = $this->circunstancias_emergencia;
          $this->circunstancias_emergencia = substr($this->Db->qstr($this->circunstancias_emergencia), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->circunstancias_emergencia = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->circunstancias_emergencia);
          }
          if ($this->circunstancias_emergencia == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->circunstancias_emergencia = "null"; 
              $this->NM_val_null[] = "circunstancias_emergencia";
          } 
          if ($this->fecha == "")  
          { 
              $this->fecha = "null"; 
              $this->NM_val_null[] = "fecha";
          } 
          $this->ip_before_qstr = $this->ip;
          $this->ip = substr($this->Db->qstr($this->ip), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->ip = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->ip);
          }
          if ($this->ip == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ip = "null"; 
              $this->NM_val_null[] = "ip";
          } 
          $this->login_before_qstr = $this->login;
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->login = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->login);
          }
          if ($this->login == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->login = "null"; 
              $this->NM_val_null[] = "login";
          } 
          if ($this->hora_ingreso_llamada == "")  
          { 
              $this->hora_ingreso_llamada = "null"; 
              $this->NM_val_null[] = "hora_ingreso_llamada";
          } 
          if ($this->hora_notifica_movil == "")  
          { 
              $this->hora_notifica_movil = "null"; 
              $this->NM_val_null[] = "hora_notifica_movil";
          } 
          if ($this->hora_llegada_sitio == "")  
          { 
              $this->hora_llegada_sitio = "null"; 
              $this->NM_val_null[] = "hora_llegada_sitio";
          } 
          if ($this->hora_llegada_ips == "")  
          { 
              $this->hora_llegada_ips = "null"; 
              $this->NM_val_null[] = "hora_llegada_ips";
          } 
          if ($this->hora_salida_ips == "")  
          { 
              $this->hora_salida_ips = "null"; 
              $this->NM_val_null[] = "hora_salida_ips";
          } 
          $this->tipo_caso_before_qstr = $this->tipo_caso;
          $this->tipo_caso = substr($this->Db->qstr($this->tipo_caso), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tipo_caso = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->tipo_caso);
          }
          if ($this->tipo_caso == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_caso = "null"; 
              $this->NM_val_null[] = "tipo_caso";
          } 
          $this->operador_before_qstr = $this->operador;
          $this->operador = substr($this->Db->qstr($this->operador), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->operador = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->operador);
          }
          if ($this->operador == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->operador = "null"; 
              $this->NM_val_null[] = "operador";
          } 
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->observaciones = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->observaciones);
          }
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $this->NM_val_null[] = "observaciones";
          } 
          $this->zona_before_qstr = $this->zona;
          $this->zona = substr($this->Db->qstr($this->zona), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->zona = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->zona);
          }
          if ($this->zona == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->zona = "null"; 
              $this->NM_val_null[] = "zona";
          } 
          $this->discapacidad_before_qstr = $this->discapacidad;
          $this->discapacidad = substr($this->Db->qstr($this->discapacidad), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->discapacidad = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->discapacidad);
          }
          if ($this->discapacidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->discapacidad = "null"; 
              $this->NM_val_null[] = "discapacidad";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_procedimiento1_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = #$this->hora_ingreso_llamada#, Hora_notifica_movil = #$this->hora_notifica_movil#, hora_llegada_sitio = #$this->hora_llegada_sitio#, hora_llegada_ips = #$this->hora_llegada_ips#, hora_salida_ips = #$this->hora_salida_ips#, Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad', consecutivo = '$this->consecutivo', quien_reporta = '$this->quien_reporta', direccion_servicio = '$this->direccion_servicio', Id_Barrio = $this->id_barrio, tipo_servicio = '$this->tipo_servicio', numero_contacto = '$this->numero_contacto', nombre_apellido = '$this->nombre_apellido', tipo_documento = '$this->tipo_documento', documento_identidad = '$this->documento_identidad', edad = $this->edad, genero = '$this->genero', circunstancias_emergencia = '$this->circunstancias_emergencia', Id_Seguridad_Social = $this->id_seguridad_social, Id_Eps = $this->id_eps, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil, Id_Ips = $this->id_ips, tipo_caso = '$this->tipo_caso', Id_Medico = $this->id_medico, Id_Tipo_Evento = $this->id_tipo_evento, Zona = '$this->zona', discapacidad = '$this->discapacidad', Id_Ciudad = $this->id_ciudad"; 
              } 
              if (isset($NM_val_form['radicado']) && $NM_val_form['radicado'] != $this->nmgp_dados_select['radicado']) 
              { 
                  $SC_fields_update[] = "radicado = '$this->radicado'"; 
              } 
              if (isset($NM_val_form['fecha']) && $NM_val_form['fecha'] != $this->nmgp_dados_select['fecha']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha = #$this->fecha#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha = EXTEND('" . $this->fecha . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['ip']) && $NM_val_form['ip'] != $this->nmgp_dados_select['ip']) 
              { 
                  $SC_fields_update[] = "ip = '$this->ip'"; 
              } 
              if (isset($NM_val_form['login']) && $NM_val_form['login'] != $this->nmgp_dados_select['login']) 
              { 
                  $SC_fields_update[] = "login = '$this->login'"; 
              } 
              if (isset($NM_val_form['operador']) && $NM_val_form['operador'] != $this->nmgp_dados_select['operador']) 
              { 
                  $SC_fields_update[] = "operador = '$this->operador'"; 
              } 
              if (isset($NM_val_form['observaciones']) && $NM_val_form['observaciones'] != $this->nmgp_dados_select['observaciones']) 
              { 
                  $SC_fields_update[] = "observaciones = '$this->observaciones'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento ";  
              }  
              else  
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_procedimiento1_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->secad = $this->secad_before_qstr;
              $this->consecutivo = $this->consecutivo_before_qstr;
              $this->quien_reporta = $this->quien_reporta_before_qstr;
              $this->direccion_servicio = $this->direccion_servicio_before_qstr;
              $this->tipo_servicio = $this->tipo_servicio_before_qstr;
              $this->numero_contacto = $this->numero_contacto_before_qstr;
              $this->radicado = $this->radicado_before_qstr;
              $this->nombre_apellido = $this->nombre_apellido_before_qstr;
              $this->tipo_documento = $this->tipo_documento_before_qstr;
              $this->documento_identidad = $this->documento_identidad_before_qstr;
              $this->genero = $this->genero_before_qstr;
              $this->circunstancias_emergencia = $this->circunstancias_emergencia_before_qstr;
              $this->ip = $this->ip_before_qstr;
              $this->login = $this->login_before_qstr;
              $this->tipo_caso = $this->tipo_caso_before_qstr;
              $this->operador = $this->operador_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->zona = $this->zona_before_qstr;
              $this->discapacidad = $this->discapacidad_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['secad'])) { $this->secad = $NM_val_form['secad']; }
              elseif (isset($this->secad)) { $this->nm_limpa_alfa($this->secad); }
              if     (isset($NM_val_form) && isset($NM_val_form['consecutivo'])) { $this->consecutivo = $NM_val_form['consecutivo']; }
              elseif (isset($this->consecutivo)) { $this->nm_limpa_alfa($this->consecutivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['quien_reporta'])) { $this->quien_reporta = $NM_val_form['quien_reporta']; }
              elseif (isset($this->quien_reporta)) { $this->nm_limpa_alfa($this->quien_reporta); }
              if     (isset($NM_val_form) && isset($NM_val_form['direccion_servicio'])) { $this->direccion_servicio = $NM_val_form['direccion_servicio']; }
              elseif (isset($this->direccion_servicio)) { $this->nm_limpa_alfa($this->direccion_servicio); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_barrio'])) { $this->id_barrio = $NM_val_form['id_barrio']; }
              elseif (isset($this->id_barrio)) { $this->nm_limpa_alfa($this->id_barrio); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_servicio'])) { $this->tipo_servicio = $NM_val_form['tipo_servicio']; }
              elseif (isset($this->tipo_servicio)) { $this->nm_limpa_alfa($this->tipo_servicio); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_contacto'])) { $this->numero_contacto = $NM_val_form['numero_contacto']; }
              elseif (isset($this->numero_contacto)) { $this->nm_limpa_alfa($this->numero_contacto); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_apellido'])) { $this->nombre_apellido = $NM_val_form['nombre_apellido']; }
              elseif (isset($this->nombre_apellido)) { $this->nm_limpa_alfa($this->nombre_apellido); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_documento'])) { $this->tipo_documento = $NM_val_form['tipo_documento']; }
              elseif (isset($this->tipo_documento)) { $this->nm_limpa_alfa($this->tipo_documento); }
              if     (isset($NM_val_form) && isset($NM_val_form['documento_identidad'])) { $this->documento_identidad = $NM_val_form['documento_identidad']; }
              elseif (isset($this->documento_identidad)) { $this->nm_limpa_alfa($this->documento_identidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['edad'])) { $this->edad = $NM_val_form['edad']; }
              elseif (isset($this->edad)) { $this->nm_limpa_alfa($this->edad); }
              if     (isset($NM_val_form) && isset($NM_val_form['genero'])) { $this->genero = $NM_val_form['genero']; }
              elseif (isset($this->genero)) { $this->nm_limpa_alfa($this->genero); }
              if     (isset($NM_val_form) && isset($NM_val_form['circunstancias_emergencia'])) { $this->circunstancias_emergencia = $NM_val_form['circunstancias_emergencia']; }
              elseif (isset($this->circunstancias_emergencia)) { $this->nm_limpa_alfa($this->circunstancias_emergencia); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_seguridad_social'])) { $this->id_seguridad_social = $NM_val_form['id_seguridad_social']; }
              elseif (isset($this->id_seguridad_social)) { $this->nm_limpa_alfa($this->id_seguridad_social); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_eps'])) { $this->id_eps = $NM_val_form['id_eps']; }
              elseif (isset($this->id_eps)) { $this->nm_limpa_alfa($this->id_eps); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_movil'])) { $this->id_movil = $NM_val_form['id_movil']; }
              elseif (isset($this->id_movil)) { $this->nm_limpa_alfa($this->id_movil); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_ips'])) { $this->id_ips = $NM_val_form['id_ips']; }
              elseif (isset($this->id_ips)) { $this->nm_limpa_alfa($this->id_ips); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_caso'])) { $this->tipo_caso = $NM_val_form['tipo_caso']; }
              elseif (isset($this->tipo_caso)) { $this->nm_limpa_alfa($this->tipo_caso); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_medico'])) { $this->id_medico = $NM_val_form['id_medico']; }
              elseif (isset($this->id_medico)) { $this->nm_limpa_alfa($this->id_medico); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_tipo_evento'])) { $this->id_tipo_evento = $NM_val_form['id_tipo_evento']; }
              elseif (isset($this->id_tipo_evento)) { $this->nm_limpa_alfa($this->id_tipo_evento); }
              if     (isset($NM_val_form) && isset($NM_val_form['zona'])) { $this->zona = $NM_val_form['zona']; }
              elseif (isset($this->zona)) { $this->nm_limpa_alfa($this->zona); }
              if     (isset($NM_val_form) && isset($NM_val_form['discapacidad'])) { $this->discapacidad = $NM_val_form['discapacidad']; }
              elseif (isset($this->discapacidad)) { $this->nm_limpa_alfa($this->discapacidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_ciudad'])) { $this->id_ciudad = $NM_val_form['id_ciudad']; }
              elseif (isset($this->id_ciudad)) { $this->nm_limpa_alfa($this->id_ciudad); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('consecutivo', 'secad', 'quien_reporta', 'discapacidad', 'nombre_apellido', 'tipo_documento', 'documento_identidad', 'edad', 'numero_contacto', 'genero', 'id_tipo_evento', 'circunstancias_emergencia', 'id_eps', 'id_seguridad_social', 'zona', 'tipo_servicio', 'id_barrio', 'direccion_servicio', 'hora_ingreso_llamada', 'hora_notifica_movil', 'hora_llegada_sitio', 'hora_llegada_ips', 'hora_salida_ips', 'id_movil', 'id_ips', 'tipo_caso', 'id_medico', 'id_ciudad'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "Id_Procedimiento, ";
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela; 
          $comando = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela; 
          $rs = $this->Db->Execute($comando); 
          if ($rs === false && !$rs->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  form_procedimiento1_pack_ajax_response();
              }
              exit; 
          }  
          $this->id_procedimiento_before_qstr = $this->id_procedimiento = $rs->fields[0] + 1;
          $rs->Close(); 
              $this->fecha =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fecha_hora =  date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_procedimiento1_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES ('$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, #$this->fecha#, '$this->ip', '$this->login', #$this->hora_ingreso_llamada#, #$this->hora_notifica_movil#, #$this->hora_llegada_sitio#, #$this->hora_llegada_ips#, #$this->hora_salida_ips#, $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, EXTEND('$this->fecha', YEAR TO DAY), '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad) VALUES (" . $NM_seq_auto . "'$this->secad', '$this->consecutivo', '$this->quien_reporta', '$this->direccion_servicio', $this->id_barrio, '$this->tipo_servicio', '$this->numero_contacto', '$this->radicado', '$this->nombre_apellido', '$this->tipo_documento', '$this->documento_identidad', $this->edad, '$this->genero', '$this->circunstancias_emergencia', $this->id_seguridad_social, $this->id_eps, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->ip', '$this->login', " . $this->Ini->date_delim . $this->hora_ingreso_llamada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips . $this->Ini->date_delim1 . ", $this->id_movil, $this->id_ips, '$this->tipo_caso', '$this->operador', $this->id_medico, $this->id_tipo_evento, '$this->observaciones', '$this->zona', '$this->discapacidad', $this->id_ciudad)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_procedimiento1_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_procedimiento1_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_procedimiento =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  {
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  }
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_procedimiento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_procedimiento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_procedimiento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_procedimiento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_procedimiento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_procedimiento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->secad = $this->secad_before_qstr;
              $this->consecutivo = $this->consecutivo_before_qstr;
              $this->quien_reporta = $this->quien_reporta_before_qstr;
              $this->direccion_servicio = $this->direccion_servicio_before_qstr;
              $this->tipo_servicio = $this->tipo_servicio_before_qstr;
              $this->numero_contacto = $this->numero_contacto_before_qstr;
              $this->radicado = $this->radicado_before_qstr;
              $this->nombre_apellido = $this->nombre_apellido_before_qstr;
              $this->tipo_documento = $this->tipo_documento_before_qstr;
              $this->documento_identidad = $this->documento_identidad_before_qstr;
              $this->genero = $this->genero_before_qstr;
              $this->circunstancias_emergencia = $this->circunstancias_emergencia_before_qstr;
              $this->ip = $this->ip_before_qstr;
              $this->login = $this->login_before_qstr;
              $this->tipo_caso = $this->tipo_caso_before_qstr;
              $this->operador = $this->operador_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->zona = $this->zona_before_qstr;
              $this->discapacidad = $this->discapacidad_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->secad = $this->secad_before_qstr;
              $this->consecutivo = $this->consecutivo_before_qstr;
              $this->quien_reporta = $this->quien_reporta_before_qstr;
              $this->direccion_servicio = $this->direccion_servicio_before_qstr;
              $this->tipo_servicio = $this->tipo_servicio_before_qstr;
              $this->numero_contacto = $this->numero_contacto_before_qstr;
              $this->radicado = $this->radicado_before_qstr;
              $this->nombre_apellido = $this->nombre_apellido_before_qstr;
              $this->tipo_documento = $this->tipo_documento_before_qstr;
              $this->documento_identidad = $this->documento_identidad_before_qstr;
              $this->genero = $this->genero_before_qstr;
              $this->circunstancias_emergencia = $this->circunstancias_emergencia_before_qstr;
              $this->ip = $this->ip_before_qstr;
              $this->login = $this->login_before_qstr;
              $this->tipo_caso = $this->tipo_caso_before_qstr;
              $this->operador = $this->operador_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->zona = $this->zona_before_qstr;
              $this->discapacidad = $this->discapacidad_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_procedimiento = substr($this->Db->qstr($this->id_procedimiento), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_procedimiento1_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      $this->restore_zeros_null();
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['parms'] = "id_procedimiento?#?$this->id_procedimiento?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_procedimiento = null === $this->id_procedimiento ? null : substr($this->Db->qstr($this->id_procedimiento), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "R")
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['iframe_evento']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_procedimiento)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id_procedimiento) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_procedimiento1 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'] = $qt_geral_reg_form_procedimiento1;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_procedimiento))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento "; 
              }
              else  
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_procedimiento1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] > $qt_geral_reg_form_procedimiento1)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = $qt_geral_reg_form_procedimiento1; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = $qt_geral_reg_form_procedimiento1; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_procedimiento1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), ip, login, str_replace (convert(char(10),hora_ingreso_llamada,102), '.', '-') + ' ' + convert(char(8),hora_ingreso_llamada,20), str_replace (convert(char(10),Hora_notifica_movil,102), '.', '-') + ' ' + convert(char(8),Hora_notifica_movil,20), str_replace (convert(char(10),hora_llegada_sitio,102), '.', '-') + ' ' + convert(char(8),hora_llegada_sitio,20), str_replace (convert(char(10),hora_llegada_ips,102), '.', '-') + ' ' + convert(char(8),hora_llegada_ips,20), str_replace (convert(char(10),hora_salida_ips,102), '.', '-') + ' ' + convert(char(8),hora_salida_ips,20), Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, convert(char(23),fecha,121), ip, login, convert(char(23),hora_ingreso_llamada,121), convert(char(23),Hora_notifica_movil,121), convert(char(23),hora_llegada_sitio,121), convert(char(23),hora_llegada_ips,121), convert(char(23),hora_salida_ips,121), Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, EXTEND(fecha, YEAR TO DAY), ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad, Id_Ciudad from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "Id_Procedimiento = $this->id_procedimiento"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "Id_Procedimiento = $this->id_procedimiento"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "Id_Procedimiento = $this->id_procedimiento"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "Id_Procedimiento = $this->id_procedimiento"; 
              }  
              else  
              {
                  $aWhere[] = "Id_Procedimiento = $this->id_procedimiento"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "Id_Procedimiento";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id_procedimiento = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_procedimiento'] = $this->id_procedimiento;
              $this->secad = $rs->fields[1] ; 
              $this->nmgp_dados_select['secad'] = $this->secad;
              $this->consecutivo = $rs->fields[2] ; 
              $this->nmgp_dados_select['consecutivo'] = $this->consecutivo;
              $this->quien_reporta = $rs->fields[3] ; 
              $this->nmgp_dados_select['quien_reporta'] = $this->quien_reporta;
              $this->direccion_servicio = $rs->fields[4] ; 
              $this->nmgp_dados_select['direccion_servicio'] = $this->direccion_servicio;
              $this->id_barrio = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_barrio'] = $this->id_barrio;
              $this->tipo_servicio = $rs->fields[6] ; 
              $this->nmgp_dados_select['tipo_servicio'] = $this->tipo_servicio;
              $this->numero_contacto = $rs->fields[7] ; 
              $this->nmgp_dados_select['numero_contacto'] = $this->numero_contacto;
              $this->radicado = $rs->fields[8] ; 
              $this->nmgp_dados_select['radicado'] = $this->radicado;
              $this->nombre_apellido = $rs->fields[9] ; 
              $this->nmgp_dados_select['nombre_apellido'] = $this->nombre_apellido;
              $this->tipo_documento = $rs->fields[10] ; 
              $this->nmgp_dados_select['tipo_documento'] = $this->tipo_documento;
              $this->documento_identidad = $rs->fields[11] ; 
              $this->nmgp_dados_select['documento_identidad'] = $this->documento_identidad;
              $this->edad = $rs->fields[12] ; 
              $this->nmgp_dados_select['edad'] = $this->edad;
              $this->genero = $rs->fields[13] ; 
              $this->nmgp_dados_select['genero'] = $this->genero;
              $this->circunstancias_emergencia = $rs->fields[14] ; 
              $this->nmgp_dados_select['circunstancias_emergencia'] = $this->circunstancias_emergencia;
              $this->id_seguridad_social = $rs->fields[15] ; 
              $this->nmgp_dados_select['id_seguridad_social'] = $this->id_seguridad_social;
              $this->id_eps = $rs->fields[16] ; 
              $this->nmgp_dados_select['id_eps'] = $this->id_eps;
              $this->fecha = $rs->fields[17] ; 
              $this->nmgp_dados_select['fecha'] = $this->fecha;
              $this->ip = $rs->fields[18] ; 
              $this->nmgp_dados_select['ip'] = $this->ip;
              $this->login = $rs->fields[19] ; 
              $this->nmgp_dados_select['login'] = $this->login;
              $this->hora_ingreso_llamada = $rs->fields[20] ; 
              $this->nmgp_dados_select['hora_ingreso_llamada'] = $this->hora_ingreso_llamada;
              $this->hora_notifica_movil = $rs->fields[21] ; 
              $this->nmgp_dados_select['hora_notifica_movil'] = $this->hora_notifica_movil;
              $this->hora_llegada_sitio = $rs->fields[22] ; 
              $this->nmgp_dados_select['hora_llegada_sitio'] = $this->hora_llegada_sitio;
              $this->hora_llegada_ips = $rs->fields[23] ; 
              $this->nmgp_dados_select['hora_llegada_ips'] = $this->hora_llegada_ips;
              $this->hora_salida_ips = $rs->fields[24] ; 
              $this->nmgp_dados_select['hora_salida_ips'] = $this->hora_salida_ips;
              $this->id_movil = $rs->fields[25] ; 
              $this->nmgp_dados_select['id_movil'] = $this->id_movil;
              $this->id_ips = $rs->fields[26] ; 
              $this->nmgp_dados_select['id_ips'] = $this->id_ips;
              $this->tipo_caso = $rs->fields[27] ; 
              $this->nmgp_dados_select['tipo_caso'] = $this->tipo_caso;
              $this->operador = $rs->fields[28] ; 
              $this->nmgp_dados_select['operador'] = $this->operador;
              $this->id_medico = $rs->fields[29] ; 
              $this->nmgp_dados_select['id_medico'] = $this->id_medico;
              $this->id_tipo_evento = $rs->fields[30] ; 
              $this->nmgp_dados_select['id_tipo_evento'] = $this->id_tipo_evento;
              $this->observaciones = $rs->fields[31] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->zona = $rs->fields[32] ; 
              $this->nmgp_dados_select['zona'] = $this->zona;
              $this->discapacidad = $rs->fields[33] ; 
              $this->nmgp_dados_select['discapacidad'] = $this->discapacidad;
              $this->id_ciudad = $rs->fields[34] ; 
              $this->nmgp_dados_select['id_ciudad'] = $this->id_ciudad;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_procedimiento = (string)$this->id_procedimiento; 
              $this->id_barrio = (string)$this->id_barrio; 
              $this->edad = (string)$this->edad; 
              $this->id_seguridad_social = (string)$this->id_seguridad_social; 
              $this->id_eps = (string)$this->id_eps; 
              $this->id_movil = (string)$this->id_movil; 
              $this->id_ips = (string)$this->id_ips; 
              $this->id_medico = (string)$this->id_medico; 
              $this->id_tipo_evento = (string)$this->id_tipo_evento; 
              $this->id_ciudad = (string)$this->id_ciudad; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['parms'] = "id_procedimiento?#?$this->id_procedimiento?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] < $qt_geral_reg_form_procedimiento1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id_procedimiento = "";  
              $this->nmgp_dados_form["id_procedimiento"] = $this->id_procedimiento;
              $this->secad = "";  
              $this->nmgp_dados_form["secad"] = $this->secad;
              $this->consecutivo = "";  
              $this->nmgp_dados_form["consecutivo"] = $this->consecutivo;
              $this->quien_reporta = "";  
              $this->nmgp_dados_form["quien_reporta"] = $this->quien_reporta;
              $this->direccion_servicio = "";  
              $this->nmgp_dados_form["direccion_servicio"] = $this->direccion_servicio;
              $this->id_barrio = "";  
              $this->nmgp_dados_form["id_barrio"] = $this->id_barrio;
              $this->tipo_servicio = "";  
              $this->nmgp_dados_form["tipo_servicio"] = $this->tipo_servicio;
              $this->numero_contacto = "";  
              $this->nmgp_dados_form["numero_contacto"] = $this->numero_contacto;
              $this->radicado = "";  
              $this->nmgp_dados_form["radicado"] = $this->radicado;
              $this->nombre_apellido = "";  
              $this->nmgp_dados_form["nombre_apellido"] = $this->nombre_apellido;
              $this->tipo_documento = "";  
              $this->nmgp_dados_form["tipo_documento"] = $this->tipo_documento;
              $this->documento_identidad = "";  
              $this->nmgp_dados_form["documento_identidad"] = $this->documento_identidad;
              $this->edad = "";  
              $this->nmgp_dados_form["edad"] = $this->edad;
              $this->genero = "";  
              $this->nmgp_dados_form["genero"] = $this->genero;
              $this->circunstancias_emergencia = "";  
              $this->nmgp_dados_form["circunstancias_emergencia"] = $this->circunstancias_emergencia;
              $this->id_seguridad_social = "";  
              $this->nmgp_dados_form["id_seguridad_social"] = $this->id_seguridad_social;
              $this->id_eps = "";  
              $this->nmgp_dados_form["id_eps"] = $this->id_eps;
              $this->fecha = "";  
              $this->fecha_hora = "" ;  
              $this->nmgp_dados_form["fecha"] = $this->fecha;
              $this->ip = "";  
              $this->nmgp_dados_form["ip"] = $this->ip;
              $this->login = "";  
              $this->nmgp_dados_form["login"] = $this->login;
              $this->hora_ingreso_llamada = "";  
              $this->hora_ingreso_llamada_hora = "" ;  
              $this->nmgp_dados_form["hora_ingreso_llamada"] = $this->hora_ingreso_llamada;
              $this->hora_notifica_movil = "";  
              $this->hora_notifica_movil_hora = "" ;  
              $this->nmgp_dados_form["hora_notifica_movil"] = $this->hora_notifica_movil;
              $this->hora_llegada_sitio = "";  
              $this->hora_llegada_sitio_hora = "" ;  
              $this->nmgp_dados_form["hora_llegada_sitio"] = $this->hora_llegada_sitio;
              $this->hora_llegada_ips = "";  
              $this->hora_llegada_ips_hora = "" ;  
              $this->nmgp_dados_form["hora_llegada_ips"] = $this->hora_llegada_ips;
              $this->hora_salida_ips = "";  
              $this->hora_salida_ips_hora = "" ;  
              $this->nmgp_dados_form["hora_salida_ips"] = $this->hora_salida_ips;
              $this->id_movil = "";  
              $this->nmgp_dados_form["id_movil"] = $this->id_movil;
              $this->id_ips = "";  
              $this->nmgp_dados_form["id_ips"] = $this->id_ips;
              $this->tipo_caso = "";  
              $this->nmgp_dados_form["tipo_caso"] = $this->tipo_caso;
              $this->operador = "";  
              $this->nmgp_dados_form["operador"] = $this->operador;
              $this->id_medico = "";  
              $this->nmgp_dados_form["id_medico"] = $this->id_medico;
              $this->id_tipo_evento = "";  
              $this->nmgp_dados_form["id_tipo_evento"] = $this->id_tipo_evento;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->zona = "";  
              $this->nmgp_dados_form["zona"] = $this->zona;
              $this->discapacidad = "";  
              $this->nmgp_dados_form["discapacidad"] = $this->discapacidad;
              $this->id_ciudad = "";  
              $this->nmgp_dados_form["id_ciudad"] = $this->id_ciudad;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento < $this->id_procedimiento" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_procedimiento = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " where Id_Procedimiento > $this->id_procedimiento" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_procedimiento = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id_procedimiento = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(Id_Procedimiento) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id_procedimiento = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['id_procedimiento'] =  $this->id_procedimiento;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dados_select'];
           $this->SC_log_arr['fields']['secad']['0'] =  $nmgp_dados_select['secad'];
           $this->SC_log_arr['fields']['consecutivo']['0'] =  $nmgp_dados_select['consecutivo'];
           $this->SC_log_arr['fields']['quien_reporta']['0'] =  $nmgp_dados_select['quien_reporta'];
           $this->SC_log_arr['fields']['direccion_servicio']['0'] =  $nmgp_dados_select['direccion_servicio'];
           $this->SC_log_arr['fields']['Id_Barrio']['0'] =  $nmgp_dados_select['id_barrio'];
           $this->SC_log_arr['fields']['tipo_servicio']['0'] =  $nmgp_dados_select['tipo_servicio'];
           $this->SC_log_arr['fields']['numero_contacto']['0'] =  $nmgp_dados_select['numero_contacto'];
           $this->SC_log_arr['fields']['radicado']['0'] =  $nmgp_dados_select['radicado'];
           $this->SC_log_arr['fields']['nombre_apellido']['0'] =  $nmgp_dados_select['nombre_apellido'];
           $this->SC_log_arr['fields']['tipo_documento']['0'] =  $nmgp_dados_select['tipo_documento'];
           $this->SC_log_arr['fields']['documento_identidad']['0'] =  $nmgp_dados_select['documento_identidad'];
           $this->SC_log_arr['fields']['edad']['0'] =  $nmgp_dados_select['edad'];
           $this->SC_log_arr['fields']['genero']['0'] =  $nmgp_dados_select['genero'];
           $this->SC_log_arr['fields']['circunstancias_emergencia']['0'] =  $nmgp_dados_select['circunstancias_emergencia'];
           $this->SC_log_arr['fields']['Id_Seguridad_Social']['0'] =  $nmgp_dados_select['id_seguridad_social'];
           $this->SC_log_arr['fields']['Id_Eps']['0'] =  $nmgp_dados_select['id_eps'];
           $this->SC_log_arr['fields']['fecha']['0'] =  $nmgp_dados_select['fecha'];
           $this->SC_log_arr['fields']['ip']['0'] =  $nmgp_dados_select['ip'];
           $this->SC_log_arr['fields']['login']['0'] =  $nmgp_dados_select['login'];
           $this->SC_log_arr['fields']['hora_ingreso_llamada']['0'] =  $nmgp_dados_select['hora_ingreso_llamada'];
           $this->SC_log_arr['fields']['Hora_notifica_movil']['0'] =  $nmgp_dados_select['hora_notifica_movil'];
           $this->SC_log_arr['fields']['hora_llegada_sitio']['0'] =  $nmgp_dados_select['hora_llegada_sitio'];
           $this->SC_log_arr['fields']['hora_llegada_ips']['0'] =  $nmgp_dados_select['hora_llegada_ips'];
           $this->SC_log_arr['fields']['hora_salida_ips']['0'] =  $nmgp_dados_select['hora_salida_ips'];
           $this->SC_log_arr['fields']['Id_Movil']['0'] =  $nmgp_dados_select['id_movil'];
           $this->SC_log_arr['fields']['Id_Ips']['0'] =  $nmgp_dados_select['id_ips'];
           $this->SC_log_arr['fields']['tipo_caso']['0'] =  $nmgp_dados_select['tipo_caso'];
           $this->SC_log_arr['fields']['operador']['0'] =  $nmgp_dados_select['operador'];
           $this->SC_log_arr['fields']['Id_Medico']['0'] =  $nmgp_dados_select['id_medico'];
           $this->SC_log_arr['fields']['Id_Tipo_Evento']['0'] =  $nmgp_dados_select['id_tipo_evento'];
           $this->SC_log_arr['fields']['observaciones']['0'] =  $nmgp_dados_select['observaciones'];
           $this->SC_log_arr['fields']['Zona']['0'] =  $nmgp_dados_select['zona'];
           $this->SC_log_arr['fields']['discapacidad']['0'] =  $nmgp_dados_select['discapacidad'];
           $this->SC_log_arr['fields']['Id_Ciudad']['0'] =  $nmgp_dados_select['id_ciudad'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['secad']['1'] =  $this->secad;
       $this->SC_log_arr['fields']['consecutivo']['1'] =  $this->consecutivo;
       $this->SC_log_arr['fields']['quien_reporta']['1'] =  $this->quien_reporta;
       $this->SC_log_arr['fields']['direccion_servicio']['1'] =  $this->direccion_servicio;
       $this->SC_log_arr['fields']['Id_Barrio']['1'] =  $this->id_barrio;
       $this->SC_log_arr['fields']['tipo_servicio']['1'] =  $this->tipo_servicio;
       $this->SC_log_arr['fields']['numero_contacto']['1'] =  $this->numero_contacto;
       $this->SC_log_arr['fields']['radicado']['1'] =  $this->radicado;
       $this->SC_log_arr['fields']['nombre_apellido']['1'] =  $this->nombre_apellido;
       $this->SC_log_arr['fields']['tipo_documento']['1'] =  $this->tipo_documento;
       $this->SC_log_arr['fields']['documento_identidad']['1'] =  $this->documento_identidad;
       $this->SC_log_arr['fields']['edad']['1'] =  $this->edad;
       $this->SC_log_arr['fields']['genero']['1'] =  $this->genero;
       $this->SC_log_arr['fields']['circunstancias_emergencia']['1'] =  $this->circunstancias_emergencia;
       $this->SC_log_arr['fields']['Id_Seguridad_Social']['1'] =  $this->id_seguridad_social;
       $this->SC_log_arr['fields']['Id_Eps']['1'] =  $this->id_eps;
       $this->SC_log_arr['fields']['fecha']['1'] =  $this->fecha;
       $this->SC_log_arr['fields']['ip']['1'] =  $this->ip;
       $this->SC_log_arr['fields']['login']['1'] =  $this->login;
       $this->SC_log_arr['fields']['hora_ingreso_llamada']['1'] =  $this->hora_ingreso_llamada;
       $this->SC_log_arr['fields']['Hora_notifica_movil']['1'] =  $this->hora_notifica_movil;
       $this->SC_log_arr['fields']['hora_llegada_sitio']['1'] =  $this->hora_llegada_sitio;
       $this->SC_log_arr['fields']['hora_llegada_ips']['1'] =  $this->hora_llegada_ips;
       $this->SC_log_arr['fields']['hora_salida_ips']['1'] =  $this->hora_salida_ips;
       $this->SC_log_arr['fields']['Id_Movil']['1'] =  $this->id_movil;
       $this->SC_log_arr['fields']['Id_Ips']['1'] =  $this->id_ips;
       $this->SC_log_arr['fields']['tipo_caso']['1'] =  $this->tipo_caso;
       $this->SC_log_arr['fields']['operador']['1'] =  $this->operador;
       $this->SC_log_arr['fields']['Id_Medico']['1'] =  $this->id_medico;
       $this->SC_log_arr['fields']['Id_Tipo_Evento']['1'] =  $this->id_tipo_evento;
       $this->SC_log_arr['fields']['observaciones']['1'] =  $this->observaciones;
       $this->SC_log_arr['fields']['Zona']['1'] =  $this->zona;
       $this->SC_log_arr['fields']['discapacidad']['1'] =  $this->discapacidad;
       $this->SC_log_arr['fields']['Id_Ciudad']['1'] =  $this->id_ciudad;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       $Log_labels = array();
       $Log_labels['secad'] =  "Secad";
       $Log_labels['consecutivo'] =  "Consecutivo";
       $Log_labels['quien_reporta'] =  "Quien Reporta";
       $Log_labels['direccion_servicio'] =  "Direccion Servicio";
       $Log_labels['Id_Barrio'] =  "Barrio";
       $Log_labels['tipo_servicio'] =  "Tipo Servicio";
       $Log_labels['numero_contacto'] =  "Numero Contacto";
       $Log_labels['radicado'] =  "Radicado";
       $Log_labels['nombre_apellido'] =  "Nombre del paciente";
       $Log_labels['tipo_documento'] =  "Tipo Documento";
       $Log_labels['documento_identidad'] =  "Documento Identidad";
       $Log_labels['edad'] =  "Edad";
       $Log_labels['genero'] =  "Genero";
       $Log_labels['circunstancias_emergencia'] =  "Situación que se presenta";
       $Log_labels['Id_Seguridad_Social'] =  "Regimen";
       $Log_labels['Id_Eps'] =  "Entidad aseguradora";
       $Log_labels['fecha'] =  "Fecha";
       $Log_labels['ip'] =  "Ip";
       $Log_labels['login'] =  "Login";
       $Log_labels['hora_ingreso_llamada'] =  "Hora Ingreso Llamada";
       $Log_labels['Hora_notifica_movil'] =  "Hora Notifica Movil";
       $Log_labels['hora_llegada_sitio'] =  "Hora Llegada Sitio";
       $Log_labels['hora_llegada_ips'] =  "Hora Llegada Ips";
       $Log_labels['hora_salida_ips'] =  "Hora Salida Ips";
       $Log_labels['Id_Movil'] =  "Vehículo que atendio";
       $Log_labels['Id_Ips'] =  "Direccionamiento";
       $Log_labels['tipo_caso'] =  "Tipo Caso";
       $Log_labels['operador'] =  "Operador";
       $Log_labels['Id_Medico'] =  "Medico Regulador";
       $Log_labels['Id_Tipo_Evento'] =  "Tipo Evento";
       $Log_labels['observaciones'] =  "Observaciones";
       $Log_labels['Zona'] =  "Zona";
       $Log_labels['discapacidad'] =  "Discapacidad";
       $Log_labels['Id_Ciudad'] =  "Ciudad";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
                   $Log_output .= $prim_delim . $key . " (label) " . " : " . $Log_labels[$key];
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (!isset($this->Ini->Str_toolbarnav_separator))
           {
               $this->Ini->Str_toolbarnav_separator = "";
           }
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function nombre_apellido_onFocus()
{
$_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'on';
  
$original_consecutivo = $this->consecutivo;

$ano= date('Y');
$mes = date('m');
$dia = date('d');


 
      $nm_select = "SELECT Id_Procedimiento,secad FROM procedimiento1 ORDER BY Id_Procedimiento DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->Dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 

if(count($this->dataset )>0)	
	{
		$ULTIMO=$this->dataset[0][0];
		$this->consecutivo =$ano.$mes.$dia.$ULTIMO.rand(1000,9999);

	}
else	
	{
		$this->consecutivo =$ano.$mes.$dia.rand(1000,9999);
	}
$this->sc_set_focus("nombre_apellido");


$modificado_consecutivo = $this->consecutivo;
$this->nm_formatar_campos('consecutivo');
if ($original_consecutivo !== $modificado_consecutivo || isset($this->nmgp_cmp_readonly['consecutivo']) || (isset($bFlagRead_consecutivo) && $bFlagRead_consecutivo))
{
    $this->ajax_return_values_consecutivo(true);
}
$this->NM_ajax_info['event_field'] = 'nombre';
form_procedimiento1_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_procedimiento1']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_procedimiento1_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE html>

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_procedimiento1_form0.php");
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
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("consecutivo", "secad", "quien_reporta", "discapacidad", "nombre_apellido", "tipo_documento", "documento_identidad", "edad", "numero_contacto", "genero", "id_tipo_evento", "circunstancias_emergencia", "id_eps", "id_seguridad_social", "zona", "tipo_servicio", "id_barrio", "direccion_servicio", "hora_ingreso_llamada", "hora_notifica_movil", "hora_llegada_sitio", "hora_llegada_ips", "hora_salida_ips", "id_movil", "id_ips", "tipo_caso", "id_medico", "id_ciudad"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat, $value)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       if ('now' == $value) {
           return str_replace(array('hh', 'mm', 'ii', 'ss'), array(date('H'), date('i'), date('i'), date('s')), $sTime);
       } elseif ('end' == $value) {
           return str_replace(array('hh', 'mm', 'ii', 'ss'), array('23', '59', '59', '59'), $sTime);
       } else {
           return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
       }
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['csrf_token'];
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

   function Form_lookup_quien_reporta()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PONAL ?#?PONAL ?#?N?@?";
       $nmgp_def_dados .= "BOMBEROS ?#?BOMBEROS ?#?N?@?";
       $nmgp_def_dados .= "DEFENSA CIVIL?#?DEFENSA CIVIL?#?N?@?";
       $nmgp_def_dados .= "CRUZ ROJA ?#?CRUZ ROJA ?#?N?@?";
       $nmgp_def_dados .= "LINEA DE SALUD MENTAL?#?LINEA DE SALUD MENTAL?#?N?@?";
       $nmgp_def_dados .= "USUARIO?#?USUARIO?#?N?@?";
       $nmgp_def_dados .= "EMERCAPS?#?EMERCAPS?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_discapacidad()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "VISUAL?#?VISUAL?#?N?@?";
       $nmgp_def_dados .= "AUDITIVA?#?AUDITIVA?#?N?@?";
       $nmgp_def_dados .= "FISICA?#?FISICA?#?N?@?";
       $nmgp_def_dados .= "SORDOCEGUERA?#?SORDOCEGUERA?#?N?@?";
       $nmgp_def_dados .= "MULTIPLE?#?MULTIPLE?#?N?@?";
       $nmgp_def_dados .= "INTELECTUAL ?#?INTELECTUAL ?#?N?@?";
       $nmgp_def_dados .= "PSICOSOCIAL?#?PSICOSOCIAL?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_documento()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Cedula de ciudadanía?#?Cedula de ciudadanía?#?N?@?";
       $nmgp_def_dados .= "Tarjeta de identidad?#?Tarjeta de identidad?#?N?@?";
       $nmgp_def_dados .= "Tarjeta de extranjería?#?Tarjeta de extranjería?#?N?@?";
       $nmgp_def_dados .= "Cedula de ciudadanía de primera vez ?#?Cedula de ciudadanía de primera vez ?#?N?@?";
       $nmgp_def_dados .= "Duplicado de cédula de ciudadanía ?#?Duplicado de cédula de ciudadanía ?#?N?@?";
       $nmgp_def_dados .= "Renovación de cédula de ciudadanía ?#?Renovación de cédula de ciudadanía ?#?N?@?";
       $nmgp_def_dados .= "Tarjeta de identidad de primera vez?#?Tarjeta de identidad de primera vez?#?N?@?";
       $nmgp_def_dados .= "Duplicado de tarjeta de identidad?#?Duplicado de tarjeta de identidad?#?N?@?";
       $nmgp_def_dados .= "Renovación de tarjeta de identidad ?#?Renovación de tarjeta de identidad ?#?N?@?";
       $nmgp_def_dados .= "Registro civil ?#?Registro civil ?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_genero()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Masculino?#?Masculino?#?N?@?";
       $nmgp_def_dados .= "Transexual?#?Transexual?#?N?@?";
       $nmgp_def_dados .= "Femenino?#?Femenino?#?N?@?";
       $nmgp_def_dados .= "No binario?#?No binario?#?N?@?";
       $nmgp_def_dados .= "Otro?#?Otro?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_tipo_evento()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Tipo_Evento, evento  FROM id_tipo_evento  ORDER BY evento";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_tipo_evento'][] = $rs->fields[0];
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
   function Form_lookup_id_eps()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Eps, eps  FROM eps  ORDER BY eps";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_eps'][] = $rs->fields[0];
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
   function Form_lookup_id_seguridad_social()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Seguridad_Social, seguridad_social  FROM seguridad_social  ORDER BY seguridad_social";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_seguridad_social'][] = $rs->fields[0];
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
   function Form_lookup_zona()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SUR?#?SUR?#?N?@?";
       $nmgp_def_dados .= "NORTE?#?NORTE?#?N?@?";
       $nmgp_def_dados .= "ORIENTE?#?ORIENTE?#?N?@?";
       $nmgp_def_dados .= "OCCIDENBTE?#?OCCIDENTE?#?N?@?";
       $nmgp_def_dados .= "RURAL?#?RURAL?#?N?@?";
       $nmgp_def_dados .= "CENTRO?#?CENTRO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_servicio()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Ambulancia?#?Ambulancia?#?N?@?";
       $nmgp_def_dados .= "Referencia y contrareferencia?#?Referencia y contrareferencia?#?N?@?";
       $nmgp_def_dados .= "TAB?#?TAB?#?N?@?";
       $nmgp_def_dados .= "Otros?#?Otros?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_barrio()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Barrio, barrio  FROM barrio  ORDER BY barrio";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_barrio'][] = $rs->fields[0];
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
   function Form_lookup_id_movil()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Movil, placa  FROM movil  ORDER BY placa";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_movil'][] = $rs->fields[0];
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
   function Form_lookup_id_ips()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Ips, nombre_ips  FROM ips  ORDER BY nombre_ips";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ips'][] = $rs->fields[0];
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
   function Form_lookup_tipo_caso()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "EFECTIVO?#?EFECTIVO?#?N?@?";
       $nmgp_def_dados .= "NO EFECTIVO?#?NO EFECTIVO?#?N?@?";
       $nmgp_def_dados .= "FALLIDO?#?FALLIDO?#?N?@?";
       $nmgp_def_dados .= "APOYO PSICOSOCIAL?#?APOYO PSICOSOCIAL?#?N?@?";
       $nmgp_def_dados .= "APH?#?APH?#?N?@?";
       $nmgp_def_dados .= "ASESORIA MEDICA TELEFONICA?#?ASESORIA MEDICA TELEFONICA?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_medico()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Medico, medico  FROM medico  ORDER BY medico";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_medico'][] = $rs->fields[0];
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
   function Form_lookup_id_ciudad()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'] = array(); 
    }

   $old_value_edad = $this->edad;
   $old_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $old_value_hora_notifica_movil = $this->hora_notifica_movil;
   $old_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $old_value_hora_llegada_ips = $this->hora_llegada_ips;
   $old_value_hora_salida_ips = $this->hora_salida_ips;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad = $this->edad;
   $unformatted_value_hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $unformatted_value_hora_notifica_movil = $this->hora_notifica_movil;
   $unformatted_value_hora_llegada_sitio = $this->hora_llegada_sitio;
   $unformatted_value_hora_llegada_ips = $this->hora_llegada_ips;
   $unformatted_value_hora_salida_ips = $this->hora_salida_ips;

   $nm_comando = "SELECT Id_Ciudad, ciudad  FROM ciudad  ORDER BY ciudad";

   $this->edad = $old_value_edad;
   $this->hora_ingreso_llamada = $old_value_hora_ingreso_llamada;
   $this->hora_notifica_movil = $old_value_hora_notifica_movil;
   $this->hora_llegada_sitio = $old_value_hora_llegada_sitio;
   $this->hora_llegada_ips = $old_value_hora_llegada_ips;
   $this->hora_salida_ips = $old_value_hora_salida_ips;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['Lookup_id_ciudad'][] = $rs->fields[0];
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
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dyn_search_and_or']);
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dyn_search_cache']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_procedimiento1_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "consecutivo") 
          {
              $this->SC_monta_condicao($comando, "consecutivo", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "secad") 
          {
              $this->SC_monta_condicao($comando, "secad", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "quien_reporta") 
          {
              $data_lookup = $this->SC_lookup_quien_reporta($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "quien_reporta", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "discapacidad") 
          {
              $data_lookup = $this->SC_lookup_discapacidad($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "discapacidad", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "nombre_apellido") 
          {
              $this->SC_monta_condicao($comando, "nombre_apellido", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "tipo_documento") 
          {
              $data_lookup = $this->SC_lookup_tipo_documento($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_documento", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "documento_identidad") 
          {
              $this->SC_monta_condicao($comando, "documento_identidad", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "edad") 
          {
              $this->SC_monta_condicao($comando, "edad", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "numero_contacto") 
          {
              $this->SC_monta_condicao($comando, "numero_contacto", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "genero") 
          {
              $data_lookup = $this->SC_lookup_genero($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "genero", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "id_tipo_evento") 
          {
              $data_lookup = $this->SC_lookup_id_tipo_evento($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Tipo_Evento", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "circunstancias_emergencia") 
          {
              $this->SC_monta_condicao($comando, "circunstancias_emergencia", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "id_eps") 
          {
              $data_lookup = $this->SC_lookup_id_eps($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Eps", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "id_seguridad_social") 
          {
              $data_lookup = $this->SC_lookup_id_seguridad_social($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Seguridad_Social", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "zona") 
          {
              $data_lookup = $this->SC_lookup_zona($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Zona", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "tipo_servicio") 
          {
              $data_lookup = $this->SC_lookup_tipo_servicio($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_servicio", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "id_barrio") 
          {
              $data_lookup = $this->SC_lookup_id_barrio($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Barrio", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "direccion_servicio") 
          {
              $this->SC_monta_condicao($comando, "direccion_servicio", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "hora_ingreso_llamada") 
          {
              $this->SC_monta_condicao($comando, "hora_ingreso_llamada", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_notifica_movil") 
          {
              $this->SC_monta_condicao($comando, "Hora_notifica_movil", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_llegada_sitio") 
          {
              $this->SC_monta_condicao($comando, "hora_llegada_sitio", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_llegada_ips") 
          {
              $this->SC_monta_condicao($comando, "hora_llegada_ips", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_salida_ips") 
          {
              $this->SC_monta_condicao($comando, "hora_salida_ips", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "id_movil") 
          {
              $data_lookup = $this->SC_lookup_id_movil($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Movil", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "id_ips") 
          {
              $data_lookup = $this->SC_lookup_id_ips($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Ips", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "tipo_caso") 
          {
              $data_lookup = $this->SC_lookup_tipo_caso($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_caso", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "id_medico") 
          {
              $data_lookup = $this->SC_lookup_id_medico($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Medico", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "id_ciudad") 
          {
              $data_lookup = $this->SC_lookup_id_ciudad($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Ciudad", $arg_search, $data_lookup, "INT", false);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_procedimiento1 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'] = $qt_geral_reg_form_procedimiento1;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_procedimiento1_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_procedimiento1_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $nm_numeric[] = "id_procedimiento";$nm_numeric[] = "id_barrio";$nm_numeric[] = "edad";$nm_numeric[] = "id_seguridad_social";$nm_numeric[] = "id_eps";$nm_numeric[] = "id_movil";$nm_numeric[] = "id_ips";$nm_numeric[] = "id_medico";$nm_numeric[] = "id_tipo_evento";$nm_numeric[] = "id_ciudad";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      if (is_array($campo)) {
          foreach ($campo as $Ind => $Cmp) {
             if ($Cmp != null) {
                 $campo[$Ind] = substr($this->Ini->Db->qstr($Cmp), 1, -1);
             }
          }
      }
      else {
          $campo = substr($this->Ini->Db->qstr($campo), 1, -1);
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas["fecha"] = "date";$Nm_datas["hora_ingreso_llamada"] = "time";$Nm_datas["hora_notifica_movil"] = "time";$Nm_datas["hora_llegada_sitio"] = "time";$Nm_datas["hora_llegada_ips"] = "time";$Nm_datas["hora_salida_ips"] = "time";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_quien_reporta($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['PONAL'] = "PONAL ";
       $data_look['BOMBEROS'] = "BOMBEROS ";
       $data_look['DEFENSA CIVIL'] = "DEFENSA CIVIL";
       $data_look['CRUZ ROJA'] = "CRUZ ROJA ";
       $data_look['LINEA DE SALUD MENTAL'] = "LINEA DE SALUD MENTAL";
       $data_look['USUARIO'] = "USUARIO";
       $data_look['EMERCAPS'] = "EMERCAPS";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_discapacidad($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['VISUAL'] = "VISUAL";
       $data_look['AUDITIVA'] = "AUDITIVA";
       $data_look['FISICA'] = "FISICA";
       $data_look['SORDOCEGUERA'] = "SORDOCEGUERA";
       $data_look['MULTIPLE'] = "MULTIPLE";
       $data_look['INTELECTUAL'] = "INTELECTUAL ";
       $data_look['PSICOSOCIAL'] = "PSICOSOCIAL";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_tipo_documento($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Cedula de ciudadanía'] = "Cedula de ciudadanía";
       $data_look['Tarjeta de identidad'] = "Tarjeta de identidad";
       $data_look['Tarjeta de extranjería'] = "Tarjeta de extranjería";
       $data_look['Cedula de ciudadanía de primera vez'] = "Cedula de ciudadanía de primera vez ";
       $data_look['Duplicado de cédula de ciudadanía'] = "Duplicado de cédula de ciudadanía ";
       $data_look['Renovación de cédula de ciudadanía'] = "Renovación de cédula de ciudadanía ";
       $data_look['Tarjeta de identidad de primera vez'] = "Tarjeta de identidad de primera vez";
       $data_look['Duplicado de tarjeta de identidad'] = "Duplicado de tarjeta de identidad";
       $data_look['Renovación de tarjeta de identidad'] = "Renovación de tarjeta de identidad ";
       $data_look['Registro civil'] = "Registro civil ";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_genero($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Masculino'] = "Masculino";
       $data_look['Transexual'] = "Transexual";
       $data_look['Femenino'] = "Femenino";
       $data_look['No binario'] = "No binario";
       $data_look['Otro'] = "Otro";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_id_tipo_evento($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT evento, Id_Tipo_Evento FROM id_tipo_evento WHERE (#cmp_ievento#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_id_eps($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT eps, Id_Eps FROM eps WHERE (#cmp_ieps#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_id_seguridad_social($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT seguridad_social, Id_Seguridad_Social FROM seguridad_social WHERE (#cmp_iseguridad_social#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_zona($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['SUR'] = "SUR";
       $data_look['NORTE'] = "NORTE";
       $data_look['ORIENTE'] = "ORIENTE";
       $data_look['OCCIDENTE'] = "OCCIDENBTE";
       $data_look['RURAL'] = "RURAL";
       $data_look['CENTRO'] = "CENTRO";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_tipo_servicio($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Ambulancia'] = "Ambulancia";
       $data_look['Referencia y contrareferencia'] = "Referencia y contrareferencia";
       $data_look['TAB'] = "TAB";
       $data_look['Otros'] = "Otros";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_id_barrio($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT barrio, Id_Barrio FROM barrio WHERE (#cmp_ibarrio#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_id_movil($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT placa, Id_Movil FROM movil WHERE (#cmp_iplaca#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_id_ips($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nombre_ips, Id_Ips FROM ips WHERE (#cmp_inombre_ips#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_tipo_caso($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['EFECTIVO'] = "EFECTIVO";
       $data_look['NO EFECTIVO'] = "NO EFECTIVO";
       $data_look['FALLIDO'] = "FALLIDO";
       $data_look['APOYO PSICOSOCIAL'] = "APOYO PSICOSOCIAL";
       $data_look['APH'] = "APH";
       $data_look['ASESORIA MEDICA TELEFONICA'] = "ASESORIA MEDICA TELEFONICA";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_id_medico($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT medico, Id_Medico FROM medico WHERE (#cmp_imedico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_id_ciudad($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT ciudad, Id_Ciudad FROM ciudad WHERE (#cmp_iciudad#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
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
       $nmgp_saida_form = "form_procedimiento1_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_procedimiento1_fim.php";
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
       form_procedimiento1_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['masterValue']);
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
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'consecutivo' => 'consecutivo',
                        'secad' => 'secad',
                        'quien_reporta' => 'quien_reporta',
                        'discapacidad' => 'discapacidad',
                        'nombre_apellido' => 'nombre_apellido',
                        'tipo_documento' => 'tipo_documento',
                        'documento_identidad' => 'documento_identidad',
                        'edad' => 'edad',
                        'numero_contacto' => 'numero_contacto',
                        'genero' => 'genero',
                        'id_tipo_evento' => 'id_tipo_evento',
                        'circunstancias_emergencia' => 'circunstancias_emergencia',
                        'id_eps' => 'id_eps',
                        'id_seguridad_social' => 'id_seguridad_social',
                        'zona' => 'zona',
                        'tipo_servicio' => 'tipo_servicio',
                        'id_barrio' => 'id_barrio',
                        'direccion_servicio' => 'direccion_servicio',
                        'hora_ingreso_llamada' => 'hora_ingreso_llamada',
                        'hora_notifica_movil' => 'hora_notifica_movil',
                        'hora_llegada_sitio' => 'hora_llegada_sitio',
                        'hora_llegada_ips' => 'hora_llegada_ips',
                        'hora_salida_ips' => 'hora_salida_ips',
                        'id_movil' => 'id_movil',
                        'id_ips' => 'id_ips',
                        'tipo_caso' => 'tipo_caso',
                        'id_medico' => 'id_medico',
                        'id_ciudad' => 'id_ciudad',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_b.sc-unique-btn-12");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2", "sc_b_ins_b.sc-unique-btn-13");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5");
                break;
            case "breload":
                return array("sc_b_reload_t.sc-unique-btn-6");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-11");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-14");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-15");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-16");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-17");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "Procedimiento"; } else { echo "Procedimiento1"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-footer">
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFormFooter">
    <tr>
        <td>
            <span class="scFormFooterFont" id="rod_col1"></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"></span>
        </td>
    </tr>
</table>
    </td></tr>
<?php
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['run_iframe'] != "R") {
        } else {
            return false;
        }
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['reg_start'] + 1,
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['total'] + 1,
            ],
            $summaryLine
        );

        return $summaryLine;
    } // getSummaryLine

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1']['ordem_ord'] == " desc") {
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
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "edad":
                return true;
            case "Id_Procedimiento":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "edad":
                return 'desc';
            case "Id_Tipo_Evento":
                return 'desc';
            case "Id_Eps":
                return 'desc';
            case "Id_Seguridad_Social":
                return 'desc';
            case "Id_Barrio":
                return 'desc';
            case "hora_ingreso_llamada":
                return 'desc';
            case "Hora_notifica_movil":
                return 'desc';
            case "hora_llegada_sitio":
                return 'desc';
            case "hora_llegada_ips":
                return 'desc';
            case "hora_salida_ips":
                return 'desc';
            case "Id_Movil":
                return 'desc';
            case "Id_Ips":
                return 'desc';
            case "Id_Medico":
                return 'desc';
            case "Id_Ciudad":
                return 'desc';
            case "Id_Procedimiento":
                return 'desc';
            case "fecha":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }

}
?>
