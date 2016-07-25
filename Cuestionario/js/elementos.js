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

    var op1 = document.getElementById('opcion112').cloneNode(false);
    op1.id='opcion'+numSeccion+numPregunta+numOpcion;
    document.getElementById('filaBtnAgregar1').parentNode.insertBefore(op1,document.getElementById('filaBtnAgregar1'));

    contenedor = document.createElement('div'); 
    contenedor.className = 'col-md-8';
    contenedor.style = 'margin-top:15px;';
    contenedor.id = "filaOpcion"+num;
    op1.appendChild(contenedor); 

    ele2 = document.createElement('label');
    ele2.id='label'+numSeccion+numPregunta+numOpcion;
    ele2.setAttribute('for','label'+numSeccion+numPregunta+numOpcion);
    ele2.innerHTML='Opción '+num+':';
    contenedor.appendChild(ele2);

    ele7 = document.createElement('div'); 
    ele7.className = 'input-group';
    contenedor.appendChild(ele7);

    ele3 = document.createElement('input'); 
    ele3.type = 'text'; 
    ele3.name = 'op'+numSeccion+numPregunta+numOpcion;
    ele3.id = 'op'+numSeccion+numPregunta+numOpcion;
    ele3.className = 'form-control';
    ele7.appendChild(ele3);

    ele4 = document.createElement('span');
    ele4.className = 'input-group-btn';
    ele7.appendChild(ele4);

    ele5 = document.createElement('button');
    ele5.className = 'btn btn-danger';
    ele5.type = 'button';
    ele5.id = 'btn'+numSeccion+numPregunta+numOpcion;
    ele5.setAttribute('onclick','eliminarOpcion(this.id);');
    ele4.appendChild(ele5);

    ele6 = document.createElement('span');
    ele6.className = 'glyphicon glyphicon-remove';
    ele6.setAttribute('aria-hidden','true');
    ele5.appendChild(ele6);


    if(numOpcion==10){
        agregar.disabled=true;
    }
}




//botón eliminar Opción de la pregunta
function eliminarOpcion(id){
    idOpcion = document.getElementById(id);
    value = idOpcion.id;
    idSeccion=value.charAt(3);//btn113
    idPregunta=value.charAt(4);//btn113
    
    alert(value);
    /*alert(idSeccion);
    alert(idPregunta);*/

    /*switch(value){
        case 'btn':
            valDiv = document.getElementById('op1');
            //valueDiv = valDiv.value;
            valDiv.parentNode.removeChild(valDiv);
            /*value = idInput.value;
            idInput.parentNode.removeChild(idInput);
            break;
        case 'btn':
            valDiv = document.getElementById('op2');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op3');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op4');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op5');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op6');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op7');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op8');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn':
            valDiv = document.getElementById('op9');
            valDiv.parentNode.removeChild(valDiv);
            break;
        case 'btn1':
            valDiv = document.getElementById('op10');
            valDiv.parentNode.removeChild(valDiv);
            break;
        default:
            alert('No existe el elemento');
    }*/

    //var boton3 = btn.concat(idSeccion,idPregunta,op3);
    var boton3 = 'btn'+idSeccion+idPregunta+'3';
    var boton4 = 'btn'+idSeccion+idPregunta+'4';
    var boton5 = 'btn'+idSeccion+idPregunta+'5';
    var boton6 = 'btn'+idSeccion+idPregunta+'6';
    var boton7 = 'btn'+idSeccion+idPregunta+'7';
    var boton8 = 'btn'+idSeccion+idPregunta+'8';
    var boton9 = 'btn'+idSeccion+idPregunta+'9';
    var boton10 = 'btn'+idSeccion+idPregunta+'10';
    
    //alert(boton3);
    j=3;
switch(value){
case boton3:
    for(k=4;k<11;k++){
        id = document.getElementById('op'+idSeccion+idPregunta+k);//----input eliminado///checar esta parte, que se recuperen los id para poder comparar.
        if(id!=null){
            alert("Funciona");
            //renombrar labels e id
            //nombreLabel = 'Opción '+j+":";//-----label de la opcion
            //idInput = 'op'+idSeccion+idPregunta+j;//---input de la opcion
            //j++;            
        }
	}
    break;
case 'btn'+idSeccion+idPregunta+4:
    for(k=5;k<11;k++){
        id = document.getElementById('op'+idSeccion+k);
        if(id!=null){
            ///renombrar labels e id
        }
	}
    break;
case 'btn'+idSeccion+idPregunta+5:
    for(k=6;k<11;k++){
        id = document.getElementById('op'+idSeccion+k);
        if(id!=null){
            //renombrar labels e id
        }
	}
    break;
case 'btn'+idSeccion+idPregunta+6:
    for(k=7;k<11;k++){
        id = document.getElementById('op'+idSeccion+k);
        if(id!=null){
            //renombrar labels e id
        }
	}
    j = j-1;
    break;
//'btn'+idSeccion+idPregunta+7:
    for(k=8;k<11;k++){
        id = document.getElementById('op'+idSeccion+k);
        if(id!=null){
            //renombrar labels e id
        }
	}
    j = j-1;
    break;
//'btn'+idSeccion+idPregunta+8:
    for(k=9;k<11;k++){
        id = document.getElementById('op'+idSeccion+k);
        if(id!=null){
            //renombrar labels e id
        }
	}
    j = j-1;
    break;
//'btn'+idSeccion+idPregunta+9:
    for(k=10;k<11;k++){
        id = document.getElementById('op'+idSeccion+k);
        if(id!=null){
            //renombrar labels e id
        }
	}
    j = j-1;
    break;
//'btn'+idSeccion+idPregunta+10:
    j = j-1;
    default:
        alert("No existe");
        break;
}
}




