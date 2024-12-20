<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE html>

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Procedimiento"); } else { echo strip_tags("Procedimiento1"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker { z-index: 6 !important }
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<?php
foreach ($this->Ini->tippy_themes as $tippyTheme => $tippyThemeInfo) {
?>
 <link rel="stylesheet" href="<?php echo $tippyThemeInfo['file'] ?>" />
<?php
}
?>
 <script src="<?php echo $this->Ini->path_prod; ?>/third/tippyjs/popper.min.js"></script>
 <script src="<?php echo $this->Ini->path_prod; ?>/third/tippyjs/tippy-bundle.umd.min.js"></script>
 <script>
  $(function() {
  });
 </script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
        opacity: 0.25
}
.sc-button-image.disabled img {
        cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fecha button {
        background-color: transparent;
        border: 0;
        padding: 0
}
</style>
<?php
}
?>
<?php

if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['margin_top']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['margin_top']) {
?>
<style>
.scFormBorder {
    padding-top: 0 !important;
}
.scBlockRowFirst .scFormTable {
    margin-top: <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['margin_top'] ?>;
}
</style>
<?php
}

?>

<style type="text/css">
        .sc.switch {
                position: relative;
                display: inline-flex;
        }

        .sc.switch span {
                display: inline-block;
                margin-right: 5px;
        }

        .sc.switch span {
                background: #DFDFDF;
                width: 22px;
                height: 14px;
                display: block;
                position: relative;
                top: 0px;
                left: 0;
                border-radius: 15px;
                padding: 0 3px;
                transition: all .2s linear;
                box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
        }

        .sc.switch span:before {
                content: '\2713';
                display: inline-block;
                color: white;
                font-size: 10px;
                z-index: 0;
                position: absolute;
                top: 0;
                left: 4px;
        }

        .sc.switch span:after {
                content: '';
                background: white;
                width: 12px;
                height: 12px;
                display: block;
                position: absolute;
                top: 1px;
                left: 1px;
                border-radius: 15px;
                transition: all .2s linear;
                z-index: 1;
        }

        .sc.switch input {
                margin-right: 10px;
                cursor: pointer;
                z-index: 2;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                margin: 0;
                padding: 0;
        }

        .sc.switch input:disabled + span {
                opacity: 0.35;
        }

        .sc.switch input:checked + span {
                background: #66AFE9;
        }

        .sc.switch input:checked + span:after {
                left: calc(100% - 1px);
                transform: translateX(-100%);
        }

        .sc.radio {
                position: relative;
                display: inline-flex;
        }

        .sc.radio span {
                display: inline-block;
                margin-right: 5px;
        }

        .sc.radio span {
                background: #ffffff;
                border: 1px solid #66AFE9;
                width: 12px;
                height: 12px;
                display: block;
                position: relative;
                top: 0px;
                left: 0;
                border-radius: 15px;
                transition: all .2s;
                box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
        }

        .sc.radio span:after {
                content: '';
                background: #66AFE9;
                width: 12px;
                height: 12px;
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                border-radius: 15px;
                transition: all .2s;
                z-index: 1;
                transform: scale(0);
        }

        .sc.radio input {
                cursor: pointer;
                z-index: 2;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                margin: 0;
                padding: 0;
        }

        .sc.radio input:disabled + span {
                opacity: 0.35;
        }

        .sc.radio input:checked + span {
                background: #66AFE9;
        }

        .sc.radio input:checked + span:after {
                transform: translateX(-100%);
                transform: scale(1);
        }
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_procedimiento1/form_procedimiento1_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_procedimiento1_mob_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_procedimiento1_mob_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if (!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName)
{
?>
  scFocusField('secad');

<?php
}
?>
  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  $(".scUiLabelWidthFix").css("width", "20px");
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
     $("#fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        
    });
     $("#cond_fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        minimumResultsForSearch: -1
    });
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if (typeof nm_gp_open_qsearch_div_mobile == 'function') {
            return nm_gp_open_qsearch_div_mobile(pos);
        }
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $remove_background = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['remove_background'] ? 'background-color: transparent; background-image: none; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['remove_background']) {
        $remove_background = 'background-color: transparent; background-image: none; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    if ('' != $remove_background) {
?>
<style>
.scFormBorder { <?php echo $remove_background ?> }
.scFormToolbar { <?php echo $remove_background ?> }
</style>
<?php
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $remove_background . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_procedimiento1']['error_buffer']) && '' != $_SESSION['scriptcase']['form_procedimiento1']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_procedimiento1']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_procedimiento1_mob_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
        scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="form_procedimiento1_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="id_procedimiento" value="<?php  echo $this->form_encode_input($this->id_procedimiento) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_procedimiento1_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_procedimiento1_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->sc_page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="40%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
$this->displayAppHeader();
?>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R")
{
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <i id='SC_fast_search_dropdown_t' style='cursor: pointer;' class='fas fa-caret-down' onclick="nm_gp_open_qsearch_div('t');"></i>
                  <img id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search ?>" onclick="nm_gp_submit_qsearch('t');">
                  <img style="display: <?php echo $stateSearchIconClose ?>" class='css_toolbar_obj_qs_search_img' id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
                  <div id='id_qs_div_t' class='scGridQuickSearchDivMoldura' style='display:none; position:absolute;'>
                                  <div>
                                      <span >
                                        <p class='scGridQuickSearchDivLabel'><?php echo $this->Ini->Nm_lang['lang_btns_clmn'] ?></span></p>
          <select id='fast_search_f0_t' multiple=multiple  class="scFormToolbarInput" style="vertical-align: middle;" name="nmgp_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $SC_Label_atu['consecutivo'] = (isset($this->nm_new_label['consecutivo'])) ? $this->nm_new_label['consecutivo'] : 'Consecutivo'; 
          $SC_Label_atu['secad'] = (isset($this->nm_new_label['secad'])) ? $this->nm_new_label['secad'] : 'Secad'; 
          $SC_Label_atu['quien_reporta'] = (isset($this->nm_new_label['quien_reporta'])) ? $this->nm_new_label['quien_reporta'] : 'Quien Reporta'; 
          $SC_Label_atu['discapacidad'] = (isset($this->nm_new_label['discapacidad'])) ? $this->nm_new_label['discapacidad'] : 'Discapacidad'; 
          $SC_Label_atu['nombre_apellido'] = (isset($this->nm_new_label['nombre_apellido'])) ? $this->nm_new_label['nombre_apellido'] : 'Nombre del paciente'; 
          $SC_Label_atu['tipo_documento'] = (isset($this->nm_new_label['tipo_documento'])) ? $this->nm_new_label['tipo_documento'] : 'Tipo Documento'; 
          $SC_Label_atu['documento_identidad'] = (isset($this->nm_new_label['documento_identidad'])) ? $this->nm_new_label['documento_identidad'] : 'Documento Identidad'; 
          $SC_Label_atu['edad'] = (isset($this->nm_new_label['edad'])) ? $this->nm_new_label['edad'] : 'Edad'; 
          $SC_Label_atu['numero_contacto'] = (isset($this->nm_new_label['numero_contacto'])) ? $this->nm_new_label['numero_contacto'] : 'Numero Contacto'; 
          $SC_Label_atu['genero'] = (isset($this->nm_new_label['genero'])) ? $this->nm_new_label['genero'] : 'Genero'; 
          $SC_Label_atu['id_tipo_evento'] = (isset($this->nm_new_label['id_tipo_evento'])) ? $this->nm_new_label['id_tipo_evento'] : 'Tipo Evento'; 
          $SC_Label_atu['circunstancias_emergencia'] = (isset($this->nm_new_label['circunstancias_emergencia'])) ? $this->nm_new_label['circunstancias_emergencia'] : 'Situación que se presenta'; 
          $SC_Label_atu['id_eps'] = (isset($this->nm_new_label['id_eps'])) ? $this->nm_new_label['id_eps'] : 'Entidad aseguradora'; 
          $SC_Label_atu['id_seguridad_social'] = (isset($this->nm_new_label['id_seguridad_social'])) ? $this->nm_new_label['id_seguridad_social'] : 'Regimen'; 
          $SC_Label_atu['zona'] = (isset($this->nm_new_label['zona'])) ? $this->nm_new_label['zona'] : 'Zona'; 
          $SC_Label_atu['tipo_servicio'] = (isset($this->nm_new_label['tipo_servicio'])) ? $this->nm_new_label['tipo_servicio'] : 'Tipo Servicio'; 
          $SC_Label_atu['id_barrio'] = (isset($this->nm_new_label['id_barrio'])) ? $this->nm_new_label['id_barrio'] : 'Barrio'; 
          $SC_Label_atu['direccion_servicio'] = (isset($this->nm_new_label['direccion_servicio'])) ? $this->nm_new_label['direccion_servicio'] : 'Direccion Servicio'; 
          $SC_Label_atu['hora_ingreso_llamada'] = (isset($this->nm_new_label['hora_ingreso_llamada'])) ? $this->nm_new_label['hora_ingreso_llamada'] : 'Hora Ingreso Llamada'; 
          $SC_Label_atu['hora_notifica_movil'] = (isset($this->nm_new_label['hora_notifica_movil'])) ? $this->nm_new_label['hora_notifica_movil'] : 'Hora Notifica Movil'; 
          $SC_Label_atu['hora_llegada_sitio'] = (isset($this->nm_new_label['hora_llegada_sitio'])) ? $this->nm_new_label['hora_llegada_sitio'] : 'Hora Llegada Sitio'; 
          $SC_Label_atu['hora_llegada_ips'] = (isset($this->nm_new_label['hora_llegada_ips'])) ? $this->nm_new_label['hora_llegada_ips'] : 'Hora Llegada Ips'; 
          $SC_Label_atu['hora_salida_ips'] = (isset($this->nm_new_label['hora_salida_ips'])) ? $this->nm_new_label['hora_salida_ips'] : 'Hora Salida Ips'; 
          $SC_Label_atu['id_movil'] = (isset($this->nm_new_label['id_movil'])) ? $this->nm_new_label['id_movil'] : 'Vehículo que atendio'; 
          $SC_Label_atu['id_ips'] = (isset($this->nm_new_label['id_ips'])) ? $this->nm_new_label['id_ips'] : 'Direccionamiento'; 
          $SC_Label_atu['tipo_caso'] = (isset($this->nm_new_label['tipo_caso'])) ? $this->nm_new_label['tipo_caso'] : 'Tipo Caso'; 
          $SC_Label_atu['id_medico'] = (isset($this->nm_new_label['id_medico'])) ? $this->nm_new_label['id_medico'] : 'Medico Regulador'; 
          $SC_Label_atu['id_ciudad'] = (isset($this->nm_new_label['id_ciudad'])) ? $this->nm_new_label['id_ciudad'] : 'Ciudad'; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              if($CMP == 'SC_all_Cmp')
                  continue;
              $OPC_sel = ($CMP == $OPC_cmp) ? " selected" : "";
              echo "           <option value='" . $CMP . "'" . $OPC_sel . ">" . $LABEL . "</option>";
          }
?> 
          </select>
                                      </span>
                                      <span >
                                        <p class='scGridQuickSearchDivLabel'><?php echo $this->Ini->Nm_lang['lang_quck_srchcond'] ?></span></p>
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
          $OPC_sel = ("ii" == $OPC_arg) ? " selected" : "";
           echo "           <option value='ii'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_stts_with'] . "</option>";
          $OPC_sel = ("eq" == $OPC_arg) ? " selected" : "";
           echo "           <option value='eq'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
          $OPC_sel = ("np" == $OPC_arg) ? " selected" : "";
           echo "           <option value='np'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_not_like'] . "</option>";
