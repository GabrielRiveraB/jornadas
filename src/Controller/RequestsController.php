<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Journeys', 'Promoters', 'Concepts', 'Types', 'Petitioners', 'RequestStatuses'],
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => ['Journeys', 'Promoters', 'Concepts', 'Types', 'Petitioners', 'RequestStatuses', 'Requestupdates'],
        ]);

        $this->set('request', $request);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($jid = null)
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }

        if(!$jid){
            $journeys = $this->Requests->Journeys->find('list', ['limit' => 200]);
        } else {
            $journeys = $this->Requests->Journeys->find('list', ['conditions' => ['id' => $jid]]);
        }
        
        $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
        $concepts = $this->Requests->Concepts->find('list', ['limit' => 200]);
        $types = $this->Requests->Types->find('list', ['limit' => 200]);
        $petitioners = $this->Requests->Petitioners->find('list', ['limit' => 200]);
        $requestStatuses = $this->Requests->RequestStatuses->find('list', ['limit' => 200]);
        $this->set(compact('request', 'journeys', 'promoters', 'concepts', 'types', 'petitioners', 'requestStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $journeys = $this->Requests->Journeys->find('list', ['limit' => 200]);
        $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
        $concepts = $this->Requests->Concepts->find('list', ['limit' => 200]);
        $types = $this->Requests->Types->find('list', ['limit' => 200]);
        $petitioners = $this->Requests->Petitioners->find('list', ['limit' => 200]);
        $requestStatuses = $this->Requests->RequestStatuses->find('list', ['limit' => 200]);
        $this->set(compact('request', 'journeys', 'promoters', 'concepts', 'types', 'petitioners', 'requestStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
