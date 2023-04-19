<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        // redirect to view
    }
    public function loginAction()
    {
        $data = $this->request->getPost();
        $result = Users::findFirst(array("email=?0 and pswd=?1 ", "bind" => array($data['email'], $data['pswd'])));
        if ($data['pswd'] == $result->pswd && $data['email'] == $result->email) {
            $this->view->msg = "Login Succesful";
        } else {
            $this->view->msg = "Something went wrong";
        }
    }
}
