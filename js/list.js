
function fillCategory(){ 
 // this function is used to fill the category list on load
 var main = ["electronics","accessories","footwear","top wear","bottom wear","innerwear","baby and kids","toys","home","furniture","books","games","sports","fitness","other"];
 for (var i=0; i<main.length; i++){
 	addOption(document.data_product.Category, main[i], main[i], "");
 }
}

function SelectSubCat(){
// ON selection of category this function will work

removeAllOptions(document.data_product.SubCat);
addOption(document.data_product.SubCat, "subcategory", "subcategory", "");

if(document.data_product.Category.value == 'electronics'){
 var ele = ["mobile","TV","AC","refrigerator","washing machine","iron","memory card","pen drive","laptop","camera","power bank","headphone","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'accessories'){
var ele = ["covers and cases","backpack","wallet","luggage","belt","glasses","jewellery","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'footwear'){
var ele = ["sport shoes","casual shoes","formal shoes","running shoes","sandal","flip-flop","boot","loafer","sneaker","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'top wear'){
var ele = ["T-shirt","shirt","kurta","jackets","suits & blazers","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'bottom wear'){
var ele = ["jeans","trousers","shorts","cargos","track pants","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'innerwear'){
var ele = ["briefs & trunks","vests","thermal","boxers","bras","panties","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'baby and kids'){
var ele = ["diapers","strollers","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'toys'){
var ele = ["remote cars","educational","cars","soft toys","puzzels","outdoors","board games","dolls","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'home'){
var ele = ["kitchen","painting","wall shelves","showpiece","pillow","lighting","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'furniture'){
var ele = ["bed","sofa","dining table","mattress","table","office chair","bean bag","mats and carpet","drawers","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'books'){
var ele = ["entrance exam","academic","literature","indian writing","biographics","children","buisness","fiction","novel","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'games'){
var ele = ["PS3","PS4","Xbox one","Xbox 360","gaming console","smart glasses(VR)","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.drop_list.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'sports'){
var ele = ["cricket","badminton","football","skating","cycling","camping","swimming","table tennis","tennis","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'fitness'){
var ele = ["gloves","AB exercies","yoga mats","homegyms","cardio equipments","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
}
if(document.data_product.Category.value == 'other'){
var ele = ["deodrants","perfumes","personal care","other"];
 for (var i=0; i<ele.length; i++){
 	addOption(document.data_product.SubCat, ele[i], ele[i]);
 }
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
