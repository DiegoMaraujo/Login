function acesso(form) {
	if(form.nome.value == "admin" && form.senha.value =="123"){

           window.location.assign("acesso.html") 

	}else{ 
		 var x =form.nome.value 
		 var y = form.senha.value 

		 form.nome.value ="" 
		 form.senha.value ="" 
		 alert("acess Negado!"+"\nUsuario digitado: "+x+ 
		      "\nSenha digitada: "+y) 
		 location="login.html " 
		} 
}