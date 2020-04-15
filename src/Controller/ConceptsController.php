<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Concepts Controller
 *
 * @property \App\Model\Table\ConceptsTable $Concepts
 *
 * @method \App\Model\Entity\Concept[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConceptsController extends AppController
{
    
    
    public function isAuthorized($user)
    {
        if(in_array($this->request->action, ['index','view','add','edit']))
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
        $concepts = $this->paginate($this->Concepts);

        $this->set(compact('concepts'));
    }

    /**
     * View method
     *
     * @param string|null $id Concept id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $concept = $this->Concepts->get($id, []);

        $this->set('concept', $concept);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $concept = $this->Concepts->newEntity();
        if ($this->request->is('post')) {
            $concept = $this->Concepts->patchEntity($concept, $this->request->getData());
            if ($this->Concepts->save($concept)) {
                $this->Flash->success(__('The concept has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The concept could not be saved. Please, try again.'));
        }
        $this->set(compact('concept'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Concept id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $concept = $this->Concepts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $concept = $this->Concepts->patchEntity($concept, $this->request->getData());
            if ($this->Concepts->save($concept)) {
                $this->Flash->success(__('The concept has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The concept could not be saved. Please, try again.'));
        }
        $this->set(compact('concept'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Concept id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $concept = $this->Concepts->get($id);
        if ($this->Concepts->delete($concept)) {
            $this->Flash->success(__('The concept has been deleted.'));
        } else {
            $this->Flash->error(__('The concept could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
