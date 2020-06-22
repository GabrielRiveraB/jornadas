<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 *
 * @method \App\Model\Entity\Activity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivitiesController extends AppController
{
    public function isAuthorized($user)
    {
    if ( isset($user['role']) and $user['role'] == "Coordinador" ) {

        if(in_array($this->request->action, ['index','view','create','']))
        {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), [''])) {
            $JourneyId = (int)$this->request->getParam('pass.0');
            if ($this->Journeys->isOwnedBy($JourneyId, $user['id'])) {
                return true;
            }
        }

    }

    if ( isset($user['role']) and $user['role'] == "Secretaria" ) {

        if(in_array($this->request->action, ['show']))
        {
            return true;
        }

    }

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
            'contain' => ['Requests', 'Dependencies', 'Concepts'],
        ];
        $activities = $this->paginate($this->Activities);

        $this->set(compact('activities'));
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => ['Requests', 'Dependencies', 'Concepts'],
        ]);

        $this->set('activity', $activity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $requests = $this->Activities->Requests->find('list', ['limit' => 200]);
        $dependencies = $this->Activities->Dependencies->find('list', ['limit' => 200]);
        $concepts = $this->Activities->Concepts->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'requests', 'dependencies', 'concepts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $requests = $this->Activities->Requests->find('list', ['limit' => 200]);
        $dependencies = $this->Activities->Dependencies->find('list', ['limit' => 200]);
        $concepts = $this->Activities->Concepts->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'requests', 'dependencies', 'concepts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Método para crear actividades de solicitudes
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function create($rid = null)
    {
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

               return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        // $request = $this->Activities->Requests->find('all', ['limit' => 200,'conditions'=>['id'=>$rid],'contain'=>'Journeys']);
        $request = $this->Activities->Requests->get($rid, [
            'contain' => ['Journeys', 'Types', 'Petitioners', 'RequestStatuses', 'Requestupdates'],
        ]);
        // debug($request);
        $this->set('request', $request);
        $dependencies = $this->Activities->Dependencies->find('list', ['limit' => 200]);
        $concepts = $this->Activities->Concepts->find('list', ['limit' => 200]);
        $this->set(compact('rid','activity', 'request', 'dependencies', 'concepts'));
    }

    /**
     * Show method
     *
     * @return \Cake\Http\Response|null
     */
    public function show($type = null)
    {   
        if($type == "pavimentacion") { $concept_id = 25; $titulo = "pavimentación";}
        if($type == "espacios") { $concept_id = 30; $titulo = "espacios públicos";}
        if($type == "regularizacion") { $concept_id = 29; $titulo = "regularización";}

        $actividades = $this->Activities->find()->where(['concept_id' => $concept_id ]);
        $actividades = $actividades->contain(['journeys','dependencies']);
        $actividades = $actividades->group(['activities.journey_id']);
        debug($actividades->toArray());
        $this->set('activities', $this->paginate($actividades));

        // $this->paginate = [
        //     'contain' => ['Requests', 'Dependencies', 'Concepts'],
        //     'where' => ''
        // ];
        // $activities = $this->paginate($this->Activities,[''=>'']);

        $this->set(compact('titulo'));
    }

}
