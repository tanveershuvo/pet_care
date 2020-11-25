<header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="index.php">Home</a></li>
                        <li class="scroll"><a href="services.php">Our Services</a></li>
                        <li class="scroll"><a href="contact.php">Contact</a></li>

						<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
						<li class="scroll"><a href="dashboard.php">My Dashboard</a></li>
						<li class="scroll"><a href="logout.php">Logout</a></li>
						
						<?php } else { ?>
                            <li class="scroll"><a href="signin.php">Sign In</a></li>
						<?php } ?>
                        <li class="scroll"><a href="vet-registration.php">Vet Registration</a></li>
                         
											
                                                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
	