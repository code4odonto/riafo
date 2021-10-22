<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Condiciones Controller
 *
 * @property \App\Model\Table\CondicionesTable $Condiciones
 *
 * @method \App\Model\Entity\Condicione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CondicionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Materias', 'Comisions']
        ];
        $condiciones = $this->paginate($this->Condiciones);

        $this->set(compact('condiciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Condicione id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $condicione = $this->Condiciones->get($id, [
            'contain' => ['Users', 'Materias', 'Comisions']
        ]);

        $this->set('condicione', $condicione);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $condicione = $this->Condiciones->newEntity();
        if ($this->request->is('post')) {
            $condicione = $this->Condiciones->patchEntity($condicione, $this->request->getData());
            if ($this->Condiciones->save($condicione)) {
                $this->Flash->success(__('The condicione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condicione could not be saved. Please, try again.'));
        }
        $users = $this->Condiciones->Users->find('list', ['limit' => 200]);
        $materias = $this->Condiciones->Materias->find('list', ['limit' => 200]);
        $comisions = $this->Condiciones->Comisions->find('list', ['limit' => 200]);
        $this->set(compact('condicione', 'users', 'materias', 'comisions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Condicione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $condicione = $this->Condiciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $condicione = $this->Condiciones->patchEntity($condicione, $this->request->getData());
            if ($this->Condiciones->save($condicione)) {
                $this->Flash->success(__('The condicione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condicione could not be saved. Please, try again.'));
        }
        $users = $this->Condiciones->Users->find('list', ['limit' => 200]);
        $materias = $this->Condiciones->Materias->find('list', ['limit' => 200]);
        $comisions = $this->Condiciones->Comisions->find('list', ['limit' => 200]);
        $this->set(compact('condicione', 'users', 'materias', 'comisions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Condicione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $condicione = $this->Condiciones->get($id);
        if ($this->Condiciones->delete($condicione)) {
            $this->Flash->success(__('The condicione has been deleted.'));
        } else {
            $this->Flash->error(__('The condicione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
