<?php 

switch($userrole)
{
    case 'Capturista': 
        echo $this->element('capturista_dashboard');
        break;
    case 'Coordinador': 
        echo $this->element('coordinador_dashboard');    
    break;

    case 'Secretaria':
        echo $this->element('secretaria_dashboard');     
    break;

}

?>