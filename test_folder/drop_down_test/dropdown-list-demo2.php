<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<html>
<head>
<title>Demo of JavaScript dynamic drop down list, selection of second html list based on first value</title>
<META NAME="DESCRIPTION" CONTENT="Demo of populating the second list based on the selection of first list value in client side JavaScript">
<META NAME="KEYWORDS" CONTENT="Demo Javascript drop down, dyanmic list, double drop down, list box selection ">
<script language="javascript" src="dd-list2.js"></script>
</head>
<body  onload="fillCategory();">

<FORM name="drop_list" action="yourpage.php" method="POST" >
		
<SELECT  NAME="Category" onChange="SelectSubCat();" >
<Option value="">Category</option>
</SELECT>&nbsp;
<SELECT id="SubCat" NAME="SubCat" onChange="SelectRedirect();">
<Option value="">SubCat</option>
</SELECT>
</form>
<br><br>

Select SCRIPT ( 1st List ) then PHP ( 2nd List )to check how the page gets redirected to PHP home section.
<br><br>
<br><br>
Back To <a href=dropdown-list.php>Two interlocking drop down list</a> | <a href=listbox.php>ListBox</a> | <a href=site_map.php>JavaScript</a>
<br><br>
<input type=button onClick="self.close();" value="Close this window"> 

</body>
</html>
