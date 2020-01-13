<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Promoters Controller
 *
 * @property \App\Model\Table\PromotersTable $Promoters
 *
 * @method \App\Model\Entity\Promoter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PromotersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $promoters = $this->paginate($this->Promoters);

        $this->set(compact('promoters'));
    }

    /**
     * View method
     *
     * @param string|null $id Promoter id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promoter = $this->Promoters->get($id, [
            'contain' => ['Requests'],
        ]);

        $this->set('promoter', $promoter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promoter = $this->Promoters->newEntity();
        if ($this->request->is('post')) {
            $promoter = $this->Promoters->patchEntity($promoter, $this->request->getData());
            if ($this->Promoters->save($promoter)) {
                $this->Flash->success(__('The promoter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promoter could not be saved. Please, try again.'));
        }
        $this->set(compact('promoter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promoter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promoter = $this->Promoters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promoter = $this->Promoters->patchEntity($promoter, $this->request->getData());
            if ($this->Promoters->save($promoter)) {
                $this->Flash->success(__('The promoter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promoter could not be saved. Please, try again.'));
        }
        $this->set(compact('promoter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promoter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promoter = $this->Promoters->get($id);
        if ($this->Promoters->delete($promoter)) {
            $this->Flash->success(__('The promoter has been deleted.'));
        } else {
            $this->Flash->error(__('The promoter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
