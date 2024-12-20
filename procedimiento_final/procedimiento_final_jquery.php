
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["consecutivo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["secad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["quien_reporta_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discapacidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_apellido_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_documento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documento_identidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["edad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_contacto_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["genero_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipo_evento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["circunstancias_emergencia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_eps_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_seguridad_social_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zona_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_servicio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_barrio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_servicio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_ingreso_llamada_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_notifica_movil_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_llegada_sitio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_llegada_ips_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_salida_ips_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_movil_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ips_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_caso_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_medico_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["consecutivo_" + iSeqRow] && scEventControl_data["consecutivo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consecutivo_" + iSeqRow] && scEventControl_data["consecutivo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["secad_" + iSeqRow] && scEventControl_data["secad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["secad_" + iSeqRow] && scEventControl_data["secad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["quien_reporta_" + iSeqRow] && scEventControl_data["quien_reporta_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["quien_reporta_" + iSeqRow] && scEventControl_data["quien_reporta_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discapacidad_" + iSeqRow] && scEventControl_data["discapacidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discapacidad_" + iSeqRow] && scEventControl_data["discapacidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_apellido_" + iSeqRow] && scEventControl_data["nombre_apellido_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_apellido_" + iSeqRow] && scEventControl_data["nombre_apellido_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento_" + iSeqRow] && scEventControl_data["tipo_documento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento_" + iSeqRow] && scEventControl_data["tipo_documento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento_identidad_" + iSeqRow] && scEventControl_data["documento_identidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento_identidad_" + iSeqRow] && scEventControl_data["documento_identidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["edad_" + iSeqRow] && scEventControl_data["edad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["edad_" + iSeqRow] && scEventControl_data["edad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_contacto_" + iSeqRow] && scEventControl_data["numero_contacto_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_contacto_" + iSeqRow] && scEventControl_data["numero_contacto_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["genero_" + iSeqRow] && scEventControl_data["genero_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["genero_" + iSeqRow] && scEventControl_data["genero_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_evento_" + iSeqRow] && scEventControl_data["id_tipo_evento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_evento_" + iSeqRow] && scEventControl_data["id_tipo_evento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["circunstancias_emergencia_" + iSeqRow] && scEventControl_data["circunstancias_emergencia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["circunstancias_emergencia_" + iSeqRow] && scEventControl_data["circunstancias_emergencia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_eps_" + iSeqRow] && scEventControl_data["id_eps_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_eps_" + iSeqRow] && scEventControl_data["id_eps_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_seguridad_social_" + iSeqRow] && scEventControl_data["id_seguridad_social_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_seguridad_social_" + iSeqRow] && scEventControl_data["id_seguridad_social_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zona_" + iSeqRow] && scEventControl_data["zona_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zona_" + iSeqRow] && scEventControl_data["zona_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_servicio_" + iSeqRow] && scEventControl_data["tipo_servicio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_servicio_" + iSeqRow] && scEventControl_data["tipo_servicio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_barrio_" + iSeqRow] && scEventControl_data["id_barrio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_barrio_" + iSeqRow] && scEventControl_data["id_barrio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_servicio_" + iSeqRow] && scEventControl_data["direccion_servicio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_servicio_" + iSeqRow] && scEventControl_data["direccion_servicio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_ingreso_llamada_" + iSeqRow] && scEventControl_data["hora_ingreso_llamada_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_ingreso_llamada_" + iSeqRow] && scEventControl_data["hora_ingreso_llamada_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_notifica_movil_" + iSeqRow] && scEventControl_data["hora_notifica_movil_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_notifica_movil_" + iSeqRow] && scEventControl_data["hora_notifica_movil_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_sitio_" + iSeqRow] && scEventControl_data["hora_llegada_sitio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_sitio_" + iSeqRow] && scEventControl_data["hora_llegada_sitio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_ips_" + iSeqRow] && scEventControl_data["hora_llegada_ips_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_ips_" + iSeqRow] && scEventControl_data["hora_llegada_ips_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_salida_ips_" + iSeqRow] && scEventControl_data["hora_salida_ips_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_salida_ips_" + iSeqRow] && scEventControl_data["hora_salida_ips_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_movil_" + iSeqRow] && scEventControl_data["id_movil_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_movil_" + iSeqRow] && scEventControl_data["id_movil_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ips_" + iSeqRow] && scEventControl_data["id_ips_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ips_" + iSeqRow] && scEventControl_data["id_ips_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_caso_" + iSeqRow] && scEventControl_data["tipo_caso_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_caso_" + iSeqRow] && scEventControl_data["tipo_caso_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_medico_" + iSeqRow] && scEventControl_data["id_medico_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_medico_" + iSeqRow] && scEventControl_data["id_medico_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("quien_reporta_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("discapacidad_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_documento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_tipo_evento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_eps_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_seguridad_social_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("zona_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_servicio_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_barrio_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_movil_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_ips_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_caso_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_medico_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nombre_apellido_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_procedimiento_' + iSeqRow).bind('change', function() { sc_procedimiento_final_id_procedimiento__onchange(this, iSeqRow) });
  $('#id_sc_field_secad_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_secad__onblur('#id_sc_field_secad_' + iSeqRow, iSeqRow) })
                                    .bind('change', function() { sc_procedimiento_final_secad__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_procedimiento_final_secad__onfocus(this, iSeqRow) });
  $('#id_sc_field_consecutivo_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_procedimiento_final_consecutivo__onblur('#id_sc_field_consecutivo_' + iSeqRow, iSeqRow);}, 300) })
                                          .bind('change', function() { sc_procedimiento_final_consecutivo__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_procedimiento_final_consecutivo__onfocus(this, iSeqRow) });
  $('#id_sc_field_quien_reporta_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_procedimiento_final_quien_reporta__onblur('#id_sc_field_quien_reporta_' + iSeqRow, iSeqRow);}, 300) })
                                            .bind('change', function() { sc_procedimiento_final_quien_reporta__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_procedimiento_final_quien_reporta__onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_servicio_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_direccion_servicio__onblur('#id_sc_field_direccion_servicio_' + iSeqRow, iSeqRow) })
                                                 .bind('change', function() { sc_procedimiento_final_direccion_servicio__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_procedimiento_final_direccion_servicio__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_barrio_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_id_barrio__onblur('#id_sc_field_id_barrio_' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_procedimiento_final_id_barrio__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_procedimiento_final_id_barrio__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_servicio_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_tipo_servicio__onblur('#id_sc_field_tipo_servicio_' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_procedimiento_final_tipo_servicio__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_procedimiento_final_tipo_servicio__onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_contacto_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_numero_contacto__onblur('#id_sc_field_numero_contacto_' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_procedimiento_final_numero_contacto__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_procedimiento_final_numero_contacto__onfocus(this, iSeqRow) });
  $('#id_sc_field_radicado_' + iSeqRow).bind('change', function() { sc_procedimiento_final_radicado__onchange(this, iSeqRow) });
  $('#id_sc_field_nombre_apellido_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_nombre_apellido__onblur('#id_sc_field_nombre_apellido_' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_procedimiento_final_nombre_apellido__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_procedimiento_final_nombre_apellido__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_documento_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_tipo_documento__onblur('#id_sc_field_tipo_documento_' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_procedimiento_final_tipo_documento__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_procedimiento_final_tipo_documento__onfocus(this, iSeqRow) });
  $('#id_sc_field_documento_identidad_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_documento_identidad__onblur('#id_sc_field_documento_identidad_' + iSeqRow, iSeqRow) })
                                                  .bind('change', function() { sc_procedimiento_final_documento_identidad__onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_procedimiento_final_documento_identidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_edad_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_edad__onblur('#id_sc_field_edad_' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_procedimiento_final_edad__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_procedimiento_final_edad__onfocus(this, iSeqRow) });
  $('#id_sc_field_genero_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_genero__onblur('#id_sc_field_genero_' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_procedimiento_final_genero__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_procedimiento_final_genero__onfocus(this, iSeqRow) });
  $('#id_sc_field_circunstancias_emergencia_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_procedimiento_final_circunstancias_emergencia__onblur('#id_sc_field_circunstancias_emergencia_' + iSeqRow, iSeqRow);}, 300) })
                                                        .bind('change', function() { sc_procedimiento_final_circunstancias_emergencia__onchange(this, iSeqRow) })
                                                        .bind('focus', function() { sc_procedimiento_final_circunstancias_emergencia__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_seguridad_social_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_id_seguridad_social__onblur('#id_sc_field_id_seguridad_social_' + iSeqRow, iSeqRow) })
                                                  .bind('change', function() { sc_procedimiento_final_id_seguridad_social__onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_procedimiento_final_id_seguridad_social__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_eps_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_id_eps__onblur('#id_sc_field_id_eps_' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_procedimiento_final_id_eps__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_procedimiento_final_id_eps__onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_' + iSeqRow).bind('change', function() { sc_procedimiento_final_fecha__onchange(this, iSeqRow) });
  $('#id_sc_field_ip_' + iSeqRow).bind('change', function() { sc_procedimiento_final_ip__onchange(this, iSeqRow) });
  $('#id_sc_field_login_' + iSeqRow).bind('change', function() { sc_procedimiento_final_login__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_ingreso_llamada_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_hora_ingreso_llamada__onblur('#id_sc_field_hora_ingreso_llamada_' + iSeqRow, iSeqRow) })
                                                   .bind('change', function() { sc_procedimiento_final_hora_ingreso_llamada__onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_procedimiento_final_hora_ingreso_llamada__onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_notifica_movil_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_hora_notifica_movil__onblur('#id_sc_field_hora_notifica_movil_' + iSeqRow, iSeqRow) })
                                                  .bind('change', function() { sc_procedimiento_final_hora_notifica_movil__onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_procedimiento_final_hora_notifica_movil__onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_llegada_sitio_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_hora_llegada_sitio__onblur('#id_sc_field_hora_llegada_sitio_' + iSeqRow, iSeqRow) })
                                                 .bind('change', function() { sc_procedimiento_final_hora_llegada_sitio__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_procedimiento_final_hora_llegada_sitio__onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_llegada_ips_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_hora_llegada_ips__onblur('#id_sc_field_hora_llegada_ips_' + iSeqRow, iSeqRow) })
                                               .bind('change', function() { sc_procedimiento_final_hora_llegada_ips__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_procedimiento_final_hora_llegada_ips__onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_salida_ips_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_hora_salida_ips__onblur('#id_sc_field_hora_salida_ips_' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_procedimiento_final_hora_salida_ips__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_procedimiento_final_hora_salida_ips__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_movil_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_id_movil__onblur('#id_sc_field_id_movil_' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_procedimiento_final_id_movil__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_procedimiento_final_id_movil__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ips_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_id_ips__onblur('#id_sc_field_id_ips_' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_procedimiento_final_id_ips__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_procedimiento_final_id_ips__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_caso_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_tipo_caso__onblur('#id_sc_field_tipo_caso_' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_procedimiento_final_tipo_caso__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_procedimiento_final_tipo_caso__onfocus(this, iSeqRow) });
  $('#id_sc_field_operador_' + iSeqRow).bind('change', function() { sc_procedimiento_final_operador__onchange(this, iSeqRow) });
  $('#id_sc_field_id_medico_' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_procedimiento_final_id_medico__onblur('#id_sc_field_id_medico_' + iSeqRow, iSeqRow);}, 300) })
                                        .bind('change', function() { sc_procedimiento_final_id_medico__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_procedimiento_final_id_medico__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipo_evento_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_id_tipo_evento__onblur('#id_sc_field_id_tipo_evento_' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_procedimiento_final_id_tipo_evento__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_procedimiento_final_id_tipo_evento__onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones_' + iSeqRow).bind('change', function() { sc_procedimiento_final_observaciones__onchange(this, iSeqRow) });
  $('#id_sc_field_zona_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_zona__onblur('#id_sc_field_zona_' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_procedimiento_final_zona__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_procedimiento_final_zona__onfocus(this, iSeqRow) });
  $('#id_sc_field_discapacidad_' + iSeqRow).bind('blur', function() { sc_procedimiento_final_discapacidad__onblur('#id_sc_field_discapacidad_' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_procedimiento_final_discapacidad__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_procedimiento_final_discapacidad__onfocus(this, iSeqRow) });
  $('.sc-ui-radio-genero_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_procedimiento_final_id_procedimiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_secad__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_secad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_secad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_secad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_consecutivo__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_consecutivo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_consecutivo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_consecutivo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_quien_reporta__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_quien_reporta_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_quien_reporta__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_quien_reporta__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_direccion_servicio__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_direccion_servicio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_direccion_servicio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_direccion_servicio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_id_barrio__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_barrio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_barrio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_barrio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_tipo_servicio__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_tipo_servicio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_tipo_servicio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_tipo_servicio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_numero_contacto__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_numero_contacto_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_numero_contacto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_numero_contacto__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_radicado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_nombre_apellido__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_nombre_apellido_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_nombre_apellido__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_procedimiento_final_event_nombre_apellido__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_nombre_apellido__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_tipo_documento__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_tipo_documento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_tipo_documento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_tipo_documento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_documento_identidad__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_documento_identidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_documento_identidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_documento_identidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_edad__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_edad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_edad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_edad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_genero__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_genero_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_genero__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_genero__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_circunstancias_emergencia__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_circunstancias_emergencia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_circunstancias_emergencia__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_circunstancias_emergencia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_id_seguridad_social__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_seguridad_social_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_seguridad_social__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_seguridad_social__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_id_eps__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_eps_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_eps__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_eps__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_fecha__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_ip__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_login__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_hora_ingreso_llamada__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_hora_ingreso_llamada_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_ingreso_llamada__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_hora_ingreso_llamada__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_notifica_movil__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_hora_notifica_movil_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_notifica_movil__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_hora_notifica_movil__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_llegada_sitio__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_hora_llegada_sitio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_llegada_sitio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_hora_llegada_sitio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_llegada_ips__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_hora_llegada_ips_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_llegada_ips__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_hora_llegada_ips__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_salida_ips__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_hora_salida_ips_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_hora_salida_ips__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_hora_salida_ips__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_id_movil__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_movil_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_movil__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_movil__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_id_ips__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_ips_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_ips__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_ips__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_tipo_caso__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_tipo_caso_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_tipo_caso__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_tipo_caso__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_operador__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_id_medico__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_medico_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_medico__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_medico__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_id_tipo_evento__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_id_tipo_evento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_id_tipo_evento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_id_tipo_evento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_observaciones__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_procedimiento_final_zona__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_zona_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_zona__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_zona__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_procedimiento_final_discapacidad__onblur(oThis, iSeqRow) {
  do_ajax_procedimiento_final_validate_discapacidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_procedimiento_final_discapacidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_procedimiento_final_discapacidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("consecutivo_", "", status);
        displayChange_field("secad_", "", status);
        displayChange_field("quien_reporta_", "", status);
        displayChange_field("discapacidad_", "", status);
        displayChange_field("nombre_apellido_", "", status);
        displayChange_field("tipo_documento_", "", status);
        displayChange_field("documento_identidad_", "", status);
        displayChange_field("edad_", "", status);
        displayChange_field("numero_contacto_", "", status);
        displayChange_field("genero_", "", status);
        displayChange_field("id_tipo_evento_", "", status);
        displayChange_field("circunstancias_emergencia_", "", status);
        displayChange_field("id_eps_", "", status);
        displayChange_field("id_seguridad_social_", "", status);
        displayChange_field("zona_", "", status);
        displayChange_field("tipo_servicio_", "", status);
        displayChange_field("id_barrio_", "", status);
        displayChange_field("direccion_servicio_", "", status);
        displayChange_field("hora_ingreso_llamada_", "", status);
        displayChange_field("hora_notifica_movil_", "", status);
        displayChange_field("hora_llegada_sitio_", "", status);
        displayChange_field("hora_llegada_ips_", "", status);
        displayChange_field("hora_salida_ips_", "", status);
        displayChange_field("id_movil_", "", status);
        displayChange_field("id_ips_", "", status);
        displayChange_field("tipo_caso_", "", status);
        displayChange_field("id_medico_", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_consecutivo_(row, status);
        displayChange_field_secad_(row, status);
        displayChange_field_quien_reporta_(row, status);
        displayChange_field_discapacidad_(row, status);
        displayChange_field_nombre_apellido_(row, status);
        displayChange_field_tipo_documento_(row, status);
        displayChange_field_documento_identidad_(row, status);
        displayChange_field_edad_(row, status);
        displayChange_field_numero_contacto_(row, status);
        displayChange_field_genero_(row, status);
        displayChange_field_id_tipo_evento_(row, status);
        displayChange_field_circunstancias_emergencia_(row, status);
        displayChange_field_id_eps_(row, status);
        displayChange_field_id_seguridad_social_(row, status);
        displayChange_field_zona_(row, status);
        displayChange_field_tipo_servicio_(row, status);
        displayChange_field_id_barrio_(row, status);
        displayChange_field_direccion_servicio_(row, status);
        displayChange_field_hora_ingreso_llamada_(row, status);
        displayChange_field_hora_notifica_movil_(row, status);
        displayChange_field_hora_llegada_sitio_(row, status);
        displayChange_field_hora_llegada_ips_(row, status);
        displayChange_field_hora_salida_ips_(row, status);
        displayChange_field_id_movil_(row, status);
        displayChange_field_id_ips_(row, status);
        displayChange_field_tipo_caso_(row, status);
        displayChange_field_id_medico_(row, status);
}

function displayChange_field(field, row, status) {
        if ("consecutivo_" == field) {
                displayChange_field_consecutivo_(row, status);
        }
        if ("secad_" == field) {
                displayChange_field_secad_(row, status);
        }
        if ("quien_reporta_" == field) {
                displayChange_field_quien_reporta_(row, status);
        }
        if ("discapacidad_" == field) {
                displayChange_field_discapacidad_(row, status);
        }
        if ("nombre_apellido_" == field) {
                displayChange_field_nombre_apellido_(row, status);
        }
        if ("tipo_documento_" == field) {
                displayChange_field_tipo_documento_(row, status);
        }
        if ("documento_identidad_" == field) {
                displayChange_field_documento_identidad_(row, status);
        }
        if ("edad_" == field) {
                displayChange_field_edad_(row, status);
        }
        if ("numero_contacto_" == field) {
                displayChange_field_numero_contacto_(row, status);
        }
        if ("genero_" == field) {
                displayChange_field_genero_(row, status);
        }
        if ("id_tipo_evento_" == field) {
                displayChange_field_id_tipo_evento_(row, status);
        }
        if ("circunstancias_emergencia_" == field) {
                displayChange_field_circunstancias_emergencia_(row, status);
        }
        if ("id_eps_" == field) {
                displayChange_field_id_eps_(row, status);
        }
        if ("id_seguridad_social_" == field) {
                displayChange_field_id_seguridad_social_(row, status);
        }
        if ("zona_" == field) {
                displayChange_field_zona_(row, status);
        }
        if ("tipo_servicio_" == field) {
                displayChange_field_tipo_servicio_(row, status);
        }
        if ("id_barrio_" == field) {
                displayChange_field_id_barrio_(row, status);
        }
        if ("direccion_servicio_" == field) {
                displayChange_field_direccion_servicio_(row, status);
        }
        if ("hora_ingreso_llamada_" == field) {
                displayChange_field_hora_ingreso_llamada_(row, status);
        }
        if ("hora_notifica_movil_" == field) {
                displayChange_field_hora_notifica_movil_(row, status);
        }
        if ("hora_llegada_sitio_" == field) {
                displayChange_field_hora_llegada_sitio_(row, status);
        }
        if ("hora_llegada_ips_" == field) {
                displayChange_field_hora_llegada_ips_(row, status);
        }
        if ("hora_salida_ips_" == field) {
                displayChange_field_hora_salida_ips_(row, status);
        }
        if ("id_movil_" == field) {
                displayChange_field_id_movil_(row, status);
        }
        if ("id_ips_" == field) {
                displayChange_field_id_ips_(row, status);
        }
        if ("tipo_caso_" == field) {
                displayChange_field_tipo_caso_(row, status);
        }
        if ("id_medico_" == field) {
                displayChange_field_id_medico_(row, status);
        }
}

function displayChange_field_consecutivo_(row, status) {
    var fieldId;
}

function displayChange_field_secad_(row, status) {
    var fieldId;
}

function displayChange_field_quien_reporta_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_quien_reporta___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_quien_reporta_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "quien_reporta_");
        }
}

function displayChange_field_discapacidad_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_discapacidad___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_discapacidad_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "discapacidad_");
        }
}

function displayChange_field_nombre_apellido_(row, status) {
    var fieldId;
}

function displayChange_field_tipo_documento_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_tipo_documento___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_tipo_documento_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "tipo_documento_");
        }
}

function displayChange_field_documento_identidad_(row, status) {
    var fieldId;
}

function displayChange_field_edad_(row, status) {
    var fieldId;
}

function displayChange_field_numero_contacto_(row, status) {
    var fieldId;
}

function displayChange_field_genero_(row, status) {
    var fieldId;
}

function displayChange_field_id_tipo_evento_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_tipo_evento___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_tipo_evento_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_tipo_evento_");
        }
}

function displayChange_field_circunstancias_emergencia_(row, status) {
    var fieldId;
}

function displayChange_field_id_eps_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_eps___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_eps_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_eps_");
        }
}

function displayChange_field_id_seguridad_social_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_seguridad_social___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_seguridad_social_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_seguridad_social_");
        }
}

function displayChange_field_zona_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_zona___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_zona_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "zona_");
        }
}

function displayChange_field_tipo_servicio_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_tipo_servicio___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_tipo_servicio_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "tipo_servicio_");
        }
}

function displayChange_field_id_barrio_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_barrio___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_barrio_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_barrio_");
        }
}

function displayChange_field_direccion_servicio_(row, status) {
    var fieldId;
}

function displayChange_field_hora_ingreso_llamada_(row, status) {
    var fieldId;
}

function displayChange_field_hora_notifica_movil_(row, status) {
    var fieldId;
}

function displayChange_field_hora_llegada_sitio_(row, status) {
    var fieldId;
}

function displayChange_field_hora_llegada_ips_(row, status) {
    var fieldId;
}

function displayChange_field_hora_salida_ips_(row, status) {
    var fieldId;
}

function displayChange_field_id_movil_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_movil___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_movil_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_movil_");
        }
}

function displayChange_field_id_ips_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_ips___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_ips_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_ips_");
        }
}

function displayChange_field_tipo_caso_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_tipo_caso___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_tipo_caso_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "tipo_caso_");
        }
}

function displayChange_field_id_medico_(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_medico___obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_medico_" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_medico_");
        }
}

