<?php
//
class procedimiento_final_apl
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
   var $id_procedimiento_;
   var $secad_;
   var $consecutivo_;
   var $quien_reporta_;
   var $quien_reporta__1;
   var $direccion_servicio_;
   var $id_barrio_;
   var $id_barrio__1;
   var $tipo_servicio_;
   var $tipo_servicio__1;
   var $numero_contacto_;
   var $radicado_;
   var $nombre_apellido_;
   var $tipo_documento_;
   var $tipo_documento__1;
   var $documento_identidad_;
   var $edad_;
   var $genero_;
   var $circunstancias_emergencia_;
   var $id_seguridad_social_;
   var $id_seguridad_social__1;
   var $id_eps_;
   var $id_eps__1;
   var $fecha_;
   var $ip_;
   var $login_;
   var $hora_ingreso_llamada_;
   var $hora_notifica_movil_;
   var $hora_llegada_sitio_;
   var $hora_llegada_ips_;
   var $hora_salida_ips_;
   var $id_movil_;
   var $id_movil__1;
   var $id_ips_;
   var $id_ips__1;
   var $tipo_caso_;
   var $tipo_caso__1;
   var $operador_;
   var $id_medico_;
   var $id_medico__1;
   var $id_tipo_evento_;
   var $id_tipo_evento__1;
   var $observaciones_;
   var $zona_;
   var $zona__1;
   var $discapacidad_;
   var $discapacidad__1;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_procedimiento_final = array();
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['circunstancias_emergencia_']))
          {
              $this->circunstancias_emergencia_ = $this->NM_ajax_info['param']['circunstancias_emergencia_'];
          }
          if (isset($this->NM_ajax_info['param']['consecutivo_']))
          {
              $this->consecutivo_ = $this->NM_ajax_info['param']['consecutivo_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['direccion_servicio_']))
          {
              $this->direccion_servicio_ = $this->NM_ajax_info['param']['direccion_servicio_'];
          }
          if (isset($this->NM_ajax_info['param']['discapacidad_']))
          {
              $this->discapacidad_ = $this->NM_ajax_info['param']['discapacidad_'];
          }
          if (isset($this->NM_ajax_info['param']['documento_identidad_']))
          {
              $this->documento_identidad_ = $this->NM_ajax_info['param']['documento_identidad_'];
          }
          if (isset($this->NM_ajax_info['param']['edad_']))
          {
              $this->edad_ = $this->NM_ajax_info['param']['edad_'];
          }
          if (isset($this->NM_ajax_info['param']['genero_']))
          {
              $this->genero_ = $this->NM_ajax_info['param']['genero_'];
          }
          if (isset($this->NM_ajax_info['param']['hora_ingreso_llamada_']))
          {
              $this->hora_ingreso_llamada_ = $this->NM_ajax_info['param']['hora_ingreso_llamada_'];
          }
          if (isset($this->NM_ajax_info['param']['hora_llegada_ips_']))
          {
              $this->hora_llegada_ips_ = $this->NM_ajax_info['param']['hora_llegada_ips_'];
          }
          if (isset($this->NM_ajax_info['param']['hora_llegada_sitio_']))
          {
              $this->hora_llegada_sitio_ = $this->NM_ajax_info['param']['hora_llegada_sitio_'];
          }
          if (isset($this->NM_ajax_info['param']['hora_notifica_movil_']))
          {
              $this->hora_notifica_movil_ = $this->NM_ajax_info['param']['hora_notifica_movil_'];
          }
          if (isset($this->NM_ajax_info['param']['hora_salida_ips_']))
          {
              $this->hora_salida_ips_ = $this->NM_ajax_info['param']['hora_salida_ips_'];
          }
          if (isset($this->NM_ajax_info['param']['id_barrio_']))
          {
              $this->id_barrio_ = $this->NM_ajax_info['param']['id_barrio_'];
          }
          if (isset($this->NM_ajax_info['param']['id_eps_']))
          {
              $this->id_eps_ = $this->NM_ajax_info['param']['id_eps_'];
          }
          if (isset($this->NM_ajax_info['param']['id_ips_']))
          {
              $this->id_ips_ = $this->NM_ajax_info['param']['id_ips_'];
          }
          if (isset($this->NM_ajax_info['param']['id_medico_']))
          {
              $this->id_medico_ = $this->NM_ajax_info['param']['id_medico_'];
          }
          if (isset($this->NM_ajax_info['param']['id_movil_']))
          {
              $this->id_movil_ = $this->NM_ajax_info['param']['id_movil_'];
          }
          if (isset($this->NM_ajax_info['param']['id_procedimiento_']))
          {
              $this->id_procedimiento_ = $this->NM_ajax_info['param']['id_procedimiento_'];
          }
          if (isset($this->NM_ajax_info['param']['id_seguridad_social_']))
          {
              $this->id_seguridad_social_ = $this->NM_ajax_info['param']['id_seguridad_social_'];
          }
          if (isset($this->NM_ajax_info['param']['id_tipo_evento_']))
          {
              $this->id_tipo_evento_ = $this->NM_ajax_info['param']['id_tipo_evento_'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_apellido_']))
          {
              $this->nombre_apellido_ = $this->NM_ajax_info['param']['nombre_apellido_'];
          }
          if (isset($this->NM_ajax_info['param']['numero_contacto_']))
          {
              $this->numero_contacto_ = $this->NM_ajax_info['param']['numero_contacto_'];
          }
          if (isset($this->NM_ajax_info['param']['quien_reporta_']))
          {
              $this->quien_reporta_ = $this->NM_ajax_info['param']['quien_reporta_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['secad_']))
          {
              $this->secad_ = $this->NM_ajax_info['param']['secad_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_caso_']))
          {
              $this->tipo_caso_ = $this->NM_ajax_info['param']['tipo_caso_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_documento_']))
          {
              $this->tipo_documento_ = $this->NM_ajax_info['param']['tipo_documento_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_servicio_']))
          {
              $this->tipo_servicio_ = $this->NM_ajax_info['param']['tipo_servicio_'];
          }
          if (isset($this->NM_ajax_info['param']['zona_']))
          {
              $this->zona_ = $this->NM_ajax_info['param']['zona_'];
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
      $this->sc_conv_var['id_procedimiento'] = "id_procedimiento_";
      $this->sc_conv_var['secad'] = "secad_";
      $this->sc_conv_var['consecutivo'] = "consecutivo_";
      $this->sc_conv_var['quien_reporta'] = "quien_reporta_";
      $this->sc_conv_var['direccion_servicio'] = "direccion_servicio_";
      $this->sc_conv_var['id_barrio'] = "id_barrio_";
      $this->sc_conv_var['tipo_servicio'] = "tipo_servicio_";
      $this->sc_conv_var['numero_contacto'] = "numero_contacto_";
      $this->sc_conv_var['radicado'] = "radicado_";
      $this->sc_conv_var['nombre_apellido'] = "nombre_apellido_";
      $this->sc_conv_var['tipo_documento'] = "tipo_documento_";
      $this->sc_conv_var['documento_identidad'] = "documento_identidad_";
      $this->sc_conv_var['edad'] = "edad_";
      $this->sc_conv_var['genero'] = "genero_";
      $this->sc_conv_var['circunstancias_emergencia'] = "circunstancias_emergencia_";
      $this->sc_conv_var['id_seguridad_social'] = "id_seguridad_social_";
      $this->sc_conv_var['id_eps'] = "id_eps_";
      $this->sc_conv_var['fecha'] = "fecha_";
      $this->sc_conv_var['ip'] = "ip_";
      $this->sc_conv_var['login'] = "login_";
      $this->sc_conv_var['hora_ingreso_llamada'] = "hora_ingreso_llamada_";
      $this->sc_conv_var['hora_notifica_movil'] = "hora_notifica_movil_";
      $this->sc_conv_var['hora_llegada_sitio'] = "hora_llegada_sitio_";
      $this->sc_conv_var['hora_llegada_ips'] = "hora_llegada_ips_";
      $this->sc_conv_var['hora_salida_ips'] = "hora_salida_ips_";
      $this->sc_conv_var['id_movil'] = "id_movil_";
      $this->sc_conv_var['id_ips'] = "id_ips_";
      $this->sc_conv_var['tipo_caso'] = "tipo_caso_";
      $this->sc_conv_var['operador'] = "operador_";
      $this->sc_conv_var['id_medico'] = "id_medico_";
      $this->sc_conv_var['id_tipo_evento'] = "id_tipo_evento_";
      $this->sc_conv_var['observaciones'] = "observaciones_";
      $this->sc_conv_var['zona'] = "zona_";
      $this->sc_conv_var['discapacidad'] = "discapacidad_";
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['procedimiento_final']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['procedimiento_final']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
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
                 nm_limpa_str_procedimiento_final($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "Id_Procedimiento_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "Id_Procedimiento = '" . $this->Id_Procedimiento_ . "'";
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['procedimiento_final']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['procedimiento_final']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new procedimiento_final_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['initialize'])
          {
              $_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'on';
  $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['start'] = 'new';
$_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['procedimiento_final']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['procedimiento_final']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['procedimiento_final'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['procedimiento_final']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['procedimiento_final']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('procedimiento_final') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['procedimiento_final']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " procedimiento1";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "procedimiento_final")
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
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok_mult)  || "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err      = !isset($str_img_status_err_mult) || "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status          = "scFormInputErrorMult";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorMultPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorMultPwdText";
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



      $_SESSION['scriptcase']['error_icon']['procedimiento_final']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['procedimiento_final'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      $this->nmgp_botoes['reload'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['procedimiento_final']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['procedimiento_final'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['procedimiento_final'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("procedimiento_final", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'procedimiento_final_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'procedimiento_final_help.txt');
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
          require_once($this->Ini->path_embutida . 'procedimiento_final/procedimiento_final_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "procedimiento_final_erro.class.php"); 
      }
      $this->Erro      = new procedimiento_final_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao']))
         { 
             if ($this->id_procedimiento_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
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

            $out1_img_cache = $_SESSION['scriptcase']['procedimiento_final']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['procedimiento_final']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- edad_
      $this->field_config['edad_']               = array();
      $this->field_config['edad_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['edad_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['edad_']['symbol_dec'] = '';
      $this->field_config['edad_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['edad_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- hora_ingreso_llamada_
      $this->field_config['hora_ingreso_llamada_']                 = array();
      $this->field_config['hora_ingreso_llamada_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_ingreso_llamada_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_ingreso_llamada_']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_ingreso_llamada_');
      //-- hora_notifica_movil_
      $this->field_config['hora_notifica_movil_']                 = array();
      $this->field_config['hora_notifica_movil_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_notifica_movil_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_notifica_movil_']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_notifica_movil_');
      //-- hora_llegada_sitio_
      $this->field_config['hora_llegada_sitio_']                 = array();
      $this->field_config['hora_llegada_sitio_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_llegada_sitio_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_llegada_sitio_']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_llegada_sitio_');
      //-- hora_llegada_ips_
      $this->field_config['hora_llegada_ips_']                 = array();
      $this->field_config['hora_llegada_ips_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_llegada_ips_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_llegada_ips_']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_llegada_ips_');
      //-- hora_salida_ips_
      $this->field_config['hora_salida_ips_']                 = array();
      $this->field_config['hora_salida_ips_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_salida_ips_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_salida_ips_']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_salida_ips_');
      //-- id_procedimiento_
      $this->field_config['id_procedimiento_']               = array();
      $this->field_config['id_procedimiento_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_procedimiento_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_procedimiento_']['symbol_dec'] = '';
      $this->field_config['id_procedimiento_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_procedimiento_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_
      $this->field_config['fecha_']                 = array();
      $this->field_config['fecha_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Gera_log_access'] = false;
      }
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg'] = $this->nmgp_max_line;
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

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opc_edit'] = true;  
      $this->SC_log_arr_vert = array();
      $sc_contr_vert = (isset($GLOBALS["sc_contr_vert"])) ? $GLOBALS["sc_contr_vert"] : "";
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (isset($GLOBALS["sc_check_vert"]) && is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         procedimiento_final_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_converte_datas();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         procedimiento_final_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->secad_)) { $this->nm_limpa_alfa($this->secad_); }
         if (isset($this->consecutivo_)) { $this->nm_limpa_alfa($this->consecutivo_); }
         if (isset($this->quien_reporta_)) { $this->nm_limpa_alfa($this->quien_reporta_); }
         if (isset($this->direccion_servicio_)) { $this->nm_limpa_alfa($this->direccion_servicio_); }
         if (isset($this->id_barrio_)) { $this->nm_limpa_alfa($this->id_barrio_); }
         if (isset($this->tipo_servicio_)) { $this->nm_limpa_alfa($this->tipo_servicio_); }
         if (isset($this->numero_contacto_)) { $this->nm_limpa_alfa($this->numero_contacto_); }
         if (isset($this->nombre_apellido_)) { $this->nm_limpa_alfa($this->nombre_apellido_); }
         if (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
         if (isset($this->documento_identidad_)) { $this->nm_limpa_alfa($this->documento_identidad_); }
         if (isset($this->edad_)) { $this->nm_limpa_alfa($this->edad_); }
         if (isset($this->genero_)) { $this->nm_limpa_alfa($this->genero_); }
         if (isset($this->circunstancias_emergencia_)) { $this->nm_limpa_alfa($this->circunstancias_emergencia_); }
         if (isset($this->id_seguridad_social_)) { $this->nm_limpa_alfa($this->id_seguridad_social_); }
         if (isset($this->id_eps_)) { $this->nm_limpa_alfa($this->id_eps_); }
         if (isset($this->id_movil_)) { $this->nm_limpa_alfa($this->id_movil_); }
         if (isset($this->id_ips_)) { $this->nm_limpa_alfa($this->id_ips_); }
         if (isset($this->tipo_caso_)) { $this->nm_limpa_alfa($this->tipo_caso_); }
         if (isset($this->id_medico_)) { $this->nm_limpa_alfa($this->id_medico_); }
         if (isset($this->id_tipo_evento_)) { $this->nm_limpa_alfa($this->id_tipo_evento_); }
         if (isset($this->zona_)) { $this->nm_limpa_alfa($this->zona_); }
         if (isset($this->discapacidad_)) { $this->nm_limpa_alfa($this->discapacidad_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'][$sc_seq_vert];
             $this->id_procedimiento_ = $this->nmgp_dados_form['id_procedimiento_']; 
             $this->radicado_ = $this->nmgp_dados_form['radicado_']; 
             $this->fecha_ = $this->nmgp_dados_form['fecha_']; 
             $this->ip_ = $this->nmgp_dados_form['ip_']; 
             $this->login_ = $this->nmgp_dados_form['login_']; 
             $this->operador_ = $this->nmgp_dados_form['operador_']; 
             $this->observaciones_ = $this->nmgp_dados_form['observaciones_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_procedimiento_final']) || !is_array($this->NM_ajax_info['errList']['geral_procedimiento_final']))
                  {
                      $this->NM_ajax_info['errList']['geral_procedimiento_final'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_procedimiento_final'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_procedimiento_final'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_procedimiento_final'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             if ($this->SC_log_atv)
             {
                 $this->SC_log_arr_vert[] = $this->SC_log_arr;
                 $this->SC_log_atv = false;
             }
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
                if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
                        $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
                }
                if ('incluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
                        $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmi']);
                }
                if ('excluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
                        $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmd']);
                }
         procedimiento_final_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_consecutivo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'consecutivo_');
          }
          if ('validate_secad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'secad_');
          }
          if ('validate_quien_reporta_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'quien_reporta_');
          }
          if ('validate_discapacidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discapacidad_');
          }
          if ('validate_nombre_apellido_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_apellido_');
          }
          if ('validate_tipo_documento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_documento_');
          }
          if ('validate_documento_identidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'documento_identidad_');
          }
          if ('validate_edad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'edad_');
          }
          if ('validate_numero_contacto_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_contacto_');
          }
          if ('validate_genero_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'genero_');
          }
          if ('validate_id_tipo_evento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_tipo_evento_');
          }
          if ('validate_circunstancias_emergencia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'circunstancias_emergencia_');
          }
          if ('validate_id_eps_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_eps_');
          }
          if ('validate_id_seguridad_social_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_seguridad_social_');
          }
          if ('validate_zona_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zona_');
          }
          if ('validate_tipo_servicio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_servicio_');
          }
          if ('validate_id_barrio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_barrio_');
          }
          if ('validate_direccion_servicio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion_servicio_');
          }
          if ('validate_hora_ingreso_llamada_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_ingreso_llamada_');
          }
          if ('validate_hora_notifica_movil_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_notifica_movil_');
          }
          if ('validate_hora_llegada_sitio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_llegada_sitio_');
          }
          if ('validate_hora_llegada_ips_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_llegada_ips_');
          }
          if ('validate_hora_salida_ips_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_salida_ips_');
          }
          if ('validate_id_movil_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_movil_');
          }
          if ('validate_id_ips_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_ips_');
          }
          if ('validate_tipo_caso_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_caso_');
          }
          if ('validate_id_medico_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_medico_');
          }
          procedimiento_final_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->consecutivo_ = $GLOBALS["consecutivo_" . $sc_seq_vert]; 
         $this->secad_ = $GLOBALS["secad_" . $sc_seq_vert]; 
         $this->quien_reporta_ = $GLOBALS["quien_reporta_" . $sc_seq_vert]; 
         $this->discapacidad_ = $GLOBALS["discapacidad_" . $sc_seq_vert]; 
         $this->nombre_apellido_ = $GLOBALS["nombre_apellido_" . $sc_seq_vert]; 
         $this->tipo_documento_ = $GLOBALS["tipo_documento_" . $sc_seq_vert]; 
         $this->documento_identidad_ = $GLOBALS["documento_identidad_" . $sc_seq_vert]; 
         $this->edad_ = $GLOBALS["edad_" . $sc_seq_vert]; 
         $this->numero_contacto_ = $GLOBALS["numero_contacto_" . $sc_seq_vert]; 
         $this->genero_ = $GLOBALS["genero_" . $sc_seq_vert]; 
         $this->id_tipo_evento_ = $GLOBALS["id_tipo_evento_" . $sc_seq_vert]; 
         $this->circunstancias_emergencia_ = $GLOBALS["circunstancias_emergencia_" . $sc_seq_vert]; 
         $this->id_eps_ = $GLOBALS["id_eps_" . $sc_seq_vert]; 
         $this->id_seguridad_social_ = $GLOBALS["id_seguridad_social_" . $sc_seq_vert]; 
         $this->zona_ = $GLOBALS["zona_" . $sc_seq_vert]; 
         $this->tipo_servicio_ = $GLOBALS["tipo_servicio_" . $sc_seq_vert]; 
         $this->id_barrio_ = $GLOBALS["id_barrio_" . $sc_seq_vert]; 
         $this->direccion_servicio_ = $GLOBALS["direccion_servicio_" . $sc_seq_vert]; 
         $this->hora_ingreso_llamada_ = $GLOBALS["hora_ingreso_llamada_" . $sc_seq_vert]; 
         $this->hora_notifica_movil_ = $GLOBALS["hora_notifica_movil_" . $sc_seq_vert]; 
         $this->hora_llegada_sitio_ = $GLOBALS["hora_llegada_sitio_" . $sc_seq_vert]; 
         $this->hora_llegada_ips_ = $GLOBALS["hora_llegada_ips_" . $sc_seq_vert]; 
         $this->hora_salida_ips_ = $GLOBALS["hora_salida_ips_" . $sc_seq_vert]; 
         $this->id_movil_ = $GLOBALS["id_movil_" . $sc_seq_vert]; 
         $this->id_ips_ = $GLOBALS["id_ips_" . $sc_seq_vert]; 
         $this->tipo_caso_ = $GLOBALS["tipo_caso_" . $sc_seq_vert]; 
         $this->id_medico_ = $GLOBALS["id_medico_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'][$sc_seq_vert];
             $this->id_procedimiento_ = $this->nmgp_dados_form['id_procedimiento_']; 
             $this->radicado_ = $this->nmgp_dados_form['radicado_']; 
             $this->fecha_ = $this->nmgp_dados_form['fecha_']; 
             $this->ip_ = $this->nmgp_dados_form['ip_']; 
             $this->login_ = $this->nmgp_dados_form['login_']; 
             $this->operador_ = $this->nmgp_dados_form['operador_']; 
             $this->observaciones_ = $this->nmgp_dados_form['observaciones_']; 
         }
         if (isset($this->secad_)) { $this->nm_limpa_alfa($this->secad_); }
         if (isset($this->consecutivo_)) { $this->nm_limpa_alfa($this->consecutivo_); }
         if (isset($this->quien_reporta_)) { $this->nm_limpa_alfa($this->quien_reporta_); }
         if (isset($this->direccion_servicio_)) { $this->nm_limpa_alfa($this->direccion_servicio_); }
         if (isset($this->id_barrio_)) { $this->nm_limpa_alfa($this->id_barrio_); }
         if (isset($this->tipo_servicio_)) { $this->nm_limpa_alfa($this->tipo_servicio_); }
         if (isset($this->numero_contacto_)) { $this->nm_limpa_alfa($this->numero_contacto_); }
         if (isset($this->nombre_apellido_)) { $this->nm_limpa_alfa($this->nombre_apellido_); }
         if (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
         if (isset($this->documento_identidad_)) { $this->nm_limpa_alfa($this->documento_identidad_); }
         if (isset($this->edad_)) { $this->nm_limpa_alfa($this->edad_); }
         if (isset($this->genero_)) { $this->nm_limpa_alfa($this->genero_); }
         if (isset($this->circunstancias_emergencia_)) { $this->nm_limpa_alfa($this->circunstancias_emergencia_); }
         if (isset($this->id_seguridad_social_)) { $this->nm_limpa_alfa($this->id_seguridad_social_); }
         if (isset($this->id_eps_)) { $this->nm_limpa_alfa($this->id_eps_); }
         if (isset($this->id_movil_)) { $this->nm_limpa_alfa($this->id_movil_); }
         if (isset($this->id_ips_)) { $this->nm_limpa_alfa($this->id_ips_); }
         if (isset($this->tipo_caso_)) { $this->nm_limpa_alfa($this->tipo_caso_); }
         if (isset($this->id_medico_)) { $this->nm_limpa_alfa($this->id_medico_); }
         if (isset($this->id_tipo_evento_)) { $this->nm_limpa_alfa($this->id_tipo_evento_); }
         if (isset($this->zona_)) { $this->nm_limpa_alfa($this->zona_); }
         if (isset($this->discapacidad_)) { $this->nm_limpa_alfa($this->discapacidad_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             elseif ($this->SC_log_atv)
             {
                 $this->SC_log_arr_vert[] = $this->SC_log_arr;
                 $this->SC_log_atv = false;
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_procedimiento_final[$sc_seq_vert]['consecutivo_'] =  $this->consecutivo_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['secad_'] =  $this->secad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['quien_reporta_'] =  $this->quien_reporta_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['discapacidad_'] =  $this->discapacidad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['nombre_apellido_'] =  $this->nombre_apellido_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['documento_identidad_'] =  $this->documento_identidad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['edad_'] =  $this->edad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['numero_contacto_'] =  $this->numero_contacto_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['genero_'] =  $this->genero_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_tipo_evento_'] =  $this->id_tipo_evento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['circunstancias_emergencia_'] =  $this->circunstancias_emergencia_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_eps_'] =  $this->id_eps_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_seguridad_social_'] =  $this->id_seguridad_social_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['zona_'] =  $this->zona_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_servicio_'] =  $this->tipo_servicio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_barrio_'] =  $this->id_barrio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['direccion_servicio_'] =  $this->direccion_servicio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_ingreso_llamada_'] =  $this->hora_ingreso_llamada_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_notifica_movil_'] =  $this->hora_notifica_movil_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_sitio_'] =  $this->hora_llegada_sitio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_ips_'] =  $this->hora_llegada_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_salida_ips_'] =  $this->hora_salida_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_movil_'] =  $this->id_movil_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_ips_'] =  $this->id_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_caso_'] =  $this->tipo_caso_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_medico_'] =  $this->id_medico_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_procedimiento_'] =  $this->id_procedimiento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['radicado_'] =  $this->radicado_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['fecha_'] =  $this->fecha_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['ip_'] =  $this->ip_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['login_'] =  $this->login_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['operador_'] =  $this->operador_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          procedimiento_final_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_procedimiento_final);
          $this->NM_ajax_info['fldList']['id_procedimiento_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_procedimiento_']);
          $this->NM_close_db();
          procedimiento_final_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_nombre_apellido__onchange' == $this->NM_ajax_opcao)
          {
              $this->nombre_apellido__onChange();
          }
          $this->NM_close_db();
          procedimiento_final_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['inline_form_seq'] = $this->sc_seq_row;
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
              procedimiento_final_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
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
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "procedimiento_final.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final'][$path_doc_md5][1] = $Zip_name;
?><!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " procedimiento1") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
<form name="Fdown" method="get" action="procedimiento_final_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="procedimiento_final"> 
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
       foreach ($this->SC_log_arr_vert as $this->SC_log_arr)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date1'];
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
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'procedimiento_final', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'procedimiento_final', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'procedimiento_final', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               procedimiento_final_pack_ajax_response();
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
           case 'consecutivo_':
               return "Radicado Cruemt";
               break;
           case 'secad_':
               return "Secad";
               break;
           case 'quien_reporta_':
               return "Quien Reporta";
               break;
           case 'discapacidad_':
               return "Discapacidad";
               break;
           case 'nombre_apellido_':
               return "Nombre Apellido";
               break;
           case 'tipo_documento_':
               return "Tipo Documento";
               break;
           case 'documento_identidad_':
               return "Documento Identidad";
               break;
           case 'edad_':
               return "Edad";
               break;
           case 'numero_contacto_':
               return "Numero Contacto";
               break;
           case 'genero_':
               return "Genero";
               break;
           case 'id_tipo_evento_':
               return "Tipo Evento";
               break;
           case 'circunstancias_emergencia_':
               return "Circunstancias Emergencia";
               break;
           case 'id_eps_':
               return "Eps";
               break;
           case 'id_seguridad_social_':
               return "Seguridad Social";
               break;
           case 'zona_':
               return "Zona";
               break;
           case 'tipo_servicio_':
               return "Tipo Servicio";
               break;
           case 'id_barrio_':
               return "Barrio";
               break;
           case 'direccion_servicio_':
               return "Dirección Servicio";
               break;
           case 'hora_ingreso_llamada_':
               return "Hora Ingreso Llamada";
               break;
           case 'hora_notifica_movil_':
               return "Hora Notifica Movil";
               break;
           case 'hora_llegada_sitio_':
               return "Hora Llegada Sitio";
               break;
           case 'hora_llegada_ips_':
               return "Hora Llegada Ips";
               break;
           case 'hora_salida_ips_':
               return "Hora Salida Ips";
               break;
           case 'id_movil_':
               return "Móvil que atiende";
               break;
           case 'id_ips_':
               return "Direccionamiento";
               break;
           case 'tipo_caso_':
               return "Tipo Caso";
               break;
           case 'id_medico_':
               return "Id Medico";
               break;
           case 'id_procedimiento_':
               return "Id Procedimiento";
               break;
           case 'radicado_':
               return "Radicado";
               break;
           case 'fecha_':
               return "Fecha";
               break;
           case 'ip_':
               return "Ip";
               break;
           case 'login_':
               return "Login";
               break;
           case 'operador_':
               return "Operador";
               break;
           case 'observaciones_':
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
     global $nm_browser, $teste_validade, $sc_seq_vert;
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
              if (!isset($this->NM_ajax_info['errList']['geral_procedimiento_final']) || !is_array($this->NM_ajax_info['errList']['geral_procedimiento_final']))
              {
                  $this->NM_ajax_info['errList']['geral_procedimiento_final'] = array();
              }
              $this->NM_ajax_info['errList']['geral_procedimiento_final'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'consecutivo_' == $filtro)) || (is_array($filtro) && in_array('consecutivo_', $filtro)))
        $this->ValidateField_consecutivo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'secad_' == $filtro)) || (is_array($filtro) && in_array('secad_', $filtro)))
        $this->ValidateField_secad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'quien_reporta_' == $filtro)) || (is_array($filtro) && in_array('quien_reporta_', $filtro)))
        $this->ValidateField_quien_reporta_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'discapacidad_' == $filtro)) || (is_array($filtro) && in_array('discapacidad_', $filtro)))
        $this->ValidateField_discapacidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_apellido_' == $filtro)) || (is_array($filtro) && in_array('nombre_apellido_', $filtro)))
        $this->ValidateField_nombre_apellido_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_documento_' == $filtro)) || (is_array($filtro) && in_array('tipo_documento_', $filtro)))
        $this->ValidateField_tipo_documento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'documento_identidad_' == $filtro)) || (is_array($filtro) && in_array('documento_identidad_', $filtro)))
        $this->ValidateField_documento_identidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'edad_' == $filtro)) || (is_array($filtro) && in_array('edad_', $filtro)))
        $this->ValidateField_edad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero_contacto_' == $filtro)) || (is_array($filtro) && in_array('numero_contacto_', $filtro)))
        $this->ValidateField_numero_contacto_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'genero_' == $filtro)) || (is_array($filtro) && in_array('genero_', $filtro)))
        $this->ValidateField_genero_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_tipo_evento_' == $filtro)) || (is_array($filtro) && in_array('id_tipo_evento_', $filtro)))
        $this->ValidateField_id_tipo_evento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'circunstancias_emergencia_' == $filtro)) || (is_array($filtro) && in_array('circunstancias_emergencia_', $filtro)))
        $this->ValidateField_circunstancias_emergencia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_eps_' == $filtro)) || (is_array($filtro) && in_array('id_eps_', $filtro)))
        $this->ValidateField_id_eps_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_seguridad_social_' == $filtro)) || (is_array($filtro) && in_array('id_seguridad_social_', $filtro)))
        $this->ValidateField_id_seguridad_social_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'zona_' == $filtro)) || (is_array($filtro) && in_array('zona_', $filtro)))
        $this->ValidateField_zona_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_servicio_' == $filtro)) || (is_array($filtro) && in_array('tipo_servicio_', $filtro)))
        $this->ValidateField_tipo_servicio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_barrio_' == $filtro)) || (is_array($filtro) && in_array('id_barrio_', $filtro)))
        $this->ValidateField_id_barrio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'direccion_servicio_' == $filtro)) || (is_array($filtro) && in_array('direccion_servicio_', $filtro)))
        $this->ValidateField_direccion_servicio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_ingreso_llamada_' == $filtro)) || (is_array($filtro) && in_array('hora_ingreso_llamada_', $filtro)))
        $this->ValidateField_hora_ingreso_llamada_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_notifica_movil_' == $filtro)) || (is_array($filtro) && in_array('hora_notifica_movil_', $filtro)))
        $this->ValidateField_hora_notifica_movil_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_llegada_sitio_' == $filtro)) || (is_array($filtro) && in_array('hora_llegada_sitio_', $filtro)))
        $this->ValidateField_hora_llegada_sitio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_llegada_ips_' == $filtro)) || (is_array($filtro) && in_array('hora_llegada_ips_', $filtro)))
        $this->ValidateField_hora_llegada_ips_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hora_salida_ips_' == $filtro)) || (is_array($filtro) && in_array('hora_salida_ips_', $filtro)))
        $this->ValidateField_hora_salida_ips_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_movil_' == $filtro)) || (is_array($filtro) && in_array('id_movil_', $filtro)))
        $this->ValidateField_id_movil_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_ips_' == $filtro)) || (is_array($filtro) && in_array('id_ips_', $filtro)))
        $this->ValidateField_id_ips_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_caso_' == $filtro)) || (is_array($filtro) && in_array('tipo_caso_', $filtro)))
        $this->ValidateField_tipo_caso_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_medico_' == $filtro)) || (is_array($filtro) && in_array('id_medico_', $filtro)))
        $this->ValidateField_id_medico_($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
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

    function ValidateField_consecutivo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['consecutivo_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['consecutivo_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['consecutivo_'] == "on")) 
      { 
          if ($this->consecutivo_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Radicado Cruemt" ; 
              if (!isset($Campos_Erros['consecutivo_']))
              {
                  $Campos_Erros['consecutivo_'] = array();
              }
              $Campos_Erros['consecutivo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['consecutivo_']) || !is_array($this->NM_ajax_info['errList']['consecutivo_']))
                  {
                      $this->NM_ajax_info['errList']['consecutivo_'] = array();
                  }
                  $this->NM_ajax_info['errList']['consecutivo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->consecutivo_) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Radicado Cruemt " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['consecutivo_']))
              {
                  $Campos_Erros['consecutivo_'] = array();
              }
              $Campos_Erros['consecutivo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['consecutivo_']) || !is_array($this->NM_ajax_info['errList']['consecutivo_']))
              {
                  $this->NM_ajax_info['errList']['consecutivo_'] = array();
              }
              $this->NM_ajax_info['errList']['consecutivo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'consecutivo_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_consecutivo_

    function ValidateField_secad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['secad_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->secad_) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Secad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['secad_']))
              {
                  $Campos_Erros['secad_'] = array();
              }
              $Campos_Erros['secad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['secad_']) || !is_array($this->NM_ajax_info['errList']['secad_']))
              {
                  $this->NM_ajax_info['errList']['secad_'] = array();
              }
              $this->NM_ajax_info['errList']['secad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'secad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_secad_

    function ValidateField_quien_reporta_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['quien_reporta_'])) {
       return;
   }
      if ($this->quien_reporta_ == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['quien_reporta_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['quien_reporta_'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Quien Reporta" ;
          if (!isset($Campos_Erros['quien_reporta_']))
          {
              $Campos_Erros['quien_reporta_'] = array();
          }
          $Campos_Erros['quien_reporta_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['quien_reporta_']) || !is_array($this->NM_ajax_info['errList']['quien_reporta_']))
                  {
                      $this->NM_ajax_info['errList']['quien_reporta_'] = array();
                  }
                  $this->NM_ajax_info['errList']['quien_reporta_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'quien_reporta_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_quien_reporta_

    function ValidateField_discapacidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['discapacidad_'])) {
       return;
   }
      if ($this->discapacidad_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'discapacidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_discapacidad_

    function ValidateField_nombre_apellido_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['nombre_apellido_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_apellido_) > 90) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_apellido_']))
              {
                  $Campos_Erros['nombre_apellido_'] = array();
              }
              $Campos_Erros['nombre_apellido_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_apellido_']) || !is_array($this->NM_ajax_info['errList']['nombre_apellido_']))
              {
                  $this->NM_ajax_info['errList']['nombre_apellido_'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_apellido_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_apellido_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_apellido_

    function ValidateField_tipo_documento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['tipo_documento_'])) {
       return;
   }
      if ($this->tipo_documento_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_documento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_documento_

    function ValidateField_documento_identidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['documento_identidad_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->documento_identidad_) > 250) 
          { 
              $hasError = true;
              $Campos_Crit .= "Documento Identidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['documento_identidad_']))
              {
                  $Campos_Erros['documento_identidad_'] = array();
              }
              $Campos_Erros['documento_identidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['documento_identidad_']) || !is_array($this->NM_ajax_info['errList']['documento_identidad_']))
              {
                  $this->NM_ajax_info['errList']['documento_identidad_'] = array();
              }
              $this->NM_ajax_info['errList']['documento_identidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'documento_identidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_documento_identidad_

    function ValidateField_edad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['edad_'])) {
          nm_limpa_numero($this->edad_, $this->field_config['edad_']['symbol_grp']) ; 
          return;
      }
      if ($this->edad_ === "" || is_null($this->edad_))  
      { 
          $this->edad_ = 0;
          $this->sc_force_zero[] = 'edad_';
      } 
      nm_limpa_numero($this->edad_, $this->field_config['edad_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->edad_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->edad_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Edad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['edad_']))
                  {
                      $Campos_Erros['edad_'] = array();
                  }
                  $Campos_Erros['edad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['edad_']) || !is_array($this->NM_ajax_info['errList']['edad_']))
                  {
                      $this->NM_ajax_info['errList']['edad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['edad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->edad_, 11, 0, 0, 150, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Edad; " ; 
                  if (!isset($Campos_Erros['edad_']))
                  {
                      $Campos_Erros['edad_'] = array();
                  }
                  $Campos_Erros['edad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['edad_']) || !is_array($this->NM_ajax_info['errList']['edad_']))
                  {
                      $this->NM_ajax_info['errList']['edad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['edad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'edad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_edad_

    function ValidateField_numero_contacto_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['numero_contacto_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_contacto_) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numero Contacto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_contacto_']))
              {
                  $Campos_Erros['numero_contacto_'] = array();
              }
              $Campos_Erros['numero_contacto_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_contacto_']) || !is_array($this->NM_ajax_info['errList']['numero_contacto_']))
              {
                  $this->NM_ajax_info['errList']['numero_contacto_'] = array();
              }
              $this->NM_ajax_info['errList']['numero_contacto_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero_contacto_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero_contacto_

    function ValidateField_genero_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['genero_'])) {
       return;
   }
      if ($this->genero_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->genero_ != "" && !in_array("genero_", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_']) && !in_array($this->genero_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['genero_']))
              {
                  $Campos_Erros['genero_'] = array();
              }
              $Campos_Erros['genero_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['genero_']) || !is_array($this->NM_ajax_info['errList']['genero_']))
              {
                  $this->NM_ajax_info['errList']['genero_'] = array();
              }
              $this->NM_ajax_info['errList']['genero_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'genero_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_genero_

    function ValidateField_id_tipo_evento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_tipo_evento_'])) {
       return;
   }
               if (!empty($this->id_tipo_evento_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']) && !in_array($this->id_tipo_evento_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_tipo_evento_']))
                   {
                       $Campos_Erros['id_tipo_evento_'] = array();
                   }
                   $Campos_Erros['id_tipo_evento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_tipo_evento_']) || !is_array($this->NM_ajax_info['errList']['id_tipo_evento_']))
                   {
                       $this->NM_ajax_info['errList']['id_tipo_evento_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_tipo_evento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_tipo_evento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_tipo_evento_

    function ValidateField_circunstancias_emergencia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['circunstancias_emergencia_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['circunstancias_emergencia_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['circunstancias_emergencia_'] == "on")) 
      { 
          if ($this->circunstancias_emergencia_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Circunstancias Emergencia" ; 
              if (!isset($Campos_Erros['circunstancias_emergencia_']))
              {
                  $Campos_Erros['circunstancias_emergencia_'] = array();
              }
              $Campos_Erros['circunstancias_emergencia_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['circunstancias_emergencia_']) || !is_array($this->NM_ajax_info['errList']['circunstancias_emergencia_']))
                  {
                      $this->NM_ajax_info['errList']['circunstancias_emergencia_'] = array();
                  }
                  $this->NM_ajax_info['errList']['circunstancias_emergencia_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->circunstancias_emergencia_) > 2500) 
          { 
              $hasError = true;
              $Campos_Crit .= "Circunstancias Emergencia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2500 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['circunstancias_emergencia_']))
              {
                  $Campos_Erros['circunstancias_emergencia_'] = array();
              }
              $Campos_Erros['circunstancias_emergencia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['circunstancias_emergencia_']) || !is_array($this->NM_ajax_info['errList']['circunstancias_emergencia_']))
              {
                  $this->NM_ajax_info['errList']['circunstancias_emergencia_'] = array();
              }
              $this->NM_ajax_info['errList']['circunstancias_emergencia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'circunstancias_emergencia_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_circunstancias_emergencia_

    function ValidateField_id_eps_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_eps_'])) {
       return;
   }
               if (!empty($this->id_eps_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']) && !in_array($this->id_eps_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_eps_']))
                   {
                       $Campos_Erros['id_eps_'] = array();
                   }
                   $Campos_Erros['id_eps_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_eps_']) || !is_array($this->NM_ajax_info['errList']['id_eps_']))
                   {
                       $this->NM_ajax_info['errList']['id_eps_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_eps_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_eps_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_eps_

    function ValidateField_id_seguridad_social_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_seguridad_social_'])) {
       return;
   }
               if (!empty($this->id_seguridad_social_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']) && !in_array($this->id_seguridad_social_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_seguridad_social_']))
                   {
                       $Campos_Erros['id_seguridad_social_'] = array();
                   }
                   $Campos_Erros['id_seguridad_social_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_seguridad_social_']) || !is_array($this->NM_ajax_info['errList']['id_seguridad_social_']))
                   {
                       $this->NM_ajax_info['errList']['id_seguridad_social_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_seguridad_social_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_seguridad_social_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_seguridad_social_

    function ValidateField_zona_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['zona_'])) {
       return;
   }
      if ($this->zona_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'zona_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_zona_

    function ValidateField_tipo_servicio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['tipo_servicio_'])) {
       return;
   }
      if ($this->tipo_servicio_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_servicio_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_servicio_

    function ValidateField_id_barrio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_barrio_'])) {
       return;
   }
               if (!empty($this->id_barrio_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']) && !in_array($this->id_barrio_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_barrio_']))
                   {
                       $Campos_Erros['id_barrio_'] = array();
                   }
                   $Campos_Erros['id_barrio_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_barrio_']) || !is_array($this->NM_ajax_info['errList']['id_barrio_']))
                   {
                       $this->NM_ajax_info['errList']['id_barrio_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_barrio_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_barrio_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_barrio_

    function ValidateField_direccion_servicio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['direccion_servicio_'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->direccion_servicio_) > 250) 
          { 
              $hasError = true;
              $Campos_Crit .= "Dirección Servicio " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['direccion_servicio_']))
              {
                  $Campos_Erros['direccion_servicio_'] = array();
              }
              $Campos_Erros['direccion_servicio_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['direccion_servicio_']) || !is_array($this->NM_ajax_info['errList']['direccion_servicio_']))
              {
                  $this->NM_ajax_info['errList']['direccion_servicio_'] = array();
              }
              $this->NM_ajax_info['errList']['direccion_servicio_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 250 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'direccion_servicio_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_direccion_servicio_

    function ValidateField_hora_ingreso_llamada_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_ingreso_llamada_, $this->field_config['hora_ingreso_llamada_']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_ingreso_llamada_'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_ingreso_llamada_']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_ingreso_llamada_']['time_sep']) ; 
          if (trim($this->hora_ingreso_llamada_) != "")  
          { 
              if ($teste_validade->Hora($this->hora_ingreso_llamada_, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Ingreso Llamada; " ; 
                  if (!isset($Campos_Erros['hora_ingreso_llamada_']))
                  {
                      $Campos_Erros['hora_ingreso_llamada_'] = array();
                  }
                  $Campos_Erros['hora_ingreso_llamada_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_ingreso_llamada_']) || !is_array($this->NM_ajax_info['errList']['hora_ingreso_llamada_']))
                  {
                      $this->NM_ajax_info['errList']['hora_ingreso_llamada_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_ingreso_llamada_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_ingreso_llamada_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_ingreso_llamada_

    function ValidateField_hora_notifica_movil_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_notifica_movil_, $this->field_config['hora_notifica_movil_']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_notifica_movil_'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_notifica_movil_']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_notifica_movil_']['time_sep']) ; 
          if (trim($this->hora_notifica_movil_) != "")  
          { 
              if ($teste_validade->Hora($this->hora_notifica_movil_, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Notifica Movil; " ; 
                  if (!isset($Campos_Erros['hora_notifica_movil_']))
                  {
                      $Campos_Erros['hora_notifica_movil_'] = array();
                  }
                  $Campos_Erros['hora_notifica_movil_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_notifica_movil_']) || !is_array($this->NM_ajax_info['errList']['hora_notifica_movil_']))
                  {
                      $this->NM_ajax_info['errList']['hora_notifica_movil_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_notifica_movil_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_notifica_movil_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_notifica_movil_

    function ValidateField_hora_llegada_sitio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_llegada_sitio_, $this->field_config['hora_llegada_sitio_']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_llegada_sitio_'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_llegada_sitio_']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_llegada_sitio_']['time_sep']) ; 
          if (trim($this->hora_llegada_sitio_) != "")  
          { 
              if ($teste_validade->Hora($this->hora_llegada_sitio_, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Llegada Sitio; " ; 
                  if (!isset($Campos_Erros['hora_llegada_sitio_']))
                  {
                      $Campos_Erros['hora_llegada_sitio_'] = array();
                  }
                  $Campos_Erros['hora_llegada_sitio_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_llegada_sitio_']) || !is_array($this->NM_ajax_info['errList']['hora_llegada_sitio_']))
                  {
                      $this->NM_ajax_info['errList']['hora_llegada_sitio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_llegada_sitio_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_llegada_sitio_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_llegada_sitio_

    function ValidateField_hora_llegada_ips_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_llegada_ips_, $this->field_config['hora_llegada_ips_']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_llegada_ips_'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_llegada_ips_']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_llegada_ips_']['time_sep']) ; 
          if (trim($this->hora_llegada_ips_) != "")  
          { 
              if ($teste_validade->Hora($this->hora_llegada_ips_, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Llegada Ips; " ; 
                  if (!isset($Campos_Erros['hora_llegada_ips_']))
                  {
                      $Campos_Erros['hora_llegada_ips_'] = array();
                  }
                  $Campos_Erros['hora_llegada_ips_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_llegada_ips_']) || !is_array($this->NM_ajax_info['errList']['hora_llegada_ips_']))
                  {
                      $this->NM_ajax_info['errList']['hora_llegada_ips_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_llegada_ips_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_llegada_ips_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_llegada_ips_

    function ValidateField_hora_salida_ips_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->hora_salida_ips_, $this->field_config['hora_salida_ips_']['time_sep']) ; 
      if (isset($this->Field_no_validate['hora_salida_ips_'])) {
          return;
      }
      $trab_hr_min = "";
      $trab_hr_max = "";
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_salida_ips_']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_salida_ips_']['time_sep']) ; 
          if (trim($this->hora_salida_ips_) != "")  
          { 
              if ($teste_validade->Hora($this->hora_salida_ips_, $Format_Hora, $trab_hr_min, $trab_hr_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Salida Ips; " ; 
                  if (!isset($Campos_Erros['hora_salida_ips_']))
                  {
                      $Campos_Erros['hora_salida_ips_'] = array();
                  }
                  $Campos_Erros['hora_salida_ips_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_salida_ips_']) || !is_array($this->NM_ajax_info['errList']['hora_salida_ips_']))
                  {
                      $this->NM_ajax_info['errList']['hora_salida_ips_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_salida_ips_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_salida_ips_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_salida_ips_

    function ValidateField_id_movil_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_movil_'])) {
       return;
   }
               if (!empty($this->id_movil_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']) && !in_array($this->id_movil_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_movil_']))
                   {
                       $Campos_Erros['id_movil_'] = array();
                   }
                   $Campos_Erros['id_movil_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_movil_']) || !is_array($this->NM_ajax_info['errList']['id_movil_']))
                   {
                       $this->NM_ajax_info['errList']['id_movil_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_movil_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_movil_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_movil_

    function ValidateField_id_ips_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_ips_'])) {
       return;
   }
               if (!empty($this->id_ips_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']) && !in_array($this->id_ips_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_ips_']))
                   {
                       $Campos_Erros['id_ips_'] = array();
                   }
                   $Campos_Erros['id_ips_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_ips_']) || !is_array($this->NM_ajax_info['errList']['id_ips_']))
                   {
                       $this->NM_ajax_info['errList']['id_ips_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_ips_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_ips_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_ips_

    function ValidateField_tipo_caso_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['tipo_caso_'])) {
       return;
   }
      if ($this->tipo_caso_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_caso_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_caso_

    function ValidateField_id_medico_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['id_medico_'])) {
       return;
   }
      if ($this->id_medico_ == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['id_medico_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['php_cmp_required']['id_medico_'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Id Medico" ; 
          if (!isset($Campos_Erros['id_medico_']))
          {
              $Campos_Erros['id_medico_'] = array();
          }
          $Campos_Erros['id_medico_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_medico_']) || !is_array($this->NM_ajax_info['errList']['id_medico_']))
          {
              $this->NM_ajax_info['errList']['id_medico_'] = array();
          }
          $this->NM_ajax_info['errList']['id_medico_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_medico_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']) && !in_array($this->id_medico_, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_medico_']))
              {
                  $Campos_Erros['id_medico_'] = array();
              }
              $Campos_Erros['id_medico_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_medico_']) || !is_array($this->NM_ajax_info['errList']['id_medico_']))
              {
                  $this->NM_ajax_info['errList']['id_medico_'] = array();
              }
              $this->NM_ajax_info['errList']['id_medico_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_medico_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_medico_

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
    $this->nmgp_dados_form['consecutivo_'] = $this->consecutivo_;
    $this->nmgp_dados_form['secad_'] = $this->secad_;
    $this->nmgp_dados_form['quien_reporta_'] = $this->quien_reporta_;
    $this->nmgp_dados_form['discapacidad_'] = $this->discapacidad_;
    $this->nmgp_dados_form['nombre_apellido_'] = $this->nombre_apellido_;
    $this->nmgp_dados_form['tipo_documento_'] = $this->tipo_documento_;
    $this->nmgp_dados_form['documento_identidad_'] = $this->documento_identidad_;
    $this->nmgp_dados_form['edad_'] = $this->edad_;
    $this->nmgp_dados_form['numero_contacto_'] = $this->numero_contacto_;
    $this->nmgp_dados_form['genero_'] = $this->genero_;
    $this->nmgp_dados_form['id_tipo_evento_'] = $this->id_tipo_evento_;
    $this->nmgp_dados_form['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
    $this->nmgp_dados_form['id_eps_'] = $this->id_eps_;
    $this->nmgp_dados_form['id_seguridad_social_'] = $this->id_seguridad_social_;
    $this->nmgp_dados_form['zona_'] = $this->zona_;
    $this->nmgp_dados_form['tipo_servicio_'] = $this->tipo_servicio_;
    $this->nmgp_dados_form['id_barrio_'] = $this->id_barrio_;
    $this->nmgp_dados_form['direccion_servicio_'] = $this->direccion_servicio_;
    $this->nmgp_dados_form['hora_ingreso_llamada_'] = (strlen(trim($this->hora_ingreso_llamada_)) > 19) ? str_replace(".", ":", $this->hora_ingreso_llamada_) : trim($this->hora_ingreso_llamada_);
    $this->nmgp_dados_form['hora_notifica_movil_'] = (strlen(trim($this->hora_notifica_movil_)) > 19) ? str_replace(".", ":", $this->hora_notifica_movil_) : trim($this->hora_notifica_movil_);
    $this->nmgp_dados_form['hora_llegada_sitio_'] = (strlen(trim($this->hora_llegada_sitio_)) > 19) ? str_replace(".", ":", $this->hora_llegada_sitio_) : trim($this->hora_llegada_sitio_);
    $this->nmgp_dados_form['hora_llegada_ips_'] = (strlen(trim($this->hora_llegada_ips_)) > 19) ? str_replace(".", ":", $this->hora_llegada_ips_) : trim($this->hora_llegada_ips_);
    $this->nmgp_dados_form['hora_salida_ips_'] = (strlen(trim($this->hora_salida_ips_)) > 19) ? str_replace(".", ":", $this->hora_salida_ips_) : trim($this->hora_salida_ips_);
    $this->nmgp_dados_form['id_movil_'] = $this->id_movil_;
    $this->nmgp_dados_form['id_ips_'] = $this->id_ips_;
    $this->nmgp_dados_form['tipo_caso_'] = $this->tipo_caso_;
    $this->nmgp_dados_form['id_medico_'] = $this->id_medico_;
    $this->nmgp_dados_form['id_procedimiento_'] = $this->id_procedimiento_;
    $this->nmgp_dados_form['radicado_'] = $this->radicado_;
    $this->nmgp_dados_form['fecha_'] = $this->fecha_;
    $this->nmgp_dados_form['ip_'] = $this->ip_;
    $this->nmgp_dados_form['login_'] = $this->login_;
    $this->nmgp_dados_form['operador_'] = $this->operador_;
    $this->nmgp_dados_form['observaciones_'] = $this->observaciones_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['edad_'] = $this->edad_;
      nm_limpa_numero($this->edad_, $this->field_config['edad_']['symbol_grp']) ; 
      $this->Before_unformat['hora_ingreso_llamada_'] = $this->hora_ingreso_llamada_;
      nm_limpa_hora($this->hora_ingreso_llamada_, $this->field_config['hora_ingreso_llamada_']['time_sep']) ; 
      $this->Before_unformat['hora_notifica_movil_'] = $this->hora_notifica_movil_;
      nm_limpa_hora($this->hora_notifica_movil_, $this->field_config['hora_notifica_movil_']['time_sep']) ; 
      $this->Before_unformat['hora_llegada_sitio_'] = $this->hora_llegada_sitio_;
      nm_limpa_hora($this->hora_llegada_sitio_, $this->field_config['hora_llegada_sitio_']['time_sep']) ; 
      $this->Before_unformat['hora_llegada_ips_'] = $this->hora_llegada_ips_;
      nm_limpa_hora($this->hora_llegada_ips_, $this->field_config['hora_llegada_ips_']['time_sep']) ; 
      $this->Before_unformat['hora_salida_ips_'] = $this->hora_salida_ips_;
      nm_limpa_hora($this->hora_salida_ips_, $this->field_config['hora_salida_ips_']['time_sep']) ; 
      $this->Before_unformat['id_procedimiento_'] = $this->id_procedimiento_;
      nm_limpa_numero($this->id_procedimiento_, $this->field_config['id_procedimiento_']['symbol_grp']) ; 
      $this->Before_unformat['fecha_'] = $this->fecha_;
      nm_limpa_data($this->fecha_, $this->field_config['fecha_']['date_sep']) ; 
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
      if ($Nome_Campo == "edad_")
      {
          nm_limpa_numero($this->edad_, $this->field_config['edad_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_procedimiento_")
      {
          nm_limpa_numero($this->id_procedimiento_, $this->field_config['id_procedimiento_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ('' !== $this->edad_ || (!empty($format_fields) && isset($format_fields['edad_'])))
      {
          nmgp_Form_Num_Val($this->edad_, $this->field_config['edad_']['symbol_grp'], $this->field_config['edad_']['symbol_dec'], "0", "S", $this->field_config['edad_']['format_neg'], "", "", "-", $this->field_config['edad_']['symbol_fmt']) ; 
      }
      if ((!empty($this->hora_ingreso_llamada_) && 'null' != $this->hora_ingreso_llamada_) || (!empty($format_fields) && isset($format_fields['hora_ingreso_llamada_'])))
      {
          nm_volta_hora($this->hora_ingreso_llamada_, $this->field_config['hora_ingreso_llamada_']['date_format']) ; 
          nmgp_Form_Hora($this->hora_ingreso_llamada_, $this->field_config['hora_ingreso_llamada_']['date_format'], $this->field_config['hora_ingreso_llamada_']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_ingreso_llamada_ || '' == $this->hora_ingreso_llamada_)
      {
          $this->hora_ingreso_llamada_ = '';
      }
      if ((!empty($this->hora_notifica_movil_) && 'null' != $this->hora_notifica_movil_) || (!empty($format_fields) && isset($format_fields['hora_notifica_movil_'])))
      {
          nm_volta_hora($this->hora_notifica_movil_, $this->field_config['hora_notifica_movil_']['date_format']) ; 
          nmgp_Form_Hora($this->hora_notifica_movil_, $this->field_config['hora_notifica_movil_']['date_format'], $this->field_config['hora_notifica_movil_']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_notifica_movil_ || '' == $this->hora_notifica_movil_)
      {
          $this->hora_notifica_movil_ = '';
      }
      if ((!empty($this->hora_llegada_sitio_) && 'null' != $this->hora_llegada_sitio_) || (!empty($format_fields) && isset($format_fields['hora_llegada_sitio_'])))
      {
          nm_volta_hora($this->hora_llegada_sitio_, $this->field_config['hora_llegada_sitio_']['date_format']) ; 
          nmgp_Form_Hora($this->hora_llegada_sitio_, $this->field_config['hora_llegada_sitio_']['date_format'], $this->field_config['hora_llegada_sitio_']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_llegada_sitio_ || '' == $this->hora_llegada_sitio_)
      {
          $this->hora_llegada_sitio_ = '';
      }
      if ((!empty($this->hora_llegada_ips_) && 'null' != $this->hora_llegada_ips_) || (!empty($format_fields) && isset($format_fields['hora_llegada_ips_'])))
      {
          nm_volta_hora($this->hora_llegada_ips_, $this->field_config['hora_llegada_ips_']['date_format']) ; 
          nmgp_Form_Hora($this->hora_llegada_ips_, $this->field_config['hora_llegada_ips_']['date_format'], $this->field_config['hora_llegada_ips_']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_llegada_ips_ || '' == $this->hora_llegada_ips_)
      {
          $this->hora_llegada_ips_ = '';
      }
      if ((!empty($this->hora_salida_ips_) && 'null' != $this->hora_salida_ips_) || (!empty($format_fields) && isset($format_fields['hora_salida_ips_'])))
      {
          nm_volta_hora($this->hora_salida_ips_, $this->field_config['hora_salida_ips_']['date_format']) ; 
          nmgp_Form_Hora($this->hora_salida_ips_, $this->field_config['hora_salida_ips_']['date_format'], $this->field_config['hora_salida_ips_']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_salida_ips_ || '' == $this->hora_salida_ips_)
      {
          $this->hora_salida_ips_ = '';
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
      $guarda_format_hora = $this->field_config['hora_ingreso_llamada_']['date_format'];
      if ($this->hora_ingreso_llamada_ != "")  
      { 
          $this->hora_ingreso_llamada__hora = $this->hora_ingreso_llamada_;
          $this->hora_ingreso_llamada_ = "1900-01-01";
          nm_conv_hora($this->hora_ingreso_llamada__hora, $this->field_config['hora_ingreso_llamada_']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_ingreso_llamada__hora = substr($this->hora_ingreso_llamada__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_ingreso_llamada__hora = substr($this->hora_ingreso_llamada__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_ingreso_llamada__hora = substr($this->hora_ingreso_llamada__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_ingreso_llamada__hora = substr($this->hora_ingreso_llamada__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_ingreso_llamada__hora = substr($this->hora_ingreso_llamada__hora, 0, -4);
          }
          $this->hora_ingreso_llamada_ = $this->hora_ingreso_llamada__hora;
      } 
      if ($this->hora_ingreso_llamada_ == "" && $use_null)  
      { 
          $this->hora_ingreso_llamada_ = "null" ; 
      } 
      $this->field_config['hora_ingreso_llamada_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_notifica_movil_']['date_format'];
      if ($this->hora_notifica_movil_ != "")  
      { 
          $this->hora_notifica_movil__hora = $this->hora_notifica_movil_;
          $this->hora_notifica_movil_ = "1900-01-01";
          nm_conv_hora($this->hora_notifica_movil__hora, $this->field_config['hora_notifica_movil_']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_notifica_movil__hora = substr($this->hora_notifica_movil__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_notifica_movil__hora = substr($this->hora_notifica_movil__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_notifica_movil__hora = substr($this->hora_notifica_movil__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_notifica_movil__hora = substr($this->hora_notifica_movil__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_notifica_movil__hora = substr($this->hora_notifica_movil__hora, 0, -4);
          }
          $this->hora_notifica_movil_ = $this->hora_notifica_movil__hora;
      } 
      if ($this->hora_notifica_movil_ == "" && $use_null)  
      { 
          $this->hora_notifica_movil_ = "null" ; 
      } 
      $this->field_config['hora_notifica_movil_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_llegada_sitio_']['date_format'];
      if ($this->hora_llegada_sitio_ != "")  
      { 
          $this->hora_llegada_sitio__hora = $this->hora_llegada_sitio_;
          $this->hora_llegada_sitio_ = "1900-01-01";
          nm_conv_hora($this->hora_llegada_sitio__hora, $this->field_config['hora_llegada_sitio_']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_llegada_sitio__hora = substr($this->hora_llegada_sitio__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_llegada_sitio__hora = substr($this->hora_llegada_sitio__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_llegada_sitio__hora = substr($this->hora_llegada_sitio__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_llegada_sitio__hora = substr($this->hora_llegada_sitio__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_llegada_sitio__hora = substr($this->hora_llegada_sitio__hora, 0, -4);
          }
          $this->hora_llegada_sitio_ = $this->hora_llegada_sitio__hora;
      } 
      if ($this->hora_llegada_sitio_ == "" && $use_null)  
      { 
          $this->hora_llegada_sitio_ = "null" ; 
      } 
      $this->field_config['hora_llegada_sitio_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_llegada_ips_']['date_format'];
      if ($this->hora_llegada_ips_ != "")  
      { 
          $this->hora_llegada_ips__hora = $this->hora_llegada_ips_;
          $this->hora_llegada_ips_ = "1900-01-01";
          nm_conv_hora($this->hora_llegada_ips__hora, $this->field_config['hora_llegada_ips_']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_llegada_ips__hora = substr($this->hora_llegada_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_llegada_ips__hora = substr($this->hora_llegada_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_llegada_ips__hora = substr($this->hora_llegada_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_llegada_ips__hora = substr($this->hora_llegada_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_llegada_ips__hora = substr($this->hora_llegada_ips__hora, 0, -4);
          }
          $this->hora_llegada_ips_ = $this->hora_llegada_ips__hora;
      } 
      if ($this->hora_llegada_ips_ == "" && $use_null)  
      { 
          $this->hora_llegada_ips_ = "null" ; 
      } 
      $this->field_config['hora_llegada_ips_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_salida_ips_']['date_format'];
      if ($this->hora_salida_ips_ != "")  
      { 
          $this->hora_salida_ips__hora = $this->hora_salida_ips_;
          $this->hora_salida_ips_ = "1900-01-01";
          nm_conv_hora($this->hora_salida_ips__hora, $this->field_config['hora_salida_ips_']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_salida_ips__hora = substr($this->hora_salida_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_salida_ips__hora = substr($this->hora_salida_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_salida_ips__hora = substr($this->hora_salida_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_salida_ips__hora = substr($this->hora_salida_ips__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_salida_ips__hora = substr($this->hora_salida_ips__hora, 0, -4);
          }
          $this->hora_salida_ips_ = $this->hora_salida_ips__hora;
      } 
      if ($this->hora_salida_ips_ == "" && $use_null)  
      { 
          $this->hora_salida_ips_ = "null" ; 
      } 
      $this->field_config['hora_salida_ips_']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_procedimiento_']['keyVal'] = procedimiento_final_pack_protect_string($this->nmgp_dados_form['id_procedimiento_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['consecutivo_']) && $this->NM_ajax_changed['consecutivo_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['consecutivo_'] = $this->consecutivo_;
                  }
                  if (isset($this->NM_ajax_changed['secad_']) && $this->NM_ajax_changed['secad_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['secad_'] = $this->secad_;
                  }
                  if (isset($this->NM_ajax_changed['quien_reporta_']) && $this->NM_ajax_changed['quien_reporta_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['quien_reporta_'] = $this->quien_reporta_;
                  }
                  if (isset($this->NM_ajax_changed['discapacidad_']) && $this->NM_ajax_changed['discapacidad_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['discapacidad_'] = $this->discapacidad_;
                  }
                  if (isset($this->NM_ajax_changed['nombre_apellido_']) && $this->NM_ajax_changed['nombre_apellido_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['nombre_apellido_'] = $this->nombre_apellido_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_documento_']) && $this->NM_ajax_changed['tipo_documento_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['tipo_documento_'] = $this->tipo_documento_;
                  }
                  if (isset($this->NM_ajax_changed['documento_identidad_']) && $this->NM_ajax_changed['documento_identidad_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['documento_identidad_'] = $this->documento_identidad_;
                  }
                  if (isset($this->NM_ajax_changed['edad_']) && $this->NM_ajax_changed['edad_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['edad_'] = $this->edad_;
                  }
                  if (isset($this->NM_ajax_changed['numero_contacto_']) && $this->NM_ajax_changed['numero_contacto_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['numero_contacto_'] = $this->numero_contacto_;
                  }
                  if (isset($this->NM_ajax_changed['genero_']) && $this->NM_ajax_changed['genero_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['genero_'] = $this->genero_;
                  }
                  if (isset($this->NM_ajax_changed['id_tipo_evento_']) && $this->NM_ajax_changed['id_tipo_evento_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_tipo_evento_'] = $this->id_tipo_evento_;
                  }
                  if (isset($this->NM_ajax_changed['circunstancias_emergencia_']) && $this->NM_ajax_changed['circunstancias_emergencia_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
                  }
                  if (isset($this->NM_ajax_changed['id_eps_']) && $this->NM_ajax_changed['id_eps_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_eps_'] = $this->id_eps_;
                  }
                  if (isset($this->NM_ajax_changed['id_seguridad_social_']) && $this->NM_ajax_changed['id_seguridad_social_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_seguridad_social_'] = $this->id_seguridad_social_;
                  }
                  if (isset($this->NM_ajax_changed['zona_']) && $this->NM_ajax_changed['zona_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['zona_'] = $this->zona_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_servicio_']) && $this->NM_ajax_changed['tipo_servicio_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['tipo_servicio_'] = $this->tipo_servicio_;
                  }
                  if (isset($this->NM_ajax_changed['id_barrio_']) && $this->NM_ajax_changed['id_barrio_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_barrio_'] = $this->id_barrio_;
                  }
                  if (isset($this->NM_ajax_changed['direccion_servicio_']) && $this->NM_ajax_changed['direccion_servicio_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['direccion_servicio_'] = $this->direccion_servicio_;
                  }
                  if (isset($this->NM_ajax_changed['hora_ingreso_llamada_']) && $this->NM_ajax_changed['hora_ingreso_llamada_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['hora_ingreso_llamada_'] = $this->hora_ingreso_llamada_;
                  }
                  if (isset($this->NM_ajax_changed['hora_notifica_movil_']) && $this->NM_ajax_changed['hora_notifica_movil_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['hora_notifica_movil_'] = $this->hora_notifica_movil_;
                  }
                  if (isset($this->NM_ajax_changed['hora_llegada_sitio_']) && $this->NM_ajax_changed['hora_llegada_sitio_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['hora_llegada_sitio_'] = $this->hora_llegada_sitio_;
                  }
                  if (isset($this->NM_ajax_changed['hora_llegada_ips_']) && $this->NM_ajax_changed['hora_llegada_ips_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['hora_llegada_ips_'] = $this->hora_llegada_ips_;
                  }
                  if (isset($this->NM_ajax_changed['hora_salida_ips_']) && $this->NM_ajax_changed['hora_salida_ips_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['hora_salida_ips_'] = $this->hora_salida_ips_;
                  }
                  if (isset($this->NM_ajax_changed['id_movil_']) && $this->NM_ajax_changed['id_movil_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_movil_'] = $this->id_movil_;
                  }
                  if (isset($this->NM_ajax_changed['id_ips_']) && $this->NM_ajax_changed['id_ips_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_ips_'] = $this->id_ips_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_caso_']) && $this->NM_ajax_changed['tipo_caso_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['tipo_caso_'] = $this->tipo_caso_;
                  }
                  if (isset($this->NM_ajax_changed['id_medico_']) && $this->NM_ajax_changed['id_medico_'])
                  {
                      $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['id_medico_'] = $this->id_medico_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['consecutivo_'] = $this->consecutivo_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['secad_'] = $this->secad_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['quien_reporta_'] = $this->quien_reporta_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['discapacidad_'] = $this->discapacidad_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['nombre_apellido_'] = $this->nombre_apellido_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['tipo_documento_'] = $this->tipo_documento_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['documento_identidad_'] = $this->documento_identidad_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['numero_contacto_'] = $this->numero_contacto_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['genero_'] = $this->genero_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['zona_'] = $this->zona_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['tipo_servicio_'] = $this->tipo_servicio_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['direccion_servicio_'] = $this->direccion_servicio_;
              $this->form_vert_procedimiento_final[$this->nmgp_refresh_row]['tipo_caso_'] = $this->tipo_caso_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_procedimiento_final);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_procedimiento_final as $sc_seq_vert => $aRecData)
          {
              $this->loadRecordState($sc_seq_vert);
              if ('navigate_form' == $this->NM_ajax_opcao) {
                  $this->NM_ajax_info['buttonDisplayVert'][] = array(
                      'seq'      => $sc_seq_vert,
                      'gridView' => false,
                      'delete'   => $this->nmgp_botoes['delete'],
                      'update'   => $this->nmgp_botoes['update'],
                  );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("consecutivo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['consecutivo_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['consecutivo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("secad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['secad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['secad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("quien_reporta_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['quien_reporta_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('PONAL ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PONAL ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('BOMBEROS ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("BOMBEROS ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CRUZ ROJA ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CRUZ ROJA ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CRUEB') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CRUEB")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SCOUTS') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SCOUTS")));
$aLookup[] = array(procedimiento_final_pack_protect_string('USUARIO A NUMERO CRUEMT') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("USUARIO A NUMERO CRUEMT")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PSICOLOGA SALUD MENTAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PSICOLOGA SALUD MENTAL")));
$aLookup[] = array(procedimiento_final_pack_protect_string('MOVIL 1') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("MOVIL 1")));
$aLookup[] = array(procedimiento_final_pack_protect_string('MOVIL 2') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("MOVIL 2")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'PONAL ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'BOMBEROS ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'CRUZ ROJA ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'CRUEB';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'SCOUTS';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'USUARIO A NUMERO CRUEMT';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'PSICOLOGA SALUD MENTAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'MOVIL 1';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'MOVIL 2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"quien_reporta_\"";
          if (isset($this->NM_ajax_info['select_html']['quien_reporta_']) && !empty($this->NM_ajax_info['select_html']['quien_reporta_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['quien_reporta_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['quien_reporta_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['quien_reporta_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['quien_reporta_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['quien_reporta_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['quien_reporta_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['quien_reporta_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discapacidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['discapacidad_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('VISUAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("VISUAL")));
$aLookup[] = array(procedimiento_final_pack_protect_string('AUDITIVA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("AUDITIVA")));
$aLookup[] = array(procedimiento_final_pack_protect_string('FISICA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("FISICA")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SORDOCEGUERA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SORDOCEGUERA")));
$aLookup[] = array(procedimiento_final_pack_protect_string('MULTIPLE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("MULTIPLE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('INTELECTUAL ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("INTELECTUAL ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PSICOSOCIAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PSICOSOCIAL")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'VISUAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'AUDITIVA';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'FISICA';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'SORDOCEGUERA';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'MULTIPLE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'INTELECTUAL ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'PSICOSOCIAL';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"discapacidad_\"";
          if (isset($this->NM_ajax_info['select_html']['discapacidad_']) && !empty($this->NM_ajax_info['select_html']['discapacidad_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['discapacidad_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['discapacidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['discapacidad_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['discapacidad_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['discapacidad_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['discapacidad_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['discapacidad_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_apellido_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nombre_apellido_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nombre_apellido_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_documento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_documento_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('CC') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CC")));
$aLookup[] = array(procedimiento_final_pack_protect_string('TI') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("TI")));
$aLookup[] = array(procedimiento_final_pack_protect_string('RC') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("RC")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PEP') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PEP")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SC') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SC")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PAS') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PAS")));
$aLookup[] = array(procedimiento_final_pack_protect_string('NI') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("NI")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SIN DATO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SIN DATO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'CC';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'TI';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'RC';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'CE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'PEP';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'SC';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'PAS';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'NI';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'SIN DATO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_documento_\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_documento_']) && !empty($this->NM_ajax_info['select_html']['tipo_documento_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_documento_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("documento_identidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['documento_identidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['documento_identidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("edad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['edad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['edad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_contacto_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['numero_contacto_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['numero_contacto_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("genero_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['genero_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('M') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("M")));
$aLookup[] = array(procedimiento_final_pack_protect_string('T') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("T")));
$aLookup[] = array(procedimiento_final_pack_protect_string('F') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("F")));
$aLookup[] = array(procedimiento_final_pack_protect_string('N') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("N")));
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("O")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'T';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'F';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = '';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['genero_']) && !empty($this->NM_ajax_info['select_html']['genero_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['genero_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['genero_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => true,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['genero_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['genero_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['genero_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['genero_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['genero_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_tipo_evento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_tipo_evento_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Tipo_Evento, evento  FROM id_tipo_evento  ORDER BY evento";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_tipo_evento_\"";
          if (isset($this->NM_ajax_info['select_html']['id_tipo_evento_']) && !empty($this->NM_ajax_info['select_html']['id_tipo_evento_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_tipo_evento_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_tipo_evento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_tipo_evento_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_tipo_evento_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_tipo_evento_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_tipo_evento_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_tipo_evento_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("circunstancias_emergencia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['circunstancias_emergencia_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['circunstancias_emergencia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_eps_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_eps_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Eps, eps  FROM eps  ORDER BY eps";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_eps_\"";
          if (isset($this->NM_ajax_info['select_html']['id_eps_']) && !empty($this->NM_ajax_info['select_html']['id_eps_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_eps_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_eps_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_eps_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_eps_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_eps_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_eps_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_eps_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_seguridad_social_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_seguridad_social_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Seguridad_Social, seguridad_social  FROM seguridad_social  ORDER BY seguridad_social";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_seguridad_social_\"";
          if (isset($this->NM_ajax_info['select_html']['id_seguridad_social_']) && !empty($this->NM_ajax_info['select_html']['id_seguridad_social_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_seguridad_social_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_seguridad_social_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_seguridad_social_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_seguridad_social_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_seguridad_social_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_seguridad_social_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_seguridad_social_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zona_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['zona_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('NORTE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("NORTE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SUR') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SUR")));
$aLookup[] = array(procedimiento_final_pack_protect_string('ORIENTE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("ORIENTE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('OCCIDENTE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("OCCIDENTE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CENTRO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CENTRO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('RURAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("RURAL")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'NORTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'SUR';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'ORIENTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'OCCIDENTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'CENTRO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'RURAL';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"zona_\"";
          if (isset($this->NM_ajax_info['select_html']['zona_']) && !empty($this->NM_ajax_info['select_html']['zona_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['zona_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['zona_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['zona_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['zona_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['zona_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['zona_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['zona_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_servicio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_servicio_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('Ambulancia') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("Ambulancia")));
$aLookup[] = array(procedimiento_final_pack_protect_string('Referencia y contrareferencia') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("Referencia y contrareferencia")));
$aLookup[] = array(procedimiento_final_pack_protect_string('TAB') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("TAB")));
$aLookup[] = array(procedimiento_final_pack_protect_string('Otros') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("Otros")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Ambulancia';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Referencia y contrareferencia';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'TAB';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Otros';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_servicio_\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_servicio_']) && !empty($this->NM_ajax_info['select_html']['tipo_servicio_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_servicio_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['tipo_servicio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_servicio_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_servicio_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_servicio_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_servicio_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_servicio_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_barrio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_barrio_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Barrio, barrio  FROM barrio  ORDER BY barrio";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_barrio_\"";
          if (isset($this->NM_ajax_info['select_html']['id_barrio_']) && !empty($this->NM_ajax_info['select_html']['id_barrio_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_barrio_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_barrio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_barrio_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_barrio_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_barrio_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_barrio_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_barrio_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("direccion_servicio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['direccion_servicio_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['direccion_servicio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_ingreso_llamada_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hora_ingreso_llamada_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hora_ingreso_llamada_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_notifica_movil_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hora_notifica_movil_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hora_notifica_movil_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_llegada_sitio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hora_llegada_sitio_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hora_llegada_sitio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_llegada_ips_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hora_llegada_ips_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hora_llegada_ips_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_salida_ips_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hora_salida_ips_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hora_salida_ips_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_movil_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_movil_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Movil, placa  FROM movil  ORDER BY placa";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_movil_\"";
          if (isset($this->NM_ajax_info['select_html']['id_movil_']) && !empty($this->NM_ajax_info['select_html']['id_movil_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_movil_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_movil_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_movil_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_movil_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_movil_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_movil_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_movil_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_ips_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_ips_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Ips, nombre_ips  FROM ips  ORDER BY nombre_ips";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_ips_\"";
          if (isset($this->NM_ajax_info['select_html']['id_ips_']) && !empty($this->NM_ajax_info['select_html']['id_ips_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_ips_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_ips_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_ips_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_ips_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_ips_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_ips_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_ips_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_caso_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_caso_']);
                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('EFECTIVO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("EFECTIVO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('NO EFECTIVO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("NO EFECTIVO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('FALLIDO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("FALLIDO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('APOYO PSICOSOCIAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("APOYO PSICOSOCIAL")));
$aLookup[] = array(procedimiento_final_pack_protect_string('APH') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("APH")));
$aLookup[] = array(procedimiento_final_pack_protect_string('ASESORIA MEDICA TELEFONICA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("ASESORIA MEDICA TELEFONICA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'EFECTIVO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'NO EFECTIVO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'FALLIDO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'APOYO PSICOSOCIAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'APH';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'ASESORIA MEDICA TELEFONICA';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_caso_\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_caso_']) && !empty($this->NM_ajax_info['select_html']['tipo_caso_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_caso_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['tipo_caso_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_caso_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_caso_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_caso_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_caso_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_caso_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_medico_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_medico_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array(); 
}
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string('Seleccione...')));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT Id_Medico, medico + registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT Id_Medico, concat(medico, registro_medico)  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT Id_Medico, medico&registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT Id_Medico, medico + registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   else
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_medico_\"";
          if (isset($this->NM_ajax_info['select_html']['id_medico_']) && !empty($this->NM_ajax_info['select_html']['id_medico_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_medico_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_medico_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_medico_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_medico_' . $sc_seq_vert]['valList'][$i] = procedimiento_final_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_medico_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_medico_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_medico_' . $sc_seq_vert]['labList'] = $aLabel;
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Field_no_validate'] = array();
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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
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
          $this->NM_gera_log_old($sc_seq_vert);
      }
      $this->restore_zeros_null();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'on';
              /* observaciones */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM observaciones WHERE Id_Procedimiento = " . $this->id_procedimiento_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM observaciones WHERE Id_Procedimiento = " . $this->id_procedimiento_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM observaciones WHERE Id_Procedimiento = " . $this->id_procedimiento_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM observaciones WHERE Id_Procedimiento = " . $this->id_procedimiento_ ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM observaciones WHERE Id_Procedimiento = " . $this->id_procedimiento_ ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_observaciones = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_observaciones[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_observaciones = false;
          $this->dataset_observaciones_erro = $this->Db->ErrorMsg();
      } 


      if($this->dataset_observaciones[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_procedimiento_final';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_procedimiento_final';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['consecutivo_'] == $this->consecutivo_ &&
              $this->nmgp_dados_select['secad_'] == $this->secad_ &&
              $this->nmgp_dados_select['quien_reporta_'] == $this->quien_reporta_ &&
              $this->nmgp_dados_select['discapacidad_'] == $this->discapacidad_ &&
              $this->nmgp_dados_select['nombre_apellido_'] == $this->nombre_apellido_ &&
              $this->nmgp_dados_select['tipo_documento_'] == $this->tipo_documento_ &&
              $this->nmgp_dados_select['documento_identidad_'] == $this->documento_identidad_ &&
              $this->nmgp_dados_select['edad_'] == $this->edad_ &&
              $this->nmgp_dados_select['numero_contacto_'] == $this->numero_contacto_ &&
              $this->nmgp_dados_select['genero_'] == $this->genero_ &&
              $this->nmgp_dados_select['id_tipo_evento_'] == $this->id_tipo_evento_ &&
              $this->nmgp_dados_select['circunstancias_emergencia_'] == $this->circunstancias_emergencia_ &&
              $this->nmgp_dados_select['id_eps_'] == $this->id_eps_ &&
              $this->nmgp_dados_select['id_seguridad_social_'] == $this->id_seguridad_social_ &&
              $this->nmgp_dados_select['zona_'] == $this->zona_ &&
              $this->nmgp_dados_select['tipo_servicio_'] == $this->tipo_servicio_ &&
              $this->nmgp_dados_select['id_barrio_'] == $this->id_barrio_ &&
              $this->nmgp_dados_select['direccion_servicio_'] == $this->direccion_servicio_ &&
              $this->nmgp_dados_select['hora_ingreso_llamada_'] == $this->hora_ingreso_llamada_ &&
              $this->nmgp_dados_select['hora_notifica_movil_'] == $this->hora_notifica_movil_ &&
              $this->nmgp_dados_select['hora_llegada_sitio_'] == $this->hora_llegada_sitio_ &&
              $this->nmgp_dados_select['hora_llegada_ips_'] == $this->hora_llegada_ips_ &&
              $this->nmgp_dados_select['hora_salida_ips_'] == $this->hora_salida_ips_ &&
              $this->nmgp_dados_select['id_movil_'] == $this->id_movil_ &&
              $this->nmgp_dados_select['id_ips_'] == $this->id_ips_ &&
              $this->nmgp_dados_select['tipo_caso_'] == $this->tipo_caso_ &&
              $this->nmgp_dados_select['id_medico_'] == $this->id_medico_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['consecutivo_'] = $this->consecutivo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['secad_'] = $this->secad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['quien_reporta_'] = $this->quien_reporta_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['discapacidad_'] = $this->discapacidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['nombre_apellido_'] = $this->nombre_apellido_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['tipo_documento_'] = $this->tipo_documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['documento_identidad_'] = $this->documento_identidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['edad_'] = $this->edad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['numero_contacto_'] = $this->numero_contacto_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['genero_'] = $this->genero_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_tipo_evento_'] = $this->id_tipo_evento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_eps_'] = $this->id_eps_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_seguridad_social_'] = $this->id_seguridad_social_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['zona_'] = $this->zona_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['tipo_servicio_'] = $this->tipo_servicio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_barrio_'] = $this->id_barrio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['direccion_servicio_'] = $this->direccion_servicio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_ingreso_llamada_'] = $this->hora_ingreso_llamada_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_notifica_movil_'] = $this->hora_notifica_movil_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_llegada_sitio_'] = $this->hora_llegada_sitio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_llegada_ips_'] = $this->hora_llegada_ips_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_salida_ips_'] = $this->hora_salida_ips_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_movil_'] = $this->id_movil_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_ips_'] = $this->id_ips_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['tipo_caso_'] = $this->tipo_caso_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_medico_'] = $this->id_medico_;
          }
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
      if (!isset($this->login_)){$this->login_ =  $_SESSION['usr_login'];}  
      if ('incluir' == $this->nmgp_opcao) { $this->ip_ = $_SERVER['REMOTE_ADDR']; } 
      if ('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) { $this->ip_ = $_SERVER['REMOTE_ADDR']; } 
      if ('incluir' == $this->nmgp_opcao) { $this->login_ = "" . $_SESSION['usr_login'] . ""; } 
      if ('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) { $this->login_ = "" . $_SESSION['usr_login'] . ""; } 
      if ('incluir' == $this->nmgp_opcao) { $this->operador_ = "" . $_SESSION['usr_login'] . ""; } 
      if ('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) { $this->operador_ = "" . $_SESSION['usr_login'] . ""; } 
      $NM_val_form['consecutivo_'] = $this->consecutivo_;
      $NM_val_form['secad_'] = $this->secad_;
      $NM_val_form['quien_reporta_'] = $this->quien_reporta_;
      $NM_val_form['discapacidad_'] = $this->discapacidad_;
      $NM_val_form['nombre_apellido_'] = $this->nombre_apellido_;
      $NM_val_form['tipo_documento_'] = $this->tipo_documento_;
      $NM_val_form['documento_identidad_'] = $this->documento_identidad_;
      $NM_val_form['edad_'] = $this->edad_;
      $NM_val_form['numero_contacto_'] = $this->numero_contacto_;
      $NM_val_form['genero_'] = $this->genero_;
      $NM_val_form['id_tipo_evento_'] = $this->id_tipo_evento_;
      $NM_val_form['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
      $NM_val_form['id_eps_'] = $this->id_eps_;
      $NM_val_form['id_seguridad_social_'] = $this->id_seguridad_social_;
      $NM_val_form['zona_'] = $this->zona_;
      $NM_val_form['tipo_servicio_'] = $this->tipo_servicio_;
      $NM_val_form['id_barrio_'] = $this->id_barrio_;
      $NM_val_form['direccion_servicio_'] = $this->direccion_servicio_;
      $NM_val_form['hora_ingreso_llamada_'] = $this->hora_ingreso_llamada_;
      $NM_val_form['hora_notifica_movil_'] = $this->hora_notifica_movil_;
      $NM_val_form['hora_llegada_sitio_'] = $this->hora_llegada_sitio_;
      $NM_val_form['hora_llegada_ips_'] = $this->hora_llegada_ips_;
      $NM_val_form['hora_salida_ips_'] = $this->hora_salida_ips_;
      $NM_val_form['id_movil_'] = $this->id_movil_;
      $NM_val_form['id_ips_'] = $this->id_ips_;
      $NM_val_form['tipo_caso_'] = $this->tipo_caso_;
      $NM_val_form['id_medico_'] = $this->id_medico_;
      $NM_val_form['id_procedimiento_'] = $this->id_procedimiento_;
      $NM_val_form['radicado_'] = $this->radicado_;
      $NM_val_form['fecha_'] = $this->fecha_;
      $NM_val_form['ip_'] = $this->ip_;
      $NM_val_form['login_'] = $this->login_;
      $NM_val_form['operador_'] = $this->operador_;
      $NM_val_form['observaciones_'] = $this->observaciones_;
      if ($this->id_procedimiento_ === "" || is_null($this->id_procedimiento_))  
      { 
          $this->id_procedimiento_ = 0;
      } 
      if ($this->id_barrio_ === "" || is_null($this->id_barrio_))  
      { 
          $this->id_barrio_ = 0;
          $this->sc_force_zero[] = 'id_barrio_';
      } 
      if ($this->edad_ === "" || is_null($this->edad_))  
      { 
          $this->edad_ = 0;
          $this->sc_force_zero[] = 'edad_';
      } 
      if ($this->id_seguridad_social_ === "" || is_null($this->id_seguridad_social_))  
      { 
          $this->id_seguridad_social_ = 0;
          $this->sc_force_zero[] = 'id_seguridad_social_';
      } 
      if ($this->id_eps_ === "" || is_null($this->id_eps_))  
      { 
          $this->id_eps_ = 0;
          $this->sc_force_zero[] = 'id_eps_';
      } 
      if ($this->id_movil_ === "" || is_null($this->id_movil_))  
      { 
          $this->id_movil_ = 0;
          $this->sc_force_zero[] = 'id_movil_';
      } 
      if ($this->id_ips_ === "" || is_null($this->id_ips_))  
      { 
          $this->id_ips_ = 0;
          $this->sc_force_zero[] = 'id_ips_';
      } 
      if ($this->id_medico_ === "" || is_null($this->id_medico_))  
      { 
          $this->id_medico_ = 0;
          $this->sc_force_zero[] = 'id_medico_';
      } 
      if ($this->id_tipo_evento_ === "" || is_null($this->id_tipo_evento_))  
      { 
          $this->id_tipo_evento_ = 0;
          $this->sc_force_zero[] = 'id_tipo_evento_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, $this->Ini->nm_bases_db2, array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->secad__before_qstr = $this->secad_;
          $this->secad_ = substr($this->Db->qstr($this->secad_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->secad_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->secad_);
          }
          if ($this->secad_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->secad_ = "null"; 
              $this->NM_val_null[] = "secad_";
          } 
          $this->consecutivo__before_qstr = $this->consecutivo_;
          $this->consecutivo_ = substr($this->Db->qstr($this->consecutivo_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->consecutivo_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->consecutivo_);
          }
          if ($this->consecutivo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->consecutivo_ = "null"; 
              $this->NM_val_null[] = "consecutivo_";
          } 
          $this->quien_reporta__before_qstr = $this->quien_reporta_;
          $this->quien_reporta_ = substr($this->Db->qstr($this->quien_reporta_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->quien_reporta_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->quien_reporta_);
          }
          if ($this->quien_reporta_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->quien_reporta_ = "null"; 
              $this->NM_val_null[] = "quien_reporta_";
          } 
          $this->direccion_servicio__before_qstr = $this->direccion_servicio_;
          $this->direccion_servicio_ = substr($this->Db->qstr($this->direccion_servicio_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->direccion_servicio_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->direccion_servicio_);
          }
          if ($this->direccion_servicio_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion_servicio_ = "null"; 
              $this->NM_val_null[] = "direccion_servicio_";
          } 
          $this->tipo_servicio__before_qstr = $this->tipo_servicio_;
          $this->tipo_servicio_ = substr($this->Db->qstr($this->tipo_servicio_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tipo_servicio_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->tipo_servicio_);
          }
          if ($this->tipo_servicio_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_servicio_ = "null"; 
              $this->NM_val_null[] = "tipo_servicio_";
          } 
          $this->numero_contacto__before_qstr = $this->numero_contacto_;
          $this->numero_contacto_ = substr($this->Db->qstr($this->numero_contacto_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->numero_contacto_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->numero_contacto_);
          }
          if ($this->numero_contacto_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numero_contacto_ = "null"; 
              $this->NM_val_null[] = "numero_contacto_";
          } 
          $this->radicado__before_qstr = $this->radicado_;
          $this->radicado_ = substr($this->Db->qstr($this->radicado_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->radicado_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->radicado_);
          }
          if ($this->radicado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->radicado_ = "null"; 
              $this->NM_val_null[] = "radicado_";
          } 
          $this->nombre_apellido__before_qstr = $this->nombre_apellido_;
          $this->nombre_apellido_ = substr($this->Db->qstr($this->nombre_apellido_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->nombre_apellido_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->nombre_apellido_);
          }
          if ($this->nombre_apellido_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_apellido_ = "null"; 
              $this->NM_val_null[] = "nombre_apellido_";
          } 
          $this->tipo_documento__before_qstr = $this->tipo_documento_;
          $this->tipo_documento_ = substr($this->Db->qstr($this->tipo_documento_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tipo_documento_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->tipo_documento_);
          }
          if ($this->tipo_documento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_documento_ = "null"; 
              $this->NM_val_null[] = "tipo_documento_";
          } 
          $this->documento_identidad__before_qstr = $this->documento_identidad_;
          $this->documento_identidad_ = substr($this->Db->qstr($this->documento_identidad_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->documento_identidad_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->documento_identidad_);
          }
          if ($this->documento_identidad_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->documento_identidad_ = "null"; 
              $this->NM_val_null[] = "documento_identidad_";
          } 
          $this->genero__before_qstr = $this->genero_;
          $this->genero_ = substr($this->Db->qstr($this->genero_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->genero_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->genero_);
          }
          if ($this->genero_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->genero_ = "null"; 
              $this->NM_val_null[] = "genero_";
          } 
          $this->circunstancias_emergencia__before_qstr = $this->circunstancias_emergencia_;
          $this->circunstancias_emergencia_ = substr($this->Db->qstr($this->circunstancias_emergencia_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->circunstancias_emergencia_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->circunstancias_emergencia_);
          }
          if ($this->circunstancias_emergencia_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->circunstancias_emergencia_ = "null"; 
              $this->NM_val_null[] = "circunstancias_emergencia_";
          } 
          if ($this->fecha_ == "")  
          { 
              $this->fecha_ = "null"; 
              $this->NM_val_null[] = "fecha_";
          } 
          $this->ip__before_qstr = $this->ip_;
          $this->ip_ = substr($this->Db->qstr($this->ip_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->ip_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->ip_);
          }
          if ($this->ip_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ip_ = "null"; 
              $this->NM_val_null[] = "ip_";
          } 
          $this->login__before_qstr = $this->login_;
          $this->login_ = substr($this->Db->qstr($this->login_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->login_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->login_);
          }
          if ($this->login_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->login_ = "null"; 
              $this->NM_val_null[] = "login_";
          } 
          if ($this->hora_ingreso_llamada_ == "")  
          { 
              $this->hora_ingreso_llamada_ = "null"; 
              $this->NM_val_null[] = "hora_ingreso_llamada_";
          } 
          if ($this->hora_notifica_movil_ == "")  
          { 
              $this->hora_notifica_movil_ = "null"; 
              $this->NM_val_null[] = "hora_notifica_movil_";
          } 
          if ($this->hora_llegada_sitio_ == "")  
          { 
              $this->hora_llegada_sitio_ = "null"; 
              $this->NM_val_null[] = "hora_llegada_sitio_";
          } 
          if ($this->hora_llegada_ips_ == "")  
          { 
              $this->hora_llegada_ips_ = "null"; 
              $this->NM_val_null[] = "hora_llegada_ips_";
          } 
          if ($this->hora_salida_ips_ == "")  
          { 
              $this->hora_salida_ips_ = "null"; 
              $this->NM_val_null[] = "hora_salida_ips_";
          } 
          $this->tipo_caso__before_qstr = $this->tipo_caso_;
          $this->tipo_caso_ = substr($this->Db->qstr($this->tipo_caso_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tipo_caso_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->tipo_caso_);
          }
          if ($this->tipo_caso_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_caso_ = "null"; 
              $this->NM_val_null[] = "tipo_caso_";
          } 
          $this->operador__before_qstr = $this->operador_;
          $this->operador_ = substr($this->Db->qstr($this->operador_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->operador_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->operador_);
          }
          if ($this->operador_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->operador_ = "null"; 
              $this->NM_val_null[] = "operador_";
          } 
          $this->observaciones__before_qstr = $this->observaciones_;
          $this->observaciones_ = substr($this->Db->qstr($this->observaciones_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->observaciones_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->observaciones_);
          }
          if ($this->observaciones_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones_ = "null"; 
              $this->NM_val_null[] = "observaciones_";
          } 
          $this->zona__before_qstr = $this->zona_;
          $this->zona_ = substr($this->Db->qstr($this->zona_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->zona_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->zona_);
          }
          if ($this->zona_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->zona_ = "null"; 
              $this->NM_val_null[] = "zona_";
          } 
          $this->discapacidad__before_qstr = $this->discapacidad_;
          $this->discapacidad_ = substr($this->Db->qstr($this->discapacidad_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->discapacidad_ = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->discapacidad_);
          }
          if ($this->discapacidad_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->discapacidad_ = "null"; 
              $this->NM_val_null[] = "discapacidad_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 procedimiento_final_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
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
              $this->fecha_ =  date('Y') . "-" . date('m')  . "-" . date('d');
              $NM_val_form['fecha_'] = $this->fecha_;
              $this->NM_ajax_changed['fecha_'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = #$this->hora_ingreso_llamada_#, Hora_notifica_movil = #$this->hora_notifica_movil_#, hora_llegada_sitio = #$this->hora_llegada_sitio_#, hora_llegada_ips = #$this->hora_llegada_ips_#, hora_salida_ips = #$this->hora_salida_ips_#, Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "secad = '$this->secad_', consecutivo = '$this->consecutivo_', quien_reporta = '$this->quien_reporta_', direccion_servicio = '$this->direccion_servicio_', Id_Barrio = $this->id_barrio_, tipo_servicio = '$this->tipo_servicio_', numero_contacto = '$this->numero_contacto_', nombre_apellido = '$this->nombre_apellido_', tipo_documento = '$this->tipo_documento_', documento_identidad = '$this->documento_identidad_', edad = $this->edad_, genero = '$this->genero_', circunstancias_emergencia = '$this->circunstancias_emergencia_', Id_Seguridad_Social = $this->id_seguridad_social_, Id_Eps = $this->id_eps_, hora_ingreso_llamada = " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", Hora_notifica_movil = " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", hora_llegada_sitio = " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", hora_llegada_ips = " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", hora_salida_ips = " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", Id_Movil = $this->id_movil_, Id_Ips = $this->id_ips_, tipo_caso = '$this->tipo_caso_', Id_Medico = $this->id_medico_, Id_Tipo_Evento = $this->id_tipo_evento_, Zona = '$this->zona_', discapacidad = '$this->discapacidad_'"; 
              } 
              if (isset($NM_val_form['radicado_']) && $NM_val_form['radicado_'] != $this->nmgp_dados_select['radicado_']) 
              { 
                  $SC_fields_update[] = "radicado = '$this->radicado_'"; 
              } 
              if (isset($NM_val_form['fecha_']) && $NM_val_form['fecha_'] != $this->nmgp_dados_select['fecha_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha = #$this->fecha_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha = EXTEND('" . $this->fecha_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha = " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['ip_']) && $NM_val_form['ip_'] != $this->nmgp_dados_select['ip_']) 
              { 
                  $SC_fields_update[] = "ip = '$this->ip_'"; 
              } 
              if (isset($NM_val_form['login_']) && $NM_val_form['login_'] != $this->nmgp_dados_select['login_']) 
              { 
                  $SC_fields_update[] = "login = '$this->login_'"; 
              } 
              if (isset($NM_val_form['operador_']) && $NM_val_form['operador_'] != $this->nmgp_dados_select['operador_']) 
              { 
                  $SC_fields_update[] = "operador = '$this->operador_'"; 
              } 
              if (isset($NM_val_form['observaciones_']) && $NM_val_form['observaciones_'] != $this->nmgp_dados_select['observaciones_']) 
              { 
                  $SC_fields_update[] = "observaciones = '$this->observaciones_'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento_ ";  
              }  
              else  
              {
                  $comando .= " WHERE Id_Procedimiento = $this->id_procedimiento_ ";  
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
                                  procedimiento_final_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->secad_ = $this->secad__before_qstr;
              $this->consecutivo_ = $this->consecutivo__before_qstr;
              $this->quien_reporta_ = $this->quien_reporta__before_qstr;
              $this->direccion_servicio_ = $this->direccion_servicio__before_qstr;
              $this->tipo_servicio_ = $this->tipo_servicio__before_qstr;
              $this->numero_contacto_ = $this->numero_contacto__before_qstr;
              $this->radicado_ = $this->radicado__before_qstr;
              $this->nombre_apellido_ = $this->nombre_apellido__before_qstr;
              $this->tipo_documento_ = $this->tipo_documento__before_qstr;
              $this->documento_identidad_ = $this->documento_identidad__before_qstr;
              $this->genero_ = $this->genero__before_qstr;
              $this->circunstancias_emergencia_ = $this->circunstancias_emergencia__before_qstr;
              $this->ip_ = $this->ip__before_qstr;
              $this->login_ = $this->login__before_qstr;
              $this->tipo_caso_ = $this->tipo_caso__before_qstr;
              $this->operador_ = $this->operador__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->zona_ = $this->zona__before_qstr;
              $this->discapacidad_ = $this->discapacidad__before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['secad_'])) { $this->secad_ = $NM_val_form['secad_']; }
              elseif (isset($this->secad_)) { $this->nm_limpa_alfa($this->secad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['consecutivo_'])) { $this->consecutivo_ = $NM_val_form['consecutivo_']; }
              elseif (isset($this->consecutivo_)) { $this->nm_limpa_alfa($this->consecutivo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['quien_reporta_'])) { $this->quien_reporta_ = $NM_val_form['quien_reporta_']; }
              elseif (isset($this->quien_reporta_)) { $this->nm_limpa_alfa($this->quien_reporta_); }
              if     (isset($NM_val_form) && isset($NM_val_form['direccion_servicio_'])) { $this->direccion_servicio_ = $NM_val_form['direccion_servicio_']; }
              elseif (isset($this->direccion_servicio_)) { $this->nm_limpa_alfa($this->direccion_servicio_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_barrio_'])) { $this->id_barrio_ = $NM_val_form['id_barrio_']; }
              elseif (isset($this->id_barrio_)) { $this->nm_limpa_alfa($this->id_barrio_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_servicio_'])) { $this->tipo_servicio_ = $NM_val_form['tipo_servicio_']; }
              elseif (isset($this->tipo_servicio_)) { $this->nm_limpa_alfa($this->tipo_servicio_); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_contacto_'])) { $this->numero_contacto_ = $NM_val_form['numero_contacto_']; }
              elseif (isset($this->numero_contacto_)) { $this->nm_limpa_alfa($this->numero_contacto_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_apellido_'])) { $this->nombre_apellido_ = $NM_val_form['nombre_apellido_']; }
              elseif (isset($this->nombre_apellido_)) { $this->nm_limpa_alfa($this->nombre_apellido_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_documento_'])) { $this->tipo_documento_ = $NM_val_form['tipo_documento_']; }
              elseif (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['documento_identidad_'])) { $this->documento_identidad_ = $NM_val_form['documento_identidad_']; }
              elseif (isset($this->documento_identidad_)) { $this->nm_limpa_alfa($this->documento_identidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['edad_'])) { $this->edad_ = $NM_val_form['edad_']; }
              elseif (isset($this->edad_)) { $this->nm_limpa_alfa($this->edad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['genero_'])) { $this->genero_ = $NM_val_form['genero_']; }
              elseif (isset($this->genero_)) { $this->nm_limpa_alfa($this->genero_); }
              if     (isset($NM_val_form) && isset($NM_val_form['circunstancias_emergencia_'])) { $this->circunstancias_emergencia_ = $NM_val_form['circunstancias_emergencia_']; }
              elseif (isset($this->circunstancias_emergencia_)) { $this->nm_limpa_alfa($this->circunstancias_emergencia_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_seguridad_social_'])) { $this->id_seguridad_social_ = $NM_val_form['id_seguridad_social_']; }
              elseif (isset($this->id_seguridad_social_)) { $this->nm_limpa_alfa($this->id_seguridad_social_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_eps_'])) { $this->id_eps_ = $NM_val_form['id_eps_']; }
              elseif (isset($this->id_eps_)) { $this->nm_limpa_alfa($this->id_eps_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_movil_'])) { $this->id_movil_ = $NM_val_form['id_movil_']; }
              elseif (isset($this->id_movil_)) { $this->nm_limpa_alfa($this->id_movil_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_ips_'])) { $this->id_ips_ = $NM_val_form['id_ips_']; }
              elseif (isset($this->id_ips_)) { $this->nm_limpa_alfa($this->id_ips_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_caso_'])) { $this->tipo_caso_ = $NM_val_form['tipo_caso_']; }
              elseif (isset($this->tipo_caso_)) { $this->nm_limpa_alfa($this->tipo_caso_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_medico_'])) { $this->id_medico_ = $NM_val_form['id_medico_']; }
              elseif (isset($this->id_medico_)) { $this->nm_limpa_alfa($this->id_medico_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_tipo_evento_'])) { $this->id_tipo_evento_ = $NM_val_form['id_tipo_evento_']; }
              elseif (isset($this->id_tipo_evento_)) { $this->nm_limpa_alfa($this->id_tipo_evento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['zona_'])) { $this->zona_ = $NM_val_form['zona_']; }
              elseif (isset($this->zona_)) { $this->nm_limpa_alfa($this->zona_); }
              if     (isset($NM_val_form) && isset($NM_val_form['discapacidad_'])) { $this->discapacidad_ = $NM_val_form['discapacidad_']; }
              elseif (isset($this->discapacidad_)) { $this->nm_limpa_alfa($this->discapacidad_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('consecutivo_', 'secad_', 'quien_reporta_', 'discapacidad_', 'nombre_apellido_', 'tipo_documento_', 'documento_identidad_', 'edad_', 'numero_contacto_', 'genero_', 'id_tipo_evento_', 'circunstancias_emergencia_', 'id_eps_', 'id_seguridad_social_', 'zona_', 'tipo_servicio_', 'id_barrio_', 'direccion_servicio_', 'hora_ingreso_llamada_', 'hora_notifica_movil_', 'hora_llegada_sitio_', 'hora_llegada_ips_', 'hora_salida_ips_', 'id_movil_', 'id_ips_', 'tipo_caso_', 'id_medico_'), $aDoNotUpdate);
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['consecutivo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['secad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['quien_reporta_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['discapacidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nombre_apellido_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['documento_identidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['edad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['numero_contacto_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['genero_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_tipo_evento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['circunstancias_emergencia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_eps_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_seguridad_social_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['zona_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_servicio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_barrio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['direccion_servicio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hora_ingreso_llamada_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hora_notifica_movil_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hora_llegada_sitio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hora_llegada_ips_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hora_salida_ips_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_movil_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_ips_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_caso_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_medico_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key'] as $sFKName => $sFKValue)
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
                  procedimiento_final_pack_ajax_response();
              }
              exit; 
          }  
          $this->id_procedimiento__before_qstr = $this->id_procedimiento_ = $rs->fields[0] + 1;
          $rs->Close(); 
              $this->fecha_ =  date('Y') . "-" . date('m')  . "-" . date('d');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES ('$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, #$this->fecha_#, '$this->ip_', '$this->login_', #$this->hora_ingreso_llamada_#, #$this->hora_notifica_movil_#, #$this->hora_llegada_sitio_#, #$this->hora_llegada_ips_#, #$this->hora_salida_ips_#, $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, EXTEND('$this->fecha_', YEAR TO DAY), '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad) VALUES (" . $NM_seq_auto . "'$this->secad_', '$this->consecutivo_', '$this->quien_reporta_', '$this->direccion_servicio_', $this->id_barrio_, '$this->tipo_servicio_', '$this->numero_contacto_', '$this->radicado_', '$this->nombre_apellido_', '$this->tipo_documento_', '$this->documento_identidad_', $this->edad_, '$this->genero_', '$this->circunstancias_emergencia_', $this->id_seguridad_social_, $this->id_eps_, " . $this->Ini->date_delim . $this->fecha_ . $this->Ini->date_delim1 . ", '$this->ip_', '$this->login_', " . $this->Ini->date_delim . $this->hora_ingreso_llamada_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_notifica_movil_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_sitio_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_llegada_ips_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_salida_ips_ . $this->Ini->date_delim1 . ", $this->id_movil_, $this->id_ips_, '$this->tipo_caso_', '$this->operador_', $this->id_medico_, $this->id_tipo_evento_, '$this->observaciones_', '$this->zona_', '$this->discapacidad_')"; 
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
                              procedimiento_final_pack_ajax_response();
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
                          procedimiento_final_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_procedimiento_ =  $rsy->fields[0];
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
                  $this->id_procedimiento_ = $rsy->fields[0];
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
                  $this->id_procedimiento_ = $rsy->fields[0];
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
                  $this->id_procedimiento_ = $rsy->fields[0];
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
                  $this->id_procedimiento_ = $rsy->fields[0];
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
                  $this->id_procedimiento_ = $rsy->fields[0];
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
                  $this->id_procedimiento_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->secad_ = $this->secad__before_qstr;
              $this->consecutivo_ = $this->consecutivo__before_qstr;
              $this->quien_reporta_ = $this->quien_reporta__before_qstr;
              $this->direccion_servicio_ = $this->direccion_servicio__before_qstr;
              $this->tipo_servicio_ = $this->tipo_servicio__before_qstr;
              $this->numero_contacto_ = $this->numero_contacto__before_qstr;
              $this->radicado_ = $this->radicado__before_qstr;
              $this->nombre_apellido_ = $this->nombre_apellido__before_qstr;
              $this->tipo_documento_ = $this->tipo_documento__before_qstr;
              $this->documento_identidad_ = $this->documento_identidad__before_qstr;
              $this->genero_ = $this->genero__before_qstr;
              $this->circunstancias_emergencia_ = $this->circunstancias_emergencia__before_qstr;
              $this->ip_ = $this->ip__before_qstr;
              $this->login_ = $this->login__before_qstr;
              $this->tipo_caso_ = $this->tipo_caso__before_qstr;
              $this->operador_ = $this->operador__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->zona_ = $this->zona__before_qstr;
              $this->discapacidad_ = $this->discapacidad__before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->secad_ = $this->secad__before_qstr;
              $this->consecutivo_ = $this->consecutivo__before_qstr;
              $this->quien_reporta_ = $this->quien_reporta__before_qstr;
              $this->direccion_servicio_ = $this->direccion_servicio__before_qstr;
              $this->tipo_servicio_ = $this->tipo_servicio__before_qstr;
              $this->numero_contacto_ = $this->numero_contacto__before_qstr;
              $this->radicado_ = $this->radicado__before_qstr;
              $this->nombre_apellido_ = $this->nombre_apellido__before_qstr;
              $this->tipo_documento_ = $this->tipo_documento__before_qstr;
              $this->documento_identidad_ = $this->documento_identidad__before_qstr;
              $this->genero_ = $this->genero__before_qstr;
              $this->circunstancias_emergencia_ = $this->circunstancias_emergencia__before_qstr;
              $this->ip_ = $this->ip__before_qstr;
              $this->login_ = $this->login__before_qstr;
              $this->tipo_caso_ = $this->tipo_caso__before_qstr;
              $this->operador_ = $this->operador__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->zona_ = $this->zona__before_qstr;
              $this->discapacidad_ = $this->discapacidad__before_qstr;
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['consecutivo_'] = $this->consecutivo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['secad_'] = $this->secad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['quien_reporta_'] = $this->quien_reporta_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['discapacidad_'] = $this->discapacidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['nombre_apellido_'] = $this->nombre_apellido_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['tipo_documento_'] = $this->tipo_documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['documento_identidad_'] = $this->documento_identidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['edad_'] = $this->edad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['numero_contacto_'] = $this->numero_contacto_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['genero_'] = $this->genero_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_tipo_evento_'] = $this->id_tipo_evento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_eps_'] = $this->id_eps_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_seguridad_social_'] = $this->id_seguridad_social_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['zona_'] = $this->zona_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['tipo_servicio_'] = $this->tipo_servicio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_barrio_'] = $this->id_barrio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['direccion_servicio_'] = $this->direccion_servicio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_ingreso_llamada_'] = $this->hora_ingreso_llamada_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_notifica_movil_'] = $this->hora_notifica_movil_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_llegada_sitio_'] = $this->hora_llegada_sitio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_llegada_ips_'] = $this->hora_llegada_ips_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['hora_salida_ips_'] = $this->hora_salida_ips_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_movil_'] = $this->id_movil_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_ips_'] = $this->id_ips_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['tipo_caso_'] = $this->tipo_caso_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert]['id_medico_'] = $this->id_medico_;
              $this->restore_zeros_null();
              if (isset($this->secad_)) { $this->nm_limpa_alfa($this->secad_); }
              if (isset($this->consecutivo_)) { $this->nm_limpa_alfa($this->consecutivo_); }
              if (isset($this->quien_reporta_)) { $this->nm_limpa_alfa($this->quien_reporta_); }
              if (isset($this->direccion_servicio_)) { $this->nm_limpa_alfa($this->direccion_servicio_); }
              if (isset($this->id_barrio_)) { $this->nm_limpa_alfa($this->id_barrio_); }
              if (isset($this->tipo_servicio_)) { $this->nm_limpa_alfa($this->tipo_servicio_); }
              if (isset($this->numero_contacto_)) { $this->nm_limpa_alfa($this->numero_contacto_); }
              if (isset($this->nombre_apellido_)) { $this->nm_limpa_alfa($this->nombre_apellido_); }
              if (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
              if (isset($this->documento_identidad_)) { $this->nm_limpa_alfa($this->documento_identidad_); }
              if (isset($this->edad_)) { $this->nm_limpa_alfa($this->edad_); }
              if (isset($this->genero_)) { $this->nm_limpa_alfa($this->genero_); }
              if (isset($this->circunstancias_emergencia_)) { $this->nm_limpa_alfa($this->circunstancias_emergencia_); }
              if (isset($this->id_seguridad_social_)) { $this->nm_limpa_alfa($this->id_seguridad_social_); }
              if (isset($this->id_eps_)) { $this->nm_limpa_alfa($this->id_eps_); }
              if (isset($this->id_movil_)) { $this->nm_limpa_alfa($this->id_movil_); }
              if (isset($this->id_ips_)) { $this->nm_limpa_alfa($this->id_ips_); }
              if (isset($this->tipo_caso_)) { $this->nm_limpa_alfa($this->tipo_caso_); }
              if (isset($this->id_medico_)) { $this->nm_limpa_alfa($this->id_medico_); }
              if (isset($this->id_tipo_evento_)) { $this->nm_limpa_alfa($this->id_tipo_evento_); }
              if (isset($this->zona_)) { $this->nm_limpa_alfa($this->zona_); }
              if (isset($this->discapacidad_)) { $this->nm_limpa_alfa($this->discapacidad_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $tmpLabel_consecutivo_ = $this->consecutivo_;
                  $this->NM_ajax_info['fldList']['consecutivo_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['consecutivo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->consecutivo_)));
                  $this->NM_ajax_info['fldList']['consecutivo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_consecutivo_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['consecutivo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['consecutivo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['consecutivo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['consecutivo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['secad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['secad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->secad_)));
                  $this->NM_ajax_info['fldList']['secad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_secad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['secad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['secad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['secad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['secad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('PONAL ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PONAL ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('BOMBEROS ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("BOMBEROS ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CRUZ ROJA ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CRUZ ROJA ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CRUEB') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CRUEB")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SCOUTS') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SCOUTS")));
$aLookup[] = array(procedimiento_final_pack_protect_string('USUARIO A NUMERO CRUEMT') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("USUARIO A NUMERO CRUEMT")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PSICOLOGA SALUD MENTAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PSICOLOGA SALUD MENTAL")));
$aLookup[] = array(procedimiento_final_pack_protect_string('MOVIL 1') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("MOVIL 1")));
$aLookup[] = array(procedimiento_final_pack_protect_string('MOVIL 2') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("MOVIL 2")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'PONAL ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'BOMBEROS ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'CRUZ ROJA ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'CRUEB';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'SCOUTS';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'USUARIO A NUMERO CRUEMT';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'PSICOLOGA SALUD MENTAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'MOVIL 1';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'MOVIL 2';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->quien_reporta_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_quien_reporta_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['quien_reporta_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['quien_reporta_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->quien_reporta_)));
                  $this->NM_ajax_info['fldList']['quien_reporta_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_quien_reporta_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['quien_reporta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['quien_reporta_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['quien_reporta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['quien_reporta_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('VISUAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("VISUAL")));
$aLookup[] = array(procedimiento_final_pack_protect_string('AUDITIVA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("AUDITIVA")));
$aLookup[] = array(procedimiento_final_pack_protect_string('FISICA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("FISICA")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SORDOCEGUERA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SORDOCEGUERA")));
$aLookup[] = array(procedimiento_final_pack_protect_string('MULTIPLE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("MULTIPLE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('INTELECTUAL ') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("INTELECTUAL ")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PSICOSOCIAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PSICOSOCIAL")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'VISUAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'AUDITIVA';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'FISICA';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'SORDOCEGUERA';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'MULTIPLE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'INTELECTUAL ';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'PSICOSOCIAL';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->discapacidad_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_discapacidad_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['discapacidad_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['discapacidad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->discapacidad_)));
                  $this->NM_ajax_info['fldList']['discapacidad_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_discapacidad_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['discapacidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['discapacidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['discapacidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['discapacidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nombre_apellido_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nombre_apellido_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nombre_apellido_)));
                  $this->NM_ajax_info['fldList']['nombre_apellido_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nombre_apellido_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombre_apellido_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombre_apellido_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombre_apellido_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombre_apellido_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('CC') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CC")));
$aLookup[] = array(procedimiento_final_pack_protect_string('TI') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("TI")));
$aLookup[] = array(procedimiento_final_pack_protect_string('RC') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("RC")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PEP') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PEP")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SC') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SC")));
$aLookup[] = array(procedimiento_final_pack_protect_string('PAS') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("PAS")));
$aLookup[] = array(procedimiento_final_pack_protect_string('NI') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("NI")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SIN DATO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SIN DATO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'CC';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'TI';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'RC';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'CE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'PEP';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'SC';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'PAS';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'NI';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'SIN DATO';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->tipo_documento_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tipo_documento_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_documento_)));
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tipo_documento_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['documento_identidad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['documento_identidad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->documento_identidad_)));
                  $this->NM_ajax_info['fldList']['documento_identidad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_documento_identidad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['documento_identidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['documento_identidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['documento_identidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['documento_identidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['edad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['edad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->edad_)));
                  $this->NM_ajax_info['fldList']['edad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_edad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['edad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['edad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['edad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['edad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['numero_contacto_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['numero_contacto_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->numero_contacto_)));
                  $this->NM_ajax_info['fldList']['numero_contacto_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_numero_contacto_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['numero_contacto_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['numero_contacto_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['numero_contacto_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['numero_contacto_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('M') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("M")));
$aLookup[] = array(procedimiento_final_pack_protect_string('T') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("T")));
$aLookup[] = array(procedimiento_final_pack_protect_string('F') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("F")));
$aLookup[] = array(procedimiento_final_pack_protect_string('N') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("N")));
$aLookup[] = array(procedimiento_final_pack_protect_string('') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("O")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'T';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'F';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = '';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->genero_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_genero_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['genero_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['genero_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->genero_)));
                  $this->NM_ajax_info['fldList']['genero_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_genero_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['genero_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['genero_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['genero_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['genero_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Tipo_Evento, evento  FROM id_tipo_evento  ORDER BY evento";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_tipo_evento_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_tipo_evento_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_tipo_evento_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_tipo_evento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_tipo_evento_)));
                  $this->NM_ajax_info['fldList']['id_tipo_evento_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_tipo_evento_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_tipo_evento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_tipo_evento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_tipo_evento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_tipo_evento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->circunstancias_emergencia_    = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $this->circunstancias_emergencia_);
                  $tmpLabel_circunstancias_emergencia_ = nl2br($this->circunstancias_emergencia_);
                  $this->NM_ajax_info['fldList']['circunstancias_emergencia_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['circunstancias_emergencia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->circunstancias_emergencia_)));
                  $this->NM_ajax_info['fldList']['circunstancias_emergencia_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_circunstancias_emergencia_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['circunstancias_emergencia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['circunstancias_emergencia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['circunstancias_emergencia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['circunstancias_emergencia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Eps, eps  FROM eps  ORDER BY eps";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_eps_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_eps_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_eps_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_eps_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_eps_)));
                  $this->NM_ajax_info['fldList']['id_eps_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_eps_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_eps_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_eps_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_eps_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_eps_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Seguridad_Social, seguridad_social  FROM seguridad_social  ORDER BY seguridad_social";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_seguridad_social_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_seguridad_social_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_seguridad_social_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_seguridad_social_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_seguridad_social_)));
                  $this->NM_ajax_info['fldList']['id_seguridad_social_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_seguridad_social_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_seguridad_social_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_seguridad_social_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_seguridad_social_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_seguridad_social_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('NORTE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("NORTE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('SUR') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("SUR")));
$aLookup[] = array(procedimiento_final_pack_protect_string('ORIENTE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("ORIENTE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('OCCIDENTE') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("OCCIDENTE")));
$aLookup[] = array(procedimiento_final_pack_protect_string('CENTRO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("CENTRO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('RURAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("RURAL")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'NORTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'SUR';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'ORIENTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'OCCIDENTE';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'CENTRO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'RURAL';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->zona_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_zona_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['zona_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['zona_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->zona_)));
                  $this->NM_ajax_info['fldList']['zona_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_zona_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['zona_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['zona_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['zona_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['zona_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('Ambulancia') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("Ambulancia")));
$aLookup[] = array(procedimiento_final_pack_protect_string('Referencia y contrareferencia') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("Referencia y contrareferencia")));
$aLookup[] = array(procedimiento_final_pack_protect_string('TAB') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("TAB")));
$aLookup[] = array(procedimiento_final_pack_protect_string('Otros') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("Otros")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Ambulancia';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Referencia y contrareferencia';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'TAB';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Otros';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->tipo_servicio_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tipo_servicio_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tipo_servicio_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['tipo_servicio_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_servicio_)));
                  $this->NM_ajax_info['fldList']['tipo_servicio_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tipo_servicio_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_servicio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_servicio_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_servicio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_servicio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Barrio, barrio  FROM barrio  ORDER BY barrio";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_barrio_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_barrio_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_barrio_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_barrio_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_barrio_)));
                  $this->NM_ajax_info['fldList']['id_barrio_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_barrio_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_barrio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_barrio_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_barrio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_barrio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->direccion_servicio_    = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $this->direccion_servicio_);
                  $tmpLabel_direccion_servicio_ = nl2br($this->direccion_servicio_);
                  $this->NM_ajax_info['fldList']['direccion_servicio_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['direccion_servicio_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->direccion_servicio_)));
                  $this->NM_ajax_info['fldList']['direccion_servicio_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_direccion_servicio_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['direccion_servicio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['direccion_servicio_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['direccion_servicio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['direccion_servicio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hora_ingreso_llamada_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['hora_ingreso_llamada_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->hora_ingreso_llamada_)));
                  $this->NM_ajax_info['fldList']['hora_ingreso_llamada_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_hora_ingreso_llamada_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_ingreso_llamada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_ingreso_llamada_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_ingreso_llamada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_ingreso_llamada_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hora_notifica_movil_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['hora_notifica_movil_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->hora_notifica_movil_)));
                  $this->NM_ajax_info['fldList']['hora_notifica_movil_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_hora_notifica_movil_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_notifica_movil_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_notifica_movil_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_notifica_movil_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_notifica_movil_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hora_llegada_sitio_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['hora_llegada_sitio_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->hora_llegada_sitio_)));
                  $this->NM_ajax_info['fldList']['hora_llegada_sitio_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_hora_llegada_sitio_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_llegada_sitio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_llegada_sitio_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_llegada_sitio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_llegada_sitio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hora_llegada_ips_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['hora_llegada_ips_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->hora_llegada_ips_)));
                  $this->NM_ajax_info['fldList']['hora_llegada_ips_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_hora_llegada_ips_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_llegada_ips_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_llegada_ips_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_llegada_ips_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_llegada_ips_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hora_salida_ips_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['hora_salida_ips_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->hora_salida_ips_)));
                  $this->NM_ajax_info['fldList']['hora_salida_ips_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_hora_salida_ips_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_salida_ips_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_salida_ips_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_salida_ips_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_salida_ips_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Movil, placa  FROM movil  ORDER BY placa";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_movil_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_movil_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_movil_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_movil_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_movil_)));
                  $this->NM_ajax_info['fldList']['id_movil_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_movil_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_movil_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_movil_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_movil_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_movil_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Ips, nombre_ips  FROM ips  ORDER BY nombre_ips";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_ips_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_ips_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_ips_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_ips_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_ips_)));
                  $this->NM_ajax_info['fldList']['id_ips_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_ips_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_ips_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_ips_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_ips_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_ips_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(procedimiento_final_pack_protect_string('EFECTIVO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("EFECTIVO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('NO EFECTIVO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("NO EFECTIVO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('FALLIDO') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("FALLIDO")));
$aLookup[] = array(procedimiento_final_pack_protect_string('APOYO PSICOSOCIAL') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("APOYO PSICOSOCIAL")));
$aLookup[] = array(procedimiento_final_pack_protect_string('APH') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("APH")));
$aLookup[] = array(procedimiento_final_pack_protect_string('ASESORIA MEDICA TELEFONICA') => str_replace('<', '&lt;',procedimiento_final_pack_protect_string("ASESORIA MEDICA TELEFONICA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'EFECTIVO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'NO EFECTIVO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'FALLIDO';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'APOYO PSICOSOCIAL';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'APH';
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'ASESORIA MEDICA TELEFONICA';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->tipo_caso_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tipo_caso_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tipo_caso_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['tipo_caso_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_caso_)));
                  $this->NM_ajax_info['fldList']['tipo_caso_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tipo_caso_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_caso_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_caso_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_caso_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_caso_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT Id_Medico, medico + registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT Id_Medico, concat(medico, registro_medico)  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT Id_Medico, medico&registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT Id_Medico, medico + registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   else
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', procedimiento_final_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == procedimiento_final_pack_protect_string(NM_charset_to_utf8($this->id_medico_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_medico_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_medico_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_medico_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_medico_)));
                  $this->NM_ajax_info['fldList']['id_medico_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_medico_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_medico_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_medico_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_medico_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_medico_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['return_edit'] = "new";
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
          $this->id_procedimiento_ = substr($this->Db->qstr($this->id_procedimiento_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
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
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Procedimiento = $this->id_procedimiento_ "); 
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
                          procedimiento_final_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['db_changed'] = true;

              $this->sc_teve_excl = true; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['parms'] = "id_procedimiento_?#?$this->id_procedimiento_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_procedimiento_ = null === $this->id_procedimiento_ ? null : substr($this->Db->qstr($this->id_procedimiento_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['procedimiento_final']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_procedimiento_final = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->id_procedimiento_)
          {
              $aNewWhereCond[] = "Id_Procedimiento = " . $this->id_procedimiento_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_procedimiento_final = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] = $qt_geral_reg_procedimiento_final;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_procedimiento_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento_ "; 
              }
              else  
              {
                  $Key_Where = "Id_Procedimiento < $this->id_procedimiento_ "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_procedimiento_final = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_procedimiento_final) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] > $qt_geral_reg_procedimiento_final)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = $qt_geral_reg_procedimiento_final - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = ($qt_geral_reg_procedimiento_final + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $Cmps_ord_def[] = "consecutivo";
      $Cmps_ord_def[] = "secad";
      $Cmps_ord_def[] = "quien_reporta";
      $Cmps_ord_def[] = "discapacidad";
      $Cmps_ord_def[] = "nombre_apellido";
      $Cmps_ord_def[] = "tipo_documento";
      $Cmps_ord_def[] = "documento_identidad";
      $Cmps_ord_def[] = "edad";
      $Cmps_ord_def[] = "numero_contacto";
      $Cmps_ord_def[] = "genero";
      $Cmps_ord_def[] = "Id_Tipo_Evento";
      $Cmps_ord_def[] = "circunstancias_emergencia";
      $Cmps_ord_def[] = "Id_Eps";
      $Cmps_ord_def[] = "Id_Seguridad_Social";
      $Cmps_ord_def[] = "Zona";
      $Cmps_ord_def[] = "tipo_servicio";
      $Cmps_ord_def[] = "Id_Barrio";
      $Cmps_ord_def[] = "direccion_servicio";
      $Cmps_ord_def[] = "hora_ingreso_llamada";
      $Cmps_ord_def[] = "Hora_notifica_movil";
      $Cmps_ord_def[] = "hora_llegada_sitio";
      $Cmps_ord_def[] = "hora_llegada_ips";
      $Cmps_ord_def[] = "hora_salida_ips";
      $Cmps_ord_def[] = "Id_Movil";
      $Cmps_ord_def[] = "Id_Ips";
      $Cmps_ord_def[] = "tipo_caso";
      $Cmps_ord_def[] = "Id_Medico";
      $sc_order_by  = "";
      $sc_order_by = "Id_Procedimiento";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' asc'; 
              switch ($this->nmgp_ordem) {
                  case "edad":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Tipo_Evento":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Eps":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Seguridad_Social":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Barrio":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "hora_ingreso_llamada":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Hora_notifica_movil":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "hora_llegada_sitio":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "hora_llegada_ips":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "hora_salida_ips":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Movil":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Ips":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Medico":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "Id_Procedimiento":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  case "fecha":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc';
                      break;
                  default:
                      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' asc';
                      break;
              }
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), ip, login, str_replace (convert(char(10),hora_ingreso_llamada,102), '.', '-') + ' ' + convert(char(8),hora_ingreso_llamada,20), str_replace (convert(char(10),Hora_notifica_movil,102), '.', '-') + ' ' + convert(char(8),Hora_notifica_movil,20), str_replace (convert(char(10),hora_llegada_sitio,102), '.', '-') + ' ' + convert(char(8),hora_llegada_sitio,20), str_replace (convert(char(10),hora_llegada_ips,102), '.', '-') + ' ' + convert(char(8),hora_llegada_ips,20), str_replace (convert(char(10),hora_salida_ips,102), '.', '-') + ' ' + convert(char(8),hora_salida_ips,20), Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, convert(char(23),fecha,121), ip, login, convert(char(23),hora_ingreso_llamada,121), convert(char(23),Hora_notifica_movil,121), convert(char(23),hora_llegada_sitio,121), convert(char(23),hora_llegada_ips,121), convert(char(23),hora_salida_ips,121), Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, EXTEND(fecha, YEAR TO DAY), ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Id_Procedimiento, secad, consecutivo, quien_reporta, direccion_servicio, Id_Barrio, tipo_servicio, numero_contacto, radicado, nombre_apellido, tipo_documento, documento_identidad, edad, genero, circunstancias_emergencia, Id_Seguridad_Social, Id_Eps, fecha, ip, login, hora_ingreso_llamada, Hora_notifica_movil, hora_llegada_sitio, hora_llegada_ips, hora_salida_ips, Id_Movil, Id_Ips, tipo_caso, operador, Id_Medico, Id_Tipo_Evento, observaciones, Zona, discapacidad from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start']) ;  
                  } 
              } 
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
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          $this->summary_record_count = 0;
          while (!$rs->EOF && $bPagTest)
          { 
              $this->summary_record_count++;
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_procedimiento_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_procedimiento_'] = $this->id_procedimiento_;
              $this->secad_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['secad_'] = $this->secad_;
              $this->consecutivo_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['consecutivo_'] = $this->consecutivo_;
              $this->quien_reporta_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['quien_reporta_'] = $this->quien_reporta_;
              $this->direccion_servicio_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['direccion_servicio_'] = $this->direccion_servicio_;
              $this->id_barrio_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_barrio_'] = $this->id_barrio_;
              $this->tipo_servicio_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['tipo_servicio_'] = $this->tipo_servicio_;
              $this->numero_contacto_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['numero_contacto_'] = $this->numero_contacto_;
              $this->radicado_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['radicado_'] = $this->radicado_;
              $this->nombre_apellido_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['nombre_apellido_'] = $this->nombre_apellido_;
              $this->tipo_documento_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['tipo_documento_'] = $this->tipo_documento_;
              $this->documento_identidad_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['documento_identidad_'] = $this->documento_identidad_;
              $this->edad_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['edad_'] = $this->edad_;
              $this->genero_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['genero_'] = $this->genero_;
              $this->circunstancias_emergencia_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['circunstancias_emergencia_'] = $this->circunstancias_emergencia_;
              $this->id_seguridad_social_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['id_seguridad_social_'] = $this->id_seguridad_social_;
              $this->id_eps_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['id_eps_'] = $this->id_eps_;
              $this->fecha_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['fecha_'] = $this->fecha_;
              $this->ip_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['ip_'] = $this->ip_;
              $this->login_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['login_'] = $this->login_;
              $this->hora_ingreso_llamada_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['hora_ingreso_llamada_'] = $this->hora_ingreso_llamada_;
              $this->hora_notifica_movil_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['hora_notifica_movil_'] = $this->hora_notifica_movil_;
              $this->hora_llegada_sitio_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['hora_llegada_sitio_'] = $this->hora_llegada_sitio_;
              $this->hora_llegada_ips_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['hora_llegada_ips_'] = $this->hora_llegada_ips_;
              $this->hora_salida_ips_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['hora_salida_ips_'] = $this->hora_salida_ips_;
              $this->id_movil_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['id_movil_'] = $this->id_movil_;
              $this->id_ips_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['id_ips_'] = $this->id_ips_;
              $this->tipo_caso_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['tipo_caso_'] = $this->tipo_caso_;
              $this->operador_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['operador_'] = $this->operador_;
              $this->id_medico_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['id_medico_'] = $this->id_medico_;
              $this->id_tipo_evento_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['id_tipo_evento_'] = $this->id_tipo_evento_;
              $this->observaciones_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['observaciones_'] = $this->observaciones_;
              $this->zona_ = $rs->fields[32] ; 
              $this->nmgp_dados_select['zona_'] = $this->zona_;
              $this->discapacidad_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['discapacidad_'] = $this->discapacidad_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_procedimiento_ = (string)$this->id_procedimiento_; 
              $this->id_barrio_ = (string)$this->id_barrio_; 
              $this->edad_ = (string)$this->edad_; 
              $this->id_seguridad_social_ = (string)$this->id_seguridad_social_; 
              $this->id_eps_ = (string)$this->id_eps_; 
              $this->id_movil_ = (string)$this->id_movil_; 
              $this->id_ips_ = (string)$this->id_ips_; 
              $this->id_medico_ = (string)$this->id_medico_; 
              $this->id_tipo_evento_ = (string)$this->id_tipo_evento_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['parms'] = "id_procedimiento_?#?$this->id_procedimiento_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_procedimiento_final[$sc_seq_vert]['consecutivo_'] =  $this->consecutivo_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['secad_'] =  $this->secad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['quien_reporta_'] =  $this->quien_reporta_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['discapacidad_'] =  $this->discapacidad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['nombre_apellido_'] =  $this->nombre_apellido_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['documento_identidad_'] =  $this->documento_identidad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['edad_'] =  $this->edad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['numero_contacto_'] =  $this->numero_contacto_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['genero_'] =  $this->genero_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_tipo_evento_'] =  $this->id_tipo_evento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['circunstancias_emergencia_'] =  $this->circunstancias_emergencia_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_eps_'] =  $this->id_eps_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_seguridad_social_'] =  $this->id_seguridad_social_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['zona_'] =  $this->zona_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_servicio_'] =  $this->tipo_servicio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_barrio_'] =  $this->id_barrio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['direccion_servicio_'] =  $this->direccion_servicio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_ingreso_llamada_'] =  $this->hora_ingreso_llamada_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_notifica_movil_'] =  $this->hora_notifica_movil_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_sitio_'] =  $this->hora_llegada_sitio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_ips_'] =  $this->hora_llegada_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_salida_ips_'] =  $this->hora_salida_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_movil_'] =  $this->id_movil_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_ips_'] =  $this->id_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_caso_'] =  $this->tipo_caso_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_medico_'] =  $this->id_medico_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_procedimiento_'] =  $this->id_procedimiento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['radicado_'] =  $this->radicado_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['fecha_'] =  $this->fecha_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['ip_'] =  $this->ip_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['login_'] =  $this->login_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['operador_'] =  $this->operador_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_procedimiento_final); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] < (($qt_geral_reg_procedimiento_final + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_multi']) 
          { 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->secad_ = "";  
              $this->consecutivo_ = "";  
              $this->quien_reporta_ = "";  
              $this->direccion_servicio_ = "";  
              $this->id_barrio_ = "";  
              $this->tipo_servicio_ = "";  
              $this->numero_contacto_ = "";  
              $this->nombre_apellido_ = "";  
              $this->tipo_documento_ = "";  
              $this->documento_identidad_ = "";  
              $this->edad_ = "";  
              $this->genero_ = "";  
              $this->circunstancias_emergencia_ = "";  
              $this->id_seguridad_social_ = "";  
              $this->id_eps_ = "";  
              $this->hora_ingreso_llamada_ = "";  
              $this->hora_notifica_movil_ = "";  
              $this->hora_llegada_sitio_ = "";  
              $this->hora_llegada_ips_ = "";  
              $this->hora_salida_ips_ = "";  
              $this->id_movil_ = "";  
              $this->id_ips_ = "";  
              $this->tipo_caso_ = "";  
              $this->id_medico_ = "";  
              $this->id_tipo_evento_ = "";  
              $this->zona_ = "";  
              $this->discapacidad_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_procedimiento_final[$sc_seq_vert]['consecutivo_'] =  $this->consecutivo_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['secad_'] =  $this->secad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['quien_reporta_'] =  $this->quien_reporta_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['discapacidad_'] =  $this->discapacidad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['nombre_apellido_'] =  $this->nombre_apellido_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['documento_identidad_'] =  $this->documento_identidad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['edad_'] =  $this->edad_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['numero_contacto_'] =  $this->numero_contacto_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['genero_'] =  $this->genero_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_tipo_evento_'] =  $this->id_tipo_evento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['circunstancias_emergencia_'] =  $this->circunstancias_emergencia_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_eps_'] =  $this->id_eps_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_seguridad_social_'] =  $this->id_seguridad_social_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['zona_'] =  $this->zona_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_servicio_'] =  $this->tipo_servicio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_barrio_'] =  $this->id_barrio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['direccion_servicio_'] =  $this->direccion_servicio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_ingreso_llamada_'] =  $this->hora_ingreso_llamada_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_notifica_movil_'] =  $this->hora_notifica_movil_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_sitio_'] =  $this->hora_llegada_sitio_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_ips_'] =  $this->hora_llegada_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_salida_ips_'] =  $this->hora_salida_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_movil_'] =  $this->id_movil_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_ips_'] =  $this->id_ips_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_caso_'] =  $this->tipo_caso_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_medico_'] =  $this->id_medico_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['id_procedimiento_'] =  $this->id_procedimiento_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['radicado_'] =  $this->radicado_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['fecha_'] =  $this->fecha_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['ip_'] =  $this->ip_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['login_'] =  $this->login_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['operador_'] =  $this->operador_; 
             $this->form_vert_procedimiento_final[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
              $sc_seq_vert++; 
          } 
      }  
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
       $this->SC_log_arr['keys']['id_procedimiento_'] =  $this->id_procedimiento_;
   }
// 
   function NM_gera_log_old($sc_seq_vert) 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert] ))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dados_select'][$sc_seq_vert] ;
           $this->SC_log_arr['fields']['secad']['0'] =  $nmgp_dados_select['secad_'];
           $this->SC_log_arr['fields']['consecutivo']['0'] =  $nmgp_dados_select['consecutivo_'];
           $this->SC_log_arr['fields']['quien_reporta']['0'] =  $nmgp_dados_select['quien_reporta_'];
           $this->SC_log_arr['fields']['direccion_servicio']['0'] =  $nmgp_dados_select['direccion_servicio_'];
           $this->SC_log_arr['fields']['Id_Barrio']['0'] =  $nmgp_dados_select['id_barrio_'];
           $this->SC_log_arr['fields']['tipo_servicio']['0'] =  $nmgp_dados_select['tipo_servicio_'];
           $this->SC_log_arr['fields']['numero_contacto']['0'] =  $nmgp_dados_select['numero_contacto_'];
           $this->SC_log_arr['fields']['radicado']['0'] =  $nmgp_dados_select['radicado_'];
           $this->SC_log_arr['fields']['nombre_apellido']['0'] =  $nmgp_dados_select['nombre_apellido_'];
           $this->SC_log_arr['fields']['tipo_documento']['0'] =  $nmgp_dados_select['tipo_documento_'];
           $this->SC_log_arr['fields']['documento_identidad']['0'] =  $nmgp_dados_select['documento_identidad_'];
           $this->SC_log_arr['fields']['edad']['0'] =  $nmgp_dados_select['edad_'];
           $this->SC_log_arr['fields']['genero']['0'] =  $nmgp_dados_select['genero_'];
           $this->SC_log_arr['fields']['circunstancias_emergencia']['0'] =  $nmgp_dados_select['circunstancias_emergencia_'];
           $this->SC_log_arr['fields']['Id_Seguridad_Social']['0'] =  $nmgp_dados_select['id_seguridad_social_'];
           $this->SC_log_arr['fields']['Id_Eps']['0'] =  $nmgp_dados_select['id_eps_'];
           $this->SC_log_arr['fields']['fecha']['0'] =  $nmgp_dados_select['fecha_'];
           $this->SC_log_arr['fields']['ip']['0'] =  $nmgp_dados_select['ip_'];
           $this->SC_log_arr['fields']['login']['0'] =  $nmgp_dados_select['login_'];
           $this->SC_log_arr['fields']['hora_ingreso_llamada']['0'] =  $nmgp_dados_select['hora_ingreso_llamada_'];
           $this->SC_log_arr['fields']['Hora_notifica_movil']['0'] =  $nmgp_dados_select['hora_notifica_movil_'];
           $this->SC_log_arr['fields']['hora_llegada_sitio']['0'] =  $nmgp_dados_select['hora_llegada_sitio_'];
           $this->SC_log_arr['fields']['hora_llegada_ips']['0'] =  $nmgp_dados_select['hora_llegada_ips_'];
           $this->SC_log_arr['fields']['hora_salida_ips']['0'] =  $nmgp_dados_select['hora_salida_ips_'];
           $this->SC_log_arr['fields']['Id_Movil']['0'] =  $nmgp_dados_select['id_movil_'];
           $this->SC_log_arr['fields']['Id_Ips']['0'] =  $nmgp_dados_select['id_ips_'];
           $this->SC_log_arr['fields']['tipo_caso']['0'] =  $nmgp_dados_select['tipo_caso_'];
           $this->SC_log_arr['fields']['operador']['0'] =  $nmgp_dados_select['operador_'];
           $this->SC_log_arr['fields']['Id_Medico']['0'] =  $nmgp_dados_select['id_medico_'];
           $this->SC_log_arr['fields']['Id_Tipo_Evento']['0'] =  $nmgp_dados_select['id_tipo_evento_'];
           $this->SC_log_arr['fields']['observaciones']['0'] =  $nmgp_dados_select['observaciones_'];
           $this->SC_log_arr['fields']['Zona']['0'] =  $nmgp_dados_select['zona_'];
           $this->SC_log_arr['fields']['discapacidad']['0'] =  $nmgp_dados_select['discapacidad_'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['secad']['1'] =  $this->secad_;
       $this->SC_log_arr['fields']['consecutivo']['1'] =  $this->consecutivo_;
       $this->SC_log_arr['fields']['quien_reporta']['1'] =  $this->quien_reporta_;
       $this->SC_log_arr['fields']['direccion_servicio']['1'] =  $this->direccion_servicio_;
       $this->SC_log_arr['fields']['Id_Barrio']['1'] =  $this->id_barrio_;
       $this->SC_log_arr['fields']['tipo_servicio']['1'] =  $this->tipo_servicio_;
       $this->SC_log_arr['fields']['numero_contacto']['1'] =  $this->numero_contacto_;
       $this->SC_log_arr['fields']['radicado']['1'] =  $this->radicado_;
       $this->SC_log_arr['fields']['nombre_apellido']['1'] =  $this->nombre_apellido_;
       $this->SC_log_arr['fields']['tipo_documento']['1'] =  $this->tipo_documento_;
       $this->SC_log_arr['fields']['documento_identidad']['1'] =  $this->documento_identidad_;
       $this->SC_log_arr['fields']['edad']['1'] =  $this->edad_;
       $this->SC_log_arr['fields']['genero']['1'] =  $this->genero_;
       $this->SC_log_arr['fields']['circunstancias_emergencia']['1'] =  $this->circunstancias_emergencia_;
       $this->SC_log_arr['fields']['Id_Seguridad_Social']['1'] =  $this->id_seguridad_social_;
       $this->SC_log_arr['fields']['Id_Eps']['1'] =  $this->id_eps_;
       $this->SC_log_arr['fields']['fecha']['1'] =  $this->fecha_;
       $this->SC_log_arr['fields']['ip']['1'] =  $this->ip_;
       $this->SC_log_arr['fields']['login']['1'] =  $this->login_;
       $this->SC_log_arr['fields']['hora_ingreso_llamada']['1'] =  $this->hora_ingreso_llamada_;
       $this->SC_log_arr['fields']['Hora_notifica_movil']['1'] =  $this->hora_notifica_movil_;
       $this->SC_log_arr['fields']['hora_llegada_sitio']['1'] =  $this->hora_llegada_sitio_;
       $this->SC_log_arr['fields']['hora_llegada_ips']['1'] =  $this->hora_llegada_ips_;
       $this->SC_log_arr['fields']['hora_salida_ips']['1'] =  $this->hora_salida_ips_;
       $this->SC_log_arr['fields']['Id_Movil']['1'] =  $this->id_movil_;
       $this->SC_log_arr['fields']['Id_Ips']['1'] =  $this->id_ips_;
       $this->SC_log_arr['fields']['tipo_caso']['1'] =  $this->tipo_caso_;
       $this->SC_log_arr['fields']['operador']['1'] =  $this->operador_;
       $this->SC_log_arr['fields']['Id_Medico']['1'] =  $this->id_medico_;
       $this->SC_log_arr['fields']['Id_Tipo_Evento']['1'] =  $this->id_tipo_evento_;
       $this->SC_log_arr['fields']['observaciones']['1'] =  $this->observaciones_;
       $this->SC_log_arr['fields']['Zona']['1'] =  $this->zona_;
       $this->SC_log_arr['fields']['discapacidad']['1'] =  $this->discapacidad_;
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
       $Log_labels['consecutivo'] =  "Radicado Cruemt";
       $Log_labels['quien_reporta'] =  "Quien Reporta";
       $Log_labels['direccion_servicio'] =  "Dirección Servicio";
       $Log_labels['Id_Barrio'] =  "Barrio";
       $Log_labels['tipo_servicio'] =  "Tipo Servicio";
       $Log_labels['numero_contacto'] =  "Numero Contacto";
       $Log_labels['radicado'] =  "Radicado";
       $Log_labels['nombre_apellido'] =  "Nombre Apellido";
       $Log_labels['tipo_documento'] =  "Tipo Documento";
       $Log_labels['documento_identidad'] =  "Documento Identidad";
       $Log_labels['edad'] =  "Edad";
       $Log_labels['genero'] =  "Genero";
       $Log_labels['circunstancias_emergencia'] =  "Circunstancias Emergencia";
       $Log_labels['Id_Seguridad_Social'] =  "Seguridad Social";
       $Log_labels['Id_Eps'] =  "Eps";
       $Log_labels['fecha'] =  "Fecha";
       $Log_labels['ip'] =  "Ip";
       $Log_labels['login'] =  "Login";
       $Log_labels['hora_ingreso_llamada'] =  "Hora Ingreso Llamada";
       $Log_labels['Hora_notifica_movil'] =  "Hora Notifica Movil";
       $Log_labels['hora_llegada_sitio'] =  "Hora Llegada Sitio";
       $Log_labels['hora_llegada_ips'] =  "Hora Llegada Ips";
       $Log_labels['hora_salida_ips'] =  "Hora Salida Ips";
       $Log_labels['Id_Movil'] =  "Móvil que atiende";
       $Log_labels['Id_Ips'] =  "Direccionamiento";
       $Log_labels['tipo_caso'] =  "Tipo Caso";
       $Log_labels['operador'] =  "Operador";
       $Log_labels['Id_Medico'] =  "Id Medico";
       $Log_labels['Id_Tipo_Evento'] =  "Tipo Evento";
       $Log_labels['observaciones'] =  "Observaciones";
       $Log_labels['Zona'] =  "Zona";
       $Log_labels['discapacidad'] =  "Discapacidad";
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
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function nombre_apellido__onChange()
{
$_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'on';
  
$original_consecutivo_ = $this->consecutivo_;

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
		$this->consecutivo_ =$ano.$mes.$dia.$ULTIMO.rand(1000,9999);

	}
else	
	{
		$this->consecutivo_ =$ano.$mes.$dia.rand(1000,9999);
	}


$modificado_consecutivo_ = $this->consecutivo_;
$this->nm_formatar_campos('consecutivo_');
$this->nmgp_refresh_fields = array();
if ($original_consecutivo_ !== $modificado_consecutivo_ || isset($this->nmgp_cmp_readonly['consecutivo_']) || (isset($bFlagRead_consecutivo_) && $bFlagRead_consecutivo_))
{
    $this->nmgp_refresh_fields[] = 'consecutivo_';
    $this->NM_ajax_changed['consecutivo_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'nombre';
procedimiento_final_pack_ajax_response();
exit;
$_SESSION['scriptcase']['procedimiento_final']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              procedimiento_final_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE html>

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
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
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("consecutivo_", "secad_", "quien_reporta_", "discapacidad_", "nombre_apellido_", "tipo_documento_", "documento_identidad_", "edad_", "numero_contacto_", "genero_", "id_tipo_evento_", "circunstancias_emergencia_", "id_eps_", "id_seguridad_social_", "zona_", "tipo_servicio_", "id_barrio_", "direccion_servicio_", "hora_ingreso_llamada_", "hora_notifica_movil_", "hora_llegada_sitio_", "hora_llegada_ips_", "hora_salida_ips_", "id_movil_", "id_ips_", "tipo_caso_", "id_medico_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['csrf_token'];
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

   function Form_lookup_quien_reporta_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PONAL ?#?PONAL ?#?N?@?";
       $nmgp_def_dados .= "BOMBEROS ?#?BOMBEROS ?#?N?@?";
       $nmgp_def_dados .= "CRUZ ROJA ?#?CRUZ ROJA ?#?N?@?";
       $nmgp_def_dados .= "CRUEB?#?CRUEB?#?N?@?";
       $nmgp_def_dados .= "SCOUTS?#?SCOUTS?#?N?@?";
       $nmgp_def_dados .= "USUARIO A NUMERO CRUEMT?#?USUARIO A NUMERO CRUEMT?#?N?@?";
       $nmgp_def_dados .= "PSICOLOGA SALUD MENTAL?#?PSICOLOGA SALUD MENTAL?#?N?@?";
       $nmgp_def_dados .= "MOVIL 1?#?MOVIL 1?#?N?@?";
       $nmgp_def_dados .= "MOVIL 2?#?MOVIL 2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_discapacidad_()
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
   function Form_lookup_tipo_documento_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "CC?#?CC?#?N?@?";
       $nmgp_def_dados .= "TI?#?TI?#?N?@?";
       $nmgp_def_dados .= "RC?#?RC?#?N?@?";
       $nmgp_def_dados .= "CE?#?CE?#?N?@?";
       $nmgp_def_dados .= "PEP?#?PEP?#?N?@?";
       $nmgp_def_dados .= "SC?#?SC?#?N?@?";
       $nmgp_def_dados .= "PAS?#?PAS?#?N?@?";
       $nmgp_def_dados .= "NI?#?NI?#?N?@?";
       $nmgp_def_dados .= "SIN DATO?#?SIN DATO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_genero_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "M?#?M?#?N?@?";
       $nmgp_def_dados .= "T?#?T?#?N?@?";
       $nmgp_def_dados .= "F?#?F?#?N?@?";
       $nmgp_def_dados .= "N?#?N?#?N?@?";
       $nmgp_def_dados .= "O?#??#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_tipo_evento_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Tipo_Evento, evento  FROM id_tipo_evento  ORDER BY evento";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'][] = $rs->fields[0];
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
   function Form_lookup_id_eps_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Eps, eps  FROM eps  ORDER BY eps";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'][] = $rs->fields[0];
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
   function Form_lookup_id_seguridad_social_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Seguridad_Social, seguridad_social  FROM seguridad_social  ORDER BY seguridad_social";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'][] = $rs->fields[0];
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
   function Form_lookup_zona_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NORTE?#?NORTE?#?N?@?";
       $nmgp_def_dados .= "SUR?#?SUR?#?N?@?";
       $nmgp_def_dados .= "ORIENTE?#?ORIENTE?#?N?@?";
       $nmgp_def_dados .= "OCCIDENTE?#?OCCIDENTE?#?N?@?";
       $nmgp_def_dados .= "CENTRO?#?CENTRO?#?N?@?";
       $nmgp_def_dados .= "RURAL?#?RURAL?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_servicio_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Ambulancia?#?Ambulancia?#?N?@?";
       $nmgp_def_dados .= "Referencia y contrareferencia?#?Referencia y contrareferencia?#?N?@?";
       $nmgp_def_dados .= "TAB?#?TAB?#?N?@?";
       $nmgp_def_dados .= "Otros?#?Otros?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_barrio_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Barrio, barrio  FROM barrio  ORDER BY barrio";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'][] = $rs->fields[0];
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
   function Form_lookup_id_movil_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Movil, placa  FROM movil  ORDER BY placa";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'][] = $rs->fields[0];
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
   function Form_lookup_id_ips_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   $nm_comando = "SELECT Id_Ips, nombre_ips  FROM ips  ORDER BY nombre_ips";

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'][] = $rs->fields[0];
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
   function Form_lookup_tipo_caso_()
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
   function Form_lookup_id_medico_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'] = array(); 
    }

   $old_value_edad_ = $this->edad_;
   $old_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $old_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $old_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $old_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $old_value_hora_salida_ips_ = $this->hora_salida_ips_;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_edad_ = $this->edad_;
   $unformatted_value_hora_ingreso_llamada_ = $this->hora_ingreso_llamada_;
   $unformatted_value_hora_notifica_movil_ = $this->hora_notifica_movil_;
   $unformatted_value_hora_llegada_sitio_ = $this->hora_llegada_sitio_;
   $unformatted_value_hora_llegada_ips_ = $this->hora_llegada_ips_;
   $unformatted_value_hora_salida_ips_ = $this->hora_salida_ips_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT Id_Medico, medico + registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT Id_Medico, concat(medico, registro_medico)  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT Id_Medico, medico&registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT Id_Medico, medico + registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }
   else
   {
       $nm_comando = "SELECT Id_Medico, medico||registro_medico  FROM medico  ORDER BY medico, registro_medico";
   }

   $this->edad_ = $old_value_edad_;
   $this->hora_ingreso_llamada_ = $old_value_hora_ingreso_llamada_;
   $this->hora_notifica_movil_ = $old_value_hora_notifica_movil_;
   $this->hora_llegada_sitio_ = $old_value_hora_llegada_sitio_;
   $this->hora_llegada_ips_ = $old_value_hora_llegada_ips_;
   $this->hora_salida_ips_ = $old_value_hora_salida_ips_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'][] = $rs->fields[0];
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
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dyn_search_and_or']);
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dyn_search_cache']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              procedimiento_final_pack_ajax_response();
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
          if ($field == "consecutivo_") 
          {
              $this->SC_monta_condicao($comando, "consecutivo", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "secad_") 
          {
              $this->SC_monta_condicao($comando, "secad", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "quien_reporta_") 
          {
              $data_lookup = $this->SC_lookup_quien_reporta_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "quien_reporta", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "discapacidad_") 
          {
              $data_lookup = $this->SC_lookup_discapacidad_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "discapacidad", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "nombre_apellido_") 
          {
              $this->SC_monta_condicao($comando, "nombre_apellido", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "tipo_documento_") 
          {
              $data_lookup = $this->SC_lookup_tipo_documento_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_documento", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "documento_identidad_") 
          {
              $this->SC_monta_condicao($comando, "documento_identidad", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "edad_") 
          {
              $this->SC_monta_condicao($comando, "edad", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "numero_contacto_") 
          {
              $this->SC_monta_condicao($comando, "numero_contacto", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "genero_") 
          {
              $data_lookup = $this->SC_lookup_genero_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "genero", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "id_tipo_evento_") 
          {
              $data_lookup = $this->SC_lookup_id_tipo_evento_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Tipo_Evento", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "circunstancias_emergencia_") 
          {
              $this->SC_monta_condicao($comando, "circunstancias_emergencia", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "id_eps_") 
          {
              $data_lookup = $this->SC_lookup_id_eps_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Eps", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "id_seguridad_social_") 
          {
              $data_lookup = $this->SC_lookup_id_seguridad_social_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Seguridad_Social", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "zona_") 
          {
              $data_lookup = $this->SC_lookup_zona_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Zona", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "tipo_servicio_") 
          {
              $data_lookup = $this->SC_lookup_tipo_servicio_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_servicio", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "id_barrio_") 
          {
              $data_lookup = $this->SC_lookup_id_barrio_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Barrio", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "direccion_servicio_") 
          {
              $this->SC_monta_condicao($comando, "direccion_servicio", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "hora_ingreso_llamada_") 
          {
              $this->SC_monta_condicao($comando, "hora_ingreso_llamada", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_notifica_movil_") 
          {
              $this->SC_monta_condicao($comando, "Hora_notifica_movil", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_llegada_sitio_") 
          {
              $this->SC_monta_condicao($comando, "hora_llegada_sitio", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_llegada_ips_") 
          {
              $this->SC_monta_condicao($comando, "hora_llegada_ips", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "hora_salida_ips_") 
          {
              $this->SC_monta_condicao($comando, "hora_salida_ips", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "id_movil_") 
          {
              $data_lookup = $this->SC_lookup_id_movil_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Movil", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "id_ips_") 
          {
              $data_lookup = $this->SC_lookup_id_ips_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Ips", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "tipo_caso_") 
          {
              $data_lookup = $this->SC_lookup_tipo_caso_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_caso", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "id_medico_") 
          {
              $data_lookup = $this->SC_lookup_id_medico_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "Id_Medico", $arg_search, $data_lookup, "INT", false);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_procedimiento_final = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] = $qt_geral_reg_procedimiento_final;
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          procedimiento_final_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          procedimiento_final_pack_ajax_response();
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
      $nm_numeric[] = "id_procedimiento";$nm_numeric[] = "id_barrio";$nm_numeric[] = "edad";$nm_numeric[] = "id_seguridad_social";$nm_numeric[] = "id_eps";$nm_numeric[] = "id_movil";$nm_numeric[] = "id_ips";$nm_numeric[] = "id_medico";$nm_numeric[] = "id_tipo_evento";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['decimal_db'] == ".")
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['SC_sep_date1'];
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
   function SC_lookup_quien_reporta_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['PONAL'] = "PONAL ";
       $data_look['BOMBEROS'] = "BOMBEROS ";
       $data_look['CRUZ ROJA'] = "CRUZ ROJA ";
       $data_look['CRUEB'] = "CRUEB";
       $data_look['SCOUTS'] = "SCOUTS";
       $data_look['USUARIO A NUMERO CRUEMT'] = "USUARIO A NUMERO CRUEMT";
       $data_look['PSICOLOGA SALUD MENTAL'] = "PSICOLOGA SALUD MENTAL";
       $data_look['MOVIL 1'] = "MOVIL 1";
       $data_look['MOVIL 2'] = "MOVIL 2";
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
   function SC_lookup_discapacidad_($condicao, $campo)
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
   function SC_lookup_tipo_documento_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['CC'] = "CC";
       $data_look['TI'] = "TI";
       $data_look['RC'] = "RC";
       $data_look['CE'] = "CE";
       $data_look['PEP'] = "PEP";
       $data_look['SC'] = "SC";
       $data_look['PAS'] = "PAS";
       $data_look['NI'] = "NI";
       $data_look['SIN DATO'] = "SIN DATO";
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
   function SC_lookup_genero_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['M'] = "M";
       $data_look['T'] = "T";
       $data_look['F'] = "F";
       $data_look['N'] = "N";
       $data_look[''] = "O";
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
   function SC_lookup_id_tipo_evento_($condicao, $campo)
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
   function SC_lookup_id_eps_($condicao, $campo)
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
   function SC_lookup_id_seguridad_social_($condicao, $campo)
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
   function SC_lookup_zona_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['NORTE'] = "NORTE";
       $data_look['SUR'] = "SUR";
       $data_look['ORIENTE'] = "ORIENTE";
       $data_look['OCCIDENTE'] = "OCCIDENTE";
       $data_look['CENTRO'] = "CENTRO";
       $data_look['RURAL'] = "RURAL";
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
   function SC_lookup_tipo_servicio_($condicao, $campo)
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
   function SC_lookup_id_barrio_($condicao, $campo)
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
   function SC_lookup_id_movil_($condicao, $campo)
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
   function SC_lookup_id_ips_($condicao, $campo)
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
   function SC_lookup_tipo_caso_($condicao, $campo)
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
   function SC_lookup_id_medico_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT medico + registro_medico, Id_Medico FROM medico WHERE (#cmp_imedico + registro_medico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(medico,registro_medico), Id_Medico FROM medico WHERE (#cmp_iconcat(medico,registro_medico)#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT medico&registro_medico, Id_Medico FROM medico WHERE (#cmp_imedico&registro_medico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT medico||registro_medico, Id_Medico FROM medico WHERE (#cmp_imedico||registro_medico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT medico + registro_medico, Id_Medico FROM medico WHERE (#cmp_imedico + registro_medico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT medico||registro_medico, Id_Medico FROM medico WHERE (#cmp_imedico||registro_medico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT medico||registro_medico, Id_Medico FROM medico WHERE (#cmp_imedico||registro_medico#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
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
       $nmgp_saida_form = "procedimiento_final_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['nm_run_menu'] = 2;
       $nmgp_saida_form = "procedimiento_final_fim.php";
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
       procedimiento_final_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE html>

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue']);
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
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-2");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-3");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-4");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-5");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-6");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-7");
                break;
            case "exit":
                return array("sc_b_sai_b.sc-unique-btn-8");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " procedimiento1"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " procedimiento1"; } ?></div>
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
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R") {
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
        $summaryLine = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
        $summaryLine = str_replace(
            [
                '?start?',
                '?final?',
                '?total?',
            ],
            [
                'total' == $this->form_paginacao ? 1 : $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] + 1,
                $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] + $this->summary_record_count,
                $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] + 1,
            ],
            $summaryLine
        );

        return $summaryLine;
    } // getSummaryLine

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['ordem_ord'] == " desc") {
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
