
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      //scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay_default(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
        document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
        document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
        if (null == bForce)
        {
            bForce = true;
        }
        if (bForce)
        {
            var $oField = $('#id_sc_field_' + sErrorId);
            if (0 < $oField.length)
            {
                scAjax_removeFieldErrorStyle($oField);
            }
        }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
        document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay_default

  function scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        scAjax_applyFieldErrorStyle($oField);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
  } // scAjaxShowErrorDisplay_default

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage_default()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage_default()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage_default({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: false, toastPos: ""});
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage_default(params) {
        var sTitle = params["title"],
                sMessage = params["message"],
                bModal = params["isModal"],
                iTimeout = params["timeout"],
                bButton = params["showButton"],
                sButton = params["buttonLabel"],
                iTop = params["topPos"],
                iLeft = params["leftPos"],
                iWidth = params["width"],
                iHeight = params["height"],
                sRedir = params["redirUrl"],
                sTarget = params["redirTarget"],
                sParam = params["redirParam"],
                bClose = params["showClose"],
                bBodyIcon = params["showBodyIcon"],
                bToast = params["isToast"],
                sToastPos = params["toastPos"];
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage_default

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "dismiss":
        scAjaxHideMessage();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"] && typeof self.parent.calendar_reload == "function")
    {
<?php
if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && isset($_SESSION['scriptcase']['display_mobile']) && $_SESSION['scriptcase']['display_mobile']) {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
} else {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
}
?>
      return true;
    }
    return false;
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_procedimiento_final" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

        function scAjaxClearErrors() {
                var fieldName;

                for (fieldName in ajax_error_list) {
            if (null != ajax_error_list[fieldName]) {
                ajax_error_list[fieldName]["valid"] = new Array();
                ajax_error_list[fieldName]["onblur"] = new Array();
                ajax_error_list[fieldName]["onchange"] = new Array();
                ajax_error_list[fieldName]["onclick"] = new Array();
                ajax_error_list[fieldName]["onfocus"] = new Array();
            }
                }
        } // scAjaxClearErrors

  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
          if(typeof oResp["varList"][iVarFields] === 'object' && oResp["varList"][iVarFields] !== null)
          {
              var sVarName  = oResp["varList"][iVarFields].index;
              var sVarValue = oResp["varList"][iVarFields].value;
          }
          else
          {
              var sVarName  = oResp["varList"][iVarFields]["index"];
              var sVarValue = oResp["varList"][iVarFields]["value"];
          }

          if (sVarValue == 'new Array()') {
            eval(sVarName + " = new Array();");
          } else {
            eval(sVarName + " = \"" + sVarValue + "\";");
          }
    }
  } // scAjaxSetVariables
