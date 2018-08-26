PHP

//Google Class Library (Beacons) and Variables
include 'vendor/autoload.php';

	
$server_root = str_replace("/private_html", "", $_SERVER['DOCUMENT_ROOT']);
	
putenv('GOOGLE_APPLICATION_CREDENTIALS='.$server_root.'/PQV1-95cc2Gbce200.json');

	
$scopes = "https://www.googleapis.com/auth/userlocation.beacon.registry";
	
$client_id = 'XXXXXXXXXXXX-54n0aaq0ua6wlretbnelw42uhbn21nrs8k3cj.apps.googleusercontent.com';
	
$client_secret = '_716ufHXkufi34i2i24uhgAN45vi';
	
$redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];	
	
	

//Google Client Connect and Assigning of Scope(s)
$client = new Google_Client();
	
$client->useApplicationDefaultCredentials();
	
	
$client->setApplicationName("HOWL API");
	
$client->setClientId($client_id);
	
$redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	
$client->setRedirectUri($redirect_uri);
	
$client->setClientId($client_id);
	
$client->setClientSecret($client_secret);
	
$client->setScopes(array($scopes));
	
	

//Google Service Connection
$service = new Google_Service_Proximitybeacon($client);

//Beacon Attachment List
$beaconName = 'beacons/1!fda50693a4jr4i2ybb54g000c6eb07647822710d4d0';
	
$request = $service->beacons_attachments->listBeaconsAttachments($beaconName);
	
foreach($request as $k=>$item)
	
{
		
	$AttachmentName = $item->getAttachmentName();
	
}
	
echo $AttachmentName;


===================================================================================================

Android

//Get GPS Location
private void gpsgetlocation() 
{
     GPSTracker gps = new GPSTracker(Home.this);
     if (gps.canGetLocation()) 
     {
          double latitude = gps.getLatitude();
          double longitude = gps.getLongitude();

     } 
     else 
     {
          // Cannot establish location
          // GPS or Network is not enabled
          // Ask user to enable GPS/network in settings
          gps.showSettingsAlert();
     }
}

=====================================================================================================

JQuery

$("#contactForm").validate({
        
     rules: 
     {
            
          fullname: 
	  {
     
               required: true
     
          },
            
          email:    
          {
     
               required: true,
                
               email: true
            
          },
            
          message: 
          {
                
               required: true
            
          }
        
     },
        
     messages: 
     {
            
          fullname: 
          {
                
               required: "Please enter your name"
            
          }        
      },
        
      submitHandler: 
      {      
           function () 
           {
                form.submit();
        
           } 
      }
    
 });
=====================================================================================================

DB Call

// connect to db
$conn = Connect();
$name = $email = $subject = $message = '';
$time = time();

// prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_data (name, email, subject, message, crdate) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('ssssd', $name, $email, $subject, $message, $time);

// binding values
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// execting query
$success = $stmt->execute();

// closing connection
$stmt->close();
$conn->close();

