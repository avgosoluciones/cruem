<?php

class resumen_procedimiento_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }


function actionBar_isValidState($buttonName, $buttonState)
{
    switch ($buttonName) {
    }

    return false;
}


function actionBar_displayState($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateHint($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateConfirm($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateDisable($buttonName)
{
    if (isset($this->sc_actionbar_disabled[$buttonName]) && $this->sc_actionbar_disabled[$buttonName]) {
        return ' disabled';
    }

    return '';
}

function actionBar_getStateHide($buttonName)
{
    if (isset($this->sc_actionbar_hidden[$buttonName]) && $this->sc_actionbar_hidden[$buttonName]) {
        return ' sc-actionbar-button-hidden';
    }

    return '';
}

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_resumen_procedimiento($cadapar[1]);
                   nm_protect_num_resumen_procedimiento($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['resumen_procedimiento']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "resumen_procedimiento_total.class.php"); 
      $this->Tot      = new resumen_procedimiento_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->sum_procedimiento_id_procedimiento = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['tot_geral'][2];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['resumen_procedimiento']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_resumen_procedimiento";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "resumen_procedimiento.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['resumen_procedimiento']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['resumen_procedimiento']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['resumen_procedimiento']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->barrio_id_barrio = (isset($Busca_temp['barrio_id_barrio'])) ? $Busca_temp['barrio_id_barrio'] : ""; 
          $tmp_pos = (is_string($this->barrio_id_barrio)) ? strpos($this->barrio_id_barrio, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->barrio_id_barrio))
          {
              $this->barrio_id_barrio = substr($this->barrio_id_barrio, 0, $tmp_pos);
          }
          $this->barrio_barrio = (isset($Busca_temp['barrio_barrio'])) ? $Busca_temp['barrio_barrio'] : ""; 
          $tmp_pos = (is_string($this->barrio_barrio)) ? strpos($this->barrio_barrio, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->barrio_barrio))
          {
              $this->barrio_barrio = substr($this->barrio_barrio, 0, $tmp_pos);
          }
          $this->barrio_id_sector = (isset($Busca_temp['barrio_id_sector'])) ? $Busca_temp['barrio_id_sector'] : ""; 
          $tmp_pos = (is_string($this->barrio_id_sector)) ? strpos($this->barrio_id_sector, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->barrio_id_sector))
          {
              $this->barrio_id_sector = substr($this->barrio_id_sector, 0, $tmp_pos);
          }
          $this->eps_id_eps = (isset($Busca_temp['eps_id_eps'])) ? $Busca_temp['eps_id_eps'] : ""; 
          $tmp_pos = (is_string($this->eps_id_eps)) ? strpos($this->eps_id_eps, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->eps_id_eps))
          {
              $this->eps_id_eps = substr($this->eps_id_eps, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['procedimiento_id_procedimiento'])) ? $this->New_label['procedimiento_id_procedimiento'] : "Procedimiento"; 
          if ($Cada_col == "procedimiento_id_procedimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_fecha'])) ? $this->New_label['procedimiento_fecha'] : "Fecha"; 
          if ($Cada_col == "procedimiento_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_consecutivo'])) ? $this->New_label['procedimiento_consecutivo'] : "Consecutivo"; 
          if ($Cada_col == "procedimiento_consecutivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Reporte Observaciones"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medico_medico'])) ? $this->New_label['medico_medico'] : "Médico"; 
          if ($Cada_col == "medico_medico" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ambulancia_placa'])) ? $this->New_label['ambulancia_placa'] : "Ambulancia"; 
          if ($Cada_col == "ambulancia_placa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Crear Anotaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_secad'])) ? $this->New_label['procedimiento_secad'] : "Secad"; 
          if ($Cada_col == "procedimiento_secad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sector_sector'])) ? $this->New_label['sector_sector'] : "Sector"; 
          if ($Cada_col == "sector_sector" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['barrio_barrio'])) ? $this->New_label['barrio_barrio'] : "Barrio"; 
          if ($Cada_col == "barrio_barrio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_direccion_servicio'])) ? $this->New_label['procedimiento_direccion_servicio'] : "Direccion Servicio"; 
          if ($Cada_col == "procedimiento_direccion_servicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_tipo_servicio'])) ? $this->New_label['procedimiento_tipo_servicio'] : "Tipo Servicio"; 
          if ($Cada_col == "procedimiento_tipo_servicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_nombre_apellido'])) ? $this->New_label['procedimiento_nombre_apellido'] : "Nombre Apellido"; 
          if ($Cada_col == "procedimiento_nombre_apellido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_tipo_documento'])) ? $this->New_label['procedimiento_tipo_documento'] : "Tipo Documento"; 
          if ($Cada_col == "procedimiento_tipo_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_documento_identidad'])) ? $this->New_label['procedimiento_documento_identidad'] : "Documento Identidad"; 
          if ($Cada_col == "procedimiento_documento_identidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_numero_contacto'])) ? $this->New_label['procedimiento_numero_contacto'] : "Numero Contacto"; 
          if ($Cada_col == "procedimiento_numero_contacto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['eps_eps'])) ? $this->New_label['eps_eps'] : "Eps"; 
          if ($Cada_col == "eps_eps" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['seguridad_seguridad_social'])) ? $this->New_label['seguridad_seguridad_social'] : "Seguridad Social"; 
          if ($Cada_col == "seguridad_seguridad_social" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_edad'])) ? $this->New_label['procedimiento_edad'] : "Edad"; 
          if ($Cada_col == "procedimiento_edad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_genero'])) ? $this->New_label['procedimiento_genero'] : "Genero"; 
          if ($Cada_col == "procedimiento_genero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_circunstancias_emergencia'])) ? $this->New_label['procedimiento_circunstancias_emergencia'] : "Circunstancias Emergencia"; 
          if ($Cada_col == "procedimiento_circunstancias_emergencia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_hora_ingreso_llamada'])) ? $this->New_label['procedimiento_hora_ingreso_llamada'] : "Hora Ingreso Llamada"; 
          if ($Cada_col == "procedimiento_hora_ingreso_llamada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_hora_notifica_movil'])) ? $this->New_label['procedimiento_hora_notifica_movil'] : "Hora Notifica Movil"; 
          if ($Cada_col == "procedimiento_hora_notifica_movil" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_hora_llegada_sitio'])) ? $this->New_label['procedimiento_hora_llegada_sitio'] : "Hora Llegada Sitio"; 
          if ($Cada_col == "procedimiento_hora_llegada_sitio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_hora_llegada_ips'])) ? $this->New_label['procedimiento_hora_llegada_ips'] : "Hora Llegada Ips"; 
          if ($Cada_col == "procedimiento_hora_llegada_ips" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_hora_salida_ips'])) ? $this->New_label['procedimiento_hora_salida_ips'] : "Hora Salida Ips"; 
          if ($Cada_col == "procedimiento_hora_salida_ips" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_radicado'])) ? $this->New_label['procedimiento_radicado'] : "Radicado"; 
          if ($Cada_col == "procedimiento_radicado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_login'])) ? $this->New_label['procedimiento_login'] : "Usuario de registro"; 
          if ($Cada_col == "procedimiento_login" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['barrio_id_barrio'])) ? $this->New_label['barrio_id_barrio'] : "Id Barrio"; 
          if ($Cada_col == "barrio_id_barrio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['barrio_id_sector'])) ? $this->New_label['barrio_id_sector'] : "Id Sector"; 
          if ($Cada_col == "barrio_id_sector" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['eps_id_eps'])) ? $this->New_label['eps_id_eps'] : "Id Eps"; 
          if ($Cada_col == "eps_id_eps" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_id_barrio'])) ? $this->New_label['procedimiento_id_barrio'] : "Id Barrio"; 
          if ($Cada_col == "procedimiento_id_barrio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_id_seguridad_social'])) ? $this->New_label['procedimiento_id_seguridad_social'] : "Id Seguridad Social"; 
          if ($Cada_col == "procedimiento_id_seguridad_social" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_id_eps'])) ? $this->New_label['procedimiento_id_eps'] : "Id Eps"; 
          if ($Cada_col == "procedimiento_id_eps" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['procedimiento_ip'])) ? $this->New_label['procedimiento_ip'] : "Ip"; 
          if ($Cada_col == "procedimiento_ip" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sector_id_sector'])) ? $this->New_label['sector_id_sector'] : "Id Sector"; 
          if ($Cada_col == "sector_id_sector" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['seguridad_id_seguridad_social'])) ? $this->New_label['seguridad_id_seguridad_social'] : "Id Seguridad Social"; 
          if ($Cada_col == "seguridad_id_seguridad_social" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medico_id_medico'])) ? $this->New_label['medico_id_medico'] : "Id Medico"; 
          if ($Cada_col == "medico_id_medico" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medico_registro_medico'])) ? $this->New_label['medico_registro_medico'] : "Registro Medico"; 
          if ($Cada_col == "medico_registro_medico" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medico_telefono'])) ? $this->New_label['medico_telefono'] : "Telefono"; 
          if ($Cada_col == "medico_telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medico_estado'])) ? $this->New_label['medico_estado'] : "Estado"; 
          if ($Cada_col == "medico_estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ambulancia_id_movil'])) ? $this->New_label['ambulancia_id_movil'] : "Id Movil"; 
          if ($Cada_col == "ambulancia_id_movil" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, str_replace (convert(char(10),procedimiento.fecha,102), '.', '-') + ' ' + convert(char(8),procedimiento.fecha,20) as procedimiento_fecha, procedimiento.consecutivo as procedimiento_consecutivo, medico.medico as medico_medico, ambulancia.placa as ambulancia_placa, procedimiento.secad as procedimiento_secad, sector.Sector as sector_sector, barrio.barrio as barrio_barrio, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.numero_contacto as procedimiento_numero_contacto, eps.eps as eps_eps, seguridad.seguridad_social as seguridad_seguridad_social, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, str_replace (convert(char(10),procedimiento.hora_ingreso_llamada,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_ingreso_llamada,20) as cmp_maior_30_4, str_replace (convert(char(10),procedimiento.Hora_notifica_movil,102), '.', '-') + ' ' + convert(char(8),procedimiento.Hora_notifica_movil,20) as cmp_maior_30_5, str_replace (convert(char(10),procedimiento.hora_llegada_sitio,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_llegada_sitio,20) as cmp_maior_30_6, str_replace (convert(char(10),procedimiento.hora_llegada_ips,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_llegada_ips,20) as procedimiento_hora_llegada_ips, str_replace (convert(char(10),procedimiento.hora_salida_ips,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_salida_ips,20) as procedimiento_hora_salida_ips, procedimiento.radicado as procedimiento_radicado, procedimiento.login as procedimiento_login, barrio.Id_Barrio as barrio_id_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.ip as procedimiento_ip, sector.Id_Sector as sector_id_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, medico.Id_Medico as medico_id_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.fecha as procedimiento_fecha, procedimiento.consecutivo as procedimiento_consecutivo, medico.medico as medico_medico, ambulancia.placa as ambulancia_placa, procedimiento.secad as procedimiento_secad, sector.Sector as sector_sector, barrio.barrio as barrio_barrio, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.numero_contacto as procedimiento_numero_contacto, eps.eps as eps_eps, seguridad.seguridad_social as seguridad_seguridad_social, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.hora_ingreso_llamada as cmp_maior_30_4, procedimiento.Hora_notifica_movil as cmp_maior_30_5, procedimiento.hora_llegada_sitio as cmp_maior_30_6, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.radicado as procedimiento_radicado, procedimiento.login as procedimiento_login, barrio.Id_Barrio as barrio_id_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.ip as procedimiento_ip, sector.Id_Sector as sector_id_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, medico.Id_Medico as medico_id_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, convert(char(23),procedimiento.fecha,121) as procedimiento_fecha, procedimiento.consecutivo as procedimiento_consecutivo, medico.medico as medico_medico, ambulancia.placa as ambulancia_placa, procedimiento.secad as procedimiento_secad, sector.Sector as sector_sector, barrio.barrio as barrio_barrio, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.numero_contacto as procedimiento_numero_contacto, eps.eps as eps_eps, seguridad.seguridad_social as seguridad_seguridad_social, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, convert(char(23),procedimiento.hora_ingreso_llamada,121) as cmp_maior_30_4, convert(char(23),procedimiento.Hora_notifica_movil,121) as cmp_maior_30_5, convert(char(23),procedimiento.hora_llegada_sitio,121) as cmp_maior_30_6, convert(char(23),procedimiento.hora_llegada_ips,121) as procedimiento_hora_llegada_ips, convert(char(23),procedimiento.hora_salida_ips,121) as procedimiento_hora_salida_ips, procedimiento.radicado as procedimiento_radicado, procedimiento.login as procedimiento_login, barrio.Id_Barrio as barrio_id_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.ip as procedimiento_ip, sector.Id_Sector as sector_id_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, medico.Id_Medico as medico_id_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.fecha as procedimiento_fecha, procedimiento.consecutivo as procedimiento_consecutivo, medico.medico as medico_medico, ambulancia.placa as ambulancia_placa, procedimiento.secad as procedimiento_secad, sector.Sector as sector_sector, barrio.barrio as barrio_barrio, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.numero_contacto as procedimiento_numero_contacto, eps.eps as eps_eps, seguridad.seguridad_social as seguridad_seguridad_social, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.hora_ingreso_llamada as cmp_maior_30_4, procedimiento.Hora_notifica_movil as cmp_maior_30_5, procedimiento.hora_llegada_sitio as cmp_maior_30_6, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.radicado as procedimiento_radicado, procedimiento.login as procedimiento_login, barrio.Id_Barrio as barrio_id_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.ip as procedimiento_ip, sector.Id_Sector as sector_id_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, medico.Id_Medico as medico_id_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, EXTEND(procedimiento.fecha, YEAR TO DAY) as procedimiento_fecha, procedimiento.consecutivo as procedimiento_consecutivo, medico.medico as medico_medico, ambulancia.placa as ambulancia_placa, procedimiento.secad as procedimiento_secad, sector.Sector as sector_sector, barrio.barrio as barrio_barrio, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.numero_contacto as procedimiento_numero_contacto, eps.eps as eps_eps, seguridad.seguridad_social as seguridad_seguridad_social, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.hora_ingreso_llamada as cmp_maior_30_4, procedimiento.Hora_notifica_movil as cmp_maior_30_5, procedimiento.hora_llegada_sitio as cmp_maior_30_6, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.radicado as procedimiento_radicado, procedimiento.login as procedimiento_login, barrio.Id_Barrio as barrio_id_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.ip as procedimiento_ip, sector.Id_Sector as sector_id_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, medico.Id_Medico as medico_id_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.fecha as procedimiento_fecha, procedimiento.consecutivo as procedimiento_consecutivo, medico.medico as medico_medico, ambulancia.placa as ambulancia_placa, procedimiento.secad as procedimiento_secad, sector.Sector as sector_sector, barrio.barrio as barrio_barrio, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.numero_contacto as procedimiento_numero_contacto, eps.eps as eps_eps, seguridad.seguridad_social as seguridad_seguridad_social, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.hora_ingreso_llamada as cmp_maior_30_4, procedimiento.Hora_notifica_movil as cmp_maior_30_5, procedimiento.hora_llegada_sitio as cmp_maior_30_6, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.radicado as procedimiento_radicado, procedimiento.login as procedimiento_login, barrio.Id_Barrio as barrio_id_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.ip as procedimiento_ip, sector.Id_Sector as sector_id_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, medico.Id_Medico as medico_id_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->procedimiento_id_procedimiento = $rs->fields[0] ;  
         $this->procedimiento_id_procedimiento = (string)$this->procedimiento_id_procedimiento;
         $this->procedimiento_fecha = $rs->fields[1] ;  
         $this->procedimiento_consecutivo = $rs->fields[2] ;  
         $this->medico_medico = $rs->fields[3] ;  
         $this->ambulancia_placa = $rs->fields[4] ;  
         $this->procedimiento_secad = $rs->fields[5] ;  
         $this->sector_sector = $rs->fields[6] ;  
         $this->barrio_barrio = $rs->fields[7] ;  
         $this->procedimiento_direccion_servicio = $rs->fields[8] ;  
         $this->procedimiento_tipo_servicio = $rs->fields[9] ;  
         $this->procedimiento_nombre_apellido = $rs->fields[10] ;  
         $this->procedimiento_tipo_documento = $rs->fields[11] ;  
         $this->procedimiento_documento_identidad = $rs->fields[12] ;  
         $this->procedimiento_numero_contacto = $rs->fields[13] ;  
         $this->eps_eps = $rs->fields[14] ;  
         $this->seguridad_seguridad_social = $rs->fields[15] ;  
         $this->procedimiento_edad = $rs->fields[16] ;  
         $this->procedimiento_edad = (string)$this->procedimiento_edad;
         $this->procedimiento_genero = $rs->fields[17] ;  
         $this->procedimiento_circunstancias_emergencia = $rs->fields[18] ;  
         $this->procedimiento_hora_ingreso_llamada = $rs->fields[19] ;  
         $this->procedimiento_hora_notifica_movil = $rs->fields[20] ;  
         $this->procedimiento_hora_llegada_sitio = $rs->fields[21] ;  
         $this->procedimiento_hora_llegada_ips = $rs->fields[22] ;  
         $this->procedimiento_hora_salida_ips = $rs->fields[23] ;  
         $this->procedimiento_radicado = $rs->fields[24] ;  
         $this->procedimiento_login = $rs->fields[25] ;  
         $this->barrio_id_barrio = $rs->fields[26] ;  
         $this->barrio_id_barrio = (string)$this->barrio_id_barrio;
         $this->barrio_id_sector = $rs->fields[27] ;  
         $this->barrio_id_sector = (string)$this->barrio_id_sector;
         $this->eps_id_eps = $rs->fields[28] ;  
         $this->eps_id_eps = (string)$this->eps_id_eps;
         $this->procedimiento_id_barrio = $rs->fields[29] ;  
         $this->procedimiento_id_barrio = (string)$this->procedimiento_id_barrio;
         $this->procedimiento_id_seguridad_social = $rs->fields[30] ;  
         $this->procedimiento_id_seguridad_social = (string)$this->procedimiento_id_seguridad_social;
         $this->procedimiento_id_eps = $rs->fields[31] ;  
         $this->procedimiento_id_eps = (string)$this->procedimiento_id_eps;
         $this->procedimiento_ip = $rs->fields[32] ;  
         $this->sector_id_sector = $rs->fields[33] ;  
         $this->sector_id_sector = (string)$this->sector_id_sector;
         $this->seguridad_id_seguridad_social = $rs->fields[34] ;  
         $this->seguridad_id_seguridad_social = (string)$this->seguridad_id_seguridad_social;
         $this->medico_id_medico = $rs->fields[35] ;  
         $this->medico_id_medico = (string)$this->medico_id_medico;
         $this->medico_registro_medico = $rs->fields[36] ;  
         $this->medico_telefono = $rs->fields[37] ;  
         $this->medico_estado = $rs->fields[38] ;  
         $this->ambulancia_id_movil = $rs->fields[39] ;  
         $this->ambulancia_id_movil = (string)$this->ambulancia_id_movil;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- procedimiento_id_procedimiento
   function NM_export_procedimiento_id_procedimiento()
   {
             nmgp_Form_Num_Val($this->procedimiento_id_procedimiento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->procedimiento_id_procedimiento = NM_charset_to_utf8($this->procedimiento_id_procedimiento);
         $this->procedimiento_id_procedimiento = str_replace('<', '&lt;', $this->procedimiento_id_procedimiento);
         $this->procedimiento_id_procedimiento = str_replace('>', '&gt;', $this->procedimiento_id_procedimiento);
         $this->Texto_tag .= "<td>" . $this->procedimiento_id_procedimiento . "</td>\r\n";
   }
   //----- procedimiento_fecha
   function NM_export_procedimiento_fecha()
   {
             $conteudo_x =  $this->procedimiento_fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->procedimiento_fecha, "YYYY-MM-DD  ");
                 $this->procedimiento_fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->procedimiento_fecha = NM_charset_to_utf8($this->procedimiento_fecha);
         $this->procedimiento_fecha = str_replace('<', '&lt;', $this->procedimiento_fecha);
         $this->procedimiento_fecha = str_replace('>', '&gt;', $this->procedimiento_fecha);
         $this->Texto_tag .= "<td>" . $this->procedimiento_fecha . "</td>\r\n";
   }
   //----- procedimiento_consecutivo
   function NM_export_procedimiento_consecutivo()
   {
         $this->procedimiento_consecutivo = html_entity_decode($this->procedimiento_consecutivo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_consecutivo = strip_tags($this->procedimiento_consecutivo);
         $this->procedimiento_consecutivo = NM_charset_to_utf8($this->procedimiento_consecutivo);
         $this->procedimiento_consecutivo = str_replace('<', '&lt;', $this->procedimiento_consecutivo);
         $this->procedimiento_consecutivo = str_replace('>', '&gt;', $this->procedimiento_consecutivo);
         $this->Texto_tag .= "<td>" . $this->procedimiento_consecutivo . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         $this->sc_field_0 = NM_charset_to_utf8($this->sc_field_0);
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- medico_medico
   function NM_export_medico_medico()
   {
         $this->medico_medico = html_entity_decode($this->medico_medico, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->medico_medico = strip_tags($this->medico_medico);
         $this->medico_medico = NM_charset_to_utf8($this->medico_medico);
         $this->medico_medico = str_replace('<', '&lt;', $this->medico_medico);
         $this->medico_medico = str_replace('>', '&gt;', $this->medico_medico);
         $this->Texto_tag .= "<td>" . $this->medico_medico . "</td>\r\n";
   }
   //----- ambulancia_placa
   function NM_export_ambulancia_placa()
   {
         $this->ambulancia_placa = html_entity_decode($this->ambulancia_placa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ambulancia_placa = strip_tags($this->ambulancia_placa);
         $this->ambulancia_placa = NM_charset_to_utf8($this->ambulancia_placa);
         $this->ambulancia_placa = str_replace('<', '&lt;', $this->ambulancia_placa);
         $this->ambulancia_placa = str_replace('>', '&gt;', $this->ambulancia_placa);
         $this->Texto_tag .= "<td>" . $this->ambulancia_placa . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- procedimiento_secad
   function NM_export_procedimiento_secad()
   {
         $this->procedimiento_secad = html_entity_decode($this->procedimiento_secad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_secad = strip_tags($this->procedimiento_secad);
         $this->procedimiento_secad = NM_charset_to_utf8($this->procedimiento_secad);
         $this->procedimiento_secad = str_replace('<', '&lt;', $this->procedimiento_secad);
         $this->procedimiento_secad = str_replace('>', '&gt;', $this->procedimiento_secad);
         $this->Texto_tag .= "<td>" . $this->procedimiento_secad . "</td>\r\n";
   }
   //----- sector_sector
   function NM_export_sector_sector()
   {
         $this->sector_sector = html_entity_decode($this->sector_sector, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sector_sector = strip_tags($this->sector_sector);
         $this->sector_sector = NM_charset_to_utf8($this->sector_sector);
         $this->sector_sector = str_replace('<', '&lt;', $this->sector_sector);
         $this->sector_sector = str_replace('>', '&gt;', $this->sector_sector);
         $this->Texto_tag .= "<td>" . $this->sector_sector . "</td>\r\n";
   }
   //----- barrio_barrio
   function NM_export_barrio_barrio()
   {
         $this->barrio_barrio = html_entity_decode($this->barrio_barrio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->barrio_barrio = strip_tags($this->barrio_barrio);
         $this->barrio_barrio = NM_charset_to_utf8($this->barrio_barrio);
         $this->barrio_barrio = str_replace('<', '&lt;', $this->barrio_barrio);
         $this->barrio_barrio = str_replace('>', '&gt;', $this->barrio_barrio);
         $this->Texto_tag .= "<td>" . $this->barrio_barrio . "</td>\r\n";
   }
   //----- procedimiento_direccion_servicio
   function NM_export_procedimiento_direccion_servicio()
   {
         $this->procedimiento_direccion_servicio = html_entity_decode($this->procedimiento_direccion_servicio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_direccion_servicio = strip_tags($this->procedimiento_direccion_servicio);
         $this->procedimiento_direccion_servicio = NM_charset_to_utf8($this->procedimiento_direccion_servicio);
         $this->procedimiento_direccion_servicio = str_replace('<', '&lt;', $this->procedimiento_direccion_servicio);
         $this->procedimiento_direccion_servicio = str_replace('>', '&gt;', $this->procedimiento_direccion_servicio);
         $this->Texto_tag .= "<td>" . $this->procedimiento_direccion_servicio . "</td>\r\n";
   }
   //----- procedimiento_tipo_servicio
   function NM_export_procedimiento_tipo_servicio()
   {
         $this->procedimiento_tipo_servicio = html_entity_decode($this->procedimiento_tipo_servicio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_tipo_servicio = strip_tags($this->procedimiento_tipo_servicio);
         $this->procedimiento_tipo_servicio = NM_charset_to_utf8($this->procedimiento_tipo_servicio);
         $this->procedimiento_tipo_servicio = str_replace('<', '&lt;', $this->procedimiento_tipo_servicio);
         $this->procedimiento_tipo_servicio = str_replace('>', '&gt;', $this->procedimiento_tipo_servicio);
         $this->Texto_tag .= "<td>" . $this->procedimiento_tipo_servicio . "</td>\r\n";
   }
   //----- procedimiento_nombre_apellido
   function NM_export_procedimiento_nombre_apellido()
   {
         $this->procedimiento_nombre_apellido = html_entity_decode($this->procedimiento_nombre_apellido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_nombre_apellido = strip_tags($this->procedimiento_nombre_apellido);
         $this->procedimiento_nombre_apellido = NM_charset_to_utf8($this->procedimiento_nombre_apellido);
         $this->procedimiento_nombre_apellido = str_replace('<', '&lt;', $this->procedimiento_nombre_apellido);
         $this->procedimiento_nombre_apellido = str_replace('>', '&gt;', $this->procedimiento_nombre_apellido);
         $this->Texto_tag .= "<td>" . $this->procedimiento_nombre_apellido . "</td>\r\n";
   }
   //----- procedimiento_tipo_documento
   function NM_export_procedimiento_tipo_documento()
   {
         $this->procedimiento_tipo_documento = html_entity_decode($this->procedimiento_tipo_documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_tipo_documento = strip_tags($this->procedimiento_tipo_documento);
         $this->procedimiento_tipo_documento = NM_charset_to_utf8($this->procedimiento_tipo_documento);
         $this->procedimiento_tipo_documento = str_replace('<', '&lt;', $this->procedimiento_tipo_documento);
         $this->procedimiento_tipo_documento = str_replace('>', '&gt;', $this->procedimiento_tipo_documento);
         $this->Texto_tag .= "<td>" . $this->procedimiento_tipo_documento . "</td>\r\n";
   }
   //----- procedimiento_documento_identidad
   function NM_export_procedimiento_documento_identidad()
   {
         $this->procedimiento_documento_identidad = html_entity_decode($this->procedimiento_documento_identidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_documento_identidad = strip_tags($this->procedimiento_documento_identidad);
         $this->procedimiento_documento_identidad = NM_charset_to_utf8($this->procedimiento_documento_identidad);
         $this->procedimiento_documento_identidad = str_replace('<', '&lt;', $this->procedimiento_documento_identidad);
         $this->procedimiento_documento_identidad = str_replace('>', '&gt;', $this->procedimiento_documento_identidad);
         $this->Texto_tag .= "<td>" . $this->procedimiento_documento_identidad . "</td>\r\n";
   }
   //----- procedimiento_numero_contacto
   function NM_export_procedimiento_numero_contacto()
   {
         $this->procedimiento_numero_contacto = html_entity_decode($this->procedimiento_numero_contacto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_numero_contacto = strip_tags($this->procedimiento_numero_contacto);
         $this->procedimiento_numero_contacto = NM_charset_to_utf8($this->procedimiento_numero_contacto);
         $this->procedimiento_numero_contacto = str_replace('<', '&lt;', $this->procedimiento_numero_contacto);
         $this->procedimiento_numero_contacto = str_replace('>', '&gt;', $this->procedimiento_numero_contacto);
         $this->Texto_tag .= "<td>" . $this->procedimiento_numero_contacto . "</td>\r\n";
   }
   //----- eps_eps
   function NM_export_eps_eps()
   {
         $this->eps_eps = html_entity_decode($this->eps_eps, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->eps_eps = strip_tags($this->eps_eps);
         $this->eps_eps = NM_charset_to_utf8($this->eps_eps);
         $this->eps_eps = str_replace('<', '&lt;', $this->eps_eps);
         $this->eps_eps = str_replace('>', '&gt;', $this->eps_eps);
         $this->Texto_tag .= "<td>" . $this->eps_eps . "</td>\r\n";
   }
   //----- seguridad_seguridad_social
   function NM_export_seguridad_seguridad_social()
   {
         $this->seguridad_seguridad_social = html_entity_decode($this->seguridad_seguridad_social, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->seguridad_seguridad_social = strip_tags($this->seguridad_seguridad_social);
         $this->seguridad_seguridad_social = NM_charset_to_utf8($this->seguridad_seguridad_social);
         $this->seguridad_seguridad_social = str_replace('<', '&lt;', $this->seguridad_seguridad_social);
         $this->seguridad_seguridad_social = str_replace('>', '&gt;', $this->seguridad_seguridad_social);
         $this->Texto_tag .= "<td>" . $this->seguridad_seguridad_social . "</td>\r\n";
   }
   //----- procedimiento_edad
   function NM_export_procedimiento_edad()
   {
             nmgp_Form_Num_Val($this->procedimiento_edad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->procedimiento_edad = NM_charset_to_utf8($this->procedimiento_edad);
         $this->procedimiento_edad = str_replace('<', '&lt;', $this->procedimiento_edad);
         $this->procedimiento_edad = str_replace('>', '&gt;', $this->procedimiento_edad);
         $this->Texto_tag .= "<td>" . $this->procedimiento_edad . "</td>\r\n";
   }
   //----- procedimiento_genero
   function NM_export_procedimiento_genero()
   {
         $this->procedimiento_genero = html_entity_decode($this->procedimiento_genero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_genero = strip_tags($this->procedimiento_genero);
         $this->procedimiento_genero = NM_charset_to_utf8($this->procedimiento_genero);
         $this->procedimiento_genero = str_replace('<', '&lt;', $this->procedimiento_genero);
         $this->procedimiento_genero = str_replace('>', '&gt;', $this->procedimiento_genero);
         $this->Texto_tag .= "<td>" . $this->procedimiento_genero . "</td>\r\n";
   }
   //----- procedimiento_circunstancias_emergencia
   function NM_export_procedimiento_circunstancias_emergencia()
   {
         $this->procedimiento_circunstancias_emergencia = html_entity_decode($this->procedimiento_circunstancias_emergencia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_circunstancias_emergencia = strip_tags($this->procedimiento_circunstancias_emergencia);
         $this->procedimiento_circunstancias_emergencia = NM_charset_to_utf8($this->procedimiento_circunstancias_emergencia);
         $this->procedimiento_circunstancias_emergencia = str_replace('<', '&lt;', $this->procedimiento_circunstancias_emergencia);
         $this->procedimiento_circunstancias_emergencia = str_replace('>', '&gt;', $this->procedimiento_circunstancias_emergencia);
         $this->Texto_tag .= "<td>" . $this->procedimiento_circunstancias_emergencia . "</td>\r\n";
   }
   //----- procedimiento_hora_ingreso_llamada
   function NM_export_procedimiento_hora_ingreso_llamada()
   {
             $conteudo_x =  $this->procedimiento_hora_ingreso_llamada;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->procedimiento_hora_ingreso_llamada, "HH:II:SS  ");
                 $this->procedimiento_hora_ingreso_llamada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->procedimiento_hora_ingreso_llamada = NM_charset_to_utf8($this->procedimiento_hora_ingreso_llamada);
         $this->procedimiento_hora_ingreso_llamada = str_replace('<', '&lt;', $this->procedimiento_hora_ingreso_llamada);
         $this->procedimiento_hora_ingreso_llamada = str_replace('>', '&gt;', $this->procedimiento_hora_ingreso_llamada);
         $this->Texto_tag .= "<td>" . $this->procedimiento_hora_ingreso_llamada . "</td>\r\n";
   }
   //----- procedimiento_hora_notifica_movil
   function NM_export_procedimiento_hora_notifica_movil()
   {
             $conteudo_x =  $this->procedimiento_hora_notifica_movil;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->procedimiento_hora_notifica_movil, "HH:II:SS  ");
                 $this->procedimiento_hora_notifica_movil = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->procedimiento_hora_notifica_movil = NM_charset_to_utf8($this->procedimiento_hora_notifica_movil);
         $this->procedimiento_hora_notifica_movil = str_replace('<', '&lt;', $this->procedimiento_hora_notifica_movil);
         $this->procedimiento_hora_notifica_movil = str_replace('>', '&gt;', $this->procedimiento_hora_notifica_movil);
         $this->Texto_tag .= "<td>" . $this->procedimiento_hora_notifica_movil . "</td>\r\n";
   }
   //----- procedimiento_hora_llegada_sitio
   function NM_export_procedimiento_hora_llegada_sitio()
   {
             $conteudo_x =  $this->procedimiento_hora_llegada_sitio;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->procedimiento_hora_llegada_sitio, "HH:II:SS  ");
                 $this->procedimiento_hora_llegada_sitio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->procedimiento_hora_llegada_sitio = NM_charset_to_utf8($this->procedimiento_hora_llegada_sitio);
         $this->procedimiento_hora_llegada_sitio = str_replace('<', '&lt;', $this->procedimiento_hora_llegada_sitio);
         $this->procedimiento_hora_llegada_sitio = str_replace('>', '&gt;', $this->procedimiento_hora_llegada_sitio);
         $this->Texto_tag .= "<td>" . $this->procedimiento_hora_llegada_sitio . "</td>\r\n";
   }
   //----- procedimiento_hora_llegada_ips
   function NM_export_procedimiento_hora_llegada_ips()
   {
             $conteudo_x =  $this->procedimiento_hora_llegada_ips;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->procedimiento_hora_llegada_ips, "HH:II:SS  ");
                 $this->procedimiento_hora_llegada_ips = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->procedimiento_hora_llegada_ips = NM_charset_to_utf8($this->procedimiento_hora_llegada_ips);
         $this->procedimiento_hora_llegada_ips = str_replace('<', '&lt;', $this->procedimiento_hora_llegada_ips);
         $this->procedimiento_hora_llegada_ips = str_replace('>', '&gt;', $this->procedimiento_hora_llegada_ips);
         $this->Texto_tag .= "<td>" . $this->procedimiento_hora_llegada_ips . "</td>\r\n";
   }
   //----- procedimiento_hora_salida_ips
   function NM_export_procedimiento_hora_salida_ips()
   {
             $conteudo_x =  $this->procedimiento_hora_salida_ips;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->procedimiento_hora_salida_ips, "HH:II:SS  ");
                 $this->procedimiento_hora_salida_ips = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->procedimiento_hora_salida_ips = NM_charset_to_utf8($this->procedimiento_hora_salida_ips);
         $this->procedimiento_hora_salida_ips = str_replace('<', '&lt;', $this->procedimiento_hora_salida_ips);
         $this->procedimiento_hora_salida_ips = str_replace('>', '&gt;', $this->procedimiento_hora_salida_ips);
         $this->Texto_tag .= "<td>" . $this->procedimiento_hora_salida_ips . "</td>\r\n";
   }
   //----- procedimiento_radicado
   function NM_export_procedimiento_radicado()
   {
         $this->procedimiento_radicado = html_entity_decode($this->procedimiento_radicado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_radicado = strip_tags($this->procedimiento_radicado);
         $this->procedimiento_radicado = NM_charset_to_utf8($this->procedimiento_radicado);
         $this->procedimiento_radicado = str_replace('<', '&lt;', $this->procedimiento_radicado);
         $this->procedimiento_radicado = str_replace('>', '&gt;', $this->procedimiento_radicado);
         $this->Texto_tag .= "<td>" . $this->procedimiento_radicado . "</td>\r\n";
   }
   //----- procedimiento_login
   function NM_export_procedimiento_login()
   {
         $this->procedimiento_login = html_entity_decode($this->procedimiento_login, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_login = strip_tags($this->procedimiento_login);
         $this->procedimiento_login = NM_charset_to_utf8($this->procedimiento_login);
         $this->procedimiento_login = str_replace('<', '&lt;', $this->procedimiento_login);
         $this->procedimiento_login = str_replace('>', '&gt;', $this->procedimiento_login);
         $this->Texto_tag .= "<td>" . $this->procedimiento_login . "</td>\r\n";
   }
   //----- barrio_id_barrio
   function NM_export_barrio_id_barrio()
   {
             nmgp_Form_Num_Val($this->barrio_id_barrio, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->barrio_id_barrio = NM_charset_to_utf8($this->barrio_id_barrio);
         $this->barrio_id_barrio = str_replace('<', '&lt;', $this->barrio_id_barrio);
         $this->barrio_id_barrio = str_replace('>', '&gt;', $this->barrio_id_barrio);
         $this->Texto_tag .= "<td>" . $this->barrio_id_barrio . "</td>\r\n";
   }
   //----- barrio_id_sector
   function NM_export_barrio_id_sector()
   {
             nmgp_Form_Num_Val($this->barrio_id_sector, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->barrio_id_sector = NM_charset_to_utf8($this->barrio_id_sector);
         $this->barrio_id_sector = str_replace('<', '&lt;', $this->barrio_id_sector);
         $this->barrio_id_sector = str_replace('>', '&gt;', $this->barrio_id_sector);
         $this->Texto_tag .= "<td>" . $this->barrio_id_sector . "</td>\r\n";
   }
   //----- eps_id_eps
   function NM_export_eps_id_eps()
   {
             nmgp_Form_Num_Val($this->eps_id_eps, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->eps_id_eps = NM_charset_to_utf8($this->eps_id_eps);
         $this->eps_id_eps = str_replace('<', '&lt;', $this->eps_id_eps);
         $this->eps_id_eps = str_replace('>', '&gt;', $this->eps_id_eps);
         $this->Texto_tag .= "<td>" . $this->eps_id_eps . "</td>\r\n";
   }
   //----- procedimiento_id_barrio
   function NM_export_procedimiento_id_barrio()
   {
             nmgp_Form_Num_Val($this->procedimiento_id_barrio, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->procedimiento_id_barrio = NM_charset_to_utf8($this->procedimiento_id_barrio);
         $this->procedimiento_id_barrio = str_replace('<', '&lt;', $this->procedimiento_id_barrio);
         $this->procedimiento_id_barrio = str_replace('>', '&gt;', $this->procedimiento_id_barrio);
         $this->Texto_tag .= "<td>" . $this->procedimiento_id_barrio . "</td>\r\n";
   }
   //----- procedimiento_id_seguridad_social
   function NM_export_procedimiento_id_seguridad_social()
   {
             nmgp_Form_Num_Val($this->procedimiento_id_seguridad_social, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->procedimiento_id_seguridad_social = NM_charset_to_utf8($this->procedimiento_id_seguridad_social);
         $this->procedimiento_id_seguridad_social = str_replace('<', '&lt;', $this->procedimiento_id_seguridad_social);
         $this->procedimiento_id_seguridad_social = str_replace('>', '&gt;', $this->procedimiento_id_seguridad_social);
         $this->Texto_tag .= "<td>" . $this->procedimiento_id_seguridad_social . "</td>\r\n";
   }
   //----- procedimiento_id_eps
   function NM_export_procedimiento_id_eps()
   {
             nmgp_Form_Num_Val($this->procedimiento_id_eps, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->procedimiento_id_eps = NM_charset_to_utf8($this->procedimiento_id_eps);
         $this->procedimiento_id_eps = str_replace('<', '&lt;', $this->procedimiento_id_eps);
         $this->procedimiento_id_eps = str_replace('>', '&gt;', $this->procedimiento_id_eps);
         $this->Texto_tag .= "<td>" . $this->procedimiento_id_eps . "</td>\r\n";
   }
   //----- procedimiento_ip
   function NM_export_procedimiento_ip()
   {
         $this->procedimiento_ip = html_entity_decode($this->procedimiento_ip, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->procedimiento_ip = strip_tags($this->procedimiento_ip);
         $this->procedimiento_ip = NM_charset_to_utf8($this->procedimiento_ip);
         $this->procedimiento_ip = str_replace('<', '&lt;', $this->procedimiento_ip);
         $this->procedimiento_ip = str_replace('>', '&gt;', $this->procedimiento_ip);
         $this->Texto_tag .= "<td>" . $this->procedimiento_ip . "</td>\r\n";
   }
   //----- sector_id_sector
   function NM_export_sector_id_sector()
   {
             nmgp_Form_Num_Val($this->sector_id_sector, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->sector_id_sector = NM_charset_to_utf8($this->sector_id_sector);
         $this->sector_id_sector = str_replace('<', '&lt;', $this->sector_id_sector);
         $this->sector_id_sector = str_replace('>', '&gt;', $this->sector_id_sector);
         $this->Texto_tag .= "<td>" . $this->sector_id_sector . "</td>\r\n";
   }
   //----- seguridad_id_seguridad_social
   function NM_export_seguridad_id_seguridad_social()
   {
             nmgp_Form_Num_Val($this->seguridad_id_seguridad_social, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->seguridad_id_seguridad_social = NM_charset_to_utf8($this->seguridad_id_seguridad_social);
         $this->seguridad_id_seguridad_social = str_replace('<', '&lt;', $this->seguridad_id_seguridad_social);
         $this->seguridad_id_seguridad_social = str_replace('>', '&gt;', $this->seguridad_id_seguridad_social);
         $this->Texto_tag .= "<td>" . $this->seguridad_id_seguridad_social . "</td>\r\n";
   }
   //----- medico_id_medico
   function NM_export_medico_id_medico()
   {
             nmgp_Form_Num_Val($this->medico_id_medico, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->medico_id_medico = NM_charset_to_utf8($this->medico_id_medico);
         $this->medico_id_medico = str_replace('<', '&lt;', $this->medico_id_medico);
         $this->medico_id_medico = str_replace('>', '&gt;', $this->medico_id_medico);
         $this->Texto_tag .= "<td>" . $this->medico_id_medico . "</td>\r\n";
   }
   //----- medico_registro_medico
   function NM_export_medico_registro_medico()
   {
         $this->medico_registro_medico = html_entity_decode($this->medico_registro_medico, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->medico_registro_medico = strip_tags($this->medico_registro_medico);
         $this->medico_registro_medico = NM_charset_to_utf8($this->medico_registro_medico);
         $this->medico_registro_medico = str_replace('<', '&lt;', $this->medico_registro_medico);
         $this->medico_registro_medico = str_replace('>', '&gt;', $this->medico_registro_medico);
         $this->Texto_tag .= "<td>" . $this->medico_registro_medico . "</td>\r\n";
   }
   //----- medico_telefono
   function NM_export_medico_telefono()
   {
         $this->medico_telefono = html_entity_decode($this->medico_telefono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->medico_telefono = strip_tags($this->medico_telefono);
         $this->medico_telefono = NM_charset_to_utf8($this->medico_telefono);
         $this->medico_telefono = str_replace('<', '&lt;', $this->medico_telefono);
         $this->medico_telefono = str_replace('>', '&gt;', $this->medico_telefono);
         $this->Texto_tag .= "<td>" . $this->medico_telefono . "</td>\r\n";
   }
   //----- medico_estado
   function NM_export_medico_estado()
   {
         $this->medico_estado = html_entity_decode($this->medico_estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->medico_estado = strip_tags($this->medico_estado);
         $this->medico_estado = NM_charset_to_utf8($this->medico_estado);
         $this->medico_estado = str_replace('<', '&lt;', $this->medico_estado);
         $this->medico_estado = str_replace('>', '&gt;', $this->medico_estado);
         $this->Texto_tag .= "<td>" . $this->medico_estado . "</td>\r\n";
   }
   //----- ambulancia_id_movil
   function NM_export_ambulancia_id_movil()
   {
             nmgp_Form_Num_Val($this->ambulancia_id_movil, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ambulancia_id_movil = NM_charset_to_utf8($this->ambulancia_id_movil);
         $this->ambulancia_id_movil = str_replace('<', '&lt;', $this->ambulancia_id_movil);
         $this->ambulancia_id_movil = str_replace('>', '&gt;', $this->ambulancia_id_movil);
         $this->Texto_tag .= "<td>" . $this->ambulancia_id_movil . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Emergencias registradas :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="resumen_procedimiento_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="resumen_procedimiento"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
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
              if ($tam_campo >= $cont2)
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
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
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
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
