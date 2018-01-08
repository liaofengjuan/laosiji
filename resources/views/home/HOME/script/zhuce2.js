var EX = {
  addEvent:function(k,v){
    var me = this;
    if (me.addEventListener)
      me.addEventListener(k, v, false);
    else if(me.attachEvent)
      me.attachEvent("on" + k, v);
    else
      me["on" + k] = v;
  },
  removeEvent:function(k,v){
    var me = this;
    if (me.removeEventListener)
      me.removeEventListener(k, v, false);
    else if (me.detachEvent)
      me.detachEvent("on" + k, v);
    else
      me["on" + k] = null;
  },
  stop:function(evt){
    evt = evt || window.event;
    evt.stopPropagation?evt.stopPropagation():evt.cancelBubble=true;
  }
};
document.getElementById('pop').onclick = EX.stop;
var url = '#'; 
function showA(){ 
var o = document.getElementById('pop'); 
o.style.display = ""; 
} 
function hideA(){ 
var o = document.getElementById('pop'); 
o.style.display = "none"; 
EX.removeEvent.call(document,'click',hide);
}

document.getElementById('pop1').onclick = EX.stop;
var url = '#'; 
function showB(){ 
var o = document.getElementById('pop1'); 
o.style.display = ""; 
} 
function hideB(){ 
var o = document.getElementById('pop1'); 
o.style.display = "none"; 
EX.removeEvent.call(document,'click',hide);
} 