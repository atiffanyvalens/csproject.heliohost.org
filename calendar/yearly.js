/*
   New Perspectives on JavaScript, 2nd Edition
   Tutorial 3
   Review Assignment

   Author: Anastasia Tiffany Valens
   Date:   11/1/2013

   Function List:
   yearly(calendarDay)
      Creates the yearly calendar, highlighting the date 
      specified in the calendarDay parameter.

   writeMonthCell(calendarDay, currentTime)
      Writes the yearly table cell containing a monthly
      calendar.

   writeMonth(calendarDay, currentTime)
      Creates the calendar table for the month specified in the
      calendarDay parameter. The currentTime parameter stores the
      time value of the current date.

   writeMonthTitle(calendarDay)
      Writes the month name in the monthly table

   writeDayNames()
      Writes the weekday title rows in the calendar table

   daysInMonth(calendarDay)
      Returns the number of days in the month from calendarDay

   writeMonthDays(calendarDay, currentTime)
      Writes the daily rows in the monthly table, highlighting
      the date specified in the currentTime parameter.

   writeDay(weekDay, dayCount, calendarDay, currentTime)
      Write the opening and close table row tags and the table
      cell tag for an individual day in the calendar.

*/

function yearly(calDate){

//Creates the yearly calendar, highlighting the date specified in the calendarDay parameter.
//Calendar must have a value. If zero, make a new Date.
	  
	  if (calDate == 0) //or null is the same
	  {
		calendarDay = new Date();
	  }
	
	  else //Or we use the given calendarDay.
	  
		{ 	
			calendarDay = calDate;
		}
	
	//Get the current time and year.
	var currentTime = calendarDay.getTime();
	var thisYear = calendarDay.getFullYear();
	
	//Write the first row: 		yyyy
	document.write("<table id = 'yearly_table'>");
	document.write("<tr>");
	document.write("<th id = 'yearly_title' colspan ='4'>");
	document.write(thisYear);
	document.write("</th>");
	document.write("</tr>"); 
	
	
	var monthNum = -1;
	
	for(i = 0; i<3; i++)  
		{
			//Write 3 new rows of the table.
			document.write("<tr>");	
				
			for(j = 0; j<4; j++)
			//Write 4 columns of the table. 
			{
				//Start from month 0. January
				monthNum++;
				//Set the first date "1" to the today's date.
				calendarDay.setDate(1); 
				//Set the month of current iteration to today's date.
				calendarDay.setMonth(monthNum);
				
				//Write the dates in each cell using writeMonthCell. 
				writeMonthCell(calendarDay, currentTime);			
				
			}
			
			//Close the row tag with </tr>
			document.write("</tr>");
		}
		
//End the table with a closing tag.
document.write("</table>");
		

}

function writeMonthCell(calendarDay, currentTime){

	document.write("<td class='yearly_months'>"); //Styling of yearly months class as in the css. 
	//Call the writeMonth function which would make the small tables.
	writeMonth(calendarDay, currentTime);
	document.write("</td>");

}

function writeMonth(calendarDay, currentTime) {
	//-------------------Small tables inside our big table.----------------------------------------------
	//Each small table begins with <table>
   document.write("<table class='monthly_table'>");
   writeMonthTitle(calendarDay);
   writeDayNames()
   writeMonthDays(calendarDay, currentTime);
   //Ending the table.
   document.write("</table>");
}

function writeMonthTitle(calendarDay) {
	//Like the tutorial, write the month title.
   var monthName = new Array("January", "February", "March", "April", "May", 
   "June", "July", "August", "September", "October", "November", "December");

   var thisMonth=calendarDay.getMonth();
	
   //Row
   document.write("<tr>");
   document.write("<th class='monthly_title' colspan='7'>");
   document.write(monthName[thisMonth]);
   document.write("</th>");
   document.write("</tr>");
   //
}

function writeDayNames() {
	//Like the tutorial, write the days title.
   var dayName = new Array("S","M","T","W","R","F","S");  
   
   //Row
   document.write("<tr>");
   for (var i=0;i<dayName.length;i++) {
      document.write("<th class='monthly_weekdays'>"+dayName[i]+"</th>");
   }
   document.write("</tr>");
   //
}

function daysInMonth(calendarDay) {

	//Get how many days in the month,
   var thisYear = calendarDay.getFullYear();
   var thisMonth = calendarDay.getMonth();
   var dayCount = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
   if ((thisYear % 4 == 0)&&((thisYear % 100 !=0) || (thisYear % 400 == 0))) {
         dayCount[1] = 29;
   }
   return dayCount[thisMonth];
}

function writeMonthDays(calendarDay, currentTime) {

   var weekDay = calendarDay.getDay();

   document.write("<tr>");
   for (var i=0; i < weekDay; i++) { 
      document.write("<td></td>"); //Blank dates before the first day of the month.
   }

   var totalDays = daysInMonth(calendarDay);
   for (var dayCount=1; dayCount<=totalDays; dayCount++) {

      calendarDay.setDate(dayCount);
      weekDay = calendarDay.getDay();
      writeDay(weekDay, dayCount, calendarDay, currentTime);
   }
   
   document.write("</tr>");
}

function writeDay(weekDay, dayCount, calendarDay, currentTime) {

	//Same like tutorial. Separate this part. 
	//Beginning of each row of the dates from S to S.
   if (weekDay == 0) document.write("<tr>");
   
   //Checking is more sophisticated. See if the current time  is same as today's time.
   if (calendarDay.getTime() == currentTime) {
   //GetTime returns milliseconds time currently. Compare with the variable put in/currentTime;
      document.write("<td class='monthly_dates' id='today'>"+dayCount+"</td>");
   }

			//for other dates. same as count as it goes on. 
   else {
      document.write("<td class='monthly_dates'>"+dayCount+"</td>");
   }
   //Ending the date for that row. One row is finished. Put a closing tag.</tr>
   if (weekDay == 6) document.write("</tr>");
}





