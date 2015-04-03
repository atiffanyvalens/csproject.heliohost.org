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
	  if (calDate == 0) 
	  {
		calendarDay = Date();
	  }
	
	  else 
	  
		{ 
			calendarDay == calDate;
		}
		
	var thisYear = getFullYear.calendarDay;
	  
	  
	  
		

}

function writeMonthCell(calendarDay, currentTime){
      //Writes the yearly table cell containing a monthly calendar.
	document.write("<td class='yearly_months'>");
	writeMonth(calendarDay, currentTime);
	document.qwrite("</td>");

}
function writeMonth(calendarDay, currentTime) {
   document.write("<table class='monthly_table'>");
   writeMonthTitle(calendarDay);
   writeDayNames()
   writeMonthDays(calendarDay, currentTime);
   document.write("</table>");
}

function writeMonthTitle(calendarDay) {
   var monthName = new Array("January", "February", "March", "April", "May", 
   "June", "July", "August", "September", "October", "November", "December");

   var thisMonth=calendarDay.getMonth();

   document.write("<tr>");
   document.write("<th class='monthly_title' colspan='7'>");
   document.write(monthName[thisMonth]);
   document.write("</th>");
   document.write("</tr>");
}

function writeDayNames() {
   var dayName = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");  
   document.write("<tr>");
   for (var i=0;i<dayName.length;i++) {
      document.write("<th class='monthly_weekdays'>"+dayName[i]+"</th>");
   }
   document.write("</tr>");
}

function daysInMonth(calendarDay) {
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
      document.write("<td></td>");
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
   if (weekDay == 0) document.write("<tr>");
   if (calendarDay.getTime() == currentTime) {
      document.write("<td class='monthly_dates' id='today'>"+dayCount+"</td>");
   } else {
      document.write("<td class='monthly_dates'>"+dayCount+"</td>");
   }
   if (weekDay == 6) document.write("</tr>");
}





