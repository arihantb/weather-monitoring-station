var date = new Date();
var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]; 
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var ids = ["today", "tomorrow", "day3", "day4", "day5", "day6", "day7"];
var day = date.getDay();

for(var i = 0; i < 7; i++) {
	var elMsg = document.getElementById(ids[i]);
	elMsg.textContent = weekday[(day + i) % 7];	
}

var eldate = document.getElementById('date');
eldate.textContent = date.getDate() + ' ' + months[date.getMonth()];