<?php

require_once 'models/producto.php';

class CarritoController {

    public function index() {

        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : null;

        require_once 'views/carrito/index.php';
    }

    public function add() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('Location:' . base_url . 'carrito/index');
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            // Consegur producto
            $producto = new Producto();
            $producto->setId($id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    'id_producto' => $producto->id,
                    'precio' => $producto->precio,
                    'unidades' => 1,
                    'producto' => $producto
                );
            }
        }
        header('Location:' . base_url . 'carrito/index');
    }

    public function delete() {
        $index = $_GET['index'];
        if (isset($index)) {
            unset($_SESSION['carrito'][$index]);
        }
        header('Location:' . base_url . 'carrito/index');
    }

    public function up() {
        $index = $_GET['index'];
        if (isset($index)) {
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header('Location:' . base_url . 'carrito/index');
    }

    public function down() {
        $index = $_GET['index'];
        if (isset($index)) {
            $_SESSION['carrito'][$index]['unidades']--;
            if($_SESSION['carrito'][$index]['unidades']== 0){
                unset($_SESSION['carrito'][$index]);
            }
        }
        header('Location:' . base_url . 'carrito/index');
    }

    public function delete_all() {
        unset($_SESSION['carrito']);
        header('Location:' . base_url . 'carrito/index');
    }

}
