function cambioTipo(tipo) {

    // let mensaje= document.getElementById("mensaje");
    // mensaje.value="";

    var f = document.getElementById("f");
    var mostrar = document.getElementById("segunTipo");
    var radioH =document.getElementById("radioH");
    var radioM =document.getElementById("radioM");

    while( mostrar.firstChild ) {
    mostrar.removeChild(mostrar.firstChild);
    }

    if(tipo == "cu") {

      let titulo = document.createElement("label");
      titulo.innerHTML = "<h2>Completa el formulario</h2>";

      let nombre = document.createElement("label");
      nombre.for = "nombre";
      nombre.innerHTML = "Nombre  ";
      let putName = document.createElement("input");
      putName.type = "text";
      putName.name = "nombre";
      putName.required = true;

      let edad = document.createElement("label");
      edad.for= "edad";
      edad.innerHTML = "<br>Edad  ";
      let putEdad = document.createElement("input");
      putEdad.type = "number";
      putEdad.name = "edad";
      putEdad.required = true;

      let rol = document.createElement("label");
      rol.for= "rol";
      rol.innerHTML = "<br>Rol (0/1/2/3)";
      let putRol = document.createElement("input");
      putRol.type = "number";
      putRol.name = "rol";
      putRol.min= "0";
      putRol.max= "3";
      putRol.required = true;

      let h = document.createElement("label");
      h.for= "hombre"
      h.innerHTML = "Masculino";
      h.className += " form-check-label";
      let putH = document.createElement("input");
      putH.type = "radio";
      putH.name = "sexo";
      putH.value = "h";
      putH.className += " form-check-input";
      putH.checked = "checked";

      let m = document.createElement("label");
      m.for= "mujer";
      m.innerHTML = "Femenino";
      m.className += " form-check-label";
      let putM = document.createElement("input");
      putM.type = "radio";
      putM.name = "sexo";
      putM.className += " form-check-input";
      putM.value="m";         

      mostrar.appendChild(titulo);
      mostrar.appendChild(nombre);
      mostrar.appendChild(putName);
      mostrar.appendChild(edad);
      mostrar.appendChild(putEdad);
      mostrar.appendChild(rol);
      mostrar.appendChild(putRol);
      radioH.appendChild(h);
      radioH.appendChild(putH);
      radioM.appendChild(m);
      radioM.appendChild(putM);

      f.submit.style.display="block"; 
      f.ver.style.display="none";  

    } else if(tipo == "vd" || tipo == "bu"){


      let titulo = document.createElement("label");
      titulo.innerHTML = "<h2>Ingresa el ID del usuario</h2>";

      let id = document.createElement("label");
      let putId = document.createElement("input");
      putId.type = "number";
      putId.name = "id";
      id.for= "id";
      id.innerHTML = "<br>ID ";
      putId.required = true;
      
      
      

      mostrar.appendChild(titulo);
      mostrar.appendChild(id);
      mostrar.appendChild(putId);

      f.ver.style.display="none";  
      f.submit.style.display="block"; 

    }else if (tipo == "md"){
      let titulo = document.createElement("label");
      titulo.innerHTML = "<h3>Ingresa el ID del usuario</h3>";

      let id = document.createElement("label");
      id.for= "id";
      id.innerHTML = "<br>ID ";
      let putId = document.createElement("input");
      putId.type = "number";
      putId.name = "id";
      putId.required = true;

      let titulo2 = document.createElement("label");
      titulo2.innerHTML = "<h3>Ingresa la edad nueva</h3>";

      let edad = document.createElement("label");
      edad.for= "edad";
      edad.innerHTML = "<br>Edad  ";
      let putEdad = document.createElement("input");
      putEdad.type = "number";
      putEdad.name = "edad";
      putEdad.required = true;

      mostrar.appendChild(titulo);
      mostrar.appendChild(id);
      mostrar.appendChild(putId);
      mostrar.appendChild(titulo2);
      mostrar.appendChild(edad);
      mostrar.appendChild(putEdad);

      f.submit.style.display="block"; 
      f.ver.style.display="none";  

    } else{
        f.ver.style.display="none";  
      f.submit.style.display="none"; 
    }
  
  }