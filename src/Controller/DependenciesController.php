<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dependencies Controller
 *
 * @property \App\Model\Table\DependenciesTable $Dependencies
 *
 * @method \App\Model\Entity\Dependency[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DependenciesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $dependencies = $this->paginate($this->Dependencies);

        $this->set(compact('dependencies'));
    }

    /**
     * View method
     *
     * @param string|null $id Dependency id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dependency = $this->Dependencies->get($id, [
            'contain' => ['Activities'],
        ]);

        $this->set('dependency', $dependency);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dependency = $this->Dependencies->newEntity();
        if ($this->request->is('post')) {
            $dependency = $this->Dependencies->patchEntity($dependency, $this->request->getData());
            if ($this->Dependencies->save($dependency)) {
                $this->Flash->success(__('The dependency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependency could not be saved. Please, try again.'));
        }
        $this->set(compact('dependency'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dependency id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dependency = $this->Dependencies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dependency = $this->Dependencies->patchEntity($dependency, $this->request->getData());
            if ($this->Dependencies->save($dependency)) {
                $this->Flash->success(__('The dependency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependency could not be saved. Please, try again.'));
        }
        $this->set(compact('dependency'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dependency id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dependency = $this->Dependencies->get($id);
        if ($this->Dependencies->delete($dependency)) {
            $this->Flash->success(__('The dependency has been deleted.'));
        } else {
            $this->Flash->error(__('The dependency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
