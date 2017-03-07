<?= $this->Html->css('item/shipping_address.css') ?>



<div class="col-md-7">
    <p class="top-text">お届け先の住所</p>
    <?= $this->Form->create($user, ['url' => ['action' => 'shippingAddressConfirm']]) ?>
        <table class="table">
            <tr>
              <td class="active">お名前(姓)</td>
              <td>
                <?= $this->Form->input('sei_name',['label' => false]) ?>
              </td>
            </tr>  
            <tr>
              <td class="active">お名前（名）</td>
              <td>
                <?= $this->Form->input('mei_name',['label' => false]) ?>
              </td>
            </tr>
            <tr>
              <td class="active">フリガナ（セイ）</td>
              <td>
                <?= $this->Form->input('sei_kana',['label' => false]) ?>
              </td>
            </tr>
            <tr>
              <td class="active">フリガナ（メイ）</td>
              <td>
                <?= $this->Form->input('mei_kana',['label' => false]) ?>
              </td>
            </tr>
            <tr>
              <td class="active">郵便番号</td>
              <td>
                <?= $this->Form->input('mail_no',['label' => false]) ?>
              </td>
            </tr>
            <tr>
              <td class="active">住所</td>
              <td>
                <?= $this->Form->input('mail_add',['label' => false]) ?>
              </td>
            </tr>
            <tr>
              <td class="active">電話番号</td>
              <td>
                <?= $this->Form->input('user_tel',['label' => false]) ?>
              </td>
            </tr>
        </table>
    <?= $this->Form->button(__('支払方法に進む'),['class' => 'buy-btn']) ?>
    <?= $this->Form->end() ?>

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
