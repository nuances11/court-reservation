<?php
include_once '../config/constants.php';
  session_start(); 
  if (!isset($_SESSION['user_type'])) {
    header('Location: ' . BASE_URL );
  }else {
    $user = $_SESSION['user_type'];

    if ($user == '1') {
      header('Location: ' . BASE_URL . '/admin');
    }
  }
  ?>
<?php include_once '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo BASE_URL ?>assets/images/favicon.ico">

    <title>User</title>

    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/neon-core.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/neon-theme.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/neon-forms.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/user.css"> 

    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/js/select2/select2.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>plugins/toastr/toastr.min.css">
    

    <script src="<?php echo BASE_URL ?>assets/js/jquery-1.11.3.min.js"></script>

    <!--[if lt IE 9]><script src="<?php echo BASE_URL ?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>

<body class="page-body skin-green page-fade" data-url="http://neon.dev">

    <div class="page-container horizontal-menu">

        <header class="navbar navbar-fixed-top">
            <!-- set fixed position by adding class "navbar-fixed-top" -->

            <div class="navbar-inner">

                <!-- logo -->
                <div class="navbar-brand">
                    <a href="index.html">
                        <img src="<?php echo BASE_URL ?>assets/images/logo3.png" width="88" alt="" />
                    </a>
                </div>


                <!-- main menu -->

                <ul class="navbar-nav">
                    <li class="has-sub">
                        <a href="index.php">
                            <i class="entypo-gauge"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="has-sub">
                        <a href="users.php">
                            <i class="entypo-layout"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-newspaper"></i>
                            <span class="title">Reservations</span>
                        </a>
                        <ul>
                            <li>
                                <a href="reservation.php">
                                    <span class="title">Reservation List</span>
                                </a>
                            </li>
                            <li>
                                <a href="reservation-settings.php">
                                    <span class="title">Reservation Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Link 3</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="forms-main.html">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Forms</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="title">Link 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Link 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Link 3</span>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                </ul>


                <!-- notifications and other links -->
                <ul class="nav navbar-right pull-right">

                    <!-- dropdowns -->
                    <!--<li class="dropdown hidden-xs">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-list"></i>
                            <span class="badge badge-info">6</span>
                        </a>

                        <!-- dropdown menu (tasks) -->
                        <!-- <ul class="dropdown-menu">
                            <li class="top">
                                <p>You have 6 pending tasks</p>
                            </li>

                            <li>
                                <ul class="dropdown-menu-list scroller">
                                    <li>
                                        <a href="#">
                                            <span class="task">
					<span class="desc">Procurement</span>
                                            <span class="percent">27%</span>
                                            </span>

                                            <span class="progress">
					<span style="width: 27%;" class="progress-bar progress-bar-success">
						<span class="sr-only">27% Complete</span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="task">
					<span class="desc">App Development</span>
                                            <span class="percent">83%</span>
                                            </span>

                                            <span class="progress progress-striped">
					<span style="width: 83%;" class="progress-bar progress-bar-danger">
						<span class="sr-only">83% Complete</span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="task">
					<span class="desc">HTML Slicing</span>
                                            <span class="percent">91%</span>
                                            </span>

                                            <span class="progress">
					<span style="width: 91%;" class="progress-bar progress-bar-success">
						<span class="sr-only">91% Complete</span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="task">
					<span class="desc">Database Repair</span>
                                            <span class="percent">12%</span>
                                            </span>

                                            <span class="progress progress-striped">
					<span style="width: 12%;" class="progress-bar progress-bar-warning">
						<span class="sr-only">12% Complete</span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="task">
					<span class="desc">Backup Create Progress</span>
                                            <span class="percent">54%</span>
                                            </span>

                                            <span class="progress progress-striped">
					<span style="width: 54%;" class="progress-bar progress-bar-info">
						<span class="sr-only">54% Complete</span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="task">
					<span class="desc">Upgrade Progress</span>
                                            <span class="percent">17%</span>
                                            </span>

                                            <span class="progress progress-striped">
					<span style="width: 17%;" class="progress-bar progress-bar-important">
						<span class="sr-only">17% Complete</span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">See all tasks</a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-mail"></i>
                            <span class="badge badge-secondary">10</span>
                        </a> -->

                        <!-- dropdown menu (messages) -->
                        <!-- <ul class="dropdown-menu">
                            <li>
                                <form class="top-dropdown-search">

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search anything..." name="s" />
                                    </div>

                                </form>

                                <ul class="dropdown-menu-list scroller">
                                    <li class="active">
                                        <a href="#">
                                            <span class="image pull-right">
					<img src="<?php echo BASE_URL ?>assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
				</span>

                                            <span class="line">
					<strong>Luc Chartier</strong>
					- yesterday
				</span>

                                            <span class="line desc small">
					This ain’t our first item, it is the best of the rest.
				</span>
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="#">
                                            <span class="image pull-right">
					<img src="<?php echo BASE_URL ?>assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
				</span>

                                            <span class="line">
					<strong>Salma Nyberg</strong>
					- 2 days ago
				</span>

                                            <span class="line desc small">
					Oh he decisively impression attachment friendship so if everything. 
				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <span class="image pull-right">
					<img src="<?php echo BASE_URL ?>assets/images/thumb-3@2x.png" width="44" alt="" class="img-circle" />
				</span>

                                            <span class="line">
					Hayden Cartwright
					- a week ago
				</span>

                                            <span class="line desc small">
					Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <span class="image pull-right">
					<img src="<?php echo BASE_URL ?>assets/images/thumb-4@2x.png" width="44" alt="" class="img-circle" />
				</span>

                                            <span class="line">
					Sandra Eberhardt
					- 16 days ago
				</span>

                                            <span class="line desc small">
					On so attention necessary at by provision otherwise existence direction.
				</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="mailbox.html">All Messages</a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-globe"></i>
                            <span class="badge badge-warning">1</span>
                        </a>

                        <!-- dropdown menu (messages) -->
                        <!--<ul class="dropdown-menu">
                            <li class="top">
                                <p class="small">
                                    <a href="#" class="pull-right">Mark all Read</a> You have <strong>3</strong> new notifications.
                                </p>
                            </li>

                            <li>
                                <ul class="dropdown-menu-list scroller">
                                    <li class="unread notification-success">
                                        <a href="#">
                                            <i class="entypo-user-add pull-right"></i>

                                            <span class="line">
					<strong>New user registered</strong>
				</span>

                                            <span class="line small">
					30 seconds ago
				</span>
                                        </a>
                                    </li>

                                    <li class="unread notification-secondary">
                                        <a href="#">
                                            <i class="entypo-heart pull-right"></i>

                                            <span class="line">
					<strong>Someone special liked this</strong>
				</span>

                                            <span class="line small">
					2 minutes ago
				</span>
                                        </a>
                                    </li>

                                    <li class="notification-primary">
                                        <a href="#">
                                            <i class="entypo-user pull-right"></i>

                                            <span class="line">
					<strong>Privacy settings have been changed</strong>
				</span>

                                            <span class="line small">
					3 hours ago
				</span>
                                        </a>
                                    </li>

                                    <li class="notification-danger">
                                        <a href="#">
                                            <i class="entypo-cancel-circled pull-right"></i>

                                            <span class="line">
					John cancelled the event
				</span>

                                            <span class="line small">
					9 hours ago
				</span>
                                        </a>
                                    </li>

                                    <li class="notification-info">
                                        <a href="#">
                                            <i class="entypo-info pull-right"></i>

                                            <span class="line">
					The server is status is stable
				</span>

                                            <span class="line small">
					yesterday at 10:30am
				</span>
                                        </a>
                                    </li>

                                    <li class="notification-warning">
                                        <a href="#">
                                            <i class="entypo-rss pull-right"></i>

                                            <span class="line">
					New comments waiting approval
				</span>

                                            <span class="line small">
					last week
				</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">View all notifications</a>
                            </li>
                        </ul>

                    </li> -->

                    <!-- raw links -->
                    <li class="dropdown">
                        <li>
                            <a href="#">Live Site</a>
                        </li>
                    </li>

                    <li class="sep"></li>

                    <li>
                        <a href="logout.php">
						Log Out <i class="entypo-logout right"></i>
					</a>
                    </li>


                    <!-- mobile only -->
                    <li class="visible-xs">

                        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                        <div class="horizontal-mobile-menu visible-xs">
                            <a href="#" class="with-animation">
                                <!-- add class "with-animation" to support animation -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>

                    </li>

                </ul>

            </div>

        </header>
        <div class="main-content">