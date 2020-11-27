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
                    <li class="scroll active"><a href="index">Home</a></li>
                    <li class="scroll"><a href="services">Our Services</a></li>
                    <li class="scroll"><a href="contact">Contact</a></li>

                    <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
                        <li class="scroll"><a href="dashboard">My Dashboard</a></li>
                        <li class="scroll"><a href="logout">Logout</a></li>

                    <?php } else { ?>
                        <li class="scroll"><a href="signin">Sign In</a></li>
                        <li class="scroll"><a href="vet-registration">Vet Registration</a></li>
                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
</header>
<!--/header-->