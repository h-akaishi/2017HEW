<?= $this->Html->css('item/view_all.css') ?>

<ol class="breadcrumb">
  <li><a href="<?= $this->Url->build(['controller'=>'Pages', 'action'=>'top']) ?>">TOP</a></li>
  <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewAll']) ?>">アイテム検索</a></li>
</ol>
<div class="row">
        <!-- left -->
        <div class="col-md-3">
            <!-- パネルで囲む -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    カテゴリ
                </div>
                <!-- 敢えてbodyを作らないことで、メニューを詰める -->
                <!-- <div class="panel-body"> -->
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewDog']) ?>"><div class="check"></div><span class="op-name">ドッグ</span></a></li>
                    <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewCat']) ?>"><div class="check"></div><span class="op-name">キャット</span></a></li>
                    <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewBird']) ?>"><div class="check"></div><span class="op-name">バード</span></a></li>
                    <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewFish']) ?>"><div class="check"></div><span class="op-name">フィッシュ</span></a></li>
                    <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewReptile']) ?>"><div class="check"></div><span class="op-name">爬虫類</span></a></li>
                    <li><a href="<?= $this->Url->build(['controller'=>'Items', 'action'=>'viewOther']) ?>"><div class="check"></div><span class="op-name">その他</span></a></li>
                </ul> 
                <!-- </div> -->
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    商品タイプ
                </div>
                <!-- 敢えてbodyを作らないことで、メニューを詰める -->
                <!-- <div class="panel-body"> -->
                <ul class="nav nav-pills nav-stacked">
                    <li><a href=""><div class="check"></div><span class="op-name">通常商品</span></a></li>
                    <li><a href=""><div class="check"></div><span class="op-name">予約商品</span></a></li>
                    <li><a href=""><div class="check"></div><span class="op-name">セール商品</span></a></li>
                </ul> 
                <!-- </div> -->
            </div>
        </div>

        <!-- center -->
        <div class="col-md-9">
            <div class="col-md-6">
                <?php
                    $url = $_SERVER["REQUEST_URI"];
                ?>
                <select name="example" onChange="location.href = options[this.selectedIndex].value;">
                <option value="商品一覧?sort=created&direction=asc"
                <?php
                    if(strstr($url, 'sort=created&direction=asc')){
                        echo "selected";
                    }
                 ?>>古い順</option>
                <option value="商品一覧?sort=created&direction=desc"
                <?php
                    if(strstr($url, 'sort=created&direction=desc')){
                        echo "selected";
                    }
                ?>>新着順</option>
                <option value="商品一覧?sort=item_price&direction=asc"
                <?php
                    if(strstr($url, 'sort=item_price&direction=asc')){
                        echo "selected";
                    }
                ?>>価格が安い順</option>
                <option value="商品一覧?sort=item_price&direction=desc"
                <?php
                    if(strstr($url, 'sort=item_price&direction=desc')){
                        echo "selected";
                    }
                ?>>価格が高い順</option>
                <option value="商品一覧?sort=modified&direction=desc"
                <?php
                    if(strstr($url, 'sort=modified&direction=desc')){
                        echo "selected";
                    }
                ?>>更新順</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(' >') ?>
                    </ul>
                </div>
            </div>
            <?php foreach ($items as $item): ?>
                <?php $check = 0; ?> 
            <div class="col-md-3 item-box">
                <?php
                if(isset($item->item_imgs[0]['item_url'])){
                    echo $this->Html->image('itemimg/'.$item->item_imgs[0]['item_url'],[
                    'alt' => $item->item_name,
                    'width' => '100%',
                    'height' => '150px',
                    'url' => ['action' => 'itemDetail', $item->id]
                    ]);
                }else{
                    echo $this->Html->image('itemimg/no_image.png',[
                    'alt' => $item->item_name,
                    'width' => '100%',
                    'height' => '150px',
                    'url' => ['action' => 'itemDetail', $item->id]
                    ]);
                } 
                 ?>
                 <p class="text-name"><?= h($item->item_name) ?></p>
                 <?= '￥'.$this->Number->format($item->item_price) ?>

            </div>
            <?php endforeach; ?>

            <?php
            if (!isset($check)) {
            ?>
            <p class="no-mes">該当商品は 0件です</p>
            <?php
            }
            ?>
        </div>
       
</div>
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(' >') ?>
        </ul>
    </div>


