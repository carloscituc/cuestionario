/*valor1 = document.getElementById('op112');
idOpcion = valor1.id;

valor2 = document.getElementById('seccion1');
idSeccion = valor2.id;

valor3 = document.getElementById('pregunta1');
idPregunta = valor3.id;*/

numSeccion = 1;
numPregunta = 1;
numOpcion = 2;

num=2;
//botón agregar
function crear(obj) {
    numOpcion++;
    num++;
    //alert(num);
    idCrear1 = document.getElementById(obj);
    idCrear = idCrear1.id;
    idSeccion=idCrear.charAt(10);//btnAgregar11
    idPregunta=idCrear.charAt(11);//btnAgregar11

    var op1 = document.getElementById('opcion112').cloneNode(false);
    op1.id='opcion'+idSeccion+idPregunta+numOpcion;
    document.getElementById('filaBtnAgregar'+idSeccion+idPregunta).parentNode.insertBefore(op1,document.getElementById('filaBtnAgregar'+idSeccion+idPregunta));

    contenedor = document.createElement('div'); 
    contenedor.className = 'col-md-8';
    contenedor.style = 'margin-top:15px;';
    contenedor.id = "filaOpcion"+num;
    op1.appendChild(contenedor); 

    ele2 = document.createElement('label');
    ele2.id='label'+idSeccion+idPregunta+numOpcion;
    ele2.setAttribute('for','label'+idSeccion+idPregunta+numOpcion);
    ele2.innerHTML='Opción '+num+':';
    contenedor.appendChild(ele2);

    ele7 = document.createElement('div'); 
    ele7.className = 'input-group';
    contenedor.appendChild(ele7);

    ele3 = document.createElement('input'); 
    ele3.type = 'text'; 
    ele3.name = 'op'+idSeccion+idPregunta+numOpcion;
    ele3.id = 'op'+idSeccion+idPregunta+numOpcion;
    ele3.className = 'form-control';
    ele7.appendChild(ele3);

    ele4 = document.createElement('span');
    ele4.className = 'input-group-btn';
    ele7.appendChild(ele4);

    ele5 = document.createElement('button');
    ele5.className = 'btn btn-danger';
    ele5.type = 'button';
    ele5.id = 'btn'+idSeccion+idPregunta+numOpcion;
    ele5.setAttribute('onclick','eliminarOpcion(this.id);');
    ele4.appendChild(ele5);

    ele6 = document.createElement('span');
    ele6.className = 'glyphicon glyphicon-remove';
    ele6.setAttribute('aria-hidden','true');
    ele5.appendChild(ele6);

    if(num==10){
        idCrear1.disabled=true;
    }
}

