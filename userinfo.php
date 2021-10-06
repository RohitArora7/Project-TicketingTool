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
<center><h1> User Info </h1></center>

{{test}}

<div  ng-repeat="detail in details3 "   >
<table class="table2" >
<br><br>
 <tr class="table_row2">
  <td class="table_data2" style="" >User Id:</td>
  <td class="table_data2">{{detail.team_name}}</td>
  </tr>
		
<tr class="table_row2">
  <td class="table_data2">Name:</td>
  <td class="table_data2">{{detail.team_rname}}	</td>
  </tr>
  
  
  <tr class="table_row2">
  <td class="table_data2">Team:</td>
  <td class="table_data2">{{detail.team}}</td>
  </tr>
  
  
  <tr class="table_row2">
  <td class="table_data2">Phone no.:</td>
  <td class="table_data2" style="" >{{detail.team_rphone}}</td>
  </tr>
  
  
  <tr class="table_row2">
  <td class="table_data2">Email Id:</td>
  <td class="table_data2">{{detail.team_remail}}</td>
  </tr>
  

 </table>
 
 <div>