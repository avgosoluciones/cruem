<?php
class procedimiento_final_form extends procedimiento_final_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " procedimiento1"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " procedimiento1"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
            <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
            <meta name="mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="apple-touch-icon"   sizes="57x57" href="">
            <link rel="apple-touch-icon"   sizes="60x60" href="">
            <link rel="apple-touch-icon"   sizes="72x72" href="">
            <link rel="apple-touch-icon"   sizes="76x76" href="">
            <link rel="apple-touch-icon" sizes="114x114" href="">
            <link rel="apple-touch-icon" sizes="120x120" href="">
            <link rel="apple-touch-icon" sizes="144x144" href="">
            <link rel="apple-touch-icon" sizes="152x152" href="">
            <link rel="apple-touch-icon" sizes="180x180" href="">
            <link rel="icon" type="image/png" sizes="192x192" href="">
            <link rel="icon" type="image/png"   sizes="32x32" href="">
            <link rel="icon" type="image/png"   sizes="96x96" href="">
            <link rel="icon" type="image/png"   sizes="16x16" href="">
            <meta name="msapplication-TileColor" content="___">
            <meta name="msapplication-TileImage" content="">
            <meta name="theme-color" content="___">
            <meta name="apple-mobile-web-app-status-bar-style" content="___">
            <link rel="shortcut icon" href=""> <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
            <?php
               if ($_SESSION['scriptcase']['display_mobile'] && $_SESSION['scriptcase']['device_mobile']) {
                   $forced_mobile = (isset($_SESSION['scriptcase']['force_mobile']) && $_SESSION['scriptcase']['force_mobile']) ? 'true' : 'false';
                   $sc_app_data   = json_encode([
                       'forceMobile' => $forced_mobile,
                       'appType' => 'form',
                       'improvements' => true,
                       'displayOptionsButton' => false,
                       'displayScrollUp' => true,
                       'scrollUpPosition' => 'A',
                       'toolbarOrientation' => 'H',
                       'mobilePanes' => 'true',
                       'navigationBarButtons' => unserialize('a:0:{}'),
                       'mobileSimpleToolbar' => true,
                       'bottomToolbarFixed' => true
                   ]); ?>
            <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_app_data; ?>' />
            <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
            <script type="text/javascript" src="../_lib/lib/js/nm_form_mobile.js"></script>
            <link rel='stylesheet' href='../_lib/lib/css/nm_form_mobile.css' type='text/css'/>
            <script>
                $(document).ready(function(){

                    bootstrapMobile();

                });
            </script>
            <?php } ?> <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker { z-index: 6 !important }
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
           $fixColNotFixedVisibility = $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'] ? 'visible' : 'visible';
           $fixColNotFixedOpacity = $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'] ? '1' : '1';
?>
    <style type="text/css">
        .sc-col-actions {
            text-align: center !important;
        }
        .sc-op-fix-col {
            padding: 0 2px;
        }
        .sc-op-fix-col:hover {
            cursor: pointer;
        }
        .sc-op-fix-col-notfixed {
            visibility: <?php echo $fixColNotFixedVisibility ?>;
            opacity: 0.5;
        }
        .scFormLabelOddMult:hover .sc-op-fix-col-notfixed {
            visibility: visible;
            opacity: <?php echo $fixColNotFixedOpacity ?>;
        }
    </style>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
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
.css_read_off_fecha_ button {
        background-color: transparent;
        border: 0;
        padding: 0
}
</style>
<?php
}
?>
<?php

