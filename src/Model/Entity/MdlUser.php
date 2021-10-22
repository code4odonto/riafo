<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
/**
 * MdlUser Entity
 *
 * @property int $id
 * @property string $auth
 * @property bool $confirmed
 * @property bool $policyagreed
 * @property bool $deleted
 * @property bool $suspended
 * @property int $mnethostid
 * @property string $username
 * @property string $password
 * @property string $idnumber
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property bool $emailstop
 * @property string $icq
 * @property string $skype
 * @property string $yahoo
 * @property string $aim
 * @property string $msn
 * @property string $phone1
 * @property string $phone2
 * @property string $institution
 * @property string $department
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $lang
 * @property string $calendartype
 * @property string $theme
 * @property string $timezone
 * @property int $firstaccess
 * @property int $lastaccess
 * @property int $lastlogin
 * @property int $currentlogin
 * @property string $lastip
 * @property string $secret
 * @property int $picture
 * @property string $url
 * @property string|null $description
 * @property int $descriptionformat
 * @property bool $mailformat
 * @property bool $maildigest
 * @property int $maildisplay
 * @property bool $autosubscribe
 * @property bool $trackforums
 * @property int $timecreated
 * @property int $timemodified
 * @property int $trustbitmask
 * @property string|null $imagealt
 * @property string|null $lastnamephonetic
 * @property string|null $firstnamephonetic
 * @property string|null $middlename
 * @property string|null $alternatename
 */
class MdlUser extends Entity
{

