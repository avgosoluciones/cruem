<?php
/* 
v4.991 16 Oct 2008  (c) 2000-2008 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence. 
Set tabs to 4 for best viewing.
  
  Latest version is available at http://adodb.sourceforge.net
  
  Oracle support via ODBC. Requires ODBC. Works on Windows. 
*/
// security - hide paths
if (!defined('ADODB_DIR')) die();

if (!defined('_ADODB_ODBC_LAYER')) {
    include(ADODB_DIR."/drivers/adodb-odbc.inc.php");
}


class  ADODB_odbc_oracle extends ADODB_odbc {
    var $databaseType = 'odbc_oracle';
    var $replaceQuote = "''"; // string to use to replace quotes
    var $concat_operator='||';
    var $fmtDate = "'Y-m-d 00:00:00'";
    var $fmtTimeStamp = "'Y-m-d h:i:sA'";
    var $metaTablesSQL = 'select table_name from cat';
    var $metaColumnsSQL = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, DATA_SCALE, DATA_PRECISION, NULLABLE, DATA_DEFAULT FROM ALL_TAB_COLUMNS WHERE OWNER='%s' AND TABLE_NAME='%s' ORDER BY COLUMN_ID";
    var $metaColumnsSQLNoSchema = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, DATA_SCALE, DATA_PRECISION, NULLABLE, DATA_DEFAULT FROM ALL_TAB_COLUMNS WHERE TABLE_NAME='%s' ORDER BY COLUMN_ID";
    var $sysDate = "TRUNC(SYSDATE)";
    var $sysTimeStamp = 'SYSDATE';

    var $_bindInputArray = true;

    function __construct()
    {
        $this->ADODB_odbc_oracle();
    }

    function ADODB_odbc_oracle()
    {
        $this->ADODB_odbc();
    }

    function MetaTables($ttype=false,$showSchema=false,$mask=false)
    {
        $false = false;
        $rs = $this->Execute($this->metaTablesSQL);
        if ($rs === false) return $false;
        $arr = $rs->GetArray();
        $arr2 = array();
        for ($i=0; $i < sizeof($arr); $i++) {
            $arr2[] = $arr[$i][0];
        }
        $rs->Close();
        return $arr2;
    }

    function MetaColumns($table,$normalize=true)
    {
        global $ADODB_FETCH_MODE;

        $false = false;
        $save = $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
        if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);

        $this->_findschema($table,$schema);
        if(!empty($schema)) {
            $rs = $this->Execute(sprintf($this->metaColumnsSQL,strtoupper($schema),strtoupper($table)));
        }
        else {
            $rs = $this->Execute(sprintf($this->metaColumnsSQLNoSchema,strtoupper($table)));
        }

        if (isset($savem)) $this->SetFetchMode($savem);
        $ADODB_FETCH_MODE = $save;
        if (!$rs) {
            return $false;
        }
        $retarr = array();
        while (!$rs->EOF) { //print_r($rs->fields);
            $fld = new ADOFieldObject();
            $fld->name = $rs->fields[0];
            $fld->type = $rs->fields[1];
            $fld->max_length = $rs->fields[2];
            $fld->scale = $rs->fields[3];
            if ($rs->fields[1] == 'NUMBER' && $rs->fields[3] == 0) {
                $fld->type ='INT';
                $fld->max_length = $rs->fields[4];
            }
            $fld->not_null = (strncmp($rs->fields[5], 'NOT',3) === 0);
            $fld->binary = (strpos($fld->type,'BLOB') !== false);
            $fld->default_value = $rs->fields[6];

            if ($ADODB_FETCH_MODE == ADODB_FETCH_NUM) $retarr[] = $fld;
            else $retarr[strtoupper($fld->name)] = $fld;
            $rs->MoveNext();
        }
        $rs->Close();
        if (empty($retarr))
            return  $false;
        else
            return $retarr;
    }

    // returns true or false
    function _connect($argDSN, $argUsername, $argPassword, $argDatabasename)
    {
        global $php_errormsg;

        if(!function_exists("odbc_connect"))
            return false;

        if(empty($argDSN) && !empty($argDatabasename))
        {
            $argDSN = $argDatabasename;
        }

        $php_errormsg = '';
        $this->_connectionID = odbc_connect($argDSN,$argUsername,$argPassword,SQL_CUR_USE_ODBC );
        $this->_errorMsg = $php_errormsg;

        $this->Execute("ALTER SESSION SET NLS_DATE_FORMAT='YYYY-MM-DD HH24:MI:SS'");
        //if ($this->_connectionID) odbc_autocommit($this->_connectionID,true);
        return $this->_connectionID != false;
    }
    // returns true or false
    function _pconnect($argDSN, $argUsername, $argPassword, $argDatabasename)
    {
        global $php_errormsg;

        if(!function_exists("odbc_pconnect"))
            return false;

        if(empty($argDSN) && !empty($argDatabasename))
        {
            $argDSN = $argDatabasename;
        }

        $php_errormsg = '';
        $this->_connectionID = odbc_pconnect($argDSN,$argUsername,$argPassword,SQL_CUR_USE_ODBC );
        $this->_errorMsg = $php_errormsg;

        $this->Execute("ALTER SESSION SET NLS_DATE_FORMAT='YYYY-MM-DD HH24:MI:SS'");
        //if ($this->_connectionID) odbc_autocommit($this->_connectionID,true);
        return $this->_connectionID != false;
    }

    /**
     * Quotes a string.
     * An example is  $db->qstr("Don't bother",magic_quotes_runtime());
     *
     * @param s			the string to quote
     * @param [magic_quotes]	if $s is GET/POST var, set to get_magic_quotes_gpc().
     *				This undoes the stupidity of magic quotes for GPC.
     *
     * @return  quoted string to be sent back to database
     */
    function qstr($s,$magic_quotes=false)
    {
        //$nofixquotes=false;

        if ($this->noNullStrings && strlen($s)==0)$s = ' ';
        if (!$magic_quotes) {
            if ($this->replaceQuote[0] == '\\'){
                $s = str_replace('\\','\\\\',$s);
            }
            return  "'".str_replace("'",$this->replaceQuote,$s)."'";
        }

        // undo magic quotes for "
        $s = str_replace('\\"','"',$s);

        $s = str_replace('\\\\','\\',$s);
        return "'".str_replace("\\'",$this->replaceQuote,$s)."'";

    }
}

class  ADORecordSet_odbc_oracle extends ADORecordSet_odbc {

    var $databaseType = 'odbc_oracle';

    function __construct($id,$mode=false)
    {
        $this->ADORecordSet_odbc_oracle($id,$mode);
    }

    function ADORecordSet_odbc_oracle($id,$mode=false)
    {
        return $this->ADORecordSet_odbc($id,$mode);
    }
}
?>