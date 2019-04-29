<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Performances Controller
 *
 * @property \App\Model\Table\PerformancesTable $Performances
 *
 * @method \App\Model\Entity\Performance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PerformancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Providers', 'Locations', 'Metrics']
        ];
        $performances = $this->paginate($this->Performances);

        $this->set(compact('performances'));
    }

    /**
     * View method
     *
     * @param string|null $id Performance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $performance = $this->Performances->get($id, [
            'contain' => ['Providers', 'Locations', 'Metrics']
        ]);

        $this->set('performance', $performance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $performance = $this->Performances->newEntity();
        if ($this->request->is('post')) {
            $performance = $this->Performances->patchEntity($performance, $this->request->getData());
            if ($this->Performances->save($performance)) {
                $this->Flash->success(__('The performance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The performance could not be saved. Please, try again.'));
        }
        $providers = $this->Performances->Providers->find('list');
        $locations = $this->Performances->Locations->find('list', ['limit' => 200]);
        $metrics = $this->Performances->Metrics->find('list', ['limit' => 200]);
        $this->set(compact('performance', 'providers', 'locations', 'metrics'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Performance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $performance = $this->Performances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $performance = $this->Performances->patchEntity($performance, $this->request->getData());
            if ($this->Performances->save($performance)) {
                $this->Flash->success(__('The performance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The performance could not be saved. Please, try again.'));
        }
        $providers = $this->Performances->Providers->find('list');
        $locations = $this->Performances->Locations->find('list', ['limit' => 200]);
        $metrics = $this->Performances->Metrics->find('list', ['limit' => 200]);
        $this->set(compact('performance', 'providers', 'locations', 'metrics'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Performance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $performance = $this->Performances->get($id);
        if ($this->Performances->delete($performance)) {
            $this->Flash->success(__('The performance has been deleted.'));
        } else {
            $this->Flash->error(__('The performance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
