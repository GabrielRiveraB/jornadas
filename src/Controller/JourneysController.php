<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Journeys Controller
 *
 * @property \App\Model\Table\JourneysTable $Journeys
 *
 * @method \App\Model\Entity\Journey[]|\Cake\Datasource\ResultSe    tInterface paginate($object = null, array $settings = [])
 */
class JourneysController extends AppController
{
    public function btns()
    {

    }

    public function isAuthorized($user)
    {
        if ( isset($user['role']) and $user['role'] == "Administrador" ) {

        if(in_array($this->request->action, ['index','view','btns']))
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

    if ( isset($user['role']) and $user['role'] == "Capturista" ) {

        if(in_array($this->request->action, ['index','view']))
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

    if ( isset($user['role']) and $user['role'] == "Coordinador" ) {

        if(in_array($this->request->action, ['index','view','edit','add','btns']))
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

        if(in_array($this->request->action, ['index','view']))
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
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if($this->request->data('municipios')=='Todos' || $this->request->data('municipios')=='') {

            $journeys = $this->paginate($this->Journeys,
            [
                'order'=>['Journeys.municipio' => 'desc','Journeys.date'=>'DESC'],
                'contain'=>['Requests'],
                'limit'=>100,
            ]);

        } else {

            $journeys = $this->paginate($this->Journeys,
            [
                'order'=>['Journeys.municipio' => 'desc','Journeys.date'=>'DESC'],
                'contain'=>['Requests'],
                'limit'=>100,
                'conditions'=>['Journeys.municipio'=>$this->request->data('municipios')]
            ]);


        }


        // $journeys = $this->Journeys->find()
        // ->contain('Requests')
        // ->order(['Journeys.municipio' => 'ASC']);

    //     $journeys = $this->Journeys->find('all', [
    //         'fields' => [
    //             'id' => 'Users.id',
    //             'municipio' => 'firstname',
    //             'ubicacion' => 'lastname',
    //             'count_games' => 'COUNT(games.id)'
    //         ],
    //         'join' => [
    //             'table' => 'games',
    //             'type' => 'LEFT',
    //             'conditions' => 'games.created_by = Users.id'
    //         ],
    //         'group' => ['Users.id'],
    // ]);
    // debug( $this->Paginator->sort('municipio'));

        $this->set(compact('journeys'));

        $municipios = array('Todos'=>'Todos','Mexicali'=>'Mexicali','Tijuana'=>'Tijuana','Ensenada'=>'Ensenada','Tecate'=>'Tecate','Playas de Rosarito'=>'Playas de Rosarito');
        $this->set(compact('municipios'));
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
            'contain' => ['Requests','Requests.Petitioners','Requests.requeststatuses','Works','Requests.activities' => function ($q) {
                return $q->select(
                    [
                        
                        'request_id',
                        'cantidad' => $q->func()->count('*')
                   ])
                   ->group(['request_id']);
               }],
        ]);

        $this->set('journey', $journey);

        /* EMPIEZO A OBTENER LA INFORMACION PARA EL REPORTE DE SOLICITUDES DE LA JORNADA */

        // TOTAL DE SOLICITUDES
        $this->loadModel('Requests');
        $request = $this->Requests->find('all', ['conditions' => ['journey_id' =>$id]]);
        $total_solicitudes = count($request->toArray());
        // debug($request->toArray());




        // TOTAL DE PETICIONES
        $this->loadModel('Activities');
        $activities = $this->Activities->find('all', [
            'conditions' => ['Activities.journey_id' =>$id],
            'contain'=> ['Requests','Concepts','dependencies'],
        ]);
        
        $total_peticiones = count($activities->toArray());

        // PETICIONES ORDENADAS POR CATEGORIA
        $activities->order(['concept_id'=>'DESC']);

        // TOTAL DE PETICIONES TURNADAS
        $peticionesTurnadas = $activities->match(['status' => 'turnada']);
        $total_peticionesTurnadas = count($peticionesTurnadas->toArray());
        
        // TOTAL DE PETICIONES ATENDIDAS
        $peticionesAtendidas = $activities->match(['status' => 'atendida']);
        $total_peticionesAtendidas = count($peticionesAtendidas->toArray());

        $this->set(compact('total_solicitudes','total_peticiones','municipios','total_peticionesTurnadas','total_peticionesAtendidas'));

        

        $pavimentaciones = $activities->match(['concept_id' => '25']);
        $espaciosPublicos = $activities->match(['concept_id' => '30']);
        $regularizaciones = $activities->match(['concept_id' => '29']);
       
        $otros = $activities->filter(function ($value, $key) {
            return $value->concept_id != 25 && $value->concept_id != 30 && $value->concept_id != 29;
        });

        $this->set(compact('pavimentaciones','espaciosPublicos','regularizaciones','otros'));

        $totalPavimentaciones = count($pavimentaciones->toArray());
        $totalEspaciosPublicos = count($espaciosPublicos->toArray());
        $totalRegularizaciones = count($regularizaciones->toArray());
        $totalOtros = count($otros->toArray());      
        
        $this->set(compact('totalPavimentaciones','totalEspaciosPublicos','totalRegularizaciones','totalOtros'));


        $actividades = $this->Activities->find();
        $actividades->contain(['Concepts','Requests.Journeys']);

        $actividades->select(['mun'=>'journeys.municipio', 
                            'jornada'=>'journeys.ubicacion',
                            'id'=>'journeys.id',
                            'concepto'=>'concepts.name',
                            'concepto_id'=>'concepts.id',
                            'cantidad' => $actividades->func()->count('*'),
                            'fecha'=>'journeys.date',]);
        
        $actividades->where(['journeys.id' => $id]);  
        $actividades->group(['activities.concept_id']);
        $actividades->group(['jornada']);
        $actividades->order(['jornada'=>'DESC']);




        
        $this->set(compact('actividades','fechaUltimaJornada')); 



      

        // $requestsGobConFolio = $this->Requests->find('all', ['conditions' => ['journey_id' =>$id,'gobernador'=>'1','folio IS NOT NULL']]);
        // $GobernadorConFolio = $requestsGobConFolio->match(['gobernador' => '1']);
        // $total_solicitudes = count($request->toArray());                    // Obtengo el total de solicitudes en la jornada
        // $SolicitudesNormales = $request->match(['gobernador' => '']);
        // $SolicitudesGobernador = $request->match(['gobernador' => '1']);
        // $GobernadorSinFolio = $SolicitudesGobernador->match(['folio' => '','folio'=>null]);
        // debug($activities->toArray());
        // debug(count($peticionesAtendidas->toArray()));
        // $this->set(compact('total_solicitudes','total_peticiones','municipios','SolicitudesGobernador','GobernadorSinFolio','GobernadorConFolio', 'SolicitudesNormales'));


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()

    {
        $journey = $this->Journeys->newEntity();

        $journey->date = $this->request->data('fecha');
        $journey->horatermino = $this->request->data('termino');
        $journey->horainicio = $this->request->data('inicio');

        if ($this->request->is('post')) {
            $journey = $this->Journeys->patchEntity($journey, $this->request->getData());
            if ($this->Journeys->save($journey)) {
                $this->Flash->success(__('The journey has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                debug($this->validationErrors);

            }
            $this->Flash->error(__('The journey could not be saved. Please, try again.'));
        }
        $municipios = array('Mexicali'=>'Mexicali','Tijuana'=>'Tijuana','Ensenada'=>'Ensenada','Tecate'=>'Tecate','Playas de Rosarito'=>'Playas de Rosarito');

        $this->set(compact('journey','municipios'));




        $gobernador =array('0' =>'NO','1'=>'SI');

        $this->set(compact('journeys','gobernador'));
    
 
    
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

            $journey->date = $this->request->data('fecha');
            $journey->horatermino = $this->request->data('termino');
            $journey->horainicio = $this->request->data('inicio');

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
