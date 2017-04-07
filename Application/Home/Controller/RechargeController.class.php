<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 空模块，主要用于显示404页面，请不要删除
 */
class RechargeController extends HomeController
{
    /**
     * 显示充值页面
     * @return [type] [description]
     */
    public function index()
    {
        if (IS_POST) {
            $P_UserId    = $_POST['merchParam'];
            $P_OrderId   = $_POST['orderNo'];
            $P_CustormId = 'd7f643dc-da60-42b0-bbe8-550d4ce4df8a';
            $P_FaceValue = $_POST['amount'];
            $P_ChannelId = $_POST['def-w-label'];
            $P_Notify_URL = '127.0.0.1/index.php';
            $P_PostKey    = md5('d7f643dc-da60-42b0-bbe8-550d4ce4df8a|' . $P_OrderId . '|' . $P_FaceValue . '|' . $P_ChannelId . '|3.1.3|0|zYxHmoFeKPf9gLUh');
            $P_Custorm    = md5('d7f643dc-da60-42b0-bbe8-550d4ce4df8a|zYxHmoFeKPf9gLUh|' . $P_UserId . '');
            $P_CustormId  = $P_UserId . '_' . $P_Custorm;

            $payLinks = '<form target="_blank" action="http://api.shoumipay.com/gatepay.do?P_UserId=d7f643dc-da60-42b0-bbe8-550d4ce4df8a&P_OrderId=' . $P_OrderId . '&P_FaceValue=' . $P_FaceValue . '&P_ChannelId=' . $P_ChannelId . '&P_SDKVersion=3.1.3&P_RequestType=0&P_Subject=测试&P_PostKey=' . $P_PostKey . '&P_CustormId＝' . $P_CustormId . '&P_Description=测试&P_Notify_URL=http://127.0.0.1/lafei/html/index.php?s=/home/recharge/p_result" id="jumplink" method="post">正在连接支付接口...</form>';
            $payLinks.='<script type="text/javascript">document.getElementById("jumplink").submit();</script>';
            echo  $payLinks;
          //  curl('http://api.shoumipay.com/gatepay.do?P_UserId=d7f643dc-da60-42b0-bbe8-550d4ce4df8a&P_OrderId=' . $P_OrderId . '&P_FaceValue=' . $P_FaceValue . '&P_ChannelId=' . $P_ChannelId . '&P_SDKVersion=3.1.3&P_RequestType=0&P_Subject=测试&P_PostKey=' . $P_PostKey . '&P_CustormId＝' . $P_CustormId . '&P_Description=测试&P_Notify_URL=http://127.0.0.1/lafei/html/index.php?s=/home/recharge/p_result', '1', '页面跳转中...');
        } else {
            $orderNo = date('Ymd') . substr(implode(null, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

            $this->assign('orderNo', $orderNo);
            $this->display();
        }
    }
    /**
     * 订单页面
     * @return [type] [description]
     */
    public function do_notify()
    {
        $P_UserId    = $_POST['merchParam'];
        $P_OrderId   = $_POST['orderNo'];
        $P_CustormId = 'd7f643dc-da60-42b0-bbe8-550d4ce4df8a';
        $P_FaceValue = $_POST['amount'];
        $P_ChannelId = $_POST['def-w-label'];

        $P_Notify_URL = '127.0.0.1/index.php';
        $P_PostKey    = md5('d7f643dc-da60-42b0-bbe8-550d4ce4df8a|' . $P_OrderId . '|' . $P_FaceValue . '|' . $P_ChannelId . '|3.1.3|0|zYxHmoFeKPf9gLUh');
        $P_Custorm    = md5('d7f643dc-da60-42b0-bbe8-550d4ce4df8a|zYxHmoFeKPf9gLUh|' . $P_UserId . '');
        $P_CustormId  = $P_UserId . '_' . $P_Custorm;

        redirect('http://api.shoumipay.com/gatepay.do?P_UserId=d7f643dc-da60-42b0-bbe8-550d4ce4df8a&P_OrderId=' . $P_OrderId . '&P_FaceValue=' . $P_FaceValue . '&P_ChannelId=' . $P_ChannelId . '&P_SDKVersion=3.1.3&P_RequestType=0&P_Subject=测试&P_PostKey=' . $P_PostKey . '&P_CustormId＝' . $P_CustormId . '&P_Description=测试&P_Notify_URL=http://127.0.0.1/lafei/html/index.php?s=/home/recharge/p_result', '1', '页面跳转中...');
    }
    //http://127.0.0.1/lafei/html/index.php?s=/home/recharge/p_result&P_UserId=d7f643dc-da60-42b0-bbe8-550d4ce4df8a&P_OrderId=2017040598481019&P_SMPayId=uMxh7hMtbtK&P_FaceValue=1.00&P_ChannelId=32&P_PayMoney=1.00&P_Subject=%20%20&P_Price=1.00&P_Quantity=null&P_Description=null&P_Notic=null&P_ErrCode=0&P_ErrMsg=null&P_PostKey=54776cf08774809cebcdd35f8cbd01c6&attach=
    //http://127.0.0.1/lafei/html/index.php?s=/home/recharge/p_result.html?P_UserId=d7f643dc-da60-42b0-bbe8-550d4ce4df8a&P_OrderId=20170404223312&P_SMPayId=y6nhaFWzSIl&P_FaceValue=1.00&P_ChannelId=32&P_PayMoney=1.00&P_Subject=%E6%B5%8B%E8%AF%95&P_Price=1.00&P_Quantity=null&P_Description=null&P_Notic=null&P_ErrCode=0&P_ErrMsg=null&P_PostKey=4091475104bc408eeb9b288b4521fc60&attach=
    public function p_result()
    {
        $data['uid']        = $_SESSION['onethink_home']['user']['uid'];
        $data['username']   = $_SESSION['onethink_home']['user']['username'];

        if (I('P_Price')) {
            $data['amount']=I('P_Price', 'double');
        } else {
            $data['amount']=0;
        }

        $data['rechargeId'] = $this->getRechId();
        $data['actionTime'] = $this->time;
        $data['actionIP']   = $this->ip(true);

        $coin = M('Members')->where(array('uid'=>$data['uid']))->field('coin')->find();
        if ($coin) {
            $member['coin'] = $coin['coin']+$data['amount'];
            M('Members')->where(array('uid'=>$data['uid']))->save($member);
        }


        if (M('member_recharge')->add($data)) {
            $this->redirect('home/index/index', '充值成功，即将返回主页');
        } else {
            echo "充值失败";
        }
        //$this->redirect();
    }
    public function p_order()
    {
    }
    final private function getRechId()
    {
        $rechargeId = mt_rand(100000, 999999);
        if (M('member_recharge')->where(array('rechargeId' => $rechargeId))->find()) {
            getRechId();
        } else {
            return $rechargeId;
        }
    }
    public function recharge_info()
    {
        echo "string";
    }
    /*  //没有任何方法，直接执行HomeController的_empty方法
//请不要删除该控制器
final public function index()
{
if (IS_POST) {

if (I('amount') <= 0) {
$this->error('充值金额必须大于0');
}

// 插入提现请求表
unset($para['coinpwd']);
$para['rechargeId'] = $this->getRechId();
$para['actionTime'] = $this->time;
$para['uid']        = $this->user['uid'];
$para['username']   = $this->user['username'];
$para['actionIP']   = $this->ip(true);
$para['mBankId']    = 13;
$para['info']       = '在线支付';
$para['amount']     = intval(I('amount'));

if (M('member_recharge')->add($para)) {

} else {
$this->error('充值订单生产请求出错');
}

$data['rechargeId'] = $para['rechargeId'];
$this->ajaxReturn($data, 'json');
} else {
$banks    = M('member_bank')->where(array('admin' => 1, 'enable' => 1))->select();
$bankList = M('bank_list')->where(array('isDelete' => 0))->select();
$banks2   = array();

$i = 0;
foreach ($banks as $bank) {
foreach ($bankList as $b) {
if ($bank['bankId'] == $b['id']) {
$banks2[$i] = array_merge($bank, $b);
$i++;
}
}
}
///print_r($banks2);exit;
$set = $this->getSystemSettings();
$this->assign('set', $set);
$this->assign('banks', $banks2);
$this->assign('coinPassword', $this->user['coinPassword']);
$this->display();
}
}

/* 进入充值，生产充值订单
final public function recharge()
{
dump(I('amount'));
if (I('amount') <= 0) {
$this->error('充值金额必须大于0');
}

$user = M('members')->find($this->user['uid']);
if ($user['coinPassword'] != think_ucenter_md5(I('coinpwd'), UC_AUTH_KEY)) {
$this->error('资金密码不正确');
} else {
// 插入提现请求表
unset($para['coinpwd']);
$para['rechargeId'] = $this->getRechId();
$para['actionTime'] = $this->time;
$para['uid']        = $this->user['uid'];
$para['username']   = $this->user['username'];
$para['actionIP']   = $this->ip(true);
$para['mBankId']    = I('mBankId');
$para['info']       = '用户充值';
$para['amount']     = intval(I('amount'));

if (M('member_recharge')->add($para)) {

$bank     = M('member_bank')->where(array('admin' => 1, 'enable' => 1, 'bankId' => I('mBankId')))->find();
$bankList = M('bank_list')->where(array('isDelete' => 0))->select();

foreach ($bankList as $b) {
if ($bank['bankId'] == $b['id']) {
$bank = array_merge($bank, $b);
}
}

$this->assign('para', $para);
$this->assign('memberBank', $bank);
$this->display('recharge/recharge');
} else {
$this->error('充值订单生产请求出错');
}
}

}

//充值详单
final public function info()
{
$rechargeInfo = M('member_recharge')->where(array('id' => I('id')))->find();
$bankInfo     = M('member_bank')->where(array('uid' => $rechargeInfo['uid']))->find();
$list         = M('bank_list')->order('id')->select();

$bankList = array();
if ($list) {
foreach ($list as $var) {
$bankList[$var['id']] = $var;
}
}

$this->assign('rechargeInfo', $rechargeInfo);
$this->assign('bankInfo', $bankInfo);
$this->assign('bankList', $bankList);

$this->display('Recharge/recharge-info');
}*/
}
