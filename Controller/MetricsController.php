<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Metrics Controller
 *
 * @property \App\Model\Table\MetricsTable $Metrics
 *
 * @method \App\Model\Entity\Metric[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MetricsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $metrics = $this->paginate($this->Metrics);

        $this->set(compact('metrics'));
    }

    /**
     * View method
     *
     * @param string|null $id Metric id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metric = $this->Metrics->get($id, [
            'contain' => ['Performances', 'SpecificMetrics', 'SpecificMetrics.ServiceLines']
        ]);

        $this->set('metric', $metric);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metric = $this->Metrics->newEntity();
        if ($this->request->is('post')) {
            $metric = $this->Metrics->patchEntity($metric, $this->request->getData());
            if ($this->Metrics->save($metric)) {
                $this->Flash->success(__('The metric has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metric could not be saved. Please, try again.'));
        }
        $this->set(compact('metric'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Metric id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metric = $this->Metrics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metric = $this->Metrics->patchEntity($metric, $this->request->getData());
            if ($this->Metrics->save($metric)) {
                $this->Flash->success(__('The metric has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metric could not be saved. Please, try again.'));
        }
        $this->set(compact('metric'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Metric id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $metric = $this->Metrics->get($id);
        if ($this->Metrics->delete($metric)) {
            $this->Flash->success(__('The metric has been deleted.'));
        } else {
            $this->Flash->error(__('The metric could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
