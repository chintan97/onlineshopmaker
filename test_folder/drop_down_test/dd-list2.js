
function fillCategory(){ 
 // this function is used to fill the category list on load
addOption(document.drop_list.Category, "Fruits", "Fruits", "");
addOption(document.drop_list.Category, "Games", "Games", "");
addOption(document.drop_list.Category, "Scripts", "Scripts", "");
}

function SelectSubCat(){
// ON selection of category this function will work

removeAllOptions(document.drop_list.SubCat);
addOption(document.drop_list.SubCat, "", "SubCat", "");

if(document.drop_list.Category.value == 'Fruits'){
addOption(document.drop_list.SubCat,"Mango", "Mango");
addOption(document.drop_list.SubCat,"Banana", "Banana");
addOption(document.drop_list.SubCat,"Orange", "Orange");
}
if(document.drop_list.Category.value == 'Games'){
addOption(document.drop_list.SubCat,"Cricket", "Cricket");
addOption(document.drop_list.SubCat,"Football", "Football");
addOption(document.drop_list.SubCat,"Polo", "Polo", "");
}
if(document.drop_list.Category.value == 'Scripts'){
addOption(document.drop_list.SubCat,"PHP", "PHP");
addOption(document.drop_list.SubCat,"ASP", "ASP");
addOption(document.drop_list.SubCat,"Perl", "Perl");
}

}
////////////////// 

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}
///////////////////

function SelectRedirect(){
// ON selection of Sub category  this function will work

//alert( document.drop_list.SubCat.value);

switch(document.drop_list.SubCat.value)
{
case "PHP":
window.location="../php_tutorial/site_map.php";
break;

case "ASP":
window.location="../asp-tutorial/site_map.php";
break;

case "Perl":
window.location="../sql_tutorial/site_map.php";
break;

/// Can be extended to other different selections of SubCategory //////

default:
window.location="../"; // if no selection matches then redirected to home page
break;

}// end of switch 
}
////////////////// 

/////////////


