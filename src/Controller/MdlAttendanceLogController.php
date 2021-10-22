<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MdlAttendanceLog Controller
 *
 * @property \App\Model\Table\MdlAttendanceLogTable $MdlAttendanceLog
 *
 * @method \App\Model\Entity\MdlAttendanceLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlAttendanceLogController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mdlAttendanceLog = $this->paginate($this->MdlAttendanceLog);

        $this->set(compact('mdlAttendanceLog'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Attendance Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlAttendanceLog = $this->MdlAttendanceLog->get($id, [
            'contain' => []
        ]);

        $this->set('mdlAttendanceLog', $mdlAttendanceLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlAttendanceLog = $this->MdlAttendanceLog->newEntity();
        if ($this->request->is('post')) {
            $mdlAttendanceLog = $this->MdlAttendanceLog->patchEntity($mdlAttendanceLog, $this->request->getData());
            if ($this->MdlAttendanceLog->save($mdlAttendanceLog)) {
                $this->Flash->success(__('The mdl attendance log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl attendance log could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlAttendanceLog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Attendance Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlAttendanceLog = $this->MdlAttendanceLog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlAttendanceLog = $this->MdlAttendanceLog->patchEntity($mdlAttendanceLog, $this->request->getData());
            if ($this->MdlAttendanceLog->save($mdlAttendanceLog)) {
                $this->Flash->success(__('The mdl attendance log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl attendance log could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlAttendanceLog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Attendance Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlAttendanceLog = $this->MdlAttendanceLog->get($id);
        if ($this->MdlAttendanceLog->delete($mdlAttendanceLog)) {
            $this->Flash->success(__('The mdl attendance log has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl attendance log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
