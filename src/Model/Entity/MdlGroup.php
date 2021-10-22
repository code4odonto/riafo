<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Collection\Collection; 
use Cake\ORM\Query;
/**
 * MdlGroup Entity
 *
 * @property int $id
 * @property int $courseid
 * @property string $idnumber
 * @property string $name
 * @property string|null $description
 * @property int $descriptionformat
 * @property string|null $enrolmentkey
 * @property int $picture
 * @property bool $hidepicture
 * @property int $timecreated
 * @property int $timemodified
 */
class MdlGroup extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'courseid' => true,
        'idnumber' => true,
        'name' => true,
        'description' => true,
        'descriptionformat' => true,
        'enrolmentkey' => true,
        'picture' => true,
        'hidepicture' => true,
        'timecreated' => true,
        'timemodified' => true
    ];
    public function condicion($notas, $ausentes, $promo) 
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
                
                if (strrpos($key, 'Preguntas Semana') !== false) {
                    $pregDes += 1; 
                } elseif (strrpos($key, 'PARCIAL MENSUAL ') !== false) {
                        $mensDes += 1; 
                } else {
                    $gism = false;
                }
            }
        }
        if ($promo) {
            return "background: #37b360;";
        }
        if ($pregDes <= 8 && $ausentes <= 8) {
            if ($gism) {
                $regular = true;
                return "background: #37b3a5;";
            }
        } 
        if ($mensDes <= 3) {
            if ($pregDes <= 16 && $ausentes <= 16) {
                $condicional = true;
                return "background: #ff830f;";
            } else {
                $libre = true;
                return "background: #870d04;";
            }
        } else {
            $libre = true;
            return "background: #870d04;";
        }
    }  
    public function fechas()
    { 
        $connection = ConnectionManager::get('default');
        $results = $connection
        ->newQuery()
        ->select("DATE_FORMAT(FROM_UNIXTIME(`sessdate`),'%d-%m') AS date, id")
        ->from('mdl_attendance_sessions')
        ->where(['groupid' => $this->id,'lasttaken IS NOT' => NULL, 'description !=' => '<p>Exámen</p>', 'attendanceid NOT IN' => [5,4,3,10,8,15,16,17]])
        ->order(['FROM_UNIXTIME(sessdate)' => 'ASC'])
        ->execute()
        ->fetchAll('assoc');
        return $results;
    } 

    public function parseFechas($log) {
        $fechas = $this->fechas();
        $combined = (new Collection($log))->combine('sessionid', 'mdl_attendance_status.acronym', 'mdl_attendance_status.mdl_attendance.name');
        $combined = $combined->toArray();
        $orderdedCombined = array();
        foreach ($fechas as $key => $value) {
            if(isset($combined['Asistencia Diaria'][$value['id']])) {
                array_push($orderdedCombined, $combined['Asistencia Diaria'][$value['id']]);
            } else {
                array_push($orderdedCombined, '---');
            }
        }
        return $orderdedCombined;
    }  
    public function parseFechasGrade($log) {
        $fechas = $this->fechas();
        $combined = (new Collection($log))->combine('sessionid', 'mdl_attendance_status.grade', 'mdl_attendance_status.mdl_attendance.name');
        $combined = $combined->toArray();
        $orderdedCombined = array();
        foreach ($fechas as $key => $value) {
            if(isset($combined['Asistencia Diaria'][$value['id']])) {
                array_push($orderdedCombined, $combined['Asistencia Diaria'][$value['id']]);
            } else {
                array_push($orderdedCombined, '---');
            }
        }
        return $orderdedCombined;
    }  
}
