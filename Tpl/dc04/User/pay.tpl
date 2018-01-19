<!doctype html>
<html>
<head>
<title>正在转到付款页</title>
</head>
<body onLoad="document.pay.submit()">
<form name="pay" action="http://www.19fk.com/checkout" method="post">
  <input type="hidden" name="version" value="{$version}">
  <input type="hidden" name="customerid" value="{$customerid}">
  <input type="hidden" name="sdorderno" value="{$sdorderno}">
  <input type="hidden" name="total_fee" value="{$total_fee}">
  <input type="hidden" name="notifyurl" value="{$notifyurl}">
  <input type="hidden" name="returnurl" value="{$returnurl}">
  <input type="hidden" name="remark" value="{$remark}">
  <input type="hidden" name="sign" value="{$sign}">
</form>
</body>
</html>