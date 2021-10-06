<style>
/*
=====
LEVEL 1. RESET STYLES
=====
*/

.field{
  --uiFieldPlaceholderColor: var(--fieldPlaceholderColor, #767676);
}

.field__input{ 
  background-color: transparent;
  border-radius: 0;
  border: none;

  -webkit-appearance: none;
  -moz-appearance: none;

  font-family: inherit;
  font-size: 1em;
}

.field__input:focus::-webkit-input-placeholder{
  color: var(--uiFieldPlaceholderColor);
}

.field__input:focus::-moz-placeholder{
  color: var(--uiFieldPlaceholderColor);
  opacity: 1;
}

/*
=====
LEVEL 2. CORE STYLES
=====
*/

.a-field{
  display: inline-block;
}

.a-field__input{ 
  display: block;
  box-sizing: border-box;
  width: 100%;
}

.a-field__input:focus{
  outline: none;
}

/*
=====
LEVEL 3. PRESENTATION STYLES
=====
*/

/* a-field */

.a-field{
  --uiFieldHeight: var(--fieldHeight, 2.5rem);  
  --uiFieldBorderWidth: var(--fieldBorderWidth, 2px);
  --uiFieldBorderColor: var(--fieldBorderColor);

  --uiFieldFontSize: var(--fieldFontSize, 1rem);
  --uiFieldHintFontSize: var(--fieldHintFontSize, 1rem);

  --uiFieldPaddingRight: var(--fieldPaddingRight, 1rem);
  --uiFieldPaddingBottom: var(--fieldPaddingBottom, 1rem);
  --uiFieldPaddingLeft: var(--fieldPaddingLeft, 1rem);   

  position: relative;
  box-sizing: border-box;
  font-size: var(--uiFieldFontSize);
  padding-top: 1rem;  
}

.a-field__input{
  height: var(--uiFieldHeight);
  padding: 0 var(--uiFieldPaddingRight) 0 var(--uiFieldPaddingLeft);
  border-bottom: var(--uiFieldBorderWidth) solid var(--uiFieldBorderColor);  
}

.a-field__input::-webkit-input-placeholder{
  opacity: 0;
  transition: opacity .2s ease-out;
}

.a-field__input::-moz-placeholder{
  opacity: 0;
  transition: opacity .2s ease-out;
}

.a-field__input:not(:placeholder-shown) ~ .a-field__label-wrap .a-field__label{
  opacity: 0;
  bottom: var(--uiFieldPaddingBottom);
}

.a-field__input:focus::-webkit-input-placeholder{
  opacity: 1;
  transition-delay: .2s;
}

.a-field__input:focus::-moz-placeholder{
  opacity: 1;
  transition-delay: .2s;
}

.a-field__label-wrap{
  box-sizing: border-box;
  width: 100%;
  height: var(--uiFieldHeight);	

  pointer-events: none;
  cursor: text;

  position: absolute;
  bottom: 0;
  left: 0;
}

.a-field__label{
  position: absolute;
  left: var(--uiFieldPaddingLeft);
  bottom: calc(50% - .5em);

  line-height: 1;
  font-size: var(--uiFieldHintFontSize);

  pointer-events: none;
  transition: bottom .2s cubic-bezier(0.9, -0.15, 0.1, 1.15), opacity .2s ease-out;
  will-change: bottom, opacity;
}

.a-field__input:focus ~ .a-field__label-wrap .a-field__label{
  opacity: 1;
  bottom: var(--uiFieldHeight);
}

/* a-field_a1 */

.a-field_a1 .a-field__input{
  transition: border-color .2s ease-out;
  will-change: border-color;
}

.a-field_a1 .a-field__input:focus{
  border-color: var(--fieldBorderColorActive);
}

/* a-field_a2 */

.a-field_a2 .a-field__label-wrap::after{
  content: "";
  box-sizing: border-box;
  width: 0;
  height: var(--uiFieldBorderWidth);
  background-color: var(--fieldBorderColorActive);

  position: absolute;
  bottom: 0;
  left: 0;  

  will-change: width;
  transition: width .285s ease-out;
}

.a-field_a2 .a-field__input:focus ~ .a-field__label-wrap::after{
  width: 100%;
}

/* a-field_a3 */

.a-field_a3{
  padding-top: 1.5rem;
}

.a-field_a3 .a-field__label-wrap::after{
  content: "";
  box-sizing: border-box;
  width: 100%;
  height: 0;

  opacity: 0;
  border: var(--uiFieldBorderWidth) solid var(--fieldBorderColorActive);

  position: absolute;
  bottom: 0;
  left: 0;

  will-change: opacity, height;
  transition: height .2s ease-out, opacity .2s ease-out;
}

.a-field_a3 .a-field__input:focus ~ .a-field__label-wrap::after{
  height: 100%;
  opacity: 1;
}

.a-field_a3 .a-field__input:focus ~ .a-field__label-wrap .a-field__label{
  bottom: calc(var(--uiFieldHeight) + .5em);
}

/*
=====
LEVEL 4. SETTINGS
=====
*/

.field{
  --fieldBorderColor: #D1C4E9;
  --fieldBorderColorActive: #673AB7;
}

</style>


<div ng-init="getInfo();"></div>

<style>
.table, .table_data, .table_head {  
  border:2px solid #ddd;
  text-align: left;
}

.table {
  border-collapse: collapse;
   
}

.table_head, .table_data {
  padding: 5px;
  font-family: verdana;
  font-size: 13px;
  text-align:center;


 
 
  
}


.table_data2 {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  background-color:white;
}

.table2{
	padding-left:20px;
padding-right:20px;
width:100%;

}

.table3{
	padding-left:20px;
padding-right:20px;
width:100%;

}

.table_head3, .table_data3 {
 background-color:white;
  padding: 10px;
  
  text-align:center;
}

button {
  background-color: #e7e7e7; /* Green */
  border: none;
  color: black;
  padding: 8px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 0px 2px;
  cursor: pointer;
  transition-duration: 0.4s;
}

button:hover {background-color: #008CBA;color: white;}

.New{background-color: red;}
.Hold{background-color: #00BFFF;}
.Transfer{background-color: #F5F5F5;}
.work.in.process{background-color: #FF8C00;}
.Closed{background-color: #9ACD32;}
</style>

<div  style="position:absolute;left:10px;top:190px;background-color:#F5F5F5;padding:10px;height:400px;width:155px">
<center><div style='font-family: verdana;font-size: 17px;'><b>User Info</b></div></center><br><br>
<div style='font-family: Aerial;font-size: 17px;'><b>Team</b>: {{a}}</div><br>
<div style='font-family: Aerial;font-size: 17px;'><b>User Id</b>: {{team_name}}</div>

<br>
 <label class="field a-field a-field_a1">
    <input ng-model='team_rname' class="field__input a-field__input" placeholder="e.g. Stanislav" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Name</span>
    </span>
  </label>
   <label class="field a-field a-field_a1">
    <input ng-model='team_rphone' class="field__input a-field__input" placeholder="e.g. Stanislav" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Phone no.</span>
    </span>
  </label>
   <label class="field a-field a-field_a1">
    <input ng-model='team_remail' class="field__input a-field__input" placeholder="e.g. Stanislav" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Email</span>
    </span>
  </label>
  <br>
  <br>
  <button ng-click="user_update()" >Update</button>
  
  
</div>

<div style="position:absolute;left:190px;top:190px;width:684px;height:400px;background-color:white;">

<div  ng-show="one_m" style="position:absolute;left:20px;top:10px;">


<button  ui-sref=".form" ng-click="formshow()" >Create a Ticket</Button><button  ng-click="getInfo()" >{{a}} Tickets</Button><button  ng-click="getInfo2()" >My Ticket</Button><button  	ng-click="homee()" >LOGOUT</Button><br><br>

<input ng-model="q" id="search" class="form-control" placeholder="Filter text"><input type="number" min="1" max="50" class="form-control" ng-model="pageSize">
  <br>
  <table class="table" style="table-layout: fixed;width:100%">
  <!--<a ui-sref=".form" >Form</a>-->
 
         <tr class="table_row">
            <th class="table_head" width="10%">Ticket no.</th>
            <th class="table_head" width="20%">Name</th>
			<th class="table_head" width="25%" style="text-overflow: ellipsis;overflow: hidden; white-space: nowrap;" >Subject</th>
			<th class="table_head" width="25%">Status </th>
			<th class="table_head" width="25%" ng-click="sort('date_time')">Date </th>
	<!--		<th class="table_head">Team</th>  -->
			<th class="table_head" width="30%">Action</th>
         </tr>

<tr class="table_row" dir-paginate="detail in details |orderBy:sortKey:reverse  | customSorter:'status' | filter:q | itemsPerPage: pageSize " current-page="currentPage"  >
<!--<tr class="table_row" ng-repeat="detail in details   |customSorter:'status' " >-->
<td class="table_data">{{detail.id}}</td>
<td class="table_data">{{detail.name}}</td>
<td class="table_data" style="text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">{{detail.subject}}</td>
<td class="table_data" ng-class="detail.status">{{detail.status}}</td>
<td class="table_data">{{detail.date_time}}</td>
<!-- <td class="table_data">{{detail.team}}</td>-->

<td class="table_data">
<button ng-click="readshow(detail)" >Read</button><button ui-sref=".userinfo" ng-click="getInfo3(detail.userid)" >User Info</button>	
</td>





</tr>

</table>
<div class="bootstrap-iso" style="background-color:white; ">

          <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="dirPagination.tpl.html"></dir-pagination-controls>
</div>
</div>

<!-----------------               my ticket                                      --------------->


<div ng-show="second_m" style="position:absolute;left:20px;top:10px;">



<button  ui-sref=".form" ng-click="formshow()" >Create a Ticket</Button><button  ng-click="getInfo()" >{{a}} Tickets</Button><button  ng-click="getInfo2()" >My Ticket</Button><button  	ng-click="homee()" >LOGOUT</Button>
<br><br>

<input ng-model="q" id="search" class="form-control" placeholder="Filter text"><input type="number" min="1" max="50" class="form-control" ng-model="pageSize">
  <br>
  <table class="table" style="table-layout: fixed;width:100%">
  <!--<a ui-sref=".form" >Form</a>-->
 
         <tr class="table_row">
            <th class="table_head" width="10%">Ticket no.</th>
            <th class="table_head"  width="10%">Name</th>
			<th class="table_head"  width="25%">Subject</th>
			<th class="table_head"  width="10%">Status </th>
			<th class="table_head" width="15%" ng-click="sort('date_time')">Date </th>
		<!--	<th class="table_head">Team</th>-->
			<th class="table_head"  width="10%">Assign to</th>
			<th class="table_head"  width="10%">Action</th>
         </tr>

<tr class="table_row" dir-paginate="detail in details |orderBy:sortKey:reverse  | customSorter:'status' | filter:q | itemsPerPage: pageSize " current-page="currentPage"  >
<!--<tr class="table_row" ng-repeat="detail in details   |customSorter:'status' " >-->
<td class="table_data">{{detail.id}}</td>
<td class="table_data">{{detail.name}}</td>
<td class="table_data" style="text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">{{detail.subject}}</td>
<td class="table_data" ng-class="detail.status">{{detail.status}}</td>
<td class="table_data">{{detail.date_time}}</td>
<!-- <td class="table_data">{{detail.team}}</td>-->
<td class="table_data">{{detail.ticket_to}}</td>

<td class="table_data">
<button ng-click="readshow3(detail)" >Read</button>	
</td>





</tr>

</table>
<div class="bootstrap-iso" style="background-color:white; ">

          <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="dirPagination.tpl.html"></dir-pagination-controls>
</div>
</div>


</div>



<!--------------------------------------------------------------------ticket content-------------------------------->
<!--------------------------------------------------------------------ticket content-------------------------------->
<!--------------------------------------------------------------------ticket content-------------------------------->
<!--------------------------------------------------------------------ticket content-------------------------------->
<!--------------------------------------------------------------------ticket content-------------------------------->




<div style="position:absolute;left:900px;top:150px;width:484px;height:500px;background-color:#F5F5F5;overflow-x: hidden;overflow-y: scroll;">
<div ng-show="show_data" >

<div  ng-repeat="detail in details2  "   >

<table class="table2" >
<br>
<span style="font-size: 150%;padding-left:150px;">Work Ticket</span>
<br><br>
 <tr class="table_row2">
  <td class="table_data2" style="" >Name:</td>
  <td class="table_data2">{{detail.name}}</td>
  </tr>
		
<tr class="table_row2">
  <td class="table_data2">Subject:</td>
  <td class="table_data2">{{detail.subject}}	</td>
  </tr>
  
  <tr class="table_row2">
  <td class="table_data2">Body:</td>
  <td class="table_data2" style="" >{{detail.body}}</td>
  </tr>
  
  
  <tr class="table_row2">
  <td class="table_data2">Team:</td>
  <td class="table_data2">{{detail.team}}</td>
  </tr>
  
  <tr class="table_row2">
  <td class="table_data2">Status:</td>
  <td class="table_data2">
 <!-- <select id="tokenn"  >
<option ng-repeat="x in option_t" value="{{x.model}}"  ng-selected="detail.status == x.model"  >{{x.model}}</option>
</select>
-->


  <select name="type" ng-model="payment"
                    ng-dropdown required 
                    ng-change="changeme(payment)"
                    ng-options="option.model for option in option_t"  >
                </select>


 <span ng-show="pay == 'Transfer'" >
 > <select name="type" ng-model="$parent.t_token" ng-options="optionn.model for optionn in option_f"  >
                </select>
</span>

</td>
  </tr>
  
   <tr class="table_row2">
  <td class="table_data2"></td>
  <td class="table_data2">  Comment<textarea  id="third" ng-model="$parent.formDataa"  rows="5" cols="47"></textarea><br><button ng-click="read_update(detail.id,formDataa,payment,t_token,detail.ticket_to,'wt')" >Submit</button></td>
  </tr>
  
  
		
</table>

</div>
<br><br>
<!-----------------                        ticket comment                                                --------------->
<div ng-if="comment!=''"  >
<span style="font-size: 150%;padding-left:23px;">Comment</span>

<br><br>


<table class="table3" >
 <tr class="table_row3">
    <th class="table_head3">Status</th>
	<th class="table_head3">Comment</th>
 </tr>
	
 <tr class="table_row3" ng-repeat="com in comment  "  >
 
     <td class="table_data3"><span style="font-size: 60%;">{{com.date_time}}</span><br>	{{com.status}}<br><span style="font-size: 60%;">{{com.name}}<span ng-if="com.comment_to!=''"  > > </span> {{com.comment_to}}</span> </td>
     <td class="table_data3">{{com.comment}}</td>
 </tr>

</table>

</div>


</div>

<!--///////////////////////////////////////////////////////my tickets content//////////////////////////////////////////////////////--->
<div ng-show="show_data2" >

<div  ng-repeat="detail in details2  "   >

<table class="table2" >
<br>
<span style="font-size: 150%;padding-left:150px;">My Tickets</span>
<br><br>
 <tr class="table_row2">
  <td class="table_data2" style="" >Name:</td>
  <td class="table_data2">{{detail.name}}</td>
  </tr>
		
<tr class="table_row2">
  <td class="table_data2">Subject:</td>
  <td class="table_data2">{{detail.subject}}	</td>
  </tr>
  
  <tr class="table_row2">
  <td class="table_data2">Body:</td>
  <td class="table_data2" style="" >{{detail.body}}</td>
  </tr>
  
  
  <tr class="table_row2">
  <td class="table_data2">Team:</td>
  <td class="table_data2">{{detail.team}}</td>
  </tr>
  
   <tr ng-show='hide'  class="table_row2">
  <td class="table_data2">Team:</td>
  <td class="table_data2"><select ng-model="payment" ng-options="option.model for option in option_t" ></select></td>
  </tr>
  
 <!-- <tr class="table_row2">
  <td class="table_data2">Status:</td>
  <td class="table_data2">
 <!-- <select id="tokenn"  >
<option ng-repeat="x in option_t" value="{{x.model}}"  ng-selected="detail.status == x.model"  >{{x.model}}</option>
</select>
-->

<!--
  <select name="type" ng-model="payment"
                    ng-dropdown required 
                    ng-change="changeme(payment)"
                    ng-options="option.model for option in option_t"  >
                </select>


 <span ng-show="pay == 'Transfer'" >
 > <select name="type" ng-model="$parent.t_token" ng-options="optionn.model for optionn in option_f"  >
                </select>
</span>

</td>
  </tr>-->
  
   <tr class="table_row2">
  <td class="table_data2"></td>
  <td class="table_data2">  Comment<textarea  id="third" ng-model="$parent.formDataa"  rows="5" cols="47"></textarea><br><button ng-click="read_update(detail.id,formDataa,payment,detail.ticket_to,detail.userid,'mt')" >Submit</button></td>
  </tr>
  
  
		
</table>

</div>
<br><br>
<!-----------------                        ticket comment                                                --------------->
<div ng-if="comment!=''"  >
<span style="font-size: 150%;padding-left:23px;">Comment</span>

<br><br>


<table class="table3" >
 <tr class="table_row3">
    <th class="table_head3">Status</th>
	<th class="table_head3">Comment</th>
 </tr>
	
 <tr class="table_row3" ng-repeat="com in comment  "  >
 
     <td class="table_data3"><span style="font-size: 60%;">{{com.date_time}}</span><br>	{{com.status}}<br><span style="font-size: 60%;">{{com.name}}<span ng-if="com.comment_to!=''"  > ></span> {{com.comment_to}}</span> </td>
     <td class="table_data3">{{com.comment}}</td>
 </tr>

</table>

</div>


</div>

<!-- Form show-->
<div ui-view></div>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br>


