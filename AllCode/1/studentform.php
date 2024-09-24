<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        /* Styling for the form container */
        div {
            background-color: grey;
            padding: 20px;
            border-radius: 10px;
        }

        /* Style for the form itself */
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        label {
            margin-top: 10px;
        }

        input {
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-submit {
            width: 150px;
            background-color: green;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <div>
        <form id="student-form" action="profile.php" method="post">
            <fieldset>
                <legend>Registration Form</legend>
                <div id="error-message" class="error" style="display : none"></div>
                <label forname="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="First Name"><br>
                <label forname="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Last Name"><br>
                <label forname="roll">Roll Number</label>
                <input type="number" id="roll" name="roll"><br>
                <label forname="mobile">Mobile Number</label>
                <input type="number" id="mobile" name="mobile"><br>
                <button type="submit" class="btn-submit">Submit</button>
            </fieldset>
        </form>
    </div>
    <script>
        document.getElementById("student-form").addEventListener('submit', validateForm);
        function validateForm(event) {
            const firstname = document.getElementById('fname').value.trim();
            const lastname = document.getElementById('lname').value.trim();
            const roll = document.getElementById('roll').value.trim();
            const mobile = document.getElementById('mobile').value.trim();
            const error_message = document.getElementById('error-message');
            error_message.innerHTML = "";
            error_message.style.display = "none";

            if (firstname === "") {
                showerror("First Name Required !");
                console.log("error");
                event.preventDefault();
                return;
            }
            if (lastname === "") {
                showerror("Last Name Required !");
                console.log("error");
                event.preventDefault();
                return;
            }
            if (roll === '') {
                showerror("Roll Number Required !");
                console.log("error");
                event.preventDefault();
                return;
            }
            if (mobile.length !== 11) {
                showerror("Mobile Must have 11 digit !");
                console.log("error");
                event.preventDefault();
                return;
            }
            function showerror(message) {
                const error_message = document.getElementById('error-message');
                error_message.innerHTML = message;
                error_message.style.display = "block";
                error_message.style.color = "red";
            }
        }
    </script>
</body>

</html>