===================================================
    标题：PHP基础--GD库示例--验证码生成和使用
    主讲：张涛（QQ:1962720667）
===================================================
 一、目标：通过做一个验证码，掌握GD库绘图原理及常用函数，
 
 二、涉及函数知识：
     1. GD库函数：
	imagecreatetruecolor ( int x_size, int y_size ) //创建一个基于真彩的画布
	imagecolorallocate ( resource image, int red, int green, int blue )//分配一个颜色
	imagefill ( resource image, int x, int y, int color )//区域填充
	imagerectangle ( resource image, int x1, int y1, int x2, int y2, int col )//矩形框
	imagesetpixel ( resource image, int x, int y, int color ) //画一个像素点：
	imageline ( resource image, int x1, int y1, int x2, int y2, int color )//画一条线段
	//绘制文本内容
	imagettftext ( resource image, float size, float angle, int x, int y, int color, string fontfile, string text )
		
	imagepng ( resource image [, string filename] )//以 PNG 格式将图像输出到浏览器或文件
	imagedestroy ( resource image ) //销毁一个图像
		
      2. 其他函数：
	int rand ( [int min, int max] ) //产生一个随机整数
	strlen()//获取字串长度的函数
	header()//设置响应头信息。
		
三、绘图过程
	1. 创建一个画布、分配颜色
		imagecreatetruecolor（）
		imagecolorallocate（）
	2. 开始绘画
		
	3. 输出图像
		imagepng（）
		imagejpeg()...
	4. 销毁图片（释放内容）
		imagedestroy();
		
四、绘制验证码的具体实现步骤：
	1. 复制一个字体文件。
	2. 定义一个函数：随机生成一个验证码的内容
	
	3. 开始绘画验证码（加干扰点，干扰线。。。）
	
	4. 输出验证码
	
五、验证的使用
    在html的代码中使用<img/>标签，使用src属性直接指定图片的url地址即可
	<img src="code.php" onclick="this.src='code.php?id='+Math.random()"/>
	

		
	
	
	
		



		











