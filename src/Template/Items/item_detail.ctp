<?= $this->Html->css('item/item_detail.css') ?>

<ol class="breadcrumb">
  <li><a href="<?= $this->Url->build(['controller'=>'Pages', 'action'=>'top']) ?>">TOP</a></li>
  <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewAll']) ?>">アイテム検索</a></li>
  <li><?= h($item->item_name) ?></li>
</ol>

<div class="col-md-6">
    <?php foreach ($item->item_imgs as $itemImgs): ?>
        <?php
        if(isset($itemImgs->item_url)){
            echo $this->Html->image('itemimg/'.$itemImgs->item_url,[
            'alt' => $item->item_name,
            'class' => 'item-img',
            'width' => '80%'
            ]);
        }else{
            echo $this->Html->image('itemimg/no_image.png',[
            'alt' => $item->item_name,
            'class' => 'item-img',
            'width' => '80%'
            ]);
        } 
        ?>
            <?php endforeach; ?>
</div>
<div class="col-md-6">
    <h2><?= h($item->item_name) ?></h2>
    <p class="price">￥<?= $this->Number->format($item->item_price) ?><span>(税込)</span></p>
    <p>残り在庫<?= $this->Number->format($item->item_qty) ?>点</p>
    <div class="col-md-6">
        <?= $this->Form->create() ?>
        <?php
        

                echo $this->Form->hidden('item_id',['value' => $item->id]);
                echo $this->Form->hidden('user_id',['value' => $loguser]);
                echo $this->Form->input('item_qty', ['type' => 'number', 'max' => $item->item_qty, 'min' => '1'
                ,'default' => '1', 'label' => '個数']);
        ?>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart" style="margin-right:5px"></i>カートに入れる</button>
        <?= $this->Form->end() ?>
    </div>
    

    <div class="detail col-md-12">
        <p class="detail-top">アイテム説明</p>
        <?= h($item->item_detail) ?>

    </div>
</div>
<div class="col-md-12 relation">
<p>関連するアイテム</p>
<?php foreach ($itemAll as $itemAlls): ?>
            <div class="col-md-2">
                <?php
                if(isset($itemAlls->item_imgs[0]['item_url'])){
                    echo $this->Html->image('itemimg/'.$itemAlls->item_imgs[0]['item_url'],[
                    'alt' => $itemAlls->item_name,
                    'width' => '100%',
                    'height' => '150px',
                    'url' => ['action' => 'itemDetail', $itemAlls->id]
                    ]);
                }else{
                    echo $this->Html->image('itemimg/no_image.png',[
                    'alt' => $itemAlls->item_name,
                    'width' => '100%',
                    'height' => '150px',
                    'url' => ['action' => 'itemDetail', $itemAlls->id]
                    ]);
                } 
                 ?>
                 <p class="text-name"><?= h($itemAlls->item_name) ?></p>
                 <?= '￥'.$this->Number->format($itemAlls->item_price) ?>

            </div>
            <?php endforeach; ?>
</div>