function scRecreateSelect2() {
        displayChange_field_quien_reporta_("all", "on");
        displayChange_field_discapacidad_("all", "on");
        displayChange_field_tipo_documento_("all", "on");
        displayChange_field_id_tipo_evento_("all", "on");
        displayChange_field_id_eps_("all", "on");
        displayChange_field_id_seguridad_social_("all", "on");
        displayChange_field_zona_("all", "on");
        displayChange_field_tipo_servicio_("all", "on");
        displayChange_field_id_barrio_("all", "on");
        displayChange_field_id_movil_("all", "on");
        displayChange_field_id_ips_("all", "on");
        displayChange_field_tipo_caso_("all", "on");
        displayChange_field_id_medico_("all", "on");
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_procedimiento_final_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
                }
        }
}
<?php
if (!$this->Embutida_form) {
    $selectedFieldsDefault = '"0", "1"';
    $setControlStateLoop = '2';
} else {
    $selectedFieldsDefault = '"0"';
    $setControlStateLoop = '1';
}
?>
var scFixCol_left = 0, scFixCol_list = [], scFixCol_selectedFields = [];

function scFixCol()
{
    var i;

    scFixCol_left = 0;
    scFixCol_list = [];

    scFixCol_addFieldColumns();

    for (i = 0; i < scFixCol_list.length; i++) {
        scFixCol_fix(scFixCol_list[i].type, scFixCol_list[i].name);
    }
}