    protected $ausentes= 0;
    protected $presentes = true;
    protected $condicion = '';
    protected $pregDes= 0;
    protected $menDes= 0;
    public $salud = false;
    public $individual = false;
    public $grupal = false;
    protected $countTotalProm = 0;
    protected $countNotas = 0;

    
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
        'auth' => true,
        'confirmed' => true,
        'policyagreed' => true,
        'deleted' => true,
        'suspended' => true,
        'mnethostid' => true,
        'username' => true,
        'password' => true,
        'idnumber' => true,
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'emailstop' => true,
        'icq' => true,
        'skype' => true,
        'yahoo' => true,
        'aim' => true,
        'msn' => true,
        'phone1' => true,
        'phone2' => true,
        'institution' => true,
        'department' => true,
        'address' => true,
        'city' => true,
        'country' => true,
        'lang' => true,
        'calendartype' => true,
        'theme' => true,
        'timezone' => true,
        'firstaccess' => true,
        'lastaccess' => true,
        'lastlogin' => true,
        'currentlogin' => true,
        'lastip' => true,
        'secret' => true,
        'picture' => true,
        'url' => true,
        'description' => true,
        'descriptionformat' => true,
        'mailformat' => true,
        'maildigest' => true,
        'maildisplay' => true,
        'autosubscribe' => true,
        'trackforums' => true,
        'timecreated' => true,
        'timemodified' => true,
        'trustbitmask' => true,
        'imagealt' => true,
        'lastnamephonetic' => true,
        'firstnamephonetic' => true,
        'middlename' => true,
        'alternatename' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setcondicion($cond) {
        $this->condicion = $cond;
    }
    protected function _setausentes() {
        $this->ausentes += 1;
    }
    protected function _setpresentes() {
        $this->presentes = false;
    }
    protected function _getpresentes() {
        $this->presentes;
    }
    protected function _setindividual() {
        $this->individual = true;
    }
    protected function _setgrupal() {
        $this->grupal = true;
    }
    protected function _setsalud() {
        $this->salud = true;
    }
    protected function _getindividual() {
        $this->individual;
    }
    protected function _getgrupal() {
        $this->grupal;
    }
    protected function _getsalud() {
        $this->salud;
    }
    protected function _getausentes() {
        return $this->ausentes;
    }
    protected function _setpregDes($cant) {
        $this->pregDes = $cant;
    }
    protected function _getpregDes() {
        return $this->pregDes;
    }
    protected function _setmenDes($cant) {
        $this->menDes = $cant;
    }
    protected function _getmenDes() {
        return $this->menDes;
    }
    protected function _getcondicion() {
        return $this->condicion;
    }
    protected function _getFullName()
    {
         return $this->_properties['firstname'] . ' ' . $this->_properties['lastname'];
    }
    protected function _getcursada() 
    {
        $status = new Collection($this->mdl_attendance_log);
        if ($year = $status->firstMatch(['mdl_attendance_status.mdl_attendance.name' => 'Año de Cursada'])) {
            return $year->mdl_attendance_status->description;
        } else return '---';
    }
    protected function _getcountNotas()
    {
         return $this->countNotas;
    }
    protected function _setcountNotas($nota)
    {
         $this->countNotas += $nota; 
    }
    protected function _getcountTotalProm()
    {
         return $this->countTotalProm;
    }
    protected function _setcountTotalProm()
    {
        $this->countTotalProm += 1;
    }
    public function calcProm() {

        return $prom = $this->countNotas / $this->countTotalProm;
    }
    public function cargarArreglo($asisCurso = null, $com = null)
    {

        //Notas
        $iterar = (new Collection(['Preguntas Semana 1 ' => 0.0, 'Preguntas Semana 2 ' => 0.0, 'Preguntas Semana 3 ' => 0.0, 'Preguntas Semana 4 ' => 0.0, 'Preguntas Semana 5 ' => 0.0, 'Preguntas Semana 6 ' => 0.0, 'Preguntas Semana 7 ' => 0.0, 'Preguntas Semana 8 ' => 0.0, 'Preguntas Semana 9 ' => 0.0, 'Preguntas Semana 10' => 0.0, 'Preguntas Semana 11' => 0.0, 'Preguntas Semana 12' => 0.0, 'Preguntas Semana 13' => 0.0, 'Preguntas Semana 14' => 0.0, 'Preguntas Semana 15' => 0.0, 'Preguntas Semana 16' => 0.0, 'Preguntas Semana 17' => 0.0,'Preguntas Semana 18' => 0.0, 'Preguntas Semana 19' => 0.0, 'Preguntas Semana 20'=> 0.0, 'Preguntas Semana 21' => 0.0, 'Preguntas Semana 22' => 0.0, 'Preguntas Semana 23' => 0.0, 'Preguntas Semana 24' => 0.0,'Preguntas Semana 25' => 0.0, 'Preguntas Semana 26' => 0.0, 'Preguntas Semana 27' => 0.0, 'Preguntas Semana 28' => 0.0, 'Preguntas Semana 29' => 0.0, 'Preguntas Semana 30' => 0.0, 'Preguntas Semana 31' => 0.0, 'Preguntas Semana 32'=> 0.0, 'PARCIAL MENSUAL MAYO' => 0.0, 'PARCIAL MENSUAL JUNIO' => 0.0, 'PARCIAL MENSUAL JULIO' => 0.0, 'PARCIAL MENSUAL AGOSTO' => 0.0, 'PARCIAL MENSUAL SEPTIEMBRE' => 0.0, 'PARCIAL MENSUAL OCTUBRE' => 0.0, 'Informes' => 0.0, 'Individual' => 0.0, 'Grupal' => 0.0]))->toArray();
        foreach ($this->mdl_grade_items as $item) :
            if(strrpos($item->itemname, 'PARA PRÁCTICAR') === false) :
                if(!empty($item->itemname)) {
                    
                    foreach ($iterar as $key => &$value) {
                        if (strrpos($item->itemname, $key) !== false) {
                            $value = ceil($item->_joinData->finalgrade);
                            $this->set("countNotas", ceil($item->_joinData->finalgrade));
                            $this->set("countTotalProm");
                        } 
                    }
                }
            endif;
        endforeach;
        if ($asisCurso != null) {
            foreach ($asisCurso as $asisCurso):
                    if ($asisCurso < 4 && $asisCurso != 'FJ') {
                                $this->set("ausentes");

                    }
                    if ($asisCurso < 7) {
                        $this->set("presentes");
                    }
            endforeach;
            return $iterar;
        }
        //Asistencias
        foreach ($this->mdl_attendance_log as $log):
            $name = $log->mdl_attendance_status->mdl_attendance->name;
            if ($name !== 'Año de Cursada' && $name !== 'Nota Grupal' && $name !== 'Nota Individual'):
                if ($log->mdl_attendance_status->mdl_attendance->course === 4) {
                        if ($log->mdl_attendance_status->grade < 4) {
                            $this->set("ausentes");
                        }
                        if ($log->mdl_attendance_status->grade < 7) {
                            $this->set("presentes");
                        }
                    $this->set("countNotas", $log->mdl_attendance_status->grade);
                    $this->set("countTotalProm");

                }
            endif;
        endforeach;
        return $iterar;
    }
    
    public function cargarArregloNormal()
    {
        $iterar = (new Collection(['Parcial Intermedio' => 0, 'Parcial Integrador' => 0, '1er Reajuste' => 0, '2do Reajuste' => 0]))->toArray();
        foreach ($this->mdl_grade_items as $item) :
            if(strrpos($item->itemname, 'PARA PRÁCTICAR') === false) :
                if(!empty($item->itemname)) {
                    foreach ($iterar as $key => &$value) {
                        if (strrpos($item->itemname, $key) !== false) {
                            $value = ceil($item->_joinData->finalgrade); 
                            $this->set("countNotas", ceil($item->_joinData->finalgrade));
                            $this->set("countTotalProm");
                        } 
                    }
                }
            endif;
        endforeach;
        return $iterar;
    }

