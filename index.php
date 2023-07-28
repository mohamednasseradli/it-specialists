<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>IT Specialist</title>
        <!-- CDN bootstrap -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
            integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
            integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <!-- CDN font awesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- main css file -->
        <link rel="stylesheet" href="./assets/css/index.css" />
    </head>
    <body>
        <!-- start header -->
        <header class="position-fixed w-100 py-3 container-fluid">
            <nav class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="logo text-light">
                        <a href="/index.php">IT Specialist</a>
                    </div>
                </div>
                <div class="login">
                    <a href="./client/login-client.php" class="ms-1 ms-md-2 px-2 py-1 px-md-3 py-md-2">
                        <span class="ps-1"><i class="fa-solid fa-right-to-bracket"></i></span> Sign in
                    </a>
                    <a href="./client/register.php" class="px-2 py-1 px-md-3 py-md-2">
                        <span class="ps-1"><i class="fa-solid fa-user-plus"></i></span> Creat a new account
                    </a>
                </div>
            </nav>
        </header>
        <!-- end header -->
        <!-- start hero -->
        <div class="hero position-relative">
            <div class="overlay position-absolute d-flex justify-content-center align-items-center">
                <div class="container text-light">
                    <h1 class="text-center mb-3">Welcome to IT Specialist website</h1>
                    <p class="text-center">
                    Our specialists are ready to serve you at any time for any inquiries or technical services 
                    </p>
                </div>
            </div>
        </div>
        <!-- end hero -->
        <!--start how the website works -->
        <section class="how-it-works">
            <div class="container-fluid">
                <div class="text-center m-auto mb-5 fs-3">
                How does IT specialist site work
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="item p-3 position-relative">
                            <div class="item-num position-absolute text-center text-light d-flex justify-content-center align-items-center">
                                3
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <img src="./assets/imgs/how-it-works1.svg" class="w-100" alt="" />
                                </div>
                                <div class="col-10">
                                    <div>
                                        <h5 class="mb-3">Stay in touch with us</h5>
                                        <p>
                                        Contact the specialist directly within the IT Specialist site until your technical problem is fully resolved
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item p-3 position-relative">
                            <div class="item-num position-absolute text-center text-light d-flex justify-content-center align-items-center">
                                2
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <img src="./assets/imgs/how-it-works2.svg" class="w-100" alt="" />
                                </div>
                                <div class="col-10">
                                    <div>
                                        <h5 class="mb-3">
                                        Request service from our specialists</h5>
                                        <p>
                                        Review the service description and customer reviews, then ask to open contact with the specialist
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item p-3 position-relative">
                            <div class="item-num position-absolute text-center text-light d-flex justify-content-center align-items-center">
                                1
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <img src="./assets/imgs/how-it-works3.svg" class="w-100" alt="" />
                                </div>
                                <div class="col-10">
                                    <div>
                                        <h5 class="mb-3">View services</h5>
                                        <p>
                                        Find the service you need
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end how the website works -->
        <!--start services section -->
        <div class="services">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="fs-4">Our Specialists</div>

                </div>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./assets/imgs/user.jpg" class="card-img-top" alt="User 1 Photo" />
                            <div class="card-body">
                                <h5 class="card-title text-center">specialist: Amal </h5>
                                <p class="card-text"><span>Specialization:
                                     computer systems and software problems</span></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./assets/imgs/user.jpg" class="card-img-top" alt="User 1 Photo" />
                            <div class="card-body">
                                <h5 class="card-title text-center">specialist: Afnan</h5>
                                <p class="card-text"><span>Specialization: 
                                    Website 
                                    issues</span></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./assets/imgs/user.jpg" class="card-img-top" alt="User 1 Photo" />
                            <div class="card-body">
                                <h5 class="card-title text-center">specialist: Dana</h5>
                                <p class="card-text"><span>Specialization:
                                     Cyber ​​security threats</span></p>
                                <p class="card-text">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./assets/imgs/user.jpg" class="card-img-top" alt="User 1 Photo" />
                            <div class="card-body">
                                <h5 class="card-title text-center">specialist: Amnah</h5>
                                <p class="card-text"><span>Specialization: 
                                    Virus and malware issues</span></p>
                                <p class="card-text">
                                                                          

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end services section -->
        <!-- start home login section -->
        <section class="py-5 home-login-section">
            <div class="text-center text-light fs-3">We are glad to assist you with any technical issue you may face</div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <a href="./client/register.php" class="px-3 py-2">Register now</a>
            </div>
        </section>
        <!-- end home login section -->
        <!-- start popular-questions -->
        <section class="popular-questions container">
            <div class="text-center fs-3 mb-3">common questions</div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        What is IT Specialist?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        IT specialist website provides technical services to help people who have problems and technical advice, and helps them to reach technical specialists quickly and easily, and also helps the specialist to reach customers in a sophisticated and effective way. 
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        How does the IT specialist site guarantee my rights?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        IT Specialists guarantees you your rights fully. Rest assured when providing any service offered on the site. IT Specialists plays the role of mediator between the customer and the specialist and protects customer privacy in the event of compliance with the terms of the IT Specialists website and the terms of the guarantee and maintaining all communications within the site.

                        </div>
                    </div>
                </div>
             
                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end popular-questions -->
        <!-- start footer -->
        <footer>
            <div class="centered">IT Specialist</div>
            <div class="copy-rights">all rights are save &copy; platform <span>IT Specialist</span></div>
        </footer>
        <!-- end footer -->
        <!-- ---------- main js file ----------------- -->
        <script src="./assets/js/main.js"></script>
    </body>
</html>