function scFixCol_clear()
{
    let colList;

    scFixCol_selectedFields = [];

    colList = $(".sc-col-op,.sc-col-fld");

    colList.css({
        "position": "static",
        "left": "auto"
    }).removeClass("sc-col-is-fixed");

    colList.filter(".sc-header-fixed").css({
        "position": "sticky"
    });
}

function scFixCol_addFieldColumns()
{
    var i;

    for (i = 0; i < scFixCol_selectedFields.length; i++) {
        scFixCol_list.push({"type": "fld", "name": scFixCol_selectedFields[i]});
    }
}

function scFixCol_fix(type, columnName)
{
    var columnCells = $(".sc-col-" + type + "-" + columnName), thisWidth = 0;

    if (columnCells.length) {
        thisWidth = columnCells[0].offsetWidth;

        columnCells.css({
            'position': 'sticky',
            'left': scFixCol_left,
            'z-index': 3
        }).addClass("sc-col-is-fixed");
    }

    scFixCol_left += thisWidth;
}

function scFixCol_fixTop()
{
    var columnCells = $(".sc-col-title");

    columnCells.css({
        'position': 'sticky',
        'top': 0,
        'z-index': 4
    });

    columnCells.filter(".sc-col-is-fixed").css("z-index", 5);
    columnCells.filter(".sc-col-is-fixed").filter(".sc-col-actions").css("z-index", 6);
}

