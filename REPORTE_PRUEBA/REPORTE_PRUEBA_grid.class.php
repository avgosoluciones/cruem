<?php
class REPORTE_PRUEBA_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $anotaciones = array();
   var $anotaciones_id_observacion = array();
   var $anotaciones_id_procedimiento = array();
   var $anotaciones_fecha = array();
   var $anotaciones_ip = array();
   var $anotaciones_observa = array();
   var $anotaciones_user = array();
   var $sc_field_0 = array();
   var $txt_fecha = array();
   var $barrio_id_barrio = array();
   var $barrio_barrio = array();
   var $barrio_id_sector = array();
   var $eps_id_eps = array();
   var $eps_eps = array();
   var $procedimiento_id_procedimiento = array();
   var $procedimiento_secad = array();
   var $procedimiento_direccion_servicio = array();
   var $procedimiento_id_barrio = array();
   var $procedimiento_quien_reporta = array();
   var $procedimiento_hora_ingreso_llamada = array();
   var $procedimiento_hora_notifica_movil = array();
   var $procedimiento_hora_llegada_sitio = array();
   var $procedimiento_hora_llegada_ips = array();
   var $procedimiento_hora_salida_ips = array();
   var $procedimiento_tipo_servicio = array();
   var $procedimiento_numero_contacto = array();
   var $procedimiento_radicado = array();
   var $procedimiento_nombre_apellido = array();
   var $procedimiento_tipo_documento = array();
   var $procedimiento_documento_identidad = array();
   var $procedimiento_edad = array();
   var $procedimiento_tipo_caso = array();
   var $procedimiento_genero = array();
   var $procedimiento_circunstancias_emergencia = array();
   var $procedimiento_id_seguridad_social = array();
   var $procedimiento_id_eps = array();
   var $procedimiento_fecha = array();
   var $procedimiento_ip = array();
   var $procedimiento_login = array();
   var $sector_id_sector = array();
   var $sector_sector = array();
   var $seguridad_id_seguridad_social = array();
   var $seguridad_seguridad_social = array();
   var $medico_id_medico = array();
   var $medico_medico = array();
   var $medico_registro_medico = array();
   var $medico_telefono = array();
   var $medico_estado = array();
   var $ambulancia_id_movil = array();
   var $ambulancia_placa = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = array(216, 370);
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['REPORTE_PRUEBA']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("REPORTE_PRUEBA", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->barrio_id_barrio[0] = (isset($Busca_temp['barrio_id_barrio'])) ? $Busca_temp['barrio_id_barrio'] : ""; 
       $tmp_pos = (is_string($this->barrio_id_barrio[0])) ? strpos($this->barrio_id_barrio[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->barrio_id_barrio[0]))
       {
           $this->barrio_id_barrio[0] = substr($this->barrio_id_barrio[0], 0, $tmp_pos);
       }
       $this->barrio_barrio[0] = (isset($Busca_temp['barrio_barrio'])) ? $Busca_temp['barrio_barrio'] : ""; 
       $tmp_pos = (is_string($this->barrio_barrio[0])) ? strpos($this->barrio_barrio[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->barrio_barrio[0]))
       {
           $this->barrio_barrio[0] = substr($this->barrio_barrio[0], 0, $tmp_pos);
       }
       $this->barrio_id_sector[0] = (isset($Busca_temp['barrio_id_sector'])) ? $Busca_temp['barrio_id_sector'] : ""; 
       $tmp_pos = (is_string($this->barrio_id_sector[0])) ? strpos($this->barrio_id_sector[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->barrio_id_sector[0]))
       {
           $this->barrio_id_sector[0] = substr($this->barrio_id_sector[0], 0, $tmp_pos);
       }
       $this->eps_id_eps[0] = (isset($Busca_temp['eps_id_eps'])) ? $Busca_temp['eps_id_eps'] : ""; 
       $tmp_pos = (is_string($this->eps_id_eps[0])) ? strpos($this->eps_id_eps[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->eps_id_eps[0]))
       {
           $this->eps_id_eps[0] = substr($this->eps_id_eps[0], 0, $tmp_pos);
       }
       $this->sector_sector[0] = (isset($Busca_temp['sector_sector'])) ? $Busca_temp['sector_sector'] : ""; 
       $tmp_pos = (is_string($this->sector_sector[0])) ? strpos($this->sector_sector[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->sector_sector[0]))
       {
           $this->sector_sector[0] = substr($this->sector_sector[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig'] = " where (procedimiento.Id_Procedimiento = " . $_SESSION['Id_Procedimiento'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.quien_reporta as procedimiento_quien_reporta, str_replace (convert(char(10),procedimiento.hora_ingreso_llamada,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_ingreso_llamada,20) as cmp_maior_30_2, str_replace (convert(char(10),procedimiento.Hora_notifica_movil,102), '.', '-') + ' ' + convert(char(8),procedimiento.Hora_notifica_movil,20) as cmp_maior_30_3, str_replace (convert(char(10),procedimiento.hora_llegada_sitio,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_llegada_sitio,20) as cmp_maior_30_4, str_replace (convert(char(10),procedimiento.hora_llegada_ips,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_llegada_ips,20) as procedimiento_hora_llegada_ips, str_replace (convert(char(10),procedimiento.hora_salida_ips,102), '.', '-') + ' ' + convert(char(8),procedimiento.hora_salida_ips,20) as procedimiento_hora_salida_ips, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_5, procedimiento.edad as procedimiento_edad, procedimiento.tipo_caso as procedimiento_tipo_caso, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_6, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, str_replace (convert(char(10),procedimiento.fecha,102), '.', '-') + ' ' + convert(char(8),procedimiento.fecha,20) as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.quien_reporta as procedimiento_quien_reporta, procedimiento.hora_ingreso_llamada as cmp_maior_30_2, procedimiento.Hora_notifica_movil as cmp_maior_30_3, procedimiento.hora_llegada_sitio as cmp_maior_30_4, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_5, procedimiento.edad as procedimiento_edad, procedimiento.tipo_caso as procedimiento_tipo_caso, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_6, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.fecha as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.quien_reporta as procedimiento_quien_reporta, convert(char(23),procedimiento.hora_ingreso_llamada,121) as cmp_maior_30_2, convert(char(23),procedimiento.Hora_notifica_movil,121) as cmp_maior_30_3, convert(char(23),procedimiento.hora_llegada_sitio,121) as cmp_maior_30_4, convert(char(23),procedimiento.hora_llegada_ips,121) as procedimiento_hora_llegada_ips, convert(char(23),procedimiento.hora_salida_ips,121) as procedimiento_hora_salida_ips, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_5, procedimiento.edad as procedimiento_edad, procedimiento.tipo_caso as procedimiento_tipo_caso, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_6, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, convert(char(23),procedimiento.fecha,121) as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.quien_reporta as procedimiento_quien_reporta, procedimiento.hora_ingreso_llamada as cmp_maior_30_2, procedimiento.Hora_notifica_movil as cmp_maior_30_3, procedimiento.hora_llegada_sitio as cmp_maior_30_4, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_5, procedimiento.edad as procedimiento_edad, procedimiento.tipo_caso as procedimiento_tipo_caso, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_6, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.fecha as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.quien_reporta as procedimiento_quien_reporta, procedimiento.hora_ingreso_llamada as cmp_maior_30_2, procedimiento.Hora_notifica_movil as cmp_maior_30_3, procedimiento.hora_llegada_sitio as cmp_maior_30_4, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_5, procedimiento.edad as procedimiento_edad, procedimiento.tipo_caso as procedimiento_tipo_caso, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_6, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, EXTEND(procedimiento.fecha, YEAR TO DAY) as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.quien_reporta as procedimiento_quien_reporta, procedimiento.hora_ingreso_llamada as cmp_maior_30_2, procedimiento.Hora_notifica_movil as cmp_maior_30_3, procedimiento.hora_llegada_sitio as cmp_maior_30_4, procedimiento.hora_llegada_ips as procedimiento_hora_llegada_ips, procedimiento.hora_salida_ips as procedimiento_hora_salida_ips, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_5, procedimiento.edad as procedimiento_edad, procedimiento.tipo_caso as procedimiento_tipo_caso, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_6, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.fecha as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_scale()
 {
   $NM_cont  = 0;
   $NM_num_h = 0;
   $NM_num_v = 0;
   $this->Pdf->SetFont('Helvetica', '', 6);
   $this->Pdf->SetLineWidth(0.4);
   $this->Pdf->SetAutoPageBreak(false);
   for ($i = 3; $i < 212; $i += 1)
   {
      $NM_cont++;
      if ($NM_cont % 10 == 0)
      {
          $NM_num_h++;
          $NM_num_h = ($NM_num_h == 10) ? 0 : $NM_num_h;
          $this->Pdf->Text($i, 2, $NM_num_h);
          $this->Pdf->Line($i, 3, $i, 5);
          $this->Pdf->Line($i, 363, $i, 365);
          $this->Pdf->Text($i, 365, $NM_num_h);
      }
      elseif ($NM_cont % 5 == 0)
      {
          $this->Pdf->Line($i, 3.5, $i, 5);
          $this->Pdf->Line($i, 363, $i, 364.5);
      }
      else
      {
          $this->Pdf->Line($i, 4, $i, 5);
          $this->Pdf->Line($i, 363, $i, 364);
      }
   }
   $NM_cont = 0;
   for ($i = 3; $i < 366; $i += 1)
   {
      $NM_cont++;
      if ($NM_cont % 10 == 0)
      {
          $NM_num_v++;
          $NM_num_v = ($NM_num_v == 10) ? 0 : $NM_num_v;
          $this->Pdf->Text(1, $i, $NM_num_v);
          $this->Pdf->Line(3, $i, 5, $i);
          $this->Pdf->Line(208, $i, 210, $i);
          $this->Pdf->Text(211, $i, $NM_num_v);
      }
      elseif ($NM_cont % 5 == 0)
      {
          $this->Pdf->Line(3.5, $i, 5, $i);
          $this->Pdf->Line(208, $i, 209.5, $i);
      }
      else
      {
          $this->Pdf->Line(4, $i, 5, $i);
          $this->Pdf->Line(208, $i, 209, $i);
      }
   }
   $this->Pdf->SetAutoPageBreak(true);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__bitacora sugerencia_Page_1.png", "5.000000", "5.000000", "210", "380", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['barrio_id_barrio'] = "Id Barrio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['barrio_barrio'] = "Barrio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['barrio_id_sector'] = "Id Sector";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['eps_id_eps'] = "Id Eps";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['eps_eps'] = "Eps";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_id_procedimiento'] = "Id Procedimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_secad'] = "Secad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_direccion_servicio'] = "Direccion Servicio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_id_barrio'] = "Id Barrio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_quien_reporta'] = "Quien Reporta";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_hora_ingreso_llamada'] = "Hora Ingreso Llamada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_hora_notifica_movil'] = "Hora Notifica Movil";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_hora_llegada_sitio'] = "Hora Llegada Sitio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_hora_llegada_ips'] = "Hora Llegada Ips";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_hora_salida_ips'] = "Hora Salida Ips";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_tipo_servicio'] = "Tipo Servicio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_numero_contacto'] = "Numero Contacto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_radicado'] = "Radicado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_nombre_apellido'] = "Nombre Apellido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_tipo_documento'] = "Tipo Documento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_documento_identidad'] = "Documento Identidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_edad'] = "Edad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_tipo_caso'] = "Tipo Caso";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_genero'] = "Genero";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_circunstancias_emergencia'] = "Circunstancias Emergencia";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_id_seguridad_social'] = "Id Seguridad Social";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_id_eps'] = "Id Eps";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_fecha'] = "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_ip'] = "Ip";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['procedimiento_login'] = "Login";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['sector_id_sector'] = "Id Sector";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['sector_sector'] = "Sector";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['seguridad_id_seguridad_social'] = "Id Seguridad Social";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['seguridad_seguridad_social'] = "Seguridad Social";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['medico_id_medico'] = "Id Medico";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['medico_medico'] = "Medico";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['medico_registro_medico'] = "Registro Medico";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['medico_telefono'] = "Telefono";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['medico_estado'] = "Estado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['ambulancia_id_movil'] = "Id Movil";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['ambulancia_placa'] = "Placa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones'] = "Anotaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones_id_observacion'] = "Id Observacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones_id_procedimiento'] = "Id Procedimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones_fecha'] = "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones_ip'] = "Ip";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones_observa'] = "Observa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['anotaciones_user'] = "User";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['sc_field_0'] = "Tipo Caso";
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['labels']['txt_fecha'] = "txt_fecha";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['REPORTE_PRUEBA']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      $this->Pdf_scale();
      $this->Pdf_init();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->barrio_id_barrio[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->barrio_id_barrio[$this->nm_grid_colunas] = (string)$this->barrio_id_barrio[$this->nm_grid_colunas];
          $this->barrio_barrio[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->barrio_id_sector[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->barrio_id_sector[$this->nm_grid_colunas] = (string)$this->barrio_id_sector[$this->nm_grid_colunas];
          $this->eps_id_eps[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->eps_id_eps[$this->nm_grid_colunas] = (string)$this->eps_id_eps[$this->nm_grid_colunas];
          $this->eps_eps[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->procedimiento_id_procedimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->procedimiento_id_procedimiento[$this->nm_grid_colunas] = (string)$this->procedimiento_id_procedimiento[$this->nm_grid_colunas];
          $this->procedimiento_secad[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->procedimiento_direccion_servicio[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->procedimiento_id_barrio[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->procedimiento_id_barrio[$this->nm_grid_colunas] = (string)$this->procedimiento_id_barrio[$this->nm_grid_colunas];
          $this->procedimiento_quien_reporta[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->procedimiento_tipo_servicio[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->procedimiento_numero_contacto[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->procedimiento_radicado[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->procedimiento_nombre_apellido[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->procedimiento_tipo_documento[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->procedimiento_documento_identidad[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->procedimiento_edad[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->procedimiento_edad[$this->nm_grid_colunas] = (string)$this->procedimiento_edad[$this->nm_grid_colunas];
          $this->procedimiento_tipo_caso[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->procedimiento_genero[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] = (string)$this->procedimiento_id_seguridad_social[$this->nm_grid_colunas];
          $this->procedimiento_id_eps[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->procedimiento_id_eps[$this->nm_grid_colunas] = (string)$this->procedimiento_id_eps[$this->nm_grid_colunas];
          $this->procedimiento_fecha[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->procedimiento_ip[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->procedimiento_login[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->sector_id_sector[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->sector_id_sector[$this->nm_grid_colunas] = (string)$this->sector_id_sector[$this->nm_grid_colunas];
          $this->sector_sector[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->seguridad_id_seguridad_social[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->seguridad_id_seguridad_social[$this->nm_grid_colunas] = (string)$this->seguridad_id_seguridad_social[$this->nm_grid_colunas];
          $this->seguridad_seguridad_social[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->medico_id_medico[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->medico_id_medico[$this->nm_grid_colunas] = (string)$this->medico_id_medico[$this->nm_grid_colunas];
          $this->medico_medico[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->medico_registro_medico[$this->nm_grid_colunas] = $this->rs_grid->fields[36] ;  
          $this->medico_telefono[$this->nm_grid_colunas] = $this->rs_grid->fields[37] ;  
          $this->medico_estado[$this->nm_grid_colunas] = $this->rs_grid->fields[38] ;  
          $this->ambulancia_id_movil[$this->nm_grid_colunas] = $this->rs_grid->fields[39] ;  
          $this->ambulancia_id_movil[$this->nm_grid_colunas] = (string)$this->ambulancia_id_movil[$this->nm_grid_colunas];
          $this->ambulancia_placa[$this->nm_grid_colunas] = $this->rs_grid->fields[40] ;  
          $this->anotaciones_id_observacion[$this->nm_grid_colunas] = array();
          $this->anotaciones_id_procedimiento[$this->nm_grid_colunas] = array();
          $this->anotaciones_fecha[$this->nm_grid_colunas] = array();
          $this->anotaciones_ip[$this->nm_grid_colunas] = array();
          $this->anotaciones_observa[$this->nm_grid_colunas] = array();
          $this->anotaciones_user[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_anotaciones($this->anotaciones[$this->nm_grid_colunas] , $_SESSION['Id_Procedimiento'], $array_anotaciones); 
          $NM_ind = 0;
          $this->anotaciones = array();
          foreach ($array_anotaciones as $cada_subselect) 
          {
              $this->anotaciones[$this->nm_grid_colunas][$NM_ind] = "";
              $this->anotaciones_id_observacion[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->anotaciones_observa[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->anotaciones_user[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->anotaciones_ip[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->anotaciones_id_procedimiento[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $NM_ind++;
          }
          $this->sc_field_0[$this->nm_grid_colunas] = "";
          $this->txt_fecha[$this->nm_grid_colunas] = "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->barrio_id_barrio[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->barrio_id_barrio[$this->nm_grid_colunas]));
          }
          else {
              $this->barrio_id_barrio[$this->nm_grid_colunas] = sc_strip_script($this->barrio_id_barrio[$this->nm_grid_colunas]);
          }
          if ($this->barrio_id_barrio[$this->nm_grid_colunas] === "") 
          { 
              $this->barrio_id_barrio[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->barrio_id_barrio[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->barrio_id_barrio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->barrio_id_barrio[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->barrio_barrio[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->barrio_barrio[$this->nm_grid_colunas]));
          }
          else {
              $this->barrio_barrio[$this->nm_grid_colunas] = sc_strip_script($this->barrio_barrio[$this->nm_grid_colunas]);
          }
          if ($this->barrio_barrio[$this->nm_grid_colunas] === "") 
          { 
              $this->barrio_barrio[$this->nm_grid_colunas] = "" ;  
          } 
          $this->barrio_barrio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->barrio_barrio[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->barrio_id_sector[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->barrio_id_sector[$this->nm_grid_colunas]));
          }
          else {
              $this->barrio_id_sector[$this->nm_grid_colunas] = sc_strip_script($this->barrio_id_sector[$this->nm_grid_colunas]);
          }
          if ($this->barrio_id_sector[$this->nm_grid_colunas] === "") 
          { 
              $this->barrio_id_sector[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->barrio_id_sector[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->barrio_id_sector[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->barrio_id_sector[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->eps_id_eps[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->eps_id_eps[$this->nm_grid_colunas]));
          }
          else {
              $this->eps_id_eps[$this->nm_grid_colunas] = sc_strip_script($this->eps_id_eps[$this->nm_grid_colunas]);
          }
          if ($this->eps_id_eps[$this->nm_grid_colunas] === "") 
          { 
              $this->eps_id_eps[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->eps_id_eps[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->eps_id_eps[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->eps_id_eps[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->eps_eps[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->eps_eps[$this->nm_grid_colunas]));
          }
          else {
              $this->eps_eps[$this->nm_grid_colunas] = sc_strip_script($this->eps_eps[$this->nm_grid_colunas]);
          }
          if ($this->eps_eps[$this->nm_grid_colunas] === "") 
          { 
              $this->eps_eps[$this->nm_grid_colunas] = "" ;  
          } 
          $this->eps_eps[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->eps_eps[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_id_procedimiento[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_id_procedimiento[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_id_procedimiento[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_id_procedimiento[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_id_procedimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_id_procedimiento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->procedimiento_id_procedimiento[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->procedimiento_id_procedimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_id_procedimiento[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_secad[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_secad[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_secad[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_secad[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_secad[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_secad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_secad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_secad[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_direccion_servicio[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_direccion_servicio[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_direccion_servicio[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_direccion_servicio[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_direccion_servicio[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_direccion_servicio[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_direccion_servicio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_direccion_servicio[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_id_barrio[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_id_barrio[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_id_barrio[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_id_barrio[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_id_barrio[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_id_barrio[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->procedimiento_id_barrio[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->procedimiento_id_barrio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_id_barrio[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_quien_reporta[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_quien_reporta[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_quien_reporta[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_quien_reporta[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_quien_reporta[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_quien_reporta[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_quien_reporta[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_quien_reporta[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $procedimiento_hora_ingreso_llamada_x =  $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas];
               nm_conv_limpa_dado($procedimiento_hora_ingreso_llamada_x, "HH:II:SS");
               if (is_numeric($procedimiento_hora_ingreso_llamada_x) && strlen($procedimiento_hora_ingreso_llamada_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas], "HH:II:SS");
                   $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $procedimiento_hora_notifica_movil_x =  $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas];
               nm_conv_limpa_dado($procedimiento_hora_notifica_movil_x, "HH:II:SS");
               if (is_numeric($procedimiento_hora_notifica_movil_x) && strlen($procedimiento_hora_notifica_movil_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas], "HH:II:SS");
                   $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $procedimiento_hora_llegada_sitio_x =  $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas];
               nm_conv_limpa_dado($procedimiento_hora_llegada_sitio_x, "HH:II:SS");
               if (is_numeric($procedimiento_hora_llegada_sitio_x) && strlen($procedimiento_hora_llegada_sitio_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas], "HH:II:SS");
                   $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $procedimiento_hora_llegada_ips_x =  $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas];
               nm_conv_limpa_dado($procedimiento_hora_llegada_ips_x, "HH:II:SS");
               if (is_numeric($procedimiento_hora_llegada_ips_x) && strlen($procedimiento_hora_llegada_ips_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas], "HH:II:SS");
                   $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_hora_salida_ips[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_hora_salida_ips[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $procedimiento_hora_salida_ips_x =  $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas];
               nm_conv_limpa_dado($procedimiento_hora_salida_ips_x, "HH:II:SS");
               if (is_numeric($procedimiento_hora_salida_ips_x) && strlen($procedimiento_hora_salida_ips_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->procedimiento_hora_salida_ips[$this->nm_grid_colunas], "HH:II:SS");
                   $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_hora_salida_ips[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_tipo_servicio[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_tipo_servicio[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_tipo_servicio[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_tipo_servicio[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_tipo_servicio[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_tipo_servicio[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_tipo_servicio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_tipo_servicio[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_numero_contacto[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_numero_contacto[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_numero_contacto[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_numero_contacto[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_numero_contacto[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_numero_contacto[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_numero_contacto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_numero_contacto[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_radicado[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_radicado[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_radicado[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_radicado[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_radicado[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_radicado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_radicado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_radicado[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_nombre_apellido[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_nombre_apellido[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_nombre_apellido[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_nombre_apellido[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_nombre_apellido[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_nombre_apellido[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_nombre_apellido[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_nombre_apellido[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_tipo_documento[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_tipo_documento[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_tipo_documento[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_tipo_documento[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_tipo_documento[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_tipo_documento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_tipo_documento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_tipo_documento[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_documento_identidad[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_documento_identidad[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_documento_identidad[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_documento_identidad[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_documento_identidad[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_documento_identidad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_documento_identidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_documento_identidad[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_edad[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_edad[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_edad[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_edad[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_edad[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_edad[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->procedimiento_edad[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->procedimiento_edad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_edad[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_tipo_caso[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_tipo_caso[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_tipo_caso[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_tipo_caso[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_tipo_caso[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_tipo_caso[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_tipo_caso[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_tipo_caso[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_genero[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_genero[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_genero[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_genero[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_genero[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_genero[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_genero[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_genero[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_id_seguridad_social[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_id_seguridad_social[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->procedimiento_id_seguridad_social[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->procedimiento_id_seguridad_social[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_id_seguridad_social[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_id_eps[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_id_eps[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_id_eps[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_id_eps[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_id_eps[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_id_eps[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->procedimiento_id_eps[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->procedimiento_id_eps[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_id_eps[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_fecha[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_fecha[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_fecha[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_fecha[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_fecha[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_fecha[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $procedimiento_fecha_x =  $this->procedimiento_fecha[$this->nm_grid_colunas];
               nm_conv_limpa_dado($procedimiento_fecha_x, "YYYY-MM-DD");
               if (is_numeric($procedimiento_fecha_x) && strlen($procedimiento_fecha_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->procedimiento_fecha[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->procedimiento_fecha[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->procedimiento_fecha[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_fecha[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_ip[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_ip[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_ip[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_ip[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_ip[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_ip[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_ip[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_ip[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->procedimiento_login[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->procedimiento_login[$this->nm_grid_colunas]));
          }
          else {
              $this->procedimiento_login[$this->nm_grid_colunas] = sc_strip_script($this->procedimiento_login[$this->nm_grid_colunas]);
          }
          if ($this->procedimiento_login[$this->nm_grid_colunas] === "") 
          { 
              $this->procedimiento_login[$this->nm_grid_colunas] = "" ;  
          } 
          $this->procedimiento_login[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->procedimiento_login[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->sector_id_sector[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->sector_id_sector[$this->nm_grid_colunas]));
          }
          else {
              $this->sector_id_sector[$this->nm_grid_colunas] = sc_strip_script($this->sector_id_sector[$this->nm_grid_colunas]);
          }
          if ($this->sector_id_sector[$this->nm_grid_colunas] === "") 
          { 
              $this->sector_id_sector[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sector_id_sector[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->sector_id_sector[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sector_id_sector[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->sector_sector[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->sector_sector[$this->nm_grid_colunas]));
          }
          else {
              $this->sector_sector[$this->nm_grid_colunas] = sc_strip_script($this->sector_sector[$this->nm_grid_colunas]);
          }
          if ($this->sector_sector[$this->nm_grid_colunas] === "") 
          { 
              $this->sector_sector[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sector_sector[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sector_sector[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->seguridad_id_seguridad_social[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->seguridad_id_seguridad_social[$this->nm_grid_colunas]));
          }
          else {
              $this->seguridad_id_seguridad_social[$this->nm_grid_colunas] = sc_strip_script($this->seguridad_id_seguridad_social[$this->nm_grid_colunas]);
          }
          if ($this->seguridad_id_seguridad_social[$this->nm_grid_colunas] === "") 
          { 
              $this->seguridad_id_seguridad_social[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->seguridad_id_seguridad_social[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->seguridad_id_seguridad_social[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->seguridad_id_seguridad_social[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->seguridad_seguridad_social[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->seguridad_seguridad_social[$this->nm_grid_colunas]));
          }
          else {
              $this->seguridad_seguridad_social[$this->nm_grid_colunas] = sc_strip_script($this->seguridad_seguridad_social[$this->nm_grid_colunas]);
          }
          if ($this->seguridad_seguridad_social[$this->nm_grid_colunas] === "") 
          { 
              $this->seguridad_seguridad_social[$this->nm_grid_colunas] = "" ;  
          } 
          $this->seguridad_seguridad_social[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->seguridad_seguridad_social[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->medico_id_medico[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->medico_id_medico[$this->nm_grid_colunas]));
          }
          else {
              $this->medico_id_medico[$this->nm_grid_colunas] = sc_strip_script($this->medico_id_medico[$this->nm_grid_colunas]);
          }
          if ($this->medico_id_medico[$this->nm_grid_colunas] === "") 
          { 
              $this->medico_id_medico[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->medico_id_medico[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->medico_id_medico[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->medico_id_medico[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->medico_medico[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->medico_medico[$this->nm_grid_colunas]));
          }
          else {
              $this->medico_medico[$this->nm_grid_colunas] = sc_strip_script($this->medico_medico[$this->nm_grid_colunas]);
          }
          if ($this->medico_medico[$this->nm_grid_colunas] === "") 
          { 
              $this->medico_medico[$this->nm_grid_colunas] = "" ;  
          } 
          $this->medico_medico[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->medico_medico[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->medico_registro_medico[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->medico_registro_medico[$this->nm_grid_colunas]));
          }
          else {
              $this->medico_registro_medico[$this->nm_grid_colunas] = sc_strip_script($this->medico_registro_medico[$this->nm_grid_colunas]);
          }
          if ($this->medico_registro_medico[$this->nm_grid_colunas] === "") 
          { 
              $this->medico_registro_medico[$this->nm_grid_colunas] = "" ;  
          } 
          $this->medico_registro_medico[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->medico_registro_medico[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->medico_telefono[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->medico_telefono[$this->nm_grid_colunas]));
          }
          else {
              $this->medico_telefono[$this->nm_grid_colunas] = sc_strip_script($this->medico_telefono[$this->nm_grid_colunas]);
          }
          if ($this->medico_telefono[$this->nm_grid_colunas] === "") 
          { 
              $this->medico_telefono[$this->nm_grid_colunas] = "" ;  
          } 
          $this->medico_telefono[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->medico_telefono[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->medico_estado[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->medico_estado[$this->nm_grid_colunas]));
          }
          else {
              $this->medico_estado[$this->nm_grid_colunas] = sc_strip_script($this->medico_estado[$this->nm_grid_colunas]);
          }
          if ($this->medico_estado[$this->nm_grid_colunas] === "") 
          { 
              $this->medico_estado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->medico_estado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->medico_estado[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->ambulancia_id_movil[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->ambulancia_id_movil[$this->nm_grid_colunas]));
          }
          else {
              $this->ambulancia_id_movil[$this->nm_grid_colunas] = sc_strip_script($this->ambulancia_id_movil[$this->nm_grid_colunas]);
          }
          if ($this->ambulancia_id_movil[$this->nm_grid_colunas] === "") 
          { 
              $this->ambulancia_id_movil[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ambulancia_id_movil[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->ambulancia_id_movil[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ambulancia_id_movil[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['REPORTE_PRUEBA']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->ambulancia_placa[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->ambulancia_placa[$this->nm_grid_colunas]));
          }
          else {
              $this->ambulancia_placa[$this->nm_grid_colunas] = sc_strip_script($this->ambulancia_placa[$this->nm_grid_colunas]);
          }
          if ($this->ambulancia_placa[$this->nm_grid_colunas] === "") 
          { 
              $this->ambulancia_placa[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ambulancia_placa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ambulancia_placa[$this->nm_grid_colunas]);
          if ($this->sc_field_0[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_0[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          if ($this->txt_fecha[$this->nm_grid_colunas] === "") 
          { 
              $this->txt_fecha[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nm_gera_mask($this->txt_fecha[$this->nm_grid_colunas], "Fecha"); 
          $this->txt_fecha[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->txt_fecha[$this->nm_grid_colunas]);
          foreach ($this->anotaciones_id_observacion[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->anotaciones_id_observacion[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->anotaciones_id_observacion[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anotaciones_id_observacion[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->anotaciones_id_observacion[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->anotaciones_id_observacion[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->anotaciones_id_procedimiento[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->anotaciones_id_procedimiento[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->anotaciones_id_procedimiento[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anotaciones_id_procedimiento[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->anotaciones_id_procedimiento[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->anotaciones_id_procedimiento[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->anotaciones_fecha[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
               $anotaciones_fecha_x =  $this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind];
               nm_conv_limpa_dado($anotaciones_fecha_x, "YYYY-MM-DD");
               if (is_numeric($anotaciones_fecha_x) && strlen($anotaciones_fecha_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind], "YYYY-MM-DD");
                   $this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
              $this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->anotaciones_fecha[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->anotaciones_ip[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->anotaciones_ip[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->anotaciones_ip[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->anotaciones_ip[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->anotaciones_ip[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->anotaciones_observa[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->anotaciones_observa[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->anotaciones_observa[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->anotaciones_observa[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->anotaciones_observa[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->anotaciones_user[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->anotaciones_user[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->anotaciones_user[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->anotaciones_user[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->anotaciones_user[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_barrio_barrio = array('posx' => '159.21725416664657', 'posy' => '76.34472708332372', 'data' => $this->barrio_barrio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_eps_eps = array('posx' => '30.360937499996172', 'posy' => '75.92721458332376', 'data' => $this->eps_eps[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_secad = array('posx' => '157', 'posy' => '56.0503916666596', 'data' => $this->procedimiento_secad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_direccion_servicio = array('posx' => '95.7172541666546', 'posy' => '84.49309999998934', 'data' => $this->procedimiento_direccion_servicio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Anotaciones_observa = array('posx' => '16.867187499997872', 'posy' => '139.55130416664906', 'data' => $this->anotaciones_observa[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_hora_ingreso_llamada = array('posx' => '15.22595062499808', 'posy' => '311.20291666662746', 'data' => $this->procedimiento_hora_ingreso_llamada[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_Hora_notifica_movil = array('posx' => '58.146420833326', 'posy' => '311.4648541666274', 'data' => $this->procedimiento_hora_notifica_movil[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_hora_llegada_sitio = array('posx' => '95.188087499988', 'posy' => '310.6737499999608', 'data' => $this->procedimiento_hora_llegada_sitio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_hora_llegada_ips = array('posx' => '135.97291666665129', 'posy' => '312', 'data' => $this->procedimiento_hora_llegada_ips[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_hora_salida_ips = array('posx' => '175.61874999998429', 'posy' => '312', 'data' => $this->procedimiento_hora_salida_ips[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_tipo_servicio = array('posx' => '123.29583333331779', 'posy' => '105.2835291666534', 'data' => $this->procedimiento_tipo_servicio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_numero_contacto = array('posx' => '32.47760416666257', 'posy' => '105.22981874998673', 'data' => $this->procedimiento_numero_contacto[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_nombre_apellido = array('posx' => '96.77135416665446', 'posy' => '68.07649791665808', 'data' => $this->procedimiento_nombre_apellido[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_tipo_documento = array('posx' => '16.867187499997872', 'posy' => '68.28737083332472', 'data' => $this->procedimiento_tipo_documento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_documento_identidad = array('posx' => '35.392254166662205', 'posy' => '68.49824374999137', 'data' => $this->procedimiento_documento_identidad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_edad = array('posx' => '25.598437499996773', 'posy' => '93.54264374998822', 'data' => $this->procedimiento_edad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_genero = array('posx' => '77.72558749999021', 'posy' => '96.69700624998781', 'data' => $this->procedimiento_genero[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_circunstancias_emergencia = array('posx' => '15.808854166664673', 'posy' => '119.39746249998495', 'data' => $this->procedimiento_circunstancias_emergencia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_procedimiento_fecha = array('posx' => '26.392187499996673', 'posy' => '56.0503916666596', 'data' => $this->procedimiento_fecha[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sector_Sector = array('posx' => '110.59583333331939', 'posy' => '75.89414166665709', 'data' => $this->sector_sector[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_seguridad_seguridad_social = array('posx' => '24.54010416666357', 'posy' => '83.98880416665608', 'data' => $this->seguridad_seguridad_social[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_medico = array('posx' => '47.624999999993996', 'posy' => '341.31249999995697', 'data' => $this->medico_medico[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_reg = array('posx' => '20.108333333330798', 'posy' => '347.4270208332895', 'data' => $this->medico_registro_medico[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_movil = array('posx' => '127.26458333331729', 'posy' => '94.1916666666548', 'data' => $this->ambulancia_placa[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_operador = array('posx' => '114.0354166666523', 'posy' => '345.81041666662304', 'data' => $this->procedimiento_login[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_47 = array('posx' => '109.5374999999862', 'posy' => '56.0503916666596', 'data' => $this->procedimiento_quien_reporta[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_50 = array('posx' => '39.4229166666617', 'posy' => '334.96249999995774', 'data' => $this->procedimiento_tipo_caso[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $Fecha = array('posx' => '16.1395833333313', 'posy' => '20.372916666664096', 'data' => $this->txt_fecha[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_barrio_barrio['font_type'], $cell_barrio_barrio['font_style'], $cell_barrio_barrio['font_size']);
            $this->pdf_text_color($cell_barrio_barrio['data'], $cell_barrio_barrio['color_r'], $cell_barrio_barrio['color_g'], $cell_barrio_barrio['color_b']);
            if (!empty($cell_barrio_barrio['posx']) && !empty($cell_barrio_barrio['posy']))
            {
                $this->Pdf->SetXY($cell_barrio_barrio['posx'], $cell_barrio_barrio['posy']);
            }
            elseif (!empty($cell_barrio_barrio['posx']))
            {
                $this->Pdf->SetX($cell_barrio_barrio['posx']);
            }
            elseif (!empty($cell_barrio_barrio['posy']))
            {
                $this->Pdf->SetY($cell_barrio_barrio['posy']);
            }
            $this->Pdf->Cell($cell_barrio_barrio['width'], 0, $cell_barrio_barrio['data'], 0, 0, $cell_barrio_barrio['align']);

            $this->Pdf->SetFont($cell_eps_eps['font_type'], $cell_eps_eps['font_style'], $cell_eps_eps['font_size']);
            $this->pdf_text_color($cell_eps_eps['data'], $cell_eps_eps['color_r'], $cell_eps_eps['color_g'], $cell_eps_eps['color_b']);
            if (!empty($cell_eps_eps['posx']) && !empty($cell_eps_eps['posy']))
            {
                $this->Pdf->SetXY($cell_eps_eps['posx'], $cell_eps_eps['posy']);
            }
            elseif (!empty($cell_eps_eps['posx']))
            {
                $this->Pdf->SetX($cell_eps_eps['posx']);
            }
            elseif (!empty($cell_eps_eps['posy']))
            {
                $this->Pdf->SetY($cell_eps_eps['posy']);
            }
            $this->Pdf->Cell($cell_eps_eps['width'], 0, $cell_eps_eps['data'], 0, 0, $cell_eps_eps['align']);

            $this->Pdf->SetFont($cell_procedimiento_secad['font_type'], $cell_procedimiento_secad['font_style'], $cell_procedimiento_secad['font_size']);
            $this->pdf_text_color($cell_procedimiento_secad['data'], $cell_procedimiento_secad['color_r'], $cell_procedimiento_secad['color_g'], $cell_procedimiento_secad['color_b']);
            if (!empty($cell_procedimiento_secad['posx']) && !empty($cell_procedimiento_secad['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_secad['posx'], $cell_procedimiento_secad['posy']);
            }
            elseif (!empty($cell_procedimiento_secad['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_secad['posx']);
            }
            elseif (!empty($cell_procedimiento_secad['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_secad['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_secad['width'], 0, $cell_procedimiento_secad['data'], 0, 0, $cell_procedimiento_secad['align']);

            $this->Pdf->SetFont($cell_procedimiento_direccion_servicio['font_type'], $cell_procedimiento_direccion_servicio['font_style'], $cell_procedimiento_direccion_servicio['font_size']);
            $this->pdf_text_color($cell_procedimiento_direccion_servicio['data'], $cell_procedimiento_direccion_servicio['color_r'], $cell_procedimiento_direccion_servicio['color_g'], $cell_procedimiento_direccion_servicio['color_b']);
            if (!empty($cell_procedimiento_direccion_servicio['posx']) && !empty($cell_procedimiento_direccion_servicio['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_direccion_servicio['posx'], $cell_procedimiento_direccion_servicio['posy']);
            }
            elseif (!empty($cell_procedimiento_direccion_servicio['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_direccion_servicio['posx']);
            }
            elseif (!empty($cell_procedimiento_direccion_servicio['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_direccion_servicio['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_direccion_servicio['width'], 0, $cell_procedimiento_direccion_servicio['data'], 0, 0, $cell_procedimiento_direccion_servicio['align']);

            $this->Pdf->SetY(139.55130416664906);
            foreach ($this->anotaciones[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_Anotaciones_observa['font_type'], $cell_Anotaciones_observa['font_style'], $cell_Anotaciones_observa['font_size']);
                if (!empty($cell_Anotaciones_observa['posx']))
                {
                    $this->Pdf->SetX($cell_Anotaciones_observa['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_Anotaciones_observa['color_r'], $cell_Anotaciones_observa['color_g'], $cell_Anotaciones_observa['color_b']);
                $this->Pdf->writeHTMLCell($cell_Anotaciones_observa['width'], 0, $atu_X, $atu_Y, $this->anotaciones_observa[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_Anotaciones_observa['align']);
                $this->Pdf->SetY($atu_Y);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 16;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_procedimiento_hora_ingreso_llamada['font_type'], $cell_procedimiento_hora_ingreso_llamada['font_style'], $cell_procedimiento_hora_ingreso_llamada['font_size']);
            $this->pdf_text_color($cell_procedimiento_hora_ingreso_llamada['data'], $cell_procedimiento_hora_ingreso_llamada['color_r'], $cell_procedimiento_hora_ingreso_llamada['color_g'], $cell_procedimiento_hora_ingreso_llamada['color_b']);
            if (!empty($cell_procedimiento_hora_ingreso_llamada['posx']) && !empty($cell_procedimiento_hora_ingreso_llamada['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_hora_ingreso_llamada['posx'], $cell_procedimiento_hora_ingreso_llamada['posy']);
            }
            elseif (!empty($cell_procedimiento_hora_ingreso_llamada['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_hora_ingreso_llamada['posx']);
            }
            elseif (!empty($cell_procedimiento_hora_ingreso_llamada['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_hora_ingreso_llamada['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_hora_ingreso_llamada['width'], 0, $cell_procedimiento_hora_ingreso_llamada['data'], 0, 0, $cell_procedimiento_hora_ingreso_llamada['align']);

            $this->Pdf->SetFont($cell_procedimiento_Hora_notifica_movil['font_type'], $cell_procedimiento_Hora_notifica_movil['font_style'], $cell_procedimiento_Hora_notifica_movil['font_size']);
            $this->pdf_text_color($cell_procedimiento_Hora_notifica_movil['data'], $cell_procedimiento_Hora_notifica_movil['color_r'], $cell_procedimiento_Hora_notifica_movil['color_g'], $cell_procedimiento_Hora_notifica_movil['color_b']);
            if (!empty($cell_procedimiento_Hora_notifica_movil['posx']) && !empty($cell_procedimiento_Hora_notifica_movil['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_Hora_notifica_movil['posx'], $cell_procedimiento_Hora_notifica_movil['posy']);
            }
            elseif (!empty($cell_procedimiento_Hora_notifica_movil['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_Hora_notifica_movil['posx']);
            }
            elseif (!empty($cell_procedimiento_Hora_notifica_movil['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_Hora_notifica_movil['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_Hora_notifica_movil['width'], 0, $cell_procedimiento_Hora_notifica_movil['data'], 0, 0, $cell_procedimiento_Hora_notifica_movil['align']);

            $this->Pdf->SetFont($cell_procedimiento_hora_llegada_sitio['font_type'], $cell_procedimiento_hora_llegada_sitio['font_style'], $cell_procedimiento_hora_llegada_sitio['font_size']);
            $this->pdf_text_color($cell_procedimiento_hora_llegada_sitio['data'], $cell_procedimiento_hora_llegada_sitio['color_r'], $cell_procedimiento_hora_llegada_sitio['color_g'], $cell_procedimiento_hora_llegada_sitio['color_b']);
            if (!empty($cell_procedimiento_hora_llegada_sitio['posx']) && !empty($cell_procedimiento_hora_llegada_sitio['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_hora_llegada_sitio['posx'], $cell_procedimiento_hora_llegada_sitio['posy']);
            }
            elseif (!empty($cell_procedimiento_hora_llegada_sitio['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_hora_llegada_sitio['posx']);
            }
            elseif (!empty($cell_procedimiento_hora_llegada_sitio['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_hora_llegada_sitio['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_hora_llegada_sitio['width'], 0, $cell_procedimiento_hora_llegada_sitio['data'], 0, 0, $cell_procedimiento_hora_llegada_sitio['align']);

            $this->Pdf->SetFont($cell_procedimiento_hora_llegada_ips['font_type'], $cell_procedimiento_hora_llegada_ips['font_style'], $cell_procedimiento_hora_llegada_ips['font_size']);
            $this->pdf_text_color($cell_procedimiento_hora_llegada_ips['data'], $cell_procedimiento_hora_llegada_ips['color_r'], $cell_procedimiento_hora_llegada_ips['color_g'], $cell_procedimiento_hora_llegada_ips['color_b']);
            if (!empty($cell_procedimiento_hora_llegada_ips['posx']) && !empty($cell_procedimiento_hora_llegada_ips['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_hora_llegada_ips['posx'], $cell_procedimiento_hora_llegada_ips['posy']);
            }
            elseif (!empty($cell_procedimiento_hora_llegada_ips['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_hora_llegada_ips['posx']);
            }
            elseif (!empty($cell_procedimiento_hora_llegada_ips['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_hora_llegada_ips['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_hora_llegada_ips['width'], 0, $cell_procedimiento_hora_llegada_ips['data'], 0, 0, $cell_procedimiento_hora_llegada_ips['align']);

            $this->Pdf->SetFont($cell_procedimiento_hora_salida_ips['font_type'], $cell_procedimiento_hora_salida_ips['font_style'], $cell_procedimiento_hora_salida_ips['font_size']);
            $this->pdf_text_color($cell_procedimiento_hora_salida_ips['data'], $cell_procedimiento_hora_salida_ips['color_r'], $cell_procedimiento_hora_salida_ips['color_g'], $cell_procedimiento_hora_salida_ips['color_b']);
            if (!empty($cell_procedimiento_hora_salida_ips['posx']) && !empty($cell_procedimiento_hora_salida_ips['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_hora_salida_ips['posx'], $cell_procedimiento_hora_salida_ips['posy']);
            }
            elseif (!empty($cell_procedimiento_hora_salida_ips['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_hora_salida_ips['posx']);
            }
            elseif (!empty($cell_procedimiento_hora_salida_ips['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_hora_salida_ips['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_hora_salida_ips['width'], 0, $cell_procedimiento_hora_salida_ips['data'], 0, 0, $cell_procedimiento_hora_salida_ips['align']);

            $this->Pdf->SetFont($cell_procedimiento_tipo_servicio['font_type'], $cell_procedimiento_tipo_servicio['font_style'], $cell_procedimiento_tipo_servicio['font_size']);
            $this->pdf_text_color($cell_procedimiento_tipo_servicio['data'], $cell_procedimiento_tipo_servicio['color_r'], $cell_procedimiento_tipo_servicio['color_g'], $cell_procedimiento_tipo_servicio['color_b']);
            if (!empty($cell_procedimiento_tipo_servicio['posx']) && !empty($cell_procedimiento_tipo_servicio['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_tipo_servicio['posx'], $cell_procedimiento_tipo_servicio['posy']);
            }
            elseif (!empty($cell_procedimiento_tipo_servicio['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_tipo_servicio['posx']);
            }
            elseif (!empty($cell_procedimiento_tipo_servicio['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_tipo_servicio['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_tipo_servicio['width'], 0, $cell_procedimiento_tipo_servicio['data'], 0, 0, $cell_procedimiento_tipo_servicio['align']);

            $this->Pdf->SetFont($cell_procedimiento_numero_contacto['font_type'], $cell_procedimiento_numero_contacto['font_style'], $cell_procedimiento_numero_contacto['font_size']);
            $this->pdf_text_color($cell_procedimiento_numero_contacto['data'], $cell_procedimiento_numero_contacto['color_r'], $cell_procedimiento_numero_contacto['color_g'], $cell_procedimiento_numero_contacto['color_b']);
            if (!empty($cell_procedimiento_numero_contacto['posx']) && !empty($cell_procedimiento_numero_contacto['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_numero_contacto['posx'], $cell_procedimiento_numero_contacto['posy']);
            }
            elseif (!empty($cell_procedimiento_numero_contacto['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_numero_contacto['posx']);
            }
            elseif (!empty($cell_procedimiento_numero_contacto['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_numero_contacto['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_numero_contacto['width'], 0, $cell_procedimiento_numero_contacto['data'], 0, 0, $cell_procedimiento_numero_contacto['align']);

            $this->Pdf->SetFont($cell_procedimiento_nombre_apellido['font_type'], $cell_procedimiento_nombre_apellido['font_style'], $cell_procedimiento_nombre_apellido['font_size']);
            $this->pdf_text_color($cell_procedimiento_nombre_apellido['data'], $cell_procedimiento_nombre_apellido['color_r'], $cell_procedimiento_nombre_apellido['color_g'], $cell_procedimiento_nombre_apellido['color_b']);
            if (!empty($cell_procedimiento_nombre_apellido['posx']) && !empty($cell_procedimiento_nombre_apellido['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_nombre_apellido['posx'], $cell_procedimiento_nombre_apellido['posy']);
            }
            elseif (!empty($cell_procedimiento_nombre_apellido['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_nombre_apellido['posx']);
            }
            elseif (!empty($cell_procedimiento_nombre_apellido['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_nombre_apellido['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_nombre_apellido['width'], 0, $cell_procedimiento_nombre_apellido['data'], 0, 0, $cell_procedimiento_nombre_apellido['align']);

            $this->Pdf->SetFont($cell_procedimiento_tipo_documento['font_type'], $cell_procedimiento_tipo_documento['font_style'], $cell_procedimiento_tipo_documento['font_size']);
            $this->pdf_text_color($cell_procedimiento_tipo_documento['data'], $cell_procedimiento_tipo_documento['color_r'], $cell_procedimiento_tipo_documento['color_g'], $cell_procedimiento_tipo_documento['color_b']);
            if (!empty($cell_procedimiento_tipo_documento['posx']) && !empty($cell_procedimiento_tipo_documento['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_tipo_documento['posx'], $cell_procedimiento_tipo_documento['posy']);
            }
            elseif (!empty($cell_procedimiento_tipo_documento['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_tipo_documento['posx']);
            }
            elseif (!empty($cell_procedimiento_tipo_documento['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_tipo_documento['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_tipo_documento['width'], 0, $cell_procedimiento_tipo_documento['data'], 0, 0, $cell_procedimiento_tipo_documento['align']);

            $this->Pdf->SetFont($cell_procedimiento_documento_identidad['font_type'], $cell_procedimiento_documento_identidad['font_style'], $cell_procedimiento_documento_identidad['font_size']);
            $this->pdf_text_color($cell_procedimiento_documento_identidad['data'], $cell_procedimiento_documento_identidad['color_r'], $cell_procedimiento_documento_identidad['color_g'], $cell_procedimiento_documento_identidad['color_b']);
            if (!empty($cell_procedimiento_documento_identidad['posx']) && !empty($cell_procedimiento_documento_identidad['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_documento_identidad['posx'], $cell_procedimiento_documento_identidad['posy']);
            }
            elseif (!empty($cell_procedimiento_documento_identidad['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_documento_identidad['posx']);
            }
            elseif (!empty($cell_procedimiento_documento_identidad['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_documento_identidad['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_documento_identidad['width'], 0, $cell_procedimiento_documento_identidad['data'], 0, 0, $cell_procedimiento_documento_identidad['align']);

            $this->Pdf->SetFont($cell_procedimiento_edad['font_type'], $cell_procedimiento_edad['font_style'], $cell_procedimiento_edad['font_size']);
            $this->pdf_text_color($cell_procedimiento_edad['data'], $cell_procedimiento_edad['color_r'], $cell_procedimiento_edad['color_g'], $cell_procedimiento_edad['color_b']);
            if (!empty($cell_procedimiento_edad['posx']) && !empty($cell_procedimiento_edad['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_edad['posx'], $cell_procedimiento_edad['posy']);
            }
            elseif (!empty($cell_procedimiento_edad['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_edad['posx']);
            }
            elseif (!empty($cell_procedimiento_edad['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_edad['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_edad['width'], 0, $cell_procedimiento_edad['data'], 0, 0, $cell_procedimiento_edad['align']);

            $this->Pdf->SetFont($cell_procedimiento_genero['font_type'], $cell_procedimiento_genero['font_style'], $cell_procedimiento_genero['font_size']);
            $this->pdf_text_color($cell_procedimiento_genero['data'], $cell_procedimiento_genero['color_r'], $cell_procedimiento_genero['color_g'], $cell_procedimiento_genero['color_b']);
            if (!empty($cell_procedimiento_genero['posx']) && !empty($cell_procedimiento_genero['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_genero['posx'], $cell_procedimiento_genero['posy']);
            }
            elseif (!empty($cell_procedimiento_genero['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_genero['posx']);
            }
            elseif (!empty($cell_procedimiento_genero['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_genero['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_genero['width'], 0, $cell_procedimiento_genero['data'], 0, 0, $cell_procedimiento_genero['align']);

            $this->Pdf->SetFont($cell_procedimiento_circunstancias_emergencia['font_type'], $cell_procedimiento_circunstancias_emergencia['font_style'], $cell_procedimiento_circunstancias_emergencia['font_size']);
            $this->pdf_text_color($cell_procedimiento_circunstancias_emergencia['data'], $cell_procedimiento_circunstancias_emergencia['color_r'], $cell_procedimiento_circunstancias_emergencia['color_g'], $cell_procedimiento_circunstancias_emergencia['color_b']);
            if (!empty($cell_procedimiento_circunstancias_emergencia['posx']) && !empty($cell_procedimiento_circunstancias_emergencia['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_circunstancias_emergencia['posx'], $cell_procedimiento_circunstancias_emergencia['posy']);
            }
            elseif (!empty($cell_procedimiento_circunstancias_emergencia['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_circunstancias_emergencia['posx']);
            }
            elseif (!empty($cell_procedimiento_circunstancias_emergencia['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_circunstancias_emergencia['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_circunstancias_emergencia['width'], 0, $cell_procedimiento_circunstancias_emergencia['data'], 0, 0, $cell_procedimiento_circunstancias_emergencia['align']);

            $this->Pdf->SetFont($cell_procedimiento_fecha['font_type'], $cell_procedimiento_fecha['font_style'], $cell_procedimiento_fecha['font_size']);
            $this->pdf_text_color($cell_procedimiento_fecha['data'], $cell_procedimiento_fecha['color_r'], $cell_procedimiento_fecha['color_g'], $cell_procedimiento_fecha['color_b']);
            if (!empty($cell_procedimiento_fecha['posx']) && !empty($cell_procedimiento_fecha['posy']))
            {
                $this->Pdf->SetXY($cell_procedimiento_fecha['posx'], $cell_procedimiento_fecha['posy']);
            }
            elseif (!empty($cell_procedimiento_fecha['posx']))
            {
                $this->Pdf->SetX($cell_procedimiento_fecha['posx']);
            }
            elseif (!empty($cell_procedimiento_fecha['posy']))
            {
                $this->Pdf->SetY($cell_procedimiento_fecha['posy']);
            }
            $this->Pdf->Cell($cell_procedimiento_fecha['width'], 0, $cell_procedimiento_fecha['data'], 0, 0, $cell_procedimiento_fecha['align']);

            $this->Pdf->SetFont($cell_sector_Sector['font_type'], $cell_sector_Sector['font_style'], $cell_sector_Sector['font_size']);
            $this->pdf_text_color($cell_sector_Sector['data'], $cell_sector_Sector['color_r'], $cell_sector_Sector['color_g'], $cell_sector_Sector['color_b']);
            if (!empty($cell_sector_Sector['posx']) && !empty($cell_sector_Sector['posy']))
            {
                $this->Pdf->SetXY($cell_sector_Sector['posx'], $cell_sector_Sector['posy']);
            }
            elseif (!empty($cell_sector_Sector['posx']))
            {
                $this->Pdf->SetX($cell_sector_Sector['posx']);
            }
            elseif (!empty($cell_sector_Sector['posy']))
            {
                $this->Pdf->SetY($cell_sector_Sector['posy']);
            }
            $this->Pdf->Cell($cell_sector_Sector['width'], 0, $cell_sector_Sector['data'], 0, 0, $cell_sector_Sector['align']);

            $this->Pdf->SetFont($cell_seguridad_seguridad_social['font_type'], $cell_seguridad_seguridad_social['font_style'], $cell_seguridad_seguridad_social['font_size']);
            $this->pdf_text_color($cell_seguridad_seguridad_social['data'], $cell_seguridad_seguridad_social['color_r'], $cell_seguridad_seguridad_social['color_g'], $cell_seguridad_seguridad_social['color_b']);
            if (!empty($cell_seguridad_seguridad_social['posx']) && !empty($cell_seguridad_seguridad_social['posy']))
            {
                $this->Pdf->SetXY($cell_seguridad_seguridad_social['posx'], $cell_seguridad_seguridad_social['posy']);
            }
            elseif (!empty($cell_seguridad_seguridad_social['posx']))
            {
                $this->Pdf->SetX($cell_seguridad_seguridad_social['posx']);
            }
            elseif (!empty($cell_seguridad_seguridad_social['posy']))
            {
                $this->Pdf->SetY($cell_seguridad_seguridad_social['posy']);
            }
            $this->Pdf->Cell($cell_seguridad_seguridad_social['width'], 0, $cell_seguridad_seguridad_social['data'], 0, 0, $cell_seguridad_seguridad_social['align']);

            $this->Pdf->SetFont($cell_medico['font_type'], $cell_medico['font_style'], $cell_medico['font_size']);
            $this->pdf_text_color($cell_medico['data'], $cell_medico['color_r'], $cell_medico['color_g'], $cell_medico['color_b']);
            if (!empty($cell_medico['posx']) && !empty($cell_medico['posy']))
            {
                $this->Pdf->SetXY($cell_medico['posx'], $cell_medico['posy']);
            }
            elseif (!empty($cell_medico['posx']))
            {
                $this->Pdf->SetX($cell_medico['posx']);
            }
            elseif (!empty($cell_medico['posy']))
            {
                $this->Pdf->SetY($cell_medico['posy']);
            }
            $this->Pdf->Cell($cell_medico['width'], 0, $cell_medico['data'], 0, 0, $cell_medico['align']);

            $this->Pdf->SetFont($cell_reg['font_type'], $cell_reg['font_style'], $cell_reg['font_size']);
            $this->pdf_text_color($cell_reg['data'], $cell_reg['color_r'], $cell_reg['color_g'], $cell_reg['color_b']);
            if (!empty($cell_reg['posx']) && !empty($cell_reg['posy']))
            {
                $this->Pdf->SetXY($cell_reg['posx'], $cell_reg['posy']);
            }
            elseif (!empty($cell_reg['posx']))
            {
                $this->Pdf->SetX($cell_reg['posx']);
            }
            elseif (!empty($cell_reg['posy']))
            {
                $this->Pdf->SetY($cell_reg['posy']);
            }
            $this->Pdf->Cell($cell_reg['width'], 0, $cell_reg['data'], 0, 0, $cell_reg['align']);

            $this->Pdf->SetFont($cell_movil['font_type'], $cell_movil['font_style'], $cell_movil['font_size']);
            $this->pdf_text_color($cell_movil['data'], $cell_movil['color_r'], $cell_movil['color_g'], $cell_movil['color_b']);
            if (!empty($cell_movil['posx']) && !empty($cell_movil['posy']))
            {
                $this->Pdf->SetXY($cell_movil['posx'], $cell_movil['posy']);
            }
            elseif (!empty($cell_movil['posx']))
            {
                $this->Pdf->SetX($cell_movil['posx']);
            }
            elseif (!empty($cell_movil['posy']))
            {
                $this->Pdf->SetY($cell_movil['posy']);
            }
            $this->Pdf->Cell($cell_movil['width'], 0, $cell_movil['data'], 0, 0, $cell_movil['align']);

            $this->Pdf->SetFont($cell_operador['font_type'], $cell_operador['font_style'], $cell_operador['font_size']);
            $this->pdf_text_color($cell_operador['data'], $cell_operador['color_r'], $cell_operador['color_g'], $cell_operador['color_b']);
            if (!empty($cell_operador['posx']) && !empty($cell_operador['posy']))
            {
                $this->Pdf->SetXY($cell_operador['posx'], $cell_operador['posy']);
            }
            elseif (!empty($cell_operador['posx']))
            {
                $this->Pdf->SetX($cell_operador['posx']);
            }
            elseif (!empty($cell_operador['posy']))
            {
                $this->Pdf->SetY($cell_operador['posy']);
            }
            $this->Pdf->Cell($cell_operador['width'], 0, $cell_operador['data'], 0, 0, $cell_operador['align']);

            $this->Pdf->SetFont($cell_47['font_type'], $cell_47['font_style'], $cell_47['font_size']);
            $this->pdf_text_color($cell_47['data'], $cell_47['color_r'], $cell_47['color_g'], $cell_47['color_b']);
            if (!empty($cell_47['posx']) && !empty($cell_47['posy']))
            {
                $this->Pdf->SetXY($cell_47['posx'], $cell_47['posy']);
            }
            elseif (!empty($cell_47['posx']))
            {
                $this->Pdf->SetX($cell_47['posx']);
            }
            elseif (!empty($cell_47['posy']))
            {
                $this->Pdf->SetY($cell_47['posy']);
            }
            $this->Pdf->Cell($cell_47['width'], 0, $cell_47['data'], 0, 0, $cell_47['align']);

            $this->Pdf->SetFont($cell_50['font_type'], $cell_50['font_style'], $cell_50['font_size']);
            $this->pdf_text_color($cell_50['data'], $cell_50['color_r'], $cell_50['color_g'], $cell_50['color_b']);
            if (!empty($cell_50['posx']) && !empty($cell_50['posy']))
            {
                $this->Pdf->SetXY($cell_50['posx'], $cell_50['posy']);
            }
            elseif (!empty($cell_50['posx']))
            {
                $this->Pdf->SetX($cell_50['posx']);
            }
            elseif (!empty($cell_50['posy']))
            {
                $this->Pdf->SetY($cell_50['posy']);
            }
            $this->Pdf->Cell($cell_50['width'], 0, $cell_50['data'], 0, 0, $cell_50['align']);

            $this->Pdf->SetFont($Fecha['font_type'], $Fecha['font_style'], $Fecha['font_size']);
            $this->pdf_text_color($Fecha['data'], $Fecha['color_r'], $Fecha['color_g'], $Fecha['color_b']);
            if (!empty($Fecha['posx']) && !empty($Fecha['posy']))
            {
                $this->Pdf->SetXY($Fecha['posx'], $Fecha['posy']);
            }
            elseif (!empty($Fecha['posx']))
            {
                $this->Pdf->SetX($Fecha['posx']);
            }
            elseif (!empty($Fecha['posy']))
            {
                $this->Pdf->SetY($Fecha['posy']);
            }
            $this->Pdf->Cell($Fecha['width'], 0, $Fecha['data'], 0, 0, $Fecha['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     if (is_array($val)) {
         $val = "";
     }
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
