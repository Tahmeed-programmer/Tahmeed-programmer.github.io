<?php
require('connection.php');
?>
<html>
    <head>
        
        <script src="js8.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <title>Browse Products</title>
      
        
</head>
            <body>
                <nav id="nav" class="active absolute">
                    <ul>
                        <li><a href="staff_login.html">Staff</a></li>
                        <li class="active-h"><a href="customer_login.html">Customer</a></li>
                        <li><a href="admin_login.html">Admin</a></li>
                    </ul>
                    <button class="icon" id="toggle">
                        <div class="line line1"></div>
                        <div class="line line2"></div>
                    </button>
                </nav>
                <div class="container">
                    <h1>Browse products</h1>
                <form action='search.php' method='get'>
                <p style="margin-left:20px"><input type='text' onkeyup="showHint(this.value)" placeholder='Enter Product'name='search' style='border-radius: 12px; font-family: inherit; background-color: transparent; color: #fff; padding: 6px 2px; border: solid 1px #fff'>
                <button type='submit'  name='search2' style='font-family: inherit; border: none; border-radius: 3px; background-color: #06d6a0; color: #fff; padding: 9px; font-size: 1.3rem; cursor: pointer'>Search</button>
            <input type='hidden' name='uid' value="<?php echo $_POST["uid"]?>"></form>
                </p>
                <p>Suggestions: <span id="txthint"></span></p>
                <form action='category.php' method='get'>
                <p> Select a Category: <select name='categories' onChange="showorder(this.value)">
                     <option value='fruit' >fruits</option>
                         <option value='vegetable' >vegetables</option>
                         </select>
                         <button class='btn' type="submit" name='categ' style="margin-top: 6px;">GO</button>
                         <input type='hidden' name='uid' value='<?php echo $_POST["uid"]?>'></form>
                        </form>
            
            </p>
            <p>Preview of Selected Category:<span id="txthint11"></span></p>
                </div>
                <script src="script.js"></script>
</body>
</html>
            
