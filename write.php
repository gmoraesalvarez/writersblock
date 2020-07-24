<!DOCTYPE html>
<html>
	<head>
		<title>Escritor <? $uuid = uniqid(); echo $uuid; ?></title>
        <link rel="icon" href="fav.png" type="icon">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="corpo.css?id=1.1" rel="stylesheet" type="text/css" >
    </head>
    <body>
<? ////rgba(0, 121, 107, 0.4)
/*$txt_ = '<p style="font-size: 32px; color: rgb(70, 70, 70); margin-bottom: 10px;">A primeira linha sempre é o título</p>'.
    '<p style="font-size: 24px; color: rgb(70, 70, 70); margin-bottom: 10px;">Linhas começando com " . " viram capítulos</p>'.
    '<p>&bull; Enter inicia uma linha de texto simples.</p><br>'.
    '<p style="font-size: 15px; color: rgb(250, 250, 250); background: rgba(0, 121, 107, 1.0) none repeat scroll 0% 0%;">'.
    'Linhas começando com " ! " viram anotações.</p><p style="font-size: 15px; color: rgb(70, 70, 70); background: rgba(130,130,130,0.4) none repeat scroll 0% 0%;">'.
    'Linhas começando com " = " viram citações ou diálogo.</p><p style="font-size: 15px; color: rgb(70, 70, 70);"></p><br>'.
    '<p>&bull; A avaliação da linha acontece ao pressionar ENTER.</p>'.
    '<p>&bull; Voltar para uma linha especial e criar novas linhas estende a formatação.</p>'.
    '<p>&bull; Em caso de dúvida, apagar uma linha sempre retorna pra texto simples.</p><p>&bull; Você pode copiar e colar em outro processador de texto preservando a formatação.</p>'.
    '<p>&bull; Ctrl+S salva o texto.</p>'; */
$txt_ = '<p style="font-size: 32px; color: rgb(70, 70, 70); margin-bottom: 10px;">A primeira linha sempre é o título</p>
<p style="color: rgb(70, 70, 70); font-size: 32px; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font-weight: 700;">Linhas começando com " $ " viram super títulos em negrito.</p>
<p style="font-size: 24px; color: rgb(70, 70, 70); margin-bottom: 10px;">Linhas começando com " . " viram capítulos.</p>
<p style="color: rgb(70, 70, 70);">Enter inicia uma linha de texto simples.</p>
<p style="color: rgb(0, 121, 107); font-size: 15px; font-weight: 700;">Linhas começando com " ! " viram letra verde.</p>
<p><span style="border-radius: 2px; padding: 0px 2px; color: rgb(70, 70, 70); background: rgba(130, 130, 130, 0.4)">Linhas começando com " = " viram destaques de fundo cinza.</span></p>
<p style="color: rgb(70, 70, 70); font-size: 12px; background: rgba(90, 90, 90, 0) none repeat scroll 0% 0%; font-weight: 700;">Linhas começando com " ; " viram subtítulo.</p>
<p><br></p>
<p style="color: rgb(70, 70, 70);">• Coloque " : " no início de qualquer linha para retirar sua formatação.</p>
<p style="color: rgb(70, 70, 70);">• Coloque " - ", " + " ou " = " no fim de uma linha para alinhá-la à esquerda, centro ou direita. </p>
<p style="color: rgb(70, 70, 70);">• Você pode copiar e colar em outro processador de texto preservando a formatação.</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+S salva o texto.</p><p style="color: rgb(70, 70, 70);">• Ctrl+B <b>negrito</b>.</p>
<p><br></p>
<p style="color: rgb(70, 70, 70);font-size: 13px; background: rgba(90, 90, 90, 0) none repeat scroll 0% 0%; font-weight: 700;">Para um texto selecionado:</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+I <i>itálico</i>.</p><p style="color: rgb(70, 70, 70);">• Ctrl+U <u>sublinha</u>.</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+(-) <strike>risca</strike>.</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+(1, 2, 3 ou 4) fundo <span style="background:#F57C00;color:#FAFAFA;">colorido</span>.</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+0 remove o fundo colorido.</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+L cria um link cujo endereço é a seleção.</p>
<p style="color: rgb(70, 70, 70);">• Ctrl+P insere uma imagem cujo endereço é a seleção.</p>';
        
