@php
    function setUpConnection()
    {
        $host ="localhost";
        $username ="root";
        $password ="JohnOrland05";
        $database ="jobspeed";
    

        $createConnection = new mysqli($host,$username,$password,$database);

        //check connection
        if($createConnection->connect_error)
        {
            echo $createConnection->connect_error;
        }
        else
        {
            return $createConnection;
        }
    }
@endphp