//botón eliminar Opción de la pregunta
function eliminarOpcion(x){
    idOpcion = document.getElementById(x);
    value = idOpcion.id;
    idSeccion=value.charAt(3);//btn113
    idPregunta=value.charAt(4);//btn113

    //alert(value);
    /*alert(idSeccion);
    alert(idPregunta);*/

    j=3;
    numOpcion--;
    num--;
    switch(value){
        case 'btn'+idSeccion+idPregunta+'3':
            j=3;
            for(k=4;k<11;k++){
                var id = document.getElementById('op'+idSeccion+idPregunta+k);//----input siguiente
                if(id!=null){
                    //alert("Funciona");
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar boton
                    idbtn = document.getElementById('btn'+idSeccion+idPregunta+k);
                    idbtn.id='btn'+idSeccion+idPregunta+j;
                    //renombrar input
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    //renombrar label
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;            
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'3');//recuperar input 3 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 3
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+4:
            j=4;
            for(k=5;k<11;k++){
                id = document.getElementById('op'+idSeccion+idPregunta+k);
                if(id!=null){
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar input ylabel
                    idbtn = document.getElementById('btn'+idSeccion+idPregunta+k);
                    idbtn.id='btn'+idSeccion+idPregunta+j;
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;  
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'4');//recuperar input 4 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 4
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+5:
            j=5;
            for(k=6;k<11;k++){
                id = document.getElementById('op'+idSeccion+idPregunta+k);
                if(id!=null){
                    //alert("Funciona");
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar input ylabel
                    idbtn = document.getElementById('btn'+idSeccion+idPregunta+k);
                    idbtn.id='btn'+idSeccion+idPregunta+j;
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;  
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'5');//recuperar input 5 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 5
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+6:
            j=6;
            for(k=7;k<11;k++){
                id = document.getElementById('op'+idSeccion+idPregunta+k);
                if(id!=null){
                    //alert("Funciona");
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar input ylabel
                    idbtn = document.getElementById('btn'+idSeccion+idPregunta+k);
                    idbtn.id='btn'+idSeccion+idPregunta+j;
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;  
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'6');//recuperar input 3 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 6
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+7:
            j=7;
            for(k=8;k<11;k++){
                id = document.getElementById('op'+idSeccion+idPregunta+k);
                if(id!=null){
                    //alert("Funciona");
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar input ylabel
                    idbtn = document.getElementById('btn'+idSeccion+idPregunta+k);
                    idbtn.id='btn'+idSeccion+idPregunta+j;
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;  
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'7');//recuperar input 3 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 7
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+8:
            j=8;
            for(k=9;k<11;k++){
                id = document.getElementById('op'+idSeccion+idPregunta+k);
                if(id!=null){
                    //alert("Funciona");
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar input ylabel
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;  
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'8');//recuperar input 3 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 8
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+9:
            j=9;
            for(k=10;k<11;k++){
                id = document.getElementById('op'+idSeccion+idPregunta+k);
                if(id!=null){
                    //alert("Funciona");
                    //renombrar div padre
                    idDivPadre = document.getElementById('opcion'+idSeccion+idPregunta+k);
                    idDivPadre.id='opcion'+idSeccion+idPregunta+j;
                    //renombrar input ylabel
                    idbtn = document.getElementById('btn'+idSeccion+idPregunta+k);
                    idbtn.id='btn'+idSeccion+idPregunta+j;
                    id.id = 'op'+idSeccion+idPregunta+j;
                    id.name= 'op'+idSeccion+idPregunta+j;
                    idlabel = document.getElementById('label'+idSeccion+idPregunta+k);
                    idlabel.setAttribute('for','label'+idSeccion+idPregunta+j);
                    idlabel.id='label'+idSeccion+idPregunta+j;
                    idlabel.innerHTML='Opción'+j+':';
                    j++;  
                }
            }
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'9');//recuperar input 9 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 9
            j = j-1;
            break;
        case 'btn'+idSeccion+idPregunta+10:
            iddivEl1 = document.getElementById('opcion'+idSeccion+idPregunta+'10');//recuperar input 9 para eliminar
            iddivEl1.parentNode.removeChild(iddivEl1);//se elimina input 9
            break;
        default:
            alert("No existe");
            break;
    }
    if(num<10){
        idCrear1.disabled=false;
    }
}

//Pasar valor del select al input para recuperar valor
/*function valor(g){
    
    document.getElementById('conSelect'+idSeccion+idPregunta).value=g;
}*/

//botón finalizar pregunta
function finalizarPregunta(fin){

    idFinalizar1 = document.getElementById(fin);
    idFinalizar = idFinalizar1.id;
    idSeccion=idFinalizar.charAt(12);//btnFinalizar11
    idPregunta=idFinalizar.charAt(13);//btnFinalizar11
    /*alert(idFinalizar);
    alert(idSeccion);
    alert(idPregunta);*/
    
    totalOpciones = document.getElementById('conOpcion'+idSeccion+idPregunta);
    tOpciones = numOpcion;
    //alert(tOpciones);
    totalOpciones.setAttribute('value',tOpciones);
    numOpcion=2;
    num=1;
    

    formulario = document.getElementById("Pregunta"+idSeccion+idPregunta);
    eleInput = formulario.getElementsByTagName("input");
    eleLabel = formulario.getElementsByTagName("select");
    eleButton = formulario.getElementsByTagName("button");
    //alert('Se encontraron '+eleInput.length+' Elementos que se van a deshabilitar');
    for (i=0;i<eleInput.length;i++){
        eleInput[i].setAttribute('readonly','readonly');
    }

    //alert('Se encontraron '+eleButton.length+' Elementos que se van a deshabilitar');
    for (i=0;i<eleButton.length;i++){
        eleButton[i].disabled = true;
    }

    //alert('Se encontraron '+eleLabel.length+' Elementos que se van a deshabilitar');
    val = document.getElementById('puntaje'+idSeccion+idPregunta);
    val1 = val.value;
    val.disabled=true;
    
    document.getElementById('conSelect'+idSeccion+idPregunta).value=val1;

    btnFinalizar = document.getElementById('btnFinalizar'+idSeccion+idPregunta);
    btnAgregar = document.getElementById('btnAgregar'+idSeccion+idPregunta);
    btnModificar = document.getElementById('btnModificar'+idSeccion+idPregunta);

    btnFinalizar.disabled=true;
    btnAgregar.disabled=true;
    btnModificar.style.visibility='visible';
    btnModificar.disabled=false;

    btnAgPregunta = document.getElementById('btnAgPregunta'+idSeccion);
    btnAgPregunta.disabled=false;
    
    
    

}

//boton modificar
function modificarPregunta(b){

    idModificar1 = document.getElementById(b);
    idModificar = idModificar1.id;
    idSeccion=idModificar.charAt(12);//btnModificar11
    idPregunta=idModificar.charAt(13);//btnModificar11

    formulario = document.getElementById("Pregunta"+idSeccion+idPregunta);
    eleInput = formulario.getElementsByTagName("input");
    eleLabel = formulario.getElementsByTagName("select");
    eleButton = formulario.getElementsByTagName("button");


    //alert('Se encontraron '+eleInput.length+' Elementos que se van habilitar');
    for (i=0;i<eleInput.length;i++){
        eleInput[i].removeAttribute('readonly');
    }

    //alert('Se encontraron '+eleButton.length+' Elementos que se van a deshabilitar');
    for (i=0;i<eleButton.length;i++){
        eleButton[i].disabled = false;
    }
    
    //alert('Se encontraron '+eleLabel.length+' Elementos que se van a habilitar');
    document.getElementById('puntaje'+idSeccion+idPregunta).disabled=false;

    btnFinalizar = document.getElementById('btnFinalizar'+idSeccion+idPregunta);
    btnAgregar = document.getElementById('btnAgregar'+idSeccion+idPregunta);
    btnModificar = document.getElementById('btnModificar'+idSeccion+idPregunta);

    btnFinalizar.disabled=false;
    btnModificar.style.visibility='hidden';

    btnAgPregunta = document.getElementById('btnAgPregunta'+idSeccion);
    btnAgPregunta.disabled=true;



    //------------------------------------------------------------------------------
    //Contar opciones para inicializar numOpcion y num
    cont=0;
        for(i=1;i<11;i++){
            opcion = document.getElementById('op'+idSeccion+idPregunta+i);
            //alert(opcion);
            if(opcion!=null){
                var cont=cont+1;
            }
        }
    numOpcion = cont;
    num = cont; 
    //alert(numOpcion);
    //alert(num);
    if(num!=10){
        btnAgregar.disabled=false;
    }else{
        btnAgregar.disabled=true; 
    }
}


function idBtnPregunta(e){
    btnPregunta1 = document.getElementById(e);
    btnPregunta = btnPregunta1.id;
    idSeccionPregunta=btnPregunta.charAt(13);//antes1
}


j=1;
num=2;
function agrePregunta(x,e){

    j++;
    num++;
    numPregunta++;
    
    btnPregunta1 = document.getElementById(e);
    btnPregunta2 = btnPregunta1.id;
    idSeccionPregunta = btnPregunta2.charAt(13);
    btnPregunta1.disabled=true;
    
    //<div class="row" id="Pregunta1">    
    var clon = document.getElementById('Pregunta11').cloneNode(x);
    clon.id='Pregunta'+numSeccion+numPregunta;
    clon.style='-webkit-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);-moz-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);padding-bottom: 15px;';
    document.getElementById('antes'+idSeccionPregunta).parentNode.insertBefore(clon,document.getElementById('antes'+idSeccionPregunta));

    //<div class="col-md-12" id="pregunta">
    var clon2 = document.getElementById('divInstrucciones1').cloneNode(x);
    clon2.id='divInstrucciones'+numPregunta;
    clon2.style='margin-bottom: 15px;';
    clon.appendChild(clon2);

    //<div class="row" id="filaPregunta1">
    var filaPregunta = document.getElementById('filaPregunta1').cloneNode(x);
    filaPregunta.id='filaPregunta'+numPregunta;
    clon2.appendChild(filaPregunta);

    //<div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta1'>
    var columnaPregunta = document.getElementById('columnaPregunta1').cloneNode(x);
    columnaPregunta.id='columnaPregunta'+numPregunta;
    filaPregunta.appendChild(columnaPregunta);

    //<label for="id_instrucciones">
    var escribePregunta1 = document.getElementById('id_instrucciones').cloneNode(x);
    escribePregunta1.id='labelpregunta'+numSeccion+numPregunta;
    escribePregunta1.innerHTML='Escribe la pregunta';
    columnaPregunta.appendChild(escribePregunta1);

    //<input type="text" class="form-control" id="inputPregunta1">
    var inputPregunta1 = document.getElementById('pregunta11').cloneNode(x);
    inputPregunta1.id='pregunta'+numSeccion+numPregunta;
    inputPregunta1.name='pregunta'+numSeccion+numPregunta;
    inputPregunta1.removeAttribute('readonly');
    columnaPregunta.appendChild(inputPregunta1);

    //<div class="row" id='filaRespuestas1'>
    var filaRespuestas1 = document.getElementById('filaRespuestas1').cloneNode(x);
    filaRespuestas1.id='filaRespuestas'+j;
    clon2.appendChild(filaRespuestas1);

    //<div class="col-md-1" style="margin-top:15px;" id="columnaRespuestas1">
    var columnaRespuestas1 = document.getElementById('columnaRespuestas1').cloneNode(x);
    columnaRespuestas1.id='columnaRespuestas'+numPregunta;
    filaRespuestas1.appendChild(columnaRespuestas1);

    //<label for="id_puntaje" id="puntajePregunta1">
    var puntajePregunta1 = document.getElementById('puntajePregunta1').cloneNode(x);
    puntajePregunta1.id='puntajePregunta'+numPregunta;
    puntajePregunta1.setAttribute('for','puntajePregunta'+numPregunta);
    columnaRespuestas1.appendChild(puntajePregunta1);

    //<select class="form-control" id="puntaje1">
    var puntaje1 = document.getElementById('puntaje11').cloneNode(x);
    puntaje1.id='puntaje'+numSeccion+numPregunta;
    puntaje1.name='puntaje'+numSeccion+numPregunta;
    puntaje1.style='margin-right: 150px;';
    puntaje1.onchange='valor(this.options[this.selectedIndex].innerHTML);';
    puntaje1.disabled=false;
    puntajePregunta1.appendChild(puntaje1);
    //option select

    // <option id="opcion1">
    var opcion1 = document.getElementById('opcion1').cloneNode(x);
    opcion1.id='opcion1';
    opcion1.nodeValue='1';
    opcion1.innerHTML='1';
    puntaje1.appendChild(opcion1);
    // <option id="opcion2">
    var opcion2 = document.getElementById('opcion2').cloneNode(x);
    opcion2.id='opcion2';
    opcion2.nodeValue='2';
    opcion2.innerHTML='2';
    puntaje1.appendChild(opcion2);
    // <option id="opcion3">
    var opcion3 = document.getElementById('opcion3').cloneNode(x);
    opcion3.id='opcion3';
    opcion3.nodeValue='3';
    opcion3.innerHTML='3';
    puntaje1.appendChild(opcion3);
    // <option id="opcion4">
    var opcion4 = document.getElementById('opcion4').cloneNode(x);
    opcion4.id='opcion4';
    opcion4.nodeValue='4';
    opcion4.innerHTML='4';
    puntaje1.appendChild(opcion4);
    // <option id="opcion5">
    var opcion5 = document.getElementById('opcion5').cloneNode(x);
    opcion5.id='opcion5';
    opcion5.nodeValue='5';
    opcion5.innerHTML='5';
    puntaje1.appendChild(opcion5);
    // <option id="opcion6">
    var opcion6 = document.getElementById('opcion6').cloneNode(x);
    opcion6.id='opcion6';
    opcion6.nodeValue='6';
    opcion6.innerHTML='6';
    puntaje1.appendChild(opcion6);
    // <option id="opcion7">
    var opcion7 = document.getElementById('opcion7').cloneNode(x);
    opcion7.id='opcion7';
    opcion7.nodeValue='7';
    opcion7.innerHTML='7';
    puntaje1.appendChild(opcion7);
    // <option id="opcion8">
    var opcion8 = document.getElementById('opcion8').cloneNode(x);
    opcion8.id='opcion8';
    opcion8.nodeValue='8';
    opcion8.innerHTML='8';
    puntaje1.appendChild(opcion8);
    // <option id="opcio9">
    var opcion9 = document.getElementById('opcion9').cloneNode(x);
    opcion9.id='opcion9';
    opcion9.nodeValue='9';
    opcion9.innerHTML='9';
    puntaje1.appendChild(opcion9);
    // <option id="opcion10">
    var opcion10 = document.getElementById('opcion10').cloneNode(x);
    opcion10.id='opcion10';
    opcion10.nodeValue='10';
    opcion10.innerHTML='10';
    puntaje1.appendChild(opcion10);

    //<div class="row" id="filaConSelect11">
    var filaConSelect1 = document.getElementById('filaConSelect11').cloneNode(x);
    filaConSelect1.id='filaConSelect'+numSeccion+numPregunta;
    clon2.appendChild(filaConSelect1);
    
    //<div class="col-md-8" id="colConSelect11">   
    var colConSelect1 = document.getElementById('colConSelect11').cloneNode(x);
    colConSelect1.id='colConSelect'+numSeccion+numPregunta;
    filaConSelect1.appendChild(colConSelect1);
    
    //<input type="hidden" class="form-control" id="conSelect11" name="conSelect11">
    var conSelect1 = document.getElementById('conSelect11').cloneNode(x);
    conSelect1.id='conSelect'+numSeccion+numPregunta;
    conSelect1.name='conSelect'+numSeccion+numPregunta;
    conSelect1.setAttribute('value','');
    colConSelect1.appendChild(conSelect1);
    
    //<div class="row" id="opcion111">
    var op1 = document.getElementById('opcion111').cloneNode(x);
    op1.id='opcion'+numSeccion+numPregunta+numOpcion;
    clon2.appendChild(op1);

    //<div class="col-md-8" style="margin-top:15px;" id="filaOpcion1">
    var filaOpcion1 = document.getElementById('filaOpcion1').cloneNode(x);
    filaOpcion1.id='filaOpcion'+numSeccion+numPregunta+numOpcion;
    op1.appendChild(filaOpcion1);

    //<label for="opcion12" id="opcion12" >
    var opcion12 = document.getElementById('label111').cloneNode(x);
    opcion12.id='label'+numSeccion+numPregunta+'1';
    opcion12.innerHTML='Opcion 1:';
    filaOpcion1.appendChild(opcion12);

    //<input type="text" class="form-control" id="inputOpcion1">
    var inputOpcion1 = document.getElementById('op111').cloneNode(x);
    inputOpcion1.id='op'+numSeccion+numPregunta+'1';
    inputOpcion1.name='op'+numSeccion+numPregunta+'1';
    inputOpcion1.removeAttribute('readonly');
    filaOpcion1.appendChild(inputOpcion1);

    //<div class="row" id="op2">
    var op2 = document.getElementById('opcion112').cloneNode(x);
    op2.id='opcion'+numSeccion+numPregunta+'2';
    clon2.appendChild(op2);

    // <div class="col-md-8" style="margin-top:15px;" id="filaOpcion2"
    var filaOpcion2 = document.getElementById('filaOpcion2').cloneNode(x);
    filaOpcion2.id='filaOpcion'+j;
    op2.appendChild(filaOpcion2);

    //<label for="opcion2" id="opcion21" name="opcion2">
    var opcion21 = document.getElementById('label112').cloneNode(x);
    opcion21.id='label'+numSeccion+numPregunta+'2';
    opcion21.innerHTML='Opcion 2:';
    filaOpcion2.appendChild(opcion21);

    //<input type="text" class="form-control" id="inputOpcion2">
    var inputOpcion2 = document.getElementById('op112').cloneNode(x);
    inputOpcion2.id='op'+numSeccion+numPregunta+'2';
    inputOpcion2.name='op'+numSeccion+numPregunta+'2';
    inputOpcion2.removeAttribute('readonly');
    filaOpcion2.appendChild(inputOpcion2);
    
    //<div class="row" id="filaConOpcion11">
    var filaConOpcion1 = document.getElementById('filaConOpcion11').cloneNode(x);
    filaConOpcion1.id='filaConOpcion'+numSeccion+numPregunta;
    clon2.appendChild(filaConOpcion1);  
    
    //<div class="col-md-8" id="colConOpcion11">
    var colConOpcion1 = document.getElementById('colConOpcion11').cloneNode(x);
    colConOpcion1.id='colConOpcion'+numSeccion+numPregunta;
    filaConOpcion1.appendChild(colConOpcion1);  
    
    //<input type="hidden" class="form-control" id="conOpcion11" name="conOpcion11">
    var conOpcion1 = document.getElementById('conOpcion11').cloneNode(x);
    conOpcion1.id='conOpcion'+numSeccion+numPregunta;
    conOpcion1.name='conOpcion'+numSeccion+numPregunta;
    colConOpcion1.appendChild(conOpcion1);
    

    //<div class="row" id="filaBtnAgregar11">
    var filaBtnAgregar1 = document.getElementById('filaBtnAgregar11').cloneNode(x);
    filaBtnAgregar1.id='filaBtnAgregar'+numSeccion+numPregunta;
    clon2.appendChild(filaBtnAgregar1);    

    //<div class="col-md-4 col-xs-4 col-xs-push-1" id="agregar">
    var agregar1 = document.getElementById('agregar1').cloneNode(x);
    agregar1.id='filaBtnAgregar'+j;
    filaBtnAgregar1.appendChild(agregar1);

    //<button type="button" class="btn btn-success btn-sm" onclick="crear(this);" id="btnAgregar11">
    var btnAgregar1 = document.getElementById('btnAgregar11').cloneNode(x);
    btnAgregar1.id='btnAgregar'+numSeccion+numPregunta;
    btnAgregar1.innerHTML='Agregar Opción';
    btnAgregar1.style='margin-top: 40px;margin-left: -10px;';
    btnAgregar1.disabled=false;
    agregar1.appendChild(btnAgregar1);

    //<span class="glyphicon glyphicon-plus" id='iconoOp11'>
    var iconoOp = document.getElementById('iconoOp11').cloneNode(x);
    iconoOp.id='iconoOp'+numSeccion+numPregunta;
    btnAgregar1.appendChild(iconoOp);

    //<div class="col-md-4 col-xs-4 col-md-offset-0 col-xs-push-1" id="finPregunta11">
    var finPregunta1 = document.getElementById('finPregunta11').cloneNode(x);
    finPregunta1.id='finPregunta'+numSeccion+numPregunta;
    finPregunta1.style='margin-top: 40px;margin-left: -10px;';
    filaBtnAgregar1.appendChild(finPregunta1);

    //<button id="btnFinalizar11" type="button" class="btn btn-primary btn-sm" onclick="finalizarPregunta();">
    var btnFinalizar1 = document.getElementById('btnFinalizar11').cloneNode(x);
    btnFinalizar1.id='btnFinalizar'+numSeccion+numPregunta;
    btnFinalizar1.innerHTML='Finalizar pregunta';
    btnFinalizar1.disabled=false;
    finPregunta1.appendChild(btnFinalizar1);


    //<div class="col-md-4 col-xs-4 col-md-offset-2 col-xs-push-1" id="modificarPregunta11" style="margin-left:-10px">
    var modificarPregunta1 = document.getElementById('modificarPregunta11').cloneNode(x);
    modificarPregunta1.id='modificarPregunta'+numSeccion+numPregunta;
    filaBtnAgregar1.appendChild(modificarPregunta1);

    //<button id="btnModificar11" type="button" class="btn btn-primary btn-sm" onclick="modificarPregunta();">
    var btnModificar1 = document.getElementById('btnModificar11').cloneNode(x);
    btnModificar1.id='btnModificar'+numSeccion+numPregunta;
    btnModificar1.innerHTML='Modificar pregunta';
    btnModificar1.style='visibility: hidden;';
    modificarPregunta1.appendChild(btnModificar1);

}


//botón finalizar sección
function finSeccion(r){
    btnfinSec1 = document.getElementById(r);
    btnfinSec = btnfinSec1 .id;
    idFinSeccion = btnfinSec.charAt(9);//btnFinSec1
    
    totalPreguntas = document.getElementById('conPregunta'+idFinSeccion);
    totalPreguntas.setAttribute('value',numPregunta);
    //alert(numPregunta);
    
    Form = document.getElementById("bloque"+idFinSeccion);
    Elemento = Form.getElementsByTagName("input");
    Elemento2 = Form.getElementsByTagName("select");
    Elemento3 = Form.getElementsByTagName("button");
    
    //alert('Se encontraron '+Elemento.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elemento.length;i++){
        Elemento[i].setAttribute('readonly','readonly');
    }
    
    //alert('Se encontraron '+Elemento2.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elemento2.length;i++){
        Elemento2[i].disabled=true;
    }
    
    //alert('Se encontraron '+Elemento3.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elemento3.length;i++){
        Elemento3[i].disabled = true;
    }
    
    btnAgSeccion.disabled=false;
    btnFinCuestionario.disabled=false;
    
    totalSeccion = document.getElementById('conSeccion1');
    totalSeccion.setAttribute('value',numSeccion);
    /*alert(numSeccion);*/
}


//boton finalizar cuestionario
function finalizarCuestionario(){
    Forma = document.getElementById("form1");
    Elementos = Forma.getElementsByTagName("input");
    Elementos2 = Forma.getElementsByTagName("select");
    Elementos3 = Forma.getElementsByTagName("button");
    
    //alert('Se encontraron '+Elementos.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elementos.length;i++){
        Elementos[i].setAttribute('readonly','readonly');
    }
    
    //alert('Se encontraron '+Elementos2.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elementos2.length;i++){
        Elementos2[i].setAttribute('readonly','readonly');
    }
    
    //alert('Se encontraron '+Elementos2.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elementos3.length;i++){
        Elementos3[i].disabled = true;
    }
}



