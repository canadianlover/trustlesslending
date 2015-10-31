<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Collaterial Controller
 *
 * @property \App\Model\Table\CollaterialTable $Collaterial
 */
class CollaterialController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
    $this->paginate = [
        'conditions' => [
            'collaterial.user_id' => $this->Auth->user('id'),
        ]
    ];
    $this->set('collaterial', $this->paginate($this->Collaterial));
	$this->set('_serialize', ['collaterial']);
	$this->set('username', $this->Auth->user('username'));
    }

    /**
     * View method
     *
     * @param string|null $id Collaterial id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collaterial = $this->Collaterial->get($id, [
            'contain' => ['Loans']
        ]);
        $this->set('collaterial', $collaterial);
        $this->set('_serialize', ['collaterial']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collaterial = $this->Collaterial->newEntity();
        if ($this->request->is('post')) {
			// set up collaterial values
			$collaterial->type = $this->request->data['type'];
			$collaterial->user_id = $this->Auth->user('id');
			
			$collaterial->details = $this->request->data['details'];
			$colaterial = $this->Collaterial->patchEntity($collaterial, $this->request->data());
	            if ($this->Collaterial->save($collaterial)) {
                $this->Flash->success(__('Your collaterial record has been submitted. Please wait until a site administrator approves the collaterial before it can be used for a loan'));
                return $this->redirect(['action' => 'index']);
            } else {
                //$this->Flash->error(__('The collaterial could not be saved. Please, try again.'));
				debug($collaterial);
            }
        }
		
		$escrow = TableRegistry::get('users')->find('list')->where(
		['role' => 'escrow'])->orWhere(['role' => 'admin'])->toArray();
        $this->set(compact('escrow'));
        $this->set('_serialize', ['collaterial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Collaterial id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collaterial = $this->Collaterial->get($id, [
            'contain' => ['Loans']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collaterial = $this->Collaterial->patchEntity($collaterial, $this->request->data);
            if ($this->Collaterial->save($collaterial)) {
                $this->Flash->success(__('The collaterial has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The collaterial could not be saved. Please, try again.'));
            }
        }
        $loans = $this->Collaterial->Loans->find('list', ['limit' => 200]);
        $this->set(compact('collaterial', 'loans'));
        $this->set('_serialize', ['collaterial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Collaterial id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collaterial = $this->Collaterial->get($id);
        if ($this->Collaterial->delete($collaterial)) {
            $this->Flash->success(__('The collaterial has been deleted.'));
        } else {
            $this->Flash->error(__('The collaterial could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function isAuthorized($user) {
		// all registered users can add new collaterial or access the collateral controller's index page
		if(in_array($this->request->action, ['add', 'index'])) {
			return true;	
		}
		// the owner of collaterial can edit or delete details
		if(in_array($this->request->action, ['edit', 'delete'])) {
			// check ownership
			$collaterialId = (int)$this->request->params['pass'][0];
			if($this->Collaterial->isOwnedBy($collaterialId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
	
}
