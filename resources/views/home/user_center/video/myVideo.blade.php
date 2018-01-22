@extends('home.layout.center')
@section('right')
  <div class="right840">
    <div class="title7">
      <h1>我的视频</h1>

      <form action="/center/video/index" method="get">
      <div class="nysearchbox">
        <input type="text" value="页内搜索" onFocus="this.value='';" onBlur="if(this.value==''){this.value='页内搜索';}" name="video_name" class="input6"/>
        <input type="image" src="/homes/images/grzx/btn4.jpg" class="btn5" />
      </div>
      </form>

    </div>
    <div class="biji">
      <div class="bijicz">
        <div class="bjsc"><img src="/homes/images/grzx/scicon.jpg" /><a href="/center/video/vupload">上传视频</a></div>
        <div class="bjsc"><img src="/homes/images/grzx/bjsc.jpg" /><a href="#" onclick="deleSeltedRecords()">批量删除</a></div>
        <div class="bjpage">
        </div>
      </div>
    </div>
    <!--视频信息-->
    <div class="sptitle">
      <div class="wdspxx">
        <input type="checkbox" onclick="seltAll()" id="ckb" class="input11" />
        视频信息</div>
      <div class="wdsppx"><font class="f_black">排序：</font>上传时间&nbsp;<img src="/homes/images/grzx/bjpx.jpg" /></div>
      <div class="wdspzt">状态</div>
      <div class="wdspzt">热度</div>
      <div class="wdspcz">操作</div>
    </div>
    <ul class="wdsplist">
    @foreach($data as $v)
      <li> <span class="checkbox">
        <input name="chckBox" value="{{$v->id}}" type="checkbox" class="input12" />
        </span>
        <div class="wdsp"><a href="#"><img src="{{env('PATH_IMG').$v->pic.'?imageView2/1/w/146/h/87/q/75|imageslim'}}" /></a><span class="gktime">{{$v->size}}</span></div>
        <div class="wddate"><span><a target="_blank" href="/video/play/index/{{$v->id}}">{{$v->video_title}}</a></span><span>{{date('Y-m-d H:i:s',$v->created_at)}}</span></div>
        <div class="spfb">已发布</div>
        <div class="wddp"><span><img src="/homes/images/grzx/wdgk.jpg" /><a href="#">1333</a></span><span><img src="/homes/images/grzx/wddp.jpg" /><a href="#">1333</a></span></div>
        <div class="wdcz">
          <a style="margin:15px 0 0 5px;float:left" href="/center/video/{{$v->id}}/edit">编辑</a>
          <a onclick="del({{$v->id}})" style="margin:15px 0 0 5px;float:left" href="#">删除</a>
        </div>

      </li>
    @endforeach
    </ul>

    <div class="myfenye">{!! $data->appends($tiaojian)->render() !!}</div>
    <script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>

<script type="text/javascript">
  var jq6 = $.noConflict(true);
  // 执行删除
  function del(id)
  {
      var rrr = confirm('确定删除？');
      if(rrr)
      {
        jq6.post('/center/video/'+id,{'_token':"{{
          csrf_token
          ()}}",'_method':'delete'},function(data){
          if(data=='2')
          {
              alert('恭喜，删除成功');
              location.reload(true);
          }else if(data=='3'){
              alert('抱歉，删除失败');
              return false;
          }
        });
      }      
  }

  //批量删除
  function seltAll(){  
    // alert(1);
    var chckBoxSign = document.getElementById("ckb");       //ckb 全选/反选的选择框id  
    var chckBox = document.getElementsByName("chckBox");    //所有的选择框其那么都是chckBox  
    var num = chckBox.length;  
    if(chckBoxSign.checked){  
      for(var index =0 ; index<num ; index++){  
        chckBox[index].checked = true;  
      }  
    }else{  
      for(var index =0 ; index<num ; index++){  
        chckBox[index].checked = false;  
      }  
    }  
  } 

  function deleSeltedRecords(){  
    var chckBox = document.getElementsByName("chckBox");  
    var num = chckBox.length;  
    var ids = new Array();  
    // console.log(chckBox);
    for(var index =0 ; index<num ; index++){  
        if(chckBox[index].checked){  
            // ids += chckBox[index].value + ","; 
            ids.push(chckBox[index].value);               
        }  
    }  
    // console.log(ids);
    if(ids!=""){  
        if(window.confirm("确定删除所选记录？")){  
            jq6.ajax( {  
                type : "post",
                headers: {
                    'X-CSRF-TOKEN': jq6('meta[name="csrf-token"]').attr('content')
                },
                url : '/center/video/deletes', //要自行删除的action  
                data:{'arr':ids},
                // dataType : 'json',  
                success : function(data) {
                    if(data == '2')
                    {
                      alert("删除成功！"); 
                      location.reload(true);
                    }else if(data == '3'){
                      alert("删除失败！");  
                    }
                    
                },  
                error : function(data) {  
                    alert("系统错误，删除失败");  
                }  
            });  
        }  
    }else{  
        alert("请选择要删除的记录");  
    }  
  }  
</script>

  </div>
  </div>
@endsection