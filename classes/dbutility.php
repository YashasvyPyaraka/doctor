<?php
class DBUtility {

	function createModelClass($sqlfile)	{
		$lines = file($sqlfile);
		$i=0;
		$classdetails='';
		while ($i<count($lines) )	{
			$strings = explode(' ',$lines[$i]);
			if (preg_match('/CREATE TABLE/', $lines[$i])>0)	{
				$classname = trim($strings[5],"`");
				$classdetails = '<?php '."\n";
				$classdetails .= 'class '.ucfirst($classname).' {'."\n";
			} else if (isset($classname) && ($classname != '')) {
				if (preg_match('/ENGINE=InnoDB DEFAULT/',$lines[$i]) > 0){
					$classdetails .= '}'."\n".'?>';	
					file_put_contents('/var/www/yousee.in/doctor/classes/'.$classname.'.php',$classdetails);
					$classname='';
				} else if (preg_match('/KEY/',$lines[$i]) == 0) {
					//echo $strings[0].' '.$strings[1].' '.$strings[2]."\n";
					$colname = trim($strings[2],"`");
					//variable declaration
					$classdetails .= 'var '.'$'.$colname.';'."\n";
					//getter method
					$classdetails .= 'function get'.ucfirst(trim($colname,"_")).'()'.' {'."\n";
					$classdetails .= 'return $this->_'.$colname. ';'."\n";
					$classdetails .= ' }'."\n";					
					//setter method
					$classdetails .= 'function set'.ucfirst(trim($colname,"_")).'($'.$colname.')'.' {'."\n";
					$classdetails .= '$this->_'. $colname . '='. '$'.$colname.';'."\n";
					$classdetails .= ' }'."\n";					
				}				
			}
			$i++;
		}
		
	}

