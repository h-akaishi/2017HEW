<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
        'authenticate' => [
            'Form' => [
                'fields' => [
                    'username' => 'user_mail',
                    'password' => 'password'
                ]
            ]
        ],
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login'
        ],
        'loginRedirect' => [
            'controller' => 'Users',
            'action' => 'index'
        ]
    ]);

        $countcart = TableRegistry::get('MyCarts');

      $countId = $this->request->session()->read('Auth.User.id');
      $countCart = $countcart->find()->where(['user_id' => $countId])->count('id');
      $this->set(compact('countCart','countId'));   
    }
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        if($this->Auth->User('rule') != 'admin'){
            return $this->redirect(['action' => 'mypage/'.$this->Auth->User('id')]);
        }

        $this->viewBuilder()->layout('admin');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('basic');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('保存しました。'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('保存に失敗しました。 もう一度やり直してください。'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('変更しました。'));
                $page = "/".$user['id'];
                return $this->redirect(['action' => 'mypage'.$page]);
            } else {
                $this->Flash->error(__('変更に失敗しました。もう一度やり直してください。'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度やり直してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                if(empty($this->protectAuthRedirect)){
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    /*$page = "/".$user['id'];
                    return $this->redirect(['action' => 'mypage'.$page]);*/
                    return $this->redirect(['action' => 'index']);
                }


            }
            $this->Flash->error('ユーザー名かパスワードが間違っています');
        }
    }
    public function logout()
    {
        $this->Flash->success('ログアウトしました');
        return $this->redirect($this->Auth->logout());
    }

    public function mypage($id = null)
    {
        $this->viewBuilder()->layout('mypage');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add_product()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('保存しました。'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('保存に失敗しました。 もう一度やり直してください。'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function adminIndex()
    {
        $this->viewBuilder()->layout('admin');
        $order = TableRegistry::get('Orders');
        $user = TableRegistry::get('Users');


        $cCart = $order->find()->count('id');
        $cUser = $user->find()->count('id');


        $this->set(compact('cCart','cUser'));
        
    }

}
