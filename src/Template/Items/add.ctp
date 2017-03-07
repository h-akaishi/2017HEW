<div class="row">
       <div class="col-md-6 col-md-offset-3">
          <h1>アイテム登録</h1>
          <?= $this->Form->create($item, ['type' => 'file','class' => 'form-horizontal']) ?>
              
            <div class="form-group">
              <label class="col-md-2 control-label">商品名：</label>
              <div class="col-md-10">
                <?= $this->Form->input('item_name', ['class' => 'form-control','placeholder' => 'アイテム名', 'label' => false]) ?><br />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-2 control-label">カテゴリ：</label>
              <div class="col-md-10">
                <?= $this->Form->input('item_type_id', ['options' => $itemTypes, 'class' => 'form-control', 'label' => false]) ?>
                <br />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">在庫数：</label>
              <div class="col-md-10">
                <?= $this->Form->input('item_qty', ['class' => 'form-control', 'label' => false, 'min' => 0]) ?><br />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">価格：</label>
              <div class="col-md-10">
                <?= $this->Form->input('item_price', ['class' => 'form-control', 'label' => false , 'min' => 0]) ?><br />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">商品説明：</label>
              <div class="col-md-10">
                <?= $this->Form->textarea('item_detail', ['class' => 'form-control','placeholder' => '商品の説明をここに入力', 'label' => false]) ?><br />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">商品イメージ：</label>
              <div class="col-md-10">
                <?= $this->Form->input('item_img', ['type' => 'file', 'class' => 'form-control', 'label' => false]) ?>
                <br />
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-md-offset-2 col-md-10">
                <?= $this->Form->button(__('登録'),['class' => 'btn btn-primary btn-block']) ?>
              </div>
            </div>
        　   <?= $this->Form->end() ?>     
    　 </div>
    </div>