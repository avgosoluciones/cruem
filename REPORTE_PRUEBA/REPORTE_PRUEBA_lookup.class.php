<?php
class REPORTE_PRUEBA_lookup
{
//  
   function lookup_anotaciones(&$conteudo , $Id_Procedimiento, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT 
    Id_Observacion,
    observa,
    user,
    ip,
    fecha,
    Id_Procedimiento
FROM 
    observaciones
WHERE 
Id_Procedimiento = " . $_SESSION['Id_Procedimiento'] . "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "Id_Observacion,
    observa,
    user,
    ip,
    fecha,
    Id_Procedimiento"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]); 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= $rx->fields[$x];
                        if ($x != 0)
                        { 
                            $conteudo .= "";
                        } 
                        $conteudo .= $rx->fields[$x];
                 }
                 $a++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
}
?>
