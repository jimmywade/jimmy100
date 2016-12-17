<?php

	require_once '../m/Vacante.php';
	$model = new Vacante;
	$response = $model->pendingRead();

?>