<?php
class app3_grid_sec_users_groups_lookup
{
//  
   function lookup_active(&$active) 
   {
      $conteudo = "" ; 
      if ($active == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($active == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $active = $conteudo; 
      } 
   }  
}
?>
