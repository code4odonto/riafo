<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MdlGradeItems Controller
 *
 * @property \App\Model\Table\MdlGradeItemsTable $MdlGradeItems
 *
 * @method \App\Model\Entity\MdlGradeItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlGradeItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mdlGradeItems = $this->paginate($this->MdlGradeItems);

        $this->set(compact('mdlGradeItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Grade Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlGradeItem = $this->MdlGradeItems->get($id, [
            'contain' => []
        ]);

        $this->set('mdlGradeItem', $mdlGradeItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlGradeItem = $this->MdlGradeItems->newEntity();
        if ($this->request->is('post')) {
            $mdlGradeItem = $this->MdlGradeItems->patchEntity($mdlGradeItem, $this->request->getData());
            if ($this->MdlGradeItems->save($mdlGradeItem)) {
                $this->Flash->success(__('The mdl grade item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl grade item could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGradeItem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Grade Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlGradeItem = $this->MdlGradeItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlGradeItem = $this->MdlGradeItems->patchEntity($mdlGradeItem, $this->request->getData());
            if ($this->MdlGradeItems->save($mdlGradeItem)) {
                $this->Flash->success(__('The mdl grade item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl grade item could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGradeItem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Grade Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlGradeItem = $this->MdlGradeItems->get($id);
        if ($this->MdlGradeItems->delete($mdlGradeItem)) {
            $this->Flash->success(__('The mdl grade item has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl grade item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
