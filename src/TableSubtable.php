<?php

namespace fly;

class TableSubtable
{
//    private int $uid;
//    private string $username;
    public static $instance;

    public int $tableNumber = 8;

    private function __construct()
    {

    }
    public static function create(): self
    {
        if (self::$instance === null || self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }


    // 获取表号
    public function getTableStringNumber(string $u)
    {
        // 计算有多少个表
        $tNum = $this->getTNum();
        // 基因算法
        $u = crc32(md5($u));
        // 转换为二进制
        $u = decbin($u);
        // 取出最后 $tNum 位
        $u1 = substr($u, -$tNum);

        $uid = time();
        $uid.= rand(1000,9999);

        // 转换为二进制
        $uid = decbin($uid);
        $uid.= $u1;

        $uid = bindec($uid);

        return [
            "uid" => $uid,
            "tableSeq" => bindec($u1)
        ];
    }

    public function getTableIntNumber(int $uid){
        // 计算有多少个表
        $tNum = $this->getTNum();
        // 转换为二进制
        $u = decbin($uid);
        // 取出最后 $tNum 位
        $u1 = substr($u, -$tNum);

        return [
            "tableSeq" => bindec($u1)
        ]; }

    private function getTNum(){
        return log($this->tableNumber, 2);
    }



}