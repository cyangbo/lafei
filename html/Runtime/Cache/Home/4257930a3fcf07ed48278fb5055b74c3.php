<?php if (!defined('THINK_PATH')) exit(); $stateName = array('已到帐', '正在办理', '已取消', '已支付', '失败'); ?>
    <div>
        <table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
            <thead>
                <tr class="table_b_th">
                    <th>用户帐号</td>
                        <th>提现金额</td>
                            <th>申请时间</td>
                                <th>提现银行</td>
                                    <th>银行尾号</td>
                                        <th>状态</td>
                                            <th>备注</th>
                </tr>
            </thead>
            <tbody class="table_b_tr">
                <?php if ($data) { foreach ($data as $var) { ?>
                <tr>
                    <td>
                        <?=$var['username']?>
                    </td>
                    <td>
                        <?=$var['amount']?>
                    </td>
                    <td>
                        <?=date('m-d H:i:s', $var['actionTime'])?>
                    </td>
                    <td>
                        <?=$bankData[$var['bankId']]['name']?>
                    </td>
                    <td>
                        <?='***' . preg_replace('/^.*(.{4})$/', '\1', $var['account'])?>
                    </td>
                    <td>
                        <?php
 echo count($cashcount) . '人在等待处理！'; ?>
                    </td>
                    <td>
                        <?=$var['info']?>
                    </td>
                </tr>
                <?php }?>
                <?php } else {?>
                <tr>
                    <td colspan="12" width="910px">当前没有查询到任何数据。</td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <div class="page">
        <?php echo ($_page); ?>
    </div>