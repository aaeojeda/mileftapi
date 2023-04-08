<?php

use Doctrine\DBAL\Schema\Index;

app()->get("/", function () {
    response()->json(["message" => "Congrats!! You're on Leaf API","success"=>"Saludos terricola"]);
});

app()->get("/contactos", 'ContactosController@index');
app()->get("/contactos/{id}", 'ContactosController@consultar');
app()->post("/contactos", 'ContactosController@agregar');
app()->delete("/contactos/{id}", 'ContactosController@eliminar');
app()->put("/contactos/{id}", 'ContactosController@actualizar');
