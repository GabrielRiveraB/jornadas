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

        if(in_array($this->request->action, ['index','view','add','edit','btns','rubro']))
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
    public function index($id = null)
    {

        // $id contiene el id de la jornada

        if(!$id) {
            $requests = $this->Requests->find('all', [
                // 'conditions'=>array('description LIKE'=>$this->request->data('search').'%')
                'contain' => ['Journeys', 'Types', 'Petitioners', 'RequestStatuses'],
                'order'=>['Requests.created' => 'DESC'],
                ]);

        } else {
            $requests = $this->Requests->find('all', [
                'contain' => ['Journeys', 'Types', 'Petitioners', 'RequestStatuses'],
                'order'=>['Requests.created' => 'DESC'],
                'conditions'=> ['journey_id'=>$id]
                ]);
        }
        //debug($requests->count());

        // si es a través de una búsqueda

        if($this->request->data('search')!='') {

            $requestsFol = $requests->match(['folio' => $this->request->data('search')]);


            // ENCONTRAR LA MANERA DE BUSCAR POR PALABRAS EN LA DESCRIPCION

            $tapeexists = $this->Requests->find('all', array('conditions'=>array('description LIKE'=>$this->request->data('search').'%')));

            //  debug($this->paginate($tapeexists));
        }



        if($this->Auth->user('role') == 'Responsable')
        {
            $this->loadModel("activities");
            $responsableID = $this->Dependencies->find('all', ['conditions' => ['user_id'=>$this->Auth->user('id')]])->first();
            //
            debug($responsableID->id);
            $requests = $this->activities->find('all', [
              //  'contain' => ['Journeys', 'Types', 'Petitioners', 'Requestupdates','Activities'],
                'conditions'=> ['dependency_id' => $responsableID->id]
            ]);
            debug($requests->count());
        }

        // $requests = $requests->append($tapeexists);

        // $requests = $this->paginate($all);

        // debug($requests->count());

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
            'contain' => ['Journeys', 'Types', 'Petitioners', 'RequestStatuses', 'Requestupdates','Activities','Activities.dependencies','Activities.concepts'],
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

            $this->loadModel('Petitioners');
            $petitioner = $this->Petitioners->newEntity();

            $petitioner->name = $this->request->data('name');
            $petitioner->age = $this->request->data('edad');
            $petitioner->civilstatus = $this->request->data('civilstatus');
            $petitioner->address = $this->request->data('address');
            $petitioner->phone = $this->request->data('phone');
            $petitioner->email = $this->request->data('email');
            $petitioner->gobernador =$this->request->data('gobernador');
           // $petitioner->photo =$this->request->data('photo');

            //debug( $this->request->getData());

            if ($this->Petitioners->save($petitioner)) {
                // $this->Flash->success(__('La solicitud se ha guardado.'));
                $request->petitioner_id = $petitioner->id;

                $request->photo = $this->request->data('photo');


                if ($this->Requests->save($request)) {
                    $this->Flash->success(__('La solicitud se ha guardado.'));
                    // debug($petitioner->id);
                    return $this->redirect(['controller'=>'requests','action' => 'add']);
                } else {
                //debug($this->validationErrors);
                $this->Flash->error(__('No se puedo guardar la solicitud, intenta de nuevo.'));
                // debug($this->validationErrors);
                }
            } else {
                debug($petitioner->errors());
                $this->Flash->error(__('No'));
            }
        }

        if(!$jid){
            $journeys = $this->Requests->Journeys->find('list', ['limit' => 200,'order'=> ['date DESC']] );
        } else {
            $journeys = $this->Requests->Journeys->find('list', ['conditions' => ['id' => $jid,'order'=> ['date DESC']]]);
        }

        // $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
        // $concepts = $this->Requests->Concepts->find('list', ['limit' => 200]);
        $types = $this->Requests->Types->find('list', ['limit' => 200]);
        $solicitantes = $this->Requests->Petitioners->find('list', ['limit' => 200]);
        $requestStatuses = $this->Requests->RequestStatuses->find('list', ['limit' => 200]);

        $civilstatuses = array('Soltero/a'=>'Soltero/a','Casado/a'=>'Casado/a','Unión libre'=>'Unión libre','Separado/a'=>'Separado/a',
        'Divorciado/a'=>'Divorciado/a','Viudo/a'=>'Viudo/a');

        $this->set(compact('request', 'journeys', 'solicitantes', 'types', 'requestStatuses','civilstatuses'));
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
            'contain' => ['Petitioners'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());

            $this->loadModel('Petitioners');

            $petitioner = $this->Petitioners->get($request['petitioner_id']);

            $petitioner->name = $this->request->data('name');
            $petitioner->age = $this->request->data('edad');
            $petitioner->civilstatus = $this->request->data('civilstatus');
            $petitioner->address = $this->request->data('address');
            $petitioner->phone = $this->request->data('phone');
            $petitioner->email = $this->request->data('email');
            $petitioner->photo =$this->request->file('photo');


            if ($this->Petitioners->save($petitioner)) {
                // $this->Flash->success(__('La solicitud se ha guardado.'));
                // $request->petitioner_id = $petitioner->id;


                if ($this->Requests->save($request)) {
                    $this->Flash->success(__('La solicitud se ha guardado.'));
                    // debug($petitioner->id);
                    return $this->redirect(['controller'=>'requests','action' => 'view',$request->id]);
                }
                $this->Flash->error(__('No se puedo guardar la solicitud, intenta de nuevo.'));

            } else {
                $this->Flash->error(__('No se puedo guardar la solicitud, intenta de nuevo.'));
            }



        }
        $journeys = $this->Requests->Journeys->find('list', ['limit' => 200]);
        // $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
        // $concepts = $this->Requests->Concepts->find('list', ['limit' => 200]);
        $types = $this->Requests->Types->find('list', ['limit' => 200]);
        // $petitioners = $this->Requests->Petitioners->find('list', ['limit' => 200]);
        $requestStatuses = $this->Requests->RequestStatuses->find('list', ['limit' => 200]);
        $this->set(compact('request', 'journeys', 'promoters', 'types', 'requestStatuses'));
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

    /**
    *add method
    *   @param string|null $id Request id.
    * @return \Cake\Http\Response|null Redirects to index
    * @throws \Cake\Datasource\Exception\RecorNotFoundException when record not found.
    */
    public function btns($id = null)
    {
        $this->Requests->get($id);
        // if ($this->Request)
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function rubro($id = null)
    {
        $this->loadModel("Journeys");
        $this->loadModel('Concepts');
        $this->loadModel('Activities');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $jornada = $this->request->data('journeys');
            $rubro = $this->request->data('concepts');
            $municipio = $this->request->data('municipios');
        }


        // $peticiones = $this->Activities->find('all', [
        //     'contain' => ['Journeys','Concepts'],
        //     // 'order'=>['peticiones' => 'DESC'],
        //     ]);

        $peticiones = $this->Activities->find('all', [
            'contain' => ['Journeys','Concepts'],
            'fields' => [
                'rubro'=>'name',
                'peticiones'=>'COUNT(*)',
                'atendidas'=>'SUM(if(status = "turnada", 1, 0))',
                'cumplidas'=>'SUM(if(status = "cumplida", 1, 0))',
                'journey_id',
                'concept'=>'concept_id'
            ],
            'order'=>['peticiones' => 'DESC'],
            ]);


            // if(isset($jornada)!=''){
            // $peticiones = $this->Activities->find('all', [
            //     'contain' => ['Journeys','Concepts'],
            //     'fields' => [
            //         'rubro'=>'name',
            //         'peticiones'=>'COUNT(*)',
            //         'atendidas'=>'SUM(if(status = "turnada", 1, 0))',
            //         'cumplidas'=>'SUM(if(status = "cumplida", 1, 0))',
            //         'journey_id',
            //         'concept'=>'concept_id'
            //     ],
            //     'order'=>['peticiones' => 'DESC'],
            //     'where'=>['journey_id' => $jornada]
            //     ]);
            // }

       //debug($peticiones->toArray());


        //if(isset($rubro)!=''){  debug($rubro); $peticiones = $peticiones->where(['concept_id'=>$rubro]); }
        // if(isset($jornada)!=''){  $peticiones = $peticiones->where(['journey_id'=>$jornada]); }

        //$pavimentaciones = $this->activities->find()->where(['concept_id' => 25 ]);
        $peticiones = $peticiones->group(['activities.concept_id']);

        //debug($peticiones->toArray());

        $this->set(compact('peticiones'));

        $journeys = $this->Journeys->find('list', ['limit' => 200]);
        // $promoters = $this->Requests->Promoters->find('list', ['limit' => 200]);
        $concepts = $this->Concepts->find('list', ['limit' => 200]);
        // $types = $this->Requests->Types->find('list', ['limit' => 200]);
        $municipios = array('Mexicali'=>'MEXICALI','Tijuana'=>'TIJUANA','Ensenada'=>'ENSENADA','Tecate'=>'TECATE','Playas de Rosarito'=>'PLAYAS DE ROSARITO','San Quintín'=>'SAN QUINTÍN');

        $this->set(compact('journeys','concepts','municipios'));

    }

}
