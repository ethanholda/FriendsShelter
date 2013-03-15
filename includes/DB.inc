<?
/******************************************************************************
* Include particular DB type needed
******************************************************************************/
	//define( 'INCLUDE_PATH', $DOCUMENT_ROOT.'/includes/' );
	include('includes/Mysql_db.inc' );
	
	
	
/******************************************************************************
* Class        :  Mysql_db
* Author       :  Paul Dryer
* Date Written :  4/28/00
* Modified     :  Greg Drudy
* Date Modified:  1/16/01
******************************************************************************/

class DB
{
	// database object
	var $dbh; 	

/******************************************************************************
* Function		: DB
* Description 	: constructor member function -- sets the member
*                 variables
* Inputs      	: None
* Outputs     	: None
* Side Effects	: creates db object
* Notes			: currently using mysql, so we're creating a mysql database 
*                 object and using this generic class to eliminate all calls to
*                 mysql functions in the general site code.
******************************************************************************/
	function DB() {
 		$this->dbh = new Mysql_db;
	}


/******************************************************************************
* Function		: connect
* Description 	: Connect to the database server.
* Inputs      	: $Database -- database name
*                 $Host     -- database server host name
*                 $User     -- username for connecting to the database server
*                 $Password -- password for connecting to the server
* Outputs     	: The link identifier for the connection.
* Side Effects	: none
* Notes			: none
******************************************************************************/	
		function connect($Database = "", $Host = "", $User = "", $Password = "") {		
		return $this->dbh->connect() ;		
	}
	

/******************************************************************************
* Function		: free
* Description 	: Discard the query result.
* Inputs      	: None
* Outputs     	: None
* Side Effects	: Frees the result of the last query executed by the object.
* Notes			: none
******************************************************************************/
	function free() {
		$this->dbh->free() ;		
	}
	
	
/******************************************************************************
* Function		: query
* Description 	: Executes the query passed as a paramater.
* Inputs      	: $Query_String -- SQL query
* Outputs     	: QueryID upon success.  Error message upon failure.
* Side Effects	:  none
* Notes			: possible to alter the database contents through
*                 update, delete, or insert SQL statements.
******************************************************************************/
	function query($Query_String) {
		return $this->dbh->query($Query_String);		
	}

/******************************************************************************
* Function		: next_record
* Description 	: Grabs the next record from a query result.
* Inputs      	: None
* Outputs     	: Boolean -- 1 if successful 0 on failure.
* Side Effects	: none
* Notes			: none
******************************************************************************/
	function next_record() {
		return $this->dbh->next_record();
	}

/******************************************************************************
* Function		: seek
* Description 	: Select a specific record in the query result.
* Inputs      	: $pos -- position of the record desired.
* Outputs     	: BBoolean -- 1 if successful 0 on failure.
* Side Effects	: moves the internal pointer of the query result to 
*                 the specified record.
* Notes			: none
******************************************************************************/
	function seek($pos = 0) {		
		return $this->dbh->seek($pos);				
	}	

/******************************************************************************
* Function		: affected_rows
* Description 	: Returns the number of rows affected by the query issued.
* Inputs      	: None
* Outputs     	: number of rows affected.
* Side Effects	: none
* Notes			: none
******************************************************************************/
	function affected_rows() {
		return $this->dbh->affected_rows();
	}
	

/******************************************************************************
* Function		: num_rows
* Description 	: Number of rows returned by a query.
* Inputs      	: None
* Outputs     	: number of rows returned.
* Side Effects	: none
* Notes			: none
******************************************************************************/
 	function num_rows() {
		return $this->dbh->num_rows();
	}
	
	
/******************************************************************************
* Function		: num_fields
* Description 	: Number of fields returned in a result.
* Inputs      	: None
* Outputs     	: number of fields returned.
* Side Effects	: none
* Notes			: none
******************************************************************************/
	function num_fields() {
		return $this->dbh->num_fields();
	}

/******************************************************************************
* Function		: insert_id
* Description 	: returns last generated id from an insert query
* Inputs      	:  none
* Outputs     	:  link id
* Side Effects	:  none
* Notes			:  
******************************************************************************/
	function insert_id($table) {
		return $this->dbh->insert_id($table);
		
	}		
}
?>
