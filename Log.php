<?php
namespace stolyarov;
use core;

class Log extends core\LogAbstract implements core\LogInterface
	{
		public static function log($str)
        {
            if(file_exists(__DIR__."/../Log/")){
                if (file_put_contents(__DIR__."log".date("Y-m-d H:i:s:v").".log",date(DATE_COOKIE)." | ".$str."\r\n",FILE_APPEND))
                    self::Instance()->log[]=$str;
                else throw new StolyarovException("Error adding message");
            }
            else {
                mkdir(__DIR__."/../Log/");
                self::log($str);
            }
		}
   		public static function write(){
            self::Instance()->_write();
   		}
   		public function _write(){
            foreach (self::Instance()->log as $value)
            {
                echo $value;
                echo "\n";
            }
   		}
	}
