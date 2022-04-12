/*** START:: For Head ***/
        const titleTag = document.createElement("title");
        titleTag.innerHTML = "Homepage";
        document.head.appendChild(titleTag);

//document.title="Homepage";


/*** END:: For Head ***/
        
/*** START:: For BODY ***/
    //wrapper div
        const divTag = document.createElement("div");
        divTag.setAttribute("class","container-wrapper");
        document.body.appendChild(divTag);
        
        //for header
        const divTag1 = document.createElement("div");
        divTag1.setAttribute("class","header");
        divTag.appendChild(divTag1);
    
        const bold = document.createElement("b");
        divTag1.appendChild(bold);
        
        const pTag = document.createElement("p");
        pTag.innerHTML = "Swapnoloke";
        bold.appendChild(pTag);
        
    //main-container-div
       
        const mainContainer = document.createElement("div");
        mainContainer.setAttribute("class","main-container");
        divTag.appendChild(mainContainer);
          
       //for sidebar
        const divTag3 = document.createElement("div");
        divTag3.setAttribute("class","sidebar");
        mainContainer.appendChild(divTag3);
        
        const bold2 = document.createElement("b");
        divTag3.appendChild(bold2);
        
        const pTag2 = document.createElement("p");
        pTag2.innerHTML = "sidebar";
        bold2.appendChild(pTag2);
        
        //adding list
        const menu = document.createElement("ul");
        menu.setAttribute("id","mylist");
        divTag3.appendChild(menu);
        
        
        //appending anchor
        const list = document.createElement("li");
        
        const link = document.createElement("a");
        link.setAttribute("href","HomePage.php");
        link.innerHTML="Home";
        
        list.appendChild(link);
        
        const list1 = document.createElement("li");
        
        const link1 = document.createElement("a");
        link1.setAttribute("href","gallery.php");
        link1.innerHTML="Gallery";
        
        list1.appendChild(link1);
        
        const list2 = document.createElement("li");
        const link2 = document.createElement("a");
        link2.setAttribute("href","contact.php");
        link2.innerHTML="Contact";
        
        list2.appendChild(link2);
        
        const list3 = document.createElement("li");
        const link3 = document.createElement("a");
        link3.setAttribute("href","about.php");
        link3.innerHTML="About";
        
        list3.appendChild(link3);
        
        const list4 = document.createElement("li");
        const link4 = document.createElement("a");
        link4.setAttribute("href","registration.php");
        link4.innerHTML="Registration";
        
        list4.appendChild(link4);
        
        const list5 = document.createElement("li");
        const link5 = document.createElement("a");
        link5.setAttribute("href","login.php");
        link5.innerHTML="Login";
        
        list5.appendChild(link5);



        //appending list
        menu.appendChild(list);
        menu.appendChild(list1);
        menu.appendChild(list2);
        menu.appendChild(list3);
        menu.appendChild(list4);
        menu.appendChild(list5);
        
    //content div    
        const divTag4 = document.createElement("div");
        divTag4.setAttribute("class","content");
        mainContainer.appendChild(divTag4);
        
        
        const bold4 = document.createElement("b");
        divTag4.appendChild(bold4);
        
        const pTag4 = document.createElement("p");
        pTag4.innerHTML = "content";
        bold4.appendChild(pTag4);
        
        
        
        
        
        
        





//for footer
        const divTag2 = document.createElement("div");
        divTag2.setAttribute("class","footer");
        divTag.appendChild(divTag2);
        
        const bold1 = document.createElement("b");
        divTag2.appendChild(bold1);
        
        const pTag1 = document.createElement("p");
        pTag1.innerHTML = "CopyRight @Mashiur";
        bold1.appendChild(pTag1);
        
        
        
        
        
        
      
/*** END:: For BODY ***/