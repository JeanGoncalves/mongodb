<?php 

/**
* Conexão com o mongodb
*/
class Conection
{
	protected $user;
	protected $pass;
	protected $host;
	protected $port;

	private $mongoinstance;
	private $schema;
	private $table;

	function __construct() {
		self::setUser('jean');
		self::setPass('123');
		self::setHost('localhost');
		self::setPort('27017');

		self::connect();
	}

	private function connect() {
		$this->mongoinstance = new MongoClient( 'mongodb://'.$this->user.':'.$this->pass.'@'.$this->host.':'.$this->port );
	}

	public function useBD( $schema ) {
		self::setSchema( $this->mongoinstance->selectDB($schema) );
	}

	public function useTable( $table ) {
		self::setTable( $this->schema->selectCollection( $table ) );
	}

	public function insert( $params ) {
		$this->table->insert( $params );
	}

	public function getAll() {
		return $this->table->find();
	}

	public function editId( $id, $params ) {
		$this->table->update(array('_id',$id),array('$set'=>$params));
	}

	public function removeId( $id ) {
		$this->table->remove(array('_id' => new MongoId($id)));
	}

	/*---------------- Setters ----------------*/

	private function setUser( $user ) { //Set
		$this->user = $user;
	}

	private function setPass( $pass ) { //Set
		$this->pass = $pass;
	}

	private function setHost( $host ) { //Set
		$this->host = $host;
	}

	private function setPort( $port ) { //Set
		$this->port = $port;
	}

	private function setSchema( $schema ) { //Set
		$this->schema = $schema;
	}

	private function setTable( $table ) { //Set
		$this->table = $table;
	}
}