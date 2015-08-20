<?php 


	require_once 'conection.class.php';

	if( $_POST ) {
		$conexao = new Conection();
		$conexao->useBD('localhostBD');
		$conexao->useTable('listagem');

		$nome = $_POST['nome'];
		$email = $_POST['email'];

		$conexao->insert( Array('nome'=>$nome,'email'=>$email) );

		header('location:/mongodb');
	}