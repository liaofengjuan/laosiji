@extends('home.layout.center')
@section('right')
 <style type="text/css">
.con4{
     width: 300px;
     height: auto;
     overflow: hidden;
     margin: 20px auto;
     color: #FFFFFF;
}
.con4 .btn{
     width: 100%;
     height: 40px;
     line-height: 40px;
     text-align: center;
     background: #d8b49c;
     display: block;
     font-size: 16px;
     border-radius: 5px;
}
.con4 .upload{
     float: left;
     position: relative;
}
.con4 .upload_pic{
     display: block;
     width: 100%;
     height: 40px;
     position: absolute;
     left: 0;
     top: 0;
     opacity: 0;
     border-radius: 5px;
}
#cvs{
	border: 1px solid #000;
	margin:20px 0 20px 50px;
}

.con4 .btn1{
	margin-top:10px;
	background: yellowgreen;
    position: relative;
}
</style>
<div class="right840">
 <div class="title6"><h1><a href="/center/self">信息完善</a></h1><h1><a href="#" class="on">修改头像</a></h1><h1><a href="/center/self/psw">账户安全</a></h1></div>
<div class="con4">
	<form class="banner-upload">
	<canvas id="cvs" width="200" height="200"></canvas>
	<span class="btn upload">选择头像<input type="file" name="pic" class="upload_pic" id="upload" /></span>
	<span class="btn btn1 uploadTrue">确定上传<input type="button" class="upload_pic" id="upload11" /></span>
	</form>
</div>
</div>
<script>
//获取上传按钮
var input1 = document.getElementById("upload"); 
 
if(typeof FileReader==='undefined'){ 
     //result.innerHTML = "抱歉，你的浏览器不支持 FileReader"; 
     input1.setAttribute('disabled','disabled'); 
}else{ 
     input1.addEventListener('change',readFile,false); 
     /*input1.addEventListener('change',function (e){
     	console.log(this.files);//上传的文件列表
     },false); */
}
function readFile(){ 
	var file = this.files[0];//获取上传文件列表中第一个文件

	if(!/image\/\w+/.test(file.type)){
	//图片文件的type值为image/png或image/jpg
		alert("文件必须为图片！");
		return false; 
	} 
    
	// console.log(file);
	var reader = new FileReader();//实例一个文件对象
	reader.readAsDataURL(file);//把上传的文件转换成url
	//当文件读取成功便可以调取上传的接口
	reader.onload = function(e){ 
		// console.log(this.result);//文件路径
		// console.log(e.target.result);//文件路径
		/*var data = e.target.result.split(',');
		var tp = (file.type == 'image/png')? 'png': 'jpg';
		var imgUrl = data[1];//图片的url，去掉(data:image/png;base64,)
		//需要上传到服务器的在这里可以进行ajax请求
		// console.log(imgUrl);
		// 创建一个 Image 对象 
		var image = new Image();
		// 创建一个 Image 对象 
		// image.src = imgUrl;
		image.src = e.target.result;
		image.onload = function(){
			document.body.appendChild(image);
		}*/

		var image = new Image();
		// 设置src属性 
		image.src = e.target.result;
		var max=200;
		// 绑定load事件处理器，加载完成后执行，避免同步问题
		image.onload = function(){ 
			// 获取 canvas DOM 对象 
			var canvas = document.getElementById("cvs"); 
			// 如果高度超标 宽度等比例缩放 *= 
			/*if(image.height > max) {
				image.width *= max / image.height; 
				image.height = max;
			} */
			// 获取 canvas的 2d 环境对象, 
			var ctx = canvas.getContext("2d"); 
			// canvas清屏 
			ctx.clearRect(0, 0, canvas.width, canvas.height); 
			// 重置canvas宽高
			/*canvas.width = image.width;
			canvas.height = image.height;
			if (canvas.width>max) {canvas.width = max;}*/
			// 将图像绘制到canvas上
			// ctx.drawImage(image, 0, 0, image.width, image.height);
			ctx.drawImage(image, 0, 0, 200, 200);
			// 注意，此时image没有加入到dom之中
		};  
	}
};
</script>
<script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

 <script type="text/javascript">
 	var jq1 = $.noConflict(true);
 	jq1('.uploadTrue').click(function(){
 		// 判断是否有选择上传文件
        var imgPath = jq1("#upload").val();
        if (imgPath == "") {
            layer.alert('请选择上传图片！', {
              icon: 2,
              skin: 'layer-ext-moon' 
            })
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp'
            && strExtension != 'jpeg') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData(jq1('.banner-upload')[0]);
        jq1.ajax({
            // header:{'Content-type':'image/jpeg'},
            type: "POST",
            headers: {
		        'X-CSRF-TOKEN': jq1('meta[name="csrf-token"]').attr('content')
		    },
            url: "/center/self/uploadimg",
            data: formData,
            dataType:'json',
            // async: true,//异步
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(XMLHttpRequest){
                // layer.load();
            },
            success: function(data) {
                // layer.close();
                // alert(data.message);
                // jq1('#myimg').attr('src',data.filePath);
                // jq1('#logo').val(data.fileName);
                if(data.message == '2')
                {
                	insert_img(data.filePath);
                }else{
                	layer.alert('上传失败！', {
                      icon: 2,
                      skin: 'layer-ext-moon' 
                    })
                }
               
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                layer.alert('上传失败，请检查网络后重试', {
                  icon: 2,
                  skin: 'layer-ext-moon' 
                })
            }
        });
 	});

	//将图片地址加入数据库
	function insert_img(path)
	{
		jq1.post('/center/self/insertimg',{path:path,_token:'{{csrf_token()}}'},function(msg){
            switch(msg)
            {               
                case '2':
                    layer.alert('上传成功！', {
                      icon: 1,
                      skin: 'layer-ext-moon' 
                    })
                    break;
                case '3':
                    layer.alert('上传失败！', {
                      icon: 2,
                      skin: 'layer-ext-moon' 
                    })
                    break;
            }
		});
	}
 </script>
@endsection