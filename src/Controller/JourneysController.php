<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Journeys Controller
 *
 * @property \App\Model\Table\JourneysTable $Journeys
 *
 * @method \App\Model\Entity\Journey[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JourneysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $journeys = $this->paginate($this->Journeys);

        $this->set(compact('journeys'));
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
            'contain' => ['Requests','Requests.Petitioners','Requests.requeststatuses'],
        ]);

        $this->set('journey', $journey);
       
        /* EMPIEZO A OBTENER LA INFORMACION PARA EL REPORTE DE SOLICITUDES DE LA JORNADA */

        $this->loadModel('Requests');
        
        $requests = $this->Requests->find('all', ['conditions' => ['journey_id' =>$id]]);

        $total_solicitudes = count($requests->toArray());                    // Obtendo el total de solicitudes en la jornada
        
        $requestsByStatus = $requests->countBy('request_status_id');
        
        $this->set('requestsByStatus', $requestsByStatus);

        $this->set(compact('total_solicitudes'));
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