//botón finalizar pregunta
function finalizarPregunta(){
    formulario = document.getElementById("pregunta");
    eleInput = formulario.getElementsByTagName("input");
    eleLabel = formulario.getElementsByTagName("select");

    //alert('Se encontraron '+eleInput.length+' Elementos que se van a deshabilitar');
    for (i=0;i<eleInput.length;i++){
        eleInput[i].disabled = true;
    }

    //alert('Se encontraron '+eleLabel.length+' Elementos que se van a deshabilitar');
    document.getElementById('puntaje').disabled=true;

    finalizar.disabled=true;
    agregar.disabled=true;
    modificar.style.visibility='visible';
}

//boton modificar
function modificarPregunta(){
    formulario = document.getElementById("pregunta");
    eleInput = formulario.getElementsByTagName("input");
    eleLabel = formulario.getElementsByTagName("select");


    //alert('Se encontraron '+eleInput.length+' Elementos que se van habilitar');
    for (i=0;i<eleInput.length;i++){
        eleInput[i].disabled = false;
    }

    //alert('Se encontraron '+eleLabel.length+' Elementos que se van a habilitar');
    document.getElementById('puntaje').disabled=false;


    finalizar.disabled=false;
    modificar.style.visibility='hidden';
    campo = document.getElementById("campo10");

    if(campo!=null){
        agregar.disabled=true;
    }else{
        agregar.disabled=false; 
    }
}


