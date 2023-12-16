<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

    <input type="number" name="num01"  placeholder="First Number">
    <select name="operator">
        <option value="add">+</option>
        <option value="substract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
        
    </select>
    <input type="number" name="num02" placeholder="Second Number">
    <button type="submit">Calculate</button>
        
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //grab data from inputs
        $num1 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT) ;
        $num2 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT) ;
        $operator = htmlspecialchars($_POST["operator"]);

        //error handlers
        $errors = false;

        if(empty($num1) || empty($num2) || empty($operator)){
            echo "<p> Fill in all field </p>";
            $errors = true;
        } 

        if(!is_numeric($num1) || !is_numeric($num2)){

            echo "<p> only write number </p>";
            $errors = true;
        } 


        //calculate the number if no errors
        if(!$errors){
            $value = 0;
            switch ($operator) {

                case "add" :
                    $value = $num1+$num2;
                    break;
                case "substract" :
                    $value = $num1-$num2;
                    break;
                case "multiply" :
                    $value = $num1*$num2;
                    break;
                case "divide" :
                    $value = $num1/$num2;
                    break;

                default:
                    echo "<p> something went horribly wrong </p>";    

            }

            echo "<p> Result=". $value . "</p>";
        }

        



    }

    ?>
    
</body>
</html>