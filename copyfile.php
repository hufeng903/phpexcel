<?php
//在文件夹根目录下遍历
 $path = "E:/SystemFile/WeekReport/";
 $dir = scandir($path);
 print_r($dir);die;
 foreach($dir as $k => $v){
	 if($dir[$k] == '.' || $dir[$k] == '..')
	 {
		 continue;
	 }
	 else
	 {
		 //检查编码,转码
		 $code = mb_detect_encoding($v);
		 if(($code === 'UTF-8')){
			 $v = iconv('UTF-8','GBK',$v);
		 }
         var_dump($v);die;
		 //进入二级目录遍历
		$path1 = "E:/jh/".$v;
		$dir1 = scandir($path1);
		// print_r($dir1);
		foreach($dir1 as $key=>$val){
			//排除浏览目录中后缀是.txt的文件，不需要复制
			if(($dir1[$key] == '.') || ($dir1[$key] == '..') || (substr($dir1[$key],-1) == 't')){
				continue;
			}else{
				//复制当前文件到u盘目录，对应的路径下(当前U盘是F:)
				$res = $path1.'/'.$val;
				//如果目的路径不存在，创建同名文件夹
				if(!file_exists("F:/jh/".$v)){
					mkdir("F:/jh/".$v);
				}
				$dst = "F:/jh/".$v.'/'.$val;
				//把excel文件名已.分割，获取文件名
				$ext = explode(".",$val);         
				$name = $ext[0].".txt";          //文件名
				$filename = $path1.'/'.$name;    //包含路径的文件名
				if(copy($res,$dst)){
					fopen($filename,"w");
					echo ("sucess".$res."<br/>");
					continue;
				}
				echo "fail";
			}
		}
	 }
 }
?>