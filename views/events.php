<!-- show the table -->
<div>
    <form action="" method="POST">
        <span><input type="text" name="employee_name" placeholder="Employee Name"></span>
        <span><input type="text" name="event_name" placeholder="Event Name"></span>
        <span><input type="date" name="event_date" placeholder="Event Date"></span>
        <span><input type="submit" name="search" value="search"></span>
        &nbsp;&nbsp;&nbsp;<span><a href="">Refresh</a></span>
    </form>
</div>
<table id="customers">
    <tr>
        <th>Participation Id</th>
        <th>Employee Name</th>
        <th>Employee Mail</th>
        <th>Event Id</th>
        <th>Event Name</th>
        <th>Participation Fee</th>
        <th>Event Date</th>
        <th>Version</th>
    </tr>
    <?php $fee=[]; for($i=0; $i<count($e_data); $i++) : ?>
        <tr>
            <td><?php echo $e_data[$i]['participation_id']; ?></td>
            <td><?php echo $e_data[$i]['employee_name']; ?></td>
            <td><?php echo $e_data[$i]['employee_mail']; ?></td>
            <td><?php echo $e_data[$i]['event_id']; ?></td>
            <td><?php echo $e_data[$i]['event_name']; ?></td>
            <td><?php echo $e_data[$i]['participation_fee']; ?></td>
            <td><?php echo $e_data[$i]['event_date']; ?></td>
            <td><?php echo $e_data[$i]['version']; ?></td>
        </tr>
    <?php $fee[]=$e_data[$i]['participation_fee']; endfor; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total: <?php echo array_sum($fee); ?>/-</td>
        <td></td>
        <td></td>
    </tr>
</table>
</body>
</html>