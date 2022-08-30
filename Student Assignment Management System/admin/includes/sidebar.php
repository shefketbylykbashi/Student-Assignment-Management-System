<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>

                    
                    <li><a href="dashboard.php" ><i class="ti-home"></i>Dashboard</a></li>
                   <li><a href="course.php"><i class="ti-files"></i>Course</a>
                    </li>
                     <li><a href="subject.php"><i class="ti-files"></i>Subject</a>
                    </li>
                    

                 
                   
                    <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>  Teacher  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="add-teacher.php">Add Teacher</a>
                    </li>
                            <li><a href="manage-teacher.php">Manage Teacher</a></li>
                           
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Uploaded Assignment <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="unchecked-assignment.php">Un Checked</a></li>
                            <li><a href="checked-assignment.php">Checked</a></li>
                        </ul>
                    </li>
               
                  <li><a href="search.php" ><i class="ti-search"></i>Search</a></li>

                  <li><a href="profile.php"><i class="ti-user"></i> <span>Profile</span></a></li>
                    <li><a href="change-password.php"><i class="ti-settings"></i> <span>Settings</span></a></li>
                    <li><a href="logout.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                    <li style="margin-left: 25px;"><?php 
$lat = 42;
$lon = 21;
$api_key = '7b8820d03656184a7c6d650140abf84a';


$api_url= 'https://api.openweathermap.org/data/2.5/weather?lat='.$lat .'&lon='.$lon.'&appid='.$api_key;

$weather_data= json_decode(file_get_contents($api_url),true);

$temperature = $weather_data['main']['temp'];

$temperatureCelsius = round($temperature -273.15);

$TCW = $weather_data['weather'][0]['main'];
$TXWD = $weather_data['weather'][0]['description'];
$TCWI = $weather_data['weather'][0]['icon'];

echo "Current temp ".$temperatureCelsius. "<img src='http://openweathermap.org/img/wn/".$TCWI."@2x.png' />";
?></li>
                </ul>
            </div>
        </div>
    </div>      