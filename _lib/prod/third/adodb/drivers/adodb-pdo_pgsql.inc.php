<?php
/*
v4.991 16 Oct 2008  (c) 2000-2008 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 8.
 
*/ 

class ADODB_pdo_pgsql extends ADODB_pdo {
	var $metaDatabasesSQL = "select datname from pg_database where datname not in ('template0','template1') order by 1";
    var $metaTablesSQL = "select tablename,'T' from pg_tables where tablename not like 'pg\_%'
	and tablename not in ('sql_features', 'sql_implementation_info', 'sql_languages',
	 'sql_packages', 'sql_sizing', 'sql_sizing_profiles') 
	union 
        select viewname,'V' from pg_views where viewname not like 'pg\_%'";
	//"select tablename from pg_tables where tablename not like 'pg_%' order by 1";
	var $isoDates = true; // accepts dates in ISO format
	var $sysDate = "CURRENT_DATE";
	var $sysTimeStamp = "CURRENT_TIMESTAMP";
	var $blobEncodeType = 'C';
	var $metaColumnsSQL = "SELECT a.attname,t.typname,a.attlen,a.atttypmod,a.attnotnull,a.atthasdef,a.attnum 
		FROM pg_class c, pg_attribute a,pg_type t 
		WHERE relkind in ('r','v') AND (c.relname='%s' or c.relname = lower('%s')) and a.attname not like '....%%'
AND a.attnum > 0 AND a.atttypid = t.oid AND a.attrelid = c.oid ORDER BY a.attnum";

	// used when schema defined
	var $metaColumnsSQL1 = "SELECT a.attname, t.typname, a.attlen, a.atttypmod, a.attnotnull, a.atthasdef, a.attnum 
FROM pg_class c, pg_attribute a, pg_type t, pg_namespace n 
WHERE relkind in ('r','v') AND (c.relname='%s' or c.relname = lower('%s'))
 and c.relnamespace=n.oid and n.nspname='%s' 
	and a.attname not like '....%%' AND a.attnum > 0 
	AND a.atttypid = t.oid AND a.attrelid = c.oid ORDER BY a.attnum";
	
	// get primary key etc -- from Freek Dijkstra
	var $metaKeySQL = "SELECT ic.relname AS index_name, a.attname AS column_name,i.indisunique AS unique_key, i.indisprimary AS primary_key 
	FROM pg_class bc, pg_class ic, pg_index i, pg_attribute a WHERE bc.oid = i.indrelid AND ic.oid = i.indexrelid AND (i.indkey[0] = a.attnum OR i.indkey[1] = a.attnum OR i.indkey[2] = a.attnum OR i.indkey[3] = a.attnum OR i.indkey[4] = a.attnum OR i.indkey[5] = a.attnum OR i.indkey[6] = a.attnum OR i.indkey[7] = a.attnum) AND a.attrelid = bc.oid AND bc.relname = '%s'";
	
	var $hasAffectedRows = true;
	var $hasLimit = false;	// set to true for pgsql 7 only. support pgsql/mysql SELECT * FROM TABLE LIMIT 10
	// below suggested by Freek Dijkstra 
	var $true = 't';		// string that represents TRUE for a database
	var $false = 'f';		// string that represents FALSE for a database
	var $fmtDate = "'Y-m-d'";	// used by DBDate() as the default date format used by the database
	var $fmtTimeStamp = "'Y-m-d G:i:s'"; // used by DBTimeStamp as the default timestamp fmt.
	var $hasMoveFirst = true;
	var $hasGenID = true;
	var $_genIDSQL = "SELECT NEXTVAL('%s')";
	var $_genSeqSQL = "CREATE SEQUENCE %s START %s";
	var $_dropSeqSQL = "DROP SEQUENCE %s";
	var $metaDefaultsSQL = "SELECT d.adnum as num, pg_get_expr(d.adbin, d.adrelid) as def from pg_attrdef d, pg_class c where d.adrelid=c.oid and c.relname='%s' order by d.adnum";
	var $random = 'random()';		/// random function
	var $concat_operator='||';
	
	function _init($parentDriver)
	{
	
		$parentDriver->hasTransactions = false; ## <<< BUG IN PDO pgsql driver
		$parentDriver->hasInsertID = true;
		$parentDriver->_nestedSQL = true;
	}
	
	function ServerInfo()
	{
		$arr['description'] = ADOConnection::GetOne("select version()");
		$arr['version'] = ADOConnection::_findvers($arr['description']);
		return $arr;
	}
	
