<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Alumnos cell
 */
class AlumnosCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    public function condicion(array $notas, $ausentes, $promo) 
    {
        
        $regular = false;
        $condicional = false;
        $libre = false;
        $gism = true;

        $pregDes = 0;
        $mensDes = 0;
    
    // PARA LA REGULARIDAD
        foreach ($notas as $key => $value) 
        {
            if ($value < 7) {
                $promo = false;
            }
            if ($value < 4) {
                
                if (strrpos($key, 'Pregunta Semana ') !== false) {
                    $pregDes += 1; 
                } elseif (strrpos($key, 'PARCIAL MENSUAL ') !== false) {
                        $mensDes += 1; 
                } else {
                    $gism = false;
                }
            }
        }     
        if ($pregDes <= 8 && $ausentes <= 8) {
            if ($gism) {
                $regular = true;
                return "background-color: white;";
            }
        } elseif ($mensDes <= 3) {
                if ($pregDes <= 16 && $ausentes <= 16) {
                    $condicional = true;
                    return "background-color: white;";
                } else {
                    $libre = true;
                    return "background-color: white;";
                }
        } else {
            $libre = true;
            return "background-color: white;";
        }
    }
}
