<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MdlAttendance Controller
 *
 * @property \App\Model\Table\MdlAttendanceTable $MdlAttendance
 *
 * @method \App\Model\Entity\MdlAttendance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlAttendanceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mdlAttendance = $this->paginate($this->MdlAttendance);

        $this->set(compact('mdlAttendance'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Attendance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlAttendance = $this->MdlAttendance->get($id, [
            'contain' => []
        ]);

        $this->set('mdlAttendance', $mdlAttendance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlAttendance = $this->MdlAttendance->newEntity();
        if ($this->request->is('post')) {
            $mdlAttendance = $this->MdlAttendance->patchEntity($mdlAttendance, $this->request->getData());
            if ($this->MdlAttendance->save($mdlAttendance)) {
                $this->Flash->success(__('The mdl attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl attendance could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlAttendance'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Attendance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlAttendance = $this->MdlAttendance->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlAttendance = $this->MdlAttendance->patchEntity($mdlAttendance, $this->request->getData());
            if ($this->MdlAttendance->save($mdlAttendance)) {
                $this->Flash->success(__('The mdl attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl attendance could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlAttendance'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Attendance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlAttendance = $this->MdlAttendance->get($id);
        if ($this->MdlAttendance->delete($mdlAttendance)) {
            $this->Flash->success(__('The mdl attendance has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl attendance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
