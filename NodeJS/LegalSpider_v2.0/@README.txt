對於第一版法律爬蟲 即為 "ThreadedSpider_Multi-site" 的 "CHK-RAS.js"
增加	判斷該條法律標題並將標題設定為檔案名稱以利於判斷
增加	判定不存在法條則不儲存檔案	之功能
精簡	NPM套件的使用,上一版>>request、fs、cheerio、iconv-lite、bufferhelper　LegalSpider_v2.0僅使用 >>request、fs、cheerio
暫未修正	搜索因過時而中斷	之問題(反正我慢慢修o Wo)