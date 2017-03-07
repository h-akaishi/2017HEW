<?= $this->Html->css('item/my_cart.css') ?>

<?php
    foreach ($myCart as $checkCart) {
        $check = 0;
    }
?>

<h2>ショッピングカート</h2>
<?php
if (!isset($check)) {
    ?>
    <div class="col-md-12">
        <p class="no-item">現在カートにはアイテムが入っておりません。</p>
    </div>
    <div class="col-md-12">
        <a href="<?= $this->Url->build(['controller'=>'Pages', 'action'=>'top']) ?>"><button type="button" class="buy-btn center-block">トップ画面へ戻る</button></a>
    </div>
<?php
}else{
?>
<table class="table">
    <tr class="active">
      <td>商品情報</td>
      <td>価格</td>
      <td>数量</td>
      <td>小計</td>
    </tr>  
    <?php
    $total = 0;
    foreach ($myCart as $myCarts):
    ?>
    <tr>
      <td>
        <?php
                if(isset($myCarts->item->item_imgs[0]['item_url'])){
                    echo $this->Html->image('itemimg/'.$myCarts->item->item_imgs[0]['item_url'],[
                    'alt' => $myCarts->item->item_name,
                    'width' => '70px',
                    'height' => '70px',
                    ]);
                }else{
                    echo $this->Html->image('itemimg/no_image.png',[
                    'alt' => $myCarts->item->item_name,
                    'width' => '70px',
                    'height' => '70px',
                    ]);
                } 
        ?>
        <?= h($myCarts->item->item_name) ?>   
      </td>
      <td>￥<?= $this->Number->format($myCarts->item->item_price) ?></td>
      <td><?= $this->Number->format($myCarts->item_qty) ?>
          <button type="button" class="btn btn-default"><?= $this->Form->postLink(__('削除'), ['action' => 'cartDelete', $myCarts->id], ['confirm' => __('本当に削除してよろしいですか？')]) ?></button>
      </td>
      <?php $sum = ($myCarts->item->item_price * $myCarts->item_qty); ?>
      <td>￥<?= $this->Number->format($sum) ?></td>
    </tr> 
    <?php $total += $sum; ?>
    <?php endforeach; ?>
    <tr class="active">
        <td colspan="3">商品合計（税込）</td>
        <td>￥<?= $this->Number->format($total) ?></td>
    </tr> 
</table>
<button type="button" class="buy-btn pull-right"><?= $this->Html->link(__('購入手続きへ'), ['controller' => 'Items', 'action' => 'shippingAddress']) ?> </button>
<?php
}
?>