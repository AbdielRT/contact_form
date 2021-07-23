<?php
// verify is email was sent and not empty
if (isset($_POST['email']) && !empty($_POST['email'])){
    // validate email with its confirmation
    if($_POST['email'] === $_POST['emailConfirmation']){
        // it saves the form data in a array
        $formulaire = [
            "id" => uniqid(),
            // addslashes prevents sql injection
            "name" => addslashes($_POST['name']),
            "lastName" => addslashes($_POST['lastName']),
            "email" => addslashes($_POST['email']),
            "message" => addslashes($_POST['message']),
        ];

        // Parameters to send email
        $to = 'mymail@gmail.com';
        $subject = 'GetInTouch message from '.$formulaire['name'];
        $msg = "You've got a new message via 
        GetInTouch Platform: \n".$formulaire['message'];
        // wrap text if lines are longer than 70 characters
        $bodyMessage = wordwrap($msg,70);
        
        $headers = array(
            'From' => $formulaire['email'],
            'Name' => $formulaire['name'],
            'LastName'=> $formulaire['lastName'],
        );

        // Sends email
        mail($to, $subject, $bodyMessage, $headers);
        
        // sends back the request to javascript
        echo json_encode([
            'status'=>'success',
            'name' => $formulaire['name'],
        ]);

    } else {
        // redirects user if a problem with email addresses
        // header('Location:index.php?status=error');
        echo json_encode(['status'=>'error']);
    }    
}
