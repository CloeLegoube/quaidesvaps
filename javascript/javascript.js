function ChangeOnglet(onglet, contenu) 
{   
    document.getElementById('content_1').style.display = 'none';
    document.getElementById('content_2').style.display = 'none';
    document.getElementById('content_3').style.display = 'none';       
    document.getElementById(contenu).style.display = 'block';       
 
    document.getElementById('tab_1').className = '';
    document.getElementById('tab_2').className = '';
    document.getElementById('tab_3').className = '';       
    document.getElementById(onglet).className = 'active';       
}  


function ChangeOnglet_2(active, nombre, tab_prefix, contenu_prefix) 
{   
    for (var i=1; i < nombre + 1; i++) 
    {
        document.getElementById(contenu_prefix + i).style.display = 'none';
        document.getElementById(tab_prefix + i).className = '';
    }  
 
    document.getElementById(contenu_prefix+active).style.display = 'block';
    document.getElementById(tab_prefix+active).className = 'active';   
}            
      