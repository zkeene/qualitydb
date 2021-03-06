<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SpecificMetricThresholds Controller
 *
 * @property \App\Model\Table\SpecificMetricThresholdsTable $SpecificMetricThresholds
 *
 * @method \App\Model\Entity\SpecificMetricThreshold[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecificMetricThresholdsController extends AppController
{

    /**
     * Index method redirect to Service Line index
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
     * @param string|null $id Specific Metric Threshold id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specificMetricThreshold = $this->SpecificMetricThresholds->get($id, [
            'contain' => ['SpecificMetrics', 'Messages', 'ThresholdColors', 'SpecificMetrics.ServiceLines', 'SpecificMetrics.Metrics']
        ]);

        $this->set('specificMetricThreshold', $specificMetricThreshold);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($specific_metric_id = null)
    {
        $specificMetricThreshold = $this->SpecificMetricThresholds->newEntity();
        if ($this->request->is('post')) {
            $specificMetricThreshold = $this->SpecificMetricThresholds->patchEntity($specificMetricThreshold, $this->request->getData());
            if ($this->SpecificMetricThresholds->save($specificMetricThreshold)) {
                $this->Flash->success(__('The specific metric threshold has been saved.'));

                return $this->redirect(['controller'=>'SpecificMetrics', 'action'=>'view', $specificMetricThreshold->specific_metric_id]);
            }
            $this->Flash->error(__('The specific metric threshold could not be saved. Please, try again.'));
        }
        $specificMetrics = $this->SpecificMetricThresholds->SpecificMetrics->find('all')->contain(['ServiceLines','Metrics']);
        $messages = $this->SpecificMetricThresholds->Messages->find('list', ['limit' => 200]);
        $thresholdColors = $this->SpecificMetricThresholds->ThresholdColors->find('list', ['limit' => 200]);
        $this->set(compact('specificMetricThreshold', 'specificMetrics', 'messages', 'thresholdColors', 'specific_metric_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Specific Metric Threshold id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specificMetricThreshold = $this->SpecificMetricThresholds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specificMetricThreshold = $this->SpecificMetricThresholds->patchEntity($specificMetricThreshold, $this->request->getData());
            if ($this->SpecificMetricThresholds->save($specificMetricThreshold)) {
                $this->Flash->success(__('The specific metric threshold has been saved.'));
                return $this->redirect(['controller'=>'SpecificMetrics', 'action'=>'view', $specificMetricThreshold->specific_metric_id]);
            }
            $this->Flash->error(__('The specific metric threshold could not be saved. Please, try again.'));
        }
        $specificMetrics = $this->SpecificMetricThresholds->SpecificMetrics->find('all')->contain(['ServiceLines','Metrics']);
        $messages = $this->SpecificMetricThresholds->Messages->find('list');
        $thresholdColors = $this->SpecificMetricThresholds->ThresholdColors->find('list');
        $this->set(compact('specificMetricThreshold', 'specificMetrics', 'messages', 'thresholdColors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Specific Metric Threshold id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specificMetricThreshold = $this->SpecificMetricThresholds->get($id);
        if ($this->SpecificMetricThresholds->delete($specificMetricThreshold)) {
            $this->Flash->success(__('The specific metric threshold has been deleted.'));
        } else {
            $this->Flash->error(__('The specific metric threshold could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'SpecificMetrics', 'action'=>'view', $specificMetricThreshold->specific_metric_id]);
    }
}
