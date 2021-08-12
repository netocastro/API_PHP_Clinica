<?php

function objectToArray($object): array
{
    $teste = [];
    if ($object == null) {
        return (array)$teste;
    }

    if (is_array($object)) {

        foreach ($object as $item => $value) {
            $teste[] = (array)$value->data();
        }
        return  (array) $teste;
    } else {
        $teste = [];
        $teste[] = (array)$object->data();

        return (array)$teste;
    }
}