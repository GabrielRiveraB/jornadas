<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workupdates Controller
 *
 * @property \App\Model\Table\WorkupdatesTable $Workupdates
 *
 * @method \App\Model\Entity\Workupdate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkupdatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Works'],
        ];
        $workupdates = $this->paginate($this->Workupdates);

        $this->set(compact('workupdates'));
    }

    /**
     * View method
     *
     * @param string|null $id Workupdate id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workupdate = $this->Workupdates->get($id, [
            'contain' => ['Works'],
        ]);

        $this->set('workupdate', $workupdate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workupdate = $this->Workupdates->newEntity();
        if ($this->request->is('post')) {
            $workupdate = $this->Workupdates->patchEntity($workupdate, $this->request->getData());
            if ($this->Workupdates->save($workupdate)) {
                $this->Flash->success(__('The workupdate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workupdate could not be saved. Please, try again.'));
        }
        $works = $this->Workupdates->Works->find('list', ['limit' => 200]);
        $this->set(compact('workupdate', 'works'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Workupdate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workupdate = $this->Workupdates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workupdate = $this->Workupdates->patchEntity($workupdate, $this->request->getData());
            if ($this->Workupdates->save($workupdate)) {
                $this->Flash->success(__('The workupdate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workupdate could not be saved. Please, try again.'));
        }
        $works = $this->Workupdates->Works->find('list', ['limit' => 200]);
        $this->set(compact('workupdate', 'works'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Workupdate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workupdate = $this->Workupdates->get($id);
        if ($this->Workupdates->delete($workupdate)) {
            $this->Flash->success(__('The workupdate has been deleted.'));
        } else {
            $this->Flash->error(__('The workupdate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
