<?php 
session_start(); // starting session
include('connect.php'); // including file used to connect to database
// This File Contains Function To Be Used All Over the Project

// This function checks if a user is authenticated.
// If the user is authenticated, it redirects them to the appropriate page based on their 'role' (client or tech).
function isAuthenticated ()
{
    
    if (isset($_SESSION['email']))
    {
        if ($_SESSION['role'] === 'client')
        {
            header('location: ../client/home.php');

        }
        elseif ($_SESSION['role'] === 'tech')
        {
            header('location: ../tech/home.php');
        }
    }
}

// This function is used to determine if the user is not authenticated.
// If the user is not authenticated, they will be redirected to the index.php page.
function isNotAuthenticated ()
{
    if (! isset($_SESSION['email']))
    {
        header('location: ../index.php');
    }

}

// This function creates a user session which stores values such as user id, first name, last name, email and role.
// The values are obtained from the argument being passed to the function 
function userSession ($user)
{
    $_SESSION['id']         = $user['id'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name']  = $user['last_name'];
    $_SESSION['email']      = $user['email'];
    $_SESSION['role']       = $user['role'];

}

// Function to authenticate client
// If the login data is valid the authenticate client and creeate session
// If not return login page with errors
function authClient ($email, $password)
{
    global $con; 

    $hashed_pass    = sha1($password); // Hashing password to compare with hashed password in database

    // checking if client registered in database
    $query      = $con->prepare("SELECT * FROM clients WHERE email = ? AND password = ? LIMIT 1");
    $query->execute([$email, $hashed_pass]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        $client = $query->fetch();

        userSession($client); // Storing client Data in session to be accessible 

        return true;
    }
}


// Function to authenticate Tech
// If the login data is valid the authenticate tech and creeate session
// If not return login page with errors
function authTech ($email, $password)
{
    global $con; 

    $hashed_pass    = sha1($password); // Hashing password to compare with hashed password in database

    // checking if tech registered in database
    $query      = $con->prepare("SELECT * FROM techs WHERE email = ? AND password = ? LIMIT 1");
    $query->execute([$email, $hashed_pass]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        $tech = $query->fetch();

        userSession($tech); // Storing tech Data in session to be accessible 

        return true;
    }
}


// Function to authenticate Admin
// If the login data is valid the authenticate Admin and creeate session
// If not return login page with errors
function authAdmin ($email, $password)
{
    global $con; 

    $hashed_pass    = sha1($password); // Hashing password to compare with hashed password in database

    // checking if tech registered in database
    $query      = $con->prepare("SELECT * FROM admins WHERE email = ? AND password = ? LIMIT 1");
    $query->execute([$email, $hashed_pass]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        $tech = $query->fetch();

        userSession($tech); // Storing tech Data in session to be accessible 

        return true;
    }
}

//This function is used to check if the provided email exists in the clients table in the database.
// The function takes in an email and returns a boolean value of either true or false based on the result of the query.
function emailExists($email)
{
    global $con;

    $query      = $con->prepare("SELECT * FROM clients WHERE email = ? LIMIT 1");
    $query->execute([$email]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        return true;
    }
}

//This function is used to check if the provided email exists in the clients table in the database.
// The function takes in an email and returns a boolean value of either true or false based on the result of the query.
function techExists($email)
{
    global $con;

    $query      = $con->prepare("SELECT * FROM techs WHERE email = ? LIMIT 1");
    $query->execute([$email]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        return true;
    }
}

/**  
* This function allows a user to register with the system 
* The function takes in an array with the data of the user and stores it in the database. 
* It also checks if the operation was successful and in that case sets up the 
**/
function registerClient (array $data)
{
    global $con;

    // query to add register data in database table clients
    $query      = $con->prepare("INSERT INTO clients (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
    $success    = $query->execute(
        [
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
        ]
    );

    if ($success)   // checking if data added to database successfully
    {
        if (isset($_SESSION['register_error'])) // checking if there is register_error var in session
        {
            unset($_SESSION['register_error']); //if there is, then remove it.
        }

        return true; // return true if everthing is ok
        
    }

    return false; // return false if something wrong happened
}


// This function is used to get a specific client by its ID from the 'clients' table in the database.
// The function takes the ID of the client as an argument and returns the data as an associative array or null if no matching record is found.
function getClient ($client_id)
{
    global $con;

    $query      = $con->prepare("SELECT * FROM clients WHERE id = ? LIMIT 1");
    $query->execute([$client_id]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        return $query->fetch();
    }
}


/**
* This function creates a new tech entry in the techs table in the database.
* It takes in an array of data which contains the first name, last name, email and password of the tech it is creating.
* It returns true if the query is successful or false if it fails.
**/
function createTech (array $data)
{
    global $con;

    // query to add register data in database table clients
    $query      = $con->prepare("INSERT INTO techs (first_name, last_name, email, password, bio, speciality) VALUES (:first_name, :last_name, :email, :password, :bio, :speciality)");
    $success    = $query->execute(
        [
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
            'bio'           => $data['bio'],
            'speciality'    => $data['speciality'],
        ]
    );

    if ($success)   // checking if data added to database successfully
    {
        return true; // return true if everthing is ok
    }

    return false; // return false if something wrong happened
}


// This function is used to get a specific technician by its ID from the 'techs' table in the database.
// The function takes the ID of the technician as an argument and returns the data as an associative array or null if no matching record is found.
function getTech ($tech_id)
{
    global $con;

    $query      = $con->prepare("SELECT * FROM techs WHERE id = ? LIMIT 1");
    $query->execute([$tech_id]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        return $query->fetch();
    }
}

/*
** This function is used to update a tech record in the techs table of the database. 
** The provided data is used to update the table with the given id.
** If the query is successful, it will return true. Otherwise, it will return false.
*/
function updateTech ($data, $tech_id)
{
    global $con;
    
    // echo "<pre>" . var_dump($data) .  $tech_id . "</pre>";
    // exit;
    $query      = $con->prepare("UPDATE techs SET first_name = :first_name, last_name = :last_name, speciality = :speciality, bio = :bio
                                WHERE id = $tech_id");
    $update     =  $query->execute(
        [
            
            'first_name'    => $data['first_name'], 
            'last_name'     => $data['last_name'], 
            'speciality'    => $data['speciality'], 
            'bio'           => $data['bio'],
        ],
    );

    if (!$update)
    {
        return false;

    } else 
    {
        return true;
    }
}

/*
 ** This function deletes a tech entry from the 'techs' table in the database
 ** 
 ** @param int    $tech_id     The id of the tech which needs to be deleted
 **
 ** @return boolean  Returns true if the the tech is successfully deleted, else false is returned
 */
function deleteTech($tech_id)
{
    global $con;
    
    $query = $con->prepare("DELETE FROM techs WHERE id = :tech_id");
    $delete = $query->execute(['tech_id' => $tech_id]);

    if ($delete) {

        return true;
        
    } else {
        
        return false;
    }
}

/**
* This function gets the available techs from the database in the form of an array.
*
* @param boolean $limit Whether to limit the results to 6 or not.
*
* @return array|null An array of techs or null if there are no results.
*/

function getTechs ($limit = true)
{
    global $con;

    $limit_techs    = $limit ? 'LIMIT 6' : '';
    $query      = $con->prepare("SELECT * FROM techs $limit_techs ");
    $query->execute();

    if ($query->rowCount() == 0)
    {
        return null;

    } else 
    {
        return $query->fetchAll();
    }
}

/*
** hasRequestBefore() is a function to check if a request has already been sent between a client and technician. 
** It requires two parameters, the client_id and tech_id, and returns a boolean indicating if a request already exists.
** The function uses an SQL query to check if a request exists based on the parameters. 
*/
function hasRequestBefore ($client_id, $tech_id)
{
    global $con;

    $query  = $con->prepare("SELECT * FROM requests WHERE client_id = ? AND tech_id = ? LIMIT 1");
    $query->execute([$client_id, $tech_id]);

    if ($query->rowCount() > 0) {

        return true;

    } else {

        return false;
    }
}

/*
** Function to check if a rating exists between a client and technician
** Takes two parameters - client_id and tech_id
** Returns a boolean based on whether a rating exists or not
*/
function hasRating ($client_id, $tech_id)
{
    global $con;

    $query  = $con->prepare("SELECT * FROM ratings WHERE client_id = ? AND tech_id = ? LIMIT 1");
    $query->execute([$client_id, $tech_id]);

    if ($query->rowCount() > 0) {

        return true;
    } else {
        return false;
    }
}



function updateRating($data)
{
    global $con;

    $query      = $con->prepare("UPDATE ratings SET rating = :rating, description = :description, date = :date WHERE client_id = :client_id AND tech_id = :tech_id");
    $success    = $query->execute(
        [
            'rating'        => $data['rating'],
            'description'   => $data['description'],
            'date'          => date('Y-m-d H:i:s'),
            'client_id'     => $data['client_id'],
            'tech_id'       => $data['tech_id'],

        ]
        );
        
    if ($success)
    {
        return true;
        
    } else 
    {
        return false;
    }
}

// This function updates the total rating of the techs.
// It takes an array of data that includes tech_id and rating of the tech.
// It is used to update the rating of the techs in the database.
// It returns true if the update is successful, otherwise false.
function updateTechTotalRating ($data)
{
    global $con;

    $currentRating  = getTech($data['tech_id'])['rating'];
    // echo $currentRating;
    $ratingsCount   = count(getRatings($data['tech_id']));
    // echo $ratingsCount;
    // exit;

    $query      = $con->prepare("UPDATE techs SET rating = :rating WHERE id = :tech_id");
    if ($ratingsCount == 0)
    {
        $success    = $query->execute(
            [
                'rating'        => $data['rating'],
                'tech_id'       => $data['tech_id'],
                ]
            );
            
    } else {

        $success    = $query->execute(
            [
                'rating'        => round((($currentRating * $ratingsCount)  + $data['rating']) / ($ratingsCount + 1)),
                'tech_id'       => $data['tech_id'],
                ]
            );

    }
        
}
// This function is used to add a new rating to the rating table.
// It takes the data array and inserts it into the rating table in the database.
// It returns true if the record was successfully added and false if it wasn't.
function addRating ($data)
{
    global $con;

    // Checking if there is rating between client and tech
    if (hasRating($data['client_id'], $data['tech_id']))
    {
        updateRating($data); // Then Update Exists Rating

    } else {

        updateTechTotalRating($data);
        // If There is no rating add one
        $query      = $con->prepare('INSERT INTO ratings (client_id, tech_id, rating, description) VALUES (:client_id, :tech_id, :rating, :description)');
        $success    = $query->execute(
            [
                'client_id'     => $data['client_id'],
                'tech_id'       => $data['tech_id'],
                'rating'        => $data['rating'],
                'description'   => $data['description'],
                ]
            );
            if ($success)   // checking if data added to database successfully
            {
                return true; // return true if everthing is ok
            }
        
            return false; // return false if something wrong happened
    }

}
    //This function is used to get ratings from the ratings table in the database for a particular Technician ID.
// It takes the Technician ID as an input and returns an associative array containing the rating information or null if the query result is empty.
function getRatings ($tech_id)
{
    global $con;

    $query      = $con->prepare("SELECT ratings.*, CONCAT(clients.first_name, ' ', clients.last_name) AS client_name FROM ratings
                                INNER JOIN clients ON ratings.client_id = clients.id 
                                WHERE tech_id = ?  ORDER BY date DESC");
    $query->execute([$tech_id]);

    if ($query->rowCount() == 0)
    {
        return [];

    } else 
    {
        return $query->fetchAll();
    }
}

/*
This function retrieves a list of requests from the database, based on the client ID parameter passed to it.
It uses a prepared statement to protect against SQL injection attacks and then returns the result set.
If no records were found, the function returns null.
*/
function getPurchases ($client_id)
{
    global $con;

    $query      = $con->prepare("SELECT requests.*, CONCAT(techs.first_name, ' ', techs.last_name) AS tech_name, techs.speciality AS speciality FROM requests
                                INNER JOIN techs ON requests.tech_id = techs.id 
                                WHERE client_id = ?  ORDER BY date DESC");
    $query->execute([$client_id]);

    if ($query->rowCount() == 0)
    {
        return 0;

    } else 
    {
        return $query->fetchAll();
    }
}

// This function is used to add request to the database.
// It takes an array of data as an argument containing values for client_id and tech_id to be used for the request.
// The function then prepares a query to insert the data into the database and executes it.
// Finally, it returns true if the query was successful or false if not.
function addRequest ($data)
{
    global $con;
    // Query to add new rating
    $query      = $con->prepare('INSERT INTO requests (client_id, tech_id, speciality) VALUES (:client_id, :tech_id, :speciality)');
    $success    = $query->execute(
        [
            'client_id'     => $data['client_id'],
            'tech_id'       => $data['tech_id'],
            'speciality'     => $data['speciality'],
        ]
    );

    if ($success)   // checking if data added to database successfully
    {
        return true; // return true if everthing is ok
    }

    return false; // return false if something wrong happened
}


function hasDoingRequest ($client_id, $tech_id)
{
    global $con;

    $query  = $con->prepare("SELECT * FROM requests WHERE status = 0 AND client_id = ? AND tech_id = ? LIMIT 1");
    $query->execute([$client_id, $tech_id]);

    if ($query->rowCount() > 0) {

        return $query->fetch();

    } else {

        return false;
    }
}
/*
This function retrieves a list of requests from the database, based on the tech ID parameter passed to it.
It uses a prepared statement to protect against SQL injection attacks and then returns the result set.
If no records were found, the function returns null.
*/
function getRequests ($tech_id)
{
    global $con;

    $query      = $con->prepare("SELECT requests.*, CONCAT(clients.first_name, ' ', clients.last_name) AS client_name FROM requests
                                INNER JOIN clients ON requests.client_id = clients.id 
                                WHERE tech_id = ?  ORDER BY date DESC");
    $query->execute([$tech_id]);

    if ($query->rowCount() == 0)
    {
        return [];

    } else 
    {
        return $query->fetchAll();
    }
}

function getRequestsAdmin ($status = 0)
{
    global $con;

    $query      = $con->prepare("SELECT requests.*, CONCAT(clients.first_name, ' ', clients.last_name) AS client_name, CONCAT(techs.first_name, ' ', techs.last_name) AS tech_name  FROM requests
                                INNER JOIN clients ON requests.client_id = clients.id 
                                INNER JOIN techs ON requests.tech_id = techs.id 
                                WHERE status = ?  ORDER BY date DESC");
    $query->execute([$status]);

    if ($query->rowCount() == 0)
    {
        return [];

    } else 
    {
        return $query->fetchAll();
    }
}

function increaseTechClients ($tech_id)
{
    global $con;

    $query      = $con->prepare("UPDATE techs SET clients = (clients + 1) WHERE id = ?");
    $query->execute([$tech_id]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        return true;
    }
}


// This function is used to update the status of a request to '1' (solved) when a technician solved the problem.
// It takes two parameters - client_id and tech_id and returns true if the query was successful, else false.
function problemSolved ($request_id, $tech_id)
{
    global $con;

    $query      = $con->prepare("UPDATE requests SET status = 1 WHERE id = ?");
    $query->execute([$request_id]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        increaseTechClients($tech_id); // increase tech clients 
        return true;
    }
    
}

// This function is used to update the status of a request to '-1' (not solved) when a technician is unable to solve the problem.
// It takes two parameters - client_id and tech_id and returns true if the query was successful, else false.
function problemNotSolved ($request_id, $tech_id)
{
    global $con;

    $query      = $con->prepare("UPDATE requests SET status = -1 WHERE id = ?");
    $query->execute([$request_id]);

    if ($query->rowCount() == 0)
    {
        return false;

    } else 
    {
        increaseTechClients($tech_id); // increase tech clients 
        return true;
    }
    
}

// messages
/*
This function adds a message to the database.
The data parameter holds an associative array with the keys 'sender_id', 'receiver_id' and 'message'. 
The query binds the values to the right placeholders and executes the query. 
If the query is successful, it returns true, and false if it fails.
*/
function addMessage ($data)
{
    global $con;

    // Query to add new rating
    $query      = $con->prepare('INSERT INTO messages (sender_id, receiver_id, message ) VALUES (:sender_id, :receiver_id, :message)');
    $success    = $query->execute(
        [
            'sender_id'     => $data['sender_id'],
            'receiver_id'   => $data['receiver_id'],
            'message'       => $data['message'],
        ]
    );

    if ($success)   // checking if data added to database successfully
    {
        return true; // return true if everthing is ok
    }

    return false; // return false if something wrong happened
}


/* 
** This function takes two parameters to get messages sent between two users.
** It takes two user ids as parameters, a client ID and a tech ID, and then returns the messages sent between them.
** A query is run to retrieve all messages based on the two user IDs and if no results are found, then the function returns null.
** Otherwise, an array of all the messages is returned.
*/
function getMessages ($client, $tech)
{
    global $con;

    $query      = $con->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)");
    $query->execute([$client, $tech, $tech, $client]);

    if ($query->rowCount() == 0)
    {
        return 0;

    } else 
    {
        return $query->fetchAll();
    }
}


/*
** This function is used to retrieve incoming client messages for a given user ID.
** It returns an array of fetched messages if any, or 0 otherwise.
*/
function incomingMessagesClient ($user_id)
{
    global $con;

    $query      = $con->prepare("SELECT messages.*, CONCAT(techs.first_name, ' ', techs.last_name) AS tech_name FROM messages
                                INNER JOIN techs ON messages.sender_id = techs.id 
                                WHERE receiver_id = ?
                                GROUP BY messages.sender_id
                                ORDER BY date DESC LIMIT 10");
    $query->execute([$user_id]);

    if ($query->rowCount() == 0)
    {
        return 0;

    } else 
    {
        return $query->fetchAll();
    }
}

/*
** This function is used to retrieve incoming tech messages for a given user ID.
** It returns an array of fetched messages if any, or 0 otherwise.
*/
function incomingMessagesTech ($user_id)
{
    global $con;

    $query      = $con->prepare("SELECT messages.*, CONCAT(clients.first_name, ' ', clients.last_name) AS client_name FROM messages
                                INNER JOIN clients ON messages.sender_id = clients.id 
                                WHERE receiver_id = ?
                                GROUP BY messages.sender_id
                                ORDER BY date DESC LIMIT 10");
    $query->execute([$user_id]);

    if ($query->rowCount() == 0)
    {
        return 0;

    } else 
    {
        return $query->fetchAll();
    }
}