$txt_h = $txt_;
$txt_ = $txt_.'<p><br>Esta mensagem se apagará ao primeiro toque do teclado.<br></p>';
if (isset($_GET['id'])){
    $txt = file_get_contents('dados/'.$_GET['id'].'.txt');
    if ($txt !== false) {
        $uuid = $_GET['id'];
        $txt_ = $txt;
        echo '<script>first = false;</script>';
    } else {echo '<script>first = true;</script>';}
} else {echo '<script>first = true;</script>';}
?>


      <div class='overdiv' id='overdiv'>
        <div class="writer" id="writer">
            <div class="ind" id="ind">modificado</div>
            <div class="mask" id='mask' contenteditable="true" onkeydown="ctrlkey(event)" onkeyup="onenter(event)"><? echo $txt_; ?></div>
            <div class="aide" id="aide">
                <div class='aidetxt'>
                    <? echo $txt_h; ?>
                </div>
            	<div class="save" onclick="salvar()"></div>
    	    	<div class="fulls" id='fullsbutton' onclick="fullscreen()"></div>
                <div class="dark" id='darkbutton' onclick="darktoggle()"></div>
            </div>
        	<div class='mess' id='mess'>
            	Use este código para continuar editando ou para ler este texto.<br>
            	<? echo $uuid; ?><br>
            	<a onclick="closeit();" href="javascript:void(0);">Fechar</a>
            </div>
            
	    </div>
      </div>
      <div class="aidebut">
         	<input type="checkbox" id="chkbx" onclick="getaide()">
            <label for="chkbx" class="frente"></label>
      </div>
    </body>
