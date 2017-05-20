          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">取引情報</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>受注番号</th>
                  <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                  <th>送り先名</th>
                  <td><?= h($order->sei_name)."&nbsp;".h($order->mei_name) ?></td>
                </tr>
                <tr>
                  <th>フリガナ</th>
                  <td><?= h($order->sei_kana)."&nbsp;".h($order->mei_kana) ?></td>
                </tr>
                <tr>
                  <th>郵便番号</th>
                  <td><?= '〒'.h($order->mail_no) ?></td>
                </tr>
                <tr>
                  <th>届け先住所</th>
                  <td><?= h($order->mail_add) ?></td>
                </tr>
                <tr>
                  <th>届け先電話番号</th>
                  <td><?= h($order->user_tel) ?></td>
                </tr>
                <tr>
                  <th>受注日時</th>
                  <td><?= h($order->created->format('Y/n/j G:i')) ?></td>
                </tr>
                <tr>
                  <th>会員ID</th>
                  <td><?= h($order->user_id) ?></td>
                </tr>
                <tr>
                  <th>会員名</th>
                  <td><?= h($order->user->sei_name)."&nbsp;".h($order->user->mei_name) ?></td>
                </tr>
                <tr>
                  <th>フリガナ</th>
                  <td><?= h($order->user->sei_kana)."&nbsp;".h($order->user->mei_kana) ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">注文商品情報</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
              <?php $totalPrice = 0; ?>
              <?php foreach ($order->order_details as $orders): ?>
                <tr>
                  <th colspan="2">
                  <?php
                if(isset($orders->item->item_imgs[0]->item_url)){
                    echo $this->Html->image('itemimg/'.$orders->item->item_imgs[0]->item_url,[
                    'alt' => $orders->item->item_name,
                    'width' => '120px',
                    'height' => '120px',
                    ]);
                }else{
                    echo $this->Html->image('itemimg/no_image.png',[
                    'alt' => $orders->item->item_name,
                    'width' => '120px',
                    'height' => '120px',
                    ]);
                } 
                 ?>
                 </th>
                </tr>
                <tr>
                  <th>商品番号</th>
                  <td><?= $orders->item_id ?></td>
                </tr>
                <tr>
                  <th>カテゴリ</th>
                  <td><?= $orders->item->item_type->type_name ?></td>
                </tr>
                <tr>
                  <th>商品名</th>
                  <td><?= $orders->item->item_name ?></td>
                </tr>
                <tr>
                  <th>価格</th>
                  <td><?= $orders->item->item_price ?></td>
                </tr>
                <tr>
                  <th>注文数</th>
                  <td><?= $orders->item_qty."個" ?></td>
                </tr>
                <?php
                $totalPrice += $orders->item->item_price;
                ?>
              <?php endforeach; ?>
                <tr>
                  <th colspan="2" style="text-align:right">合計金額 <span style="font-size:26px" class="bg-red"><?= $totalPrice ?></span> 円</th>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->