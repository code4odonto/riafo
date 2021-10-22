<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MdlGradeGrades Controller
 *
 * @property \App\Model\Table\MdlGradeGradesTable $MdlGradeGrades
 *
 * @method \App\Model\Entity\MdlGradeGrade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MdlGradeGradesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mdlGradeGrades = $this->paginate($this->MdlGradeGrades);

        $this->set(compact('mdlGradeGrades'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdl Grade Grade id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdlGradeGrade = $this->MdlGradeGrades->get($id, [
            'contain' => []
        ]);

        $this->set('mdlGradeGrade', $mdlGradeGrade);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdlGradeGrade = $this->MdlGradeGrades->newEntity();
        if ($this->request->is('post')) {
            $mdlGradeGrade = $this->MdlGradeGrades->patchEntity($mdlGradeGrade, $this->request->getData());
            if ($this->MdlGradeGrades->save($mdlGradeGrade)) {
                $this->Flash->success(__('The mdl grade grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl grade grade could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGradeGrade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdl Grade Grade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdlGradeGrade = $this->MdlGradeGrades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdlGradeGrade = $this->MdlGradeGrades->patchEntity($mdlGradeGrade, $this->request->getData());
            if ($this->MdlGradeGrades->save($mdlGradeGrade)) {
                $this->Flash->success(__('The mdl grade grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdl grade grade could not be saved. Please, try again.'));
        }
        $this->set(compact('mdlGradeGrade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdl Grade Grade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdlGradeGrade = $this->MdlGradeGrades->get($id);
        if ($this->MdlGradeGrades->delete($mdlGradeGrade)) {
            $this->Flash->success(__('The mdl grade grade has been deleted.'));
        } else {
            $this->Flash->error(__('The mdl grade grade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