    public function cumple($comision) {
        $condicion = TableRegistry::getTableLocator()->get('Condiciones', [
            'connection' => ConnectionManager::get('riafo')
        ]);
        $user = $condicion->find()
            ->where(['user_id' => $this->id, 'materia_id' => $comision])
            ->first();
        if (isset($user)) {
            if ($user->recuperatorio == false) {
                return true;
            }
            else {
                return false;
            }
        }
        return true; 
    }

    public function evaluarCondicion($notas) 
    {
        $regular = false;
        $condicional = false;
        $libre = false;
        $gism = true;
        $pregDes = 0;
        $mensDes = 0;
        foreach ($notas as $key => $value) 
        {

            if ($value < 7) {
                $this->presentes = false;
            }
            if ($value < 4) {
                if (strrpos($key, 'Preguntas Semana') !== false) {
                    $pregDes += 1; 
                } elseif (strrpos($key, 'PARCIAL MENSUAL ') !== false) {
                    $mensDes += 1; 
                } else {
                    $gism = false;
                    
                    if(strrpos($key, 'Informes') !== false) {
                        $this->set("salud");
                    }
                    if(strrpos($key, 'Individual') !== false) {
                        $this->set("individual");
                    }
                    if(strrpos($key, 'Grupal') !== false) {
                        $this->set("grupal");

                    }
                    
                }
            }
        }
        $this->set("pregDes", $pregDes);
        $this->set("menDes", $mensDes);
        
        if ($this->presentes && $this->ausentes == 0) {
            $this->set("condicion", "Promocion");

            return "background: #37b360;";
        }
        if ($pregDes <= 8 && $this->ausentes <= 8 && $mensDes == 0) {
            if ($gism) {
                $regular = true;
                $this->set("condicion", "Regular");
                return "background: #033bab";
            }
        } 
        if ($mensDes <= 3) {
            if ($pregDes <= 16 && $this->ausentes <= 16) {
                $condicional = true;
                $this->set("condicion", "Libre condicional");
                return "background: #ff830f;";
            } else {
                $libre = true;
                $this->set("condicion", "Libre");
                return "background: #870d04;";
            }
        } else {
            $libre = true;
            $this->set("condicion", "Libre");
            return "background: #870d04;";
        }
    }
    //Condiciones 
    public function aRecuperar($notas) {
        $regular = false;
        $libre = false;
        $gism = true;
        $pregDes = 0; 
        $mensDes = 0; 

        $this->presentes = true;
        foreach ($notas as $key => $value) 
        {
            if ($value < 4) {
                if (strrpos($key, 'Preguntas Semana') !== false) {
                    $pregDes += 1; 
                } elseif(strrpos($key, 'PARCIAL MENSUAL ') !== false) {
                    $mensDes += 1; 
                } else {
                if(strrpos($key, 'Informes') !== false) {
                    $this->set("salud");
                }
                if(strrpos($key, 'Individual') !== false) {
                    $this->set("individual");
                }
                if(strrpos($key, 'Grupal') !== false) {
                    $this->set("grupal");

                }
                }
                $this->presentes = false;
            }
        }
        $this->set("pregDes", $pregDes);
        $this->set("menDes", $mensDes);
        if ($this->id == 1374) {

        debug($this->presentes);
        debug($this->ausentes);
        }
        if ($this->presentes && $this->ausentes == 0) {
            $this->set("condicion", "Regular");
                return "background: #033bab;";
        } else {
            $libre = true;
            $this->set("condicion", "Libre");
            return "background: #870d04;";
        }
    }
    public function condNormal($notas, $asistencias, $groupid) {
        $tempPromo = true;
        $total = $this->totalAsis($groupid);
        
        $regularValue = ($total * 75) / 100;
        $condicionalValue = ($total * 50) / 100;

        $asistio = 0;
        // debug($regularValue);
        foreach ($asistencias as $key => $value) {
            
            if ($value < 7) {
                $tempPromo = false;
            }

            if ($value !== 'A') {
                $asistio = $asistio + 1;
            }
            $this->set("countNotas", $value);
            $this->set("countTotalProm");
        }

        $primeraIns = (($notas['Parcial Intermedio'] + $notas['Parcial Integrador']) / 2);

        if ($primeraIns < 7) {
            $tempPromo = false;
        }
        // debug($tempPromo);
        if ($tempPromo) {
            $this->set("condicion", "Promocion");
            return "background: #37b360;";
        }
        // debug(sizeof($asistencias));
        // debug($primeraIns);

        if ($notas['Parcial Integrador'] >= 4) {
           
            if ($asistio >= round($regularValue)) {
                $this->set("condicion", "Regular");
                return "background: #033bab;";
            } else { 
                
                if ($asistio >= round($condicionalValue)) {
                    
                    $this->set("condicion", "Libre condicional");
                    return "background: #ff830f;";
                } else {
                    $this->set("condicion", "Libre");
                    return "background: #870d04;";
                }
            }
        } else {

            if ($notas['1er Reajuste'] >= 4) {

                if ($asistio >= round($regularValue)) {
                    $this->set("condicion", "Regular");
                    return "background: #033bab;";
                } 
                if ($asistio >= round($condicionalValue)) {
                        $this->set("condicion", "Libre condicional");
                        return "background: #ff830f;";
                } 
            }
            if ($notas['2do Reajuste'] >= 4) {
                if ($asistio >= round($regularValue)) {
                    $this->set("condicion", "Regular");
                    return "background: #033bab;";
                } 
                $this->set("condicion", "Libre");
                return "background: #870d04;";
            }
            // debug("Asistio");
            // debug($asistio);
            // debug("Necesita para regular");
            // debug($regularValue);
            // debug("Necesita para condicional");
            // debug($condicionalValue);
            // debug("Total de clases");
            // debug($total);
            if ($asistio >= round($condicionalValue)) {                    
                $this->set("condicion", "Libre condicional");
                return "background: #ff830f;";
            }
            $this->set("condicion", "Libre");
            return "background: #870d04;";
        }  
        
    }

