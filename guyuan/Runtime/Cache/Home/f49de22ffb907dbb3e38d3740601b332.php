<?php if (!defined('THINK_PATH')) exit();?><div class="panel panel-default">
    <div class="panel-heading"><?php echo ($w_title); ?></div>
    <div class="panel-body">
        <ul class="list-group">
            <?php if(is_array($w_data)): foreach($w_data as $key=>$d): ?><li class="list-group-item"><?php echo ($d["info_title"]); ?></li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>