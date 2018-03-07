			function check_data(){
				var pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
				var notstart = /^[^0-9][a-z0-9]+$/;
				var m_pattern = /^[0-9]+$/;
				var u_pattern=/^[A-Za-z]+$/;
				var username = /^[a-zA-Z0-9_]+$/;
				var pass_pattern = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
				var uname=document.getElementById("uname").value;
				var firstname = document.getElementById("fname").value;
				var lastname = document.getElementById("lname").value;
				var phoneno = document.getElementById("mob").value;
				var email = document.getElementById("email").value;
				var pwd = document.getElementById("pwd").value;
				var cpwd = document.getElementById("cpwd").value;
				
				
				
				if(u_pattern.test(firstname)==false){
					alert("Firstname can not contain numbers or cannot be empty!");
					document.getElementById("fname").focus();
					
					return false;
				}
				if(u_pattern.test(lastname)==false){
					alert("Lastname can not contain numbers or cannot be empty!");
					document.getElementById("lname").focus();
					
					return false;
				}
				if(username.test(uname)==false){
					alert("Username must contain upper/lowercase letters and numbers");
					document.getElementById("uname").focus();
				
					return false;
				}
				else if(uname.length < 6 || uname.length > 15){
					alert("User name must have characters/numbers between 6-15!");
					document.getElementById("uname").focus();
				
					return false;
				}
				if(pwd.length <8 || pwd.length >20){
					alert("Password must have length between 8-20!");
					document.getElementById("pwd").focus();
				
					return false;
				}
				else if(pass_pattern.test(pwd)==false){
					alert("Password must contain at least one number, one special character(!@#$%^&*), one upper and lower case character with the length between 8-20!");
					document.getElementById("pwd").focus();
				
					return false;
				}
				else if(cpwd!=pwd){
					alert("Password and ConfirmPassword must be same");
					document.getElementById("cpwd").focus();
				
					return false;
				}
				if(pattern.test(email)==false){
					alert("Please Enter Valid Email Id");
					document.getElementById("email").focus();
				
					return false;
				}
				if(isNaN(phoneno)){
					alert("Phone No must contain numbers");
					document.getElementById("mob").focus();
				
					return false;
				}
				document.signup.submit();
		}

			
			function try_login(){
				var username = /^[a-zA-Z0-9_]+$/;
				var pass_pattern = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
				var uname=document.getElementById("uname").value;
				var pwd = document.getElementById("pwd").value;
				if(username.test(uname)==false){
					alert("Invalid Username or Password!");
					document.getElementById("uname").focus();
					return false;
				}
				else if(uname.length < 6 || uname.length > 15){
					alert("Invalid Username or Password!");
					document.getElementById("uname").focus();
					return false;
				}
				if(pass_pattern.test(pwd)==false){
					alert("Invalid Username or Password!");
					document.getElementById("pwd").focus();
					return false;
				}
				else if(pwd.length <8 || pwd.length >20){
					alert("Invalid Username or Password!");
					document.getElementById("pwd").focus();
					return false;
				}
				document.loginform.submit();
			}
		
		
		
		function submit_feedback(){
			var email_pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
			var name_pattern = /^(\w+\s)*\w+$/;
			var name = document.getElementById("name").value;
			var email = document.getElementById('email').value;
			var msg = document.getElementById('message').value;
			if(name==""){
				alert("Please enter your name");
				document.getElementById("name").focus();
				return false;
			}
			else if(name_pattern.test(name)==false){
				alert("Please enter valide name");
				document.getElementById("name").focus();
				return false;
			}
			if(email==""){
				alert("Please enter your email");
				document.getElementById("email").focus();
				return false;
			}
			else if(email_pattern.test(email)==false){
				alert("Please enter valid email");
				document.getElementById("email").focus();
				return false;
			}
			if(msg==""){
				alert("Please enter your message");
				document.getElementById("message").focus();
				return false;
			}
			
			document.feedback.submit();
			
			
		}
	
	
		Element.prototype.remove = function() {
			this.parentElement.removeChild(this);
		}
		
		
		NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
			for(var i = this.length - 1; i >= 0; i--) {
				if(this[i] && this[i].parentElement) {
					this[i].parentElement.removeChild(this[i]);
				}
			}
		}
		
		var shopname;
		var contact_email;
		var contact_mobile;
		var shop_address, shop_city, shop_state, shop_country, product_currency;
		function last_check(){
			var start=0;
			var pattern=/^[A-Za-z0-9']+(\s{0,1}[A-Za-z0-9'])*$/;
			shopname = document.getElementById('shopname').value;
			contact_email = document.getElementById('contact_email').value;
			contact_mobile = document.getElementById('contact_mobile').value;
			shop_address = document.getElementById('shop_address').value;
			shop_city = document.getElementById('shop_city').value;
			shop_state = document.getElementById('shop_state').value;
			shop_country = document.getElementById('shop_country').value;
			product_currency = document.getElementById('product_currency').value;
			if(shopname==''){
				alert("Please Enter Shop Name");
				document.getElementById("shopname").focus();
				return false;
			}
			else if(pattern.test(shopname)==false){
				alert("Shop Name should only contain alphabets");
				document.getElementById("shopname").value='';
				document.getElementById("shopname").focus();
				return false;
			}
			else if(shopname.length<2 || shopname.length > 50){
				alert("Shop Name should have no of characters between 2 to 50!");
				document.getElementById("shopname").value='';
				document.getElementById("shopname").focus();
				return false;
			}
			if(document.getElementById('product_type').value==''){
				alert("Please Select how many Products!");
				document.getElementById("product_type").focus();
				return false;
			}
			else if (isNaN(document.getElementById('product_type').value) || document.getElementById('product_type').value < 0 || !(document.getElementById('product_type').value % 1 === 0)){
				alert("Number of products must be positive integer!");
				document.getElementById("product_type").focus();
				return false;
			}
			else if (shop_address == ''){
				alert("Please enter shop address!");
				document.getElementById("shop_address").focus();
				return false;
			}
			else if (contact_email == ''){
				alert("Please enter contact email!");
				document.getElementById("contact_email").focus();
				return false;
			}
			else if (contact_mobile == ''){
				alert("Please enter contact mobile!");
				document.getElementById("contact_mobile").focus();
				return false;
			}
			else if (shop_city == ''){
				alert("Please enter city!");
				document.getElementById("shop_city").focus();
				return false;
			}
			else if (shop_state == ''){
				alert("Please enter state!");
				document.getElementById("shop_state").focus();
				return false;
			}
			else if (shop_country == ''){
				alert("Please enter country!");
				document.getElementById("shop_country").focus();
				return false;
			}
			document.getElementById('first_div').style.display='none';
			document.getElementById('before_submit').style.display='none';
			document.getElementById('final_submit').style.display='block';
			make_fields();
			/*while(start<count){
					var x=product_type[start];
					if(x==''){
						alert("Please Enter Product"+(start+1)+" Name");
						document.getElementById("product"+(start+1)).focus();
						return false;
					}
					else if(pattern.test(x)==false){
						alert("Product"+(start+1)+" should have no of characters between 2 to 10!");
						document.getElementById("product"+(start+1)).focus();
						return false;
					}
					else if(x.length < 2 || x.length > 10){
						alert("Product"+(start+1)+" should have no of characters between 2 to 10!");
						document.getElementById("product"+(start+1)).focus();
						return false;
					}
					start++;
				}*/
		}

		var start = 1, i;		
		var tr,td,newdiv;
		var array = [];
		var pad = "00000";
		var product_type=[];
		var product_list=[];
		function make_fields(){
			//alert(shopname);
			try{
				document.getElementById('second_div').remove();
				document.getElementById('hidden_second').style.display='none';
				product_type=[];
				//alert(array[0]);
				make_fields();
			}
			catch(err){
				var count = document.getElementById('product_type').value;
				array.push(count);
				if (array[0] != count){remove_fields(array[0]);}
				newdiv=document.createElement('div');
				newdiv.setAttribute("id", "div_in");
				document.getElementById('type').appendChild(newdiv);

				/*tr = document.createElement('tr');
				td = document.createElement('td');
				var x= 'product'+start;
				tr.setAttribute("id", "tr"+start);
				td.setAttribute('id', 'td'+start);
				td.innerHTML = x + "<input type='text' id="+x+" name="+x+" onfocusout='product_names("+start+");' required/>";
				document.getElementById('div_in').appendChild(tr);
				document.getElementById('tr'+start).appendChild(td);*/

				var second_div=document.createElement('div');
				second_div.setAttribute('id','second_div');
				second_div.style.display='none';
				document.getElementById('hidden_second').style.display='block';
				document.getElementById('hidden_second').appendChild(second_div);
				var header_second_div=document.createElement('header');
				header_second_div.setAttribute('id','header_second_div');
				second_div.appendChild(header_second_div);
				header_second_div.innerHTML='<h3>Step 2<br>Note: DO NOT REFRESH PAGE NOW</h3></h3>';
				var header,p,newdiv1,table,tr,td1,td2,newdiv2;
				var in_second_div = document.createElement('div');
				in_second_div.setAttribute('id','in_second_div');
				second_div.appendChild(in_second_div);
				
				header=document.createElement('header');
				header.setAttribute('id','header'+(start));
				in_second_div.appendChild(header);
				p=document.createElement('p');
				p.setAttribute('id','p'+(start));
				header.appendChild(p);
				//document.getElementById('p'+(start)).innerHTML='Product Type -> '+product_type[start-1];
				document.getElementById('header'+(start)).appendChild(p);
				newdiv1=document.createElement('div');
				newdiv1.setAttribute('id','in_in_second_div'+(start));
				newdiv1.setAttribute('class','12u 12u$(4)');
				in_second_div.appendChild(newdiv1);
				table=document.createElement('table');
				table.setAttribute('id','table'+(start));
				newdiv1.appendChild(table);
				tr=document.createElement('tr');
				tr.setAttribute('id','table'+start+'tr');
				table.appendChild(tr);
				td1=document.createElement('td');
				td1.setAttribute('id','table'+start+'td1');
				tr.appendChild(td1);
				document.getElementById('table'+start+'td1').innerHTML='Choose Fields to Represent Product : Product' +start;
				td2=document.createElement('td');
				td2.setAttribute('id','table'+start+'td2');
				tr.appendChild(td2);
				newdiv2=document.createElement('div');
				newdiv2.setAttribute('id','in_in_in_second_div'+(start));
				newdiv2.setAttribute('class','9u 12u$(3)');
				
				var count_temp = ""+start;

				newdiv2.innerHTML='<form enctype="multipart/form-data" method="post" name="data_product" id="data_product" action="upload_product_data.php">'+
					'<select id="Category" name="Category" onchange="SelectSubCat();">'+
					'<option value="category">category</option>'+
					'<option value="electronics">electronics</option>'+
					'<option value="accessories">accessories</option>'+
					'<option value="footwear">footwear</option>'+
					'<option value="top wear">top wear</option>'+
					'<option value="bottom wear">bottom wear</option>'+
					'<option value="innerwear">innerwear</option>'+
					'<option value="baby and kids">baby and kids</option>'+
					'<option value="toys">toys</option>'+
					'<option value="home">home</option>'+
					'<option value="furniture">furniture</option>'+
					'<option value="books">books</option>'+
					'<option value="games">games</option>'+
					'<option value="sports">sports</option>'+
					'<option value="fitness">fitness</option>'+
					'<option value="other">other</option>'+
					'</select><label>Select product category<font Size="5" Color="red">*</font></label>'+
					'<select id="SubCat" name="SubCat"><option value="subcategory"></option></select><label>Select product subcategory<font Size="5" Color="red">*</font></label>'+
					'<input type="text" id="product_name" name="product_name" required/><label>Product name<font Size="5" Color="red">*</font></label>'+
					'<input type="text" id="product_price" name="product_price" required/><label>Product price<font Size="5" Color="red">*</font></label>'+
					'<input type="text" id="product_stock" name="product_stock" required/><label>Product stock<font Size="5" Color="red">*</font></label>'+
					'<input type="text" id="product_threshold" name="product_threshold" required/><label>Product threshold (it will notify when stock reaches threshold)<font Size="5" Color="red">*</font></label>'+
					'<input type="file" id="product_image[]" name="product_image[]" accept="image/*" required multiple/><label>Product image (You can select multiple images)<font Size="5" Color="red">*</font></label>'+
					'<input type="hidden" id="product_id" name="product_id" value="'+(pad.substring(0, 5-count_temp.length)+count_temp)+'">'+
					'<input type="text" id="product_brand" name="product_brand"><label>Product brand</label>'+
					'<input type="text" id="product_size" name="product_size" placeholder="width x height x depth or S/M/L/XL"><label>Product size</label>'+
					'<input type="text" id="product_description" name="product_description"><label>Product description</label>'+
					'<input type="text" id="product_gender" name="product_gender"><label>Product gender</label>'+
					'<input type="text" id="product_offer_price" onkeyup="get_offer_percentage(this.value)" name="product_offer_price"><label>Product offer price</label>'+
					'<input type="text" id="product_offer_percentage" onkeyup="get_offer_price(this.value)" name="product_offer_percentage"><label>Product offer in percentage(%)</label>'+
					'<input type="text" id="product_color" name="product_color"><label>Product color</label>'+
					'<input type="hidden" id="shop_name" name="shop_name" value="'+shopname+'">'+
					'<input type="hidden" id="product_cat" name="product_cat">'+
					'<input type="hidden" id="product_subcat" name="product_subcat">'+
					'<input type="hidden" id="temp_flag" name="temp_flag" value="0">'+
					'<input type="hidden" id="shop_address" name="shop_address" value="'+shop_address+'">'+
					'<input type="hidden" id="shop_city" name="shop_city" value="'+shop_city+'">'+
					'<input type="hidden" id="shop_state" name="shop_state" value="'+shop_state+'">'+
					'<input type="hidden" id="shop_country" name="shop_country" value="'+shop_country+'">'+
					'<input type="hidden" id="contact_email" name="contact_email" value="'+contact_email+'">'+
					'<input type="hidden" id="contact_mobile" name="contact_mobile" value="'+contact_mobile+'">'+
					'<input type="hidden" id="product_currency" name="product_currency" value="'+product_currency+'">'+
					'</form>';
				if (start < count){
					var button = document.createElement("BUTTON");
					var button_name = document.createTextNode("Next entry");
					button.onclick = function(){
						var pname = document.getElementById('product_name').value;
						var product_offer_price = document.getElementById('product_offer_price').value;
						var product_offer_percentage = document.getElementById('product_offer_percentage').value;
						var product_price = document.getElementById('product_price').value;
						if (pname==''){
							alert('Please enter product name!');
							document.getElementById('product_name').focus();
							return false;
						}
						else if (document.getElementById('product_price').value=='' || isNaN(document.getElementById('product_price').value) || document.getElementById('product_price').value < 0){
							alert('Please enter valid product price!');
							document.getElementById('product_price').focus();
							return false;
						}
						else if (document.getElementById('product_stock').value=='' || isNaN(document.getElementById('product_stock').value) || document.getElementById('product_stock').value < 0 || !(document.getElementById('product_stock').value % 1 === 0)){
							alert('Please enter valid product stock!');
							document.getElementById('product_stock').focus();
							return false;
						}
						else if (document.getElementById('product_threshold').value=='' || isNaN(document.getElementById('product_threshold').value) || document.getElementById('product_threshold').value < 0 || !(document.getElementById('product_threshold').value % 1 === 0)){
							alert('Please enter valid product threshold!');
							document.getElementById('product_threshold').focus();
							return false;
						}
						else if (document.getElementById('Category').value=='category'){
							alert('Please select product category');
							document.getElementById('Category').focus();
							return false;
						}
						else if (document.getElementById('SubCat').value=='subcategory'){
							alert('Please select product subcategory');
							document.getElementById('SubCat').focus();
							return false;
						}
						else if (document.getElementById('product_image[]').value == ''){
							alert('You must select at least one image!');
							document.getElementById('product_image[]').focus();
							return false;
						}
						else if (product_offer_price != '' && (isNaN(product_offer_price) || product_offer_price < 0)){
							alert('Offer price must be a non-nagetive number!');
							document.getElementById('product_offer_price').focus();
							return false;
						}
						else if (product_offer_percentage != '' && (isNaN(product_offer_percentage) || product_offer_percentage < 0)){
							alert('Offer percentage must be a non-nagetive number!');
							document.getElementById('product_offer_percentage').focus();
							return false;
						}
						else if (product_offer_price != '' || product_offer_percentage != ''){
							var get_per = ((product_price - product_offer_price)*100)/(product_price);
							if (!((product_offer_percentage - get_per) < 0.5 && (product_offer_percentage - get_per) > (0-0.5))){
								alert('Offer price and percentage not matched with actual price!');
								document.getElementById('product_offer_percentage').focus();
								return false;
							}
						}
						else if (product_offer_price > product_price){
							alert('Offer price cannot be more than product price!');
							document.getElementById('product_offer_price').focus();
							return false;
						}
						else if (product_offer_percentage > 100){
							alert('Offer percentage cannot be more than 100!');
							document.getElementById('product_offer_percentage').focus();
							return false;
						}
						else if (product_offer_price != '' && product_offer_percentage == ''){
							var get_percentage = ((product_price - product_offer_price)*100)/(product_price);
							document.getElementById('product_offer_percentage').value = get_percentage;
						}
						else if (product_offer_price == '' && product_offer_percentage != ''){
							var get_price = ((100 - product_offer_percentage)*product_price)/100;
							document.getElementById('product_offer_price').value = get_price;
						}

						for (i = 0; i < product_list.length; i++){
							if (product_list[i] == pname){
								alert('Product name cannot be same, product name '+pname+' matched with product '+(i+1));
								document.getElementById('product_name').value = '';
								return false;
							}
						}
						document.getElementById('product_cat').value = document.getElementById('Category').value;
						document.getElementById('product_subcat').value = document.getElementById('SubCat').value;	
						product_list.push(document.getElementById('product_name').value);
						start++;
						document.data_product.submit();

						make_fields();
					};
					button.appendChild(button_name);
				}
				//newdiv2.innerHTML='<input type="checkbox" id="p'+start+'_id" name="p'+start+'_id"><label for="p'+start+'_id">Product Id</label><input type="checkbox" id="p'+start+'_name" name="p'+start+'_name"><label for="p'+start+'_name">Product Name</label><input type="checkbox" id="p'+start+'_brand" name="p'+start+'_brand"><label for="p'+start+'_brand">Product Brand</label><input type="checkbox" id="p'+start+'_img" name="p'+start+'_img"><label for="p'+start+'_img">Product Image</label><input type="checkbox" id="p'+start+'_description" name="p'+start+'_description"><label for="p'+start+'_description">Product Description</label><input type="checkbox" id="p'+start+'_reviews" name="p'+start+'_reviews"><label for="p'+start+'_reviews">Product Reviews</label><input type="checkbox" id="p'+start+'_rating" name="p'+start+'_rating"><label for="p'+start+'_rating">Product Ratings</label><input type="checkbox" id="p'+start+'_size" name="p'+start+'_size"><label for="p'+start+'_size">Product Size</label><input type="checkbox" id="p'+start+'_sex" name="p'+start+'_sex"><label for="p'+start+'_sex">Product Gender</label><input type="checkbox" id="p'+start+'_price" name="p'+start+'_price"><label for="p'+start+'_price">Product Price</label><input type="checkbox" id="p'+start+'_offer_price" name="p'+start+'_offer_price"><label for="p'+start+'_offer_price">Product Offer_Price</label><input type="checkbox" id="p'+start+'_color" name="p'+start+'_color"><label for="p'+start+'_color">Product Color</label><input type="checkbox" id="p'+start+'_percent_offer" name="p'+start+'_percent_offer"><label for="p'+start+'_percent_offer">Product Offer(%)</label>';
				td2.appendChild(newdiv2);
				if (start < count)
					td2.appendChild(button);
				document.getElementById('second_div').style.display='block';

				//start++;

				/*while(start<=count){
					tr = document.createElement('tr');
					td = document.createElement('td');
					var x= 'product'+start;
					tr.setAttribute("id", "tr"+start);
					td.setAttribute('id', 'td'+start);
					td.innerHTML = x + "<input type='text' id="+x+" name="+x+" onfocusout='product_names("+start+");' required/>";
					document.getElementById('div_in').appendChild(tr);
					document.getElementById('tr'+start).appendChild(td);
					start++;
				}*/
			}
			
		}

		function get_offer_percentage(off_pri){
			var pro_pri = document.getElementById('product_price').value;
			if (pro_pri != '' && off_pri != '' && !isNaN(pro_pri) && !isNaN(off_pri) && off_pri >= 0 && pro_pri > 0){
				var get_percentage = ((pro_pri - off_pri)*100)/(pro_pri);
				document.getElementById('product_offer_percentage').value = get_percentage.toFixed(2);
			}
			if (off_pri == ''){
				document.getElementById('product_offer_percentage').value = '';
			}
		}		
		
		function get_offer_price(off_per){
			var pro_pri = document.getElementById('product_price').value;
			if (pro_pri != '' && off_per != '' && !isNaN(pro_pri) && !isNaN(off_per) && off_per >=0 && pro_pri > 0){
				var get_price = ((100 - off_per)*pro_pri)/100;
				document.getElementById('product_offer_price').value = get_price.toFixed(0);
			}
			if (off_per == ''){
				document.getElementById('product_offer_price').value = '';
			}
		}

		function last_submit(){
			if(confirm('Are you sure want to submit data entered till now? YOU CANNOT REVERT IF YOU PRESS OK!')){
				if (confirm('YOU CANNOT REVERT NOW. Do you want to submit entered data for this product? IF YOU PRESS OK, THIS PRODUCT DATA WILL BE SUBMITTED, ELSE ONLY PREVIOUS DATA WILL BE PRESERVED!')){
					var pname = document.getElementById('product_name').value;
					if (pname==''){
						alert('Please enter product name!');
						document.getElementById('product_name').focus();
						return false;
					}
					else if (document.getElementById('product_price').value=='' || isNaN(document.getElementById('product_price').value)){
						alert('Please enter product price!');
						document.getElementById('product_price').focus();
						return false;
					}
					else if (document.getElementById('product_stock').value=='' || isNaN(document.getElementById('product_stock').value)){
						alert('Please enter product stock!');
						document.getElementById('product_stock').focus();
						return false;
					}
					else if (document.getElementById('product_threshold').value=='' || isNaN(document.getElementById('product_threshold').value)){
						alert('Please enter product threshold!');
						document.getElementById('product_threshold').focus();
						return false;
					}
					else if (document.getElementById('Category').value=='category'){
						alert('Please select product category');
						document.getElementById('Category').focus();
						return false;
					}
					else if (document.getElementById('SubCat').value=='subcategory'){
						alert('Please select product subcategory');
						document.getElementById('SubCat').focus();
						return false;
					}
					for (i = 0; i < product_list.length; i++){
						if (product_list[i] == pname){
							alert('Product name cannot be same, product name '+pname+' matched with product '+(i+1));
							document.getElementById('product_name').value = '';
							return false;
						}
					}
					document.getElementById('product_cat').value = document.getElementById('Category').value;
					document.getElementById('product_subcat').value = document.getElementById('SubCat').value;	
					product_list.push(document.getElementById('product_name').value);
					start++;
					document.getElementById('temp_flag').value = "1";
					document.data_product.submit();
				}
				else{
					document.location.href = "template.php";
				}
			}
		}
		
		function remove_fields(number){
			delete array[0];
			document.getElementById('div_in').remove();
		}
		
		
		
		
		function form_reset(){
			try{
				document.getElementById('div_in').remove();
				product_type=[];
				array=[];
				document.builder.reset();
				document.getElementById('second_div').remove();
				document.getElementById('hidden_second').style.display='none';
				
			}
			catch(err){
				//do nothing
			}
		}
		
		
		
		
		function check_data_shop(){
			var pattern=/^[A-Za-z0-9']+(\s{0,1}[A-Za-z0-9'])*$/;
			var shopname = document.getElementById('shopname').value;
			start=0;
			if(shopname==''){
				alert("Please Enter Shop Name");
				document.getElementById("shopname").focus();
				return false;
			}
			else if(pattern.test(shopname)==false){
				alert("Shop Name should only contain alphabets, numbers and special characters(-')");
				document.getElementById("shopname").value='';
				document.getElementById("shopname").focus();
				return false;
			}
			else if(shopname.length<2 || shopname.length > 50){
				alert("Shop Name should have no of characters between 2 to 10!");
				document.getElementById("shopname").value='';
				document.getElementById("shopname").focus();
				return false;
			}
		}
		
		
		
		function product_names(n){
			var count2 = 1;

			if(document.getElementById('shopname').value==document.getElementById('product'+n).value){
				alert("Products and shop must have different names");
				document.getElementById('product'+n).value='';
				document.getElementById('product'+n).focus();
				return false;
			}

			while (count2 < n){
				if (document.getElementById('product'+(count2)).value==document.getElementById('product'+(n)).value){
					alert("Products must have different names product"+count2+" and product"+n+" have same name!");
					document.getElementById('product'+n).value='';
					document.getElementById("product"+n).focus();
					return false;
				}
				count2++;
			}
		
			if(n==document.getElementById('product_type').value){
				start=0;
				while(start<n){
					product_type[start]=document.getElementById('product'+(start+1)).value;
					start++;
				}
				make_product_div(n);
			}
			
		}
		
		
		function make_product_div(n){
			start=1;
			var second_div=document.createElement('div');
			second_div.setAttribute('id','second_div');
			second_div.style.display='none';
			document.getElementById('hidden_second').style.display='block';
			document.getElementById('hidden_second').appendChild(second_div);
			var header_second_div=document.createElement('header');
			header_second_div.setAttribute('id','header_second_div');
			second_div.appendChild(header_second_div);
			header_second_div.innerHTML='<h3>Step 2<br>Note: DO NOT REFRESH PAGE NOW</h3>';
			var header,p,newdiv1,table,tr,td1,td2,newdiv2;
			var in_second_div = document.createElement('div');
			in_second_div.setAttribute('id','in_second_div');
			second_div.appendChild(in_second_div);
			while(start<=n){
				header=document.createElement('header');
				header.setAttribute('id','header'+(start));
				in_second_div.appendChild(header);
				p=document.createElement('p');
				p.setAttribute('id','p'+(start));
				header.appendChild(p);
				document.getElementById('p'+(start)).innerHTML='Product Type -> '+product_type[start-1];
				document.getElementById('header'+(start)).appendChild(p);
				newdiv1=document.createElement('div');
				newdiv1.setAttribute('id','in_in_second_div'+(start));
				newdiv1.setAttribute('class','12u 12u$(4)');
				in_second_div.appendChild(newdiv1);
				table=document.createElement('table');
				table.setAttribute('id','table'+(start));
				newdiv1.appendChild(table);
				tr=document.createElement('tr');
				tr.setAttribute('id','table'+start+'tr');
				table.appendChild(tr);
				td1=document.createElement('td');
				td1.setAttribute('id','table'+start+'td1');
				tr.appendChild(td1);
				document.getElementById('table'+start+'td1').innerHTML='Choose Fields to Represent Product : ' +product_type[start-1];
				td2=document.createElement('td');
				td2.setAttribute('id','table'+start+'td2');
				tr.appendChild(td2);
				newdiv2=document.createElement('div');
				newdiv2.setAttribute('id','in_in_in_second_div'+(start));
				newdiv2.setAttribute('class','9u 12u$(3)');
				newdiv2.innerHTML='<input type="checkbox" id="p'+start+'_id" name="p'+start+'_id"><label for="p'+start+'_id">Product Id</label><input type="checkbox" id="p'+start+'_name" name="p'+start+'_name"><label for="p'+start+'_name">Product Name</label><input type="checkbox" id="p'+start+'_brand" name="p'+start+'_brand"><label for="p'+start+'_brand">Product Brand</label><input type="checkbox" id="p'+start+'_img" name="p'+start+'_img"><label for="p'+start+'_img">Product Image</label><input type="checkbox" id="p'+start+'_description" name="p'+start+'_description"><label for="p'+start+'_description">Product Description</label><input type="checkbox" id="p'+start+'_reviews" name="p'+start+'_reviews"><label for="p'+start+'_reviews">Product Reviews</label><input type="checkbox" id="p'+start+'_rating" name="p'+start+'_rating"><label for="p'+start+'_rating">Product Ratings</label><input type="checkbox" id="p'+start+'_size" name="p'+start+'_size"><label for="p'+start+'_size">Product Size</label><input type="checkbox" id="p'+start+'_sex" name="p'+start+'_sex"><label for="p'+start+'_sex">Product Gender</label><input type="checkbox" id="p'+start+'_price" name="p'+start+'_price"><label for="p'+start+'_price">Product Price</label><input type="checkbox" id="p'+start+'_offer_price" name="p'+start+'_offer_price"><label for="p'+start+'_offer_price">Product Offer_Price</label><input type="checkbox" id="p'+start+'_color" name="p'+start+'_color"><label for="p'+start+'_color">Product Color</label><input type="checkbox" id="p'+start+'_percent_offer" name="p'+start+'_percent_offer"><label for="p'+start+'_percent_offer">Product Offer(%)</label>';
				td2.appendChild(newdiv2);
				start++;
				
			}
			document.getElementById('second_div').style.display='block';
		}
		function img_click(n){
			window.location.href='template_show.php?temp=template'+n;
		}