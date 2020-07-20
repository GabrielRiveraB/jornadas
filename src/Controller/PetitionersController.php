<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Petitioners Controller
 *
 * @property \App\Model\Table\PetitionersTable $Petitioners
 *
 * @method \App\Model\Entity\Petitioner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PetitionersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $petitioners = $this->paginate($this->Petitioners);

        $this->set(compact('petitioners'));
    }

    /**
     * View method
     *
     * @param string|null $id Petitioner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $petitioner = $this->Petitioners->get($id, [
            'contain' => ['Requests','Dependencies'],
        ]);

        $this->set('petitioner', $petitioner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */


    public function add()
    {
        $petitioner = $this->Petitioners->newEntity();
        if ($this->request->is('post')) {
            $petitioner = $this->Petitioners->patchEntity($petitioner, $this->request->getData());
            if ($this->Petitioners->save($petitioner)) {
                $this->Flash->success(__('The petitioner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petitioner could not be saved. Please, try again.'));
        }
        $civilstatuses = array('Soltero/a'=>'Soltero/a','Casado/a'=>'Casado/a','Unión libre'=>'Unión libre','Separado/a'=>'Separado/a',
        'Divorciado/a'=>'Divorciado/a','Viudo/a'=>'Viudo/a');

        $this->set(compact('petitioner','civilstatuses'));

      
      
        $gobernador =array('0' =>'NO','1'=>'SI');

        $this->set(compact('petitioner','gobernador'));
    }


    

    /**
     * Edit method
     *
     * @param string|null $id Petitioner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $petitioner = $this->Petitioners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $petitioner = $this->Petitioners->patchEntity($petitioner, $this->request->getData());
            if ($this->Petitioners->save($petitioner)) {
                $this->Flash->success(__('The petitioner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petitioner could not be saved. Please, try again.'));
        }
        $this->set(compact('petitioner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Petitioner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $petitioner = $this->Petitioners->get($id);
        if ($this->Petitioners->delete($petitioner)) {
            $this->Flash->success(__('The petitioner has been deleted.'));
        } else {
            $this->Flash->error(__('The petitioner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
