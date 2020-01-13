<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workstatuses Controller
 *
 * @property \App\Model\Table\WorkstatusesTable $Workstatuses
 *
 * @method \App\Model\Entity\Workstatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkstatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $workstatuses = $this->paginate($this->Workstatuses);

        $this->set(compact('workstatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Workstatus id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workstatus = $this->Workstatuses->get($id, [
            'contain' => [],
        ]);

        $this->set('workstatus', $workstatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workstatus = $this->Workstatuses->newEntity();
        if ($this->request->is('post')) {
            $workstatus = $this->Workstatuses->patchEntity($workstatus, $this->request->getData());
            if ($this->Workstatuses->save($workstatus)) {
                $this->Flash->success(__('The workstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('workstatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Workstatus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workstatus = $this->Workstatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workstatus = $this->Workstatuses->patchEntity($workstatus, $this->request->getData());
            if ($this->Workstatuses->save($workstatus)) {
                $this->Flash->success(__('The workstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('workstatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Workstatus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workstatus = $this->Workstatuses->get($id);
        if ($this->Workstatuses->delete($workstatus)) {
            $this->Flash->success(__('The workstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The workstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
