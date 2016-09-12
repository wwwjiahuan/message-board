<?php
	class TagLibMessage extends TagLib{
		protected $tags=array(
			//定义标签
			'code'=>array('attr'=>'width,height','close'=>0),
		);
		public function _code($attr){
			$tag=$this->parseXmlAttr($attr,'code');
			$width=$tag['width'];
			$height=$tag['height'];
			$str="<img src='__APP__/Public/code?h={$height}&w={$width}' onclick='this.src=this.src+\"?\"+Math.random()'/>";
			return $str;
		}
	}
?>