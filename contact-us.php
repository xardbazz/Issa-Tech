<?php
$page_title="Contact us";
require_once('layout/header.php');
if (isset($_REQUEST['name'])){
    $name = strip_tags(trim(stripslashes($_REQUEST['name']))); 
    $name = mysqli_real_escape_string($con,$name);
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = stripslashes($_REQUEST['email']);
    $email = filter_var(trim(mysqli_real_escape_string($con,$email)));
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con,$phone);
    $purpose = stripslashes($_REQUEST['subject']);
    $purpose = mysqli_real_escape_string($con,$purpose);
    $message = stripslashes($_REQUEST['message']);
    $message = mysqli_real_escape_string($con,$message);
    $trn_date = date("Y-m-d H:i:s");

    $query = "INSERT into `inquiry` (id,name,email,phone,purpose,message,trn_date) VALUES ('','$name', '$email', '$phone', '$purpose','$message', '$trn_date')";
    $result = mysqli_query($con,$query);
    
    $recipient = "uzzalhossain.ht@gmail.com";
    $subject = "$purpose";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";
    // Build the email headers.
    $email_headers = "From: $name <$email>";
    // Send the email.
    /*if (mail($recipient, $subject, $email_content, $email_headers)) {
         Set a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
         Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }*/
    
    echo "<script>location.href='index.php';</script>";
}
?>
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>contact</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact-area section-space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>tell us your project</h2>
                            <form action="#" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email" placeholder="Email *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="subject" placeholder="Subject *" type="text" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn__bg" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>contact us</h2>
                            <p>Tech is the main purpose of the website, focusing only on Technologies (computers, platforms, mobile phones, smart phones, and attachable gadgets, software copies, video game applications, Software android and IOS applications, etc.).</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : Shah Alam city, Malaysia country</li>
                                <li><i class="fa fa-phone"></i> (060) 008 183 559-602 </li>
                                <li><i class="fa fa-envelope-o"></i> kamaloissa1@gmail.com</li>
                            </ul>
                            <div class="working-time">
                                <h3>Working hours</h3>
                                <p><span>Monday – Saturday:</span>08AM – 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
    </main>
    <!-- main wrapper end -->
<?php
require_once('layout/footer.php');
?>