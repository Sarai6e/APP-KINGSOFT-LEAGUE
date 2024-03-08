<?php

require_once 'ParticipanteModel.php';

class ParticipanteController
{
    private $model;

    public function __construct(ParticipanteModel $model)
    {
        $this->model = $model;
    }

    public function listarParticipantes()
    {
        $participantes = $this->model->obtenerParticipantes();
        include 'participantes_view.php';
    }
}

?>