?> 
          </select>
                                      </span>
                                  </div>
                                  <div class='scGridQuickSearchDivToolbar'>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "nm_gp_cancel_qsearch_div_store_temp('t')", "nm_gp_cancel_qsearch_div_store_temp('t')", "qs_cancel", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
       <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "nm_gp_submit_qsearch('t');", "nm_gp_submit_qsearch('t');", "qs_search", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
                                  </div>
                               </div>          </span>  </div>
  <?php
      }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consecutivo']))
    {
        $this->nm_new_label['consecutivo'] = "Consecutivo";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consecutivo = $this->consecutivo;
   $sStyleHidden_consecutivo = '';
   if (isset($this->nmgp_cmp_hidden['consecutivo']) && $this->nmgp_cmp_hidden['consecutivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consecutivo']);
       $sStyleHidden_consecutivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consecutivo = 'display: none;';
   $sStyleReadInp_consecutivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consecutivo']) && $this->nmgp_cmp_readonly['consecutivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consecutivo']);
       $sStyleReadLab_consecutivo = '';
       $sStyleReadInp_consecutivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consecutivo']) && $this->nmgp_cmp_hidden['consecutivo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consecutivo" value="<?php echo $this->form_encode_input($consecutivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_consecutivo_line" id="hidden_field_data_consecutivo" style="<?php echo $sStyleHidden_consecutivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_consecutivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_consecutivo_label" style=""><span id="id_label_consecutivo"><?php echo $this->nm_new_label['consecutivo']; ?></span></span><br><input type="hidden" name="consecutivo" value="<?php echo $this->form_encode_input($consecutivo); ?>"><span id="id_ajax_label_consecutivo"><?php echo nl2br($consecutivo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consecutivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consecutivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['secad']))
    {
        $this->nm_new_label['secad'] = "Secad";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $secad = $this->secad;
   $sStyleHidden_secad = '';
   if (isset($this->nmgp_cmp_hidden['secad']) && $this->nmgp_cmp_hidden['secad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['secad']);
       $sStyleHidden_secad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_secad = 'display: none;';
   $sStyleReadInp_secad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['secad']) && $this->nmgp_cmp_readonly['secad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['secad']);
       $sStyleReadLab_secad = '';
       $sStyleReadInp_secad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['secad']) && $this->nmgp_cmp_hidden['secad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="secad" value="<?php echo $this->form_encode_input($secad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_secad_line" id="hidden_field_data_secad" style="<?php echo $sStyleHidden_secad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_secad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_secad_label" style=""><span id="id_label_secad"><?php echo $this->nm_new_label['secad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["secad"]) &&  $this->nmgp_cmp_readonly["secad"] == "on") { 

 ?>
<input type="hidden" name="secad" value="<?php echo $this->form_encode_input($secad) . "\">" . $secad . ""; ?>
<?php } else { ?>
<span id="id_read_on_secad" class="sc-ui-readonly-secad css_secad_line" style="<?php echo $sStyleReadLab_secad; ?>"><?php echo $this->form_format_readonly("secad", $this->form_encode_input($this->secad)); ?></span><span id="id_read_off_secad" class="css_read_off_secad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_secad; ?>">
 <input class="sc-js-input scFormObjectOdd css_secad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_secad" type=text name="secad" value="<?php echo $this->form_encode_input($secad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_secad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_secad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['quien_reporta']))
   {
       $this->nm_new_label['quien_reporta'] = "Quien Reporta";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $quien_reporta = $this->quien_reporta;
   $sStyleHidden_quien_reporta = '';
   if (isset($this->nmgp_cmp_hidden['quien_reporta']) && $this->nmgp_cmp_hidden['quien_reporta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['quien_reporta']);
       $sStyleHidden_quien_reporta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_quien_reporta = 'display: none;';
   $sStyleReadInp_quien_reporta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['quien_reporta']) && $this->nmgp_cmp_readonly['quien_reporta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['quien_reporta']);
       $sStyleReadLab_quien_reporta = '';
       $sStyleReadInp_quien_reporta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['quien_reporta']) && $this->nmgp_cmp_hidden['quien_reporta'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="quien_reporta" value="<?php echo $this->form_encode_input($this->quien_reporta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_quien_reporta_line" id="hidden_field_data_quien_reporta" style="<?php echo $sStyleHidden_quien_reporta; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_quien_reporta_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_quien_reporta_label" style=""><span id="id_label_quien_reporta"><?php echo $this->nm_new_label['quien_reporta']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quien_reporta"]) &&  $this->nmgp_cmp_readonly["quien_reporta"] == "on") { 

$quien_reporta_look = "";
 if ($this->quien_reporta == "PONAL ") { $quien_reporta_look .= "PONAL " ;} 
 if ($this->quien_reporta == "BOMBEROS ") { $quien_reporta_look .= "BOMBEROS " ;} 
 if ($this->quien_reporta == "DEFENSA CIVIL") { $quien_reporta_look .= "DEFENSA CIVIL" ;} 
 if ($this->quien_reporta == "CRUZ ROJA ") { $quien_reporta_look .= "CRUZ ROJA " ;} 
 if ($this->quien_reporta == "LINEA DE SALUD MENTAL") { $quien_reporta_look .= "LINEA DE SALUD MENTAL" ;} 
 if ($this->quien_reporta == "USUARIO") { $quien_reporta_look .= "USUARIO" ;} 
 if ($this->quien_reporta == "EMERCAPS") { $quien_reporta_look .= "EMERCAPS" ;} 
 if (empty($quien_reporta_look)) { $quien_reporta_look = $this->quien_reporta; }
?>
<input type="hidden" name="quien_reporta" value="<?php echo $this->form_encode_input($quien_reporta) . "\">" . $quien_reporta_look . ""; ?>
<?php } else { ?>
<?php

$quien_reporta_look = "";
 if ($this->quien_reporta == "PONAL ") { $quien_reporta_look .= "PONAL " ;} 
 if ($this->quien_reporta == "BOMBEROS ") { $quien_reporta_look .= "BOMBEROS " ;} 
 if ($this->quien_reporta == "DEFENSA CIVIL") { $quien_reporta_look .= "DEFENSA CIVIL" ;} 
 if ($this->quien_reporta == "CRUZ ROJA ") { $quien_reporta_look .= "CRUZ ROJA " ;} 
 if ($this->quien_reporta == "LINEA DE SALUD MENTAL") { $quien_reporta_look .= "LINEA DE SALUD MENTAL" ;} 
 if ($this->quien_reporta == "USUARIO") { $quien_reporta_look .= "USUARIO" ;} 
 if ($this->quien_reporta == "EMERCAPS") { $quien_reporta_look .= "EMERCAPS" ;} 
 if (empty($quien_reporta_look)) { $quien_reporta_look = $this->quien_reporta; }
?>
<span id="id_read_on_quien_reporta" class="css_quien_reporta_line"  style="<?php echo $sStyleReadLab_quien_reporta; ?>"><?php echo $this->form_format_readonly("quien_reporta", $this->form_encode_input($quien_reporta_look)); ?></span><span id="id_read_off_quien_reporta" class="css_read_off_quien_reporta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_quien_reporta; ?>">
 <span id="idAjaxSelect_quien_reporta" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_quien_reporta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_quien_reporta" name="quien_reporta" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="PONAL " <?php  if ($this->quien_reporta == "PONAL ") { echo " selected" ;} ?>>PONAL </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'PONAL '; ?>
 <option  value="BOMBEROS " <?php  if ($this->quien_reporta == "BOMBEROS ") { echo " selected" ;} ?>>BOMBEROS </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'BOMBEROS '; ?>
 <option  value="DEFENSA CIVIL" <?php  if ($this->quien_reporta == "DEFENSA CIVIL") { echo " selected" ;} ?>>DEFENSA CIVIL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'DEFENSA CIVIL'; ?>
 <option  value="CRUZ ROJA " <?php  if ($this->quien_reporta == "CRUZ ROJA ") { echo " selected" ;} ?>>CRUZ ROJA </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'CRUZ ROJA '; ?>
 <option  value="LINEA DE SALUD MENTAL" <?php  if ($this->quien_reporta == "LINEA DE SALUD MENTAL") { echo " selected" ;} ?>>LINEA DE SALUD MENTAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'LINEA DE SALUD MENTAL'; ?>
 <option  value="USUARIO" <?php  if ($this->quien_reporta == "USUARIO") { echo " selected" ;} ?>>USUARIO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'USUARIO'; ?>
 <option  value="EMERCAPS" <?php  if ($this->quien_reporta == "EMERCAPS") { echo " selected" ;} ?>>EMERCAPS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_quien_reporta'][] = 'EMERCAPS'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_quien_reporta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quien_reporta_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['discapacidad']))
   {
       $this->nm_new_label['discapacidad'] = "Discapacidad";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $discapacidad = $this->discapacidad;
   $sStyleHidden_discapacidad = '';
   if (isset($this->nmgp_cmp_hidden['discapacidad']) && $this->nmgp_cmp_hidden['discapacidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['discapacidad']);
       $sStyleHidden_discapacidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_discapacidad = 'display: none;';
   $sStyleReadInp_discapacidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['discapacidad']) && $this->nmgp_cmp_readonly['discapacidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['discapacidad']);
       $sStyleReadLab_discapacidad = '';
       $sStyleReadInp_discapacidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['discapacidad']) && $this->nmgp_cmp_hidden['discapacidad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="discapacidad" value="<?php echo $this->form_encode_input($this->discapacidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_discapacidad_line" id="hidden_field_data_discapacidad" style="<?php echo $sStyleHidden_discapacidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_discapacidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_discapacidad_label" style=""><span id="id_label_discapacidad"><?php echo $this->nm_new_label['discapacidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discapacidad"]) &&  $this->nmgp_cmp_readonly["discapacidad"] == "on") { 

$discapacidad_look = "";
 if ($this->discapacidad == "VISUAL") { $discapacidad_look .= "VISUAL" ;} 
 if ($this->discapacidad == "AUDITIVA") { $discapacidad_look .= "AUDITIVA" ;} 
 if ($this->discapacidad == "FISICA") { $discapacidad_look .= "FISICA" ;} 
 if ($this->discapacidad == "SORDOCEGUERA") { $discapacidad_look .= "SORDOCEGUERA" ;} 
 if ($this->discapacidad == "MULTIPLE") { $discapacidad_look .= "MULTIPLE" ;} 
 if ($this->discapacidad == "INTELECTUAL ") { $discapacidad_look .= "INTELECTUAL " ;} 
 if ($this->discapacidad == "PSICOSOCIAL") { $discapacidad_look .= "PSICOSOCIAL" ;} 
 if (empty($discapacidad_look)) { $discapacidad_look = $this->discapacidad; }
?>
<input type="hidden" name="discapacidad" value="<?php echo $this->form_encode_input($discapacidad) . "\">" . $discapacidad_look . ""; ?>
<?php } else { ?>
<?php

$discapacidad_look = "";
 if ($this->discapacidad == "VISUAL") { $discapacidad_look .= "VISUAL" ;} 
 if ($this->discapacidad == "AUDITIVA") { $discapacidad_look .= "AUDITIVA" ;} 
 if ($this->discapacidad == "FISICA") { $discapacidad_look .= "FISICA" ;} 
 if ($this->discapacidad == "SORDOCEGUERA") { $discapacidad_look .= "SORDOCEGUERA" ;} 
 if ($this->discapacidad == "MULTIPLE") { $discapacidad_look .= "MULTIPLE" ;} 
 if ($this->discapacidad == "INTELECTUAL ") { $discapacidad_look .= "INTELECTUAL " ;} 
 if ($this->discapacidad == "PSICOSOCIAL") { $discapacidad_look .= "PSICOSOCIAL" ;} 
 if (empty($discapacidad_look)) { $discapacidad_look = $this->discapacidad; }
?>
<span id="id_read_on_discapacidad" class="css_discapacidad_line"  style="<?php echo $sStyleReadLab_discapacidad; ?>"><?php echo $this->form_format_readonly("discapacidad", $this->form_encode_input($discapacidad_look)); ?></span><span id="id_read_off_discapacidad" class="css_read_off_discapacidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_discapacidad; ?>">
 <span id="idAjaxSelect_discapacidad" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_discapacidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_discapacidad" name="discapacidad" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="VISUAL" <?php  if ($this->discapacidad == "VISUAL") { echo " selected" ;} ?>>VISUAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'VISUAL'; ?>
 <option  value="AUDITIVA" <?php  if ($this->discapacidad == "AUDITIVA") { echo " selected" ;} ?>>AUDITIVA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'AUDITIVA'; ?>
 <option  value="FISICA" <?php  if ($this->discapacidad == "FISICA") { echo " selected" ;} ?>>FISICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'FISICA'; ?>
 <option  value="SORDOCEGUERA" <?php  if ($this->discapacidad == "SORDOCEGUERA") { echo " selected" ;} ?>>SORDOCEGUERA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'SORDOCEGUERA'; ?>
 <option  value="MULTIPLE" <?php  if ($this->discapacidad == "MULTIPLE") { echo " selected" ;} ?>>MULTIPLE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'MULTIPLE'; ?>
 <option  value="INTELECTUAL " <?php  if ($this->discapacidad == "INTELECTUAL ") { echo " selected" ;} ?>>INTELECTUAL </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'INTELECTUAL '; ?>
 <option  value="PSICOSOCIAL" <?php  if ($this->discapacidad == "PSICOSOCIAL") { echo " selected" ;} ?>>PSICOSOCIAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_discapacidad'][] = 'PSICOSOCIAL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_discapacidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_discapacidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_apellido']))
    {
        $this->nm_new_label['nombre_apellido'] = "Nombre del paciente";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_apellido = $this->nombre_apellido;
   $sStyleHidden_nombre_apellido = '';
   if (isset($this->nmgp_cmp_hidden['nombre_apellido']) && $this->nmgp_cmp_hidden['nombre_apellido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_apellido']);
       $sStyleHidden_nombre_apellido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_apellido = 'display: none;';
   $sStyleReadInp_nombre_apellido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_apellido']) && $this->nmgp_cmp_readonly['nombre_apellido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_apellido']);
       $sStyleReadLab_nombre_apellido = '';
       $sStyleReadInp_nombre_apellido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_apellido']) && $this->nmgp_cmp_hidden['nombre_apellido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_apellido" value="<?php echo $this->form_encode_input($nombre_apellido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_apellido_line" id="hidden_field_data_nombre_apellido" style="<?php echo $sStyleHidden_nombre_apellido; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_apellido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_nombre_apellido_label" style=""><span id="id_label_nombre_apellido"><?php echo $this->nm_new_label['nombre_apellido']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_apellido"]) &&  $this->nmgp_cmp_readonly["nombre_apellido"] == "on") { 

 ?>
<input type="hidden" name="nombre_apellido" value="<?php echo $this->form_encode_input($nombre_apellido) . "\">" . $nombre_apellido . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_apellido" class="sc-ui-readonly-nombre_apellido css_nombre_apellido_line" style="<?php echo $sStyleReadLab_nombre_apellido; ?>"><?php echo $this->form_format_readonly("nombre_apellido", $this->form_encode_input($this->nombre_apellido)); ?></span><span id="id_read_off_nombre_apellido" class="css_read_off_nombre_apellido<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_apellido; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_apellido_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_apellido" type=text name="nombre_apellido" value="<?php echo $this->form_encode_input($nombre_apellido) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=90 alt="{datatype: 'text', maxLength: 90, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_apellido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_apellido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_documento']))
   {
       $this->nm_new_label['tipo_documento'] = "Tipo Documento";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_documento = $this->tipo_documento;
   $sStyleHidden_tipo_documento = '';
   if (isset($this->nmgp_cmp_hidden['tipo_documento']) && $this->nmgp_cmp_hidden['tipo_documento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_documento']);
       $sStyleHidden_tipo_documento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_documento = 'display: none;';
   $sStyleReadInp_tipo_documento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_documento']) && $this->nmgp_cmp_readonly['tipo_documento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_documento']);
       $sStyleReadLab_tipo_documento = '';
       $sStyleReadInp_tipo_documento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_documento']) && $this->nmgp_cmp_hidden['tipo_documento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_documento" value="<?php echo $this->form_encode_input($this->tipo_documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_documento_line" id="hidden_field_data_tipo_documento" style="<?php echo $sStyleHidden_tipo_documento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_documento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_tipo_documento_label" style=""><span id="id_label_tipo_documento"><?php echo $this->nm_new_label['tipo_documento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_documento"]) &&  $this->nmgp_cmp_readonly["tipo_documento"] == "on") { 

$tipo_documento_look = "";
 if ($this->tipo_documento == "Cedula de ciudadanía") { $tipo_documento_look .= "Cedula de ciudadanía" ;} 
 if ($this->tipo_documento == "Tarjeta de identidad") { $tipo_documento_look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento == "Tarjeta de extranjería") { $tipo_documento_look .= "Tarjeta de extranjería" ;} 
 if ($this->tipo_documento == "Cedula de ciudadanía de primera vez ") { $tipo_documento_look .= "Cedula de ciudadanía de primera vez " ;} 
 if ($this->tipo_documento == "Duplicado de cédula de ciudadanía ") { $tipo_documento_look .= "Duplicado de cédula de ciudadanía " ;} 
 if ($this->tipo_documento == "Renovación de cédula de ciudadanía ") { $tipo_documento_look .= "Renovación de cédula de ciudadanía " ;} 
 if ($this->tipo_documento == "Tarjeta de identidad de primera vez") { $tipo_documento_look .= "Tarjeta de identidad de primera vez" ;} 
 if ($this->tipo_documento == "Duplicado de tarjeta de identidad") { $tipo_documento_look .= "Duplicado de tarjeta de identidad" ;} 
 if ($this->tipo_documento == "Renovación de tarjeta de identidad ") { $tipo_documento_look .= "Renovación de tarjeta de identidad " ;} 
 if ($this->tipo_documento == "Registro civil ") { $tipo_documento_look .= "Registro civil " ;} 
 if (empty($tipo_documento_look)) { $tipo_documento_look = $this->tipo_documento; }
?>
<input type="hidden" name="tipo_documento" value="<?php echo $this->form_encode_input($tipo_documento) . "\">" . $tipo_documento_look . ""; ?>
<?php } else { ?>
<?php

$tipo_documento_look = "";
 if ($this->tipo_documento == "Cedula de ciudadanía") { $tipo_documento_look .= "Cedula de ciudadanía" ;} 
 if ($this->tipo_documento == "Tarjeta de identidad") { $tipo_documento_look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento == "Tarjeta de extranjería") { $tipo_documento_look .= "Tarjeta de extranjería" ;} 
 if ($this->tipo_documento == "Cedula de ciudadanía de primera vez ") { $tipo_documento_look .= "Cedula de ciudadanía de primera vez " ;} 
 if ($this->tipo_documento == "Duplicado de cédula de ciudadanía ") { $tipo_documento_look .= "Duplicado de cédula de ciudadanía " ;} 
 if ($this->tipo_documento == "Renovación de cédula de ciudadanía ") { $tipo_documento_look .= "Renovación de cédula de ciudadanía " ;} 
 if ($this->tipo_documento == "Tarjeta de identidad de primera vez") { $tipo_documento_look .= "Tarjeta de identidad de primera vez" ;} 
 if ($this->tipo_documento == "Duplicado de tarjeta de identidad") { $tipo_documento_look .= "Duplicado de tarjeta de identidad" ;} 
 if ($this->tipo_documento == "Renovación de tarjeta de identidad ") { $tipo_documento_look .= "Renovación de tarjeta de identidad " ;} 
 if ($this->tipo_documento == "Registro civil ") { $tipo_documento_look .= "Registro civil " ;} 
 if (empty($tipo_documento_look)) { $tipo_documento_look = $this->tipo_documento; }
?>
<span id="id_read_on_tipo_documento" class="css_tipo_documento_line"  style="<?php echo $sStyleReadLab_tipo_documento; ?>"><?php echo $this->form_format_readonly("tipo_documento", $this->form_encode_input($tipo_documento_look)); ?></span><span id="id_read_off_tipo_documento" class="css_read_off_tipo_documento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_documento; ?>">
 <span id="idAjaxSelect_tipo_documento" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_documento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_documento" name="tipo_documento" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="Cedula de ciudadanía" <?php  if ($this->tipo_documento == "Cedula de ciudadanía") { echo " selected" ;} ?>>Cedula de ciudadanía</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Cedula de ciudadanía'; ?>
 <option  value="Tarjeta de identidad" <?php  if ($this->tipo_documento == "Tarjeta de identidad") { echo " selected" ;} ?>>Tarjeta de identidad</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Tarjeta de identidad'; ?>
 <option  value="Tarjeta de extranjería" <?php  if ($this->tipo_documento == "Tarjeta de extranjería") { echo " selected" ;} ?>>Tarjeta de extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Tarjeta de extranjería'; ?>
 <option  value="Cedula de ciudadanía de primera vez " <?php  if ($this->tipo_documento == "Cedula de ciudadanía de primera vez ") { echo " selected" ;} ?>>Cedula de ciudadanía de primera vez </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Cedula de ciudadanía de primera vez '; ?>
 <option  value="Duplicado de cédula de ciudadanía " <?php  if ($this->tipo_documento == "Duplicado de cédula de ciudadanía ") { echo " selected" ;} ?>>Duplicado de cédula de ciudadanía </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Duplicado de cédula de ciudadanía '; ?>
 <option  value="Renovación de cédula de ciudadanía " <?php  if ($this->tipo_documento == "Renovación de cédula de ciudadanía ") { echo " selected" ;} ?>>Renovación de cédula de ciudadanía </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Renovación de cédula de ciudadanía '; ?>
 <option  value="Tarjeta de identidad de primera vez" <?php  if ($this->tipo_documento == "Tarjeta de identidad de primera vez") { echo " selected" ;} ?>>Tarjeta de identidad de primera vez</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Tarjeta de identidad de primera vez'; ?>
 <option  value="Duplicado de tarjeta de identidad" <?php  if ($this->tipo_documento == "Duplicado de tarjeta de identidad") { echo " selected" ;} ?>>Duplicado de tarjeta de identidad</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Duplicado de tarjeta de identidad'; ?>
 <option  value="Renovación de tarjeta de identidad " <?php  if ($this->tipo_documento == "Renovación de tarjeta de identidad ") { echo " selected" ;} ?>>Renovación de tarjeta de identidad </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Renovación de tarjeta de identidad '; ?>
 <option  value="Registro civil " <?php  if ($this->tipo_documento == "Registro civil ") { echo " selected" ;} ?>>Registro civil </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_documento'][] = 'Registro civil '; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_documento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_documento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['documento_identidad']))
    {
        $this->nm_new_label['documento_identidad'] = "Documento Identidad";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $documento_identidad = $this->documento_identidad;
   $sStyleHidden_documento_identidad = '';
   if (isset($this->nmgp_cmp_hidden['documento_identidad']) && $this->nmgp_cmp_hidden['documento_identidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['documento_identidad']);
       $sStyleHidden_documento_identidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_documento_identidad = 'display: none;';
   $sStyleReadInp_documento_identidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['documento_identidad']) && $this->nmgp_cmp_readonly['documento_identidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['documento_identidad']);
       $sStyleReadLab_documento_identidad = '';
       $sStyleReadInp_documento_identidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['documento_identidad']) && $this->nmgp_cmp_hidden['documento_identidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="documento_identidad" value="<?php echo $this->form_encode_input($documento_identidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_documento_identidad_line" id="hidden_field_data_documento_identidad" style="<?php echo $sStyleHidden_documento_identidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_documento_identidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_documento_identidad_label" style=""><span id="id_label_documento_identidad"><?php echo $this->nm_new_label['documento_identidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["documento_identidad"]) &&  $this->nmgp_cmp_readonly["documento_identidad"] == "on") { 

 ?>
<input type="hidden" name="documento_identidad" value="<?php echo $this->form_encode_input($documento_identidad) . "\">" . $documento_identidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_documento_identidad" class="sc-ui-readonly-documento_identidad css_documento_identidad_line" style="<?php echo $sStyleReadLab_documento_identidad; ?>"><?php echo $this->form_format_readonly("documento_identidad", $this->form_encode_input($this->documento_identidad)); ?></span><span id="id_read_off_documento_identidad" class="css_read_off_documento_identidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_documento_identidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_documento_identidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_documento_identidad" type=text name="documento_identidad" value="<?php echo $this->form_encode_input($documento_identidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_documento_identidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_documento_identidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['edad']))
    {
        $this->nm_new_label['edad'] = "Edad";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $edad = $this->edad;
   $sStyleHidden_edad = '';
   if (isset($this->nmgp_cmp_hidden['edad']) && $this->nmgp_cmp_hidden['edad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['edad']);
       $sStyleHidden_edad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_edad = 'display: none;';
   $sStyleReadInp_edad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['edad']) && $this->nmgp_cmp_readonly['edad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['edad']);
       $sStyleReadLab_edad = '';
       $sStyleReadInp_edad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['edad']) && $this->nmgp_cmp_hidden['edad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="edad" value="<?php echo $this->form_encode_input($edad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_edad_line" id="hidden_field_data_edad" style="<?php echo $sStyleHidden_edad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_edad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_edad_label" style=""><span id="id_label_edad"><?php echo $this->nm_new_label['edad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["edad"]) &&  $this->nmgp_cmp_readonly["edad"] == "on") { 

 ?>
<input type="hidden" name="edad" value="<?php echo $this->form_encode_input($edad) . "\">" . $edad . ""; ?>
<?php } else { ?>
<span id="id_read_on_edad" class="sc-ui-readonly-edad css_edad_line" style="<?php echo $sStyleReadLab_edad; ?>"><?php echo $this->form_format_readonly("edad", $this->form_encode_input($this->edad)); ?></span><span id="id_read_off_edad" class="css_read_off_edad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_edad; ?>">
 <input class="sc-js-input scFormObjectOdd css_edad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_edad" type=text name="edad" value="<?php echo $this->form_encode_input($edad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['edad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['edad']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['edad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_edad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_edad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_contacto']))
    {
        $this->nm_new_label['numero_contacto'] = "Numero Contacto";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_contacto = $this->numero_contacto;
   $sStyleHidden_numero_contacto = '';
   if (isset($this->nmgp_cmp_hidden['numero_contacto']) && $this->nmgp_cmp_hidden['numero_contacto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_contacto']);
       $sStyleHidden_numero_contacto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_contacto = 'display: none;';
   $sStyleReadInp_numero_contacto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_contacto']) && $this->nmgp_cmp_readonly['numero_contacto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_contacto']);
       $sStyleReadLab_numero_contacto = '';
       $sStyleReadInp_numero_contacto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_contacto']) && $this->nmgp_cmp_hidden['numero_contacto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_contacto" value="<?php echo $this->form_encode_input($numero_contacto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_contacto_line" id="hidden_field_data_numero_contacto" style="<?php echo $sStyleHidden_numero_contacto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_contacto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_numero_contacto_label" style=""><span id="id_label_numero_contacto"><?php echo $this->nm_new_label['numero_contacto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_contacto"]) &&  $this->nmgp_cmp_readonly["numero_contacto"] == "on") { 

 ?>
<input type="hidden" name="numero_contacto" value="<?php echo $this->form_encode_input($numero_contacto) . "\">" . $numero_contacto . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_contacto" class="sc-ui-readonly-numero_contacto css_numero_contacto_line" style="<?php echo $sStyleReadLab_numero_contacto; ?>"><?php echo $this->form_format_readonly("numero_contacto", $this->form_encode_input($this->numero_contacto)); ?></span><span id="id_read_off_numero_contacto" class="css_read_off_numero_contacto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_contacto; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_contacto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_contacto" type=text name="numero_contacto" value="<?php echo $this->form_encode_input($numero_contacto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_contacto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_contacto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['genero']))
    {
        $this->nm_new_label['genero'] = "Genero";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $genero = $this->genero;
   $sStyleHidden_genero = '';
   if (isset($this->nmgp_cmp_hidden['genero']) && $this->nmgp_cmp_hidden['genero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['genero']);
       $sStyleHidden_genero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_genero = 'display: none;';
   $sStyleReadInp_genero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['genero']) && $this->nmgp_cmp_readonly['genero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['genero']);
       $sStyleReadLab_genero = '';
       $sStyleReadInp_genero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['genero']) && $this->nmgp_cmp_hidden['genero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="genero" value="<?php echo $this->form_encode_input($genero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_genero_line" id="hidden_field_data_genero" style="<?php echo $sStyleHidden_genero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_genero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_genero_label" style=""><span id="id_label_genero"><?php echo $this->nm_new_label['genero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["genero"]) &&  $this->nmgp_cmp_readonly["genero"] == "on") { 

 if ("Masculino" == $this->genero) { $genero_look = "Masculino";} 
 if ("Transexual" == $this->genero) { $genero_look = "Transexual";} 
 if ("Femenino" == $this->genero) { $genero_look = "Femenino";} 
 if ("No binario" == $this->genero) { $genero_look = "No binario";} 
 if ("Otro" == $this->genero) { $genero_look = "Otro";} 
?>
<input type="hidden" name="genero" value="<?php echo $this->form_encode_input($genero) . "\">" . $genero_look . ""; ?>
<?php } else { ?>

<?php

 if ("Masculino" == $this->genero) { $genero_look = "Masculino";} 
 if ("Transexual" == $this->genero) { $genero_look = "Transexual";} 
 if ("Femenino" == $this->genero) { $genero_look = "Femenino";} 
 if ("No binario" == $this->genero) { $genero_look = "No binario";} 
 if ("Otro" == $this->genero) { $genero_look = "Otro";} 
?>
<span id="id_read_on_genero"  class="css_genero_line" style="<?php echo $sStyleReadLab_genero; ?>"><?php echo $this->form_format_readonly("genero", $this->form_encode_input($genero_look)); ?></span><span id="id_read_off_genero" class="css_read_off_genero css_genero_line" style="<?php echo $sStyleReadInp_genero; ?>"><div id="idAjaxRadio_genero" style="display: inline-block"  class="css_genero_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_genero_line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero sc-ui-radio-genero" type=radio name="genero" value="Masculino"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_genero'][] = 'Masculino'; ?>
<?php  if ("Masculino" == $this->genero)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Masculino</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_genero_line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero sc-ui-radio-genero" type=radio name="genero" value="Transexual"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_genero'][] = 'Transexual'; ?>
<?php  if ("Transexual" == $this->genero)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Transexual</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_genero_line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero" . $sc_seq_vert . "-3"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero sc-ui-radio-genero" type=radio name="genero" value="Femenino"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_genero'][] = 'Femenino'; ?>
<?php  if ("Femenino" == $this->genero)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Femenino</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_genero_line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero" . $sc_seq_vert . "-4"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero sc-ui-radio-genero" type=radio name="genero" value="No binario"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_genero'][] = 'No binario'; ?>
<?php  if ("No binario" == $this->genero)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">No binario</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_genero_line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero" . $sc_seq_vert . "-5"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero sc-ui-radio-genero" type=radio name="genero" value="Otro"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_genero'][] = 'Otro'; ?>
<?php  if ("Otro" == $this->genero)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Otro</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_genero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_genero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_tipo_evento']))
   {
       $this->nm_new_label['id_tipo_evento'] = "Tipo Evento";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_tipo_evento = $this->id_tipo_evento;
   $sStyleHidden_id_tipo_evento = '';
   if (isset($this->nmgp_cmp_hidden['id_tipo_evento']) && $this->nmgp_cmp_hidden['id_tipo_evento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_tipo_evento']);
       $sStyleHidden_id_tipo_evento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_tipo_evento = 'display: none;';
   $sStyleReadInp_id_tipo_evento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_tipo_evento']) && $this->nmgp_cmp_readonly['id_tipo_evento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_tipo_evento']);
       $sStyleReadLab_id_tipo_evento = '';
       $sStyleReadInp_id_tipo_evento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_tipo_evento']) && $this->nmgp_cmp_hidden['id_tipo_evento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_tipo_evento" value="<?php echo $this->form_encode_input($this->id_tipo_evento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_tipo_evento_line" id="hidden_field_data_id_tipo_evento" style="<?php echo $sStyleHidden_id_tipo_evento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_tipo_evento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_tipo_evento_label" style=""><span id="id_label_id_tipo_evento"><?php echo $this->nm_new_label['id_tipo_evento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_tipo_evento"]) &&  $this->nmgp_cmp_readonly["id_tipo_evento"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento'][] = $rs->fields[0];
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
   $x = 0; 
   $id_tipo_evento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_tipo_evento_1))
          {
              foreach ($this->id_tipo_evento_1 as $tmp_id_tipo_evento)
              {
                  if (trim($tmp_id_tipo_evento) === trim($cadaselect[1])) {$id_tipo_evento_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_tipo_evento) && trim($this->id_tipo_evento) === trim($cadaselect[1])) {$id_tipo_evento_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_tipo_evento" value="<?php echo $this->form_encode_input($id_tipo_evento) . "\">" . $id_tipo_evento_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_tipo_evento();
   $x = 0 ; 
   $id_tipo_evento_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_tipo_evento_1))
          {
              foreach ($this->id_tipo_evento_1 as $tmp_id_tipo_evento)
              {
                  if (trim($tmp_id_tipo_evento) === trim($cadaselect[1])) {$id_tipo_evento_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_tipo_evento) && trim($this->id_tipo_evento) === trim($cadaselect[1])) { $id_tipo_evento_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_tipo_evento_look))
          {
              $id_tipo_evento_look = $this->id_tipo_evento;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_tipo_evento\" class=\"css_id_tipo_evento_line\" style=\"" .  $sStyleReadLab_id_tipo_evento . "\">" . $this->form_format_readonly("id_tipo_evento", $this->form_encode_input($id_tipo_evento_look)) . "</span><span id=\"id_read_off_id_tipo_evento\" class=\"css_read_off_id_tipo_evento" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_tipo_evento . "\">";
   echo " <span id=\"idAjaxSelect_id_tipo_evento\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_tipo_evento_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_tipo_evento\" name=\"id_tipo_evento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_tipo_evento'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_tipo_evento) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_tipo_evento)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_tipo_evento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_tipo_evento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['circunstancias_emergencia']))
    {
        $this->nm_new_label['circunstancias_emergencia'] = "Situación que se presenta";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $circunstancias_emergencia = $this->circunstancias_emergencia;
   $sStyleHidden_circunstancias_emergencia = '';
   if (isset($this->nmgp_cmp_hidden['circunstancias_emergencia']) && $this->nmgp_cmp_hidden['circunstancias_emergencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['circunstancias_emergencia']);
       $sStyleHidden_circunstancias_emergencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_circunstancias_emergencia = 'display: none;';
   $sStyleReadInp_circunstancias_emergencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['circunstancias_emergencia']) && $this->nmgp_cmp_readonly['circunstancias_emergencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['circunstancias_emergencia']);
       $sStyleReadLab_circunstancias_emergencia = '';
       $sStyleReadInp_circunstancias_emergencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['circunstancias_emergencia']) && $this->nmgp_cmp_hidden['circunstancias_emergencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="circunstancias_emergencia" value="<?php echo $this->form_encode_input($circunstancias_emergencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_circunstancias_emergencia_line" id="hidden_field_data_circunstancias_emergencia" style="<?php echo $sStyleHidden_circunstancias_emergencia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_circunstancias_emergencia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_circunstancias_emergencia_label" style=""><span id="id_label_circunstancias_emergencia"><?php echo $this->nm_new_label['circunstancias_emergencia']; ?></span></span><br>
<?php
$circunstancias_emergencia_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($circunstancias_emergencia));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["circunstancias_emergencia"]) &&  $this->nmgp_cmp_readonly["circunstancias_emergencia"] == "on") { 

 ?>
<input type="hidden" name="circunstancias_emergencia" value="<?php echo $this->form_encode_input($circunstancias_emergencia) . "\">" . $circunstancias_emergencia_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_circunstancias_emergencia" class="sc-ui-readonly-circunstancias_emergencia css_circunstancias_emergencia_line" style="<?php echo $sStyleReadLab_circunstancias_emergencia; ?>"><?php echo $this->form_format_readonly("circunstancias_emergencia", str_replace(chr(10), "<br>", $this->form_encode_input($circunstancias_emergencia_val))); ?></span><span id="id_read_off_circunstancias_emergencia" class="css_read_off_circunstancias_emergencia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_circunstancias_emergencia; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_circunstancias_emergencia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="circunstancias_emergencia" id="id_sc_field_circunstancias_emergencia" rows="20" cols="50"
 alt="{datatype: 'text', maxLength: 2500, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $circunstancias_emergencia; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_circunstancias_emergencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_circunstancias_emergencia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_eps']))
   {
       $this->nm_new_label['id_eps'] = "Entidad aseguradora";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_eps = $this->id_eps;
   $sStyleHidden_id_eps = '';
   if (isset($this->nmgp_cmp_hidden['id_eps']) && $this->nmgp_cmp_hidden['id_eps'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_eps']);
       $sStyleHidden_id_eps = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_eps = 'display: none;';
   $sStyleReadInp_id_eps = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_eps']) && $this->nmgp_cmp_readonly['id_eps'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_eps']);
       $sStyleReadLab_id_eps = '';
       $sStyleReadInp_id_eps = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_eps']) && $this->nmgp_cmp_hidden['id_eps'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_eps" value="<?php echo $this->form_encode_input($this->id_eps) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_eps_line" id="hidden_field_data_id_eps" style="<?php echo $sStyleHidden_id_eps; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_eps_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_eps_label" style=""><span id="id_label_id_eps"><?php echo $this->nm_new_label['id_eps']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_eps"]) &&  $this->nmgp_cmp_readonly["id_eps"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps'][] = $rs->fields[0];
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
   $x = 0; 
   $id_eps_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_eps_1))
          {
              foreach ($this->id_eps_1 as $tmp_id_eps)
              {
                  if (trim($tmp_id_eps) === trim($cadaselect[1])) {$id_eps_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_eps) && trim($this->id_eps) === trim($cadaselect[1])) {$id_eps_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_eps" value="<?php echo $this->form_encode_input($id_eps) . "\">" . $id_eps_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_eps();
   $x = 0 ; 
   $id_eps_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_eps_1))
          {
              foreach ($this->id_eps_1 as $tmp_id_eps)
              {
                  if (trim($tmp_id_eps) === trim($cadaselect[1])) {$id_eps_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_eps) && trim($this->id_eps) === trim($cadaselect[1])) { $id_eps_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_eps_look))
          {
              $id_eps_look = $this->id_eps;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_eps\" class=\"css_id_eps_line\" style=\"" .  $sStyleReadLab_id_eps . "\">" . $this->form_format_readonly("id_eps", $this->form_encode_input($id_eps_look)) . "</span><span id=\"id_read_off_id_eps\" class=\"css_read_off_id_eps" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_eps . "\">";
   echo " <span id=\"idAjaxSelect_id_eps\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_eps_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_eps\" name=\"id_eps\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_eps'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_eps) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_eps)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_eps_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_eps_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_seguridad_social']))
   {
       $this->nm_new_label['id_seguridad_social'] = "Regimen";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_seguridad_social = $this->id_seguridad_social;
   $sStyleHidden_id_seguridad_social = '';
   if (isset($this->nmgp_cmp_hidden['id_seguridad_social']) && $this->nmgp_cmp_hidden['id_seguridad_social'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_seguridad_social']);
       $sStyleHidden_id_seguridad_social = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_seguridad_social = 'display: none;';
   $sStyleReadInp_id_seguridad_social = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_seguridad_social']) && $this->nmgp_cmp_readonly['id_seguridad_social'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_seguridad_social']);
       $sStyleReadLab_id_seguridad_social = '';
       $sStyleReadInp_id_seguridad_social = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_seguridad_social']) && $this->nmgp_cmp_hidden['id_seguridad_social'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_seguridad_social" value="<?php echo $this->form_encode_input($this->id_seguridad_social) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_seguridad_social_line" id="hidden_field_data_id_seguridad_social" style="<?php echo $sStyleHidden_id_seguridad_social; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_seguridad_social_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_seguridad_social_label" style=""><span id="id_label_id_seguridad_social"><?php echo $this->nm_new_label['id_seguridad_social']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['php_cmp_required']['id_seguridad_social']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['php_cmp_required']['id_seguridad_social'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_seguridad_social"]) &&  $this->nmgp_cmp_readonly["id_seguridad_social"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social'][] = $rs->fields[0];
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
   $x = 0; 
   $id_seguridad_social_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_seguridad_social_1))
          {
              foreach ($this->id_seguridad_social_1 as $tmp_id_seguridad_social)
              {
                  if (trim($tmp_id_seguridad_social) === trim($cadaselect[1])) {$id_seguridad_social_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_seguridad_social) && trim($this->id_seguridad_social) === trim($cadaselect[1])) {$id_seguridad_social_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_seguridad_social" value="<?php echo $this->form_encode_input($id_seguridad_social) . "\">" . $id_seguridad_social_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_seguridad_social();
   $x = 0 ; 
   $id_seguridad_social_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_seguridad_social_1))
          {
              foreach ($this->id_seguridad_social_1 as $tmp_id_seguridad_social)
              {
                  if (trim($tmp_id_seguridad_social) === trim($cadaselect[1])) {$id_seguridad_social_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_seguridad_social) && trim($this->id_seguridad_social) === trim($cadaselect[1])) { $id_seguridad_social_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_seguridad_social_look))
          {
              $id_seguridad_social_look = $this->id_seguridad_social;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_seguridad_social\" class=\"css_id_seguridad_social_line\" style=\"" .  $sStyleReadLab_id_seguridad_social . "\">" . $this->form_format_readonly("id_seguridad_social", $this->form_encode_input($id_seguridad_social_look)) . "</span><span id=\"id_read_off_id_seguridad_social\" class=\"css_read_off_id_seguridad_social" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_seguridad_social . "\">";
   echo " <span id=\"idAjaxSelect_id_seguridad_social\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_seguridad_social_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_seguridad_social\" name=\"id_seguridad_social\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_seguridad_social'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_seguridad_social) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_seguridad_social)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_seguridad_social_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_seguridad_social_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['zona']))
   {
       $this->nm_new_label['zona'] = "Zona";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zona = $this->zona;
   $sStyleHidden_zona = '';
   if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zona']);
       $sStyleHidden_zona = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zona = 'display: none;';
   $sStyleReadInp_zona = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zona']) && $this->nmgp_cmp_readonly['zona'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zona']);
       $sStyleReadLab_zona = '';
       $sStyleReadInp_zona = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zona" value="<?php echo $this->form_encode_input($this->zona) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zona_line" id="hidden_field_data_zona" style="<?php echo $sStyleHidden_zona; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zona_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_zona_label" style=""><span id="id_label_zona"><?php echo $this->nm_new_label['zona']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zona"]) &&  $this->nmgp_cmp_readonly["zona"] == "on") { 

$zona_look = "";
 if ($this->zona == "SUR") { $zona_look .= "SUR" ;} 
 if ($this->zona == "NORTE") { $zona_look .= "NORTE" ;} 
 if ($this->zona == "ORIENTE") { $zona_look .= "ORIENTE" ;} 
 if ($this->zona == "OCCIDENTE") { $zona_look .= "OCCIDENBTE" ;} 
 if ($this->zona == "RURAL") { $zona_look .= "RURAL" ;} 
 if ($this->zona == "CENTRO") { $zona_look .= "CENTRO" ;} 
 if (empty($zona_look)) { $zona_look = $this->zona; }
?>
<input type="hidden" name="zona" value="<?php echo $this->form_encode_input($zona) . "\">" . $zona_look . ""; ?>
<?php } else { ?>
<?php

$zona_look = "";
 if ($this->zona == "SUR") { $zona_look .= "SUR" ;} 
 if ($this->zona == "NORTE") { $zona_look .= "NORTE" ;} 
 if ($this->zona == "ORIENTE") { $zona_look .= "ORIENTE" ;} 
 if ($this->zona == "OCCIDENTE") { $zona_look .= "OCCIDENBTE" ;} 
 if ($this->zona == "RURAL") { $zona_look .= "RURAL" ;} 
 if ($this->zona == "CENTRO") { $zona_look .= "CENTRO" ;} 
 if (empty($zona_look)) { $zona_look = $this->zona; }
?>
<span id="id_read_on_zona" class="css_zona_line"  style="<?php echo $sStyleReadLab_zona; ?>"><?php echo $this->form_format_readonly("zona", $this->form_encode_input($zona_look)); ?></span><span id="id_read_off_zona" class="css_read_off_zona<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_zona; ?>">
 <span id="idAjaxSelect_zona" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_zona_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_zona" name="zona" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="SUR" <?php  if ($this->zona == "SUR") { echo " selected" ;} ?>>SUR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = 'SUR'; ?>
 <option  value="NORTE" <?php  if ($this->zona == "NORTE") { echo " selected" ;} ?>>NORTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = 'NORTE'; ?>
 <option  value="ORIENTE" <?php  if ($this->zona == "ORIENTE") { echo " selected" ;} ?>>ORIENTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = 'ORIENTE'; ?>
 <option  value="OCCIDENTE" <?php  if ($this->zona == "OCCIDENTE") { echo " selected" ;} ?>>OCCIDENBTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = 'OCCIDENTE'; ?>
 <option  value="RURAL" <?php  if ($this->zona == "RURAL") { echo " selected" ;} ?>>RURAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = 'RURAL'; ?>
 <option  value="CENTRO" <?php  if ($this->zona == "CENTRO") { echo " selected" ;} ?>>CENTRO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_zona'][] = 'CENTRO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zona_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zona_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_servicio']))
   {
       $this->nm_new_label['tipo_servicio'] = "Tipo Servicio";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_servicio = $this->tipo_servicio;
   $sStyleHidden_tipo_servicio = '';
   if (isset($this->nmgp_cmp_hidden['tipo_servicio']) && $this->nmgp_cmp_hidden['tipo_servicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_servicio']);
       $sStyleHidden_tipo_servicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_servicio = 'display: none;';
   $sStyleReadInp_tipo_servicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_servicio']) && $this->nmgp_cmp_readonly['tipo_servicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_servicio']);
       $sStyleReadLab_tipo_servicio = '';
       $sStyleReadInp_tipo_servicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_servicio']) && $this->nmgp_cmp_hidden['tipo_servicio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_servicio" value="<?php echo $this->form_encode_input($this->tipo_servicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_servicio_line" id="hidden_field_data_tipo_servicio" style="<?php echo $sStyleHidden_tipo_servicio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_servicio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_tipo_servicio_label" style=""><span id="id_label_tipo_servicio"><?php echo $this->nm_new_label['tipo_servicio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_servicio"]) &&  $this->nmgp_cmp_readonly["tipo_servicio"] == "on") { 

$tipo_servicio_look = "";
 if ($this->tipo_servicio == "Ambulancia") { $tipo_servicio_look .= "Ambulancia" ;} 
 if ($this->tipo_servicio == "Referencia y contrareferencia") { $tipo_servicio_look .= "Referencia y contrareferencia" ;} 
 if ($this->tipo_servicio == "TAB") { $tipo_servicio_look .= "TAB" ;} 
 if ($this->tipo_servicio == "Otros") { $tipo_servicio_look .= "Otros" ;} 
 if (empty($tipo_servicio_look)) { $tipo_servicio_look = $this->tipo_servicio; }
?>
<input type="hidden" name="tipo_servicio" value="<?php echo $this->form_encode_input($tipo_servicio) . "\">" . $tipo_servicio_look . ""; ?>
<?php } else { ?>
<?php

$tipo_servicio_look = "";
 if ($this->tipo_servicio == "Ambulancia") { $tipo_servicio_look .= "Ambulancia" ;} 
 if ($this->tipo_servicio == "Referencia y contrareferencia") { $tipo_servicio_look .= "Referencia y contrareferencia" ;} 
 if ($this->tipo_servicio == "TAB") { $tipo_servicio_look .= "TAB" ;} 
 if ($this->tipo_servicio == "Otros") { $tipo_servicio_look .= "Otros" ;} 
 if (empty($tipo_servicio_look)) { $tipo_servicio_look = $this->tipo_servicio; }
?>
<span id="id_read_on_tipo_servicio" class="css_tipo_servicio_line"  style="<?php echo $sStyleReadLab_tipo_servicio; ?>"><?php echo $this->form_format_readonly("tipo_servicio", $this->form_encode_input($tipo_servicio_look)); ?></span><span id="id_read_off_tipo_servicio" class="css_read_off_tipo_servicio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_servicio; ?>">
 <span id="idAjaxSelect_tipo_servicio" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_servicio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_servicio" name="tipo_servicio" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_servicio'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="Ambulancia" <?php  if ($this->tipo_servicio == "Ambulancia") { echo " selected" ;} ?>>Ambulancia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_servicio'][] = 'Ambulancia'; ?>
 <option  value="Referencia y contrareferencia" <?php  if ($this->tipo_servicio == "Referencia y contrareferencia") { echo " selected" ;} ?>>Referencia y contrareferencia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_servicio'][] = 'Referencia y contrareferencia'; ?>
 <option  value="TAB" <?php  if ($this->tipo_servicio == "TAB") { echo " selected" ;} ?>>TAB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_servicio'][] = 'TAB'; ?>
 <option  value="Otros" <?php  if ($this->tipo_servicio == "Otros") { echo " selected" ;} ?>>Otros</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_servicio'][] = 'Otros'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_servicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_servicio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_barrio']))
   {
       $this->nm_new_label['id_barrio'] = "Barrio";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_barrio = $this->id_barrio;
   $sStyleHidden_id_barrio = '';
   if (isset($this->nmgp_cmp_hidden['id_barrio']) && $this->nmgp_cmp_hidden['id_barrio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_barrio']);
       $sStyleHidden_id_barrio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_barrio = 'display: none;';
   $sStyleReadInp_id_barrio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_barrio']) && $this->nmgp_cmp_readonly['id_barrio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_barrio']);
       $sStyleReadLab_id_barrio = '';
       $sStyleReadInp_id_barrio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_barrio']) && $this->nmgp_cmp_hidden['id_barrio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_barrio" value="<?php echo $this->form_encode_input($this->id_barrio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_barrio_line" id="hidden_field_data_id_barrio" style="<?php echo $sStyleHidden_id_barrio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_barrio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_barrio_label" style=""><span id="id_label_id_barrio"><?php echo $this->nm_new_label['id_barrio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_barrio"]) &&  $this->nmgp_cmp_readonly["id_barrio"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio'][] = $rs->fields[0];
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
   $x = 0; 
   $id_barrio_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_barrio_1))
          {
              foreach ($this->id_barrio_1 as $tmp_id_barrio)
              {
                  if (trim($tmp_id_barrio) === trim($cadaselect[1])) {$id_barrio_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_barrio) && trim($this->id_barrio) === trim($cadaselect[1])) {$id_barrio_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_barrio" value="<?php echo $this->form_encode_input($id_barrio) . "\">" . $id_barrio_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_barrio();
   $x = 0 ; 
   $id_barrio_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_barrio_1))
          {
              foreach ($this->id_barrio_1 as $tmp_id_barrio)
              {
                  if (trim($tmp_id_barrio) === trim($cadaselect[1])) {$id_barrio_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_barrio) && trim($this->id_barrio) === trim($cadaselect[1])) { $id_barrio_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_barrio_look))
          {
              $id_barrio_look = $this->id_barrio;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_barrio\" class=\"css_id_barrio_line\" style=\"" .  $sStyleReadLab_id_barrio . "\">" . $this->form_format_readonly("id_barrio", $this->form_encode_input($id_barrio_look)) . "</span><span id=\"id_read_off_id_barrio\" class=\"css_read_off_id_barrio" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_barrio . "\">";
   echo " <span id=\"idAjaxSelect_id_barrio\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_barrio_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_barrio\" name=\"id_barrio\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_barrio'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_barrio) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_barrio)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_barrio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_barrio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direccion_servicio']))
    {
        $this->nm_new_label['direccion_servicio'] = "Direccion Servicio";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $direccion_servicio = $this->direccion_servicio;
   $sStyleHidden_direccion_servicio = '';
   if (isset($this->nmgp_cmp_hidden['direccion_servicio']) && $this->nmgp_cmp_hidden['direccion_servicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['direccion_servicio']);
       $sStyleHidden_direccion_servicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_direccion_servicio = 'display: none;';
   $sStyleReadInp_direccion_servicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['direccion_servicio']) && $this->nmgp_cmp_readonly['direccion_servicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['direccion_servicio']);
       $sStyleReadLab_direccion_servicio = '';
       $sStyleReadInp_direccion_servicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['direccion_servicio']) && $this->nmgp_cmp_hidden['direccion_servicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion_servicio" value="<?php echo $this->form_encode_input($direccion_servicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_direccion_servicio_line" id="hidden_field_data_direccion_servicio" style="<?php echo $sStyleHidden_direccion_servicio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_servicio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_direccion_servicio_label" style=""><span id="id_label_direccion_servicio"><?php echo $this->nm_new_label['direccion_servicio']; ?></span></span><br>
<?php
$direccion_servicio_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($direccion_servicio));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion_servicio"]) &&  $this->nmgp_cmp_readonly["direccion_servicio"] == "on") { 

 ?>
<input type="hidden" name="direccion_servicio" value="<?php echo $this->form_encode_input($direccion_servicio) . "\">" . $direccion_servicio_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion_servicio" class="sc-ui-readonly-direccion_servicio css_direccion_servicio_line" style="<?php echo $sStyleReadLab_direccion_servicio; ?>"><?php echo $this->form_format_readonly("direccion_servicio", str_replace(chr(10), "<br>", $this->form_encode_input($direccion_servicio_val))); ?></span><span id="id_read_off_direccion_servicio" class="css_read_off_direccion_servicio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion_servicio; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_direccion_servicio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="direccion_servicio" id="id_sc_field_direccion_servicio" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $direccion_servicio; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_servicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_servicio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hora_ingreso_llamada']))
    {
        $this->nm_new_label['hora_ingreso_llamada'] = "Hora Ingreso Llamada";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_ingreso_llamada = $this->hora_ingreso_llamada;
   $sStyleHidden_hora_ingreso_llamada = '';
   if (isset($this->nmgp_cmp_hidden['hora_ingreso_llamada']) && $this->nmgp_cmp_hidden['hora_ingreso_llamada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_ingreso_llamada']);
       $sStyleHidden_hora_ingreso_llamada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_ingreso_llamada = 'display: none;';
   $sStyleReadInp_hora_ingreso_llamada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_ingreso_llamada']) && $this->nmgp_cmp_readonly['hora_ingreso_llamada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_ingreso_llamada']);
       $sStyleReadLab_hora_ingreso_llamada = '';
       $sStyleReadInp_hora_ingreso_llamada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_ingreso_llamada']) && $this->nmgp_cmp_hidden['hora_ingreso_llamada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_ingreso_llamada" value="<?php echo $this->form_encode_input($hora_ingreso_llamada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_ingreso_llamada_line" id="hidden_field_data_hora_ingreso_llamada" style="<?php echo $sStyleHidden_hora_ingreso_llamada; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_ingreso_llamada_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_hora_ingreso_llamada_label" style=""><span id="id_label_hora_ingreso_llamada"><?php echo $this->nm_new_label['hora_ingreso_llamada']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_ingreso_llamada"]) &&  $this->nmgp_cmp_readonly["hora_ingreso_llamada"] == "on") { 

 ?>
<input type="hidden" name="hora_ingreso_llamada" value="<?php echo $this->form_encode_input($hora_ingreso_llamada) . "\">" . $hora_ingreso_llamada . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_ingreso_llamada" class="sc-ui-readonly-hora_ingreso_llamada css_hora_ingreso_llamada_line" style="<?php echo $sStyleReadLab_hora_ingreso_llamada; ?>"><?php echo $this->form_format_readonly("hora_ingreso_llamada", $this->form_encode_input($hora_ingreso_llamada)); ?></span><span id="id_read_off_hora_ingreso_llamada" class="css_read_off_hora_ingreso_llamada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_ingreso_llamada; ?>"><?php
$tmp_form_data = $this->field_config['hora_ingreso_llamada']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_ingreso_llamada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_ingreso_llamada" type=text name="hora_ingreso_llamada" value="<?php echo $this->form_encode_input($hora_ingreso_llamada) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_ingreso_llamada']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_ingreso_llamada']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_ingreso_llamada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_ingreso_llamada_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hora_notifica_movil']))
    {
        $this->nm_new_label['hora_notifica_movil'] = "Hora Notifica Movil";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_notifica_movil = $this->hora_notifica_movil;
   $sStyleHidden_hora_notifica_movil = '';
   if (isset($this->nmgp_cmp_hidden['hora_notifica_movil']) && $this->nmgp_cmp_hidden['hora_notifica_movil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_notifica_movil']);
       $sStyleHidden_hora_notifica_movil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_notifica_movil = 'display: none;';
   $sStyleReadInp_hora_notifica_movil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_notifica_movil']) && $this->nmgp_cmp_readonly['hora_notifica_movil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_notifica_movil']);
       $sStyleReadLab_hora_notifica_movil = '';
       $sStyleReadInp_hora_notifica_movil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_notifica_movil']) && $this->nmgp_cmp_hidden['hora_notifica_movil'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_notifica_movil" value="<?php echo $this->form_encode_input($hora_notifica_movil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_notifica_movil_line" id="hidden_field_data_hora_notifica_movil" style="<?php echo $sStyleHidden_hora_notifica_movil; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_notifica_movil_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_hora_notifica_movil_label" style=""><span id="id_label_hora_notifica_movil"><?php echo $this->nm_new_label['hora_notifica_movil']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_notifica_movil"]) &&  $this->nmgp_cmp_readonly["hora_notifica_movil"] == "on") { 

 ?>
<input type="hidden" name="hora_notifica_movil" value="<?php echo $this->form_encode_input($hora_notifica_movil) . "\">" . $hora_notifica_movil . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_notifica_movil" class="sc-ui-readonly-hora_notifica_movil css_hora_notifica_movil_line" style="<?php echo $sStyleReadLab_hora_notifica_movil; ?>"><?php echo $this->form_format_readonly("hora_notifica_movil", $this->form_encode_input($hora_notifica_movil)); ?></span><span id="id_read_off_hora_notifica_movil" class="css_read_off_hora_notifica_movil<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_notifica_movil; ?>"><?php
$tmp_form_data = $this->field_config['hora_notifica_movil']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_notifica_movil_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_notifica_movil" type=text name="hora_notifica_movil" value="<?php echo $this->form_encode_input($hora_notifica_movil) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_notifica_movil']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_notifica_movil']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_notifica_movil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_notifica_movil_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hora_llegada_sitio']))
    {
        $this->nm_new_label['hora_llegada_sitio'] = "Hora Llegada Sitio";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_llegada_sitio = $this->hora_llegada_sitio;
   $sStyleHidden_hora_llegada_sitio = '';
   if (isset($this->nmgp_cmp_hidden['hora_llegada_sitio']) && $this->nmgp_cmp_hidden['hora_llegada_sitio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_llegada_sitio']);
       $sStyleHidden_hora_llegada_sitio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_llegada_sitio = 'display: none;';
   $sStyleReadInp_hora_llegada_sitio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_llegada_sitio']) && $this->nmgp_cmp_readonly['hora_llegada_sitio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_llegada_sitio']);
       $sStyleReadLab_hora_llegada_sitio = '';
       $sStyleReadInp_hora_llegada_sitio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_llegada_sitio']) && $this->nmgp_cmp_hidden['hora_llegada_sitio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_llegada_sitio" value="<?php echo $this->form_encode_input($hora_llegada_sitio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_llegada_sitio_line" id="hidden_field_data_hora_llegada_sitio" style="<?php echo $sStyleHidden_hora_llegada_sitio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_llegada_sitio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_hora_llegada_sitio_label" style=""><span id="id_label_hora_llegada_sitio"><?php echo $this->nm_new_label['hora_llegada_sitio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_llegada_sitio"]) &&  $this->nmgp_cmp_readonly["hora_llegada_sitio"] == "on") { 

 ?>
<input type="hidden" name="hora_llegada_sitio" value="<?php echo $this->form_encode_input($hora_llegada_sitio) . "\">" . $hora_llegada_sitio . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_llegada_sitio" class="sc-ui-readonly-hora_llegada_sitio css_hora_llegada_sitio_line" style="<?php echo $sStyleReadLab_hora_llegada_sitio; ?>"><?php echo $this->form_format_readonly("hora_llegada_sitio", $this->form_encode_input($hora_llegada_sitio)); ?></span><span id="id_read_off_hora_llegada_sitio" class="css_read_off_hora_llegada_sitio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_llegada_sitio; ?>"><?php
$tmp_form_data = $this->field_config['hora_llegada_sitio']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_llegada_sitio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_llegada_sitio" type=text name="hora_llegada_sitio" value="<?php echo $this->form_encode_input($hora_llegada_sitio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_llegada_sitio']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_llegada_sitio']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_llegada_sitio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_llegada_sitio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hora_llegada_ips']))
    {
        $this->nm_new_label['hora_llegada_ips'] = "Hora Llegada Ips";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_llegada_ips = $this->hora_llegada_ips;
   $sStyleHidden_hora_llegada_ips = '';
   if (isset($this->nmgp_cmp_hidden['hora_llegada_ips']) && $this->nmgp_cmp_hidden['hora_llegada_ips'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_llegada_ips']);
       $sStyleHidden_hora_llegada_ips = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_llegada_ips = 'display: none;';
   $sStyleReadInp_hora_llegada_ips = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_llegada_ips']) && $this->nmgp_cmp_readonly['hora_llegada_ips'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_llegada_ips']);
       $sStyleReadLab_hora_llegada_ips = '';
       $sStyleReadInp_hora_llegada_ips = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_llegada_ips']) && $this->nmgp_cmp_hidden['hora_llegada_ips'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_llegada_ips" value="<?php echo $this->form_encode_input($hora_llegada_ips) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_llegada_ips_line" id="hidden_field_data_hora_llegada_ips" style="<?php echo $sStyleHidden_hora_llegada_ips; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_llegada_ips_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_hora_llegada_ips_label" style=""><span id="id_label_hora_llegada_ips"><?php echo $this->nm_new_label['hora_llegada_ips']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_llegada_ips"]) &&  $this->nmgp_cmp_readonly["hora_llegada_ips"] == "on") { 

 ?>
<input type="hidden" name="hora_llegada_ips" value="<?php echo $this->form_encode_input($hora_llegada_ips) . "\">" . $hora_llegada_ips . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_llegada_ips" class="sc-ui-readonly-hora_llegada_ips css_hora_llegada_ips_line" style="<?php echo $sStyleReadLab_hora_llegada_ips; ?>"><?php echo $this->form_format_readonly("hora_llegada_ips", $this->form_encode_input($hora_llegada_ips)); ?></span><span id="id_read_off_hora_llegada_ips" class="css_read_off_hora_llegada_ips<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_llegada_ips; ?>"><?php
$tmp_form_data = $this->field_config['hora_llegada_ips']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_llegada_ips_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_llegada_ips" type=text name="hora_llegada_ips" value="<?php echo $this->form_encode_input($hora_llegada_ips) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_llegada_ips']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_llegada_ips']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_llegada_ips_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_llegada_ips_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['hora_salida_ips']))
    {
        $this->nm_new_label['hora_salida_ips'] = "Hora Salida Ips";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_salida_ips = $this->hora_salida_ips;
   $sStyleHidden_hora_salida_ips = '';
   if (isset($this->nmgp_cmp_hidden['hora_salida_ips']) && $this->nmgp_cmp_hidden['hora_salida_ips'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_salida_ips']);
       $sStyleHidden_hora_salida_ips = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_salida_ips = 'display: none;';
   $sStyleReadInp_hora_salida_ips = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_salida_ips']) && $this->nmgp_cmp_readonly['hora_salida_ips'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_salida_ips']);
       $sStyleReadLab_hora_salida_ips = '';
       $sStyleReadInp_hora_salida_ips = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_salida_ips']) && $this->nmgp_cmp_hidden['hora_salida_ips'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_salida_ips" value="<?php echo $this->form_encode_input($hora_salida_ips) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_salida_ips_line" id="hidden_field_data_hora_salida_ips" style="<?php echo $sStyleHidden_hora_salida_ips; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_salida_ips_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_hora_salida_ips_label" style=""><span id="id_label_hora_salida_ips"><?php echo $this->nm_new_label['hora_salida_ips']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_salida_ips"]) &&  $this->nmgp_cmp_readonly["hora_salida_ips"] == "on") { 

 ?>
<input type="hidden" name="hora_salida_ips" value="<?php echo $this->form_encode_input($hora_salida_ips) . "\">" . $hora_salida_ips . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_salida_ips" class="sc-ui-readonly-hora_salida_ips css_hora_salida_ips_line" style="<?php echo $sStyleReadLab_hora_salida_ips; ?>"><?php echo $this->form_format_readonly("hora_salida_ips", $this->form_encode_input($hora_salida_ips)); ?></span><span id="id_read_off_hora_salida_ips" class="css_read_off_hora_salida_ips<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_salida_ips; ?>"><?php
$tmp_form_data = $this->field_config['hora_salida_ips']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_salida_ips_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_salida_ips" type=text name="hora_salida_ips" value="<?php echo $this->form_encode_input($hora_salida_ips) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_salida_ips']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_salida_ips']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_salida_ips_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_salida_ips_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_movil']))
   {
       $this->nm_new_label['id_movil'] = "Vehículo que atendio";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_movil = $this->id_movil;
   $sStyleHidden_id_movil = '';
   if (isset($this->nmgp_cmp_hidden['id_movil']) && $this->nmgp_cmp_hidden['id_movil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_movil']);
       $sStyleHidden_id_movil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_movil = 'display: none;';
   $sStyleReadInp_id_movil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_movil']) && $this->nmgp_cmp_readonly['id_movil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_movil']);
       $sStyleReadLab_id_movil = '';
       $sStyleReadInp_id_movil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_movil']) && $this->nmgp_cmp_hidden['id_movil'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_movil" value="<?php echo $this->form_encode_input($this->id_movil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_movil_line" id="hidden_field_data_id_movil" style="<?php echo $sStyleHidden_id_movil; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_movil_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_movil_label" style=""><span id="id_label_id_movil"><?php echo $this->nm_new_label['id_movil']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['php_cmp_required']['id_movil']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['php_cmp_required']['id_movil'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_movil"]) &&  $this->nmgp_cmp_readonly["id_movil"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil'][] = $rs->fields[0];
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
   $x = 0; 
   $id_movil_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_movil_1))
          {
              foreach ($this->id_movil_1 as $tmp_id_movil)
              {
                  if (trim($tmp_id_movil) === trim($cadaselect[1])) {$id_movil_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_movil) && trim($this->id_movil) === trim($cadaselect[1])) {$id_movil_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_movil" value="<?php echo $this->form_encode_input($id_movil) . "\">" . $id_movil_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_movil();
   $x = 0 ; 
   $id_movil_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_movil_1))
          {
              foreach ($this->id_movil_1 as $tmp_id_movil)
              {
                  if (trim($tmp_id_movil) === trim($cadaselect[1])) {$id_movil_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_movil) && trim($this->id_movil) === trim($cadaselect[1])) { $id_movil_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_movil_look))
          {
              $id_movil_look = $this->id_movil;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_movil\" class=\"css_id_movil_line\" style=\"" .  $sStyleReadLab_id_movil . "\">" . $this->form_format_readonly("id_movil", $this->form_encode_input($id_movil_look)) . "</span><span id=\"id_read_off_id_movil\" class=\"css_read_off_id_movil" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_movil . "\">";
   echo " <span id=\"idAjaxSelect_id_movil\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_movil_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_movil\" name=\"id_movil\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_movil'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_movil) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_movil)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_movil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_movil_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_ips']))
   {
       $this->nm_new_label['id_ips'] = "Direccionamiento";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_ips = $this->id_ips;
   $sStyleHidden_id_ips = '';
   if (isset($this->nmgp_cmp_hidden['id_ips']) && $this->nmgp_cmp_hidden['id_ips'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_ips']);
       $sStyleHidden_id_ips = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_ips = 'display: none;';
   $sStyleReadInp_id_ips = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_ips']) && $this->nmgp_cmp_readonly['id_ips'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_ips']);
       $sStyleReadLab_id_ips = '';
       $sStyleReadInp_id_ips = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_ips']) && $this->nmgp_cmp_hidden['id_ips'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_ips" value="<?php echo $this->form_encode_input($this->id_ips) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_ips_line" id="hidden_field_data_id_ips" style="<?php echo $sStyleHidden_id_ips; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_ips_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_ips_label" style=""><span id="id_label_id_ips"><?php echo $this->nm_new_label['id_ips']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_ips"]) &&  $this->nmgp_cmp_readonly["id_ips"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips'][] = $rs->fields[0];
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
   $x = 0; 
   $id_ips_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_ips_1))
          {
              foreach ($this->id_ips_1 as $tmp_id_ips)
              {
                  if (trim($tmp_id_ips) === trim($cadaselect[1])) {$id_ips_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_ips) && trim($this->id_ips) === trim($cadaselect[1])) {$id_ips_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_ips" value="<?php echo $this->form_encode_input($id_ips) . "\">" . $id_ips_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_ips();
   $x = 0 ; 
   $id_ips_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_ips_1))
          {
              foreach ($this->id_ips_1 as $tmp_id_ips)
              {
                  if (trim($tmp_id_ips) === trim($cadaselect[1])) {$id_ips_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_ips) && trim($this->id_ips) === trim($cadaselect[1])) { $id_ips_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_ips_look))
          {
              $id_ips_look = $this->id_ips;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_ips\" class=\"css_id_ips_line\" style=\"" .  $sStyleReadLab_id_ips . "\">" . $this->form_format_readonly("id_ips", $this->form_encode_input($id_ips_look)) . "</span><span id=\"id_read_off_id_ips\" class=\"css_read_off_id_ips" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_ips . "\">";
   echo " <span id=\"idAjaxSelect_id_ips\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_ips_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_ips\" name=\"id_ips\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ips'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_ips) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_ips)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_ips_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_ips_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_caso']))
   {
       $this->nm_new_label['tipo_caso'] = "Tipo Caso";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_caso = $this->tipo_caso;
   $sStyleHidden_tipo_caso = '';
   if (isset($this->nmgp_cmp_hidden['tipo_caso']) && $this->nmgp_cmp_hidden['tipo_caso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_caso']);
       $sStyleHidden_tipo_caso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_caso = 'display: none;';
   $sStyleReadInp_tipo_caso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_caso']) && $this->nmgp_cmp_readonly['tipo_caso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_caso']);
       $sStyleReadLab_tipo_caso = '';
       $sStyleReadInp_tipo_caso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_caso']) && $this->nmgp_cmp_hidden['tipo_caso'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_caso" value="<?php echo $this->form_encode_input($this->tipo_caso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_caso_line" id="hidden_field_data_tipo_caso" style="<?php echo $sStyleHidden_tipo_caso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_caso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_tipo_caso_label" style=""><span id="id_label_tipo_caso"><?php echo $this->nm_new_label['tipo_caso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_caso"]) &&  $this->nmgp_cmp_readonly["tipo_caso"] == "on") { 

$tipo_caso_look = "";
 if ($this->tipo_caso == "EFECTIVO") { $tipo_caso_look .= "EFECTIVO" ;} 
 if ($this->tipo_caso == "NO EFECTIVO") { $tipo_caso_look .= "NO EFECTIVO" ;} 
 if ($this->tipo_caso == "FALLIDO") { $tipo_caso_look .= "FALLIDO" ;} 
 if ($this->tipo_caso == "APOYO PSICOSOCIAL") { $tipo_caso_look .= "APOYO PSICOSOCIAL" ;} 
 if ($this->tipo_caso == "APH") { $tipo_caso_look .= "APH" ;} 
 if ($this->tipo_caso == "ASESORIA MEDICA TELEFONICA") { $tipo_caso_look .= "ASESORIA MEDICA TELEFONICA" ;} 
 if (empty($tipo_caso_look)) { $tipo_caso_look = $this->tipo_caso; }
?>
<input type="hidden" name="tipo_caso" value="<?php echo $this->form_encode_input($tipo_caso) . "\">" . $tipo_caso_look . ""; ?>
<?php } else { ?>
<?php

$tipo_caso_look = "";
 if ($this->tipo_caso == "EFECTIVO") { $tipo_caso_look .= "EFECTIVO" ;} 
 if ($this->tipo_caso == "NO EFECTIVO") { $tipo_caso_look .= "NO EFECTIVO" ;} 
 if ($this->tipo_caso == "FALLIDO") { $tipo_caso_look .= "FALLIDO" ;} 
 if ($this->tipo_caso == "APOYO PSICOSOCIAL") { $tipo_caso_look .= "APOYO PSICOSOCIAL" ;} 
 if ($this->tipo_caso == "APH") { $tipo_caso_look .= "APH" ;} 
 if ($this->tipo_caso == "ASESORIA MEDICA TELEFONICA") { $tipo_caso_look .= "ASESORIA MEDICA TELEFONICA" ;} 
 if (empty($tipo_caso_look)) { $tipo_caso_look = $this->tipo_caso; }
?>
<span id="id_read_on_tipo_caso" class="css_tipo_caso_line"  style="<?php echo $sStyleReadLab_tipo_caso; ?>"><?php echo $this->form_format_readonly("tipo_caso", $this->form_encode_input($tipo_caso_look)); ?></span><span id="id_read_off_tipo_caso" class="css_read_off_tipo_caso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_caso; ?>">
 <span id="idAjaxSelect_tipo_caso" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_caso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_caso" name="tipo_caso" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="EFECTIVO" <?php  if ($this->tipo_caso == "EFECTIVO") { echo " selected" ;} ?>>EFECTIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = 'EFECTIVO'; ?>
 <option  value="NO EFECTIVO" <?php  if ($this->tipo_caso == "NO EFECTIVO") { echo " selected" ;} ?>>NO EFECTIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = 'NO EFECTIVO'; ?>
 <option  value="FALLIDO" <?php  if ($this->tipo_caso == "FALLIDO") { echo " selected" ;} ?>>FALLIDO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = 'FALLIDO'; ?>
 <option  value="APOYO PSICOSOCIAL" <?php  if ($this->tipo_caso == "APOYO PSICOSOCIAL") { echo " selected" ;} ?>>APOYO PSICOSOCIAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = 'APOYO PSICOSOCIAL'; ?>
 <option  value="APH" <?php  if ($this->tipo_caso == "APH") { echo " selected" ;} ?>>APH</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = 'APH'; ?>
 <option  value="ASESORIA MEDICA TELEFONICA" <?php  if ($this->tipo_caso == "ASESORIA MEDICA TELEFONICA") { echo " selected" ;} ?>>ASESORIA MEDICA TELEFONICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_tipo_caso'][] = 'ASESORIA MEDICA TELEFONICA'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_caso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_caso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_medico']))
   {
       $this->nm_new_label['id_medico'] = "Medico Regulador";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_medico = $this->id_medico;
   $sStyleHidden_id_medico = '';
   if (isset($this->nmgp_cmp_hidden['id_medico']) && $this->nmgp_cmp_hidden['id_medico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_medico']);
       $sStyleHidden_id_medico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_medico = 'display: none;';
   $sStyleReadInp_id_medico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_medico']) && $this->nmgp_cmp_readonly['id_medico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_medico']);
       $sStyleReadLab_id_medico = '';
       $sStyleReadInp_id_medico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_medico']) && $this->nmgp_cmp_hidden['id_medico'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_medico" value="<?php echo $this->form_encode_input($this->id_medico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_medico_line" id="hidden_field_data_id_medico" style="<?php echo $sStyleHidden_id_medico; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_medico_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_medico_label" style=""><span id="id_label_id_medico"><?php echo $this->nm_new_label['id_medico']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['php_cmp_required']['id_medico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['php_cmp_required']['id_medico'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_medico"]) &&  $this->nmgp_cmp_readonly["id_medico"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico'][] = $rs->fields[0];
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
   $x = 0; 
   $id_medico_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_medico_1))
          {
              foreach ($this->id_medico_1 as $tmp_id_medico)
              {
                  if (trim($tmp_id_medico) === trim($cadaselect[1])) {$id_medico_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_medico) && trim($this->id_medico) === trim($cadaselect[1])) {$id_medico_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_medico" value="<?php echo $this->form_encode_input($id_medico) . "\">" . $id_medico_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_medico();
   $x = 0 ; 
   $id_medico_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_medico_1))
          {
              foreach ($this->id_medico_1 as $tmp_id_medico)
              {
                  if (trim($tmp_id_medico) === trim($cadaselect[1])) {$id_medico_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_medico) && trim($this->id_medico) === trim($cadaselect[1])) { $id_medico_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_medico_look))
          {
              $id_medico_look = $this->id_medico;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_medico\" class=\"css_id_medico_line\" style=\"" .  $sStyleReadLab_id_medico . "\">" . $this->form_format_readonly("id_medico", $this->form_encode_input($id_medico_look)) . "</span><span id=\"id_read_off_id_medico\" class=\"css_read_off_id_medico" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_medico . "\">";
   echo " <span id=\"idAjaxSelect_id_medico\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_medico_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_medico\" name=\"id_medico\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_medico'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_medico) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_medico)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_medico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_medico_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_ciudad']))
   {
       $this->nm_new_label['id_ciudad'] = "Ciudad";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_ciudad = $this->id_ciudad;
   $sStyleHidden_id_ciudad = '';
   if (isset($this->nmgp_cmp_hidden['id_ciudad']) && $this->nmgp_cmp_hidden['id_ciudad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_ciudad']);
       $sStyleHidden_id_ciudad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_ciudad = 'display: none;';
   $sStyleReadInp_id_ciudad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_ciudad']) && $this->nmgp_cmp_readonly['id_ciudad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_ciudad']);
       $sStyleReadLab_id_ciudad = '';
       $sStyleReadInp_id_ciudad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_ciudad']) && $this->nmgp_cmp_hidden['id_ciudad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_ciudad" value="<?php echo $this->form_encode_input($this->id_ciudad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_ciudad_line" id="hidden_field_data_id_ciudad" style="<?php echo $sStyleHidden_id_ciudad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_ciudad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_id_ciudad_label" style=""><span id="id_label_id_ciudad"><?php echo $this->nm_new_label['id_ciudad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_ciudad"]) &&  $this->nmgp_cmp_readonly["id_ciudad"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad'][] = $rs->fields[0];
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
   $x = 0; 
   $id_ciudad_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_ciudad_1))
          {
              foreach ($this->id_ciudad_1 as $tmp_id_ciudad)
              {
                  if (trim($tmp_id_ciudad) === trim($cadaselect[1])) {$id_ciudad_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_ciudad) && trim($this->id_ciudad) === trim($cadaselect[1])) {$id_ciudad_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_ciudad" value="<?php echo $this->form_encode_input($id_ciudad) . "\">" . $id_ciudad_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_ciudad();
   $x = 0 ; 
   $id_ciudad_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_ciudad_1))
          {
              foreach ($this->id_ciudad_1 as $tmp_id_ciudad)
              {
                  if (trim($tmp_id_ciudad) === trim($cadaselect[1])) {$id_ciudad_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_ciudad) && trim($this->id_ciudad) === trim($cadaselect[1])) { $id_ciudad_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_ciudad_look))
          {
              $id_ciudad_look = $this->id_ciudad;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_ciudad\" class=\"css_id_ciudad_line\" style=\"" .  $sStyleReadLab_id_ciudad . "\">" . $this->form_format_readonly("id_ciudad", $this->form_encode_input($id_ciudad_look)) . "</span><span id=\"id_read_off_id_ciudad\" class=\"css_read_off_id_ciudad" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_ciudad . "\">";
   echo " <span id=\"idAjaxSelect_id_ciudad\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_ciudad_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_ciudad\" name=\"id_ciudad\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['Lookup_id_ciudad'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_ciudad) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_ciudad)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_ciudad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_ciudad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<?php
$requiredMessage = $this->Ini->Nm_lang['lang_othr_reqr'];
?>
<span class="scFormRequiredOddColor">* <?php echo $requiredMessage; ?></span>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R")
{
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq('b')", "scBtnFn_sys_GridPermiteSeq('b')", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '1') ? " selected" : "";
?> 
           <option value="1" <?php echo $obj_sel ?>>1</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-29';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-30';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-31';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-32';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-33';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-34';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
$this->displayAppFooter();
?>
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_procedimiento1_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_procedimiento1_mob");
 parent.scAjaxDetailHeight("form_procedimiento1_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_procedimiento1_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_procedimiento1_mob", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if (isset($this->scFormFocusErrorName) && '' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
        function scBtnFn_sys_format_inc() {
                if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
                    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                         return;
                }
                if ($("#sc_b_new_b.sc-unique-btn-12").length && $("#sc_b_new_b.sc-unique-btn-12").is(":visible")) {
                    if ($("#sc_b_new_b.sc-unique-btn-12").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_b.sc-unique-btn-13").length && $("#sc_b_ins_b.sc-unique-btn-13").is(":visible")) {
                    if ($("#sc_b_ins_b.sc-unique-btn-13").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                         return;
                }
                if ($("#sc_b_new_t.sc-unique-btn-18").length && $("#sc_b_new_t.sc-unique-btn-18").is(":visible")) {
                    if ($("#sc_b_new_t.sc-unique-btn-18").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_t.sc-unique-btn-19").length && $("#sc_b_ins_t.sc-unique-btn-19").is(":visible")) {
                    if ($("#sc_b_ins_t.sc-unique-btn-19").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                         return;
                }
                if ($("#sc_b_new_b.sc-unique-btn-29").length && $("#sc_b_new_b.sc-unique-btn-29").is(":visible")) {
                    if ($("#sc_b_new_b.sc-unique-btn-29").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_b.sc-unique-btn-30").length && $("#sc_b_ins_b.sc-unique-btn-30").is(":visible")) {
                    if ($("#sc_b_ins_b.sc-unique-btn-30").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                         return;
                }
        }
        function scBtnFn_sys_format_cnl() {
                if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        <?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-20").hasClass("disabled")) {
                        return;
                    }
                        <?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
                         return;
                }
        }
        function scBtnFn_sys_format_alt() {
                if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                         return;
                }
                if ($("#sc_b_upd_t.sc-unique-btn-21").length && $("#sc_b_upd_t.sc-unique-btn-21").is(":visible")) {
                    if ($("#sc_b_upd_t.sc-unique-btn-21").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                         return;
                }
        }
        function scBtnFn_sys_format_exc() {
                if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('excluir');
                         return;
                }
                if ($("#sc_b_del_t.sc-unique-btn-22").length && $("#sc_b_del_t.sc-unique-btn-22").is(":visible")) {
                    if ($("#sc_b_del_t.sc-unique-btn-22").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('excluir');
                         return;
                }
        }
        function scBtnFn_sys_format_reload() {
                if ($("#sc_b_reload_t.sc-unique-btn-6").length && $("#sc_b_reload_t.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_reload_t.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                         return;
                }
                if ($("#sc_b_reload_t.sc-unique-btn-23").length && $("#sc_b_reload_t.sc-unique-btn-23").is(":visible")) {
                    if ($("#sc_b_reload_t.sc-unique-btn-23").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                         return;
                }
        }
        function scBtnFn_sys_format_hlp() {
                if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
                    if ($("#sc_b_hlp_t").hasClass("disabled")) {
                        return;
                    }
                        window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
                         return;
                }
        }
        function scBtnFn_sys_format_sai() {
                if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-9").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-10").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-25").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F5('<?php echo $nm_url_saida; ?>');
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-26").length && $("#sc_b_sai_t.sc-unique-btn-26").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-26").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-27").length && $("#sc_b_sai_t.sc-unique-btn-27").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-27").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
                if ($("#sc_b_sai_t.sc-unique-btn-28").length && $("#sc_b_sai_t.sc-unique-btn-28").is(":visible")) {
                    if ($("#sc_b_sai_t.sc-unique-btn-28").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
        }
        function scBtnFn_sys_GridPermiteSeq(btnPos) {
                if ($("#brec_b").length && $("#brec_b").is(":visible")) {
                    if ($("#brec_b").hasClass("disabled")) {
                        return;
                    }
                        if (document.F1['nmgp_rec_' + btnPos].value != '') {nm_navpage(document.F1['nmgp_rec_' + btnPos].value, 'P');} document.F1['nmgp_rec_' + btnPos].value = '';
                         return;
                }
        }
        function scBtnFn_sys_format_ini() {
                if ($("#sc_b_ini_b.sc-unique-btn-14").length && $("#sc_b_ini_b.sc-unique-btn-14").is(":visible")) {
                    if ($("#sc_b_ini_b.sc-unique-btn-14").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                         return;
                }
                if ($("#sc_b_ini_b.sc-unique-btn-31").length && $("#sc_b_ini_b.sc-unique-btn-31").is(":visible")) {
                    if ($("#sc_b_ini_b.sc-unique-btn-31").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                         return;
                }
        }
        function scBtnFn_sys_format_ret() {
                if ($("#sc_b_ret_b.sc-unique-btn-15").length && $("#sc_b_ret_b.sc-unique-btn-15").is(":visible")) {
                    if ($("#sc_b_ret_b.sc-unique-btn-15").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                         return;
                }
                if ($("#sc_b_ret_b.sc-unique-btn-32").length && $("#sc_b_ret_b.sc-unique-btn-32").is(":visible")) {
                    if ($("#sc_b_ret_b.sc-unique-btn-32").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                         return;
                }
        }
        function scBtnFn_sys_format_ava() {
                if ($("#sc_b_avc_b.sc-unique-btn-16").length && $("#sc_b_avc_b.sc-unique-btn-16").is(":visible")) {
                    if ($("#sc_b_avc_b.sc-unique-btn-16").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                         return;
                }
                if ($("#sc_b_avc_b.sc-unique-btn-33").length && $("#sc_b_avc_b.sc-unique-btn-33").is(":visible")) {
                    if ($("#sc_b_avc_b.sc-unique-btn-33").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                         return;
                }
        }
        function scBtnFn_sys_format_fim() {
                if ($("#sc_b_fim_b.sc-unique-btn-17").length && $("#sc_b_fim_b.sc-unique-btn-17").is(":visible")) {
                    if ($("#sc_b_fim_b.sc-unique-btn-17").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                         return;
                }
                if ($("#sc_b_fim_b.sc-unique-btn-34").length && $("#sc_b_fim_b.sc-unique-btn-34").is(":visible")) {
                    if ($("#sc_b_fim_b.sc-unique-btn-34").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                         return;
                }
        }
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_procedimiento1_mob']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
