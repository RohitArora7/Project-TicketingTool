<style>
.drop{
  
  padding: 1px 20px;
  margin: 4px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}
</style>
<center>
<h1>LOGIN</h1>
<br><br><br><br>
Team
<br><br>
<select  name="type" ng-model="team_login" ng-options="optionn.model for optionn in option_f" class="drop" > </select>
<br><br><input class="drop"  type='text' ng-model="team_name" placeholder='Name'/>
<br><br><input class="drop"  type='password' ng-model="team_pass"  placeholder='Password' />
<br><br>

<button ng-click="login(team_login)" >Submit</button>
</center>

<br>
<b>Testing</b>
<br>

<pre>
Team : IT Support
User Name : test555	
Password : password

Team : Finance
User Name : test666	
Password : password

Team : Accounts
User Name : test777
Password : password


</pre>