	function createQuery($sqlfile)	{
		$lines = file($sqlfile);
		$i=0;
		$j=0;
		$classdetails='';
		$modelclassname = '';
		$colnames = array();
		$coltypes = array();
		while ($i<count($lines) )	{
			$strings = explode(' ',$lines[$i]);
			if (preg_match('/CREATE TABLE/', $lines[$i])>0)	{
				$modelclassname = trim($strings[5],"`");
				$classname = $modelclassname.'Query';
				$classdetails = '<?php '."\n";
				//including the super class Query and the Model class for this Query Class
				$classdetails .= 'require_once ("classes/Query.php");'."\n";				
				$classdetails .= 'require_once ("classes/'.$modelclassname.'.php");'."\n";
				//naming the class
				$classdetails .= 'class '.ucfirst($classname).' extends Query {'."\n";
				//declaring the variables
				$classdetails .= "\t".'var $_rowCount = 0;'."\n";
				//constructor of the class
				$classdetails .= "\t".'function '. ucfirst($classname) .' () {'."\n"."\t"."\t".'$this->Query();'."\n";
				$classdetails .= "\t"."\t".'$this->_loc = new Localize(OBIB_LOCALE,"classes")'."\n"."\t".'}'."\n";
				//function rowcount
				$classdetails .= "\t".'function getRowCount() {'. "\n"."\t"."\t".'return $this->_rowCount;'."\n"; 					$classdetails .= "\t".'}'."\n";	
				//fetch a row of data into the Object
				$classdetails .= "\t".'function fetch'.ucfirst($modelclassname) .'() {'."\n";
				$classdetails .= "\t"."\t".'$array = $this->_conn->fetchRow();'."\n";
				$classdetails .= "\t"."\t".'if ($array == false) {'."\n";
				$classdetails .= "\t"."\t"."\t".'return false;'."\n";
				$classdetails .= "\t"."\t".'}'."\n";
				$classdetails .= "\t"."\t".'return $this->_mkObj($array)'."\n";
				$classdetails .= "\t".'}'."\n";	
			
			} else if (isset($classname) && ($classname != '')) {
				if (preg_match('/ENGINE=InnoDB DEFAULT/',$lines[$i]) > 0){
					//function makeobject
					$classdetails .= "\t".'function mkObj($array)' .' {'."\n";
					$classdetails .= "\t"."\t".'$obj = new '.ucfirst($modelclassname).'();'."\n";
					foreach ($colnames as $colname) {
						//echo "\t"."\t".'$obj->set'.ucfirst($colname).'($array["'.$colname.'"]'.');'."\n".'<br>';
						$classdetails .= "\t"."\t".'$obj->set'.ucfirst($colname).'($array["'.$colname.'"]'.');'."\n";
					}
					$classdetails .= "\t"."\t".'return $obj;'."\n";	
					$classdetails .= "\t".'}'."\n";
					//function for generic select
						$classdetails.="\t"."function selectAll".'($last,$count) {'."\n";
						$classdetails.="\t"."\t".'$sql = $this->mkSQL("select * from '.$modelclassname;
						$classdetails.=' limit %N, %N",$last, $count);'."\n"."\t"."\t";
						$classdetails.='if (!$this->_query($sql, "Error in selecting from table '.$modelclassname.'")) {'."\n";
						$classdetails.="\t"."\t"."\t".' return false;'."\n";
						$classdetails.= "\t"."\t".'}'."\n";		
						$classdetails.="\t"."\t".'$this->_rowCount = $this->_conn->numRows();'."\n";
						$classdetails.="\t"."\t".'return true;'."\n";
						$classdetails.= "\t".'}'."\n";		
					//functions for select
					foreach ($colnames as $selectcolname)	{
						$classdetails.="\t"."function select". ucfirst($selectcolname)."("."$".$modelclassname.") {"."\n";
						$classdetails.="\t"."\t".'$sql = $this->mkSQL("select * from '.$modelclassname;
						$classdetails.=' where '.$selectcolname."  = %N".'",'."\n"."\t"."\t"."\t"."\t";
						$classdetails.= '$'.$modelclassname.'->get'.ucfirst($selectcolname).'()'."\n";
						$classdetails.="\t"."\t"."\t".');'."\n";	
						$classdetails.="\t"."\t".'if (!$this->_query($sql, "Error in selecting from table '.$modelclassname.'")) {'."\n";
						$classdetails.="\t"."\t"."\t".' return false;'."\n";
						$classdetails.= "\t"."\t".'}'."\n";		
						$classdetails.="\t"."\t".'$this->_rowCount = $this->_conn->numRows();'."\n";
						$classdetails.="\t"."\t".'return true;'."\n";
						$classdetails.= "\t".'}'."\n";
					}
					//function insert
					$classdetails.="\t"."function insert("."$".$modelclassname.") {"."\n";
					$classdetails.="\t"."\t".'$sql = $this->mkSQL("insert into '.$modelclassname.' values (';
					foreach ($coltypes as $coltype) {
						if ( 	(strpos($coltype,'int') != false) || (strpos($coltype,'dec') != false) || 
							(strpos($coltype,'float') != false) || (strpos($coltype,'double') != false)	) {
							$classdetails.="%N, ";
						} else {
							$classdetails.="%Q, ";
						}
					}
					$classdetails=substr($classdetails,0,-2).')",'."\n"."\t"."\t"."\t"."\t";
					foreach ($colnames as $colname) {
						$classdetails .= '$'.$modelclassname.'->get'.ucfirst($colname).'(),';
					}
					$classdetails=substr($classdetails,0,-1).')'."\n";	
					$classdetails.="\t"."\t"."\t".');'."\n";	
					$classdetails.="\t"."\t".'$ret = $this->_query($sql,"Insert failed on '.$modelclassname.' table");'."\n";
					$classdetails .= "\t".'}'."\n";
					//functions for update
					foreach ($colnames as $updatecolname)	{
						$classdetails.="\t"."function update". ucfirst($updatecolname)."("."$".$modelclassname.") {"."\n";
						$classdetails.="\t"."\t".'$sql = $this->mkSQL("update '.$modelclassname."\n";
						$classdetails.="\t"."\t"."\t"."\t"."set ";
						$k=0;
						foreach ($coltypes as $coltype) {
							if ($colnames[$k] != $updatecolname )	{
								if ( 	(strpos($coltype,'int') != false) || (strpos($coltype,'dec') != false) || 
									(strpos($coltype,'float') != false) || (strpos($coltype,'double') != false)	) {
									$classdetails.=$colnames[$k]." = "."%N, ";
								} else {
									$classdetails.=$colnames[$k]." = "."%Q, ";
								}
							}
							$k++;
						}
						$classdetails=substr($classdetails,0,-2).' where '.$updatecolname."  = %N".'",'."\n"."\t"."\t"."\t"."\t";
						for ($k=0;$k<=sizeof($colnames);$k++) {
							if ($colnames[$k] != $updatecolname)
								$classdetails .= '$'.$modelclassname.'->get'.ucfirst($colnames[$k]).'(),';
						}
						$classdetails .= '$'.$modelclassname.'->get'.ucfirst($updatecolname).'(),';
						$classdetails=substr($classdetails,0,-1)."\n";	
						$classdetails.="\t"."\t"."\t".');'."\n";	
						$classdetails.="\t"."\t".'$ret = $this->_query($sql,"Update using column '.$updatecolname;
						$classdetails.=' failed on '.$modelclassname.' table");'."\n";
						$classdetails .= "\t".'}'."\n";
					}
					//functions for delete
					foreach ($colnames as $updatecolname)	{
						$classdetails.="\t"."function delete". ucfirst($updatecolname)."("."$".$modelclassname.") {"."\n";
						$classdetails.="\t"."\t".'$sql = $this->mkSQL("delete from '.$modelclassname;
						$classdetails.=' where '.$updatecolname."  = %N".'",'."\n"."\t"."\t"."\t"."\t";
						$classdetails.= '$'.$modelclassname.'->get'.ucfirst($updatecolname).'()'."\n";
						$classdetails.="\t"."\t"."\t".');'."\n";	
						$classdetails.="\t"."\t".'$ret = $this->_query($sql,"Delete using column '.$updatecolname;
						$classdetails.=' failed on '.$modelclassname.' table");'."\n";
						$classdetails.= "\t".'}'."\n";
					}
					//end of the class	
					$classdetails .= '}'."\n".'?>';	
					file_put_contents('/var/www/yousee.in/doctor/classes/'.$classname.'.php',$classdetails);
					$classname='';
					$modelclassname='';
					$j=0;
					$colnames=array();
					$coltypes=array();
				} else if (preg_match('/KEY/',$lines[$i]) == 0) {
					$colnames[$j++] = trim($strings[2],"`");
					$coltypes[$j] =  trim($strings[3],"`");
				}				
			}
			$i++;
		}
	}
	
}
?>
