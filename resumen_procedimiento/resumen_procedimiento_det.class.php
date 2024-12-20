<?php
//--- 
class resumen_procedimiento_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $nmgp_botoes     = array(); 
   var $nm_btn_exist    = array(); 
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array(); 
   var $nm_location;
   var $procedimiento_id_procedimiento;
   var $procedimiento_fecha;
   var $procedimiento_consecutivo;
   var $medico_medico;
   var $ambulancia_placa;
   var $procedimiento_secad;
   var $sector_sector;
   var $barrio_barrio;
   var $procedimiento_direccion_servicio;
   var $procedimiento_tipo_servicio;
   var $procedimiento_nombre_apellido;
   var $procedimiento_tipo_documento;
   var $procedimiento_documento_identidad;
   var $procedimiento_numero_contacto;
   var $eps_eps;
   var $seguridad_seguridad_social;
   var $procedimiento_edad;
   var $procedimiento_genero;
   var $procedimiento_circunstancias_emergencia;
   var $procedimiento_hora_ingreso_llamada;
   var $procedimiento_hora_notifica_movil;
   var $procedimiento_hora_llegada_sitio;
   var $procedimiento_hora_llegada_ips;
   var $procedimiento_hora_salida_ips;
   var $procedimiento_radicado;
   var $procedimiento_login;
   var $barrio_id_barrio;
   var $barrio_id_sector;
   var $eps_id_eps;
   var $procedimiento_id_barrio;
   var $procedimiento_id_seguridad_social;
   var $procedimiento_id_eps;
   var $procedimiento_ip;
   var $sector_id_sector;
   var $seguridad_id_seguridad_social;
   var $medico_id_medico;
   var $medico_registro_medico;
   var $medico_telefono;
   var $medico_estado;
   var $ambulancia_id_movil;
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(is_array($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]))
                    {
                        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ] as $ind => $vals)
                        {
                            if(strcasecmp($vals, $str_value) == 0)
                            {
                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                            }
                            elseif(strcasecmp($vals, $str_value_original) == 0)
                            {
                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                            }
                            else
                            {
                                $keywords = preg_quote($vals, '/');
                                $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                            }
                        }
                    }
                    else
                    {
                        if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ], $str_value) == 0)
                        {
                            $str_value = $str_html_ini. $str_value .$str_html_fim;
                        }
                        elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ], $str_value_original) == 0)
                        {
                            $str_value = $str_html_ini. $str_value .$str_html_fim;
                        }
                        else
                        {
                            $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ], '/');
                            $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                        }
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(is_array($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]))
                    {
                        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ] as $ind => $vals)
                        {
                            if(strcasecmp($vals, $str_value) == 0)
                            {
                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                            }
                            elseif(strcasecmp($vals, $str_value_original) == 0)
                            {
                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                            }
                        }
                    }
                    else
                    {
                        if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ], $str_value) == 0)
                        {
                            $str_value = $str_html_ini. $str_value .$str_html_fim;
                        }
                        elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ], $str_value_original) == 0)
                        {
                            $str_value = $str_html_ini. $str_value .$str_html_fim;
                        }
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(is_array($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]))
                    {
                        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ] as $ind => $vals)
                        {
                            if(strcasecmp($vals, substr($str_value, 0, strlen($vals))) == 0)
                            {
                                $str_value = $str_html_ini. substr($str_value, 0, strlen($vals)) .$str_html_fim . substr($str_value, strlen($vals));
                            }
                        }
                    }
                    else
                    {
                        if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]))) == 0)
                        {
                            $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['campos_busca'][ $field ]));
                        }
                    }
                }
            }
        }
        elseif($filter_type == 'filterbuilder')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['dyn_search']) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['dyn_search'])
            )
            {
                foreach($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['dyn_search'] as $_fld)
                {
                    if($_fld['cmp'] == $field)
                    {
                        $vals = (isset($_fld['val_formated'])?$_fld['val_formated']:"");

                        if($_fld['opc'] == 'qp')
                        {
                                                        if(strcasecmp($vals, $str_value) == 0)
                                                        {
                                                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                                                        }
                                                        elseif(strcasecmp($vals, $str_value_original) == 0)
                                                        {
                                                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                                                        }
                                                        else
                                                        {
                                                                $keywords = preg_quote($vals, '/');
                                                                $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                                                        }
                        }
                        elseif($_fld['opc'] == 'eq')
                        {
                            if(strcasecmp($vals, $str_value) == 0)
                                                        {
                                                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                                                        }
                                                        elseif(strcasecmp($vals, $str_value_original) == 0)
                                                        {
                                                                $str_value = $str_html_ini. $str_value .$str_html_fim;
                                                        }
                        }
                        elseif($_fld['opc'] == 'ii')
                        {
                                                        if(strcasecmp($vals, substr($str_value, 0, strlen($vals))) == 0)
                            {
                                $str_value = $str_html_ini. substr($str_value, 0, strlen($vals)) .$str_html_fim . substr($str_value, strlen($vals));
                            }
                        }
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('procedimiento_numero_contacto', 'procedimiento_nombre_apellido', 'procedimiento_documento_identidad', 'procedimiento_tipo_servicio'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
 function monta_det()
 {
    global 
           $nm_saida, $nm_lang, $nmgp_cor_print, $nmgp_tipo_pdf;
    $this->nmgp_botoes['det_pdf'] = "on";
    $this->nmgp_botoes['pdf'] = "on";
    $this->nmgp_botoes['det_print'] = "on";
    $this->nmgp_botoes['print'] = "on";
    $this->nmgp_botoes['html'] = "on";
    $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['resumen_procedimiento']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['resumen_procedimiento']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['resumen_procedimiento']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida_form'])
    {
    $this->nmgp_botoes['det_pdf']   = "off";
    $this->nmgp_botoes['det_print'] = "off";
    }
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
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->nm_data = new nm_data("es_es");
    $this->NM_raiz_img  = ""; 
    if ($this->Ini->sc_export_ajax_img)
    { 
        $this->NM_raiz_img = $this->Ini->root; 
    } 
    $this->sc_proc_grid = false; 
    include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['sub_dir'] = array(); 
   if ($_SESSION['scriptcase']['proc_mobile']) {
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
   }
   $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
       $Char = substr($Str_date, $I, 1);
       if ($Char != $Ult)
       {
           $Arr_D[] = $Char;
       }
       $Ult = $Char;
   }
   $Prim = true;
   $Str  = "";
   foreach ($Arr_D as $Cada_d)
   {
       $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
       $Str .= $Cada_d;
       $Prim = false;
   }
   $Str = str_replace("a", "Y", $Str);
   $Str = str_replace("y", "Y", $Str);
   $nm_data_fixa = date($Str); 
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, str_replace (convert(char(10),procedimiento.fecha,102), '.', '-') + ' ' + convert(char(8),procedimiento.fecha,20), procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, convert(char(23),procedimiento.fecha,121), procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.fecha as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, EXTEND(procedimiento.fecha, YEAR TO DAY), procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT barrio.Id_Barrio as barrio_id_barrio, barrio.barrio as barrio_barrio, barrio.Id_Sector as barrio_id_sector, eps.Id_Eps as eps_id_eps, eps.eps as eps_eps, procedimiento.Id_Procedimiento as procedimiento_id_procedimiento, procedimiento.secad as procedimiento_secad, procedimiento.direccion_servicio as cmp_maior_30_1, procedimiento.Id_Barrio as procedimiento_id_barrio, procedimiento.tipo_servicio as procedimiento_tipo_servicio, procedimiento.numero_contacto as procedimiento_numero_contacto, procedimiento.radicado as procedimiento_radicado, procedimiento.nombre_apellido as procedimiento_nombre_apellido, procedimiento.tipo_documento as procedimiento_tipo_documento, procedimiento.documento_identidad as cmp_maior_30_2, procedimiento.edad as procedimiento_edad, procedimiento.genero as procedimiento_genero, procedimiento.circunstancias_emergencia as cmp_maior_30_3, procedimiento.Id_Seguridad_Social as cmp_maior_30_7, procedimiento.Id_Eps as procedimiento_id_eps, procedimiento.fecha as procedimiento_fecha, procedimiento.ip as procedimiento_ip, procedimiento.login as procedimiento_login, sector.Id_Sector as sector_id_sector, sector.Sector as sector_sector, seguridad.Id_Seguridad_Social as seguridad_id_seguridad_social, seguridad.seguridad_social as seguridad_seguridad_social, medico.Id_Medico as medico_id_medico, medico.medico as medico_medico, medico.registro_medico as medico_registro_medico, medico.telefono as medico_telefono, medico.estado as medico_estado, ambulancia.Id_Movil as ambulancia_id_movil, ambulancia.placa as ambulancia_placa from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  procedimiento.Id_Procedimiento = $parms_det[0] and procedimiento.consecutivo = '$parms_det[1]' and medico.medico = '$parms_det[2]' and ambulancia.placa = '$parms_det[3]' and procedimiento.secad = '$parms_det[4]' and sector.Sector = '$parms_det[5]' and barrio.barrio = '$parms_det[6]' and procedimiento.direccion_servicio = '$parms_det[7]' and procedimiento.tipo_servicio = '$parms_det[8]' and procedimiento.nombre_apellido = '$parms_det[9]' and procedimiento.tipo_documento = '$parms_det[10]' and procedimiento.documento_identidad = '$parms_det[11]' and procedimiento.numero_contacto = '$parms_det[12]' and eps.eps = '$parms_det[13]' and seguridad.seguridad_social = '$parms_det[14]' and procedimiento.edad = $parms_det[15] and procedimiento.genero = '$parms_det[16]' and procedimiento.circunstancias_emergencia = '$parms_det[17]' and procedimiento.hora_ingreso_llamada = #$parms_det[18]# and procedimiento.Hora_notifica_movil = #$parms_det[19]# and procedimiento.hora_llegada_sitio = #$parms_det[20]# and procedimiento.hora_llegada_ips = #$parms_det[21]# and procedimiento.hora_salida_ips = #$parms_det[22]# and procedimiento.radicado = '$parms_det[23]' and procedimiento.login = '$parms_det[24]' and barrio.Id_Barrio = $parms_det[25] and barrio.Id_Sector = $parms_det[26] and eps.Id_Eps = $parms_det[27] and procedimiento.Id_Barrio = $parms_det[28] and procedimiento.Id_Seguridad_Social = $parms_det[29] and procedimiento.Id_Eps = $parms_det[30] and procedimiento.ip = '$parms_det[31]' and sector.Id_Sector = $parms_det[32] and seguridad.Id_Seguridad_Social = $parms_det[33] and medico.Id_Medico = $parms_det[34] and medico.registro_medico = '$parms_det[35]' and medico.telefono = '$parms_det[36]' and medico.estado = '$parms_det[37]' and ambulancia.Id_Movil = $parms_det[38]" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  procedimiento.Id_Procedimiento = $parms_det[0] and procedimiento.consecutivo = '$parms_det[1]' and medico.medico = '$parms_det[2]' and ambulancia.placa = '$parms_det[3]' and procedimiento.secad = '$parms_det[4]' and sector.Sector = '$parms_det[5]' and barrio.barrio = '$parms_det[6]' and procedimiento.direccion_servicio = '$parms_det[7]' and procedimiento.tipo_servicio = '$parms_det[8]' and procedimiento.nombre_apellido = '$parms_det[9]' and procedimiento.tipo_documento = '$parms_det[10]' and procedimiento.documento_identidad = '$parms_det[11]' and procedimiento.numero_contacto = '$parms_det[12]' and eps.eps = '$parms_det[13]' and seguridad.seguridad_social = '$parms_det[14]' and procedimiento.edad = $parms_det[15] and procedimiento.genero = '$parms_det[16]' and procedimiento.circunstancias_emergencia = '$parms_det[17]' and convert(char(23),procedimiento.hora_ingreso_llamada,121) = '$parms_det[18]' and convert(char(23),procedimiento.Hora_notifica_movil,121) = '$parms_det[19]' and convert(char(23),procedimiento.hora_llegada_sitio,121) = '$parms_det[20]' and convert(char(23),procedimiento.hora_llegada_ips,121) = '$parms_det[21]' and convert(char(23),procedimiento.hora_salida_ips,121) = '$parms_det[22]' and procedimiento.radicado = '$parms_det[23]' and procedimiento.login = '$parms_det[24]' and barrio.Id_Barrio = $parms_det[25] and barrio.Id_Sector = $parms_det[26] and eps.Id_Eps = $parms_det[27] and procedimiento.Id_Barrio = $parms_det[28] and procedimiento.Id_Seguridad_Social = $parms_det[29] and procedimiento.Id_Eps = $parms_det[30] and procedimiento.ip = '$parms_det[31]' and sector.Id_Sector = $parms_det[32] and seguridad.Id_Seguridad_Social = $parms_det[33] and medico.Id_Medico = $parms_det[34] and medico.registro_medico = '$parms_det[35]' and medico.telefono = '$parms_det[36]' and medico.estado = '$parms_det[37]' and ambulancia.Id_Movil = $parms_det[38]" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  procedimiento.Id_Procedimiento = $parms_det[0] and procedimiento.consecutivo = '$parms_det[1]' and medico.medico = '$parms_det[2]' and ambulancia.placa = '$parms_det[3]' and procedimiento.secad = '$parms_det[4]' and sector.Sector = '$parms_det[5]' and barrio.barrio = '$parms_det[6]' and procedimiento.direccion_servicio = '$parms_det[7]' and procedimiento.tipo_servicio = '$parms_det[8]' and procedimiento.nombre_apellido = '$parms_det[9]' and procedimiento.tipo_documento = '$parms_det[10]' and procedimiento.documento_identidad = '$parms_det[11]' and procedimiento.numero_contacto = '$parms_det[12]' and eps.eps = '$parms_det[13]' and seguridad.seguridad_social = '$parms_det[14]' and procedimiento.edad = $parms_det[15] and procedimiento.genero = '$parms_det[16]' and procedimiento.circunstancias_emergencia = '$parms_det[17]' and procedimiento.hora_ingreso_llamada = " . $this->Ini->date_delim . $parms_det[18] . $this->Ini->date_delim1 . " and procedimiento.Hora_notifica_movil = " . $this->Ini->date_delim . $parms_det[19] . $this->Ini->date_delim1 . " and procedimiento.hora_llegada_sitio = " . $this->Ini->date_delim . $parms_det[20] . $this->Ini->date_delim1 . " and procedimiento.hora_llegada_ips = " . $this->Ini->date_delim . $parms_det[21] . $this->Ini->date_delim1 . " and procedimiento.hora_salida_ips = " . $this->Ini->date_delim . $parms_det[22] . $this->Ini->date_delim1 . " and procedimiento.radicado = '$parms_det[23]' and procedimiento.login = '$parms_det[24]' and barrio.Id_Barrio = $parms_det[25] and barrio.Id_Sector = $parms_det[26] and eps.Id_Eps = $parms_det[27] and procedimiento.Id_Barrio = $parms_det[28] and procedimiento.Id_Seguridad_Social = $parms_det[29] and procedimiento.Id_Eps = $parms_det[30] and procedimiento.ip = '$parms_det[31]' and sector.Id_Sector = $parms_det[32] and seguridad.Id_Seguridad_Social = $parms_det[33] and medico.Id_Medico = $parms_det[34] and medico.registro_medico = '$parms_det[35]' and medico.telefono = '$parms_det[36]' and medico.estado = '$parms_det[37]' and ambulancia.Id_Movil = $parms_det[38]" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->barrio_id_barrio = $rs->fields[0] ;  
   $this->barrio_id_barrio = (string)$this->barrio_id_barrio;
   $this->barrio_barrio = $rs->fields[1] ;  
   $this->barrio_id_sector = $rs->fields[2] ;  
   $this->barrio_id_sector = (string)$this->barrio_id_sector;
   $this->eps_id_eps = $rs->fields[3] ;  
   $this->eps_id_eps = (string)$this->eps_id_eps;
   $this->eps_eps = $rs->fields[4] ;  
   $this->procedimiento_id_procedimiento = $rs->fields[5] ;  
   $this->procedimiento_id_procedimiento = (string)$this->procedimiento_id_procedimiento;
   $this->procedimiento_secad = $rs->fields[6] ;  
   $this->procedimiento_direccion_servicio = $rs->fields[7] ;  
   $this->procedimiento_id_barrio = $rs->fields[8] ;  
   $this->procedimiento_id_barrio = (string)$this->procedimiento_id_barrio;
   $this->procedimiento_tipo_servicio = $rs->fields[9] ;  
   $this->procedimiento_numero_contacto = $rs->fields[10] ;  
   $this->procedimiento_radicado = $rs->fields[11] ;  
   $this->procedimiento_nombre_apellido = $rs->fields[12] ;  
   $this->procedimiento_tipo_documento = $rs->fields[13] ;  
   $this->procedimiento_documento_identidad = $rs->fields[14] ;  
   $this->procedimiento_edad = $rs->fields[15] ;  
   $this->procedimiento_edad = (string)$this->procedimiento_edad;
   $this->procedimiento_genero = $rs->fields[16] ;  
   $this->procedimiento_circunstancias_emergencia = $rs->fields[17] ;  
   $this->procedimiento_id_seguridad_social = $rs->fields[18] ;  
   $this->procedimiento_id_seguridad_social = (string)$this->procedimiento_id_seguridad_social;
   $this->procedimiento_id_eps = $rs->fields[19] ;  
   $this->procedimiento_id_eps = (string)$this->procedimiento_id_eps;
   $this->procedimiento_fecha = $rs->fields[20] ;  
   $this->procedimiento_ip = $rs->fields[21] ;  
   $this->procedimiento_login = $rs->fields[22] ;  
   $this->sector_id_sector = $rs->fields[23] ;  
   $this->sector_id_sector = (string)$this->sector_id_sector;
   $this->sector_sector = $rs->fields[24] ;  
   $this->seguridad_id_seguridad_social = $rs->fields[25] ;  
   $this->seguridad_id_seguridad_social = (string)$this->seguridad_id_seguridad_social;
   $this->seguridad_seguridad_social = $rs->fields[26] ;  
   $this->medico_id_medico = $rs->fields[27] ;  
   $this->medico_id_medico = (string)$this->medico_id_medico;
   $this->medico_medico = $rs->fields[28] ;  
   $this->medico_registro_medico = $rs->fields[29] ;  
   $this->medico_telefono = $rs->fields[30] ;  
   $this->medico_estado = $rs->fields[31] ;  
   $this->ambulancia_id_movil = $rs->fields[32] ;  
   $this->ambulancia_id_movil = (string)$this->ambulancia_id_movil;
   $this->ambulancia_placa = $rs->fields[33] ;  
//--- 
   $nm_saida->saida("<!DOCTYPE html>\r\n");
   $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
   $nm_saida->saida("<HEAD>\r\n");
   $nm_saida->saida("   <TITLE>Emergencias registradas</TITLE>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
   $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
   $nm_saida->saida(" <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
   if ($_SESSION['scriptcase']['proc_mobile'])
   {
       $nm_saida->saida(" <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
   }

           $nm_saida->saida("   <script type=\"text/javascript\" src=\"resumen_procedimiento_jquery_5208.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"resumen_procedimiento_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"resumen_procedimiento_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var applicationKeys = '';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+q';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'f1';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+h';\r\n");
           $nm_saida->saida("     var hotkeyList = '';\r\n");
           $nm_saida->saida("     function execHotKey(e, h) {\r\n");
           $nm_saida->saida("         var hotkey_fired = false\r\n");
           $nm_saida->saida("         switch (true) {\r\n");
           $nm_saida->saida("             case (['alt+q'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_sai');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_imp');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['f1'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_webh');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+h'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_html');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("         if (hotkey_fired) {\r\n");
           $nm_saida->saida("             e.preventDefault();\r\n");
           $nm_saida->saida("             return false;\r\n");
           $nm_saida->saida("         } else {\r\n");
           $nm_saida->saida("             return true;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys.inc.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys_setup.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
$nm_saida->saida("<script>\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/ scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("    var rs =$.ajax({\r\n");
$nm_saida->saida("                type: \"POST\",\r\n");
$nm_saida->saida("                url: 'index.php?script_case_init=" . $this->Ini->sc_page . "',\r\n");
$nm_saida->saida("                async: true,\r\n");
$nm_saida->saida("                data: 'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p='+ p + '&p_cache='+ p_cache,\r\n");
$nm_saida->saida("            }).done(function (rs) {\r\n");
$nm_saida->saida("                    if(rs.indexOf('</span>') != -1){\r\n");
$nm_saida->saida("                        rs = rs.substr(rs.indexOf('</span>')  + 7);\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                    if (rs != 0) {\r\n");
$nm_saida->saida("                        rs = rs.trim();\r\n");
$nm_saida->saida("                        if( $('.css_'+field+'_det_line a img').length > 0){\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a img').attr('src', rs.split('_@@NM@@_')[1]);\r\n");
$nm_saida->saida("                            var __tmp = $('.css_'+field+'_det_line a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs.split('_@@NM@@_')[0];\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else if($('.css_'+field+'_det_line a').length > 0){\r\n");
$nm_saida->saida("                            var __tmp = $('.css_'+field+'_det_line a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                            var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                            var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                            ___file_doc[0] = rs.split('_@@NM@@_')[1];\r\n");
$nm_saida->saida("                            __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                            __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("</script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("  var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("  var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("  var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida(" </script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("<style type=\"text/css\">\r\n");
           $nm_saida->saida("</style>\r\n");
           $nm_saida->saida("<link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/tippyjs/light.css\"></script>\r\n");
           $nm_saida->saida("<link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/tippyjs/light-border.css\"></script>\r\n");
           $nm_saida->saida("<link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/tippyjs/material.css\"></script>\r\n");
           $nm_saida->saida("<link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/tippyjs/translucent.css\"></script>\r\n");
           $nm_saida->saida("<script src=\"" . $this->Ini->path_prod . "/third/tippyjs/popper.min.js\"></script>\r\n");
           $nm_saida->saida("<script src=\"" . $this->Ini->path_prod . "/third/tippyjs/tippy-bundle.umd.min.js\"></script>\r\n");
           $nm_saida->saida("<script>\r\n");
           $nm_saida->saida("</script>\r\n");
   $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if (($this->Ini->sc_export_ajax || $this->Ini->Export_det_zip) && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['det_print'] == "print")
   {
       if (strtoupper($nmgp_cor_print) == "PB")
       {
           $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
           $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
       }
       else
       {
           $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
           $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
       }
       $NM_css_cmp  = $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css";
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if (is_file($this->Ini->path_css . $NM_css_file))
       {
           $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       if (is_file($this->Ini->path_css . $NM_css_dir))
       {
           $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       if (is_file($this->Ini->root . $NM_css_cmp))
       {
           $NM_css_attr = file($this->Ini->root . $NM_css_cmp);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       $nm_saida->saida("  </style>\r\n");
   }
   elseif (($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/6/css/all.min.css\" type=\"text/css\" media=\"screen,print\" />\r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
       $nm_saida->saida(" <link href=\"" . $this->Ini->str_google_fonts . "\" rel=\"stylesheet\" /> \r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
    $removeMargin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['remove_margin'] ? 'margin: 0;' : '';
    $removeBorder = isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['remove_border'] ? 'border-width: 0;' : '';
    $removeBackground = isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['remove_background'] ? 'background-color: transparent; background-image: none;' : '';
   if (!$this->Ini->Export_html_zip && !$this->Ini->Export_det_zip && $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['det_print'] == "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida("  <body id=\"grid_detail\" class=\"scGridPage\"  style=\"-webkit-print-color-adjust: exact;" . $removeMargin . $removeBackground . "\">\r\n");
       $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" >\r\n");
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + P)", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("     </TR>\r\n");
       $nm_saida->saida("   </TABLE>\r\n");
       $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     function prit_web_page()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
       $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
       $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
       $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
       $nm_saida->saida("        window.print();\r\n");
       $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("  </script>\r\n");
   }
   else
   {
       $nm_saida->saida("  <body id=\"grid_detail\" class=\"scGridPage\" style=\"" . $removeMargin . $removeBackground . "\">\r\n");
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['cmp_acum']);
       foreach ($parms_acum as $cada_par)
       {
          $cada_val = explode("=", $cada_par);
          $this->$cada_val[0] = $cada_val[1];
       }
   }
   $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
   $nm_saida->saida("<table border=0 align=\"center\" valign=\"top\" ><tr><td style=\"padding: 0px\"><div class=\"scGridBorder\" style=\"" . $removeBorder . "\"><table width='100%' cellspacing=0 cellpadding=0><tr><td>\r\n");
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['compact_mode']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['link_info']['compact_mode']) {
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd scGridPage\">\r\n");
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div class=\"scGridHeader\" style=\"height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;\">\r\n");
   $nm_saida->saida("    <div class=\"scGridHeaderFont\" style=\"float: left; text-transform: uppercase;\"></div>\r\n");
   $nm_saida->saida("    <div class=\"scGridHeaderFont\" style=\"float: right;\"></div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   }
   if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
   {
       $this->nmgp_barra_det_top_mobile();
   }
   else
   {
       $this->nmgp_barra_det_top_normal();
   }
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\" id='idDetailTable'>\r\n");
   $nm_saida->saida("<TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px;\" class=\"scGridTabela sc-grid-detail\" align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['barrio_id_barrio'])) ? $this->New_label['barrio_id_barrio'] : "Id Barrio"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->barrio_id_barrio))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'barrio_id_barrio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'barrio_id_barrio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_barrio_id_barrio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_barrio_id_barrio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_barrio_id_barrio\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['barrio_barrio'])) ? $this->New_label['barrio_barrio'] : "Barrio"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->barrio_barrio)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->barrio_barrio)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'barrio_barrio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'barrio_barrio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_barrio_barrio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_barrio_barrio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_barrio_barrio\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['barrio_id_sector'])) ? $this->New_label['barrio_id_sector'] : "Id Sector"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->barrio_id_sector))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'barrio_id_sector', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'barrio_id_sector', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_barrio_id_sector_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_barrio_id_sector_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_barrio_id_sector\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['eps_id_eps'])) ? $this->New_label['eps_id_eps'] : "Id Eps"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->eps_id_eps))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'eps_id_eps', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'eps_id_eps', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eps_id_eps_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_eps_id_eps_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_eps_id_eps\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['eps_eps'])) ? $this->New_label['eps_eps'] : "Eps"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->eps_eps)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->eps_eps)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'eps_eps', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'eps_eps', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eps_eps_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_eps_eps_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_eps_eps\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['procedimiento_id_procedimiento'])) ? $this->New_label['procedimiento_id_procedimiento'] : "Procedimiento"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_id_procedimiento))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_id_procedimiento', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_id_procedimiento', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_id_procedimiento_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_id_procedimiento_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_id_procedimiento\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_secad'])) ? $this->New_label['procedimiento_secad'] : "Secad"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_secad)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_secad)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_secad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_secad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_secad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_secad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_secad\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_direccion_servicio'])) ? $this->New_label['procedimiento_direccion_servicio'] : "Direccion Servicio"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_direccion_servicio)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_direccion_servicio)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_direccion_servicio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_direccion_servicio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_direccion_servicio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_direccion_servicio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_direccion_servicio\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['procedimiento_id_barrio'])) ? $this->New_label['procedimiento_id_barrio'] : "Id Barrio"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_id_barrio))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_id_barrio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_id_barrio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_id_barrio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_id_barrio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_id_barrio\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_tipo_servicio'])) ? $this->New_label['procedimiento_tipo_servicio'] : "Tipo Servicio"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_tipo_servicio)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_tipo_servicio)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_tipo_servicio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_tipo_servicio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_tipo_servicio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_tipo_servicio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_tipo_servicio\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_numero_contacto'])) ? $this->New_label['procedimiento_numero_contacto'] : "Numero Contacto"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_numero_contacto)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_numero_contacto)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_numero_contacto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_numero_contacto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_numero_contacto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_numero_contacto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_numero_contacto\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_radicado'])) ? $this->New_label['procedimiento_radicado'] : "Radicado"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_radicado)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_radicado)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_radicado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_radicado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_radicado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_radicado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_radicado\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_nombre_apellido'])) ? $this->New_label['procedimiento_nombre_apellido'] : "Nombre Apellido"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_nombre_apellido)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_nombre_apellido)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_nombre_apellido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_nombre_apellido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_nombre_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_nombre_apellido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_nombre_apellido\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_tipo_documento'])) ? $this->New_label['procedimiento_tipo_documento'] : "Tipo Documento"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_tipo_documento)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_tipo_documento)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_tipo_documento', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_tipo_documento', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_tipo_documento_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_tipo_documento_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_tipo_documento\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_documento_identidad'])) ? $this->New_label['procedimiento_documento_identidad'] : "Documento Identidad"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_documento_identidad)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_documento_identidad)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_documento_identidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_documento_identidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_documento_identidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_documento_identidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_documento_identidad\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['procedimiento_edad'])) ? $this->New_label['procedimiento_edad'] : "Edad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_edad))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_edad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_edad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_edad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_edad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_edad\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_genero'])) ? $this->New_label['procedimiento_genero'] : "Genero"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_genero)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_genero)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_genero', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_genero', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_genero_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_genero_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_genero\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_circunstancias_emergencia'])) ? $this->New_label['procedimiento_circunstancias_emergencia'] : "Circunstancias Emergencia"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_circunstancias_emergencia)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_circunstancias_emergencia)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_circunstancias_emergencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_circunstancias_emergencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_circunstancias_emergencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_circunstancias_emergencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_circunstancias_emergencia\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['procedimiento_id_seguridad_social'])) ? $this->New_label['procedimiento_id_seguridad_social'] : "Id Seguridad Social"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_id_seguridad_social))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_id_seguridad_social', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_id_seguridad_social', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_id_seguridad_social_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_id_seguridad_social_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_id_seguridad_social\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['procedimiento_id_eps'])) ? $this->New_label['procedimiento_id_eps'] : "Id Eps"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_id_eps))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_id_eps', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_id_eps', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_id_eps_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_id_eps_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_id_eps\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['procedimiento_fecha'])) ? $this->New_label['procedimiento_fecha'] : "Fecha"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_fecha))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_fecha', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_fecha', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_fecha_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_fecha_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_fecha\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_ip'])) ? $this->New_label['procedimiento_ip'] : "Ip"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_ip)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_ip)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_ip', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_ip', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_ip_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_procedimiento_ip_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_ip\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['procedimiento_login'])) ? $this->New_label['procedimiento_login'] : "Usuario de registro"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->procedimiento_login)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->procedimiento_login)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'procedimiento_login', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'procedimiento_login', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_procedimiento_login_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_procedimiento_login_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_procedimiento_login\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sector_id_sector'])) ? $this->New_label['sector_id_sector'] : "Id Sector"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sector_id_sector))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_id_sector', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_id_sector', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_id_sector_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sector_id_sector_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_sector_id_sector\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector_sector'])) ? $this->New_label['sector_sector'] : "Sector"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->sector_sector)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->sector_sector)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_sector', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_sector', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_sector_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sector_sector_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_sector_sector\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['seguridad_id_seguridad_social'])) ? $this->New_label['seguridad_id_seguridad_social'] : "Id Seguridad Social"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->seguridad_id_seguridad_social))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'seguridad_id_seguridad_social', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'seguridad_id_seguridad_social', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_seguridad_id_seguridad_social_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_seguridad_id_seguridad_social_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_seguridad_id_seguridad_social\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['seguridad_seguridad_social'])) ? $this->New_label['seguridad_seguridad_social'] : "Seguridad Social"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->seguridad_seguridad_social)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->seguridad_seguridad_social)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'seguridad_seguridad_social', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'seguridad_seguridad_social', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_seguridad_seguridad_social_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_seguridad_seguridad_social_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_seguridad_seguridad_social\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['medico_id_medico'])) ? $this->New_label['medico_id_medico'] : "Id Medico"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->medico_id_medico))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'medico_id_medico', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'medico_id_medico', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_medico_id_medico_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_medico_id_medico_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_medico_id_medico\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['medico_medico'])) ? $this->New_label['medico_medico'] : "Médico"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->medico_medico)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->medico_medico)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'medico_medico', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'medico_medico', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_medico_medico_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_medico_medico_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_medico_medico\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['medico_registro_medico'])) ? $this->New_label['medico_registro_medico'] : "Registro Medico"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->medico_registro_medico)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->medico_registro_medico)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'medico_registro_medico', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'medico_registro_medico', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_medico_registro_medico_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_medico_registro_medico_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_medico_registro_medico\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['medico_telefono'])) ? $this->New_label['medico_telefono'] : "Telefono"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->medico_telefono)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->medico_telefono)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'medico_telefono', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'medico_telefono', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_medico_telefono_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_medico_telefono_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_medico_telefono\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['medico_estado'])) ? $this->New_label['medico_estado'] : "Estado"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->medico_estado)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->medico_estado)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'medico_estado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'medico_estado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_medico_estado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_medico_estado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_medico_estado\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ambulancia_id_movil'])) ? $this->New_label['ambulancia_id_movil'] : "Id Movil"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ambulancia_id_movil))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ambulancia_id_movil', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ambulancia_id_movil', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ambulancia_id_movil_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ambulancia_id_movil_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_ambulancia_id_movil\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ambulancia_placa'])) ? $this->New_label['ambulancia_placa'] : "Ambulancia"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
       $conteudo = trim(NM_encode_input(sc_strip_script($this->ambulancia_placa)));
       $conteudo_original =  NM_encode_input(sc_strip_script($conteudo)); 
   }
   else {
       $conteudo = trim(sc_strip_script($this->ambulancia_placa)); 
       $conteudo_original = $conteudo; 
   }
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ambulancia_placa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ambulancia_placa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ambulancia_placa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ambulancia_placa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\"><span id=\"id_sc_field_ambulancia_placa\">" . $conteudo . "</span></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
   {
   }
   $rs->Close(); 
   if (!$_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
   if (!$_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
   if ($_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
//--- 
//--- 
   $nm_saida->saida("<form name=\"F3\" method=post\r\n");
   $nm_saida->saida("                  target=\"_self\"\r\n");
   $nm_saida->saida("                  action=\"./\">\r\n");
   $nm_saida->saida("<input type=hidden name=\"nmgp_opcao\" value=\"igual\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/>\r\n");
   $nm_saida->saida("</form>\r\n");
   $nm_saida->saida("<form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"./\" \r\n");
   $nm_saida->saida("                  target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("<form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"resumen_procedimiento_iframe_prt.php\" \r\n");
   $nm_saida->saida("                  target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"opcao\" value=\"det_print\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_opcao\" value=\"det_print\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("  <form name=\"Fdet_pdf\" method=\"post\" target=\"_self\">\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"pdf_det\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms_pdf\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_graf_pdf\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"Det_use_pass_pdf\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"Det_pdf_zip\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . session_id() . "\"/> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("<script language=JavaScript>\r\n");
   $nm_saida->saida("   $(function(){ \r\n");
   $nm_saida->saida("       NM_btn_disable();\r\n");
   $nm_saida->saida("   }); \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"resumen_procedimiento_doc.php?nmgp_parms=\" + campo1, \"_self\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"pdf_det\" == x && \"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_det&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__Det_use_pass_pdf=\" + use_pass_pdf + \"__E__Det_pdf_zip=\" + pdf_zip + \"&nm_opc=pdf_det&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdet_pdf.nmgp_tipo_pdf.value = z;\r\n");
   $nm_saida->saida("           document.Fdet_pdf.nmgp_parms_pdf.value = p;\r\n");
   $nm_saida->saida("           document.Fdet_pdf.nmgp_graf_pdf.value = g;\r\n");
   $nm_saida->saida("           document.Fdet_pdf.Det_use_pass_pdf.value = use_pass_pdf;\r\n");
   $nm_saida->saida("           document.Fdet_pdf.Det_pdf_zip.value = pdf_zip;\r\n");
   $nm_saida->saida("           document.Fdet_pdf.action=\"index.php\";\r\n");
   $nm_saida->saida("           document.Fdet_pdf.submit();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, res_cons, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"D\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__nmgp_cor_print=\" + cor + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("          document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("          document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("          if (password != \"\")\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              document.Fprint.action=\"./\";\r\n");
   $nm_saida->saida("              document.Fprint.target=\"_self\";\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          document.Fprint.submit() ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function process_hotkeys(hotkey)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("   return false;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
           $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("</script>\r\n");
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</html>\r\n");
 }
   function nmgp_barra_det_top_normal()
   {
      global $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=8&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=s&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
         $this->nm_btn_exist['det_exit'][] = "sc_b_sai_top";
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit();", "document.F3.submit();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove();", "self.parent.tb_remove();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       }
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   }
   function nmgp_barra_det_top_mobile()
   {
      global $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['resumen_procedimiento']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=8&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=s&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "resumen_procedimiento/resumen_procedimiento_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
         $this->nm_btn_exist['det_exit'][] = "sc_b_sai_top";
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit();", "document.F3.submit();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove();", "self.parent.tb_remove();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       }
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
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
}
