<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Transformer</title>

        <!-- custom css file -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- bootstrap css file -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- bootstrap icons css file -->
    <link rel="stylesheet" href="./css/bootstrap-icons.min.css">


    <style>
        .extra-field {
            display: none;
            margin-top: 15px;
        }
</style>


</head>
<body>
<div class="container mt-5">
    
    <form action="index.php" method="post">
    
    <!-- User text input -->
        <div class="row">
            <div class="col-lg-12 col-md-6 mt-4">
                <label for="textInput" class="form-label">Input Text</label>
                <input type="text" class="form-control" name="textInput">
            </div>
    <!-- Select operation to do -->
            <div class="col-lg-12 col-md-6 mt-4">
                <label for="functionSet" class="form-label">Select the function</label>
                <select name="functionSet" id="functionSelect" onchange="showFields()" class="form-select">
                    <option value="">Select a operation to Perform</option>
                    <option value="strtoupper">Convert text to upper case</option>
                    <option value="strtolower">Convert text to lower case</option>
                    <option value="trim">Trim whitespace from both ends</option>
                    <option value="str_pad">Pad the string to a fixed length</option>
                    <option value="str_replace">Replace a word or phrase</option>
                    <option value="strrev">Reverse the text</option>
                    <option value="str_shuffle">Shuffle characters in the text</option>
                    <option value="strcmp">Compare with another string</option>
                    <option value="strlen">Get the length of the string</option>
                    <option value="strpos">Find the position of a substring</option>
                    <option value="substr">Extract a substring</option>
                    <option value="explode">Split string into words (explode)</option>
                    <option value="implode">Join words into a string (implode)</option>


                </select>
            </div>
            
        </div>
        
            <!-- Dynamic extra input fields - hidden -->
            <div id="padFields" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Pad length">
            </div>

            <div id="replaceFields" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Word to find">
                <input type="text" class="form-control mt-3" name="extra2" placeholder="Replace with">
            </div>

            <div id="compareField" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Compare with">
            </div>

            <div id="positionField" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Substring to find">
            </div>

            <div id="substrField" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Start position">
                <input type="text" class="form-control mt-3" name="extra2" placeholder="Length (optional)">
            </div>

            <div id="implodeField" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Comma-separated items">
                <input type="text" class="form-control " name="extra2" placeholder="Glue (e.g. space)">
            </div>

            <div id="explodeField" class="extra-field">
                <input type="text" class="form-control" name="extra1" placeholder="Delimiter (default is space)">
            </div>

            <br>

        <button type="submit" name="submit" class="btn btn-secondary mt-4">Do Operation</button>

        <?php
             include("textTransformerFunctions.php"); // import text transformation codes

             // when clicked submit
             if (isset($_POST["submit"])) {

                $text = $_POST["textInput"] ?? '';
                $operation = $_POST["functionSet"] ?? '';
                $extra1 = $_POST["extra1"] ?? '';
                $extra2 = $_POST["extra2"] ?? '';

                $result = "";
                // check the matching selected operation and execute the function
               switch ($operation) {
                        case 'strtoupper':
                            $result = convertToUpper($text);
                            break;
                        case 'strtolower':
                            $result = convertToLower($text);
                            break;
                        case 'trim':
                            $result = trimText($text);
                            break;
                        case 'str_pad':
                            $length = is_numeric($extra1) ? (int)$extra1 : 20;
                            $result = padText($text, $length);
                            break;
                        case 'str_replace':
                            $text = replaceText($extra1, $extra2, $text);
                            $result = $text;
                            break;
                        case 'strrev':
                            $result = reverseText($text);
                            break;
                        case 'str_shuffle':
                            $result = shuffleText($text);
                            break;
                        case 'strcmp':
                            $result = compareText($text, $extra1);
                            break;
                        case 'strlen':
                            $result = getStringLength($text);
                            break;
                        case 'strpos':
                            $result = findSubstringPosition($text, $extra1);
                            break;
                        case 'substr':
                            $start = is_numeric($extra1) ? (int)$extra1 : 0;
                            $length = is_numeric($extra2) ? (int)$extra2 : null;
                            $result = extractSubstring($text, $start, $length);
                            break;
                        case 'explode':
                            $array = explodeText($text, $extra1 ?: ' ');
                            $result = print_r($array, true); // Show as array output
                            break;
                        case 'implode':
                            $array = explode(',', $extra1); // User enters items separated by comma
                            $result = implodeText($array, $extra2 ?: ' ');
                            break;
                        default:
                            $result = "Please select a valid operation.";
    }


    // echo the result
    echo '<h3 class="mt-5">Result:</h3><p class ="lead">' . $result . '</p>';

    }

        ?>
    
    </form>
</div>

        <!-- Input dynamic handling Js file -->
        <script src="./js/TextTransformer.js"></script>

        <!-- bootstrap js file -->
        <script src="./js/bootstrap.min.js"></script>
            
        <!-- jQuery for bootstrap -->
        <script src="./js/jquery-3.7.1.min.js"></script>
</body>
</html>