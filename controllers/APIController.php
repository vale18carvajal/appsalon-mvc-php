<?php

namespace Controllers;

use Model\Servicio;
use Model\Cita;
use Model\CitaServicio;

class APIController {
    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios); //De arreglo asociativo de php a json
    }

    public static function guardar() {
        //Almacena la cita y devuelve el id
        $cita =  new Cita($_POST);
        $resultado = $cita->guardar(); //Rtorna un arreglo asociactivo de resultado => bool y id => int

        //Almacena las citas y el servicio
        $idServicios = explode(',', $_POST['servicios']);
        $id = $resultado['id'];

        foreach($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }
        //Retornamos una respuesta
        echo json_encode(['resultado' => $resultado,]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']); //Devolvemos al usuario a la página de la que venía con el HTTP_REFERER
        }
    }
}