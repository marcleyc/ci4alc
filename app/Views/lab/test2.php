<form id="contact-form">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name">

  <label for="email">Email:</label>
  <input type="email" id="email" name="email">

  <label for="message">Message:</label>
  <textarea id="message" name="message"></textarea>

  <input type="submit" value="Submit">
</form>

<style>
    body {
  font-family: Arial, sans-serif;
}

#contact-form {
  width: 100%;
  max-width: 320px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0px 0px 5px #ccc;
}

#contact-form label {
  display: block;
  margin-top: 10px;
  font-weight: bold;
}

#contact-form input[type="text"],
#contact-form input[type="email"],
#contact-form textarea {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0px 0px 5px #ccc;
  resize: none;
}

#contact-form input[type="submit"] {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#contact-form input[type="submit"]:hover {
  background-color: #3e8e4
</style>