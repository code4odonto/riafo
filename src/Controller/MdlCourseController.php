<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;
/**
 * MdlCourse Controller
 *
 * @property \App\Model\Table\MdlCourseTable $MdlCourse
 *
 * @method \App\Model\Entity\MdlCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlCourseController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $user = $this->request->getAttribute('identity');
        switch ($user->rol) {
            case "admin":
                $mdlCourse = $this->MdlCourse->find('all');
                break;
            case "docente":

                $uEnrol = TableRegistry::getTableLocator()->get('MdlUserEnrolments');
                $uDocentes = $uEnrol->find()
                    ->where(['userid' => $user->id])
                    ->contain(['MdlEnrol']);
                $uDocentes = new Collection($uDocentes); 
                
                $uCursos = $uDocentes->extract(function ($curso) {
                    return $curso->mdl_enrol->courseid;
                });
                $ids = array();
                foreach($uCursos as $usuario ) {
                    $ids[] = $usuario;
                }
                $mdlCourse = $this->MdlCourse->find()
                    ->where(['id IN' => $ids]);
                break;
        }
        $this->set(compact('mdlCourse'));
        if (!$id == null) {
            $comisiones = $this->MdlCourse->MdlGroups->find()
                ->where(['courseid' => $id])
                ->select(['id', 'courseid', 'name', 'description']);
            $id= true;  
            $this->set(compact('id'));
            $this->set('comisiones', $comisiones);
            
        } else {
            $id = false;
            $this->set(compact('id'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Course id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlCourse = $this->MdlCourse->get($id, [
            'contain' => ['MdlGroups']
        ]);

        $this->set('mdlCourse', $mdlCourse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlCourse = $this->MdlCourse->newEntity();
        if ($this->request->is('post')) {
            $mdlCourse = $this->MdlCourse->patchEntity($mdlCourse, $this->request->getData());
            if ($this->MdlCourse->save($mdlCourse)) {
                $this->Flash->success(__('The mdl course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl course could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlCourse'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlCourse = $this->MdlCourse->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlCourse = $this->MdlCourse->patchEntity($mdlCourse, $this->request->getData());
            if ($this->MdlCourse->save($mdlCourse)) {
                $this->Flash->success(__('The mdl course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl course could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlCourse'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlCourse = $this->MdlCourse->get($id);
        if ($this->MdlCourse->delete($mdlCourse)) {
            $this->Flash->success(__('The mdl course has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function stats() 
    {
        $this->set('mdlCourse', $this->MdlCourse->find('list'));
    }
    
    public function getComisiones($id = null) 
    {
        $this->viewBuilder()->setClassName('Json');
        $this->request->is('ajax');
        $comisiones = $this->MdlCourse->MdlGroups->find('list')
                ->where(['courseid' => $id]);
        $this->set(compact('comisiones'));
        $this->set('_serialize', ['comisiones']);
    }

    public function getNotas($idCurso = null, $idComision = null)
    {
        $this->viewBuilder()->setClassName('Json');
        $this->request->is('ajax');
        $comisiones = TableRegistry::getTableLocator()->get('MdlGroups');
        $comision = $comisiones->get($idComision, [
            'contain' => ['MdlCourse',
                          'MdlUser' => ['finder' => 'miembros']   
                        ],
            'finder' => 'limitRows',
        ]);
        $ids = array();
        foreach($comision->mdl_user as $usuario ) {
                $ids[] = $usuario->id;
        }
        $notas = TableRegistry::getTableLocator()->get('MdlGradeGrades');
        $total = $notas->find()
            ->contain([
                'MdlGradeItems' => ['conditions' => ['courseid' => $idCurso, 'itemname NOT LIKE' => '%PARA PRÁCTICAR']],
            ])
            ->select(['rawgrade', 'count' => $notas->find()->func()->count('finalgrade')])
            ->where(['userid IN' => $ids, 'aggregationstatus' => 'used'])
            ->group(['rawgrade']);
        $this->set(compact('total'));
        $this->set('_serialize', ['total']);
    }

    public function cerrarCondicion () {
        
    }    
    
}
