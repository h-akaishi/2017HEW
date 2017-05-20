<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemImgs Controller
 *
 * @property \App\Model\Table\ItemImgsTable $ItemImgs
 */
class ItemImgsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items']
        ];
        $itemImgs = $this->paginate($this->ItemImgs);

        $this->set(compact('itemImgs'));
        $this->set('_serialize', ['itemImgs']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Img id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemImg = $this->ItemImgs->get($id, [
            'contain' => ['Items']
        ]);

        $this->set('itemImg', $itemImg);
        $this->set('_serialize', ['itemImg']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemImg = $this->ItemImgs->newEntity();
        if ($this->request->is('post')) {
            $itemImg = $this->ItemImgs->patchEntity($itemImg, $this->request->data);
            $tmp_name = $itemImg['item_img']['tmp_name'];
            if(!empty($tmp_name)){
                $file_name = md5(uniqid(rand(), 1));
                if($itemImg['item_img']['type'] == 'image/png'){
                    $extension = '.png';
                }elseif ($itemImg['item_img']['type'] == 'image/jpeg') {
                    $extension = '.jpg';
                }elseif($itemImg['item_img']['type'] == 'image/gif'){
                    $extension = '.gif';
                }else{
                    $errMes = '画像以外のファイルはアップロードできません。';
                    $bool = false;
                }
                if($itemImg['item_img']['size'] > 10485760){
                    $errMes = 'ファイルのサイズが大きすぎます。';
                    $bool = false;
                }
                if(!isset($errMes)){
                    $bool = move_uploaded_file($itemImg['item_img']['tmp_name'], WWW_ROOT.'img'.DS.'itemimg'.DS.$file_name.$extension);
                }
            }else{
                $bool = true;
            }
            if ($bool) {
                if($this->ItemImgs->save($itemImg)){
                    $this->Flash->success(__('保存されました。'));

                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('保存できませんでした。'.$errMes));
            }
        }
        $items = $this->ItemImgs->Items->find('list', ['limit' => 200]);
        $this->set(compact('itemImg', 'items'));
        $this->set('_serialize', ['itemImg']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Img id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemImg = $this->ItemImgs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemImg = $this->ItemImgs->patchEntity($itemImg, $this->request->data);
            if ($this->ItemImgs->save($itemImg)) {
                $this->Flash->success(__('The item img has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item img could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemImgs->Items->find('list', ['limit' => 200]);
        $this->set(compact('itemImg', 'items'));
        $this->set('_serialize', ['itemImg']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Img id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemImg = $this->ItemImgs->get($id);
        if ($this->ItemImgs->delete($itemImg)) {
            $this->Flash->success(__('The item img has been deleted.'));
        } else {
            $this->Flash->error(__('The item img could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
