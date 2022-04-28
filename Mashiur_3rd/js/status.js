function changeStatus(id,status)
{
    
    if (id === 0) 
    {
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() 
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("cxngstatus"+id).innerHTML = this.responseText;
        } 
    }
    xhttp.open("GET", "changestat.php?id="+id+"&stat="+status + '&btn='+0);
    xhttp.send();
    const xhttp1 = new XMLHttpRequest();
    xhttp1.onload = function() 
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("cxngstatusBtn"+id).innerHTML = this.responseText;
        } 
    }
    xhttp1.open("GET", "changestat.php?id="+id+"&stat="+status + '&btn='+1);
    xhttp1.send();
}
