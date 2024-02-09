<?php

echo '<body>
    <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".csv">
        <button type="submit" name="submit">Import CSV</button>
        <button type="upload_data_submit" name="upload_data_submit">Import CSV</button>
    </form>
</body>';

?>
