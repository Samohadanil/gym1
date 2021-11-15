<html>
<head>
<title>Запись в БД через форму на php</title>
</head>
<body>
<form method="POST" id="my_form" action="">

<label for="trainer">Choose trainer:</label>
<select id="trainer" name="trainer">
    <option>Michael</option>
    <option>John</option>
    <option>Brand</option>
</select></p>
<table>
    <tr>
       <td>
          <input name="name" id="name" form="my_form" type="text" placeholder="Name"/> <br>
       <td/>
       <td>
          <input name="number" id="number" form="my_form" type="text" placeholder="Phone number"/> <br>
       <td/>
       <td>
          <input name="email" id="email" form="my_form" type="email" placeholder="Email"/> <br>
       <td/>
       <td>
          <label for="date">Date for visit: </label>
          <input type="date" form="my_form" id="date" name="date"/> <br>
       <td/>
       <td>
          <input type="submit" name="submit" value="Send"/> <br>
          <p><span id='display'></span></p>
       <td/>
    <tr/>
<table/>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</form>
<link rel='stylesheet' href='style.css'>
<br>
<table>
    <thead align="left" style="display: table-header-group">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
    </tr>
    </thead>
<tbody>
<?php
require_once 'gym.php';
foreach ($stmt as $row) :?>
    <tr class="item_row">
        <td> <?php echo $row['name']; ?></td>
        <td> <?php echo $row['email']; ?></td>
        <td> <?php echo $row['phone_number']; ?></td>
        <td> <?php echo $row['date_visit']; ?></td>
        <td>
            <form action="delete.php" method="post" id="deleted">
                <input type="hidden" name="row_id" value="<?php echo $row['id']; ?>">
                <input type='submit' name='delete' value='Delete' method='post'>
            </form>
        </td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
</body>
</html>
