<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requestupdates Controller
 *
 * @property \App\Model\Table\RequestupdatesTable $Requestupdates
 *
 * @method \App\Model\Entity\Requestupdate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestupdatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Requests'],
        ];
        $requestupdates = $this->paginate($this->Requestupdates);

        $this->set(compact('requestupdates'));
    }

    /**
     * View method
     *
     * @param string|null $id Requestupdate id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requestupdate = $this->Requestupdates->get($id, [
            'contain' => ['Requests'],
        ]);

        $this->set('requestupdate', $requestupdate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requestupdate = $this->Requestupdates->newEntity();
        if ($this->request->is('post')) {
            $requestupdate = $this->Requestupdates->patchEntity($requestupdate, $this->request->getData());
            if ($this->Requestupdates->save($requestupdate)) {
                $this->Flash->success(__('The requestupdate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requestupdate could not be saved. Please, try again.'));
        }
        $requests = $this->Requestupdates->Requests->find('list', ['limit' => 200]);
        $this->set(compact('requestupdate', 'requests'));
    }
    
 





    
    /**
     * Edit method
     *
     * @param string|null $id Requestupdate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requestupdate = $this->Requestupdates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestupdate = $this->Requestupdates->patchEntity($requestupdate, $this->request->getData());
            if ($this->Requestupdates->save($requestupdate)) {
                $this->Flash->success(__('The requestupdate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requestupdate could not be saved. Please, try again.'));
        }
        $requests = $this->Requestupdates->Requests->find('list', ['limit' => 200]);
        $this->set(compact('requestupdate', 'requests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requestupdate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requestupdate = $this->Requestupdates->get($id);
        if ($this->Requestupdates->delete($requestupdate)) {
            $this->Flash->success(__('The requestupdate has been deleted.'));
        } else {
            $this->Flash->error(__('The requestupdate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
