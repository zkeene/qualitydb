<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ThresholdColors Controller
 *
 * @property \App\Model\Table\ThresholdColorsTable $ThresholdColors
 *
 * @method \App\Model\Entity\ThresholdColor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThresholdColorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $thresholdColors = $this->paginate($this->ThresholdColors);

        $this->set(compact('thresholdColors'));
    }

    /**
     * View method
     *
     * @param string|null $id Threshold Color id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $thresholdColor = $this->ThresholdColors->get($id, [
            'contain' => ['SpecificMetricThresholds', 'SpecificMetricThresholds.SpecificMetrics.ServiceLines', 'SpecificMetricThresholds.SpecificMetrics.Metrics', 'SpecificMetricThresholds.Messages']
        ]);

        $this->set('thresholdColor', $thresholdColor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $thresholdColor = $this->ThresholdColors->newEntity();
        if ($this->request->is('post')) {
            $thresholdColor = $this->ThresholdColors->patchEntity($thresholdColor, $this->request->getData());
            if ($this->ThresholdColors->save($thresholdColor)) {
                $this->Flash->success(__('The threshold color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The threshold color could not be saved. Please, try again.'));
        }
        $this->set(compact('thresholdColor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Threshold Color id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $thresholdColor = $this->ThresholdColors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thresholdColor = $this->ThresholdColors->patchEntity($thresholdColor, $this->request->getData());
            if ($this->ThresholdColors->save($thresholdColor)) {
                $this->Flash->success(__('The threshold color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The threshold color could not be saved. Please, try again.'));
        }
        $this->set(compact('thresholdColor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Threshold Color id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thresholdColor = $this->ThresholdColors->get($id);
        if ($this->ThresholdColors->delete($thresholdColor)) {
            $this->Flash->success(__('The threshold color has been deleted.'));
        } else {
            $this->Flash->error(__('The threshold color could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
