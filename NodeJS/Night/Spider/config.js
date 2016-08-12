//POST URL
var urlstr = 'http://210.70.131.56/online/login.asp';
//POST 內容
var bodyQueryStr = {
    Loginid: 'StudentID',
    LoginPwd: 'password',
    Enter: 'LOGIN'
};

var contentStr = querystring.stringify(bodyQueryStr);
var contentLen = Buffer.byteLength(contentStr, 'utf8');
console.log(util.format('post data: %s, with length: %d', contentStr, contentLen));
var httpModule = urlstr.indexOf('https') === 0 ? https : http;
var urlData = url.parse(urlstr);

//HTTP請求選項
var opt = {
    hostname: urlData.hostname,
    path: urlData.path,
    method: 'POST',
    headers: {
        'Content-Type': 'text/html; charset=big5',
        'Content-Length': contentLen,
		'Accept-Encoding':'gzip, deflate, lzma',
		'User-Agent':'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36 OPR/39.0.2256.48'

    }
};