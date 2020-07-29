<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// Prior to 3.6 use Cake\Network\Exception\NotFoundException
use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Error de acceso, intenta de nuevo'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
     

    public function isAuthorized($user)
    {
        if ( isset($user['role']) and $user['role'] == "Administrador" ) {

        if(in_array($this->request->action, ['dashboard','index','view']))
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

        if(in_array($this->request->action, ['dashboard','index','view']))
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

        if(in_array($this->request->action, ['dashboard','index','view','edit']))
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

        if(in_array($this->request->action, ['dashboard','index','view','edit','results']))
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

    if ( isset($user['role']) and $user['role'] == "Responsable" ) {

        if(in_array($this->request->action, ['dashboard']))
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

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function dashboard()
    {
        $this->loadModel("journeys");
        $this->loadModel("requests");
        $this->loadModel("requestupdates");
        $this->loadModel("activities");
        $this->set('users', $this->Users->find('all'));
        // $this->set('userrole', $this->Auth->user('role'));

        // debug( $this->Auth->user('role') );
        switch($this->Auth->user('role'))
        {
            case 'Capturista': 
                // Elementos necesarios para el dashboard del capturista

                // Listado de jornadas sin solicitudes capturadas

                        // SELECT journeys.id,journeys.ubicacion
                        // FROM journeys journeys
                        // LEFT JOIN requests requests ON requests.journey_id = journeys.id
                        // WHERE requests.id IS NULL

                $jornadas = $this->journeys->find();
                $jornadas->leftJoinWith('requests');
                $jornadas->select(['id'=>'journeys.id','jornada'=>'journeys.ubicacion','fecha'=>'journeys.date']);
                $jornadas->where(['requests.id IS '=>null]);
                $jornadas->order(['journeys.id'=>'DESC']);
                $jornadas->limit(4);
                $this->set(compact('jornadas'));
                
                // // Listado de ultimas solicitudes capturadas
                $requests = $this->requests->find();
                $requests->order(['requests.id'=>'DESC']);
                $requests->contain(['journeys','petitioners']);
                $requests->limit(10);
                // debug($requests->toArray());
                $this->set(compact('requests'));                  
            break;

            case 'Coordinador': 
               
                // Elementos necesarios para el dashboard del coordinador

                // Listado de solicitudes sin categorizar
                // $solicitudes = $this->requests->find()->innerJoinWith('Journeys');
                // $solicitudes->select(['jornada'=>'journeys.ubicacion','cantidad' => $solicitudes->func()->count('*'),'fecha'=>'journeys.date']);
                // $solicitudes->where(['requests.request_status_id' => 1]);
                // $solicitudes->group(['requests.journey_id']);
                // $solicitudes->order(['cantidad'=>'DESC']);
                // $solicitudes->limit(5);
                // $this->set(compact('solicitudes'));

                // Listado de solicitudes sin categorizar
                // $prueba = $this->journeys->find()->leftJoinWith('activities');
                // $prueba->select(['jornada'=>'journeys.ubicacion','cantidad' => $prueba->func()->count('*')]);
                
                // $prueba->group(['journeys.id']);


                $solicitudes = $this->journeys->find()->group(['id']);
                $solicitudes = $solicitudes ->
                $solicitudes = $solicitudes ->join([
                    'activities' => [
                        'table' => 'activities',
                        'type' => 'LEFT',
                        'conditions' => 'journeys.id = activities.journey_id',
                    ]
                ])
                ->where(['activities.id IS '=>null])
                ->select(['id'=>'journeys.id','jornada'=>'journeys.ubicacion','cantidad' => $solicitudes->func()->count('*'),'fecha'=>'journeys.date'])
                ->order(['cantidad'=>'DESC'])
                ->limit(5);
                $this->set(compact('solicitudes'));

                // debug($solicitudes->toArray());




                // Listado de ultimas actualizaciones
                $updates = $this->requestupdates->find()->innerJoinWith('Requests');
                $updates->order(['requestupdates.modified'=>'DESC']);
                $updates->limit(5);
                $this->set(compact('updates')); 
                
                // $actividades = $this->activities->find();
                // $actividades->select(['jornada'=>'journeys.ubicacion','concepto'=>'concepts.name','cantidad' => $actividades->func()->count('*'),'fecha'=>'journeys.date']);
                // $actividades->contain(['Concepts','Requests.Journeys']);
                // $actividades->where(['Requests.journey_id' => 13]);
                // $actividades->group(['activities.concept_id']);
                // debug($actividades->toarray());
                    
            break;
            case 'Secretaria': 
                // Elementos necesarios para el dashboard de la secretaria

                $jornadas = $this->journeys->find();
                $jornadas->select(['id'=>'journeys.id','fecha'=>'journeys.date']);
                $jornadas->order(['journeys.date'=>'DESC']);
                $jornadas->first();                
                $fechaUltimaJornada = $jornadas->toArray();       
                $fechaUltimaJornada = $fechaUltimaJornada['0']['fecha'];

                $actividades = $this->activities->find();
                $actividades->contain(['Concepts','Requests.Journeys']);

                $actividades->select(['mun'=>'journeys.municipio', 
                                    'jornada'=>'journeys.ubicacion',
                                    'id'=>'journeys.id',
                                    'concepto'=>'concepts.name',
                                    'concepto_id'=>'concepts.id',
                                    'cantidad' => $actividades->func()->count('*'),
                                    'fecha'=>'journeys.date',]);
                
                $actividades->where(['journeys.date' => date_format($fechaUltimaJornada, 'Y-m-d')]);  
                $actividades->group(['activities.concept_id']);
                $actividades->group(['jornada']);
                $actividades->order(['jornada'=>'DESC']);
                // $actividades->order(['jornada'=>'DESC']);
                // debug($actividades->toarray());
                $this->set(compact('actividades','fechaUltimaJornada')); 
                // debug($actividades->toarray());                
            break;

            case 'Responsable': 
                // Elementos necesarios para el dashboard del responsable del seguimiento
                
                $responsableID = $this->Dependencies->find('all', ['conditions' => ['user_id'=>$this->Auth->user('id')]])->first();

                //debug($responsableID);

                $actividades = $this->activities->find();
                $actividades->contain(['Concepts','Requests.Petitioners','Requests.Journeys','Journeys']);
                $actividades->where(['dependency_id' => $responsableID->id ]);  

                // $actividades->select(['mun'=>'journeys.municipio', 
                //                     'jornada'=>'journeys.ubicacion',
                //                     'id'=>'journeys.id',
                //                     'concepto'=>'concepts.name',
                //                     'concepto_id'=>'concepts.id',
                //                     'cantidad' => $actividades->func()->count('*'),
                //                     'fecha'=>'journeys.date',]);
                
                
                // $actividades->group(['activities.concept_id']);
                // $actividades->group(['jornada']);
                // $actividades->order(['jornada'=>'DESC']);
                // $actividades->order(['jornada'=>'DESC']);
                // debug($actividades->toarray());
                $this->set(compact('actividades')); 
           
            break;            

        }
    }

    public function results()
    {
        // debug($this->request->data('searchkey'));
        $this->loadModel("journeys");
        $this->loadModel("requests");
        $this->loadModel("requestupdates");
        $this->loadModel("activities");
        $this->loadModel("petitioners");

        // BUSQUEDA POR FOLIO
        $folios = $this->requests->find();
        $folios->where(['requests.folio' =>$this->request->data('searchkey')]);  
        $folios->order(['requests.folio'=>'DESC']);
        $folios->contain(['journeys','petitioners']);
        $this->set(compact('folios'));   

        // BUSQUEDA POR NOMBRE DEL SOLICITANTE
        $nombres = $this->requests->find()->innerJoinWith('Petitioners');
        $nombres->where(['petitioners.name LIKE' => "%".$this->request->data('searchkey')."%"]);
        $nombres->contain(['journeys','petitioners']);
        // debug($nombres->toArray());
        $this->set(compact('nombres'));

        // BUSQUEDA POR SOLICITUD
        $solicitud = $this->requests->find();
        $solicitud->where(['requests.description LIKE' => "%".$this->request->data('searchkey')."%"]);
        $solicitud->contain(['journeys','petitioners']);
        // debug($solicitud->toArray());
        $this->set(compact('solicitud'));

    }
// 
}