function agregarSeccion(c){
    j++;
    num++;
    numPregunta=1;
    numSeccion++;
    
    btnAgSeccion.disabled=true;
    btnFinCuestionario.disabled=true;
    
    //<div class="form-group" id="seccion1">
    var seccion1 = document.getElementById('seccion1').cloneNode(c);
    seccion1.id='seccion'+numSeccion;
    document.getElementById('btnFinales').parentNode.insertBefore(seccion1,document.getElementById('btnFinales'));
    
    //<div class="row" id="filaSeccion1">
    var filaSeccion1 = document.getElementById('filaSeccion1').cloneNode(c);
    filaSeccion1.id='filaSeccion'+numSeccion;
    seccion1.appendChild(filaSeccion1);
    
    //<div class="col-sm-12" id="columnaSeccion1">
    var columnaSeccion1 = document.getElementById('columnaSeccion1').cloneNode(c);
    columnaSeccion1.id='columnaSeccion'+numSeccion;
    filaSeccion1.appendChild(columnaSeccion1);
    
    //<div class="col-md-12 col-md-offset-0 well" id="bloque1">
    var bloque1 = document.getElementById('bloque1').cloneNode(c);
    bloque1.id='bloque'+numSeccion;
    bloque1.style = '-webkit-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75); -moz-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75); box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75); padding-bottom: 15px;';
    columnaSeccion1.appendChild(bloque1);
    
    //<h3 id="numSeccion1">Sección #1</h3>
    var numSeccion1 = document.getElementById('numSeccion1').cloneNode(c);
    numSeccion1.id='numSeccion'+numSeccion;
    numSeccion1.innerHTML='Sección #'+numSeccion;
    bloque1.appendChild(numSeccion1);
    
    //<div class="row" id="filaInstruciones1">
    var filaInstruciones1 = document.getElementById('filaInstruciones1').cloneNode(c);
    filaInstruciones1.id='filaInstruciones'+numSeccion;
    bloque1.appendChild(filaInstruciones1);
    
    //<div class="col-md-12" id="columnaInstrucciones1">
    var columnaInstrucciones1 = document.getElementById('columnaInstrucciones1').cloneNode(c);
    columnaInstrucciones1.id='columnaInstrucciones'+numSeccion;
    filaInstruciones1.appendChild(columnaInstrucciones1);
    
    
    //<label for="instruccionesSeccion1" id="instruccionesSeccion1">
    var instruccionesSeccion1 = document.getElementById('instruccionesSeccion1').cloneNode(c);
    instruccionesSeccion1.setAttribute('for','instruccionesSeccion'+numSeccion);
    instruccionesSeccion1.id='instruccionesSeccion'+numSeccion;
    instruccionesSeccion1.innerHTML='Escribe las instrucciones de la sección:';
    columnaInstrucciones1.appendChild(instruccionesSeccion1);
    
    //<input type="text" id="instrucciones1" name="instrucciones1" class="form-control">
    var instrucciones1 = document.getElementById('instrucciones1').cloneNode(c);
    instrucciones1.id='instrucciones'+numSeccion;
    instrucciones1.name='instrucciones'+numSeccion;
    instrucciones1.style='margin-bottom: 15px;';
    instrucciones1.removeAttribute('readonly');
    columnaInstrucciones1.appendChild(instrucciones1);
    
    //<div class="row" id="Pregunta11">    
    var clon = document.getElementById('Pregunta11').cloneNode(c);
    clon.id='Pregunta'+numSeccion+'1';
    clon.style='-webkit-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);-moz-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);padding-bottom: 15px;';
    bloque1.appendChild(clon);
    //document.getElementById('antes').parentNode.insertBefore(clon,document.getElementById('antes'));

    //<div class="col-md-12" id="pregunta">
    var clon2 = document.getElementById('divInstrucciones1').cloneNode(c);
    clon2.id='divInstrucciones'+numPregunta;
    clon2.style='margin-bottom: 15px;';
    clon.appendChild(clon2);

    //<div class="row" id="filaPregunta1">
    var filaPregunta = document.getElementById('filaPregunta1').cloneNode(c);
    filaPregunta.id='filaPregunta'+'1';
    clon2.appendChild(filaPregunta);

    //<div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta1'>
    var columnaPregunta = document.getElementById('columnaPregunta1').cloneNode(c);
    columnaPregunta.id='columnaPregunta'+'1';
    filaPregunta.appendChild(columnaPregunta);

    //<label for="id_instrucciones">
    var escribePregunta1 = document.getElementById('id_instrucciones').cloneNode(c);
    escribePregunta1.id='labelpregunta'+numSeccion+'1';
    escribePregunta1.innerHTML='Escribe la pregunta';
    columnaPregunta.appendChild(escribePregunta1);

    //<input type="text" class="form-control" id="inputPregunta1">
    var inputPregunta1 = document.getElementById('pregunta11').cloneNode(c);
    inputPregunta1.id='pregunta'+numSeccion+'1';
    inputPregunta1.name='pregunta'+numSeccion+'1';
    inputPregunta1.removeAttribute('readonly');
    columnaPregunta.appendChild(inputPregunta1);

    //<div class="row" id='filaRespuestas1'>
    var filaRespuestas1 = document.getElementById('filaRespuestas1').cloneNode(c);
    filaRespuestas1.id='filaRespuestas'+j;
    clon2.appendChild(filaRespuestas1);

    //<div class="col-md-1" style="margin-top:15px;" id="columnaRespuestas1">
    var columnaRespuestas1 = document.getElementById('columnaRespuestas1').cloneNode(c);
    columnaRespuestas1.id='columnaRespuestas'+'1';
    filaRespuestas1.appendChild(columnaRespuestas1);

    //<label for="id_puntaje" id="puntajePregunta1">
    var puntajePregunta1 = document.getElementById('puntajePregunta1').cloneNode(c);
    puntajePregunta1.id='puntajePregunta'+numSeccion+'1';
    puntajePregunta1.setAttribute('for','puntajePregunta'+numSeccion1+'1');
    columnaRespuestas1.appendChild(puntajePregunta1);

    //<select class="form-control" id="puntaje1">
    var puntaje1 = document.getElementById('puntaje11').cloneNode(c);
    puntaje1.id='puntaje'+numSeccion+'1';
    puntaje1.name='puntaje'+numSeccion+'1';
    puntaje1.style='margin-right: 150px;';
    puntaje1.onchange='valor(this.options[this.selectedIndex].innerHTML);'
    puntaje1.disabled=false;
    puntajePregunta1.appendChild(puntaje1);
    //option select

    // <option id="opcion1">
    var opcion1 = document.getElementById('opcion1').cloneNode(c);
    opcion1.id='opcion1';
    opcion1.nodeValue='1';
    opcion1.innerHTML='1';
    puntaje1.appendChild(opcion1);
    // <option id="opcion2">
    var opcion2 = document.getElementById('opcion2').cloneNode(c);
    opcion2.id='opcion2';
    opcion2.nodeValue='2';
    opcion2.innerHTML='2';
    puntaje1.appendChild(opcion2);
    // <option id="opcion3">
    var opcion3 = document.getElementById('opcion3').cloneNode(c);
    opcion3.id='opcion3';
    opcion3.nodeValue='3';
    opcion3.innerHTML='3';
    puntaje1.appendChild(opcion3);
    // <option id="opcion4">
    var opcion4 = document.getElementById('opcion4').cloneNode(c);
    opcion4.id='opcion4';
    opcion4.nodeValue='4';
    opcion4.innerHTML='4';
    puntaje1.appendChild(opcion4);
    // <option id="opcion5">
    var opcion5 = document.getElementById('opcion5').cloneNode(c);
    opcion5.id='opcion5';
    opcion5.nodeValue='5';
    opcion5.innerHTML='5';
    puntaje1.appendChild(opcion5);
    // <option id="opcion6">
    var opcion6 = document.getElementById('opcion6').cloneNode(c);
    opcion6.id='opcion6';
    opcion6.nodeValue='6';
    opcion6.innerHTML='6';
    puntaje1.appendChild(opcion6);
    // <option id="opcion7">
    var opcion7 = document.getElementById('opcion7').cloneNode(c);
    opcion7.id='opcion7';
    opcion7.nodeValue='7';
    opcion7.innerHTML='7';
    puntaje1.appendChild(opcion7);
    // <option id="opcion8">
    var opcion8 = document.getElementById('opcion8').cloneNode(c);
    opcion8.id='opcion8';
    opcion8.nodeValue='8';
    opcion8.innerHTML='8';
    puntaje1.appendChild(opcion8);
    // <option id="opcio9">
    var opcion9 = document.getElementById('opcion9').cloneNode(c);
    opcion9.id='opcion9';
    opcion9.nodeValue='9';
    opcion9.innerHTML='9';
    puntaje1.appendChild(opcion9);
    // <option id="opcion10">
    var opcion10 = document.getElementById('opcion10').cloneNode(c);
    opcion10.id='opcion10';
    opcion10.nodeValue='10';
    opcion10.innerHTML='10';
    puntaje1.appendChild(opcion10);
    
    //<div class="row" id="filaConSelect11">
    var filaConSelect1 = document.getElementById('filaConSelect11').cloneNode(c);
    filaConSelect1.id='filaConSelect'+numSeccion+numPregunta;
    clon2.appendChild(filaConSelect1);
    
    //<div class="col-md-8" id="colConSelect11">   
    var colConSelect1 = document.getElementById('colConSelect11').cloneNode(c);
    colConSelect1.id='colConSelect'+numSeccion+numPregunta;
    filaConSelect1.appendChild(colConSelect1);
    
    //<input type="hidden" class="form-control" id="conSelect11" name="conSelect11">
    var conSelect1 = document.getElementById('conSelect11').cloneNode(c);
    conSelect1.id='conSelect'+numSeccion+numPregunta;
    conSelect1.name='conSelect'+numSeccion+numPregunta;
    conSelect1.setAttribute('value','')
    colConSelect1.appendChild(conSelect1);

    //<div class="row" id="opcion111">
    var op1 = document.getElementById('opcion111').cloneNode(c);
    op1.id='opcion'+numSeccion+'1'+numOpcion;
    clon2.appendChild(op1);

    //<div class="col-md-8" style="margin-top:15px;" id="filaOpcion1">
    var filaOpcion1 = document.getElementById('filaOpcion1').cloneNode(c);
    filaOpcion1.id='filaOpcion'+numSeccion+'1'+numOpcion;
    op1.appendChild(filaOpcion1);

    //<label for="opcion12" id="opcion12" >
    var opcion12 = document.getElementById('label111').cloneNode(c);
    opcion12.id='label'+numSeccion+'1'+'1';
    opcion12.setAttribute('for','label'+numSeccion+'1'+'1');
    opcion12.innerHTML='Opcion 1:';
    filaOpcion1.appendChild(opcion12);

    //<input type="text" class="form-control" id="inputOpcion1">
    var inputOpcion1 = document.getElementById('op111').cloneNode(c);
    inputOpcion1.id='op'+numSeccion+'1'+'1';
    inputOpcion1.name='op'+numSeccion+'1'+'1';
    inputOpcion1.removeAttribute('readonly');
    filaOpcion1.appendChild(inputOpcion1);

    //<div class="row" id="op2">
    var op2 = document.getElementById('opcion112').cloneNode(c);
    op2.id='opcion'+numSeccion+'1'+'2';
    clon2.appendChild(op2);

    // <div class="col-md-8" style="margin-top:15px;" id="filaOpcion2"
    var filaOpcion2 = document.getElementById('filaOpcion2').cloneNode(c);
    filaOpcion2.id='filaOpcion'+j;
    op2.appendChild(filaOpcion2);

    //<label for="opcion2" id="opcion21" name="opcion2">
    var opcion21 = document.getElementById('label112').cloneNode(c);
    opcion21.id='label'+numSeccion+'1'+'2';
    opcion21.setAttribute('for','label'+numSeccion+'1'+'2');
    opcion21.innerHTML='Opcion 2:';
    filaOpcion2.appendChild(opcion21);

    //<input type="text" class="form-control" id="inputOpcion2">
    var inputOpcion2 = document.getElementById('op112').cloneNode(c);
    inputOpcion2.id='op'+numSeccion+'1'+'2';
    inputOpcion2.name='op'+numSeccion+'1'+'2';
    inputOpcion2.removeAttribute('readonly');
    filaOpcion2.appendChild(inputOpcion2);
    
    //<div class="row" id="filaConOpcion11">
    var filaConOpcion1 = document.getElementById('filaConOpcion11').cloneNode(c);
    filaConOpcion1.id='filaConOpcion'+numSeccion+numPregunta;
    clon2.appendChild(filaConOpcion1);  
    
    //<div class="col-md-8" id="colConOpcion11">
    var colConOpcion1 = document.getElementById('colConOpcion11').cloneNode(c);
    colConOpcion1.id='colConOpcion'+numSeccion+numPregunta;
    filaConOpcion1.appendChild(colConOpcion1);  
    
    //<input type="hidden" class="form-control" id="conOpcion11" name="conOpcion11">
    var conOpcion1 = document.getElementById('conOpcion11').cloneNode(c);
    conOpcion1.id='conOpcion'+numSeccion+numPregunta;
    conOpcion1.name='conOpcion'+numSeccion+numPregunta;
    colConOpcion1.appendChild(conOpcion1);

    //<div class="row" id="filaBtnAgregar11">
    var filaBtnAgregar1 = document.getElementById('filaBtnAgregar11').cloneNode(c);
    filaBtnAgregar1.id='filaBtnAgregar'+numSeccion+'1';
    clon2.appendChild(filaBtnAgregar1);    

    //<div class="col-md-4 col-xs-4 col-xs-push-1" id="agregar">
    var agregar1 = document.getElementById('agregar1').cloneNode(c);
    agregar1.id='filaBtnAgregar'+j;
    filaBtnAgregar1.appendChild(agregar1);

    //<button type="button" class="btn btn-success btn-sm" onclick="crear(this);" id="btnAgregar11">
    var btnAgregar1 = document.getElementById('btnAgregar11').cloneNode(c);
    btnAgregar1.id='btnAgregar'+numSeccion+'1';
    btnAgregar1.innerHTML='Agregar Opción';
    btnAgregar1.style='margin-top: 40px;margin-left: -10px;';
    btnAgregar1.disabled=false;
    agregar1.appendChild(btnAgregar1);

    //<span class="glyphicon glyphicon-plus" id='iconoOp11'>
    var iconoOp = document.getElementById('iconoOp11').cloneNode(c);
    iconoOp.id='iconoOp'+numSeccion+'1';
    btnAgregar1.appendChild(iconoOp);

    //<div class="col-md-4 col-xs-4 col-md-offset-0 col-xs-push-1" id="finPregunta11">
    var finPregunta1 = document.getElementById('finPregunta11').cloneNode(c);
    finPregunta1.id='finPregunta'+numSeccion+'1';
    finPregunta1.style='margin-top: 40px;margin-left: -10px;';
    filaBtnAgregar1.appendChild(finPregunta1);

    //<button id="btnFinalizar11" type="button" class="btn btn-primary btn-sm" onclick="finalizarPregunta();">
    var btnFinalizar1 = document.getElementById('btnFinalizar11').cloneNode(c);
    btnFinalizar1.id='btnFinalizar'+numSeccion+'1';
    btnFinalizar1.innerHTML='Finalizar pregunta';
    btnFinalizar1.disabled=false;
    finPregunta1.appendChild(btnFinalizar1);


    //<div class="col-md-4 col-xs-4 col-md-offset-2 col-xs-push-1" id="modificarPregunta11" style="margin-left:-10px">
    var modificarPregunta1 = document.getElementById('modificarPregunta11').cloneNode(c);
    modificarPregunta1.id='modificarPregunta'+numSeccion+'1';
    filaBtnAgregar1.appendChild(modificarPregunta1);

    //<button id="btnModificar11" type="button" class="btn btn-primary btn-sm" onclick="modificarPregunta();">
    var btnModificar1 = document.getElementById('btnModificar11').cloneNode(c);
    btnModificar1.id='btnModificar'+numSeccion+'1';
    btnModificar1.innerHTML='Modificar pregunta';
    btnModificar1.style='visibility: hidden;';
    modificarPregunta1.appendChild(btnModificar1);
    
    //<div class="row" id="antes">
    var antes1 = document.getElementById('antes1').cloneNode(c);
    antes1.id='antes'+numSeccion;
    bloque1.appendChild(antes1);
    
    //<div class="col-md-4" style="margin-top:15px;" id="columnaBtnFinalizar1">
    var columnaBtnFinalizar1 = document.getElementById('columnaBtnFinalizar1').cloneNode(c);
    columnaBtnFinalizar1.id='columnaBtnFinalizar'+numSeccion;
    antes1.appendChild(columnaBtnFinalizar1);
    
    //<button type="button" id="btnAgPregunta1" class="btn btn-success btn-sm" onclick="agrePregunta(false);bloquearAgPregunta(this.id)" disabled>
    var btnAgPregunta1 = document.getElementById('btnAgPregunta1').cloneNode(c);
    btnAgPregunta1.id='btnAgPregunta'+numSeccion;
    btnAgPregunta1.innerHTML='Agregar pregunta';
    columnaBtnFinalizar1.appendChild(btnAgPregunta1);
    
   //<div class="col-md-2" style="margin-top:15px;" id="columnaBtnFinalizarSec1">
    var columnaBtnFinalizarSec1 = document.getElementById('columnaBtnFinalizarSec1').cloneNode(c);
    columnaBtnFinalizarSec1.id='columnaBtnFinalizarSec'+numSeccion;
    antes1.appendChild(columnaBtnFinalizarSec1);
    
    // <button type="button" id="btnFinSec1" class="btn btn-primary btn-sm" onclick="finSeccion(this.id);" >
    var btnFinSec1 = document.getElementById('btnFinSec1').cloneNode(c);
    btnFinSec1.id='btnFinSec'+numSeccion;
    btnFinSec1.innerHTML='Finalizar sección';
    btnFinSec1.disabled=false;
    columnaBtnFinalizarSec1.appendChild(btnFinSec1);
    
    //<div class="row" id="filaConPregunta11">
    var filaConPregunta1 = document.getElementById('filaConPregunta1').cloneNode(c);
    filaConPregunta1.id='filaConPregunta'+numSeccion+numPregunta;
    antes1.appendChild(filaConPregunta1);  
    
    //<div class="col-md-8" id="colConPregunta11">
    var colConPregunta1 = document.getElementById('colConPregunta1').cloneNode(c);
    colConPregunta1.id='colConPregunta1'+numSeccion;
    filaConPregunta1.appendChild(colConPregunta1);  
    
    //<input type="hidden" class="form-control" id="conPregunta11" name="conPregunta11">
    var conPregunta1 = document.getElementById('conPregunta1').cloneNode(c);
    conPregunta1.id='conPregunta'+numSeccion;
    conPregunta1.name='conPregunta'+numSeccion;
    colConPregunta1.appendChild(conPregunta1);
    
    totalSeccion = document.getElementById('conSeccion1');
    totalSeccion.setAttribute('value',numSeccion);
    //alert(numSeccion);
}


