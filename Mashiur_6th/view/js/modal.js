function getAddress(id)
{
    console.log(id);
    if (id === 0) 
    {
    document.getElementById("modal-body").innerHTML = "Nothing Found";
    return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("modal-body").innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "modalAddress.php?id="+id);
    xhttp.send();
}