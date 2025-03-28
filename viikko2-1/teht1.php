<?php
require_once('inc/header.php');
?>

    <h1>Tehtävä 1</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Color:</label><br>
        <label><input type="radio" name="color" value="red" required> Red</label><br>
        <label><input type="radio" name="color" value="green" required> Green</label><br>
        <label><input type="radio" name="color" value="blue" required> Blue</label><br><br>

        <label>Size:</label><br>
        <select name="size" required>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br><br>

        <label>Font Style:</label><br>
        <label><input type="checkbox" name="font_style[]" value="bold"> Bold</label><br>
        <label><input type="checkbox" name="font_style[]" value="italic"> Italic</label><br><br>

        <button type="submit">Submit</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = $_POST['color'] ?? 'black';
    $size = $_POST['size'] ?? 'medium';
    $fontStyles = $_POST['font_style'] ?? [];

    $styles = "color: $color;";
    $fontSize = ($size === 'small') ? '12px' : (($size === 'medium') ? '16px' : '20px');
    $styles .= " font-size: $fontSize;";
    if (in_array('bold', $fontStyles)) {
        $styles .= " font-weight: bold;";
    }
    if (in_array('italic', $fontStyles)) {
        $styles .= " font-style: italic;";
    }

    echo "<p style=\"$styles\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";
}
?>

<?php
require_once('inc/footer.php');