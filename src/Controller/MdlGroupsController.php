<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\Datasource\ConnectionManager;


/**
 * MdlGroups Controller
 *
 * @property \App\Model\Table\MdlGroupsTable $MdlGroups
 *
 * @method \App\Model\Entity\MdlGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlGroupsController extends AppController
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
    public function index()
    {
        $this->paginate = [
            'contain' => ['MdlCourse'],
        ];
        $mdlGroups = $this->paginate($this->MdlGroups);

        $this->set(compact('mdlGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $courseid = null)
    {
        switch ($courseid) {
            case 4:
                $this->viewBuilder()->setTemplate('view');
                break;
            case 37:
                $this->viewBuilder()->setTemplate('bio');
                break;
            case 12:
                $this->viewBuilder()->setTemplate('operatoria');
                break;
            case 13:
                $this->viewBuilder()->setTemplate('operatoria');    
                break;
            default:
                $this->viewBuilder()->setTemplate('normal');
                break;
        }
        if ($this->request->getData()) {
            $id = $this->request->getData("comisiones_id");
        }
        $mdlGroup = $this->MdlGroups->get($id, [
            'contain' => ['MdlCourse',
                          'MdlUser' => ['finder' => 'limitRows'], 
                          'MdlUser.MdlGradeItems' => [
                              'conditions' => ['courseid' => $courseid, 'MdlGradeGrades.aggregationstatus' => 'used', 'itemname NOT LIKE' => '%PARA PRÁCTICAR'],
                              'fields' => ['id', 'courseid', 'itemname', 'MdlGradeGrades.userid'],
                              'sort' => ['FROM_UNIXTIME(MdlGradeGrades.timecreated)'],
                          ],
                          'MdlUser.MdlAttendanceLog',
                          'MdlUser.MdlAttendanceLog.MdlAttendanceSessions' => [
                            
                            'conditions' => ['groupid' => $id],
                          ],
                          'MdlUser.MdlAttendanceLog.MdlAttendanceStatuses',    
                          'MdlUser.MdlAttendanceLog.MdlAttendanceStatuses.MdlAttendance' => [
                              'conditions' => ['course' => $courseid]
                          ],    
                        ],
            'finder' => 'limitRows',
        ]);
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'orientation' => 'landscape',
                'pageSize' => 'letter',
                'filename' => 'Comision_' . '.pdf'
            ]
        ]); 
        $comms = $this->MdlGroups->find('list')
                        ->select(['id','name'])
                        ->where(['courseid' => $courseid]);
        $this->Authorization->authorize($mdlGroup, 'view');
        $this->set('mdlGroup', $mdlGroup);
        $this->set('comms', $comms);
    }

    public function listar($id = null, $courseid = null)
    {
        $this->viewBuilder()->setLayout('');
        $mdlGroup = $this->MdlGroups->get($id, [
            'contain' => ['MdlCourse',
                          'MdlUser' => ['sort' => ['lastname' => 'ASC']], 
                          ],
            'finder' => 'limitRows',
        ]);
        
        $this->set('mdlGroup', $mdlGroup);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlGroup = $this->MdlGroups->newEntity();
        if ($this->request->is('post')) {
            $mdlGroup = $this->MdlGroups->patchEntity($mdlGroup, $this->request->getData());
            if ($this->MdlGroups->save($mdlGroup)) {
                $this->Flash->success(__('The mdl group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl group could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlGroup = $this->MdlGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlGroup = $this->MdlGroups->patchEntity($mdlGroup, $this->request->getData());
            if ($this->MdlGroups->save($mdlGroup)) {
                $this->Flash->success(__('The mdl group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl group could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlGroup = $this->MdlGroups->get($id);
        if ($this->MdlGroups->delete($mdlGroup)) {
            $this->Flash->success(__('The mdl group has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
