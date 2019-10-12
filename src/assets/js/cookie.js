function setCookie(c_name,value,exdays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}

const getCookie = (cname) =>
    decodeURIComponent(document.cookie).split(';')
    .map((cookie) => cookie.trim().match(/((?:'|")[^*]*(?:'|"))|[^=]+/g))
    .filter(([name]) => name === 'dnt')[0][1];

function delCookie(name){
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
