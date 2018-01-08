function insertHtmlAtCaret(html) {
    var sel, range;
    if (window.getSelection) {
        // IE9 and non-IE
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            // Range.createContextualFragment() would be useful here but is
            // non-standard and not supported in all browsers (IE9, for one)
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(),
                node, lastNode;
            while ((node = el.firstChild)) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);
            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        // IE < 9
        document.selection.createRange().pasteHTML(html);
    }
}

var emotion = function(targetId,editId,event){
	var event = event || window.event;
	if (event.stopPropagation){event.stopPropagation();} //ֹð¼
	event.cancelBubble = true;
	var oActive3 = document.getElementById(targetId);
	var oEditor = document.getElementById(editId);
	var target = $(oEditor);
	var eTop = target.offset().top + target.height() + 10;
	var eLeft = target.offset().left;
	$('body').append('<div id="emotions"><div class="container"></div></div>');
	$('#emotions').css({top: eTop, left: eLeft});
	$('#emotions').css('z-index','100000');
	$('#emotions').show();
	//$('#emotions').html('<div>ڼأԺ...</div>');
	$('#emotions').click(function(event){
		if (event.stopPropagation){event.stopPropagation(); }//ֹð¼
		event.cancelBubble = true;
	});
	for(var i=1; i<31; i++){
		$('#emotions .container').append($('<a href="javascript:void(0);"><img src="images/face/'+i+'.gif" class="face"/></a>'));
	}
	$('#emotions .container a').click(function(event){
		var str = $(this).html();
		if (event.stopPropagation){event.stopPropagation(); }//ֹð¼
		event.cancelBubble = true;
		if(oEditor.innerHTML === "Say something...."){
			oEditor.innerHTML = '';
		}
		oEditor.focus();
		insertHtmlAtCaret(str);
		$('#emotions').remove();
	});
	
	$('body').click(function(){
		$('#emotions').remove();
	});
}

var countText = function(e) {    
	var text_max = 200;
    var txt = $('#editdiv').text();
    var text_length = txt.length;
  
    if (text_length > text_max)
    {
        $('#editdiv').text(txt.substr(0, text_max));
        text_length = text_max;
    }
       
    var text_remaining = text_max - text_length;
    $('span.msg').text(text_remaining);	
};

function stripHTMLTag(text) //jsȥhtmlǩ
{
    var reTag = /<[^img|>]+>/g;
    return text.replace(reTag,"");
}

function trim(str){ //ɾ˵Ŀո
	return str.replace(/(^\s*)|(\s*$)/g, "");
}


