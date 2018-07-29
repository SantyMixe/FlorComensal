<?php session_start();

if (!isset($_SESSION['usuario'])) {
	//header('location:Vistas/login/login.php');
}else{
	require_once 'Modelo/enlaces.php';
	require_once 'Modelo/reservasModelo/reservasModel.php';
	require_once 'Modelo/usuariosModelo/usuariosModel.php';
	require_once 'Modelo/categoriasModelo/categoriasModel.php';
	require_once 'Modelo/productosModelo/productosModel.php';

    require_once 'Controlador/reservasControlador/reservasController.php';
	require_once 'Controlador/usuariosControlador/usuariosController.php';
	require_once 'Controlador/categoriasControlador/categoriasController.php';
	require_once 'Controlador/productosControlador/productosController.php';
	

	$index = new MvcController();
	$index->plantilla();
}


