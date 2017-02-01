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
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                /*return $this->redirect($this->Auth->redirectUrl());*/
                $page = "/".$user['id'];
            return $this->redirect(['action' => 'mypage'.$page]);


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

}