if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['margin_top']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['margin_top']) {
?>
<style>
.scFormBorder {
    padding-top: 0 !important;
}
.scBlockRowFirst .scFormTable {
    margin-top: <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['margin_top'] ?>;
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>procedimiento_final/procedimiento_final_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("procedimiento_final_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['last'] : 'off'); ?>";
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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

include_once('procedimiento_final_jquery.php');

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


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
   });
 if($(".sc-ui-block-control").length) {
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $remove_background = isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['remove_background'] ? 'background-color: transparent; background-image: none; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['remove_background']) {
        $remove_background = 'background-color: transparent; background-image: none; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['link_info']['remove_border']) {
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

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("procedimiento_final_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
  <?php if (!isset($sc_check_incl)) {$sc_check_incl = array();}?>; 
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
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
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
<?php
$_SESSION['scriptcase']['error_span_title']['procedimiento_final'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['procedimiento_final'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R")
{
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['insert'];
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
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0" class="scBlockFrame"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
   $this->form_fixed_column_no = 0;
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
$orderColRule = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>


   <?php
        $classColFld = "";
        $classColActions = "";
        if (!$this->Embutida_form) {
            $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
            $classColActions = " sc-col-actions";
        }
?>

    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title <?php echo $classColFld . $classColActions ?>" <?php echo $Col_span ?>> <?php if (!$this->Embutida_form) { ?><span class="sc-op-fix-col sc-op-fix-col-<?php echo $this->form_fixed_column_no ?> sc-op-fix-col-notfixed" data-fixcolid="<?php echo $this->form_fixed_column_no ?>" id="sc-fld-fix-col-<?php echo $this->form_fixed_column_no ?>"><i class="fas fa-thumbtack"></i></span><?php } ?> </TD>
   <?php 
        if (!$this->Embutida_form) { $this->form_fixed_column_no++; }
 ?>
   <?php
        if (!$this->Embutida_form) {
            $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
            $classColActions = " sc-col-actions";
?>

    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title <?php echo $classColFld . $classColActions ?>" > <?php if (!$this->Embutida_form) { ?><span class="sc-op-fix-col sc-op-fix-col-<?php echo $this->form_fixed_column_no ?> sc-op-fix-col-notfixed" data-fixcolid="<?php echo $this->form_fixed_column_no ?>" id="sc-fld-fix-col-<?php echo $this->form_fixed_column_no ?>"><i class="fas fa-thumbtack"></i></span><?php } ?> </TD>
   <?php
            $this->form_fixed_column_no++;
        }
?>

   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
        $classColActions = " sc-col-actions";
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title <?php echo $classColFld . $classColActions ?>"  width="10"> <span class="sc-op-fix-col sc-op-fix-col-<?php echo $this->form_fixed_column_no ?> sc-op-fix-col-notfixed" data-fixcolid="<?php echo $this->form_fixed_column_no ?>" id="sc-fld-fix-col-<?php echo $this->form_fixed_column_no ?>"><i class="fas fa-thumbtack"></i></span> </TD>
   <?php 
        $this->form_fixed_column_no++;
}?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
        $classColActions = " sc-col-actions";
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title <?php echo $classColFld . $classColActions ?>"  width="10"> <span class="sc-op-fix-col sc-op-fix-col-<?php echo $this->form_fixed_column_no ?> sc-op-fix-col-notfixed" data-fixcolid="<?php echo $this->form_fixed_column_no ?>" id="sc-fld-fix-col-<?php echo $this->form_fixed_column_no ?>"><i class="fas fa-thumbtack"></i></span> </TD>
   <?php 
        $this->form_fixed_column_no++;
}?>
   <?php
    $sStyleHidden_consecutivo_ = '';
    if (isset($this->nmgp_cmp_hidden['consecutivo_']) && $this->nmgp_cmp_hidden['consecutivo_'] == 'off') {
        $sStyleHidden_consecutivo_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['consecutivo_']) || $this->nmgp_cmp_hidden['consecutivo_'] == 'on') {
        if (!isset($this->nm_new_label['consecutivo_'])) {
            $this->nm_new_label['consecutivo_'] = "Radicado Cruemt";
        }
        $SC_Label = "" . $this->nm_new_label['consecutivo_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_fieldName .= "&nbsp;<span class=\"scFormRequiredMarkOddMult\">*</span>&nbsp;";
        $fieldSortRule = $this->scGetColumnOrderRule("consecutivo", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("consecutivo", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'consecutivo')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_consecutivo__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_consecutivo_" style="<?php echo $sStyleHidden_consecutivo_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_secad_ = '';
    if (isset($this->nmgp_cmp_hidden['secad_']) && $this->nmgp_cmp_hidden['secad_'] == 'off') {
        $sStyleHidden_secad_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['secad_']) || $this->nmgp_cmp_hidden['secad_'] == 'on') {
        if (!isset($this->nm_new_label['secad_'])) {
            $this->nm_new_label['secad_'] = "Secad";
        }
        $SC_Label = "" . $this->nm_new_label['secad_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("secad", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("secad", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'secad')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_secad__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_secad_" style="<?php echo $sStyleHidden_secad_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_quien_reporta_ = '';
    if (isset($this->nmgp_cmp_hidden['quien_reporta_']) && $this->nmgp_cmp_hidden['quien_reporta_'] == 'off') {
        $sStyleHidden_quien_reporta_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['quien_reporta_']) || $this->nmgp_cmp_hidden['quien_reporta_'] == 'on') {
        if (!isset($this->nm_new_label['quien_reporta_'])) {
            $this->nm_new_label['quien_reporta_'] = "Quien Reporta";
        }
        $SC_Label = "" . $this->nm_new_label['quien_reporta_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_fieldName .= "&nbsp;<span class=\"scFormRequiredMarkOddMult\">*</span>&nbsp;";
        $fieldSortRule = $this->scGetColumnOrderRule("quien_reporta", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("quien_reporta", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'quien_reporta')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_quien_reporta__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_quien_reporta_" style="<?php echo $sStyleHidden_quien_reporta_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_discapacidad_ = '';
    if (isset($this->nmgp_cmp_hidden['discapacidad_']) && $this->nmgp_cmp_hidden['discapacidad_'] == 'off') {
        $sStyleHidden_discapacidad_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['discapacidad_']) || $this->nmgp_cmp_hidden['discapacidad_'] == 'on') {
        if (!isset($this->nm_new_label['discapacidad_'])) {
            $this->nm_new_label['discapacidad_'] = "Discapacidad";
        }
        $SC_Label = "" . $this->nm_new_label['discapacidad_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("discapacidad", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("discapacidad", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'discapacidad')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_discapacidad__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_discapacidad_" style="<?php echo $sStyleHidden_discapacidad_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_nombre_apellido_ = '';
    if (isset($this->nmgp_cmp_hidden['nombre_apellido_']) && $this->nmgp_cmp_hidden['nombre_apellido_'] == 'off') {
        $sStyleHidden_nombre_apellido_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['nombre_apellido_']) || $this->nmgp_cmp_hidden['nombre_apellido_'] == 'on') {
        if (!isset($this->nm_new_label['nombre_apellido_'])) {
            $this->nm_new_label['nombre_apellido_'] = "Nombre Apellido";
        }
        $SC_Label = "" . $this->nm_new_label['nombre_apellido_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("nombre_apellido", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("nombre_apellido", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'nombre_apellido')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_nombre_apellido__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_nombre_apellido_" style="<?php echo $sStyleHidden_nombre_apellido_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipo_documento_ = '';
    if (isset($this->nmgp_cmp_hidden['tipo_documento_']) && $this->nmgp_cmp_hidden['tipo_documento_'] == 'off') {
        $sStyleHidden_tipo_documento_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipo_documento_']) || $this->nmgp_cmp_hidden['tipo_documento_'] == 'on') {
        if (!isset($this->nm_new_label['tipo_documento_'])) {
            $this->nm_new_label['tipo_documento_'] = "Tipo Documento";
        }
        $SC_Label = "" . $this->nm_new_label['tipo_documento_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("tipo_documento", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("tipo_documento", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'tipo_documento')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipo_documento__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_tipo_documento_" style="<?php echo $sStyleHidden_tipo_documento_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_documento_identidad_ = '';
    if (isset($this->nmgp_cmp_hidden['documento_identidad_']) && $this->nmgp_cmp_hidden['documento_identidad_'] == 'off') {
        $sStyleHidden_documento_identidad_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['documento_identidad_']) || $this->nmgp_cmp_hidden['documento_identidad_'] == 'on') {
        if (!isset($this->nm_new_label['documento_identidad_'])) {
            $this->nm_new_label['documento_identidad_'] = "Documento Identidad";
        }
        $SC_Label = "" . $this->nm_new_label['documento_identidad_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("documento_identidad", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("documento_identidad", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'documento_identidad')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_documento_identidad__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_documento_identidad_" style="<?php echo $sStyleHidden_documento_identidad_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_edad_ = '';
    if (isset($this->nmgp_cmp_hidden['edad_']) && $this->nmgp_cmp_hidden['edad_'] == 'off') {
        $sStyleHidden_edad_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['edad_']) || $this->nmgp_cmp_hidden['edad_'] == 'on') {
        if (!isset($this->nm_new_label['edad_'])) {
            $this->nm_new_label['edad_'] = "Edad";
        }
        $SC_Label = "" . $this->nm_new_label['edad_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("edad", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("edad", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'edad')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_edad__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_edad_" style="<?php echo $sStyleHidden_edad_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_numero_contacto_ = '';
    if (isset($this->nmgp_cmp_hidden['numero_contacto_']) && $this->nmgp_cmp_hidden['numero_contacto_'] == 'off') {
        $sStyleHidden_numero_contacto_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['numero_contacto_']) || $this->nmgp_cmp_hidden['numero_contacto_'] == 'on') {
        if (!isset($this->nm_new_label['numero_contacto_'])) {
            $this->nm_new_label['numero_contacto_'] = "Numero Contacto";
        }
        $SC_Label = "" . $this->nm_new_label['numero_contacto_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("numero_contacto", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("numero_contacto", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'numero_contacto')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_numero_contacto__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_numero_contacto_" style="<?php echo $sStyleHidden_numero_contacto_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_genero_ = '';
    if (isset($this->nmgp_cmp_hidden['genero_']) && $this->nmgp_cmp_hidden['genero_'] == 'off') {
        $sStyleHidden_genero_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['genero_']) || $this->nmgp_cmp_hidden['genero_'] == 'on') {
        if (!isset($this->nm_new_label['genero_'])) {
            $this->nm_new_label['genero_'] = "Genero";
        }
        $SC_Label = "" . $this->nm_new_label['genero_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("genero", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("genero", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'genero')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_genero__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_genero_" style="<?php echo $sStyleHidden_genero_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_tipo_evento_ = '';
    if (isset($this->nmgp_cmp_hidden['id_tipo_evento_']) && $this->nmgp_cmp_hidden['id_tipo_evento_'] == 'off') {
        $sStyleHidden_id_tipo_evento_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_tipo_evento_']) || $this->nmgp_cmp_hidden['id_tipo_evento_'] == 'on') {
        if (!isset($this->nm_new_label['id_tipo_evento_'])) {
            $this->nm_new_label['id_tipo_evento_'] = "Tipo Evento";
        }
        $SC_Label = "" . $this->nm_new_label['id_tipo_evento_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Tipo_Evento", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Tipo_Evento", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Tipo_Evento')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_tipo_evento__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_tipo_evento_" style="<?php echo $sStyleHidden_id_tipo_evento_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_circunstancias_emergencia_ = '';
    if (isset($this->nmgp_cmp_hidden['circunstancias_emergencia_']) && $this->nmgp_cmp_hidden['circunstancias_emergencia_'] == 'off') {
        $sStyleHidden_circunstancias_emergencia_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['circunstancias_emergencia_']) || $this->nmgp_cmp_hidden['circunstancias_emergencia_'] == 'on') {
        if (!isset($this->nm_new_label['circunstancias_emergencia_'])) {
            $this->nm_new_label['circunstancias_emergencia_'] = "Circunstancias Emergencia";
        }
        $SC_Label = "" . $this->nm_new_label['circunstancias_emergencia_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_fieldName .= "&nbsp;<span class=\"scFormRequiredMarkOddMult\">*</span>&nbsp;";
        $fieldSortRule = $this->scGetColumnOrderRule("circunstancias_emergencia", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("circunstancias_emergencia", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'circunstancias_emergencia')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_circunstancias_emergencia__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_circunstancias_emergencia_" style="<?php echo $sStyleHidden_circunstancias_emergencia_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_eps_ = '';
    if (isset($this->nmgp_cmp_hidden['id_eps_']) && $this->nmgp_cmp_hidden['id_eps_'] == 'off') {
        $sStyleHidden_id_eps_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_eps_']) || $this->nmgp_cmp_hidden['id_eps_'] == 'on') {
        if (!isset($this->nm_new_label['id_eps_'])) {
            $this->nm_new_label['id_eps_'] = "Eps";
        }
        $SC_Label = "" . $this->nm_new_label['id_eps_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Eps", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Eps", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Eps')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_eps__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_eps_" style="<?php echo $sStyleHidden_id_eps_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_seguridad_social_ = '';
    if (isset($this->nmgp_cmp_hidden['id_seguridad_social_']) && $this->nmgp_cmp_hidden['id_seguridad_social_'] == 'off') {
        $sStyleHidden_id_seguridad_social_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_seguridad_social_']) || $this->nmgp_cmp_hidden['id_seguridad_social_'] == 'on') {
        if (!isset($this->nm_new_label['id_seguridad_social_'])) {
            $this->nm_new_label['id_seguridad_social_'] = "Seguridad Social";
        }
        $SC_Label = "" . $this->nm_new_label['id_seguridad_social_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Seguridad_Social", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Seguridad_Social", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Seguridad_Social')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_seguridad_social__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_seguridad_social_" style="<?php echo $sStyleHidden_id_seguridad_social_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_zona_ = '';
    if (isset($this->nmgp_cmp_hidden['zona_']) && $this->nmgp_cmp_hidden['zona_'] == 'off') {
        $sStyleHidden_zona_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['zona_']) || $this->nmgp_cmp_hidden['zona_'] == 'on') {
        if (!isset($this->nm_new_label['zona_'])) {
            $this->nm_new_label['zona_'] = "Zona";
        }
        $SC_Label = "" . $this->nm_new_label['zona_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Zona", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Zona", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Zona')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_zona__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_zona_" style="<?php echo $sStyleHidden_zona_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipo_servicio_ = '';
    if (isset($this->nmgp_cmp_hidden['tipo_servicio_']) && $this->nmgp_cmp_hidden['tipo_servicio_'] == 'off') {
        $sStyleHidden_tipo_servicio_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipo_servicio_']) || $this->nmgp_cmp_hidden['tipo_servicio_'] == 'on') {
        if (!isset($this->nm_new_label['tipo_servicio_'])) {
            $this->nm_new_label['tipo_servicio_'] = "Tipo Servicio";
        }
        $SC_Label = "" . $this->nm_new_label['tipo_servicio_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("tipo_servicio", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("tipo_servicio", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'tipo_servicio')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipo_servicio__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_tipo_servicio_" style="<?php echo $sStyleHidden_tipo_servicio_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_barrio_ = '';
    if (isset($this->nmgp_cmp_hidden['id_barrio_']) && $this->nmgp_cmp_hidden['id_barrio_'] == 'off') {
        $sStyleHidden_id_barrio_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_barrio_']) || $this->nmgp_cmp_hidden['id_barrio_'] == 'on') {
        if (!isset($this->nm_new_label['id_barrio_'])) {
            $this->nm_new_label['id_barrio_'] = "Barrio";
        }
        $SC_Label = "" . $this->nm_new_label['id_barrio_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Barrio", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Barrio", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Barrio')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_barrio__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_barrio_" style="<?php echo $sStyleHidden_id_barrio_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_direccion_servicio_ = '';
    if (isset($this->nmgp_cmp_hidden['direccion_servicio_']) && $this->nmgp_cmp_hidden['direccion_servicio_'] == 'off') {
        $sStyleHidden_direccion_servicio_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['direccion_servicio_']) || $this->nmgp_cmp_hidden['direccion_servicio_'] == 'on') {
        if (!isset($this->nm_new_label['direccion_servicio_'])) {
            $this->nm_new_label['direccion_servicio_'] = "Dirección Servicio";
        }
        $SC_Label = "" . $this->nm_new_label['direccion_servicio_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("direccion_servicio", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("direccion_servicio", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'direccion_servicio')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_direccion_servicio__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_direccion_servicio_" style="<?php echo $sStyleHidden_direccion_servicio_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_hora_ingreso_llamada_ = '';
    if (isset($this->nmgp_cmp_hidden['hora_ingreso_llamada_']) && $this->nmgp_cmp_hidden['hora_ingreso_llamada_'] == 'off') {
        $sStyleHidden_hora_ingreso_llamada_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['hora_ingreso_llamada_']) || $this->nmgp_cmp_hidden['hora_ingreso_llamada_'] == 'on') {
        if (!isset($this->nm_new_label['hora_ingreso_llamada_'])) {
            $this->nm_new_label['hora_ingreso_llamada_'] = "Hora Ingreso Llamada";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_ingreso_llamada_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['hora_ingreso_llamada_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("hora_ingreso_llamada", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("hora_ingreso_llamada", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'hora_ingreso_llamada')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $label_final .= "<div><span class=\"scFormDataHelpOddMult\">$date_format_show</span></div>";
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_hora_ingreso_llamada__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_hora_ingreso_llamada_" style="<?php echo $sStyleHidden_hora_ingreso_llamada_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_hora_notifica_movil_ = '';
    if (isset($this->nmgp_cmp_hidden['hora_notifica_movil_']) && $this->nmgp_cmp_hidden['hora_notifica_movil_'] == 'off') {
        $sStyleHidden_hora_notifica_movil_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['hora_notifica_movil_']) || $this->nmgp_cmp_hidden['hora_notifica_movil_'] == 'on') {
        if (!isset($this->nm_new_label['hora_notifica_movil_'])) {
            $this->nm_new_label['hora_notifica_movil_'] = "Hora Notifica Movil";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_notifica_movil_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['hora_notifica_movil_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Hora_notifica_movil", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Hora_notifica_movil", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Hora_notifica_movil')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $label_final .= "<div><span class=\"scFormDataHelpOddMult\">$date_format_show</span></div>";
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_hora_notifica_movil__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_hora_notifica_movil_" style="<?php echo $sStyleHidden_hora_notifica_movil_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_hora_llegada_sitio_ = '';
    if (isset($this->nmgp_cmp_hidden['hora_llegada_sitio_']) && $this->nmgp_cmp_hidden['hora_llegada_sitio_'] == 'off') {
        $sStyleHidden_hora_llegada_sitio_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['hora_llegada_sitio_']) || $this->nmgp_cmp_hidden['hora_llegada_sitio_'] == 'on') {
        if (!isset($this->nm_new_label['hora_llegada_sitio_'])) {
            $this->nm_new_label['hora_llegada_sitio_'] = "Hora Llegada Sitio";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_llegada_sitio_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['hora_llegada_sitio_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("hora_llegada_sitio", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("hora_llegada_sitio", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'hora_llegada_sitio')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $label_final .= "<div><span class=\"scFormDataHelpOddMult\">$date_format_show</span></div>";
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_hora_llegada_sitio__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_hora_llegada_sitio_" style="<?php echo $sStyleHidden_hora_llegada_sitio_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_hora_llegada_ips_ = '';
    if (isset($this->nmgp_cmp_hidden['hora_llegada_ips_']) && $this->nmgp_cmp_hidden['hora_llegada_ips_'] == 'off') {
        $sStyleHidden_hora_llegada_ips_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['hora_llegada_ips_']) || $this->nmgp_cmp_hidden['hora_llegada_ips_'] == 'on') {
        if (!isset($this->nm_new_label['hora_llegada_ips_'])) {
            $this->nm_new_label['hora_llegada_ips_'] = "Hora Llegada Ips";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_llegada_ips_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['hora_llegada_ips_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("hora_llegada_ips", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("hora_llegada_ips", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'hora_llegada_ips')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $label_final .= "<div><span class=\"scFormDataHelpOddMult\">$date_format_show</span></div>";
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_hora_llegada_ips__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_hora_llegada_ips_" style="<?php echo $sStyleHidden_hora_llegada_ips_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_hora_salida_ips_ = '';
    if (isset($this->nmgp_cmp_hidden['hora_salida_ips_']) && $this->nmgp_cmp_hidden['hora_salida_ips_'] == 'off') {
        $sStyleHidden_hora_salida_ips_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['hora_salida_ips_']) || $this->nmgp_cmp_hidden['hora_salida_ips_'] == 'on') {
        if (!isset($this->nm_new_label['hora_salida_ips_'])) {
            $this->nm_new_label['hora_salida_ips_'] = "Hora Salida Ips";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_salida_ips_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['hora_salida_ips_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("hora_salida_ips", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("hora_salida_ips", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'hora_salida_ips')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $label_final .= "<div><span class=\"scFormDataHelpOddMult\">$date_format_show</span></div>";
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_hora_salida_ips__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_hora_salida_ips_" style="<?php echo $sStyleHidden_hora_salida_ips_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_movil_ = '';
    if (isset($this->nmgp_cmp_hidden['id_movil_']) && $this->nmgp_cmp_hidden['id_movil_'] == 'off') {
        $sStyleHidden_id_movil_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_movil_']) || $this->nmgp_cmp_hidden['id_movil_'] == 'on') {
        if (!isset($this->nm_new_label['id_movil_'])) {
            $this->nm_new_label['id_movil_'] = "Móvil que atiende";
        }
        $SC_Label = "" . $this->nm_new_label['id_movil_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Movil", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Movil", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Movil')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_movil__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_movil_" style="<?php echo $sStyleHidden_id_movil_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_ips_ = '';
    if (isset($this->nmgp_cmp_hidden['id_ips_']) && $this->nmgp_cmp_hidden['id_ips_'] == 'off') {
        $sStyleHidden_id_ips_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_ips_']) || $this->nmgp_cmp_hidden['id_ips_'] == 'on') {
        if (!isset($this->nm_new_label['id_ips_'])) {
            $this->nm_new_label['id_ips_'] = "Direccionamiento";
        }
        $SC_Label = "" . $this->nm_new_label['id_ips_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Ips", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Ips", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Ips')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_ips__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_ips_" style="<?php echo $sStyleHidden_id_ips_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipo_caso_ = '';
    if (isset($this->nmgp_cmp_hidden['tipo_caso_']) && $this->nmgp_cmp_hidden['tipo_caso_'] == 'off') {
        $sStyleHidden_tipo_caso_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipo_caso_']) || $this->nmgp_cmp_hidden['tipo_caso_'] == 'on') {
        if (!isset($this->nm_new_label['tipo_caso_'])) {
            $this->nm_new_label['tipo_caso_'] = "Tipo Caso";
        }
        $SC_Label = "" . $this->nm_new_label['tipo_caso_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $fieldSortRule = $this->scGetColumnOrderRule("tipo_caso", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("tipo_caso", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'tipo_caso')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipo_caso__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_tipo_caso_" style="<?php echo $sStyleHidden_tipo_caso_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_medico_ = '';
    if (isset($this->nmgp_cmp_hidden['id_medico_']) && $this->nmgp_cmp_hidden['id_medico_'] == 'off') {
        $sStyleHidden_id_medico_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_medico_']) || $this->nmgp_cmp_hidden['id_medico_'] == 'on') {
        if (!isset($this->nm_new_label['id_medico_'])) {
            $this->nm_new_label['id_medico_'] = "Id Medico";
        }
        $SC_Label = "" . $this->nm_new_label['id_medico_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_fieldName .= "&nbsp;<span class=\"scFormRequiredMarkOddMult\">*</span>&nbsp;";
        $fieldSortRule = $this->scGetColumnOrderRule("Id_Medico", $orderColName, $orderColOrient, $orderColRule);
        $fieldSortIcon = $this->scGetColumnOrderIcon("Id_Medico", $fieldSortRule);

        if (empty($this->Ini->Label_sort_pos)) {
            $this->Ini->Label_sort_pos = "right_field";
        }

        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_move('ordem', 'Id_Medico')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = "<span class=\"sc-op-fix-col sc-op-fix-col-" . $this->form_fixed_column_no . " sc-op-fix-col-notfixed\" data-fixcolid=\"" . $this->form_fixed_column_no . "\" id=\"sc-fld-fix-col-" . $this->form_fixed_column_no . "\"><i class=\"fas fa-thumbtack\"></i></span>";
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_medico__label sc-col-title <?php echo $classColFld ?>" id="hidden_field_label_id_medico_" style="<?php echo $sStyleHidden_id_medico_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     orderColRule = "<?php echo $orderColRule ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert, $sc_check_incl, $sc_check_excl; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_procedimiento_final);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_procedimiento_final = $this->form_vert_procedimiento_final;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_procedimiento_final))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_procedimiento_final as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       $this->id_procedimiento_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_procedimiento_'];
       $this->radicado_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['radicado_'];
       $this->fecha_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['fecha_'];
       $this->ip_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['ip_'];
       $this->login_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['login_'];
       $this->operador_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['operador_'];
       $this->observaciones_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['observaciones_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['consecutivo_'] = true;
           $this->nmgp_cmp_readonly['secad_'] = true;
           $this->nmgp_cmp_readonly['quien_reporta_'] = true;
           $this->nmgp_cmp_readonly['discapacidad_'] = true;
           $this->nmgp_cmp_readonly['nombre_apellido_'] = true;
           $this->nmgp_cmp_readonly['tipo_documento_'] = true;
           $this->nmgp_cmp_readonly['documento_identidad_'] = true;
           $this->nmgp_cmp_readonly['edad_'] = true;
           $this->nmgp_cmp_readonly['numero_contacto_'] = true;
           $this->nmgp_cmp_readonly['genero_'] = true;
           $this->nmgp_cmp_readonly['id_tipo_evento_'] = true;
           $this->nmgp_cmp_readonly['circunstancias_emergencia_'] = true;
           $this->nmgp_cmp_readonly['id_eps_'] = true;
           $this->nmgp_cmp_readonly['id_seguridad_social_'] = true;
           $this->nmgp_cmp_readonly['zona_'] = true;
           $this->nmgp_cmp_readonly['tipo_servicio_'] = true;
           $this->nmgp_cmp_readonly['id_barrio_'] = true;
           $this->nmgp_cmp_readonly['direccion_servicio_'] = true;
           $this->nmgp_cmp_readonly['hora_ingreso_llamada_'] = true;
           $this->nmgp_cmp_readonly['hora_notifica_movil_'] = true;
           $this->nmgp_cmp_readonly['hora_llegada_sitio_'] = true;
           $this->nmgp_cmp_readonly['hora_llegada_ips_'] = true;
           $this->nmgp_cmp_readonly['hora_salida_ips_'] = true;
           $this->nmgp_cmp_readonly['id_movil_'] = true;
           $this->nmgp_cmp_readonly['id_ips_'] = true;
           $this->nmgp_cmp_readonly['tipo_caso_'] = true;
           $this->nmgp_cmp_readonly['id_medico_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['consecutivo_']) || $this->nmgp_cmp_readonly['consecutivo_'] != "on") {$this->nmgp_cmp_readonly['consecutivo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['secad_']) || $this->nmgp_cmp_readonly['secad_'] != "on") {$this->nmgp_cmp_readonly['secad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['quien_reporta_']) || $this->nmgp_cmp_readonly['quien_reporta_'] != "on") {$this->nmgp_cmp_readonly['quien_reporta_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['discapacidad_']) || $this->nmgp_cmp_readonly['discapacidad_'] != "on") {$this->nmgp_cmp_readonly['discapacidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nombre_apellido_']) || $this->nmgp_cmp_readonly['nombre_apellido_'] != "on") {$this->nmgp_cmp_readonly['nombre_apellido_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_documento_']) || $this->nmgp_cmp_readonly['tipo_documento_'] != "on") {$this->nmgp_cmp_readonly['tipo_documento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['documento_identidad_']) || $this->nmgp_cmp_readonly['documento_identidad_'] != "on") {$this->nmgp_cmp_readonly['documento_identidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['edad_']) || $this->nmgp_cmp_readonly['edad_'] != "on") {$this->nmgp_cmp_readonly['edad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['numero_contacto_']) || $this->nmgp_cmp_readonly['numero_contacto_'] != "on") {$this->nmgp_cmp_readonly['numero_contacto_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['genero_']) || $this->nmgp_cmp_readonly['genero_'] != "on") {$this->nmgp_cmp_readonly['genero_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_tipo_evento_']) || $this->nmgp_cmp_readonly['id_tipo_evento_'] != "on") {$this->nmgp_cmp_readonly['id_tipo_evento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['circunstancias_emergencia_']) || $this->nmgp_cmp_readonly['circunstancias_emergencia_'] != "on") {$this->nmgp_cmp_readonly['circunstancias_emergencia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_eps_']) || $this->nmgp_cmp_readonly['id_eps_'] != "on") {$this->nmgp_cmp_readonly['id_eps_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_seguridad_social_']) || $this->nmgp_cmp_readonly['id_seguridad_social_'] != "on") {$this->nmgp_cmp_readonly['id_seguridad_social_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['zona_']) || $this->nmgp_cmp_readonly['zona_'] != "on") {$this->nmgp_cmp_readonly['zona_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_servicio_']) || $this->nmgp_cmp_readonly['tipo_servicio_'] != "on") {$this->nmgp_cmp_readonly['tipo_servicio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_barrio_']) || $this->nmgp_cmp_readonly['id_barrio_'] != "on") {$this->nmgp_cmp_readonly['id_barrio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['direccion_servicio_']) || $this->nmgp_cmp_readonly['direccion_servicio_'] != "on") {$this->nmgp_cmp_readonly['direccion_servicio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_ingreso_llamada_']) || $this->nmgp_cmp_readonly['hora_ingreso_llamada_'] != "on") {$this->nmgp_cmp_readonly['hora_ingreso_llamada_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_notifica_movil_']) || $this->nmgp_cmp_readonly['hora_notifica_movil_'] != "on") {$this->nmgp_cmp_readonly['hora_notifica_movil_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_llegada_sitio_']) || $this->nmgp_cmp_readonly['hora_llegada_sitio_'] != "on") {$this->nmgp_cmp_readonly['hora_llegada_sitio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_llegada_ips_']) || $this->nmgp_cmp_readonly['hora_llegada_ips_'] != "on") {$this->nmgp_cmp_readonly['hora_llegada_ips_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_salida_ips_']) || $this->nmgp_cmp_readonly['hora_salida_ips_'] != "on") {$this->nmgp_cmp_readonly['hora_salida_ips_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_movil_']) || $this->nmgp_cmp_readonly['id_movil_'] != "on") {$this->nmgp_cmp_readonly['id_movil_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_ips_']) || $this->nmgp_cmp_readonly['id_ips_'] != "on") {$this->nmgp_cmp_readonly['id_ips_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_caso_']) || $this->nmgp_cmp_readonly['tipo_caso_'] != "on") {$this->nmgp_cmp_readonly['tipo_caso_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_medico_']) || $this->nmgp_cmp_readonly['id_medico_'] != "on") {$this->nmgp_cmp_readonly['id_medico_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->consecutivo_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['consecutivo_']; 
       $consecutivo_ = $this->consecutivo_; 
       $sStyleHidden_consecutivo_ = '';
       if (isset($sCheckRead_consecutivo_))
       {
           unset($sCheckRead_consecutivo_);
       }
       if (isset($this->nmgp_cmp_readonly['consecutivo_']))
       {
           $sCheckRead_consecutivo_ = $this->nmgp_cmp_readonly['consecutivo_'];
       }
       if (isset($this->nmgp_cmp_hidden['consecutivo_']) && $this->nmgp_cmp_hidden['consecutivo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['consecutivo_']);
           $sStyleHidden_consecutivo_ = 'display: none;';
       }
       $bTestReadOnly_consecutivo_ = true;
       $sStyleReadLab_consecutivo_ = 'display: none;';
       $sStyleReadInp_consecutivo_ = '';
       if (isset($this->nmgp_cmp_readonly['consecutivo_']) && $this->nmgp_cmp_readonly['consecutivo_'] == 'on')
       {
           $bTestReadOnly_consecutivo_ = false;
           unset($this->nmgp_cmp_readonly['consecutivo_']);
           $sStyleReadLab_consecutivo_ = '';
           $sStyleReadInp_consecutivo_ = 'display: none;';
       }
       $this->secad_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['secad_']; 
       $secad_ = $this->secad_; 
       $sStyleHidden_secad_ = '';
       if (isset($sCheckRead_secad_))
       {
           unset($sCheckRead_secad_);
       }
       if (isset($this->nmgp_cmp_readonly['secad_']))
       {
           $sCheckRead_secad_ = $this->nmgp_cmp_readonly['secad_'];
       }
       if (isset($this->nmgp_cmp_hidden['secad_']) && $this->nmgp_cmp_hidden['secad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['secad_']);
           $sStyleHidden_secad_ = 'display: none;';
       }
       $bTestReadOnly_secad_ = true;
       $sStyleReadLab_secad_ = 'display: none;';
       $sStyleReadInp_secad_ = '';
       if (isset($this->nmgp_cmp_readonly['secad_']) && $this->nmgp_cmp_readonly['secad_'] == 'on')
       {
           $bTestReadOnly_secad_ = false;
           unset($this->nmgp_cmp_readonly['secad_']);
           $sStyleReadLab_secad_ = '';
           $sStyleReadInp_secad_ = 'display: none;';
       }
       $this->quien_reporta_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['quien_reporta_']; 
       $quien_reporta_ = $this->quien_reporta_; 
       $sStyleHidden_quien_reporta_ = '';
       if (isset($sCheckRead_quien_reporta_))
       {
           unset($sCheckRead_quien_reporta_);
       }
       if (isset($this->nmgp_cmp_readonly['quien_reporta_']))
       {
           $sCheckRead_quien_reporta_ = $this->nmgp_cmp_readonly['quien_reporta_'];
       }
       if (isset($this->nmgp_cmp_hidden['quien_reporta_']) && $this->nmgp_cmp_hidden['quien_reporta_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['quien_reporta_']);
           $sStyleHidden_quien_reporta_ = 'display: none;';
       }
       $bTestReadOnly_quien_reporta_ = true;
       $sStyleReadLab_quien_reporta_ = 'display: none;';
       $sStyleReadInp_quien_reporta_ = '';
       if (isset($this->nmgp_cmp_readonly['quien_reporta_']) && $this->nmgp_cmp_readonly['quien_reporta_'] == 'on')
       {
           $bTestReadOnly_quien_reporta_ = false;
           unset($this->nmgp_cmp_readonly['quien_reporta_']);
           $sStyleReadLab_quien_reporta_ = '';
           $sStyleReadInp_quien_reporta_ = 'display: none;';
       }
       $this->discapacidad_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['discapacidad_']; 
       $discapacidad_ = $this->discapacidad_; 
       $sStyleHidden_discapacidad_ = '';
       if (isset($sCheckRead_discapacidad_))
       {
           unset($sCheckRead_discapacidad_);
       }
       if (isset($this->nmgp_cmp_readonly['discapacidad_']))
       {
           $sCheckRead_discapacidad_ = $this->nmgp_cmp_readonly['discapacidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['discapacidad_']) && $this->nmgp_cmp_hidden['discapacidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['discapacidad_']);
           $sStyleHidden_discapacidad_ = 'display: none;';
       }
       $bTestReadOnly_discapacidad_ = true;
       $sStyleReadLab_discapacidad_ = 'display: none;';
       $sStyleReadInp_discapacidad_ = '';
       if (isset($this->nmgp_cmp_readonly['discapacidad_']) && $this->nmgp_cmp_readonly['discapacidad_'] == 'on')
       {
           $bTestReadOnly_discapacidad_ = false;
           unset($this->nmgp_cmp_readonly['discapacidad_']);
           $sStyleReadLab_discapacidad_ = '';
           $sStyleReadInp_discapacidad_ = 'display: none;';
       }
       $this->nombre_apellido_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['nombre_apellido_']; 
       $nombre_apellido_ = $this->nombre_apellido_; 
       $sStyleHidden_nombre_apellido_ = '';
       if (isset($sCheckRead_nombre_apellido_))
       {
           unset($sCheckRead_nombre_apellido_);
       }
       if (isset($this->nmgp_cmp_readonly['nombre_apellido_']))
       {
           $sCheckRead_nombre_apellido_ = $this->nmgp_cmp_readonly['nombre_apellido_'];
       }
       if (isset($this->nmgp_cmp_hidden['nombre_apellido_']) && $this->nmgp_cmp_hidden['nombre_apellido_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nombre_apellido_']);
           $sStyleHidden_nombre_apellido_ = 'display: none;';
       }
       $bTestReadOnly_nombre_apellido_ = true;
       $sStyleReadLab_nombre_apellido_ = 'display: none;';
       $sStyleReadInp_nombre_apellido_ = '';
       if (isset($this->nmgp_cmp_readonly['nombre_apellido_']) && $this->nmgp_cmp_readonly['nombre_apellido_'] == 'on')
       {
           $bTestReadOnly_nombre_apellido_ = false;
           unset($this->nmgp_cmp_readonly['nombre_apellido_']);
           $sStyleReadLab_nombre_apellido_ = '';
           $sStyleReadInp_nombre_apellido_ = 'display: none;';
       }
       $this->tipo_documento_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_documento_']; 
       $tipo_documento_ = $this->tipo_documento_; 
       $sStyleHidden_tipo_documento_ = '';
       if (isset($sCheckRead_tipo_documento_))
       {
           unset($sCheckRead_tipo_documento_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_documento_']))
       {
           $sCheckRead_tipo_documento_ = $this->nmgp_cmp_readonly['tipo_documento_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_documento_']) && $this->nmgp_cmp_hidden['tipo_documento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_documento_']);
           $sStyleHidden_tipo_documento_ = 'display: none;';
       }
       $bTestReadOnly_tipo_documento_ = true;
       $sStyleReadLab_tipo_documento_ = 'display: none;';
       $sStyleReadInp_tipo_documento_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_documento_']) && $this->nmgp_cmp_readonly['tipo_documento_'] == 'on')
       {
           $bTestReadOnly_tipo_documento_ = false;
           unset($this->nmgp_cmp_readonly['tipo_documento_']);
           $sStyleReadLab_tipo_documento_ = '';
           $sStyleReadInp_tipo_documento_ = 'display: none;';
       }
       $this->documento_identidad_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['documento_identidad_']; 
       $documento_identidad_ = $this->documento_identidad_; 
       $sStyleHidden_documento_identidad_ = '';
       if (isset($sCheckRead_documento_identidad_))
       {
           unset($sCheckRead_documento_identidad_);
       }
       if (isset($this->nmgp_cmp_readonly['documento_identidad_']))
       {
           $sCheckRead_documento_identidad_ = $this->nmgp_cmp_readonly['documento_identidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['documento_identidad_']) && $this->nmgp_cmp_hidden['documento_identidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['documento_identidad_']);
           $sStyleHidden_documento_identidad_ = 'display: none;';
       }
       $bTestReadOnly_documento_identidad_ = true;
       $sStyleReadLab_documento_identidad_ = 'display: none;';
       $sStyleReadInp_documento_identidad_ = '';
       if (isset($this->nmgp_cmp_readonly['documento_identidad_']) && $this->nmgp_cmp_readonly['documento_identidad_'] == 'on')
       {
           $bTestReadOnly_documento_identidad_ = false;
           unset($this->nmgp_cmp_readonly['documento_identidad_']);
           $sStyleReadLab_documento_identidad_ = '';
           $sStyleReadInp_documento_identidad_ = 'display: none;';
       }
       $this->edad_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['edad_']; 
       $edad_ = $this->edad_; 
       $sStyleHidden_edad_ = '';
       if (isset($sCheckRead_edad_))
       {
           unset($sCheckRead_edad_);
       }
       if (isset($this->nmgp_cmp_readonly['edad_']))
       {
           $sCheckRead_edad_ = $this->nmgp_cmp_readonly['edad_'];
       }
       if (isset($this->nmgp_cmp_hidden['edad_']) && $this->nmgp_cmp_hidden['edad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['edad_']);
           $sStyleHidden_edad_ = 'display: none;';
       }
       $bTestReadOnly_edad_ = true;
       $sStyleReadLab_edad_ = 'display: none;';
       $sStyleReadInp_edad_ = '';
       if (isset($this->nmgp_cmp_readonly['edad_']) && $this->nmgp_cmp_readonly['edad_'] == 'on')
       {
           $bTestReadOnly_edad_ = false;
           unset($this->nmgp_cmp_readonly['edad_']);
           $sStyleReadLab_edad_ = '';
           $sStyleReadInp_edad_ = 'display: none;';
       }
       $this->numero_contacto_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['numero_contacto_']; 
       $numero_contacto_ = $this->numero_contacto_; 
       $sStyleHidden_numero_contacto_ = '';
       if (isset($sCheckRead_numero_contacto_))
       {
           unset($sCheckRead_numero_contacto_);
       }
       if (isset($this->nmgp_cmp_readonly['numero_contacto_']))
       {
           $sCheckRead_numero_contacto_ = $this->nmgp_cmp_readonly['numero_contacto_'];
       }
       if (isset($this->nmgp_cmp_hidden['numero_contacto_']) && $this->nmgp_cmp_hidden['numero_contacto_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numero_contacto_']);
           $sStyleHidden_numero_contacto_ = 'display: none;';
       }
       $bTestReadOnly_numero_contacto_ = true;
       $sStyleReadLab_numero_contacto_ = 'display: none;';
       $sStyleReadInp_numero_contacto_ = '';
       if (isset($this->nmgp_cmp_readonly['numero_contacto_']) && $this->nmgp_cmp_readonly['numero_contacto_'] == 'on')
       {
           $bTestReadOnly_numero_contacto_ = false;
           unset($this->nmgp_cmp_readonly['numero_contacto_']);
           $sStyleReadLab_numero_contacto_ = '';
           $sStyleReadInp_numero_contacto_ = 'display: none;';
       }
       $this->genero_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['genero_']; 
       $genero_ = $this->genero_; 
       $sStyleHidden_genero_ = '';
       if (isset($sCheckRead_genero_))
       {
           unset($sCheckRead_genero_);
       }
       if (isset($this->nmgp_cmp_readonly['genero_']))
       {
           $sCheckRead_genero_ = $this->nmgp_cmp_readonly['genero_'];
       }
       if (isset($this->nmgp_cmp_hidden['genero_']) && $this->nmgp_cmp_hidden['genero_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['genero_']);
           $sStyleHidden_genero_ = 'display: none;';
       }
       $bTestReadOnly_genero_ = true;
       $sStyleReadLab_genero_ = 'display: none;';
       $sStyleReadInp_genero_ = '';
       if (isset($this->nmgp_cmp_readonly['genero_']) && $this->nmgp_cmp_readonly['genero_'] == 'on')
       {
           $bTestReadOnly_genero_ = false;
           unset($this->nmgp_cmp_readonly['genero_']);
           $sStyleReadLab_genero_ = '';
           $sStyleReadInp_genero_ = 'display: none;';
       }
       $this->id_tipo_evento_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_tipo_evento_']; 
       $id_tipo_evento_ = $this->id_tipo_evento_; 
       $sStyleHidden_id_tipo_evento_ = '';
       if (isset($sCheckRead_id_tipo_evento_))
       {
           unset($sCheckRead_id_tipo_evento_);
       }
       if (isset($this->nmgp_cmp_readonly['id_tipo_evento_']))
       {
           $sCheckRead_id_tipo_evento_ = $this->nmgp_cmp_readonly['id_tipo_evento_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_tipo_evento_']) && $this->nmgp_cmp_hidden['id_tipo_evento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_tipo_evento_']);
           $sStyleHidden_id_tipo_evento_ = 'display: none;';
       }
       $bTestReadOnly_id_tipo_evento_ = true;
       $sStyleReadLab_id_tipo_evento_ = 'display: none;';
       $sStyleReadInp_id_tipo_evento_ = '';
       if (isset($this->nmgp_cmp_readonly['id_tipo_evento_']) && $this->nmgp_cmp_readonly['id_tipo_evento_'] == 'on')
       {
           $bTestReadOnly_id_tipo_evento_ = false;
           unset($this->nmgp_cmp_readonly['id_tipo_evento_']);
           $sStyleReadLab_id_tipo_evento_ = '';
           $sStyleReadInp_id_tipo_evento_ = 'display: none;';
       }
       $this->circunstancias_emergencia_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['circunstancias_emergencia_']; 
       $circunstancias_emergencia_ = $this->circunstancias_emergencia_; 
       $circunstancias_emergencia__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $circunstancias_emergencia_);
       $circunstancias_emergencia__val = $circunstancias_emergencia__tmp;
       $sStyleHidden_circunstancias_emergencia_ = '';
       if (isset($sCheckRead_circunstancias_emergencia_))
       {
           unset($sCheckRead_circunstancias_emergencia_);
       }
       if (isset($this->nmgp_cmp_readonly['circunstancias_emergencia_']))
       {
           $sCheckRead_circunstancias_emergencia_ = $this->nmgp_cmp_readonly['circunstancias_emergencia_'];
       }
       if (isset($this->nmgp_cmp_hidden['circunstancias_emergencia_']) && $this->nmgp_cmp_hidden['circunstancias_emergencia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['circunstancias_emergencia_']);
           $sStyleHidden_circunstancias_emergencia_ = 'display: none;';
       }
       $bTestReadOnly_circunstancias_emergencia_ = true;
       $sStyleReadLab_circunstancias_emergencia_ = 'display: none;';
       $sStyleReadInp_circunstancias_emergencia_ = '';
       if (isset($this->nmgp_cmp_readonly['circunstancias_emergencia_']) && $this->nmgp_cmp_readonly['circunstancias_emergencia_'] == 'on')
       {
           $bTestReadOnly_circunstancias_emergencia_ = false;
           unset($this->nmgp_cmp_readonly['circunstancias_emergencia_']);
           $sStyleReadLab_circunstancias_emergencia_ = '';
           $sStyleReadInp_circunstancias_emergencia_ = 'display: none;';
       }
       $this->id_eps_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_eps_']; 
       $id_eps_ = $this->id_eps_; 
       $sStyleHidden_id_eps_ = '';
       if (isset($sCheckRead_id_eps_))
       {
           unset($sCheckRead_id_eps_);
       }
       if (isset($this->nmgp_cmp_readonly['id_eps_']))
       {
           $sCheckRead_id_eps_ = $this->nmgp_cmp_readonly['id_eps_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_eps_']) && $this->nmgp_cmp_hidden['id_eps_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_eps_']);
           $sStyleHidden_id_eps_ = 'display: none;';
       }
       $bTestReadOnly_id_eps_ = true;
       $sStyleReadLab_id_eps_ = 'display: none;';
       $sStyleReadInp_id_eps_ = '';
       if (isset($this->nmgp_cmp_readonly['id_eps_']) && $this->nmgp_cmp_readonly['id_eps_'] == 'on')
       {
           $bTestReadOnly_id_eps_ = false;
           unset($this->nmgp_cmp_readonly['id_eps_']);
           $sStyleReadLab_id_eps_ = '';
           $sStyleReadInp_id_eps_ = 'display: none;';
       }
       $this->id_seguridad_social_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_seguridad_social_']; 
       $id_seguridad_social_ = $this->id_seguridad_social_; 
       $sStyleHidden_id_seguridad_social_ = '';
       if (isset($sCheckRead_id_seguridad_social_))
       {
           unset($sCheckRead_id_seguridad_social_);
       }
       if (isset($this->nmgp_cmp_readonly['id_seguridad_social_']))
       {
           $sCheckRead_id_seguridad_social_ = $this->nmgp_cmp_readonly['id_seguridad_social_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_seguridad_social_']) && $this->nmgp_cmp_hidden['id_seguridad_social_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_seguridad_social_']);
           $sStyleHidden_id_seguridad_social_ = 'display: none;';
       }
       $bTestReadOnly_id_seguridad_social_ = true;
       $sStyleReadLab_id_seguridad_social_ = 'display: none;';
       $sStyleReadInp_id_seguridad_social_ = '';
       if (isset($this->nmgp_cmp_readonly['id_seguridad_social_']) && $this->nmgp_cmp_readonly['id_seguridad_social_'] == 'on')
       {
           $bTestReadOnly_id_seguridad_social_ = false;
           unset($this->nmgp_cmp_readonly['id_seguridad_social_']);
           $sStyleReadLab_id_seguridad_social_ = '';
           $sStyleReadInp_id_seguridad_social_ = 'display: none;';
       }
       $this->zona_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['zona_']; 
       $zona_ = $this->zona_; 
       $sStyleHidden_zona_ = '';
       if (isset($sCheckRead_zona_))
       {
           unset($sCheckRead_zona_);
       }
       if (isset($this->nmgp_cmp_readonly['zona_']))
       {
           $sCheckRead_zona_ = $this->nmgp_cmp_readonly['zona_'];
       }
       if (isset($this->nmgp_cmp_hidden['zona_']) && $this->nmgp_cmp_hidden['zona_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['zona_']);
           $sStyleHidden_zona_ = 'display: none;';
       }
       $bTestReadOnly_zona_ = true;
       $sStyleReadLab_zona_ = 'display: none;';
       $sStyleReadInp_zona_ = '';
       if (isset($this->nmgp_cmp_readonly['zona_']) && $this->nmgp_cmp_readonly['zona_'] == 'on')
       {
           $bTestReadOnly_zona_ = false;
           unset($this->nmgp_cmp_readonly['zona_']);
           $sStyleReadLab_zona_ = '';
           $sStyleReadInp_zona_ = 'display: none;';
       }
       $this->tipo_servicio_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_servicio_']; 
       $tipo_servicio_ = $this->tipo_servicio_; 
       $sStyleHidden_tipo_servicio_ = '';
       if (isset($sCheckRead_tipo_servicio_))
       {
           unset($sCheckRead_tipo_servicio_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_servicio_']))
       {
           $sCheckRead_tipo_servicio_ = $this->nmgp_cmp_readonly['tipo_servicio_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_servicio_']) && $this->nmgp_cmp_hidden['tipo_servicio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_servicio_']);
           $sStyleHidden_tipo_servicio_ = 'display: none;';
       }
       $bTestReadOnly_tipo_servicio_ = true;
       $sStyleReadLab_tipo_servicio_ = 'display: none;';
       $sStyleReadInp_tipo_servicio_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_servicio_']) && $this->nmgp_cmp_readonly['tipo_servicio_'] == 'on')
       {
           $bTestReadOnly_tipo_servicio_ = false;
           unset($this->nmgp_cmp_readonly['tipo_servicio_']);
           $sStyleReadLab_tipo_servicio_ = '';
           $sStyleReadInp_tipo_servicio_ = 'display: none;';
       }
       $this->id_barrio_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_barrio_']; 
       $id_barrio_ = $this->id_barrio_; 
       $sStyleHidden_id_barrio_ = '';
       if (isset($sCheckRead_id_barrio_))
       {
           unset($sCheckRead_id_barrio_);
       }
       if (isset($this->nmgp_cmp_readonly['id_barrio_']))
       {
           $sCheckRead_id_barrio_ = $this->nmgp_cmp_readonly['id_barrio_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_barrio_']) && $this->nmgp_cmp_hidden['id_barrio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_barrio_']);
           $sStyleHidden_id_barrio_ = 'display: none;';
       }
       $bTestReadOnly_id_barrio_ = true;
       $sStyleReadLab_id_barrio_ = 'display: none;';
       $sStyleReadInp_id_barrio_ = '';
       if (isset($this->nmgp_cmp_readonly['id_barrio_']) && $this->nmgp_cmp_readonly['id_barrio_'] == 'on')
       {
           $bTestReadOnly_id_barrio_ = false;
           unset($this->nmgp_cmp_readonly['id_barrio_']);
           $sStyleReadLab_id_barrio_ = '';
           $sStyleReadInp_id_barrio_ = 'display: none;';
       }
       $this->direccion_servicio_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['direccion_servicio_']; 
       $direccion_servicio_ = $this->direccion_servicio_; 
       $direccion_servicio__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $direccion_servicio_);
       $direccion_servicio__val = $direccion_servicio__tmp;
       $sStyleHidden_direccion_servicio_ = '';
       if (isset($sCheckRead_direccion_servicio_))
       {
           unset($sCheckRead_direccion_servicio_);
       }
       if (isset($this->nmgp_cmp_readonly['direccion_servicio_']))
       {
           $sCheckRead_direccion_servicio_ = $this->nmgp_cmp_readonly['direccion_servicio_'];
       }
       if (isset($this->nmgp_cmp_hidden['direccion_servicio_']) && $this->nmgp_cmp_hidden['direccion_servicio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['direccion_servicio_']);
           $sStyleHidden_direccion_servicio_ = 'display: none;';
       }
       $bTestReadOnly_direccion_servicio_ = true;
       $sStyleReadLab_direccion_servicio_ = 'display: none;';
       $sStyleReadInp_direccion_servicio_ = '';
       if (isset($this->nmgp_cmp_readonly['direccion_servicio_']) && $this->nmgp_cmp_readonly['direccion_servicio_'] == 'on')
       {
           $bTestReadOnly_direccion_servicio_ = false;
           unset($this->nmgp_cmp_readonly['direccion_servicio_']);
           $sStyleReadLab_direccion_servicio_ = '';
           $sStyleReadInp_direccion_servicio_ = 'display: none;';
       }
       $this->hora_ingreso_llamada_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_ingreso_llamada_']; 
       $hora_ingreso_llamada_ = $this->hora_ingreso_llamada_; 
       $sStyleHidden_hora_ingreso_llamada_ = '';
       if (isset($sCheckRead_hora_ingreso_llamada_))
       {
           unset($sCheckRead_hora_ingreso_llamada_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_ingreso_llamada_']))
       {
           $sCheckRead_hora_ingreso_llamada_ = $this->nmgp_cmp_readonly['hora_ingreso_llamada_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_ingreso_llamada_']) && $this->nmgp_cmp_hidden['hora_ingreso_llamada_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_ingreso_llamada_']);
           $sStyleHidden_hora_ingreso_llamada_ = 'display: none;';
       }
       $bTestReadOnly_hora_ingreso_llamada_ = true;
       $sStyleReadLab_hora_ingreso_llamada_ = 'display: none;';
       $sStyleReadInp_hora_ingreso_llamada_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_ingreso_llamada_']) && $this->nmgp_cmp_readonly['hora_ingreso_llamada_'] == 'on')
       {
           $bTestReadOnly_hora_ingreso_llamada_ = false;
           unset($this->nmgp_cmp_readonly['hora_ingreso_llamada_']);
           $sStyleReadLab_hora_ingreso_llamada_ = '';
           $sStyleReadInp_hora_ingreso_llamada_ = 'display: none;';
       }
       $this->hora_notifica_movil_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_notifica_movil_']; 
       $hora_notifica_movil_ = $this->hora_notifica_movil_; 
       $sStyleHidden_hora_notifica_movil_ = '';
       if (isset($sCheckRead_hora_notifica_movil_))
       {
           unset($sCheckRead_hora_notifica_movil_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_notifica_movil_']))
       {
           $sCheckRead_hora_notifica_movil_ = $this->nmgp_cmp_readonly['hora_notifica_movil_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_notifica_movil_']) && $this->nmgp_cmp_hidden['hora_notifica_movil_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_notifica_movil_']);
           $sStyleHidden_hora_notifica_movil_ = 'display: none;';
       }
       $bTestReadOnly_hora_notifica_movil_ = true;
       $sStyleReadLab_hora_notifica_movil_ = 'display: none;';
       $sStyleReadInp_hora_notifica_movil_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_notifica_movil_']) && $this->nmgp_cmp_readonly['hora_notifica_movil_'] == 'on')
       {
           $bTestReadOnly_hora_notifica_movil_ = false;
           unset($this->nmgp_cmp_readonly['hora_notifica_movil_']);
           $sStyleReadLab_hora_notifica_movil_ = '';
           $sStyleReadInp_hora_notifica_movil_ = 'display: none;';
       }
       $this->hora_llegada_sitio_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_sitio_']; 
       $hora_llegada_sitio_ = $this->hora_llegada_sitio_; 
       $sStyleHidden_hora_llegada_sitio_ = '';
       if (isset($sCheckRead_hora_llegada_sitio_))
       {
           unset($sCheckRead_hora_llegada_sitio_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_llegada_sitio_']))
       {
           $sCheckRead_hora_llegada_sitio_ = $this->nmgp_cmp_readonly['hora_llegada_sitio_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_llegada_sitio_']) && $this->nmgp_cmp_hidden['hora_llegada_sitio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_llegada_sitio_']);
           $sStyleHidden_hora_llegada_sitio_ = 'display: none;';
       }
       $bTestReadOnly_hora_llegada_sitio_ = true;
       $sStyleReadLab_hora_llegada_sitio_ = 'display: none;';
       $sStyleReadInp_hora_llegada_sitio_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_llegada_sitio_']) && $this->nmgp_cmp_readonly['hora_llegada_sitio_'] == 'on')
       {
           $bTestReadOnly_hora_llegada_sitio_ = false;
           unset($this->nmgp_cmp_readonly['hora_llegada_sitio_']);
           $sStyleReadLab_hora_llegada_sitio_ = '';
           $sStyleReadInp_hora_llegada_sitio_ = 'display: none;';
       }
       $this->hora_llegada_ips_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_llegada_ips_']; 
       $hora_llegada_ips_ = $this->hora_llegada_ips_; 
       $sStyleHidden_hora_llegada_ips_ = '';
       if (isset($sCheckRead_hora_llegada_ips_))
       {
           unset($sCheckRead_hora_llegada_ips_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_llegada_ips_']))
       {
           $sCheckRead_hora_llegada_ips_ = $this->nmgp_cmp_readonly['hora_llegada_ips_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_llegada_ips_']) && $this->nmgp_cmp_hidden['hora_llegada_ips_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_llegada_ips_']);
           $sStyleHidden_hora_llegada_ips_ = 'display: none;';
       }
       $bTestReadOnly_hora_llegada_ips_ = true;
       $sStyleReadLab_hora_llegada_ips_ = 'display: none;';
       $sStyleReadInp_hora_llegada_ips_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_llegada_ips_']) && $this->nmgp_cmp_readonly['hora_llegada_ips_'] == 'on')
       {
           $bTestReadOnly_hora_llegada_ips_ = false;
           unset($this->nmgp_cmp_readonly['hora_llegada_ips_']);
           $sStyleReadLab_hora_llegada_ips_ = '';
           $sStyleReadInp_hora_llegada_ips_ = 'display: none;';
       }
       $this->hora_salida_ips_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['hora_salida_ips_']; 
       $hora_salida_ips_ = $this->hora_salida_ips_; 
       $sStyleHidden_hora_salida_ips_ = '';
       if (isset($sCheckRead_hora_salida_ips_))
       {
           unset($sCheckRead_hora_salida_ips_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_salida_ips_']))
       {
           $sCheckRead_hora_salida_ips_ = $this->nmgp_cmp_readonly['hora_salida_ips_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_salida_ips_']) && $this->nmgp_cmp_hidden['hora_salida_ips_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_salida_ips_']);
           $sStyleHidden_hora_salida_ips_ = 'display: none;';
       }
       $bTestReadOnly_hora_salida_ips_ = true;
       $sStyleReadLab_hora_salida_ips_ = 'display: none;';
       $sStyleReadInp_hora_salida_ips_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_salida_ips_']) && $this->nmgp_cmp_readonly['hora_salida_ips_'] == 'on')
       {
           $bTestReadOnly_hora_salida_ips_ = false;
           unset($this->nmgp_cmp_readonly['hora_salida_ips_']);
           $sStyleReadLab_hora_salida_ips_ = '';
           $sStyleReadInp_hora_salida_ips_ = 'display: none;';
       }
       $this->id_movil_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_movil_']; 
       $id_movil_ = $this->id_movil_; 
       $sStyleHidden_id_movil_ = '';
       if (isset($sCheckRead_id_movil_))
       {
           unset($sCheckRead_id_movil_);
       }
       if (isset($this->nmgp_cmp_readonly['id_movil_']))
       {
           $sCheckRead_id_movil_ = $this->nmgp_cmp_readonly['id_movil_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_movil_']) && $this->nmgp_cmp_hidden['id_movil_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_movil_']);
           $sStyleHidden_id_movil_ = 'display: none;';
       }
       $bTestReadOnly_id_movil_ = true;
       $sStyleReadLab_id_movil_ = 'display: none;';
       $sStyleReadInp_id_movil_ = '';
       if (isset($this->nmgp_cmp_readonly['id_movil_']) && $this->nmgp_cmp_readonly['id_movil_'] == 'on')
       {
           $bTestReadOnly_id_movil_ = false;
           unset($this->nmgp_cmp_readonly['id_movil_']);
           $sStyleReadLab_id_movil_ = '';
           $sStyleReadInp_id_movil_ = 'display: none;';
       }
       $this->id_ips_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_ips_']; 
       $id_ips_ = $this->id_ips_; 
       $sStyleHidden_id_ips_ = '';
       if (isset($sCheckRead_id_ips_))
       {
           unset($sCheckRead_id_ips_);
       }
       if (isset($this->nmgp_cmp_readonly['id_ips_']))
       {
           $sCheckRead_id_ips_ = $this->nmgp_cmp_readonly['id_ips_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_ips_']) && $this->nmgp_cmp_hidden['id_ips_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_ips_']);
           $sStyleHidden_id_ips_ = 'display: none;';
       }
       $bTestReadOnly_id_ips_ = true;
       $sStyleReadLab_id_ips_ = 'display: none;';
       $sStyleReadInp_id_ips_ = '';
       if (isset($this->nmgp_cmp_readonly['id_ips_']) && $this->nmgp_cmp_readonly['id_ips_'] == 'on')
       {
           $bTestReadOnly_id_ips_ = false;
           unset($this->nmgp_cmp_readonly['id_ips_']);
           $sStyleReadLab_id_ips_ = '';
           $sStyleReadInp_id_ips_ = 'display: none;';
       }
       $this->tipo_caso_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['tipo_caso_']; 
       $tipo_caso_ = $this->tipo_caso_; 
       $sStyleHidden_tipo_caso_ = '';
       if (isset($sCheckRead_tipo_caso_))
       {
           unset($sCheckRead_tipo_caso_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_caso_']))
       {
           $sCheckRead_tipo_caso_ = $this->nmgp_cmp_readonly['tipo_caso_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_caso_']) && $this->nmgp_cmp_hidden['tipo_caso_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_caso_']);
           $sStyleHidden_tipo_caso_ = 'display: none;';
       }
       $bTestReadOnly_tipo_caso_ = true;
       $sStyleReadLab_tipo_caso_ = 'display: none;';
       $sStyleReadInp_tipo_caso_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_caso_']) && $this->nmgp_cmp_readonly['tipo_caso_'] == 'on')
       {
           $bTestReadOnly_tipo_caso_ = false;
           unset($this->nmgp_cmp_readonly['tipo_caso_']);
           $sStyleReadLab_tipo_caso_ = '';
           $sStyleReadInp_tipo_caso_ = 'display: none;';
       }
       $this->id_medico_ = $this->form_vert_procedimiento_final[$sc_seq_vert]['id_medico_']; 
       $id_medico_ = $this->id_medico_; 
       $sStyleHidden_id_medico_ = '';
       if (isset($sCheckRead_id_medico_))
       {
           unset($sCheckRead_id_medico_);
       }
       if (isset($this->nmgp_cmp_readonly['id_medico_']))
       {
           $sCheckRead_id_medico_ = $this->nmgp_cmp_readonly['id_medico_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_medico_']) && $this->nmgp_cmp_hidden['id_medico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_medico_']);
           $sStyleHidden_id_medico_ = 'display: none;';
       }
       $bTestReadOnly_id_medico_ = true;
       $sStyleReadLab_id_medico_ = 'display: none;';
       $sStyleReadInp_id_medico_ = '';
       if (isset($this->nmgp_cmp_readonly['id_medico_']) && $this->nmgp_cmp_readonly['id_medico_'] == 'on')
       {
           $bTestReadOnly_id_medico_ = false;
           unset($this->nmgp_cmp_readonly['id_medico_']);
           $sStyleReadLab_id_medico_ = '';
           $sStyleReadInp_id_medico_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?> class="sc-row" data-sc-row-number="<?php echo $sc_seq_vert; ?>">


   <?php
        if (!$this->Embutida_form) {
            $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD  class="<?php echo $this->css_inherit_bg . ' ' ?>scFormDataOddMult <?php echo $classColFld ?>"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   <?php
            $this->form_fixed_column_no++;
        }
?>

   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD  class="<?php echo $this->css_inherit_bg . ' ' ?>scFormDataOddMult <?php echo $classColFld ?>" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php 
       $this->form_fixed_column_no++;
}?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD  class="<?php echo $this->css_inherit_bg . ' ' ?>scFormDataOddMult <?php echo $classColFld ?>" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php 
       $this->form_fixed_column_no++;
}?>
   <?php if ($this->Embutida_form) {
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD  class="<?php echo $this->css_inherit_bg . ' ' ?>scFormDataOddMult <?php echo $classColFld ?>"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_procedimiento_final_add_new_line(" . $sc_seq_vert . ")", "do_ajax_procedimiento_final_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_procedimiento_final_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_procedimiento_final_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_procedimiento_final_cancel_update(" . $sc_seq_vert . ")", "do_ajax_procedimiento_final_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
 </TD>
   <?php 
       $this->form_fixed_column_no++;
}?>
   <?php if (isset($this->nmgp_cmp_hidden['consecutivo_']) && $this->nmgp_cmp_hidden['consecutivo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consecutivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($consecutivo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_consecutivo__line <?php echo $classColFld ?>" id="hidden_field_data_consecutivo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_consecutivo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_consecutivo__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="consecutivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($consecutivo_); ?>"><span id="id_ajax_label_consecutivo_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($consecutivo_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consecutivo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consecutivo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['secad_']) && $this->nmgp_cmp_hidden['secad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="secad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($secad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_secad__line <?php echo $classColFld ?>" id="hidden_field_data_secad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_secad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_secad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_secad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["secad_"]) &&  $this->nmgp_cmp_readonly["secad_"] == "on") { 

 ?>
<input type="hidden" name="secad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($secad_) . "\">" . $secad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_secad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-secad_<?php echo $sc_seq_vert ?> css_secad__line" style="<?php echo $sStyleReadLab_secad_; ?>"><?php echo $this->form_format_readonly("secad_", $this->form_encode_input($this->secad_)); ?></span><span id="id_read_off_secad_<?php echo $sc_seq_vert ?>" class="css_read_off_secad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_secad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_secad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_secad_<?php echo $sc_seq_vert ?>" type=text name="secad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($secad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_secad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_secad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['quien_reporta_']) && $this->nmgp_cmp_hidden['quien_reporta_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="quien_reporta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->quien_reporta_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_quien_reporta__line <?php echo $classColFld ?>" id="hidden_field_data_quien_reporta_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_quien_reporta_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_quien_reporta__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_quien_reporta_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quien_reporta_"]) &&  $this->nmgp_cmp_readonly["quien_reporta_"] == "on") { 

$quien_reporta__look = "";
 if ($this->quien_reporta_ == "PONAL ") { $quien_reporta__look .= "PONAL " ;} 
 if ($this->quien_reporta_ == "BOMBEROS ") { $quien_reporta__look .= "BOMBEROS " ;} 
 if ($this->quien_reporta_ == "CRUZ ROJA ") { $quien_reporta__look .= "CRUZ ROJA " ;} 
 if ($this->quien_reporta_ == "CRUEB") { $quien_reporta__look .= "CRUEB" ;} 
 if ($this->quien_reporta_ == "SCOUTS") { $quien_reporta__look .= "SCOUTS" ;} 
 if ($this->quien_reporta_ == "USUARIO A NUMERO CRUEMT") { $quien_reporta__look .= "USUARIO A NUMERO CRUEMT" ;} 
 if ($this->quien_reporta_ == "PSICOLOGA SALUD MENTAL") { $quien_reporta__look .= "PSICOLOGA SALUD MENTAL" ;} 
 if ($this->quien_reporta_ == "MOVIL 1") { $quien_reporta__look .= "MOVIL 1" ;} 
 if ($this->quien_reporta_ == "MOVIL 2") { $quien_reporta__look .= "MOVIL 2" ;} 
 if (empty($quien_reporta__look)) { $quien_reporta__look = $this->quien_reporta_; }
?>
<input type="hidden" name="quien_reporta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($quien_reporta_) . "\">" . $quien_reporta__look . ""; ?>
<?php } else { ?>
<?php

$quien_reporta__look = "";
 if ($this->quien_reporta_ == "PONAL ") { $quien_reporta__look .= "PONAL " ;} 
 if ($this->quien_reporta_ == "BOMBEROS ") { $quien_reporta__look .= "BOMBEROS " ;} 
 if ($this->quien_reporta_ == "CRUZ ROJA ") { $quien_reporta__look .= "CRUZ ROJA " ;} 
 if ($this->quien_reporta_ == "CRUEB") { $quien_reporta__look .= "CRUEB" ;} 
 if ($this->quien_reporta_ == "SCOUTS") { $quien_reporta__look .= "SCOUTS" ;} 
 if ($this->quien_reporta_ == "USUARIO A NUMERO CRUEMT") { $quien_reporta__look .= "USUARIO A NUMERO CRUEMT" ;} 
 if ($this->quien_reporta_ == "PSICOLOGA SALUD MENTAL") { $quien_reporta__look .= "PSICOLOGA SALUD MENTAL" ;} 
 if ($this->quien_reporta_ == "MOVIL 1") { $quien_reporta__look .= "MOVIL 1" ;} 
 if ($this->quien_reporta_ == "MOVIL 2") { $quien_reporta__look .= "MOVIL 2" ;} 
 if (empty($quien_reporta__look)) { $quien_reporta__look = $this->quien_reporta_; }
?>
<span id="id_read_on_quien_reporta_<?php echo $sc_seq_vert ; ?>" class="css_quien_reporta__line"  style="<?php echo $sStyleReadLab_quien_reporta_; ?>"><?php echo $this->form_format_readonly("quien_reporta_", $this->form_encode_input($quien_reporta__look)); ?></span><span id="id_read_off_quien_reporta_<?php echo $sc_seq_vert ; ?>" class="css_read_off_quien_reporta_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_quien_reporta_; ?>">
 <span id="idAjaxSelect_quien_reporta_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_quien_reporta__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_quien_reporta_<?php echo $sc_seq_vert ?>" name="quien_reporta_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="PONAL " <?php  if ($this->quien_reporta_ == "PONAL ") { echo " selected" ;} ?>>PONAL </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'PONAL '; ?>
 <option  value="BOMBEROS " <?php  if ($this->quien_reporta_ == "BOMBEROS ") { echo " selected" ;} ?>>BOMBEROS </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'BOMBEROS '; ?>
 <option  value="CRUZ ROJA " <?php  if ($this->quien_reporta_ == "CRUZ ROJA ") { echo " selected" ;} ?>>CRUZ ROJA </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'CRUZ ROJA '; ?>
 <option  value="CRUEB" <?php  if ($this->quien_reporta_ == "CRUEB") { echo " selected" ;} ?>>CRUEB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'CRUEB'; ?>
 <option  value="SCOUTS" <?php  if ($this->quien_reporta_ == "SCOUTS") { echo " selected" ;} ?>>SCOUTS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'SCOUTS'; ?>
 <option  value="USUARIO A NUMERO CRUEMT" <?php  if ($this->quien_reporta_ == "USUARIO A NUMERO CRUEMT") { echo " selected" ;} ?>>USUARIO A NUMERO CRUEMT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'USUARIO A NUMERO CRUEMT'; ?>
 <option  value="PSICOLOGA SALUD MENTAL" <?php  if ($this->quien_reporta_ == "PSICOLOGA SALUD MENTAL") { echo " selected" ;} ?>>PSICOLOGA SALUD MENTAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'PSICOLOGA SALUD MENTAL'; ?>
 <option  value="MOVIL 1" <?php  if ($this->quien_reporta_ == "MOVIL 1") { echo " selected" ;} ?>>MOVIL 1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'MOVIL 1'; ?>
 <option  value="MOVIL 2" <?php  if ($this->quien_reporta_ == "MOVIL 2") { echo " selected" ;} ?>>MOVIL 2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_quien_reporta_'][] = 'MOVIL 2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_quien_reporta_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quien_reporta_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['discapacidad_']) && $this->nmgp_cmp_hidden['discapacidad_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="discapacidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->discapacidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_discapacidad__line <?php echo $classColFld ?>" id="hidden_field_data_discapacidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_discapacidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_discapacidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_discapacidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discapacidad_"]) &&  $this->nmgp_cmp_readonly["discapacidad_"] == "on") { 

$discapacidad__look = "";
 if ($this->discapacidad_ == "VISUAL") { $discapacidad__look .= "VISUAL" ;} 
 if ($this->discapacidad_ == "AUDITIVA") { $discapacidad__look .= "AUDITIVA" ;} 
 if ($this->discapacidad_ == "FISICA") { $discapacidad__look .= "FISICA" ;} 
 if ($this->discapacidad_ == "SORDOCEGUERA") { $discapacidad__look .= "SORDOCEGUERA" ;} 
 if ($this->discapacidad_ == "MULTIPLE") { $discapacidad__look .= "MULTIPLE" ;} 
 if ($this->discapacidad_ == "INTELECTUAL ") { $discapacidad__look .= "INTELECTUAL " ;} 
 if ($this->discapacidad_ == "PSICOSOCIAL") { $discapacidad__look .= "PSICOSOCIAL" ;} 
 if (empty($discapacidad__look)) { $discapacidad__look = $this->discapacidad_; }
?>
<input type="hidden" name="discapacidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($discapacidad_) . "\">" . $discapacidad__look . ""; ?>
<?php } else { ?>
<?php

$discapacidad__look = "";
 if ($this->discapacidad_ == "VISUAL") { $discapacidad__look .= "VISUAL" ;} 
 if ($this->discapacidad_ == "AUDITIVA") { $discapacidad__look .= "AUDITIVA" ;} 
 if ($this->discapacidad_ == "FISICA") { $discapacidad__look .= "FISICA" ;} 
 if ($this->discapacidad_ == "SORDOCEGUERA") { $discapacidad__look .= "SORDOCEGUERA" ;} 
 if ($this->discapacidad_ == "MULTIPLE") { $discapacidad__look .= "MULTIPLE" ;} 
 if ($this->discapacidad_ == "INTELECTUAL ") { $discapacidad__look .= "INTELECTUAL " ;} 
 if ($this->discapacidad_ == "PSICOSOCIAL") { $discapacidad__look .= "PSICOSOCIAL" ;} 
 if (empty($discapacidad__look)) { $discapacidad__look = $this->discapacidad_; }
?>
<span id="id_read_on_discapacidad_<?php echo $sc_seq_vert ; ?>" class="css_discapacidad__line"  style="<?php echo $sStyleReadLab_discapacidad_; ?>"><?php echo $this->form_format_readonly("discapacidad_", $this->form_encode_input($discapacidad__look)); ?></span><span id="id_read_off_discapacidad_<?php echo $sc_seq_vert ; ?>" class="css_read_off_discapacidad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_discapacidad_; ?>">
 <span id="idAjaxSelect_discapacidad_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_discapacidad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_discapacidad_<?php echo $sc_seq_vert ?>" name="discapacidad_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="VISUAL" <?php  if ($this->discapacidad_ == "VISUAL") { echo " selected" ;} ?>>VISUAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'VISUAL'; ?>
 <option  value="AUDITIVA" <?php  if ($this->discapacidad_ == "AUDITIVA") { echo " selected" ;} ?>>AUDITIVA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'AUDITIVA'; ?>
 <option  value="FISICA" <?php  if ($this->discapacidad_ == "FISICA") { echo " selected" ;} ?>>FISICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'FISICA'; ?>
 <option  value="SORDOCEGUERA" <?php  if ($this->discapacidad_ == "SORDOCEGUERA") { echo " selected" ;} ?>>SORDOCEGUERA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'SORDOCEGUERA'; ?>
 <option  value="MULTIPLE" <?php  if ($this->discapacidad_ == "MULTIPLE") { echo " selected" ;} ?>>MULTIPLE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'MULTIPLE'; ?>
 <option  value="INTELECTUAL " <?php  if ($this->discapacidad_ == "INTELECTUAL ") { echo " selected" ;} ?>>INTELECTUAL </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'INTELECTUAL '; ?>
 <option  value="PSICOSOCIAL" <?php  if ($this->discapacidad_ == "PSICOSOCIAL") { echo " selected" ;} ?>>PSICOSOCIAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_discapacidad_'][] = 'PSICOSOCIAL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_discapacidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_discapacidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre_apellido_']) && $this->nmgp_cmp_hidden['nombre_apellido_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre_apellido_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_nombre_apellido__line <?php echo $classColFld ?>" id="hidden_field_data_nombre_apellido_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nombre_apellido_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nombre_apellido__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nombre_apellido_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_apellido_"]) &&  $this->nmgp_cmp_readonly["nombre_apellido_"] == "on") { 

 ?>
<input type="hidden" name="nombre_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre_apellido_) . "\">" . $nombre_apellido_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_apellido_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nombre_apellido_<?php echo $sc_seq_vert ?> css_nombre_apellido__line" style="<?php echo $sStyleReadLab_nombre_apellido_; ?>"><?php echo $this->form_format_readonly("nombre_apellido_", $this->form_encode_input($this->nombre_apellido_)); ?></span><span id="id_read_off_nombre_apellido_<?php echo $sc_seq_vert ?>" class="css_read_off_nombre_apellido_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_apellido_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nombre_apellido__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_apellido_<?php echo $sc_seq_vert ?>" type=text name="nombre_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre_apellido_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=90 alt="{datatype: 'text', maxLength: 90, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_apellido_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_apellido_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_documento_']) && $this->nmgp_cmp_hidden['tipo_documento_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_documento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_tipo_documento__line <?php echo $classColFld ?>" id="hidden_field_data_tipo_documento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_documento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_documento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_documento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_documento_"]) &&  $this->nmgp_cmp_readonly["tipo_documento_"] == "on") { 

$tipo_documento__look = "";
 if ($this->tipo_documento_ == "CC") { $tipo_documento__look .= "CC" ;} 
 if ($this->tipo_documento_ == "TI") { $tipo_documento__look .= "TI" ;} 
 if ($this->tipo_documento_ == "RC") { $tipo_documento__look .= "RC" ;} 
 if ($this->tipo_documento_ == "CE") { $tipo_documento__look .= "CE" ;} 
 if ($this->tipo_documento_ == "PEP") { $tipo_documento__look .= "PEP" ;} 
 if ($this->tipo_documento_ == "SC") { $tipo_documento__look .= "SC" ;} 
 if ($this->tipo_documento_ == "PAS") { $tipo_documento__look .= "PAS" ;} 
 if ($this->tipo_documento_ == "NI") { $tipo_documento__look .= "NI" ;} 
 if ($this->tipo_documento_ == "SIN DATO") { $tipo_documento__look .= "SIN DATO" ;} 
 if (empty($tipo_documento__look)) { $tipo_documento__look = $this->tipo_documento_; }
?>
<input type="hidden" name="tipo_documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_documento_) . "\">" . $tipo_documento__look . ""; ?>
<?php } else { ?>
<?php

$tipo_documento__look = "";
 if ($this->tipo_documento_ == "CC") { $tipo_documento__look .= "CC" ;} 
 if ($this->tipo_documento_ == "TI") { $tipo_documento__look .= "TI" ;} 
 if ($this->tipo_documento_ == "RC") { $tipo_documento__look .= "RC" ;} 
 if ($this->tipo_documento_ == "CE") { $tipo_documento__look .= "CE" ;} 
 if ($this->tipo_documento_ == "PEP") { $tipo_documento__look .= "PEP" ;} 
 if ($this->tipo_documento_ == "SC") { $tipo_documento__look .= "SC" ;} 
 if ($this->tipo_documento_ == "PAS") { $tipo_documento__look .= "PAS" ;} 
 if ($this->tipo_documento_ == "NI") { $tipo_documento__look .= "NI" ;} 
 if ($this->tipo_documento_ == "SIN DATO") { $tipo_documento__look .= "SIN DATO" ;} 
 if (empty($tipo_documento__look)) { $tipo_documento__look = $this->tipo_documento_; }
?>
<span id="id_read_on_tipo_documento_<?php echo $sc_seq_vert ; ?>" class="css_tipo_documento__line"  style="<?php echo $sStyleReadLab_tipo_documento_; ?>"><?php echo $this->form_format_readonly("tipo_documento_", $this->form_encode_input($tipo_documento__look)); ?></span><span id="id_read_off_tipo_documento_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_documento_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_documento_; ?>">
 <span id="idAjaxSelect_tipo_documento_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_tipo_documento__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_documento_<?php echo $sc_seq_vert ?>" name="tipo_documento_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="CC" <?php  if ($this->tipo_documento_ == "CC") { echo " selected" ;} ?>>CC</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'CC'; ?>
 <option  value="TI" <?php  if ($this->tipo_documento_ == "TI") { echo " selected" ;} ?>>TI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'TI'; ?>
 <option  value="RC" <?php  if ($this->tipo_documento_ == "RC") { echo " selected" ;} ?>>RC</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'RC'; ?>
 <option  value="CE" <?php  if ($this->tipo_documento_ == "CE") { echo " selected" ;} ?>>CE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'CE'; ?>
 <option  value="PEP" <?php  if ($this->tipo_documento_ == "PEP") { echo " selected" ;} ?>>PEP</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'PEP'; ?>
 <option  value="SC" <?php  if ($this->tipo_documento_ == "SC") { echo " selected" ;} ?>>SC</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'SC'; ?>
 <option  value="PAS" <?php  if ($this->tipo_documento_ == "PAS") { echo " selected" ;} ?>>PAS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'PAS'; ?>
 <option  value="NI" <?php  if ($this->tipo_documento_ == "NI") { echo " selected" ;} ?>>NI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'NI'; ?>
 <option  value="SIN DATO" <?php  if ($this->tipo_documento_ == "SIN DATO") { echo " selected" ;} ?>>SIN DATO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_documento_'][] = 'SIN DATO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_documento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_documento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['documento_identidad_']) && $this->nmgp_cmp_hidden['documento_identidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="documento_identidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_identidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_documento_identidad__line <?php echo $classColFld ?>" id="hidden_field_data_documento_identidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_documento_identidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_documento_identidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_documento_identidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["documento_identidad_"]) &&  $this->nmgp_cmp_readonly["documento_identidad_"] == "on") { 

 ?>
<input type="hidden" name="documento_identidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_identidad_) . "\">" . $documento_identidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_documento_identidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-documento_identidad_<?php echo $sc_seq_vert ?> css_documento_identidad__line" style="<?php echo $sStyleReadLab_documento_identidad_; ?>"><?php echo $this->form_format_readonly("documento_identidad_", $this->form_encode_input($this->documento_identidad_)); ?></span><span id="id_read_off_documento_identidad_<?php echo $sc_seq_vert ?>" class="css_read_off_documento_identidad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_documento_identidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_documento_identidad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_documento_identidad_<?php echo $sc_seq_vert ?>" type=text name="documento_identidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_identidad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_documento_identidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_documento_identidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['edad_']) && $this->nmgp_cmp_hidden['edad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="edad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($edad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_edad__line <?php echo $classColFld ?>" id="hidden_field_data_edad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_edad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_edad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_edad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["edad_"]) &&  $this->nmgp_cmp_readonly["edad_"] == "on") { 

 ?>
<input type="hidden" name="edad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($edad_) . "\">" . $edad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_edad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-edad_<?php echo $sc_seq_vert ?> css_edad__line" style="<?php echo $sStyleReadLab_edad_; ?>"><?php echo $this->form_format_readonly("edad_", $this->form_encode_input($this->edad_)); ?></span><span id="id_read_off_edad_<?php echo $sc_seq_vert ?>" class="css_read_off_edad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_edad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_edad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_edad_<?php echo $sc_seq_vert ?>" type=text name="edad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($edad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['edad_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['edad_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['edad_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_edad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_edad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_contacto_']) && $this->nmgp_cmp_hidden['numero_contacto_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_contacto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_contacto_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_numero_contacto__line <?php echo $classColFld ?>" id="hidden_field_data_numero_contacto_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numero_contacto_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numero_contacto__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numero_contacto_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_contacto_"]) &&  $this->nmgp_cmp_readonly["numero_contacto_"] == "on") { 

 ?>
<input type="hidden" name="numero_contacto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_contacto_) . "\">" . $numero_contacto_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_contacto_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numero_contacto_<?php echo $sc_seq_vert ?> css_numero_contacto__line" style="<?php echo $sStyleReadLab_numero_contacto_; ?>"><?php echo $this->form_format_readonly("numero_contacto_", $this->form_encode_input($this->numero_contacto_)); ?></span><span id="id_read_off_numero_contacto_<?php echo $sc_seq_vert ?>" class="css_read_off_numero_contacto_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_contacto_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numero_contacto__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_contacto_<?php echo $sc_seq_vert ?>" type=text name="numero_contacto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_contacto_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_contacto_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_contacto_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['genero_']) && $this->nmgp_cmp_hidden['genero_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="genero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($genero_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_genero__line <?php echo $classColFld ?>" id="hidden_field_data_genero_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_genero_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_genero__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_genero_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["genero_"]) &&  $this->nmgp_cmp_readonly["genero_"] == "on") { 

 if ("M" == $this->genero_) { $genero__look = "M";} 
 if ("T" == $this->genero_) { $genero__look = "T";} 
 if ("F" == $this->genero_) { $genero__look = "F";} 
 if ("N" == $this->genero_) { $genero__look = "N";} 
 if ("" == $this->genero_) { $genero__look = "O";} 
?>
<input type="hidden" name="genero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($genero_) . "\">" . $genero__look . ""; ?>
<?php } else { ?>

<?php

 if ("M" == $this->genero_) { $genero__look = "M";} 
 if ("T" == $this->genero_) { $genero__look = "T";} 
 if ("F" == $this->genero_) { $genero__look = "F";} 
 if ("N" == $this->genero_) { $genero__look = "N";} 
 if ("" == $this->genero_) { $genero__look = "O";} 
?>
<span id="id_read_on_genero_<?php echo $sc_seq_vert ; ?>"  class="css_genero__line" style="<?php echo $sStyleReadLab_genero_; ?>"><?php echo $this->form_format_readonly("genero_", $this->form_encode_input($genero__look)); ?></span><span id="id_read_off_genero_<?php echo $sc_seq_vert ; ?>" class="css_read_off_genero_ css_genero__line" style="<?php echo $sStyleReadInp_genero_; ?>"><div id="idAjaxRadio_genero_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_genero__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_genero__line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero_ sc-ui-radio-genero_<?php echo $sc_seq_vert ?>" type=radio name="genero_<?php echo $sc_seq_vert ?>" value="M"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'M'; ?>
<?php  if ("M" == $this->genero_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><span></span>
<label for="<?php echo $tempOptionId ?>">M</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_genero__line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero_ sc-ui-radio-genero_<?php echo $sc_seq_vert ?>" type=radio name="genero_<?php echo $sc_seq_vert ?>" value="T"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'T'; ?>
<?php  if ("T" == $this->genero_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><span></span>
<label for="<?php echo $tempOptionId ?>">T</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_genero__line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero_" . $sc_seq_vert . "-3"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero_ sc-ui-radio-genero_<?php echo $sc_seq_vert ?>" type=radio name="genero_<?php echo $sc_seq_vert ?>" value="F"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'F'; ?>
<?php  if ("F" == $this->genero_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><span></span>
<label for="<?php echo $tempOptionId ?>">F</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_genero__line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero_" . $sc_seq_vert . "-4"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero_ sc-ui-radio-genero_<?php echo $sc_seq_vert ?>" type=radio name="genero_<?php echo $sc_seq_vert ?>" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = 'N'; ?>
<?php  if ("N" == $this->genero_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><span></span>
<label for="<?php echo $tempOptionId ?>">N</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_genero__line">
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "<div class=\"sc radio\">";
   } 
?>
<?php $tempOptionId = "id-opt-genero_" . $sc_seq_vert . "-5"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-genero_ sc-ui-radio-genero_<?php echo $sc_seq_vert ?>" type=radio name="genero_<?php echo $sc_seq_vert ?>" value=""
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_genero_'][] = ''; ?>
<?php  if ("" == $this->genero_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><span></span>
<label for="<?php echo $tempOptionId ?>">O</label>
<?php
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['pdf_view']) {
       echo "</div>";
   } 
?>
</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_genero_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_genero_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_tipo_evento_']) && $this->nmgp_cmp_hidden['id_tipo_evento_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_tipo_evento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_tipo_evento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_tipo_evento__line <?php echo $classColFld ?>" id="hidden_field_data_id_tipo_evento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_tipo_evento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_tipo_evento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_tipo_evento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_tipo_evento_"]) &&  $this->nmgp_cmp_readonly["id_tipo_evento_"] == "on") { 
 
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
   $x = 0; 
   $id_tipo_evento__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_tipo_evento__1))
          {
              foreach ($this->id_tipo_evento__1 as $tmp_id_tipo_evento_)
              {
                  if (trim($tmp_id_tipo_evento_) === trim($cadaselect[1])) {$id_tipo_evento__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_tipo_evento_) && trim($this->id_tipo_evento_) === trim($cadaselect[1])) {$id_tipo_evento__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_tipo_evento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_tipo_evento_) . "\">" . $id_tipo_evento__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_tipo_evento_();
   $x = 0 ; 
   $id_tipo_evento__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_tipo_evento__1))
          {
              foreach ($this->id_tipo_evento__1 as $tmp_id_tipo_evento_)
              {
                  if (trim($tmp_id_tipo_evento_) === trim($cadaselect[1])) {$id_tipo_evento__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_tipo_evento_) && trim($this->id_tipo_evento_) === trim($cadaselect[1])) { $id_tipo_evento__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_tipo_evento__look))
          {
              $id_tipo_evento__look = $this->id_tipo_evento_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_tipo_evento_" . $sc_seq_vert . "\" class=\"css_id_tipo_evento__line\" style=\"" .  $sStyleReadLab_id_tipo_evento_ . "\">" . $this->form_format_readonly("id_tipo_evento_", $this->form_encode_input($id_tipo_evento__look)) . "</span><span id=\"id_read_off_id_tipo_evento_" . $sc_seq_vert . "\" class=\"css_read_off_id_tipo_evento_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_tipo_evento_ . "\">";
   echo " <span id=\"idAjaxSelect_id_tipo_evento_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_tipo_evento__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_tipo_evento_" . $sc_seq_vert . "\" name=\"id_tipo_evento_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_tipo_evento_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_tipo_evento_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_tipo_evento_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_tipo_evento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_tipo_evento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['circunstancias_emergencia_']) && $this->nmgp_cmp_hidden['circunstancias_emergencia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="circunstancias_emergencia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($circunstancias_emergencia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_circunstancias_emergencia__line <?php echo $classColFld ?>" id="hidden_field_data_circunstancias_emergencia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_circunstancias_emergencia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_circunstancias_emergencia__line" style="vertical-align: top;padding: 0px">
<?php
$circunstancias_emergencia__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($circunstancias_emergencia_));

?>

<?php if ($bTestReadOnly_circunstancias_emergencia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["circunstancias_emergencia_"]) &&  $this->nmgp_cmp_readonly["circunstancias_emergencia_"] == "on") { 

 ?>
<input type="hidden" name="circunstancias_emergencia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($circunstancias_emergencia_) . "\">" . $circunstancias_emergencia__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_circunstancias_emergencia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-circunstancias_emergencia_<?php echo $sc_seq_vert ?> css_circunstancias_emergencia__line" style="<?php echo $sStyleReadLab_circunstancias_emergencia_; ?>"><?php echo $this->form_format_readonly("circunstancias_emergencia_", $this->form_encode_input($circunstancias_emergencia__val)); ?></span><span id="id_read_off_circunstancias_emergencia_<?php echo $sc_seq_vert ?>" class="css_read_off_circunstancias_emergencia_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_circunstancias_emergencia_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_circunstancias_emergencia__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="circunstancias_emergencia_<?php echo $sc_seq_vert ?>" id="id_sc_field_circunstancias_emergencia_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 2500, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $circunstancias_emergencia_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_circunstancias_emergencia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_circunstancias_emergencia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_eps_']) && $this->nmgp_cmp_hidden['id_eps_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_eps_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_eps_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_eps__line <?php echo $classColFld ?>" id="hidden_field_data_id_eps_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_eps_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_eps__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_eps_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_eps_"]) &&  $this->nmgp_cmp_readonly["id_eps_"] == "on") { 
 
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
   $x = 0; 
   $id_eps__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_eps__1))
          {
              foreach ($this->id_eps__1 as $tmp_id_eps_)
              {
                  if (trim($tmp_id_eps_) === trim($cadaselect[1])) {$id_eps__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_eps_) && trim($this->id_eps_) === trim($cadaselect[1])) {$id_eps__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_eps_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_eps_) . "\">" . $id_eps__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_eps_();
   $x = 0 ; 
   $id_eps__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_eps__1))
          {
              foreach ($this->id_eps__1 as $tmp_id_eps_)
              {
                  if (trim($tmp_id_eps_) === trim($cadaselect[1])) {$id_eps__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_eps_) && trim($this->id_eps_) === trim($cadaselect[1])) { $id_eps__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_eps__look))
          {
              $id_eps__look = $this->id_eps_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_eps_" . $sc_seq_vert . "\" class=\"css_id_eps__line\" style=\"" .  $sStyleReadLab_id_eps_ . "\">" . $this->form_format_readonly("id_eps_", $this->form_encode_input($id_eps__look)) . "</span><span id=\"id_read_off_id_eps_" . $sc_seq_vert . "\" class=\"css_read_off_id_eps_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_eps_ . "\">";
   echo " <span id=\"idAjaxSelect_id_eps_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_eps__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_eps_" . $sc_seq_vert . "\" name=\"id_eps_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_eps_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_eps_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_eps_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_eps_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_eps_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_seguridad_social_']) && $this->nmgp_cmp_hidden['id_seguridad_social_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_seguridad_social_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_seguridad_social_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_seguridad_social__line <?php echo $classColFld ?>" id="hidden_field_data_id_seguridad_social_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_seguridad_social_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_seguridad_social__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_seguridad_social_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_seguridad_social_"]) &&  $this->nmgp_cmp_readonly["id_seguridad_social_"] == "on") { 
 
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
   $x = 0; 
   $id_seguridad_social__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_seguridad_social__1))
          {
              foreach ($this->id_seguridad_social__1 as $tmp_id_seguridad_social_)
              {
                  if (trim($tmp_id_seguridad_social_) === trim($cadaselect[1])) {$id_seguridad_social__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_seguridad_social_) && trim($this->id_seguridad_social_) === trim($cadaselect[1])) {$id_seguridad_social__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_seguridad_social_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_seguridad_social_) . "\">" . $id_seguridad_social__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_seguridad_social_();
   $x = 0 ; 
   $id_seguridad_social__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_seguridad_social__1))
          {
              foreach ($this->id_seguridad_social__1 as $tmp_id_seguridad_social_)
              {
                  if (trim($tmp_id_seguridad_social_) === trim($cadaselect[1])) {$id_seguridad_social__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_seguridad_social_) && trim($this->id_seguridad_social_) === trim($cadaselect[1])) { $id_seguridad_social__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_seguridad_social__look))
          {
              $id_seguridad_social__look = $this->id_seguridad_social_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_seguridad_social_" . $sc_seq_vert . "\" class=\"css_id_seguridad_social__line\" style=\"" .  $sStyleReadLab_id_seguridad_social_ . "\">" . $this->form_format_readonly("id_seguridad_social_", $this->form_encode_input($id_seguridad_social__look)) . "</span><span id=\"id_read_off_id_seguridad_social_" . $sc_seq_vert . "\" class=\"css_read_off_id_seguridad_social_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_seguridad_social_ . "\">";
   echo " <span id=\"idAjaxSelect_id_seguridad_social_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_seguridad_social__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_seguridad_social_" . $sc_seq_vert . "\" name=\"id_seguridad_social_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_seguridad_social_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_seguridad_social_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_seguridad_social_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_seguridad_social_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_seguridad_social_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['zona_']) && $this->nmgp_cmp_hidden['zona_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zona_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->zona_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_zona__line <?php echo $classColFld ?>" id="hidden_field_data_zona_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_zona_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_zona__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_zona_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zona_"]) &&  $this->nmgp_cmp_readonly["zona_"] == "on") { 

$zona__look = "";
 if ($this->zona_ == "NORTE") { $zona__look .= "NORTE" ;} 
 if ($this->zona_ == "SUR") { $zona__look .= "SUR" ;} 
 if ($this->zona_ == "ORIENTE") { $zona__look .= "ORIENTE" ;} 
 if ($this->zona_ == "OCCIDENTE") { $zona__look .= "OCCIDENTE" ;} 
 if ($this->zona_ == "CENTRO") { $zona__look .= "CENTRO" ;} 
 if ($this->zona_ == "RURAL") { $zona__look .= "RURAL" ;} 
 if (empty($zona__look)) { $zona__look = $this->zona_; }
?>
<input type="hidden" name="zona_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($zona_) . "\">" . $zona__look . ""; ?>
<?php } else { ?>
<?php

$zona__look = "";
 if ($this->zona_ == "NORTE") { $zona__look .= "NORTE" ;} 
 if ($this->zona_ == "SUR") { $zona__look .= "SUR" ;} 
 if ($this->zona_ == "ORIENTE") { $zona__look .= "ORIENTE" ;} 
 if ($this->zona_ == "OCCIDENTE") { $zona__look .= "OCCIDENTE" ;} 
 if ($this->zona_ == "CENTRO") { $zona__look .= "CENTRO" ;} 
 if ($this->zona_ == "RURAL") { $zona__look .= "RURAL" ;} 
 if (empty($zona__look)) { $zona__look = $this->zona_; }
?>
<span id="id_read_on_zona_<?php echo $sc_seq_vert ; ?>" class="css_zona__line"  style="<?php echo $sStyleReadLab_zona_; ?>"><?php echo $this->form_format_readonly("zona_", $this->form_encode_input($zona__look)); ?></span><span id="id_read_off_zona_<?php echo $sc_seq_vert ; ?>" class="css_read_off_zona_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_zona_; ?>">
 <span id="idAjaxSelect_zona_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_zona__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_zona_<?php echo $sc_seq_vert ?>" name="zona_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="NORTE" <?php  if ($this->zona_ == "NORTE") { echo " selected" ;} ?>>NORTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'NORTE'; ?>
 <option  value="SUR" <?php  if ($this->zona_ == "SUR") { echo " selected" ;} ?>>SUR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'SUR'; ?>
 <option  value="ORIENTE" <?php  if ($this->zona_ == "ORIENTE") { echo " selected" ;} ?>>ORIENTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'ORIENTE'; ?>
 <option  value="OCCIDENTE" <?php  if ($this->zona_ == "OCCIDENTE") { echo " selected" ;} ?>>OCCIDENTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'OCCIDENTE'; ?>
 <option  value="CENTRO" <?php  if ($this->zona_ == "CENTRO") { echo " selected" ;} ?>>CENTRO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'CENTRO'; ?>
 <option  value="RURAL" <?php  if ($this->zona_ == "RURAL") { echo " selected" ;} ?>>RURAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_zona_'][] = 'RURAL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zona_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zona_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_servicio_']) && $this->nmgp_cmp_hidden['tipo_servicio_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_servicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_servicio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_tipo_servicio__line <?php echo $classColFld ?>" id="hidden_field_data_tipo_servicio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_servicio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_servicio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_servicio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_servicio_"]) &&  $this->nmgp_cmp_readonly["tipo_servicio_"] == "on") { 

$tipo_servicio__look = "";
 if ($this->tipo_servicio_ == "Ambulancia") { $tipo_servicio__look .= "Ambulancia" ;} 
 if ($this->tipo_servicio_ == "Referencia y contrareferencia") { $tipo_servicio__look .= "Referencia y contrareferencia" ;} 
 if ($this->tipo_servicio_ == "TAB") { $tipo_servicio__look .= "TAB" ;} 
 if ($this->tipo_servicio_ == "Otros") { $tipo_servicio__look .= "Otros" ;} 
 if (empty($tipo_servicio__look)) { $tipo_servicio__look = $this->tipo_servicio_; }
?>
<input type="hidden" name="tipo_servicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_servicio_) . "\">" . $tipo_servicio__look . ""; ?>
<?php } else { ?>
<?php

$tipo_servicio__look = "";
 if ($this->tipo_servicio_ == "Ambulancia") { $tipo_servicio__look .= "Ambulancia" ;} 
 if ($this->tipo_servicio_ == "Referencia y contrareferencia") { $tipo_servicio__look .= "Referencia y contrareferencia" ;} 
 if ($this->tipo_servicio_ == "TAB") { $tipo_servicio__look .= "TAB" ;} 
 if ($this->tipo_servicio_ == "Otros") { $tipo_servicio__look .= "Otros" ;} 
 if (empty($tipo_servicio__look)) { $tipo_servicio__look = $this->tipo_servicio_; }
?>
<span id="id_read_on_tipo_servicio_<?php echo $sc_seq_vert ; ?>" class="css_tipo_servicio__line"  style="<?php echo $sStyleReadLab_tipo_servicio_; ?>"><?php echo $this->form_format_readonly("tipo_servicio_", $this->form_encode_input($tipo_servicio__look)); ?></span><span id="id_read_off_tipo_servicio_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_servicio_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_servicio_; ?>">
 <span id="idAjaxSelect_tipo_servicio_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_tipo_servicio__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_servicio_<?php echo $sc_seq_vert ?>" name="tipo_servicio_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="Ambulancia" <?php  if ($this->tipo_servicio_ == "Ambulancia") { echo " selected" ;} ?>>Ambulancia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Ambulancia'; ?>
 <option  value="Referencia y contrareferencia" <?php  if ($this->tipo_servicio_ == "Referencia y contrareferencia") { echo " selected" ;} ?>>Referencia y contrareferencia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Referencia y contrareferencia'; ?>
 <option  value="TAB" <?php  if ($this->tipo_servicio_ == "TAB") { echo " selected" ;} ?>>TAB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'TAB'; ?>
 <option  value="Otros" <?php  if ($this->tipo_servicio_ == "Otros") { echo " selected" ;} ?>>Otros</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_servicio_'][] = 'Otros'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_servicio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_servicio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_barrio_']) && $this->nmgp_cmp_hidden['id_barrio_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_barrio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_barrio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_barrio__line <?php echo $classColFld ?>" id="hidden_field_data_id_barrio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_barrio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_barrio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_barrio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_barrio_"]) &&  $this->nmgp_cmp_readonly["id_barrio_"] == "on") { 
 
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
   $x = 0; 
   $id_barrio__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_barrio__1))
          {
              foreach ($this->id_barrio__1 as $tmp_id_barrio_)
              {
                  if (trim($tmp_id_barrio_) === trim($cadaselect[1])) {$id_barrio__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_barrio_) && trim($this->id_barrio_) === trim($cadaselect[1])) {$id_barrio__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_barrio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_barrio_) . "\">" . $id_barrio__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_barrio_();
   $x = 0 ; 
   $id_barrio__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_barrio__1))
          {
              foreach ($this->id_barrio__1 as $tmp_id_barrio_)
              {
                  if (trim($tmp_id_barrio_) === trim($cadaselect[1])) {$id_barrio__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_barrio_) && trim($this->id_barrio_) === trim($cadaselect[1])) { $id_barrio__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_barrio__look))
          {
              $id_barrio__look = $this->id_barrio_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_barrio_" . $sc_seq_vert . "\" class=\"css_id_barrio__line\" style=\"" .  $sStyleReadLab_id_barrio_ . "\">" . $this->form_format_readonly("id_barrio_", $this->form_encode_input($id_barrio__look)) . "</span><span id=\"id_read_off_id_barrio_" . $sc_seq_vert . "\" class=\"css_read_off_id_barrio_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_barrio_ . "\">";
   echo " <span id=\"idAjaxSelect_id_barrio_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_barrio__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_barrio_" . $sc_seq_vert . "\" name=\"id_barrio_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_barrio_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_barrio_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_barrio_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_barrio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_barrio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['direccion_servicio_']) && $this->nmgp_cmp_hidden['direccion_servicio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion_servicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direccion_servicio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_direccion_servicio__line <?php echo $classColFld ?>" id="hidden_field_data_direccion_servicio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_direccion_servicio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_direccion_servicio__line" style="vertical-align: top;padding: 0px">
<?php
$direccion_servicio__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($direccion_servicio_));

?>

<?php if ($bTestReadOnly_direccion_servicio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion_servicio_"]) &&  $this->nmgp_cmp_readonly["direccion_servicio_"] == "on") { 

 ?>
<input type="hidden" name="direccion_servicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direccion_servicio_) . "\">" . $direccion_servicio__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion_servicio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-direccion_servicio_<?php echo $sc_seq_vert ?> css_direccion_servicio__line" style="<?php echo $sStyleReadLab_direccion_servicio_; ?>"><?php echo $this->form_format_readonly("direccion_servicio_", $this->form_encode_input($direccion_servicio__val)); ?></span><span id="id_read_off_direccion_servicio_<?php echo $sc_seq_vert ?>" class="css_read_off_direccion_servicio_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion_servicio_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_direccion_servicio__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="direccion_servicio_<?php echo $sc_seq_vert ?>" id="id_sc_field_direccion_servicio_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $direccion_servicio_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_servicio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_servicio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_ingreso_llamada_']) && $this->nmgp_cmp_hidden['hora_ingreso_llamada_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_ingreso_llamada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_ingreso_llamada_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_hora_ingreso_llamada__line <?php echo $classColFld ?>" id="hidden_field_data_hora_ingreso_llamada_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_ingreso_llamada_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora_ingreso_llamada__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hora_ingreso_llamada_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_ingreso_llamada_"]) &&  $this->nmgp_cmp_readonly["hora_ingreso_llamada_"] == "on") { 

 ?>
<input type="hidden" name="hora_ingreso_llamada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_ingreso_llamada_) . "\">" . $hora_ingreso_llamada_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_ingreso_llamada_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hora_ingreso_llamada_<?php echo $sc_seq_vert ?> css_hora_ingreso_llamada__line" style="<?php echo $sStyleReadLab_hora_ingreso_llamada_; ?>"><?php echo $this->form_format_readonly("hora_ingreso_llamada_", $this->form_encode_input($hora_ingreso_llamada_)); ?></span><span id="id_read_off_hora_ingreso_llamada_<?php echo $sc_seq_vert ?>" class="css_read_off_hora_ingreso_llamada_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_ingreso_llamada_; ?>"><?php
$tmp_form_data = $this->field_config['hora_ingreso_llamada_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOddMult css_hora_ingreso_llamada__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_ingreso_llamada_<?php echo $sc_seq_vert ?>" type=text name="hora_ingreso_llamada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_ingreso_llamada_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_ingreso_llamada_']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_ingreso_llamada_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_ingreso_llamada_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_ingreso_llamada_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_notifica_movil_']) && $this->nmgp_cmp_hidden['hora_notifica_movil_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_notifica_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_notifica_movil_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_hora_notifica_movil__line <?php echo $classColFld ?>" id="hidden_field_data_hora_notifica_movil_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_notifica_movil_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora_notifica_movil__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hora_notifica_movil_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_notifica_movil_"]) &&  $this->nmgp_cmp_readonly["hora_notifica_movil_"] == "on") { 

 ?>
<input type="hidden" name="hora_notifica_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_notifica_movil_) . "\">" . $hora_notifica_movil_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_notifica_movil_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hora_notifica_movil_<?php echo $sc_seq_vert ?> css_hora_notifica_movil__line" style="<?php echo $sStyleReadLab_hora_notifica_movil_; ?>"><?php echo $this->form_format_readonly("hora_notifica_movil_", $this->form_encode_input($hora_notifica_movil_)); ?></span><span id="id_read_off_hora_notifica_movil_<?php echo $sc_seq_vert ?>" class="css_read_off_hora_notifica_movil_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_notifica_movil_; ?>"><?php
$tmp_form_data = $this->field_config['hora_notifica_movil_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOddMult css_hora_notifica_movil__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_notifica_movil_<?php echo $sc_seq_vert ?>" type=text name="hora_notifica_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_notifica_movil_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_notifica_movil_']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_notifica_movil_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_notifica_movil_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_notifica_movil_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_llegada_sitio_']) && $this->nmgp_cmp_hidden['hora_llegada_sitio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_llegada_sitio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_llegada_sitio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_hora_llegada_sitio__line <?php echo $classColFld ?>" id="hidden_field_data_hora_llegada_sitio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_llegada_sitio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora_llegada_sitio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hora_llegada_sitio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_llegada_sitio_"]) &&  $this->nmgp_cmp_readonly["hora_llegada_sitio_"] == "on") { 

 ?>
<input type="hidden" name="hora_llegada_sitio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_llegada_sitio_) . "\">" . $hora_llegada_sitio_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_llegada_sitio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hora_llegada_sitio_<?php echo $sc_seq_vert ?> css_hora_llegada_sitio__line" style="<?php echo $sStyleReadLab_hora_llegada_sitio_; ?>"><?php echo $this->form_format_readonly("hora_llegada_sitio_", $this->form_encode_input($hora_llegada_sitio_)); ?></span><span id="id_read_off_hora_llegada_sitio_<?php echo $sc_seq_vert ?>" class="css_read_off_hora_llegada_sitio_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_llegada_sitio_; ?>"><?php
$tmp_form_data = $this->field_config['hora_llegada_sitio_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOddMult css_hora_llegada_sitio__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_llegada_sitio_<?php echo $sc_seq_vert ?>" type=text name="hora_llegada_sitio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_llegada_sitio_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_llegada_sitio_']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_llegada_sitio_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_llegada_sitio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_llegada_sitio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_llegada_ips_']) && $this->nmgp_cmp_hidden['hora_llegada_ips_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_llegada_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_llegada_ips_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_hora_llegada_ips__line <?php echo $classColFld ?>" id="hidden_field_data_hora_llegada_ips_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_llegada_ips_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora_llegada_ips__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hora_llegada_ips_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_llegada_ips_"]) &&  $this->nmgp_cmp_readonly["hora_llegada_ips_"] == "on") { 

 ?>
<input type="hidden" name="hora_llegada_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_llegada_ips_) . "\">" . $hora_llegada_ips_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_llegada_ips_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hora_llegada_ips_<?php echo $sc_seq_vert ?> css_hora_llegada_ips__line" style="<?php echo $sStyleReadLab_hora_llegada_ips_; ?>"><?php echo $this->form_format_readonly("hora_llegada_ips_", $this->form_encode_input($hora_llegada_ips_)); ?></span><span id="id_read_off_hora_llegada_ips_<?php echo $sc_seq_vert ?>" class="css_read_off_hora_llegada_ips_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_llegada_ips_; ?>"><?php
$tmp_form_data = $this->field_config['hora_llegada_ips_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOddMult css_hora_llegada_ips__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_llegada_ips_<?php echo $sc_seq_vert ?>" type=text name="hora_llegada_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_llegada_ips_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_llegada_ips_']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_llegada_ips_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_llegada_ips_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_llegada_ips_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_salida_ips_']) && $this->nmgp_cmp_hidden['hora_salida_ips_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_salida_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_salida_ips_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_hora_salida_ips__line <?php echo $classColFld ?>" id="hidden_field_data_hora_salida_ips_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_salida_ips_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora_salida_ips__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hora_salida_ips_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_salida_ips_"]) &&  $this->nmgp_cmp_readonly["hora_salida_ips_"] == "on") { 

 ?>
<input type="hidden" name="hora_salida_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_salida_ips_) . "\">" . $hora_salida_ips_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_salida_ips_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hora_salida_ips_<?php echo $sc_seq_vert ?> css_hora_salida_ips__line" style="<?php echo $sStyleReadLab_hora_salida_ips_; ?>"><?php echo $this->form_format_readonly("hora_salida_ips_", $this->form_encode_input($hora_salida_ips_)); ?></span><span id="id_read_off_hora_salida_ips_<?php echo $sc_seq_vert ?>" class="css_read_off_hora_salida_ips_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_salida_ips_; ?>"><?php
$tmp_form_data = $this->field_config['hora_salida_ips_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOddMult css_hora_salida_ips__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_salida_ips_<?php echo $sc_seq_vert ?>" type=text name="hora_salida_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_salida_ips_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_salida_ips_']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_salida_ips_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_salida_ips_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_salida_ips_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_movil_']) && $this->nmgp_cmp_hidden['id_movil_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_movil_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_movil__line <?php echo $classColFld ?>" id="hidden_field_data_id_movil_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_movil_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_movil__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_movil_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_movil_"]) &&  $this->nmgp_cmp_readonly["id_movil_"] == "on") { 
 
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
   $x = 0; 
   $id_movil__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_movil__1))
          {
              foreach ($this->id_movil__1 as $tmp_id_movil_)
              {
                  if (trim($tmp_id_movil_) === trim($cadaselect[1])) {$id_movil__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_movil_) && trim($this->id_movil_) === trim($cadaselect[1])) {$id_movil__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_movil_) . "\">" . $id_movil__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_movil_();
   $x = 0 ; 
   $id_movil__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_movil__1))
          {
              foreach ($this->id_movil__1 as $tmp_id_movil_)
              {
                  if (trim($tmp_id_movil_) === trim($cadaselect[1])) {$id_movil__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_movil_) && trim($this->id_movil_) === trim($cadaselect[1])) { $id_movil__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_movil__look))
          {
              $id_movil__look = $this->id_movil_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_movil_" . $sc_seq_vert . "\" class=\"css_id_movil__line\" style=\"" .  $sStyleReadLab_id_movil_ . "\">" . $this->form_format_readonly("id_movil_", $this->form_encode_input($id_movil__look)) . "</span><span id=\"id_read_off_id_movil_" . $sc_seq_vert . "\" class=\"css_read_off_id_movil_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_movil_ . "\">";
   echo " <span id=\"idAjaxSelect_id_movil_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_movil__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_movil_" . $sc_seq_vert . "\" name=\"id_movil_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_movil_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_movil_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_movil_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_movil_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_movil_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_ips_']) && $this->nmgp_cmp_hidden['id_ips_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_ips_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_ips__line <?php echo $classColFld ?>" id="hidden_field_data_id_ips_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_ips_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_ips__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_ips_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_ips_"]) &&  $this->nmgp_cmp_readonly["id_ips_"] == "on") { 
 
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
   $x = 0; 
   $id_ips__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_ips__1))
          {
              foreach ($this->id_ips__1 as $tmp_id_ips_)
              {
                  if (trim($tmp_id_ips_) === trim($cadaselect[1])) {$id_ips__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_ips_) && trim($this->id_ips_) === trim($cadaselect[1])) {$id_ips__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_ips_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_ips_) . "\">" . $id_ips__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_ips_();
   $x = 0 ; 
   $id_ips__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_ips__1))
          {
              foreach ($this->id_ips__1 as $tmp_id_ips_)
              {
                  if (trim($tmp_id_ips_) === trim($cadaselect[1])) {$id_ips__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_ips_) && trim($this->id_ips_) === trim($cadaselect[1])) { $id_ips__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_ips__look))
          {
              $id_ips__look = $this->id_ips_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_ips_" . $sc_seq_vert . "\" class=\"css_id_ips__line\" style=\"" .  $sStyleReadLab_id_ips_ . "\">" . $this->form_format_readonly("id_ips_", $this->form_encode_input($id_ips__look)) . "</span><span id=\"id_read_off_id_ips_" . $sc_seq_vert . "\" class=\"css_read_off_id_ips_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_ips_ . "\">";
   echo " <span id=\"idAjaxSelect_id_ips_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_ips__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_ips_" . $sc_seq_vert . "\" name=\"id_ips_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_ips_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_ips_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_ips_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_ips_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_ips_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_caso_']) && $this->nmgp_cmp_hidden['tipo_caso_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_caso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_caso_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_tipo_caso__line <?php echo $classColFld ?>" id="hidden_field_data_tipo_caso_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_caso_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_caso__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_caso_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_caso_"]) &&  $this->nmgp_cmp_readonly["tipo_caso_"] == "on") { 

$tipo_caso__look = "";
 if ($this->tipo_caso_ == "EFECTIVO") { $tipo_caso__look .= "EFECTIVO" ;} 
 if ($this->tipo_caso_ == "NO EFECTIVO") { $tipo_caso__look .= "NO EFECTIVO" ;} 
 if ($this->tipo_caso_ == "FALLIDO") { $tipo_caso__look .= "FALLIDO" ;} 
 if ($this->tipo_caso_ == "APOYO PSICOSOCIAL") { $tipo_caso__look .= "APOYO PSICOSOCIAL" ;} 
 if ($this->tipo_caso_ == "APH") { $tipo_caso__look .= "APH" ;} 
 if ($this->tipo_caso_ == "ASESORIA MEDICA TELEFONICA") { $tipo_caso__look .= "ASESORIA MEDICA TELEFONICA" ;} 
 if (empty($tipo_caso__look)) { $tipo_caso__look = $this->tipo_caso_; }
?>
<input type="hidden" name="tipo_caso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_caso_) . "\">" . $tipo_caso__look . ""; ?>
<?php } else { ?>
<?php

$tipo_caso__look = "";
 if ($this->tipo_caso_ == "EFECTIVO") { $tipo_caso__look .= "EFECTIVO" ;} 
 if ($this->tipo_caso_ == "NO EFECTIVO") { $tipo_caso__look .= "NO EFECTIVO" ;} 
 if ($this->tipo_caso_ == "FALLIDO") { $tipo_caso__look .= "FALLIDO" ;} 
 if ($this->tipo_caso_ == "APOYO PSICOSOCIAL") { $tipo_caso__look .= "APOYO PSICOSOCIAL" ;} 
 if ($this->tipo_caso_ == "APH") { $tipo_caso__look .= "APH" ;} 
 if ($this->tipo_caso_ == "ASESORIA MEDICA TELEFONICA") { $tipo_caso__look .= "ASESORIA MEDICA TELEFONICA" ;} 
 if (empty($tipo_caso__look)) { $tipo_caso__look = $this->tipo_caso_; }
?>
<span id="id_read_on_tipo_caso_<?php echo $sc_seq_vert ; ?>" class="css_tipo_caso__line"  style="<?php echo $sStyleReadLab_tipo_caso_; ?>"><?php echo $this->form_format_readonly("tipo_caso_", $this->form_encode_input($tipo_caso__look)); ?></span><span id="id_read_off_tipo_caso_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_caso_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_caso_; ?>">
 <span id="idAjaxSelect_tipo_caso_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_tipo_caso__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_caso_<?php echo $sc_seq_vert ?>" name="tipo_caso_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = ''; ?>
 <option value="">Seleccione...</option>
 <option  value="EFECTIVO" <?php  if ($this->tipo_caso_ == "EFECTIVO") { echo " selected" ;} ?>>EFECTIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'EFECTIVO'; ?>
 <option  value="NO EFECTIVO" <?php  if ($this->tipo_caso_ == "NO EFECTIVO") { echo " selected" ;} ?>>NO EFECTIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'NO EFECTIVO'; ?>
 <option  value="FALLIDO" <?php  if ($this->tipo_caso_ == "FALLIDO") { echo " selected" ;} ?>>FALLIDO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'FALLIDO'; ?>
 <option  value="APOYO PSICOSOCIAL" <?php  if ($this->tipo_caso_ == "APOYO PSICOSOCIAL") { echo " selected" ;} ?>>APOYO PSICOSOCIAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'APOYO PSICOSOCIAL'; ?>
 <option  value="APH" <?php  if ($this->tipo_caso_ == "APH") { echo " selected" ;} ?>>APH</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'APH'; ?>
 <option  value="ASESORIA MEDICA TELEFONICA" <?php  if ($this->tipo_caso_ == "ASESORIA MEDICA TELEFONICA") { echo " selected" ;} ?>>ASESORIA MEDICA TELEFONICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_tipo_caso_'][] = 'ASESORIA MEDICA TELEFONICA'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_caso_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_caso_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_medico_']) && $this->nmgp_cmp_hidden['id_medico_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_medico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_medico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; 
       $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>

    <TD class="scFormDataOddMult css_id_medico__line <?php echo $classColFld ?>" id="hidden_field_data_id_medico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_medico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_medico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_medico_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_medico_"]) &&  $this->nmgp_cmp_readonly["id_medico_"] == "on") { 
 
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
   $x = 0; 
   $id_medico__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_medico__1))
          {
              foreach ($this->id_medico__1 as $tmp_id_medico_)
              {
                  if (trim($tmp_id_medico_) === trim($cadaselect[1])) {$id_medico__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_medico_) && trim($this->id_medico_) === trim($cadaselect[1])) {$id_medico__look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="id_medico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_medico_) . "\">" . $id_medico__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_medico_();
   $x = 0 ; 
   $id_medico__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_medico__1))
          {
              foreach ($this->id_medico__1 as $tmp_id_medico_)
              {
                  if (trim($tmp_id_medico_) === trim($cadaselect[1])) {$id_medico__look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->id_medico_) && trim($this->id_medico_) === trim($cadaselect[1])) { $id_medico__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_medico__look))
          {
              $id_medico__look = $this->id_medico_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_medico_" . $sc_seq_vert . "\" class=\"css_id_medico__line\" style=\"" .  $sStyleReadLab_id_medico_ . "\">" . $this->form_format_readonly("id_medico_", $this->form_encode_input($id_medico__look)) . "</span><span id=\"id_read_off_id_medico_" . $sc_seq_vert . "\" class=\"css_read_off_id_medico_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_medico_ . "\">";
   echo " <span id=\"idAjaxSelect_id_medico_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_medico__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_medico_" . $sc_seq_vert . "\" name=\"id_medico_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['Lookup_id_medico_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione...") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_medico_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_medico_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_medico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_medico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php $this->form_fixed_column_no++; ?>
<?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_consecutivo_))
       {
           $this->nmgp_cmp_readonly['consecutivo_'] = $sCheckRead_consecutivo_;
       }
       if ('display: none;' == $sStyleHidden_consecutivo_)
       {
           $this->nmgp_cmp_hidden['consecutivo_'] = 'off';
       }
       if (isset($sCheckRead_secad_))
       {
           $this->nmgp_cmp_readonly['secad_'] = $sCheckRead_secad_;
       }
       if ('display: none;' == $sStyleHidden_secad_)
       {
           $this->nmgp_cmp_hidden['secad_'] = 'off';
       }
       if (isset($sCheckRead_quien_reporta_))
       {
           $this->nmgp_cmp_readonly['quien_reporta_'] = $sCheckRead_quien_reporta_;
       }
       if ('display: none;' == $sStyleHidden_quien_reporta_)
       {
           $this->nmgp_cmp_hidden['quien_reporta_'] = 'off';
       }
       if (isset($sCheckRead_discapacidad_))
       {
           $this->nmgp_cmp_readonly['discapacidad_'] = $sCheckRead_discapacidad_;
       }
       if ('display: none;' == $sStyleHidden_discapacidad_)
       {
           $this->nmgp_cmp_hidden['discapacidad_'] = 'off';
       }
       if (isset($sCheckRead_nombre_apellido_))
       {
           $this->nmgp_cmp_readonly['nombre_apellido_'] = $sCheckRead_nombre_apellido_;
       }
       if ('display: none;' == $sStyleHidden_nombre_apellido_)
       {
           $this->nmgp_cmp_hidden['nombre_apellido_'] = 'off';
       }
       if (isset($sCheckRead_tipo_documento_))
       {
           $this->nmgp_cmp_readonly['tipo_documento_'] = $sCheckRead_tipo_documento_;
       }
       if ('display: none;' == $sStyleHidden_tipo_documento_)
       {
           $this->nmgp_cmp_hidden['tipo_documento_'] = 'off';
       }
       if (isset($sCheckRead_documento_identidad_))
       {
           $this->nmgp_cmp_readonly['documento_identidad_'] = $sCheckRead_documento_identidad_;
       }
       if ('display: none;' == $sStyleHidden_documento_identidad_)
       {
           $this->nmgp_cmp_hidden['documento_identidad_'] = 'off';
       }
       if (isset($sCheckRead_edad_))
       {
           $this->nmgp_cmp_readonly['edad_'] = $sCheckRead_edad_;
       }
       if ('display: none;' == $sStyleHidden_edad_)
       {
           $this->nmgp_cmp_hidden['edad_'] = 'off';
       }
       if (isset($sCheckRead_numero_contacto_))
       {
           $this->nmgp_cmp_readonly['numero_contacto_'] = $sCheckRead_numero_contacto_;
       }
       if ('display: none;' == $sStyleHidden_numero_contacto_)
       {
           $this->nmgp_cmp_hidden['numero_contacto_'] = 'off';
       }
       if (isset($sCheckRead_genero_))
       {
           $this->nmgp_cmp_readonly['genero_'] = $sCheckRead_genero_;
       }
       if ('display: none;' == $sStyleHidden_genero_)
       {
           $this->nmgp_cmp_hidden['genero_'] = 'off';
       }
       if (isset($sCheckRead_id_tipo_evento_))
       {
           $this->nmgp_cmp_readonly['id_tipo_evento_'] = $sCheckRead_id_tipo_evento_;
       }
       if ('display: none;' == $sStyleHidden_id_tipo_evento_)
       {
           $this->nmgp_cmp_hidden['id_tipo_evento_'] = 'off';
       }
       if (isset($sCheckRead_circunstancias_emergencia_))
       {
           $this->nmgp_cmp_readonly['circunstancias_emergencia_'] = $sCheckRead_circunstancias_emergencia_;
       }
       if ('display: none;' == $sStyleHidden_circunstancias_emergencia_)
       {
           $this->nmgp_cmp_hidden['circunstancias_emergencia_'] = 'off';
       }
       if (isset($sCheckRead_id_eps_))
       {
           $this->nmgp_cmp_readonly['id_eps_'] = $sCheckRead_id_eps_;
       }
       if ('display: none;' == $sStyleHidden_id_eps_)
       {
           $this->nmgp_cmp_hidden['id_eps_'] = 'off';
       }
       if (isset($sCheckRead_id_seguridad_social_))
       {
           $this->nmgp_cmp_readonly['id_seguridad_social_'] = $sCheckRead_id_seguridad_social_;
       }
       if ('display: none;' == $sStyleHidden_id_seguridad_social_)
       {
           $this->nmgp_cmp_hidden['id_seguridad_social_'] = 'off';
       }
       if (isset($sCheckRead_zona_))
       {
           $this->nmgp_cmp_readonly['zona_'] = $sCheckRead_zona_;
       }
       if ('display: none;' == $sStyleHidden_zona_)
       {
           $this->nmgp_cmp_hidden['zona_'] = 'off';
       }
       if (isset($sCheckRead_tipo_servicio_))
       {
           $this->nmgp_cmp_readonly['tipo_servicio_'] = $sCheckRead_tipo_servicio_;
       }
       if ('display: none;' == $sStyleHidden_tipo_servicio_)
       {
           $this->nmgp_cmp_hidden['tipo_servicio_'] = 'off';
       }
       if (isset($sCheckRead_id_barrio_))
       {
           $this->nmgp_cmp_readonly['id_barrio_'] = $sCheckRead_id_barrio_;
       }
       if ('display: none;' == $sStyleHidden_id_barrio_)
       {
           $this->nmgp_cmp_hidden['id_barrio_'] = 'off';
       }
       if (isset($sCheckRead_direccion_servicio_))
       {
           $this->nmgp_cmp_readonly['direccion_servicio_'] = $sCheckRead_direccion_servicio_;
       }
       if ('display: none;' == $sStyleHidden_direccion_servicio_)
       {
           $this->nmgp_cmp_hidden['direccion_servicio_'] = 'off';
       }
       if (isset($sCheckRead_hora_ingreso_llamada_))
       {
           $this->nmgp_cmp_readonly['hora_ingreso_llamada_'] = $sCheckRead_hora_ingreso_llamada_;
       }
       if ('display: none;' == $sStyleHidden_hora_ingreso_llamada_)
       {
           $this->nmgp_cmp_hidden['hora_ingreso_llamada_'] = 'off';
       }
       if (isset($sCheckRead_hora_notifica_movil_))
       {
           $this->nmgp_cmp_readonly['hora_notifica_movil_'] = $sCheckRead_hora_notifica_movil_;
       }
       if ('display: none;' == $sStyleHidden_hora_notifica_movil_)
       {
           $this->nmgp_cmp_hidden['hora_notifica_movil_'] = 'off';
       }
       if (isset($sCheckRead_hora_llegada_sitio_))
       {
           $this->nmgp_cmp_readonly['hora_llegada_sitio_'] = $sCheckRead_hora_llegada_sitio_;
       }
       if ('display: none;' == $sStyleHidden_hora_llegada_sitio_)
       {
           $this->nmgp_cmp_hidden['hora_llegada_sitio_'] = 'off';
       }
       if (isset($sCheckRead_hora_llegada_ips_))
       {
           $this->nmgp_cmp_readonly['hora_llegada_ips_'] = $sCheckRead_hora_llegada_ips_;
       }
       if ('display: none;' == $sStyleHidden_hora_llegada_ips_)
       {
           $this->nmgp_cmp_hidden['hora_llegada_ips_'] = 'off';
       }
       if (isset($sCheckRead_hora_salida_ips_))
       {
           $this->nmgp_cmp_readonly['hora_salida_ips_'] = $sCheckRead_hora_salida_ips_;
       }
       if ('display: none;' == $sStyleHidden_hora_salida_ips_)
       {
           $this->nmgp_cmp_hidden['hora_salida_ips_'] = 'off';
       }
       if (isset($sCheckRead_id_movil_))
       {
           $this->nmgp_cmp_readonly['id_movil_'] = $sCheckRead_id_movil_;
       }
       if ('display: none;' == $sStyleHidden_id_movil_)
       {
           $this->nmgp_cmp_hidden['id_movil_'] = 'off';
       }
       if (isset($sCheckRead_id_ips_))
       {
           $this->nmgp_cmp_readonly['id_ips_'] = $sCheckRead_id_ips_;
       }
       if ('display: none;' == $sStyleHidden_id_ips_)
       {
           $this->nmgp_cmp_hidden['id_ips_'] = 'off';
       }
       if (isset($sCheckRead_tipo_caso_))
       {
           $this->nmgp_cmp_readonly['tipo_caso_'] = $sCheckRead_tipo_caso_;
       }
       if ('display: none;' == $sStyleHidden_tipo_caso_)
       {
           $this->nmgp_cmp_hidden['tipo_caso_'] = 'off';
       }
       if (isset($sCheckRead_id_medico_))
       {
           $this->nmgp_cmp_readonly['id_medico_'] = $sCheckRead_id_medico_;
       }
       if ('display: none;' == $sStyleHidden_id_medico_)
       {
           $this->nmgp_cmp_hidden['id_medico_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_procedimiento_final = $guarda_form_vert_procedimiento_final;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<?php
$requiredMessage = $this->Ini->Nm_lang['lang_othr_reqr'];
?>
<span class="scFormRequiredOddColorMult">* <?php echo $requiredMessage; ?></span>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R")
{
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['birpara'];
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
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['back'];
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['last'];
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
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

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
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['masterValue']))
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("procedimiento_final");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("procedimiento_final");
 parent.scAjaxDetailHeight("procedimiento_final", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("procedimiento_final", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("procedimiento_final", <?php echo $sTamanhoIframe; ?>);
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
                        do_ajax_procedimiento_final_add_new_line(); return false;
                         return;
                }
                if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_new_t.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_ins_t.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
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
                if ($("#sc_b_ini_b.sc-unique-btn-4").length && $("#sc_b_ini_b.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_ini_b.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                         return;
                }
        }
        function scBtnFn_sys_format_ret() {
                if ($("#sc_b_ret_b.sc-unique-btn-5").length && $("#sc_b_ret_b.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_ret_b.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                         return;
                }
        }
        function scBtnFn_sys_format_ava() {
                if ($("#sc_b_avc_b.sc-unique-btn-6").length && $("#sc_b_avc_b.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_avc_b.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                         return;
                }
        }
        function scBtnFn_sys_format_fim() {
                if ($("#sc_b_fim_b.sc-unique-btn-7").length && $("#sc_b_fim_b.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_fim_b.sc-unique-btn-7").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                         return;
                }
        }
        function scBtnFn_sys_format_sai_modal() {
                if ($("#sc_b_sai_b.sc-unique-btn-8").length && $("#sc_b_sai_b.sc-unique-btn-8").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-8").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
        }
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['procedimiento_final']['buttonStatus'] = $this->nmgp_botoes;
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
<?php 
 } 
} 
?> 