//botón agregar Pregunta
/*function agrePregunta(){
   var n=1
   n++
    //<div class="row" id="Pregunta1">
    contPrincipal = document.getElementById('Pregunta1'); 
    contenedor1 = document.createElement('div'); 
    contenedor1.className = 'row';
    contenedor1.id = "Pregunta"+num;
    contPrincipal.appendChild(contenedor1);

    //<div class="col-md-12" id="pregunta">
    //contDiv = document.getElementById('Preguntas'); 
    contenedor = document.createElement('div'); 
    contenedor.className = 'col-md-12';
    contenedor.id = "pre"+num;
    contenedor1.appendChild(contenedor); 

    //<div class="row">
    fila = document.createElement('div'); 
    contenedor.className = 'row';
    contenedor.appendChild(fila);

    //<div class="col-md-12" style="margin-top: 15px;">
    divCol = document.createElement('div');
    divCol.className = 'col-md-12';
    divCol.style = 'margin-top: 15px;';
    fila.appendChild(divCol);

    //<label for="id_instrucciones">
    label1 = document.createElement('label');
    label1.setAttribute('for','instrucciones'+n);
    divCol.appendChild(label1);

    //<input type="text" class="form-control" placeholder="">
    input1 = document.createElement('input');
    input1.type = 'text';
    input1.className = 'form-control';
    divCol.appendChild(input1);

    //<div class="row">
    fila2 = document.createElement('div');
    fila2.className = 'row';
    contenedor1.appendChild(fila2);

    //<div class="col-md-1" style="margin-top:15px;">
    //divCol2 = document.createElement('div');
    //divCol2.className = 'col-md-1';
    divCol2.style ='margin-top:15px;';
    fila2.appendChild(divCol2);

    //<label for="id_puntaje">
    labelPuntaje = document.createElement('label');
    /*labelPuntaje.setAttribute('for','puntaje'+num);
    divCol2.appendChild(labelPuntaje);

    //<select class="form-control" id="puntaje">
    selectPuntaje = document.createElement('select');
    selectPuntaje.className = 'form-control';
    selectPuntaje.id = 'Selectpuntaje'+num;
    divCol2.appendChild(selectPuntaje);

     //option select
    selectOption = document.createElement('option');
    selectOption.textContent = '1';
    selectOption.textContent = '2';
    selectOption.textContent = '3';
    selectOption.textContent = '4';
    selectOption.textContent = '5';
    selectOption.textContent = '6';
    selectOption.textContent = '7';
    selectOption.textContent = '8';
    selectOption.textContent = '9';
    selectOption.textContent = '10';
    selectPuntaje.appendChild(selectOption);*/

//<div class="row" id="op1">
/* divop1R = document.createElement('div'); 
    divop1R.className = 'row';
    divop1R.style = 'margin-top:15px;';
    divop1R.id = "op"+num;
    divop1R.appendChild(contenedor); 

    //<div class="col-md-8" style="margin-top:15px;">
    divop1C = document.createElement('div'); 
    divop1C.className = 'col-md-8';
    divop1C.style = 'margin-top:15px;';
    divop1C.id = "op"+num;
    divop1R.appendChild(divop1C); 

    //<label for="opcion1">Opción 1:</label>
    ele2 = document.createElement('label');
    ele2.innerHTML='Opción '+num+':';
    contenedor.appendChild(ele2);

    //<input type="text" class="form-control">
    ele3 = document.createElement('input'); 
    ele3.type = 'text'; 
    ele3.name = 'fil'+num;
    ele3.id = 'campo'+num;
    ele3.className = 'form-control';
    divop1R.appendChild(ele3);
}*/


function agrePregunta(x){
    var clon = document.getElementById('pregunta1').cloneNode(x);
    document.getElementById('antes').parentNode.insertBefore(clon,document.getElementById('antes'));
    btnAgregar = document.getElementById('filaBtnAgregar1');
    //btnAgregar.id='filaBtnagregar2';
}

