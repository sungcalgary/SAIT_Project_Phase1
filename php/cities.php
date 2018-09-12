<!--
cities.php for SAIT Project.
Display 6 cards on the main page.
Author: Sunghyun Lee
Created: 2018-06-01
Last Modified: 2018-06-07
-->

    <div class='row'>
      <span class='ml-auto'><a href='packages.php'>See More</a></span>
    </div>
  <!-- Row 1 -->
    <form action="packages.php" method="POST" id="cityForm">
    <div class="row">
      <div class='col-xs-12 col-md'>
        <div class='card mb-4 city' style='height:200px'>
          <img src="image/venice.jpg" class="image">
          <div class="overlay">
              <div class='cityText'>
                <h2 class="card-title" style='background-color:skyblue; color:white'>Europe</h2>
                <!--<p class="card-text">$982+</p>-->
                
                <button type="submit" name='button1' value='Europe' class="btn btn-success">Find Package</button>
                
              </div>
            </div>   
        </div>
      </div>

      <div class='col-xs-12 col-md'>
        <div class='card mb-4 city' style='height:200px'>
          <img src="image/havana.jpg" class="image">
          <div class="overlay">
              <div class='cityText'>
                <h2 class="card-title" style='background-color:skyblue; color:white'>Caribbean</h2>
                <!--<p class="card-text">$492+</p>-->
                <button type="submit" value='Caribbean' name='button2' class="btn btn-success">Find Package</button>
              </div>
            </div>   
        </div>
      </div>

      <div class='col-xs-12 col-md'>
        <div class='card mb-4 city' style='height:200px'>
          <img src="image/tokyo.jpg" class="image">
          <div class="overlay">
              <div class='cityText'>
                <h2 class="card-title" style='background-color:skyblue; color:white'>Asia</h2>
                
                <button type="submit" value='Asia' name='button3' class="btn btn-success">Find Package</button>
              </div>
            </div>   
        </div>
      </div>

    </div>
<!-- row 2 -->
    <div class="row">

      <div class='col-xs-12 col-md'>
        <div class='card mb-4 city' style='height:200px'>
          <img src="image/dubai.jpg" class="image">
          <div class="overlay">
              <div class='cityText'>
                <h2 class="card-title" style='background-color:skyblue; color:white'>Middle East</h2>
                
                <button type="submit" value='arab' name='button4' class="btn btn-success">Find Package</button>
              </div>
            </div>   
        </div>
      </div>

     <div class='col-xs-12 col-md'>
        <div class='card mb-4 city' style='height:200px'>
          <img src="image/hawaii.jpg" class="image">
          <div class="overlay">
              <div class='cityText'>
                <h2 class="card-title" style='background-color:skyblue; color:white'>Hawaii</h2>
                
                <button type="submit" value='Polynesia' name='button5' class="btn btn-success">Find Package</button>
              </div>
            </div>   
        </div>
      </div>

      <div class='col-xs-12 col-md'>
        <div class='card mb-4 city' style='height:200px'>
          <img src="image/cruise.jpg" class="image">
          <div class="overlay">
              <div class='cityText'>
                <h2 class="card-title" style='background-color:skyblue; color:white'>Cruise</h2>
                
                <button type="submit" value='cruise' name='button6' class="btn btn-success">Find Package</button>
              </div>
            </div>   
        </div>
      </div>
   
    </div>
    </form>
 
  </div>