function scFixCol_clickColumn(columnId)
{
    var action;

    action = scFixCol_fixColumns(columnId, "click");

    scFixCol_saveConfig(columnId, action);
}

function scFixCol_fixColumns(columnId, fixAction)
{
    var action = "";

    if ("click" == fixAction) {
        action = scFixCol_setControlState(columnId);
    } else {
        scFixCol_resetControlState(columnId);
    }

    scFixCol_clear();
    scFixCol_addFixedCells();
    scFixCol();
    scFixCol_fixTop();

    return action;
}

function scFixCol_setControlState(columnId)
{
    let i, fixColLength, action;

    if ($("#sc-fld-fix-col-" + columnId).hasClass("sc-op-fix-col-notfixed")) {
        action = "on";

        for (i = 0; i <= columnId; i++) {
            $(".sc-op-fix-col-" + i).removeClass("sc-op-fix-col-notfixed").addClass("sc-op-fix-col-fixed");
        }
    } else {
        action = "off";

        fixColLength = $(".sc-op-fix-col").length;

        for (i = columnId; i < fixColLength; i++) {
            $(".sc-op-fix-col-" + i).removeClass("sc-op-fix-col-fixed").addClass("sc-op-fix-col-notfixed");
        }
    }

    return action;
}

function scFixCol_resetControlState(columnId)
{
    let i;

    $(".sc-op-fix-col").addClass("sc-op-fix-col-notfixed").removeClass("sc-op-fix-col-fixed");

    if ("" == columnId) {
        return;
    }

    for (i = 0; i <= columnId; i++) {
        $(".sc-op-fix-col-" + i).removeClass("sc-op-fix-col-notfixed").addClass("sc-op-fix-col-fixed");
    }
}

