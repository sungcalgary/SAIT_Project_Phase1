/*
Javascript file where functions are defined for SAIT Project

Author: Fantastic 4 (Jason, Brian, Lindsay, Sunghyun)
Description: this is where we define Custom javascript functions
Created: 2018-06-05
*/



//=======Sunghyun Lee=====================================================================================
//Display rows containing the searched item while hiding all others 
function display_destination() 
{
  // Declare variables
  var myInput = document.getElementById("searchInput");
  var upperInputValue= myInput.value.toUpperCase();
  var myTable = document.getElementById("packageTable");
  var rows = myTable.getElementsByTagName("tr");

  // Loop through rows and loop through td's. If there is any match, display the row. Otherwise, hide.
  
  for (var i = 1; i < rows.length; i++) 
  { var match = false;
    var datas = rows[i].getElementsByTagName("td");
    for (var j=0; j<datas.length;j++)
    { 
      if (datas[j].innerHTML.toUpperCase().indexOf(upperInputValue) > -1) 
        match=true;      
    }
    if (match)
      rows[i].style.display = "";
    else
      rows[i].style.display = "none";

  }
  // end of for loop
}