<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Works Controller
 *
 * @property \App\Model\Table\WorksTable $Works
 *
 * @method \App\Model\Entity\Work[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['WorkStatuses'],
        ];
        $works = $this->paginate($this->Works);

        $this->set(compact('works'));
    }

    /**
     * View method
     *
     * @param string|null $id Work id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $work = $this->Works->get($id, [
            'contain' => ['WorkStatuses'],
        ]);

        $this->set('work', $work);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $work = $this->Works->newEntity();
        if ($this->request->is('post')) {
            $work = $this->Works->patchEntity($work, $this->request->getData());
            if ($this->Works->save($work)) {
                $this->Flash->success(__('The work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work could not be saved. Please, try again.'));
        }
        $workStatuses = $this->Works->WorkStatuses->find('list', ['limit' => 200]);
        $this->set(compact('work', 'workStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Work id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $work = $this->Works->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $work = $this->Works->patchEntity($work, $this->request->getData());
            if ($this->Works->save($work)) {
                $this->Flash->success(__('The work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work could not be saved. Please, try again.'));
        }
        $workStatuses = $this->Works->WorkStatuses->find('list', ['limit' => 200]);
        $this->set(compact('work', 'workStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Work id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $work = $this->Works->get($id);
        if ($this->Works->delete($work)) {
            $this->Flash->success(__('The work has been deleted.'));
        } else {
            $this->Flash->error(__('The work could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
