<?php
# Esto es un comentario de modificacion del archivo para git
class Planeta {
    // Instancias de cada planeta
    private static $planetas = array();
    // Constructor
    private function __construct() {
        self::$planetas[get_called_class()] = $this;
        // Imprimir un mensaje para saber si se crea una nueva instancia
        echo('Nueva instancia de ' . get_called_class() . '<br  />');
    }
    // Método que devuelve la instancia de Singleton
    // Visibilidad protected porque no queremos permitir la creación de planetas (solo sus subclases)
    protected static function get_planeta() {
        // Aqui usamos get_called_class para obtener el nombre de la clase desde la que se llama al método
        $class = get_called_class();
        // Crear una nueva instancia si no existe actualmente
        if (!isset(self::$planetas[$class])) {
            new $class();
        }
        // Devolver la instancia
        return self::$planetas[$class];
    }
    // Clone no esta permitido
    public function __clone() {
        throw new Exception('Clone no permitido.');
    }
}
class Tierra extends Planeta {
    public function get_tierra() {
        parent::get_planeta();
    }
}
class Marte extends Planeta {
    public function get_marte() {
        parent::get_planeta();
    }
}
// Crear planetas
$tierra = Tierra::get_tierra();
$marte = Marte::get_marte();
// Comprobar si se crean nuevas instancias
$otra_tierra = Tierra::get_tierra();
$otro_marte = Marte::get_marte();

?>