<?php
namespace stolyarov;
use core;

class Log extends core\LogAbstract implements core\LogInterface
	{
		public static function log($str)
        {
            if(file_exists(__DIR__."/log")){
            $date=new \datetime();
            $date = $date ->format("Y-m-d-H_i_s_v");
            $dir=__DIR__."/log/log_$date.txt";
                if (file_put_contents($dir,date(DATE_COOKIE)." | ".$str."\r\n"))
                    self::Instance()->log[]=$str;
                else throw new StolyarovException("Error adding message");
            }
            else {
                mkdir(__DIR__."/log");
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