<script>
    fulls = false;
    dark = false;
    darkTextcolor = 'rgb(150,150,150)'; //actually meant darkMODEtextcolor
    darkTextcolorHEX = '#969696';
    lightTextcolor = 'rgb(70,70,70)'; //actually meant lightMODEtextcolor
    lightTextcolorHEX = '#464646';
    currentTextcolor = lightTextcolor;
    currentTextcolorHEX = lightTextcolorHEX;
    
    function getaide(){
        if (chkbx.checked) {
            aide.style.right='0px';
            aide.style.opacity='1';
        }
        else {
            setTimeout(function(){aide.style.right='-310px';}, 150);
            aide.style.opacity='0';            
        }
    }

    function fullscreen(){
        //writer.mozRequestFullscreen();
        if (fulls == false){
        	if (overdiv.webkitRequestFullscreen){overdiv.webkitRequestFullscreen(); }
        	if (overdiv.mozRequestFullScreen){overdiv.mozRequestFullScreen(); }
        	if (document.msRequestFullscreen){document.msRequestFullscreen(); }
        	fulls = true;
        	fullsbutton.style.backgroundImage = 'url("https://static.thenounproject.com/png/1404409-200.png")';
            chkbx.checked = false;
            getaide();
        } else
        /////////////////////////////////
        {
            if (overdiv.webkitRequestFullscreen){document.webkitExitFullscreen();}
        	if (overdiv.mozRequestFullScreen){document.mozCancelFullScreen();}
        	if (document.msRequestFullscreen){document.msExitFullscreen();}
            chkbx.checked = false;
            getaide();
            fulls = false;
            fullsbutton.style.backgroundImage = 'url("https://static.thenounproject.com/png/1393172-200.png")';
        }
    }
    function darktoggle(){
        if (dark == false){
        	document.body.style.background = '#252525';
        	writer.style.background = '#252525';
        	mask.style.background = '#252525';
            currentTextcolor = darkTextcolor;
            currentTextcolorHEX = darkTextcolorHEX;
       		chkbx.checked = false;
        	getaide();
            setDark();
        	dark = true;  
           
        } else {
            document.body.style.background = '#f1f1f1';
        	writer.style.background = '#f1f1f1';
        	mask.style.background = '#f1f1f1';
            setLight();
            currentTextcolor = lightTextcolor;
            currentTextcolorHEX = lightTextcolorHEX;
       		chkbx.checked = false;
        	getaide();
        	dark = false;
            
        }        
    }
    function closeit(){
        console.log('algo');
        mess.style.display='none';
    }
    document.execCommand("defaultParagraphSeparator", false, "p");
    function onenter(event){
        if (first == true) {mask.innerHTML='';}
        first = false;
        if (event.keyCode != 37 && event.keyCode != 38 && event.keyCode != 39 && event.keyCode != 40 &&
            event.keyCode != 17 && event.keyCode != 16 && event.keyCode != 18 && event.keyCode != 224 &&
            event.keyCode != 9 && event.keyCode != 33 && event.keyCode != 34 && event.keyCode != 35 &&
            event.keyCode != 83){ ind.style.opacity="1";mess.style.display='none'; }
        if (event.keyCode == 13){
            //console.log(mask.lastChild.previousSibling);
            //console.log(mask.firstChild);
            console.log('mask.childnodes = '+mask.childNodes.length);
            if (mask.childNodes.length > 2) {
                mask.lastChild.previousSibling.style.fontSize="15px";
                mask.lastChild.previousSibling.style.color=currentTextcolor;
                mask.lastChild.previousSibling.style.fontWeight='400';
                mask.lastChild.previousSibling.style.background='none';
            }
            if (mask.firstChild.tagName == null){
                console.log('não é p');
                temp = mask.firstChild.textContent;
                newP = document.createElement('p');
                newP.innerHTML = temp;
                mask.insertBefore(newP,mask.firstChild);
                mask.removeChild(mask.firstChild.nextSibling);
            }
            mask.firstChild.style.color=currentTextcolor;
            mask.firstChild.style.fontSize="32px";
            mask.firstChild.style.marginBottom="10px";
            ///////////////////////////////////////////////
            masknodes=Array.from(mask.childNodes);
            for (l=0;l<masknodes.length;l++){
                if (masknodes[l].tagName != null){
                switch (masknodes[l].innerHTML.substr(0,1)){
                	case '.':masknodes[l].style.fontSize="24px";
                	    masknodes[l].marginBottom="10px";
                        masknodes[l].style.fontWeight='300';
                        masknodes[l].style.color=currentTextcolor;
                    	masknodes[l].innerHTML=masknodes[l].innerHTML.substr(1);break;
                	case '=':masknodes[l].innerHTML=
                            '<span style="border-radius: 2px; padding: 0px 2px; color: rgb(70, 70, 70); background: rgba(130, 130, 130, 0.4)">'+
                            masknodes[l].innerHTML.substr(1)+'</span>';break;
                        	//masknodes[l].style.color=currentTextcolor;
                    		//masknodes[l].style.background='rgba(130,130,130, 0.4)';
                     case '!':masknodes[l].style.color="rgb(0, 121, 107)";
                        masknodes[l].style.fontSize="15px";
                        masknodes[l].style.fontWeight='700';
	                    masknodes[l].innerHTML=masknodes[l].innerHTML.substr(1);break;
                    case ';':masknodes[l].style.color='rgb(90, 90, 90)';
	                    masknodes[l].style.fontSize="12px";
                        masknodes[l].style.background='none';
                        masknodes[l].style.fontWeight='700';
                        masknodes[l].innerHTML=masknodes[l].innerHTML.substr(1);break;
                    case '$':masknodes[l].style.color=currentTextcolor;
	                    masknodes[l].style.fontSize="32px";
                        masknodes[l].style.background='none';
                        masknodes[l].style.fontWeight='700';
                        masknodes[l].innerHTML=masknodes[l].innerHTML.substr(1);break;
                    case ':':masknodes[l].style.color=currentTextcolor;
	                    masknodes[l].style.fontSize="15px";
                        masknodes[l].style.background='none';
                        masknodes[l].style.fontWeight='400';
                        masknodes[l].innerHTML=masknodes[l].innerHTML.substr(1);break;
                    //case '!':masknodes[l].style.color="rgb(250,250,250)";
	                //    masknodes[l].style.background="rgb(0, 121, 107)";
	                //    masknodes[l].innerHTML=masknodes[l].innerHTML.substr(1);break;
                }

                switch (masknodes[l].innerHTML.substr(-1,1)){
                    case '=':masknodes[l].style.textAlign="center";
                	   	masknodes[l].innerHTML=masknodes[l].innerHTML.slice(0,-1);break;
                    case "-":masknodes[l].style.textAlign="left";
                	   	masknodes[l].innerHTML=masknodes[l].innerHTML.slice(0,-1);break;
                    case "+":masknodes[l].style.textAlign="right";
                	   	masknodes[l].innerHTML=masknodes[l].innerHTML.slice(0,-1);break;
                }
                
                    
                //str_replace('@[','<a class="intextlink" target="_blank" href="',$le_txt);
                tempstr = masknodes[l].innerHTML;
                //tempstr = tempstr.split("@[").join("<a class='intextlink' target='_blank' href='");
          		//tempstr = tempstr.split(']@').join('">[clique aqui]</a>');
                //tempstr = tempstr.split('{{').join('<img class="intextimg" src="');
        		//tempstr = tempstr.split('}}').join('">');
                //console.log(tempstr);
                //masknodes[l].innerHTML = tempstr;
                }
            }
        }
    }

    function tit(){
        document.execCommand('styleWithCSS',false,null);
        document.execCommand('foreColor',false,'#313131');
        document.execCommand('backColor',false,'none');
        err = document.execCommand('fontSize',false,6);
        console.log(err);
    }
    function txt(){
        err = document.execCommand('removeFormat',false,3);
        console.log(err);
    }
	function salvar(autosave = false){
        console.log('salvar');
		setLight();
        server = 'https://'+'<? echo $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],'/')); ?>'+'/';
        data = mask.innerHTML+'<div style="display:none" id="savedata">'+Date()+'</div>';
        nome = '<? echo $uuid; ?>';
        if (autosave == false) { mess.style.display='block'; }
        ////////// SEND DADOS TO SERVER
    	saveremote = new XMLHttpRequest();
    	saveremote.open("POST", server+'save.php', true);
    	saveremote.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    	saveremote.send('save='+nome+'&dados='+data);
    	console.log('sent: '+data);
    	console.log('going for the save');
    	saveremote.onload = function(){
    		remotedebug=saveremote.responseText;
    		console.log('save feedback:\n '+remotedebug);
        }
        ind.style.opacity="0";
        if (currentTextcolor == darkTextcolor) { setDark(); }
    }
    function setLight(){
        //console.log('setlight');
        nodes = mask.getElementsByTagName("p");
        nodes_span = mask.getElementsByTagName("span");
        for(i=0;i<nodes.length;i++) {
    		if (nodes[i].style.color.indexOf('rgb(0, 121, 107)') == -1) { nodes[i].style.color = lightTextcolor; }
            //else {nodes[i].style.color = 'rgb(250, 250, 250)';}
		}
        for(i=0;i<nodes_span.length;i++) {
    		if (nodes_span[i].style.background.indexOf('rgb(0, 121, 107)') == -1 && 
               nodes_span[i].style.background.indexOf('rgb(245, 124, 9)') == -1 && 
               nodes_span[i].style.background.indexOf('rgb(186, 104, 200)') == -1) { nodes_span[i].style.color = lightTextcolor; }
            //else {nodes_span[i].style.color = 'rgb(250, 250, 250)';}
		}
    }
    function setDark(){
        //console.log('setdark');
        nodes = mask.getElementsByTagName("p");
        nodes_span = mask.getElementsByTagName("span");
        for(i=0;i<nodes.length;i++) {
            //console.log(nodes[i].style.background);
            if (nodes[i].style.color.indexOf('rgb(0, 121, 107)') == -1) { nodes[i].style.color = darkTextcolor; }
            //else {nodes[i].style.color = 'rgb(200, 200, 200)';}
		}
        for(i=0;i<nodes_span.length;i++) {
            //console.log(nodes[i].style.background);
            if (nodes_span[i].style.background.indexOf('rgb(0, 121, 107)') == -1 && 
               nodes_span[i].style.background.indexOf('rgb(245, 124, 9)') == -1 && 
               nodes_span[i].style.background.indexOf('rgb(186, 104, 200)') == -1) { nodes_span[i].style.color = darkTextcolor; }
            //else {nodes_span[i].style.color = 'rgb(200, 200, 200)';}
		}
    }
    
    setInterval(function() {
  		if ((first == false) && (ind.style.opacity == "1")) { salvar(true); }
	}, 15000);
    
    function createlink(){
        tempstr = getSelectionText();
        document.execCommand('createLink', false, tempstr);
        //if (tempstr.indexOf("@[") > 0){
        	//ini = tempstr.indexOf("@["); fim = tempstr.indexOf("]@");
            //lnk = tempstr.substr(ini+2,fim-ini-2);
            //console.log(lnk);
    	//}        
    }
    function createimg(){
        tempstr = getSelectionText();
        document.execCommand('insertImage', false, tempstr);
    }
    function setbold() {
        document.execCommand('bold', false);
    }
    function setitalic() {
        document.execCommand('italic', false);
    }
    function setunderline() {
        document.execCommand('underline', false);
    }
    function setstrike() {
        document.execCommand('strikeThrough', false);
    }
    function hilite(bg,color){
        tempstr = getSelectionText();
        document.execCommand('insertHTML', false, "<span style='border-radius:2px;padding:0 2px 0 2px;color:"+color+";background:"+bg+";'>"+tempstr+'</span>');
    }
    function dehilite(){
        tempstr = getSelectionText();
        document.execCommand('insertHTML', false, tempstr);
    }
    function getSelectionText() {
    	text = "";
    	if (window.getSelection) {
	        text = window.getSelection().toString();
	    } else if (document.selection && document.selection.type != "Control") {
	        text = document.selection.createRange().text;
	    }
	    return text;
	}
    function ctrlkey(event){
        if (event.ctrlKey){
            //console.log('ctrl+'+event.keyCode);
            c = event.keyCode;
            switch (c) {
            	case 83:
                    console.log('ctrl+s'); salvar(); ind.style.opacity = "0";
                    break;
                case 76:
                    console.log('ctrl+l'); createlink();
                    break;
                case 66:
                    console.log('ctrl+b'); setbold();
                    break;
                case 73:
                    console.log('ctrl+i'); setitalic();
                    break;
                case 85:
                    console.log('ctrl+u'); setunderline();
                    break;
                case 173:
                    console.log('ctrl+-'); setstrike();
                	break;
                case 80:
                    console.log('ctrl+p'); createimg();
                	break;
                case 49:
                    console.log('ctrl+1'); hilite('rgb(0, 121, 107)','rgb(250,250,250)');
                	break;
                case 50:
                    console.log('ctrl+2'); hilite('rgba(130, 130, 130, 0.4)',currentTextcolor);
                	break;
                case 51:
                    console.log('ctrl+3'); hilite('rgb(245, 124, 9)','rgb(250, 250, 250)');
                	break;
                case 52:
                    console.log('ctrl+4'); hilite('rgb(186, 104, 200)','rgb(250, 250, 250)');
                	break;
                case 48:
                    console.log('ctrl+0'); dehilite();
                	break;
            }
        }
        //if (event.ctrlKey && event.keyCode == 13){ console.log('ctrl+enter');}
    }

    document.onkeydown = function (e) {
    	e = e || window.event;//Get event
    	if (e.ctrlKey) {
        	var c = e.which || e.keyCode;//Get key code
            //console.log(c);
        	switch (c) {
            	case 83://Block Ctrl+S
	                e.preventDefault();     
	                e.stopPropagation();
                    break;
	            case 76://Block Ctrl+l
	                e.preventDefault();     
	                e.stopPropagation();
                    break;
	            case 66://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
                    break;
                case 73://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
                    break;
                case 85://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
                    break;
				case 173://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
	            	break;
                case 80://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
	            	break;
                case 49://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
	            	break;
                case 50://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
	            	break;
                case 51://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
	            	break;
                case 52://Block Ctrl+b
	                e.preventDefault();     
	                e.stopPropagation();
	            	break;
    	    }
	    }
	};
</script>
</html>
