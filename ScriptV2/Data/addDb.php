<!DOCTYPE html>
<html>
    <header>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>
    </header>
    <body>
    <script>
        function myFunction() {
            var x = document.getElementById("newDb").value;
            document.getElementById("demo").innerHTML = "New Db name: " + x;
        }
        function CreateDb(){
            var name = document.getElementById("newDb").value;
            var requestOptions = {
            method: 'POST',
            redirect: 'follow'
            };

            fetch("http://localhost:8086/query?u=admin&p=1234&q=CREATE DATABASE "+name, requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .then(response => {
                if(response !== 400){
                    console.log("ok")
                    document.getElementById("success").innerHTML = "New Database created";
                }else{
                    document.getElementById("success").innerHTML = "Something went Wrong!!";
                    console.log("error")
                }
            })
            .catch(error => console.log('error', error));
        }
    </script>


        <h1>Add new Database</h1>
        <label>Name</label>
        <input type="text" id="newDb" placeholder="my first database" onchange="myFunction()">
        

        <p id="demo"></p>

        <button onClick="CreateDb()">Create</button>


        <p id="success"></p>

        <input type="button" name="button3" value="Go Back"
                onClick="document.location.href='../index.html'"/>



    </body>
</html>