function changeStatus(id,status)
{
    window.alert(status);
    if (id === 0) 
    {
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("cxngstatus").innerHTML = this.responseText;
        } 
    }
    xhttp.open("GET", "changestat.php?id="+id+"&stat="+status);
    xhttp.send();
}