function scFixCol_addFixedCells()
{
    selectedFields = $(".sc-ui-header-row .sc-op-fix-col.sc-op-fix-col-fixed");

    for (i = 0; i < selectedFields.length; i++) {
        scFixCol_selectedFields.push($(selectedFields[i]).attr("id").substr(15));
    }
}

function scFixCol_saveConfig(index, action)
{
    $.ajax({
        url: "procedimiento_final.php",
        dataType: "json",
        method: "POST",
        data: {
            script_case_init: "<?php echo $this->Ini->sc_page ?>",
            nmgp_opcao: "ajax_fixed_columns_form_save",
            fixed_index: index,
            fixed_action: action
        }
    }).done(function(data, textStatus, jqXHR) {
    });
}

function scFixCol_loadState()
{
    $.ajax({
        url: "procedimiento_final.php",
        dataType: "json",
        method: "POST",
        data: {
            script_case_init: "<?php echo $this->Ini->sc_page ?>",
            nmgp_opcao: "ajax_fixed_columns_form_load"
        }
    }).done(function(data, textStatus, jqXHR) {
        if (typeof data.status !== undefined && "ok" == data.status) {
            scFixCol_fixColumns(data.last_index, "load");
        }
    });
}

function scFixCol_addClickControl()
{
    $(".sc-op-fix-col").on("click", function() {
        scFixCol_clickColumn($(this).attr("data-fixcolid"));
    });
}

