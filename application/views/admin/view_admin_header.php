
<?php if($this->session->userdata('user_id')) {

} else {

    redirect('admins/login', 'refresh');
    //header("location:  redirect('login', 'refresh');");
}
?>