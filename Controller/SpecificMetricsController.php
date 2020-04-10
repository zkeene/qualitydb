<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SpecificMetrics Controller
 *
 * @property \App\Model\Table\SpecificMetricsTable $SpecificMetrics
 *
 * @method \App\Model\Entity\SpecificMetric[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecificMetricsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->redirect(['controller'=>'ServiceLines', 'action'=>'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Specific Metric id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specificMetric = $this->SpecificMetrics->get($id, [
            'contain' => ['ServiceLines', 'Metrics', 'SpecificMetricThresholds'=>['sort'=>['SpecificMetricThresholds.quarter'=>'ASC','SpecificMetricThresholds.threshold'=>'ASC']], 'SpecificMetricThresholds.Messages', 'SpecificMetricThresholds.ThresholdColors']
        ]);

        $this->set('specificMetric', $specificMetric);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($service_line_id = null)
    {
        $specificMetric = $this->SpecificMetrics->newEntity();
        if ($this->request->is('post')) {
            $specificMetric = $this->SpecificMetrics->patchEntity($specificMetric, $this->request->getData());
            if ($this->SpecificMetrics->save($specificMetric)) {
                $this->Flash->success(__('The specific metric has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specific metric could not be saved. Please, try again.'));
        }
        $serviceLines = $this->SpecificMetrics->ServiceLines->find('list', ['limit' => 200]);
        $metrics = $this->SpecificMetrics->Metrics->find('list', ['limit' => 200]);
        $this->set(compact('specificMetric', 'serviceLines', 'metrics', 'service_line_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Specific Metric id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specificMetric = $this->SpecificMetrics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specificMetric = $this->SpecificMetrics->patchEntity($specificMetric, $this->request->getData());
            if ($this->SpecificMetrics->save($specificMetric)) {
                $this->Flash->success(__('The specific metric has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specific metric could not be saved. Please, try again.'));
        }
        $serviceLines = $this->SpecificMetrics->ServiceLines->find('list', ['limit' => 200]);
        $metrics = $this->SpecificMetrics->Metrics->find('list', ['limit' => 200]);
        $this->set(compact('specificMetric', 'serviceLines', 'metrics'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Specific Metric id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specificMetric = $this->SpecificMetrics->get($id);
        if ($this->SpecificMetrics->delete($specificMetric)) {
            $this->Flash->success(__('The specific metric has been deleted.'));
        } else {
            $this->Flash->error(__('The specific metric could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'ServiceLines', 'action'=>'view', $SpecificMetrics->service_line_id]);
    }
}