$(function()
{
    scFixCol();
    scFixCol_addClickControl();
    scFixCol_loadState();
    $(window).on('resize', function() {
        scFixCol_loadState();
    });
});

<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
        $formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
        $formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
        $formWidthParts = explode(' ', $formWidthCalc);
        if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
                $formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
                $formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
        }
}

?>

function scSetFixedHeadersCss(baseTop)
{
    let rows, cols, i, j, thisTop;

    rows = $(".sc-ui-header-row");
    thisTop = baseTop;

    for (i = 0; i < rows.length; i++) {
        cols = $(rows[i]).find("td").filter(".sc-col-title");
        for (j = 0; j < cols.length; j++) {
            $(cols[j]).css({
                "position": "sticky",
                "top": thisTop + "px",
                "z-index": 4
            }).addClass("sc-header-fixed");
        }
        thisTop += $(rows[i]).height();
    }

    rows = $(".sc-ui-header-row");

    rows.filter(".sc-col-is-fixed").css("z-index", 5);
    rows.filter(".sc-col-is-fixed").filter(".sc-col-actions").css("z-index", 6);
}

$(function() {
    scSetFixedHeadersCss(0);
});

$(window).scroll(function() {
        scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
    return;
        if (null == forceDisplay) {
                forceDisplay = false;
        }
        var divScroll, formHeaders, headerPlaceholder;
        formHeaders = scGetHeaderRow();
        headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
        if (!formHeaders) {
                headerPlaceholder.hide();
        }
        else {
                if (scIsHeaderVisible(formHeaders)) {
                        headerPlaceholder.hide();
                }
                else {
                        if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
                                scSetFixedHeadersContents(formHeaders, headerPlaceholder);
                                scSetFixedHeadersSize(formHeaders);
                                headerPlaceholder.show();
                        }
                        scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
                        if (0 < rerunHeaderDisplay) {
                                rerunHeaderDisplay--;
                                setTimeout(function() {
                                        scSetFixedHeadersContents(formHeaders, headerPlaceholder);
                                        scSetFixedHeadersSize(formHeaders);
                                        headerPlaceholder.show();
                                        scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
                                }, 5);
                        }
                }
        }
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
        if (formHeaders) {
                headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.offset().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
        }
}

