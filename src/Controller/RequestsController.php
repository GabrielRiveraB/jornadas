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
    public function isAuthorized($user)
    {
        if(in_array($this->request->action, ['index','view','add']))
        {
            return true;
        }

        // // The owner of an article can edit and delete it
        // if (in_array($this->request->getParam('action'), ['add'])) {
        //     $JourneyId = (int)$this->request->getParam('password.0');
        //     if ($this->Journeys->isOwnedBy($JourneyId, $user['id'])) {
        //         return true;
        //     }
        // }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Journeys', 'Concepts', 'Types', 'Petitioners', 'RequestStatuses'],
            'limit' => [100]
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
            'contain' => ['Journeys', 'Concepts', 'Types', 'Petitioners', 'RequestStatuses', 'Requestupdates'],
        ]);
        // debug($request);
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

        // $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
        $concepts = $this->Requests->Concepts->find('list', ['limit' => 200]);
        $types = $this->Requests->Types->find('list', ['limit' => 200]);
        $solicitantes = $this->Requests->Petitioners->find('list', ['limit' => 200]);
        $requestStatuses = $this->Requests->RequestStatuses->find('list', ['limit' => 200]);

        $civilstatuses = array('Soltero/a'=>'Soltero/a','Casado/a'=>'Casado/a','Unión libre'=>'Unión libre','Separado/a'=>'Separado/a',
        'Divorciado/a'=>'Divorciado/a','Viudo/a'=>'Viudo/a');

        $this->set(compact('request', 'journeys', 'solicitantes', 'concepts', 'types', 'requestStatuses','civilstatuses'));
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
        // $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
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
