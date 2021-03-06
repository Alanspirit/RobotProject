<?php

/**
 * Created by PhpStorm.
 * User: PeiLei
 * Date: 30/03/2017
 * Time: 6:24 PM
 */
class Manage extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * index is used for registering a new session for PDR
     * @return string
     */
    public function index() {
        $var = $this->token->head();
        $token = $var[0]->token_session;

        $this->showit();

    }

    /**
     * handle the form submission
     */
    public function submit2() {

        if(!isset($_POST['haha'])){
            redirect('/manage/index');
        }

        if(isset($_POST['team']) && isset($_POST['password']) && !empty($_POST['team']) && !empty($_POST['password'])) {
            // make an API call
            $url = BASE_URL."/work/registerme";
            $team = $_POST['team'];
            $pass = $_POST['password'];
            $requestURL = $url . '/' . $team . '/' . $pass;
            $response = file_get_contents($requestURL);
            $responseArray = explode(" ", $response);
            if ($responseArray[0] == "Ok"){
                // get the new token
                $tokenNew = $responseArray[1];

                // store the new token to db
                $token = $this->token->get(1);
                $token->token_session = $tokenNew;
                $this->token->update($token);

                // clear all the db table
                $dataRobots = $this->robots->all();
                foreach ($dataRobots as $eachRobot) {
                    $this->robots->delete($eachRobot->id);
                }

                $dataParts = $this->parts->all();
                foreach ($dataParts as $each) {
                    $this->parts->delete($each->id);
                }


                // update account
                $account = $this->account->get(1);
                $account->money_spent = 0;
                $account->money_earned = 0;


                // redirect
                redirect('/welcome');

            } else {

                // redirect('/manage/index/1');
                $this->alert('<strong>Credentials are wrong!<strong>', 'danger');
                $this->index();
            }

        } else {

            // redirect('/manage/index/2');
            $this->alert('<strong>Please type in both factory and password<strong>', 'danger');
            $this->index();
        }

    }


    private function showit()
    {
        $this->data['pagebody'] = 'Manage/itemedit';
        $this->render();
    }

}