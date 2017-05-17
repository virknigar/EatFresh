<html>
<head>
    <?php
    include "header.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB1tbIAqN0XqcgTR1-FxYoVTVq6Is6lD98&sensor=false"></script>
    <script type="text/javascript">
        //~ var locations = [
            //~ ['eatFresh | Inspiring healthier habits', 43.683333, -79.766667, '45 West St, Brampton, ON L6X 1V8'],
            //~ ['eatFresh | Inspiring healthier habits', 42.283333, -83.000000, '950 Grand Marais Rd E, Windsor, ON N8X 3J2'],
            //~ ['eatFresh | Inspiring healthier habits', 42.9870, -81.2432, '451 Waterloo St, London, ON N6B 2P4'],
            //~ ['eatFresh | Inspiring healthier habits', 43.3616, -80.3144, '73 Water St N, Cambridge, ON N1R 2L8'],
            //~ ['eatFresh | Inspiring healthier habits', 42.052841, -82.599683, '6 Erie St S Leamington, ON N8H 3A7'],
            //~ ['eatFresh | Inspiring healthier habits', 42.382224, -82.195090, '191 Keil Drive South, Chatham, ON N7M 6J5'],
            //~ ['eatFresh | Inspiring healthier habits', 42.278869, -83.053150, '2001 Huron Church Road, Windsor, ON N9C 2L6'],
            //~ ['eatFresh | Inspiring healthier habits', 42.309643, -83.064421, '2255 University Avenue West, Windsor, ON N9B 1E6']
        //~ ];
        var locations = [
            ['eatFresh | Inspiring healthier habits', 40.808596, -73.944406, '328 Malcolm X Blvd, New York, NY 10027, USA'],
            ['eatFresh | Inspiring healthier habits', 39.944395, -74.959187, '400 NJ-38, Moorestown, NJ 08057, USA'],
            ['eatFresh | Inspiring healthier habits', 41.101408, -73.430294, '6 Crown Ave Norwalk, CT 06854 USA'],
            ['eatFresh | Inspiring healthier habits', 41.185463, -73.207689, '142 Herkimer St Bridgeport, CT 06604 USA']
        ];
        function initialize() {
            var myOptions = {
                center: {lat: 41.185463, lng: -73.207689},
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("default"),myOptions);
            setMarkers(map,locations)
        }
        function setMarkers(map,locations){
            var marker, i
            for (i = 0; i < locations.length; i++)
            {
                var loan = locations[i][0]
                var lat = locations[i][1]
                var long = locations[i][2]
                var add =  locations[i][3]

                latlngset = new google.maps.LatLng(lat, long);

                var marker = new google.maps.Marker({
                    map: map, title: loan , position: latlngset
                });
                map.setCenter(marker.getPosition())
                var content = "<h3>" + loan +  '</h3>'+add
                var infowindow = new google.maps.InfoWindow()

                google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
                    return function() {
                        infowindow.setContent(content);
                        infowindow.open(map,marker);
                    };
                })(marker,content,infowindow));
            }
        }
    </script>
    <style>
        #heading{
            font-size: 50px;
            font-family: "Goudy Old Style";

        }
        .text{
            font-size: 20px;

        }
    </style>
</head>
<body onload="initialize()">
<div class="form-group col-md-4">
    <div class="well">
        <p id="heading">Visit our locations</p>
        <div ng-app="myApp" ng-controller="namesCtrl">
            <input type="text" class="form-control" ng-model="test" placeholder="Enter your address here">
            <br><br>
            <ol>
                <li class="text" ng-repeat="x in names | filter:test">
                    {{x}}
                </li>
                <p class="text" ng-show="(names | filter:test).length == 0">Sorry, we are not present at your location</p>
            </ol>
        </div>
        <script>
            angular.module('myApp', []).controller('namesCtrl', function($scope) {
                $scope.names = [
                    '328 Malcolm X Blvd, New York',
                    '400 NJ-38, Moorestown, New Jersey',
                    '6 Crown Ave Norwalk, Conneticut',
                    '142 Herkimer St, Bridgeport, Conneticut'
                ];
            });
        </script>
    </div>
</div>
<div class="form-group col-md-8">
    <div id="default" style="width:100%; height:550px"></div>
</div>
</body>
</html>

