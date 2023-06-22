const magicVal = document.getElementById('magic');
const usernameVal = document.getElementById('username');
const ipVal = document.getElementById('ip');
const macVal = document.getElementById('mac');
magicVal.textContent = localStorage.getItem('magicFromLocalStorage');
usernameVal.textContent = localStorage.getItem('usernameFromLocalStorage');
ipVal.textContent = localStorage.getItem('ipFromLocalStorage');
macVal.textContent = localStorage.getItem('macFromLocalStorage');
        //setInterval(openUrl, 2000);
        // https://developer.mozilla.org/en-US/docs/Web/API/URLSearchParams
        //grab params from query string
        const urlParams = new URLSearchParams(window.location.search);
        const postParam = urlParams.get('post');
        const magicParam = urlParams.get('magic');

        window.onload = function() {

                // set action URL
        document.authlogin.action = get_action();
                // put post URL into callback URL box
                document.getElementById("callbackurl").value = postParam;
                document.getElementById("magic").value = magicParam;

    }

    function get_action() {
        return postParam;
    }

setInterval(refreshURL, 120000);
        // https://developer.mozilla.org/en-US/docs/Web/API/URLSearchParams
        //grab params from query string
        const urlParams = new URLSearchParams(window.location.search);
        const postParam = urlParams.get('post');
        const magicParam = urlParams.get('magic');
	const loginParam = urlParams.get('login');
        const usermacParam = urlParams.get('usermac');
	const apmacParam = urlParams.get('apmac');
        const apipParam = urlParams.get('apip');
	const useripParam = urlParams.get('userip');
        const ssidParam = urlParams.get('ssid');
	const apnameParam = urlParams.get('apname');
        const bssidParam = urlParams.get('bssid');

	const auth = urlParams.get('Auth');


        window.onload = function() {
                // set action URL
        document.authlogin.action = get_action();
                // put post URL into callback URL box
                document.getElementById("callbackurl").value = postParam;
                document.getElementById("magic").value = magicParam;
		document.getElementById("login").value = loginParam;
		document.getElementById("usermac").value = usermacParam;
		document.getElementById("apmac").value = apmacParam;
		document.getElementById("apip").value = apipParam;
		document.getElementById("userip").value = useripParam;
		document.getElementById("ssid").value = ssidParam;
		document.getElementById("apname").value = apnameParam;
		document.getElementById("bssid").value = bssidParam;
	
		


		if(auth == 'Failed'){
			window.open("https://signup.academy-network.pp.ua/failed.html","_self");
		} else {

			localStorage.setItem('magicFromLocalStorage', magicParam);
			localStorage.setItem('loginFromLocalStorage', loginParam);
			localStorage.setItem('ipFromLocalStorage', useripParam);
			localStorage.setItem('macFromLocalStorage', usermacParam);
		}
    }
    function refreshURL() {
         location.href = "http://gstatic.com/generate_204";
    }

    function setLocalStorageName(){
	var inputUsername = document.getElementById("usernameForCookies");
	document.cookie = "username=HELLO!; SameSite=None; Secure";
        localStorage.setItem('usernameFromLocalStorage', inputUsername.value);
    }	
    function get_action() {
        return postParam;
    }
