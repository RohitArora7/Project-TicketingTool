
<style>

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
</style>


<center><h1> Form <a ui-sref="home" >x</a></h1></center>

<table class="table2" border = "0">


 <tr class="table_row2">
  <td class="table_data2">User Id:</td>
  <td class="table_data2"><input type='text' ng-model="$parent.userid" /></td>
 </tr>

 <tr class="table_row2">
  <td class="table_data2">Name:</td>
  <td class="table_data2"><input type='text' ng-model="$parent.team_rname" /></td>
 </tr>

  
  <tr class="table_row2">
  <td class="table_data2">Team:</td>
  <td class="table_data2"><input type='text' ng-model="$parent.team" /></td>
  </tr>
  
  <tr class="table_row2">
  <td class="table_data2">Ticket To:</td>
  <td class="table_data2"><select id="txtSample2" ng-model="$parent.formData.ticket_to">
<option ng-repeat="x in option_f" value="{{x.model}}">{{x.model}}</option>
</select></td>
  </tr>
 
		
<tr class="table_row2">
  <td class="table_data2">Subject:</td>
  <td class="table_data2"><input type='text' ng-model="$parent.formData.subject" />	</td>
  </tr>
  
  <tr class="table_row2">
  <td class="table_data2">Body:</td>
  <td class="table_data2"><textarea type='text' ng-model="$parent.formData.body" rows="5" cols="40"></textarea><td>
  </tr> 

<tr><td>
<button id="second" type="submit" class="btn btn-primary btn-lg" ng-click="createTodo()">Submit</button></td></tr>		
</table>			







