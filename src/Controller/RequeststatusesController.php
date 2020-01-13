<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requeststatuses Controller
 *
 * @property \App\Model\Table\RequeststatusesTable $Requeststatuses
 *
 * @method \App\Model\Entity\Requeststatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequeststatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $requeststatuses = $this->paginate($this->Requeststatuses);

        $this->set(compact('requeststatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Requeststatus id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requeststatus = $this->Requeststatuses->get($id, [
            'contain' => [],
        ]);

        $this->set('requeststatus', $requeststatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requeststatus = $this->Requeststatuses->newEntity();
        if ($this->request->is('post')) {
            $requeststatus = $this->Requeststatuses->patchEntity($requeststatus, $this->request->getData());
            if ($this->Requeststatuses->save($requeststatus)) {
                $this->Flash->success(__('The requeststatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requeststatus could not be saved. Please, try again.'));
        }
        $this->set(compact('requeststatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requeststatus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requeststatus = $this->Requeststatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requeststatus = $this->Requeststatuses->patchEntity($requeststatus, $this->request->getData());
            if ($this->Requeststatuses->save($requeststatus)) {
                $this->Flash->success(__('The requeststatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requeststatus could not be saved. Please, try again.'));
        }
        $this->set(compact('requeststatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requeststatus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requeststatus = $this->Requeststatuses->get($id);
        if ($this->Requeststatuses->delete($requeststatus)) {
            $this->Flash->success(__('The requeststatus has been deleted.'));
        } else {
            $this->Flash->error(__('The requeststatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