j=1;
num=2;
function agrePregunta(x){
    j++;
    num++;
    numPregunta++;
    //<div class="row" id="Pregunta1">    
    var clon = document.getElementById('pregunta1').cloneNode(x);
    clon.id='Pregunta'+numPregunta;
    clon.style='-webkit-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);-moz-box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);box-shadow: inset 0px 0px 5px -1px rgba(0,0,0,0.75);padding-bottom: 15px;'
    document.getElementById('antes').parentNode.insertBefore(clon,document.getElementById('antes'));

    //<div class="col-md-12" id="pregunta">
    var clon2 = document.getElementById('instrucciones1').cloneNode(x);
    clon.id='instrucciones'+numPregunta;
    clon.appendChild(clon2);

    //<div class="row" id="filaPregunta1">
    var filaPregunta = document.getElementById('filaPregunta1').cloneNode(x);
    filaPregunta.id='filaPregunta'+numPregunta;
    clon2.appendChild(filaPregunta);

    //<div class="col-md-12" style="margin-top: 15px;" id='columnaPregunta1'>
    var columnaPregunta = document.getElementById('columnaPregunta1').cloneNode(x);
    columnaPregunta1.id='columnaPregunta'+numPregunta;
    filaPregunta.appendChild(columnaPregunta);

    //<label for="id_instrucciones">
    var escribePregunta1 = document.getElementById('id_instrucciones').cloneNode(x);
    escribePregunta1.id='id_instrucciones'+numPregunta;
    escribePregunta1.innerHTML='Escribe la pregunta';
    columnaPregunta.appendChild(escribePregunta1);
    //<input type="text" class="form-control" id="inputPregunta1">
    var inputPregunta1 = document.getElementById('op112').cloneNode(x);
    inputPregunta1.id='op'+numSeccion+numPregunta;
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
    columnaRespuestas1.appendChild(puntajePregunta1);

    //<select class="form-control" id="puntaje1">
    var puntaje1 = document.getElementById('puntaje11').cloneNode(x);
    puntaje1.id='puntaje'+numSeccion+numPregunta;
    puntajePregunta1.appendChild(puntaje1);
    //option select

    // <option id="opcion1">
    var opcion1 = document.getElementById('opcion1').cloneNode(x);
    opcion1.id='opcion1';
    opcion1.innerHTML='1';
    puntaje1.appendChild(opcion1);
    // <option id="opcion2">
    var opcion2 = document.getElementById('opcion2').cloneNode(x);
    opcion2.id='opcion2';
    opcion2.innerHTML='2';
    puntaje1.appendChild(opcion2);
    // <option id="opcion3">
    var opcion3 = document.getElementById('opcion3').cloneNode(x);
    opcion3.id='opcion3';
    opcion3.innerHTML='1';
    puntaje1.appendChild(opcion3);
    // <option id="opcion4">
    var opcion4 = document.getElementById('opcion4').cloneNode(x);
    opcion4.id='opcion4';
    opcion4.innerHTML='4';
    puntaje1.appendChild(opcion4);
    // <option id="opcion5">
    var opcion5 = document.getElementById('opcion5').cloneNode(x);
    opcion5.id='opcion5';
    opcion5.innerHTML='5';
    puntaje1.appendChild(opcion5);
    // <option id="opcion6">
    var opcion6 = document.getElementById('opcion6').cloneNode(x);
    opcion6.id='opcion6';
    opcion6.innerHTML='6';
    puntaje1.appendChild(opcion6);
    // <option id="opcion7">
    var opcion7 = document.getElementById('opcion7').cloneNode(x);
    opcion7.id='opcion7';
    opcion7.innerHTML='7';
    puntaje1.appendChild(opcion7);
    // <option id="opcion8">
    var opcion8 = document.getElementById('opcion8').cloneNode(x);
    opcion8.id='opcion8';
    opcion8.innerHTML='8';
    puntaje1.appendChild(opcion8);
    // <option id="opcio9">
    var opcion9 = document.getElementById('opcion9').cloneNode(x);
    opcion9.id='opcion9';
    opcion9.innerHTML='9';
    puntaje1.appendChild(opcion9);
    // <option id="opcion10">
    var opcion10 = document.getElementById('opcion10').cloneNode(x);
    opcion10.id='opcion10';
    opcion10.innerHTML='10';
    puntaje1.appendChild(opcion10);

    //<div class="row" id="op1">
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
    filaOpcion2.appendChild(inputOpcion2);

    //<div class="row" id="filaBtnAgregar1">
    var filaBtnAgregar1 = document.getElementById('filaBtnAgregar1').cloneNode(true);
    filaBtnAgregar1.id='filaBtnAgregar'+j;
    clon2.appendChild(filaBtnAgregar1);
        
        
        
        
        
        
}


//boton finalizar cuestionario
function finalizarCuestionario(){
    Forma = document.getElementById("form1");
    Elementos = Forma.getElementsByTagName("input");
    //alert('Se encontraron '+Elementos.length+' Elementos que se van a deshabilitar');
    for (i=0;i<Elementos.length;i++){
        Elementos[i].disabled = true;
    }
}


