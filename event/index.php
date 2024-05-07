<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Family and Friends Event: Zak City</title>
<style>
body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  color: black;
  background-image: url("eventBackground.jpg");
}

.main {
  padding: 1rem 2rem;
}

.main .title {
  font-size: 25px;
  text-align: center;
  margin-bottom: 1rem;
}

.main .location {
  font-size: 20px;
  text-align: center;
  margin-bottom: 1rem;
}

.main .details {
  font-size: 20px;
  text-align: center;
  line-height: 1.5;
}

.scroll{
    color: black;
    font-size: 20px;
    text-align: center;
    font-weight: bold;
}

.main .form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 2rem;
}

.main .form input {
  width: 70%;
  padding: 0.5rem 1rem;
  margin-bottom: 1rem;
  border: 1px solid black;
  border-radius: 5px;
  font-size: 1rem;
  border-top: 2px;
  border-right: 2px;
  border-left: 2px;
}

.main .form button {
  background-color: #4CAF50;
  color: white;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 15px;
  font-size: 1rem;
  cursor: pointer;
}



</style>
</head>
<body>
<main class="main">
  <div class="city">  <img src="eventScreenLogo.png" alt="" style="float: left; height: 140px; width:100px">
    <p class="date" style="font-size: 45px; text-align: right;">
        <span style="color: #730E20;">11</span><br>
        <span style="color: #1D213A;">05</span><br>
        <span style="color: #474D27;">24</span>
    </p>
</div>
 <div style="padding-top: 30px" >
  <h1 class="title">Black Tie Event</h1>
  <p class="location">The Rock Musicarium<br>Naval Sailing Club Rd, Islamabad</p>
  <p class="details">11th May, 2024<br> 7:30 PM onwards</p>
  <br><br><br><br><br><br><br><br><br><br><br>
  <p class="scroll">Scroll down to Register</p>
</div>
    <div style="padding-top: 100px;">
    <form id="registration-form" class="form">
  <p style="color: black; font-weight: bold; font-size: 20px">Register for the Event</p>
  <br><br><br><br>
  <label for="name" style="padding-top: 20px; display: block; margin-bottom: 0.5rem; font-size: 1rem; padding-right: 240px;">Name</label>
  <input class="input" type="text" id="name" name="name" placeholder="Full Name" required><br>
  <label for="email" style="padding-top: 20px; display: block; margin-bottom: 0.5rem; font-size: 1rem; padding-right: 240px;">Email</label>
  <input class="input" type="email" id="email" name="email" placeholder="Email Address" required><br>
  <label for="phone" style="padding-top: 20px; display: block; margin-bottom: 0.5rem; font-size: 1rem; padding-right: 170px;">Phone Number</label>
  <input class="input" type="tel" id="phone" name="phone" placeholder="Phone Number" required><br>
  <label for="guests" style="padding-top: 20px; display: block; margin-bottom: 0.5rem; font-size: 1rem; padding-right: 150px;">Number of Guests (Including Yourself)</label>
  <input class="input" type="number" id="guests" name="guests" placeholder="Number of Guests"><br>
  <label for="host" style="padding-top: 20px; display: block; margin-bottom: 0.5rem; font-size: 1rem; padding-right: 200px;">Host Name</label>
  <input class="input" type="text" id="host" name="host" placeholder="Host Name" required><br><br>

  <button type="submit" style="margin-top: 20px; background-color: #A38559; width: 80%; font-weight: bold;">SUBMIT</button>
  <br> <br><br>
</form>

</div>
</main>

</script>
</body>
<script>
    document.getElementById('registration-form').addEventListener('submit', (event) => {
      event.preventDefault();
      
      // Store form reference
      const form = document.getElementById('registration-form');
  
      fetch('process.php', {
        method: 'POST',
        body: new FormData(form)
      })
      .then(response => response.text())
      .then(data => {
        if (data.includes("Registration successful!")) {
          // Reset form after successful submission
          form.reset();
        }
      });
    });
  </script>
</html>
