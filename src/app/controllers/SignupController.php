<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function IndexAction()
    {
        // default login view
    }
    public function registerAction()
    {
        $user = new Users();
        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email',
                'pswd'
            ]
        );
        $success = $user->save();
        if ($success) {
            $this->view->message = "Register succesfully";
            $this->session->set("user_email", $user->email);
            $this->session->set("user_pswd", $user->pswd);
        } else {
            $msg = "Not Register succesfully due to following reason: <br>" . implode("<br>", $user->getMessages());
            $this->view->message = $msg;
        }
        unset($success);
    }
}