function scIsHeaderVisible(formHeaders) {
        if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(formHeaders); }
        return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
        var formHeaders = $(".sc-ui-header-row").filter(":visible");
        if (!formHeaders.length) {
                formHeaders = false;
        }
        return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
        var i, htmlContent;
        htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
        for (i = 0; i < formHeaders.length; i++) {
                htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
        }
        htmlContent += "</table>";
        headerPlaceholder.html(htmlContent);
}

function scSetFixedHeadersSize(formHeaders) {
        var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
        tableOriginal = $("#hidden_bloco_0");
        tableHeaders = document.getElementById("sc-id-fixed-headers");
        $(tableHeaders).css("width", $(tableOriginal).outerWidth());
        for (i = 0; i < formHeaders.length; i++) {
                headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
                formColumns = $(formHeaders[i]).find("td");
                for (j = 0; j < formColumns.length; j++) {
                        if (window.getComputedStyle(formColumns[j])) {
                                cellWidth = window.getComputedStyle(formColumns[j]).width;
                                cellHeight = window.getComputedStyle(formColumns[j]).height;
                        }
                        else {
                                cellWidth = $(formColumns[j]).width() + "px";
                                cellHeight = $(formColumns[j]).height() + "px";
                        }
                        $(headerColumns[j]).css({
                                "width": cellWidth,
                                "height": cellHeight
                        });
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_fecha_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_procedimiento_final_validate_fecha_(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
} // scJQCalendarAdd

var sc_jq_timepicker_value = {};

function scJQTimePickerAdd(iSeqRow) {
  $("#id_sc_field_hora_ingreso_llamada_" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_ingreso_llamada_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_ingreso_llamada_" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_ingreso_llamada_" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_hora_notifica_movil_" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_notifica_movil_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_notifica_movil_" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_notifica_movil_" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_hora_llegada_sitio_" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_llegada_sitio_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_llegada_sitio_" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_llegada_sitio_" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_hora_llegada_ips_" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_llegada_ips_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_llegada_ips_" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_llegada_ips_" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_hora_salida_ips_" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_salida_ips_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_salida_ips_" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_salida_ips_" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'procedimiento_final')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "quien_reporta_" == specificField) {
    scJQSelect2Add_quien_reporta_(seqRow);
  }
  if (null == specificField || "discapacidad_" == specificField) {
    scJQSelect2Add_discapacidad_(seqRow);
  }
  if (null == specificField || "tipo_documento_" == specificField) {
    scJQSelect2Add_tipo_documento_(seqRow);
  }
  if (null == specificField || "id_tipo_evento_" == specificField) {
    scJQSelect2Add_id_tipo_evento_(seqRow);
  }
  if (null == specificField || "id_eps_" == specificField) {
    scJQSelect2Add_id_eps_(seqRow);
  }
  if (null == specificField || "id_seguridad_social_" == specificField) {
    scJQSelect2Add_id_seguridad_social_(seqRow);
  }
  if (null == specificField || "zona_" == specificField) {
    scJQSelect2Add_zona_(seqRow);
  }
  if (null == specificField || "tipo_servicio_" == specificField) {
    scJQSelect2Add_tipo_servicio_(seqRow);
  }
  if (null == specificField || "id_barrio_" == specificField) {
    scJQSelect2Add_id_barrio_(seqRow);
  }
  if (null == specificField || "id_movil_" == specificField) {
    scJQSelect2Add_id_movil_(seqRow);
  }
  if (null == specificField || "id_ips_" == specificField) {
    scJQSelect2Add_id_ips_(seqRow);
  }
  if (null == specificField || "tipo_caso_" == specificField) {
    scJQSelect2Add_tipo_caso_(seqRow);
  }
  if (null == specificField || "id_medico_" == specificField) {
    scJQSelect2Add_id_medico_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_quien_reporta_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_quien_reporta__obj" : "#id_sc_field_quien_reporta_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_quien_reporta__obj',
      dropdownCssClass: 'css_quien_reporta__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_discapacidad_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_discapacidad__obj" : "#id_sc_field_discapacidad_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_discapacidad__obj',
      dropdownCssClass: 'css_discapacidad__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_tipo_documento_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_documento__obj" : "#id_sc_field_tipo_documento_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_documento__obj',
      dropdownCssClass: 'css_tipo_documento__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_tipo_evento_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_tipo_evento__obj" : "#id_sc_field_id_tipo_evento_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_tipo_evento__obj',
      dropdownCssClass: 'css_id_tipo_evento__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_eps_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_eps__obj" : "#id_sc_field_id_eps_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_eps__obj',
      dropdownCssClass: 'css_id_eps__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_seguridad_social_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_seguridad_social__obj" : "#id_sc_field_id_seguridad_social_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_seguridad_social__obj',
      dropdownCssClass: 'css_id_seguridad_social__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_zona_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_zona__obj" : "#id_sc_field_zona_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_zona__obj',
      dropdownCssClass: 'css_zona__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_tipo_servicio_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_servicio__obj" : "#id_sc_field_tipo_servicio_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_servicio__obj',
      dropdownCssClass: 'css_tipo_servicio__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_barrio_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_barrio__obj" : "#id_sc_field_id_barrio_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_barrio__obj',
      dropdownCssClass: 'css_id_barrio__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_movil_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_movil__obj" : "#id_sc_field_id_movil_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_movil__obj',
      dropdownCssClass: 'css_id_movil__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_ips_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_ips__obj" : "#id_sc_field_id_ips_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_ips__obj',
      dropdownCssClass: 'css_id_ips__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_tipo_caso_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_caso__obj" : "#id_sc_field_tipo_caso_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_caso__obj',
      dropdownCssClass: 'css_tipo_caso__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_medico_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_medico__obj" : "#id_sc_field_id_medico_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_medico__obj',
      dropdownCssClass: 'css_id_medico__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQTimePickerAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_quien_reporta_) { displayChange_field_quien_reporta_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_discapacidad_) { displayChange_field_discapacidad_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_documento_) { displayChange_field_tipo_documento_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_tipo_evento_) { displayChange_field_id_tipo_evento_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_eps_) { displayChange_field_id_eps_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_seguridad_social_) { displayChange_field_id_seguridad_social_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_zona_) { displayChange_field_zona_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_servicio_) { displayChange_field_tipo_servicio_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_barrio_) { displayChange_field_id_barrio_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_movil_) { displayChange_field_id_movil_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_ips_) { displayChange_field_id_ips_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_caso_) { displayChange_field_tipo_caso_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_medico_) { displayChange_field_id_medico_(iLine, "on"); } }, 150);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

