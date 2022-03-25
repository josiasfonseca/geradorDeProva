<?php
namespace App\Http\Observer;

use PhpMqtt\Client\Facades\MQTT;

class MensageriaObserver implements CorrigeObserver
{

    function corrige(string $idPergunta, string $idProva)
    {
        MQTT::publish('trabalhoprovaifprfoz20222/pergunta', '{"idpergunta":'.$idPergunta.',"idprova":'.$idProva);
    }
}
