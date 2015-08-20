<?php 


	require_once 'conection.class.php';

	if( $_POST ) {
		$conexao = new Conection();
		$conexao->useBD('localhostBD');
		$conexao->useTable('listagem');

		$id = $_POST['id'];

		$conexao->removeId( $id );

		header('location:/mongodb');
	}