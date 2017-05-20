<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * ItemImgs Controller
 *
 * @property \App\Model\Table\ItemImgsTable $ItemImgs
 */
class EarningsController extends AppController
{

    public function initialize()
    {
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

        $order = TableRegistry::get('Orders');

        $this->paginate = [
            'order' => [
            'Orders.created' => 'desc'
            ]
            //'contain' => ['ItemTypes']
        ];
        $orders = $this->paginate($order);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);

    }

    public function orderHistory()
    {
        $this->viewBuilder()->layout('mypage');
        $id = $this->request->session()->read('Auth.User.id');
        $user = TableRegistry::get('Users')->get($id, [
            'contain' => []
        ]);
        
        $this->set('user', $user);

        $order = TableRegistry::get('Orders');

        $this->paginate = [
            'order' => [
            'Orders.created' => 'desc'
            ]
            //'contain' => ['ItemTypes']
        ];
        $orders = $this->paginate($order->find()->where(['user_id' => $id]));

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);

    }

    public function orderDetail($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $order = TableRegistry::get('Orders')->get($id, [
            'contain' => ['OrderDetails', 'Users', 'OrderDetails.Items', 'OrderDetails.Items.ItemTypes', 'OrderDetails.Items.ItemImgs']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    public function detailOrder($id = null)
    {
        $this->viewBuilder()->layout('mypage');
        $id = $this->request->session()->read('Auth.User.id');
        $user = TableRegistry::get('Users')->get($id, [
            'contain' => []
        ]);
        
        $this->set('user', $user);
        $order = TableRegistry::get('Orders')->get($id, [
            'contain' => ['OrderDetails', 'Users', 'OrderDetails.Items', 'OrderDetails.Items.ItemTypes', 'OrderDetails.Items.ItemImgs']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }
}
