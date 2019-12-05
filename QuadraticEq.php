<?php
namespace stolyarov;
use core;

class QuadraticEq extends LinearEq implements core\EquationInterface
	{
    protected function discr($a, $b, $c)
		{
			//D=b^2-4ac
			$discr=pow($b,2)-4*$a*$c;
			if ($discr<0) 
			{
				throw new StolyarovException("Discriminant ({$b}^2-4*{$a}*{$c}) less than zero", 1);
			}
            return $discr;

        }

		function solve($a,$b,$c)
		{
			$x = array();
			if ($a==0) {
				parent::solvel($b,$c,$a);
			}
			else if (is_object($e=$this->discr($a,$b,$c)))
            {
                Log::log("Error: $e");
            }
			else if ($this->discr($a,$b,$c)==0) 
			{
				$x[]=($b*-1)/(2*$a);
                Log::log("Quadratic equation ({$a}x^2+{$b}x+{$c}) root:{$x[0]}");
			}
			else 
			{
				$x[]=(($b*-1)+sqrt($this->discr($a,$b,$c)))/(2*$a);
				$x[]=(($b*-1)-sqrt($this->discr($a,$b,$c)))/(2*$a);
                Log::log("Quadratic equation ({$a}x^2+{$b}x+{$c}) roots: {$x[0]}, {$x[1]}");
			}
			$this->x=$x;
			return $x;
		}
	}