
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
  scEventControl_data["consecutivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["secad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["quien_reporta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discapacidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documento_identidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["edad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_contacto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["genero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipo_evento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["circunstancias_emergencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_eps" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_seguridad_social" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zona" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_servicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_barrio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_servicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_ingreso_llamada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_notifica_movil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_llegada_sitio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_llegada_ips" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_salida_ips" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_movil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ips" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_caso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_medico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["consecutivo" + iSeqRow] && scEventControl_data["consecutivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consecutivo" + iSeqRow] && scEventControl_data["consecutivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["secad" + iSeqRow] && scEventControl_data["secad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["secad" + iSeqRow] && scEventControl_data["secad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["quien_reporta" + iSeqRow] && scEventControl_data["quien_reporta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["quien_reporta" + iSeqRow] && scEventControl_data["quien_reporta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discapacidad" + iSeqRow] && scEventControl_data["discapacidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discapacidad" + iSeqRow] && scEventControl_data["discapacidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_apellido" + iSeqRow] && scEventControl_data["nombre_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_apellido" + iSeqRow] && scEventControl_data["nombre_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow] && scEventControl_data["tipo_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow] && scEventControl_data["tipo_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento_identidad" + iSeqRow] && scEventControl_data["documento_identidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento_identidad" + iSeqRow] && scEventControl_data["documento_identidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["edad" + iSeqRow] && scEventControl_data["edad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["edad" + iSeqRow] && scEventControl_data["edad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_contacto" + iSeqRow] && scEventControl_data["numero_contacto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_contacto" + iSeqRow] && scEventControl_data["numero_contacto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["genero" + iSeqRow] && scEventControl_data["genero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["genero" + iSeqRow] && scEventControl_data["genero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_evento" + iSeqRow] && scEventControl_data["id_tipo_evento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_evento" + iSeqRow] && scEventControl_data["id_tipo_evento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["circunstancias_emergencia" + iSeqRow] && scEventControl_data["circunstancias_emergencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["circunstancias_emergencia" + iSeqRow] && scEventControl_data["circunstancias_emergencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_eps" + iSeqRow] && scEventControl_data["id_eps" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_eps" + iSeqRow] && scEventControl_data["id_eps" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_seguridad_social" + iSeqRow] && scEventControl_data["id_seguridad_social" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_seguridad_social" + iSeqRow] && scEventControl_data["id_seguridad_social" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow] && scEventControl_data["zona" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow] && scEventControl_data["zona" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_servicio" + iSeqRow] && scEventControl_data["tipo_servicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_servicio" + iSeqRow] && scEventControl_data["tipo_servicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_barrio" + iSeqRow] && scEventControl_data["id_barrio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_barrio" + iSeqRow] && scEventControl_data["id_barrio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_servicio" + iSeqRow] && scEventControl_data["direccion_servicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_servicio" + iSeqRow] && scEventControl_data["direccion_servicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_ingreso_llamada" + iSeqRow] && scEventControl_data["hora_ingreso_llamada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_ingreso_llamada" + iSeqRow] && scEventControl_data["hora_ingreso_llamada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_notifica_movil" + iSeqRow] && scEventControl_data["hora_notifica_movil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_notifica_movil" + iSeqRow] && scEventControl_data["hora_notifica_movil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_sitio" + iSeqRow] && scEventControl_data["hora_llegada_sitio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_sitio" + iSeqRow] && scEventControl_data["hora_llegada_sitio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_ips" + iSeqRow] && scEventControl_data["hora_llegada_ips" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_llegada_ips" + iSeqRow] && scEventControl_data["hora_llegada_ips" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_salida_ips" + iSeqRow] && scEventControl_data["hora_salida_ips" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_salida_ips" + iSeqRow] && scEventControl_data["hora_salida_ips" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_movil" + iSeqRow] && scEventControl_data["id_movil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_movil" + iSeqRow] && scEventControl_data["id_movil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ips" + iSeqRow] && scEventControl_data["id_ips" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ips" + iSeqRow] && scEventControl_data["id_ips" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_caso" + iSeqRow] && scEventControl_data["tipo_caso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_caso" + iSeqRow] && scEventControl_data["tipo_caso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_medico" + iSeqRow] && scEventControl_data["id_medico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_medico" + iSeqRow] && scEventControl_data["id_medico" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("quien_reporta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("discapacidad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_tipo_evento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_eps" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_seguridad_social" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("zona" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_servicio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_barrio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_movil" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_ips" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_caso" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_medico" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("login" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_id_procedimiento' + iSeqRow).bind('change', function() { sc_editar_procedimiento_id_procedimiento_onchange(this, iSeqRow) });
  $('#id_sc_field_secad' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_secad_onblur('#id_sc_field_secad' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_editar_procedimiento_secad_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_editar_procedimiento_secad_onfocus(this, iSeqRow) });
  $('#id_sc_field_consecutivo' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_consecutivo_onblur('#id_sc_field_consecutivo' + iSeqRow, iSeqRow) })
                                         .bind('change', function() { sc_editar_procedimiento_consecutivo_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_editar_procedimiento_consecutivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_quien_reporta' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_quien_reporta_onblur('#id_sc_field_quien_reporta' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_editar_procedimiento_quien_reporta_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_editar_procedimiento_quien_reporta_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_servicio' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_direccion_servicio_onblur('#id_sc_field_direccion_servicio' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_editar_procedimiento_direccion_servicio_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_editar_procedimiento_direccion_servicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_barrio' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_barrio_onblur('#id_sc_field_id_barrio' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_editar_procedimiento_id_barrio_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_editar_procedimiento_id_barrio_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_servicio' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_tipo_servicio_onblur('#id_sc_field_tipo_servicio' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_editar_procedimiento_tipo_servicio_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_editar_procedimiento_tipo_servicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_contacto' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_numero_contacto_onblur('#id_sc_field_numero_contacto' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_editar_procedimiento_numero_contacto_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_editar_procedimiento_numero_contacto_onfocus(this, iSeqRow) });
  $('#id_sc_field_radicado' + iSeqRow).bind('change', function() { sc_editar_procedimiento_radicado_onchange(this, iSeqRow) });
  $('#id_sc_field_nombre_apellido' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_nombre_apellido_onblur('#id_sc_field_nombre_apellido' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_editar_procedimiento_nombre_apellido_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_editar_procedimiento_nombre_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_documento' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_tipo_documento_onblur('#id_sc_field_tipo_documento' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_editar_procedimiento_tipo_documento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_editar_procedimiento_tipo_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_documento_identidad' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_documento_identidad_onblur('#id_sc_field_documento_identidad' + iSeqRow, iSeqRow) })
                                                 .bind('change', function() { sc_editar_procedimiento_documento_identidad_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_editar_procedimiento_documento_identidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_edad' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_edad_onblur('#id_sc_field_edad' + iSeqRow, iSeqRow) })
                                  .bind('change', function() { sc_editar_procedimiento_edad_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_editar_procedimiento_edad_onfocus(this, iSeqRow) });
  $('#id_sc_field_genero' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_genero_onblur('#id_sc_field_genero' + iSeqRow, iSeqRow) })
                                    .bind('change', function() { sc_editar_procedimiento_genero_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_editar_procedimiento_genero_onfocus(this, iSeqRow) });
  $('#id_sc_field_circunstancias_emergencia' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_circunstancias_emergencia_onblur('#id_sc_field_circunstancias_emergencia' + iSeqRow, iSeqRow) })
                                                       .bind('change', function() { sc_editar_procedimiento_circunstancias_emergencia_onchange(this, iSeqRow) })
                                                       .bind('focus', function() { sc_editar_procedimiento_circunstancias_emergencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_seguridad_social' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_seguridad_social_onblur('#id_sc_field_id_seguridad_social' + iSeqRow, iSeqRow) })
                                                 .bind('change', function() { sc_editar_procedimiento_id_seguridad_social_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_editar_procedimiento_id_seguridad_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_eps' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_eps_onblur('#id_sc_field_id_eps' + iSeqRow, iSeqRow) })
                                    .bind('change', function() { sc_editar_procedimiento_id_eps_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_editar_procedimiento_id_eps_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('change', function() { sc_editar_procedimiento_fecha_onchange(this, iSeqRow) });
  $('#id_sc_field_ip' + iSeqRow).bind('change', function() { sc_editar_procedimiento_ip_onchange(this, iSeqRow) });
  $('#id_sc_field_login' + iSeqRow).bind('change', function() { sc_editar_procedimiento_login_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_ingreso_llamada' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_hora_ingreso_llamada_onblur('#id_sc_field_hora_ingreso_llamada' + iSeqRow, iSeqRow) })
                                                  .bind('change', function() { sc_editar_procedimiento_hora_ingreso_llamada_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_editar_procedimiento_hora_ingreso_llamada_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_notifica_movil' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_hora_notifica_movil_onblur('#id_sc_field_hora_notifica_movil' + iSeqRow, iSeqRow) })
                                                 .bind('change', function() { sc_editar_procedimiento_hora_notifica_movil_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_editar_procedimiento_hora_notifica_movil_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_llegada_sitio' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_hora_llegada_sitio_onblur('#id_sc_field_hora_llegada_sitio' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_editar_procedimiento_hora_llegada_sitio_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_editar_procedimiento_hora_llegada_sitio_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_llegada_ips' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_hora_llegada_ips_onblur('#id_sc_field_hora_llegada_ips' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_editar_procedimiento_hora_llegada_ips_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_editar_procedimiento_hora_llegada_ips_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_salida_ips' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_hora_salida_ips_onblur('#id_sc_field_hora_salida_ips' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_editar_procedimiento_hora_salida_ips_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_editar_procedimiento_hora_salida_ips_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_movil' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_movil_onblur('#id_sc_field_id_movil' + iSeqRow, iSeqRow) })
                                      .bind('change', function() { sc_editar_procedimiento_id_movil_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_editar_procedimiento_id_movil_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ips' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_ips_onblur('#id_sc_field_id_ips' + iSeqRow, iSeqRow) })
                                    .bind('change', function() { sc_editar_procedimiento_id_ips_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_editar_procedimiento_id_ips_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_caso' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_tipo_caso_onblur('#id_sc_field_tipo_caso' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_editar_procedimiento_tipo_caso_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_editar_procedimiento_tipo_caso_onfocus(this, iSeqRow) });
  $('#id_sc_field_operador' + iSeqRow).bind('change', function() { sc_editar_procedimiento_operador_onchange(this, iSeqRow) });
  $('#id_sc_field_id_medico' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_medico_onblur('#id_sc_field_id_medico' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_editar_procedimiento_id_medico_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_editar_procedimiento_id_medico_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipo_evento' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_id_tipo_evento_onblur('#id_sc_field_id_tipo_evento' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_editar_procedimiento_id_tipo_evento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_editar_procedimiento_id_tipo_evento_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('change', function() { sc_editar_procedimiento_observaciones_onchange(this, iSeqRow) });
  $('#id_sc_field_zona' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_zona_onblur('#id_sc_field_zona' + iSeqRow, iSeqRow) })
                                  .bind('change', function() { sc_editar_procedimiento_zona_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_editar_procedimiento_zona_onfocus(this, iSeqRow) });
  $('#id_sc_field_discapacidad' + iSeqRow).bind('blur', function() { sc_editar_procedimiento_discapacidad_onblur('#id_sc_field_discapacidad' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_editar_procedimiento_discapacidad_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_editar_procedimiento_discapacidad_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-genero' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_editar_procedimiento_id_procedimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_secad_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_secad();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_secad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_secad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_consecutivo_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_consecutivo();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_consecutivo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_consecutivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_quien_reporta_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_quien_reporta();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_quien_reporta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_quien_reporta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_direccion_servicio_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_direccion_servicio();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_direccion_servicio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_direccion_servicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_id_barrio_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_barrio();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_barrio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_barrio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_tipo_servicio_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_tipo_servicio();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_tipo_servicio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_tipo_servicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_numero_contacto_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_numero_contacto();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_numero_contacto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_numero_contacto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_radicado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_nombre_apellido_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_nombre_apellido();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_nombre_apellido_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_nombre_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_tipo_documento_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_tipo_documento();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_tipo_documento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_tipo_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_documento_identidad_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_documento_identidad();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_documento_identidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_documento_identidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_edad_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_edad();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_edad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_edad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_genero_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_genero();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_genero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_genero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_circunstancias_emergencia_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_circunstancias_emergencia();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_circunstancias_emergencia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_circunstancias_emergencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_id_seguridad_social_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_seguridad_social();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_seguridad_social_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_seguridad_social_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_id_eps_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_eps();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_eps_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_eps_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_ip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_login_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_hora_ingreso_llamada_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_hora_ingreso_llamada();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_hora_ingreso_llamada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_hora_ingreso_llamada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_hora_notifica_movil_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_hora_notifica_movil();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_hora_notifica_movil_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_hora_notifica_movil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_hora_llegada_sitio_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_hora_llegada_sitio();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_hora_llegada_sitio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_hora_llegada_sitio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_hora_llegada_ips_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_hora_llegada_ips();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_hora_llegada_ips_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_hora_llegada_ips_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_hora_salida_ips_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_hora_salida_ips();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_hora_salida_ips_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_hora_salida_ips_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_id_movil_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_movil();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_movil_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_movil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_id_ips_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_ips();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_ips_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_ips_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_tipo_caso_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_tipo_caso();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_tipo_caso_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_tipo_caso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_operador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_medico_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_medico();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_medico_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_medico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_id_tipo_evento_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_id_tipo_evento();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_id_tipo_evento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_id_tipo_evento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_observaciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_zona_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_zona();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_zona_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_zona_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_editar_procedimiento_discapacidad_onblur(oThis, iSeqRow) {
  do_ajax_editar_procedimiento_validate_discapacidad();
  scCssBlur(oThis);
}

function sc_editar_procedimiento_discapacidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_editar_procedimiento_discapacidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("consecutivo", "", status);
        displayChange_field("secad", "", status);
        displayChange_field("quien_reporta", "", status);
        displayChange_field("discapacidad", "", status);
        displayChange_field("nombre_apellido", "", status);
        displayChange_field("tipo_documento", "", status);
        displayChange_field("documento_identidad", "", status);
        displayChange_field("edad", "", status);
        displayChange_field("numero_contacto", "", status);
        displayChange_field("genero", "", status);
        displayChange_field("id_tipo_evento", "", status);
        displayChange_field("circunstancias_emergencia", "", status);
        displayChange_field("id_eps", "", status);
        displayChange_field("id_seguridad_social", "", status);
        displayChange_field("zona", "", status);
        displayChange_field("tipo_servicio", "", status);
        displayChange_field("id_barrio", "", status);
        displayChange_field("direccion_servicio", "", status);
        displayChange_field("hora_ingreso_llamada", "", status);
        displayChange_field("hora_notifica_movil", "", status);
        displayChange_field("hora_llegada_sitio", "", status);
        displayChange_field("hora_llegada_ips", "", status);
        displayChange_field("hora_salida_ips", "", status);
        displayChange_field("id_movil", "", status);
        displayChange_field("id_ips", "", status);
        displayChange_field("tipo_caso", "", status);
        displayChange_field("id_medico", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_consecutivo(row, status);
        displayChange_field_secad(row, status);
        displayChange_field_quien_reporta(row, status);
        displayChange_field_discapacidad(row, status);
        displayChange_field_nombre_apellido(row, status);
        displayChange_field_tipo_documento(row, status);
        displayChange_field_documento_identidad(row, status);
        displayChange_field_edad(row, status);
        displayChange_field_numero_contacto(row, status);
        displayChange_field_genero(row, status);
        displayChange_field_id_tipo_evento(row, status);
        displayChange_field_circunstancias_emergencia(row, status);
        displayChange_field_id_eps(row, status);
        displayChange_field_id_seguridad_social(row, status);
        displayChange_field_zona(row, status);
        displayChange_field_tipo_servicio(row, status);
        displayChange_field_id_barrio(row, status);
        displayChange_field_direccion_servicio(row, status);
        displayChange_field_hora_ingreso_llamada(row, status);
        displayChange_field_hora_notifica_movil(row, status);
        displayChange_field_hora_llegada_sitio(row, status);
        displayChange_field_hora_llegada_ips(row, status);
        displayChange_field_hora_salida_ips(row, status);
        displayChange_field_id_movil(row, status);
        displayChange_field_id_ips(row, status);
        displayChange_field_tipo_caso(row, status);
        displayChange_field_id_medico(row, status);
}

function displayChange_field(field, row, status) {
        if ("consecutivo" == field) {
                displayChange_field_consecutivo(row, status);
        }
        if ("secad" == field) {
                displayChange_field_secad(row, status);
        }
        if ("quien_reporta" == field) {
                displayChange_field_quien_reporta(row, status);
        }
        if ("discapacidad" == field) {
                displayChange_field_discapacidad(row, status);
        }
        if ("nombre_apellido" == field) {
                displayChange_field_nombre_apellido(row, status);
        }
        if ("tipo_documento" == field) {
                displayChange_field_tipo_documento(row, status);
        }
        if ("documento_identidad" == field) {
                displayChange_field_documento_identidad(row, status);
        }
        if ("edad" == field) {
                displayChange_field_edad(row, status);
        }
        if ("numero_contacto" == field) {
                displayChange_field_numero_contacto(row, status);
        }
        if ("genero" == field) {
                displayChange_field_genero(row, status);
        }
        if ("id_tipo_evento" == field) {
                displayChange_field_id_tipo_evento(row, status);
        }
        if ("circunstancias_emergencia" == field) {
                displayChange_field_circunstancias_emergencia(row, status);
        }
        if ("id_eps" == field) {
                displayChange_field_id_eps(row, status);
        }
        if ("id_seguridad_social" == field) {
                displayChange_field_id_seguridad_social(row, status);
        }
        if ("zona" == field) {
                displayChange_field_zona(row, status);
        }
        if ("tipo_servicio" == field) {
                displayChange_field_tipo_servicio(row, status);
        }
        if ("id_barrio" == field) {
                displayChange_field_id_barrio(row, status);
        }
        if ("direccion_servicio" == field) {
                displayChange_field_direccion_servicio(row, status);
        }
        if ("hora_ingreso_llamada" == field) {
                displayChange_field_hora_ingreso_llamada(row, status);
        }
        if ("hora_notifica_movil" == field) {
                displayChange_field_hora_notifica_movil(row, status);
        }
        if ("hora_llegada_sitio" == field) {
                displayChange_field_hora_llegada_sitio(row, status);
        }
        if ("hora_llegada_ips" == field) {
                displayChange_field_hora_llegada_ips(row, status);
        }
        if ("hora_salida_ips" == field) {
                displayChange_field_hora_salida_ips(row, status);
        }
        if ("id_movil" == field) {
                displayChange_field_id_movil(row, status);
        }
        if ("id_ips" == field) {
                displayChange_field_id_ips(row, status);
        }
        if ("tipo_caso" == field) {
                displayChange_field_tipo_caso(row, status);
        }
        if ("id_medico" == field) {
                displayChange_field_id_medico(row, status);
        }
}

function displayChange_field_consecutivo(row, status) {
    var fieldId;
}

function displayChange_field_secad(row, status) {
    var fieldId;
}

function displayChange_field_quien_reporta(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_quien_reporta__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_quien_reporta" + row).select2("destroy");
                }
                scJQSelect2Add(row, "quien_reporta");
        }
}

function displayChange_field_discapacidad(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_discapacidad__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_discapacidad" + row).select2("destroy");
                }
                scJQSelect2Add(row, "discapacidad");
        }
}

function displayChange_field_nombre_apellido(row, status) {
    var fieldId;
}

function displayChange_field_tipo_documento(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_tipo_documento__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_tipo_documento" + row).select2("destroy");
                }
                scJQSelect2Add(row, "tipo_documento");
        }
}

function displayChange_field_documento_identidad(row, status) {
    var fieldId;
}

function displayChange_field_edad(row, status) {
    var fieldId;
}

function displayChange_field_numero_contacto(row, status) {
    var fieldId;
}

function displayChange_field_genero(row, status) {
    var fieldId;
}

function displayChange_field_id_tipo_evento(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_tipo_evento__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_tipo_evento" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_tipo_evento");
        }
}

function displayChange_field_circunstancias_emergencia(row, status) {
    var fieldId;
}

function displayChange_field_id_eps(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_eps__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_eps" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_eps");
        }
}

function displayChange_field_id_seguridad_social(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_seguridad_social__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_seguridad_social" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_seguridad_social");
        }
}

function displayChange_field_zona(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_zona__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_zona" + row).select2("destroy");
                }
                scJQSelect2Add(row, "zona");
        }
}

function displayChange_field_tipo_servicio(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_tipo_servicio__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_tipo_servicio" + row).select2("destroy");
                }
                scJQSelect2Add(row, "tipo_servicio");
        }
}

function displayChange_field_id_barrio(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_barrio__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_barrio" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_barrio");
        }
}

function displayChange_field_direccion_servicio(row, status) {
    var fieldId;
}

function displayChange_field_hora_ingreso_llamada(row, status) {
    var fieldId;
}

function displayChange_field_hora_notifica_movil(row, status) {
    var fieldId;
}

function displayChange_field_hora_llegada_sitio(row, status) {
    var fieldId;
}

function displayChange_field_hora_llegada_ips(row, status) {
    var fieldId;
}

function displayChange_field_hora_salida_ips(row, status) {
    var fieldId;
}

function displayChange_field_id_movil(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_movil__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_movil" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_movil");
        }
}

function displayChange_field_id_ips(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_ips__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_ips" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_ips");
        }
}

function displayChange_field_tipo_caso(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_tipo_caso__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_tipo_caso" + row).select2("destroy");
                }
                scJQSelect2Add(row, "tipo_caso");
        }
}

function displayChange_field_id_medico(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_id_medico__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                $($(fieldList[i]).attr("id")).select2("destroy");
                        }
                }
                else {
                        $("#id_sc_field_id_medico" + row).select2("destroy");
                }
                scJQSelect2Add(row, "id_medico");
        }
}

function scRecreateSelect2() {
        displayChange_field_quien_reporta("all", "on");
        displayChange_field_discapacidad("all", "on");
        displayChange_field_tipo_documento("all", "on");
        displayChange_field_id_tipo_evento("all", "on");
        displayChange_field_id_eps("all", "on");
        displayChange_field_id_seguridad_social("all", "on");
        displayChange_field_zona("all", "on");
        displayChange_field_tipo_servicio("all", "on");
        displayChange_field_id_barrio("all", "on");
        displayChange_field_id_movil("all", "on");
        displayChange_field_id_ips("all", "on");
        displayChange_field_tipo_caso("all", "on");
        displayChange_field_id_medico("all", "on");
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_editar_procedimiento_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_editar_procedimiento_validate_fecha(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'editar_procedimiento')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "quien_reporta" == specificField) {
    scJQSelect2Add_quien_reporta(seqRow);
  }
  if (null == specificField || "discapacidad" == specificField) {
    scJQSelect2Add_discapacidad(seqRow);
  }
  if (null == specificField || "tipo_documento" == specificField) {
    scJQSelect2Add_tipo_documento(seqRow);
  }
  if (null == specificField || "id_tipo_evento" == specificField) {
    scJQSelect2Add_id_tipo_evento(seqRow);
  }
  if (null == specificField || "id_eps" == specificField) {
    scJQSelect2Add_id_eps(seqRow);
  }
  if (null == specificField || "id_seguridad_social" == specificField) {
    scJQSelect2Add_id_seguridad_social(seqRow);
  }
  if (null == specificField || "zona" == specificField) {
    scJQSelect2Add_zona(seqRow);
  }
  if (null == specificField || "tipo_servicio" == specificField) {
    scJQSelect2Add_tipo_servicio(seqRow);
  }
  if (null == specificField || "id_barrio" == specificField) {
    scJQSelect2Add_id_barrio(seqRow);
  }
  if (null == specificField || "id_movil" == specificField) {
    scJQSelect2Add_id_movil(seqRow);
  }
  if (null == specificField || "id_ips" == specificField) {
    scJQSelect2Add_id_ips(seqRow);
  }
  if (null == specificField || "tipo_caso" == specificField) {
    scJQSelect2Add_tipo_caso(seqRow);
  }
  if (null == specificField || "id_medico" == specificField) {
    scJQSelect2Add_id_medico(seqRow);
  }
  if (null == specificField || "login" == specificField) {
    scJQSelect2Add_login(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_quien_reporta(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_quien_reporta_obj" : "#id_sc_field_quien_reporta" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_quien_reporta_obj',
      dropdownCssClass: 'css_quien_reporta_obj',
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

function scJQSelect2Add_discapacidad(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_discapacidad_obj" : "#id_sc_field_discapacidad" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_discapacidad_obj',
      dropdownCssClass: 'css_discapacidad_obj',
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

function scJQSelect2Add_tipo_documento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_documento_obj" : "#id_sc_field_tipo_documento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_documento_obj',
      dropdownCssClass: 'css_tipo_documento_obj',
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

function scJQSelect2Add_id_tipo_evento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_tipo_evento_obj" : "#id_sc_field_id_tipo_evento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_tipo_evento_obj',
      dropdownCssClass: 'css_id_tipo_evento_obj',
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

function scJQSelect2Add_id_eps(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_eps_obj" : "#id_sc_field_id_eps" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_eps_obj',
      dropdownCssClass: 'css_id_eps_obj',
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

function scJQSelect2Add_id_seguridad_social(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_seguridad_social_obj" : "#id_sc_field_id_seguridad_social" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_seguridad_social_obj',
      dropdownCssClass: 'css_id_seguridad_social_obj',
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

function scJQSelect2Add_zona(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_zona_obj" : "#id_sc_field_zona" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_zona_obj',
      dropdownCssClass: 'css_zona_obj',
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

function scJQSelect2Add_tipo_servicio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_servicio_obj" : "#id_sc_field_tipo_servicio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_servicio_obj',
      dropdownCssClass: 'css_tipo_servicio_obj',
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

function scJQSelect2Add_id_barrio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_barrio_obj" : "#id_sc_field_id_barrio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_barrio_obj',
      dropdownCssClass: 'css_id_barrio_obj',
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

function scJQSelect2Add_id_movil(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_movil_obj" : "#id_sc_field_id_movil" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_movil_obj',
      dropdownCssClass: 'css_id_movil_obj',
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

function scJQSelect2Add_id_ips(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_ips_obj" : "#id_sc_field_id_ips" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_ips_obj',
      dropdownCssClass: 'css_id_ips_obj',
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

function scJQSelect2Add_tipo_caso(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_caso_obj" : "#id_sc_field_tipo_caso" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_caso_obj',
      dropdownCssClass: 'css_tipo_caso_obj',
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

function scJQSelect2Add_id_medico(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_medico_obj" : "#id_sc_field_id_medico" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_medico_obj',
      dropdownCssClass: 'css_id_medico_obj',
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

function scJQSelect2Add_login(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_login_obj" : "#id_sc_field_login" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_login_obj',
      dropdownCssClass: 'css_login_obj',
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
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_quien_reporta) { displayChange_field_quien_reporta(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_discapacidad) { displayChange_field_discapacidad(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_documento) { displayChange_field_tipo_documento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_tipo_evento) { displayChange_field_id_tipo_evento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_eps) { displayChange_field_id_eps(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_seguridad_social) { displayChange_field_id_seguridad_social(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_zona) { displayChange_field_zona(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_servicio) { displayChange_field_tipo_servicio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_barrio) { displayChange_field_id_barrio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_movil) { displayChange_field_id_movil(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_ips) { displayChange_field_id_ips(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_caso) { displayChange_field_tipo_caso(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_medico) { displayChange_field_id_medico(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_login) { displayChange_field_login(iLine, "on"); } }, 150);
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

