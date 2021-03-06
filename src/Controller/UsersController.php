<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Deposits']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
		$user->role = "User";
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Deposits']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $deposits = $this->Users->Deposits->find('list', ['limit' => 200]);
        $this->set(compact('user', 'deposits'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
		
public function login()
{
    if ($this->request->is('post')) {
			// authenticate and identify user
			 $user = $this->Auth->identify();
					
			 if($user) { // sucessful login
			 $this->Auth->setUser($user);
			 
			 return $this->redirect(['action' => 'home']);
			 }
			 return $this->Flash->error('Your username or password is incorrect');
			 
			}
				
	
	}
	public function logout() {
		$this->Flash->success('You are now logged out');
		return $this->redirect($this->Auth->logout());	
	}
public function beforeFilter(\Cake\Event\Event $event)
{
    $this->Auth->allow(['add', 'home']);
}

	public function isAuthorized($user) {
		// admins are always allowed to access every action
		if(isset($user['role']) && $user['role'] == 'admin') {
			return true;
		}
		// allow users to edit their own profile
		if($this->request->params['action'] === 'edit') {
			if($this->request->params[0] === $this->Auth->users('id')) {
			return true;
			} else {
				return false;
			}
		}
		return parent::isAuthorized($user);
	}
	public function home() {
		if($this->Auth->user()) {
			$this->set('loggedin', true);
		} else {
			$this->set('loggedin', false);
		}
		$this->set('title', 'Home');
		$this->set('user_id', $this->Auth->user('id'));
		$this->render('sitehome');
	
	
	}
	public function validationDefault(Validator $validator) {
		$validator->notEmpty('Location')->requirePresence('Location')->notEmpty('Country')->requirePresence('Country')->notEmpty('Phone')->requirePresence('Phone')->notEmpty('Identification')->requirePresence('Identification')->requirePresence('Type');
		return $validator;
	}
	
}