/*
  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
      var sVarName  = oResp["varList"][iVarFields]["index"];
      var sVarValue = oResp["varList"][iVarFields]["value"];
              if (sVarValue.indexOf('new Array') > -1) {
                        eval(sVarName + " = sVarValue;");
                  } else {
                        eval(sVarName + " = \"" + sVarValue + "\";");
                  }
        }
  } // scAjaxSetVariables
*/
  function scAjaxSetSummaryLine()
  {
    if (!oResp["navSummary"] || !oResp["navSummary"]["summary_line"])
    {
      return true;
    }
    $("#sc-summary-line").html(oResp["navSummary"]["summary_line"]);
  } // scAjaxSetSummaryLine

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];

      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if ("select2_ac" == sFieldType)
      {
        var bSelect2AC = true;
        sFieldType = "select";
      }
      else
      {
        var bSelect2AC = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/

      if ("corhtml" == sFieldType)
      {
        sFieldType = 'text';

        /*sCor = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
        setaCorPaleta(sFieldName, sCor);*/
      }

      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
                var thisRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
                var thisRow = "";
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }

      if (oResp["fldList"][iSetFields]["docReadonly"])
      {
        var sDocReadonly = oResp["fldList"][iSetFields]["docReadonly"];
      }
      else
      {
        var sDocReadonly = "";
      }

      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if (oResp["eventField"])
      {
        var sEventField = scAjaxSpecCharParser(oResp["eventField"]);
      }
      else
      {
        var sEventField = "__SC_NO_FIELD";
      }
      if (oResp["fldList"][iSetFields]["switch"])
      {
        var bSwitch = true == oResp["fldList"][iSetFields]["switch"];
      }
      else
      {
        var bSwitch = false;
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField);
      }
      else if ("color_palette" == sFieldType)
      {
        scAjaxSetFieldColorPalette(sFieldName, oFieldValues);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      else if ("recur_info" == sFieldType)
      {
        scAjaxSetFieldRecurInfo(sFieldName, sMULHtml);
      }
      else if ("signature" == sFieldType)
      {
        scAjaxSetFieldSignature(sFieldName, oFieldValues);
      }
      else if ("rating" == sFieldType)
      {
        scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow);
      }
      else if ("ratingstar" == sFieldType)
      {
        scAjaxSetFieldRatingStar(sFieldName, oFieldValues, thisRow);
      }
      else if ("ratingsmile" == sFieldType)
      {
        scAjaxSetFieldRatingSmile(sFieldName, oFieldValues, thisRow);
      }
      else if ("ratingthumb" == sFieldType)
      {
        scAjaxSetFieldRatingThumb(sFieldName, oFieldValues, thisRow);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField)
  {
    if (document.F1.elements[sFieldName])
    {
      var jqField = $("#id_sc_field_" + sFieldName),
          Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
      if (jqField.length)
      {
        jqField.val(Temp_text);
        if (sEventField != sFieldName && sEventField != "__SC_NO_FIELD" && sEventField != "")
        {
          //jqField.trigger("change");
        }
      }
      else
      {
        eval("document.F1." + sFieldName + ".value = Temp_text");
      }
      if (scEventControl_data[sFieldName]) {
        scEventControl_data[sFieldName]["calculated"] = Temp_text;
      }
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
        scAjaxSetSliderValue(sFieldName, thisRow);
  } // scAjaxSetFieldText

  function scAjaxSetSliderValue(fieldName, thisRow)
  {
          var sliderObject = $("#sc-ui-slide-" + fieldName);
          if (!sliderObject.length) {
                  return;
          }
          scJQSlideValue(fieldName, thisRow);
  } // scAjaxSetSliderValue

  function scAjaxSetFieldColorPalette(sFieldName, oFieldValues)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
          setaCorPaleta(sFieldName, oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
  } // scAjaxSetFieldColorPalette

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues, "", "", sEventField);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
        scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(thisRow, true);
    }
        if (bSelect2AC)
        {
                var newOption = new Option(oFieldValues[0]["label"], oFieldValues[0]["value"], true, true);
                $("#id_ac_" + sFieldName).append(newOption);
                $("#id_sc_field_" + sFieldName).val(oFieldValues[0]["value"]);
        }
        else if (oFormField.hasClass("select2-hidden-accessible"))
        {
        $("#id_sc_field_" + sFieldName).select2("destroy");
                var select2Field = sFieldName;
                if ("" != thisRow) {
                        select2Field = select2Field.substr(0, select2Field.length - thisRow.toString().length);
                }
        scJQSelect2Add(thisRow, select2Field);
        }
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField)
  {
        if (null == bSwitch)
        {
          bSwitch = false;
        }
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
        scAjaxSetSwitchOptions(sFieldName, "checkbox");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField)
  {
        if (null == bSwitch)
        {
          bSwitch = false;
        }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "", bSwitch);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
        scAjaxSetSwitchOptions(sFieldName, "radio");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetSwitchOptions(fieldName, fieldType)
  {
        var fieldOptions = $(".sc-ui-" + fieldType + "-" + fieldName + ".lc-switch");
        if (!fieldOptions.length) {
                return;
        }
        for (var i = 0; i < fieldOptions.length; i++) {
                if ($(fieldOptions[i]).prop("checked")) {
                        $(fieldOptions[i]).lcs_on();
                }
                else {
                        $(fieldOptions[i]).lcs_off();
                }
        }
  }

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    if ("undefined" == typeof oFieldValues[0]["label"]) {
      sFieldLabel = oFieldValues[0]["value"];
    } else {
      sFieldLabel = oFieldValues[0]["label"];
    }
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink && sDocReadonly == "S")
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
                  if(tinymce.majorVersion > 3)
                {
                        if(strOption == 'mceAddControl')
                        {
                                tinymce.execCommand('mceAddEditor', bolUI, oField);
                        }else
                        if(strOption == 'mceRemoveControl')
                        {
                                tinymce.execCommand('mceRemoveEditor', bolUI, oField);
                        }
                }
                else
                {
                        tinyMCE.execCommand(strOption, bolUI, oField);
                }
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
        if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldRecurInfo(sFieldName, oFieldValues)
  {
          var jsonData = "" != oFieldValues[0]["value"]
                       ? JSON.parse(oFieldValues[0]["value"])
                                   : { repeat: "1", endon: "E", endafter: "", endin: ""};
          $("#id_rinf_repeat_" + sFieldName).val(jsonData.repeat);
          $(".cl_rinf_endon_" + sFieldName).filter(function(index) {return $(this).val() == jsonData.endon}).prop("checked", true),
          $("#id_rinf_endafter_" + sFieldName).val(jsonData.endafter);
          $("#id_rinf_endin_" + sFieldName).val(jsonData.endin);
          scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldRecurInfo

  function scAjaxSetFieldSignature(sFieldName, oFieldValues)
  {
        var fieldValue = scAjaxSpecCharParser(oFieldValues[0]['value']);
        if ("data:image/png;base64," != fieldValue.substr(0, 22) && "data:image/jsignature;base30," != fieldValue.substr(0, 29))
        {
                scJQSignatureClear(sFieldName);
                return;
        }
        $("#id_sc_field_" + sFieldName).val(fieldValue);
        scJQSignatureRedraw(sFieldName);
         scFormHasChanged = false; // mantis 0020638
  } // scAjaxSetFieldSignature

  function scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetFieldRatingStar(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingStarRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetFieldRatingSmile(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingSmileRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetFieldRatingThumb(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingThumbRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      oFormField[iFieldRadio].checked = false;
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name='" + sFieldName + "']");
    if (!$oHidden.length)
    {
      $oHidden = $("input[name='" + sFieldName + "_']");
    }
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if(!$oField.length)
    {
      $oField = $("#id_sc_field_" + sFieldName + "_");
    }
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName + '_'])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName + '_'].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

        if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldSignature(sFieldName)
  {
    var signatureData = $("#sc-id-sign-" + sFieldName).jSignature("getData", "base30");
        $("#id_sc_field_" + sFieldName).val("data:" + signatureData[0] + "," + signatureData[1]);
        return $("#id_sc_field_" + sFieldName).val();
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldRecurInfo(sFieldName)
  {
          var repeatInList = $(".cl_rinf_repeatin_" + sFieldName).filter(":checked"), repeatInValues = [], jsonData, i;
          for (i = 0; i < repeatInList.length; i++) {
                  repeatInValues.push($(repeatInList[i]).val());
          }
          jsonData = {
                  repeat: $("#id_rinf_repeat_" + sFieldName).val(),
                  repeatin: repeatInValues.join(";"),
                  endon: $(".cl_rinf_endon_" + sFieldName).filter(":checked").val(),
                  endafter: $("#id_rinf_endafter_" + sFieldName).val(),
                  endin: $("#id_rinf_endin_" + sFieldName).val()
          };
          return JSON.stringify(jsonData);
  } // scAjaxGetFieldRecurInfo

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    var markChangedClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    if ("checkbox" == sHtmlType)
    {
        markChangedClass = "sc-ui-checkbox-" + sFieldName;
    }
    if ("radio" == sHtmlType)
    {
        markChangedClass = "sc-ui-radio-" + sFieldName;
    }
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        else
        {
            sClass = " class=\"";
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
                if (bSwitch)
                {
                        sDivText += "<div class=\"sc ";
                        if ("Checkbox" == sFieldType)
                        {
                                sDivText += "switch";
                        }
                        else
                        {
                                sDivText += "radio";
                        }
                        sDivText += "\">";
                }
        sDivText += "<input id=\"id-opt-" + sFieldName + "-"  + iRecreate + "\" type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
                if (bSwitch)
                {
                        sDivText += "<span></span>";
                }
        sDivText += "<label for=\"id-opt-" + sFieldName + "-"  + iRecreate + "\">" + sOptText + "</label>";
                if (bSwitch)
                {
                        sDivText += "</div>";
                }
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
    if ("" != markChangedClass)
    {
      $("." + markChangedClass).on("click", function() { scMarkFormAsChanged(); });
    }
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
        if (scMasterDetailParentIframe && "" != scMasterDetailParentIframe)
        {
      var dbParentFrame = $(parent.document).find("[name='" + scMasterDetailParentIframe + "']");
          if (!dbParentFrame || !dbParentFrame[0] || !dbParentFrame[0].contentWindow.scAjaxDetailValue)
          {
                return;
          }
      for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
      {
        dbParentFrame[0].contentWindow.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
      }
        }
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    var vertButton;
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
        var blockDisplay = {};
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
                blockDisplay[ oResp["blockDisplay"][iDisplay][0] ] = oResp["blockDisplay"][iDisplay][1];
      }
          //scCheckPagesWithoutBlock();
    }
        var fieldDisplay = {}, controlHtmlHideField = [], controlHtmlShowField = [];
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        if (typeof scHideUserField === "function" && "off" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlHideField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        if (typeof scShowUserField === "function" && "on" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlShowField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
                        if ("hidden_field_data_" == aFieldIds[iDisplay3].substr(0, 18)) {
                          fieldDisplay[ aFieldIds[iDisplay3].substr(18) ] = oResp["fieldDisplay"][iDisplay][1];
                        }
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        var sBtnName3 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName3 = "gbl_sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
        aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName3)
        {
          aDispData[aDispData.length] = new Array(sBtnName3, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["buttonDisplayVert"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplayVert"].length; iDisplay++)
      {
        vertButton = oResp["buttonDisplayVert"][iDisplay];
        aDispData[aDispData.length] = new Array("sc_exc_line_" + vertButton.seq, vertButton.delete);
        if (vertButton.gridView)
        {
          aDispData[aDispData.length] = new Array("sc_open_line_" + vertButton.seq, vertButton.update);
        }
        else
        {
          aDispData[aDispData.length] = new Array("sc_upd_line_" + vertButton.seq, vertButton.update);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
        for (var blockId in blockDisplay) {
                displayChange_block(blockId, blockDisplay[blockId]);
        }
        for (var fieldId in fieldDisplay) {
                displayChange_field(fieldId, "", fieldDisplay[fieldId]);
        }
        if (controlHtmlHideField.length) {
          for (iDisplay = 0; iDisplay < controlHtmlHideField.length; iDisplay++) {
            scHideUserField(controlHtmlHideField[iDisplay]);
          }
        }
        if (controlHtmlShowField.length) {
          for (iDisplay = 0; iDisplay < controlHtmlShowField.length; iDisplay++) {
            scShowUserField(controlHtmlShowField[iDisplay]);
          }
        }
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {

      if("off" == sAction)
      {
        $('#' + sElement).hide();
      }
      else
      {
        $('#' + sElement).show();
        if (typeof $('#' + sElement).data('elementDisplay') != undefined) {
          $('#' + sElement).css('display', $('#' + sElement).data('elementDisplay'));
        }
      }
      if (document.getElementById(sElement + "_dumb"))
      {
        if("off" == sAction)
        {
          $('#' + sElement + "_dumb").show();
          if (typeof $('#' + sElement).data('elementDisplay') != undefined) {
            $('#' + sElement).css('display', $('#' + sElement).data('elementDisplay'));
          }
        }
        else
        {
          $('#' + sElement + "_dumb").hide();
        }
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField))
    {
      if (document.getElementById("id_label_" + sField).innerHTML != sLabel)
      {
        document.getElementById("id_label_" + sField).innerHTML = sLabel;
      }
    }
    else if (document.getElementById("hidden_field_label_" + sField) && document.getElementById("hidden_field_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("hidden_field_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_sc_dragdrop_" + sField))
    {
      document.getElementById("id_sc_dragdrop_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scCheckPagesWithoutBlock()
  {
        var page_id, block_id, has_block_shown;
    for (page_id in ajax_page_blocks) {
          has_block_shown = false;
      for (block_id in ajax_page_blocks[page_id]) {
                console.log(page_id + ' ' + ajax_page_blocks[page_id][block_id]);
                console.log($("#div_" + ajax_block_id[ajax_page_blocks[page_id][block_id]]).css('display'));
        //$("#div_" + ajax_block_id[block_id]);
      }
    }
  }

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert(callbackOk)
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      scJs_alert(oResp["ajaxAlert"]["message"], callbackOk, oResp["ajaxAlert"]["params"]);
    }
    else
    {
      callbackOk();
    }
  } // scAjaxAlert

        function scJs_alert_default(message, callbackOk) {
                alert(message);
                if (typeof callbackOk == "function") {
                        callbackOk();
                }
        } // scJs_alert_default

        function scJs_confirm_default(message, callbackOk, callbackCancel) {
                if (confirm(message)) {
                        callbackOk();
                }
                else {
                        callbackCancel();
                }
        } // scJs_confirm_default

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "",
          bToast    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast"])        ? ("Y" == oResp["ajaxMessage"]["toast"])      : false,
          sToastPos = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast_pos"])    ? oResp["ajaxMessage"]["toast_pos"]           : "",
          sType     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["type"])         ? oResp["ajaxMessage"]["type"]                : "";
      if (typeof scDisplayUserMessage == "function") {
        scDisplayUserMessage(oResp["ajaxMessage"]["message"]);
      }
      else {
                  var params = {
                          title: sTitle,
                          message: oResp["ajaxMessage"]["message"],
                          isModal: bModal,
                          timeout: iTimeout,
                          showButton: bButton,
                          buttonLabel: sButton,
                          topPos: iTop,
                          leftPos: iLeft,
                          width: iWidth,
                          height: iHeight,
                          redirUrl: sRedir,
                          redirTarget: sTarget,
                          redirParams: sParam,
                          showClose: bClose,
                          showBodyIcon: bBodyIcon,
                          isToast: bToast,
                          toastPos: sToastPos,
                          type: sType
                  };
        _scAjaxShowMessage(params);
      }
    }
  } // scAjaxMessage

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine

  function scOpenMasterDetail(widget, url)
  {
          var iframe = $(parent.document).find("[name='" +  widget+ "']");
          iframe.attr("src", url);
  } // scOpenMasterDetail

  function scMoveMasterDetail(widget)
  {
          var iframe = $(parent.document).find("[name='" +  widget+ "']");
          iframe[0].contentWindow.nm_move("apl_detalhe", true);
  } // scMoveMasterDetail

        function scAjaxError_markList() {
            if ('undefined' == typeof oResp.errList) {
                return;
            }
                var i, fieldName, fieldList = new Array();
                for (i = 0; i < oResp.errList.length; i++) {
                        fieldName = oResp.errList[i]["fldName"];
                        if (oResp.errList[i]["numLinha"]) {
                                fieldName += oResp.errList[i]["numLinha"];
                        }
            fieldList.push(fieldName);
                }
                scAjaxError_markFieldList(fieldList);
        } // scAjaxError_markList

        function scAjaxError_markFieldList(fieldList) {
                var i;
                for (i = 0; i < fieldList.length; i++) {
            scAjaxError_markField(fieldList[i]);
                }
        } // scAjaxError_markFieldList

        function scAjaxError_unmarkList() {
                var i;
                for (i = 0; i < ajax_field_list.length; i++) {
            scAjaxError_unmarkField(ajax_field_list[i]);
                }
        } // scAjaxError_unmarkList

        function scAjaxError_markField(fieldName) {
                var $oField = $("#id_sc_field_" + fieldName);
                if (0 < $oField.length) {
                        scAjax_applyFieldErrorStyle($oField);
                }
        } // scAjaxError_markField

        function scAjaxError_unmarkField(fieldName) {
                var $oField = $("#id_sc_field_" + fieldName);
                if (0 < $oField.length) {
                        scAjax_removeFieldErrorStyle($oField);
                }
        } // scAjaxError_unmarkField

        function scAjax_displayEmptyForm() {
        $("#sc-ui-empty-form").show();
        $(".sc-ui-page-tab-line").hide();
        $("#sc-id-required-row").hide();
        sc_hide_procedimiento_final_form();
        }

  function scAjax_applyFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.addClass(sc_css_status_pwd_text);
        fieldObj.parent().addClass(sc_css_status_pwd_box);
      } else {
        fieldObj.addClass(sc_css_status);
      }
  }

  function scAjax_removeFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.removeClass(sc_css_status_pwd_text);
        fieldObj.parent().removeClass(sc_css_status_pwd_box);
      } else {
        fieldObj.removeClass(sc_css_status);
      }
  }

  function scAjax_formReload() {
<?php
    if ($this->nmgp_opcao == 'novo') {
        echo "      nm_move('reload_novo');";
    } else {
        echo "      nm_move('igual');";
    }
?>
  }

  function scBtnDisabled()
  {
    var btnNameNav, hasNavButton = false;

    if (typeof oResp.btnDisabled != undefined) {
      for (var btnName in oResp.btnDisabled) {
        btnNameNav = btnName.substring(0, 9);

        if ("on" == oResp.btnDisabled[btnName]) {
          $("#" + btnName).addClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "on";
            hasNavButton = true;
          }
        } else {
          $("#" + btnName).removeClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "off";
            hasNavButton = true;
          }
        }
      }
    }

    if (hasNavButton) {
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scBtnLabel()
  {
    if (typeof oResp.btnLabel != undefined) {
      for (var btnName in oResp.btnLabel) {
        $("#" + btnName).find(".btn-label").html(oResp.btnLabel[btnName]);
      }
    }
  }

  var scFormHasChanged = false;

  function scMarkFormAsChanged() {
    scFormHasChanged = true;
  }

  function scResetFormChanges() {
    scFormHasChanged = false;
  }

  var isRunning_scFormClose_F5 = false;
  function scFormClose_F5(exitUrl) {
    if (isRunning_scFormClose_F5) {
      return;
    }
    isRunning_scFormClose_F5 = true;
    setTimeout(function() { isRunning_scFormClose_F5 = false; }, 3000);

    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', function() { document.F5.action = exitUrl; document.F5.submit(); }, function() {});
    } else {
      document.F5.action = exitUrl;
      document.F5.submit();
    }

  }

  var isRunning_scFormClose_F6 = false;
  function scFormClose_F6(exitUrl) {
    if (isRunning_scFormClose_F6) {
      return;
    }
    isRunning_scFormClose_F6 = true;
    setTimeout(function() { isRunning_scFormClose_F6 = false; }, 3000);

    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', function() { document.F6.action = exitUrl; document.F6.submit(); }, function() {});
    } else {
      document.F6.action = exitUrl;
      document.F6.submit();
    }

  }

  // ---------- Validate consecutivo_
  function do_ajax_procedimiento_final_validate_consecutivo_(iNumLinha)
  {
    var nomeCampo_consecutivo_ = "consecutivo_" + iNumLinha;
    var var_consecutivo_ = scAjaxGetFieldHidden(nomeCampo_consecutivo_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_consecutivo_(var_consecutivo_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_consecutivo__cb);
  } // do_ajax_procedimiento_final_validate_consecutivo_

  function do_ajax_procedimiento_final_validate_consecutivo__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "consecutivo_" + iLineNumber;
    }
    else
    {
      sFieldValid = "consecutivo_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "consecutivo_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "consecutivo_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_consecutivo__cb

  // ---------- Validate secad_
  function do_ajax_procedimiento_final_validate_secad_(iNumLinha)
  {
    var nomeCampo_secad_ = "secad_" + iNumLinha;
    var var_secad_ = scAjaxGetFieldText(nomeCampo_secad_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_secad_(var_secad_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_secad__cb);
  } // do_ajax_procedimiento_final_validate_secad_

  function do_ajax_procedimiento_final_validate_secad__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "secad_" + iLineNumber;
    }
    else
    {
      sFieldValid = "secad_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "secad_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "secad_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_secad__cb

  // ---------- Validate quien_reporta_
  function do_ajax_procedimiento_final_validate_quien_reporta_(iNumLinha)
  {
    var nomeCampo_quien_reporta_ = "quien_reporta_" + iNumLinha;
    var var_quien_reporta_ = scAjaxGetFieldSelect(nomeCampo_quien_reporta_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_quien_reporta_(var_quien_reporta_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_quien_reporta__cb);
  } // do_ajax_procedimiento_final_validate_quien_reporta_

  function do_ajax_procedimiento_final_validate_quien_reporta__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "quien_reporta_" + iLineNumber;
    }
    else
    {
      sFieldValid = "quien_reporta_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "quien_reporta_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "quien_reporta_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_quien_reporta__cb

  // ---------- Validate discapacidad_
  function do_ajax_procedimiento_final_validate_discapacidad_(iNumLinha)
  {
    var nomeCampo_discapacidad_ = "discapacidad_" + iNumLinha;
    var var_discapacidad_ = scAjaxGetFieldSelect(nomeCampo_discapacidad_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_discapacidad_(var_discapacidad_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_discapacidad__cb);
  } // do_ajax_procedimiento_final_validate_discapacidad_

  function do_ajax_procedimiento_final_validate_discapacidad__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "discapacidad_" + iLineNumber;
    }
    else
    {
      sFieldValid = "discapacidad_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "discapacidad_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "discapacidad_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_discapacidad__cb

  // ---------- Validate nombre_apellido_
  function do_ajax_procedimiento_final_validate_nombre_apellido_(iNumLinha)
  {
    var nomeCampo_nombre_apellido_ = "nombre_apellido_" + iNumLinha;
    var var_nombre_apellido_ = scAjaxGetFieldText(nomeCampo_nombre_apellido_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_nombre_apellido_(var_nombre_apellido_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_nombre_apellido__cb);
  } // do_ajax_procedimiento_final_validate_nombre_apellido_

  function do_ajax_procedimiento_final_validate_nombre_apellido__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "nombre_apellido_" + iLineNumber;
    }
    else
    {
      sFieldValid = "nombre_apellido_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "nombre_apellido_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "nombre_apellido_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_nombre_apellido__cb

  // ---------- Validate tipo_documento_
  function do_ajax_procedimiento_final_validate_tipo_documento_(iNumLinha)
  {
    var nomeCampo_tipo_documento_ = "tipo_documento_" + iNumLinha;
    var var_tipo_documento_ = scAjaxGetFieldSelect(nomeCampo_tipo_documento_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_tipo_documento_(var_tipo_documento_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_tipo_documento__cb);
  } // do_ajax_procedimiento_final_validate_tipo_documento_

  function do_ajax_procedimiento_final_validate_tipo_documento__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "tipo_documento_" + iLineNumber;
    }
    else
    {
      sFieldValid = "tipo_documento_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "tipo_documento_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "tipo_documento_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_tipo_documento__cb

  // ---------- Validate documento_identidad_
  function do_ajax_procedimiento_final_validate_documento_identidad_(iNumLinha)
  {
    var nomeCampo_documento_identidad_ = "documento_identidad_" + iNumLinha;
    var var_documento_identidad_ = scAjaxGetFieldText(nomeCampo_documento_identidad_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_documento_identidad_(var_documento_identidad_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_documento_identidad__cb);
  } // do_ajax_procedimiento_final_validate_documento_identidad_

  function do_ajax_procedimiento_final_validate_documento_identidad__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "documento_identidad_" + iLineNumber;
    }
    else
    {
      sFieldValid = "documento_identidad_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "documento_identidad_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "documento_identidad_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_documento_identidad__cb

  // ---------- Validate edad_
  function do_ajax_procedimiento_final_validate_edad_(iNumLinha)
  {
    var nomeCampo_edad_ = "edad_" + iNumLinha;
    var var_edad_ = scAjaxGetFieldText(nomeCampo_edad_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_edad_(var_edad_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_edad__cb);
  } // do_ajax_procedimiento_final_validate_edad_

  function do_ajax_procedimiento_final_validate_edad__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "edad_" + iLineNumber;
    }
    else
    {
      sFieldValid = "edad_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "edad_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "edad_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_edad__cb

  // ---------- Validate numero_contacto_
  function do_ajax_procedimiento_final_validate_numero_contacto_(iNumLinha)
  {
    var nomeCampo_numero_contacto_ = "numero_contacto_" + iNumLinha;
    var var_numero_contacto_ = scAjaxGetFieldText(nomeCampo_numero_contacto_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_numero_contacto_(var_numero_contacto_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_numero_contacto__cb);
  } // do_ajax_procedimiento_final_validate_numero_contacto_

  function do_ajax_procedimiento_final_validate_numero_contacto__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "numero_contacto_" + iLineNumber;
    }
    else
    {
      sFieldValid = "numero_contacto_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "numero_contacto_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "numero_contacto_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_numero_contacto__cb

  // ---------- Validate genero_
  function do_ajax_procedimiento_final_validate_genero_(iNumLinha)
  {
    var nomeCampo_genero_ = "genero_" + iNumLinha;
    var var_genero_ = scAjaxGetFieldRadio(nomeCampo_genero_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_genero_(var_genero_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_genero__cb);
  } // do_ajax_procedimiento_final_validate_genero_

  function do_ajax_procedimiento_final_validate_genero__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "genero_" + iLineNumber;
    }
    else
    {
      sFieldValid = "genero_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "genero_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "genero_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_genero__cb

  // ---------- Validate id_tipo_evento_
  function do_ajax_procedimiento_final_validate_id_tipo_evento_(iNumLinha)
  {
    var nomeCampo_id_tipo_evento_ = "id_tipo_evento_" + iNumLinha;
    var var_id_tipo_evento_ = scAjaxGetFieldSelect(nomeCampo_id_tipo_evento_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_tipo_evento_(var_id_tipo_evento_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_tipo_evento__cb);
  } // do_ajax_procedimiento_final_validate_id_tipo_evento_

  function do_ajax_procedimiento_final_validate_id_tipo_evento__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_tipo_evento_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_tipo_evento_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_tipo_evento_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_tipo_evento_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_tipo_evento__cb

  // ---------- Validate circunstancias_emergencia_
  function do_ajax_procedimiento_final_validate_circunstancias_emergencia_(iNumLinha)
  {
    var nomeCampo_circunstancias_emergencia_ = "circunstancias_emergencia_" + iNumLinha;
    var var_circunstancias_emergencia_ = scAjaxGetFieldText(nomeCampo_circunstancias_emergencia_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_circunstancias_emergencia_(var_circunstancias_emergencia_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_circunstancias_emergencia__cb);
  } // do_ajax_procedimiento_final_validate_circunstancias_emergencia_

  function do_ajax_procedimiento_final_validate_circunstancias_emergencia__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "circunstancias_emergencia_" + iLineNumber;
    }
    else
    {
      sFieldValid = "circunstancias_emergencia_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "circunstancias_emergencia_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "circunstancias_emergencia_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_circunstancias_emergencia__cb

  // ---------- Validate id_eps_
  function do_ajax_procedimiento_final_validate_id_eps_(iNumLinha)
  {
    var nomeCampo_id_eps_ = "id_eps_" + iNumLinha;
    var var_id_eps_ = scAjaxGetFieldSelect(nomeCampo_id_eps_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_eps_(var_id_eps_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_eps__cb);
  } // do_ajax_procedimiento_final_validate_id_eps_

  function do_ajax_procedimiento_final_validate_id_eps__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_eps_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_eps_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_eps_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_eps_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_eps__cb

  // ---------- Validate id_seguridad_social_
  function do_ajax_procedimiento_final_validate_id_seguridad_social_(iNumLinha)
  {
    var nomeCampo_id_seguridad_social_ = "id_seguridad_social_" + iNumLinha;
    var var_id_seguridad_social_ = scAjaxGetFieldSelect(nomeCampo_id_seguridad_social_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_seguridad_social_(var_id_seguridad_social_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_seguridad_social__cb);
  } // do_ajax_procedimiento_final_validate_id_seguridad_social_

  function do_ajax_procedimiento_final_validate_id_seguridad_social__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_seguridad_social_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_seguridad_social_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_seguridad_social_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_seguridad_social_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_seguridad_social__cb

  // ---------- Validate zona_
  function do_ajax_procedimiento_final_validate_zona_(iNumLinha)
  {
    var nomeCampo_zona_ = "zona_" + iNumLinha;
    var var_zona_ = scAjaxGetFieldSelect(nomeCampo_zona_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_zona_(var_zona_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_zona__cb);
  } // do_ajax_procedimiento_final_validate_zona_

  function do_ajax_procedimiento_final_validate_zona__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "zona_" + iLineNumber;
    }
    else
    {
      sFieldValid = "zona_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "zona_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "zona_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_zona__cb

  // ---------- Validate tipo_servicio_
  function do_ajax_procedimiento_final_validate_tipo_servicio_(iNumLinha)
  {
    var nomeCampo_tipo_servicio_ = "tipo_servicio_" + iNumLinha;
    var var_tipo_servicio_ = scAjaxGetFieldSelect(nomeCampo_tipo_servicio_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_tipo_servicio_(var_tipo_servicio_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_tipo_servicio__cb);
  } // do_ajax_procedimiento_final_validate_tipo_servicio_

  function do_ajax_procedimiento_final_validate_tipo_servicio__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "tipo_servicio_" + iLineNumber;
    }
    else
    {
      sFieldValid = "tipo_servicio_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "tipo_servicio_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "tipo_servicio_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_tipo_servicio__cb

  // ---------- Validate id_barrio_
  function do_ajax_procedimiento_final_validate_id_barrio_(iNumLinha)
  {
    var nomeCampo_id_barrio_ = "id_barrio_" + iNumLinha;
    var var_id_barrio_ = scAjaxGetFieldSelect(nomeCampo_id_barrio_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_barrio_(var_id_barrio_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_barrio__cb);
  } // do_ajax_procedimiento_final_validate_id_barrio_

  function do_ajax_procedimiento_final_validate_id_barrio__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_barrio_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_barrio_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_barrio_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_barrio_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_barrio__cb

  // ---------- Validate direccion_servicio_
  function do_ajax_procedimiento_final_validate_direccion_servicio_(iNumLinha)
  {
    var nomeCampo_direccion_servicio_ = "direccion_servicio_" + iNumLinha;
    var var_direccion_servicio_ = scAjaxGetFieldText(nomeCampo_direccion_servicio_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_direccion_servicio_(var_direccion_servicio_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_direccion_servicio__cb);
  } // do_ajax_procedimiento_final_validate_direccion_servicio_

  function do_ajax_procedimiento_final_validate_direccion_servicio__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "direccion_servicio_" + iLineNumber;
    }
    else
    {
      sFieldValid = "direccion_servicio_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "direccion_servicio_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "direccion_servicio_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_direccion_servicio__cb

  // ---------- Validate hora_ingreso_llamada_
  function do_ajax_procedimiento_final_validate_hora_ingreso_llamada_(iNumLinha)
  {
    var nomeCampo_hora_ingreso_llamada_ = "hora_ingreso_llamada_" + iNumLinha;
    var var_hora_ingreso_llamada_ = scAjaxGetFieldText(nomeCampo_hora_ingreso_llamada_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_hora_ingreso_llamada_(var_hora_ingreso_llamada_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_hora_ingreso_llamada__cb);
  } // do_ajax_procedimiento_final_validate_hora_ingreso_llamada_

  function do_ajax_procedimiento_final_validate_hora_ingreso_llamada__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "hora_ingreso_llamada_" + iLineNumber;
    }
    else
    {
      sFieldValid = "hora_ingreso_llamada_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "hora_ingreso_llamada_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "hora_ingreso_llamada_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_hora_ingreso_llamada__cb

  // ---------- Validate hora_notifica_movil_
  function do_ajax_procedimiento_final_validate_hora_notifica_movil_(iNumLinha)
  {
    var nomeCampo_hora_notifica_movil_ = "hora_notifica_movil_" + iNumLinha;
    var var_hora_notifica_movil_ = scAjaxGetFieldText(nomeCampo_hora_notifica_movil_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_hora_notifica_movil_(var_hora_notifica_movil_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_hora_notifica_movil__cb);
  } // do_ajax_procedimiento_final_validate_hora_notifica_movil_

  function do_ajax_procedimiento_final_validate_hora_notifica_movil__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "hora_notifica_movil_" + iLineNumber;
    }
    else
    {
      sFieldValid = "hora_notifica_movil_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "hora_notifica_movil_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "hora_notifica_movil_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_hora_notifica_movil__cb

  // ---------- Validate hora_llegada_sitio_
  function do_ajax_procedimiento_final_validate_hora_llegada_sitio_(iNumLinha)
  {
    var nomeCampo_hora_llegada_sitio_ = "hora_llegada_sitio_" + iNumLinha;
    var var_hora_llegada_sitio_ = scAjaxGetFieldText(nomeCampo_hora_llegada_sitio_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_hora_llegada_sitio_(var_hora_llegada_sitio_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_hora_llegada_sitio__cb);
  } // do_ajax_procedimiento_final_validate_hora_llegada_sitio_

  function do_ajax_procedimiento_final_validate_hora_llegada_sitio__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "hora_llegada_sitio_" + iLineNumber;
    }
    else
    {
      sFieldValid = "hora_llegada_sitio_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "hora_llegada_sitio_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "hora_llegada_sitio_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_hora_llegada_sitio__cb

  // ---------- Validate hora_llegada_ips_
  function do_ajax_procedimiento_final_validate_hora_llegada_ips_(iNumLinha)
  {
    var nomeCampo_hora_llegada_ips_ = "hora_llegada_ips_" + iNumLinha;
    var var_hora_llegada_ips_ = scAjaxGetFieldText(nomeCampo_hora_llegada_ips_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_hora_llegada_ips_(var_hora_llegada_ips_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_hora_llegada_ips__cb);
  } // do_ajax_procedimiento_final_validate_hora_llegada_ips_

  function do_ajax_procedimiento_final_validate_hora_llegada_ips__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "hora_llegada_ips_" + iLineNumber;
    }
    else
    {
      sFieldValid = "hora_llegada_ips_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "hora_llegada_ips_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "hora_llegada_ips_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_hora_llegada_ips__cb

  // ---------- Validate hora_salida_ips_
  function do_ajax_procedimiento_final_validate_hora_salida_ips_(iNumLinha)
  {
    var nomeCampo_hora_salida_ips_ = "hora_salida_ips_" + iNumLinha;
    var var_hora_salida_ips_ = scAjaxGetFieldText(nomeCampo_hora_salida_ips_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_hora_salida_ips_(var_hora_salida_ips_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_hora_salida_ips__cb);
  } // do_ajax_procedimiento_final_validate_hora_salida_ips_

  function do_ajax_procedimiento_final_validate_hora_salida_ips__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "hora_salida_ips_" + iLineNumber;
    }
    else
    {
      sFieldValid = "hora_salida_ips_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "hora_salida_ips_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "hora_salida_ips_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_hora_salida_ips__cb

  // ---------- Validate id_movil_
  function do_ajax_procedimiento_final_validate_id_movil_(iNumLinha)
  {
    var nomeCampo_id_movil_ = "id_movil_" + iNumLinha;
    var var_id_movil_ = scAjaxGetFieldSelect(nomeCampo_id_movil_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_movil_(var_id_movil_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_movil__cb);
  } // do_ajax_procedimiento_final_validate_id_movil_

  function do_ajax_procedimiento_final_validate_id_movil__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_movil_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_movil_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_movil_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_movil_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_movil__cb

  // ---------- Validate id_ips_
  function do_ajax_procedimiento_final_validate_id_ips_(iNumLinha)
  {
    var nomeCampo_id_ips_ = "id_ips_" + iNumLinha;
    var var_id_ips_ = scAjaxGetFieldSelect(nomeCampo_id_ips_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_ips_(var_id_ips_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_ips__cb);
  } // do_ajax_procedimiento_final_validate_id_ips_

  function do_ajax_procedimiento_final_validate_id_ips__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_ips_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_ips_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_ips_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_ips_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_ips__cb

  // ---------- Validate tipo_caso_
  function do_ajax_procedimiento_final_validate_tipo_caso_(iNumLinha)
  {
    var nomeCampo_tipo_caso_ = "tipo_caso_" + iNumLinha;
    var var_tipo_caso_ = scAjaxGetFieldSelect(nomeCampo_tipo_caso_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_tipo_caso_(var_tipo_caso_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_tipo_caso__cb);
  } // do_ajax_procedimiento_final_validate_tipo_caso_

  function do_ajax_procedimiento_final_validate_tipo_caso__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "tipo_caso_" + iLineNumber;
    }
    else
    {
      sFieldValid = "tipo_caso_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "tipo_caso_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "tipo_caso_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_tipo_caso__cb

  // ---------- Validate id_medico_
  function do_ajax_procedimiento_final_validate_id_medico_(iNumLinha)
  {
    var nomeCampo_id_medico_ = "id_medico_" + iNumLinha;
    var var_id_medico_ = scAjaxGetFieldSelect(nomeCampo_id_medico_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_validate_id_medico_(var_id_medico_, iNumLinha, var_script_case_init, do_ajax_procedimiento_final_validate_id_medico__cb);
  } // do_ajax_procedimiento_final_validate_id_medico_

  function do_ajax_procedimiento_final_validate_id_medico__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_medico_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_medico_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_medico_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_medico_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_procedimiento_final_validate_id_medico__cb

  // ---------- Event onchange nombre_apellido_
  function do_ajax_procedimiento_final_event_nombre_apellido__onchange(iSeqForm)
  {
    var var_consecutivo_ = scAjaxGetFieldHidden("consecutivo_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_procedimiento_final_event_nombre_apellido__onchange(var_consecutivo_, var_script_case_init, var_nmgp_refresh_row, do_ajax_procedimiento_final_event_nombre_apellido__onchange_cb);
  } // do_ajax_procedimiento_final_event_nombre_apellido__onchange

  function do_ajax_procedimiento_final_event_nombre_apellido__onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "nombre_apellido_" + iLineNumber;
    }
    else
    {
      sFieldValid = "nombre_apellido_";
    }
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "nombre_apellido_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "nombre_apellido_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_procedimiento_final_event_nombre_apellido__onchange_cb_after_alert);
  } // do_ajax_procedimiento_final_event_nombre_apellido__onchange_cb
  function do_ajax_procedimiento_final_event_nombre_apellido__onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_procedimiento_final_event_nombre_apellido__onchange_cb_after_alert

  var sc_num_ult_line = "";
  var sc_insert_open  = false;

  // ---------- add_new_line
  function do_ajax_procedimiento_final_add_new_line(sc_clone, sc_seq_clone)
  {
    if (sc_insert_open)
    {
        if (sc_clone == 'S' && sc_seq_clone != iAjaxNewLine)
        {
          do_ajax_procedimiento_final_cancel_insert(iAjaxNewLine);
        }
        else
        {
          return;
        }
    }
    sc_insert_open = true;
    scDisableNavigation();
    sc_num_ult_line = parseInt(iAjaxNewLine) + 1;
    if (sc_clone == 'S')
    {
      var var_sc_clone     = sc_clone;
      var var_sc_seq_clone = sc_seq_clone;
    }
    else
    {
      var var_sc_clone     = 'N';
      var var_sc_seq_clone = '';
    }
    var var_sc_seq_vert = document.F1.sc_contr_vert.value;
    var var_script_case_init = document.F1.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_procedimiento_final_add_new_line(var_sc_clone, var_sc_seq_clone, var_sc_seq_vert, var_script_case_init, do_ajax_procedimiento_final_add_new_line_cb);
  } // do_ajax_procedimiento_final_add_new_line

  function do_ajax_procedimiento_final_add_new_line_cb(sResp)
  {
    scAjaxProcOff(true);
    if ("{" == sResp.substr(0, 1)) {
        oResp = scAjaxResponse(sResp);
        scAjaxRedir();
    }
    var sv_quot = sResp.replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("new_line_dummy").innerHTML = "<table id=\"new_line_table\">" + sv_quot.replace(/_nm__asp_/g, "&quot;") + "</table>";
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTBodyNew = document.getElementById("new_line_table").tBodies[0];
    var oTRNewLine = oTBodyNew.rows[0];
    oTBodyOld.appendChild(oTRNewLine);
    ajax_create_tables(document.F1.sc_contr_vert.value);
    iAjaxNewLine = document.F1.sc_contr_vert.value;
    document.F1.sc_contr_vert.value++;
    scJQElementsAdd(iAjaxNewLine);
    if (document.getElementById("sc_clone_line_" + iAjaxNewLine))
        document.getElementById("sc_clone_line_" + iAjaxNewLine).style.display = "none";
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:text.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:password.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:checkbox.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:radio.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' select.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' textarea.sc-js-input');
    scFixCol_loadState();
  } // do_ajax_procedimiento_final_add_new_line_cb

  // ---------- backup_line
  function do_ajax_procedimiento_final_backup_line(iNumLinha)
  {
    var var_id_procedimiento_ = scAjaxGetFieldText("id_procedimiento_" + iNumLinha);
    var var_nmgp_refresh_row = iNumLinha;
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_procedimiento_final_backup_line(var_id_procedimiento_, var_nmgp_refresh_row, var_nm_form_submit, var_script_case_init, do_ajax_procedimiento_final_backup_line_cb);
  } // do_ajax_procedimiento_final_backup_line

  function do_ajax_procedimiento_final_backup_line_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
    }
  } // do_ajax_procedimiento_final_backup_line_cb

  function do_ajax_procedimiento_final_cancel_insert(iSeqVert)
  {
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTROldLine = oTBodyOld.rows[oTBodyOld.rows.length - 1];
    oTBodyOld.removeChild(oTROldLine);
    ajax_destroy_tables(iSeqVert);
    scEnableNavigation();
    sc_insert_open = false;
    scAjaxHideErrorDisplay("table");
  } // do_ajax_procedimiento_final_cancel_insert

  function do_ajax_procedimiento_final_cancel_update(iSeqVert)
  {
    do_ajax_procedimiento_final_backup_line(iSeqVert);
    scErrorLineOff(iSeqVert, "__sc_all__");
    scAjaxHideErrorDisplay("table");
<?php
    if ($this->Embutida_ronly)
    {
?>
    mdCloseObjects(iSeqVert);
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeqVert))
      document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
<?php
    }
?>
    if (document.getElementById("sc_open_line_" + iSeqVert))
      document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_upd_line_" + iSeqVert))
      document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
    if (document.getElementById("sc_cancelu_line_" + iSeqVert))
      document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
<?php
    }
?>
  } // do_ajax_procedimiento_final_cancel_update

  function do_ajax_procedimiento_final_restore_buttons()
  {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
?>
    for (iSeqVert = 1; iSeqVert <= <?php echo $this->sc_max_reg; ?>; iSeqVert++)
    {
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
<?php
    }
?>
      if (document.getElementById("sc_ins_line_" + iSeqVert))
        document.getElementById("sc_ins_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_upd_line_" + iSeqVert))
        document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_new_line_" + iSeqVert))
        document.getElementById("sc_new_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_canceli_line_" + iSeqVert))
        document.getElementById("sc_canceli_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_cancelu_line_" + iSeqVert))
        document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
    }
<?php
    }
?>
  } // do_ajax_procedimiento_final_restore_buttons

  // ---------- table_refresh
  function do_ajax_procedimiento_final_table_refresh()
  {
    var var_id_procedimiento_ = document.F2.id_procedimiento_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_procedimiento_final_table_refresh(var_id_procedimiento_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_procedimiento_final_table_refresh_cb);
  } //  do_ajax_procedimiento_final_table_refresh

  function do_ajax_procedimiento_final_table_refresh_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    if (oResp["rsSize"] < <?php echo $this->sc_max_reg; ?>)
    {
       bRefreshTable = true;
    }
    if (oResp["navSummary"] && oResp["navSummary"].reg_tot == 0)
    {
       $("#sc-ui-empty-form").show();
       $(".sc-ui-page-tab-line").hide();
       $("#sc-id-required-row").hide();
    }
    else
    {
       $("#sc-ui-empty-form").hide();
       $(".sc-ui-page-tab-line").show();
       $("#sc-id-required-row").show();
    }
    document.F2.id_procedimiento_.value = scAjaxGetKeyValue("id_procedimiento_");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    if(oResp["tableRefresh"] !== undefined)
    {
        var sv_quot = oResp["tableRefresh"].replace(/&quot;/g, "_nm__asp_");
        sv_quot = scAjaxSpecCharParser(sv_quot);
        document.getElementById("SC_tab_mult_reg").innerHTML = sv_quot.replace(/_nm__asp_/g, "&quot;");
    }
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    document.F1.sc_contr_vert.value = parseInt(oResp["rsSize"]) + 1;
    iAjaxNewLine = oResp["rsSize"];
    scAjaxSetVariables();
    var iAjaxNewLine = <?php echo $this->sc_max_reg + 1; ?>;
    for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
         scJQElementsAdd(iLine);
    }
    scJQGeneralAdd();
    scAjaxSetSummary();
    scAjaxSetNavpage();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
    scAjaxAlert(do_ajax_procedimiento_final_table_refresh_cb_after_alert);
  } // do_ajax_procedimiento_final_table_refresh_cb
  function do_ajax_procedimiento_final_table_refresh_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    sc_insert_open = false;
  } // do_ajax_procedimiento_final_table_refresh_cb_after_alert
function scAjaxShowErrorDisplay(sErrorId, sErrorMsg) {
        if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
                scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg);
        }
        else {
                scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg);
        }
} // scAjaxShowErrorDisplay

function scAjaxHideErrorDisplay(sErrorId, sErrorMsg) {
        if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
                scAjaxHideErrorDisplay_default(sErrorId, sErrorMsg);
        }
        else {
                scAjaxHideErrorDisplay_toast(sErrorId, sErrorMsg);
        }
} // scAjaxHideErrorDisplay

function scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg) {
        params = {type: 'error'};
        scJs_alert_sweetalert(sErrorMsg, function() { scAjaxHideErrorDisplay(sErrorId, sErrorMsg); }, scJs_sweetalert_params(params));
} // scAjaxShowErrorDisplay_toast

function scAjaxHideErrorDisplay_toast(sErrorId, bForce) {
        if (document.getElementById("id_error_display_" + sErrorId + "_frame")) {
                if (null == bForce) {
                        bForce = true;
                }
                if (bForce) {
                        var $oField = $('#id_sc_field_' + sErrorId);
                        if (0 < $oField.length) {
                                $oField.removeClass(sc_css_status);
                        }
                }
        }
} // scAjaxHideErrorDisplay_toast

function scAjaxShowMessage(messageType) {
        scAjaxShowMessage_toast(true, messageType);
} // scAjaxShowMessage_toast

function scAjaxHideMessage() {
} // scAjaxHideMessage_toast

function scAjaxShowMessage_toast(isToast, messageType) {
        if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"]) {
                return;
        }

        if (oResp["msgDisplay"]["toast"] || isToast) {
                _scAjaxShowMessageToast({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, toastPos: "", type: messageType});
        }
        else {
                scJs_alert(oResp["msgDisplay"]["msgText"], scForm_cancel, {});
        }
} // scAjaxShowMessage_toast

function _scAjaxShowMessageToast(params) {
        var sweetAlertParams = {toast: true, showConfirmButton: false};

        if ("" != params["type"]) {
                sweetAlertParams["type"] = params["type"];
        }

        if ("" != params["title"]) {
                sweetAlertParams["title"] = scAjaxSpecCharParser(params["title"]);
        }

        if ("" != params["toastPos"]) {
                sweetAlertParams["position"] = params["toastPos"];
        }

        if (null == sweetAlertParams["position"]) {
                sweetAlertParams["position"] = "top-end";
        }

        if (null == sweetAlertParams["timer"]) {
                sweetAlertParams["timer"] = 3000;
        }

        scJs_alert_sweetalert(scAjaxSpecCharParser(params["message"]), scForm_cancel, scJs_sweetalert_params(sweetAlertParams));
} // _scAjaxShowMessageToast

function _scAjaxShowMessage(params) {
        if (params["isToast"]) {
                _scAjaxShowMessageToast(params);
        }
        else {
                if ("" != params["redirUrl"] && "" != params["redirTarget"]) {
            document.form_ajax_redir_2.action = params["redirUrl"];
            document.form_ajax_redir_2.target = params["redirTarget"];
            document.form_ajax_redir_2.nmgp_parms.value = params["redirParams"];
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
                        callbackOk = function() { document.form_ajax_redir_2.submit(); };
                }
                else if ("" != params["redirUrl"] && "" == params["redirTarget"]) {
            document.form_ajax_redir_1.action = params["redirUrl"];
            document.form_ajax_redir_1.nmgp_parms.value = params["redirParams"];
                        callbackOk = function() { document.form_ajax_redir_1.submit(); };
                }
                else {
                        callbackOk = scForm_cancel;
                }

                var alertParams = {title: params["title"]};
                if (0 < params["width"]) {
                        alertParams["width"] = params["width"];
                }
                if (0 < params["timeout"]) {
                        alertParams["timer"] = params["timeout"] * 1000;
                }
                if (!params["showButton"]) {
                        alertParams["showConfirmButton"] = false;
                }
                if ("" != params["buttonLabel"]) {
                        alertParams["confirmButtonText"] = params["buttonLabel"];
                }
                if ("" != params["type"]) {
                        alertParams["type"] = params["type"];
                }

                scJs_alert_sweetalert(params["message"], callbackOk, scJs_sweetalert_params(alertParams));
        }
} // _scAjaxShowMessage

<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
        $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
        $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
        $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
        $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
        $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
        $cancelButtonFAPos = 'text_right';
}
?>
function scJs_alert(message, callbackOk, params) {
    message = message.replace(/<!--SC_NL-->/gi, "<br />");
        scJs_alert_sweetalert(message, callbackOk, scJs_sweetalert_params(params));
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
        scJs_confirm_sweetalert(message, callbackOk, callbackCancel);
} // scJs_confirm

function scJs_alert_sweetalert(message, callbackOk, params) {
        var sweetAlertConfig;

        if (null == params) {
                params = {};
        }

        params['html'] = message;

        sweetAlertConfig = params;

        Swal.fire(sweetAlertConfig).then(function (result) {
                if (result.value) {
                        if (typeof callbackOk == "function") {
                                callbackOk();
                        }
                }
                else if (result.dismiss == Swal.DismissReason.timer || result.dismiss == Swal.DismissReason.close) {
                        Swal.close();
            $(".swal2-container.swal2-shown").remove();
                }
        else {
            console.log(result.dismiss);
        }
        });
} // scJs_alert_sweetalert

function scJs_confirm_sweetalert(message, callbackOk, callbackCancel) {
        var sweetAlertConfig, params = {};

        params['html'] = message;
        params['type'] = 'question';
        params['showCancelButton'] = true;

        sweetAlertConfig = scJs_sweetalert_params(params);

        Swal.fire(sweetAlertConfig).then(function (result) {
                if (result.value) {
                        callbackOk();
                }
                else if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.cancel || result.dismiss === Swal.DismissReason.esc) {
                        callbackCancel();
                }
        });
} // scJs_confirm_sweetalert

function scJs_sweetalert_params(params) {
        var parName, confirmText, confirmFA, confirmPos, cancelText, cancelFA, cancelPos, sweetAlertConfig;

        sweetAlertConfig = {
                customClass: {
                        popup: 'scSweetAlertPopup',
                        header: 'scSweetAlertHeader',
                        content: 'scSweetAlertMessage',
                        confirmButton: '<?php echo $confirmButtonClass; ?>',
                        cancelButton: '<?php echo $cancelButtonClass; ?>'
                }
        };

        confirmText = '<?php echo isset($this->arr_buttons['bsweetalert_ok']['value']) ? $this->arr_buttons['bsweetalert_ok']['value'] : $this->Ini->Nm_lang['lang_btns_cfrm'] ?>';
        confirmFA = '<?php echo $confirmButtonFA ?>';
        confirmPos = '<?php echo $confirmButtonFAPos ?>';
        cancelText = '<?php echo isset($this->arr_buttons['bsweetalert_cancel']['value']) ? $this->arr_buttons['bsweetalert_cancel']['value'] : $this->Ini->Nm_lang['lang_btns_cncl'] ?>';
        cancelFA = '<?php echo $cancelButtonFA ?>';
        cancelPos = '<?php echo $cancelButtonFAPos ?>';

        for (parName in params) {
                if ('confirmButtonText' == parName) {
                        confirmText = params[parName];
                }
                else if ('confirmButtonFA' == parName) {
                        confirmFA = params[parName];
                }
                else if ('confirmButtonFAPos' == parName) {
                        confirmPos = params[parName];
                }
                else if ('cancelButtonText' == parName) {
                        cancelText = params[parName];
                }
                else if ('cancelButtonFA' == parName) {
                        cancelFA = params[parName];
                }
                else if ('cancelButtonFAPos' == parName) {
                        cancelPos = params[parName];
                }
                else {
                        sweetAlertConfig[parName] = params[parName];
                }
        }

        if ('' != confirmFA) {
                if ('text_right' == confirmPos) {
                        confirmText = '<i class="fas ' + confirmFA + '"></i> ' + confirmText;
                }
                else {
                        confirmText += ' <i class="fas ' + confirmFA + '"></i>';
                }
        }
        if ('' != cancelFA) {
                if ('text_right' == cancelPos) {
                        cancelText = '<i class="fas ' + cancelFA + '"></i> ' + cancelText;
                }
                else {
                        cancelText += ' <i class="fas ' + cancelFA + '"></i>';
                }
        }

        sweetAlertConfig['confirmButtonText'] = confirmText;
        sweetAlertConfig['cancelButtonText'] = cancelText;

        if (sweetAlertConfig['toast']) {
                sweetAlertConfig['showConfirmButton'] = false;
                sweetAlertConfig['showCancelButton'] = false;
                sweetAlertConfig['customClass']['popup'] = 'scToastPopup';
                sweetAlertConfig['customClass']['header'] = 'scToastHeader';
                sweetAlertConfig['customClass']['content'] = 'scToastMessage';
                if (null == sweetAlertConfig['timer']) {
                        sweetAlertConfig['timer'] = 3000;
                }
                if (null == sweetAlertConfig["position"]) {
                        sweetAlertConfig["position"] = "top-end";
                }
        }

        return sweetAlertConfig;
} // scJs_sweetalert_params


  // ---------- Form
  var sc_num_ult_line = "";
  var sc_num_ult_opc  = "";
  var sc_num_ult_tr   = "";
  function do_ajax_procedimiento_final_submit_form(iNumLinha, indexTR)
  {
    if (scEventControl_active(iNumLinha)) {
      setTimeout(function() { do_ajax_procedimiento_final_submit_form(iNumLinha, indexTR); }, 500);
      return;
    }
    sc_num_ult_line = iNumLinha;
    sc_num_ult_tr   = indexTR;
    scAjaxHideMessage();
    var var_consecutivo_ = scAjaxGetFieldHidden("consecutivo_" + iNumLinha);
    var var_secad_ = scAjaxGetFieldText("secad_" + iNumLinha);
    var var_quien_reporta_ = scAjaxGetFieldSelect("quien_reporta_" + iNumLinha);
    var var_discapacidad_ = scAjaxGetFieldSelect("discapacidad_" + iNumLinha);
    var var_nombre_apellido_ = scAjaxGetFieldText("nombre_apellido_" + iNumLinha);
    var var_tipo_documento_ = scAjaxGetFieldSelect("tipo_documento_" + iNumLinha);
    var var_documento_identidad_ = scAjaxGetFieldText("documento_identidad_" + iNumLinha);
    var var_edad_ = scAjaxGetFieldText("edad_" + iNumLinha);
    var var_numero_contacto_ = scAjaxGetFieldText("numero_contacto_" + iNumLinha);
    var var_genero_ = scAjaxGetFieldRadio("genero_" + iNumLinha);
    var var_id_tipo_evento_ = scAjaxGetFieldSelect("id_tipo_evento_" + iNumLinha);
    var var_circunstancias_emergencia_ = scAjaxGetFieldText("circunstancias_emergencia_" + iNumLinha);
    var var_id_eps_ = scAjaxGetFieldSelect("id_eps_" + iNumLinha);
    var var_id_seguridad_social_ = scAjaxGetFieldSelect("id_seguridad_social_" + iNumLinha);
    var var_zona_ = scAjaxGetFieldSelect("zona_" + iNumLinha);
    var var_tipo_servicio_ = scAjaxGetFieldSelect("tipo_servicio_" + iNumLinha);
    var var_id_barrio_ = scAjaxGetFieldSelect("id_barrio_" + iNumLinha);
    var var_direccion_servicio_ = scAjaxGetFieldText("direccion_servicio_" + iNumLinha);
    var var_hora_ingreso_llamada_ = scAjaxGetFieldText("hora_ingreso_llamada_" + iNumLinha);
    var var_hora_notifica_movil_ = scAjaxGetFieldText("hora_notifica_movil_" + iNumLinha);
    var var_hora_llegada_sitio_ = scAjaxGetFieldText("hora_llegada_sitio_" + iNumLinha);
    var var_hora_llegada_ips_ = scAjaxGetFieldText("hora_llegada_ips_" + iNumLinha);
    var var_hora_salida_ips_ = scAjaxGetFieldText("hora_salida_ips_" + iNumLinha);
    var var_id_movil_ = scAjaxGetFieldSelect("id_movil_" + iNumLinha);
    var var_id_ips_ = scAjaxGetFieldSelect("id_ips_" + iNumLinha);
    var var_tipo_caso_ = scAjaxGetFieldSelect("tipo_caso_" + iNumLinha);
    var var_id_medico_ = scAjaxGetFieldSelect("id_medico_" + iNumLinha);
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = "Sc_num_lin_alt?#?" + iNumLinha + "?@?" +  document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    var var_nmgp_refresh_row = iNumLinha;
<?php
    }
    else
    {
?>
    var var_nmgp_refresh_row = "";
<?php
    }
?>
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    sc_num_ult_opc = var_nmgp_opcao;
    scAjaxProcOn();
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    scRemoveErrors();
<?php
    }
?>
    x_ajax_procedimiento_final_submit_form(var_consecutivo_, var_secad_, var_quien_reporta_, var_discapacidad_, var_nombre_apellido_, var_tipo_documento_, var_documento_identidad_, var_edad_, var_numero_contacto_, var_genero_, var_id_tipo_evento_, var_circunstancias_emergencia_, var_id_eps_, var_id_seguridad_social_, var_zona_, var_tipo_servicio_, var_id_barrio_, var_direccion_servicio_, var_hora_ingreso_llamada_, var_hora_notifica_movil_, var_hora_llegada_sitio_, var_hora_llegada_ips_, var_hora_salida_ips_, var_id_movil_, var_id_ips_, var_tipo_caso_, var_id_medico_, var_nmgp_refresh_row, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_procedimiento_final_submit_form_cb);
  } // do_ajax_procedimiento_final_submit_form

  function do_ajax_procedimiento_final_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxCalendarReload();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
      scErrorLineOff(sc_num_ult_line, "__sc_all__");
    }
    else
    {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
      scErrorLineOn(sc_num_ult_line, "__sc_all__");
    }
    if (!scAjaxHasError())
    {
      if (sc_num_ult_opc == 'incluir')
      {
         bRefreshTable = true;
         if (document.getElementById("sc_ins_line_" + sc_num_ult_line))
           document.getElementById("sc_ins_line_" + sc_num_ult_line).style.display = "none";
         if (document.getElementById("sc_upd_line_" + sc_num_ult_line))
           document.getElementById("sc_upd_line_" + sc_num_ult_line).style.display = "";
         if (document.getElementById("sc_clone_line_" + sc_num_ult_line))
           document.getElementById("sc_clone_line_" + sc_num_ult_line).style.display = "";
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
    }
?>
         if (document.getElementById("sc_new_line_" + sc_num_ult_line))
           document.getElementById("sc_new_line_" + sc_num_ult_line).style.display = "none";
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
         if (document.getElementById("sc_canceli_line_" + sc_num_ult_line))
           document.getElementById("sc_canceli_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
         sc_insert_open = false;
         scEnableNavigation();
         do_ajax_procedimiento_final_add_new_line();
         $("#sc-ui-empty-form").hide();
         $(".sc-ui-page-tab-line").show();
         $("#sc-id-required-row").show();
      }
      if (sc_num_ult_opc == 'alterar')
      {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
       if ($this->nmgp_botoes['delete'] == 'on')
       {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
       }
?>
         if (document.getElementById("sc_cancelu_line_" + sc_num_ult_line))
           document.getElementById("sc_cancelu_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
      }
      if (sc_num_ult_opc == 'excluir')
      {
         bRefreshTable = true;
         sc_name_table = document.getElementById("hidden_bloco_0");
         sc_name_table.deleteRow(sc_num_ult_tr);
         sc_num_ult_line = sc_name_table.rows.length - 1;
         if (0 == sc_num_ult_line || (1 == sc_num_ult_line && sc_insert_open))
         {
            $("#sc-ui-empty-form").show();
            $(".sc-ui-page-tab-line").hide();
            $("#sc-id-required-row").hide();
         }
      }
      scResetFormChanges();
      scAjaxShowMessage("success");
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("consecutivo_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("secad_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("quien_reporta_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("discapacidad_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("nombre_apellido_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("tipo_documento_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("documento_identidad_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("edad_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("numero_contacto_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("genero_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_tipo_evento_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("circunstancias_emergencia_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_eps_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_seguridad_social_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("zona_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("tipo_servicio_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_barrio_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("direccion_servicio_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("hora_ingreso_llamada_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("hora_notifica_movil_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("hora_llegada_sitio_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("hora_llegada_ips_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("hora_salida_ips_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_movil_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_ips_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("tipo_caso_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("id_medico_" + sc_num_ult_line);
<?php
if (isset($this->Embutida_form) && $this->Embutida_form) {
?>
      scAjaxSetReadonly();
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly) {
?>
      mdCloseLine();
<?php
    }
} else {
?>
      scAjaxSetReadonly(true);
<?php
}
?>
      scLigEditLookupCall();
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      if (sc_closeChange && self.parent && self.parent.tb_remove)
      {
        self.parent.tb_remove();
      }
      scAjaxSetFields(false);
      scAjaxSetVariables();
      if (sc_num_ult_opc == 'alterar' || sc_num_ult_opc == 'incluir')
      {
<?php
        if (isset($this->Embutida_form) && $this->Embutida_form)
        {
?>
<?php
        }
?>
      }
    }
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel(true);
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_procedimiento_final_submit_form_cb_after_alert);
  } // do_ajax_procedimiento_final_submit_form_cb
  function do_ajax_procedimiento_final_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_procedimiento_final_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_procedimiento_final_navigate_form()
  {
    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', perform_ajax_procedimiento_final_navigate_form, function() {});
    } else {
      perform_ajax_procedimiento_final_navigate_form();
    }
  }

  function perform_ajax_procedimiento_final_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    nm_uncheck_delete();
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    for (iNavForm = 1; iNavForm < <?php echo $this->sc_max_reg; ?> + 1; iNavForm++)
    {
      scAjaxHideErrorDisplay("consecutivo_" + iNavForm);
      scAjaxHideErrorDisplay("secad_" + iNavForm);
      scAjaxHideErrorDisplay("quien_reporta_" + iNavForm);
      scAjaxHideErrorDisplay("discapacidad_" + iNavForm);
      scAjaxHideErrorDisplay("nombre_apellido_" + iNavForm);
      scAjaxHideErrorDisplay("tipo_documento_" + iNavForm);
      scAjaxHideErrorDisplay("documento_identidad_" + iNavForm);
      scAjaxHideErrorDisplay("edad_" + iNavForm);
      scAjaxHideErrorDisplay("numero_contacto_" + iNavForm);
      scAjaxHideErrorDisplay("genero_" + iNavForm);
      scAjaxHideErrorDisplay("id_tipo_evento_" + iNavForm);
      scAjaxHideErrorDisplay("circunstancias_emergencia_" + iNavForm);
      scAjaxHideErrorDisplay("id_eps_" + iNavForm);
      scAjaxHideErrorDisplay("id_seguridad_social_" + iNavForm);
      scAjaxHideErrorDisplay("zona_" + iNavForm);
      scAjaxHideErrorDisplay("tipo_servicio_" + iNavForm);
      scAjaxHideErrorDisplay("id_barrio_" + iNavForm);
      scAjaxHideErrorDisplay("direccion_servicio_" + iNavForm);
      scAjaxHideErrorDisplay("hora_ingreso_llamada_" + iNavForm);
      scAjaxHideErrorDisplay("hora_notifica_movil_" + iNavForm);
      scAjaxHideErrorDisplay("hora_llegada_sitio_" + iNavForm);
      scAjaxHideErrorDisplay("hora_llegada_ips_" + iNavForm);
      scAjaxHideErrorDisplay("hora_salida_ips_" + iNavForm);
      scAjaxHideErrorDisplay("id_movil_" + iNavForm);
      scAjaxHideErrorDisplay("id_ips_" + iNavForm);
      scAjaxHideErrorDisplay("tipo_caso_" + iNavForm);
      scAjaxHideErrorDisplay("id_medico_" + iNavForm);
    }
    var var_id_procedimiento_ = document.F2.id_procedimiento_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_procedimiento_final_navigate_form(var_id_procedimiento_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_procedimiento_final_navigate_form_cb);
  } // do_ajax_procedimiento_final_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_procedimiento_final_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    var var_last_index = oResp["rsSize"];
    scAjaxClearErrors()
    scResetFormChanges()
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    scAjaxSetSummaryLine();
    document.F2.id_procedimiento_.value = scAjaxGetKeyValue("id_procedimiento_" + var_last_index);
    var_last_index = parseInt(var_last_index) + 1;
    for (iNavigateForm = 1; iNavigateForm < var_last_index; iNavigateForm++)
    {
      if (document.getElementById("idVertRow" + iNavigateForm))
      {
        document.getElementById("idVertRow" + iNavigateForm).style.display = "";
      }
    }
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    for (iNavigatedel = <?php echo $this->sc_max_reg; ?>; iNavigatedel >= iNavigateForm; iNavigatedel--)
    {
        oTBodyOld.deleteRow(iNavigatedel);
        bRefreshTable = true;
    }
    document.F1.sc_contr_vert.value = var_last_index;
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    for (var iImg = 0; iImg < var_last_index; iImg++)
    {
    }
    scAjaxSetBtnVars();
    scErrorLineReset();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_procedimiento_final_navigate_form_cb_after_alert);
  } // do_ajax_procedimiento_final_navigate_form_cb
  function do_ajax_procedimiento_final_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_procedimiento_final_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_procedimiento_final_navigate_form_cb_after_alert

    function sc_procedimiento_final_get_last_line_number()
    {
        var lastLine = $(".sc-row").last();
        if (lastLine.length) {
            return lastLine.data("scRowNumber");
        } else {
            return sc_num_ult_line;
        }
    } //sc_procedimiento_final_get_last_line_number

  function sc_hide_procedimiento_final_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_procedimiento_final_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc

<?php
$sLineInfo = $this->Embutida_form ? '' : ' (linha " + iNumLinha + ")';
?>
  function ajax_create_tables(iNumLinha)
  {
    ajax_field_list[iTotCampos] = "consecutivo_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "secad_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "quien_reporta_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "discapacidad_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "nombre_apellido_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "tipo_documento_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "documento_identidad_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "edad_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "numero_contacto_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "genero_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_tipo_evento_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "circunstancias_emergencia_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_eps_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_seguridad_social_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "zona_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "tipo_servicio_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_barrio_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "direccion_servicio_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "hora_ingreso_llamada_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "hora_notifica_movil_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "hora_llegada_sitio_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "hora_llegada_ips_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "hora_salida_ips_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_movil_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_ips_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "tipo_caso_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "id_medico_" + iNumLinha;
    iTotCampos++;
    ajax_error_list["consecutivo_" + iNumLinha] = {"label": "Radicado Cruemt<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["secad_" + iNumLinha] = {"label": "Secad<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["quien_reporta_" + iNumLinha] = {"label": "Quien Reporta<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["discapacidad_" + iNumLinha] = {"label": "Discapacidad<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["nombre_apellido_" + iNumLinha] = {"label": "Nombre Apellido<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["tipo_documento_" + iNumLinha] = {"label": "Tipo Documento<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["documento_identidad_" + iNumLinha] = {"label": "Documento Identidad<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["edad_" + iNumLinha] = {"label": "Edad<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["numero_contacto_" + iNumLinha] = {"label": "Numero Contacto<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["genero_" + iNumLinha] = {"label": "Genero<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_tipo_evento_" + iNumLinha] = {"label": "Tipo Evento<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["circunstancias_emergencia_" + iNumLinha] = {"label": "Circunstancias Emergencia<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_eps_" + iNumLinha] = {"label": "Eps<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_seguridad_social_" + iNumLinha] = {"label": "Seguridad Social<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["zona_" + iNumLinha] = {"label": "Zona<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["tipo_servicio_" + iNumLinha] = {"label": "Tipo Servicio<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_barrio_" + iNumLinha] = {"label": "Barrio<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["direccion_servicio_" + iNumLinha] = {"label": "Dirección Servicio<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["hora_ingreso_llamada_" + iNumLinha] = {"label": "Hora Ingreso Llamada<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["hora_notifica_movil_" + iNumLinha] = {"label": "Hora Notifica Movil<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["hora_llegada_sitio_" + iNumLinha] = {"label": "Hora Llegada Sitio<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["hora_llegada_ips_" + iNumLinha] = {"label": "Hora Llegada Ips<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["hora_salida_ips_" + iNumLinha] = {"label": "Hora Salida Ips<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_movil_" + iNumLinha] = {"label": "Móvil que atiende<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_ips_" + iNumLinha] = {"label": "Direccionamiento<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["tipo_caso_" + iNumLinha] = {"label": "Tipo Caso<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_error_list["id_medico_" + iNumLinha] = {"label": "Id Medico<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0};
    ajax_field_mult["consecutivo_"][iNumLinha] = "consecutivo_" + iNumLinha;
    ajax_field_mult["secad_"][iNumLinha] = "secad_" + iNumLinha;
    ajax_field_mult["quien_reporta_"][iNumLinha] = "quien_reporta_" + iNumLinha;
    ajax_field_mult["discapacidad_"][iNumLinha] = "discapacidad_" + iNumLinha;
    ajax_field_mult["nombre_apellido_"][iNumLinha] = "nombre_apellido_" + iNumLinha;
    ajax_field_mult["tipo_documento_"][iNumLinha] = "tipo_documento_" + iNumLinha;
    ajax_field_mult["documento_identidad_"][iNumLinha] = "documento_identidad_" + iNumLinha;
    ajax_field_mult["edad_"][iNumLinha] = "edad_" + iNumLinha;
    ajax_field_mult["numero_contacto_"][iNumLinha] = "numero_contacto_" + iNumLinha;
    ajax_field_mult["genero_"][iNumLinha] = "genero_" + iNumLinha;
    ajax_field_mult["id_tipo_evento_"][iNumLinha] = "id_tipo_evento_" + iNumLinha;
    ajax_field_mult["circunstancias_emergencia_"][iNumLinha] = "circunstancias_emergencia_" + iNumLinha;
    ajax_field_mult["id_eps_"][iNumLinha] = "id_eps_" + iNumLinha;
    ajax_field_mult["id_seguridad_social_"][iNumLinha] = "id_seguridad_social_" + iNumLinha;
    ajax_field_mult["zona_"][iNumLinha] = "zona_" + iNumLinha;
    ajax_field_mult["tipo_servicio_"][iNumLinha] = "tipo_servicio_" + iNumLinha;
    ajax_field_mult["id_barrio_"][iNumLinha] = "id_barrio_" + iNumLinha;
    ajax_field_mult["direccion_servicio_"][iNumLinha] = "direccion_servicio_" + iNumLinha;
    ajax_field_mult["hora_ingreso_llamada_"][iNumLinha] = "hora_ingreso_llamada_" + iNumLinha;
    ajax_field_mult["hora_notifica_movil_"][iNumLinha] = "hora_notifica_movil_" + iNumLinha;
    ajax_field_mult["hora_llegada_sitio_"][iNumLinha] = "hora_llegada_sitio_" + iNumLinha;
    ajax_field_mult["hora_llegada_ips_"][iNumLinha] = "hora_llegada_ips_" + iNumLinha;
    ajax_field_mult["hora_salida_ips_"][iNumLinha] = "hora_salida_ips_" + iNumLinha;
    ajax_field_mult["id_movil_"][iNumLinha] = "id_movil_" + iNumLinha;
    ajax_field_mult["id_ips_"][iNumLinha] = "id_ips_" + iNumLinha;
    ajax_field_mult["tipo_caso_"][iNumLinha] = "tipo_caso_" + iNumLinha;
    ajax_field_mult["id_medico_"][iNumLinha] = "id_medico_" + iNumLinha;
    ajax_field_id["consecutivo_" + iNumLinha] = new Array("hidden_field_label_consecutivo_", "hidden_field_data_consecutivo_" + iNumLinha);
    ajax_field_id["secad_" + iNumLinha] = new Array("hidden_field_label_secad_", "hidden_field_data_secad_" + iNumLinha);
    ajax_field_id["quien_reporta_" + iNumLinha] = new Array("hidden_field_label_quien_reporta_", "hidden_field_data_quien_reporta_" + iNumLinha);
    ajax_field_id["discapacidad_" + iNumLinha] = new Array("hidden_field_label_discapacidad_", "hidden_field_data_discapacidad_" + iNumLinha);
    ajax_field_id["nombre_apellido_" + iNumLinha] = new Array("hidden_field_label_nombre_apellido_", "hidden_field_data_nombre_apellido_" + iNumLinha);
    ajax_field_id["tipo_documento_" + iNumLinha] = new Array("hidden_field_label_tipo_documento_", "hidden_field_data_tipo_documento_" + iNumLinha);
    ajax_field_id["documento_identidad_" + iNumLinha] = new Array("hidden_field_label_documento_identidad_", "hidden_field_data_documento_identidad_" + iNumLinha);
    ajax_field_id["edad_" + iNumLinha] = new Array("hidden_field_label_edad_", "hidden_field_data_edad_" + iNumLinha);
    ajax_field_id["numero_contacto_" + iNumLinha] = new Array("hidden_field_label_numero_contacto_", "hidden_field_data_numero_contacto_" + iNumLinha);
    ajax_field_id["genero_" + iNumLinha] = new Array("hidden_field_label_genero_", "hidden_field_data_genero_" + iNumLinha);
    ajax_field_id["id_tipo_evento_" + iNumLinha] = new Array("hidden_field_label_id_tipo_evento_", "hidden_field_data_id_tipo_evento_" + iNumLinha);
    ajax_field_id["circunstancias_emergencia_" + iNumLinha] = new Array("hidden_field_label_circunstancias_emergencia_", "hidden_field_data_circunstancias_emergencia_" + iNumLinha);
    ajax_field_id["id_eps_" + iNumLinha] = new Array("hidden_field_label_id_eps_", "hidden_field_data_id_eps_" + iNumLinha);
    ajax_field_id["id_seguridad_social_" + iNumLinha] = new Array("hidden_field_label_id_seguridad_social_", "hidden_field_data_id_seguridad_social_" + iNumLinha);
    ajax_field_id["zona_" + iNumLinha] = new Array("hidden_field_label_zona_", "hidden_field_data_zona_" + iNumLinha);
    ajax_field_id["tipo_servicio_" + iNumLinha] = new Array("hidden_field_label_tipo_servicio_", "hidden_field_data_tipo_servicio_" + iNumLinha);
    ajax_field_id["id_barrio_" + iNumLinha] = new Array("hidden_field_label_id_barrio_", "hidden_field_data_id_barrio_" + iNumLinha);
    ajax_field_id["direccion_servicio_" + iNumLinha] = new Array("hidden_field_label_direccion_servicio_", "hidden_field_data_direccion_servicio_" + iNumLinha);
    ajax_field_id["hora_ingreso_llamada_" + iNumLinha] = new Array("hidden_field_label_hora_ingreso_llamada_", "hidden_field_data_hora_ingreso_llamada_" + iNumLinha);
    ajax_field_id["hora_notifica_movil_" + iNumLinha] = new Array("hidden_field_label_hora_notifica_movil_", "hidden_field_data_hora_notifica_movil_" + iNumLinha);
    ajax_field_id["hora_llegada_sitio_" + iNumLinha] = new Array("hidden_field_label_hora_llegada_sitio_", "hidden_field_data_hora_llegada_sitio_" + iNumLinha);
    ajax_field_id["hora_llegada_ips_" + iNumLinha] = new Array("hidden_field_label_hora_llegada_ips_", "hidden_field_data_hora_llegada_ips_" + iNumLinha);
    ajax_field_id["hora_salida_ips_" + iNumLinha] = new Array("hidden_field_label_hora_salida_ips_", "hidden_field_data_hora_salida_ips_" + iNumLinha);
    ajax_field_id["id_movil_" + iNumLinha] = new Array("hidden_field_label_id_movil_", "hidden_field_data_id_movil_" + iNumLinha);
    ajax_field_id["id_ips_" + iNumLinha] = new Array("hidden_field_label_id_ips_", "hidden_field_data_id_ips_" + iNumLinha);
    ajax_field_id["tipo_caso_" + iNumLinha] = new Array("hidden_field_label_tipo_caso_", "hidden_field_data_tipo_caso_" + iNumLinha);
    ajax_field_id["id_medico_" + iNumLinha] = new Array("hidden_field_label_id_medico_", "hidden_field_data_id_medico_" + iNumLinha);
    ajax_error_count["consecutivo_" + iNumLinha] = "off";
    ajax_error_count["secad_" + iNumLinha] = "off";
    ajax_error_count["quien_reporta_" + iNumLinha] = "off";
    ajax_error_count["discapacidad_" + iNumLinha] = "off";
    ajax_error_count["nombre_apellido_" + iNumLinha] = "off";
    ajax_error_count["tipo_documento_" + iNumLinha] = "off";
    ajax_error_count["documento_identidad_" + iNumLinha] = "off";
    ajax_error_count["edad_" + iNumLinha] = "off";
    ajax_error_count["numero_contacto_" + iNumLinha] = "off";
    ajax_error_count["genero_" + iNumLinha] = "off";
    ajax_error_count["id_tipo_evento_" + iNumLinha] = "off";
    ajax_error_count["circunstancias_emergencia_" + iNumLinha] = "off";
    ajax_error_count["id_eps_" + iNumLinha] = "off";
    ajax_error_count["id_seguridad_social_" + iNumLinha] = "off";
    ajax_error_count["zona_" + iNumLinha] = "off";
    ajax_error_count["tipo_servicio_" + iNumLinha] = "off";
    ajax_error_count["id_barrio_" + iNumLinha] = "off";
    ajax_error_count["direccion_servicio_" + iNumLinha] = "off";
    ajax_error_count["hora_ingreso_llamada_" + iNumLinha] = "off";
    ajax_error_count["hora_notifica_movil_" + iNumLinha] = "off";
    ajax_error_count["hora_llegada_sitio_" + iNumLinha] = "off";
    ajax_error_count["hora_llegada_ips_" + iNumLinha] = "off";
    ajax_error_count["hora_salida_ips_" + iNumLinha] = "off";
    ajax_error_count["id_movil_" + iNumLinha] = "off";
    ajax_error_count["id_ips_" + iNumLinha] = "off";
    ajax_error_count["tipo_caso_" + iNumLinha] = "off";
    ajax_error_count["id_medico_" + iNumLinha] = "off";
<?php
if (!$this->Grid_editavel)
{
?>
    ajax_read_only["consecutivo_" + iNumLinha] = "off";
    ajax_read_only["secad_" + iNumLinha] = "off";
    ajax_read_only["quien_reporta_" + iNumLinha] = "off";
    ajax_read_only["discapacidad_" + iNumLinha] = "off";
    ajax_read_only["nombre_apellido_" + iNumLinha] = "off";
    ajax_read_only["tipo_documento_" + iNumLinha] = "off";
    ajax_read_only["documento_identidad_" + iNumLinha] = "off";
    ajax_read_only["edad_" + iNumLinha] = "off";
    ajax_read_only["numero_contacto_" + iNumLinha] = "off";
    ajax_read_only["genero_" + iNumLinha] = "off";
    ajax_read_only["id_tipo_evento_" + iNumLinha] = "off";
    ajax_read_only["circunstancias_emergencia_" + iNumLinha] = "off";
    ajax_read_only["id_eps_" + iNumLinha] = "off";
    ajax_read_only["id_seguridad_social_" + iNumLinha] = "off";
    ajax_read_only["zona_" + iNumLinha] = "off";
    ajax_read_only["tipo_servicio_" + iNumLinha] = "off";
    ajax_read_only["id_barrio_" + iNumLinha] = "off";
    ajax_read_only["direccion_servicio_" + iNumLinha] = "off";
    ajax_read_only["hora_ingreso_llamada_" + iNumLinha] = "off";
    ajax_read_only["hora_notifica_movil_" + iNumLinha] = "off";
    ajax_read_only["hora_llegada_sitio_" + iNumLinha] = "off";
    ajax_read_only["hora_llegada_ips_" + iNumLinha] = "off";
    ajax_read_only["hora_salida_ips_" + iNumLinha] = "off";
    ajax_read_only["id_movil_" + iNumLinha] = "off";
    ajax_read_only["id_ips_" + iNumLinha] = "off";
    ajax_read_only["tipo_caso_" + iNumLinha] = "off";
    ajax_read_only["id_medico_" + iNumLinha] = "off";
<?php
}
else
{
?>
    ajax_read_only["consecutivo_" + iNumLinha] = "on";
    ajax_read_only["secad_" + iNumLinha] = "on";
    ajax_read_only["quien_reporta_" + iNumLinha] = "on";
    ajax_read_only["discapacidad_" + iNumLinha] = "on";
    ajax_read_only["nombre_apellido_" + iNumLinha] = "on";
    ajax_read_only["tipo_documento_" + iNumLinha] = "on";
    ajax_read_only["documento_identidad_" + iNumLinha] = "on";
    ajax_read_only["edad_" + iNumLinha] = "on";
    ajax_read_only["numero_contacto_" + iNumLinha] = "on";
    ajax_read_only["genero_" + iNumLinha] = "on";
    ajax_read_only["id_tipo_evento_" + iNumLinha] = "on";
    ajax_read_only["circunstancias_emergencia_" + iNumLinha] = "on";
    ajax_read_only["id_eps_" + iNumLinha] = "on";
    ajax_read_only["id_seguridad_social_" + iNumLinha] = "on";
    ajax_read_only["zona_" + iNumLinha] = "on";
    ajax_read_only["tipo_servicio_" + iNumLinha] = "on";
    ajax_read_only["id_barrio_" + iNumLinha] = "on";
    ajax_read_only["direccion_servicio_" + iNumLinha] = "on";
    ajax_read_only["hora_ingreso_llamada_" + iNumLinha] = "on";
    ajax_read_only["hora_notifica_movil_" + iNumLinha] = "on";
    ajax_read_only["hora_llegada_sitio_" + iNumLinha] = "on";
    ajax_read_only["hora_llegada_ips_" + iNumLinha] = "on";
    ajax_read_only["hora_salida_ips_" + iNumLinha] = "on";
    ajax_read_only["id_movil_" + iNumLinha] = "on";
    ajax_read_only["id_ips_" + iNumLinha] = "on";
    ajax_read_only["tipo_caso_" + iNumLinha] = "on";
    ajax_read_only["id_medico_" + iNumLinha] = "on";
<?php
}
?>
  }
  function ajax_destroy_tables(iNumLinha)
  {
    ajax_error_list["consecutivo_" + iNumLinha] = null;
    ajax_error_list["secad_" + iNumLinha] = null;
    ajax_error_list["quien_reporta_" + iNumLinha] = null;
    ajax_error_list["discapacidad_" + iNumLinha] = null;
    ajax_error_list["nombre_apellido_" + iNumLinha] = null;
    ajax_error_list["tipo_documento_" + iNumLinha] = null;
    ajax_error_list["documento_identidad_" + iNumLinha] = null;
    ajax_error_list["edad_" + iNumLinha] = null;
    ajax_error_list["numero_contacto_" + iNumLinha] = null;
    ajax_error_list["genero_" + iNumLinha] = null;
    ajax_error_list["id_tipo_evento_" + iNumLinha] = null;
    ajax_error_list["circunstancias_emergencia_" + iNumLinha] = null;
    ajax_error_list["id_eps_" + iNumLinha] = null;
    ajax_error_list["id_seguridad_social_" + iNumLinha] = null;
    ajax_error_list["zona_" + iNumLinha] = null;
    ajax_error_list["tipo_servicio_" + iNumLinha] = null;
    ajax_error_list["id_barrio_" + iNumLinha] = null;
    ajax_error_list["direccion_servicio_" + iNumLinha] = null;
    ajax_error_list["hora_ingreso_llamada_" + iNumLinha] = null;
    ajax_error_list["hora_notifica_movil_" + iNumLinha] = null;
    ajax_error_list["hora_llegada_sitio_" + iNumLinha] = null;
    ajax_error_list["hora_llegada_ips_" + iNumLinha] = null;
    ajax_error_list["hora_salida_ips_" + iNumLinha] = null;
    ajax_error_list["id_movil_" + iNumLinha] = null;
    ajax_error_list["id_ips_" + iNumLinha] = null;
    ajax_error_list["tipo_caso_" + iNumLinha] = null;
    ajax_error_list["id_medico_" + iNumLinha] = null;
  }

  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  iTotCampos = 0;
  iTotDt_Hr  = 0;

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {};
  var ajax_error_timeout = 0;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "consecutivo_": new Array(),
    "secad_": new Array(),
    "quien_reporta_": new Array(),
    "discapacidad_": new Array(),
    "nombre_apellido_": new Array(),
    "tipo_documento_": new Array(),
    "documento_identidad_": new Array(),
    "edad_": new Array(),
    "numero_contacto_": new Array(),
    "genero_": new Array(),
    "id_tipo_evento_": new Array(),
    "circunstancias_emergencia_": new Array(),
    "id_eps_": new Array(),
    "id_seguridad_social_": new Array(),
    "zona_": new Array(),
    "tipo_servicio_": new Array(),
    "id_barrio_": new Array(),
    "direccion_servicio_": new Array(),
    "hora_ingreso_llamada_": new Array(),
    "hora_notifica_movil_": new Array(),
    "hora_llegada_sitio_": new Array(),
    "hora_llegada_ips_": new Array(),
    "hora_salida_ips_": new Array(),
    "id_movil_": new Array(),
    "id_ips_": new Array(),
    "tipo_caso_": new Array(),
    "id_medico_": new Array()
  };

  var ajax_field_id = {};

  var ajax_read_only = {};

  var ajax_error_count = {};

  var Lim_linhas = <?php echo $sc_seq_vert ?>;
  for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
  {
     ajax_create_tables(iNumLinha);
  }

  function scRemoveErrors()
  {
    for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
    {
      ajax_error_list["consecutivo_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["consecutivo_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["consecutivo_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["consecutivo_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["consecutivo_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["secad_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["secad_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["secad_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["secad_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["secad_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["quien_reporta_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["quien_reporta_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["quien_reporta_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["quien_reporta_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["quien_reporta_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["discapacidad_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["discapacidad_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["discapacidad_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["discapacidad_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["discapacidad_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["nombre_apellido_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["nombre_apellido_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["nombre_apellido_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["nombre_apellido_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["nombre_apellido_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["tipo_documento_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["tipo_documento_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["tipo_documento_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["tipo_documento_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["tipo_documento_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["documento_identidad_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["documento_identidad_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["documento_identidad_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["documento_identidad_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["documento_identidad_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["edad_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["edad_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["edad_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["edad_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["edad_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["numero_contacto_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["numero_contacto_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["numero_contacto_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["numero_contacto_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["numero_contacto_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["genero_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["genero_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["genero_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["genero_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["genero_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_tipo_evento_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_tipo_evento_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_tipo_evento_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_tipo_evento_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_tipo_evento_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["circunstancias_emergencia_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["circunstancias_emergencia_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["circunstancias_emergencia_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["circunstancias_emergencia_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["circunstancias_emergencia_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_eps_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_eps_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_eps_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_eps_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_eps_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_seguridad_social_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_seguridad_social_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_seguridad_social_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_seguridad_social_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_seguridad_social_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["zona_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["zona_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["zona_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["zona_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["zona_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["tipo_servicio_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["tipo_servicio_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["tipo_servicio_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["tipo_servicio_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["tipo_servicio_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_barrio_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_barrio_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_barrio_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_barrio_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_barrio_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["direccion_servicio_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["direccion_servicio_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["direccion_servicio_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["direccion_servicio_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["direccion_servicio_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["hora_ingreso_llamada_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["hora_ingreso_llamada_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["hora_ingreso_llamada_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["hora_ingreso_llamada_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["hora_ingreso_llamada_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["hora_notifica_movil_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["hora_notifica_movil_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["hora_notifica_movil_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["hora_notifica_movil_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["hora_notifica_movil_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["hora_llegada_sitio_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["hora_llegada_sitio_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["hora_llegada_sitio_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["hora_llegada_sitio_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["hora_llegada_sitio_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["hora_llegada_ips_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["hora_llegada_ips_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["hora_llegada_ips_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["hora_llegada_ips_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["hora_llegada_ips_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["hora_salida_ips_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["hora_salida_ips_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["hora_salida_ips_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["hora_salida_ips_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["hora_salida_ips_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_movil_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_movil_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_movil_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_movil_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_movil_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_ips_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_ips_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_ips_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_ips_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_ips_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["tipo_caso_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["tipo_caso_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["tipo_caso_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["tipo_caso_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["tipo_caso_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["id_medico_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_medico_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_medico_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_medico_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_medico_" + iNumLinha]["onfocus"] = new Array();
    }
  }

  function mdOpenLine(iSeq)
  {
    if (document.getElementById("sc_open_line_" + iSeq))
    {
      document.getElementById("sc_open_line_" + iSeq).style.display = "none";
    }
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeq))
    {
      document.getElementById("sc_exc_line_" + iSeq).style.display = "none";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + iSeq))
    {
      document.getElementById("sc_upd_line_" + iSeq).style.display = "";
    }
    if (document.getElementById("sc_cancelu_line_" + iSeq))
    {
      document.getElementById("sc_cancelu_line_" + iSeq).style.display = "";
    }
    mdOpenObjects(iSeq);
    displayChange_row(iSeq, "on");
    rerunHeaderDisplay = 1;
    scSetFixedHeaders(true);
  }

  function mdOpenObjects(iSeq)
  {
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['consecutivo_'])) ? $this->nmgp_cmp_readonly['consecutivo_'] : 'off';
?>
    scAjaxFieldRead("consecutivo_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['secad_'])) ? $this->nmgp_cmp_readonly['secad_'] : 'off';
?>
    scAjaxFieldRead("secad_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['quien_reporta_'])) ? $this->nmgp_cmp_readonly['quien_reporta_'] : 'off';
?>
    scAjaxFieldRead("quien_reporta_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['discapacidad_'])) ? $this->nmgp_cmp_readonly['discapacidad_'] : 'off';
?>
    scAjaxFieldRead("discapacidad_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['nombre_apellido_'])) ? $this->nmgp_cmp_readonly['nombre_apellido_'] : 'off';
?>
    scAjaxFieldRead("nombre_apellido_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['tipo_documento_'])) ? $this->nmgp_cmp_readonly['tipo_documento_'] : 'off';
?>
    scAjaxFieldRead("tipo_documento_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['documento_identidad_'])) ? $this->nmgp_cmp_readonly['documento_identidad_'] : 'off';
?>
    scAjaxFieldRead("documento_identidad_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['edad_'])) ? $this->nmgp_cmp_readonly['edad_'] : 'off';
?>
    scAjaxFieldRead("edad_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['numero_contacto_'])) ? $this->nmgp_cmp_readonly['numero_contacto_'] : 'off';
?>
    scAjaxFieldRead("numero_contacto_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['genero_'])) ? $this->nmgp_cmp_readonly['genero_'] : 'off';
?>
    scAjaxFieldRead("genero_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_tipo_evento_'])) ? $this->nmgp_cmp_readonly['id_tipo_evento_'] : 'off';
?>
    scAjaxFieldRead("id_tipo_evento_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['circunstancias_emergencia_'])) ? $this->nmgp_cmp_readonly['circunstancias_emergencia_'] : 'off';
?>
    scAjaxFieldRead("circunstancias_emergencia_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_eps_'])) ? $this->nmgp_cmp_readonly['id_eps_'] : 'off';
?>
    scAjaxFieldRead("id_eps_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_seguridad_social_'])) ? $this->nmgp_cmp_readonly['id_seguridad_social_'] : 'off';
?>
    scAjaxFieldRead("id_seguridad_social_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['zona_'])) ? $this->nmgp_cmp_readonly['zona_'] : 'off';
?>
    scAjaxFieldRead("zona_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['tipo_servicio_'])) ? $this->nmgp_cmp_readonly['tipo_servicio_'] : 'off';
?>
    scAjaxFieldRead("tipo_servicio_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_barrio_'])) ? $this->nmgp_cmp_readonly['id_barrio_'] : 'off';
?>
    scAjaxFieldRead("id_barrio_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['direccion_servicio_'])) ? $this->nmgp_cmp_readonly['direccion_servicio_'] : 'off';
?>
    scAjaxFieldRead("direccion_servicio_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['hora_ingreso_llamada_'])) ? $this->nmgp_cmp_readonly['hora_ingreso_llamada_'] : 'off';
?>
    scAjaxFieldRead("hora_ingreso_llamada_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['hora_notifica_movil_'])) ? $this->nmgp_cmp_readonly['hora_notifica_movil_'] : 'off';
?>
    scAjaxFieldRead("hora_notifica_movil_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['hora_llegada_sitio_'])) ? $this->nmgp_cmp_readonly['hora_llegada_sitio_'] : 'off';
?>
    scAjaxFieldRead("hora_llegada_sitio_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['hora_llegada_ips_'])) ? $this->nmgp_cmp_readonly['hora_llegada_ips_'] : 'off';
?>
    scAjaxFieldRead("hora_llegada_ips_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['hora_salida_ips_'])) ? $this->nmgp_cmp_readonly['hora_salida_ips_'] : 'off';
?>
    scAjaxFieldRead("hora_salida_ips_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_movil_'])) ? $this->nmgp_cmp_readonly['id_movil_'] : 'off';
?>
    scAjaxFieldRead("id_movil_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_ips_'])) ? $this->nmgp_cmp_readonly['id_ips_'] : 'off';
?>
    scAjaxFieldRead("id_ips_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['tipo_caso_'])) ? $this->nmgp_cmp_readonly['tipo_caso_'] : 'off';
?>
    scAjaxFieldRead("tipo_caso_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_medico_'])) ? $this->nmgp_cmp_readonly['id_medico_'] : 'off';
?>
    scAjaxFieldRead("id_medico_" + iSeq, "<?php echo $NM_contr_readonly ?>");
  }

  function mdCloseObjects(iSeq)
  {
    scAjaxFieldRead("consecutivo_" + iSeq, "on");
    scAjaxFieldRead("secad_" + iSeq, "on");
    scAjaxFieldRead("quien_reporta_" + iSeq, "on");
    scAjaxFieldRead("discapacidad_" + iSeq, "on");
    scAjaxFieldRead("nombre_apellido_" + iSeq, "on");
    scAjaxFieldRead("tipo_documento_" + iSeq, "on");
    scAjaxFieldRead("documento_identidad_" + iSeq, "on");
    scAjaxFieldRead("edad_" + iSeq, "on");
    scAjaxFieldRead("numero_contacto_" + iSeq, "on");
    scAjaxFieldRead("genero_" + iSeq, "on");
    scAjaxFieldRead("id_tipo_evento_" + iSeq, "on");
    scAjaxFieldRead("circunstancias_emergencia_" + iSeq, "on");
    scAjaxFieldRead("id_eps_" + iSeq, "on");
    scAjaxFieldRead("id_seguridad_social_" + iSeq, "on");
    scAjaxFieldRead("zona_" + iSeq, "on");
    scAjaxFieldRead("tipo_servicio_" + iSeq, "on");
    scAjaxFieldRead("id_barrio_" + iSeq, "on");
    scAjaxFieldRead("direccion_servicio_" + iSeq, "on");
    scAjaxFieldRead("hora_ingreso_llamada_" + iSeq, "on");
    scAjaxFieldRead("hora_notifica_movil_" + iSeq, "on");
    scAjaxFieldRead("hora_llegada_sitio_" + iSeq, "on");
    scAjaxFieldRead("hora_llegada_ips_" + iSeq, "on");
    scAjaxFieldRead("hora_salida_ips_" + iSeq, "on");
    scAjaxFieldRead("id_movil_" + iSeq, "on");
    scAjaxFieldRead("id_ips_" + iSeq, "on");
    scAjaxFieldRead("tipo_caso_" + iSeq, "on");
    scAjaxFieldRead("id_medico_" + iSeq, "on");
    rerunHeaderDisplay = 1;
    scSetFixedHeaders(true);
  }

  function mdCloseLine()
  {
    if (!oResp["closeLine"] || "" == oResp["closeLine"])
    {
      return;
    }
<?php
    if ($this->nmgp_botoes['update'] == 'on')
    {
?>
    if (document.getElementById("sc_open_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_open_line_" + oResp["closeLine"]).style.display = "";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_upd_line_" + oResp["closeLine"]).style.display = "none";
    }
    rerunHeaderDisplay = 2;
    scSetFixedHeaders(true);
  }

  var sc_open_lines = 0;
  var orig_Nav_permite_ret = "";
  var orig_Nav_permite_ava = "";
  function scDisableNavigation()
  {
    if (0 == sc_open_lines)
    {
      orig_Nav_permite_ret = Nav_permite_ret;
      orig_Nav_permite_ava = Nav_permite_ava;
      Nav_permite_ret = "N";
      Nav_permite_ava = "N";
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
    sc_open_lines++;
  }

  function scEnableNavigation()
  {
    sc_open_lines--;
    if (0 == sc_open_lines)
    {
      Nav_permite_ret = orig_Nav_permite_ret;
      Nav_permite_ava = orig_Nav_permite_ava;
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scErrorLineOn(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "on";
    }
    if (bErrorRow || ("on" == ajax_error_count["consecutivo_" + iRow] || "on" == ajax_error_count["secad_" + iRow] || "on" == ajax_error_count["quien_reporta_" + iRow] || "on" == ajax_error_count["discapacidad_" + iRow] || "on" == ajax_error_count["nombre_apellido_" + iRow] || "on" == ajax_error_count["tipo_documento_" + iRow] || "on" == ajax_error_count["documento_identidad_" + iRow] || "on" == ajax_error_count["edad_" + iRow] || "on" == ajax_error_count["numero_contacto_" + iRow] || "on" == ajax_error_count["genero_" + iRow] || "on" == ajax_error_count["id_tipo_evento_" + iRow] || "on" == ajax_error_count["circunstancias_emergencia_" + iRow] || "on" == ajax_error_count["id_eps_" + iRow] || "on" == ajax_error_count["id_seguridad_social_" + iRow] || "on" == ajax_error_count["zona_" + iRow] || "on" == ajax_error_count["tipo_servicio_" + iRow] || "on" == ajax_error_count["id_barrio_" + iRow] || "on" == ajax_error_count["direccion_servicio_" + iRow] || "on" == ajax_error_count["hora_ingreso_llamada_" + iRow] || "on" == ajax_error_count["hora_notifica_movil_" + iRow] || "on" == ajax_error_count["hora_llegada_sitio_" + iRow] || "on" == ajax_error_count["hora_llegada_ips_" + iRow] || "on" == ajax_error_count["hora_salida_ips_" + iRow] || "on" == ajax_error_count["id_movil_" + iRow] || "on" == ajax_error_count["id_ips_" + iRow] || "on" == ajax_error_count["tipo_caso_" + iRow] || "on" == ajax_error_count["id_medico_" + iRow]))
    {
      $("#hidden_field_data_sc_seq" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_sc_actions" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_consecutivo_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_secad_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_quien_reporta_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_discapacidad_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_nombre_apellido_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_tipo_documento_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_documento_identidad_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_edad_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_numero_contacto_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_genero_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_tipo_evento_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_circunstancias_emergencia_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_eps_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_seguridad_social_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_zona_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_tipo_servicio_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_barrio_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_direccion_servicio_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_hora_ingreso_llamada_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_hora_notifica_movil_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_hora_llegada_sitio_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_hora_llegada_ips_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_hora_salida_ips_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_movil_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_ips_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_tipo_caso_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_id_medico_" + iRow).addClass("scFormErrorLine");
    }
  }

  function scErrorLineOff(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "off";
    }
    if (bErrorRow || ("off" == ajax_error_count["consecutivo_" + iRow] && "off" == ajax_error_count["secad_" + iRow] && "off" == ajax_error_count["quien_reporta_" + iRow] && "off" == ajax_error_count["discapacidad_" + iRow] && "off" == ajax_error_count["nombre_apellido_" + iRow] && "off" == ajax_error_count["tipo_documento_" + iRow] && "off" == ajax_error_count["documento_identidad_" + iRow] && "off" == ajax_error_count["edad_" + iRow] && "off" == ajax_error_count["numero_contacto_" + iRow] && "off" == ajax_error_count["genero_" + iRow] && "off" == ajax_error_count["id_tipo_evento_" + iRow] && "off" == ajax_error_count["circunstancias_emergencia_" + iRow] && "off" == ajax_error_count["id_eps_" + iRow] && "off" == ajax_error_count["id_seguridad_social_" + iRow] && "off" == ajax_error_count["zona_" + iRow] && "off" == ajax_error_count["tipo_servicio_" + iRow] && "off" == ajax_error_count["id_barrio_" + iRow] && "off" == ajax_error_count["direccion_servicio_" + iRow] && "off" == ajax_error_count["hora_ingreso_llamada_" + iRow] && "off" == ajax_error_count["hora_notifica_movil_" + iRow] && "off" == ajax_error_count["hora_llegada_sitio_" + iRow] && "off" == ajax_error_count["hora_llegada_ips_" + iRow] && "off" == ajax_error_count["hora_salida_ips_" + iRow] && "off" == ajax_error_count["id_movil_" + iRow] && "off" == ajax_error_count["id_ips_" + iRow] && "off" == ajax_error_count["tipo_caso_" + iRow] && "off" == ajax_error_count["id_medico_" + iRow]))
    {
      if (bErrorRow)
      {
        ajax_error_count["consecutivo_" + iRow] = "off";
        ajax_error_count["secad_" + iRow] = "off";
        ajax_error_count["quien_reporta_" + iRow] = "off";
        ajax_error_count["discapacidad_" + iRow] = "off";
        ajax_error_count["nombre_apellido_" + iRow] = "off";
        ajax_error_count["tipo_documento_" + iRow] = "off";
        ajax_error_count["documento_identidad_" + iRow] = "off";
        ajax_error_count["edad_" + iRow] = "off";
        ajax_error_count["numero_contacto_" + iRow] = "off";
        ajax_error_count["genero_" + iRow] = "off";
        ajax_error_count["id_tipo_evento_" + iRow] = "off";
        ajax_error_count["circunstancias_emergencia_" + iRow] = "off";
        ajax_error_count["id_eps_" + iRow] = "off";
        ajax_error_count["id_seguridad_social_" + iRow] = "off";
        ajax_error_count["zona_" + iRow] = "off";
        ajax_error_count["tipo_servicio_" + iRow] = "off";
        ajax_error_count["id_barrio_" + iRow] = "off";
        ajax_error_count["direccion_servicio_" + iRow] = "off";
        ajax_error_count["hora_ingreso_llamada_" + iRow] = "off";
        ajax_error_count["hora_notifica_movil_" + iRow] = "off";
        ajax_error_count["hora_llegada_sitio_" + iRow] = "off";
        ajax_error_count["hora_llegada_ips_" + iRow] = "off";
        ajax_error_count["hora_salida_ips_" + iRow] = "off";
        ajax_error_count["id_movil_" + iRow] = "off";
        ajax_error_count["id_ips_" + iRow] = "off";
        ajax_error_count["tipo_caso_" + iRow] = "off";
        ajax_error_count["id_medico_" + iRow] = "off";
      }
      var sCssLine = scErrorLineCss(iRow);
      $("#hidden_field_data_sc_seq" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_sc_actions" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_consecutivo_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_secad_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_quien_reporta_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_discapacidad_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_nombre_apellido_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_tipo_documento_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_documento_identidad_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_edad_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_numero_contacto_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_genero_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_tipo_evento_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_circunstancias_emergencia_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_eps_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_seguridad_social_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_zona_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_tipo_servicio_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_barrio_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_direccion_servicio_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_hora_ingreso_llamada_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_hora_notifica_movil_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_hora_llegada_sitio_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_hora_llegada_ips_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_hora_salida_ips_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_movil_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_ips_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_tipo_caso_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_id_medico_" + iRow).removeClass("scFormErrorLine");
    }
  }

  function scErrorLineReset()
  {
    for (iLineReset = 0; iLineReset < iAjaxNewLine; iLineReset++)
    {
      scErrorLineOff(iLineReset, "__sc_all__");
    }
  }

  function scErrorLineCss(iRow)
  {
    return "scFormDataOddMult";
  }
  var bRefreshTable = false;
  function scRefreshTable()
  {
    if (bRefreshTable)
    {
      do_ajax_procedimiento_final_table_refresh();
      bRefreshTable = false;
      return true;
    }
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("consecutivo_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("secad_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("quien_reporta_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("discapacidad_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_apellido_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipo_documento_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("documento_identidad_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("edad_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("numero_contacto_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("genero_" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_tipo_evento_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("circunstancias_emergencia_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_eps_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_seguridad_social_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("zona_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipo_servicio_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_barrio_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("direccion_servicio_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("hora_ingreso_llamada_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("hora_notifica_movil_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("hora_llegada_sitio_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("hora_llegada_ips_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("hora_salida_ips_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_movil_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_ips_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipo_caso_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_medico_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
