<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MdlGroupsMembers Controller
 *
 * @property \App\Model\Table\MdlGroupsMembersTable $MdlGroupsMembers
 *
 * @method \App\Model\Entity\MdlGroupsMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlGroupsMembersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mdlGroupsMembers = $this->paginate($this->MdlGroupsMembers);

        $this->set(compact('mdlGroupsMembers'));
    }
    public function listar()
    {
        $this->paginate = [
            'contain' => ['MdlUser', 'MdlGroups'],
            'enableAutoFields' => ['true'],
        ];  
        $miembros = $this->paginate($this->MdlGroupsMembers);
        $this->set(compact('miembros'));
    }
    /**
     * View method
     *
     * @param string|null $id Mdl Groups Member id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $comision = null)
    {
        $mdlGroupsMember = $this->MdlGroupsMembers->find()->contain([
            'MdlGroups' => ['MdlCourse'], 'MdlUser'])->where([
            'groupid' => $id
        ]);
        $this->set('mdlGroupsMember', $mdlGroupsMember);
        $this->set('comision', $comision);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlGroupsMember = $this->MdlGroupsMembers->newEntity();
        if ($this->request->is('post')) {
            $mdlGroupsMember = $this->MdlGroupsMembers->patchEntity($mdlGroupsMember, $this->request->getData());
            if ($this->MdlGroupsMembers->save($mdlGroupsMember)) {
                $this->Flash->success(__('The mdl groups member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl groups member could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGroupsMember'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Groups Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlGroupsMember = $this->MdlGroupsMembers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlGroupsMember = $this->MdlGroupsMembers->patchEntity($mdlGroupsMember, $this->request->getData());
            if ($this->MdlGroupsMembers->save($mdlGroupsMember)) {
                $this->Flash->success(__('The mdl groups member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl groups member could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGroupsMember'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Groups Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlGroupsMember = $this->MdlGroupsMembers->get($id);
        if ($this->MdlGroupsMembers->delete($mdlGroupsMember)) {
            $this->Flash->success(__('The mdl groups member has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl groups member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
