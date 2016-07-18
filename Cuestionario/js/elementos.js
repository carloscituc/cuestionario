
//botón agregar
num=2;
function crear(obj) {
    num++;
    fi = document.getElementById('opcion'); 
    contenedor = document.createElement('div'); 
    contenedor.className = 'col-md-8';
    contenedor.style = 'margin-top:15px';
    fi.appendChild(contenedor); 

    ele2 = document.createElement('label');
    ele2.innerHTML='Opción '+num+':';
    contenedor.appendChild(ele2);

    ele = document.createElement('input'); 
    ele.type = 'text'; 
    ele.name = 'fil'+num;
    ele.id = 'campo'+num;
    ele.className = 'form-control';
    contenedor.appendChild(ele);
    if(num==10){
        agregar.disabled=true;
    }
}

//botón eliminar
function eliminarPregunta(id){
    idInput = document.getElementById(id);
    alert(idInput);
    
    /*switch(idInput){
        case 'op1':
            alert("Id"+idInput);
            /*padre = cadena.parentNode;
            padre.removeChild(cadena);*/
       /* case 'op2':
            
        case 'op3':
            
        case 'op4':
            
        case 'op5':
            
        case 'op6':
            
        case 'op7':
            
        case 'op8':
            
        case 'op9':
            
        case 'op10':  
        default:
            alert('No existe el elemento');
    }*/
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
    document.getElementById('campo10');

    finalizar.disabled=false;
    modificar.style.visibility='hidden';
    
    var cadena='campo10';
   
    if(cadena=='campo10'){
        agregar.disabled=true;
    }else{
        agregar.disabled=false; 
    }
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


