function client()
					{
						var clientname=document.getElementById("txtIdClientName").value;
						if (clientname=="")
							{
						document.getElementById("errorClientNameId").innerHTML="Client Name Required";
							}
						else
							{
						document.getElementById("errorClientNameId").innerHTML="";
							}				
					}

function client_validation()
			{
				var clientname=document.getElementById("txtIdClientName").value;					
					if (clientname=="")
					{
				document.getElementById("errorClientNameId").innerHTML="Client Name Required";
				valid=false;
					}
				else
					{
				valid=true;								
				document.getElementById("errorClientNameId").innerHTML="";
					 }return valid;
												
			}	
			function project()
					{
						var projectname=document.getElementById("txtIdProjectName").value;
						if (projectname=="")
							{
						document.getElementById("errorProjectNameId").innerHTML="Project Name Required";
							}
						else
							{
						document.getElementById("errorProjectNameId").innerHTML="";
							}				
					}

function project_validation()
			{
				var projectname=document.getElementById("txtIdProjectName").value;					
					if (projectname=="")
					{
				document.getElementById("errorProjectNameId").innerHTML="Project Name Required";
				valid=false;
					}
				else
					{
				valid=true;								
				document.getElementById("errorProjectNameId").innerHTML="";
					 }return valid;
												
			}	
			function user()
					{
						var username=document.getElementById("txtIdUserName").value;
						if (username=="")
							{
						document.getElementById("errorUserNameId").innerHTML="User Name Required";
							}
						else
							{
						document.getElementById("errorUserNameId").innerHTML="";
							}				
					}

function user_validation()
			{
				var username=document.getElementById("txtIdUserName").value;					
					if (username=="")
					{
				document.getElementById("errorUserNameId").innerHTML="User Name Required";
				valid=false;
					}
				else
					{
				valid=true;								
				document.getElementById("errorUserNameId").innerHTML="";
					 }return valid;
												
			}	