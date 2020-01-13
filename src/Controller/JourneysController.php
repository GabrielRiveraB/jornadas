<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Journeys Controller
 *
 * @property \App\Model\Table\JourneysTable $Journeys
 *
 * @method \App\Model\Entity\Journey[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JourneysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $journeys = $this->paginate($this->Journeys);

        $this->set(compact('journeys'));
    }

    /**
     * View method
     *
     * @param string|null $id Journey id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journey = $this->Journeys->get($id, [
            'contain' => ['Requests'],
        ]);

        $this->set('journey', $journey);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $journey = $this->Journeys->newEntity();
        if ($this->request->is('post')) {
            $journey = $this->Journeys->patchEntity($journey, $this->request->getData());
            if ($this->Journeys->save($journey)) {
                $this->Flash->success(__('The journey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journey could not be saved. Please, try again.'));
        }
        $this->set(compact('journey'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Journey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journey = $this->Journeys->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journey = $this->Journeys->patchEntity($journey, $this->request->getData());
            if ($this->Journeys->save($journey)) {
                $this->Flash->success(__('The journey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journey could not be saved. Please, try again.'));
        }
        $this->set(compact('journey'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Journey id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journey = $this->Journeys->get($id);
        if ($this->Journeys->delete($journey)) {
            $this->Flash->success(__('The journey has been deleted.'));
        } else {
            $this->Flash->error(__('The journey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
