<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Loans Controller
 *
 * @property \App\Model\Table\LoansTable $Loans
 */
class LoansController extends AppController
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
				'loans.lendee_id' => $this->Auth->user('id')
				]
        ];
		$loans = $this->paginate($this->Loans);
        $this->set(compact('loans'));
        $this->set('_serialize', ['loans']);
    }

    /**
     * View method
     *
     * @param string|null $id Loan id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Users', 'Lendees', 'Collaterials', 'Collaterial']
        ]);
        $this->set('loan', $loan);
        $this->set('_serialize', ['loan']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
        $loan = $this->Loans->newEntity();
		$loan->lendee_id = $this->Auth->user('id');
        if ($this->request->is('post')) {
			// add collaterial to loan
			$collaterial = TableRegistry::get('collaterial')->find('list')->where(['user_id' => $loan->user_id])->toArray();
			$loan->collaterial_id = $collaterial->id;
		
			// patch entity.
			$loan = $this->Loans->patchEntity($loan, $this->request->data);
			       	
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('Your loan request has been made.'));
				
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            }
        }
		// prepare template
		
		$collaterial = TableRegistry::get('collaterial')->find('list')->where(['user_id' => $this->Auth->user('id')])->toArray();
		// set variables
		$this->set(['user_id' => $loan->user_id, 'collaterial' => compact('collaterial')]);
	
	
	}

    /**
     * Edit method
     *
     * @param string|null $id Loan id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Collaterial']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loan = $this->Loans->patchEntity($loan, $this->request->data);
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            }
        }
        $users = $this->Loans->Users->find('list', ['limit' => 200]);
        $lendees = $this->Loans->Lendees->find('list', ['limit' => 200]);
        $collaterials = $this->Loans->Collaterial->find('list', ['limit' => 200]);
        $collaterial = $this->Loans->Collaterial->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'users', 'lendees', 'collaterials', 'collaterial'));
        $this->set('_serialize', ['loan']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loan = $this->Loans->get($id);
        if ($this->Loans->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	public function isAuthorized($user)
{
    $action = $this->request->params['action'];

    // The add and index actions are always allowed.
    if (in_array($action, ['index', 'add'])) {
        return true;
    }
   
    // Check that the loan belongs to the user
    $id = $this->request->params['pass'][0];
    $loan = $this->Loan->get($id);
    if ($loan->user_id == $user['id']) {
        return true;
    }
    return parent::isAuthorized($user);
}

}
