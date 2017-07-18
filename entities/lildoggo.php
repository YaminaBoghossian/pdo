<?php

namespace entities;

/**
 * Description of lildoggo
 *
 * @author boghossian
 */
class lildoggo {
    private $id;
    private $name;
    private $race;
    private $birthdate;
    private $isgood;
    
    //on met le id en dernier car il a une valeur par défaut
    
    function __construct(string $name, string $race, \DateTime $birthdate, bool $isgood, int $id = NULL) {
        $this->id = $id;
        $this->name = $name;
        $this->race = $race;
        $this->birthdate = $birthdate;
        $this->isgood = $isgood;
    }

}

