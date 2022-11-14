<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Contact Form</h1>
        <form action="" method="post">
          <input type="text" placeholder="Your Name" name="yname" /><br /><br />
          <input type="date" /><br /><br />
          <label for="">Gender:</label>
          <input type="radio" name="gender" value="Male" />Male
          <input type="radio" name="gender" value="Female" />Female
          <input type="radio" name="gender" value="Others" />Tiktoker <br /><br />
          <label for="">Quata:</label>
          <input type="checkbox" name="quata" value="Female" />Female
          <input type="checkbox" name="quata" value="Tribe" />Tribe
          <input type="checkbox" name="quata" value="Disabled" />Disabled
          <input type="checkbox" name="quata" value="Fredom Fighter" />Fredom Fighter <br /><br />
          <label for="pp">Profile Picture</label>
          <input type="file" id="pp" /><br /><br />
          <input type="password" placeholder="Your Password" name="pas123" /> <br /><br />
          <select name="" id="">
            <option value="">--SELECT COUNTRY--</option>
            <option value="bd">Bangladesh</option>
            <option value="in">India</option>
            <option value="pk">Pakistan</option>
            <option value="others">Others</option>
          </select>
          <br /><br />
          <textarea name="" id="" cols="50" rows="5"></textarea><br /><br />

          <!-- <input type="submit" value="Registration" name="sub123" /> -->
          <button type="submit">Registration</button>
        </form>
      </div>
      <div class="col-md-6">
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Name</th>
              <th>Gender</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01</td>
              <td>Kamal Mia</td>
              <td>Male</td>
            </tr>
            <tr>
              <td>02</td>
              <td>Jamal Mia</td>
              <td>Male</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>