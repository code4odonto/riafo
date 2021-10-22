<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CondicionesTest Controller
 *
 * @property \App\Model\Table\CondicionesTestTable $CondicionesTest
 *
 * @method \App\Model\Entity\CondicionesTest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CondicionesTestController extends AppController
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
        $condicionesTest = $this->paginate($this->CondicionesTest);

        $this->set(compact('condicionesTest'));
    }

    /**
     * View method
     *
     * @param string|null $id Condiciones Test id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $condicionesTest = $this->CondicionesTest->get($id, [
            'contain' => ['Users', 'Materias', 'Comisions']
        ]);

        $this->set('condicionesTest', $condicionesTest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $condicionesTest = $this->CondicionesTest->newEntity();
        if ($this->request->is('post')) {
            $condicionesTest = $this->CondicionesTest->patchEntity($condicionesTest, $this->request->getData());
            if ($this->CondicionesTest->save($condicionesTest)) {
                $this->Flash->success(__('The condiciones test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condiciones test could not be saved. Please, try again.'));
        }
        $users = $this->CondicionesTest->Users->find('list', ['limit' => 200]);
        $materias = $this->CondicionesTest->Materias->find('list', ['limit' => 200]);
        $comisions = $this->CondicionesTest->Comisions->find('list', ['limit' => 200]);
        $this->set(compact('condicionesTest', 'users', 'materias', 'comisions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Condiciones Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $condicionesTest = $this->CondicionesTest->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $condicionesTest = $this->CondicionesTest->patchEntity($condicionesTest, $this->request->getData());
            if ($this->CondicionesTest->save($condicionesTest)) {
                $this->Flash->success(__('The condiciones test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condiciones test could not be saved. Please, try again.'));
        }
        $users = $this->CondicionesTest->Users->find('list', ['limit' => 200]);
        $materias = $this->CondicionesTest->Materias->find('list', ['limit' => 200]);
        $comisions = $this->CondicionesTest->Comisions->find('list', ['limit' => 200]);
        $this->set(compact('condicionesTest', 'users', 'materias', 'comisions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Condiciones Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $condicionesTest = $this->CondicionesTest->get($id);
        if ($this->CondicionesTest->delete($condicionesTest)) {
            $this->Flash->success(__('The condiciones test has been deleted.'));
        } else {
            $this->Flash->error(__('The condiciones test could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
