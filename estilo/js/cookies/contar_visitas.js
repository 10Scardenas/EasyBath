(function() {
    'use strict';
    window.addEventListener('load', function() {
        function getexpirydate(nodays) {
            var UTCstring;
            var Today = new Date();
            var nomilli = Date.parse(Today);
            Today.setTime(nomilli + nodays * 24 * 60 * 60 * 1000);
            UTCstring = Today.toUTCString();
            return UTCstring;
        }
        
        function getcookie(cookiename) {
            var cookiestring = "" + document.cookie;
            var index1 = cookiestring.indexOf(cookiename);
            if (index1 == -1 || cookiename == "") return "";
            var index2 = cookiestring.indexOf(';', index1);
            if (index2 == -1) index2 = cookiestring.length;
            return unescape(cookiestring.substring(index1 + cookiename.length + 1, index2));
        }
        
        function setcookie(name, value, duration) {
            var cookiestring = name + "=" + escape(value) + ";EXPIRES=" + getexpirydate(duration);
            document.cookie = cookiestring;
            if (!getcookie(name)) {
                return false;
            } else {
                return true;
            }
        }

        // inicio de obtencion cookie
        var count = getcookie("counter");
        if (isNaN(count)) {
            let y = setcookie('counter', 0, 1);
            count = 0;
        }
        count++;
        
        // document.write("Visitastes esta pagina " + count + " veces!!");

        var div = document.createElement("h6");
        div.classList.add("d-none","d-md-block","bg-info","text-white","font-weight-bold","mr-2","p-2","rounded");
        div.setAttribute("style", "color: #fff!important");
        div.style.position = "fixed";
        div.style.bottom = "0";
        div.style.right = "0";
        div.innerHTML = "Visitastes esta pagina " + count + " veces!!";

        this.document.getElementsByTagName("footer")[0].appendChild(div);
        let y = setcookie('counter', count, 1);
        // fin de obtencion de cookie
    }, false);
})();
