<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;
use Cake\I18n\Time;
use Cake\Http\Exception\InternalErrorException;             
use Cake\ORM\Entity;

/**
 * MdlUser Controller
 *
 * @property \App\Model\Table\MdlUserTable $MdlUser
 *
 * @method \App\Model\Entity\MdlUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlUserController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Search.Prg', [
        // This is default config. You can modify "actions" as needed to make
        // the PRG component work only for specified methods.
        'actions' => ['index']
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cursos = TableRegistry::getTableLocator()->get('MdlCourse');
        $query = $this->MdlUser
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->getQueryParams()]);

        $this->set('mdlUsers', $this->paginate($query));
        $this->set('mdlCourse', $cursos->find('list'));
    }
    public function login()
    {
        $this->viewBuilder()->setLayout('');
        $result = $this->Authentication->getResult();
        // $result = $request->getAttribute('authentication')->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', ['controller' => 'MdlCourse', 'action' => 'index']);
            return $this->redirect($redirect);
        } else {
            // display error if user submitted and authentication failed
            if ($this->request->is(['post']) && !$result->isValid()) {
                echo 'Salió mal';
                $this->log($result->getStatus());
                $this->log($result->getErrors());
                $this->Flash->error('Invalid username or password');
        }
        }
        
    }
    
    /**
     * View method
     *
     * @param string|null $id Mdl User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlUser = $this->MdlUser->get($id, [
            'contain' => [
                'MdlUserInfoData' => ['conditions' => ['fieldid' => 2]], 
                'MdlGroups',
                'MdlGroups.MdlCourse', 
                'MdlGradeItems' => [
                    'conditions' => ['MdlGradeGrades.aggregationstatus' => 'used', 'itemname NOT LIKE' => '%PARA PRÁCTICAR', 'itemname !=' => 'Asistencia Diaria'],
                    'sort' => ['FROM_UNIXTIME(MdlGradeGrades.timecreated)']
                ],
                'MdlAttendanceLog',
                'MdlAttendanceLog.MdlAttendanceSessions' => [
                  'fields' => ['id'],
                  'sort' => ['FROM_UNIXTIME(sessdate)' => 'ASC'] 
                ],
                'MdlAttendanceLog.MdlAttendanceStatuses',    
                'MdlAttendanceLog.MdlAttendanceStatuses.MdlAttendance' => [
                    'conditions' => ['name !=' => 'Año de Cursada' ]
                ],
            ],
            'fields' => ['id', 'username', 'firstname', 'lastname', 'email', 'phone1', 'department', 'address', 'city', 'country']
        ]);
        $this->Authorization->authorize($mdlUser, 'view');
        $this->set('mdlUser', $mdlUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlUser = $this->MdlUser->newEntity();
        if ($this->request->is('post')) {
            $mdlUser = $this->MdlUser->patchEntity($mdlUser, $this->request->getData());
            if ($this->MdlUser->save($mdlUser)) {
                $this->Flash->success(__('The mdl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl user could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlUser = $this->MdlUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlUser = $this->MdlUser->patchEntity($mdlUser, $this->request->getData());
            if ($this->MdlUser->save($mdlUser)) {
                $this->Flash->success(__('The mdl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl user could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlUser = $this->MdlUser->get($id);
        if ($this->MdlUser->delete($mdlUser)) {
            $this->Flash->success(__('The mdl user has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function import()
    {
        $usersRiafo = TableRegistry::getTableLocator()->get('Users', [
            'connection' => ConnectionManager::get('riafo')
        ]);
        $select = $this->MdlUser->find('all')
            ->select(['id', 'username', 'firstname', 'lastname', 'email', 'phone1', 'address', 'city', 'country']);
        
        foreach ($select as $uMoodle) {
            $exist = $usersRiafo->exists(['dni' => $uMoodle->username]);
            // debug($uMoodle);
            if (!($exist)) {
                try {
                $query = $usersRiafo->query()
                    ->insert([
                    'id', 
                    'dni', 
                    'nombre', 
                    'apellido', 
                    'email', 
                    'telefono', 
                    'direccion', 
                    'ciudad', 
                    'pais'
                    ])
                ->values([
                    'id' => $uMoodle->id, 
                    'dni' => $uMoodle->username, 
                    'nombre' => $uMoodle->firstname, 
                    'apellido' => $uMoodle->lastname, 
                    'email' => $uMoodle->email, 
                    'telefono' => $uMoodle->phone1, 
                    'direccion' => $uMoodle->address, 
                    'ciudad' => $uMoodle->city, 
                    'pais' => $uMoodle->country
                    ])
                ->execute();
                } catch (\Exception $e) {
                    $msg = $uMoodle->username +  " " + $e->getMessage();
                    debug($uMoodle->username);
                    debug($e->getMessage());
                    // throw new InternalErrorException(__($msg));
                    // debug($uMoodle);
                    // debug($e->getMessage());
                }

            }
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cursocondicion()
    {

        $condicion = $this->request->getData('condicion');
        $curso = $this->request->getData('curso');
        $año = $this->request->getData('año');
        $byCom = $this->request->getData('byCom');
        $rec = $this->request->getData('recu');

        if (!$año) {
            $año = "general";
        }
        $ids = array();
        if($rec == null) {
            $uEnrol = TableRegistry::getTableLocator()->get('MdlUserEnrolments');
            $uMoodle = $uEnrol->find()
                ->contain(['MdlEnrol' => [
                    'conditions' => ['courseid' => $curso]]
                ]);
            $uMoodle = new Collection($uMoodle); 
            $uMoodle = $uMoodle->extract('userid');
        
            foreach($uMoodle as $usuario ) {
                    $ids[] = $usuario;
            }
        } else {
            $condiciones = TableRegistry::getTableLocator()->get('Condiciones', [
                'connection' => ConnectionManager::get('riafo')
            ]);
            // debug($curso);
            $uMoodle = $condiciones->find()
                ->where(['recuperatorio' => 1, 'materia_id' => $curso]);
            $uMoodle = new Collection($uMoodle); 
            $uMoodle = $uMoodle->extract('user_id');
        
            foreach($uMoodle as $usuario ) {
                    $ids[] = $usuario;
            }
        }
        $usersCurso = $this->MdlUser->find()
            ->where(['id IN' => $ids])
            ->order(['lastname' => 'ASC'])
            ->contain([
                'MdlGroups' => ['conditions' => ['courseid' => $curso]],
                'MdlUserInfoData' => ['conditions' => ['fieldid' => 2]],
                'MdlGradeItems' => ['conditions' => ['courseid' => $curso, 'itemname NOT LIKE' => '%PARA PRÁCTICAR', 'MdlGradeGrades.aggregationstatus' => 'used']],
                'MdlAttendanceLog',
                'MdlAttendanceLog.MdlAttendanceSessions' => [
                    'fields' => ['id, groupid'],
                    'sort' => ['FROM_UNIXTIME(sessdate)'] 
                ],
                'MdlAttendanceLog.MdlAttendanceStatuses',    
                'MdlAttendanceLog.MdlAttendanceStatuses.MdlAttendance' => [
                'conditions' => ['course' => $curso]]
            ]);
        // debug($usersCurso);
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Listado_' . $condicion . '.pdf'
            ]
        ]);  
        $this->set(compact('usersCurso'));
        $this->set(compact('condicion'));
        $this->set(compact('curso'));
        $this->set(compact('año'));
        $this->set(compact('byCom'));
    }

    public function condicionnegra()
    {
        $uEnrol = TableRegistry::getTableLocator()->get('MdlUserEnrolments');
        $curso = 4;
        $uMoodle = $uEnrol->find()
            ->contain(['MdlEnrol' => [
                'conditions' => ['courseid' => $curso]]
            ]);
        $uMoodle = new Collection($uMoodle); 
        $uMoodle = $uMoodle->extract('userid');
        $ids = array();
        foreach($uMoodle as $usuario ) {
                $ids[] = $usuario;
        }
        $usersCurso = $this->MdlUser->find()
            ->where(['id IN' => $ids])
            ->contain([
                'MdlGroups' => ['conditions' => ['courseid' => $curso]],
                'MdlUserInfoData' => ['conditions' => ['fieldid' => 2]],
                'MdlGradeItems' => ['conditions' => ['courseid' => $curso, 'itemname NOT LIKE' => '%PARA PRÁCTICAR', 'MdlGradeGrades.aggregationstatus' => 'used']],
                'MdlAttendanceLog',
                'MdlAttendanceLog.MdlAttendanceSessions' => [
                    'fields' => ['id'],
                    'sort' => ['FROM_UNIXTIME(sessdate)'] 
                ],
                'MdlAttendanceLog.MdlAttendanceStatuses',    
                'MdlAttendanceLog.MdlAttendanceStatuses.MdlAttendance' => [
                'conditions' => ['course' => $curso, 'name IN' => ['Asistencia Diaria', 'Año de Cursada']]]
            ]);
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Listado_' . $curso . '.pdf'
            ]
        ]);  
        $this->set(compact('usersCurso'));
        $this->set(compact('curso'));
    }
    public function recupera() {
        $curso = $this->request->getData('curso');
        
        $uEnrol = TableRegistry::getTableLocator()->get('MdlUserEnrolments');
        
        $uMoodle = $uEnrol->find()
            ->contain(['MdlEnrol' => [
                'conditions' => ['courseid' => $curso]]
            ]);
        $uMoodle = new Collection($uMoodle); 
        $uMoodle = $uMoodle->extract('userid');
        $ids = array();
        foreach($uMoodle as $usuario ) {
                $ids[] = $usuario;
        }
        $usersCurso = $this->MdlUser->find()
            ->where(['id IN' => $ids])
            ->contain([
                'MdlGroups' => ['conditions' => ['courseid' => $curso]],
                'MdlUserInfoData' => ['conditions' => ['fieldid' => 2]],
                'MdlGradeItems' => ['conditions' => ['courseid' => $curso, 'itemname NOT LIKE' => '%PARA PRÁCTICAR', 'MdlGradeGrades.aggregationstatus' => 'used']],
                'MdlAttendanceLog',
                'MdlAttendanceLog.MdlAttendanceSessions' => [
                    'fields' => ['id', 'groupid'],
                    'sort' => ['FROM_UNIXTIME(sessdate)'] 
                ],
                'MdlAttendanceLog.MdlAttendanceStatuses',    
                'MdlAttendanceLog.MdlAttendanceStatuses.MdlAttendance' => [
                'conditions' => ['course' => $curso]]
            ]);
        
        $rawData = array();
        foreach ($usersCurso as $alumno):
            if($alumno->cargo() == 'alumno'): 
                $com = new Collection($alumno->mdl_groups);
                $com = $com->first();

                switch ($curso) {
                    case 4:
                        $iterar = $alumno->cargarArreglo();
                        $algo = $alumno->evaluarCondicion($iterar);
                        if (isset($com)) {
                            $comision = $com->id;
                        }
                        break;
                    case 37:
                        break;
                    case 12:
                        $integrador = 0;
                        foreach($alumno->mdl_grade_items as $notas) {
                            if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                                $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
                            }
                        }
                        if (isset($com)) {
                            $comision = $alumno->getCom($com->id);
                            $asistencias = $comision->parseFechas($alumno->mdl_attendance_log);
                            $color = $alumno->condicionOp($integrador, $asistencias, $comision->id);
                        }
                        break;
                    case 13:
                        $integrador = 0;
                        foreach($alumno->mdl_grade_items as $notas) {
                            if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                                $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
                            }
                        }
                        if (isset($com)) {
                            $comision = $alumno->getCom($com->id);
                            $asistencias = $comision->parseFechas($alumno->mdl_attendance_log);
                            $color = $alumno->condicionOp($integrador, $asistencias, $comision->id);
                        }
                        break;
                    default:
                        if($alumno->cargo() == 'alumno'):
                            if (isset($com)) {
                                $iterar = $alumno->cargarArregloNormal(); 
                                $comision = $alumno->getCom($com->id);
                                $asistencias = $comision->parseFechas($alumno->mdl_attendance_log);
                                $color = $alumno->condNormal($iterar, $asistencias, $comision->id);
                            }
                        endif;
                        break;
                }
                
                if ($alumno->condicion == "Libre condicional") {
                    $data = [
                        'user_id' => $alumno->id, 
                        'recuperatorio' => true, 
                        'materia_id' => $curso, //$alumno->mdl_grade_items->courseid 
                        'comision_id' => $comision, 
                        'fecha' => Time::now(),
                    ];
                } else {
                    $data = [
                        'user_id' => $alumno->id, 
                        'recuperatorio' => false, 
                        'materia_id' => $curso, //$alumno->mdl_grade_items->courseid 
                        'comision_id' => $comision, 
                        'fecha' => Time::now(),
                    ];
                }
                array_push($rawData, $data);
            endif;
        endforeach;
        
        $condiciones = TableRegistry::getTableLocator()->get('Condiciones', [
            'connection' => ConnectionManager::get('riafo')
        ]);
        
        $entities = $condiciones->newEntities($rawData);
        // debug($entities);
        if ($condiciones->saveMany($entities)) {
            $this->Flash->success(__('Se cargaron las condiciones correctamente.'));

            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('Hubo un problema'));

        // $result = $condiciones->saveMany($entities);
        $errores = array();
        for ($i=0; $i < count($entities) ; $i++) { 
            if ($entities[$i]->getErrors()) {
                array_push($errores, $entities[$i]->getErrors());
            }
        }
        debug($errores);
        return $this->redirect(['action' => 'index']);;
    }

    function reset () {
        $condicion = TableRegistry::getTableLocator()->get('Condiciones', [
            'connection' => ConnectionManager::get('riafo')
        ]);
        $condicion->deleteAll(
            [  // condiciones
                'materia_id' => 4,
            ]
        );
        return $this->redirect(['action' => 'index']);
    }
    function config() {
        $cursos = TableRegistry::getTableLocator()->get('MdlCourse');
        $this->set('mdlCourse', $cursos->find('list'));
    }
}
