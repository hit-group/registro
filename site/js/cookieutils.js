function eventFire(el, etype){
  if (el.fireEvent) {
    el.fireEvent('on' + etype);
  } else {
    var evObj = document.createEvent('Events');
    evObj.initEvent(etype, true, false);
    el.dispatchEvent(evObj);
  }
}




var storeCookie = false;

function delCookie() {

    var cname = "username";
    var d = new Date();
    d.setTime(d.getTime());
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + "" + ";" + expires + ";path=/";
}


function setCookie(cname,cvalue,exdays) {


    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {

    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {


    var user = getCookie("username");
    if (user != "") {
        //alert("Welcome again " + user);
        document.getElementById('username').value = user;

        document.getElementById('cb').value = true;
        document.getElementById('cb').checked = true;
        var cb = document.getElementById("cb").parentElement;
        cb.className += " checked";

        //eventFire(document.getElementById('cookieremember'), 'click');
        //document.getElementById('cookieremember').fireEvent("onclick");

        //$('#cookieremember').trigger('click');



        storeCookie = true;
    } else {
       //user = prompt("Please enter your name:","");
       //if (user != "" && user != null) {
      //     setCookie("username", user, 30);
       //}
       storeCookie = false;
    }
}

function checkboxClick(checkbox){

  console.log("click");

  if(checkbox.checked){
    //Stores a cookie
    storeCookie = true;
    var user = document.getElementById('username').value;
    setCookie("username",user,14);
  }else {
    //Removes the cookie
    storeCookie = false;
    delCookie();

  }
}

function usernameChanged(textbox){


  if(storeCookie){
    var user = textbox.value;
    setCookie("username", user, 14);
  }else{
    //Does nothing, no cookie needed.
  }
}
