 <?php
class DB {

	private $host = "localhost";
	private $username = "vancleef";
	private $password = "1234";
	private $database = "projetweb";
	public $db;
	private static $instance = NULL;

	public function __construct( $host = null , $username = null , $password = null , $database = null )
	{
		if ($host != null) {
			$this->host = $host ; 
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
		}

		try
		{
		$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database , $this->username , $this->password , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
			,PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		));
		// 	self::$instance = new PDO('mysql:host=localhost;dbname=projetweb', 'arbi', 'smela1998');
		// self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	    catch (PDOExeption $e){
	    	die('Impossible de se connecter ');
	    }


	}

	public function query($sql)
	{
		$req = $this->db->prepare($sql);
        $req->execute();
        return($req->fetchAll(PDO::FETCH_OBJ));
	}
}

?> 