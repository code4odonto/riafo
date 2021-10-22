<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MdlAttendanceStatuses Controller
 *
 * @property \App\Model\Table\MdlAttendanceStatusesTable $MdlAttendanceStatuses
 *
 * @method \App\Model\Entity\MdlAttendanceStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlAttendanceStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mdlAttendanceStatuses = $this->paginate($this->MdlAttendanceStatuses);

        $this->set(compact('mdlAttendanceStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Attendance Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlAttendanceStatus = $this->MdlAttendanceStatuses->get($id, [
            'contain' => []
        ]);

        $this->set('mdlAttendanceStatus', $mdlAttendanceStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlAttendanceStatus = $this->MdlAttendanceStatuses->newEntity();
        if ($this->request->is('post')) {
            $mdlAttendanceStatus = $this->MdlAttendanceStatuses->patchEntity($mdlAttendanceStatus, $this->request->getData());
            if ($this->MdlAttendanceStatuses->save($mdlAttendanceStatus)) {
                $this->Flash->success(__('The mdl attendance status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl attendance status could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlAttendanceStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Attendance Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlAttendanceStatus = $this->MdlAttendanceStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlAttendanceStatus = $this->MdlAttendanceStatuses->patchEntity($mdlAttendanceStatus, $this->request->getData());
            if ($this->MdlAttendanceStatuses->save($mdlAttendanceStatus)) {
                $this->Flash->success(__('The mdl attendance status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl attendance status could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlAttendanceStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Attendance Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlAttendanceStatus = $this->MdlAttendanceStatuses->get($id);
        if ($this->MdlAttendanceStatuses->delete($mdlAttendanceStatus)) {
            $this->Flash->success(__('The mdl attendance status has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl attendance status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
