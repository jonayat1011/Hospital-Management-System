  <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Status</th>
                <th>Record</th>
            </tr>
        </thead>
        <tbody>

            <?php

            // Assuming $rows is an array fetched from the database
           foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>" . $row['column1'] . "</td>";
    echo "<td>" . $row['column2'] . "</td>";
    echo "<td>" . $row['column3'] . "</td>";
    echo "<td>" . $row['column4'] . "</td>";
    echo "<td>" . $row['column5'] . "</td>";
    echo "<td>" . $row['column6'] . "</td>";
    echo "<td>" . $row['column7'] . "</td>";
    echo "</tr>";
}
            ?>
        </tbody>
    </table>