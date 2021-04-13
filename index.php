<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <script>
        
        $(document).ready(function() {
            
            var index=0;
            
            $("#btnSign").click(function() {

                var txtname = $("#txtname").val();
                var txtdegree = $("#txtdegree").val();
                var txtcity = $("#txtcity").val();

                var url = "index-process.php?name=" + txtname + "&degree=" + txtdegree + "&city=" + txtcity;

                $.get(url, function(response) {
                    // alert(response);
                    $("#result").html("Successful");
                   
                })

            });






        });

    </script>


    <script>
        $module = angular.module("mymodule", []);
        $module.controller("mycontroller", function($scope, $http, $filter) {
            $scope.jsonArray;

            $scope.doFetchAll = function() {
 $("#table").show();
                var name = $scope.name;
                var degree = $scope.degree;
                var city = $scope.city;

                $http.get("record-process.php?name=" + name + "&degree=" + degree + "&city=" + city).then(okFxn, notOk);

                function okFxn(response) {
//                    alert(JSON.stringify(response.data));
                    $scope.jsonArray = (response.data);

                }

                function notOk(response) {
                    alert(response.data);
                }
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <button type="button" class="btn btn-primary addbtn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add User</button>



    <table cellpadding="10" class="mt-3" rules="none" style="display:none;" id="table">
        <tr align="center">
           <th>Index</th>
            <th>Name</th>
            <th>Degree</th>
            <th>City</th>
        </tr>
        <tr ng-repeat="obj in jsonArray">
           <td>{{$index+1}}</td>
            <td>{{obj.name}}</td>
            <td>{{obj.degree}}</td>
            <td>{{obj.city}}</td>
        </tr>
    </table>


<hr>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index-process.php">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="txtname">
                        </div>

                        <div class="mb-3">
                            <label for="degree" class="col-form-label">Degree:</label>
                            <input type="text" class="form-control" id="txtdegree">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="col-form-label">City:</label>
                            <select id="txtcity" class="form-control">
                                <option value="Bengaluru">Bengaluru</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                            </select>
                        </div>

                        <div id="result">*</div>
                    </form>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btnSign" class="btn btn-primary">Save</button>
                    <button type="button" id=""  ng-click="doFetchAll();" class="btn btn-primary">Show All Records</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
