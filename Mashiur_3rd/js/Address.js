function showDistrict(id)
{   //name = document.getElementById("division").value;
    //window.alert(name);
    if (id === "") 
    {
    document.getElementById("district").innerHTML = "<option value=''>No District Found</option>";
    return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() 
    {
      document.getElementById("district").innerHTML = this.responseText;
    }
    xhttp.open("GET", "getDistrict.php?id="+id);
    xhttp.send();
}