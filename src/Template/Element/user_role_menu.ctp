<?php 

switch($userrole)
{
    case 'Capturista': 
        echo $this->element('menu_capturista');
        break;
    case 'Coordinador': 
        echo $this->element('menu_coordinador');    
    break;

    case 'Secretaria':
        echo $this->element('menu_secretaria');     
    break;

}

?>