    public function getCom($id) {
        $com = TableRegistry::getTableLocator()->get('MdlGroups');
        $comision = $com->find()
            ->where(['id' => $id])
            ->first();
        return $comision;
    }

    public function totalAsis($groupid) {
        $asis = TableRegistry::getTableLocator()->get('MdlAttendanceSessions');
        $count = $asis->find('list')
            ->where(['groupid' => $groupid, 'attendanceid NOT IN' => [5,4,3,10,8,15,16,17,18]]);
        return $count->count();
    }
    public function condicionOp ($parcial, $asistencias, $groupid) {
        $tempPromo = true;
        $total = $this->totalAsis($groupid);
        $regularValue = ($total * 75) / 100;
        $condicionalValue = ($total * 50) / 100;

        $asistio = 0;
        // debug($regularValue);
        foreach ($asistencias as $key => $value) {
            if ($value < 7) {
                $tempPromo = false;
            }
            if ($value !== 'A') {
                $asistio = $asistio + 1;
            }
        }
        if ($parcial < 7) {
            $tempPromo = false;
        }
        if ($tempPromo) {
            if ($asistio >= $regularValue) {
                $this->set("condicion", "Promocion");
                return "background: #37b360;";
            } else { 
                if ($asistio >= $condicionalValue) {
                    $this->set("condicion", "Libre condicional");
                    return "background: #ff830f;";
                } else {
                    $this->set("condicion", "Libre");
                    return "background: #870d04;";
                }
            }
            
        }

        // debug(sizeof($asistencias));
        if ($parcial >= 4) {
            // debug($total);
            // debug($asistio);
            // debug($regularValue);

            if ($asistio >= $regularValue) {
                $this->set("condicion", "Regular");
                return "background: #033bab;";
            } else { 
                if ($asistio >= $condicionalValue) {
                    $this->set("condicion", "Libre condicional");
                    return "background: #ff830f;";
                } else {
                    $this->set("condicion", "Libre");
                    return "background: #870d04;";
                }
            }
        } else { 
            if ($asistio >= $condicionalValue) {
                $this->set("condicion", "Libre condicional");

                return "background: #ff830f;";
            } else {
                $this->set("condicion", "Libre");

                return "background: #870d04;";
            }
        }
    }
    public function fechas($id)
    { 
        $connection = ConnectionManager::get('default');
        $results = $connection
        ->newQuery()
        ->select("DATE_FORMAT(FROM_UNIXTIME(`sessdate`),'%d-%m') AS date, id")
        ->from('mdl_attendance_sessions')
        ->where(['groupid' => $id,'lasttaken IS NOT' => NULL, 'description IS NOT' => '<p>Exámen</p>', 'attendanceid NOT IN' => [5,4,3]])
        ->order(['FROM_UNIXTIME(sessdate)' => 'ASC'])
        ->execute()
        ->fetchAll('assoc');
        return $results;
    } 

    public function parseFechas($log, $id) {
        $fechas = $this->fechas($id);
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

    public function cargo() { 
        $usersRia = TableRegistry::getTableLocator()->get('Users');
        $userRia = $usersRia->findByDni($this->username)->first();
        if ($userRia == null) {
            return 'error';
        }
        return $userRia->rol;

    }
    
}
