<?php

define("ENTITY_F", 1);

class Entity {

    public function getJSON() {
        return json_encode((array)$this);
    }

    public static function fromJSON($json) {
        $array = json_decode($json);
        $class = get_called_class();
        $object = new $class();
        foreach ($array as $name=>$value) {
             if (!empty($name) && property_exists($class,$name)) {
                $object->$name = $value;
             }
        }
        return $object;
    }
}
