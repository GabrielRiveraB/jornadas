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
            $this->Flash->error(__('Invalid username or password, try again'));
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
        $this->set('users', $this->Users->find('all'));
        // $this->set('userrole', $this->Auth->user('role'));

        // debug( $this->Auth->user('role') );
        switch($this->Auth->user('role'))
        {
            case 'Capturista': 
                // Elementos necesarios para el dashboard del capturista
            break;
            case 'Coordinador': 
               
                // Elementos necesarios para el dashboard del coordinador

                // Listado de solicitudes sin categorizar
                $solicitudes = $this->requests->find()->innerJoinWith('Journeys');
                $solicitudes->select(['jornada'=>'journeys.ubicacion','cantidad' => $solicitudes->func()->count('*'),'fecha'=>'journeys.date']);
                $solicitudes->where(['requests.request_status_id' => 1]);
                $solicitudes->group(['requests.journey_id']);
                $solicitudes->order(['cantidad'=>'DESC']);
                $solicitudes->limit(5);
                $this->set(compact('solicitudes'));
                    
            break;
            case 'Secretaria': 
                // Elementos necesarios para el dashboard de la secretaria
            break;

        }
    }

}
