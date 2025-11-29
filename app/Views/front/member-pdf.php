
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <meta name="description" content="<?= $meta_description ?? 'MAA BHARTI NAARI YOG SIKSHA SANSTHAN' ?>" />
<meta name="keywords" content="<?= $meta_keywords ?? '' ?>" />
 <meta name="author" content="MAA BHARTI NAARI YOG SIKSHA SANSTHAN" />
 <link href="<?= $fav_image; ?>" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <title>Certificate</title>
    <!-- Page Title -->

<!-- Stylesheet -->
</head>

<body>
    <div class="certificate-container" id="certificate-container" style="  background-image: url();
        background-size: 100% 100%;
 
    -webkit-print-color-adjust: exact; 
    position: relative;">
        <img src="<?= $border_image;?>" alt="" style="position: absolute;
      top: 0;      left: 0;      height: 100%;      width: 100%;   ">
       <img src="<?= $logo; ?>" class="logo" alt="" style="position: absolute; top: 15%; left: 12%;width: 75%; display: flex;
    align-items: center;z-index: 0;opacity: 0.05;  ">
        <div class="certificate" style="padding: 5px;   position: relative;">
 
           <div style=" padding-top: 16% ; padding-left:14% ">
        <b style="padding: 40px 7px 0;  width:50%; float:left;  font-size: 18px;">M.No <?= $user_id; ?></b><b style="padding: 40px 45px 0;  width:50%;float:right;  font-size: 18px;">Regd.No.LUC/00473/2024-2025</b>
    
           </div>
           
          
            
           
              <div style="margin:20% 12% 12% 12%;display:flex;align-items:center;  ">
               <div style="width:20% ; float:left"><img src="<?= $logo;?>" class="logo" alt="" style="width: 100%;" > </div>
                <div style="width:100%;margin-top:25px;padding-left:20px">
                    <p style="   font-weight: bold;  font-size: 13px;margin: 1% 0; color: #ed5e07;font-family: sans-serif; ">  WELCOME TO MAA BHARTI NAARI YOG SIKSHA SANSTHAN  </p>
                  <p style="   font-weight: bold;  font-size: 30px;margin:  0; color: #000000;    font-family: sans-serif; "> MEMBERSHIP CERTIFICATE</p>

                </div>
                
                <div class="username">
                     <p class="topic-description text-muted" style="   
                            text-align: center;
                            color: #492828;       
                              font-size: 48px;    margin-top: 40px;    font-weight: bold;    margin-bottom: 4%;font-family:sans-serif;">
                           <span style="color: #a6004d;"><?= $name; ?></span>
                        </p>
                </div>
                <div class="desc">
                     <p style="    font-weight: 500;
                        font-size: 16px;
                      
                        font-family:sans-serif;
                            padding-left: 3px;
                        margin-top: 7%;">This is to certify that the above mentioned is official member of  <br> <span style="color: #a6004d;font-weight: bold;">"MAA BHARTI NAARI YOG SIKSHA SANSTHAN"</span> working on social issues and making difference in the world.</p>
                        <p style="    font-weight: 500;     font-size: 16px;      padding-left: 3px; margin-top: 5%;  font-family:sans-serif;
                    ">He / She has authority to Organize/Moderate any Event/Activity of Organization to any part of India and the World. He / She has committed to change the lives of people in the world through his/her work.</p>
                    <p style="    font-weight: 500;     font-size: 16px;      padding-left: 3px; margin-top: 5%;  font-family:sans-serif;">He / She has committed to change the lives of people in the world through his/her work.</p>
                </div>
                <div style=" margin-top:5%;   padding: 31px 7px 0">
                        <span style="width:30% ; float:left">
                    <p>Date: <?= date('d/m/Y',$membership_date); ?></p>
                    <p>Place: Lucknow</p>
                    </span>
        
                    <div style="float:right"> <b><img src="<?= $qr;?>" alt=""></b></div>
    
                  </div>
              </div>
            
            
        </div>
    </div>


</body>

</html>