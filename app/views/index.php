<!doctype html> <html class="no-js"> <head> <meta charset="utf-8"> <title></title> <meta name="description" content=""> <meta name="viewport" content="width=device-width"> <!-- Place favicon.ico and apple-touch-icon.png in the root directory --> <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css"> <link rel="stylesheet" href="styles/vendor.620115f4.css"> <link rel="stylesheet" href="styles/main.66232055.css">  <body data-ng-app="aidphApp" id="app" data-custom-background data-off-canvas-nav> <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]--> <!-- Add your site or application content here --> <div data-ng-controller="AppCtrl"> <div data-ng-hide="isSpecificPage()" data-ng-cloak class="no-print"> <section data-ng-include=" 'views/header.html' " id="header" class="top-header"></section> <aside data-ng-include=" 'views/nav.html' " id="nav-container"></aside> </div> <div class="view-container"> <section data-ng-view="" id="content" class="animate-fade-up"></section> </div> </div> <script type="text/ng-template" id="myModalContent.html"><div class="modal-header">
             <h3>Welcome to #aidPH Admin Panel!</h3>
         </div>
         <div class="modal-body">
             Welcome to Admin Panel!
         </div>
         <div class="modal-footer">
             <button class="btn btn-primary" ng-click="ok()">OK</button>
         </div></script> <!-- Google Analytics: change UA-XXXXX-X to be your site's ID --> <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

       ga('create', 'UA-XXXXX-X');
       ga('send', 'pageview');</script> <!--[if lt IE 9]>
    <script src="scripts/oldieshim.506738b4.js"></script>
    <![endif]--> <script src="http://maps.google.com/maps/api/js?sensor=false"></script> <script src="scripts/vendor.1bfae203.js"></script> <script src="scripts/ui.80049984.js"></script> <script src="scripts/scripts.22a252e1.js"></script>  