	function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false,$secs2cache=0) 
	{
		 $offsetStr = ($offset >= 0) ? " OFFSET $offset" : '';
		 $limitStr  = ($nrows >= 0)  ? " LIMIT $nrows" : '';
		 if ($secs2cache)
		  	$rs = $this->CacheExecute($secs2cache,$sql."$limitStr$offsetStr",$inputarr);
		 else
		  	$rs = $this->Execute($sql."$limitStr$offsetStr",$inputarr);
		
		return $rs;
	}
	
	function MetaTables($ttype=false,$showSchema=false,$mask=false) 
	{
		$info = $this->ServerInfo();
		if ($info['version'] >= 7.3) {
	    	$this->metaTablesSQL = "select tablename,'T' from pg_tables where tablename not like 'pg\_%'
			  and schemaname  not in ( 'pg_catalog','information_schema')
	union 
        select viewname,'V' from pg_views where viewname not like 'pg\_%'  and schemaname  not in ( 'pg_catalog','information_schema') ";
		}
		if ($mask) {
			$save = $this->metaTablesSQL;
			$mask = $this->qstr(strtolower($mask));
			if ($info['version']>=7.3)
				$this->metaTablesSQL = "
select tablename,'T' from pg_tables where tablename like $mask and schemaname not in ( 'pg_catalog','information_schema')  
 union 
select viewname,'V' from pg_views where viewname like $mask and schemaname  not in ( 'pg_catalog','information_schema')  ";
			else
				$this->metaTablesSQL = "
select tablename,'T' from pg_tables where tablename like $mask 
 union 
select viewname,'V' from pg_views where viewname like $mask";
		}
		$ret = ADOConnection::MetaTables($ttype,$showSchema);
		
		if ($mask) {
			$this->metaTablesSQL = $save;
		}
		return $ret;
	}
	
	function MetaColumns($table,$normalize=true)
	{
		global $ADODB_FETCH_MODE;

		$normalize=false;
	
		$schema = false;
		$false = false;
		$this->_findschema($table,$schema);

		if ($normalize) $table = strtolower($table);

		$save = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);

		if ($schema) $rs = $this->Execute(sprintf($this->metaColumnsSQL1,$table,$table,$schema));
		else $rs = $this->Execute(sprintf($this->metaColumnsSQL,$table,$table));
		if (isset($savem)) $this->SetFetchMode($savem);
		$ADODB_FETCH_MODE = $save;

		if ($rs === false) {
			return $false;
		}
		if (!empty($this->metaKeySQL)) {
			// If we want the primary keys, we have to issue a separate query
			// Of course, a modified version of the metaColumnsSQL query using a
			// LEFT JOIN would have been much more elegant, but postgres does
			// not support OUTER JOINS. So here is the clumsy way.

			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

			$rskey = $this->Execute(sprintf($this->metaKeySQL,($table)));
			// fetch all result in once for performance.
			$keys = $rskey->GetArray();
			if (isset($savem)) $this->SetFetchMode($savem);
			$ADODB_FETCH_MODE = $save;

			$rskey->Close();
			unset($rskey);
		}

		$rsdefa = array();
		if (!empty($this->metaDefaultsSQL)) {
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$sql = sprintf($this->metaDefaultsSQL, ($table));
			$rsdef = $this->Execute($sql);
			if (isset($savem)) $this->SetFetchMode($savem);
			$ADODB_FETCH_MODE = $save;

			if ($rsdef) {
				while (!$rsdef->EOF) {
					$num = $rsdef->fields['num'];
					$s = $rsdef->fields['def'];
					if (strpos($s,'::')===false && substr($s, 0, 1) == "'") { /* quoted strings hack... for now... fixme */
						$s = substr($s, 1);
						$s = substr($s, 0, strlen($s) - 1);
					}

					$rsdefa[$num] = $s;
					$rsdef->MoveNext();
				}
			} else {
				ADOConnection::outp( "==> SQL => " . $sql);
			}
			unset($rsdef);
		}

		$retarr = array();
		while (!$rs->EOF) {
			$fld = new ADOFieldObject();
			$fld->name = $rs->fields[0];
			$fld->type = $rs->fields[1];
			$fld->max_length = $rs->fields[2];
			$fld->attnum = $rs->fields[6];

			if ($fld->max_length <= 0) $fld->max_length = $rs->fields[3]-4;
			if ($fld->max_length <= 0) $fld->max_length = -1;
			if ($fld->type == 'numeric' || $fld->type == 'decimal') {
				$fld->scale = $fld->max_length & 0xFFFF;
				$fld->max_length >>= 16;
			}
			// dannym
			// 5 hasdefault; 6 num-of-column
			$fld->has_default = ($rs->fields[5] == 't');
			if ($fld->has_default && isset($rs->fields[6]) && isset($rsdefa[$rs->fields[6]])) {
				$fld->default_value = $rsdefa[$rs->fields[6]];
			}

			//Freek
			$fld->not_null = $rs->fields[4] == 't';


			// Freek
			if (is_array($keys)) {
				foreach($keys as $key) {
					if ($fld->name == $key['column_name'] AND $key['primary_key'] == 't')
						$fld->primary_key = true;
					if ($fld->name == $key['column_name'] AND $key['unique_key'] == 't')
						$fld->unique = true; // What name is more compatible?
				}
			}

			if ($ADODB_FETCH_MODE == ADODB_FETCH_NUM) $retarr[] = $fld;
			else $retarr[($normalize) ? strtoupper($fld->name) : $fld->name] = $fld;

			$rs->MoveNext();
		}
		$rs->Close();
		if (empty($retarr))
			return  $false;
		else
			return $retarr;

	}
	
	function MetaIndexes ($table, $primary = FALSE, $owner=false)
    {
		global $ADODB_FETCH_MODE;

		$schema = false;
		$this->_findschema($table,$schema);

		if ($schema) { // requires pgsql 7.3+ - pg_namespace used.
			$sql = '
SELECT c.relname as "Name", i.indisunique as "Unique", i.indkey as "Columns"
FROM pg_catalog.pg_class c
JOIN pg_catalog.pg_index i ON i.indexrelid=c.oid
JOIN pg_catalog.pg_class c2 ON c2.oid=i.indrelid
,pg_namespace n
WHERE (c2.relname=\'%s\' or c2.relname=lower(\'%s\')) and c.relnamespace=c2.relnamespace and c.relnamespace=n.oid and n.nspname=\'%s\'';
		} else {
			$sql = '
SELECT c.relname as "Name", i.indisunique as "Unique", i.indkey as "Columns"
FROM pg_catalog.pg_class c
JOIN pg_catalog.pg_index i ON i.indexrelid=c.oid
JOIN pg_catalog.pg_class c2 ON c2.oid=i.indrelid
WHERE (c2.relname=\'%s\' or c2.relname=lower(\'%s\'))';
		}

		if ($primary == FALSE) {
			$sql .= ' AND i.indisprimary=false;';
		}

		$save = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		if ($this->fetchMode !== FALSE) {
				$savem = $this->SetFetchMode(FALSE);
		}

		$rs = $this->Execute(sprintf($sql,$table,$table,$schema));
		if (isset($savem)) {
				$this->SetFetchMode($savem);
		}
		$ADODB_FETCH_MODE = $save;

		if (!is_object($rs)) {
			$false = false;
			return $false;
		}

		$col_names = $this->MetaColumnNames($table,true,true);
		//3rd param is use attnum,
		// see http://sourceforge.net/tracker/index.php?func=detail&aid=1451245&group_id=42718&atid=433976
		$indexes = array();
		while ($row = $rs->FetchRow()) {
				$columns = array();
				foreach (explode(' ', $row[2]) as $col)
				{
					$columns[] = $col_names[$col];
				}

				$indexes[$row[0]] = array(
						'unique' => ($row[1] == 't'),
						'columns' => $columns
				);
		}
		return $indexes;
	}

    function _insertid($table, $column, $sequence)
    {
        if(empty($sequence))
        {
            return ($this->_connectionID) ? $this->_connectionID->lastInsertId() : ADOConnection::GetOne('SELECT MAX('. $column .') FROM ' . $table);
        }
        else
        {
            return ADOConnection::GetOne("select CURRVAL('" . $sequence . "')");
        }
    }
	
	function BlobDecode($blob,$maxsize=false,$hastrans=true, $blobtype='BLOB')
	{
		$this->BeginTrans();
		if($blobtype == 'OID')
		{
			$blob = $this->_connectionID->pgsqlLOBOpen($blob, 'r');			
		}
		$data = stream_get_contents($blob);
		rewind($blob);
		$this->CommitTrans();
		return $data;
	}

	function UpdateBlob($table,$column,$val,$where,$blobtype='BLOB')
	{
		if ($blobtype == 'CLOB')
		{
    		return $this->Execute("UPDATE $table SET $column=" . $this->qstr($val) . " WHERE $where");
		}
		elseif ($blobtype == 'OID')
		{
			$this->BeginTrans();
			$oid = $this->_connectionID->pgsqlLOBCreate();				
			$stream = $this->_connectionID->pgsqlLOBOpen($oid, 'w');
			fputs($stream, $val);			
			$this->prepare("UPDATE ". $table ." SET ". $column ." = ? WHERE " . $where);
			$rs = $this->_stmt->execute(array($oid));
			$this->CommitTrans();
			return $rs;
		}
		else
		{
			$this->prepare("UPDATE ". $table ." SET ". $column ." = :field_blob WHERE " . $where);
			$this->_stmt->bindParam(":field_blob", $val, PDO::PARAM_LOB);
			return $this->_stmt->execute();
		}
	}
}

?>