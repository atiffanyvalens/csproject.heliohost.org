/*
   New Perspectives on JavaScript, 2nd Edition
   Tutorial 2
   Review Assignment

   Author: Tiffany
   Date:   10/20/2013
 
   Function List:
   showDateTime(time)
      Returns the date in a text string formatted as:
      mm/dd/yyyy at hh:mm:ss am

   changeYear(today, holiday)
      Changes the year value of the holiday object to point to the
      next year if it has already occurred in the present year

   countdown(stop, start)
      Displays the time between the stop and start date objects in the
      text format:
      dd days, hh hrs, mm mins, ss secs
*/

function showDateTime(time) {
	//Returns the date in a text string formatted as:
    //mm/dd/yyyy at hh:mm:ss am
	
   date = time.getDate();
   month = time.getMonth()+1;
   year = time.getFullYear();

   second = time.getSeconds();
   minute = time.getMinutes();
   hour = time.getHours();

   ampm = (hour < 12) ? " a.m." : " p.m.";
   hour = (hour > 12) ? hour - 12 : hour;
   hour = (hour == 0) ? 12 : hour;

   minute = minute < 10 ? "0"+minute : minute;
   second = second < 10 ? "0"+second : second;

   return month+ "/" +date+ "/" +year+ " at " +hour+ ":" +minute+ ":" +second+ampm;
}

/*
changeYear(today, holiday)
      Changes the year value of the holiday object to point to the
      next year if it has already occurred in the present year.
*/

function changeYear(today, holiday) {
	/*
	changeYear(today, holiday)
    Changes the year value of the holiday object to point to the next year if it has already occurred in the present year
	*/
	year = today.getFullYear();		
	// Use the setFullYear() date method to set the full year value of the holiday date object 
	// to the value of year variable.
	holiday.setFullYear(year); 
	
	year = (holiday < today) ? year + 1 : year;
	//Set the full year value of the holiday date object to the value of year variable.
	holiday.setFullYear(year); 
	
}

function countdown(start, stop){
	
	var time = (stop - start); //the time difference will be in milliseconds.

	var days = time/(1000*60*60*24);
	var hrs= (days-Math.floor(days))*24;
	var mins= (hrs-Math.floor(hrs))*60;
	var secs=(mins-Math.floor(mins))*60;
	return Math.floor(days)+" days, "+Math.floor(hrs)+" hrs, "+Math.floor(mins)+" mins, "
	+Math.floor(secs)+" secs";  
}
