<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{


    public function initialize()
    {
      parent::initialize();
      $this->loadComponent('Cookie');
      $this->loadComponent('Flash');
      $countcart = TableRegistry::get('MyCarts');

      $countId = $this->request->session()->read('Auth.User.id');
      $countCart = $countcart->find()->where(['user_id' => $countId])->count('id');
      $this->set(compact('countCart'));      
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $this->paginate = [
            'contain' => ['ItemTypes']
        ];
        $items = $this->paginate($this->Items);

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['ItemTypes', 'ItemImgs']
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $itemimg = TableRegistry::get('ItemImgs');
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
             $tmp_name = $item['item_img']['tmp_name'];
            if(!empty($tmp_name)){
                $file_name = md5(uniqid(rand(), 1));
                if($item['item_img']['type'] == 'image/png'){
                    $extension = '.png';
                }elseif ($item['item_img']['type'] == 'image/jpeg') {
                    $extension = '.jpg';
                }elseif($item['item_img']['type'] == 'image/gif'){
                    $extension = '.gif';
                }else{
                    $errMes = '画像以外のファイルはアップロードできません。';
                    $bool = false;
                }
                if($item['item_img']['size'] > 10485760){
                    $errMes = 'ファイルのサイズが大きすぎます。';
                    $bool = false;
                }
                if(!isset($errMes)){
                    $imageUrl =  WWW_ROOT.'img'.DS.'itemimg'.DS.$file_name.$extension;
                    $imageName = $file_name.$extension;
                    $bool = move_uploaded_file($item['item_img']['tmp_name'], $imageUrl);
                }
            }else{
                $bool = true;
            }
            if ($bool && !isset($errMes)) {
                if ($this->Items->save($item)) {
                    if(isset($imageUrl)){
                    $imgData[] = ['item_id' => $item->id, 'item_url' => $imageName];
                    $query = $itemimg->query()->insert(['item_id','item_url']);
                    foreach ($imgData as $image) {
                        $query->values($image);
                    }
                    $query->execute();
                    }
                    $this->Flash->success(__('保存しました。'));

                    return $this->redirect(['action' => 'index']);
                } 
            }else if(isset($errMes)){
                $this->Flash->error(__('保存に失敗しました。'.$errMes));
            }else {
                $this->Flash->error(__('保存に失敗しました。 もう一度やり直してください。'));
            }
        }
        
        $itemTypes = $this->Items->ItemTypes->find('list', ['valueField' => 'type_name','limit' => 200]);
        $this->set(compact('item', 'itemTypes'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $itemTypes = $this->Items->ItemTypes->find('list', ['limit' => 200]);
        $this->set(compact('item', 'itemTypes'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function viewAll()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 1]));
        if ($this->request->is('post')) {
            $word = $this->request->data['q'];
            $items = $this->paginate($this->Items->find()->where(['item_name LIKE' => '%'.$word.'%']));
        }


        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function viewDog()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 1]));
        if ($this->request->is('post')) {
            $word = $this->request->data['q'];
            $items = $this->paginate($this->Items->find()->where(['item_name LIKE' => '%'.$word.'%']));
        }


        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function viewCat()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 2]));

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function viewBird()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 4]));

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function viewFish()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 3]));

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function viewReptile()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 5]));

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function viewOther()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $this->viewBuilder()->layout('basic');
        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs']
        ];
        $items = $this->paginate($this->Items->find()->where(['item_type_id' => 6]));


        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function itemDetail($id = null)
    {
        $this->viewBuilder()->layout('basic');
        $myCart = TableRegistry::get('MyCarts');
        $cartData = $myCart->newEntity();
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));

        if ($this->request->is('post')) {
            $cartData = $myCart->patchEntity($cartData, $this->request->data);
            $checkuser = $this->request->session()->read('Auth.User.id');
            if(!$checkuser){
                return $this->redirect(['controller'=>'Users','action' => 'login']);
            }

            if ($myCart->save($cartData)) {
                //$this->Flash->success(__('カートに追加しました。'));
                $this->redirect(['action' => 'myCart']);
            }else{
                $this->Flash->error(__('カート追加に失敗しました。 もう一度やり直してください。'));
            }
        }
        $item = $this->Items->get($id, [
            'contain' => ['ItemTypes', 'ItemImgs']
        ]);

        $this->paginate = [
            'contain' => ['ItemTypes','ItemImgs'],
            'maxLimit' => 6
        ];


        $itemAll = $this->paginate($this->Items->find()->where(['item_type_id' => $item->item_type_id ])->order(['rand()']));
        
            $logUser = $this->request->session()->read('Auth.User.id');
            $this->set('loguser', $logUser);

        $this->set('itemAll', $itemAll);
        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    public function myCart($id = null)
    {
        $this->viewBuilder()->layout('basic');
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        
        $myCart = TableRegistry::get('MyCarts');
        $logId = $this->request->session()->read('Auth.User.id');//$this->Auth->User('id');

        $cCart = $myCart->find('all')->where(['user_id' => $logId])->contain(['Items','Users','Items.ItemImgs']);

        $this->set('myCart', $cCart);
        
    }

     public function cartDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $myCart = TableRegistry::get('MyCarts');
        $cart = $myCart->get($id);
        if ($myCart->delete($cart)) {
            $this->Flash->success(__('削除しました。'));
        } 

        return $this->redirect(['action' => 'myCart']);
    }

    public function shippingAddress($id = null)
    {
        $this->viewBuilder()->layout('basic');
        $id = $this->request->session()->read('Auth.User.id');
        $myCart = TableRegistry::get('MyCarts');
        if(!$id){
            return $this->redirect(['controller'=>'Users','action' => 'login']);
        }

        $user = TableRegistry::get('Users')->get($id, [
            'contain' => []
        ]);

        $cCart = $myCart->find('all')->where(['user_id' => $id])->contain(['Items','Users','Items.ItemImgs']);

        $this->set('myCart', $cCart);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        
    }

    public function shippingAddressConfirm($id = null)
    {
        $this->viewBuilder()->layout('basic');
        $id = $this->request->session()->read('Auth.User.id');
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        $order = TableRegistry::get('Orders');
        $myCart = TableRegistry::get('MyCarts');
        $sCart = $myCart->find('all')->where(['user_id' => $id])->contain(['Items','Users','Items.ItemImgs']);
        $this->set('myCart', $sCart);
        $cCart = $myCart->find('all')->where(['user_id' => $id]);
        $orderData = $order->newEntity();
        if ($this->request->is('post')) {
            $orderData = $order->patchEntity($orderData, $this->request->data, ['associated' => ['OrderDetails']]);
            if ($order->save($orderData)) {
                $delete = $myCart->query()->delete();
                $delete->where(['user_id' => $id]);
                $delete->execute();
                $this->Flash->success(__('注文ありがとう！商品到着までもう少し待っててね！'));
                return $this->redirect(['action' => 'orderCompletion']);
            } else {
                $this->Flash->error(__('エラー。注文できませんでした。'));
            }

        }
        $this->set(compact('cCart','id'));
        
    }

    public function orderCompletion($id = null)
    {
        $this->viewBuilder()->layout('basic');
        $user = $this->request->session()->read('Auth.User');
        $this->set(compact('user'));
        
        
    }
}
