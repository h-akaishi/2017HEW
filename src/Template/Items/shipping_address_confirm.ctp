<?= $this->Html->css('item/shipping_address_confirm.css') ?>


<div class="col-md-7">

    <p class="top-text">発送先</p>
    <?= $this->Form->create() ?>
        <table class="table">
            <tr>
              <td class="active">お名前</td>
              <td>
                <?= h($_POST['sei_name'].$_POST['mei_name']) ?>
              </td>
            </tr>  
            <tr>
              <td class="active">フリガナ</td>
              <td>
                <?= h($_POST['sei_kana'].$_POST['mei_kana']) ?>
              </td>
            </tr>
            <tr>
              <td class="active">郵便番号</td>
              <td>
                <?= h($_POST['mail_no']) ?>
              </td>
            </tr>
            <tr>
              <td class="active">住所</td>
              <td>
                <?= h($_POST['mail_add']) ?>
              </td>
            </tr>
            <tr>
              <td class="active">電話番号</td>
              <td>
                <?= h($_POST['user_tel']) ?>
              </td>
            </tr>
        </table>
        <?php    
            echo $this->Form->hidden('sei_name');
            echo $this->Form->hidden('mei_name');
            echo $this->Form->hidden('sei_kana');
            echo $this->Form->hidden('mei_kana');
            echo $this->Form->hidden('mail_no');
            echo $this->Form->hidden('mail_add');
            echo $this->Form->hidden('user_tel');
            echo $this->Form->hidden('user_id',['value' => $id]);
        ?>
        <div class="credit-box">
            <div class="title-box">
                <p>クレジットカード</p>
            </div>
            <div class="input-box">
                <?= $this->Form->input('カード番号',['label' => false,'placeholder' => 'Card Number']) ?>
                <?= $this->Form->input('名前',['label' => false,'placeholder' => 'Name on card']) ?>
                <?= $this->Form->input('有効期限',['label' => false,'placeholder' => 'MM / YY']) ?>
                <?= $this->Form->input('セキュリティコード',['label' => false,'placeholder' => 'セキュリティコード']) ?>
            </div>
        </div>

         <?php
        $i = 0;
        foreach ($cCart as $cCarts):
        ?>

        <?php
            echo $this->Form->hidden('order_details.'.$i.'.item_id',['value' => $cCarts->item_id]);    
            echo $this->Form->hidden('order_details.'.$i.'.item_qty',['value' => $cCarts->item_qty]);
            $i++;
        ?>

        <?php endforeach; ?>
        <div class="col-md-12">
            <div class="col-md-6">
                <?= $this->Form->button('戻る', ['onclick' => 'history.back()', 'type' => 'button', 'class' => 'back-btn']) ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->button(__('注文確定'),['class' => 'buy-btn']) ?>
            </div>
        <?= $this->Form->end() ?>
        </div>

</div>

<div class="col-md-5 right-box">
    <?php
    $total = 0;
    foreach ($myCart as $myCarts):
    ?>
    <div class="col-md-12 item-box">
        <div class="col-md-3">
            <div class="img-box">
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
                <span class="product-thumbnail__quantity" aria-hidden="true"><?= $myCarts->item_qty ?></span>
            </div>
        </div>
        <div class="name-box col-md-6">
            <?= h($myCarts->item->item_name) ?>
        </div>
        <div class="col-md-3">
            <?php $sum = ($myCarts->item->item_price * $myCarts->item_qty); ?>
            ￥<?=  $this->Number->format($sum) ?>
        </div>
    </div>

    <?php
        $total += $sum; 
        endforeach; 
    ?>

    <div class="col-md-12 sum-box">
        <p class="sum-line">小計<span>￥<?= $this->Number->format($total) ?></span></p>
        <p class="ship-line">送料<span>￥0</span></p>
    </div>
    <div class="col-md-12 total-box">
        <p class="total-line">合計<span>￥<?= $this->Number->format($total) ?></span></p>
    </div>

</div>

